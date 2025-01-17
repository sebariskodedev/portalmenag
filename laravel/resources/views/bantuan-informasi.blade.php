<!-- resources/views/dashboard.blade.php -->
@extends('template.user')

@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}">
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
  opacity: 1;
  transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
  transform: scale(1);
}

.post-slide.hidden {
  opacity: 0;
  transform: scale(0.9);
  pointer-events: none;
}

.post-slide.invisible {
  display: none; /* Completely remove after animation ends */
}
/* .post-slide .post-img {
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
} */
.post-slide .post-img {
  position: relative;
  overflow: hidden;
  border-radius: 10px;
  /* margin: -12px 15px 8px 15px;
  margin-left: -10px; */
}
.post-slide .post-img img {
  width: 100%; /* Full width */
  aspect-ratio: 1 / 1; /* Maintain a 1:1 aspect ratio for a square */
  object-fit: cover; /* Ensures the image fills the square without distortion */
  /* transform: scale(1, 1);
  transition: transform 0.2s linear; */
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

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">Semua</li>
            <li data-filter=".filter-pendidikan">Pendidikan</li>
            <li data-filter=".filter-keagamaan">Keagamaan</li>
          </ul><!-- End Portfolio Filters -->


          <div id="news-slider" class="owl-carousel">
                      
            @foreach ($bantuans as $data)
              @if($data->tipe == "pendidikan")
              <div class="post-slide dinamyc-color-card filter-pendidikan">
                <div class="post-img">
                  <img src="{{ asset('bantuan-informasi/' . $data->gambar) }}" alt="">
                  <a href="{{ route('bantuan-informasi-action', ['id' => $data->id]) }}" class="over-layer"><i class="fa fa-link"></i></a>
                </div>
                <div class="post-content dinamyc-color-card">
                  <h3 style="height: 40px;" class="post-title">
                    <a class="text-dinamyc-color-primary" href="{{ route('bantuan-informasi-action', ['id' => $data->id]) }}">{{$data->nama}}</a>
                  </h3>
                  <p style="height: 70px;" data-content="{{$data->deskripsi}}" class="post-description text-dinamyc-color deskripsi-berita deskripsi-berita{{$loop->iteration}}">The content from Quill will appear here.</p>
                  <span class="post-description text-dinamyc-color"><strong>Status:</strong> {{$data->status}}<br><strong>Tipe Bantuan:</strong> {{$data->tipe}}<br><strong>Jumlah Kuota:</strong> {{$data->jumlah_kuota}}</span>
                  <span class="post-date text-dinamyc-color"><i class="fa fa-clock-o"></i>{{$data->created_at}}</span>
                  <a href="{{ route('bantuan-informasi-action', ['id' => $data->id]) }}" class="read-more">selengkapnya</a>
                </div>
              </div>
              @else
              <div class="post-slide dinamyc-color-card filter-keagamaan">
                <div class="post-img">
                  <img src="{{ asset('bantuan-informasi/' . $data->gambar) }}" alt="">
                  <a href="{{ route('bantuan-informasi-action', ['id' => $data->id]) }}" class="over-layer"><i class="fa fa-link"></i></a>
                </div>
                <div class="post-content dinamyc-color-card">
                  <h3 style="height: 40px;" class="post-title">
                    <a class="text-dinamyc-color-primary" href="{{ route('bantuan-informasi-action', ['id' => $data->id]) }}">{{$data->nama}}</a>
                  </h3>
                  <p style="height: 70px;" data-content="{{$data->deskripsi}}" class="post-description text-dinamyc-color deskripsi-berita deskripsi-berita{{$loop->iteration}}">The content from Quill will appear here.</p>
                  <span class="post-description text-dinamyc-color"><strong>Status:</strong> {{$data->status}}<br><strong>Tipe Bantuan:</strong> {{$data->tipe}}<br><strong>Jumlah Kuota:</strong> {{$data->jumlah_kuota}}</span>
                  <span class="post-date text-dinamyc-color"><i class="fa fa-clock-o"></i>{{$data->created_at}}</span>
                  <a href="{{ route('bantuan-informasi-action', ['id' => $data->id]) }}" class="read-more">selengkapnya</a>
                </div>
              </div>
              @endif
            @endforeach

            
          </div>
        <div>

      </div>

    </section><!-- /Portfolio Section -->

</main>
@endsection

@section('script')

<script>
document.addEventListener("DOMContentLoaded", function () {
  const filters = document.querySelectorAll(".portfolio-filters li"); // Filter buttons
  const cards = document.querySelectorAll(".post-slide"); // All cards

  // Add click event listeners to each filter
  filters.forEach(filter => {
    filter.addEventListener("click", () => {
      // Remove active class from all filters and add to the clicked one
      filters.forEach(f => f.classList.remove("filter-active"));
      filter.classList.add("filter-active");

      const selectedFilter = filter.getAttribute("data-filter");

      cards.forEach(card => {
        if (selectedFilter === "*" || card.classList.contains(selectedFilter.replace(".", ""))) {
          // Show card with animation
          card.classList.remove("hidden", "invisible");
        } else {
          // Hide card with animation
          card.classList.add("hidden");
          setTimeout(() => {
            card.classList.add("invisible");
          }, 500); // Match the duration of the CSS transition
        }
      });
    });
  });
});

</script>

<script>

// Function to get client's IP using an external service
async function getClientIp() {
    try {
        const response = await fetch('https://api.ipify.org?format=json');
        const data = await response.json();
        return data.ip;
    } catch (error) {
        console.error('Error fetching IP:', error);
        return null;
    }
}

document.addEventListener('DOMContentLoaded', async function () {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    const ip = await getClientIp();

    if (!ip) {
        console.error('IP address is required');
        return;
    }

    const data = { ip: ip };

    try {
        const response = await fetch('/api/post-klik-bantuan', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify(data)
        });

        if (response.ok) {
            const result = await response.json();
            // console.log(result);
        } else {
            const errorResponse = await response.text();
            console.error('Failed to add Kunjungan:', errorResponse);
        }
    } catch (error) {
        console.error('Error during fetch:', error);
    }
});
</script>

<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Create a hidden div element for the Quill editor container
        const quillContainer = document.createElement('div');
        quillContainer.style.display = 'none'; // Hide the editor container completely

        // Append the container to the body
        document.body.appendChild(quillContainer);

        // Initialize the Quill editor without a toolbar
        const quill = new Quill(quillContainer, {
            modules: { toolbar: false }, // Disable the toolbar
            theme: null, // No theme to avoid UI rendering
            readOnly: true, // Make the editor read-only
        });

        // Process each `.deskripsi-berita` element
        const deskripsiBerita = document.querySelectorAll('.deskripsi-berita');
        deskripsiBerita.forEach((element) => {
            // Get the `data-content` attribute value
            const dataContent = element.getAttribute('data-content');
            
            // Set the content into Quill's root element
            quill.root.innerHTML = dataContent;

            // Retrieve the processed content from Quill
            const quillContent = quill.root.innerHTML;

            // Update the target element's innerHTML with the processed content
            element.innerHTML = quillContent;
        });

        // Clean up by removing the hidden Quill container from the DOM
        document.body.removeChild(quillContainer);
    });
</script>
@endsection