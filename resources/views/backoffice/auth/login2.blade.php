<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/auth/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/auth/css/owl.carousel.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/auth/css/bootstrap.min.css') }}">
    
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('assets/auth/css/style.css') }}">

    <title>Sistem Akademik @yield('title')</title>

    {{-- icon web --}}
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.ico') }}">
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('images/bg-unpar.jpg'); background-size: cover;"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <div class="img">
                <img src="{{asset('images/unpar.png')}}" class="img-fluid mb-4" style="height: 100px; width: 100%;" alt="">
            </div>

            <h3>
                <b>Selamat Datang</b>
            </h3>
            <p class="mb-4">di Sistem Akademik Universitas Parahyangan</p>

            <div>
                @if(session('error'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                  <strong>Gagal </strong>{{ session('error') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif
            </div>

            <form action="/login" method="POST">
              @csrf
              <div class="form-group first">
                <label for="username">Email</label>
                <input type="text" name="email" class="form-control" placeholder="email@gmail.com" id="username">
                @if($errors->has('email'))
                        <span class="help-block text-danger mb-4">{{ $errors->first('email') }}</span>
                    @endif
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" id="password">
                @if($errors->has('password'))
                        <span class="help-block text-danger mb-4">{{ $errors->first('password') }}</span>
                    @endif
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <span class="ml-auto"><a href="/lupa-password" class="forgot-pass">Lupa Password</a></span> 
              </div>

              <input type="submit" value="Masuk" class="btn btn-block btn-primary">

            </form>
          </div>
        </div>
      </div>
    </div>

    
  </div>
    
    

    <script src="{{ asset('assets/auth/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/auth/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/auth/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/auth/js/main.js') }}"></script>
  </body>
</html>