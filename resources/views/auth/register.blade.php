<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Register E-GUDANG</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
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
</body>
</html>
