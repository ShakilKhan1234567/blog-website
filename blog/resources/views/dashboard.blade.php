@extends('layouts.admin')

@section('content')
<div class="alert alert-info text-center"><h2>WellCome To Dashboard, <strong class="text-success">{{Auth::user()->name}}</strong></h2></div>
<section>
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-5 m-auto">
                <input type="text" style="height: 100px; padding:0 5px; color:white; font-size:22px" class="form-control text-center bg-info" value="{{ 'Total Blog ='.' '. $blog }}">
            </div>
            <div class="col-lg-5 m-auto">
                <input type="text" style="height: 100px; padding:0 5px; color:white; font-size:22px" class="form-control bg-primary text-center" value="{{ 'Total View ='.' '. $popular }}">
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-5 m-auto">
                <input type="text" style="height: 100px; padding:0 5px; color:white; font-size:22px" class="form-control bg-secondary text-center" value="{{ 'Total User ='.' '. $user }}">
            </div>
            <div class="col-lg-5 m-auto">
                <input type="text" style="height: 100px; padding:0 5px; color:white; font-size:22px" class="form-control bg-danger text-center" value="{{ 'Total Subscriber ='.' '. $subscriber }}">
            </div>
        </div>
    </div>
</section>
@endsection
