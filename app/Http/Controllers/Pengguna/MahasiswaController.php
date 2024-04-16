<?php

namespace App\Http\Controllers\Pengguna;

use App\Models\User;
use App\Mail\DaftarMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\DataMaster\Fakultas;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\Akademik\TahunAkademik;
use App\Models\DataMaster\Fakultas\Jurusan;
use App\Models\DataMaster\Fakultas\Jurusan\ProgramStudi;

class MahasiswaController extends Controller
{
    public function mahasiswa()
    {
        $users = User::where('role_id', 4)->get();
        return view('backoffice.pengguna.mahasiswa.index', compact('users'));
    }

    public function tambah()
    {
        $programStudis = ProgramStudi::get();
        $tahunAkademiks = TahunAkademik::get();
        return view('backoffice.pengguna.mahasiswa.tambah', compact('programStudis', 'tahunAkademiks'));
    }

    public function tambahAksi(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:users',
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
            'program_studi' => 'required',
            'tahun_akademik' => 'required',
            'semester' => 'required',
        ], [
            'nim.required' => 'NIM harus diisi',
            'nim.unique' => 'NIM sudah terdaftar',
            'nama.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email harus valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.min' => 'Password minimal 8 karakter',
            'password_confirmation.same' => 'Konfirmasi password tidak sama',
            'program_studi.required' => 'Program Studi harus diisi',
            'tahun_akademik.required' => 'Tahun Akademik harus diisi',
            'semester.required' => 'Semester harus diisi',
        ]);

        // get id program studi
        $prodi = ProgramStudi::find($request->program_studi);

        // get id jurusan
        $jurusan = Jurusan::where('id', $prodi->jurusan_id)->first();

        // get id fakultas
        $fakultas = Fakultas::where('id', $jurusan->fakultas_id)->first();

        // dd('id prodi ' . $prodi->id . ' id jurusan ' . $jurusan->id . ' id fakultas ' . $fakultas->id);

        $user = new User();
        $user->nim = $request->nim;
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(60);
        $user->role_id = 4;
        $user->fakultas_id = $fakultas->id;
        $user->jurusan_id = $jurusan->id;
        $user->program_studi_id = $prodi->id;
        $user->tahun_akademik_id = $request->tahun_akademik;
        $user->semester = $request->semester;
        $user->save();

        $password = $request->password;
        Mail::to($user->email)->send(new DaftarMail($user, $password));

        return redirect('/backoffice/pengguna/mahasiswa')->with('success', 'Mahasiswa baru ditambahkan');

    }
}
