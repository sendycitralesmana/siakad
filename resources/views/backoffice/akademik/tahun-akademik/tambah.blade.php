@extends('backoffice.layout.main')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Tahun Akademik</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/dashboard">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="/backoffice/akademik/tahun-akademik">Tahun Akademik</a></li>
                    <li class="breadcrumb-item active">Tambah Tahun Akademik</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">

    <div class="row justify-content-center">

        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Data</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
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
                                <th>Tahun Akademik</th>
                                <th>Semester</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($tahunAkademiks as $key => $tahunAkademik)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $tahunAkademik->tahun_akademik }}</td>
                                    <td>{{ $tahunAkademik->semester }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
        </div>

        <div class="col-md-5">

            <!-- Default box -->
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Tambah Tahun Akademik</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>

                </div>
                <div class="card-body">
                    <form action="/backoffice/akademik/tahun-akademik/tambah" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="tahun_akademik">Tahun Akademik <span class="text-danger">*</span></label>
                            <input type="text" name="tahun_akademik" id="tahun_akademik" class="form-control @if ($errors->has('tahun_akademik')) is-invalid @endif" value="{{ old('tahun_akademik') }}">
                            @if ($errors->has('tahun_akademik'))
                                <small class="text-danger">{{ $errors->first('tahun_akademik') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="semester">Semester <span class="text-danger">*</span></label>
                            <select name="semester" id="semester" class="form-control {{ $errors->has('semester') ? 'is-invalid' : '' }}">
                                <option value="">-- Pilih --</option>
                                <option value="Ganjil" {{ old('semester') == 'Ganjil' ? 'selected' : '' }}>Ganjil</option>
                                <option value="Genap" {{ old('semester') == 'Genap' ? 'selected' : '' }}>Genap</option>
                            </select>
                            @if ($errors->has('semester'))
                                <small class="text-danger">{{ $errors->first('semester') }}</small>
                            @endif
                        </div>
                        <div class=" text-center">
                            <a href="/backoffice/akademik/tahun-akademik" class="btn btn-default" title="Kembali">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                            <button type="submit" class="btn btn-success" style="width: 50%"> 
                                <i class="fas fa-plus"></i> Tambah Tahun Akademik
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
