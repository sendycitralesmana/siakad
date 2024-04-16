@extends('backoffice.layout.main')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Kartu Rencana Studi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/dashboard">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="/backoffice/akademik/tahun-akademik">Kartu Rencana Studi</a></li>
                    <li class="breadcrumb-item active">Tambah Kartu Rencana Studi</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">

    @if(session('gagal'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Gagal </strong>{{ session('gagal') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Data Mata Kuliah</h3>

                    <div class="card-tools">

                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>

                </div>
                <div class="card-body">

                    <table class="table table-bordered table-hover text-center" id="example1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Dosen</th>
                                <th>Kode Mata Kuliah</th>
                                <th>Mata Kuliah</th>
                                <th>Jumlah SKS</th>
                                <th>Semester Wajib</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($matkuls as $key => $matkul)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $matkul->user->nama }}</td>
                                    <td>{{ $matkul->kode_mata_kuliah }}</td>
                                    <td>{{ $matkul->mata_kuliah }}</td>
                                    <td>{{ $matkul->jumlah_sks }}</td>
                                    <td>Semester {{ $matkul->semester_wajib }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <div class="col-md-4">

            <!-- Default box -->
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Tambah Kartu Rencana Studi</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>

                </div>
                <div class="card-body">
                    <form action="/backoffice/akademik/krs/tambah" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="mata_kuliah">Mata Kuliah <span class="text-danger">*</span></label>
                            <select name="mata_kuliah" id="mata_kuliah" class="form-control {{ $errors->has('mata_kuliah') ? 'is-invalid' : '' }}">
                                <option value="">-- Pilih --</option>
                                @foreach ($matkuls as $matkul)
                                    <option value="{{ $matkul->id }}">{{ $matkul->mata_kuliah }} 
                                        @if ($matkul->semester_wajib == auth()->user()->semester)
                                        - Wajib
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('mata_kuliah'))
                                <small class="text-danger">{{ $errors->first('mata_kuliah') }}</small>
                            @endif
                        </div>
                        <div class=" text-center">
                            <a href="/backoffice/akademik/krs" class="btn btn-default" title="Kembali">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                            <button type="submit" class="btn btn-success" style="width: 50%"> 
                                <i class="fas fa-plus"></i> Tambah KRS
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
