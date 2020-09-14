<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <link rel="stylesheet" href="{{url('asstes/plugins/jquery-ui/jquery-ui.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/plugins/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/plugins/slick-carousel/slick/slick.css')}}">
  <link rel="stylesheet" href="{{url('assets/plugins/slick-carousel/slick/slick-theme.css')}}">
  <link rel="stylesheet" href="{{url('plugins/fancybox/jquery.fancybox.pack.css')}}">
  <link rel="stylesheet" href="{{url('assets/plugins/jquery-nice-select/css/nice-select.css')}}">
  <link rel="stylesheet" href="{{url('assets/plugins/seiyria-bootstrap-slider/dist/css/bootstrap-slider.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.css">
  <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
</head>
<style>
  p{
    color: black;
  }
</style>
<body>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="navbar navbar-expand-lg navbar-light navigation">
            <a class="navbar-brand" href="{{url('/')}}">
              Nusa Shop
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" 
              data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
              aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav main-nav ">
                <li class="nav-item active">
                  <a class="nav-link" href="{{url('/')}}">Beranda</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('about')}}">Tentang Toko</a>
                </li>
                @if(session('customer_id'))
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('riwayatCheckout')}}">Riwayat Checkout</a>
                  </li>
                @endif
              </ul>
              
              <ul class="navbar-nav ml-auto">
                @if(session('customer_id'))
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('cart')}}">Keranjang</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('profile')}}">Profile</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link login-button" href="{{route('logoutCustomer')}}">Logout</a>
                  </li>
                @else
                  <li class="nav-item">
                    <a class="nav-link login-button" href="{{route('showLoginCustomer')}}">Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link login-button" href="{{route('showRegisterCustomer')}}">Register</a>
                  </li>
                @endif
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </section>

  @show
  @yield('content')

  <footer class="footer section section-sm">
    <!-- Container Start -->
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-7 offset-md-1 offset-lg-0">
          <!-- About -->
          <div class="block about">
            <!-- footer logo -->
            <img src="images/logo-footer.png" alt="">
            <!-- description -->
            <p class="alt-color">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
              incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
              laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
        </div>
        <!-- Link list -->
        <div class="col-lg-2 offset-lg-1 col-md-3">
          <div class="block">
            <h4>Site Pages</h4>
            <ul>
              <li><a href="#">Boston</a></li>
              <li><a href="#">How It works</a></li>
              <li><a href="#">Deals & Coupons</a></li>
              <li><a href="#">Articls & Tips</a></li>
              <li><a href="terms-condition.html">Terms & Conditions</a></li>
            </ul>
          </div>
        </div>
        <!-- Link list -->
        <div class="col-lg-2 col-md-3 offset-md-1 offset-lg-0">
          <div class="block">
            <h4>Admin Pages</h4>
            <ul>
              <li><a href="category.html">Category</a></li>
              <li><a href="single.html">Single Page</a></li>
              <li><a href="store.html">Store Single</a></li>
              <li><a href="single-blog.html">Single Post</a>
              </li>
              <li><a href="blog.html">Blog</a></li>
            </ul>
          </div>
        </div>
        <!-- Promotion -->
        <div class="col-lg-4 col-md-7">
          <!-- App promotion -->
          <div class="block-2 app-promotion">
            <div class="mobile d-flex">
              <a href="">
                <!-- Icon -->
                <img src="images/footer/phone-icon.png" alt="mobile-icon">
              </a>
              <p>Get the Dealsy Mobile App and Save more</p>
            </div>
            <div class="download-btn d-flex my-3">
              <a href="#"><img src="images/apps/google-play-store.png" class="img-fluid" alt=""></a>
              <a href="#" class=" ml-3"><img src="images/apps/apple-app-store.png" class="img-fluid" alt=""></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Container End -->
  </footer>
  <!-- Footer Bottom -->
  <footer class="footer-bottom">
    <!-- Container Start -->
    <div class="container">
        <!-- Copyright -->
        <div class="copyright">
          <p>Copyright © Nusa Shop <script>
              var CurrentYear = new Date().getFullYear()
              document.write(CurrentYear)
              </script>. All Rights Reserved</p>
        </div>
    </div>
    <!-- Container End -->
  </footer>

  <script src="{{asset('js/app.js')}}"></script>
  <script src="{{url('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
  <script src="{{url('assets/plugins/tether/js/tether.min.js')}}"></script>
  <script src="{{url('assets/plugins/raty/jquery.raty-fa.js')}}"></script>
  <script src="{{url('assets/plugins/bootstrap/dist/js/popper.min.js')}}"></script>
  <script src="{{url('assets/plugins/seiyria-bootstrap-slider/dist/bootstrap-slider.min.js')}}"></script>
  <script src="{{url('assets/plugins/slick-carousel/slick/slick.min.js')}}"></script>
  <script src="{{url('assets/plugins/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
  <script src="{{url('assets/plugins/fancybox/jquery.fancybox.pack.js')}}"></script>
  <script src="{{url('assets/plugins/smoothscroll/SmoothScroll.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/selectize.min.js"></script>
  <script src="{{url('assets/js/scripts.js')}}"></script>
</body>
</html>