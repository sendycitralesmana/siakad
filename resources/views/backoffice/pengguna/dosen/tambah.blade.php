@extends('backoffice.layout.main')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Dosen</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/dashboard">Beranda</a></li>
                    <li class="breadcrumb-item active">Tambah Dosen</li>
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
                    <h3 class="card-title">Form Tambah Dosen</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>

                </div>
                <div class="card-body">
                    <form action="/backoffice/pengguna/dosen/tambah" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nidn">NIDN <span class="text-danger">*</span></label>
                            <input type="text" name="nidn" id="nidn" class="form-control @if ($errors->has('nidn')) is-invalid @endif" value="{{ old('nidn') }}">
                            @if ($errors->has('nidn'))
                                <small class="text-danger">{{ $errors->first('nidn') }}</small>
                            @endif
                        </div>
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
                        <div class=" text-center">
                            <a href="/backoffice/pengguna/dosen" class="btn btn-default" title="Kembali">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                            <button type="submit" class="btn btn-success" style="width: 50%"> 
                                <i class="fas fa-user-plus"></i> Tambah dosen
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
