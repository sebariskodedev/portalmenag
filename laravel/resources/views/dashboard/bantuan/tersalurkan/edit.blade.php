@extends('template.main')
@section('title', 'Edit Bantuan Tersalurkan')

@section('style')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection

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
                                <a href="/admin/bantuan-tersalurkan" class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
                                    Back
                                </a>
                            </div>
                        </div>


                        <div class="card-body">
                            <h5 class="card-title"></h5>

                            <!-- Vertical Form -->
                            <div id="data-container" style="display: none;" data-content="{{ $bantuan->deskripsi }}"></div>
                            <form id="form-bantuan" class="row g-3" novalidate action="/admin/bantuan-tersalurkan/{{ $bantuan->id }}" enctype="multipart/form-data" method="POST">
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
                                    <label for="tahun" class="form-label">Tahun</label>
                                    <input type="number" name="tahun" class="form-control @error('tahun') is-invalid @enderror" id="tahun" placeholder="Masukkan Tahun" value="{{old('tahun', $bantuan->tahun)}}" required>
                                    @error('tahun')
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
                                    <label for="jumlah_tersalurkan" class="form-label">Jumlah Tersalurkan</label>
                                    <input type="number" name="jumlah_tersalurkan" class="form-control @error('jumlah_tersalurkan') is-invalid @enderror" id="jumlah_tersalurkan" placeholder="Masukkan Jumlah Tersalurkan" value="{{old('jumlah_tersalurkan', $bantuan->jumlah_tersalurkan)}}" required>
                                    @error('jumlah_tersalurkan')
                                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="lampiran" class="form-label">Lampiran</label>
                                    <input type="file" name="lampiran" class="form-control @error('lampiran') is-invalid @enderror" id="lampiran" accept="application/pdf">
                                    @error('lampiran')
                                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12" style="padding-bottom: 100px;">
                                    <label for="deskripsi" class="form-label">Deskripsi berita</label>

                                    <div class="col-sm-12" id="quill-editor"></div>
                                    <input type="hidden" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="Masukkan Deskripsi" value="{{old('deskripsi', $bantuan->deskripsi)}}" style="height: 100px" required>
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
        // Retrieve the data from the HTML element's data attribute
        const dataContent = document.getElementById('data-container').getAttribute('data-content');
        const htmlContent = `${dataContent}`;
        
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
        const form = document.getElementById('form-bantuan');
        var parentElement = document.getElementById('quill-editor');
        var deskripsiContent = parentElement.querySelector('.ql-editor').innerHTML;
        document.getElementById('deskripsi').value = deskripsiContent;

        
        // Check form validity
        const isValid = form.checkValidity();
        
        // Print the validation result to the console
        console.log('Form valid:', isValid);

        form.submit();
    }
</script>
@endsection