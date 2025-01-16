@extends('template.main')
@section('title', 'Dataset')

@section('style')
<!-- Add this inside the <head> tag -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
  /* Container styles */
  .search-add {
    display: flex;
    align-items: center;
    padding-bottom: 10px;
  }
  
  /* Button styles */
  .add {
    padding: 8px 16px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

.add:hover {
  background-color: #0CAF50;
  color: white;
}
  

/* table th,
table td {
	text-align: center;
} */

table tr:nth-child(even) {
	background-color: #e4e3e3;
}

th {
	background: #333;
	color: #fff;
}

.pagination {
	margin: 0;
}

.pagination li:hover {
	cursor: pointer;
}

.header_wrap {
	padding: 30px 0;
}
.num_rows {
	width: 20%;
	float: left;
}
.tb_search {
	width: 20%;
	float: right;
}
.pagination-container {
	width: 70%;
	float: left;
}

.rows_count {
	width: 20%;
	float: right;
	text-align: right;
	color: #999;
}



.form-file {
    padding: 5px;
    border-radius: 5px;
    border: 1px solid grey;
    margin: 3px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.form-file span {
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 1;
    overflow: hidden;
    text-overflow: ellipsis;
}

.form-file button {
    right: 0px;
}

.form-file .btn {
    padding: 5px 10px;
    background-color: red;
    color: white;
    border: none;
    cursor: pointer;
}

.form-file .btn:hover {
    background-color: darkred;
}
</style>
@endsection
@section('content')

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">@yield('title')</h5>

          <div class="search-add">
            <a href="/admin/data-set/create" class="add">Add Dataset</a>
          </div>

          <div class="container">
	<div class="header_wrap">
		<div class="num_rows">

			<div class="form-group">
				<!--		Show Numbers Of Rows 		-->
				<select class="form-control" name="state" id="maxRows">

					<option value="10">10</option>
					<option value="15">15</option>
					<option value="20">20</option>
					<option value="50">50</option>
					<option value="70">70</option>
					<option value="100">100</option>
					<option value="5000">Show ALL Rows</option>
				</select>

			</div>
		</div>
		<div class="tb_search">
			<input type="text" id="search_input_all" onkeyup="FilterkeyWord_all_table()" placeholder="Search.." class="form-control">
		</div>
	</div>
	<table class="table table-bordered border-primarytable-striped table-class" id= "table-id" style="margin-top: 20px;">
        <thead>
            <tr>
                <th scope="col"><b>Judul</b></th>
                <th scope="col">Deskripsi</th>
                <th scope="col">File</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datasets as $data)
                <tr>
                    <td class="truncate-text"><span style="text-overflow: ellipsis; max-width: 100px;-webkit-line-clamp: 2;">{{ $data->judul }}</span></td>
                    <td class="truncate-text"><span style="text-overflow: ellipsis; max-width: 10px;-webkit-line-clamp: 2;">{{ $data->deskripsi }}</span></td>
                    @php
                        $files = $data->files;
                        $fileYears = $files->pluck('tahun')->implode(', ');
                    @endphp
                    <td class="truncate-text"><span style="text-overflow: ellipsis; max-width: 10px;-webkit-line-clamp: 2;">{{ $fileYears }}</span></td>
                    <td>
                        <form class="d-inline" action="/admin/data-set/{{ $data->id }}/edit" method="GET">
                            <button style="margin: 5px;" type="submit" class="btn btn-success btn-sm mr-1">
                                <i class="fa-solid fa-pen"></i> Edit
                            </button>
                        </form>
                        <button 
                            style="margin: 5px;" 
                            type="button" 
                            class="btn btn-success btn-sm mr-1" 
                            data-bs-toggle="modal" 
                            data-bs-target="#verticalycentered" 
                            data-title="{{$data->judul}}" 
                            data-list_file="{{$data->list_file}}"
                            data-id="{{$data->id}}">
                            <i class="fa-solid fa-pen"></i> File
                        </button>
                        <form class="d-inline" action="/admin/data-set/{{ $data->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <button style="margin: 5px;" type="submit" class="btn btn-danger btn-sm" id="btn-delete">
                                <i class="fa-solid fa-trash-can"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
	<div class="modal fade" id="verticalycentered" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Upload Excel/CSV File</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div style="margin-bottom: 20px;" id="list-file">
                    </div>
                    <!-- Form starts here -->
                    <form class="modal-form" id="uploadForm" method="POST" enctype="multipart/form-data">
                        @csrf <!-- Add CSRF token for Laravel -->
                        
                        <!-- File upload input -->
                        <input style="display: none;" type="text" class="form-control modal-id" id="dataset_id" name="dataset_id">
                        <div class="mb-3">
                            <label for="fileInput" class="form-label">Choose Excel/CSV File</label>
                            <input type="file" class="form-control" id="fileInput" name="file" accept=".csv, .xlsx" required>
                        </div>
                        
                        <!-- Year selection input -->
                        <div class="mb-3">
                            <label for="yearInput" class="form-label">Select Year</label>
                            <select class="form-select" id="yearInput" name="tahun" required>
                                <option value="" selected disabled>Select Year</option>
                                @for ($i = date('Y'); $i >= 2000; $i--)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        <!-- Submit button -->
                        <div class="mb-3 text-end">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

	<!--		Start Pagination -->
	<div class='pagination-container'>
		<nav>
			<ul class="pagination">
				<!--	Here the JS Function Will Add the Rows -->
			</ul>
		</nav>
	</div>
	<div class="rows_count">Showing 11 to 20 of 91 entries</div>

</div> <!-- 		End of Container -->

<!--  Developed By Yasser Mas -->

        </div>
      </div>

    </div>
  </div>
</section>

@endsection

@section('script')

<script>

	document.addEventListener('DOMContentLoaded', function () {
		// Select the modal element
		const modal = document.getElementById('verticalycentered');
		
		// Add an event listener for the 'show.bs.modal' event
		modal.addEventListener('show.bs.modal', function (event) {
			// Get the button that triggered the modal
			const button = event.relatedTarget;

			// Extract data from the button's data-* attributes
			const title = button.getAttribute('data-title');
			const id = button.getAttribute('data-id');
			// Update the modal's title and body content
			modal.querySelector('.modal-title').textContent = title;
			modal.querySelector('.modal-id').value = id;

            const url = `/api/data-file/${id}`; // API route

            fetch(url, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json(); // Parse JSON response
            })
            .then(data => {
                console.log('Files:', data.files); // Access the files data
                // Get the CSRF token from the meta tag
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                // Get the div with id "list-file" where you want to add the elements
                const listFileDiv = document.getElementById("list-file");

                // Clear the existing content in the list-file div
                listFileDiv.innerHTML = '';  // This clears any previously appended content

                // Loop through the files and dynamically add them
                data.files.forEach(file => {
                    // Create the form element
                    const form = document.createElement("form");
                    form.method = "POST"; // Set the form method to POST
                    form.action = `/admin/delete-file/${id}`; // Set the action URL where the form should submit
                    form.classList.add("form-file");  // Add the 'form-file' class to apply styles

                    // Create a hidden input for CSRF token
                    const csrfInput = document.createElement("input");
                    csrfInput.type = "hidden";
                    csrfInput.name = "_token";
                    csrfInput.value = csrfToken; // Set the CSRF token value

                    // Create the span element (for text with ellipsis)
                    const span = document.createElement("span");
                    span.textContent = file.tahun;  // Assuming the file has a 'name' property

                    // Create the delete button
                    const button = document.createElement("button");
                    button.classList.add("btn", "btn-danger", "btn-sm");
                    button.id = "btn-delete";
                    button.type = "submit";
                    button.style.right = "0px";

                    // Add an icon inside the button
                    const icon = document.createElement("i");
                    icon.classList.add("fa-solid", "fa-trash-can");
                    button.appendChild(icon); // Append the icon to the button

                    // Add text to the button
                    button.appendChild(document.createTextNode(" Delete"));

                    // Append the span and button to the form
                    form.appendChild(csrfInput);
                    form.appendChild(span);
                    form.appendChild(button);

                    // Append the form to the div with id "list-file"
                    listFileDiv.appendChild(form);
                });
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });


            // Example: Set the action URL dynamically based on some condition
			const form = modal.querySelector('.modal-form');
            const actionUrl = `/admin/data-file`;

            // Set the action URL of the form
            form.setAttribute('action', actionUrl);
		});
	});
</script>



<script>

getPagination("#table-id");
$("#maxRows").trigger("change");
function getPagination(table) {
	$("#maxRows").on("change", function () {
		$(".pagination").html(""); // reset pagination div
		var trnum = 0; // reset tr counter
		var maxRows = parseInt($(this).val()); // get Max Rows from select option

		var totalRows = $(table + " tbody tr").length; // numbers of rows
		$(table + " tr:gt(0)").each(function () {
			// each TR in  table and not the header
			trnum++; // Start Counter
			if (trnum > maxRows) {
				// if tr number gt maxRows

				$(this).hide(); // fade it out
			}
			if (trnum <= maxRows) {
				$(this).show();
			} // else fade in Important in case if it ..
		}); //  was fade out to fade it in
		if (totalRows > maxRows) {
			// if tr total rows gt max rows option
			var pagenum = Math.ceil(totalRows / maxRows); // ceil total(rows/maxrows) to get ..
			//	numbers of pages
			for (var i = 1; i <= pagenum ;){			// for each page append pagination li 
			 	$('.pagination').append('<li data-page="'+i+'" class="styled-item" style="padding: 10px; border: 0.5px solid white; background-color: grey;">\
								      <span style="color: white;">'+ i++ +'</span>\
								    </li>').show();
			 	}											// end for i 
		} // end if row count > max rows


    // Add click event using event delegation
    $('.pagination').on('click', '.styled-item', function () {
        // Reset background color for all items
        $('.styled-item').css('background-color', 'grey'); 

        // Set background color for the clicked item
        $(this).css('background-color', '#5470c6'); // Example color
    });

		$(".pagination li:first-child").addClass("active"); // add active class to the first li

		//SHOWING ROWS NUMBER OUT OF TOTAL DEFAULT
		showig_rows_count(maxRows, 1, totalRows);
		//SHOWING ROWS NUMBER OUT OF TOTAL DEFAULT

		$(".pagination li").on("click", function (e) {
			// on click each page
			e.preventDefault();
			var pageNum = $(this).attr("data-page"); // get it's number
			var trIndex = 0; // reset tr counter
			$(".pagination li").removeClass("active"); // remove active class from all li
			$(this).addClass("active"); // add active class to the clicked

			//SHOWING ROWS NUMBER OUT OF TOTAL
			showig_rows_count(maxRows, pageNum, totalRows);
			//SHOWING ROWS NUMBER OUT OF TOTAL

			$(table + " tr:gt(0)").each(function () {
				// each tr in table not the header
				trIndex++; // tr index counter
				// if tr index gt maxRows*pageNum or lt maxRows*pageNum-maxRows fade if out
				if (trIndex > maxRows * pageNum || trIndex <= maxRows * pageNum - maxRows) {
					$(this).hide();
				} else {
					$(this).show();
				} //else fade in
			}); // end of for each tr in table
		}); // end of on click pagination list
	});
	// end of on select change

	// END OF PAGINATION
}

// SI SETTING
$(function () {
	// Just to append id number for each row
	default_index();
});

//ROWS SHOWING FUNCTION
function showig_rows_count(maxRows, pageNum, totalRows) {
	//Default rows showing
	var end_index = maxRows * pageNum;
	var start_index = maxRows * pageNum - maxRows + parseFloat(1);
	var string =
		"Showing " +
		start_index +
		" to " +
		end_index +
		" of " +
		totalRows +
		" entries";
	$(".rows_count").html(string);
}

// CREATING INDEX
function default_index() {
	$("table tr:eq(0)").prepend("<th> ID </th>");

	var id = 0;

	$("table tr:gt(0)").each(function () {
		id++;
		$(this).prepend("<td>" + id + "</td>");
	});
}

// All Table search script
function FilterkeyWord_all_table() {
	// Count td if you want to search on all table instead of specific column

	var count = $(".table")
		.children("tbody")
		.children("tr:first-child")
		.children("td").length;

	// Declare variables
	var input, filter, table, tr, td, i;
	input = document.getElementById("search_input_all");
	var input_value = document.getElementById("search_input_all").value;
	filter = input.value.toLowerCase();
	if (input_value != "") {
		table = document.getElementById("table-id");
		tr = table.getElementsByTagName("tr");

		// Loop through all table rows, and hide those who don't match the search query
		for (i = 1; i < tr.length; i++) {
			var flag = 0;

			for (j = 0; j < count; j++) {
				td = tr[i].getElementsByTagName("td")[j];
				if (td) {
					var td_text = td.innerHTML;
					if (td.innerHTML.toLowerCase().indexOf(filter) > -1) {
						//var td_text = td.innerHTML;
						//td.innerHTML = 'shaban';
						flag = 1;
					} else {
						//DO NOTHING
					}
				}
			}
			if (flag == 1) {
				tr[i].style.display = "";
			} else {
				tr[i].style.display = "none";
			}
		}
	} else {
		//RESET TABLE
		$("#maxRows").trigger("change");
	}
}

</script>

@endsection
