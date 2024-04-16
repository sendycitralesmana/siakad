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
                    <li class="breadcrumb-item"><a href="/backoffice/data-master/fakultas/{{ $fakultas->id }}/jurusan/{{ $jurusan->id }}/prodi/{{ $prodi->id }}/matkul">Mata Kuliah</a></li>
                    <li class="breadcrumb-item active">Tambah Mata Kuliah</li>
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
                <div class="prodi">
                    <h5>
                        Program Studi: <b>{{ $prodi->program_studi }}</b>
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
                    <form action="/backoffice/data-master/fakultas/{{ $fakultas->id }}/jurusan/{{ $jurusan->id }}/prodi/{{ $prodi->id }}/matkul/tambah" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="dosen">Dosen <span class="text-danger">*</span></label>
                            <select name="dosen" class="form-control {{ $errors->has('dosen') ? 'is-invalid' : '' }}" id="dosen">
                                <option value="">-- Pilih Dosen --</option>
                                @foreach ($dosens as $dosen)
                                    <option value="{{ $dosen->id }}" {{ old('dosen') == $dosen->id ? 'selected' : '' }}>{{ $dosen->nidn }} - {{ $dosen->nama }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('dosen'))
                                <small class="text-danger">{{ $errors->first('dosen') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="kode_mata_kuliah">Kode Mata Kuliah <span class="text-danger">*</span></label>
                            <input type="text" name="kode_mata_kuliah" id="kode_mata_kuliah" class="form-control @if ($errors->has('kode_mata_kuliah')) is-invalid @endif" value="{{ old('kode_mata_kuliah') }}">
                            @if ($errors->has('kode_mata_kuliah'))
                                <small class="text-danger">{{ $errors->first('kode_mata_kuliah') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="mata_kuliah">Nama Mata Kuliah <span class="text-danger">*</span></label>
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
                        <div class="form-group">
                            <label for="semester_wajib">Semester Wajib <span class="text-danger">*</span></label>
                            <select name="semester_wajib" class="form-control {{ $errors->has('semester_wajib') ? 'is-invalid' : '' }}" id="semester_wajib">
                                <option value="">-- Pilih Semester --</option>
                                <option value="1" {{ old('semester_wajib') == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ old('semester_wajib') == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ old('semester_wajib') == '3' ? 'selected' : '' }}>3</option>
                                <option value="4" {{ old('semester_wajib') == '4' ? 'selected' : '' }}>4</option>
                                <option value="5" {{ old('semester_wajib') == '5' ? 'selected' : '' }}>5</option>
                                <option value="6" {{ old('semester_wajib') == '6' ? 'selected' : '' }}>6</option>
                                <option value="7" {{ old('semester_wajib') == '7' ? 'selected' : '' }}>7</option>
                                <option value="8" {{ old('semester_wajib') == '8' ? 'selected' : '' }}>8</option>
                            </select>
                            @if ($errors->has('semester_wajib'))
                                <small class="text-danger">{{ $errors->first('semester_wajib') }}</small>
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
