@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-success">Profile Update Info</h3>
                    <form class="forms-sample" action="{{ route('user.profile.update') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Name</label>
                            <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">
                        </div>
                        @error('name')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}">
                        </div>
                        @error('email')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                        </div>
                     </form>
                  </div>
              </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-success">Password Update</h3>
                    <form class="forms-sample" action="{{ route('user.password.update') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Current Password</label>
                            <input type="password" class="form-control" name="current_password">
                        </div>
                        @error('current_password')
                            <div class="alert alert-danger  ">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputUsername1">New Password</label>
                            <input type="password" class="form-control" name="new_password">
                        </div>
                        @error('new_password')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputUsername1">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation">
                        </div>
                        @if (session('err'))
                        <div class="alert alert-danger mt-2">{{ session('err') }}</div>
                        @endif
                        @error('password_confirmation')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                        </div>
                     </form>
                  </div>
              </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-success">Photo Update</h3>
                    <form class="forms-sample" action="{{ route('user.photo.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="file" class="form-control" name="photo" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            <img id="blah" width="150" src="" alt="">
                        </div>
                        @error('photo')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                       @enderror
                        <button type="submit" class="btn btn-primary mt-2">Update</button>
                     </form>
                  </div>
              </div>
        </div>
    </div>
</div>
@endsection

{{-- for sweet alert --}}

@section('footer_script')
@if (session('success'))
<script>
    Swal.fire({
    title: "{{ session('success') }}",
    icon: "success"
    });
</script>
@endif

@if (session('exist'))
<script>
    Swal.fire({
    title: "{{ session('exist') }}",
    icon: "danger"
    });
</script>
@endif
@endsection
