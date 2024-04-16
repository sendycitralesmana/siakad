<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function daftar()
    {
        return view('backoffice.auth.daftar');
    }

    public function daftarAksi(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ], [
            'nama.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email harus valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Kata sandi harus diisi',
            'password.min' => 'Kata sandi minimal 8 karakter',
            'password_confirmation.required' => 'Konfirmasi kata sandi harus diisi',
            'password_confirmation.same' => 'Kata sandi tidak sesuai',
        ]);

        $user = new User();
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(60);
        $user->status = 'Tidak aktif';
        $user->save();

        // Mail::to($user->email)->send(new DaftarMail($user));
        return redirect('/login')->with('success', 'Akun anda telah terdaftar. Silahkan cek email anda untuk verifikasi akun');
    }

    public function login()
    {
        return view('backoffice.auth.login2');
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email harus valid',
            'password.required' => 'Kata sandi harus diisi',
        ]);

        // check if email not registered
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect('/login')->with('error', 'Email tidak terdaftar');
        }

        // check if password not match
        if (!password_verify($request->password, $user->password)) {
            return redirect('/login')->with('error', 'Kata sandi tidak sesuai');
        }

        // check if user email verified not true
        if (!$user->email_verified_at) {
            return redirect('/login')->with('error', 'Email belum terverifikasi. Silahkan cek email anda');
        }

        // check if status not active
        // if ($user->status != 'Aktif') {
        //     return redirect('/login')->with('error', 'Akun anda belum diaktifkan. Silahkan hubungi admin untuk mengaktifkan akun anda.');
        // }

        $request->session()->regenerate();
        Auth::login($user);
        
        // return redirect()->intended('/backoffice/dashboard')->with('success', 'Masuk berhasil');
        return redirect()->intended('/backoffice/dashboard');
    }

    public function verify($token)
    {
        $user = User::where('remember_token', $token)->first();
        if ($user) {
            $user->remember_token = null;
            $user->email_verified_at = now();
            $user->save();
            return redirect('/login')->with('success', 'Akun anda telah diverifikasi. Silahkan masuk');
        } else {
            abort(404);
        }
    }

    public function lupaPassword()
    {
        return view('backoffice.auth.lupa-password');
    }

    public function lupaPasswordAksi(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email harus valid',
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect('/lupa-password')->with('error', 'Email tidak terdaftar');
        }

        if (!$user->email_verified_at) {
            return redirect('/lupa-password')->with('error', 'Email belum terverifikasi. Silahkan cek email anda');
        }

        $user->remember_token = Str::random(60);
        $user->save();

        // Mail::to($user->email)->send(new LupaPasswordMail($user));
        return redirect('/lupa-password')->with('success', 'Silahkan cek email anda untuk melihat link reset password');
    }

    public function aturUlang($token)
    {
        $user = User::where('remember_token', $token)->first();
        if ($user) {
            return view('backoffice.auth.atur-ulang-password', compact('user'));
        } else {
            abort(404);
        }
    }

    public function aturUlangPassword(Request $request, $token)
    {
        $request->validate([
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ], [
            'password.required' => 'Kata sandi harus diisi',
            'password.min' => 'Kata sandi minimal 8 karakter',
            'password_confirmation.required' => 'Konfirmasi kata sandi harus diisi',
            'password_confirmation.same' => 'Kata sandi tidak sesuai',
        ]);

        $user = User::where('remember_token', $token)->first();
        if ($user) {
            $user->password = bcrypt($request->password);
            $user->remember_token = null;
            $user->save();
            return redirect('/login')->with('success', 'Password diatur ulang. Silahkan masuk');
        } else {
            abort(404);
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/login')->with('success', 'Anda telah keluar dari aplikasi presensi');
    }
}
