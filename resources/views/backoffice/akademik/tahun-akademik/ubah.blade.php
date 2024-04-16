@extends('backoffice.layout.main')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Ubah Tahun Akademik</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/dashboard">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="/backoffice/akademik/tahun-akademik">Tahun Akademik</a></li>
                    <li class="breadcrumb-item active">Ubah Tahun Akademik</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">

    <div class="row justify-content-center">

        <div class="col-md-5">

            <!-- Default box -->
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Ubah Tahun Akademik</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>

                </div>
                <div class="card-body">
                    <form action="/backoffice/akademik/tahun-akademik/{{ $tahunAkademik->id }}/ubah" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="tahun_akademik">Tahun Akademik <span class="text-danger">*</span></label>
                            <input type="text" name="tahun_akademik" id="tahun_akademik" class="form-control @if ($errors->has('tahun_akademik')) is-invalid @endif" value="{{ $tahunAkademik->tahun_akademik ?? old('tahun_akademik') }}">
                            @if ($errors->has('tahun_akademik'))
                                <small class="text-danger">{{ $errors->first('tahun_akademik') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="semester">Semester <span class="text-danger">*</span></label>
                            <select name="semester" id="semester" class="form-control {{ $errors->has('semester') ? 'is-invalid' : '' }}">
                                <option value="">-- Pilih --</option>
                                <option value="Ganjil" {{ $tahunAkademik->semester == 'Ganjil' ? 'selected' : '' }}>Ganjil</option>
                                <option value="Genap" {{ $tahunAkademik->semester == 'Genap' ? 'selected' : '' }}>Genap</option>
                            </select>
                            @if ($errors->has('semester'))
                                <small class="text-danger">{{ $errors->first('semester') }}</small>
                            @endif
                        </div>
                        <div class=" text-center">
                            <a href="/backoffice/akademik/tahun-akademik" class="btn btn-default" title="Kembali">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                            <button type="submit" class="btn btn-warning" style="width: 50%"> 
                                <i class="fas fa-edit"></i> Ubah Tahun Akademik
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
