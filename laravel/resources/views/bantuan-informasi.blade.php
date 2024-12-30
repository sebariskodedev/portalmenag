<!-- resources/views/dashboard.blade.php -->
@extends('template.user')

@section('style')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
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
.post-slide {
  background: #fff;
  margin: 20px 15px 20px;
  border-radius: 15px;
  padding-top: 1px;
  /* box-shadow: 0px 14px 22px -9px #bbcbd8; */
  box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3);
}
.post-slide .post-img {
  position: relative;
  overflow: hidden;
  border-radius: 10px;
  margin: -12px 15px 8px 15px;
  margin-left: -10px;
}
.post-slide .post-img img {
  width: 100%;
  height: 200px;
  transform: scale(1, 1);
  transition: transform 0.2s linear;
}
.post-slide:hover .post-img img {
  transform: scale(1.1, 1.1);
}
.post-slide .over-layer {
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
  background: linear-gradient(
    -45deg,
    rgba(6, 190, 244, 0.75) 0%,
    rgba(45, 112, 253, 0.6) 100%
  );
  transition: all 0.5s linear;
}
.post-slide:hover .over-layer {
  opacity: 1;
  text-decoration: none;
}
.post-slide .over-layer i {
  position: relative;
  top: 45%;
  text-align: center;
  display: block;
  color: #fff;
  font-size: 25px;
}
.post-slide .post-content {
  background: #fff;
  padding: 2px 20px 40px;
  border-radius: 15px;
}
.post-slide .post-title a {
  font-size: 15px;
  font-weight: bold;
  color: #333;
  /* display: inline-block; */
  text-transform: uppercase;
  transition: all 0.3s ease 0s;
  text-overflow: ellipsis;
  overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
}
.post-slide .post-title a:hover {
  text-decoration: none;
  color: #3498db;
}
.post-slide .post-description {
  line-height: 24px;
  color: #808080;
  margin-bottom: 25px;
  text-overflow: ellipsis;
  overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
}
.post-slide .post-date {
  color: #a9a9a9;
  font-size: 14px;
}
.post-slide .post-date i {
  font-size: 20px;
  margin-right: 8px;
  color: #cfdace;
}
.post-slide .read-more {
  padding: 7px 20px;
  float: right;
  font-size: 12px;
  background: #005faf;
  color: #ffffff;
  box-shadow: 0px 10px 20px -10px #1376c5;
  border-radius: 25px;
  text-transform: uppercase;
}
.post-slide .read-more:hover {
  background: #3498db;
  text-decoration: none;
  color: #fff;
}
.owl-controls .owl-buttons {
  text-align: center;
  margin-top: 20px;
}
.owl-controls .owl-buttons .owl-prev {
  background: #fff;
  position: absolute;
  top: -13%;
  left: 15px;
  padding: 0 18px 0 15px;
  border-radius: 50px;
  box-shadow: 3px 14px 25px -10px #92b4d0;
  transition: background 0.5s ease 0s;
}
.owl-controls .owl-buttons .owl-next {
  background: #fff;
  position: absolute;
  top: -13%;
  right: 15px;
  padding: 0 15px 0 18px;
  border-radius: 50px;
  box-shadow: -3px 14px 25px -10px #92b4d0;
  transition: background 0.5s ease 0s;
}
.owl-controls .owl-buttons .owl-prev:after,
.owl-controls .owl-buttons .owl-next:after {
  content: "\f104";
  font-family: FontAwesome;
  color: #333;
  font-size: 30px;
}
.owl-controls .owl-buttons .owl-next:after {
  content: "\f105";
}
@media only screen and (max-width: 1280px) {
  .post-slide .post-content {
    padding: 0px 15px 25px 15px;
  }
}
</style>
@endsection

@section('content')
<main class="main dinamyc-color">

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section dinamyc-color">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2 class="text-dinamyc-color-primary">Informasi Bantuan</h2>
        <!-- <p>Maklumat Pelayanan adalah pernyataan komitmen dari suatu organisasi atau lembaga pelayanan publik untuk memberikan pelayanan yang berkualitas, profesional, dan sesuai dengan standar yang telah ditetapkan</p> -->
      </div><!-- End Section Title -->

      <div class="container">


      <div id="news-slider" class="owl-carousel">
                  
        @foreach ($bantuans as $data)
          <div class="post-slide dinamyc-color-card">
            <div class="post-img">
              <img src="{{ asset('bantuan-informasi/' . $data->gambar) }}" alt="">
              <a href="{{ route('article-page') }}" class="over-layer"><i class="fa fa-link"></i></a>
            </div>
            <div class="post-content dinamyc-color-card">
              <h3 class="post-title">
                <a class="text-dinamyc-color-primary" href="{{ route('article-page') }}">{{$data->nama}}</a>
              </h3>
              <p class="post-description text-dinamyc-color deskripsi-berita deskripsi-berita{{$loop->iteration}}">{{$data->deskripsi}}</p>
              <span class="post-date text-dinamyc-color"><i class="fa fa-clock-o"></i>{{$data->created_at}}</span>
              <a href="{{ route('article-page') }}" class="read-more">selengkapnya</a>
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