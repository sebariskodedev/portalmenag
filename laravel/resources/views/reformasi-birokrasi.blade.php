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
<main class="main">

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Reformasi Birokrasi</h2>
        <!-- <p>Maklumat Pelayanan adalah pernyataan komitmen dari suatu organisasi atau lembaga pelayanan publik untuk memberikan pelayanan yang berkualitas, profesional, dan sesuai dengan standar yang telah ditetapkan</p> -->
      </div><!-- End Section Title -->

      <div class="container">


        <div id="news-slider" class="owl-carousel">

            <div class="grid-item">
                <img src="https://images.unsplash.com/photo-1533227268428-f9ed0900fb3b?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=303&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=503" alt="Image" class="grid-item__image">
                <div class="grid-item__content">
                    <h3 class="grid-item__title">Manajemen Perubahan</h3>
                    <a href="{{ route('reformasi-birokrasi-action', ['id' => '1']) }}" class="grid-item__readmore">Selengkapnya <span class="arrow">→</span></a>
                </div>
            </div>

            <div class="grid-item">
                <img src="https://images.unsplash.com/photo-1533227268428-f9ed0900fb3b?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=303&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=503" alt="Image" class="grid-item__image">
                <div class="grid-item__content">
                    <h3 class="grid-item__title">Organisasi</h3>
                    <a href="{{ route('reformasi-birokrasi-action', ['id' => '1']) }}" class="grid-item__readmore">Selengkapnya <span class="arrow">→</span></a>
                </div>
            </div>

            <div class="grid-item">
                <img src="https://images.unsplash.com/photo-1533227268428-f9ed0900fb3b?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=303&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=503" alt="Image" class="grid-item__image">
                <div class="grid-item__content">
                    <h3 class="grid-item__title">Tata Laksana</h3>
                    <a href="{{ route('reformasi-birokrasi-action', ['id' => '1']) }}" class="grid-item__readmore">Selengkapnya <span class="arrow">→</span></a>
                </div>
            </div>

            <div class="grid-item">
                <img src="https://images.unsplash.com/photo-1533227268428-f9ed0900fb3b?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=303&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=503" alt="Image" class="grid-item__image">
                <div class="grid-item__content">
                    <h3 class="grid-item__title">Peraturan Perundang-undangan</h3>
                    <a href="{{ route('reformasi-birokrasi-action', ['id' => '1']) }}" class="grid-item__readmore">Selengkapnya <span class="arrow">→</span></a>
                </div>
            </div>

            <div class="grid-item">
                <img src="https://images.unsplash.com/photo-1533227268428-f9ed0900fb3b?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=303&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=503" alt="Image" class="grid-item__image">
                <div class="grid-item__content">
                    <h3 class="grid-item__title">Sumber Daya Manusia</h3>
                    <a href="{{ route('reformasi-birokrasi-action', ['id' => '1']) }}" class="grid-item__readmore">Selengkapnya <span class="arrow">→</span></a>
                </div>
            </div>

            <div class="grid-item">
                <img src="https://images.unsplash.com/photo-1533227268428-f9ed0900fb3b?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=303&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=503" alt="Image" class="grid-item__image">
                <div class="grid-item__content">
                    <h3 class="grid-item__title">Akuntabilitas</h3>
                    <a href="{{ route('reformasi-birokrasi-action', ['id' => '1']) }}" class="grid-item__readmore">Selengkapnya <span class="arrow">→</span></a>
                </div>
            </div>

            <div class="grid-item">
                <img src="https://images.unsplash.com/photo-1533227268428-f9ed0900fb3b?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=303&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=503" alt="Image" class="grid-item__image">
                <div class="grid-item__content">
                    <h3 class="grid-item__title">Penguatan Pengawasan</h3>
                    <a href="{{ route('reformasi-birokrasi-action', ['id' => '1']) }}" class="grid-item__readmore">Selengkapnya <span class="arrow">→</span></a>
                </div>
            </div>

            <div class="grid-item">
                <img src="https://images.unsplash.com/photo-1533227268428-f9ed0900fb3b?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=303&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=503" alt="Image" class="grid-item__image">
                <div class="grid-item__content">
                    <h3 class="grid-item__title">Pelayanan Publik</h3>
                    <a href="{{ route('reformasi-birokrasi-action', ['id' => '1']) }}" class="grid-item__readmore">Selengkapnya <span class="arrow">→</span></a>
                </div>
            </div>

        </div>

      </div>

    </section><!-- /Portfolio Section -->

</main>
@endsection

@section('script')
@endsection