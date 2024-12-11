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
	 background: #f6f7f9;
}
 .list-item:hover .list-item__button {
	 opacity: 1;
	 transition: all 100ms ease;
}
 .list-item__name {
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
	 top: 3.9rem;
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
<main class="main">

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Informasi/Regulasi Penting</h2>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">
          <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
            <div class="containerx">
                <div class="row">
                    <div class="search"><label style="font-weight: 700; font-size: 22px;">Regulasi</label><input type="search" id="data-search-regulasi" data-search="data-search-regulasi" placeholder="Cari regulasi ..." /><button class="search__clear search__clear-regulasi">&times;</button>
                    </div>
                    <div class="list" id="list-regulasi" data-searchable="data-searchable-regulasi"></div>
                </div>
            </div>
          </div>
          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
            <div class="containerx">
                <div class="row">
                    <div class="search"><label style="font-weight: 700; font-size: 22px;">Informasi Penting</label><input type="search" id="data-search-informasi" data-search="data-search-informasi" placeholder="Cari informasi ..." /><button class="search__clear search__clear-informasi">&times;</button>
                    </div>
                    <div class="list" id="list-informasi" data-searchable="data-searchable-informasi"></div>
                </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Portfolio Section -->

</main>
@endsection

@section('script')
<script>
    const listRegulasi = document.getElementById("list-regulasi");
    const amount = 10;

    // Render Users
    const template = listItem => {
        return `
                <div class="list-item">
					<div class="list-item__content">
						<strong class="list-item__name">${listItem.title}</strong>
						<span class="list-item__info">Ditayangkan : ${listItem.time} <br><br> <a href="{{ route('informasi-regulasi-action', ['kategori' => 'regulasi', 'id' => '1']) }}" style=""><span class="chevron">»</span>  Selengkapnya</a></span>
						
					</div>
                </div>
    	`;
    };

    fetch(`http://localhost:8080/api/get-regulasi`, { method: "get" })
        .then(response => response.json())
        .then(data =>
            data.results.forEach(result => (listRegulasi.innerHTML += template(result)))
        )
        .catch(error => console.log(error));

    // Search
    const regulasiSearch = document.getElementById("data-search-regulasi");

    regulasiSearch.addEventListener("keyup", filterRegulasi);

    function filterRegulasi() {
        var term = document.getElementById("data-search-regulasi").value.toLowerCase();
        var tag = document.querySelectorAll("#list-regulasi .list-item");

		for (var i = 0; i < tag.length; i++) {
			// Get the text content of the <strong> element inside the current .list-item
			var title = tag[i].querySelector(".list-item__name").textContent.toLowerCase();

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



const listInformasi = document.getElementById("list-informasi");

// Render Users
const templatex = listItem => {
        return `
                <div class="list-item">
					<div class="list-item__content">
						<strong class="list-item__name">${listItem.title}</strong>
						<span class="list-item__info">Ditayangkan : ${listItem.time} <br><br> <a href="{{ route('informasi-regulasi-action', ['kategori' => 'informasi', 'id' => '1']) }}" style=""><span class="chevron">»</span>  Selengkapnya</a></span>
						
					</div>
                </div>
    	`;
};

fetch(`http://localhost:8080/api/get-informasi`, { method: "get" })
    .then(response => response.json())
    .then(data =>
        data.results.forEach(result => (listInformasi.innerHTML += templatex(result)))
    )
    .catch(error => console.log(error));

// Search
const informasiSearch = document.getElementById("data-search-informasi");

informasiSearch.addEventListener("keyup", filterInformasi);

function filterInformasi() {
    var term = document.getElementById("data-search-informasi").value.toLowerCase();
    var tag = document.querySelectorAll("#list-informasi .list-item");

	for (var i = 0; i < tag.length; i++) {
		// Get the text content of the <strong> element inside the current .list-item
		var title = tag[i].querySelector(".list-item__name").textContent.toLowerCase();

		if (title.indexOf(term) !== -1) {
			tag[i].style.display = "flex"; // Show matching items
		} else {
			tag[i].style.display = "none"; // Hide non-matching items
		}
	}
}

const clearSearchInformasi = document.querySelector('.search__clear-informasi');

clearSearchInformasi.addEventListener('click', () => {
    informasiSearch.value = "";
    filterInformasi();
})

informasiSearch.addEventListener("keydown", event => {
    const keyName = event.key;
    if (event.key == "Enter") {
        let inputText = informasiSearch.value.toLowerCase();
        filterInformasi();
    } else {
    }
});

</script>
@endsection