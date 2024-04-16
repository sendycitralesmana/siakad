<?php

namespace App\Http\Controllers\DataMaster;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DataMaster\MataKuliah;
use App\Models\DataMaster\DosenMataKuliah;

class DosenMataKuliahController extends Controller
{
    public function dosenMatkul()
    {
        $dosenMatkuls = DosenMataKuliah::get();
        return view('backoffice.data-master.dosen-mata-kuliah.index', compact('dosenMatkuls'));
    }

    public function tambah()
    {
        $matkuls = MataKuliah::get();
        $dosens = User::where('role_id', 3)->get();
        return view('backoffice.data-master.dosen-mata-kuliah.tambah', compact('dosens', 'matkuls'));
    }

    public function tambahAksi(Request $request)
    {
        $request->validate([
            'dosen' => 'required',
            'mata_kuliah' => 'required',
        ], [
            'dosen.required' => 'Dosen wajib dipilih',
            'mata_kuliah.required' => 'Mata kuliah wajib dipilih',
        ]);

        // cek jika dosen mengambil mata kuliah yang sama
        if (DosenMataKuliah::where('user_id', $request->dosen)
            ->where('mata_kuliah_id', $request->mata_kuliah)
            ->exists()) {
            return redirect('/backoffice/data-master/dosen-matkul/tambah')->with('gagal', 'Dosen sudah mengambil mata kuliah ' . MataKuliah::find($request->mata_kuliah)->mata_kuliah);
        }

        // cek jika mata kuliah sudah diambil oleh dosen
        if (DosenMataKuliah::where('mata_kuliah_id', $request->mata_kuliah)
            ->where('user_id', '!=', $request->dosen)
            ->exists()) {
            return redirect('/backoffice/data-master/dosen-matkul/tambah')->with('gagal', 'Mata kuliah ' . MataKuliah::find($request->mata_kuliah)->mata_kuliah . ' sudah diambil oleh dosen ' . User::find($request->dosen)->nama);
        }
        
        $dosenMatkul = new DosenMataKuliah();
        $dosenMatkul->user_id = $request->dosen;
        $dosenMatkul->mata_kuliah_id = $request->mata_kuliah;
        $dosenMatkul->save();

        return redirect('/backoffice/data-master/dosen-matkul')->with('success', 'Dosen Mata kuliah telah ditambahkan');
    }
}
