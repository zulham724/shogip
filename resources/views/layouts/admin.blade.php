<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Admin Shogit</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="robots" content="all,follow">
  <!-- Bootstrap  CSS-->
  <link rel="stylesheet" href="{{ asset('distribution/vendor/bootstrap/css/bootstrap.min.css') }}">
  <!-- Font Awesome CSS-->
  <link rel="stylesheet" href="{{ asset('distribution/vendor/font-awesome/css/font-awesome.min.css') }}">
  <!-- Google fonts - Poppins -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="{{ asset('distribution/css/style.default.css') }}" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="{{ asset('distribution/css/custom.css') }}">
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.2/themes/fontawesome-stars-o.min.css">
  <!-- Favicon-->
  <link rel="shortcut icon" href="img/favicon.ico">

  <style type="text/css">
    .select2 span { display:block }
  </style>

  
@yield('css')
</head>
<body>
  <div class="page">
    <!-- Main Navbar-->
    <header class="header">
      <nav class="navbar">
        <div class="container-fluid">
          <div class="navbar-holder d-flex align-items-center justify-content-between">
            <!-- Navbar Header-->
            <div class="navbar-header">
              <!-- Navbar Brand --><a href="{{route('homeumkm')}}" class="navbar-brand d-none d-sm-inline-block">
                <div class="brand-text d-none d-lg-inline-block"><span>Shogit </span><strong>Dashboard</strong></div>
                <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>SD</strong></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Logout    -->
                <li class="nav-item">
                  <a href="#" onclick="logout()" class="nav-link logout"> <span class="d-none d-sm-inline">Logout</span><i class="fa fa-sign-out"></i></a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="page-content d-flex align-items-stretch"> 
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="{{ asset('distribution/img/avatar.png') }}" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
              <h1 class="h3">Shogit</h1>
              <p>Web Admin</p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
          <ul class="list-unstyled">

            <li {{ Request::is('home') ? 'class=active' : '' }}>
              <a href="{{ route ('home') }}"> <i class="fa fa-home"></i>Home </a>
            </li>

            <li {{ Request::is('users') ? 'class=active' : '' }}>
              <a href="{{ url('users') }}"><i class="fa fa-users"></i>User</a>
            </li>

            {{-- <li {{ Request::is('biodatas') ? 'class=active' : '' }}>
              <a href="{{ url('biodatas') }}"><i class="fa fa-address-book"></i>Biodata</a>
            </li> --}}

            <li><a href="#areadropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-windows"></i>Wilayah</a>
              <ul id="areadropdown" class="collapse list-unstyled">
                <li><a href="{{ url('states') }}"><i class="fa fa-caret-right"></i>Provinsi</a></li>
                <li><a href="{{ url('cities') }}"><i class="fa fa-caret-right"></i>Kota</a></li>
                <li><a href="{{ url('districts') }}"><i class="fa fa-caret-right"></i>Kecamatan/Daerah</a></li>
              </ul>
            </li>

            <li><a href="#umkmdropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-windows"></i>UMKM</a>
              <ul id="umkmdropdown" class="collapse list-unstyled">
                <li><a href="{{ url('umkmcategories') }}"><i class="fa fa-caret-right"></i>Kategori UMKM</a></li>
                <li><a href="{{ url('umkmlegalities') }}"><i class="fa fa-caret-right"></i>Legalitas UMKM</a></li>
                <li><a href="{{ url('umkms') }}"><i class="fa fa-caret-right"></i>Data UMKM</a></li>
                <li><a href="{{ url('products') }}"><i class="fa fa-caret-right"></i>Data Produk</a></li>
                <li><a href="{{ url('productimages') }}"><i class="fa fa-caret-right"></i>Data Gambar Produk</a></li>
              </ul>
            </li>
            

          </ul>

        </nav>
        <div class="content-inner" id="app">
          @yield('content')
          <!-- Page Footer-->
          <footer class="main-footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <p>Your company &copy; 2017-2019</p>
                </div>
                <div class="col-sm-6 text-right">
                  <p>Design by <a href="https://bootstrapious.com/admin-templates" class="external">Shogit</a></p>
                  <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{ asset('distribution/vendor/jquery/jquery.min.js') }}"></script>
    {{-- <script src="{{ asset('distribution/vendor/popper.js/umd/popper.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('distribution/vendor/bootstrap/js/bootstrap.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('distribution/vendor/jquery-validation/jquery.validate.min.js') }}"></script> --}}
    <script type="text/javascript" src="{{ asset('distribution/js/front.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.2/jquery.barrating.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.26.12/sweetalert2.all.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.14.0/printThis.min.js"></script>

    <script type="text/javascript">
      var table; 
      $(document).ready(function(){

        table = $('.datatable').DataTable({

        });

        $('.select2').select2();

        $('.rating').barrating({
          theme: 'fontawesome-stars-o'
        });


      });

      const logout = ()=>{
        swal({
          type:"info",
          title: "Logout from here?",
          confirmButtonText: "<i class='fa fa-thumbs-up'></i> Yes, Log me out",
          showCancelButton:true,
          cancelButtonColor: '#d33',
          cancelButtonText: "<i class='fa fa-close'></i> Cancel"
        }).then(res=>{
          if(res.value){
            $("#logout-form").submit();
          }
        });
      }

    </script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('script')
  </body>
  </html>