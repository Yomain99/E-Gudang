<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Register E-GUDANG</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
      <!-- Bootstrap -->
      <link href="{{ asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('assets/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset('assets/vendors/animate.css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet">

    <!-- ESHOPPER -->
    <link href="{{ asset('assets/eshopper/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/eshopper/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/eshopper/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/eshopper/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/eshopper/css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/eshopper/css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/eshopper/css/responsive.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{ asset('assets/eshopper/images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('assets/eshopper/images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('assets/eshopper/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('assets/eshopper/images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('assets/eshopper/images/ico/apple-touch-icon-57-precomposed.png') }}">
</head>
</head>
<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="assets/images/login.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <img src="assets/images/logo.png" alt="logo" class="logo">
              <p class="login-card-description">Sign into your account</p>
			        	<form action="{{url('user/store')}}" method="post">
                  <div class="form-group">
                    @csrf
                    <div class="form-group">
                    <input type="text"  class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name"/>
                    @error('name') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <input type="text" class="form-control" name="user_address" placeholder="User Address"/>
                    @error('user_address') <div class="invalid-feedback">{{$message}}</div> @enderror
                  </div>
                  <div class="form-group">
                  <input type="text" class="form-control" name="email" placeholder="Email" />
                  @error('email') <div class="invalid-feedback">{{$message}}</div> @enderror
                  </div>
                  <div class="form-group">
                  <input type="text" class="form-control" name="phone" placeholder="Telphone"/>
                    @error('phone') <div class="invalid-feedback">{{$message}}</div> @enderror
                 </div>
                  <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="Password"/>
                     @error('password') <div class="invalid-feedback">{{$message}}</div> @enderror
                 </div>
                 <div class="form-group">
                 <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password"/>
                 @error('confirmpassword') <div class="invalid-feedback">{{$message}}</div> @enderror
                 </div>
                <button type="submit" class="btn btn-block login-btn mb-4">Register</button>
                </form>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p>Copyright © 2020 E-Gudang Inc. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('user/js/jquery.js') }}"></script>
    <script src="{{ asset('user/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('user/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('user/js/price-range.js') }}"></script>
    <script src="{{ asset('user/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('user/js/main.js') }}"></script>
</body>
</html>
