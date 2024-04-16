@extends('backoffice.layout.main')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Program Studi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/dashboard">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="/backoffice/data-master/fakultas/{{ $fakultas->id }}/jurusan/{{ $jurusan->id }}/prodi">Program Studi</a></li>
                    <li class="breadcrumb-item active">Tambah Program Studi</li>
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
                <div class="jurusan mr-4">
                    <h5>
                        Jurusan: <b>{{ $jurusan->jurusan }}</b>
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
                    <h3 class="card-title">Form Tambah Program Jurusan</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>

                </div>
                <div class="card-body">
                    <form action="/backoffice/data-master/fakultas/{{ $fakultas->id }}/jurusan/{{ $jurusan->id }}/prodi/tambah" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="gelar_lulusan">Gelar Lulusan <span class="text-danger">*</span></label>
                            <input type="text" name="gelar_lulusan" id="gelar_lulusan" class="form-control @if ($errors->has('gelar_lulusan')) is-invalid @endif" value="{{ old('gelar_lulusan') }}">
                            @if ($errors->has('gelar_lulusan'))
                                <small class="text-danger">{{ $errors->first('gelar_lulusan') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="kode_program_studi">Kode Program Studi <span class="text-danger">*</span></label>
                            <input type="text" name="kode_program_studi" id="kode_program_studi" class="form-control @if ($errors->has('kode_program_studi')) is-invalid @endif" value="{{ old('kode_program_studi') }}">
                            @if ($errors->has('kode_program_studi'))
                                <small class="text-danger">{{ $errors->first('kode_program_studi') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="program_studi">Nama Program Studi <span class="text-danger">*</span></label>
                            <input type="text" name="program_studi" id="program_studi" class="form-control @if ($errors->has('program_studi')) is-invalid @endif" value="{{ old('program_studi') }}">
                            @if ($errors->has('program_studi'))
                                <small class="text-danger">{{ $errors->first('program_studi') }}</small>
                            @endif
                        </div>
                        <div class=" text-center">
                            <a href="/backoffice/data-master/fakultas/{{ $fakultas->id }}/jurusan/{{ $jurusan->id }}/prodi" class="btn btn-default" title="Kembali">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                            <button type="submit" class="btn btn-success" style="width: 50%"> 
                                <i class="fas fa-plus"></i> Tambah Program Studi
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
