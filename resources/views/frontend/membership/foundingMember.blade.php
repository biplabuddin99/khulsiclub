@extends('frontend.app')
@section('content')
<section class="about-support">
    <span class="shape"></span>
    <span class="shape2"></span>
    <span class="shape3"></span>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="mb-0">Founding Committee List</h3>
            </div>
            <div class="col-lg-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-end bg-transparent mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('front')}}" class="breadcrumb-item router-link-active">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="">list</a>
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
                    <div class="card  pb-4 me-4 rounded-10 bg-light">
                        <span class="shape"></span>
                        <span class="shape2"></span>
                        <div class="card-header">
                            <h4>Committee</h4>
                        </div>
                        {{-- <ul class="sideber-nav flex-culumn ps-3">
                            <li class="nav-item my-2"><i class="bi bi-chevron-double-right"></i><a class="nav-link" href="{{route('member.list')}}">Member List</a></li>
                            <li class="nav-item my-2"><i class="bi bi-chevron-double-right"></i><a class="nav-link" href="{{route('memLogin')}}">Member Login</a></li>
                            <li class="nav-item my-2"><i class="bi bi-chevron-double-right"></i><a class="nav-link" href="{{route('member_registration')}}">Become a member</a></li>
                        </ul> --}}
                        <ul class="sideber-nav flex-culumn ps-3">
                        @php 
                            $curl=request()->path();
                            $rows=DB::select("SELECT * from front_menus where parent_id = (select parent_id from front_menus where href='$curl') and status =1 order by rang");
                        @endphp
                            @forelse($rows as $r)
                            <li class="nav-item my-2"><i class="bi bi-chevron-double-right"></i><a class="nav-link" href="{{url($r->href)}}">{{$r->name}}</a></li>
                            @empty
                            @endforelse
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 px-2 ">
            <div class="row py-3">
                <div class="col-lg-12">
                    <div class="card card-body shadow-sm">
                        @forelse ($fondMember as $m)
                        <div class="search-list-item row ">
                            <div class="col-lg-2 align-self-center text-center">
                                <img src="{{asset('uploads/member_image/thumb/'.$m->image)}}" alt="No Image" width="100px">
                            </div>
                            <div class="col-lg-2 text-center border-end ps-0 pe-0">
                                <h1> [{{$m->member_id}}]</h1>
                                <h5>
                                    @if ($m->membership_applied == 1){{'Donor Member'}}
                                    @elseif($m->membership_applied == 2){{'Life Member'}}
                                    @elseif($m->membership_applied == 3){{'Service Member'}}
                                    @elseif($m->membership_applied == 4){{'Temporary Member'}}
                                    @elseif($m->membership_applied == 5){{'Permanent Member'}}
                                    @elseif($m->membership_applied == 6){{'Honorary Member'}}
                                    @elseif($m->membership_applied == 7){{'Corporate Member'}}
                                    @elseif($m->membership_applied == 8){{'Diplomate Member'}}
                                    @endif
                                </h5>
                                @if($m->attach_pdf)
                                {{-- <a href="{{asset('uploads/company_pdf/'.$m->attach_pdf)}}" target="_blank" class="btn-custom text-danger">[PDF Profile]</a> --}}
                                @else
                                {{-- <a href="#" onclick="alert('Sorry!! profile has not uploaded yet')" class="btn-custom text-danger">[PDF Profile]</a> --}}
                                @endif
                            </div>
                            <div class="col-lg-6 align-self-center">
                                <h4><a href="#">{{$m->company}}</a></h4>
                                <p>{{$m->description}}</p>
                            </div>
                            <div class="col-lg-2 align-self-center text-center">
                                <a href="#" class="btn btn-sm btn-outline-explore">More Details</a>
                            </div>
                        </div>
                        @empty
                        <div class="search-list-item row ">
                            <div class="text-center">No Data Found</div>
                        </div>
                        @endforelse
                        <div class="d-flex justify-content-end mt-2">
                            {!! $fondMember->links()!!}
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection