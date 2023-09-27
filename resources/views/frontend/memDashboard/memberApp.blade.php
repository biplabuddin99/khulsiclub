@extends('frontend.app')
@section('content')
<style>
/* Define a gradient background for list items */
.card.sidemenu .nav-item {
  background: linear-gradient(to bottom, #f4f4f4 0%, #eaeaea 100%);
}

/* Style the links inside the list items */
.card.sidemenu .nav-item a.nav-link {
  color: #333; /* Set the text color */
  padding: 10px; /* Add padding to the links for spacing */
  display: block; /* Make links take up the full width of the list item */
  text-decoration: none; /* Remove underlines from links */
}

/* Style the icon (assuming you're using Bootstrap icons) */
.card.sidemenu .nav-item i {
  margin-right: 5px; /* Add space between the icon and the link text */
}



</style>
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
                            <a class="nav-link" href="{{route('member.memdashboard')}}" class="breadcrumb-item router-link-active">Profile</a>
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
        <div class="col-lg-3">
            <div>
                <div class="card sidebar shadow-sm mb-3">
                    <div class="card-header">
                        <div class="user">
                            <div class="userName text-center">
                                <div class="mb-2">
                                    <img src="{{asset('uploads/member_image/thumb/'.encryptor('decrypt', request()->session()->get('image')))}}" alt="">
                                    
                                </div>
                                <h5 class="text-uppercase">{{encryptor('decrypt', request()->session()->get('full_name'))}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card sidemenu shadow-sm mb-3">
                    <div class="card-body p-0">
                        <nav class="navbar navbar-expand-lg navbar-light pb-0 pt-0">
                            <button class="navbar-toggler m-0" type="button" data-bs-toggle="collapse" data-bs-target="#memberNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                                <div id="memberNav" class="navbar-collapse collapse">
                                    <ul class="nav flex-column w-100">
                                        <li class="nav-item"><i class="bi bi-chevron-double-right"></i><a class="nav-link" id="side-1-menu" href="{{route('member.memdashboard')}}">Dashboard</a></li>
                                        <li class="nav-item"><i class="bi bi-chevron-double-right"></i><a class="nav-link" id="side-1-menu" href="{{route('member.approveMember')}}">Personal Information</a></li>
                                        <li class="nav-item"><i class="bi bi-chevron-double-right"></i><a class="nav-link" id="side-1-menu" href="">Payments <span class="down-arrow"><i class="bi bi-chevron-right"></i></span></a>
                                            <ul class="submenu">
                                                <li class="nav-item"></i><a class="nav-link" href="">Account Status</a></li>
                                                <li class="nav-item"></i><a class="nav-link" href="{{route('member.payment_history')}}">Payment History</a></li>
                                                <li class="nav-item"></i><a class="nav-link" href="">Member Due</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item"><i class="bi bi-chevron-double-right"></i><a class="nav-link" id="side-1-menu" href="{{route('member.bank')}}">Bank List</a></li>
                                        <li class="nav-item"><i class="bi bi-chevron-double-right"></i><a class="nav-link" id="side-1-menu" href="{{route('member.request')}}">Change Request</a></li>
                                        <li class="nav-item"><i class="bi bi-chevron-double-right"></i><a class="nav-link" id="side-1-menu" href="{{route('member.help')}}">Online Helpdesk</a></li>
                                        <li class="nav-item"><i class="bi bi-chevron-double-right"></i><a class="nav-link" id="side-1-menu" href="{{route('member.password')}}">Change Password</a></li>
                                        <li class="nav-item"><i class="bi bi-chevron-double-right"></i><a class="nav-link" id="side-5-menu" href="{{route('memberLogOut')}}">Logout</a></li>
                                    </ul>
                                </div>
                            </button>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 px-2 ">

            @yield('memberContent')
        </div>
    </div>
</div>
@endsection