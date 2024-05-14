@extends('layouts.admin');
@section('content')
@if(Auth::user()->role == 1){
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Tag List</h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Tag Name</th>
                            <th>Category Name</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($tags as $sl=>$tag)
                        <tr>
                            <td>{{ $sl+1 }}</td>
                            <td>{{ $tag->tag }}</td>
                            <td>{{ $tag->rel_to_category->category_name }}</td>
                            <td>{{ $tag->created_at->diffForHumans() }}</td>
                            <td>
                                <a title="delete" href="{{ route('delete.tag',$tag->id) }}" class="btn btn-danger my-2"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Add Tag</h3>
                    </div>
                    <div class="card-body">
                       <form action="{{ route('tag.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Select Category</label>
                           <select name="category_id" class="form-control">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                             <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                           </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tag</label>
                            <input type="text" class="form-control" name="tag">
                        </div>
                        @error('tag')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Add Tag</button>
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
