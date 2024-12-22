<!-- resources/views/dashboard.blade.php -->
@extends('template.user')

@section('style')
<style>
.containerx {
	 max-width: 100%;
	 padding: 1rem;
	 border: 1px solid #e1e4ea;
}
.row {
	 margin-left: -1rem;
	 margin-right: -1rem;
}
 .list {
	 margin: 0;
	 padding: 0;
	 list-style-type: none;
	 display: flex;
	 justify-content: space-between;
	 flex-wrap: wrap;
}
 .list-item {
	 width: 100%;
	 margin-left: 1rem;
	 margin-right: 1rem;
	 padding: 1rem;
	 /* border: 1px solid #e1e4ea; */
	 display: flex;
	 align-items: center;
	 position: relative;
	 color: #002b5d;
	 text-decoration: none;
}
 .list-item:hover {
	 color: #005faf;
	 background: #e5e5e5;
}
 .list-item:hover .list-item__button {
	 opacity: 1;
	 transition: all 100ms ease;
}
 .list-item-name {
	 display: block;
	 font-size: 1rem;
}
 .list-item__info {
	color: #91a1bb;
	font-size: .9rem;
}
 .search {
	 margin-bottom: 1rem;
	 position: relative;
}
 .search label, .search input {
	 display: block;
}
 .search label {
	 margin-bottom: 1rem;
}
 .search input {
	 width: 100%;
	 padding: 1rem;
	 border-radius: 5px;
	 border: 1px solid #cacfd9;
	 font-family: inherit;
	 outline: none;
}
 .search input:focus {
	 box-shadow: 0px 0px 0px 3px rgba(51, 132, 243, .15);
	 border-color: #3384f3;
}
 .search__clear {
	 position: absolute;
	 top: .9rem;
	 right: 1.5rem;
	 cursor: pointer;
	 background: #e1e4ea;
	 width: 2rem;
	 height: 2rem;
	 line-height: 2rem;
	 color: #91a1bb;
	 border: 0;
	 padding: 0;
	 border-radius: 50%;
}
 .search__clear:focus, .search__clear:active {
	 outline: 0;
}
 .search__clear:hover {
	 background: #cacfd9;
	 color: #597191;
}
 .search-item {
	 display: inline-block;
	 padding: 0.5rem;
	 line-height: 1;
	 color: #3384f3;
	 border-radius: 5px;
	 background: rgba(51, 132, 243, 0.15);
	 cursor: pointer;
	 margin: 0 0.5rem 0.5rem 0;
}
 .search-item:hover, .search-item:focus {
	 color: #0e69e6;
	 background: rgba(51, 132, 243, 0.2);
}
 .search-item__close {
	 opacity: 0.5;
	 display: inline-block;
	 cursor: pointer;
	 margin-left: 0.5rem;
}
 .search-item__close:hover {
	 color: #d63031;
}
 .search-item:nth-of-type(5n + 2) {
	 color: #00b894;
	 background: rgba(0, 184, 148, 0.15);
}
 .search-item:nth-of-type(5n + 2):hover, .search-item:nth-of-type(5n + 2):focus {
	 color: #00856b;
	 background: rgba(0, 184, 148, 0.2);
}
 .search-item:nth-of-type(5n + 3) {
	 color: #d980fa;
	 background: rgba(217, 128, 250, 0.15);
}
 .search-item:nth-of-type(5n + 3):hover, .search-item:nth-of-type(5n + 3):focus {
	 color: #ca4ff8;
	 background: rgba(217, 128, 250, 0.2);
}
 .search-item:nth-of-type(5n + 4) {
	 color: #d63031;
	 background: rgba(214, 48, 49, 0.15);
}
 .search-item:nth-of-type(5n + 4):hover, .search-item:nth-of-type(5n + 4):focus {
	 color: #b02324;
	 background: rgba(214, 48, 49, 0.2);
}
 .search-item:nth-of-type(5n + 5) {
	 color: #fca709;
	 background: rgba(253, 203, 110, 0.2);
}
 .search-item:nth-of-type(5n + 5):hover, .search-item:nth-of-type(5n + 5):focus {
	 color: #e89803;
	 background: rgba(253, 203, 110, 0.25);
}
 .clear-btn {
	 font-family: inherit;
	 background: #91a1bb;
	 color: #fff;
	 border: 0;
	 cursor: pointer;
	 margin-right: 1rem;
	 border-radius: 5px;
	 display: inline-block;
	 padding: 0.5rem 1rem;
	 line-height: 1;
}
 .clear-btn:hover {
	 background: #597191;
}
 .clear-btn:focus, .clear-btn:active {
	 outline: 0;
}
 .clear-btn:disabled {
	 background: #f6f7f9;
	 color: #91a1bb;
	 cursor: not-allowed;
}
 
</style>
@endsection

@section('content')
<main class="main dinamyc-color">

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section dinamyc-color">

		<!-- Section Title -->
		<div class="container section-title" data-aos="fade-up">
		<h2 class="text-dinamyc-color-primary">Reformasi Birokrasi - Akuntabilitas</h2>
		<!-- <p>Maklumat Pelayanan adalah pernyataan komitmen dari suatu organisasi atau lembaga pelayanan publik untuk memberikan pelayanan yang berkualitas, profesional, dan sesuai dengan standar yang telah ditetapkan</p> -->
		</div><!-- End Section Title -->

      <div class="container">


            <div class="containerx">
                <div class="row">
                    <div class="search"><input type="search" id="data-search-regulasi" data-search="data-search-regulasi" placeholder="Cari ..." /><button class="search__clear search__clear-regulasi">&times;</button>
                    </div>
                    <div class="list" id="list-regulasi" data-searchable="data-searchable-regulasi">
						@foreach ($reformasis as $data)
							<div class="list-item">
								<div class="list-item__content">
									<strong class="list-item-name text-dinamyc-color">{{$data->name}}</strong>
									<span class="list-item__info text-dinamyc-color">Ditayangkan : {{$data->created_at}} <br><br> <a href="{{ route('reformasi-birokrasi-action-child', ['id' => $data->id]) }}"><span class="chevron">»</span>  Selengkapnya</a></span>
									
								</div>
							</div>
						@endforeach
					</div>
                </div>
            </div>

      </div>

    </section><!-- /Portfolio Section -->

</main>
@endsection

@section('script')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const listRegulasi = document.getElementById("list-regulasi");
    const amount = 10;

    // Search
    const regulasiSearch = document.getElementById("data-search-regulasi");

    regulasiSearch.addEventListener("keyup", filterRegulasi);

    function filterRegulasi() {
        var term = document.getElementById("data-search-regulasi").value.toLowerCase();
        var tag = document.querySelectorAll("#list-regulasi .list-item");

		for (var i = 0; i < tag.length; i++) {
			// Get the text content of the <strong> element inside the current .list-item
			var title = tag[i].querySelector(".list-item-name").textContent.toLowerCase();

			if (title.indexOf(term) !== -1) {
				tag[i].style.display = "flex"; // Show matching items
			} else {
				tag[i].style.display = "none"; // Hide non-matching items
			}
		}
    }

    const clearSearchRegulasi = document.querySelector('.search__clear-regulasi');

    clearSearchRegulasi.addEventListener('click', () => {
        regulasiSearch.value = "";
        filterRegulasi();
    })

    regulasiSearch.addEventListener("keydown", event => {
        const keyName = event.key;
        if (event.key == "Enter") {
            let inputText = regulasiSearch.value.toLowerCase();
            filterRegulasi();
        } else {
        }
    });
});

</script>
@endsection