@extends('template.main')
@section('title', 'Informasi Bantuan')

@section('style')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
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
            <a href="/admin/bantuan-informasi/create" class="add">Add Informasi Bantuan</a>
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
                <th scope="col"><b>Nama</b></th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Gambar</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bantuans as $data)
                <tr>
                    <td class="truncate-text" title="{{ $data->nama }}"><span style="text-overflow: ellipsis; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $data->nama }}</span></td>
                    {{-- <td class="truncate-text" title="{{ $data->type }}"><span style="text-overflow: ellipsis; max-width: 100px;-webkit-line-clamp: 2;">{{ $data->type }}</span></td> --}}
                    <td class="truncate-text" title="{{ $data->deskripsi }}"><span data-content="{{$data->deskripsi}}" class="deskripsi-bantuan" style="text-overflow: ellipsis; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">The content from Quill will appear here.</span></td>
                    <td>
                        <img src="{{ asset('bantuan-informasi/' . $data->gambar) }}" 
                            alt="{{ $data->nama }}" 
                            style="max-width: 150px; max-height: 100px; object-fit: cover;">
                    </td>
                    <td>
                        <form class="d-inline" action="/admin/bantuan-informasi/{{ $data->id }}/edit" method="GET">
                            <button style="margin: 5px;" type="submit" class="btn btn-success btn-sm mr-1">
                                <i class="fa-solid fa-pen"></i> Edit
                            </button>
                        </form>
                        <form class="d-inline" action="/admin/bantuan-informasi/{{ $data->id }}" method="POST">
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

<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Create a hidden div element for the Quill editor container
        const quillContainer = document.createElement('div');
        quillContainer.style.display = 'none'; // Hide the editor container completely

        // Append the container to the body
        document.body.appendChild(quillContainer);

        // Initialize the Quill editor without a toolbar
        const quill = new Quill(quillContainer, {
            modules: { toolbar: false }, // Disable the toolbar
            theme: null, // No theme to avoid UI rendering
            readOnly: true, // Make the editor read-only
        });

        // Process each `.deskripsi-berita` element
        const deskripsiBerita = document.querySelectorAll('.deskripsi-bantuan');
        deskripsiBerita.forEach((element) => {
            // Get the `data-content` attribute value
            const dataContent = element.getAttribute('data-content');
            
            // Set the content into Quill's root element
            quill.root.innerHTML = dataContent;

            // Retrieve the processed content from Quill
            const quillContent = quill.root.innerHTML;

            // Update the target element's innerHTML with the processed content
            element.innerHTML = quillContent;
        });

        // Clean up by removing the hidden Quill container from the DOM
        document.body.removeChild(quillContainer);
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
