@extends('layouts.admin');
@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-lg-6 m-auto">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="text-white">Category Edit</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.update',$category_info->id) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Category Name</label>
                            <input type="text" name="category_name" class="form-control" value="{{ $category_info->category_name }}">
                        </div>
                        @error('category_name')
                        <div class="alert alert-success mt-2">{{$message}}</div>
                       @enderror
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer_script')
@if (session('success'))
<script>
    Swal.fire({
    title: "{{ session('success') }}",
    icon: "success"
    });
</script>
@endif
@endsection
