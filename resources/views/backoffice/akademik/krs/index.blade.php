@extends('backoffice.layout.main')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Kartu Rencana Studi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/dashboard">Beranda</a></li>
                    <li class="breadcrumb-item active">Kartu Rencana Studi</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">

    <div class="row">
        @if ( auth()->user()->semester == 1 )
            @include('backoffice.akademik.krs.card.semester1')
        @elseif ( auth()->user()->semester == 1 || auth()->user()->semester == 2 )
            @include('backoffice.akademik.krs.card.semester1')
            @include('backoffice.akademik.krs.card.semester2')
        @elseif ( auth()->user()->semester == 1 || auth()->user()->semester == 2 || auth()->user()->semester == 3 )
            @include('backoffice.akademik.krs.card.semester1')
            @include('backoffice.akademik.krs.card.semester2')
            @include('backoffice.akademik.krs.card.semester3')
        @endif
    </div>

</section>

@endsection
