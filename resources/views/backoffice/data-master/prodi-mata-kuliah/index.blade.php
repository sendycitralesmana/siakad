@extends('backoffice.layout.main')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Program Studi Mata Kuliah</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/dashboard">Beranda</a></li>
                    <li class="breadcrumb-item active">Prodi Mata Kuliah</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">

    <div class="card card-outline card-primary">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <form class="form-inline" method="GET">
                    @csrf
                    <h5>
                        <span class="badge">
                            <i class="fas fa-list"></i> {{ $prodis->count() }} Data
                        </span>
                    </h5>
                    <div class="form-group mx-sm-3">
                        {{-- <input type="text" class="form-control {{ $errors->has('prodi') ? 'is-invalid' : '' }}" style="width: 300px;" id="fakultas"
                            placeholder="Program Studi" name="cariProdi"> --}}
                        <select name="cariProdi" id="cariProdi" class="form-control select2">
                            <option value="">-- Pilih Program Studi --</option>
                            @foreach ($allProdis as $prodi)
                                <option value="{{ $prodi->program_studi }}" {{ old('cariProdi') == $prodi->id ? 'selected' : '' }}>{{ $prodi->program_studi }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('prodi'))
                            <small class="text-danger">{{ $errors->first('prodi') }}</small>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-success mr-1">
                        <i class="fas fa-search"></i> Cari
                    </button>
                    @if ($cariProdi)
                        <a href="/backoffice/data-master/prodi-matkul" class="btn btn-primary">
                            <i class="fas fa-redo"></i> Tampilkan Semua
                        </a>
                    @endif
                </form>

            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil </strong>{{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if ($cariProdi)
        <div class="cari-prodi-matkul text-center">
            <h4>
               Hasil Pencarian dari :  <b>{{$cariProdi}}</b>
            </h4>
        </div>
    @endif

    @if ($prodis->count() == 0)
        <div class="text-center">
            <h4>
                <b>-- Data Program Studi Tidak Ada --</b>
            </h4>
        </div>
    @endif

    <div class="row">
        <div class="col-md-3">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        <b>Umum</b>
                    </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="thumbnail mb-2 text-center">
                        <i class="fas fa-graduation-cap fa-7x"></i>
                    </div>
                    <hr>
                    <div class="jurusan d-flex justify-content-between">
                        <span>
                            <i class="fas fa-list"></i> {{ $prodiMatkuls->where('program_studi_id', null)->count() }} Mata Kuliah
                        </span>
                        <a href="/backoffice/data-master/prodi-matkul/umum" title="Lihat">
                            <button class="badge badge-light">
                                Detail <i class="fas fa-arrow-right"></i>
                            </button>
                        </a>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        @foreach ($prodis as $prodi)
        <div class="col-md-3">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        <b>{{$prodi->program_studi}}</b>
                    </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="thumbnail mb-2 text-center">
                        {{-- <img src="{{asset('storage/images/fakultas/'.$prodi->jurusan->fakultas->thumbnail)}}" alt=""
                            class="img-fluid rounded" style="height: 200px; width: 100%"> --}}
                        <i class="fas fa-graduation-cap fa-7x"></i>
                    </div>
                    <hr>
                    <div class="jurusan d-flex justify-content-between">
                        <span>
                            <i class="fas fa-list"></i> {{$prodi->matkul->count()}} Mata Kuliah
                        </span>
                        <a href="/backoffice/data-master/prodi-matkul/prodi/{{$prodi->id}}/" title="Lihat">
                            <button class="badge badge-light">
                                Detail <i class="fas fa-arrow-right"></i>
                            </button>
                        </a>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-md-12">
            {{ $prodis->links('pagination::bootstrap-5') }}
        </div>
    </div>

    {{-- <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Data</h3>

                    <div class="card-tools">
                        <a href="/backoffice/data-master/prodi-matkul/tambah" class="btn btn-success btn-sm" title="Tambah Prodi Mata Kuliah">
                            <i class="fas fa-plus"></i> Tambah
                        </a>

                        <button type="button" class="btn btn-outline-secondary btn-sm" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
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

                    <table class="table table-bordered table-hover text-center" id="example1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Program Studi</th>
                                <th>NIDN Dosen</th>
                                <th>Mata Kuliah</th>
                                <th>Jumlah SKS</th>
                                <th>Semester Wajib</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($prodiMatkuls as $key => $prodiMatkul)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $prodiMatkul->prodi->program_studi }}</td>
                                    <td>
                                        <button type="button" class="badge badge-light pl-2 pr-2" data-toggle="modal" data-target="#dosen-{{ $prodiMatkul->dosenMatkul->user->id }}" title="Lihat detail">
                                            <i class="fa fa-eye"></i> {{ $prodiMatkul->dosenMatkul->user->nidn }}
                                        </button>
                                    </td>
                                    <td>{{ $prodiMatkul->dosenMatkul->matkul->mata_kuliah }}</td>
                                    <td>{{ $prodiMatkul->dosenMatkul->matkul->jumlah_sks }}</td>
                                    <td>
                                        @if ($prodiMatkul->semester_wajib == null)
                                            -
                                        @else
                                            {{ $prodiMatkul->semester_wajib }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/backoffice/data-master/prodi-matkul/{{ $prodiMatkul->id }}/ubah" class="btn btn-warning btn-sm" title="Ubah">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus-{{ $prodiMatkul->id }}" title="Hapus">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @foreach ($prodiMatkuls as $prodiMatkul)
                        @include('backoffice.data-master.prodi-mata-kuliah.modal.hapus')
                        @include('backoffice.data-master.prodi-mata-kuliah.modal.dosen')
                    @endforeach
                    
                </div>

            </div>

        </div>
    </div> --}}

</section>

@endsection
