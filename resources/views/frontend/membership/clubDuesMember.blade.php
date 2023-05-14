@extends('frontend.app')
@section('content')
<section class="about-support">
    <span class="shape"></span>
    <span class="shape2"></span>
    <span class="shape3"></span>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="mb-0">Total Dues</h3>
            </div>
            <div class="col-lg-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-end bg-transparent mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('front')}}" class="breadcrumb-item router-link-active">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="">Total Dues</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<div class="container py-4">
    <div class="row">
        <div class="col-lg-3 mobileview">
            <div class="sidebar-menu vue-affix affix-top ">
                <div class="leftside-menu">
                    <div class="card  pb-4 me-4 rounded-10 bg-light">
                        <span class="shape"></span>
                        <span class="shape2"></span>
                        <div class="card-header">
                            <h4>Member Type</h4>
                        </div>
                        <ul class="sideber-nav flex-culumn ps-3">
                            @php $m=array("","Founder Member","Life Member","Permanent Member","Permanent Terminated Member"); @endphp
                            @forelse ($memberType as $mt)
                            <li class="nav-item my-2"><i class="bi bi-chevron-double-right"></i><a class="nav-link" href="{{route('club_dues_members',$mt->id)}}">{{$m[$mt->member_type]}}</a></li>
                            @empty
                                
                            @endforelse
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 px-2 ">
            <div class="about-title" id="grad">
                <h6 class="text-uppercase p-1">Total Dues</h6>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="member-search">
                        <div class="search-body">
                            <h1>Member Search</h1>
                            <form action="{{ route('club_members_search') }}" method="get">
                                <input type="hidden" name="member_type" value="{{ $slug }}">
                                <div class="searchBox">
                                    <input type="text" value="{{ request()->input('name', '') }}"  name="membership_code" id="search" placeholder="Membership code">
                                    <button type="submit">
                                        <span class="bi bi-search"></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection