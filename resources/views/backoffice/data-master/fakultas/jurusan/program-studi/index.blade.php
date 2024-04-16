@extends('backoffice.layout.main')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Program Studi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/dashboard">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="/backoffice/data-master/fakultas/{{ $fakultas->id }}/jurusan">Jurusan</a></li>
                    <li class="breadcrumb-item active">Program Studi</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">

    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card card-outline card-primary">
                <div class="card-header">
                    <div class="d-flex justify-between">
                        <div class="fakultas mr-4">
                            <h5>
                                Fakultas: <b>{{ $fakultas->fakultas }}</b>
                            </h5>
                        </div>
                        <div class="jurusan mr-4">
                            <h5>
                                Jurusan: <b>{{ $jurusan->jurusan }}</b>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Default box -->
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Data</h3>

                    <div class="card-tools">
                        <a href="/backoffice/data-master/fakultas/{{ $fakultas->id }}/jurusan/{{ $jurusan->id }}/prodi/tambah" class="btn btn-success btn-sm" title="Tambah Jurusan">
                            <i class="fas fa-plus"></i> Tambah
                        </a>

                        <button type="button" class="btn btn-outline-secondary btn-sm" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
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
                                <th>Gelar Lulusan</th>
                                <th>Kode Program Studi</th>
                                <th>Nama Program Studi</th>
                                {{-- <th>Mata Kuliah</th> --}}
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($prodi as $key => $data)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $data->gelar_lulusan }}</td>
                                    <td>{{ $data->kode_program_studi }}</td>
                                    <td>{{ $data->program_studi }}</td>
                                    {{-- <td>
                                        <a href="/backoffice/data-master/fakultas/{{ $fakultas->id }}/jurusan/{{ $jurusan->id }}/prodi/{{ $data->id }}/matkul">
                                            <button class="badge badge-light">
                                                <i class="fas fa-eye"></i> {{ $data->matkul->count() }} Data Lihat
                                            </button>
                                        </a>
                                    </td> --}}
                                    <td>
                                        <a href="/backoffice/data-master/fakultas/{{ $fakultas->id }}/jurusan/{{ $jurusan->id }}/prodi/{{ $data->id }}/ubah" class="btn btn-warning btn-sm" title="Ubah">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus-{{ $jurusan->id }}" title="Hapus">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- modal --}}
                    {{-- @foreach ($jurusans as $jurusan)
                        @include('backoffice.data-master.fakultas.jurusan.modal.hapus')
                    @endforeach --}}
                </div>

            </div>

        </div>
    </div>

</section>

@endsection
