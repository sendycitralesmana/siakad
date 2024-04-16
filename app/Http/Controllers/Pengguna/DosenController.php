<?php

namespace App\Http\Controllers\Pengguna;

use App\Models\User;
use App\Mail\DaftarMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class DosenController extends Controller
{
    public function dosen()
    {
        $users = User::where('role_id', 3)->get();
        return view('backoffice.pengguna.dosen.index', compact('users'));
    }

    public function tambah()
    {
        return view('backoffice.pengguna.dosen.tambah');
    }

    public function tambahAksi(Request $request)
    {
        $request->validate([
            'nidn' => 'required|unique:users',
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ], [
            'nidn.required' => 'NIDN harus diisi',
            'nidn.unique' => 'NIDN sudah terdaftar',
            'nama.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password_confirmation.required' => 'Konfirmasi Password harus diisi',
            'password_confirmation.same' => 'Konfirmasi Password Tidak Sesuai'
        ]);

        $user = new User;
        $user->nidn = $request->nidn;
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role_id = 3;
        $user->remember_token = Str::random(60);
        $user->save();

        $password = $request->password;
        Mail::to($user->email)->send(new DaftarMail($user, $password));

        return redirect('/backoffice/pengguna/dosen')->with('success', 'dosen baru ditambahkan');
    }

    public function hapus($id)
    {
        $dosen = User::find($id);
        $dosen->delete();
    }
}
