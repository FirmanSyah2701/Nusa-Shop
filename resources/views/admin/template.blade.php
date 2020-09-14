<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title> @yield('title') </title>
  <link href="{{url('assets/img/logo/logo.png')}}" rel="icon">
  <link href="{{url('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <link href="{{url('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{url('assets/flat/css/dataTables.bootstrap.css')}}" rel="stylesheet">
  <link href="{{url('assets/css/ruang-admin.min.css')}}" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" 
        href="{{route('dashboard')}}">
        <div class="sidebar-brand-text mx-3">Admin</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Fitur
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('category.index')}}">
          <i class="far fa-fw fa-list-alt"></i>
          <span>Data Kategori Barang</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('product.index')}}">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Data Barang</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('admin/customer')}}">
          <i class="fas fa-fw fa-user"></i>
          <span>Data Pelanggan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/confirmation')}}">
          <i class="fas fa-fw fa-check-square"></i>
          <span>Konfirmasi Pembayaran</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{route('capital')}}">
          <i class="fas fa-fw fa-dollar-sign"></i>
          <span>Modal</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{url('penjualan')}}">
          <i class="fas fa-fw fa-table"></i>
          <span>Laporan Penjualan</span>
        </a>
      </li>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" 
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="ml-2 d-none d-lg-inline text-white small">
                  Admin
                </span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" 
                aria-labelledby="userDropdown">
                {{-- <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div> --}}
                <a class="dropdown-item" href="{{route('logoutAdmin')}}">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->
    
        @show
        @yield('content')
  
    <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="{{url('assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{url('assets/vendor/bootstrap/js/bootstrap.js')}}"></script>
  <script src="{{url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{url('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{url('assets/js/ruang-admin.min.js')}}"></script>
  <script src="{{url('assets/flat/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{url('assets/flat/js/dataTables.bootstrap.min.js')}}"></script>
</body>
</html>