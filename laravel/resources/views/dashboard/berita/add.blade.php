@extends('template.main')
@section('title', 'Add Berita')

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



.inner {
  width: 450px;
  margin: 0 auto;
}

.tag-field {
  display: flex;
  flex-wrap: wrap;
  height: 50px;
  padding: 5px;
  border: 1px solid #ddd;
  border-radius: 4px;  
}

input {
  border: 0;
  outline: 0;
}

.tag {
  display: flex;
  align-items: center;
  height: 35px;
  margin-right: 5px;
  padding: 0 8px;
  color: #fff;
  background: #47CF73;
  border-radius: 15px;
  cursor: pointer;
}

.tag-close {
  display: inline-block;
  margin-left: 0;
  width: 0;
  transition: 0.2s all;
  overflow: hidden;
}

.tag:hover .tag-close {
  margin-left: 10px;
  width: 10px;
}

.yolo-heading {
  position: relative;
  margin-top: 0;
  margin-bottom: 25px;
  font-weight: 300;
}

.yolo-heading::after {
  content: "";
  display: inline-block;
  width: 40px;
  height: 5px;
  position: absolute;
  top: 15px;
  left: 200px;
  background: #47CF73;
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
                <a href="/informasi/berita" class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
                  Back
                </a>
              </div>
            </div>


            <div class="card-body">
                <h5 class="card-title"></h5>

                <!-- Vertical Form -->
                <form id="form-berita" class="row g-3" novalidate action="/informasi/berita" enctype="multipart/form-data" method="POST">
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
                    <div class="col-6">
                        <label for="sumber" class="form-label">Sumber</label>
                        <input type="text" name="sumber" class="form-control @error('sumber') is-invalid @enderror" id="sumber" placeholder="Masukkan Sumber" value="{{old('sumber')}}" required>
                        @error('sumber')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="metadata" class="form-label">Metadata</label>
                        <input type="text" name="metadata" class="form-control @error('metadata') is-invalid @enderror" id="metadata" placeholder="Masukkan Metadata" value="{{old('metadata')}}" required>
                        @error('metadata')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="metatitle" class="form-label">Meta Title</label>
                        <input type="text" name="metatitle" class="form-control @error('metatitle') is-invalid @enderror" id="metatitle" placeholder="Masukkan Meta title" value="{{old('metatitle')}}" required>
                        @error('metatitle')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="metadeskripsi" class="form-label">Meta Deskripsi</label>
                        <input type="text" name="metadeskripsi" class="form-control @error('metadeskripsi') is-invalid @enderror" id="metadeskripsi" placeholder="Masukkan Meta deskripsi" value="{{old('metadeskripsi')}}" required>
                        @error('metadeskripsi')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div id="tags-div" class="col-12">
                        <label for="tags" class="form-label">Tags (Tekan enter untuk menambahkan tak baru)</label>
                        <div class="tag-field js-tags">
                          <input style="border: none;" placeholder="Masukkan tag ..." name="tags" class="js-tag-input form-control @error('tags') is-invalid @enderror" id="textInput" required>
                        </div>
                        <input style="display: none;" type="text" name="metatag" id="tags" required>
                        @error('tags')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                    </div>
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


        const tagDivs = document.querySelectorAll('div[data-tag]');
        // Create an array to store the data
        let tagData = [];
        // Loop through each div and get the data-tag and other attributes
        tagDivs.forEach((div) => {
            let dataTag = div.getAttribute('data-tag');  // Get the value of the data-tag attribute
            // let dataIndex = div.getAttribute('data-index'); // Get the value of the data-index attribute
            
            // // Optionally, you can also get the text content or innerHTML of the div
            let textContent = div.textContent.trim(); // or div.innerHTML if you want the HTML

            // Push the data into the array
            tagData.push(dataTag);
        });
        const inputElement = document.getElementById('tags');
        if (inputElement) {
          inputElement.value = tagData.toString();
        } else {
            console.error('Input element not found!');
        }

        // // Create a new FormData object
        // const formData = new FormData(form);

        // // Log the form data
        // formData.forEach((value, key) => {
        //     console.log(`${key}: ${value}`);
        // });

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

<script>
var tags = [];
var $container = document.getElementById('tags-div');
var $input = document.getElementById('textInput');
var $tags = document.querySelector('.js-tags');

$container.addEventListener('click', function() {
  $input.focus();
});

$container.addEventListener('keydown', function(evt) {
  if ( !evt.target.matches('.js-tag-input') ) {
    return;
  }
  
  if ( evt.keyCode !== 13 ) {
    return;
  }
  
  var value = String(evt.target.value);
  
  if ( !value.length || value.length > 20 || tags.length === 5 ) {
    return;
  }
  
  tags.push(evt.target.value);
  $input.value = '';
  render(tags, $tags);
});

$container.addEventListener('keydown', function(evt) {
  if ( !evt.target.matches('.js-tag-input') ) {
    return;
  }
  
  if ( evt.keyCode !== 8 ) {
    return;
  }
  
  if ( String(evt.target.value).length ) {
    return;
  }
  
  tags = tags.slice(0, tags.length - 1);
  $input.value = '';
  render(tags, $tags);
});

$container.addEventListener('click', function(evt) {
  if ( evt.target.matches('.js-tag-close') || evt.target.matches('.js-tag') ) {
    tags = tags.filter(function(tag, i) {
      return i != evt.target.getAttribute('data-index');
    });
    render(tags, $tags);
  }
}, true);
 

function render(tags, el) {
  el.innerHTML = tags.map(function(tag, i) {
    return (
      '<div data-tag="' + tag + '" class="tag js-tag" data-index="' + i + '">' +
        tag +
        '<span class="tag-close js-tag-close" data-index="' + i + '">×</span>' +
      '</div>'
   );
  }).join('') + (tags.length === 5 ? '' : '<input placeholder="Enter new tag..." class="js-tag-input">')
  ;
  
  $container.querySelector('.js-tag-input').focus();
    $("#textInput").css("width","100%")

}
</script>

@endsection