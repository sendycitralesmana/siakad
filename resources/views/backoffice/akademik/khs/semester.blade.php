@extends('backoffice.layout.main')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Kartu Hasil Studi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/dashboard">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="/backoffice/akademik/khs">Kartu Hasil Studi</a></li>
                    <li class="breadcrumb-item active">Semester {{ $semester }}</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">

    <div class="row justify-content-center">
        <div class="col-md-12">

            <!-- Default box -->
            <div class="card card-outline card-primary">
                <div class="card-header">

                    <div class="d-flex justify-content-between">
                        <div class="data row">
                            <h5 class="mr-4">Semester: <b>{{ $semester }}</b></>
                            <h5 class="mr-4">
                                Tahun Akademik: <b>{{ $tahunAkademik->tahun_akademik }} / {{ $tahunAkademik->semester }}</b>
                            </h5>
                            <h5 class="mr-4">Total SKS: <b>{{ $totalSks }}</b></h5>
                            <h5>Total IP: <b>{{ $totalNilai }}</b></h5>
                        </div>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                </div>
                <div class="card-body">

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Berhasil </strong>{{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <table class="table table-bordered table-hover text-center" id="example1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NIDN Dosen</th>
                                <th>Kode Mata Kuliah</th>
                                <th>Mata Kuliah</th>
                                <th>Jumlah SKS</th>
                                <th>Nilai</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($khs as $key => $data)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <button type="button" class="badge badge-light pl-2 pr-2" data-toggle="modal" data-target="#dosen-{{ $data->prodiMatkul->dosenMatkul->user->id }}" title="Lihat detail">
                                            <i class="fa fa-eye"></i> {{ $data->prodiMatkul->dosenMatkul->user->nidn }}
                                        </button>
                                    </td>
                                    <td>{{ $data->prodiMatkul->dosenMatkul->matkul->kode_mata_kuliah }}</td>
                                    <td>{{ $data->prodiMatkul->dosenMatkul->matkul->mata_kuliah }}</td>
                                    <td>{{ $data->prodiMatkul->dosenMatkul->matkul->jumlah_sks }}</td>
                                    <td>{{ $data->nilai }}</td>
                                    <td>
                                        {{-- {{ $data->nilai }} --}}
                                        @if ($data->nilai == 4)
                                            A
                                        @elseif ($data->nilai == 3)
                                            B
                                        @elseif ($data->nilai == 2)
                                            C
                                        @elseif ($data->nilai == 1)
                                            D
                                        @elseif ($data->nilai === 0)
                                            E
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- modal --}}
                    @foreach ($khs as $data)
                        @include('backoffice.akademik.khs.modal.hapus')
                        @include('backoffice.akademik.khs.modal.dosen')
                    @endforeach
                </div>

            </div>

        </div>
    </div>

</section>

@endsection
