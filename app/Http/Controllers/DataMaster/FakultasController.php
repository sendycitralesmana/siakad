<?php

namespace App\Http\Controllers\DataMaster;

use Illuminate\Http\Request;
use App\Models\DataMaster\Fakultas;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FakultasController extends Controller
{
    public function fakultas(Request $request)
    {
        $data = Fakultas::query();
        $allFakultas = Fakultas::get();
        $cariFakultas = $request->cariFakultas;
        $hasilPencarian = Fakultas::where('id', $cariFakultas)->first();

        if ($cariFakultas) {
            $data = $data->where('id', $cariFakultas);
        }

        $fakultas = $data->get();

        return view('backoffice.data-master.fakultas.index', compact('fakultas', 'allFakultas', 'cariFakultas', 'hasilPencarian'));
    }

    public function tambah()
    {
        return view('backoffice.data-master.fakultas.tambah');
    }

    public function tambahAksi(Request $request)
    {
        $request->validate([
            'fakultas' => 'required',
        ], [
            'fakultas.required' => 'Fakultas harus diisi',
        ]);

        $thumbnail = null;
        if($request->file('thumbnail')) {
            $fileNameThumbnail = $request->file('thumbnail')->getClientOriginalExtension();
            $thumbnail = 'th-' . now()->timestamp . '.' . $fileNameThumbnail;
            $request->file('thumbnail')->storeAs('public/images/fakultas', str_replace(' ', '_', $thumbnail));
        }

        $fakultas = new Fakultas();
        $fakultas->fakultas = $request->fakultas;
        $fakultas->thumbnail = $thumbnail;
        $fakultas->save();

        return redirect('/backoffice/data-master/fakultas')->with('success', 'Fakultas ' . $fakultas->fakultas . ' ditambahkan');
    }

    public function ubah($id)
    {
        $fakultas = Fakultas::find($id);
        return view('backoffice.data-master.fakultas.ubah', compact('fakultas'));
    }

    public function ubahAksi(Request $request, $id)
    {
        $request->validate([
            'fakultas' => 'required',
        ], [
            'fakultas.required' => 'Fakultas harus diisi',
        ]);

        
        $fakultas = Fakultas::find($id);
        $fakultas->fakultas = $request->fakultas;
        // cek jika $request->thumbnail ada maka hapus gambar sebelumnya kemudian ganti
        if($request->file('thumbnail')) {
            Storage::delete('public/images/fakultas/' . $fakultas->thumbnail);
            $fileNameThumbnail = $request->file('thumbnail')->getClientOriginalExtension();
            $thumbnail = 'th-' . now()->timestamp . '.' . $fileNameThumbnail;
            $request->file('thumbnail')->storeAs('public/images/fakultas', str_replace(' ', '_', $thumbnail));
            $fakultas->thumbnail = $thumbnail;
        }
        $fakultas->save();

        return redirect('/backoffice/data-master/fakultas')->with('success', 'Fakultas telah diubah');
    }

    public function hapus($id)
    {
        $fakultas = Fakultas::find($id);
        $fakultas->delete();
        return redirect('/backoffice/data-master/fakultas')->with('success', 'Fakultas ' . $fakultas->fakultas . ' dihapus');
    }
}
