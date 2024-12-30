@extends('template.main')
@section('title', 'Edit Informasi Bantuan')

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
                                <a href="/admin/bantuan-informasi" class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
                                    Back
                                </a>
                            </div>
                        </div>


                        <div class="card-body">
                            <h5 class="card-title"></h5>

                            <!-- Vertical Form -->
                            <form class="row g-3" novalidate action="/admin/bantuan-informasi/{{ $bantuan->id }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="col-6">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Input Nama Bantuan" value="{{old('nama', $bantuan->nama)}}" required>
                                    @error('nama')
                                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="gambar" class="form-label">Gambar</label>
                                    <div class="col-sm-6">
                                        <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" id="gambar" accept="image/*">
                                    </div>
                                    @error('gambar')
                                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="tipe" class="form-label">Tipe</label>
                                    <select class="form-select" id="tipe" name="tipe">
                                        <option value="{{old('tipe', $bantuan->tipe)}}">{{old('tipe', $bantuan->tipe)}}</option>
                                        <option value="keagamaan">Keagamaan</option>
                                        <option value="pendidikan">Pendidikan</option>
                                    </select>
                                    @error('tipe')
                                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="jumlah_kuota" class="form-label">Jumlah Kuota</label>
                                    <input type="number" name="jumlah_kuota" class="form-control @error('jumlah_kuota') is-invalid @enderror" id="jumlah_kuota" placeholder="Masukkan Jumlah Kuota" value="{{old('jumlah_kuota', $bantuan->jumlah_kuota)}}" required>
                                    @error('jumlah_kuota')
                                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="jenis" class="form-label">Jenis</label>
                                    <input type="text" name="jenis" class="form-control @error('jenis') is-invalid @enderror" id="jenis" placeholder="Masukkan Jenis Bantuan" value="{{old('jenis', $bantuan->jenis)}}" required>
                                    @error('jenis')
                                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="kategori" class="form-label">Kategori</label>
                                    <input type="text" name="kategori" class="form-control @error('kategori') is-invalid @enderror" id="kategori" placeholder="Masukkan Kategori Bantuan" value="{{old('kategori', $bantuan->kategori)}}" required>
                                    @error('kategori')
                                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="tanggal_pembukaan" class="form-label">Tanggal Pembukaan</label>
                                    <input type="text" name="tanggal_pembukaan" class="form-control @error('tanggal_pembukaan') is-invalid @enderror" id="tanggal_pembukaan" placeholder="Masukkan Tanggal Pembukaan" value="{{old('tanggal_pembukaan', $bantuan->tanggal_pembukaan)}}" required>
                                    @error('tanggal_pembukaan')
                                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="tanggal_penutupan" class="form-label">Tanggal Penutupan</label>
                                    <input type="text" name="tanggal_penutupan" class="form-control @error('tanggal_penutupan') is-invalid @enderror" id="tanggal_penutupan" placeholder="Masukkan Tanggal Penutupan" value="{{old('tanggal_penutupan', $bantuan->tanggal_penutupan)}}" required>
                                    @error('tanggal_penutupan')
                                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="pic" class="form-label">PIC</label>
                                    <input type="text" name="pic" class="form-control @error('pic') is-invalid @enderror" id="pic" placeholder="Masukkan PIC" value="{{old('pic', $bantuan->pic)}}" required>
                                    @error('pic')
                                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" name="status">
                                            <option value="{{$bantuan->status}}">{{$bantuan->status}}</option>
                                            <option value="aktif">Aktif</option>
                                            <option value="inaktif">Tidak Aktif</option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="juknis" class="form-label">Juknis</label>
                                    <input type="file" name="juknis" class="form-control @error('juknis') is-invalid @enderror" id="juknis" accept="application/pdf">
                                    @error('juknis')
                                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <div class="col-sm-12">
                                        <textarea type="deskripsi" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="Masukkan Deskripsi" style="height: 100px" required>{{old('deskripsi', $bantuan->deskripsi)}}</textarea>
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