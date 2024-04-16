<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function profil($id)
    {
        $user = User::find($id);
        return view('backoffice.user.profil', compact('user'));
    }

    public function ubahData($id)
    {
        $user = User::find($id);
        return view('backoffice.user.ubah-data', compact('user'));
    }

    public function ubahDataAksi(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ], [
            'nama.required' => 'Nama harus diisi',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi',
            'agama.required' => 'Agama harus diisi',
            'tempat_lahir.required' => 'Tempat lahir harus diisi',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'no_hp.required' => 'No. HP harus diisi',
        ]);

        $fotoProfil = null;
        if($request->file('foto_profil')) {
            if ($request->foto_profil) {
                Storage::delete('public/images/user/' . $request->foto_profil_lama);
            }
            $fileNameFotoProfil = $request->file('foto_profil')->getClientOriginalExtension();
            $fotoProfil ='fp-' . now()->timestamp . '.' . $fileNameFotoProfil;
            $request->file('foto_profil')->storeAs('public/images/user/', str_replace(' ', '_', $fotoProfil));
        }

        $user = User::find($id);
        if ($request->foto_profil_lama != null) {
            if ($request->file('foto_profil') == "") {
                $user->foto_profil = $request->foto_profil_lama;
            } else {
                $user->foto_profil = str_replace(' ', '_', $fotoProfil);
            }
        } else {
            $user->foto_profil = str_replace(' ', '_', $fotoProfil);
        }
        $user->nama = $request->nama;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->agama = $request->agama;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->alamat = $request->alamat;
        $user->no_hp = $request->no_hp;
        $user->save();

    return redirect('/backoffice/user/' . $id . '/profil')->with('success', 'Data profil diubah');
    }

    public function ubahPassword($id)
    {
        $user = User::find($id);
        return view('backoffice.user.ubah-password', compact('user'));
    }

    public function ubahPasswordAksi(Request $request, $id)
    {
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|min:8',
            'konfirmasi_password_baru' => 'required|same:password_baru|min:8',
        ], [
            'password_lama.required' => 'Password lama harus diisi',
            'password_baru.required' => 'Password baru harus diisi',
            'password_baru.min' => 'Password baru minimal 8 karakter',
            'konfirmasi_password_baru.required' => 'Konfirmasi password baru harus diisi',
            'konfirmasi_password_baru.same' => 'Konfirmasi password baru tidak sama',
            'konfirmasi_password_baru.min' => 'Konfirmasi password baru minimal 8 karakter',
        ]);

        $user = User::find($id);

        if (!Hash::check($request->password_lama, $user->password)) {
            return redirect('/backoffice/user/' . $id . '/ubah-password')->with('warning', 'Password lama tidak sesuai');
        }

        $user->password = Hash::make($request->password_baru);
        $user->save();
        return redirect('/backoffice/user/' . $id . '/profil')->with('success', 'Password anda telah diubah');
    }
}
