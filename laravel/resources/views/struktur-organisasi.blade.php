<!-- resources/views/dashboard.blade.php -->
@extends('template.user')

@section('style')
  <style>
    .image-container {
      position: relative; /* Enables positioning of text over the image */
      width: 100%; /* Full width of the parent element */
      height: auto; /* Adjust height based on the image */
    }

    .image-container h2 {
      margin-top: 50px; /* Remove default margin */
      text-align: center; /* Center-align the text */
      top: 0;
      width: 100%; /* Ensure the text spans the container width */
      z-index: 1; /* Ensure the text appears above the image */
    }

    .image-container img {
      display: block;
      width: 100%; /* Image fills the width of the container */
      height: auto; /* Maintain the aspect ratio */
    }
  </style>
@endsection

@section('content')
<main class="main">



    <!-- Services Section -->
    <div class="container">

        <div class="image-container">
            <h2>Struktur {{$struktur->judul}}</h2>

            <img src="{{ asset('struktur/' . $struktur->gambar) }}" 
                            alt="{{ $struktur->judul }}" >

        </div>

    </div>

</main>
@endsection

@section('script')
@endsection