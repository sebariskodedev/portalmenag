@extends('template.main')
@section('title', 'Add User')

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
                <a href="/users" class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
                  Back
                </a>
              </div>
            </div>


            <div class="card-body">
                <h5 class="card-title"></h5>

                <!-- Vertical Form -->
                <form class="row g-3" novalidate action="/users" method="POST">
                    @csrf
                    <div class="col-6">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Input Name" value="{{old('name')}}" required>
                        @error('name')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Input Email" value="{{old('email')}}" required>
                        @error('email')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Input Password" required>
                        @error('password')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="passwordConfirm" class="form-label">Password</label>
                        <input type="password" name="passwordConfirm" class="form-control @error('passwordConfirm') is-invalid @enderror" id="passwordConfirm" placeholder="Reinput the Password" required>
                        @error('passwordConfirm')
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