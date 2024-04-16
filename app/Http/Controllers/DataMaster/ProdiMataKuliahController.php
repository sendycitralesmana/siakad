<?php

namespace App\Http\Controllers\DataMaster;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DataMaster\DosenMataKuliah;
use App\Models\DataMaster\ProdiMataKuliah;
use App\Models\DataMaster\Fakultas\Jurusan\ProgramStudi;

class ProdiMataKuliahController extends Controller
{
    public function prodiMatkul(Request $request)
    {

        $cariProdi = $request->cariProdi;
        $prodiMatkuls = ProdiMataKuliah::get();
        $allProdis = ProgramStudi::get();
        $queryPrody = ProgramStudi::query();

        if ($cariProdi) {
            $queryPrody = $queryPrody->where('program_studi', 'like', '%' . $cariProdi . '%');
        }

        $prodis = $queryPrody->paginate(12);

        return view('backoffice.data-master.prodi-mata-kuliah.index', compact('prodiMatkuls', 'prodis', 'allProdis', 'cariProdi'));
    }

    // public function tambah()
    // {
    //     $prodis = ProgramStudi::get();
    //     $dosenMatkuls = DosenMataKuliah::get();
    //     return view('backoffice.data-master.prodi-mata-kuliah.tambah', compact('dosenMatkuls', 'prodis'));
    // }

    // public function tambahAksi(Request $request)
    // {
    //     $request->validate([
    //         'program_studi' => 'required',
    //         'mata_kuliah' => 'required',
    //     ], [
    //         'program_studi.required' => 'Program studi wajib dipilih',
    //         'mata_kuliah.required' => 'Mata kuliah wajib dipilih',
    //     ]);

    //     // cek jika program studi mengambil dosen mata kuliah yang sama
    //     if (ProdiMataKuliah::where('program_studi_id', $request->program_studi)
    //         ->where('dosen_mata_kuliah_id', $request->mata_kuliah)
    //         ->exists()) {
    //         return redirect('/backoffice/data-master/prodi-matkul/tambah')->with('gagal', 'Mata kuliah ' . DosenMataKuliah::find($request->mata_kuliah)->matkul->mata_kuliah . ' sudah ada di program studi ' . ProgramStudi::find($request->program_studi)->program_studi);
    //     }
        
    //     $prodiMatkul = new ProdiMataKuliah();
    //     $prodiMatkul->dosen_mata_kuliah_id = $request->mata_kuliah;
    //     $prodiMatkul->program_studi_id = $request->program_studi;
    //     $prodiMatkul->semester_wajib = $request->semester_wajib;
    //     $prodiMatkul->save();

    //     return redirect('/backoffice/data-master/prodi-matkul')->with('success', 'Program Studi Mata kuliah telah ditambahkan');
    // }

    public function umum()
    {
        $prodiMatkuls = ProdiMataKuliah::where('program_studi_id', null)->get();
        return view('backoffice.data-master.prodi-mata-kuliah.umum', compact('prodiMatkuls'));
    }

    public function umumTambah()
    {
        $dosenMatkuls = DosenMataKuliah::get();
        return view('backoffice.data-master.prodi-mata-kuliah.umum-tambah', compact('dosenMatkuls'));
    }

    public function umumTambahAksi(Request $request)
    {
        $request->validate([
            'mata_kuliah' => 'required',
        ], [
            'mata_kuliah.required' => 'Mata kuliah wajib dipilih',
        ]);
        
        $prodiMatkul = new ProdiMataKuliah();
        $prodiMatkul->dosen_mata_kuliah_id = $request->mata_kuliah;
        $prodiMatkul->semester_wajib = $request->semester_wajib;
        $prodiMatkul->save();

        return redirect('/backoffice/data-master/prodi-matkul/umum')->with('success', 'Program Studi Mata kuliah telah ditambahkan');
    }

    public function umumUbahSemester($id)
    {
        $prodiMatkul = ProdiMataKuliah::find($id);
        $prodis = ProgramStudi::get();
        $dosenMatkuls = DosenMataKuliah::get();
        return view('backoffice.data-master.prodi-mata-kuliah.umum-ubah-s', compact('prodiMatkul', 'dosenMatkuls', 'prodis'));
    }

    public function umumUbahSemesterAksi(Request $request, $id)
    {   
        $prodiMatkul = ProdiMataKuliah::find($id);
        $prodiMatkul->semester_wajib = $request->semester_wajib;
        $prodiMatkul->save();

        return redirect('/backoffice/data-master/prodi-matkul/umum/')->with('success', 'Semester Wajib Mata kuliah telah diubah');
    }

    public function prodi($prodi_id)
    {
        $prodi = ProgramStudi::find($prodi_id);
        $prodiMatkuls = ProdiMataKuliah::where('program_studi_id', $prodi_id)->get();
        return view('backoffice.data-master.prodi-mata-kuliah.prodi', compact('prodiMatkuls', 'prodi'));
    }

    public function prodiTambah($prodi_id)
    {
        $dosenMatkuls = DosenMataKuliah::get();
        $prodi = ProgramStudi::find($prodi_id);
        return view('backoffice.data-master.prodi-mata-kuliah.prodi-tambah', compact('dosenMatkuls', 'prodi'));
    }

    public function prodiTambahAksi(Request $request, $prodi_id)
    {
        $request->validate([
            'mata_kuliah' => 'required',
        ], [
            'mata_kuliah.required' => 'Mata kuliah wajib dipilih',
        ]);
        
        $prodiMatkul = new ProdiMataKuliah();
        $prodiMatkul->program_studi_id = $prodi_id;
        $prodiMatkul->dosen_mata_kuliah_id = $request->mata_kuliah;
        $prodiMatkul->semester_wajib = $request->semester_wajib;
        $prodiMatkul->save();

        return redirect('/backoffice/data-master/prodi-matkul/prodi/' . $prodi_id)->with('success', 'Program Studi Mata kuliah telah ditambahkan');
    }

    public function prodiUbahSemester($id, $prodi_id)
    {
        $prodiMatkul = ProdiMataKuliah::find($id);
        $prodis = ProgramStudi::get();
        $dosenMatkuls = DosenMataKuliah::get();
        return view('backoffice.data-master.prodi-mata-kuliah.ubah-semester', compact('prodiMatkul', 'dosenMatkuls', 'prodis', 'prodi_id'));
    }

    public function prodiUbahSemesterAksi(Request $request, $id, $prodi_id)
    {   
        $prodiMatkul = ProdiMataKuliah::find($id);
        $prodiMatkul->semester_wajib = $request->semester_wajib;
        $prodiMatkul->save();

        return redirect('/backoffice/data-master/prodi-matkul/prodi/' . $prodi_id)->with('success', 'Semester Wajib Mata kuliah telah diubah');
    }

    public function ubah($id)
    {
        $prodiMatkul = ProdiMataKuliah::find($id);
        $prodis = ProgramStudi::get();
        $dosenMatkuls = DosenMataKuliah::get();
        return view('backoffice.data-master.prodi-mata-kuliah.ubah', compact('prodiMatkul', 'dosenMatkuls', 'prodis'));
    }

    public function ubahAksi(Request $request, $id)
    {
        $request->validate([
            'program_studi' => 'required',
            'mata_kuliah' => 'required',
        ], [
            'program_studi.required' => 'Program studi wajib dipilih',
            'mata_kuliah.required' => 'Mata kuliah wajib dipilih',
        ]);

        // cek jika program studi mengambil dosen mata kuliah yang sama
        // if (ProdiMataKuliah::where('program_studi_id', $request->program_studi)
        //     ->where('dosen_mata_kuliah_id', $request->mata_kuliah)
        //     ->exists()) {
        //     return redirect('/backoffice/data-master/prodi-matkul/' . $id . '/ubah')->with('gagal', 'Mata kuliah ' . DosenMataKuliah::find($request->mata_kuliah)->matkul->mata_kuliah . ' sudah ada di program studi ' . ProgramStudi::find($request->program_studi)->program_studi);
        // }
        
        $prodiMatkul = ProdiMataKuliah::find($id);
        $prodiMatkul->dosen_mata_kuliah_id = $request->mata_kuliah;
        $prodiMatkul->program_studi_id = $request->program_studi;
        $prodiMatkul->semester_wajib = $request->semester_wajib;
        $prodiMatkul->save();

        return redirect('/backoffice/data-master/prodi-matkul')->with('success', 'Program Studi Mata kuliah telah diubah');
    }
}
