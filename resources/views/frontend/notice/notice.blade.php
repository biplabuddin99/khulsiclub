@extends('frontend.app')
@section('pageTitle',trans('Home'))
@section('pageSubTitle',trans('List'))

@section('content')
<section class="facilities-main px-5 d-none d-sm-block pt-3">
    <div class=" text-center5">
        <div class="p-0 justify-content-center bg-white member-section shadow">
          <div class="p-lg-5 p-md-4 rounded shadow">
            <div class="p-1 row">
                <div class="col-12">
                    <div class="mt-3 d-flex notice-div-one">
                        <span class="material-icons me-2"> today </span>
                        <p class="fs-4 mb-1 pt-1">All Notice</p>
                    </div>
                </div>
                <div class="height-300">
                    @forelse ($notice as $n)
                        <div class="notice-title notice-div-two">
                            <p class="mb-0">
                                <a href="{{asset('uploads/notice_image/'.$n->noticefile)}}" class="notice_title" target="_blank">{{$n->title}}</a>
                            </p>
                            <div class="d-flex notice-time">
                                <span class="material-symbols-outlined"> alarm </span>
                                <p class="mb-2">{{date('j F, Y', strtotime($n->published_date))}} </p>
                            </div>
                        </div>
                    @empty
                        <div class="notice-title">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, numquam?</p>
                            <div class="d-flex notice-time">
                                <span class="material-symbols-outlined"> alarm </span>
                                <p class="mb-2">19 January, 2023</p>
                            </div>
                        </div>
                    @endforelse
                        <div class=" my-3">
                            {!! $notice->links()!!}
                        </div>
                </div>
            </div>
          </div>
        </div>
    </div>
</section>
<section class="facilities-main px-2 d-sm-none pt-3">
    <div class=" text-center5">
        <div class="p-0 justify-content-center bg-white member-section shadow">
          <div class="p-lg-5 p-md-4 rounded shadow">
            <div class="p-1 row">
                <div class="col-12">
                    <div class="mt-3 d-flex justify-content-center notice-div-one">
                        <span class="material-icons me-2"> today </span>
                        <p class="fs-4 mb-1 pt-1">All Notice</p>
                    </div>
                </div>
                <div class="height-300">
                    @forelse ($notice as $n)
                        <div class="notice-title text-center notice-div-two">
                            <p class="mb-0">
                                <a href="{{asset('uploads/notice_image/'.$n->noticefile)}}" class="notice_title" target="_blank">{{$n->title}}</a>
                            </p>
                            <div class="d-flex justify-content-center notice-time">
                                <span class="material-symbols-outlined"> alarm </span>
                                <p class="mb-2">{{date('j F, Y', strtotime($n->published_date))}} </p>
                            </div>
                        </div>
                    @empty
                        <div class="notice-title text-center">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, numquam?</p>
                            <div class="d-flex justify-content-center notice-time">
                                <span class="material-symbols-outlined"> alarm </span>
                                <p class="mb-2">19 January, 2023</p>
                            </div>
                        </div>
                    @endforelse
                        <div class=" my-3">
                            {!! $notice->links()!!}
                        </div>
                </div>
            </div>
          </div>
        </div>
    </div>
</section>
@endsection