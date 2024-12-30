<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title') | Andis Dev</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  @yield('style')
</head>

<body>

    @include('sweetalert::alert')

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

      <div class="d-flex align-items-center justify-content-between">
        <a href="/" class="logo d-flex align-items-center">
          <img src="{{ asset('sample/logo.png') }}" alt="">
          <span class="d-none d-lg-block">Bimas Katolik</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
      </div><!-- End Logo -->

      <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
          <input type="text" name="query" placeholder="Search" title="Enter search keyword">
          <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
      </div><!-- End Search Bar -->

      <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

          <li class="nav-item d-block d-lg-none">
            <a class="nav-link nav-icon search-bar-toggle " href="#">
              <i class="bi bi-search"></i>
            </a>
          </li><!-- End Search Icon-->


          <li class="nav-item dropdown pe-3">

            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
              <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
              <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name }}</span>
            </a><!-- End Profile Iamge Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
              <li class="dropdown-header">
                <h6>{{ auth()->user()->name }}</h6>
                <span>Administrator</span>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <!-- <li>
                <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                  <i class="bi bi-person"></i>
                  <span>My Profile</span>
                </a>
              </li> -->
              <li>
                <hr class="dropdown-divider">
              </li>

              <li>
                  <a class="log-out dropdown-item d-flex align-items-center" href="#" onclick="event.preventDefault(); document.getElementById('logging-out').submit();">
                      <i class="bi bi-box-arrow-right"></i>
                      <span>Sign Out</span>
                  </a>
                  <form action="/logout" method="POST" id="logging-out" style="display: none;">
                      @csrf
                  </form>
              </li>

            </ul><!-- End Profile Dropdown Items -->
          </li><!-- End Profile Nav -->

        </ul>
      </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
          <a id="menu-dashboard" class="nav-link collapsed" href="/dashboard">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
          </a>
        </li><!-- End Dashboard Nav -->

          <li class="nav-item">
          <a id="menu-users" class="nav-link collapsed" href="/users">
              <i class="bi bi-grid"></i>
              <span>Users</span>
          </a>
          </li><!-- End User Nav -->

          <li class="nav-item">
            <a id="menu-informasi" class="nav-link animated collapsed" data-bs-target="#informasi-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-layout-text-window-reverse"></i><span>Informasi</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="informasi-nav" class="nav-content collapsed" data-bs-parent="#sidebar-nav">
              <li>
                <a href="/informasi/berita">
                  <i class="bi bi-circle"></i><span>Berita</span>
                </a>
              </li>
              <li>
                <a href="/informasi/renungan">
                  <i class="bi bi-circle"></i><span>Renungan</span>
                </a>
              </li>
              <li>
                <a href="/informasi/mimbar">
                  <i class="bi bi-circle"></i><span>Mimbar</span>
                </a>
              </li>
            </ul>
          </li><!-- End Pelayanan Nav -->

          <li class="nav-item">
            <a id="menu-bantuan" class="nav-link animated collapsed" data-bs-target="#bantuan-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-layout-text-window-reverse"></i><span>Bantuan</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="bantuan-nav" class="nav-content collapsed" data-bs-parent="#sidebar-nav">
              <li>
                <a href="/admin/bantuan-informasi">
                  <i class="bi bi-circle"></i><span>Informasi Bantuan</span>
                </a>
              </li>
              <li>
                <a href="/admin/bantuan-tersalurkan">
                  <i class="bi bi-circle"></i><span>Bantuan Tersalurkan</span>
                </a>
              </li>
            </ul>
          </li><!-- End Bantuan Nav -->

          <li class="nav-item">
            <a id="menu-maklumat-pelayanan" class="nav-link animated collapsed" data-bs-target="#pelayanan-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-layout-text-window-reverse"></i><span>Pelayanan</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="pelayanan-nav" class="nav-content collapsed" data-bs-parent="#sidebar-nav">
              <li>
                <a href="/pelayanan/maklumat">
                  <i class="bi bi-circle"></i><span>Maklumat Pelayanan</span>
                </a>
              </li>
              <li>
                <a href="/pelayanan/uker">
                  <i class="bi bi-circle"></i><span>Unit Kerja</span>
                </a>
              </li>
              <li>
                <a href="/pelayanan/standard">
                  <i class="bi bi-circle"></i><span>Standard Pelayanan</span>
                </a>
              </li>
            </ul>
          </li><!-- End Pelayanan Nav -->

        <li class="nav-item">
        <a id="menu-infografis" class="nav-link collapsed" href="/admin/infografis">
            <i class="bi bi-grid"></i>
            <span>Infografis</span>
        </a>
        </li><!-- End Infografis Nav -->

        <li class="nav-item">
          <a id="menu-dumas" class="nav-link animated collapsed" data-bs-target="#dumas-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-layout-text-window-reverse"></i><span>Pengaduan Masyarakat</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="dumas-nav" class="nav-content collapsed" data-bs-parent="#sidebar-nav">
            <li>
              <a href="/dumas/subjek">
                <i class="bi bi-circle"></i><span>Subjek Pengaduan</span>
              </a>
            </li>
            <li>
              <a href="/dumas/aduan">
                <i class="bi bi-circle"></i><span>Aduan</span>
              </a>
            </li>
          </ul>
        </li><!-- End Dumas Nav -->

        <li class="nav-item">
        <a id="menu-informasi-regulasi" class="nav-link collapsed" href="/admin/informasi-regulasi">
            <i class="bi bi-grid"></i>
            <span>Informasi/Regulasi</span>
        </a>
        </li><!-- End User Nav -->

        {{-- <li class="nav-item">
          <a id="menu-informasi-regulasi" class="nav-link animated collapsed" data-bs-target="#informasi-regulasi-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-layout-text-window-reverse"></i><span>Informasi/Regulasi</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="informasi-regulasi-nav" class="nav-content collapsed" data-bs-parent="#sidebar-nav">
            <li>
              <a href="/admin/informasi">
                <i class="bi bi-circle"></i><span>Informasi</span>
              </a>
            </li>
            <li>
              <a href="/admin/regulasi">
                <i class="bi bi-circle"></i><span>Regulasi</span>
              </a>
            </li>
          </ul>
        </li><!-- End Informasi/Regulasi Nav --> --}}

        <li class="nav-item">
          <a id="menu-rb" class="nav-link animated collapsed" data-bs-target="#rb-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-layout-text-window-reverse"></i><span>Reformasi Birokrasi</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="rb-nav" class="nav-content collapsed" data-bs-parent="#sidebar-nav">
            <li>
              <a href="/rb/kategori">
                <i class="bi bi-circle"></i><span>Kategori RB</span>
              </a>
            </li>
            <li>
              <a href="/rb/data">
                <i class="bi bi-circle"></i><span>Data RB</span>
              </a>
            </li>
          </ul>
        </li><!-- End RB Nav -->

        <li class="nav-item">
        <a id="menu-struktur" class="nav-link collapsed" href="/admin/struktur">
            <i class="bi bi-grid"></i>
            <span>Struktur Organisasi</span>
        </a>
        </li><!-- End Settings Nav -->

        <!-- <li class="nav-item">
        <a id="menu-setting" class="nav-link collapsed" href="/admin/settings">
            <i class="bi bi-grid"></i>
            <span>Settings</span>
        </a>
        </li> -->

      </ul>

    </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>@yield('title')</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
          <li class="breadcrumb-item active">@yield('title')</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    @yield('content')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main_dashboard.js') }}"></script>
  {{-- <script src="{{ asset('assets/js/main.js') }}"></script> --}}
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  @yield('script')

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      // Get the element by class name (returns a collection)
      var elements = document.getElementsByClassName("nav-content");

      // Loop through the collection to modify each element
      for (var i = 0; i < elements.length; i++) {
        // elements[i].classList.remove("collapse"); // Remove collapse class
        elements[i].classList.add("show");       // Add show class
      }
      // Get the element by class name (returns a collection)
      var animated = document.getElementsByClassName("animated");

      // Loop through the collection to modify each element
      for (var i = 0; i < animated.length; i++) {
        // elements[i].classList.remove("collapse"); // Remove collapse class
        animated[i].click();       // Add show class
      }
    });
  </script>

</body>

</html>