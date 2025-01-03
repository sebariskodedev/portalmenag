<!-- resources/views/dashboard.blade.php -->
@extends('template.user')

@section('style')
@endsection

@section('content')
<main class="main dinamyc-color">

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section dinamyc-color">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2 class="text-dinamyc-color-primary">Maklumat Pelayanan</h2>
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
            @foreach ($layanans as $data)
              <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                <img src="{{ asset('maklumat-pelayanan/' . $data->gambar) }}" class="img-fluid" alt="">
                <div class="portfolio-info dinamyc-color-card">
                  <h4 class="text-dinamyc-color-primary">{{$data->judul}}</h4>
                  {{-- <p class="text-dinamyc-color">{{$data->deskripsi}}</p> --}}
                  <a href="{{ asset('maklumat-pelayanan/' . $data->gambar) }}" title="{{$data->judul}}" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in text-dinamyc-color"></i></a>
                  {{-- <a href="{{ route('detail-maklumat') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg text-dinamyc-color"></i></a> --}}
                </div>
              </div><!-- End Portfolio Item -->
            @endforeach

          </div><!-- End Portfolio Container -->

        </div>

      </div>

    </section><!-- /Portfolio Section -->

</main>
@endsection

@section('script')
@endsection