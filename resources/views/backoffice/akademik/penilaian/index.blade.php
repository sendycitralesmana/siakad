@extends('backoffice.layout.main')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Mata Kuliah</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/dashboard">Beranda</a></li>
                    <li class="breadcrumb-item active">Mata Kuliah</li>
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
                            <i class="fas fa-list"></i> {{ $matkuls->count() }} Data
                        </span>
                    </h5>
                    <div class="form-group mx-sm-3">
                        <select name="cariMatkul" id="cariMatkul" class="form-control">
                            <option value="">-- Pilih Mata Kuliah --</option>
                            @foreach ($dataMatkuls as $dataMatkul)
                                <option value="{{ $dataMatkul->matkul->id }}" {{ old('cariMatkul') == $dataMatkul->id ? 'selected' : '' }}>{{ $dataMatkul->matkul->mata_kuliah }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('cariMatkul'))
                            <small class="text-danger">{{ $errors->first('cariMatkul') }}</small>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-success mr-1">
                        <i class="fas fa-search"></i> Cari
                    </button>
                    @if ($cariMatkul)
                        <a href="/backoffice/akademik/penilaian" class="btn btn-primary">
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

    @if ($cariMatkul)
        <div class="cari-prodi-matkul text-center">
            <h4>
               Hasil Pencarian dari :  <b>{{$hasilMatkul->mata_kuliah}}</b>
            </h4>
        </div>
    @endif

    @if ($matkuls->count() == 0)
        <div class="text-center">
            <h4>
                <b>-- Data Mata Kuliah Tidak Ada --</b>
            </h4>
        </div>
    @endif

    <div class="row">
        @foreach ($matkuls as $matkul)
        <div class="col-md-4">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        <b>{{$matkul->matkul->mata_kuliah}}</b>
                    </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="thumbnail mb-2 text-center">
                        <i class="fas fa-book fa-8x"></i>
                    </div>
                    <hr>
                    <div class="jurusan d-flex justify-content-center">
                        {{-- <span>
                            <i class="fas fa-list"></i> {{$matkuls->where('prodi_mata_kuliah_id', $matkul->prodi_mata_kuliah_id)->count()}} Data
                        </span> --}}
                        <a href="/backoffice/akademik/penilaian/matkul/{{$matkul->matkul->id}}/" title="Lihat">
                            <button class="badge badge-light">
                                Lihat Detail <i class="fas fa-arrow-right"></i>
                            </button>
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-md-12">
            @if (!$cariMatkul)
            {{ $matkuls->links('pagination::bootstrap-5') }}
                
            @endif
        </div>
    </div>

</section>

@endsection
