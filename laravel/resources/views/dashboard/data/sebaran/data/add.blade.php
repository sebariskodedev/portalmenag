@extends('template.main')
@section('title', 'Add Sebaran data')

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
                <a href="/admin/data-sebaran" class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
                  Back
                </a>
              </div>
            </div>


            <div class="card-body">
                <h5 class="card-title"></h5>

                <!-- Vertical Form -->
                <form class="row g-3" novalidate action="/admin/data-sebaran" method="POST">
                    @csrf
                    <div class="col-6">
                        <label for="provinsi" class="form-label">Provinsi</label>
                        <div class="col-sm-6">
                            @php
                                $provinsis = App\Models\Provinsi::get();
                            @endphp
                            <select class="form-select" id="provinsi" name="provinsi">
                                <option value="0">Pilih Provinsi</option>
                                @foreach ($provinsis as $data)
                                    <option value="{{$data->name}}">{{$data->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('sub_rb')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="umat" class="form-label">Umat</label>
                        <input type="text" name="umat" class="form-control @error('umat') is-invalid @enderror" id="umat" placeholder="Masukkan Data" value="{{old('umat')}}" required>
                        @error('umat')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="rumah_ibadah" class="form-label">Rumah Ibadah</label>
                        <input type="text" name="rumah_ibadah" class="form-control @error('rumah_ibadah') is-invalid @enderror" id="rumah_ibadah" placeholder="Masukkan Data" value="{{old('rumah_ibadah')}}" required>
                        @error('rumah_ibadah')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="lembaga" class="form-label">Lembaga</label>
                        <input type="text" name="lembaga" class="form-control @error('lembaga') is-invalid @enderror" id="lembaga" placeholder="Masukkan Data" value="{{old('lembaga')}}" required>
                        @error('lembaga')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="tokoh" class="form-label">Tokoh</label>
                        <input type="text" name="tokoh" class="form-control @error('tokoh') is-invalid @enderror" id="tokoh" placeholder="Masukkan Data" value="{{old('tokoh')}}" required>
                        @error('tokoh')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="penyuluh" class="form-label">Penyuluh</label>
                        <input type="text" name="penyuluh" class="form-control @error('penyuluh') is-invalid @enderror" id="penyuluh" placeholder="Masukkan Data" value="{{old('penyuluh')}}" required>
                        @error('penyuluh')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="pasraman" class="form-label">Pasraman</label>
                        <input type="text" name="pasraman" class="form-control @error('pasraman') is-invalid @enderror" id="pasraman" placeholder="Masukkan Data" value="{{old('pasraman')}}" required>
                        @error('pasraman')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="siswa" class="form-label">Siswa</label>
                        <input type="text" name="siswa" class="form-control @error('siswa') is-invalid @enderror" id="siswa" placeholder="Masukkan Data" value="{{old('siswa')}}" required>
                        @error('siswa')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="guru" class="form-label">Guru</label>
                        <input type="text" name="guru" class="form-control @error('guru') is-invalid @enderror" id="guru" placeholder="Masukkan Data" value="{{old('guru')}}" required>
                        @error('guru')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="perguruan_tinggi" class="form-label">Perguruan Tinggi</label>
                        <input type="text" name="perguruan_tinggi" class="form-control @error('perguruan_tinggi') is-invalid @enderror" id="perguruan_tinggi" placeholder="Masukkan Data" value="{{old('perguruan_tinggi')}}" required>
                        @error('perguruan_tinggi')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="dosen" class="form-label">Dosen</label>
                        <input type="text" name="dosen" class="form-control @error('dosen') is-invalid @enderror" id="dosen" placeholder="Masukkan Data" value="{{old('dosen')}}" required>
                        @error('dosen')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="mahasiswa" class="form-label">Mahasiswa</label>
                        <input type="text" name="mahasiswa" class="form-control @error('mahasiswa') is-invalid @enderror" id="mahasiswa" placeholder="Masukkan Data" value="{{old('mahasiswa')}}" required>
                        @error('mahasiswa')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="tenaga_administrasi" class="form-label">Tenaga Administrasi</label>
                        <input type="text" name="tenaga_administrasi" class="form-control @error('tenaga_administrasi') is-invalid @enderror" id="tenaga_administrasi" placeholder="Masukkan Data" value="{{old('tenaga_administrasi')}}" required>
                        @error('tenaga_administrasi')
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