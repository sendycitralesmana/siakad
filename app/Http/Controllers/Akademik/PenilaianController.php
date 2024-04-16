<?php

namespace App\Http\Controllers\Akademik;

use App\Models\Akademik\Krs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DataMaster\DosenMataKuliah;
use App\Models\DataMaster\MataKuliah;

class PenilaianController extends Controller
{
    public function penilaian(Request $request)
    {
        $queryMatkuls = DosenMataKuliah::where('user_id', auth()->user()->id);
        // dd($queryMatkuls->get());
        $dataMatkuls = DosenMataKuliah::where('user_id', auth()->user()->id)->get();
        // $queryMatkuls = Krs::where('dosen_id', auth()->user()->id);
        $cariMatkul = $request->cariMatkul;
        $hasilMatkul = MataKuliah::find($cariMatkul);
        
        if ( $cariMatkul ) {
            // $queryMatkuls = $queryMatkuls->where('prodiMatkul.dosenMatkul.mata_kuliah_id', $cariMatkul);
            $matkuls = $queryMatkuls->get()->where('mata_kuliah_id', $cariMatkul);
        } else {
            $matkuls = $queryMatkuls->paginate(8);
        }


        $penilaians = Krs::where('dosen_id', auth()->user()->id)->get();
        return view('backoffice.akademik.penilaian.index', compact('penilaians', 'matkuls', 'cariMatkul', 'dataMatkuls', 'hasilMatkul'));
    }

    public function matkul(Request $request, $matkul_id)
    {
        $cari = $request->cari;
        $queryPenilaians = Krs::where('dosen_id', auth()->user()->id);
        if ($cari) {
           $queryPenilaians = $queryPenilaians->where('semester', $cari);
        }
        $penilaians = $queryPenilaians->get()->where('prodiMatkul.dosenMatkul.mata_kuliah_id', $matkul_id);

        $matkul = DosenMataKuliah::where('user_id', auth()->user()->id)->where('mata_kuliah_id', $matkul_id)->first();
        // dd($penilaians);
        return view('backoffice.akademik.penilaian.matkul', compact('penilaians', 'cari', 'matkul'));
    }

    public function ubahNilai($id, $matkul_id)
    {
        $penilaian = Krs::find($id);
        return view('backoffice.akademik.penilaian.ubah-nilai', compact('penilaian', 'matkul_id'));
    }

    public function ubahNilaiAksi(Request $request, $id, $matkul_id)
    {
        $request->validate([
            'nilai' => 'required',
        ], [
            'nilai.required' => 'Nilai harus diisi',
        ]);

        $penilaian = Krs::find($id);
        $penilaians = Krs::where('user_id', $penilaian->user_id)->where('prodi_mata_kuliah_id', $penilaian->prodi_mata_kuliah_id)->get();
        // dd($penilaians);
        foreach ($penilaians as $penilaian) {
            $penilaian->nilai = $request->nilai;
            $penilaian->save();
        }
        
        $penilaian->nilai = $request->nilai;
        $penilaian->save();
        return redirect('/backoffice/akademik/penilaian/matkul/' . $matkul_id)->with('success', 'Nilai Mahasiswa dengan NIM ' . $penilaian->user->nim . ' telah diubah');
    }
}
