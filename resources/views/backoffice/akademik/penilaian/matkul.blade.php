@extends('backoffice.layout.main')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                {{-- <h1>Mata Kuliah</h1> --}}
                <h1>{{ $matkul->matkul->mata_kuliah }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/dashboard">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="/backoffice/akademik/penilaian">Mata Kuliah</a></li>
                    {{-- <li class="breadcrumb-item active">Mata Kuliah</li> --}}
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">

    <div class="row justify-content-center">
        <div class="col-md-12">

            <!-- Default box -->
            <div class="card card-outline card-primary">
                <div class="card-header">
                    {{-- <h3 class="card-title">Data</h3> --}}
                    <div class="d-flex justify-content-between">
                        <form class="form-inline" method="GET">
                            @csrf
                            <h5>
                                <span class="badge">
                                    <i class="fas fa-list"></i> {{ $penilaians->count() }} Data
                                </span>
                            </h5>
                            <div class="form-group mx-sm-3">
                                {{-- <input type="text" class="form-control {{ $errors->has('prodi') ? 'is-invalid' : '' }}" style="width: 300px;" id="fakultas"
                                    placeholder="Program Studi" name="cariProdi"> --}}
                                <select name="cari" id="cari" class="form-control text-center">
                                    <option value="">-- Pilih Semester --</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                                @if ($errors->has('prodi'))
                                    <small class="text-danger">{{ $errors->first('prodi') }}</small>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-success mr-1">
                                <i class="fas fa-search"></i> Cari
                            </button>
                            @if ($cari)
                                <a href="/backoffice/akademik/penilaian/matkul/{{ $matkul->id }}" class="btn btn-primary">
                                    <i class="fas fa-redo"></i> Tampilkan Semua
                                </a>
                            @endif
                        </form>
    
                        <div class="card-tools">
                            {{-- <a href="/backoffice/akademik/krs/tambah" class="btn btn-success btn-sm" title="Tambah Tahun Akademik">
                                <i class="fas fa-plus"></i> Tambah
                            </a> --}}
    
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
                                data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
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

                    @if ($cari)
                        <div class="cari-prodi-matkul text-center">
                            <h4>
                            Hasil Pencarian dari semester :  <b>{{$cari}}</b>
                            </h4>
                        </div>
                    @endif

                    <table class="table table-bordered table-hover text-center" id="example1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NIM Mahasiswa</th>
                                <th>Program Studi</th>
                                <th>Jumlah SKS</th>
                                <th>Tahun Akademik</th>
                                <th>Semester</th>
                                <th>Nilai</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($penilaians as $key => $penilaian)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <button type="button" class="badge badge-light pl-2 pr-2" data-toggle="modal" data-target="#mahasiswa-{{ $penilaian->user->id }}" title="Lihat detail">
                                            <i class="fa fa-eye"></i> {{ $penilaian->user->nim }}
                                        </button>
                                    </td>
                                    <td>{{ $penilaian->prodiMatkul->prodi->program_studi }}</td>
                                    <td>{{ $penilaian->prodiMatkul->dosenMatkul->matkul->jumlah_sks }}</td>
                                    <td>{{ $penilaian->tahunAkademik->tahun_akademik }} / {{ $penilaian->tahunAkademik->semester }}</td>
                                    <td>{{ $penilaian->semester }}</td>
                                    <td>{{ $penilaian->nilai }}</td>
                                    <td>
                                        {{-- {{ $penilaian->nilai }} --}}
                                        @if ($penilaian->nilai == 4)
                                            A
                                        @elseif ($penilaian->nilai == 3)
                                            B
                                        @elseif ($penilaian->nilai == 2)
                                            C
                                        @elseif ($penilaian->nilai == 1)
                                            D
                                        @elseif ($penilaian->nilai === 0)
                                            E
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/backoffice/akademik/penilaian/{{ $penilaian->id }}/matkul/{{ $penilaian->prodiMatkul->dosenMatkul->matkul->id }}/ubah-nilai"
                                            class="btn btn-warning btn-sm" title="Ubah Nilai">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- modal --}}
                    @foreach ($penilaians as $penilaian)
                        @include('backoffice.akademik.penilaian.modal.mahasiswa')
                    @endforeach
                </div>

            </div>

        </div>
    </div>

</section>

@endsection
