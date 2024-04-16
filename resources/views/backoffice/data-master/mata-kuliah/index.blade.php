@extends('backoffice.layout.main')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Mata Kuliah</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/dashboard">Beranda</a></li>
                    <li class="breadcrumb-item active">Mata Kuliah</li>
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
                    <h3 class="card-title">Data</h3>

                    <div class="card-tools">
                        <a href="/backoffice/data-master/matkul/tambah" class="btn btn-success btn-sm" title="Tambah Mata Kuliah">
                            <i class="fas fa-plus"></i> Tambah
                        </a>

                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
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
                                <th>Kode Mata Kuliah</th>
                                <th>Mata Kuliah</th>
                                <th>Jumlah SKS</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($matkuls as $key => $matkul)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $matkul->kode_mata_kuliah }}</td>
                                    <td>{{ $matkul->mata_kuliah }}</td>
                                    <td>{{ $matkul->jumlah_sks }}</td>
                                    <td>
                                        <a href="/backoffice/data-master/matkul/{{ $matkul->id }}/ubah" class="btn btn-warning btn-sm" title="Ubah">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus-{{ $matkul->id }}" title="Hapus">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- modal --}}
                    @foreach ($matkuls as $matkul)
                        @include('backoffice.data-master.mata-kuliah.modal.hapus')
                    @endforeach
                </div>

            </div>

        </div>
    </div>

</section>

@endsection
