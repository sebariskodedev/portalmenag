<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Bimas Katolik</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: OnePage
  * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <style>

    .search-container {
      float: right;
      margin-left: 20px;
      background-color: white;
    }

    .search-container form {
      border-radius: 30px; /* Adjust the value for different roundness */
      border: 1px solid #005faf;
      background-color: white;
    }

    .search-container button {
    float: right;
    margin-right: 16px;
    background: transparent;
    border: none;
    cursor: pointer;
    padding: 6px;
    border-radius: 100px; /* Adjust the value for different roundness */
    }

    .search-container button i {
    color: #005faf;
    }

    input[type=text] {
    padding: 6px;
    border: none;
    outline: none;
    /* color: grey; */
    /* background-color: transparent; */
    margin-left: 20px;
    border-radius: 100px; /* Adjust the value for different roundness */
    /* display: none; */
    }

    /* Optional: add a light border only when not typing */
    input[type="text"]:focus {
        border: none;
    }

    .map-container {
        position: relative;
        width: 100%;
        height: 270px; /* Same height as the iframe */
    }

    .qr-code {
        position: absolute;
        top: 2px; /* Adjust as needed */
        right: 2px; /* Adjust as needed */
        width: 80px; /* Set size of QR code */
        height: 80px; /* Set size of QR code */
        z-index: 1; /* Ensures it stays on top */
        background-color: white; /* Optional: add background for visibility */
        padding: 5px; /* Optional: add padding for a border effect */
        border-radius: 5px; /* Optional: add border radius */
    }

    @media screen and (max-width: 600px) {
    .search-container {
        float: right;
    }
    input[type=text], .search-container {
        float: none;
        display: block;
        text-align: left;
        width: 100%;
        margin: 0;
        padding: 6px;
    }
    .search-container button {
        display: none;
    }
    input[type=text] {
        border: 1px solid #ccc;  
    }
    }
    </style>

  @yield('style')  <!-- This will be replaced by the content of the child views -->

</head>

<body class="index-page" style="">

  <header id="header" class="header d-flex align-items-center sticky-top" style="background-color: #005faf;">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="{{ route('welcome') }}" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 style="color: white;" class="sitename">Bimas Katolik</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <!-- <li><a href="index.html#hero" class="active">Home</a></li> -->
          <li class="dropdown"><a style="color: white;" href="#"><span>Layanan</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a style="color: white;" href="{{ route('maklumat-pelayanan') }}">Maklumat Pelayanan</a></li>
              <li><a style="color: white;" href="{{ route('standard-pelayanan') }}">Standard Pelayanan</a></li>
            </ul>
          </li>
          <li class="dropdown"><a style="color: white;" href="#"><span>Data</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a style="color: white;" href="#">Sebaran</a></li>
              <li><a style="color: white;" href="#">Dataset</a></li>
            </ul>
          </li>
          <li class="dropdown"><a style="color: white;" href="#"><span>Bantuan</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a style="color: white;" href="#">Informasi Bantuan</a></li>
              <li><a style="color: white;" href="#">Bantuan Tersalurkan</a></li>
            </ul>
          </li>
          <li><a style="color: white;" href="{{ route('infografis') }}">Infografis</a></li>
          <li><a style="color: white;" href="{{ route('dumas') }}">Dumas</a></li>
          <li class="dropdown"><a style="color: white;" href="#"><span>Tentang Kami</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a style="color: white;" href="#">Struktur Organisasi</a></li>
              <li><a style="color: white;" href="{{ route('informasi-regulasi') }}">Informasi/Regulasi Penting</a></li>
              <li><a style="color: white;" href="{{ route('reformasi-birokrasi') }}">Reformasi Birokrasi</a></li>
              <li><a style="color: white;" href="#">PPID</a></li>
              <!-- <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li> -->
            </ul>
          </li>
          <li>
        </ul>
        <i style="color: white;" class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

        <!-- <a class="btn-getstarted" href="index.html#about">Get Started</a> -->

        <div class="search-container btn-getstarted" style="background-color: transparent;">
        <form action="/search">
            <input type="text" placeholder="Search.." name="query">
            <button><i class="bi bi-search"></i></button>
        </form>
        </div>

    </div>
  </header>

    @yield('content')  <!-- This will be replaced by the content of the child views -->

  <footer id="footer" class="footer light-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a style="color: white;" href="{{ route('welcome') }}" class="logo d-flex align-items-center">
            <span class="sitename">Bimas Katolik</span>
          </a>
          <p>Bimas Katolik Kemenag adalah situs resmi yang dikelola oleh Bimbingan Masyarakat Katolik di bawah Kementerian Agama Republik Indonesia. Website ini bertujuan untuk memberikan informasi terkait kegiatan, program, dan layanan bagi umat Katolik di Indonesia.</p>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
        <h4>Hubungi Kami</h4>
        <p>Jl. M.H. Thamrin No.6, RT.2/RW.1, Kb. Sirih, Kec. Menteng, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10340</p>
        <p class="mt-4"><strong>Telepon:</strong> <span>(+62) 213812344</span></p>
        <p><strong>Email:</strong> <span>bimaskatolik@kemenag.go.id</span></p>
        </div>

        <div class="col-lg-4 col-12 footer-links">
            <div class="map-container">
                <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d991.6509658103951!2d106.8219509696296!3d-6.183738799612725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f429238d2277%3A0xada86e5005b525d!2sDitjen%20Bimas%20Katolik%20Kemenag%20RI!5e0!3m2!1sid!2sid!4v1732705808147!5m2!1sid!2sid" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <img src="{{ asset('images/qr_maps.png') }}" alt="QR Code" class="qr-code">
            </div>
        </div>

      </div>
    </div>

    <div class="container footer-top" style="justify-content: center; display: flex;">
      <span style="font-size: 11px; color: #005faf;">© Copyright 2024. By DIREKTORAT JENDERAL BIMBINGAN MASYARAKAT KATOLIK</span>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

    @yield('script')  <!-- This will be replaced by the content of the child views -->

</body>

</html>