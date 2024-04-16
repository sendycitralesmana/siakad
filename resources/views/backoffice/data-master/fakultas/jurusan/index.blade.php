@extends('backoffice.layout.main')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Jurusan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/dashboard">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="/backoffice/data-master/fakultas">Fakultas</a></li>
                    <li class="breadcrumb-item active">Jurusan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">

    <div class="card card-outline card-primary">
        <div class="card-header">
            <div class="d-flex justify-between">
                <div class="fakultas mr-4">
                    <h5>
                        Fakultas: <b>{{ $fakultas->fakultas }}</b>
                    </h5>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-outline card-primary">
        <div class="card-header">
            <div class="row justify-content-between">
                <form class="form-inline" method="GET">
                    @csrf
                    <h5>
                        <span class="badge">
                            <i class="fas fa-list"></i> {{ $jurusans->count() }} Data
                        </span>
                    </h5>
                    <div class="form-group mx-sm-3">
                        {{-- <input type="text" class="form-control {{ $errors->has('prodi') ? 'is-invalid' : '' }}" style="width: 300px;" id="fakultas"
                            placeholder="Program Studi" name="cariProdi"> --}}
                        <select name="cariJurusan" id="cariJurusan" class="form-control select2">
                            <option value="">-- Pilih Jurusan --</option>
                            @foreach ($jurusans as $jurusan)
                                <option value="{{ $jurusan->jurusan }}" {{ old('cariJurusan') == $jurusan->id ? 'selected' : '' }}>{{ $jurusan->jurusan }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('prodi'))
                            <small class="text-danger">{{ $errors->first('prodi') }}</small>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-success mr-1">
                        <i class="fas fa-search"></i> Cari
                    </button>
                    @if ($cariJurusan)
                        <a href="/backoffice/data-master/fakultas/{{ $fakultas->id }}/jurusan" class="btn btn-primary">
                            <i class="fas fa-redo"></i> Tampilkan Semua
                        </a>
                    @endif
                </form>

                <div class="mt-1 mb-1">
                    <a href="/backoffice/data-master/fakultas/{{ $fakultas->id }}/jurusan/tambah" class="btn btn-success" title="Tambah Jurusan">
                        <i class="fas fa-plus"></i> Tambah
                    </a>
                </div>
                
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil </strong>{{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if ($cariJurusan)
        <div class="cari-Jurusan-matkul text-center">
            <h4>
               Hasil Pencarian dari :  <b>{{$cariJurusan}}</b>
            </h4>
        </div>
    @endif

    @if ($jurusans->count() == 0)
        <div class="text-center">
            <h4>
                <b>-- Data Jurusan Tidak Ada --</b>
            </h4>
        </div>
    @endif

    <div class="row">
        @foreach ($jurusans as $jurusan)
        <div class="col-md-3">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        <b>{{$jurusan->jurusan}}</b>
                    </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="thumbnail mb-2 text-center">
                        <i class="fas fa-graduation-cap fa-7x"></i>
                    </div>
                    <hr>
                    <div >
                        Kode Jurusan : <b>{{$jurusan->kode_jurusan}}</b>
                        <div class="jurusan d-flex justify-content-between">
                            <span>
                                <i class="fas fa-list"></i> {{$jurusan->prodi->count()}} Program Studi
                            </span>
                            <a href="/backoffice/data-master/fakultas/{{ $fakultas->id }}/jurusan/{{ $jurusan->id }}/prodi" title="Lihat">
                                <button class="badge badge-light">
                                    Detail <i class="fas fa-arrow-right"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                    <hr>
                    <div class="aksi d-flex justify-content-center">
                        <a href="/backoffice/data-master/fakultas/{{ $fakultas->id }}/jurusan/{{ $jurusan->id }}/ubah" title="Ubah"
                            class="mr-1 btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus-{{ $jurusan->id }}" title="Hapus">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </div>
                
            </div>
        </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-md-12">
            {{ $jurusans->links('pagination::bootstrap-5') }}
        </div>
    </div>

    {{-- modal --}}
    @foreach ($jurusans as $jurusan)
        @include('backoffice.data-master.fakultas.jurusan.modal.hapus')
    @endforeach

    {{-- <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card card-outline card-primary">
                <div class="card-header">
                    <div class="d-flex justify-between">
                        <div class="fakultas mr-4">
                            <h5>
                                Fakultas: <b>{{ $fakultas->fakultas }}</b>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Data</h3>

                    <div class="card-tools">
                        <a href="/backoffice/data-master/fakultas/{{ $fakultas->id }}/jurusan/tambah" class="btn btn-success btn-sm" title="Tambah Jurusan">
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
                                <th>Kode Jurusan</th>
                                <th>Nama Jurusan</th>
                                <th>Program Studi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jurusans as $key => $jurusan)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $jurusan->kode_jurusan }}</td>
                                    <td>{{ $jurusan->jurusan }}</td>
                                    <td>
                                        <a href="/backoffice/data-master/fakultas/{{ $fakultas->id }}/jurusan/{{ $jurusan->id }}/prodi">
                                            <button class="badge badge-light">

                                                <i class="fas fa-eye"></i> {{ $jurusan->prodi->count() }} Data Lihat
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus-{{ $jurusan->id }}" title="Hapus">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @foreach ($jurusans as $jurusan)
                        @include('backoffice.data-master.fakultas.jurusan.modal.hapus')
                    @endforeach
                </div>

            </div>

        </div>
    </div> --}}

</section>

@endsection
