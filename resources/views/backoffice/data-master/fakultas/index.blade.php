@extends('backoffice.layout.main')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Fakultas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/dashboard">Beranda</a></li>
                    <li class="breadcrumb-item active">Fakultas</li>
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
                        <form class="form-inline" method="GET">
                            @csrf
                            <h5>
                                <span class="badge">
                                    <i class="fas fa-list"></i> {{ $fakultas->count() }} Data
                                </span>
                            </h5>
                            <div class="form-group mx-sm-3">
                                {{-- <input type="text" class="form-control" style="width: 300px;" id="fakultas"
                                    placeholder="Nama Fakultas" name="fakultas"> --}}
                                <select name="cariFakultas" class="form-control select2" id="">
                                    <option value="">-- Pilih Fakultas --</option>
                                    @foreach ($allFakultas as $dataFakultas)
                                        <option value="{{ $dataFakultas->id }}" {{ old('cariProdi') == $dataFakultas->id ? 'selected' : '' }}>{{ $dataFakultas->fakultas }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success mr-1">
                                <i class="fas fa-search"></i> Cari
                            </button>
                            @if ($cariFakultas)
                                <a href="/backoffice/data-master/fakultas" class="btn btn-primary">
                                    <i class="fas fa-redo"></i> Tampilkan Semua
                                </a>
                            @endif
                        </form>

                        <div class="card-tools m-2">
                            <a href="/backoffice/data-master/fakultas/tambah" class="btn btn-success btn-sm m-1"
                                title="Tambah Fakultas">
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

            @if ($cariFakultas)
                <div class="cari-fakultas text-center">
                    <h4>
                       Hasil Pencarian Fakultas dari :  <b>{{$hasilPencarian->fakultas}}</b>
                    </h4>
                </div>
            @endif

            @if ($fakultas->count() == 0)
                <div class="text-center">
                    <h4>
                        <b>-- Data Fakultas Tidak Ada --</b>
                    </h4>
                </div>
            @endif

            <div class="row">
                @foreach ($fakultas as $data)
                <div class="col-md-3">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <b>{{$data->fakultas}}</b>
                            </h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="thumbnail mb-2">
                                <img src="{{asset('storage/images/fakultas/'.$data->thumbnail)}}" alt=""
                                    class="img-fluid rounded" style="height: 200px; width: 100%">
                            </div>
                            <div class="jurusan d-flex justify-content-between">
                                <span>
                                    <i class="fas fa-list"></i> {{$data->jurusan->count()}} Jurusan
                                </span>
                                <a href="/backoffice/data-master/fakultas/{{$data->id}}/jurusan" title="Lihat">
                                    <button class="badge badge-light">
                                        Detail <i class="fas fa-arrow-right"></i> 
                                    </button>
                                </a>
                            </div>
                            {{-- <hr>
                            <div class="prodi d-flex justify-content-between">
                                <span>
                                    <i class="fas fa-graduation-cap"></i> Program Studi
                                </span>
                                <a href="/backoffice/data-master/fakultas/prodi" class="btn btn-primary btn-sm" title="Lihat">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div> --}}
                            <hr>
                            <div class="aksi d-flex justify-content-center">
                                <a href="/backoffice/data-master/fakultas/{{$data->id}}/ubah" class="btn btn-warning btn-sm mr-1" title="Ubah Fakultas">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>

</section>

@endsection
