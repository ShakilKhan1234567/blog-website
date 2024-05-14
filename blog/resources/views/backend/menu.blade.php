@extends('layouts.admin');
@section('content')
    @if(Auth::user()->role == 1){
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h3 class="text-white">Menu List</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>SL</th>
                                <th>Menu Link</th>
                                <th>Menu Name</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($menus as $sl=>$menu)
                            <tr>
                                <td>{{ $sl+1 }}</td>
                                <td>{{ $menu->menu_link }}</td>
                                <td>{{ $menu->menu_name }}</td>
                                <td>{{ $menu->created_at->diffForHumans() }}</td>
                                <td>
                                    <a title="delete" href="{{ route('delete.menu', $menu->id) }}" class="btn btn-danger my-2"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h3 class="text-white">Add Menu</h3>
                        </div>
                        <div class="card-body">
                           <form action="{{ route('menu.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Menu Link</label>
                                <input type="text" class="form-control" name="menu_link">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Menu Name</label>
                                <input type="text" class="form-control" name="menu_name">
                            </div>
                            @error('menu_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Add Menu</button>
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
