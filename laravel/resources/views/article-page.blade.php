<!-- resources/views/dashboard.blade.php -->
@extends('template.user')

@section('style')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style>
/* Article Styles */
.article-title {
  font-size: 2rem;
  font-weight: bold;
  margin-bottom: 10px;
}

.article-meta {
  font-size: 0.9rem;
  color: #666;
  margin-bottom: 18px;
}

/* Image and Figure Styling */
.image-square {
  position: relative;
  /* padding-bottom: 40%; */
  border-radius: 8px;
  overflow: hidden;
  display: flex;
  flex-direction: column; /* Stack items vertically */
  justify-content: center;
  align-items: center;
}

.image-square-top {
  position: relative;
  /* padding-bottom: 10%; */
  border-radius: 8px;
  overflow: hidden;
  display: flex;
  flex-direction: column; /* Stack items vertically */
  justify-content: center;
  align-items: center;
}

.image-square img {
  position: relative;
  top: 0;
  left: 0;
  width: 100%;
  height: auto;
  object-fit: cover;
  border-radius: 8px;
}

.image-square-top img {
  border-radius: 8px;
  position: relative;
  /* top: 50%; */
  /* left: 50%; */
  width: 100%;
  height: 90%;
  max-height: 600px;
  object-fit: contain; /* Ensures the image is fully visible and not cropped */
  /* transform: translate(-50%, -50%); */
  background-color: transparent; /* Optional: Set a background color to fill empty space */
}

.image-note {
  position: relative;
  text-align: center;
  font-size: 0.8rem;
  color: #555;
  bottom: 0;
  text-align: justify;
}

/* Specific Positions */
.top-center-image {
  float: center;
  width: 100%;
}

.top-right-image {
  float: right;
  margin-left: 20px;
  width: 50%;
  max-height: 50vw;
}

.center-left-image {
  float: left;
  margin-right: 20px;
  width: 40%;
  top: 100%;
}

/* Article Content */
.post-description {
  text-align: justify;
  margin-bottom: 15px;
  font-size: 1.2rem;
}

/* Clearfix for Float */
.article-content::after {
  content: "";
  display: table;
  clear: both;
}

/* Tablet styles */
@media (min-width: 768px) and (max-width: 1024px) {
  .image-square {
    width: 100%;
    padding-bottom: 100%;
    display: none;
  }
  .image-square-top {
    width: 100%;
    padding-bottom: 100%;
  }

  .top-right-image,
  .top-center-image,
  .center-left-image {
    float: none;
    margin: 0 auto 20px;
  }
}

/* Responsive Design */
@media (max-width: 768px) {
  .image-square {
    width: 100%;
    padding-bottom: 100%;
    display: none;
  }
  .image-square-top {
    width: 100%;
    padding-bottom: 100%;
  }

  .top-right-image,
  .top-center-image,
  .center-left-image {
    float: none;
    margin: 0 auto 20px;
  }
}
</style>
@endsection

@section('content')
<main class="main dinamyc-color">
  <!-- Portfolio Section -->
  <section id="portfolio" class="portfolio section dinamyc-color">
    <div class="container">
      <div class="article">
        <h1 class="article-title text-dinamyc-color-primary">{{$data->judul}}</h1>
        <p class="article-meta text-dinamyc-color">Dipublikasi pada {{$data->created_at}}</p>

        <div class="article-content">

          @if($data->type == 1)
            <!-- First Image (Top Right) -->
            <figure class="image-square-top top-center-image">
              <img src="{{ asset($kategori. '/' . $data->gambar1) }}" alt="Top Right Image">
              <p class="image-note text-dinamyc-color">Gambar 1: {{$data->keterangan1}}</p>
            </figure>

            <p data-content="{{$data->deskripsi}}" class="post-description text-dinamyc-color deskripsi-berita">The content from Quill will appear here.</p>
          @else
            <!-- First Image (Top Right) -->
            <figure class="image-square-top top-center-image">
              <img src="{{ asset($kategori. '/' . $data->gambar1) }}" alt="Top Right Image">
              <p class="image-note text-dinamyc-color">Gambar 1: {{$data->keterangan1}}</p>
            </figure>
              
            <!-- First Image (Top Right) -->
            <figure class="image-square top-right-image">
              <img src="{{ asset($kategori. '/' . $data->gambar2) }}" alt="Top Right Image">
              <p class="image-note text-dinamyc-color">Gambar 2: {{$data->keterangan2}}</p>
            </figure>

            <p data-content="{{$data->deskripsi}}" class="post-description text-dinamyc-color deskripsi-berita">The content from Quill will appear here.</p>
          @endif

        </div>
      </div>
    </div>
  </section>
</main>
@endsection

@section('script')

<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Create a hidden div element for the Quill editor container
        const quillContainer = document.createElement('div');
        quillContainer.style.display = 'none'; // Hide the editor container

        // Append it to the body
        document.body.appendChild(quillContainer);

        // Initialize Quill without showing the toolbar
        const quill = new Quill(quillContainer, {
            modules: { toolbar: false }, // Disable the toolbar
            theme: null, // No theme to avoid additional UI rendering
            readOnly: true, // Make the editor read-only
        });

        const deskripsiBerita = document.querySelectorAll('.deskripsi-berita');
        deskripsiBerita.forEach((element) => {
            const dataContent = element.getAttribute('data-content');
            
            // Set existing content into the Quill editor
            quill.root.innerHTML = dataContent;

            // Extract the processed content and display it in the element
            element.innerHTML = quill.root.innerHTML;
        });
    });
</script>
<script>
</script>
@endsection