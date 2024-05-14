@extends('layouts.admin');
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-8 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h3>Single Comment</h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Commentar Name</th>
                            <th>Comment</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td>{{ $comments->name }}</td>
                            <td>{{ $comments->comment }}</td>
                            <td>{{ $comments->created_at->diffForHumans() }}</td>
                            <td>
                                <a title="delete" href="" class="btn btn-danger my-2"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    </table>
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
