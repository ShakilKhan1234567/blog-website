@extends('layouts.admin');
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="text-white">Blog Add</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                           <div class="row">
                            <div class="col-lg-12 mt-3">
                                <label class="form-label">Category</label>
                                <select name="category_id" id="" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <label class="form-label">Blog Title</label>
                                <textarea class="form-control" name="blog_title" cols="30" rows="3"></textarea>
                            </div>
                            @error('blog_title')
                            <div class="alert alert-success mt-2">{{$message}}</div>
                           @enderror
                            <div class=" col-lg-12 mt-3">
                                <label class="form-label">Short Description</label>
                                <textarea class="form-control" name="blog_desp" cols="30" rows="3"></textarea>
                            </div>
                            @error('blog_desp')
                            <div class="alert alert-success mt-2">{{$message}}</div>
                           @enderror
                            <div class=" col-lg-12 mt-3">
                                <label class="form-label">Long Description</label>
                                <textarea class="form-control" name="long_desp" cols="30" rows="5"></textarea>
                            </div>
                            @error('long_desp')
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
                               <button type="submit" class="btn btn-primary">Add Blog</button>
                            </div>
                           </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- sweetalert --}}
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

