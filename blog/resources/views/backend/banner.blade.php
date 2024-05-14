@extends('layouts.admin');
@section('content')
    @if(Auth::user()->role == 1){
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h3 class="text-white">Banner List</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>SL</th>
                                <th>Category Name</th>
                                <th>Banner Title</th>
                                <th>Banner Desp</th>
                                <th>Banner Photo</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($banners as $sl=>$banner)
                            <tr>
                                <td>{{ $sl+1 }}</td>
                                <td>{{ $banner->rel_to_category->category_name }}</td>
                                <td>{{ $banner->banner_title }}</td>
                                <td>{{ $banner->banner_desp }}</td>
                                <td><img width="100" src="{{ asset('uploads/banner/') }}/{{ $banner->banner_photo }}" alt="bn"></td>
                                <td><a href="{{ route('banner.status',$banner->id )}}" class="btn btn-{{ $banner->status == 1?'primary':'secondary' }}">{{ $banner->status == 1?'ON':'OFF' }}</a></td>
                                <td>
                                    <a title="delete" href="{{ route('delete.banner',$banner->id) }}" class="btn btn-danger my-2"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h3 class="text-white">Add Banner</h3>
                        </div>
                        <div class="card-body">
                           <form action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Category</label>
                                <select name="category_id" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                            <div class="mb-3">
                                <label class="form-label">Banner Title</label>
                                <input type="text" class="form-control" name="banner_title">
                            </div>
                            @error('banner_title')
                            <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                            <div class="mb-3">
                                <label class="form-label">Banner Desp</label>
                                <input type="text" class="form-control" name="banner_desp">
                            </div>
                            @error('banner_desp')
                            <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                            <div class="mb-3">
                                <label class="form-label">Banner Photo</label>
                                <input type="file" class="form-control" name="banner_photo">
                            </div>
                            @error('banner_photo')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Add Banner</button>
                            </div>
                           </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    }
    @else
    <h3 class="text-center mt-5 text-danger">You do not have permission to see this page</h3>
 @endif
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
