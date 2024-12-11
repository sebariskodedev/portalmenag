<!-- resources/views/dashboard.blade.php -->
@extends('template.user')

@section('style')
<style>
/* Style the custom label */
.custom-file-label {
    display: inline-block;
    padding: 8px 16px;
    background-color: green;
    color: white;
    cursor: pointer;
    border-radius: 4px;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

.submit {
    width: 100%;
    margin-top: 50px;
    justify-content: right;
    align-items: center;
}

.submit button{
  background-color: #005faf;
  color: white;
  padding: 12px 12px;
  border: none;
  margin-top: 20px;
  border-radius: 4px;
  cursor: pointer;
  max-width: 100px;
  justify-content: center;
}

.submit button:hover {
  background-color: #2487ce;
}

.col-10 {
  float: left;
  width: 10%;
  margin-top: 6px;
}

.col-2 {
  float: left;
  width: 2%;
  margin-top: 6px;
}

.col-88 {
  float: left;
  width: 88%;
  margin-top: 6px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}
 
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
@endsection

@section('content')
<main class="main">

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Detail Laporan Capaian Kinerja Ditjen Bimas katolik Triwulan III 2024</h2>
      </div><!-- End Section Title -->

        <div class="container" style="border-radius: 5px; background-color: white; padding: 20px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);">

            <form action="">
                    
                <div class="row">
                    <div class="col-10">
                    <label for="country">Judul</label>
                    </div>
                    <div class="col-2">
                    <label for="country">:</label>
                    </div>
                    <div class="col-88">
                    <label for="country">Laporan Capaian Kinerja Ditjen Bimas katolik Triwulan III 2024</label>
                    </div>
                </div>
                    
                <div class="row">
                    <div class="col-10">
                    <label for="country">Tanggal</label>
                    </div>
                    <div class="col-2">
                    <label for="country">:</label>
                    </div>
                    <div class="col-88">
                    <label for="country">12/11/2024 13:30</label>
                    </div>
                </div>
                    
                <div class="row">
                    <div class="col-10">
                    <label for="country">Deskripsi</label>
                    </div>
                    <div class="col-2">
                    <label for="country">:</label>
                    </div>
                    <div class="col-88">
                    <label for="country">Laporan Capaian Kinerja Ditjen Bimas katolik Triwulan III 2024 Direktorat Jenderal Bimbingan Masyarakat Katolik dapat dilihat dan di download pada link berikut: <br><br> https://bit.ly/laporancapkintw32024</label>
                    </div>
                </div>
                    
                <div class="row submit">
                    <button>Download</button>
                </div>
                
            </form>

        </div>

    </section><!-- /Portfolio Section -->

</main>
@endsection

@section('script')
<script>

</script>
@endsection