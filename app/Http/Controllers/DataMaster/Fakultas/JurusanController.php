<?php

namespace App\Http\Controllers\DataMaster\Fakultas;

use Illuminate\Http\Request;
use App\Models\DataMaster\Fakultas;
use App\Http\Controllers\Controller;
use App\Models\DataMaster\Fakultas\Jurusan;

class JurusanController extends Controller
{
    public function jurusan (Request $request, $fakultas_id)
    {
        $cariJurusan = request('cariJurusan');
        $fakultas = Fakultas::find($fakultas_id);
        // $jurusans = Jurusan::where('fakultas_id', $fakultas_id)->get();

        $qjurusan = Jurusan::where('fakultas_id', $fakultas_id);
        if ($cariJurusan != null) {
            $qjurusan = $qjurusan->where('jurusan', 'like', '%' . $cariJurusan . '%');
        }
        $jurusans = $qjurusan->paginate(12);

        return view('backoffice.data-master.fakultas.jurusan.index', compact('jurusans', 'fakultas', 'cariJurusan')); 
    }

    public function tambah ($fakultas_id)
    {
        $fakultas = Fakultas::find($fakultas_id);
        return view('backoffice.data-master.fakultas.jurusan.tambah', compact('fakultas'));
    }

    public function tambahAksi (Request $request, $fakultas_id)
    {
        $request->validate([
            'kode_jurusan' => 'required|unique:jurusan,kode_jurusan',
            'jurusan' => 'required',
        ], [
            'kode_jurusan.required' => 'Kode jurusan harus diisi',
            'kode_jurusan.unique' => 'Kode jurusan sudah terdaftar',
            'jurusan.required' => 'Jurusan harus diisi',
        ]);

        $jurusan = new Jurusan();
        $jurusan->fakultas_id = $fakultas_id;
        $jurusan->kode_jurusan = request('kode_jurusan');
        $jurusan->jurusan = request('jurusan');
        $jurusan->save();
        return redirect('/backoffice/data-master/fakultas/' . $fakultas_id . '/jurusan/')->with('success', 'Jurusan ' . $jurusan->jurusan . ' telah ditambahkan');
    }

    public function ubah ($fakultas_id, $id)
    {
        $jurusan = Jurusan::find($id);
        $fakultas = Fakultas::find($fakultas_id);
        return view('backoffice.data-master.fakultas.jurusan.ubah', compact('jurusan', 'fakultas'));
    }

    public function ubahAksi ($fakultas_id, $id)
    {
        $jurusan = Jurusan::find($id);
        $jurusan->kode_jurusan = request('kode_jurusan');
        $jurusan->jurusan = request('jurusan');
        $jurusan->save();
        return redirect('/backoffice/data-master/fakultas/' . $fakultas_id . '/jurusan/')->with('success', 'Jurusan telah diubah');
    }

    public function hapus ($fakultas_id, $id)
    {
        $jurusan = Jurusan::find($id);
        $jurusan->delete();
        return redirect('/backoffice/data-master/fakultas/' . $fakultas_id . '/jurusan/')->with('success', 'Jurusan ' . $jurusan->jurusan . ' telah dihapus');
    }
}
