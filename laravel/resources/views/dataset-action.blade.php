<!-- resources/views/dashboard.blade.php -->
@extends('template.user')

@section('style')
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.0/papaparse.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<style>


.header_wrap {
	padding: 30px 0;
}
/* Custom wrapper for dropdown icon */
.dropdown-wrapper {
    position: relative;
    display: inline-block;
    width: 150px;
}

/* Custom select styling */
.custom-select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    padding-right: 30px; /* Space for the icon */
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 5px 10px;
}

/* Font Awesome icon positioning */
.dropdown-wrapper i {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%); /* Center the icon vertically */
    pointer-events: none; /* Prevent the icon from interfering with clicks */
}
</style>
@endsection

@section('content')
<main class="main dinamyc-color">

    <!-- About Alt Section -->
    <section id="about-alt" class="about-alt section section dinamyc-color">

      <div class="container">

        <div class="row gy-4">
          <div class="col-lg-12 content" data-aos="fade-up" data-aos-delay="200">
            <h3>{{$dataset->judul}}</h3>
            <p class="fst-italic">
              {{$dataset->deskripsi}}
            </p>
            <div class="header_wrap">
                <div class="num_rows">
                    <div class="form-group">
                        <div class="dropdown-wrapper">
                            <select class="form-control" name="state" id="maxRows">
                                @foreach ($files as $file)
                                    <option value="{{ asset('filedata/' . $file->nama) }}">{{ $file->tahun }}</option>
                                @endforeach
                            </select>
                            <i style="margin-left: 30px;" class="fa fa-chevron-down"></i> <!-- Font Awesome dropdown icon -->
                        </div>
                    </div>
                </div>
            </div>
            <div style="margin-top: 20px; width: 100%;" id="embed_table"></div>
          </div>
        </div>

      </div>

    </section><!-- /About Alt Section -->

</main>
@endsection

@section('script')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get the select element
        const selectElement = document.getElementById('maxRows');
        
        // Get the first value
        const selectedFileUrl = selectElement.options[0]?.value;
        // console.log(selectedFileUrl);

        // Extract the file extension from the file URL or file name
        const fileExtension = selectedFileUrl.split('.').pop().toLowerCase();

        // Check if the file is a CSV or XLSX
        if (fileExtension === 'csv') {
            fetch(selectedFileUrl)
                .then(response => response.text())  // Get the file content as text
                .then(csvData => {
                    // Use PapaParse to parse the CSV data
                    Papa.parse(csvData, {
                        header: true,  // Set to true if your CSV file has headers
                        skipEmptyLines: true,
                        complete: function(results) {
                            // console.log('Parsed CSV:', results.data);  // The result is an array of objects
                            generateTable(results.data);
                        },
                        error: function(error) {
                            console.error('Error parsing CSV:', error);
                        }
                    });
                })
                .catch(error => {
                    console.error('Error fetching CSV:', error);
                });
        } else if (fileExtension === 'xlsx') {
            fetch(selectedFileUrl)
                .then(response => response.arrayBuffer())  // Get the file content as an ArrayBuffer
                .then(data => {
                    // Use SheetJS to read and parse the XLSX file
                    const workbook = XLSX.read(data, { type: 'array' });

                    // Assuming the first sheet is the one you want
                    const worksheet = workbook.Sheets[workbook.SheetNames[0]];

                    // Convert the sheet to JSON (array of objects)
                    const jsonData = XLSX.utils.sheet_to_json(worksheet);
                    generateTable(jsonData);

                    // console.log('Parsed XLSX:', jsonData);  // The result is an array of objects
                })
                .catch(error => {
                    console.error('Error fetching or parsing XLSX:', error);
                });
        } else {
            console.log('The selected file is neither CSV nor XLSX.');
        }
    });
    document.getElementById('maxRows').addEventListener('change', function() {

        // Get the selected file's URL from the dropdown
        const selectedFileUrl = this.value;
        // console.log(selectedFileUrl);

        // Extract the file extension from the file URL or file name
        const fileExtension = selectedFileUrl.split('.').pop().toLowerCase();

        // Check if the file is a CSV or XLSX
        if (fileExtension === 'csv') {
            fetch(selectedFileUrl)
                .then(response => response.text())  // Get the file content as text
                .then(csvData => {
                    // Use PapaParse to parse the CSV data
                    Papa.parse(csvData, {
                        header: true,  // Set to true if your CSV file has headers
                        skipEmptyLines: true,
                        complete: function(results) {
                            // console.log('Parsed CSV:', results.data);  // The result is an array of objects
                            generateTable(results.data);
                        },
                        error: function(error) {
                            console.error('Error parsing CSV:', error);
                        }
                    });
                })
                .catch(error => {
                    console.error('Error fetching CSV:', error);
                });
        } else if (fileExtension === 'xlsx') {
            fetch(selectedFileUrl)
                .then(response => response.arrayBuffer())  // Get the file content as an ArrayBuffer
                .then(data => {
                    // Use SheetJS to read and parse the XLSX file
                    const workbook = XLSX.read(data, { type: 'array' });

                    // Assuming the first sheet is the one you want
                    const worksheet = workbook.Sheets[workbook.SheetNames[0]];

                    // Convert the sheet to JSON (array of objects)
                    const jsonData = XLSX.utils.sheet_to_json(worksheet);
                    generateTable(jsonData);

                    // console.log('Parsed XLSX:', jsonData);  // The result is an array of objects
                })
                .catch(error => {
                    console.error('Error fetching or parsing XLSX:', error);
                });
        } else {
            console.log('The selected file is neither CSV nor XLSX.');
        }

    });

    function generateTable(data) {
        const tableContainer = document.getElementById('embed_table');

        // Create the table element
        const table = document.createElement('table');
        table.classList.add('table', 'table-bordered'); // Add Bootstrap classes (optional)

        // Create table header row
        const thead = document.createElement('thead');
        const headerRow = document.createElement('tr');

        // Create header cells based on the keys (first row)
        if (data.length > 0) {
            Object.keys(data[0]).forEach(key => {
                const th = document.createElement('th');
                th.textContent = key;
                headerRow.appendChild(th);
            });
            thead.appendChild(headerRow);
            table.appendChild(thead);
        }

        // Create table body rows
        const tbody = document.createElement('tbody');
        data.forEach(rowData => {
            const row = document.createElement('tr');
            Object.values(rowData).forEach(value => {
                const td = document.createElement('td');
                td.textContent = value;
                row.appendChild(td);
            });
            tbody.appendChild(row);
        });

        table.appendChild(tbody);

        // Append the table to the embed_table div
        tableContainer.innerHTML = ''; // Clear previous table
        tableContainer.appendChild(table);
    }
</script>
@endsection