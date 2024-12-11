<!-- resources/views/dashboard.blade.php -->
@extends('template.user')

@section('style')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
@import "compass/css3";
.tab {
    min-height: 80vh;
    display: flex;
    flex-direction: column; /* Stack items vertically */
}
 .tab .tab-head {
	 margin: 0;
	 padding: 0;
	 float: left;
	 list-style: none;
	 /* height: 32px; */
	 border-bottom: 1px solid #ccc;
	 width: 100%;
}
 .tab .tab-head li {
	 float: left;
	 margin: 0 1px 0 0;
	 cursor: pointer;
	 padding: 0px 20px;
	 height: 32px;
	 line-height: 31px;
	 color: #333;
	 border-bottom: 0px;
	 overflow: hidden;
	 position: relative;
	 border-top-left-radius: 5px;
	 border-top-right-radius: 5px;
	 background-color: #e5e5e5;
}
 .tab .tab-head li:hover {
	 background-color: #e5e5e5;
	 color: #000;
}
 .tab .tab-head li.active {
	 border: 1px solid #ccc;
	 background-color: #fff;
	 color: #333;
	 border-bottom: 1px solid #fff;
	 display: block;
}
 .tab .tab-container {
	 border: 1px solid #ccc;
	 border-top: 0px;
	 clear: both;
	 float: left;
	 width: 100%;
}
 .tab .tab-content {
	 padding: 20px;
	 display: none;
}


.expandable-list{
    margin: 20px auto;
    width: 100%;
    overflow-y: auto;
    transition: 0.4s;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: flex-start;
  }

  .expandable-item {
    padding: 10px;
    margin-bottom: 10px;
    width: 100%;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    cursor: pointer;
    background-color: #e5e5e5;
  }

  .expandable-item:first-of-type{
    border-radius: 5px 5px 0 0;
  }

  .expandable-item:last-of-type{
    border-radius: 0 0 5px 5px;

  }

  .expandable-header {
    position: relative;
    height: 30px;
    /* font-weight: bolder; */
  }

  .expandable-icon {
    position: absolute;
    right: 0px;
    top: 0px;
    transform: rotateZ(45deg);
    border-radius: 5px;
    width: 25px;
    height: 25px;
    background: #444444;
    transition: all .3s;
  }

.expandable-item.active .expandable-icon{
  transform: rotateZ(0);
}

  .expandable-icon .line {
    width: 15px;
    height: 2px;
    background: white;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    margin: auto;
    transition: all .4s;
  }

  .expandable-icon .line:nth-child(1) {
    transform: rotateZ(45deg);
  }

  .expandable-icon .line:nth-child(2) {
    transform: rotateZ(-45deg);
  }

  .expandable-item .expandable-body {
    border-radius: 5px;
    overflow: hidden;
    padding: 0 1em;
    transition: all .5s ease-in-out;
    height: 0px;
    /* background-color: white; */
  }

  .expandable-item.active .expandable-body {
    margin-top: 5px;
    height: 600px;
    display: flex;
    justify-content: center; /* Centers items horizontally */
  }

    .expandable-item.active .expandable-body img {
        height: 600px;
    }

  .expandable-item.active .expandable-icon .line:nth-child(1) {
    transform: rotateZ(0deg);
  }

  .expandable-item.active .expandable-icon .line:nth-child(2) {
    transform: rotateZ(180deg);
  }
</style>
@endsection

@section('content')
<main class="main">

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Standard Pelayanan DJKN</h2>
        <!-- <p>Maklumat Pelayanan adalah pernyataan komitmen dari suatu organisasi atau lembaga pelayanan publik untuk memberikan pelayanan yang berkualitas, profesional, dan sesuai dengan standar yang telah ditetapkan</p> -->
      </div><!-- End Section Title -->

      <div class="container">

<div class="tab">
  
  <ul class="tab-head">
    <li class="active" rel="tab1">Sekretariat</li>
    <li rel="tab2">Dit. PKKN</li>
    <li rel="tab3">Dit. KND</li>
    <li rel="tab4">Dit. PKN</li>
    <li rel="tab5">Dit. Penilaian</li>
    <li rel="tab6">Dit. Lelang</li>
    <li rel="tab7">Dit. Hukum dan Humas</li>
    <li rel="tab8">Dit. TSI</li>
    <li rel="tab9">Kanwil DJKN</li>
    <li rel="tab10">KPKNL</li>
  </ul>
    
  <div class="tab-container">
  
    <div id="tab1" class="tab-content">
        <div class="expandable-list">
            <div class="expandable-item" onclick="toggle(0)">
                <div class="expandable-header">
                    1. Penerbitan Surat Perintah Penunjukan Pelaksana Tugas
                    <div class="expandable-icon">
                        <div class="line"></div>
                        <div class="line"></div>
                    </div>
                </div>
                <div class="expandable-body">
                    <img src="https://sensor.kemdikbud.go.id/public/info/wp-content/uploads/2022/10/INFOGRAFIS-STANDAR-PELAYANAN-REV3-01-1-1024x576.jpg">
                </div>
            </div>
            <div class="expandable-item" onclick="toggle(1)">
                <div class="expandable-header">
                    2. Penyelesaian Revisi DIPA Kewenangan Direktorat Jenderal Anggaran
                    <div class="expandable-icon">
                        <div class="line"></div>
                        <div class="line"></div>
                    </div>
                </div>
                <div class="expandable-body">
                    <img src="https://pkmgodean1.slemankab.go.id/wp-content/uploads/2019/09/SP-Poli-Gigi.png">
                </div>
            </div>
            <div class="expandable-item" onclick="toggle(2)">
                <div class="expandable-header">
                    3. Pembuatan Surat Penghasilan Setahun
                    <div class="expandable-icon">
                        <div class="line"></div>
                        <div class="line"></div>
                    </div>
                </div>
                <div class="expandable-body">
                    <img src="https://www.kemenpppa.go.id/assets/files/feature_image/20231017_011427.TW%203.png">
                </div>
            </div>
        </div>
    </div>
    <!-- #tab1 -->
  
    <div id="tab2" class="tab-content">
        <div class="expandable-list">
            <div class="expandable-item" onclick="toggle(3)">
              <div class="expandable-header">
                1. Penerbitan Surat Perintah Penunjukan Pelaksana Tugas
                <div class="expandable-icon">
                  <div class="line"></div>
                  <div class="line"></div>
                </div>
              </div>
              <div class="expandable-body">
                <img src="https://sensor.kemdikbud.go.id/public/info/wp-content/uploads/2022/10/INFOGRAFIS-STANDAR-PELAYANAN-REV3-01-1-1024x576.jpg">
              </div>
            </div>
            <div class="expandable-item" onclick="toggle(4)">
              <div class="expandable-header">
                2. Penyelesaian Revisi DIPA Kewenangan Direktorat Jenderal Anggaran
                <div class="expandable-icon">
                  <div class="line"></div>
                  <div class="line"></div>
                </div>
              </div>
              <div class="expandable-body">
                <img src="https://pkmgodean1.slemankab.go.id/wp-content/uploads/2019/09/SP-Poli-Gigi.png">
              </div>
            </div>
            <div class="expandable-item" onclick="toggle(5)">
              <div class="expandable-header">
                3. Pembuatan Surat Penghasilan Setahun
                <div class="expandable-icon">
                  <div class="line"></div>
                  <div class="line"></div>
                </div>
              </div>
              <div class="expandable-body">
                <img src="https://www.kemenpppa.go.id/assets/files/feature_image/20231017_011427.TW%203.png">
              </div>
            </div>
        </div>
    </div>
    <!-- #tab2 -->
  
    <div id="tab3" class="tab-content">
<div class="expandable-list">
    <div class="expandable-item" onclick="toggle(6)">
      <div class="expandable-header">
        1. Penerbitan Surat Perintah Penunjukan Pelaksana Tugas
        <div class="expandable-icon">
          <div class="line"></div>
          <div class="line"></div>
        </div>
      </div>
      <div class="expandable-body">
        <img src="https://sensor.kemdikbud.go.id/public/info/wp-content/uploads/2022/10/INFOGRAFIS-STANDAR-PELAYANAN-REV3-01-1-1024x576.jpg">
      </div>
    </div>
    <div class="expandable-item" onclick="toggle(7)">
      <div class="expandable-header">
        2. Penyelesaian Revisi DIPA Kewenangan Direktorat Jenderal Anggaran
        <div class="expandable-icon">
          <div class="line"></div>
          <div class="line"></div>
        </div>
      </div>
      <div class="expandable-body">
        <img src="https://pkmgodean1.slemankab.go.id/wp-content/uploads/2019/09/SP-Poli-Gigi.png">
      </div>
    </div>
    <div class="expandable-item" onclick="toggle(8)">
      <div class="expandable-header">
        3. Pembuatan Surat Penghasilan Setahun
        <div class="expandable-icon">
          <div class="line"></div>
          <div class="line"></div>
        </div>
      </div>
      <div class="expandable-body">
        <img src="https://www.kemenpppa.go.id/assets/files/feature_image/20231017_011427.TW%203.png">
      </div>
    </div>
</div>
    </div>
    <!-- #tab3 -->
  
    <div id="tab4" class="tab-content">
<div class="expandable-list">
    <div class="expandable-item" onclick="toggle(9)">
      <div class="expandable-header">
        1. Penerbitan Surat Perintah Penunjukan Pelaksana Tugas
        <div class="expandable-icon">
          <div class="line"></div>
          <div class="line"></div>
        </div>
      </div>
      <div class="expandable-body">
        <img src="https://sensor.kemdikbud.go.id/public/info/wp-content/uploads/2022/10/INFOGRAFIS-STANDAR-PELAYANAN-REV3-01-1-1024x576.jpg">
      </div>
    </div>
    <div class="expandable-item" onclick="toggle(10)">
      <div class="expandable-header">
        2. Penyelesaian Revisi DIPA Kewenangan Direktorat Jenderal Anggaran
        <div class="expandable-icon">
          <div class="line"></div>
          <div class="line"></div>
        </div>
      </div>
      <div class="expandable-body">
        <img src="https://pkmgodean1.slemankab.go.id/wp-content/uploads/2019/09/SP-Poli-Gigi.png">
      </div>
    </div>
    <div class="expandable-item" onclick="toggle(11)">
      <div class="expandable-header">
        3. Pembuatan Surat Penghasilan Setahun
        <div class="expandable-icon">
          <div class="line"></div>
          <div class="line"></div>
        </div>
      </div>
      <div class="expandable-body">
        <img src="https://www.kemenpppa.go.id/assets/files/feature_image/20231017_011427.TW%203.png">
      </div>
    </div>
</div>
    </div>
    <!-- #tab4 --> 
  </div>
  </div>
  </div>

      </div>

    </section><!-- /Portfolio Section -->

</main>
@endsection

@section('script')
<script>

    $(".tab-content").hide();
    $(".tab-content:first").show();

    $(".tab-head li").click(function() {
	
      $(".tab-content").hide();
      var activeTab = $(this).attr("rel"); 
      $("#"+activeTab).fadeIn();		
      $(".tab-head li").removeClass("active");
      $(this).addClass("active");

	  
    });




    toggle = (idx) => {
        document.querySelectorAll('.expandable-item')[idx].classList.toggle('active');
    };
	
</script>
@endsection