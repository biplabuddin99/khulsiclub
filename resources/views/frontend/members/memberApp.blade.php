@extends('frontend.app')
@section('content')
<section class="about-support">
    <span class="shape"></span>
    <span class="shape2"></span>
    <span class="shape3"></span>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="mb-0">Profile</h3>
            </div>
            <div class="col-lg-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-end bg-transparent mb-0">
                        <li class="breadcrumb-item">
                            <a href="" class="breadcrumb-item router-link-active">Profile</a>
                        </li>
                        <li class="breadcrumb-item">data</li>
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
                    <div class="card  py-4 me-4 rounded-10 bg-light">
                        <span class="shape"></span>
                        <span class="shape2"></span>
                        <div class="card-header">
                            <h5>{{encryptor('decrypt', request()->session()->get('userName'))}}</h5>
                        </div>
                        <ul class="sideber-nav flex-culumn ps-3">
                            <li class="nav-item my-2"><a href="{{route('member.profile')}}">Profile Update</a></li>
                            <li class="nav-item my-2"><a href="{{route('member.registration.success')}}">Print Form</a></li>
                            <li class="nav-item my-2"><a href="{{route('member.password')}}">Password Change</a></li>
                            <li class="nav-item my-2"><a href="{{route('memberLogOut')}}">Logout</a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 px-2 ">
            <div class="about-title" id="grad">
                <h6 class="text-uppercase p-1">Profile</h6>
            </div>

            @yield('memberContent')
        </div>
    </div>
</div>
@endsection