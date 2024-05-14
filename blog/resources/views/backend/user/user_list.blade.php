@extends('layouts.admin');
@section('content')
@if(Auth::user()->role == 1){
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>User List Info</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($users as $sl=>$user)
                            <tr>
                                <td>{{ $sl+1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>

                                    <a title="delete" href="" class="btn btn-danger  btn-xs sharp mr-1"><i class="fa fa-trash"></i></a>
                                    <a title="edit" href="" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
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

