@extends('template.user')

@section('style')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<style>
.container-x {
    display: flex;
    justify-content: space-between; /* Spaces items evenly */
    align-items: center; /* Centers items vertically if the container has height */
}
.container-x a {
    background-color: #005faf;
    padding-left: 15px;
    padding-right: 15px;
    padding-top: 6px;
    padding-bottom: 6px;
    color: white;
    border-radius: 10px; /* Sets a 10px radius on all corners */
}

.informasi-lengkap:hover {
  background-color: #2487ce;
}

.ellipsis-judul {
    display: -webkit-box; /* Enables multiline ellipsis */
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    -webkit-line-clamp: 1; /* Limits to 3 lines */
    line-height: 1.5em; /* Adjust line height as needed */
    max-height: 4.5em; /* Should be line-height * number of lines */
    font-weight: bold;
    font-size: 1.1em;
    /* color: white; */
}

.ellipsis-deskripsi {
    margin-top: 10px;
    margin-bottom: 10px;
    display: -webkit-box; /* Enables multiline ellipsis */
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    -webkit-line-clamp: 2; /* Limits to 3 lines */
    line-height: 1.5em; /* Adjust line height as needed */
    max-height: 4.5em; /* Should be line-height * number of lines */
    font-size: 1em;
    /* color: #005faf; */
}

.read-more {
    font-size: 1em;
    /* color: white; */
}

.eselon1 {
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 15px; /* Optional: rounded corners */
    cursor: pointer; /* Change cursor to pointer (finger) */
    background-color: #005faf; /* Changes background on hover */
    box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3); */
}

/* Hover effect */
.eselon1:hover {
    background-color: #005faf; /* Changes background on hover */
    margin-bottom: 5px;
}

/* Hover effect */
.eselon1:hover h3 {
  color: white;
}

.eselon2 {
  width: 100%;
  display: flex;
  justify-content: center; /* Space items vertically */
  align-items: center; /* Center items horizontally */
  border-radius: 15px; /* Optional: rounded corners */
  cursor: pointer; /* Change cursor to pointer (finger) */
  box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3); */
}

.ol-eselon2 {
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Phone (Mobile) */
@media (max-width: 600px) {
  .ol-eselon2 {
    width: 100%;
  }
}

/* Tablet */
@media (min-width: 601px) and (max-width: 1024px) {
  .ol-eselon2 {
    width: 100%;
  }
}

/* Desktop */
@media (min-width: 1025px) {
  .ol-eselon2 {
    width: 33.3%;
  }
}

/* Hover effect */
.eselon2:hover {
    background-color: #005faf; /* Changes background on hover */
    margin-left: 5px;
    margin-bottom: 5px;
}

/* Hover effect */
.eselon2:hover h4 {
  color: white;
}

.eselon2 .eselon2-item {
    /* Optional styling for items */
    margin: 5px;
    padding-left: 10%;
    padding-right: 10%;
    padding-top: 20px;
    padding-bottom: 20px;
    background-color: #f0f0f0;
    border-radius: 5px;
    background-color: #005faf;
    color: white;
}

/* OrgChart CSS Base: Reference https://www.cssscript.com/responsive-hierarchical-organization-chart-pure-css/ */

ol.organizational-chart,
ol.organizational-chart ol,
ol.organizational-chart li,
ol.organizational-chart li > div {
  position: relative;
}

ol.organizational-chart,
ol.organizational-chart ol {
  list-style: none;
  margin: 0;
  padding: 0;
}

ol.organizational-chart {
  text-align: center;
}

ol.organizational-chart ol {
  padding-top: 1em;
}

ol.organizational-chart ol:before,
ol.organizational-chart ol:after,
ol.organizational-chart li:before,
ol.organizational-chart li:after,
ol.organizational-chart > li > div:before,
ol.organizational-chart > li > div:after {
  background-color: #b7a6aa;
  content: "";
  position: absolute;
}

ol.organizational-chart ol > li {
  padding: 1em 0 0 1em;
}

ol.organizational-chart > li ol:before {
  height: 1em;
  left: 50%;
  top: 0;
  width: 3px;
}

ol.organizational-chart > li ol:after {
  height: 3px;
  left: 3px;
  top: 1em;
  width: 50%;
}

ol.organizational-chart > li ol > li:not(:last-of-type):before {
  height: 3px;
  left: 0;
  top: 2em;
  width: 1em;
}

ol.organizational-chart > li ol > li:not(:last-of-type):after {
  height: 100%;
  left: 0;
  top: 0;
  width: 3px;
}

ol.organizational-chart > li ol > li:last-of-type:before {
  height: 3px;
  left: 0;
  top: 2em;
  width: 1em;
}

ol.organizational-chart > li ol > li:last-of-type:after {
  height: 2em;
  left: 0;
  top: 0;
  width: 3px;
}

ol.organizational-chart li > div {
  background-color: #fff;
  border-radius: 3px;
  min-height: 2em;
  padding: 0.5em;
}

/*** PRIMARY ***/
ol.organizational-chart > li > div {
  background-color: #a2ed56;
  margin-right: 1em;
}

ol.organizational-chart > li > div:before {
  bottom: 2em;
  height: 3px;
  right: -1em;
  width: 1em;
}

ol.organizational-chart > li > div:first-of-type:after {
  bottom: 0;
  height: 2em;
  right: -1em;
  width: 3px;
}

ol.organizational-chart > li > div + div {
  margin-top: 1em;
}

ol.organizational-chart > li > div + div:after {
  height: calc(100% + 1em);
  right: -1em;
  top: -1em;
  width: 3px;
}

/*** SECONDARY ***/
ol.organizational-chart > li > ol:before {
  left: inherit;
  right: 0;
}

ol.organizational-chart > li > ol:after {
  left: 0;
  width: 100%;
}

ol.organizational-chart > li > ol > li > div {
  background-color: #83e4e2;
}

/*** TERTIARY ***/
ol.organizational-chart > li > ol > li > ol > li > div {
  background-color: #fd6470;
}

/*** QUATERNARY ***/
ol.organizational-chart > li > ol > li > ol > li > ol > li > div {
  background-color: #fca858;
}

/*** QUINARY ***/
ol.organizational-chart > li > ol > li > ol > li > ol > li > ol > li > div {
  background-color: #fddc32;
}


/* OrgChart CSS Response Screen: Reference https://www.cssscript.com/responsive-hierarchical-organization-chart-pure-css/ */
@media only screen and (min-width: 64em) {
  ol.organizational-chart {
    margin-left: -1em;
    margin-right: -1em;
  }

  /* PRIMARY */
  ol.organizational-chart > li > div {
    display: inline-block;
    float: none;
    margin: 0 1em 1em 1em;
    vertical-align: bottom;
  }

  ol.organizational-chart > li > div:only-of-type {
    margin-bottom: 0;
    width: calc((100% / 1) - 2em - 4px);
  }

  ol.organizational-chart > li > div:first-of-type:nth-last-of-type(2),
  ol.organizational-chart > li > div:first-of-type:nth-last-of-type(2) ~ div {
    width: calc((100% / 2) - 2em - 4px);
  }

  ol.organizational-chart > li > div:first-of-type:nth-last-of-type(3),
  ol.organizational-chart > li > div:first-of-type:nth-last-of-type(3) ~ div {
    width: calc((100% / 3) - 2em - 4px);
  }

  ol.organizational-chart > li > div:first-of-type:nth-last-of-type(4),
  ol.organizational-chart > li > div:first-of-type:nth-last-of-type(4) ~ div {
    width: calc((100% / 4) - 2em - 4px);
  }

  ol.organizational-chart > li > div:first-of-type:nth-last-of-type(5),
  ol.organizational-chart > li > div:first-of-type:nth-last-of-type(5) ~ div {
    width: calc((100% / 5) - 2em - 4px);
  }

  ol.organizational-chart > li > div:before,
  ol.organizational-chart > li > div:after {
    bottom: -1em !important;
    top: inherit !important;
  }

  ol.organizational-chart > li > div:before {
    height: 1em !important;
    left: 50% !important;
    width: 3px !important;
  }

  ol.organizational-chart > li > div:only-of-type:after {
    display: none;
  }

  ol.organizational-chart > li > div:first-of-type:not(:only-of-type):after,
  ol.organizational-chart > li > div:last-of-type:not(:only-of-type):after {
    bottom: -1em;
    height: 3px;
    width: calc(50% + 1em + 3px);
  }

  ol.organizational-chart > li > div:first-of-type:not(:only-of-type):after {
    left: calc(50% + 3px);
  }

  ol.organizational-chart > li > div:last-of-type:not(:only-of-type):after {
    left: calc(-1em - 3px);
  }

  ol.organizational-chart > li > div + div:not(:last-of-type):after {
    height: 3px;
    left: -2em;
    width: calc(100% + 4em);
  }

  /* SECONDARY */
  ol.organizational-chart > li > ol {
    display: flex;
    flex-wrap: nowrap;
  }

  ol.organizational-chart > li > ol:before,
  ol.organizational-chart > li > ol > li:before {
    height: 1em !important;
    left: 50% !important;
    top: 0 !important;
    width: 3px !important;
  }

  ol.organizational-chart > li > ol:after {
    display: none;
  }

  ol.organizational-chart > li > ol > li {
    flex-grow: 1;
    padding-left: 1em;
    padding-right: 1em;
    padding-top: 1em;
  }

  ol.organizational-chart > li > ol > li:only-of-type {
    padding-top: 0;
  }

  ol.organizational-chart > li > ol > li:only-of-type:before,
  ol.organizational-chart > li > ol > li:only-of-type:after {
    display: none;
  }

  ol.organizational-chart > li > ol > li:first-of-type:not(:only-of-type):after,
  ol.organizational-chart > li > ol > li:last-of-type:not(:only-of-type):after {
    height: 3px;
    top: 0;
    width: 50%;
  }

  ol.organizational-chart
    > li
    > ol
    > li:first-of-type:not(:only-of-type):after {
    left: 50%;
  }

  ol.organizational-chart > li > ol > li:last-of-type:not(:only-of-type):after {
    left: 0;
  }

  ol.organizational-chart > li > ol > li + li:not(:last-of-type):after {
    height: 3px;
    left: 0;
    top: 0;
    width: 100%;
  }
}


/* For Change open/close icon on Bootstrap’s button collapse with only CSS, Reference: http://typecode.digital/change-openclose-icon-on-bootstraps-button-collapse-with-only-css/ */
[aria-expanded="false"] .menu__icon--open {
    display: block;
}

[aria-expanded="false"] .menu__icon--close {
    display: none;
}

[aria-expanded="true"] .menu__icon--open {
    display: none;
}

[aria-expanded="true"] .menu__icon--close {
    display: block;
}



        /* Parent container */
        .child-item {
            position: absolute;
            width: 100%;
            height: 50%;
            background-color: white;
            left: 0;
            bottom: 0;
            opacity: 0;                    /* Initially hidden */
            transform: translateY(100%);    /* Start below the container */
            transition: opacity 0.3s ease, transform 0.3s ease; /* Smooth animation */
            display: flex;
            flex-direction: column;
        }

        .card-layanan:hover .child-item {
            opacity: 1;                    /* Fade in */
            transform: translateY(0);       /* Slide up */
        }

        /* Item styling */
        .child-item .item {
            display: flex;
            width: 100%; /* Full width of parent */
            height: 50%; /* Half height of parent */
            margin-top: 3px;
            justify-content: center;
            align-items: center;   /* Center vertically */
            background-color: #005faf; /* First item color */
            color: white;
        }


        /* Item styling */
        .child-item .item:hover {
            background-color: #2487ce; /* First item color */
        }

        /* Item styling */
        .child-item .item h4 {
            color: white;
        }





.slider-banner {
  position: relative;
  display: inline-block;
  top: 0;
  width: 100%;
  height: 60vw;
  max-height: 600px;
  text-align: center;
  box-sizing: border-box;
  overflow: hidden;
}

.slider-banner input { display: none; }
.slider-image {
  position: absolute;
  left: 0;
  display: inline-block;
  width: 100%;
  height: 60vw;
  text-align: center;
  opacity: 0;
  visibility: hidden;
  transition: left .2s ease-in;
  overflow: hidden;
}

.slider-image img { width: 100%; }
.slider-image .nav {
  position: absolute;
  top: 0;
  width: 100%;
  height: 60vw;
  max-height: 600px;
  display: flex;          /* Enable flexbox */
  justify-content: space-between; /* Space items with space-between */
  align-items: center;    /* (Optional) Align items vertically */
}
.slider-image .nav label {
  position: relative;
  display: block;
  color: rgba(255,255,255,.5);
  font-family: 'Arial', sans-serif;
  font-size: 24px;
  font-weight: bold;
  line-height: 50px;
  width: 50px;
  height: 50px;
  background-color: rgba(0,0,0,.5);
  text-align: center;
  opacity: 0;
  z-index: 9;
}

input:checked + .slider-image {
  position: absolute;
  display: inline-block;
  opacity: 1; 
  visibility: visible;
  transition: left .2s ease-in;
}

.nav label:hover { opacity: 1; }
.slider-image .nav:hover label{
  opacity: .75;
}
.nav .prev { left: 0; border-radius: 0  10px 10px 0; }
.nav .next { right: 0; border-radius: 10px  0 0 10px; }

.bullet-nav {
  position: absolute;
  /* bottom: 0; */
  width: 100%;
}

.bullet {
  position: relative;
  display: inline-block;
  width: 20px;
  height: 3px;
  background-color: white;
  /* border: 1px solid #111; */
}

.bullet:first-child { border-radius: 10px 0 0 10px; }
.bullet:last-child { border-radius: 0 10px 10px 0; }

input#slideA:checked ~ .bullet-nav label#bulletA,
input#slideB:checked ~ .bullet-nav label#bulletB,
input#slideC:checked ~ .bullet-nav label#bulletC {
  background-color: #005faf;
}




.card-container {
  position: relative;
  /* background-color: red; */
  background-color: transparent;
  width: 100%;
  margin-top: -100px;
  display: flex;         /* Enables flexbox, which aligns items horizontally by default */
  justify-content: center; /* Center items horizontally */
  align-items: center;     /* (Optional) Center items vertically */
}

.card-item {
  position: relative;
  width: 100%;
  /* background-color: #e5e5e5; */
  background-color: transparent;
  display: flex;         /* Enables flexbox, which aligns items horizontally by default */
  justify-content: center; /* Center items horizontally */
  align-items: bottom;     /* (Optional) Center items vertically */
  bottom: 0;
  border-radius: 20px;
  /* box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3); */
}

.card-landing {
  position: relative;
  background-color: white;
  width: 100%;
  height: 300px;
  display: flex;           /* Enable flexbox */
  flex-direction: column;  /* Arrange items vertically */
  justify-content: flex-end; /* Push items to the bottom */
  color: white;
  padding: 0;
  margin: 1px;
  border-radius: 20px;
  box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3);
  /* border: 1px solid grey; */
}

.card-landing .icon-title {
  /* position: relative; */
  width: 100%;
  height: 100%;
  display: flex;           /* Enable flexbox */
  align-items: center;     /* (Optional) Center items vertically */
  flex-direction: column;  /* Stack items vertically (column layout) */
}

.card-landing .icon-title img {
  position: absolute;
  width: 200px;
  height: 200px;
  margin-top: 20px;
}

.card-landing .icon-title .capt-title {
  width: 100%;
  margin-top: 8px;
  text-align: center;      /* Center the text within the title div */
  /* background-color: #005faf; */
  display: flex;           /* Enable flexbox */
  flex-direction: column;  /* Arrange items vertically */
  justify-content: center; /* Push items to the bottom */
}

.card-landing .icon-title .capt-title span{
  color: black;
  font-weight: bold;
  font-size: 18px;
}

.card-landing .icon-title .capt-desc {
  width: 100%;
  text-align: center;      /* Center the text within the title div */
  /* background-color: #005faf; */
  display: flex;           /* Enable flexbox */
  flex-direction: column;  /* Arrange items vertically */
  justify-content: center; /* Push items to the bottom */
  padding: 10px;
}

.card-landing .icon-title .capt-desc span{
  color: black;
  font-size: 16px;
}

.child-card {
  z-index: 100000;
  opacity: 0;
  transition: all 0.1s ease; /* Smooth animation */
  width: 1px;
  height: 1px;
}
.card-landing:hover .child-card {
  opacity: 1;
  width: 100%;
  height: 100px;
}
.child-card a{
  width: 100%;
  height: 50px;
  display: flex;         /* Enables flexbox, which aligns items horizontally by default */
  justify-content: center; /* Center items horizontally */
  align-items: center;     /* (Optional) Center items vertically */
  background-color: #005faf;
  margin-top: 1px;
  color: white;
}

.child-card a:hover{
  background-color: #2487ce;
}

/* Smartphones (max-width: 600px) */
@media (max-width: 600px) {
  .card-container {
    margin-top: 0px;
  }

  .card-item {
    flex-direction: column;    /* Stack items vertically */
    width: 100%;
  }

  .card {
    /* border: none; */
    width: 100%;
    height: 300px;
  }

  /* .card:hover {
    height: 350px;
  } */
}

/* Tablets (iPads and similar devices, min-width: 601px and max-width: 1024px) */
@media (min-width: 601px) and (max-width: 1024px) {
  .card-container {
    margin-top: -100px;
  }
  .card-item {
    width: 90%;
    height: 300px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    /* border-radius: 10px; */
  }
  /* .card-landing {
    margin-left: 10px;
    margin-right: 10px;
  } */

  /* .card:hover {
    width: 300px;
    height: 350px;
  } */
}

/* Desktops (min-width: 1025px) */
@media (min-width: 1025px) {
  .card-item {
    width: 70%;
    height: 300px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    /* border-radius: 10px; */
  }

  /* .card-landing {
    margin-left: 50px;
    margin-right: 50px;
  } */

  /* .card:hover {
    width: 300px;
    height: 350px;
  } */
}








.post-slide {
  background: #fff;
  border-radius: 15px;
  /* box-shadow: 0px 14px 22px -9px #bbcbd8; */
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



.xxx {
  background-color: #f0f0f0;
  border-radius: 10px;
  box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3);
}

/* .post-slide {
  background-color: red;
} */

</style>

@endsection

@section('content')
<div class="slider-banner dinamyc-color">
  <input type="radio" name="slider" id="slideA" checked/>
  <div class="slider-image">
    <img src="{{ asset('images/banner_slider_1.jpg') }}" />
    <span class="nav">
      <label for="slideC" class="prev"><i class="bi bi-chevron-left"></i></label>
      <label for="slideB" class="next"><i class="bi bi-chevron-right"></i></label>
    </span>
  </div>

  <input type="radio" name="slider" id="slideB"/>
  <div class="slider-image">
    <img src="{{ asset('images/banner_slider_2.jpg') }}" />
    <span class="nav">
      <label for="slideA" class="prev"><i class="bi bi-chevron-left"></i></label>
      <label for="slideC" class="next"><i class="bi bi-chevron-right"></i></label>
    </span>
  </div>

  <input type="radio" name="slider" id="slideC"/>
  <div class="slider-image">
    <img src="{{ asset('images/banner_slider_3.jpg') }}" />
    <span class="nav">
      <label for="slideB" class="prev"><i class="bi bi-chevron-left"></i></label>
      <label for="slideA" class="next"><i class="bi bi-chevron-right"></i></label>
    </span>
  </div>

  <div class="bullet-nav">
    <label for="slideA" id="bulletA" class="bullet"></label>
    <label for="slideB" id="bulletB" class="bullet"></label>
    <label for="slideC" id="bulletC" class="bullet"></label>
  </div>



</div>

<div class="card-container">
  <div class="card-item" style="background-color: transparent;">
    <div class="card-landing dinamyc-color-card">
      <div class="icon-title">
        <img src="{{ asset('images/Icon_Layanan.png') }}" />
      </div>
      <div class="child-card" style="margin-bottom: 10px;">
        <div class="item"><a href="{{ route('maklumat-pelayanan') }}">Maklumat Pelayanan</a></div>
        <div class="item"><a href="{{ route('standard-pelayanan') }}">Standard Pelayanan</a></div>
      </div>
      <div style="background-color: #005faf; width: 100%; height: 80px; display: flex; justify-content: center; align-items: center;">
        <div class="capt-title"><h4 style="color: white;">Layanan</h4></div>
      </div>
    </div>
    <div class="card-landing dinamyc-color-card">
      <div class="icon-title">
        <img src="https://cdn3.iconfinder.com/data/icons/linecons-free-vector-icons-pack/32/data-512.png" />
      </div>
      <div class="child-card" style="margin-bottom: 10px;">
        <div class="item"><a href="#">Sebaran</a></div>
        <div class="item"><a href="#">Dataset</a></div>
      </div>
      <div style="background-color: #005faf; width: 100%; height: 80px; display: flex; justify-content: center; align-items: center;">
      <div class="capt-title"><h4 style="color: white;">Data</h4></div>
      </div>
    </div>
    <div class="card-landing dinamyc-color-card">
      <div class="icon-title">
        <img src="{{ asset('images/Icon_Bantuan.png') }}" />
      </div>
      <div class="child-card" style="margin-bottom: 10px;">
        <div class="item"><a href="#">Informasi Bantuan</a></div>
        <div class="item"><a href="#">Bantuan Tersalurkan</a></div>
      </div>
      <div style="background-color: #005faf; width: 100%; height: 80px; display: flex; justify-content: center; align-items: center;">
      <div class="capt-title"><h4 style="color: white;">Bantuan</h4></div>
      </div>
    </div>
  </div>
</div>


<main class="main dinamyc-color" style="margin-top: 50px;">

<!-- About Section -->
<section id="about" class="about section dinamyc-color">

<div class="container container-x section-title dinamyc-color" data-aos="fade-up">
    <h3 class="item text-dinamyc-color-primary">Informasi</h3>
</div>

<div class="container dinamyc-color">

<div class="row gy-4 dinamyc-color">

<div class="col-lg-4 dinamyc-color" data-aos="fade-up" data-aos-delay="200">
        <div class="container dinamyc-color" data-aos="fade-up" data-aos-delay="100">

            <div class="xxx swiper init-swiper dinamyc-color" data-speed="600" data-delay="5000" data-breakpoints="{ &quot;320&quot;: { &quot;slidesPerView&quot;: 1, &quot;spaceBetween&quot;: 40 }, &quot;1200&quot;: { &quot;slidesPerView&quot;: 3, &quot;spaceBetween&quot;: 40 } }">
              <script type="application/json" class="swiper-config">
                  {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                      "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "pagination": {
                      "el": ".swiper-pagination",
                      "type": "bullets",
                      "clickable": true
                  },
                  "breakpoints": {
                      "320": {
                      "slidesPerView": 1,
                      "spaceBetween": 40
                      },
                      "1200": {
                      "slidesPerView": 1,
                      "spaceBetween": 20
                      }
                  }
                  }
              </script>
              <div class="swiper-wrapper">
                    
                  @foreach ($beritas as $data)
                    <div class="swiper-slide">
                      <div class="post-slide dinamyc-color-card">
                        <div class="post-img">
                          <img src="{{ asset('berita/' . $data->gambar1) }}" alt="">
                          <a href="{{ route('berita-terbaru') }}" class="over-layer"><i class="fa fa-link"></i></a>
                        </div>
                        <div class="post-content dinamyc-color-card">
                          <h3 class="post-title">
                            <a class="text-dinamyc-color-primary" href="{{ route('berita-terbaru') }}">{{$data->judul}}</a>
                          </h3>
                          <p data-content="{{$data->deskripsi}}" class="post-description text-dinamyc-color deskripsi-berita deskripsi-berita{{$loop->iteration}}">The content from Quill will appear here.</p>
                          <span class="post-date text-dinamyc-color"><i class="fa fa-clock-o"></i>{{$data->created_at}}</span>
                          <a href="{{ route('berita-terbaru') }}" class="read-more">Berita Terbaru</a>
                        </div>
                      </div>
                    </div><!-- End testimonial item -->
                  @endforeach

              </div>
              <div class="swiper-pagination"></div>
            </div>

        </div>
</div>

<div class="col-lg-4 dinamyc-color" data-aos="fade-up" data-aos-delay="200">
        <div class="container dinamyc-color" data-aos="fade-up" data-aos-delay="100">

            <div class="xxx swiper init-swiper dinamyc-color" data-speed="600" data-delay="5000" data-breakpoints="{ &quot;320&quot;: { &quot;slidesPerView&quot;: 1, &quot;spaceBetween&quot;: 40 }, &quot;1200&quot;: { &quot;slidesPerView&quot;: 3, &quot;spaceBetween&quot;: 40 } }">
              <script type="application/json" class="swiper-config">
                  {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                      "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "pagination": {
                      "el": ".swiper-pagination",
                      "type": "bullets",
                      "clickable": true
                  },
                  "breakpoints": {
                      "320": {
                      "slidesPerView": 1,
                      "spaceBetween": 40
                      },
                      "1200": {
                      "slidesPerView": 1,
                      "spaceBetween": 20
                      }
                  }
                  }
              </script>
              <div class="swiper-wrapper">
                    
                    @foreach ($renungans as $data)
                      <div class="swiper-slide">
                        <div class="post-slide dinamyc-color-card">
                          <div class="post-img">
                            <img src="{{ asset('renungan/' . $data->gambar1) }}" alt="">
                            <a href="{{ route('renungan-terbaru') }}" class="over-layer"><i class="fa fa-link"></i></a>
                          </div>
                          <div class="post-content dinamyc-color-card">
                            <h3 class="post-title">
                              <a class="text-dinamyc-color-primary" href="{{ route('renungan-terbaru') }}">{{$data->judul}}</a>
                            </h3>
                            <p data-content="{{$data->deskripsi}}" class="post-description text-dinamyc-color deskripsi-berita deskripsi-berita{{$loop->iteration}}">The content from Quill will appear here.</p>
                            <span class="post-date text-dinamyc-color"><i class="fa fa-clock-o"></i>{{$data->created_at}}</span>
                            <a href="{{ route('renungan-terbaru') }}" class="read-more">Renungan Terbaru</a>
                          </div>
                        </div>
                      </div><!-- End testimonial item -->
                    @endforeach

              </div>
              <div class="swiper-pagination"></div>
            </div>

        </div>
</div>



<div class="col-lg-4 dinamyc-color" data-aos="fade-up" data-aos-delay="200">
        <div class="container dinamyc-color" data-aos="fade-up" data-aos-delay="100">

            <div class="xxx swiper init-swiper dinamyc-color" data-speed="600" data-delay="5000" data-breakpoints="{ &quot;320&quot;: { &quot;slidesPerView&quot;: 1, &quot;spaceBetween&quot;: 40 }, &quot;1200&quot;: { &quot;slidesPerView&quot;: 3, &quot;spaceBetween&quot;: 40 } }">
              <script type="application/json" class="swiper-config">
                  {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                      "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "pagination": {
                      "el": ".swiper-pagination",
                      "type": "bullets",
                      "clickable": true
                  },
                  "breakpoints": {
                      "320": {
                      "slidesPerView": 1,
                      "spaceBetween": 40
                      },
                      "1200": {
                      "slidesPerView": 1,
                      "spaceBetween": 20
                      }
                  }
                  }
              </script>
              <div class="swiper-wrapper">
                    
                    @foreach ($mimbars as $data)
                      <div class="swiper-slide">
                        <div class="post-slide dinamyc-color-card">
                          <div class="post-img">
                            <img src="{{ asset('mimbar/' . $data->gambar1) }}" alt="">
                            <a href="{{ route('mimbar-terbaru') }}" class="over-layer"><i class="fa fa-link"></i></a>
                          </div>
                          <div class="post-content dinamyc-color-card">
                            <h3 class="post-title">
                              <a class="text-dinamyc-color-primary" href="{{ route('mimbar-terbaru') }}">{{$data->judul}}</a>
                            </h3>
                            <p data-content="{{$data->deskripsi}}" class="post-description text-dinamyc-color deskripsi-berita deskripsi-berita{{$loop->iteration}}">The content from Quill will appear here.</p>
                            <span class="post-date text-dinamyc-color"><i class="fa fa-clock-o"></i>{{$data->created_at}}</span>
                            <a href="{{ route('mimbar-terbaru') }}" class="read-more">Mimbar Terbaru</a>
                          </div>
                        </div>
                      </div><!-- End testimonial item -->
                    @endforeach

              </div>
              <div class="swiper-pagination"></div>
            </div>

        </div>
</div>

</div>

</div>

</section><!-- /About Section -->

    {{-- <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section dinamyc-color">
        <div class="container container-x section-title dinamyc-color" data-aos="fade-up">
            <h3 class="item">Berita Terbaru</h3>
            <a href="{{ route('berita-terbaru') }}" class="item informasi-lengkap">Selengkapnya<i class="bi bi-chevron-right"></i></a>
        </div>

        <div class="container dinamyc-color" data-aos="fade-up" data-aos-delay="100">

            <div class="swiper init-swiper dinamyc-color" data-speed="600" data-delay="5000" data-breakpoints="{ &quot;320&quot;: { &quot;slidesPerView&quot;: 1, &quot;spaceBetween&quot;: 40 }, &quot;1200&quot;: { &quot;slidesPerView&quot;: 3, &quot;spaceBetween&quot;: 40 } }">
            <script type="application/json" class="swiper-config">
                {
                "loop": true,
                "speed": 600,
                "autoplay": {
                    "delay": 5000
                },
                "slidesPerView": "auto",
                "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                },
                "breakpoints": {
                    "320": {
                    "slidesPerView": 1,
                    "spaceBetween": 40
                    },
                    "1200": {
                    "slidesPerView": 3,
                    "spaceBetween": 20
                    }
                }
                }
            </script>
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                  <div class="post-slide">
                    <div class="post-img">
                      <img src="https://www.katolikana.com/wp-content/uploads/2023/06/Komper-Paroki-Mlati.png" alt="">
                      <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                    </div>
                    <div class="post-content">
                      <h3 class="post-title">
                        <a href="#">Lorem ipsum dolor sit amet.</a>
                      </h3>
                      <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium necessitatibus neque quae tempora......</p>
                      <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
                      <a href="#" class="read-more">read more</a>
                    </div>
                  </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                  <div class="post-slide">
                    <div class="post-img">
                      <img src="https://www.katolikana.com/wp-content/uploads/2023/06/Komper-Paroki-Mlati.png" alt="">
                      <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                    </div>
                    <div class="post-content">
                      <h3 class="post-title">
                        <a href="#">Lorem ipsum dolor sit amet.</a>
                      </h3>
                      <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium necessitatibus neque quae tempora......</p>
                      <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
                      <a href="#" class="read-more">read more</a>
                    </div>
                  </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                  <div class="post-slide">
                    <div class="post-img">
                      <img src="https://www.katolikana.com/wp-content/uploads/2023/06/Komper-Paroki-Mlati.png" alt="">
                      <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                    </div>
                    <div class="post-content">
                      <h3 class="post-title">
                        <a href="#">Lorem ipsum dolor sit amet.</a>
                      </h3>
                      <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium necessitatibus neque quae tempora......</p>
                      <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
                      <a href="#" class="read-more">read more</a>
                    </div>
                  </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                  <div class="post-slide">
                    <div class="post-img">
                      <img src="https://www.katolikana.com/wp-content/uploads/2023/06/Komper-Paroki-Mlati.png" alt="">
                      <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                    </div>
                    <div class="post-content">
                      <h3 class="post-title">
                        <a href="#">Lorem ipsum dolor sit amet.</a>
                      </h3>
                      <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium necessitatibus neque quae tempora......</p>
                      <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
                      <a href="#" class="read-more">read more</a>
                    </div>
                  </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                  <div class="post-slide">
                    <div class="post-img">
                      <img src="https://www.katolikana.com/wp-content/uploads/2023/06/Komper-Paroki-Mlati.png" alt="">
                      <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                    </div>
                    <div class="post-content">
                      <h3 class="post-title">
                        <a href="#">Lorem ipsum dolor sit amet.</a>
                      </h3>
                      <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium necessitatibus neque quae tempora......</p>
                      <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
                      <a href="#" class="read-more">read more</a>
                    </div>
                  </div>
                </div><!-- End testimonial item -->

            </div>
            <div class="swiper-pagination"></div>
            </div>

        </div>

    </section><!-- /Testimonials Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">
        <div class="container container-x section-title" data-aos="fade-up">
            <h3 class="item">Renungan Terbaru</h3>
            <a href="{{ route('renungan-terbaru') }}" class="item informasi-lengkap">Selengkapnya<i class="bi bi-chevron-right"></i></a>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="swiper init-swiper" data-speed="600" data-delay="5000" data-breakpoints="{ &quot;320&quot;: { &quot;slidesPerView&quot;: 1, &quot;spaceBetween&quot;: 40 }, &quot;1200&quot;: { &quot;slidesPerView&quot;: 3, &quot;spaceBetween&quot;: 40 } }">
            <script type="application/json" class="swiper-config">
                {
                "loop": true,
                "speed": 600,
                "autoplay": {
                    "delay": 5000
                },
                "slidesPerView": "auto",
                "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                },
                "breakpoints": {
                    "320": {
                    "slidesPerView": 1,
                    "spaceBetween": 40
                    },
                    "1200": {
                    "slidesPerView": 3,
                    "spaceBetween": 20
                    }
                }
                }
            </script>
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                  <div class="post-slide">
                    <div class="post-img">
                      <img src="https://www.katolikana.com/wp-content/uploads/2023/06/Komper-Paroki-Mlati.png" alt="">
                      <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                    </div>
                    <div class="post-content">
                      <h3 class="post-title">
                        <a href="#">Lorem ipsum dolor sit amet.</a>
                      </h3>
                      <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium necessitatibus neque quae tempora......</p>
                      <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
                      <a href="#" class="read-more">read more</a>
                    </div>
                  </div>
                </div><!-- End testimonial item -->
                <div class="swiper-slide">
                  <div class="post-slide">
                    <div class="post-img">
                      <img src="https://www.katolikana.com/wp-content/uploads/2023/06/Komper-Paroki-Mlati.png" alt="">
                      <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                    </div>
                    <div class="post-content">
                      <h3 class="post-title">
                        <a href="#">Lorem ipsum dolor sit amet.</a>
                      </h3>
                      <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium necessitatibus neque quae tempora......</p>
                      <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
                      <a href="#" class="read-more">read more</a>
                    </div>
                  </div>
                </div><!-- End testimonial item -->
                <div class="swiper-slide">
                  <div class="post-slide">
                    <div class="post-img">
                      <img src="https://www.katolikana.com/wp-content/uploads/2023/06/Komper-Paroki-Mlati.png" alt="">
                      <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                    </div>
                    <div class="post-content">
                      <h3 class="post-title">
                        <a href="#">Lorem ipsum dolor sit amet.</a>
                      </h3>
                      <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium necessitatibus neque quae tempora......</p>
                      <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
                      <a href="#" class="read-more">read more</a>
                    </div>
                  </div>
                </div><!-- End testimonial item -->
                <div class="swiper-slide">
                  <div class="post-slide">
                    <div class="post-img">
                      <img src="https://www.katolikana.com/wp-content/uploads/2023/06/Komper-Paroki-Mlati.png" alt="">
                      <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                    </div>
                    <div class="post-content">
                      <h3 class="post-title">
                        <a href="#">Lorem ipsum dolor sit amet.</a>
                      </h3>
                      <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium necessitatibus neque quae tempora......</p>
                      <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
                      <a href="#" class="read-more">read more</a>
                    </div>
                  </div>
                </div><!-- End testimonial item -->
                <div class="swiper-slide">
                  <div class="post-slide">
                    <div class="post-img">
                      <img src="https://www.katolikana.com/wp-content/uploads/2023/06/Komper-Paroki-Mlati.png" alt="">
                      <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                    </div>
                    <div class="post-content">
                      <h3 class="post-title">
                        <a href="#">Lorem ipsum dolor sit amet.</a>
                      </h3>
                      <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium necessitatibus neque quae tempora......</p>
                      <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
                      <a href="#" class="read-more">read more</a>
                    </div>
                  </div>
                </div><!-- End testimonial item -->

                

            </div>
            <div class="swiper-pagination"></div>
            </div>

        </div>

    </section><!-- /Testimonials Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">
        <div class="container container-x section-title" data-aos="fade-up">
            <h3 class="item">Mimbar Terbaru</h3>
            <a href="{{ route('mimbar-terbaru') }}" class="item informasi-lengkap">Selengkapnya<i class="bi bi-chevron-right"></i></a>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="swiper init-swiper" data-speed="600" data-delay="5000" data-breakpoints="{ &quot;320&quot;: { &quot;slidesPerView&quot;: 1, &quot;spaceBetween&quot;: 40 }, &quot;1200&quot;: { &quot;slidesPerView&quot;: 3, &quot;spaceBetween&quot;: 40 } }">
            <script type="application/json" class="swiper-config">
                {
                "loop": true,
                "speed": 600,
                "autoplay": {
                    "delay": 5000
                },
                "slidesPerView": "auto",
                "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                },
                "breakpoints": {
                    "320": {
                    "slidesPerView": 1,
                    "spaceBetween": 40
                    },
                    "1200": {
                    "slidesPerView": 3,
                    "spaceBetween": 20
                    }
                }
                }
            </script>
            <div class="swiper-wrapper">

              <div class="swiper-slide">
                <div class="post-slide">
                  <div class="post-img">
                    <img src="https://www.katolikana.com/wp-content/uploads/2023/06/Komper-Paroki-Mlati.png" alt="">
                    <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                  </div>
                  <div class="post-content">
                    <h3 class="post-title">
                      <a href="#">Lorem ipsum dolor sit amet.</a>
                    </h3>
                    <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium necessitatibus neque quae tempora......</p>
                    <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
                    <a href="#" class="read-more">read more</a>
                  </div>
                </div>
              </div><!-- End testimonial item -->
              <div class="swiper-slide">
                <div class="post-slide">
                  <div class="post-img">
                    <img src="https://www.katolikana.com/wp-content/uploads/2023/06/Komper-Paroki-Mlati.png" alt="">
                    <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                  </div>
                  <div class="post-content">
                    <h3 class="post-title">
                      <a href="#">Lorem ipsum dolor sit amet.</a>
                    </h3>
                    <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium necessitatibus neque quae tempora......</p>
                    <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
                    <a href="#" class="read-more">read more</a>
                  </div>
                </div>
              </div><!-- End testimonial item -->
              <div class="swiper-slide">
                <div class="post-slide">
                  <div class="post-img">
                    <img src="https://www.katolikana.com/wp-content/uploads/2023/06/Komper-Paroki-Mlati.png" alt="">
                    <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                  </div>
                  <div class="post-content">
                    <h3 class="post-title">
                      <a href="#">Lorem ipsum dolor sit amet.</a>
                    </h3>
                    <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium necessitatibus neque quae tempora......</p>
                    <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
                    <a href="#" class="read-more">read more</a>
                  </div>
                </div>
              </div><!-- End testimonial item -->
              <div class="swiper-slide">
                <div class="post-slide">
                  <div class="post-img">
                    <img src="https://www.katolikana.com/wp-content/uploads/2023/06/Komper-Paroki-Mlati.png" alt="">
                    <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                  </div>
                  <div class="post-content">
                    <h3 class="post-title">
                      <a href="#">Lorem ipsum dolor sit amet.</a>
                    </h3>
                    <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium necessitatibus neque quae tempora......</p>
                    <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
                    <a href="#" class="read-more">read more</a>
                  </div>
                </div>
              </div><!-- End testimonial item -->
              <div class="swiper-slide">
                <div class="post-slide">
                  <div class="post-img">
                    <img src="https://www.katolikana.com/wp-content/uploads/2023/06/Komper-Paroki-Mlati.png" alt="">
                    <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                  </div>
                  <div class="post-content">
                    <h3 class="post-title">
                      <a href="#">Lorem ipsum dolor sit amet.</a>
                    </h3>
                    <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium necessitatibus neque quae tempora......</p>
                    <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
                    <a href="#" class="read-more">read more</a>
                  </div>
                </div>
              </div><!-- End testimonial item -->



            </div>
            <div class="swiper-pagination"></div>
            </div>

        </div>

    </section><!-- /Testimonials Section --> --}}

    <!-- About Section -->
    <section id="about" class="about section dinamyc-color">

        <div class="container">
          <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
            <div class="col-xl-10">
              <div class="text-center">
                <h3 class="text-dinamyc-color-primary">Tentang Ditjen Bimas Katolik</h3>
                <p class="text-dinamyc-color">Direktorat Jenderal Bimbingan Masyarakat Katolik adalah unsur pelaksana yang berada di bawah dan bertanggung jawab kepada Menteri Agama. Direktorat Jenderal Bimbingan Masyarakat Katolik dipimpin oleh seorang Direktur Jenderal Direktorat Jenderal Bimbingan Masyarakat Katolik mempunyai tugas menyelenggarakan perumusan dan pelaksanaan kebijakan di bidang bimbingan masyarakat Katolik sesuai dengan ketentuan peraturan perundang-undangan.</p>
              </div>
            </div>
          </div>
        </div>

    </section><!-- /About Section -->

    <!-- About Section -->
    <section id="about" class="about section dinamyc-color">

        <div class="container">
          <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
            <div class="col-xl-10">
              <div class="text-center">
                <a class="cta-btn" href="{{ route('struktur-organisasi', ['id' => 1]) }}"><h3 class="text-dinamyc-color-primary">Struktur Organisasi</h3></a>
              </div>
            </div>
          </div>
        </div>

        {{-- <div class="container container-x section-title" data-aos="fade-up">
            <h3 class="item">Struktur Organisasi</h3>
        </div> --}}

    <div class="container">

        <div class="row gy-4">

        {{-- <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <p>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
            <a href="#" class="read-more" style="background-color: #005faf;"><span>Detail</span><i class="bi bi-arrow-right"></i></a>
        </div> --}}

        <div class="col-lg-12 content" data-aos="fade-up" data-aos-delay="100">

            <!-- Reference https://www.cssscript.com/responsive-hierarchical-organization-chart-pure-css/ -->
            <!-- Collapse is using Twitter Bootstrap Collapse component that is relying on jQuery for collapsing-->
            <!-- https://codepen.io/jek/pen/RQMGYz -->
            <div class="container p-5">
                <ol class="organizational-chart">
                    <li>
                    <div class="eselon1" onclick="window.location.href='{{ url('struktur-organisasi', ['id' => 4]) }}'">
                        <h3>ESELON 1</h3>
                    </div>
                    <ol style="width: 100%;">
                        <li class="ol-eselon2">
                        <div class="eselon2" onclick="window.location.href='{{ route('struktur-organisasi', ['id' => 5]) }}'">
                            <h4>SEKRETARIAT</h4>
                        </div>
                        </li>
                        <li class="ol-eselon2">
                        <div class="eselon2" onclick="window.location.href='{{ route('struktur-organisasi', ['id' => 2]) }}'">
                            <h4>DIREKTORAT PENDIDIKAN</h4>
                        </div>
                        </li>
                        <li class="ol-eselon2">
                        <div class="eselon2" onclick="window.location.href='{{ route('struktur-organisasi', ['id' => 3]) }}'">
                            <h4>DIREKTORAT URUSAN</h4>
                        </div>
                        </li>
                        
                    </ol>
                    </li>
                </ol>
            </div>
        </div>

        </div>

    </div>

    </section><!-- /About Section -->

  </main>

  <div style="display: none;" id="quill-editor" class="ql-container ql-snow"></div>

@endsection

@section('script')

<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Create a div element for the Quill editor container
        const quillContainer = document.createElement('div');
        quillContainer.id = 'quill-editor';
        quillContainer.classList.add('ql-container', 'ql-snow');
        
        // Append it to the body or any specific parent element
        document.body.appendChild(quillContainer);

        // Initialize the Quill editor
        const quill = new Quill(quillContainer, {
            theme: 'snow',
            readOnly: true, // Make the editor read-only
        });

        const deskripsiBerita = document.querySelectorAll('.deskripsi-berita');
        deskripsiBerita.forEach((element) => {
          const dataContent = element.getAttribute('data-content');
          const existingContent = `${dataContent}`;
          
          // Set existing content into the Quill editor
          quill.root.innerHTML = existingContent;
          // Display content in <p> tag
          const quillContent = quill.root.innerHTML; // Get HTML content

          element.innerHTML = quillContent;
        });
    });
</script>


<script>
document.addEventListener('DOMContentLoaded', () => {
  const slides = ['slideA', 'slideB', 'slideC'];
  let currentIndex = 0;

  // Get the index of the currently checked radio button
  const getCurrentIndex = () => {
    for (let i = 0; i < slides.length; i++) {
      if (document.getElementById(slides[i]).checked) {
        return i;
      }
    }
    return 0; // Default to 0 if no radio button is checked (shouldn't happen)
  };

  // Set an interval to automatically change the slide
  setInterval(() => {
    // Get the current index from the checked radio button
    currentIndex = getCurrentIndex();

    // Uncheck the current slide
    const currentSlide = document.getElementById(slides[currentIndex]);
    currentSlide.checked = false;

    // Move to the next slide
    currentIndex = (currentIndex + 1) % slides.length;

    // Check the next slide
    const nextSlide = document.getElementById(slides[currentIndex]);
    nextSlide.checked = true;
  }, 5000); // Change slides every 3 seconds
});
</script>
@endsection