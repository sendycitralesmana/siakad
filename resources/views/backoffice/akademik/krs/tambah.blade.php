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
                    <li class="breadcrumb-item"><a href="/backoffice/akademik/krs">Kartu Rencana Studi</a></li>
                    <li class="breadcrumb-item active">Tambah Mata Kuliah</li>
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
                                <th>NIDN Dosen</th>
                                <th>Kode Mata Kuliah</th>
                                <th>Mata Kuliah</th>
                                <th>Jumlah SKS</th>
                                <th>Semester Wajib</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($prodiMatkuls as $key => $prodiMatkul)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <button type="button" class="badge badge-light pl-2 pr-2" data-toggle="modal" data-target="#dosen-{{ $prodiMatkul->dosenMatkul->user->id }}" title="Lihat detail">
                                            <i class="fa fa-eye"></i> {{ $prodiMatkul->dosenMatkul->user->nidn }}
                                        </button>    
                                    </td>
                                    <td>{{ $prodiMatkul->dosenMatkul->matkul->kode_mata_kuliah }}</td>
                                    <td>{{ $prodiMatkul->dosenMatkul->matkul->mata_kuliah }}</td>
                                    <td>{{ $prodiMatkul->dosenMatkul->matkul->jumlah_sks }}</td>
                                    <td>
                                        @if ($prodiMatkul->semester_wajib == null)
                                            -
                                        @else
                                            Semester {{ $prodiMatkul->semester_wajib }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- modal --}}
                    @foreach ($prodiMatkuls as $data)
                        @include('backoffice.akademik.krs.modal.data-dosen')
                    @endforeach
                </div>

            </div>
        </div>

        <div class="col-md-4">

            <!-- Default box -->
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Tambah Mata Kuliah</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>

                </div>
                <div class="card-body">
                    <form action="/backoffice/akademik/krs/semester/{{ $semester }} /tambah" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="mata_kuliah">Mata Kuliah <span class="text-danger">*</span></label>
                            <select name="mata_kuliah" id="mata_kuliah" class="form-control select2 {{ $errors->has('mata_kuliah') ? 'is-invalid' : '' }}">
                                <option value="">-- Pilih --</option>
                                {{-- menampilkan prodi mata kuliah yang belum ada di tabel krs dengan user_id yang login dan semester yang sama  --}}
                                @foreach ($prodiMatkuls as $prodiMatkul)
                                    {{-- @if ($prodiMatkul->krs->where('user_id', auth()->user()->id)->where('semester', auth()->user()->semester)->count() == 0)
                                        @if ( $prodiMatkul->krs->where('user_id', auth()->user()->id)->count() == 0)
                                            <option value="{{ $prodiMatkul->id }}">{{ $prodiMatkul->dosenMatkul->matkul->mata_kuliah }}
                                                @if ($prodiMatkul->semester_wajib == auth()->user()->semester)
                                                - Wajib
                                                @endif
                                            </option>
                                        @endif
                                    @endif --}}
                                    {{-- menampilkan prodi mata kuliah yang belum ada di tabel krs dengan user_id yang login --}}
                                    @if ( $prodiMatkul->krs->where('user_id', auth()->user()->id)->where('nilai', null)->count() != 0 )
                                        @if ( $prodiMatkul->krs->where('user_id', auth()->user()->id)->count() == 0)
                                            <option value="{{ $prodiMatkul->id }}">{{ $prodiMatkul->dosenMatkul->matkul->mata_kuliah }}
                                                @if ($prodiMatkul->semester_wajib == auth()->user()->semester)
                                                - Wajib
                                                @endif
                                            </option>
                                        @endif
                                    @else
                                        @if ( $prodiMatkul->krs->where('user_id', auth()->user()->id)->where('nilai', '<', 3)->count() != 0 || $prodiMatkul->krs->where('user_id', auth()->user()->id)->count() == 0)
                                        <option value="{{ $prodiMatkul->id }}">{{ $prodiMatkul->dosenMatkul->matkul->mata_kuliah }}
                                                @if ($prodiMatkul->semester_wajib == auth()->user()->semester)
                                                - Wajib
                                                @endif
                                            </option>
                                        @endif            
                                    @endif
                                @endforeach
                            </select>
                            @if ($errors->has('mata_kuliah'))
                                <small class="text-danger">{{ $errors->first('mata_kuliah') }}</small>
                            @endif
                        </div>
                        <div class=" text-center">
                            <a href="/backoffice/akademik/krs/semester/{{ $semester }}" class="btn btn-default" title="Kembali">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                            <button type="submit" class="btn btn-success" style="width: 50%"> 
                                <i class="fas fa-plus"></i> Tambah Matkul
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
