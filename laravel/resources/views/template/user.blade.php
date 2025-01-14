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

    /* @media screen and (max-width: 600px) {
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
    } */


#wrap form input[type="text"] {
  height: 30px;
  font-size: 14px;
  border: none;
  outline: none;
  color: #555;
  /* padding: 3px; */
  padding-right: 25px;
  width: 0px;
  background: white;
  transition: width .4s cubic-bezier(0.000, 0.795, 0.000, 1.000);
  cursor: pointer;
}

#wrap form input[type="text"]:focus:hover {
  border-bottom: 1px solid #BBB;
}

#wrap form input[type="text"]:focus {
  width: 180px;
  border-bottom: 1px solid #BBB;
  cursor: text;
}



/* Phone (Mobile) */
@media (max-width: 600px) {
  #wrap form input[type="text"]:focus {
    width: 80%;
  }
  #wrap form input[type="text"] {
    font-size: 16px;
  }
}

/* Tablet */
@media (min-width: 601px) and (max-width: 1024px) {
  #wrap form input[type="text"]:focus {
    width: 50%;
  }
  #wrap form input[type="text"] {
    font-size: 16px;
  }
}

/* Desktop */
@media (min-width: 1025px) {

}

#wrap form input[type="submit"]:hover {
  opacity: 0.8;
}

#wrap form button {
  /* margin-right: -600px; */
  text-indent: -20px;
  position: absolute;
  background: transparent;
  border: none;
  cursor: pointer;
  padding: 6px;
  border-radius: 100px; /* Adjust the value for different roundness */
}

#theme-toggle{
    float: right;
    /* margin-right: 16px; */
    background: white;
    border: none;
    cursor: pointer;
    /* padding: 6px; */
    width: 40px;
    height: 40px;
    border-radius: 100px; /* Adjust the value for different roundness */
}



/* Floating Button */
#nav {
  z-index: 100000;
	background-color: #fff;
	display: flex;
	align-items: center;
	justify-content: center;
	/* padding: 0 30px 0 50px; */
	position: fixed;
	margin-top: 50vh;
	left: 0;
	height: 50vh;
	transform: translateX(-100%);
	transition: transform .4s ease;
}

#nav.active {
	transform: translateX(0);
}

#nav ul {
	padding: 0;
	list-style-type: none;
}

#nav ul li {
	margin: 14px 0;
	text-align: right;
}

#nav a {
	color: #111;
	font-size: 24px;
	text-decoration: none;
	text-transform: uppercase;
}

#nav a:hover {
	color: #d35400;
}

.toggle {
	border: none;
	cursor: pointer;
	font-size: 20px;
	padding: 10px 15px;
	position: absolute;
	top: 0;
	right: 1px;
	transform: translateX(100%);
}

.toggle:focus {
	outline: none;
}

.toggle .fa-bars {
	display: block;
}

.toggle .fa-times {
	display: none;
}

#nav.active .toggle .fa-bars {
	display: none;
}

#nav.active .toggle .fa-times {
	display: block;
}



#overlay {
	 z-index: 2;
	 position: fixed;
	 top: 0;
	 left: 0;
	 width: 100%;
	 height: 100%;
	 background: rgba(220, 220, 220, 0.7);
	 visibility: hidden;
	 opacity: 0;
	 transition: all 0.2s ease-in;
	 will-change: opacity;
}
 #overlay.show {
	 visibility: visible;
	 opacity: 1;
}
 #hamburger {
	 z-index: 10;
	 position: fixed;
	 display: flex;
	 flex-direction: column;
	 justify-content: center;
	 align-items: center;
	 bottom: 1.5%;
	 right: .9%;
	 background-color: #005faf;
	 width: 56px;
	 height: 56px;
	 border-radius: 50%;
	 cursor: pointer;
	 box-shadow: 2px 2px 10px rgba(10, 10, 10, 0.3);
	 transition: all 0.2s ease-in-out;
   transform: translateY(0);
}
 #hamburger .icon-bar {
	 display: block;
	 background-color: #fff;
	 width: 22px;
	 height: 2px;
	 transition: all 0.3s ease-in-out;
}
 #hamburger .icon-bar + .icon-bar {
	 margin-top: 4px;
}
 .sosmed {
	 z-index: 9;
	 position: fixed;
	 bottom: 80px;
	 right: 1.3%;
	 width: 40px;
	 height: 40px;
	 border-radius: 5px;
	 background-color: #005faf;
	 display: flex;
	 flex-direction: column;
	 justify-content: center;
	 align-items: center;
	 visibilty: hidden;
	 opacity: 0;
	 box-shadow: 3px 3px 10px 0px rgba(0, 0, 0, 0.48);
	 cursor: pointer;
	 transition: all 0.3s ease-in;
}
 .material-icons {
	 font-size: 20px;
	 color: #ffffff;
}
 #facebook.show {
	 transform: translateY(0);
}
 #twiter.show {
	 transform: translateY(-50px);
}
 #instagram.show {
	 transform: translateY(-100px);
}
 #youtube.show {
	 transform: translateY(-150px);
}
 #tiktok.show {
	 transform: translateY(-200px);
}
 #hamburger.show {
	 box-shadow: 7px 7px 10px 0px rgba(0, 0, 0, 0.48);
}
 #hamburger.show #wrapper {
	 transition: transform 0.4s ease-in-out;
	 transform: rotateZ(90deg);
}
 #hamburger.show #one {
	 transform: translateY(6px) rotateZ(45deg) scaleX(0.9);
}
 #hamburger.show #thr {
	 transform: translateY(-6px) rotateZ(-45deg) scaleX(0.9);
}
 #hamburger.show #two {
	 opacity: 0;
}
 .sosmed.show {
	 visibility: visible;
	 opacity: 1;
}






.counter-container {
    text-align: center;
    background-color: #ffffff;
    padding: 10px;
    border-radius: 10px;
    /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); */
    margin: 5px;
    width: 22%;
}
.counter {
    font-size: 1.3em;
    font-weight: bold;
    margin: 0px;
    padding: 0px;

}

#visitorCount {
    color: #007bff;
}

p {
    color: #666666;
}





.artboards {
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap;
}

.artboardTitle {
  font-size: 1rem;
  font-weight: bold;
  margin: 1rem 0;
}

.artboard {
  display: flex;
  flex-direction: column;
  margin: 1rem;
}

.screen {
  background-color: white;
  border: 1px solid black;
  background-color: #ECEFF1;
}
.screen.iPhone4 {
  width: 320px;
  height: 480px;
}
.screen.iPhone5 {
  width: 320px;
  height: 568px;
}
.screen.iPhone6, .screen.iPhone7 {
  width: 375px;
  height: 667px;
}
.screen.iPhonePlus {
  width: 414px;
  height: 736px;
}

iframe {
  width: 100%;
  height: 100%;
  border: none;
}

.nps.screenshot img {
  width: 100%;
  height: auto;
}

.nps.formContainer {
  position: fixed;
  width: 100%;
  z-index: 1;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  overflow-y: scroll;
  -webkit-overflow-scrolling: touch;
}
@media (min-width: 736px) {
  .nps.formContainer {
    width: 414px;
    height: auto;
    top: inherit;
    left: 1rem;
    bottom: 1rem;
    left: inherit;
    border-radius: 0.5rem;
    box-shadow: 0 0.5rem 3rem rgba(0, 0, 0, 0.33);
  }
}
.nps.formContainer.transitionOut {
  display: none;
}
.nps.formContainer.transitionIn {
  display: block;
}

.nps.form {
  position: relative;
  display: flex;
  flex-direction: column;
  background-color: white;
  width: 100%;
  min-height: 100%;
  padding-bottom: 1rem;
}

.nps.coverImage {
  width: 100%;
  height: auto;
  padding-bottom: 0.5rem;
  box-sizing: content-box;
}

.nps.h1 {
  font-size: 1.25rem;
  font-weight: bold;
  line-height: 1.2;
  color: #263238;
  padding-top: 1rem;
  padding-right: 1rem;
  padding-bottom: 0.25rem;
  padding-left: 1rem;
}

.nps.h2,
.nps.h3 {
  font-size: 1rem;
  font-weight: normal;
  line-height: 1.2;
  color: #263238;
  padding-top: 0.25rem;
  padding-right: 1rem;
  padding-bottom: 0.5rem;
  padding-left: 1rem;
}

.nps.h3 {
  padding-top: 1rem;
  padding-bottom: 0;
  font-weight: bold;
}

.nps.scaleDescription {
  display: flex;
  justify-content: space-between;
  padding-top: 1rem;
  padding-right: 1rem;
  padding-left: 1rem;
  font-size: 1rem;
  color: #607D8B;
}
.nps.scaleDescription span {
  display: flex;
  align-items: center;
  justify-content: center;
}
.nps.scaleDescription i {
  margin-right: 0.25rem;
}

.nps.scale {
  display: flex;
  height: 2.5rem;
  border-radius: 4px;
  padding: 0.5rem 1rem;
  box-sizing: content-box;
}

.nps.label {
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  flex-grow: 1;
  cursor: pointer;
  color: #40354E;
  border-color: #40354E;
  border-style: solid;
  border-top-width: 1px;
  border-bottom-width: 1px;
  border-right-width: 1px;
  border-left-width: 0;
}
.nps.label[for=pria] {
  border-left-width: 1px;
  border-radius: 0.25rem 0 0 0.25rem;
}
.nps.label[for=wanita] {
  border-radius: 0 0.25rem 0.25rem 0;
}
.nps.label[for=satu] {
  border-left-width: 1px;
  border-radius: 0.25rem 0 0 0.25rem;
}
.nps.label[for=empat] {
  border-radius: 0 0.25rem 0.25rem 0;
}
.nps.label[for=satu_a] {
  border-left-width: 1px;
  border-radius: 0.25rem 0 0 0.25rem;
}
.nps.label[for=enam_a] {
  border-radius: 0 0.25rem 0.25rem 0;
}
.nps.label[for=satu_b] {
  border-left-width: 1px;
  border-radius: 0.25rem 0 0 0.25rem;
}
.nps.label[for=lima_b] {
  border-radius: 0 0.25rem 0.25rem 0;
}
.nps.label[for=satu_c] {
  border-left-width: 1px;
  border-radius: 0.25rem 0 0 0.25rem;
}
.nps.label[for=lima_c] {
  border-radius: 0 0.25rem 0.25rem 0;
}

.nps.input {
  display: none;
}
.nps.input:checked + label {
  background-color: #40354E;
  color: white;
  font-weight: bold;
}

.nps.textarea {
  margin-top: 0.5rem;
  margin-right: 1rem;
  margin-bottom: 0.5rem;
  margin-left: 1rem;
  font-size: 1rem;
  padding: 0.5rem;
  border-radius: 0.25rem;
  font-weight: normal;
  color: #263238;
  border: 1px solid #90A4AE;
}
.nps.textarea::-moz-placeholder {
  color: #607D8B;
}
.nps.textarea:-ms-input-placeholder {
  color: #607D8B;
}
.nps.textarea::placeholder {
  color: #607D8B;
}

.nps.textareaLabel {
  display: flex;
  align-items: center;
  margin-top: 0.5rem;
  margin-right: 1rem;
  margin-bottom: 0.5rem;
  margin-left: 1rem;
  font-size: 0.875rem;
  color: #607D8B;
  cursor: pointer;
}
.nps.textareaLabel input {
  margin-right: 0.25rem;
}

.nps.actions {
  display: flex;
  justify-content: space-between;
  padding-top: 1rem;
}

.nps.close {
  display: flex;
  flex-direction: column;
  text-align: center;
  align-items: center;
  justify-content: center;
  padding: 0 1rem;
  height: 2.5rem;
  font-size: 1rem;
  text-decoration: none;
  font-weight: bold;
  color: #000;
  font-weight: bold;
  font-size: 1rem;
  line-height: 1;
  cursor: pointer;
}

.nps.button {
  background-color: #000;
  height: 2.5rem;
  color: white;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
  font-weight: normal;
  font-size: 1rem;
  padding: 0 1rem;
  margin-left: 1rem;
  margin-right: 1rem;
  border-radius: 2.5rem;
  box-shadow: none;
  border: none;
  cursor: pointer;
}

.nps.floatingActionButton {
  position: fixed;
  bottom: 1rem;
  left: 1rem;
  z-index: 0;
  cursor: pointer;
  min-width: 2.5rem;
  width: 6rem;
  height: 6rem;
  border-radius: 1.5rem;
  background-color: #005faf;
  /* background-color: transparent; */
  color: white;
  font-weight: normal;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
  border: none;
  box-shadow: 0 0.5rem 3rem rgba(0, 0, 0, 0.25);
  font-size: 1rem;
  padding: 0 1rem;
}
@keyframes bounce {
  0%, 20%, 50%, 80%, 100% {
    transform: translateY(0);
  }
  40% {
    transform: translateY(-20px);
  }
  60% {
    transform: translateY(-10px);
  }
}

.bounce {
  animation: bounce 2s infinite; /* Adjust the duration and iteration */
}

.nps.floatingActionButton img {
  position: relative;
  width: 6rem;
  height: 6rem;
  background-color: transparent;
}
.nps.floatingActionButton:focus {
  outline: 0;
}
.nps.floatingActionButton.thankYou {
  background-color: #00c853;
  transform: scale(0);
  -webkit-animation: thankYou ease-in-out 1200ms 150ms forwards;
          animation: thankYou ease-in-out 1200ms 150ms forwards;
}
@-webkit-keyframes thankYou {
  0% {
    transform: scale(0);
  }
  25% {
    transform: scale(1.1);
  }
  50% {
    transform: scale(0.9);
  }
  75% {
    transform: scale(1.05);
  }
  100% {
    transform: scale(1);
  }
}
@keyframes thankYou {
  0% {
    transform: scale(0);
  }
  25% {
    transform: scale(1.1);
  }
  50% {
    transform: scale(0.9);
  }
  75% {
    transform: scale(1.05);
  }
  100% {
    transform: scale(1);
  }
}

    </style>

  @yield('style')  <!-- This will be replaced by the content of the child views -->

</head>

<body class="index-page dinamyc-color" style="">

  {{-- <div id="nav">
    <button class="toggle" id="toggle">
    <i class="bi bi-chevron-down toggle-dropdown"></i>
    <i class="bi bi-chevron-down toggle-dropdown"></i>
    </button>
    
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Blog</a></li>
      <li><a href="#">Contact</a></li>
    </ul>
</div> --}}


  <header id="header" class="header d-flex align-items-center sticky-top dinamyc-color-header" style="background-color: #005faf;">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="{{ route('welcome') }}" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="{{ asset('sample/logo.png') }}" alt="" >
        <!-- <div> -->
          <span style="color: white; font-size: 12px;">DIREKTORAT JENDERAL<br>BIMBINGAN MASYARAKAT KATOLIK<br>KEMENTERIAN AGAMA REPUBLIK INDONESIA</span>
        <!-- </div> -->
        <!-- <h1 style="color: white;" class="sitename">Bimas Katolik</h1> -->
      </a>

      <nav id="navmenu" class="navmenu">
        <ul class="dinamyc-color-header">
          <li><a style="color: white;" href="{{ route('welcome') }}">Beranda</a></li>
          <li class="dropdown"><a style="color: white;" href="#"><span>Layanan</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul class="dinamyc-color-header">
              <li><a style="color: white;" href="{{ route('maklumat-pelayanan') }}">Maklumat Pelayanan</a></li>
              <li><a style="color: white;" href="{{ route('standard-pelayanan') }}">Standard Pelayanan</a></li>
            </ul>
          </li>
          <li class="dropdown"><a style="color: white;" href="#"><span>Data</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul class="dinamyc-color-header">
              <li><a style="color: white;" href="#">Sebaran</a></li>
              <li><a style="color: white;" href="#">Dataset</a></li>
            </ul>
          </li>
          <li class="dropdown"><a style="color: white;" href="#"><span>Bantuan</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul class="dinamyc-color-header">
              <li><a style="color: white;" href="{{ route('data-bantuan-informasi') }}">Informasi Bantuan</a></li>
              <li><a style="color: white;" href="{{ route('data-bantuan-tersalurkan') }}">Bantuan Tersalurkan</a></li>
            </ul>
          </li>
          <li><a style="color: white;" href="{{ route('infografis') }}">Infografis</a></li>
          <li><a style="color: white;" href="{{ route('dumas') }}">Dumas</a></li>
          <li class="dropdown"><a style="color: white;" href="#"><span>Tentang Kami</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul class="dinamyc-color-header">
              <li><a style="color: white;" href="{{ route('struktur-organisasi', ['id' => 1]) }}">Struktur Organisasi</a></li>
              <li><a style="color: white;" href="{{ route('informasi-regulasi') }}">Regulasi/Informasi Penting</a></li>
              <li><a style="color: white;" href="{{ route('reformasi-birokrasi') }}">Reformasi Birokrasi</a></li>
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
          <li><a style="color: white;" href="https://bimaskatolik-ppid.kemenag.go.id/v5/organisasi.php">PPID</a></li>

          <!-- <div class="search-container btn-getstarted" style="background-color: transparent;">
            <form action="/search">
                <input type="text" placeholder="Search.." name="query">
                <button><i class="bi bi-search"></i></button>
            </form>
          </div> -->
          <div id="wrap">
            <form action="/search" autocomplete="on">
              <input id="search" name="search" type="text" placeholder="Search..">
              <button type="button" id="searchButton"><i class="bi bi-search"></i></button>
            </form>
          </div>
          <li>
        </ul>
        <i style="color: white;" class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

        <!-- <a class="btn-getstarted" href="index.html#about">Get Started</a> -->


    <!-- Add this button right here -->

    </div>

    <div class="search-container btn-getstarted" style="background-color: transparent;">
      <button id="theme-toggle" class=""><i id="theme-icon" class="bi bi-moon"></i></button>
    </div>
    
  </header>

    @yield('content')  <!-- This will be replaced by the content of the child views -->

    @php
      use Carbon\Carbon;
      $todayCount = App\Models\Kunjungan::whereDate('created_at', Carbon::today())->count();
      $thisWeekCount = App\Models\Kunjungan::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
      $thisMonthCount = App\Models\Kunjungan::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->count();
      $kunjunganCount = App\Models\Kunjungan::count();
    @endphp

  <footer id="footer" class="footer light-background dinamyc-color-footer">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a style="color: white;" href="{{ route('welcome') }}" class="logo d-flex align-items-center">
            <span class="sitename text-dinamyc-color-primary">Bimas Katolik</span>
          </a>
          <p class="text-dinamyc-color">Situs resmi yang dikelola oleh Direktorat Jenderal Bimbingan Masyarakat Katolik Kementerian Agama Republik Indonesia. Website ini bertujuan untuk memberikan informasi terkait kegiatan, program, dan layanan bagi umat Katolik di Indonesia.</p>
          
          <div class="social-links d-flex mt-4">
            <div class="counter-container dinamyc-color-card">
                <h4 class="text-dinamyc-color-primary">Kunjungan hari Ini</h4>
                <div class="counter">
                    <span id="visitorCount">{{$todayCount}}</span>
                </div>
                <p></p>
            </div>
            <div class="counter-container dinamyc-color-card">
                <h4 class="text-dinamyc-color-primary">Kunjungan minggu Ini</h4>
                <div class="counter">
                    <span id="visitorCount">{{$thisWeekCount}}</span>
                </div>
                <p></p>
            </div>
            <div class="counter-container dinamyc-color-card">
                <h4 class="text-dinamyc-color-primary">Kunjungan bulan Ini</h4>
                <div class="counter">
                    <span id="visitorCount">{{$thisMonthCount}}</span>
                </div>
                <p></p>
            </div>
            <div class="counter-container dinamyc-color-card">
                <h4 class="text-dinamyc-color-primary">Total Kunjungan</h4>
                <div class="counter">
                    <span id="visitorCount">{{$kunjunganCount}}</span>
                </div>
                <p></p>
            </div>
          </div>
          {{-- <p style="margin-top: 20px;" class="text-dinamyc-color"><strong>Total Kunjungan:</strong> <span>{{$kunjunganCount}}</span></p>
          <p style="display: flex; align-items: center;" class="text-dinamyc-color"><strong>Online User:</strong> <iframe src="http://localhost:3000" style="width: 200px; height: 35px; border: none; margin-left: 10px;"></iframe></iframe></p> --}}
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4 class=" text-dinamyc-color-primary">Hubungi Kami</h4>
          <p class="text-dinamyc-color">Jl. M.H. Thamrin No.6, RT.2/RW.1, Kb. Sirih, Kec. Menteng, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10340</p>
          <p class="mt-4 text-dinamyc-color"><strong>Telepon:</strong> <span>(+62) 213812344</span></p>
          <p class="text-dinamyc-color"><strong>Email:</strong> <span>bimaskatolik@kemenag.go.id</span></p>
          <div class="social-links d-flex mt-4">
            <a href="https://www.facebook.com/share/14fbKDHy36/"><i class="bi bi-facebook"></i></a>
            <a href="https://x.com/bimaskatolikri?t=FMGChqSxeRS2ztzCIWBWeg&s=09"><i class="bi bi-twitter-x"></i></a>
            <a href="https://www.instagram.com/bimaskatolik?igsh=M2ZuMzRrMHRjYzVn"><i class="bi bi-instagram"></i></a>
            <a href="https://youtube.com/@ditjenbimaskatolik?si=da5XTpaHXRyW-DsF"><i class="bi bi-youtube"></i></a>
            <a href="https://www.tiktok.com/@bimaskatolik?_t=ZS-8skMw2uUMnB&_r=1"><i class="bi bi-tiktok"></i></a>
          </div>
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
  <div style="" id="hamburger">
    <div id="wrapper">
        <span class="icon-bar" id="one"></span>
        <span class="icon-bar" id="two"></span>
        <span class="icon-bar" id="thr"></span>
      </div>
    </div>
    <a href="https://www.tiktok.com/@bimaskatolik?_t=ZS-8skMw2uUMnB&_r=1" class="sosmed" id="tiktok">
      <i class="bi bi-tiktok material-icons"></i>
    </a>
    <a href="https://youtube.com/@ditjenbimaskatolik?si=da5XTpaHXRyW-DsF" class="sosmed" id="youtube">
      <i class="bi bi-youtube material-icons"></i>
    </a>
    <a href="https://www.instagram.com/bimaskatolik?igsh=M2ZuMzRrMHRjYzVn" class="sosmed" id="instagram">
      <i class="bi bi-instagram material-icons"></i>
    </a>
    <a href="https://x.com/bimaskatolikri?t=FMGChqSxeRS2ztzCIWBWeg&s=09" class="sosmed" id="twiter">
      <i class="bi bi-twitter-x material-icons"></i>
    </a>
    <a href="https://www.facebook.com/share/14fbKDHy36/" class="sosmed" id="facebook">
      <i class="bi bi-facebook material-icons"></i>
    </a>
  </div>

  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div style="z-index: 10000000; height: 100vh; overflow-y: auto;" class="nps formContainer transitionOut">
    <form style="padding-top: 30px; padding-bottom: 30px;" class="nps form">
      <h1 class="nps h1">Survey Kepuasan Website Ditjen Bimas Katolik</h1>
      <h2 class="nps h2">Jenis kelamin<span class="required" style="color: red;">*</span></h2>
      <div class="nps scale">
        <input class="nps input" name="gender" type="radio" id="pria" value="pria"/>
        <label class="nps label" for="pria">Pria</label>
        <input class="nps input" name="gender" type="radio" id="wanita" value="wanita"/>
        <label class="nps label" for="wanita">Wanita</label>
      </div>
      <h2 class="nps h2">Berapa umur anda (tahun)<span class="required" style="color: red;">*</span></h2>
      <div class="nps scale">
        <input class="nps input" name="umur" type="radio" id="satu" value="18 - 28 tahun"/>
        <label class="nps label" for="satu">18-28</label>
        <input class="nps input" name="umur" type="radio" id="dua" value="29 - 42 tahun"/>
        <label class="nps label" for="dua">29-42</label>
        <input class="nps input" name="umur" type="radio" id="tiga" value="43 - 58 tahun"/>
        <label class="nps label" for="tiga">43-58</label>
        <input class="nps input" name="umur" type="radio" id="empat" value="> 59 tahun"/>
        <label class="nps label" for="empat">> 59</label>
      </div>
      <h2 class="nps h2">Apa pekerjaan anda<span class="required" style="color: red;">*</span></h2>
      <h2 style="margin-top: 0px; margin-bottom: 0px; font-size: .8rem;" class="nps h2">(1) Aparatur Sipil Negara (ASN), (2) Pegawai Swasta, (3) Wiraswasta, (4) Rohaniwan, (5) Pelajar, (6) Lainya</h2>
      <div class="nps scale">
        <input class="nps input" name="pekerjaan" type="radio" id="satu_a" value="Aparatur Sipil Negara (ASN)"/>
        <label class="nps label" for="satu_a">1</label>
        <input class="nps input" name="pekerjaan" type="radio" id="dua_a" value="Pegawai Swasta"/>
        <label class="nps label" for="dua_a">2</label>
        <input class="nps input" name="pekerjaan" type="radio" id="tiga_a" value="Wiraswasta"/>
        <label class="nps label" for="tiga_a">3</label>
        <input class="nps input" name="pekerjaan" type="radio" id="empat_a" value="Rohaniwan"/>
        <label class="nps label" for="empat_a">4</label>
        <input class="nps input" name="pekerjaan" type="radio" id="lima_a" value="Pelajar"/>
        <label class="nps label" for="lima_a">5</label>
        <input class="nps input" name="pekerjaan" type="radio" id="enam_a" value="Lainya"/>
        <label class="nps label" for="enam_a">6</label>
      </div>
      <h3 class="nps h3">Menu apa yang paling sering anda akses?<span class="required" style="color: red;">*</span></h3>
      <textarea name="favorite_menu" class="nps textarea" rows="1" placeholder="Jawaban anda"></textarea>
      <h2 class="nps h2">Bagaimana pendapat anda terkait Website Ditjen Bimas Katolik?<span class="required" style="color: red;">*</span></h2>
      <div class="nps scaleDescription">
        <span><i>😔</i> Sedih</span>
        <span><i>😃</i> Senang</span>
      </div>
      <div class="nps scale">
        <input class="nps input" name="pendapat" type="radio" id="satu_b" value="Sedih"/>
        <label class="nps label" for="satu_b">1</label>
        <input class="nps input" name="pendapat" type="radio" id="dua_b" value="Hampir sedih"/>
        <label class="nps label" for="dua_b">2</label>
        <input class="nps input" name="pendapat" type="radio" id="tiga_b" value="Datar"/>
        <label class="nps label" for="tiga_b">3</label>
        <input class="nps input" name="pendapat" type="radio" id="empat_b" value="Senyum"/>
        <label class="nps label" for="empat_b">4</label>
        <input class="nps input" name="pendapat" type="radio" id="lima_b" value="Senyum lebar"/>
        <label class="nps label" for="lima_b">5</label>
      </div>
      <h2 class="nps h2">Seberapa besar anda ingin merekomendasikan Website Ditjen Bimas Katolik?
      <span class="required" style="color: red;">*</span></h2>
      <div class="nps scaleDescription">
        <span><i>👎</i> Tidak rekomendasi</span>
        <span><i>👍</i> Rekomendasi</span>
      </div>
      <div class="nps scale">
        <input class="nps input" name="rekomendasi" type="radio" id="satu_c" value="1"/>
        <label class="nps label" for="satu_c">1</label>
        <input class="nps input" name="rekomendasi" type="radio" id="dua_c" value="2"/>
        <label class="nps label" for="dua_c">2</label>
        <input class="nps input" name="rekomendasi" type="radio" id="tiga_c" value="3"/>
        <label class="nps label" for="tiga_c">3</label>
        <input class="nps input" name="rekomendasi" type="radio" id="empat_c" value="4"/>
        <label class="nps label" for="empat_c">4</label>
        <input class="nps input" name="rekomendasi" type="radio" id="lima_c" value="5"/>
        <label class="nps label" for="lima_c">5</label>
      </div>
      <h3 class="nps h3">Menurut anda, apa yang perlu ditingkatkan pada Website Ditjen Bimas Katolik? (opsional)</h3>
      <textarea name="saran" class="nps textarea" rows="5" placeholder="Jawaban anda"></textarea>
      <div class="nps actions">
        <a class="nps close">Cancel</a>
        <a class="nps button">Submit</a>
      </div>
    </form>
  </div>
  <a style="" class="nps floatingActionButton bounce"><img src="{{ asset('sample/rateus.png') }}" alt="Skytsunami"/></a>

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

    <script>
      window.addEventListener('scroll', () => {
        const socialMediaButton = document.getElementById('hamburger');
        const tiktok = document.getElementById('tiktok');
        const instagram = document.getElementById('instagram');
        const facebook = document.getElementById('facebook');
        const youtube = document.getElementById('youtube');
        const twiter = document.getElementById('twiter');

        // Show/hide the scroll-to-top button
        if (window.scrollY > 100) {
          socialMediaButton.style.transform = 'translateY(-60px)'; // Move up when scroll button is visible
          facebook.style.transform = 'translateY(-60px)'; // Reset position
          twiter.style.transform = 'translateY(-110px)'; // Reset position
          instagram.style.transform = 'translateY(-160px)'; // Reset position
          youtube.style.transform = 'translateY(-210px)'; // Reset position
          tiktok.style.transform = 'translateY(-260px)'; // Reset position
        } else {
          socialMediaButton.style.transform = 'translateY(0)'; // Reset position
          facebook.style.transform = 'translateY(0)'; // Reset position
          twiter.style.transform = 'translateY(-50px)'; // Reset position
          instagram.style.transform = 'translateY(-100px)'; // Reset position
          youtube.style.transform = 'translateY(-150px)'; // Reset position
          tiktok.style.transform = 'translateY(-200px)'; // Reset position
        }
      });
    </script>

    <script>
      document.querySelector(".nps.button").addEventListener("click", async function (event) {
        // Prevent the default behavior
        event.preventDefault();

        // Collect form data
        const formData = new FormData(document.querySelector(".nps.form"));

        // Convert form data to a JSON object
        let data = {};
        formData.forEach((value, key) => {
          data[key] = value;
        });

        // Send data to Laravel backend via fetch
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const response = await fetch("/api/post-feedback", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                'Accept': 'application/json',
                "X-CSRF-TOKEN": csrfToken,
            },
            body: JSON.stringify(data),
        });
            

        if (response.ok) {
            const result = await response.json();
            // console.log(result);
        } else {
            const errorResponse = await response.text();
            console.error('Failed to add Feedback:', errorResponse);
        }
      });
    </script>

<script>
  $(window).on("load", function() {
    $(".nps.floatingActionButton").click(function() {
      $(".nps.formContainer").addClass("transitionIn").removeClass("transitionOut");
      $(this).removeClass("thankYou");
    });

    $(".nps.close").click(function() {
      $(".nps.formContainer").addClass("transitionOut").removeClass("transitionIn");
      // $(".nps.floatingActionButton").text("🎤 Feedback").removeClass("thankYou");
    });

    $(".nps.button").click(function() {
      setTimeout(function() {
        $(".nps.floatingActionButton").fadeOut();
      }, 3000);
      $(".nps.floatingActionButton").addClass("thankYou").text("Thank you ❤️");
      $(".nps.formContainer").addClass("transitionOut").removeClass("transitionIn");
    });
  });
</script>
    <script>
  // Get the form elements
  const searchInput = document.getElementById('search');
  const searchButton = document.getElementById('searchButton');
  const searchForm = document.getElementById('searchForm');

  // When the button is clicked
  searchButton.addEventListener('click', function(event) {
    // If the input is not focused, focus it
    if (document.activeElement !== searchInput) {
      searchInput.focus();
    } else {
      // If the input is already focused, submit the form
      searchForm.submit();
    }
  });
  
  // Optional: Automatically focus the input when the page loads
  // searchInput.focus();  // Uncomment if you want the input to auto-focus on page load


  document.addEventListener('DOMContentLoaded', () => {
    const iconElement = document.getElementById("theme-icon");
    const toggleButton = document.getElementById('theme-toggle');
    const xxx = document.getElementsByClassName('dinamyc-color');
    const yyy = document.getElementsByClassName('dinamyc-color-header');
    const zzz = document.getElementsByClassName('dinamyc-color-footer');
    const htmlElement = document.documentElement;
    const kkk = document.getElementsByClassName('dinamyc-color-card');
    const lll = document.getElementsByClassName('dinamyc-color-card-grey');


    const aaa = document.getElementsByClassName('text-dinamyc-color-primary');
    const bbb = document.getElementsByClassName('text-dinamyc-color');
    

    // Check and apply saved theme
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'dark') {
        iconElement.classList.remove("bi-moon");
        iconElement.classList.add("bi-sun"); // Change to moon icon
        console.log("Dark");
        htmlElement.classList.add('dark');
        localStorage.setItem('theme', 'dark');
        for (let i = 0; i < xxx.length; i++) {
          xxx[i].style.background = "#161d31";
        }
        for (let i = 0; i < yyy.length; i++) {
          yyy[i].style.background = "#283046";
        }
        for (let i = 0; i < zzz.length; i++) {
          zzz[i].style.background = "#151720";
        }
        for (let i = 0; i < kkk.length; i++) {
          kkk[i].style.background = "#283046";
        }
        // for (let i = 0; i < lll.length; i++) {
        //   lll[i].style.background = "#9397a1";
        // }
        for (let i = 0; i < aaa.length; i++) {
          aaa[i].style.color = "white";
        }
        for (let i = 0; i < bbb.length; i++) {
          bbb[i].style.color = "#9397a1";
        }
    } else {
        iconElement.classList.remove("bi-sun");
        iconElement.classList.add("bi-moon"); // Change to moon icon
        console.log("Light");
        htmlElement.classList.remove('dark');
        localStorage.setItem('theme', 'light');
        for (let i = 0; i < xxx.length; i++) {
          xxx[i].style.background = "white";
        }
        for (let i = 0; i < yyy.length; i++) {
          yyy[i].style.background = "#005faf";
        }
        for (let i = 0; i < zzz.length; i++) {
          zzz[i].style.background = "#f6fafd";
        }
        for (let i = 0; i < kkk.length; i++) {
          kkk[i].style.background = "white";
        }
        // for (let i = 0; i < lll.length; i++) {
        //   lll[i].style.background = "#e5e5e5";
        // }
        for (let i = 0; i < aaa.length; i++) {
          aaa[i].style.color = "#114265";
        }
        for (let i = 0; i < bbb.length; i++) {
          bbb[i].style.color = "#545454";
        }
    }

    toggleButton.addEventListener('click', () => {


      if (htmlElement.classList.contains('dark')) {
        iconElement.classList.remove("bi-sun");
        iconElement.classList.add("bi-moon"); // Change to moon icon
        console.log("Light");
        htmlElement.classList.remove('dark');
        localStorage.setItem('theme', 'light');
        for (let i = 0; i < xxx.length; i++) {
          xxx[i].style.background = "white";
        }
        for (let i = 0; i < yyy.length; i++) {
          yyy[i].style.background = "#005faf";
        }
        for (let i = 0; i < zzz.length; i++) {
          zzz[i].style.background = "#f6fafd";
        }
        for (let i = 0; i < kkk.length; i++) {
          kkk[i].style.background = "white";
        }
        // for (let i = 0; i < lll.length; i++) {
        //   lll[i].style.background = "#e5e5e5";
        // }
        for (let i = 0; i < aaa.length; i++) {
          aaa[i].style.color = "#114265";
        }
        for (let i = 0; i < bbb.length; i++) {
          bbb[i].style.color = "#545454";
        }
      } else {
        iconElement.classList.remove("bi-moon");
        iconElement.classList.add("bi-sun"); // Change to moon icon
        console.log("Dark");
        htmlElement.classList.add('dark');
        localStorage.setItem('theme', 'dark');
        for (let i = 0; i < xxx.length; i++) {
          xxx[i].style.background = "#161d31";
        }
        for (let i = 0; i < yyy.length; i++) {
          yyy[i].style.background = "#283046";
        }
        for (let i = 0; i < zzz.length; i++) {
          zzz[i].style.background = "#151720";
        }
        for (let i = 0; i < kkk.length; i++) {
          kkk[i].style.background = "#283046";
        }
        // for (let i = 0; i < lll.length; i++) {
        //   lll[i].style.background = "#9397a1";
        // }
        for (let i = 0; i < aaa.length; i++) {
          aaa[i].style.color = "white";
        }
        for (let i = 0; i < bbb.length; i++) {
          bbb[i].style.color = "#9397a1";
        }
      }
    });
  });



// const toggle = document.getElementById('toggle');
// const nav = document.getElementById('nav');

// toggle.addEventListener('click', () => {
// 	nav.classList.toggle('active');
// });


$('#hamburger').click(function() {
  $('#hamburger').toggleClass('show');
  $('#overlay').toggleClass('show');
  $('.sosmed').toggleClass('show');
});
</script>

</body>

</html>