@extends('layouts.admin');
@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-lg-12 m-auto">
            <div class="card">
                <div class="card-header bg-primary d-flex justify-content-between">
                    <h3 class="text-white">Blog Edit</h3>
                    <a class="btn btn-info" href="{{ route('blog.list') }}">Blog list</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('blog.update',$blog_id->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                       <div class="row">
                        <div class="col-lg-12 mt-3">
                            <label class="form-label">Category</label>
                            <select name="category_id" id="" class="form-control">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                <option {{ $category->id == $blog_id->category_id?'selected': '' }} value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('category_id')
                        <div class="alert alert-success mt-2">{{$message}}</div>
                       @enderror
                        <div class="col-lg-12 mt-3">
                            <label class="form-label">Blog Title</label>
                            <textarea name="blog_title" class="form-control" cols="30" rows="3">{{ $blog_id->blog_title }}</textarea>
                        </div>
                        @error('blog_title')
                        <div class="alert alert-success mt-2">{{$message}}</div>
                       @enderror
                        <div class=" col-lg-12 mt-3">
                            <label class="form-label">Blog Description</label>
                            <textarea name="blog_desp" class="form-control" cols="30" rows="4">{{ $blog_id->blog_desp }}</textarea>
                        </div>
                        @error('blog_desp')
                        <div class="alert alert-success mt-2">{{$message}}</div>
                       @enderror
                        <div class="col-lg-12 mt-3">
                            <label class="form-label">Blog Image</label>
                            <input type="file" class="form-control" name="blog_image">
                            @error('blog_image')
                                <div class="alert alert-success mt-2">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                           <button type="submit" class="btn btn-primary">Update Blog</button>
                        </div>
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

@if (session('update'))
<script>
    Swal.fire({
    title: "{{ session('update') }}",
    icon: "success"
    });
</script>
@endif

@endsection
