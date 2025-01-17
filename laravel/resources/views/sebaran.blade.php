<!-- resources/views/dashboard.blade.php -->
@extends('template.user')

@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<style type="text/css">
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
    display: -webkit-box;                /* Necessary for the multi-line truncation */
    -webkit-box-orient: vertical;        /* Specifies the box orientation to be vertical */
    overflow: hidden;                    /* Ensures that the overflowed content is hidden */
    -webkit-line-clamp: 2;               /* Limits the text to 2 lines */
    text-overflow: ellipsis;             /* Adds the ellipsis (...) */
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
 
.card-data {
	margin-top: 30px;
  width: 100%; 
  display: grid;
  /* Define Auto Row size */
  grid-auto-rows: 100px; 
  /*Define our columns */
  grid-template-columns: repeat(auto-fill, minmax(100%, 1fr)); 
  grid-gap: 1em;
}
/* Default for mobile (small screens) */
.container {
    display: flex;
    flex-direction: column;
    padding: 10px;
}

/* Tablet (medium screens) */
@media (min-width: 768px) and (max-width: 1024px) {
	.card-data {
		grid-template-columns: repeat(auto-fill, minmax(45%, 1fr));
	}
}

/* Desktop (large screens) */
@media (min-width: 1025px) {
	.card-data {
		grid-template-columns: repeat(auto-fill, minmax(30%, 1fr));
	}
}

article {
  border-radius: 10px;
  padding: 15px;
  color: #fff;
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}

article:hover {
    transform: translateY(-3px); /* Slight lift on hover */
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15); /* Stronger shadow */
}

article:nth-child(odd) {
  background-color: #55BBE9;
}

article:nth-child(even) {
  background-color: #afbe29;
}

.info-card {
    display: flex;
    align-items: center;
    width: 100%;
    height: 100%;
    border-radius: 8px; /* Rounded corners */
    padding: 15px 20px;
}

.icon {
    flex-shrink: 0;
    font-size: 32px; /* Adjust icon size */
    color: white; /* Primary color for icon */
    margin-right: 15px; /* Space between icon and data */
}

.data {
    display: flex;
    flex-direction: column; /* Stack items vertically */
    justify-content: center; /* Center vertically */
}

.data .label {
    font-size: 14px;
    font-weight: bold;
    color: white;
    margin-bottom: 5px; /* Space between label and value */
}

.data .value {
    font-size: 22px;
    color: white;
	font-weight: bold;
}
</style>
@endsection

@section('content')
<main class="main dinamyc-color">

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section dinamyc-color">

		<!-- Section Title -->
		<div class="container section-title" data-aos="fade-up">
		<h2 class="text-dinamyc-color-primary">Sebaran Data</h2>
		<!-- <p>Maklumat Pelayanan adalah pernyataan komitmen dari suatu organisasi atau lembaga pelayanan publik untuk memberikan pelayanan yang berkualitas, profesional, dan sesuai dengan standar yang telah ditetapkan</p> -->
		</div><!-- End Section Title -->
	
		<span style="display: none;" id="list-data">{{ json_encode($sebarans) }}</span>
      <div class="container">

	  	<div id="map" style="height: 500px;"></div>

		  	<div class="card-data">
				<article>
					<div class="info-card">
						<div class="icon">
							<i class="bi bi-people"></i>
						</div>
						<div class="data">
							<span class="label">Jumlah Umat Provinsi <span class="provinsi"></span></span>
							<span id="umat" class="value">1234</span>
						</div>
					</div>
				</article>
				<article>
					<div class="info-card">
						<div class="icon">
							<i class="bi bi-buildings-fill"></i>
						</div>
						<div class="data">
							<span class="label">Jumlah Rumah Ibadah Provinsi <span class="provinsi"></span></span>
							<span id="rumah_ibadah" class="value">1234</span>
						</div>
					</div>
				</article>
				<article>
					<div class="info-card">
						<div class="icon">
							<i class="bi bi-buildings-fill"></i>
						</div>
						<div class="data">
							<span class="label">Jumlah Lembaga Provinsi <span class="provinsi"></span></span>
							<span id="lembaga" class="value">1234</span>
						</div>
					</div>
				</article>
				<article>
					<div class="info-card">
						<div class="icon">
							<i class="bi bi-people"></i>
						</div>
						<div class="data">
							<span class="label">Jumlah Tokoh Provinsi <span class="provinsi"></span></span>
							<span id="tokoh" class="value">1234</span>
						</div>
					</div>
				</article>
				<article>
					<div class="info-card">
						<div class="icon">
							<i class="bi bi-people"></i>
						</div>
						<div class="data">
							<span class="label">Jumlah Penyuluh Provinsi <span class="provinsi"></span></span>
							<span id="penyuluh" class="value">1234</span>
						</div>
					</div>
				</article>
				<article>
					<div class="info-card">
						<div class="icon">
							<i class="bi bi-buildings-fill"></i>
						</div>
						<div class="data">
							<span class="label">Jumlah Pasraman Provinsi <span class="provinsi"></span></span>
							<span id="pasraman" class="value">1234</span>
						</div>
					</div>
				</article>
				<article>
					<div class="info-card">
						<div class="icon">
							<i class="bi bi-people"></i>
						</div>
						<div class="data">
							<span class="label">Jumlah Siswa Provinsi <span class="provinsi"></span></span>
							<span id="siswa" class="value">1234</span>
						</div>
					</div>
				</article>
				<article>
					<div class="info-card">
						<div class="icon">
							<i class="bi bi-people"></i>
						</div>
						<div class="data">
							<span class="label">Jumlah Guru Provinsi <span class="provinsi"></span></span>
							<span id="guru" class="value">1234</span>
						</div>
					</div>
				</article>
				<article>
					<div class="info-card">
						<div class="icon">
							<i class="bi bi-buildings-fill"></i>
						</div>
						<div class="data">
							<span class="label">Jumlah Perguruan Tinggi Provinsi <span class="provinsi"></span></span>
							<span id="perguruan_tinggi" class="value">1234</span>
						</div>
					</div>
				</article>
				<article>
					<div class="info-card">
						<div class="icon">
							<i class="bi bi-people"></i>
						</div>
						<div class="data">
							<span class="label">Jumlah Dosen Provinsi <span class="provinsi"></span></span>
							<span id="dosen" class="value">1234</span>
						</div>
					</div>
				</article>
				<article>
					<div class="info-card">
						<div class="icon">
							<i class="bi bi-people"></i>
						</div>
						<div class="data">
							<span class="label">Jumlah Mahasiswa Provinsi <span class="provinsi"></span></span>
							<span id="mahasiswa" class="value">1234</span>
						</div>
					</div>
				</article>
				<article>
					<div class="info-card">
						<div class="icon">
							<i class="bi bi-people"></i>
						</div>
						<div class="data">
							<span class="label">Jumlah Tenaga Administrasi Provinsi <span class="provinsi"></span></span>
							<span id="tenaga_administrasi" class="value">1234</span>
						</div>
					</div>
				</article>
			</div>

      </div>

    </section><!-- /Portfolio Section -->

</main>
@endsection

@section('script')

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
        const response = await fetch('/api/post-klik-data', {
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
            console.log(result);
        } else {
            const errorResponse = await response.text();
            console.error('Failed to add Kunjungan:', errorResponse);
        }
    } catch (error) {
        console.error('Error during fetch:', error);
    }
});
</script>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
		// Get the innerHTML of the span element
		const listDataElement = document.getElementById('list-data');
		const listDataRaw = listDataElement.innerHTML;


		const umatElement = document.getElementById('umat');
		const rumahIbadahElement = document.getElementById('rumah_ibadah');
		const lembagaElement = document.getElementById('lembaga');
		const tokohElement = document.getElementById('tokoh');
		const penyuluhElement = document.getElementById('penyuluh');
		const pasramanElement = document.getElementById('pasraman');
		const siswaElement = document.getElementById('siswa');
		const guruElement = document.getElementById('guru');
		const perguruanTinggiElement = document.getElementById('perguruan_tinggi');
		const dosenElement = document.getElementById('dosen');
		const mahasiswaElement = document.getElementById('mahasiswa');
		const tenagaAdministrasiElement = document.getElementById('tenaga_administrasi');

		// Parse the JSON string into a JavaScript array
		let listData;
		try {
			listData = JSON.parse(listDataRaw);

			// List of fields to sum
			const fieldsToSum = [
				'umat',
				'rumah_ibadah',
				'lembaga',
				'tokoh',
				'penyuluh',
				'pasraman',
				'siswa',
				'guru',
				'perguruan_tinggi',
				'dosen',
				'mahasiswa',
				'tenaga_administrasi'
			];

			// Initialize totals object
			const totals = fieldsToSum.reduce((acc, field) => {
				acc[field] = 0; // Set initial total for each field to 0
				return acc;
			}, {});

			// Loop through data and calculate sums
			listData.forEach(item => {
				fieldsToSum.forEach(field => {
					totals[field] += parseInt(item[field], 10) || 0; // Add field value, default to 0 if undefined
				});
			});
			umatElement.innerHTML = totals.umat;
			rumahIbadahElement.innerHTML = totals.rumah_ibadah;
			lembagaElement.innerHTML = totals.lembaga;
			tokohElement.innerHTML = totals.tokoh;
			penyuluhElement.innerHTML = totals.penyuluh;
			pasramanElement.innerHTML = totals.pasraman;
			siswaElement.innerHTML = totals.siswa;
			guruElement.innerHTML = totals.guru;
			perguruanTinggiElement.innerHTML = totals.perguruan_tinggi;
			dosenElement.innerHTML = totals.dosen;
			mahasiswaElement.innerHTML = totals.mahasiswa;
			tenagaAdministrasiElement.innerHTML = totals.tenaga_administrasi;
			// console.log('List Data:', totals); // Output the array
		} catch (error) {
			console.error('Failed to parse JSON:', error);
		}

		// Select all elements with the class 'provinsi'
		const provinsiElements = document.querySelectorAll('.provinsi');
		// Add innerHTML to each element
		provinsiElements.forEach((element, index) => {
			element.innerHTML = 'Seluruh Indonesia'; // Add content dynamically
		});

        // Initialize the map and set its view to Indonesia
        const map = L.map('map').setView([-2.5, 118], 5); // Coordinates for Indonesia

        // Add OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Load GeoJSON
        const geojsonUrl = "/assets/leaflet/idprov.geojson"; // Path to your GeoJSON file
        fetch(geojsonUrl)
            .then(response => response.json())
            .then(data => {
                // Add GeoJSON data to the map with interactivity
                L.geoJSON(data, {
                    style: function (feature) {
                        return {
                            color: "#3388ff", // Border color
                            weight: 2,
                            opacity: 1,
                            fillColor: "#aacbe6", // Fill color
                            fillOpacity: 0.5
                        };
                    },
                    onEachFeature: function (feature, layer) {
                        // Add hover effect
                        layer.on('mouseover', function () {
                            layer.setStyle({
                                weight: 3,
                                color: '#ff7800',
                                fillOpacity: 0.7
                            });
                        });
                        layer.on('mouseout', function () {
                            layer.setStyle({
                                weight: 2,
                                color: '#3388ff',
                                fillOpacity: 0.5
                            });
                        });

                        // Add click event
                        layer.on('click', function () {
                            // alert(`You clicked on ${feature.properties.NAME_1}`);
							// Add innerHTML to each element
							provinsiElements.forEach((element, index) => {
								element.innerHTML = feature.properties.NAME_1; // Add content dynamically
							});
							const result = listData.filter(item => item.provinsi === feature.properties.NAME_1);
							umatElement.innerHTML = result[0].umat;
							rumahIbadahElement.innerHTML = result[0].rumah_ibadah;
							lembagaElement.innerHTML = result[0].lembaga;
							tokohElement.innerHTML = result[0].tokoh;
							penyuluhElement.innerHTML = result[0].penyuluh;
							pasramanElement.innerHTML = result[0].pasraman;
							siswaElement.innerHTML = result[0].siswa;
							guruElement.innerHTML = result[0].guru;
							perguruanTinggiElement.innerHTML = result[0].perguruan_tinggi;
							dosenElement.innerHTML = result[0].dosen;
							mahasiswaElement.innerHTML = result[0].mahasiswa;
							tenagaAdministrasiElement.innerHTML = result[0].tenaga_administrasi;
							// console.log(result[0].umat);
                        });

                        // Popup for each region
                        if (feature.properties && feature.properties.NAME_1) {
                            layer.bindPopup(`<strong>Province:</strong> ${feature.properties.NAME_1}`);
                        }
                    }
                }).addTo(map);
            })
            .catch(error => console.error("Error loading GeoJSON:", error));
    });
</script>

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