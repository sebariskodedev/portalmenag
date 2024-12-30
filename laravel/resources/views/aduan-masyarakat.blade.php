<!-- resources/views/dashboard.blade.php -->
@extends('template.user')

@section('style')
<style>
.col-75 input[type=text], .lampiran, select, textarea, .col-75 input[type=email] {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
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

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
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
<main class="main dinamyc-color">

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section dinamyc-color">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2 class="text-dinamyc-color-primary">Layanan Pengaduan Masyarakat</h2>
        <!-- <p>Maklumat Pelayanan adalah pernyataan komitmen dari suatu organisasi atau lembaga pelayanan publik untuk memberikan pelayanan yang berkualitas, profesional, dan sesuai dengan standar yang telah ditetapkan</p> -->
      </div><!-- End Section Title -->

      <div class="container" style="border-radius: 5px; background-color: #ededed;padding: 20px;">
  
        <form action="/dumas" enctype="multipart/form-data" method="POST">
            @csrf
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col-25">
                <label for="name">Nama<span class="required" style="color: red;">*</span></label>
                </div>
                <div class="col-75" style="margin-left: -20px;">
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama lengkapmu ..." required>
                </div>
                @error('name')
                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                @enderror
            </div>  
                
            <div class="row">
                <div class="col-25">
                <label for="email">Email<span class="required" style="color: red;">*</span></label>
                </div>
                <div class="col-75">
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email kamu ..." required>
                </div>
                @error('email')
                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                @enderror
            </div>
                
            <div class="row">
                <div class="col-25">
                <label for="subjek">Subjek<span class="required" style="color: red;">*</span></label>
                </div>
                <div class="col-75">
                  <select id="subjek" name="subjek">
                      <option value="0">Pilih Subjek</option>
                      @foreach ($kategoridumass as $data)
                      <option value="{{$data->id}}">{{$data->name}}</option>
                      @endforeach
                  </select>
                </div>
            </div>
                
            <div class="row">
                <div class="col-25">
                <label for="pesan">Pesan<span class="required" style="color: red;">*</span></label>
                </div>
                <div class="col-75">
                <textarea id="pesan" name="pesan" class="form-control @error('pesan') is-invalid @enderror" placeholder="Ketik pesan anda ..." style="height:200px" required></textarea>
                </div>
                @error('pesan')
                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                @enderror
            </div>
                
            <div class="row">
                <div class="col-25">
                <label for="lampiran">Lampiran</label>
                </div>
                <div class="col-75">
                    <fieldset> 
                        <p class="lampiran" style="background-color: white;">
                            <input name="lampiran" id="file-to-upload" type="file" style="display:none" onchange="updateLabel()">
                            <!-- Custom button that triggers the file input -->
                            <label for="file-to-upload" class="custom-file-label">Pilih File</label>
                        </p>
                    </fieldset> 
                </div>
            </div>
                
            <div class="row submit">
                <button>Submit</button>
            </div>
            
        </form>

      </div>

    </section><!-- /Portfolio Section -->

</main>
@endsection

@section('script')
<script>

    // Update the label text when a file is selected
    function updateLabel() {
        var fileInput = document.getElementById("file-to-upload");
        var label = document.querySelector(".custom-file-label");
        
        // Check if a file is selected
        if (fileInput.files.length > 0) {
            label.textContent = fileInput.files[0].name;  // Change label to the name of the selected file
        } else {
            label.textContent = "Choose a file";  // Reset to default text
        }
    }
</script>
@endsection