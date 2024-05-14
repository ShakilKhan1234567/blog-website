@extends('frontend.master');
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-8 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h3>Reply List</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('reply.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Reply</label>
                                <input type="hidden" class="form-control" name="comment_id" value="{{ $comment_id->id }}">
                                <input type="text" class="form-control" name="reply">
                            </div>
                            @error('reply')
                            <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            @error('reply')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <button class="btn btn-primary">Submit</button>
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
@endsection
