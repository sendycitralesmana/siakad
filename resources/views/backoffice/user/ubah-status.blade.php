@extends('backoffice.layout.main')

@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Profil</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/backoffice/dashboard">Beranda</a></li>
            <li class="breadcrumb-item active">Profil</li>
          </ol>
        </div>
      </div>
    </div>
</section>

<section class="content">

    <div class="row justify-content-center">
        
        <div class="col-md-4">
            
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Data</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class=" text-center">
                        <label for="foto">Foto </label>
                        @if ($user->foto_profil)
                            <img src="{{ asset('storage/pengguna/'.$user->foto_profil) }}" 
                            class="gambarPreviewuser img-fluid d-block" alt=""
                            style="width: 150px; height: 150px; margin-left: auto; margin-right: auto">
                        @else
                            <img src="{{ asset('images/profile.png') }}" class="gambarPreviewuser img-fluid mb-3 d-block" alt=""
                            style="width: 150px; height: 150px; margin-left: auto; margin-right: auto">
                        @endif
                    </div>
                    <hr>
                    <div class=" d-flex justify-content-between pl-4 pr-4">
                        <p>
                            <b>Nama:</b> 
                        </p>
                        <p>
                            {{ $user->nama }}
                        </p>
                    </div>
                    <div class=" d-flex justify-content-between pl-4 pr-4">
                        <p>
                            <b>Email:</b> 
                        </p>
                        <p>
                            {{ $user->email }}
                        </p>
                    </div>
                    <div class=" d-flex justify-content-between pl-4 pr-4">
                        <p>
                            <b>Jenis kelamin:</b> 
                        </p>
                        <p>
                            @if ($user->jenis_kelamin == null)
                                <span class="badge badge-warning"><i class="fa fa-exclamation-triangle"></i> Belum melengkapi data</span>
                            @endif
                            {{ $user->jenis_kelamin }}
                        </p>
                    </div>
                    <div class=" d-flex justify-content-between pl-4 pr-4">
                        <p>
                            <b>Agama:</b> 
                        </p>
                        <p>
                            @if ($user->agama == null)
                                <span class="badge badge-warning"><i class="fa fa-exclamation-triangle"></i> Belum melengkapi data</span>
                            @endif
                            {{ $user->agama }}
                        </p>
                    </div>
                    <div class=" d-flex justify-content-between pl-4 pr-4">
                        <p>
                            <b>Alamat:</b> 
                        </p>
                        <p>
                            @if ($user->alamat == null)
                                <span class="badge badge-warning"><i class="fa fa-exclamation-triangle"></i> Belum melengkapi data</span>
                            @endif
                            {{ $user->alamat }}
                        </p>
                    </div>
                    <div class=" d-flex justify-content-between pl-4 pr-4">
                        <p>
                            <b>No. HP:</b> 
                        </p>
                        <p>
                            @if ($user->no_hp == null)
                                <span class="badge badge-warning"><i class="fa fa-exclamation-triangle"></i> Belum melengkapi data</span>
                            @endif
                            {{ $user->no_hp }}
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-4">
            <form action="/backoffice/pengguna/{{ $user->id }}/ubah-status" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="card-title">Form ubah status</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="status">Status pengguna <span class="text-danger">*</span></label>
                            <select name="status" id="status" class="form-control">
                                <option value="2" {{ $user->role_id == 2 ? 'selected' : '' }}>Operator</option>
                                <option value="3" {{ $user->role_id == 3 ? 'selected' : '' }}>Pegawai</option>
                            </select>
                            @if ($errors->has('status'))
                            <small class="text-danger">{{ $errors->first('status') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Konfirmasi">Apakah status pengguna sesuai? <span class="text-danger">*</span></label>
                            <div>
                                <input type="checkbox" id="konfirmasi" name="konfirmasi" required
                                oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Konfirmasi apakah status pengguna sudah sesuai')">
                                <small>Klik jika status pengguna sudah sesuai</small>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="/backoffice/pengguna" class="btn btn-default" title="Kembali">
                                <i class="fa fa-arrow-left"></i>
                            </a>
                            <button type="submit" class="btn btn-warning" style="width: 50%">
                                <i class="fa fa-edit"></i> Ubah status
                            </button>
                        </div>
                    </div>
                </div>

            </form>

        </div>

    </div>

</section>

@endsection