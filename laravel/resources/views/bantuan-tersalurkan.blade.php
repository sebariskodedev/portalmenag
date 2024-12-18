<!-- resources/views/dashboard.blade.php -->
@extends('template.user')

@section('style')
@endsection

@section('content')
<main class="main">

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Bantuan Tersalurkan</h2>
        <!-- <p>Maklumat Pelayanan adalah pernyataan komitmen dari suatu organisasi atau lembaga pelayanan publik untuk memberikan pelayanan yang berkualitas, profesional, dan sesuai dengan standar yang telah ditetapkan</p> -->
      </div><!-- End Section Title -->

      <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          {{-- <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-app">App</li>
            <li data-filter=".filter-product">Card</li>
            <li data-filter=".filter-branding">Web</li>
          </ul><!-- End Portfolio Filters --> --}}

          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <img src="https://cdn.setneg.go.id/_multimedia/photo/20180530/1552Infografis_Info_Penyampaian_Dumas.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Judul Maklumat</h4>
                <a href="https://cdn.setneg.go.id/_multimedia/photo/20180530/1552Infografis_Info_Penyampaian_Dumas.jpg" title="Judul Maklumat" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="{{ route('detail-maklumat') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <img src="https://bkpsdm.tanahlautkab.go.id/asset/foto_berita/218392930_4050696825026673_2763056444971296314_n.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Judul Maklumat</h4>
                <a href="https://bkpsdm.tanahlautkab.go.id/asset/foto_berita/218392930_4050696825026673_2763056444971296314_n.jpg" title="Judul Maklumat" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="{{ route('detail-maklumat') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <img src="https://cdn.setneg.go.id/_multimedia/photo/20230914/00410041WhatsApp_Image_2023-09-14_at_10.47.43.jpeg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Judul Maklumat</h4>
                <a href="https://cdn.setneg.go.id/_multimedia/photo/20230914/00410041WhatsApp_Image_2023-09-14_at_10.47.43.jpeg" title="Judul Maklumat" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="{{ route('detail-maklumat') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <img src="https://kesehatan.jogjakota.go.id/images/news/img_20230929125427_maklumat-pelayanan-dinas-kesehatan.png" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Judul Maklumat</h4>
                <a href="https://kesehatan.jogjakota.go.id/images/news/img_20230929125427_maklumat-pelayanan-dinas-kesehatan.png" title="Judul Maklumat" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="{{ route('detail-maklumat') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <img src="https://desabongkasa.badungkab.go.id/storage/desabongkasa/image/MAKLUMAT%20FOTO.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Judul Maklumat</h4>
                <a href="https://desabongkasa.badungkab.go.id/storage/desabongkasa/image/MAKLUMAT%20FOTO.jpg" title="Judul Maklumat" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="{{ route('detail-maklumat') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <img src="https://cdn.setneg.go.id/_multimedia/photo/20230914/59295929WhatsApp_Image_2023-09-14_at_10.47.29.jpeg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Judul Maklumat</h4>
                <a href="https://cdn.setneg.go.id/_multimedia/photo/20230914/59295929WhatsApp_Image_2023-09-14_at_10.47.29.jpeg" title="Judul Maklumat" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="{{ route('detail-maklumat') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

          </div><!-- End Portfolio Container -->

        </div>

      </div>

    </section><!-- /Portfolio Section -->

</main>
@endsection

@section('script')
@endsection