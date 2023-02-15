@extends('frontend.app')
@section('pageTitle',trans('Home'))
@section('pageSubTitle',trans('List'))

@section('content')
<section class="facilities-main px-5 pt-3">
      <div class="facilities text-center5">
        <!-- Gallery end -->
        <!-- member reg. start -->
        <div class="container p-0 justify-content-center bg-light member-section shadow">
        <!-- <span class="bubble1"></span>
        <span class="bubble2"></span>
        <span class="bubble3"></span>
        <span class="bubble4"></span>
        <span class="bubble5"></span> -->
          <div class="p-5 rounded shadow">
            <div class="row member-inner">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <p>Benefits of Members</p>
                <ul class="navbar-nav">
                  @forelse ($benefit as $b)
                    <li class="nav-item">
                      <i class="bi bi-caret-right-fill"></i> <span>{{$b->benefit}}</span>
                    </li>
                  @empty
                    <li class="nav-item">
                        <i class="bi bi-caret-right-fill"></i> <span>Advocacy for Software & ITES</span>
                    </li>
                  @endforelse
                </ul>
              </div>
              <!-- <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                <p>Become a Member</p>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                <a class="shadow" href="{{route('member.registration')}}">Apply Now</a>
              </div> -->
            </div>
          </div>
        </div>
        <!-- member reg. end -->
      </div>
    </section>
<!-- // Basic multiple Column Form section end -->
    @endsection