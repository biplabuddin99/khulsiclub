@php $setting=\App\Models\setting::first(); @endphp
<!DOCTYPE html>
<html lang="en" style="overflow-x: hidden">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>CKCL | @yield('pageTitle')</title>
    <!-- Bootstrap 5.2 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet" />
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Kolker+Brush&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <!-- google icon -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"
    />
    <!-- Bootsrap icon -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
    />
    <!--OWL CSS-->
    <!-- Basic stylesheet -->
    <link rel="stylesheet" href="{{ asset('OwlCarousel2-2.3.4/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('OwlCarousel2-2.3.4/assets/owl.theme.default.min.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/main.css')}}?id=1" />
      {{-- choice css --}}
  <link rel="stylesheet" href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.css') }}">
  <style>
    .choices__list--dropdown .choices__item--selectable {
        padding-right: 0;
    }
</style>
    @stack('styles')
    <script async defer src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=221303001015879"></script>
  {{-- tostr css --}}
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"> --}}
  <link rel="stylesheet" href="{{ asset('/assets/extensions/laravel-toster/toastr.min.css') }}">
  </head>
  <body>
  <!-- header section -->
  <header class="bg-white ">
    <div class="container">
      <div class="row">
        <div class="col-sm-4 col-10 logo-sec">
          <a href="{{route('front')}}"><img src="{{asset('uploads/settings/header_logo/'.$setting?->header_logo)}}" alt="" class="mw-100" /></a>
        </div>

        <div class="col-sm-8 col-2 header-right">
            
          <div style="font-size: 10.1pt; " class="d-flex justify-content-end d-none d-md-flex scicon">
            <a class="pt-2" href="#"><i class="bi bi-facebook"></i></a>
            <a class="pt-2" href="#"><i class="bi bi-twitter"></i></a>
            <a class="pt-2" href="#"><i class="bi bi-linkedin"></i></a>
            <a class="pt-2" href="#"><i class="bi bi-youtube"></i></a>

            <a  id="text-right-dec" href="{{route('memLogin')}}">Member Login</a>
            <a href="{{route('member_registration')}}" class="become-member">Become a Member</a>
          </div>
          
          <div class="row d-none d-sm-block">
            <div class="col-sm-12 col-12 d-flex justify-content-end desktop-menu" >
              
              <nav class="navbar navbar-expand-md navbar-light pb-0">
                {{-- <button class="navbar-toggler text-danger" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="bi bi-list"></i>
                </button> --}}
              
                <div style="margin-top: 6px;" class="collapse navbar-collapse navbar-collapse-top" id="navbarNav">
                  
                  @php $rows = DB::table('front_menus')->where('parent_id',0)->where('status',1)->orderBy("rang");
                      $flcount=$rows->count();
                  @endphp
                  <ul class="navbar-nav md-screen mr-auto pb-2">
                    @forelse($rows->get() as $i=>$mf)
                      @php $rows_second = DB::select("SELECT * FROM front_menus WHERE parent_id='{$mf->id}' and status='1' ORDER BY rang"); @endphp
                      
                        @if($rows_second) 
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle nav_a_padding " href="{{$mf->href?url($mf->href):'#'}}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="">{{$mf->name}}</span>
                            @if($i==0)
                              {{-- <button class="float-end  d-block d-sm-none home-menu-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
                                ×
                              </button> --}}
                            @endif
                          </a>

                          <div style="width:{{200*count($rows_second)}}px" class="dropDown rowsecond{{$i}} dropdown-menu mega-menu shadow megamenu-lg @if($flcount>5 && $i<=1) left-position @else right-position @endif" aria-labelledby="navbarDropdown">
                            <div class="row m-0">
                              @foreach($rows_second as $ms)
                                @php $rows_third = DB::select("SELECT * FROM front_menus WHERE parent_id='{$ms->id}' and status='1' ORDER BY rang"); @endphp
                                @if($rows_third)
                                  <div class="col-sm pe-0 ">
                                    <ul class="ps-2">
                                        <h4 class="menu-head">
                                          <a href="{{$ms->href?url($ms->href):'#'}}">{{$ms->name}}</a>
                                        </h4>
                                        @foreach($rows_third as $mt)
                                          <li class="subMenu"><a href="{{$mt->href?url($mt->href):'#'}}"><span><i class="bi bi-chevron-double-right"></i></span> {{$mt->name}}</a></li>
                                        @endforeach
                                    </ul>
                                  </div>
                                @else
                                  <script>
                                    document.getElementsByClassName('rowsecond{{$i}}')[0].style.width='170px';
                                  </script>
                                  <ul class="ps-2">
                                    <li class="subMenu"><a href="{{$ms->href?url($ms->href):'#'}}"><span><i class="bi bi-chevron-double-right"></i></span> {{$ms->name}}</a></li>
                                  </ul>
                                @endif
                              @endforeach
                            </div>
                          </div>
                        </li>
                        @else

                          <li class="nav-item menu-li-border">
                            <a class="nav-link nav_a_padding" href="{{$mf->href?url($mf->href):'#'}}"><span class="">{{$mf->name}}</span>
                              @if($i==0)
                              {{-- <button class="float-end  d-block d-sm-none home-menu-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
                                ×
                              </button> --}}
                              @endif
                            </a>
                          </li>
                        @endif
                      @empty
                        <li class="nav-item d-flex d-sm-none">
                          <a class="nav-link nav_a_padding" href="">Member Login</a>
                        </li>
                        <li class="nav-item d-flex d-sm-none">
                          <a class="nav-link nav_a_padding" href="">Become a Member</a>
                        </li>
                      @endforelse
                    </ul>
                </div>
              </nav>
            </div>
            <!-- <div class="col-sm-4 d-none d-sm-flex d-flex justify-content-end mt-4">
              <div class="social-icon">
                <i class="bi bi-facebook"></i>
                <i class="bi bi-twitter"></i>
                <i class="bi bi-linkedin"></i>
                <i class="bi bi-youtube"></i>
              </div>
            </div> -->
          </div>
          <div class="row d-sm-none">
            <div class="col-sm-12 col-12 d-flex justify-content-end mobile-menu" >
              
              <nav class="navbar navbar-expand-md navbar-light pb-0">
                <button class="navbar-toggler text-danger" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="bi bi-list"></i>
                </button>
              
                <div style="margin-top: 6px;" class="collapse navbar-collapse navbar-collapse-top small-view" id="navbarNav">
                  
                  @php $rows = DB::table('front_menus')->where('parent_id',0)->where('status',1)->orderBy("rang");
                      $flcount=$rows->count();
                  @endphp
                  <ul class="navbar-nav md-screen mr-auto pb-2">
                    <div class="text-center d-lg-none d-md-none" style=" border-bottom: solid 1px; border-color:rgb(250, 210, 210); background:linear-gradient(190deg, rgb(250, 210, 210) 80%, #fff 0%); padding-top: 50px; padding-bottom: 50px;">
                      <a href="{{route('front')}}"><img src="{{asset('img/khlogo3.png')}}" width="80px" alt="" /></a>
                    </div>
                    @forelse($rows->get() as $i=>$mf)
                      @php $rows_second = DB::select("SELECT * FROM front_menus WHERE parent_id='{$mf->id}' and status='1' ORDER BY rang"); @endphp
                      
                        @if($rows_second) 
                        <li class="nav-item dropdown menu-li-border py-2">
                          <img class="d-lg-none d-sm-block ps-2 pb-1" src="{{asset('uploads/menu_image/'.$mf->menu_icon)}}" width="30px" alt="">
                          <a class="nav-link dropdown-toggle nav_a_padding " href="{{$mf->href?url($mf->href):'#'}}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="">{{$mf->name}}</span>
                            @if($i==0)
                              {{-- <button class="float-end  d-block d-sm-none home-menu-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
                                ×
                              </button> --}}
                            @endif
                          </a>

                          <div style="width:{{200*count($rows_second)}}px" class="dropDown rowsecond{{$i}} dropdown-menu mega-menu megamenu-lg megamenu-small @if($flcount>5 && $i<=1) left-position @else right-position @endif" aria-labelledby="navbarDropdown">
                            <div class="row m-0 megamenu-small-align">
                              @foreach($rows_second as $ms)
                                @php $rows_third = DB::select("SELECT * FROM front_menus WHERE parent_id='{$ms->id}' and status='1' ORDER BY rang"); @endphp
                                @if($rows_third)
                                  <div class="col-sm pe-0 ">
                                    <ul class="ps-2">
                                        <h4 class="menu-head">
                                          <a href="{{$ms->href?url($ms->href):'#'}}">{{$ms->name}}</a>
                                        </h4>
                                        @foreach($rows_third as $mt)
                                          <li class="subMenu"><a href="{{$mt->href?url($mt->href):'#'}}"><span><i class="bi bi-chevron-double-right"></i></span> {{$mt->name}}</a></li>
                                        @endforeach
                                    </ul>
                                  </div>
                                @else
                                  <script>
                                    document.getElementsByClassName('rowsecond{{$i}}')[0].style.width='170px';
                                  </script>
                                  <ul class="ps-2">
                                    <li class="subMenu"><a href="{{$ms->href?url($ms->href):'#'}}"><span><i class="bi bi-chevron-double-right"></i></span> {{$ms->name}}</a></li>
                                  </ul>
                                @endif
                              @endforeach
                            </div>
                          </div>
                        </li>
                        @else

                          <li class="nav-item menu-li-border py-2">
                            <img class="d-lg-none d-sm-block ps-2 pb-1" src="{{asset('uploads/menu_image/'.$mf->menu_icon)}}" width="30px" alt="">
                            <a class="nav-link nav_a_padding" href="{{$mf->href?url($mf->href):'#'}}"><span class="">{{$mf->name}}</span>
                              @if($i==0)
                              {{-- <button class="float-end  d-block d-sm-none home-menu-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
                                ×
                              </button> --}}
                              @endif
                            </a>
                          </li>
                        @endif
                      @empty
                        <li class="nav-item d-flex d-sm-none">
                          <a class="nav-link nav_a_padding" href="">Member Login</a>
                        </li>
                        <li class="nav-item d-flex d-sm-none">
                          <a class="nav-link nav_a_padding" href="">Become a Member</a>
                        </li>
                      @endforelse
                    </ul>
                </div>
              </nav>
            </div>
            <!-- <div class="col-sm-4 d-none d-sm-flex d-flex justify-content-end mt-4">
              <div class="social-icon">
                <i class="bi bi-facebook"></i>
                <i class="bi bi-twitter"></i>
                <i class="bi bi-linkedin"></i>
                <i class="bi bi-youtube"></i>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="main">
    @yield('content')
  </div>
    

  <!--  support -->
  <section class="support justify-content-center d-none d-sm-block">
    <div class="container">
      <div class="row">
        <div class="col-md-4 d-flex justify-content-center text-1">
          <i class="bi bi-headset my-auto"></i>
          <p class="my-auto ">{{ $setting?->footer_top_p1_text }}</p>
        </div>
        <div class="col-md-4 d-flex text-center justify-content-between my-3 py-3 py-sm-0 text-2">
          <p class="my-auto py-sm-2 py-md-2 w-100 text-center" id="support-number">{{ $setting?->footer_top_p2_text }}</p>
        </div>
        <div class="col-md-4 d-flex justify-content-center text-3">
          <p class="my-auto">{{ $setting?->footer_top_p3_text }}</p>
        </div>
      </div>
    </div>
  </section>
  {{-- This support section is for small view start --}}
  <section class="support justify-content-center d-sm-none">
    <div class="container-fluid px-0">
      <div class="row mx-0">
        <div class="col-md-4 px-0 d-flex justify-content-center text-1">
          <i class="bi bi-headset my-auto"></i>
          <p class="my-auto " style="font-size: 15px !important;">{{ $setting?->footer_top_p1_text }}</p>
        </div>
        <div class="col-md-4 px-0 d-flex text-center justify-content-between my-0 py-0 text-2">
          <p class="my-auto py-sm-2 py-md-0 w-100 text-center" id="support-number" style="font-size: 15px !important;">{{ $setting?->footer_top_p2_text }}</p>
        </div>
        <div class="col-md-4 px-0 d-flex justify-content-center text-3">
          <p class="my-auto" style="font-size: 15px !important;">{{ $setting?->footer_top_p3_text }}</p>
        </div>
      </div>
    </div>
  </section>
    {{-- This support section is for small view end --}}
  <!--  support ends -->
  <!-- footer -->
  <footer class="position-relative">
    <div class="footer">
      <div class="container-fluid px-lg-5">
        <div class="footer-logo">
          <img src="{{asset('uploads/settings/footer_logo/'.$setting?->footer_logo)}}" alt="" />
        </div>
        <div class="row footer-nav">
          <div class="col-sm-4 d-sm-none text-center">
            <h4 class="title-heading">Contact Us</h4>
            <div class="contact text-start">
              <span class="d-flex ">
                <i class="bi bi-geo-alt-fill"></i>
                <p class="ps-1">{{ $setting?->address }}</p>
              </span>
              <span class="d-flex ">
                <i class="bi bi-telephone-fill"></i>
                <p class="ps-2">{{ $setting?->contact_no }}</p>
              </span>
              <span class="d-flex ">
                <i class="bi bi-envelope-fill"></i>
                <p class="ps-2">{{ $setting?->email_address }}</p>
              </span>
            </div>
            <h4 class="mt-4 mb-2 title-heading">Connect With Us</h4>
            <div class="social-icon">
              <a href="{{ $setting?->facebook_link }}"><i class="bi bi-facebook ms-0 ps-0"></i></a>
              <a href="{{ $setting?->twitter_link }}"><i class="bi bi-twitter ms-0 ps-0"></i></a>
              <a href="{{ $setting?->linkdin_link }}"><i class="bi bi-linkedin ms-0 ps-0"></i></a>
              <a href="{{ $setting?->youtube_link }}"><i class="bi bi-youtube ms-0 ps-0"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 d-none d-sm-block">
            <h6 class="title-heading">Contact Us</h6>
            <div class="contact">
              <span class="d-flex">
                <i class="bi bi-geo-alt-fill"></i>
                <p>{{ $setting?->address }}</p>
              </span>
              <span class="d-flex">
                <i class="bi bi-telephone-fill"></i>
                <p>{{ $setting?->contact_no }}</p>
              </span>
              <span class="d-flex">
                <i class="bi bi-envelope-fill"></i>
                <p>{{ $setting?->email_address }}</p>
              </span>
            </div>
            <h4 class="mt-4 mb-2 title-heading">Connect With Us</h4>
            <div class="social-icon">
              <a href="{{ $setting?->facebook_link }}"><i class="bi bi-facebook ms-0 ps-0"></i></a>
              <a href="{{ $setting?->twitter_link }}"><i class="bi bi-twitter ms-0 ps-0"></i></a>
              <a href="{{ $setting?->linkdin_link }}"><i class="bi bi-linkedin ms-0 ps-0"></i></a>
              <a href="{{ $setting?->youtube_link }}"><i class="bi bi-youtube ms-0 ps-0"></i></a>
            </div>
          </div>
          <div class="col-sm-8 col-lg-8 col-md-8 justify-content-end">
            <iframe
              class="container-fluid footer-ifram"
              src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7379.432700144819!2d91.7877768!3d22.3643367!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acd9835bc79051%3A0xb69949986154c96c!2sChittagong%20Khulshi%20Club%20Limited!5e0!3m2!1sen!2sbd!4v1672998016439!5m2!1sen!2sbd"
              width="700"
              height="293"
              style="border: 0; padding:0px"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
          </div>
        </div>
        <hr />
        <div class="row">
          <div class="col-12">
            <img class="img-fluid" src="{{asset('images/weaccept.jpeg')}}" width="100%" alt="image" />
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-5 copyright">
            <p>&copy copyright 2023 CKCL</p>
          </div>
          {{-- <div class="col-sm-12 col-md-12 col-lg-4 d-flex payment-img">
            <p>We Accept</p>
            <img class="img-fluid" src="{{asset('uploads/settings/we_accept_1/'.$setting?->footer_top_p1_image)}}" alt="" />
            <img class="img-fluid" src="{{asset('uploads/settings/we_accept_2/'.$setting?->footer_top_p2_image)}}" alt="" />
            <img class="img-fluid" src="{{asset('uploads/settings/we_accept_3/'.$setting?->footer_top_p3_image)}}" alt="" />
          </div> --}}
          <div class="col-sm-12 col-md-12 col-lg-7 mt-2 mb-2 developer">
            Developed By :Texture Software Technology Ltd
          </div>
        </div>
      </div>
    </div>
    <!-- overlay circle -->
    <div class="footer-circle1"></div>
    <div class="footer-circle2"></div>
    <div class="footer-top-overlay"></div>
  </footer>

  <!-- footer end -->
  <!-- Boostrap 5.2 link -->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"
  ></script>
<script src="{{ asset('/assets/extensions/choices.js/public/assets/scripts/choices.min.js')}}"></script>
<script src="{{ asset('/assets/js/pages/form-element-select.js')}}"></script>
  <script>
    // Toggle icon on show.bs.collapse and hide.bs.collapse events
    document.addEventListener('DOMContentLoaded', function () {
      var toggleButton = document.querySelector('.navbar-toggler');
      var collapseElement = document.querySelector('.navbar-collapse');
  
      collapseElement.addEventListener('show.bs.collapse', function () {
        // Change icon to 'X' when the navbar is collapsing
        toggleButton.innerHTML = '<i class="bi bi-x"></i>';
      });
  
      collapseElement.addEventListener('hide.bs.collapse', function () {
        // Change icon to 'list' when the navbar is expanding
        toggleButton.innerHTML = '<i class="bi bi-list"></i>';
      });
    });
  </script>
  <script src="https://unpkg.com/scrollreveal"></script>
  <script>
      ScrollReveal({ 
        reset: true ,
        distance: '60px',
        duration: 800,
        delay: 200
      });
      ScrollReveal().reveal('.support .text-1', { delay: 200, origin: 'left' });
      ScrollReveal().reveal('.support .text-2', { delay: 200, origin: 'top' });
      ScrollReveal().reveal('.support .text-3', { delay: 200, origin: 'right' });
  </script>


    
    <!-- owl js -->
    <script src="{{ asset('OwlCarousel2-2.3.4/vendors/jquery.min.js')}}"></script>
    <script src="{{ asset('OwlCarousel2-2.3.4/owl.carousel.min.js')}}"></script>
    <!-- My JS -->
    <script src="{{ asset('js/app.js')}}?id=1"></script>
    
  {{-- tostr css --}}
  <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

  {{-- <script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script> --}}
  <script src="{{ asset('/assets/extensions/laravel-toster/toastr.min.js') }}"></script>
  {!! Toastr::message() !!}

    @stack('scripts')
  </body>
</html>
