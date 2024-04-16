@extends('backoffice.layout.main')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Mata Kuliah Umum</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/dashboard">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="/backoffice/data-master/prodi-matkul/umum">Mata Kuliah Umum</a></li>
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

                    @if(session('gagal'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Gagal </strong>{{ session('gagal') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <form action="/backoffice/data-master/prodi-matkul/umum-tambah" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- <div class="form-group">
                            <label for="program_studi">Program Studi <span class="text-danger">*</span></label>
                            <select name="program_studi" id="program_studi" class="form-control {{ $errors->has('program_studi') ? ' is-invalid' : '' }}">
                                <option value="">-- Pilih --</option>
                                @foreach ($prodis as $prodi)
                                    <option value="{{ $prodi->id }}">{{ $prodi->program_studi }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('program_studi'))
                                <small class="text-danger">{{ $errors->first('program_studi') }}</small>
                            @endif
                        </div> --}}
                        <div class="form-group">
                            <label for="mata_kuliah">Dosen Mata Kuliah <span class="text-danger">*</span></label>
                            <select name="mata_kuliah" id="mata_kuliah" class="form-control {{ $errors->has('mata_kuliah') ? ' is-invalid' : '' }}">
                                <option value="">-- Pilih --</option>
                                @foreach ($dosenMatkuls as $dosenMatkul)
                                    <option value="{{ $dosenMatkul->id }}" {{ old('mata_kuliah') == $dosenMatkul->id ? 'selected' : '' }}>{{ $dosenMatkul->user->nidn }} ( {{ $dosenMatkul->user->nama }} ) - {{ $dosenMatkul->matkul->mata_kuliah }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('mata_kuliah'))
                                <small class="text-danger">{{ $errors->first('mata_kuliah') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="semester_wajib">Semester Wajib</label>
                            <select name="semester_wajib" id="semester_wajib" class="form-control {{ $errors->has('semester_wajib') ? ' is-invalid' : '' }}">
                                <option value="">-- Pilih --</option>
                                <option value="1" {{ old('semester_wajib') == 1 ? 'selected' : '' }}>1</option>
                                <option value="2" {{ old('semester_wajib') == 2 ? 'selected' : '' }}>2</option>
                                <option value="3" {{ old('semester_wajib') == 3 ? 'selected' : '' }}>3</option>
                                <option value="4" {{ old('semester_wajib') == 4 ? 'selected' : '' }}>4</option>
                                <option value="5" {{ old('semester_wajib') == 5 ? 'selected' : '' }}>5</option>
                                <option value="6" {{ old('semester_wajib') == 6 ? 'selected' : '' }}>6</option>
                                <option value="7" {{ old('semester_wajib') == 7 ? 'selected' : '' }}>7</option>
                                <option value="8" {{ old('semester_wajib') == 8 ? 'selected' : '' }}>8</option>
                            </select>
                            <small>Abaikan jika mata kuliah tidak wajib</small>
                            @if ($errors->has('semester_wajib'))
                                <small class="text-danger">{{ $errors->first('semester_wajib') }}</small>
                            @endif
                        </div>
                        <div class=" text-center">
                            <a href="/backoffice/data-master/prodi-matkul/umum" class="btn btn-default" title="Kembali">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                            <button type="submit" class="btn btn-success" style="width: 50%"> 
                                <i class="fas fa-plus"></i> Tambah Prodi Mata Kuliah
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
