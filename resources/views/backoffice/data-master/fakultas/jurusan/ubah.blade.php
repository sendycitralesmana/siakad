@extends('backoffice.layout.main')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Ubah Jurusan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/dashboard">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="/backoffice/data-master/fakultas/{{ $fakultas->id }}/jurusan">Jurusan</a></li>
                    <li class="breadcrumb-item active">Ubah Jurusan</li>
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

    <div class="row justify-content-center">
        <div class="col-md-6">

            <!-- Default box -->
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Form Ubah Jurusan</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>

                </div>
                <div class="card-body">
                    <form action="/backoffice/data-master/fakultas/{{ $fakultas->id }}/jurusan/{{ $jurusan->id }}/ubah" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="kode_jurusan">Kode Jurusan <span class="text-danger">*</span></label>
                            <input type="text" name="kode_jurusan" id="kode_jurusan" class="form-control @if ($errors->has('kode_jurusan')) is-invalid @endif" value="{{ $jurusan->kode_jurusan ?? old('kode_jurusan') }}">
                            @if ($errors->has('kode_jurusan'))
                                <small class="text-danger">{{ $errors->first('kode_jurusan') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Nama Jurusan <span class="text-danger">*</span></label>
                            <input type="text" name="jurusan" id="jurusan" class="form-control @if ($errors->has('jurusan')) is-invalid @endif" value="{{ $jurusan->jurusan ?? old('jurusan') }}">
                            @if ($errors->has('jurusan'))
                                <small class="text-danger">{{ $errors->first('jurusan') }}</small>
                            @endif
                        </div>
                        <div class=" text-center">
                            <a href="/backoffice/data-master/fakultas/{{ $fakultas->id }}/jurusan" class="btn btn-default" title="Kembali">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                            <button type="submit" class="btn btn-warning" style="width: 50%"> 
                                <i class="fas fa-edit"></i> Ubah Jurusan
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
    </div>

</section>


@endsection
