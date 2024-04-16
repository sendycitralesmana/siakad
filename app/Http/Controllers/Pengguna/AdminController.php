<?php

namespace App\Http\Controllers\Pengguna;

use App\Models\User;
use App\Mail\DaftarMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function admin()
    {
        $users = User::where('role_id', 2)->get();
        return view('backoffice.pengguna.admin.index', compact('users'));
    }

    public function tambah()
    {
        return view('backoffice.pengguna.admin.tambah');
    }

    public function tambahAksi(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ], [
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
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role_id = 2;
        $user->remember_token = Str::random(60);
        $user->save();

        $password = $request->password;
        Mail::to($user->email)->send(new DaftarMail($user, $password));

        return redirect('/backoffice/pengguna/admin')->with('success', 'Admin baru ditambahkan');
    }

    public function hapus($id)
    {
        $admin = User::find($id);
        $admin->delete();
    }
}
