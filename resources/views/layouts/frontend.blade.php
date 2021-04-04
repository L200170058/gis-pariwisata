
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>GIS PARIWISATA | {{ $title }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('bluesky')}}/assets/img/klaten.png" rel="icon">
  <link href="{{ asset('bluesky')}}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <link href="{{ asset('Leaflet') }}/LeafletFullscreen/Control.FullScreen.css" rel="stylesheet">

  <script src="{{ asset('bluesky')}}/js/jquery-3.3.1.min.js"></script>
  <script src="{{ asset('bluesky')}}/js/bootstrap.min.js"></script>
  
  <!-- Vendor CSS Files -->
  <link href="{{ asset('bluesky')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('bluesky')}}/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="{{ asset('bluesky')}}/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="{{ asset('bluesky')}}/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="{{ asset('bluesky')}}/assets/vendor/nivo-slider/css/nivo-slider.css" rel="stylesheet">
  <link href="{{ asset('bluesky')}}/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="{{ asset('bluesky')}}/assets/vendor/venobox/venobox.css" rel="stylesheet">


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <!-- Template Main CSS File -->
  <link href="{{ asset('bluesky')}}/assets/css/style.css" rel="stylesheet">

   <!-- Vendor JS Files -->
  <script src="{{ asset('bluesky')}}/assets/vendor/jquery/jquery.min.js"></script>
  <script src="{{ asset('bluesky')}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('bluesky')}}/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="{{ asset('bluesky')}}/assets/vendor/php-email-form/validate.js"></script>
  <script src="{{ asset('bluesky')}}/assets/vendor/appear/jquery.appear.js"></script>
  <script src="{{ asset('bluesky')}}/assets/vendor/knob/jquery.knob.js"></script>
  <script src="{{ asset('bluesky')}}/assets/vendor/parallax/parallax.js"></script>
  <script src="{{ asset('bluesky')}}/assets/vendor/wow/wow.min.js"></script>
  <script src="{{ asset('bluesky')}}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{ asset('bluesky')}}/assets/vendor/nivo-slider/js/jquery.nivo.slider.js"></script>
  <script src="{{ asset('bluesky')}}/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="{{ asset('bluesky')}}/assets/vendor/venobox/venobox.min.js"></script>

  <!-- Leaflet -->
  <link href="{{ asset('Leaflet') }}/LeafletJS/leaflet.css" rel="stylesheet">
  <script src="{{ asset('Leaflet') }}/LeafletJS/leaflet.js"></script>
  <link href="{{ asset('Leaflet') }}/LeafletFullscreen/Control.FullScreen.css" rel="stylesheet">
  <link href="{{ asset('Leaflet') }}/LeafletZoomHome/dist/leaflet.zoomhome.css" rel="stylesheet">
  <link href="{{ asset('Leaflet') }}/LeafletLocateControl/dist/L.Control.Locate.css" rel="stylesheet">
  <link href="{{ asset('Leaflet') }}/LeafletPolylineMeasure/Leaflet.PolylineMeasure.css" rel="stylesheet">
  <link href="{{ asset('Leaflet') }}/LeafletSearch/src/leaflet-search.css" rel="stylesheet">


  <script src="{{ asset('Leaflet') }}/LeafletAjax/dist/leaflet.ajax.js"></script>
  <script src="{{ asset('Leaflet') }}/LeafletFullscreen/Control.FullScreen.js"></script>
  <script src="{{ asset('Leaflet') }}/LeafletZoomHome/dist/leaflet.zoomhome.js"></script>
  <script src="{{ asset('Leaflet') }}/LeafletLocateControl/dist/L.Control.Locate.min.js"></script>
  <script src="{{ asset('Leaflet') }}/LeafletPolylineMeasure/Leaflet.PolylineMeasure.js"></script>
  <script src="{{ asset('Leaflet') }}/LeafletSearch/src/leaflet-search.js"></script>


  <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="crossorigin=""></script> -->

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
      
   

</head>

<body data-spy="scroll" data-target="#navbar-example">

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex">

      <div class="logo mr-auto">
        <h5 class="text-light"><a class="navbar-brand" href="/"><img src="{{ asset('bluesky')}}/assets/img/klaten.png" width="40px" height="40px" /><span> GIS </span>PARIWISATA KLATEN</a></h5>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="nav-item "><a href="/">Home</a></li>
          <li><a href="/peta">Pemetaan</a></li>
          <li class="nav-item "><a href="/pariwisata">Pariwisata</a></li>
          {{-- <li class="drop-down"><a href="">Jenis</a>
             <ul>
                @foreach ($jenis as $data)
                <li><a href="/jenis/{{ $data->id_jenis }}" class="dropdown-item">{{ $data->jenis }}</a></li>
                @endforeach
             </ul>
          </li> --}}
          {{-- <li class="drop-down"><a href="">Kecamatan</a>
             <ul>
                @foreach ($kecamatan as $data)
                <li><a href="/kecamatan/{{ $data->id_kecamatan }}" class="dropdown-item">{{ $data->kecamatan }}</a></li>
                @endforeach
             </ul>
          </li> --}}
          <li><a href="/about">About</a></li>
          <li><a type="button" class="btn btn-primary" href="{{ route('login') }}">Login</a></li>
       </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  

  <main id="main">

    <!-- ======= Services Section ======= -->
    <div id="services" class="services-area area-padding">
      <div class="container">
        <br>
        <br>
        <h5>{{ $title }}</h5>

         @yield('content')

      </div>
    </div><!-- End Services Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer>
    <div class="footer-area">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <div class="footer-logo">
                  <h2>KLATEN</h2>
                </div>

                <p>Kota yang terkenal dengan slogan bersinar mempunyai kekayaan alam yang melimpah. kekayaan tersebut dikelola oleh pemerintah daerah setempat untuk dikelola dan dijadikan objek wisata agar lebih berguna bagi berbagai kalangan</p>
               
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-4 col-sm-4 col-xs-12">
          </div>
          <!-- end single footer -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <h4>Hubungi Kami</h4>
                </div>
                <div class="footer-icons">
                  <ul>
                    <li>
                      <a href="https://www.facebook.com/KotaKlatenBesinar/"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                      <a href="https://klatenkab.go.id/"><i class="fa fa-globe"></i></a>
                    </li>
                    <li>
                      <a href="http://wa.me/+6285155193511"><i class="fa fa-phone"></i></a>
                    </li>
                    <li>
                      <a href="http://instagram.com/sidiq_stex"><i class="fa fa-instagram"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-area-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="copyright text-center">
              <p>
                &copy; Copyright <strong>eBusiness</strong>. All Rights Reserved
              </p>
            </div>
            <div class="credits">
              <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=eBusiness
            -->
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>



  <!-- Template Main JS File -->
  <script src="{{ asset('bluesky')}}/assets/js/main.js"></script>

</body>

</html>