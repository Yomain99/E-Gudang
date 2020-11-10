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
                <a href="#" data-toggle="tooltip" data-placement="bottom" title="infodeercreative@gmail.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> <span>Email: Yoshaindra@YI@gmail.com</span></a>
                <a href="#" data-toggle="tooltip" data-placement="bottom" title="+1 234 122 122"><i class="fa fa-phone" aria-hidden="true"></i> <span>Call Us: +62 8801 3171 8801</span></a>
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
                  <li><a href="{{ url('/checkout') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                  <li><a href="{{ url('/sewa') }}"><i class="fa fa-shopping-cart"></i> Sewa</a></li>
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
                              <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                              aria-expanded="false">
                              <img src="images/img.jpg" alt="">@yield('akun')
                              <span class=" fa fa-chevron-down"> {{ Auth::user()->name }}</span>
                          </a>
                          <ul >
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
                  @endif
                  @if (Auth::user()->id_role == 2)
                  <li><a href="{{ url('/home') }}"><i class="fa fa-user"></i> Manage</a></li>
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
                          <li>
                              <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                              aria-expanded="false">
                              <img src="images/img.jpg" alt="">@yield('akun')
                              <span class=" fa fa-chevron-down"> {{ Auth::user()->name }}</span>
                          </a>
                          <ul >
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
                  @endif
                  @if(Auth::user()->id_role == 1) 
                  <li><a href="{{ url('/home') }}"><i class="fa fa-user"></i> Manage</a></li>
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
                              <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                              aria-expanded="false">
                              <img src="images/img.jpg" alt="">@yield('akun')
                              <span class=" fa fa-chevron-down"> {{ Auth::user()->name }}</span>
                          </a>
                          <ul>
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
                  
                  @endif
                  @endguest
                <!-- </ul>
                    <ul class="dropdown">
                      <li><a href="index.html">Home</a></li>
                      <li><a href="about.html">About Us</a></li>
                      <li><a href="farming-practice.html">Farming Practice</a></li>
                      <li><a href="shop.html">Shop</a>
                        <ul class="dropdown">
                          <li><a href="our-product.html">Our Products</a></li>
                          <li><a href="shop.html">Shop</a></li>
                        </ul>
                      </li>
                      <li><a href="news.html">News</a>
                        <ul class="dropdown">
                          <li><a href="news.html">News</a></li>
                          <li><a href="news-details.html">News Details</a></li>
                        </ul>
                      </li>
                      <li><a href="contact.html">Contact</a></li>
                    </ul>
                  </li>
                  <li><a href="our-product.html">Our Product</a></li>
                  <li><a href="farming-practice.html">Farming Practice</a></li>
                  <li><a href="news.html">News</a></li>
                  <li><a href="contact.html">Contact</a></li>
                </ul> -->
                <!-- Search Icon -->
                <div id="searchIcon">
                  <i class="icon_search" aria-hidden="true"></i>
                </div>
                <!-- Cart Icon -->
                <div id="cartIcon">
                  <a href="#">
                    <i class="icon_cart_alt" aria-hidden="true"></i>
                    <span class="cart-quantity">2</span>
                  </a>
                </div>
              </div>
              <!-- Navbar End -->
            </div>
          </nav>
          <div class="search-form">
            <form action="#" method="get">
              <input type="search" name="search" id="search" placeholder="Type keywords &amp; press enter...">
              <button type="submit" class="d-none"></button>
            </form>
            <!-- Close Icon -->
            <div class="closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
          </div>
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
        <img src="assets/img/bg-img/1.jpg">
        <div class="container h-100">
          <div class="row h-100 align-items-center">
            <div class="col-12 col-lg-10">
              <div class="welcome-content">
                <h2 data-animation="fadeInUp" data-delay="200ms">The hearth of the farm is the true center of our universe.</h2>
                <p data-animation="fadeInUp" data-delay="400ms">Mauris vestibulum dolor nec lacinia facilisis. Fusce interdum sagittis volutpat. Praesent eget varius ligula, malesuada eleifend purus. Aenean euismod est at mauris mollis ultricies.
                  Morbi arcu mi, dictum eu luala, dapibus
                  interdum mollis.</p>
                <a href="#" class="btn famie-btn mt-4" data-animation="bounceInUp" data-delay="600ms">Contact Us</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Single Welcome Slides -->
      <div class="single-welcome-slides bg-img bg-overlay jarallax">
      <img src="assets/img/bg-img/G.jpg">
        <div class="container h-100">
          <div class="row h-100 align-items-center">
            <div class="col-12 col-lg-10">
              <div class="welcome-content">
                <h2 data-animation="fadeInDown" data-delay="200ms">The hearth of the farm is the true center of our universe.</h2>
                <p data-animation="fadeInDown" data-delay="400ms">Mauris vestibulum dolor nec lacinia facilisis. Fusce interdum sagittis volutpat. Praesent eget varius ligula, malesuada eleifend purus. Aenean euismod est at mauris mollis ultricies.
                  Morbi arcu mi, dictum eu luala, dapibus
                  interdum mollis.</p>
                <a href="#" class="btn famie-btn mt-4" data-animation="bounceInDown" data-delay="600ms">Contact Us</a>
              </div>
            </div>
          </div>
        </div>
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
            <img src="assets/img/bg-img/2.jpg" alt="">
          </div>
        </div>
      </div>

      <div class="row justify-content-center">
        <!-- Single Benefits Area -->
        <div class="col-12 col-sm-4 col-lg">
          <div class="single-benefits-area wow fadeInUp mb-50" data-wow-delay="100ms">
            <img src="assets/img/core-img/digger.png" alt="">
            <h5>Best Services</h5>
          </div>
        </div>

        <!-- Single Benefits Area -->
        <div class="col-12 col-sm-4 col-lg">
          <div class="single-benefits-area wow fadeInUp mb-50" data-wow-delay="300ms">
            <img src="assets/img/core-img/windmill.png" alt="">
            <h5>Farm Experiences</h5>
          </div>
        </div>

        <!-- Single Benefits Area -->
        <div class="col-12 col-sm-4 col-lg">
          <div class="single-benefits-area wow fadeInUp mb-50" data-wow-delay="500ms">
            <img src="assets/img/core-img/cereals.png" alt="">
            <h5>100% Natural</h5>
          </div>
        </div>

        <!-- Single Benefits Area -->
        <div class="col-12 col-sm-4 col-lg">
          <div class="single-benefits-area wow fadeInUp mb-50" data-wow-delay="700ms">
            <img src="assets/img/core-img/tractor.png" alt="">
            <h5>Farm Equipment</h5>
          </div>
        </div>

        <!-- Single Benefits Area -->
        <div class="col-12 col-sm-4 col-lg">
          <div class="single-benefits-area wow fadeInUp mb-50" data-wow-delay="900ms">
            <img src="assets/img/core-img/sunrise.png" alt="">
            <h5>Organic food</h5>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ##### Famie Benefits Area End ##### -->
  <!-- ##### Contact Area End ##### -->

  <!-- ##### News Area Start ##### -->
  <section class="news-area bg-gray section-padding-100-0">
    <div class="container">
      <div class="row">

        <!-- Featured Post Area -->
        <div class="col-14 col-lg-6">
          <div class="featured-post-area mb-100 wow fadeInUp" data-wow-delay="100ms">
            <img src="img/bg-img/17.jpg" alt="">
            <!-- Post Content -->
            <div class="post-content">
              <h6>Post on <a href="#">18 Aug 2018</a> / <a href="#">Carlos Bacca</a></h6>
              <a href="#" class="post-title">Why innovation is key to maintaining our export market share</a>
            </div>
          </div>
        </div>

        <!-- Single Blog Area -->
        <div class="col-12 col-lg-6 mb-100">

          <!-- Single Blog Area -->
          <div class="single-blog-area style-2 wow fadeInUp" data-wow-delay="300ms">
            <!-- Post Content -->
            <div class="post-content">
              <h6>Post on <a href="#">18 Aug 2018</a> / <a href="#">Peter Crough</a></h6>
              <a href="#" class="post-title">Rising cattle supplies see beef export lifted</a>
              <p>Maecenas facilisis quam orcit, velo porttitor arcu egestas eu. Maecenas donald imperdiet nibh, quis. Etiam non scelerisque exited sagittis...</p>
            </div>
          </div>

          <!-- Single Blog Area -->
          <div class="single-blog-area style-2 wow fadeInUp" data-wow-delay="500ms">
            <!-- Post Content -->
            <div class="post-content">
              <h6>Post on <a href="#">18 Aug 2018</a> / <a href="#">Peter Crough</a></h6>
              <a href="#" class="post-title">Cattle marts: Cows take a hit at the ringside</a>
              <p>Maecenas facilisis quam orcit, velo porttitor arcu egestas eu. Maecenas donald imperdiet nibh, quis. Etiam non scelerisque exited sagittis...</p>
            </div>
          </div>

          <!-- Single Blog Area -->
          <div class="single-blog-area style-2 wow fadeInUp" data-wow-delay="700ms">
            <!-- Post Content -->
            <div class="post-content">
              <h6>Post on <a href="#">18 Aug 2018</a> / <a href="#">Peter Crough</a></h6>
              <a href="#" class="post-title">Malting barley price set to commence</a>
              <p>Maecenas facilisis quam orcit, velo porttitor arcu egestas eu. Maecenas donald imperdiet nibh, quis. Etiam non scelerisque exited sagittis...</p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
    

    @include('user.layout.alert')
    
    @yield('content')






  <!-- ##### Footer Area Start ##### -->
  <footer class="footer-area">
    <!-- Main Footer Area -->
    <div class="main-footer bg-img bg-overlay section-padding-80-0" style="background-image: url(img/bg-img/3.jpg);">
      <div class="container">
        <div class="row">

          <!-- Single Footer Widget Area -->
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="footer-widget mb-80" >
              <a href="#" class="foo-logo d-block mb-10"><img src="img/core-img/logo2.png" alt="" ></a>
              <p>Lorem ipsum dolor sit amet, consecte stare adipiscing elit. In act honcus risus atiner Pellentesque risus.</p>
              <div class="contact-info">
                <p><i class="fa fa-map-pin" aria-hidden="true"></i><span>120 Raymond Rd, New York</span></p>
                <p><i class="fa fa-envelope" aria-hidden="true"></i><span>info.deercreative@gmail.com</span></p>
                <p><i class="fa fa-phone" aria-hidden="true"></i><span>+84 223 9000</span></p>
              </div>
            </div>
          </div>

          <!-- Single Footer Widget Area -->
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="footer-widget mb-80">
              <h5 class="widget-title">QUICK LINK</h5>
              <!-- Footer Widget Nav -->
              <nav class="footer-widget-nav">
                <ul>
                  <li><a href="#">Purchase</a></li>
                  <li><a href="#">Policities</a></li>
                  <li><a href="#">Shipping</a></li>
                  <li><a href="#">FAQs</a></li>
                  <li><a href="#">Return</a></li>
                  <li><a href="#">Careers</a></li>
                  <li><a href="#">Payments</a></li>
                  <li><a href="#">Partners</a></li>
                  <li><a href="#">Guide</a></li>
                  <li><a href="#">Standard</a></li>
                  <li><a href="#">News</a></li>
                  <li><a href="#">Brands</a></li>
                </ul>
              </nav>
            </div>
          </div>

          <!-- Single Footer Widget Area -->
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="footer-widget mb-80">
              <h5 class="widget-title">RECENT NEWS</h5>

              <!-- Single Recent News Start -->
              <div class="single-recent-blog d-flex align-items-center">
                <div class="post-thumbnail">
                  <img src="img/bg-img/4.jpg" alt="">
                </div>
                <div class="post-content">
                  <a href="#" class="post-title">WA’s largest farming business on the market</a>
                  <div class="post-date">18 Aug 2018</div>
                </div>
              </div>

              <!-- Single Recent News Start -->
              <div class="single-recent-blog d-flex align-items-center">
                <div class="post-thumbnail">
                  <img src="img/bg-img/5.jpg" alt="">
                </div>
                <div class="post-content">
                  <a href="#" class="post-title">Beef retail prices hit a record</a>
                  <div class="post-date">18 Aug 2018</div>
                </div>
              </div>

            </div>
          </div>

          <!-- Single Footer Widget Area -->
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="footer-widget mb-80">
              <h5 class="widget-title">STAY CONNECTED</h5>
              <!-- Footer Social Info -->
              <div class="footer-social-info">
                <a href="#">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                  <span>Facebook</span>
                </a>
                <a href="#">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                  <span>Twitter</span>
                </a>
                <a href="#">
                  <i class="fa fa-pinterest" aria-hidden="true"></i>
                  <span>Pinterest</span>
                </a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

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