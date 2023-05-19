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
                            {{-- @php $member=array("","Founder Member","Life Member","Permanent Member","Permanent Terminated Member"); @endphp --}}
                            
                            <li class="nav-item my-2"><i class="bi bi-chevron-double-right"></i><a class="nav-link" href="{{route('club_dues')}}?slug=1">Founder Member</a></li>
                            <li class="nav-item my-2"><i class="bi bi-chevron-double-right"></i><a class="nav-link" href="{{route('club_dues')}}?slug=2">Life Member</a></li>
                            <li class="nav-item my-2"><i class="bi bi-chevron-double-right"></i><a class="nav-link" href="{{route('club_dues')}}?slug=3">Permanent Member</a></li>
                            <li class="nav-item my-2"><i class="bi bi-chevron-double-right"></i><a class="nav-link" href="{{route('club_dues')}}?slug=4">Permanent Terminated Member</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 px-2 ">
            <div class="about-title" id="grad">
                <h6 class="text-uppercase p-1">Total Dues</h6>
            </div>
            <div class="row justify-content-center mb-4">
                <div class="col-lg-7">
                    <div class="member-search">
                        <div class="search-body">
                            <h1>Member Search</h1>
                            <form action="" method="get">
                                <input type="hidden" name="member_type" value="{{ request()->input('member_type', '') }} {{ isset($_GET['slug'])?$_GET['slug']:'' }}">
                                <div class="searchBox">
                                    <input type="text" value="{{ request()->input('membership_code', '') }}"  name="membership_code" placeholder="Membership code">
                                    <button type="submit">
                                        <span class="bi bi-search"></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @php $mt=array("","Founder Member","Life Member","Permanent Member","Permanent Terminated Member"); @endphp
                @if ($members)
                <div class="col-lg-5">
                    <div class="card company-info shadow-sm mb-3">
                        <div class="card-header">
                            <h5>Member Information</h5>
                        </div>
                        <div class="card-body" style="min-height:290px;">
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <th width="40">Name</th>
                                    <td width="2">:</td>
                                    <td width="58">{{$members->member_name}}</td>
                                </tr>
                                <tr>
                                    <th width="40">Member Type</th>
                                    <td width="2">:</td>
                                    <td width="58">{{$mt[$members->member_type]}}</td>
                                </tr>
                                <tr>
                                    <th width="40">Membership Code</th>
                                    <td width="2">:</td>
                                    <td width="58">{{$members->membership_code}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="card company-info shadow-sm mb-3">
                        <div class="card-header" >
                            <h5>Total Dues</h5>
                        </div>
                        <div class="card-body" style="min-height:290px;">
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <th width="40">2016</th>
                                    <td width="2">:</td>
                                    <td width="58">{{$members->y2016}}</td>
                                </tr>
                                <tr>
                                    <th width="40">2017</th>
                                    <td width="2">:</td>
                                    <td width="58">{{$members->y2017}}</td>
                                </tr>
                                <tr>
                                    <th width="40">2018</th>
                                    <td width="2">:</td>
                                    <td width="58">{{$members->y2018}}</td>
                                </tr>
                                <tr>
                                    <th width="40">2019</th>
                                    <td width="2">:</td>
                                    <td width="58">{{$members->y2019}}</td>
                                </tr>
                                <tr>
                                    <th width="40">2020</th>
                                    <td width="2">:</td>
                                    <td width="58">{{$members->y2020}}</td>
                                </tr>
                                <tr>
                                    <th width="40">2021</th>
                                    <td width="2">:</td>
                                    <td width="58">{{$members->y2021}}</td>
                                </tr>
                                <tr>
                                    <th width="40">31th Dec"2020"</th>
                                    <td width="2">:</td>
                                    <td width="58">{{$members->y2020}}</td>
                                </tr>
                                <tr>
                                    <th width="40">31th Mar"2021"</th>
                                    <td width="2">:</td>
                                    <td width="58">{{$members->y2021}}</td>
                                </tr>
                                <tr>
                                    <th width="40">31th Aug"2021"</th>
                                    <td width="2">:</td>
                                    <td width="58">{{$members->y2021}}</td>
                                </tr>
                                <tr>
                                    <th width="40">10% interest in subscription</th>
                                    <td width="2">:</td>
                                    <td width="58">{{$members->subscription_interest}}</td>
                                </tr>
                                <tr>
                                    <th width="40">Land Development Fee Dues</th>
                                    <td width="2">:</td>
                                    <td width="58">{{$members->land_developmnet_fee}}</td>
                                </tr>
                                <tr>
                                    <th width="40">10% Interest in Subscription & Land Fee</th>
                                    <td width="2">:</td>
                                    <td width="58">{{$members->land_interest}}</td>
                                </tr>
                                <tr>
                                    <th width="40" colspan="3"><hr></th>
                                </tr>
                                <tr>
                                    <th width="40">Total Dues</th>
                                    <td width="2">:</td>
                                    <td width="58">{{ ($members->y2017 + $members->y2018 + $members->y2019 + $members->y2020 + $members->subscription_interest + $members->land_interest) }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                @else
                    <div class="text-center mt-4">
                        <h4>No Data Found</h4>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection