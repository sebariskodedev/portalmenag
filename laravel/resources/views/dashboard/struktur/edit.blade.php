@extends('template.main')
@section('title', 'Edit Struktur Organisasi')

@section('content')

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-right">
                                <a href="/admin/struktur" class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
                                    Back
                                </a>
                            </div>
                        </div>


                        <div class="card-body">
                            <h5 class="card-title"></h5>

                            <!-- Vertical Form -->
                            <form class="row g-3" novalidate action="/admin/struktur/{{ $struktur->id }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="col-6">
                                    <label for="judul" class="form-label">Judul</label>
                                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="Input Judul" value="{{old('judul', $struktur->judul)}}" required>
                                    @error('judul')
                                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="gambar" class="form-label">Gambar</label>
                                    <div class="col-sm-6">
                                        <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" id="gambar" accept="image/*" required>
                                    </div>
                                    @error('gambar')
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