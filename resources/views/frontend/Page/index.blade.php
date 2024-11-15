@extends('frontend.app')
@section('content')
<section class="about-support d-none d-sm-block">
    <span class="shape"></span>
    <span class="shape2"></span>
    <span class="shape3"></span>
    <div class="container-fluid px-lg-5">
        <div class="row position-relative">
            <div class="col-lg-6">
                <h3 class="mb-0 common-title-of-page">{{$page_data?->page_title}}</h3>
            </div>
            <div class="col-lg-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-end bg-transparent mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('front')}}" class="breadcrumb-item router-link-active">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="">{{$page_data?->page_title}}</a>
                        </li>
                        <li class="breadcrumb-item">data</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<section class="about-support d-sm-none">
    <span class="shape"></span>
    <span class="shape2"></span>
    <span class="shape3"></span>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-center">
                <h3 class="mb-2 common-title-of-page">{{$page_data?->page_title}}</h3>
            </div>
            <div class="col-lg-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-end bg-transparent mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('front')}}" class="breadcrumb-item router-link-active">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="">{{$page_data?->page_title}}</a>
                        </li>
                        <li class="breadcrumb-item">data</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<div class="container-fluid px-lg-5 py-4">
    <div class="row">
        <div class="col-lg-3 mobileview">
            <div class="sidebar-menu vue-affix affix-top ">
                <div class="leftside-menu">
                    <div class="card  pb-4 me-4 rounded-10 shadow border-0">
                        <span class="shape"></span>
                        <span class="shape2"></span>
                        <div class="card-header bg-white">
                            <h5>{{$page_data?->page_title}} </h5>
                        </div>
                        <ul class="sideber-nav flex-culumn fontend-sidebar-nav p-0">
                        @php 
                            $curl=request()->path();
                            $rows=DB::select("SELECT * from front_menus where parent_id = (select parent_id from front_menus where href='$curl' limit 1) and status =1 order by rang");
                        @endphp
                            @forelse($rows as $r)
                                @if($r->href)
                                    <li class="nav-item"><i class="bi bi-chevron-double-right"></i><a class="nav-link" href="{{url($r->href)}}">{{$r->name}}</a></li>
                                @else
                                    <li class="nav-item"><i class="bi bi-chevron-double-right"></i><a class="nav-link" href="#">{{$r->name}}</a></li>
                                @endif
                            @empty
                            @endforelse
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 px-2 custom-page-img d-none d-sm-block">
            <div class="about-title" id="grad">
                <h6 class="text-uppercase p-1">{{$page_data?->page_title}}</h6>
            </div>
            <p class="text-justify">
                {!!$page_data?->details!!}
            </p>
        </div>
        <div class="col-lg-9 px-2 custom-page-img d-sm-none">
            <div class="about-title text-center" id="grad">
                <h6 class="text-uppercase p-1">{{$page_data?->page_title}}</h6>
            </div>
            <p class="text-justify">
                {!!$page_data?->details!!}
            </p>
        </div>
    </div>
</div>
@endsection