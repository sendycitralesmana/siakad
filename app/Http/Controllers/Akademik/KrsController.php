<?php

namespace App\Http\Controllers\Akademik;

use App\Models\Akademik\Krs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DataMaster\ProdiMataKuliah;
// use App\Models\Akademik\ProdiMataKuliah;

class KrsController extends Controller
{
    public function krs()
    {
        $krs = Krs::where('user_id', auth()->user()->id)->get();

        // total sks semester 1
        // $totalSks = $krs->where('semester', 1)->sum('prodiMatkul.dosenMatkul.matkul.jumlah_sks');
        // dd($totalSks);

        return view('backoffice.akademik.krs.index', compact('krs'));
    }

    public function tambah($semester)
    {
        $prodiMatkuls = ProdiMataKuliah::where('program_studi_id', auth()->user()->program_studi_id)
                                        ->orWhere('program_studi_id', null)->get();
        $semester = $semester;
        return view('backoffice.akademik.krs.tambah', compact('prodiMatkuls', 'semester'));
    }

    public function tambahAksi(Request $request, $semester)
    {
        $request->validate([
            'mata_kuliah' => 'required',
        ], [
            'mata_kuliah.required' => 'Mata kuliah harus dipilih',
        ]);

        $prodiMatkul = ProdiMataKuliah::find($request->mata_kuliah);

        // cek jika mata kuliah id sudah ada dengan semester dan user login yang sama
        if (Krs::where('prodi_mata_kuliah_id', $request->mata_kuliah)
            ->where('user_id', auth()->user()->id)
            ->where('semester', auth()->user()->semester)
            ->exists()) {
            return redirect('/backoffice/akademik/krs/semester/' . $semester . '/tambah')->with('gagal', 'Mata kuliah ' . $prodiMatkul->mata_kuliah . ' sudah ada di semester' . auth()->user()->semester);
        }

        $krs = new Krs();
        $krs->user_id = auth()->user()->id;
        $krs->dosen_id = $prodiMatkul->dosenMatkul->user->id;
        $krs->prodi_mata_kuliah_id = $request->mata_kuliah;
        $krs->tahun_akademik_id = auth()->user()->tahun_akademik_id;
        $krs->semester = auth()->user()->semester;
        $krs->save();
        return redirect('/backoffice/akademik/krs/semester/' . $semester)->with('success', 'Mata kuliah semester ' . auth()->user()->semester . ' telah ditambahkan');
    }

    public function semester($semester)
    {
        $krs = Krs::where('user_id', auth()->user()->id)->where('semester', $semester)->get();
        if ($krs->count() != 0) {
            $tahunAkademik = $krs->first()->tahunAkademik;
        } else {
            $tahunAkademik = auth()->user()->tahunAkademik;
        }
        $totalSks = $krs->where('semester', $semester)->sum('prodiMatkul.dosenMatkul.matkul.jumlah_sks');
        $semester = $semester;
        return view('backoffice.akademik.krs.semester', compact('krs', 'semester', 'tahunAkademik', 'totalSks'));
    }

    public function hapus($id, $semester)
    {
        $krs = Krs::find($id);
        $krs->delete();
        return redirect('/backoffice/akademik/krs/semester/' . $semester)->with('success', 'Mata kuliah semester ' . $semester . ' telah dihapus');
    }
}
