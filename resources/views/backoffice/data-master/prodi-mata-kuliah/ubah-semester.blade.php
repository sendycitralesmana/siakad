@extends('backoffice.layout.main')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Ubah Semester Wajib Mata Kuliah</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/dashboard">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="/backoffice/data-master/prodi-matkul">Prodi Mata Kuliah</a></li>
                    <li class="breadcrumb-item active">Ubah Prodi Mata Kuliah</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">

    <div class="row justify-content-center">
        <div class="col-md-5">

            <!-- Default box -->
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Form Ubah Semester Wajib Mata Kuliah</h3>

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

                    <form action="/backoffice/data-master/prodi-matkul/{{ $prodiMatkul->id }}/prodi/{{ $prodi_id }}/ubah-semester" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <b>NIDN Dosen:</b>
                                </div>
                                <div>
                                    {{-- <p>{{ $prodiMatkul->dosenMatkul->user->nidn }}</p> --}}
                                    <button type="button" class="badge badge-light pl-2 pr-2 mb-3" data-toggle="modal" data-target="#dosen-{{ $prodiMatkul->dosenMatkul->user->id }}" title="Lihat detail">
                                        <i class="fa fa-eye"></i> {{ $prodiMatkul->dosenMatkul->user->nidn }}
                                    </button>
                                    @include('backoffice.data-master.prodi-mata-kuliah.modal.dosen')
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <b>Mata Kuliah:</b>
                                </div>
                                <div>
                                    <p>{{ $prodiMatkul->dosenMatkul->matkul->mata_kuliah }}</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <b>Jumlah SKS:</b>
                                </div>
                                <div>
                                    <p>{{ $prodiMatkul->dosenMatkul->matkul->jumlah_sks }}</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <b>Semester Wajib:</b>
                                </div>
                                <div>
                                    <select name="semester_wajib" id="semester_wajib" class="form-control text-center {{ $errors->has('semester_wajib') ? ' is-invalid' : '' }}">
                                        <option value="">Tidak Ada</option>
                                        <option value="1" {{ $prodiMatkul->semester_wajib == 1 ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ $prodiMatkul->semester_wajib == 2 ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ $prodiMatkul->semester_wajib == 3 ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ $prodiMatkul->semester_wajib == 4 ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ $prodiMatkul->semester_wajib == 5 ? 'selected' : '' }}>5</option>
                                        <option value="6" {{ $prodiMatkul->semester_wajib == 6 ? 'selected' : '' }}>6</option>
                                        <option value="7" {{ $prodiMatkul->semester_wajib == 7 ? 'selected' : '' }}>7</option>
                                        <option value="8" {{ $prodiMatkul->semester_wajib == 8 ? 'selected' : '' }}>8</option>
                                    </select>
                                    @if ($errors->has('semester_wajib'))
                                        <small class="text-danger">{{ $errors->first('semester_wajib') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class=" text-center">
                            <a href="/backoffice/data-master/prodi-matkul/prodi/{{ $prodi_id }}" class="btn btn-default" title="Kembali">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                            <button type="submit" class="btn btn-warning" style="width: 50%"> 
                                <i class="fas fa-edit"></i> Ubah Semester Wajib
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
