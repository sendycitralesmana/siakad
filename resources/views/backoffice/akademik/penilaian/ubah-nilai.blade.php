@extends('backoffice.layout.main')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Ubah Nilai</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/dashboard">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="/backoffice/akademik/penilaian">Penilaian</a></li>
                    <li class="breadcrumb-item active">Ubah Nilai</li>
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

        <div class="col-md-6">

            <form action="/backoffice/akademik/penilaian/{{ $penilaian->id }}/matkul/{{ $matkul_id }}/ubah-nilai" method="POST">
            @csrf
    
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Data Mata Kuliah</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fas fa-minus"></i></button>
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
                        <div class=" d-flex justify-content-between pl-4 pr-4">
                            <p>
                                <b>NIM Mahasiswa:</b> 
                            </p>
                            <p>
                                <button type="button" class="badge badge-light pl-2 pr-2" data-toggle="modal" data-target="#mahasiswa-{{ $penilaian->user->id }}" title="Lihat detail">
                                    <i class="fa fa-eye"></i> {{ $penilaian->user->nim }}
                                </button>
                            </p>
                        </div>
                        <div class=" d-flex justify-content-between pl-4 pr-4">
                            <p>
                                <b>Mata Kuliah:</b> 
                            </p>
                            <p>
                                {{ $penilaian->prodiMatkul->dosenMatkul->matkul->mata_kuliah }}
                            </p>
                        </div>
                        <div class=" d-flex justify-content-between pl-4 pr-4">
                            <p>
                                <b>Jumlah SKS:</b> 
                            </p>
                            <p>
                                {{ $penilaian->prodiMatkul->dosenMatkul->matkul->jumlah_sks }}
                            </p>
                        </div>
                        <div class=" d-flex justify-content-between pl-4 pr-4">
                            <p>
                                <b>Tahun Akademik:</b> 
                            </p>
                            <p>
                                {{ $penilaian->tahunAkademik->tahun_akademik }} / {{ $penilaian->tahunAkademik->semester }}
                            </p>
                        </div>
                        <div class=" d-flex justify-content-between pl-4 pr-4">
                            <p>
                                <b>Semester:</b> 
                            </p>
                            <p>
                                {{ $penilaian->semester }}
                            </p>
                        </div>
                        <div class=" d-flex justify-content-between pl-4 pr-4">
                            <p>
                                <b>Nilai:</b> 
                            </p>
                            <div class="form-group">
                                <select name="nilai" id="nilai" class="form-control {{ $errors->has('nilai') ? 'is-invalid' : '' }} ">
                                    <option value="">-- Pilih Nilai --</option>
                                    <option value="4" {{ $penilaian->nilai == '4' ? 'selected' : '' }} class="text-center">A</option>
                                    <option value="3" {{ $penilaian->nilai == '3' ? 'selected' : '' }} class="text-center">B</option>
                                    <option value="2" {{ $penilaian->nilai == '2' ? 'selected' : '' }} class="text-center">C</option>
                                    <option value="1" {{ $penilaian->nilai == '1' ? 'selected' : '' }} class="text-center">D</option>
                                    <option value="0" {{ $penilaian->nilai == '0' ? 'selected' : '' }} class="text-center">E</option>
                                </select>
                                {{-- <input type="text" name="nilai" id="nilai" class="form-control {{ $errors->has('nilai') ? 'is-invalid' : '' }}" 
                                style="width: 70px" value="{{ $penilaian->nilai }}"> --}}
                                @if ($errors->has('nilai'))
                                    <small class="text-danger">{{ $errors->first('nilai') }}</small>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="text-center">
                            <a href="/backoffice/akademik/penilaian/matkul/{{ $matkul_id }}" class="btn btn-default" title="Kembali">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Ubah Nilai
                            </button>
                        </div>
                    </div>
                </div>

            </form>

            {{-- modal --}}
            @include('backoffice.akademik.penilaian.modal.mahasiswa')

        </div>
    </div>

</section>


@endsection
