<!-- resources/views/dashboard.blade.php -->
@extends('template.user')

@section('style')
<style>
#news-slider {
  display: grid;
  gap: 10px; /* Optional: spacing between items */
}

/* Desktop: 3 columns */
@media (min-width: 1024px) {
    #news-slider {
    grid-template-columns: repeat(3, 1fr);
  }
}

/* Tablet: 2 columns */
@media (min-width: 768px) and (max-width: 1023px) {
    #news-slider {
    grid-template-columns: repeat(2, 1fr);
  }
}

/* Mobile: 1 column */
@media (max-width: 767px) {
    #news-slider {
    grid-template-columns: 1fr;
  }
}
@media only screen and (max-width: 1280px) {
  .post-slide .post-content {
    padding: 0px 15px 25px 15px;
  }
}


.grid-item {
    display: flex;
    align-items: center;
    background: white;
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.grid-item:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

.grid-item__image {
    width: 40%;
    height: 160px;
    object-fit: cover;
    flex-shrink: 0;
    transition: transform 0.3s ease;
}

.grid-item:hover .grid-item__image {
    transform: scale(1.1);
}

.grid-item__content {
    padding: 15px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.grid-item__title {
    font-size: 18px;
    margin: 0;
    margin-bottom: 10px;
    color: #333;
    transition: color 0.3s ease;
}

.grid-item:hover .grid-item__title {
    color: #005faf;
}

.grid-item__readmore {
    font-size: 14px;
    margin-top: 20px;
    text-decoration: none;
    color: #007bff;
    transition: color 0.3s ease;
    font-weight: 500;
}

.grid-item__readmore:hover {
    color: #0056b3;
    text-decoration: none;
}
</style>
@endsection

@section('content')
<main class="main dinamyc-color">

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section dinamyc-color">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2 class="text-dinamyc-color-primary">Reformasi Birokrasi</h2>
        <!-- <p>Maklumat Pelayanan adalah pernyataan komitmen dari suatu organisasi atau lembaga pelayanan publik untuk memberikan pelayanan yang berkualitas, profesional, dan sesuai dengan standar yang telah ditetapkan</p> -->
      </div><!-- End Section Title -->

      <div class="container">


        <div id="news-slider" class="owl-carousel">
            @foreach ($kategorirbs as $data)
                <div class="grid-item dinamyc-color-card">
                    <img src="{{ asset('kategoriRB/' . $data->gambar) }}" alt="Image" class="grid-item__image">
                    <div class="grid-item__content">
                        <h3 class="grid-item__title text-dinamyc-color-primary">{{$data->name}}</h3>
                        <a href="{{ route('reformasi-birokrasi-action', ['id' => $data->id]) }}" class="grid-item__readmore">Selengkapnya <span class="arrow">→</span></a>
                    </div>
                </div>
            @endforeach

        </div>

      </div>

    </section><!-- /Portfolio Section -->

</main>
@endsection

@section('script')
@endsection