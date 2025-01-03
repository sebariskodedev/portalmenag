@extends('template.main')
@section('title', 'Add Mimbar')

@section('style')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style>
.input-2 {
  opacity: 0;
  height: 0;
  overflow: hidden;
  transition: opacity 0.5s, height 0.5s;
}

.input-2.visible {
  opacity: 1;
  height: auto; /* Alternatively, use a specific height like "50px" for consistent results */
}

.hidden {
  display: none;
}
</style>
@endsection
@section('content')

<div class="content-wrapper">

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="text-right">
                <a href="/informasi/mimbar" class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
                  Back
                </a>
              </div>
            </div>


            <div class="card-body">
                <h5 class="card-title"></h5>

                <!-- Vertical Form -->
                <form id="form-berita" class="row g-3" novalidate action="/informasi/mimbar" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input style="display: none;" type="text" name="tipe" id="tipe" value="1" required>
                    <div class="col-12">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="Masukkan Judul" value="{{old('judul')}}" required>
                        @error('judul')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="gambar1" class="form-label">Gambar 1</label>
                        <div class="col-sm-6">
                            <input type="file" name="gambar1" class="form-control @error('gambar1') is-invalid @enderror" id="gambar1" accept="image/*" required>
                        </div>
                        @error('gambar1')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="keterangan1" class="form-label">Keterangan Gambar 1</label>
                        <input type="text" name="keterangan1" class="form-control @error('keterangan1') is-invalid @enderror" id="keterangan1" placeholder="Masukkan Keterangan gambar 1" value="{{old('keterangan1')}}" required>
                        @error('keterangan1')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6 input-2 hidden">
                        <label for="gambar2" class="form-label">Gambar 2</label>
                        <div class="col-sm-6">
                            <input type="file" name="gambar2" class="form-control @error('gambar2') is-invalid @enderror" id="gambar2" accept="image/*">
                        </div>
                        @error('gambar2')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6 input-2 hidden">
                        <label for="keterangan2" class="form-label">Keterangan Gambar 2</label>
                        <input type="text" name="keterangan2" class="form-control @error('keterangan2') is-invalid @enderror" id="keterangan2" placeholder="Masukkan Keterangan gambar 2" value="{{old('keterangan2')}}">
                        @error('keterangan2')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button id="toggleButton" style="margin-right: 20px; position: relative;" type="button" class="btn btn-warning">Tambah Gambar</button>
                    <div class="col-12" style="padding-bottom: 100px;">
                        <label for="deskripsi" class="form-label">Deskripsi berita</label>
                        
                        
                        <div class="col-sm-12" id="quill-editor"></div>
                        <input type="hidden" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="Masukkan Deskripsi" value="{{old('deskripsi')}}" style="height: 100px" required>
                        @error('deskripsi')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="text-center" style="margin-top: 20px; align-items: right; justify-content: right; display: flex;">
                        <button style="margin-right: 20px;" type="button" onclick="submitForm()" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form><!-- Vertical Form -->

            </div>
            
            
          </div>
        </div>
        <!-- /.content -->
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')

<!-- Include Quill JS -->
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill@1.3.6/dist/quill.min.js"></script>

<script>
    // Step 2: Initialize Quill Editor with Text from JavaScript
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize Quill editor on the div
        const quill = new Quill('#quill-editor', {
            theme: 'snow', // theme for the editor
            placeholder: 'Masukkan deskripsi berita...', // placeholder text
        });

        // Step 3: Set initial content (text) in the editor using JavaScript
        const htmlContent = ``;
        
        // You can use setText() to add plain text or use setContents() for HTML or Delta format
        quill.root.innerHTML = htmlContent; // Set HTML content directly
        // OR
        // const delta = quill.clipboard.convert(initialText); // Convert text to Quill Delta
        // quill.setContents(delta); // Set converted content
    });
</script>

<script>
    function submitForm() {
        // Retrieve the form element
        const form = document.getElementById('form-berita');
        var parentElement = document.getElementById('quill-editor');
        var deskripsiContent = parentElement.querySelector('.ql-editor').innerHTML;
        document.getElementById('deskripsi').value = deskripsiContent;

        form.submit();
    }
</script>

<script>

const toggleButton = document.getElementById('toggleButton');
const tipe = document.getElementById('tipe');
const animatedElements = document.querySelectorAll('.input-2');

toggleButton.addEventListener('click', () => {
  animatedElements.forEach((element) => {
    if (element.classList.contains('visible')) {
      element.style.transition = "opacity 0.5s, height 0.5s"; // Optional to reinforce animation
      element.classList.remove('visible');
      setTimeout(() => {
        element.classList.add('hidden'); // Apply `display: none` after animation
      }, 500); // Match the transition duration
      tipe.value = "1";
      toggleButton.innerHTML = "Tambah Gambar";
    } else {
      element.classList.remove('hidden'); // Remove `display: none` immediately
      requestAnimationFrame(() => { // Wait for the DOM to update
        element.classList.add('visible');
      });
      tipe.value = "2";
      toggleButton.innerHTML = "Kurangi Gambar";
    }
  });
});

</script>

@endsection