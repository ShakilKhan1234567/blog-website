@extends('layouts.admin');
@section('content')
   @if(Auth::user()->role == 1){
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="text-white">Category List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>SL</th>
                                <th>Category Name</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($categories as $sl=>$category)
                            <tr>
                                <td>{{ $sl+1 }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->created_at->diffForHumans() }}</td>
                                <td>
                                    <a title="delete" href="{{ route('category.delete',$category->id) }}" class="btn btn-danger sharp mr-1"><i class="fa fa-trash"></i></a>
                                    <a title="edit" href="{{ route('category.edit',$category->id) }}" class="btn btn-primary shadow sharp mr-1"><i class="fa fa-pencil"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="text-white">Category Add</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.store') }}" method="POST">
                        @csrf
                        <div class="my-2">
                            <label class="form-label">Category Name</label>
                            <input type="text" class="form-control" name="category_name">
                            @error('category_name')
                                <div class="alert alert-success mt-2">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="my-2">
                           <button type="submit" class="btn btn-primary">Category Add</button>
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
