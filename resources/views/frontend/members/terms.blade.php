@extends('frontend.app')
@section('content')
<div class="container-fluid px-lg-5 py-4 d-none d-sm-block">
    <div class="row">
        <div class="col-lg-12 px-2 ">
            <div class="about-title" id="grad">
                <h6 class="text-uppercase p-1">{{$terms->title}}</h6>
            </div>
            <p class="text-justify">
                {!! $terms->terms_and_condition !!}
            </p>
        </div>
    </div>
</div>
<div class="container py-4 d-sm-none">
    <div class="row">
        <div class="col-lg-12 px-2 ">
            <div class="about-title text-center" id="grad">
                <h6 class="text-uppercase p-1">{{$terms->title}}</h6>
            </div>
            <p class="text-justify">
                {!! $terms->terms_and_condition !!}
            </p>
        </div>
    </div>
</div>
@endsection