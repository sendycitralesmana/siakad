<?php

namespace App\Http\Controllers\Akademik;

use App\Http\Controllers\Controller;
use App\Models\Akademik\Krs;
use Illuminate\Http\Request;

class KhsController extends Controller
{
    public function khs()
    {
        $khs = Krs::where('user_id', auth()->user()->id)->get();
        return view('backoffice.akademik.khs.index', compact('khs'));
    }

    public function semester($semester)
    {
        $khs = Krs::where('user_id', auth()->user()->id)->where('semester', $semester)->get();
        if ($khs->count() != 0) {
            $tahunAkademik = $khs->first()->tahunAkademik;
        } else {
            $tahunAkademik = auth()->user()->tahunAkademik;
        }
        $totalSks = $khs->where('semester', $semester)->sum('prodiMatkul.dosenMatkul.matkul.jumlah_sks');
        $semester = $semester;
        // $totalNilai = $khs->where('semester', $semester)->sum('prodiMatkul.dosenMatkul.matkul.nilai');
        $totalNilai = $khs->where('semester', $semester)->sum('nilai') / $khs->where('semester', $semester)->count();
        return view('backoffice.akademik.khs.semester', compact('khs', 'semester', 'tahunAkademik', 'totalSks', 'totalNilai'));
    }
}
