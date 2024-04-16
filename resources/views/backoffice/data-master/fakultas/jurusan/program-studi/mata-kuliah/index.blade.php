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
                    <li class="breadcrumb-item"><a href="/backoffice/data-master/fakultas/{{ $fakultas->id }}/jurusan/{{ $jurusan->id }}/prodi">Program Studi</a></li>
                    <li class="breadcrumb-item active">Mata Kuliah</li>
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
                        <div class="prodi">
                            <h5>
                                Program Studi: <b>{{ $prodi->program_studi }}</b>
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

                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
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
                                <th>Kode Mata Kuliah</th>
                                <th>Mata Kuliah</th>
                                <th>Jumlah SKS</th>
                                <th>Semester Wajib</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($matkuls as $key => $matkul)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <button type="button" class="badge badge-light pl-2 pr-2" data-toggle="modal" data-target="#dosen-{{ $matkul->dosenMatkul->user->id }}" title="Lihat detail">
                                            <i class="fa fa-eye"></i> {{ $matkul->dosenMatkul->user->nidn }}
                                        </button>
                                    </td>
                                    <td>{{ $matkul->dosenMatkul->matkul->kode_mata_kuliah }}</td>
                                    <td>{{ $matkul->dosenMatkul->matkul->mata_kuliah }}</td>
                                    <td>{{ $matkul->dosenMatkul->matkul->jumlah_sks }}</td>
                                    <td>
                                        @if ($matkul->semester_wajib == null)
                                            -
                                        @else
                                            Semester {{ $matkul->dosenMatkul->matkul->semester_wajib }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/backoffice/data-master/fakultas/{{ $fakultas->id }}/jurusan/{{ $jurusan->id }}/ubah" class="btn btn-warning btn-sm" title="Ubah">
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
                    @foreach ($matkuls as $matkul)
                        @include('backoffice.data-master.fakultas.jurusan.program-studi.mata-kuliah.modal.hapus')
                        @include('backoffice.data-master.fakultas.jurusan.program-studi.mata-kuliah.modal.dosen')
                    @endforeach
                </div>

            </div>

        </div>
    </div>

</section>

@endsection
