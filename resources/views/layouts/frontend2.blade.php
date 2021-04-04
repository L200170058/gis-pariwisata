
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Gis Pemetaan | {{ $title }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('bluesky')}}/assets/img/klaten.png" rel="icon">
  <link href="{{ asset('bluesky')}}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('bluesky')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('bluesky')}}/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="{{ asset('bluesky')}}/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="{{ asset('bluesky')}}/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="{{ asset('bluesky')}}/assets/vendor/nivo-slider/css/nivo-slider.css" rel="stylesheet">
  <link href="{{ asset('bluesky')}}/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="{{ asset('bluesky')}}/assets/vendor/venobox/venobox.css" rel="stylesheet">
  
  <!-- Template Main CSS File -->
  <link href="{{ asset('bluesky')}}/assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="crossorigin=""></script>

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
      
  <link href="{{ asset('Leaflet') }}/LeafletFullscreen/Control.FullScreen.css" rel="stylesheet">
  <script src="{{ asset('Leaflet') }}/LeafletFullscreen/Control.FullScreen.js"></script>

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

  <!-- =======================================================
  * Template Name: eBusiness - v2.2.1
  * Template URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
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
       </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Slider Section ======= -->
  <div id="home" class="slider-area">
    <div class="bend niceties preview-2">
      <div id="ensign-nivoslider" class="slides">
        <img src="{{ asset('bluesky')}}/bannerfix.png" alt="" title="#slider-direction-1" />
      </div>

      <!-- direction 1 -->
      <div id="slider-direction-1" class="slider-direction slider-one">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow animate__slideInDown animate__animated" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1">Sistem Informasi Geografi </h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow animate__fadeIn animate__animated" data-wow-duration="2s" data-wow-delay=".2s">
                  <h1 class="title2">Pemetaan Pariwisata Kabupaten Klaten</h1>
                </div>
                <div class="layer-1-3 hidden-xs wow animate__slideInUp animate__animated" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="/peta">Buka Maps</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- End Slider -->
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>
  <!-- Template Main JS File -->
  <script src="{{ asset('bluesky')}}/assets/js/main.js"></script>

</body>

</html>