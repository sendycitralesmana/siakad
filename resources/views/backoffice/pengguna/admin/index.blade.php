@extends('backoffice.layout.main')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Admin</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/dashboard">Beranda</a></li>
                    <li class="breadcrumb-item active">Admin</li>
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
                    <h3 class="card-title">Data</h3>

                    <div class="card-tools">
                        <a href="/backoffice/pengguna/admin/tambah" class="btn btn-success btn-sm" title="Tambah Admin">
                            <i class="fas fa-plus"></i> Tambah
                        </a>

                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
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
                                {{-- <th>Foto</th> --}}
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Status Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($users as $key => $user)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                {{-- <td>
                                    @if ($user->foto)
                                    <img src="{{ asset('storage/images/user/'.$user->foto) }}" class="img-fluid rounded" style="width: 100px; height: 100px">
                                    @else
                                    <img src="{{ asset('images/profile.png') }}" class="img-fluid rounded" style="width: 100px; height: 100px">
                                    @endif
                                </td> --}}
                                <td>{{ $user->nama }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <h5>
                                        @if ($user->email_verified_at)
                                            <span class="badge badge-success">
                                                <i class="fas fa-check"></i> Terverifikasi
                                            </span>
                                        @else
                                            <span class="badge badge-danger">
                                                <i class="fas fa-times"></i> Belum Terverifikasi
                                            </span>
                                        @endif
                                    </h5>
                                </td>
                                <td>
                                    <button type="button" class="badge badge-light pl-2 pr-2" data-toggle="modal" data-target="#detail-{{ $user->id }}" title="Lihat detail">
                                        <i class="fa fa-eye"></i> Lihat
                                    </button>
                                    @if ($user->id != Auth::user()->id)
                                        <a href="/backoffice/pengguna/admin/hapus/{{ $user->id }}" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- modal --}}
                    @foreach ($users as $user)
                        @include('backoffice.pengguna.admin.modal.detail')
                        @include('backoffice.pengguna.admin.modal.hapus')
                    @endforeach
                </div>

            </div>

        </div>
    </div>

</section>

@endsection
