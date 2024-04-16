@extends('backoffice.layout.main')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Mata Kuliah</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/dashboard">Beranda</a></li>
                    <li class="breadcrumb-item active">Tambah Mata Kuliah</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">

    <div class="row justify-content-center">
        <div class="col-md-6">

            <!-- Default box -->
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Form Tambah Mata Kuliah</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>

                </div>
                <div class="card-body">
                    <form action="/backoffice/data-master/matkul/tambah" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="kode_mata_kuliah">Kode Mata Kuliah <span class="text-danger">*</span></label>
                            <input type="text" name="kode_mata_kuliah" id="kode_mata_kuliah" class="form-control @if ($errors->has('kode_mata_kuliah')) is-invalid @endif" value="{{ old('kode_mata_kuliah') }}">
                            @if ($errors->has('kode_mata_kuliah'))
                                <small class="text-danger">{{ $errors->first('kode_mata_kuliah') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="mata_kuliah">Mata Kuliah <span class="text-danger">*</span></label>
                            <input type="text" name="mata_kuliah" id="mata_kuliah" class="form-control @if ($errors->has('mata_kuliah')) is-invalid @endif" value="{{ old('mata_kuliah') }}">
                            @if ($errors->has('mata_kuliah'))
                                <small class="text-danger">{{ $errors->first('mata_kuliah') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="jumlah_sks">Jumlah SKS <span class="text-danger">*</span></label>
                            <input type="number" min="1" name="jumlah_sks" id="jumlah_sks" class="form-control @if ($errors->has('jumlah_sks')) is-invalid @endif" value="{{ old('jumlah_sks') }}">
                            @if ($errors->has('jumlah_sks'))
                                <small class="text-danger">{{ $errors->first('jumlah_sks') }}</small>
                            @endif
                        </div>
                        <div class=" text-center">
                            <a href="/backoffice/data-master/matkul" class="btn btn-default" title="Kembali">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                            <button type="submit" class="btn btn-success" style="width: 50%"> 
                                <i class="fas fa-plus"></i> Tambah Mata Kuliah
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
