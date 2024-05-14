@extends('layouts.admin');
@section('content')
    @if(Auth::user()->role == 1)
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-10 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3>Comment List</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>SL</th>
                                <th>User Name</th>
                                <th>Comment</th>
                                <th>Email</th>
                                <th>Commentator Name</th>
                                <th>Date</th>
                            </tr>
                            @foreach ($comments as $sl=>$comment)
                            <tr>
                                <td>{{ $sl+1 }}</td>
                                <td>{{ $comment->name }}</td>
                                <td>{{ $comment->comment }}</td>
                                <td>{{ $comment->email }}</td>
                                <td>{{ $comment->name }}</td>
                                <td>{{ $comment->created_at->format('d-m-Y') }}</td>
                                <td>
                                    <a title="delete" href="{{ route('delete.comment', $comment->id) }}" class="btn btn-danger my-2"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

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
