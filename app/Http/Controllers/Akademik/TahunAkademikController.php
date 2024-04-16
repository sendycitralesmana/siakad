<?php

namespace App\Http\Controllers\Akademik;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Akademik\TahunAkademik;

class TahunAkademikController extends Controller
{
    public function tahunAkademik()
    {
        $tahunAkademiks = TahunAkademik::get();
        return view('backoffice.akademik.tahun-akademik.index', compact('tahunAkademiks'));
    }

    public function tambah()
    {
        $tahunAkademiks = TahunAkademik::get();
        return view('backoffice.akademik.tahun-akademik.tambah', compact('tahunAkademiks'));
    }

    public function tambahAksi(Request $request)
    {
        $request->validate([
            'tahun_akademik' => 'required',
            'semester' => 'required',
        ], [
            'tahun_akademik.required' => 'Tahun Akademik harus diisi',
            'semester.required' => 'Semester harus diisi',
        ]);

        $tahunAkademik = new TahunAkademik();
        $tahunAkademik->tahun_akademik = $request->tahun_akademik;
        $tahunAkademik->semester = $request->semester;
        $tahunAkademik->save();
        return redirect('/backoffice/akademik/tahun-akademik')->with('success', 'Tahun Akademik ' . $request->tahun_akademik . ' ' . ' semester ' . $request->semester . ' ditambahkan');
    }

    public function ubah($id)
    {
        $tahunAkademik = TahunAkademik::find($id);
        return view('backoffice.akademik.tahun-akademik.ubah', compact('tahunAkademik'));
    }

    public function ubahAksi(Request $request, $id)
    {
        $request->validate([
            'tahun_akademik' => 'required',
            'semester' => 'required',
        ], [
            'tahun_akademik.required' => 'Tahun Akademik harus diisi',
            'semester.required' => 'Semester harus diisi',
        ]);

        $tahunAkademik = TahunAkademik::find($id);
        $tahunAkademik->tahun_akademik = $request->tahun_akademik;
        $tahunAkademik->semester = $request->semester;
        $tahunAkademik->save();
        return redirect('/backoffice/akademik/tahun-akademik')->with('success', 'Tahun Akademik telah diubah');
    }

}
