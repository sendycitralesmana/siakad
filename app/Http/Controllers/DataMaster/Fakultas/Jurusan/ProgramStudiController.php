<?php

namespace App\Http\Controllers\DataMaster\Fakultas\Jurusan;

use Illuminate\Http\Request;
use App\Models\DataMaster\Fakultas;
use App\Http\Controllers\Controller;
use App\Models\DataMaster\Fakultas\Jurusan;
use App\Models\DataMaster\Fakultas\Jurusan\ProgramStudi;

class ProgramStudiController extends Controller
{
    public function prodi($fakultas_id, $jurusan_id)
    {
        $fakultas = Fakultas::find($fakultas_id);
        $jurusan = Jurusan::find($jurusan_id);
        $prodi = ProgramStudi::where('jurusan_id', $jurusan_id)->get();

        return view('backoffice.data-master.fakultas.jurusan.program-studi.index', compact('fakultas', 'jurusan', 'prodi'));
    }

    public function tambah($fakultas_id, $jurusan_id)
    {
        $fakultas = Fakultas::find($fakultas_id);
        $jurusan = Jurusan::find($jurusan_id);
        return view('backoffice.data-master.fakultas.jurusan.program-studi.tambah', compact('fakultas', 'jurusan'));
    }

    public function tambahAksi($fakultas_id, $jurusan_id, Request $request)
    {
        $request->validate([
            'gelar_lulusan' => 'required',
            'kode_program_studi' => 'required|unique:program_studi,kode_program_studi',
            'program_studi' => 'required',
        ], [
            'gelar_lulusan.required' => 'Gelar lulusan harus diisi',
            'kode_program_studi.required' => 'Kode program studi harus diisi',
            'kode_program_studi.unique' => 'Kode program studi sudah ada',
            'program_studi.required' => 'Program studi harus diisi',
        ]);

        $prodi = new ProgramStudi;
        $prodi->jurusan_id = $jurusan_id;
        $prodi->gelar_lulusan = $request->gelar_lulusan;
        $prodi->kode_program_studi = $request->kode_program_studi;
        $prodi->program_studi = $request->program_studi;
        $prodi->save();

        return redirect('/backoffice/data-master/fakultas/' . $fakultas_id . '/jurusan/' . $jurusan_id . '/prodi')->with('success', 'Program studi ' . $prodi->prodi . ' ditambahkan');
    }

    public function ubah($fakultas_id, $jurusan_id, $prodi_id)
    {
        $fakultas = Fakultas::find($fakultas_id);
        $jurusan = Jurusan::find($jurusan_id);
        $prodi = ProgramStudi::find($prodi_id);
        return view('backoffice.data-master.fakultas.jurusan.program-studi.ubah', compact('fakultas', 'jurusan', 'prodi'));
    }

    public function ubahAksi($fakultas_id, $jurusan_id, $prodi_id, Request $request)
    {
        $prodi = ProgramStudi::find($prodi_id);
        $prodi->gelar_lulusan = $request->gelar_lulusan;
        $prodi->kode_program_studi = $request->kode_program_studi;
        $prodi->program_studi = $request->program_studi;
        $prodi->save();
        return redirect('/backoffice/data-master/fakultas/' . $fakultas_id . '/jurusan/' . $jurusan_id . '/prodi')->with('success', 'Program studi telah diubah');
    }

    public function hapus($fakultas_id, $jurusan_id, $prodi_id)
    {
        $prodi = ProgramStudi::find($prodi_id);
        $prodi->delete();
        return redirect('/backoffice/data-master/fakultas/' . $fakultas_id . '/jurusan/' . $jurusan_id . '/prodi')->with('success', 'Program studi ' . $prodi->prodi . ' dihapus');
    }
}
