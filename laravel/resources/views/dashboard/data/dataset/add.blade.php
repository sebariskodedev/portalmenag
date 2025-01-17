@extends('template.main')
@section('title', 'Add Dataset')

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
                <a href="/admin/data-set" class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
                  Back
                </a>
              </div>
            </div>


            <div class="card-body">
                <h5 class="card-title"></h5>

                <!-- Vertical Form -->
                <form class="row g-3" novalidate action="/admin/data-set" method="POST">
                    @csrf
                    <div class="col-12">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="Masukkan judul data" value="{{old('judul')}}" required>
                        @error('judul')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <div class="col-sm-12">
                            <textarea type="deskripsi" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="Masukkan Deskripsi" value="{{old('deskripsi')}}" style="height: 100px" required></textarea>
                        </div>
                        @error('deskripsi')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                    </div>
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


@endsection