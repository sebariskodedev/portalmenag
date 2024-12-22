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
	 background-color: #9397a1;
}
 .tab .tab-head li:hover {
	 background-color: #e5e5e5;
	 color: #000;
}
 .tab .tab-head li.active {
	 border: 1px solid #ccc;
	 background-color: #ffffff;
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
<main class="main dinamyc-color">

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section dinamyc-color">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2 class="text-dinamyc-color-primary">Standard Pelayanan</h2>
        <!-- <p>Maklumat Pelayanan adalah pernyataan komitmen dari suatu organisasi atau lembaga pelayanan publik untuk memberikan pelayanan yang berkualitas, profesional, dan sesuai dengan standar yang telah ditetapkan</p> -->
      </div><!-- End Section Title -->

      <div class="container">

        <div class="tab">
          
          <ul class="tab-head">
            @foreach ($ukers as $data)
              @if($loop->iteration == 1)
                <li class="dinamyc-color-card-grey active" rel="tab{{$loop->iteration}}">{{$data->name}}</li>
              @else
                <li class="dinamyc-color-card-grey" rel="tab{{$loop->iteration}}">{{$data->name}}</li>
              @endif
            @endforeach
          </ul>
            
          <div class="tab-container">
            <?php $toogle = 0; ?>
            @foreach ($ukers as $data)
              <div id="tab{{$loop->iteration}}" class="tab-content">
                  <div class="expandable-list">
                      @foreach ($standardpelayanans as $data2)
                        @if($data2->uker == $data->id)
                          <div class="expandable-item dinamyc-color-card-grey" onclick="toggle({{$toogle}})">
                              <div class="expandable-header">
                                  {{$data2->judul}}
                                  <div class="expandable-icon">
                                      <div class="line"></div>
                                      <div class="line"></div>
                                  </div>
                              </div>
                              <div class="expandable-body">
                                  <img src="{{ asset('standards/' . $data2->gambar) }}">
                              </div>
                          </div>
                          <?php $toogle = $toogle + 1; ?>
                        @endif
                      @endforeach
                  </div>
              </div>
              <!-- #tab1 -->
            @endforeach
            <!-- #tab4 --> 
          </div>
        </div>

      </div>

    </section><!-- /Portfolio Section -->

</main>
@endsection

@section('script')
<script>

  // Hide all tab contents
  document.querySelectorAll(".tab-content").forEach(tab => {
      tab.style.display = "none";
  });

  // Show the first tab content
  document.querySelector(".tab-content").style.display = "block";

  // Add click event to all tab-head list items
  document.querySelectorAll(".tab-head li").forEach(tab => {
      tab.addEventListener("click", function () {
          // Hide all tab content
          document.querySelectorAll(".tab-content").forEach(content => {
              content.style.display = "none";
          });

          // Get the `rel` attribute of the clicked tab
          const activeTab = this.getAttribute("rel");
          
          // Show the related tab content
          document.getElementById(activeTab).style.display = "block";

          // Remove the active class and reset background color for all tabs
          document.querySelectorAll(".tab-head li").forEach(tab => {
              tab.classList.remove("active");
              tab.style.backgroundColor = "#9397a1";
          });

          // Add the active class and set background color to white for the clicked tab
          this.classList.add("active");
          this.style.backgroundColor = "#e5e5e5";
      });
  });

  // Toggle function for expandable items
  function toggle(idx) {
      document.querySelectorAll('.expandable-item')[idx].classList.toggle('active');
  }
	
</script>
@endsection