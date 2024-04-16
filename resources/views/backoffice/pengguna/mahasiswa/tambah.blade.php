@extends('backoffice.layout.main')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Mahasiswa</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/dashboard">Beranda</a></li>
                    <li class="breadcrumb-item active">Tambah Mahasiswa</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- Default box -->
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Form Tambah Mahasiswa</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>

                </div>
                <div class="card-body">
                    <form action="/backoffice/pengguna/mahasiswa/tambah" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama <span class="text-danger">*</span></label>
                                    <input type="text" name="nama" id="nama" class="form-control @if ($errors->has('nama')) is-invalid @endif" value="{{ old('nama') }}">
                                    @if ($errors->has('nama'))
                                        <small class="text-danger">{{ $errors->first('nama') }}</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" id="email" class="form-control @if ($errors->has('email')) is-invalid @endif" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <small class="text-danger">{{ $errors->first('email') }}</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="password">Password <span class="text-danger">*</span></label>
                                    <input type="password" name="password" id="password" class="form-control @if ($errors->has('password')) is-invalid @endif">
                                    @if ($errors->has('password'))
                                        <small class="text-danger">{{ $errors->first('password') }}</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="password">Password Konfirmasi <span class="text-danger">*</span></label>
                                    <input type="password" name="password_confirmation" id="password" class="form-control @if ($errors->has('password_confirmation')) is-invalid @endif">
                                    @if ($errors->has('password_confirmation'))
                                        <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                                    @endif
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nim">NIM <span class="text-danger">*</span></label>
                                    <input type="text" name="nim" id="nim" class="form-control @if ($errors->has('nim')) is-invalid @endif" value="{{ old('nim') }}">
                                    @if ($errors->has('nim'))
                                        <small class="text-danger">{{ $errors->first('nim') }}</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="program_studi">Program Studi <span class="text-danger">*</span></label>
                                    <select name="program_studi" id="program_studi" class="form-control {{ $errors->has('program_studi') ? 'is-invalid' : '' }}">
                                        <option value="">-- Pilih --</option>
                                        @foreach ($programStudis as $programStudi)
                                            <option value="{{ $programStudi->id }}">{{ $programStudi->program_studi }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('program_studi'))
                                        <small class="text-danger">{{ $errors->first('program_studi') }}</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="tahun_akademik">Tahun Akademik <span class="text-danger">*</span></label>
                                    <select name="tahun_akademik" id="tahun_akademik" class="form-control {{ $errors->has('tahun_akademik') ? 'is-invalid' : '' }}">
                                        <option value="">-- Pilih --</option>
                                        @foreach ($tahunAkademiks as $tahunAkademik)
                                            <option value="{{ $tahunAkademik->id }}">{{ $tahunAkademik->tahun_akademik }} / {{ $tahunAkademik->semester }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('tahun_akademik'))
                                        <small class="text-danger">{{ $errors->first('tahun_akademik') }}</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="semester">Semester <span class="text-danger">*</span></label>
                                    <select name="semester" id="semester" class="form-control {{ $errors->has('semester') ? 'is-invalid' : '' }}">
                                        <option value="">-- Pilih --</option>
                                        <option value="1" {{ old('semester') == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('semester') == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('semester') == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('semester') == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('semester') == '5' ? 'selected' : '' }}>5</option>
                                        <option value="6" {{ old('semester') == '6' ? 'selected' : '' }}>6</option>
                                        <option value="7" {{ old('semester') == '7' ? 'selected' : '' }}>7</option>
                                        <option value="8" {{ old('semester') == '8' ? 'selected' : '' }}>8</option>
                                        <option value="9" {{ old('semester') == '9' ? 'selected' : '' }}>9</option>
                                    </select>
                                    @if ($errors->has('semester'))
                                        <small class="text-danger">{{ $errors->first('semester') }}</small>
                                    @endif
                                </div>
                            </div>
                            
                        </div>

                        <div class=" text-center">
                            <a href="/backoffice/pengguna/dosen" class="btn btn-default" title="Kembali">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                            <button type="submit" class="btn btn-success" style="width: 50%"> 
                                <i class="fas fa-user-plus"></i> Tambah Mahasiswa
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
