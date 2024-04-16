@extends('backoffice.layout.main')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Pengguna</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="/backoffice/dashboard">Beranda</a></li>
      <li class="breadcrumb-item active">Pengguna</li>
      </ol>
    </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header bg-primary">
      <h3 class="card-title">Data</h3>

      <div class="card-tools">
        <a href="/backoffice/pengguna/tambah" class="btn btn-primary btn-sm" title="Tambah data">
          <i class="fas fa-plus"></i>
        </a>

        <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
      </div>

    </div>
    <div class="card-body">

      @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil</strong> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
        
      <table class="table table-bordered table-hover text-center" id="example1">
        <thead>
          <tr>
            <th>#</th>
            <th>Foto profil</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Status</th>
            <th>Status akun</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>
              @if ($user->foto_profil)
                <img src="{{ asset('storage/pengguna/'.$user->foto_profil) }}" style="width: 80px; height: 80px" class="img-fluid rounded">
              @else
                <img src="{{ asset('images/profile.png') }}" style="width: 80px; height: 80px" class="img-fluid rounded">
              @endif
            </td>
            <td>{{ $user->nama }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role->nama }}</td>
            <td>
              @if ($user->email_verified_at)
                <h5>
                  <span class="badge badge-success">Terverifikasi</span>
                </h5>
              @else
                <h5>
                  <span class="badge badge-danger">Belum Terverifikasi</span>
                </h5>
              @endif
            </td>
            <td>
              <button type="button" class="badge badge-light pl-2 pr-2" data-toggle="modal" data-target="#detail-{{ $user->id }}" title="Lihat detail">
                <i class="fa fa-eye"></i> Lihat
              </button>
              @if ($user->id != auth()->user()->id)
              <a href="/backoffice/pengguna/{{ $user->id }}/ubah-status" class="btn btn-sm btn-warning" title="Edit">
                <i class="fa fa-pencil"></i>
              </a>
              <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus-{{ $user->id }}" title="Hapus pengguna">
                <i class="fas fa-trash"></i>
              </button>
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

      {{-- modal --}}
      @foreach ($users as $user)
          @include('backoffice.pengguna.modal.detail')
          @include('backoffice.pengguna.modal.hapus')
      @endforeach

    </div>
    
  </div>

</section>


@endsection