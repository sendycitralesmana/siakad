@extends('backoffice.layout.main')

@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Profil pengguna</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/backoffice/dashboard">Beranda</a></li>
            <li class="breadcrumb-item active">Profil pengguna</li>
          </ol>
        </div>
      </div>
    </div>
</section>

<section class="content">

    <div class="row justify-content-center">
        
        <div class="col-md-5">
            
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Data</h3>
                    <div class="card-tools">
                        <a href="/backoffice/user/{{ auth()->user()->id }}/ubah-data" class="btn btn-primary btn-sm" title="Ubah data">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="/backoffice/user/{{ auth()->user()->id }}/ubah-password" class="btn btn-primary btn-sm" title="Ubah password">
                            <i class="fas fa-lock"></i>
                        </a>
                        <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" data-toggle="tooltip"
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
                    <div class=" text-center">
                        <label for="foto">Foto </label>
                        @if ($user->foto_profil)
                            <img src="{{ asset('storage/images/user/'.$user->foto_profil) }}" 
                            class=" img-fluid d-block rounded" alt=""
                            style="width: 150px; height: 150px; margin-left: auto; margin-right: auto">
                        @else
                            <img src="{{ asset('images/profile.png') }}" class="gambarPreviewuser img-fluid mb-3 d-block" alt=""
                            style="width: 150px; height: 150px; margin-left: auto; margin-right: auto">
                        @endif
                    </div>
                    <hr>
                    @if ($user->nim)
                    <div class=" d-flex justify-content-between pl-4 pr-4">
                        <p>
                            <b>NIM:</b> 
                        </p>
                        <p>
                            {{ $user->nim }}
                        </p>
                    </div>
                    @endif
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
                            <b>Tempat, Tanggal Lahir:</b> 
                        </p>
                        <p>
                            @if ($user->tempat_lahir == null  && $user->tanggal_lahir == null)
                                <span class="badge badge-warning"><i class="fa fa-exclamation-triangle"></i> Belum melengkapi data</span>
                            @else
                                {{ $user->tempat_lahir }}, {{ date('d F Y', strtotime($user->tanggal_lahir)) }}
                            @endif
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
                    @if ($user->fakultas_id)
                    <div class=" d-flex justify-content-between pl-4 pr-4">
                        <p>
                            <b>Fakultas:</b> 
                        </p>
                        <p>
                            {{ $user->fakultas->fakultas }}
                        </p>
                    </div>
                    @endif
                    @if ($user->jurusan_id)
                    <div class=" d-flex justify-content-between pl-4 pr-4">
                        <p>
                            <b>Jurusan:</b> 
                        </p>
                        <p>
                            {{ $user->jurusan->jurusan }}
                        </p>
                    </div>
                    @endif
                    @if ($user->program_studi_id)
                    <div class=" d-flex justify-content-between pl-4 pr-4">
                        <p>
                            <b>Program Studi:</b> 
                        </p>
                        <p>
                            {{ $user->programStudi->program_studi }}
                        </p>
                    </div>
                    @endif
                    @if ($user->tahun_akademik_id)
                    <div class=" d-flex justify-content-between pl-4 pr-4">
                        <p>
                            <b>Tahun Akademik:</b> 
                        </p>
                        <p>
                            {{ $user->tahunAkademik->tahun_akademik }} / {{ $user->tahunAkademik->semester }}
                        </p>
                    </div>
                    @endif
                    @if ($user->semester)
                    <div class=" d-flex justify-content-between pl-4 pr-4">
                        <p>
                            <b>Semester:</b> 
                        </p>
                        <p>
                            {{ $user->semester }}
                        </p>
                    </div>
                    @endif
                </div>
            </div>

        </div>

    </div>

</section>

@endsection