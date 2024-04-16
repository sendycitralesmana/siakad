@extends('backoffice.layout.main')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Mata Kuliah {{ $prodi->program_studi }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/dashboard">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="/backoffice/data-master/prodi-matkul">Prodi Mata Kuliah</a></li>
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
                        <a href="/backoffice/data-master/prodi-matkul/prodi/{{ $prodi->id }}/tambah" class="btn btn-success btn-sm" title="Tambah Prodi Mata Kuliah">
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
                                <th>NIDN Dosen</th>
                                <th>Mata Kuliah</th>
                                <th>Jumlah SKS</th>
                                <th>Semester Wajib</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($prodiMatkuls as $key => $prodiMatkul)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <button type="button" class="badge badge-light pl-2 pr-2" data-toggle="modal" data-target="#dosen-{{ $prodiMatkul->dosenMatkul->user->id }}" title="Lihat detail">
                                            <i class="fa fa-eye"></i> {{ $prodiMatkul->dosenMatkul->user->nidn }}
                                        </button>
                                    </td>
                                    <td>{{ $prodiMatkul->dosenMatkul->matkul->mata_kuliah }}</td>
                                    <td>{{ $prodiMatkul->dosenMatkul->matkul->jumlah_sks }}</td>
                                    <td>
                                        @if ($prodiMatkul->semester_wajib == null)
                                            -
                                        @else
                                            {{ $prodiMatkul->semester_wajib }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/backoffice/data-master/prodi-matkul/{{ $prodiMatkul->id }}/prodi/{{ $prodi->id }}/ubah-semester" class="btn btn-warning btn-sm" title="Ubah">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus-{{ $prodiMatkul->id }}" title="Hapus">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- modal --}}
                    @foreach ($prodiMatkuls as $prodiMatkul)
                        @include('backoffice.data-master.prodi-mata-kuliah.modal.hapus')
                        @include('backoffice.data-master.prodi-mata-kuliah.modal.dosen')
                    @endforeach
                </div>

            </div>

        </div>
    </div>

</section>

@endsection
