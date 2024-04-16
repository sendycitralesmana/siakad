<?php

namespace App\Http\Controllers\DataMaster;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DataMaster\MataKuliah;
use App\Models\DataMaster\Fakultas\Jurusan\ProgramStudi;

class MataKuliahController extends Controller
{
    public function matkul()
    {
        $matkuls = MataKuliah::get();
        return view('backoffice.data-master.mata-kuliah.index', compact('matkuls'));
    }

    public function tambah()
    {
        $prodis = ProgramStudi::get();
        $dosens = User::where('role_id', 3)->get();
        return view('backoffice.data-master.mata-kuliah.tambah', compact('dosens', 'prodis'));
    }

    public function tambahAksi(Request $request)
    {
        $request->validate([
            'kode_mata_kuliah' => 'required|unique:mata_kuliah,kode_mata_kuliah',
            'mata_kuliah' => 'required',
            'jumlah_sks' => 'required',
        ], [
            'kode_mata_kuliah.required' => 'Kode mata kuliah wajib diisi',
            'kode_mata_kuliah.unique' => 'Kode mata kuliah sudah ada',
            'mata_kuliah.required' => 'Mata kuliah wajib diisi',
            'jumlah_sks.required' => 'Jumlah SKS wajib diisi',
        ]);
        
        $matkul = new MataKuliah();
        $matkul->kode_mata_kuliah = $request->kode_mata_kuliah;
        $matkul->mata_kuliah = $request->mata_kuliah;
        $matkul->jumlah_sks = $request->jumlah_sks;
        $matkul->save();

        return redirect('/backoffice/data-master/matkul')->with('success', 'Mata kuliah ' . $request->mata_kuliah . ' berhasil ditambahkan');
    }

    public function ubah($id)
    {
        $matkul = MataKuliah::find($id);
        $prodis = ProgramStudi::get();
        $dosens = User::where('role_id', 3)->get();
        return view('backoffice.data-master.mata-kuliah.ubah', compact('matkul', 'dosens', 'prodis'));
    }

    public function ubahAksi(Request $request, $id)
    {
        $request->validate([
            'kode_mata_kuliah' => 'required',
            'mata_kuliah' => 'required',
            'jumlah_sks' => 'required',
        ], [
            'kode_mata_kuliah.required' => 'Kode mata kuliah wajib diisi',
            'mata_kuliah.required' => 'Mata kuliah wajib diisi',
            'jumlah_sks.required' => 'Jumlah SKS wajib diisi',
        ]);

        $matkul = MataKuliah::find($id);
        $matkul->kode_mata_kuliah = $request->kode_mata_kuliah;
        $matkul->mata_kuliah = $request->mata_kuliah;
        $matkul->jumlah_sks = $request->jumlah_sks;
        $matkul->save();
        return redirect('/backoffice/data-master/matkul')->with('success', 'Mata kuliah telah diubah');
    }

    public function hapus($id)
    {
        $matkul = MataKuliah::find($id);
        $matkul->delete();
        return redirect('/backoffice/data-master/matkul')->with('success', 'Mata kuliah ' . $matkul->mata_kuliah . ' berhasil dihapus');
    }
}
