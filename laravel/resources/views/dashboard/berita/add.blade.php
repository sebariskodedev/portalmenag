@extends('template.main')
@section('title', 'Add Berita')

@section('style')
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
                <a href="/informasi/terbaru" class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
                  Back
                </a>
              </div>
            </div>


            <div class="card-body">
                <h5 class="card-title"></h5>

                <!-- Vertical Form -->
                <form class="row g-3" novalidate action="/informasi/berita" enctype="multipart/form-data" method="POST">
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
                    <div class="col-12">
                        <label for="deskripsi1" class="form-label">Deskripsi Bagian 1</label>
                        <div class="col-sm-12">
                            <textarea type="deskripsi1" name="deskripsi1" class="form-control @error('deskripsi1') is-invalid @enderror" id="deskripsi1" placeholder="Masukkan Deskripsi" value="{{old('deskripsi1')}}" style="height: 100px" required></textarea>
                        </div>
                        @error('deskripsi1')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <hr class="input-2">
                    <div class="input-2" class="col-6">
                        <label for="gambar2" class="form-label">Gambar 2</label>
                        <div class="col-sm-6">
                            <input type="file" name="gambar2" class="form-control @error('gambar2') is-invalid @enderror" id="gambar2" accept="image/*">
                        </div>
                        @error('gambar2')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-2" class="col-6">
                        <label for="keterangan2" class="form-label">Keterangan Gambar 2</label>
                        <input type="text" name="keterangan2" class="form-control @error('keterangan2') is-invalid @enderror" id="keterangan2" placeholder="Masukkan Keterangan gambar 2" value="{{old('keterangan2')}}">
                        @error('keterangan2')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-2" class="col-12">
                        <label for="deskripsi2" class="form-label">Deskripsi Bagian 2</label>
                        <div class="col-sm-12">
                            <textarea type="deskripsi2" name="deskripsi2" class="form-control @error('deskripsi2') is-invalid @enderror" id="deskripsi2" placeholder="Masukkan Deskripsi" value="{{old('deskripsi2')}}" style="height: 100px" required></textarea>
                        </div>
                        @error('deskripsi2')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button id="toggleButton" style="margin-right: 20px;" type="button" class="btn btn-warning">Tambah Gambar</button>
                    <div class="text-center" style="margin-top: 20px; align-items: right; justify-content: right; display: flex;">
                        <button style="margin-right: 20px;" type="submit" class="btn btn-primary">Submit</button>
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