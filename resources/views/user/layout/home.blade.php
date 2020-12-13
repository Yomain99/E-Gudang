<!DOCTYPE html>
<html lang="en">

<head>
<style>
.nav-brand{
  width: 6%;

}
}

</style>
  <meta charset="UTF-8">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <!-- Title -->
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{ asset('user/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/responsive.css') }}" rel="stylesheet">
    
    <script src="{{ asset('user/js/html5shiv.js') }}"></script>
    <script src="{{ asset('user/js/respond.min.js') }}"></script>
    <link rel="shortcut icon" href="{{ asset('user/images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('user/images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('user/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('user/images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('user/images/ico/apple-touch-icon-57-precomposed.png') }}">
    
    <title>@yield('title')</title>
  <!-- Favicon -->
  <link rel="icon" href="{{ asset('favicon.ico') }}">
  <!-- Core Stylesheet -->
  <link rel="stylesheet" href="{{ asset('assets/style123.css') }}">
</head>

<body>
  <!-- Preloader -->
  <div class="preloader d-flex align-items-center justify-content-center">
    <div class="spinner"></div>
  </div>

  <!-- ##### Header Area Start ##### -->
  <header class="header-area">
    <!-- Top Header Area -->
    <div class="top-header-area">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="top-header-content d-flex align-items-center justify-content-between">
              <!-- Top Header Content -->
              <div class="top-header-meta">
                <p>Welcome to <span>E-GUDANG</span>, Percayakan produk anda kepada kami </p>
              </div>
              <!-- Top Header Content -->
              <div class="top-header-meta text-right">
                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Yoshaindra@YI@gmail.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> <span>Email: Yoshaindra@YI@gmail.com</span></a>
                <a href="#" data-toggle="tooltip" data-placement="bottom" title="+62 8801 3171 8801"><i class="fa fa-phone" aria-hidden="true"></i> <span>Call Us: +62 8801 3171 8801</span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Navbar Area -->
    <div class="famie-main-menu">
      <div class="classy-nav-container breakpoint-off">
        <div class="container">
          <!-- Menu -->
          <nav class="classy-navbar justify-content-between" id="famieNav">
            <!-- Nav Brand -->
            <a href="#" class="nav-brand"><img src="assets/images/logo.png" alt="" ></a>
            <!-- Navbar Toggler -->
            <div class="classy-navbar-toggler">
              <span class="navbarToggler"><span></span><span></span><span></span></span>
            </div>
            <!-- Menu -->
            <div class="classy-menu">
              <!-- Close Button -->
              <div class="classycloseIcon">
                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
              </div>
              <!-- Navbar Start -->
              <div class="classynav">
                <ul>
                  {{-- @include('user.layout.navbar') --}}
                  @guest
                  <li><a href="{{ url('/checkout') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                  <li><a href="{{ url('/sewa') }}"><i class="fa fa-shopping-cart"></i> Sewa</a></li>
                  <li><a href="{{ url('/') }}"><i class="fa fa-star"></i> Cari gudang</a></li>
                  @guest
                          <li>
                              <a href="{{ route('login') }}">{{ __('Login') }}</a>
                          </li>
                          
                          @if (Route::has('register'))
                          <li>
                              <a href="{{ route('register') }}">{{ __('Register') }}</a>
                          </li>
                          @endif
                          @else
                          <li>
                              <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                              aria-expanded="false">
                              <img src="images/img.jpg" alt="">@yield('akun')
                              <span class="fa fa-chevron-down"> {{ Auth::user()->name }}</span>
                          </a>
                          <ul class="dropdown-menu dropdown-usermenu pull-right">
                              <li><a href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right">
                                  </i>{{ __('Logout') }}</a></li>
                              </ul>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                              
                          </li>
                          @endguest
                          @else
                  @if (Auth::user()->id_role == 3)
                  <li><a href="{{ url('/sewa') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                  <li><a href="{{ url('/checkout') }}"><i class="fa fa-shopping-cart"></i> Sewa</a></li>
                  <li><a href="{{ url('/') }}"><i class="fa fa-star"></i> Cari gudang</a></li>
                  @guest
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                          </li>
                          
                          @if (Route::has('register'))
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                          </li>
                          @endif
                          
                          

                          @else
                          <li >
                              <a href="javascript:;" data-toggle="dropdown"
                              aria-expanded="false">
                              <img src="images/img.jpg" alt="">@yield('akun')
                              <span > {{ Auth::user()->name }}</span>
                          </a>
                              <li><a href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                                  
                          </li>
                          @endguest
                  @endif
                  @if (Auth::user()->id_role == 2)
                  <li><a href="{{ url('/halaman') }}"><i class="fa fa-user"></i> Manage</a></li>
                  @guest
                          <li>
                              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                          </li>
                          
                          @if (Route::has('register'))
                          <li >
                              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                          </li>
                          @endif
                          
                          

                          @else
                          <li >
                              <a href="javascript:;" data-toggle="dropdown"
                              aria-expanded="false">
                              <img src="images/img.jpg" alt="">@yield('akun')
                              <span > {{ Auth::user()->name }}</span>
                          </a>
                              <li><a href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                                  
                          </li>
                          @endguest
                  @endif
                  @if(Auth::user()->id_role == 1) 
                  <li><a href="{{ url('/halaman') }}"><i class="fa fa-user"></i> Manage</a></li>
                  @guest
                          <li>
                              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                          </li>
                          
                          @if (Route::has('register'))
                          <li>
                              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                          </li>
                          @endif
                          
                          

                          @else
                          <li>
                              <a href="javascript:;"  data-toggle="dropdown"
                              aria-expanded="false">
                              <img src="images/img.jpg" alt="">@yield('akun')
                              <span> {{ Auth::user()->name }}</span>
                          </a>
                              <li><a href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                              
                          </li>
                          @endguest
                  
                  @endif
                  @endguest

              <!-- Navbar End -->
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ##### Header Area End ##### -->

  <!-- ##### Hero Area Start ##### -->
  <div class="hero-area">
    <div class="welcome-slides owl-carousel">

      <!-- Single Welcome Slides -->
      <div class="single-welcome-slides bg-img bg-overlay jarallax">
        <img src="{{asset('assets/img/bg-img/p.jpg')}}">
      </div>

      <!-- Single Welcome Slides -->
      <div class="single-welcome-slides bg-img bg-overlay jarallax">
      <img src="{{asset('assets/img/bg-img/1.jpg')}}">
      </div>
            <!-- Single Welcome Slides -->
      <div class="single-welcome-slides bg-img bg-overlay jarallax">
      <img src="{{asset('assets/img/bg-img/d.jpg')}}">
      </div>

    </div>
  </div>
  <!-- ##### Hero Area End ##### -->

  <!-- ##### Famie Benefits Area Start ##### -->
  <section class="famie-benefits-area section-padding-100-0 pb-5">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="benefits-thumbnail mb-50">
            <img src="{{asset('assets/img/bg-img/2.jpg')}}" alt="">
          </div>
        </div>
      </div>

      <div class="row justify-content-center">
        <!-- Single Benefits Area -->
        <div class="col-12 col-sm-4 col-lg">
          <div class="single-benefits-area wow fadeInUp mb-50" data-wow-delay="100ms">
            <img src="{{asset('assets/img/core-img/digger.png')}}" alt="">
            <h5>Pelayanan Terbaik</h5>
          </div>
        </div>

        <!-- Single Benefits Area -->
        <div class="col-12 col-sm-4 col-lg">
          <div class="single-benefits-area wow fadeInUp mb-50" data-wow-delay="300ms">
            <img src="{{asset('assets/img/core-img/windmill.png')}}" alt="">
            <h5>Pengalaman Bertani</h5>
          </div>
        </div>

        <!-- Single Benefits Area -->
        <div class="col-12 col-sm-4 col-lg">
          <div class="single-benefits-area wow fadeInUp mb-50" data-wow-delay="500ms">
            <img src="{{asset('assets/img/core-img/cereals.png')}}" alt="">
            <h5>Gudang Terbaik</h5>
          </div>
        </div>

        <!-- Single Benefits Area -->
        <div class="col-12 col-sm-4 col-lg">
          <div class="single-benefits-area wow fadeInUp mb-50" data-wow-delay="700ms">
            <img src="{{asset('assets/img/core-img/tractor.png')}}" alt="">
            <h5>Penghasil Terbaik</h5>
          </div>
        </div>

        <!-- Single Benefits Area -->
        <div class="col-12 col-sm-4 col-lg">
          <div class="single-benefits-area wow fadeInUp mb-50" data-wow-delay="900ms">
            <img src="{{asset('assets/img/core-img/sunrise.png')}}" alt="">
            <h5>Gudang Ramah Lingkungan</h5>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ##### Famie Benefits Area End ##### -->
  <!-- ##### Contact Area End ##### -->
  </section>
    

    @include('user.layout.alert')
    
    @yield('content')

    <!-- Copywrite Area  -->
    <div class="copywrite-area">
      <div class="container">
        <div class="copywrite-text">
          <div class="row align-items-center">
            <div class="col-md-6">
              <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Copyright © 2020 E-Gudang Inc. All rights reserved. <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Yomain99</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- ##### Footer Area End ##### -->

  <!-- ##### All Javascript Files ##### -->
  <!-- jquery 2.2.4  -->
  <script src="{{ asset ('assets/js/jquery.min.js') }}"></script>
  <!-- Popper js -->
  <script src="{{ asset ('assets/js/popper.min.js') }}"></script>
  <!-- Bootstrap js -->
  <script src="{{ asset ('assets/js/bootstrap.min.js') }}"></script>
  <!-- Owl Carousel js -->
  <script src="{{ asset ('assets/js/owl.carousel.min.js')}}"></script>
  <!-- Classynav -->
  <script src="{{ asset ('assets/js/classynav.js')}}"></script>
  <!-- Wow js -->
  <script src="{{ asset ('assets/js/wow.min.js')}}"></script>
  <!-- Sticky js -->
  <script src="{{ asset ('assets/js/jquery.sticky.js')}}"></script>
  <!-- Magnific Popup js -->
  <script src="{{ asset ('assets/js/jquery.magnific-popup.min.js')}}"></script>
  <!-- Scrollup js -->
  <script src="{{ asset ('assets/js/jquery.scrollup.min.js')}}"></script>
  <!-- Jarallax js -->
  <script src="{{ asset ('assets/js/jarallax.min.js')}}"></script>
  <!-- Jarallax Video js -->
  <script src="{{ asset ('assets/js/jarallax-video.min.js')}}"></script>
  <!-- Active js -->
  <script src="{{ asset ('assets/js/active.js')}}"></script>
</body>

</html>