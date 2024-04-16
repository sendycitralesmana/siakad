@extends('backoffice.layout.main')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Ubah Fakultas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/dashboard">Beranda</a></li>
                    <li class="breadcrumb-item active">Ubah Fakultas</li>
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
                    <h3 class="card-title">Form Ubah Fakultas</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>

                </div>
                <div class="card-body">
                    <form action="/backoffice/data-master/fakultas/{{ $fakultas->id }}/ubah" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="fakultas">Nama Fakultas <span class="text-danger">*</span></label>
                            <input type="text" name="fakultas" id="fakultas" class="form-control @if ($errors->has('fakultas')) is-invalid @endif" value="{{ $fakultas->fakultas ?? old('fakultas') }}">
                            @if ($errors->has('fakultas'))
                                <small class="text-danger">{{ $errors->first('fakultas') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="thumbnail">Thumbnail</label>
                            @if ($fakultas->thumbnail)
                                <img src="{{ asset('storage/images/fakultas/'.$fakultas->thumbnail) }}" alt="" class="img-fluid foto rounded d-block mb-3" 
                                style="width: 200px; height: 150px">
                            @else
                                <img src="" class="foto img-fluid mb-3 col-sm-5" alt="">
                            @endif
                            <input type="hidden" name="thumbnail_lama" value="{{ $fakultas->thumbnail }}" id="">
                            <input type="file" name="thumbnail" onchange="preview()" id="foto" accept="image/*" id="thumbnail" class="form-control @if ($errors->has('thumbnail')) is-invalid @endif" value="{{ old('thumbnail') }}">
                            @if ($errors->has('thumbnail'))
                                <small class="text-danger">{{ $errors->first('thumbnail') }}</small>
                            @endif
                        </div>
                        <div class=" text-center">
                            <a href="/backoffice/data-master/fakultas" class="btn btn-default" title="Kembali">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                            <button type="submit" class="btn btn-warning" style="width: 50%"> 
                                <i class="fas fa-edit"></i> Ubah Fakultas
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
