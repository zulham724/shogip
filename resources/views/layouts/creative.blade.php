<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UMKM Center</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('creative/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="{{ asset('creative/vendor/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <!-- Custom styles for this template -->
    <link href="{{ asset('creative/css/creative.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('css')

    <style type="text/css">
      /* Make the image fully responsive */
      .carousel-inner img {
          width: 100%;
          height: 100%;
      }
    </style>

  </head>

  <body id="page-top">

    <div id="app">
      
      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
          <a class="navbar-brand js-scroll-trigger" href="/">Showcase Digital</a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#map">Peta</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#about">Masuk</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#services">Layanan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#portfolio">Produk Unggulan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#contact">Kontak</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <header id="demo" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
          <li data-target="#demo" data-slide-to="0" class="active"></li>
          <li data-target="#demo" data-slide-to="1"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ asset('creative/img/slider1.jpeg') }}" alt="Showcase Digital UMKM Jawa Tengah">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('creative/img/slider2.jpeg') }}" alt="UMKM Jawa Tengah">
          </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>

      </header>

      <section class="bg-primary" id="about">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto text-center">
              <h2 class="section-heading text-white">Tentang Kami!</h2>
              <hr class="light my-4">
              <p class="text-faded mb-4">kami memberikan layanan informasi mengenai data UMKM yang ada di Jawa Tengah beserta Sistem Informasi Produk-produk unggulan.</p>
              <a class="btn btn-light btn-xl js-scroll-trigger" href="{{ route('login') }}">Masuk</a>
            </div>
          </div>
        </div>
      </section>

      <section id="services">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center">
              <h2 class="section-heading">Layanan</h2>
              <hr class="my-4">
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-6 text-center">
              <div class="service-box mt-5 mx-auto">
                <i class="fa fa-4x fa-map text-primary mb-3 sr-icon-1"></i>
                <h3 class="mb-3">Tampilan Menarik dengan Peta</h3>
                <p class="text-muted mb-0">Sistem Kami mendukung penuh Pemetaan dari Google Map agar mempermudah pencarian UMKM</p>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
              <div class="service-box mt-5 mx-auto">
                <i class="fa fa-4x fa-paper-plane text-primary mb-3 sr-icon-2"></i>
                <h3 class="mb-3">Sistem Informasi</h3>
                <p class="text-muted mb-0">Anda dapat sekaligus mendapat informasi mengenai Data UMKM beserta Produk-produk unggulan di Jawa Tengah</p>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
              <div class="service-box mt-5 mx-auto">
                <i class="fa fa-4x fa-code text-primary mb-3 sr-icon-3"></i>
                <h3 class="mb-3">Admin Panel</h3>
                <p class="text-muted mb-0">Kami menyediakan Panel Admin bagi calon pengusaha jika ingin mendaftarkan UMKMnya pada Sistem kami. Tentunya UMKM tersebut akan tampil di Peta Kami.</p>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
              <div class="service-box mt-5 mx-auto">
                <i class="fa fa-4x fa-heart text-primary mb-3 sr-icon-4"></i>
                <h3 class="mb-3">Layanan Sepenuh Hati</h3>
                <p class="text-muted mb-0">Layanan Kami akan selalu terbuka lebar bagi Calon-calon Pengusaha.</p>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      <section class="p-0" id="portfolio">
        <div class="container-fluid p-0">
          <div class="row no-gutters popup-gallery" id="lightgallery">
            <div class="col-lg-4 col-sm-6">
              <a class="portfolio-box" href="{{ asset('creative/img/portfolio/Banjarnegara Aneka Keramik.png') }}">
                <img class="img-fluid" src="{{ asset('creative/img/portfolio/Banjarnegara Aneka Keramik.png') }}" alt="">
                <div class="portfolio-box-caption">
                  <div class="portfolio-box-caption-content">
                    <div class="project-category text-faded">
                      UMKM 
                    </div>
                    <div class="project-name">
                      Banjarnegara Aneka Keramik
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-4 col-sm-6">
              <a class="portfolio-box" href="{{ asset('creative/img/portfolio/Blora - Bonggol Parquet Meubel.png') }}">
                <img class="img-fluid" src="{{ asset('creative/img/portfolio/Blora - Bonggol Parquet Meubel.png') }}" alt="">
                <div class="portfolio-box-caption">
                  <div class="portfolio-box-caption-content">
                    <div class="project-category text-faded">
                      UMKM
                    </div>
                    <div class="project-name">
                      Blora - Bonggol Parquet Meubel
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-4 col-sm-6">
              <a class="portfolio-box" href="{{ asset('creative/img/portfolio/Brebes Bawang Goreng.png') }}">
                <img class="img-fluid" src="{{ asset('creative/img/portfolio/Brebes Bawang Goreng.png') }}" alt="">
                <div class="portfolio-box-caption">
                  <div class="portfolio-box-caption-content">
                    <div class="project-category text-faded">
                      UMKM
                    </div>
                    <div class="project-name">
                      Brebes Bawang Goreng
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-4 col-sm-6">
              <a class="portfolio-box" href="{{ asset('creative/img/portfolio/Jepara Mebel Aksesories.png') }}">
                <img class="img-fluid" src="{{ asset('creative/img/portfolio/Jepara Mebel Aksesories.png') }}" alt="">
                <div class="portfolio-box-caption">
                  <div class="portfolio-box-caption-content">
                    <div class="project-category text-faded">
                      UMKM
                    </div>
                    <div class="project-name">
                      Jepara Mebel Aksesories
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-4 col-sm-6">
              <a class="portfolio-box" href="{{ asset('creative/img/portfolio/Batang Kapal Nelayan.png') }}">
                <img class="img-fluid" src="{{ asset('creative/img/portfolio/Batang Kapal Nelayan.png') }}" alt="">
                <div class="portfolio-box-caption">
                  <div class="portfolio-box-caption-content">
                    <div class="project-category text-faded">
                      UMKM
                    </div>
                    <div class="project-name">
                      Batang Kapal Nelayan
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-4 col-sm-6">
              <a class="portfolio-box" href="{{ asset('creative/img/portfolio/Banyumas Gula Semut.png') }}">
                <img class="img-fluid" src="{{ asset('creative/img/portfolio/Banyumas Gula Semut.png') }}" alt="">
                <div class="portfolio-box-caption">
                  <div class="portfolio-box-caption-content">
                    <div class="project-category text-faded">
                      UMKM
                    </div>
                    <div class="project-name">
                      Banyumas Gula Semut
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </section>

      {{-- map --}}
      <section class="masthead text-center text-black" id="map">
        {{-- <div class="container-fluid my-auto"> --}}
          @yield('content')
        {{-- </div> --}}
      </section>
      
      <section id="contact">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto text-center">
              <h2 class="section-heading">Anda tertarik?</h2>
              <hr class="my-4">
              <p class="mb-5">Kami dapat dihubungi melalui Email atau Nomor telepon dibawah ini</p>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4 ml-auto text-center">
              <i class="fas fa-phone fa-3x mb-3 sr-contact-1"></i>
              <p>+62 89682169754</p>
            </div>
            <div class="col-lg-4 mr-auto text-center">
              <i class="fas fa-envelope fa-3x mb-3 sr-contact-2"></i>
              <p>
                <a href="mailto:your-email@your-domain.com">info@ardata.co.id</a>
              </p>
            </div>
          </div>
        </div>
      </section>

      <div id="modalUmkm" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">

              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Detail UMKM</h4>
                      <button type="button" class="close" data-dismiss="modal">&times</button>
                  </div>
                  <div class="modal-body">
                      <div class="table-responsive">
                      <table class="table table-striped customdatatable">
                         
                      </table>
                      </div>
                  </div>
              </div>
              
          </div> 
      </div>

    </div> {{-- end id app --}}

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('creative/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('creative/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{ asset('creative/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('creative/vendor/scrollreveal/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('creative/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{ asset('creative/js/creative.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_PAWlz-pnuwslVgZq7sZ3ESbYkgqO56g&callback=initMap"  async defer></script> 
    <script type="text/javascript">
      // Add scrollspy to <body>
      $('body').scrollspy({target: ".navbar", offset: 50});

      $(()=>{
        // Add smooth scrolling on all links inside the navbar
        $("#navbarResponsive a").on('click', function(event) {
          // Make sure this.hash has a value before overriding default behavior
          if (this.hash !== "") {

            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
              scrollTop: $(hash).offset().top
            }, 800, function(){

            // Add hash (#) to URL when done scrolling (default click behavior)
              window.location.hash = hash;
            });

          } // End if

        });
      });
    </script>
    @yield('script')

  </body>

</html>
