@extends('backoffice.layout.main')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Dosen Mata Kuliah</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/dashboard">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="/backoffice/data-master/dosen-matkul">Dosen Mata Kuliah</a></li>
                    <li class="breadcrumb-item active">Tambah Dosen Mata Kuliah</li>
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
                    <h3 class="card-title">Form Tambah Dosen Mata Kuliah</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>

                </div>
                <div class="card-body">

                    @if(session('gagal'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Gagal </strong>{{ session('gagal') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <form action="/backoffice/data-master/dosen-matkul/tambah" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="dosen">Dosen <span class="text-danger">*</span></label>
                            <select name="dosen" id="dosen" class="form-control select2 {{ $errors->has('dosen') ? ' is-invalid' : '' }}">
                                <option value="">-- Pilih --</option>
                                @foreach ($dosens as $dosen)
                                    <option value="{{ $dosen->id }}">{{ $dosen->nidn }} - ( {{ $dosen->nama }} )</option>
                                @endforeach
                            </select>
                            @if ($errors->has('dosen'))
                                <small class="text-danger">{{ $errors->first('dosen') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="mata_kuliah">Mata Kuliah <span class="text-danger">*</span></label>
                            <select name="mata_kuliah" id="mata_kuliah" class="form-control select2 {{ $errors->has('mata_kuliah') ? ' is-invalid' : '' }}">
                                <option value="">-- Pilih --</option>
                                @foreach ($matkuls as $matkul)
                                    <option value="{{ $matkul->id }}">
                                        {{ $matkul->kode_mata_kuliah }} - ( {{ $matkul->mata_kuliah }} )
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('mata_kuliah'))
                                <small class="text-danger">{{ $errors->first('mata_kuliah') }}</small>
                            @endif
                        </div>
                        <div class=" text-center">
                            <a href="/backoffice/data-master/dosen-matkul" class="btn btn-default" title="Kembali">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                            <button type="submit" class="btn btn-success" style="width: 50%"> 
                                <i class="fas fa-plus"></i> Tambah Dosen Mata Kuliah
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
