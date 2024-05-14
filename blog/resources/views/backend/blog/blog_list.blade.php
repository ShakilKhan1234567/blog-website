@extends('layouts.admin');
@section('content')
@if(Auth::user()->role == 1){
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="text-white">Blog List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>SL</th>
                                <th>Category</th>
                                <th>Blog Title</th>
                                <th>Blog Desp</th>
                                <th>Long Desp</th>
                                <th>Blog Photo</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($blogs as $sl=>$blog)
                            <tr>
                                <td>{{ $blogs->firstitem()+$sl }}</td>
                                <td>{{ $blog->rel_to_category->category_name }}</td>
                                <td>{{ $blog->blog_title }}</td>
                                <td>{{ $blog->blog_desp }}</td>
                                <td>{{ $blog->long_desp }}</td>
                                <td><img width="100" src="{{ asset('uploads/blog') }}/{{ $blog->blog_image }}" alt=""></td>
                                <td>
                                    <a title="delete" href="{{ route('delete.blog',$blog->id) }}" class="btn btn-danger my-2"><i class="fa fa-trash"></i></a>
                                    <a title="edit" href="{{ route('edit.blog',$blog->id) }}" class="btn btn-primary shadow"><i class="fa fa-pencil"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    {{ $blogs->links() }}
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





