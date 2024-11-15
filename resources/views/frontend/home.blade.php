@extends('frontend.app')
@section('pageTitle',trans('Home'))
@section('pageSubTitle',trans('List'))

@section('content')
<style>
.news-ticker {
    overflow: hidden;
    width: 98%;
    background-color: #f8f9fa;
    padding: 10px 0;
    box-sizing: border-box;
    position: relative;
}

#scroll-list {
    display: flex;
    padding: 0;
    margin: 0;
    list-style: none;
    animation: scroll linear infinite;
    animation-play-state: running;
}
#scroll-image {
    display: flex;
    padding: 0;
    margin: 0;
    list-style: none;
    animation: scroll linear infinite;
    animation-play-state: running;
}
#scroll-image-mobile {
    display: flex;
    padding: 0;
    margin: 0;
    list-style: none;
    animation: scroll linear infinite;
    animation-play-state: running;
}

.news-ticker li {
    flex-shrink: 0;
    padding: 0 20px;
    white-space: nowrap;
}

@keyframes scroll {
    from {
        transform: translateX(100%);
    }
    to {
        transform: translateX(calc(-100% - var(--total-width)));
    }
}

.news-ticker:hover #scroll-list {
    animation-play-state: paused;
}
.news-ticker:hover #scroll-image {
    animation-play-state: paused;
}
.news-ticker:hover #scroll-image-mobile {
    animation-play-state: paused;
}
</style>
    <!-- slider -->
    <section class="slider">
      <div id="sliderDiv"  class="carousel slide" data-interval="3000"  data-bs-ride="carousel">
        <div class="carousel-indicators">
          @forelse ($slider as $slide)
          <button type="button" data-bs-target="#sliderDiv"
            data-bs-slide-to="{{$loop->index}}"
            class="{{$loop->index==0?'active':''}}"
            {{$loop->index==0?'aria-current="true"':''}}
            aria-label="Slide {{++$loop->index}}">
          </button>
          @empty
          <button type="button" data-bs-target="#sliderDiv" data-bs-slide-to="0"
            class="active" aria-current="true" aria-label="Slide 1">
          </button>
          @endforelse
        </div>
        <div class="carousel-inner">
            @forelse ($slider as $slide)
              <div class="carousel-item {{$loop->index==0?'active':''}}">
                    <img
                    src="{{asset('uploads/Slide_image/thumb/'.$slide->image)}}"
                    class="d-block w-100 slider-img" alt="..." />
              </div>
            @empty
            <div class="carousel-item active">
              <img src="{{ asset('img/slider2.jpg')}}" class="d-block w-100 slider-img" alt="..." />
            </div>
            @endforelse
        </div>
        <button class="carousel-control-prev d-none d-sm-block" type="button" data-bs-target="#sliderDiv"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next d-none d-sm-block" type="button" data-bs-target="#sliderDiv"
          data-bs-slide="next" >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <div class="news-ticker">
          <ul id="scroll-list">
              @forelse ($scroll_notice as $sn)
                  <li><p>{{$sn->text}}</p></li>
              @empty
              @endforelse
          </ul>
      </div>
    </section>
    <!-- slider end -->
    {{-- founding member --}}
    <div class="memberdiv">
      <div class="our-members member-background">
        <section class="container-fluid px-5 pb-lg-1  d-none d-sm-block">
          {{-- <div class="our-members">
          </div> --}}
          <h4 class="animate-title title-heading my-4">
            <a href="{{route('foundmember.list')}}" style="text-decoration: none; color:#e12a31;">Founding Executive Commitee</a>
            </h4>
          <div class="row">
            <div class="col-12 item pe-3 ps-3">
              <div class="news-ticker">
                <ul class="m-0" id="scroll-image">
                  @forelse ($foundMember as $fm)
                    @if($fm->image != '')
                      <li class="px-2">
                        <img src="{{asset('uploads/member_image/'.$fm->image)}}" alt="No Photos" style="width:3cm; height: 4cm; object-fit: cover;">
                      </li>
                    @endif
                  @empty
                  @endforelse
                </ul>
              </div>
            </div>
          </div>
        </section>
        {{-- This section is for small view start --}}
        <section class="container-fluid-fluid pb-2  d-sm-none">
          <h4 class="animate-title title-heading mb-3" style="font-size: 32px !important;">
            <a href="{{route('foundmember.list')}}" style="text-decoration: none; color:#e12a31;">Founding Executive Commitee</a>
          </h4>
          <div class="row">
            <div class="col-12 item pe-3 ps-3">
              <div class="news-ticker">
                <ul class="m-0" id="scroll-image-mobile">
                  @forelse ($foundMember as $fm)
                    <li class="px-2">
                      <img src="{{asset('uploads/member_image/'.$fm->image)}}" alt="No Photos" style="width:3cm; height: 4cm; object-fit: cover;">
                    </li>
                  @empty
                  @endforelse
                </ul>
              </div>
            </div>
          </div>
        </section>
        {{-- This section is for small view end --}}
      </div>
    </div>
    {{-- founding member --}}
    <!-- Member Counter -->
    {{-- <section class="member-counter container my-5">
      <div class="row text-center member-animate">
        <div class="col member-1">
          <div class="card p-1 shadow my-2">
            <span class="material-icons"> groups </span>
            <p>{{$donor}}</p>
            <p class="my-auto">Donor Member</p>
          </div>
        </div>
        <div class="col member-2">
          <div class="card p-1 shadow my-2">
            <span class="material-icons"> groups </span>
            <p>{{$Service}}</p>
            <p class="my-auto">Service Member</p>
          </div>
        </div>
        <div class="col member-3">
          <div class="card p-1 shadow my-2">
            <span class="material-icons"> groups </span>
            <p>{{$Life}}</p>
            <p class="my-auto">Life Member</p>
          </div>
        </div>
        <div class="col member-4">
          <div class="card p-1 shadow my-2">
            <span class="material-icons"> groups </span>
            <p>{{$Temporary}}</p>
            <p class="my-auto">Temporary Member</p>
          </div>
        </div>
        <div class="col member-5">
          <div class="card p-1 shadow my-2">
            <span class="material-icons"> groups </span>
            <p class="counter">{{$Permanent}}</p>
            <p class="my-auto">Permanent Member</p>
          </div>
        </div>
        <div class="col member-6">
          <div class="card p-1 shadow my-2">
            <span class="material-icons"> groups </span>
            <p>{{$Honorary}}</p>
            <p class="my-auto">Honorary Member</p>
          </div>
        </div>
        <div class="col member-7">
          <div class="card p-1 shadow my-2">
            <span class="material-icons"> groups </span>
            <p>{{$Corporate}}</p>
            <p class="my-auto">Corporate Member</p>
          </div>
        </div>
        <div class="col member-8">
          <div class="card p-1 shadow my-2">
            <span class="material-icons"> groups </span>
            <p>{{$Diplomate}}</p>
            <p class="my-auto">Diplomate Member</p>
          </div>
        </div>
      </div>


      
    </section> --}}
    <!-- Member counter end -->
    <!-- Blog slide & Notice Section -->
    <section class="pb-lg-5 pb-md-1 news_event mt-lg-3 mt-md-4">
      <div class="container-fluid px-lg-5 notice-blog bg-light shadow rounded-3">
        <div class="row">
          <div class="col-md-7 col-lg-7 d-none d-sm-block">
              <div class="mt-3 d-flex notice-div-one ">
                  <span class="material-icons me-2"> today </span>
                  <a href="{{route('event-notice')}}">
                    <p class="fs-4 mb-1 pt-1 title-heading">News & Events</p>
                  </a>
              </div>
              <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner n-item-center notice-carousel shadow" style="position: relative;">
                  @forelse ($vNotice as $v)
                      @if ($v->link != '')
                        <div class="carousel-item active" >
                          <iframe class="notice-img" width="100%" height="350px" src="https://www.youtube.com/embed/{{$v->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                          <p style="font-size: 20px; color:red; margin-top:6px; text-align:center;">{{$v->video_caption}}</p>
                        </div>
                      @else
                      @endif
                    @empty
                    <div class="carousel-item active">
                    <iframe class="notice-img" width="100%" height="450x" src="https://www.youtube.com/embed/uA0ag5gEZt8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                    @endforelse
                    @forelse ($vNotice as $notic)
                      @if ($notic->image != '')
                        <div class="carousel-item ">
                          <img src="{{asset('uploads/video_notice/'.$notic->image)}}" class="d-block w-100 notice-img" alt="..."/>
                          <p style="font-size: 20px; color:red; margin-top:6px; text-align:center; ">{{$notic->image_caption}}</p>
                        </div>
                      @else
                      @endif
                    @empty
                    <div class="carousel-item active">
                      <iframe class="notice-img" width="100%" height="350" src="https://www.youtube.com/embed/uA0ag5gEZt8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                    @endforelse
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next" >
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
          </div>
          <div class="col-md-5 col-lg-5 d-none d-sm-block notice ">
            <div class="mt-3 d-flex notice-div-one">
              <span class="material-icons me-2"> today </span>
              <a href="{{route('all-notice')}}">
                <p class="fs-4 mb-1 pt-1 title-heading">Notice</p>
              </a>
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
                  <p>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                      Dolores, numquam?
                  </p>
                  <div class="d-flex notice-time">
                    <span class="material-symbols-outlined"> alarm </span>
                    <p class="mb-2">19 January, 2023</p>
                  </div>
                </div>
              @endforelse
            </div>
            <div class="views-notice">
              <a href="{{route('all-notice')}}">Views All Notices</a>
            </div>
          </div>

          {{-- notice section for small view start --}}
            <div class="col-sm-12 d-sm-none">
              <div class="mt-3 d-flex justify-content-center notice-div-one">
                  <span class="material-icons me-2" style="font-size: 20px !important;"> today </span>
                  <a href="{{route('event-notice')}}">
                    <p class="fs-4 m-0 p-0 title-heading">News & Events</p>
                  </a>
              </div>
              <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner n-item-center notice-carousel shadow text-center">
                  @forelse ($vNotice as $v)
                    @if ($v->link != '')
                    <div class="carousel-item active">
                      <iframe class="notice-img" width="100%" height="200" src="https://www.youtube.com/embed/{{$v->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                      <p style="font-size: 14px; color:red; margin-top:2px; text-align:center;">{{$v->video_caption}}</p>
                    </div>
                    @else
                    @endif
                  @empty
                    <div class="carousel-item active">
                    <iframe class="notice-img" width="100%" height="200" src="https://www.youtube.com/embed/uA0ag5gEZt8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                  @endforelse
                  @forelse ($vNotice as $notic)
                    @if ($notic->image != '')
                    <div class="carousel-item ">
                      <img src="{{asset('uploads/video_notice/'.$notic->image)}}" class="d-block w-100 notice-img" alt="..."/>
                      <p style="font-size: 14px; color:red; margin-top:2px; text-align:center; ">{{$notic->image_caption}}</p>
                    </div>
                    @else
                    @endif
                  @empty
                    <div class="carousel-item active">
                      <iframe class="notice-img" width="100%" height="200" src="https://www.youtube.com/embed/uA0ag5gEZt8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                  @endforelse
                </div>
              </div>
            </div>
            <div class="col-sm-12 d-sm-none notice ">
              <div class="mt-3 d-flex justify-content-center notice-div-one">
                <span class="material-icons me-2" style="font-size: 20px !important;"> today </span>
                <a href="{{route('all-notice')}}">
                  <p class="fs-4 m-0 p-0 title-heading">Notice</p>
                </a>
              </div>
              <div class="height-280">
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
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Dolores, numquam?
                    </p>
                    <div class="d-flex notice-time">
                      <span class="material-symbols-outlined"> alarm </span>
                      <p class="mb-2">19 January, 2023</p>
                    </div>
                  </div>
                @endforelse
              </div>
              <div class="views-notice" style="margin-bottom: 4px;">
                <a href="{{route('all-notice')}}" style="font-size: 14px !important;">Views All Notices</a>
              </div>
            </div>
            {{-- <div class="col-sm-12 d-lg-none d-md-none">
                <marquee width="98%"  onmouseover="this.stop();" onmouseout="this.start();" direction="left" height="content-fit" class="p-2">
                  <ul class="m-0">
                    @forelse ($scroll_notice as $sn)
                      <li><p class="px-2" style="font-size: 14px !important;">{{$sn->text}}</p></li>
                    @empty
                    @endforelse
                  </ul>
                </marquee>
            </div> --}}
          {{-- notice section for small view end --}}
          <div class="col-12 d-none d-sm-block">
              {{-- <marquee width="98%"  onmouseover="this.stop();" onmouseout="this.start();" direction="left" height="content-fit" class="p-2">
                <ul class="m-0">
                  @forelse ($scroll_notice as $sn)
                    <li><p class="px-2">{{$sn->text}}</p></li>
                  @empty
                  @endforelse
                </ul>
              </marquee> --}}
          </div>
        </div>
      </div>
    </section>
    <!-- Blog & Notice end -->
    <!-- Facilities -->
    <section class="facilities-main d-none d-sm-block">
      <div class="facilities text-center pb-lg-5 pt-lg-2 py-md-3">
        <div class="container-fluid px-5 my-4">
          <h4 class=" section-title animate-title title-heading">Facilites</h4>
          <div class="row justify-content-center owl-facilities owl-carousel animate-facilities">
            @forelse ($facilities as $fac)
              <div class="col-12 item bg-transparent px-2 ">
                <div class="card mb-3 shadow bg-transparent ">
                  <img class="zoom" width="100%" src="{{asset('uploads/facilities/'.$fac->image)}}" alt="" />
                  <div class="facilities-heading">
                    <h4>{{$fac->title}}</h4>
                  </div>
                </div>
              </div>
            @empty
              <div class="col-12 item  d-flex justify-content-center">
                <figure class="shadow">
                  <img class=" zoom" src="{{ asset('img/fasi.jpg')}}" alt="" />
                  
                  <div class="facilities-heading">
                    <h4>Restaurent</h4>
                  </div>
                </figure>
              </div>
            @endforelse
          </div>
        </div>
      </div>
      <!-- backgourd overlay animate clircle 
      <div class="facilites-bg-shadow"></div>-->
      <div class="facilitics-circle1"></div>
      <div class="facilitics-circle2"></div>
      <div class="facilitics-circle3"></div>
    </section>

    {{-- this section for small view start --}}
    <section class="facilities-main d-sm-none">
      <div class="facilities text-center py-2">
        <div class="container-fluid-fluid my-1">
          <h4 class="mb-3 section-title animate-title title-heading" style="font-size: 35px !important;">Facilites</h4>
          <div class="row justify-content-center owl-facilities owl-carousel owl-theme animate-facilities">
            @forelse ($facilities as $fac)
              <div class="col-12 item bg-transparent px-2 ">
                {{-- <figure class="shadow">
                  <img class="zoom" height="193px" src="{{asset('uploads/facilities/'.$fac->image)}}" alt="" />
                  
                  <div class="facilities-heading">
                    <h4>{{$fac->title}}</h4>
                  </div>
                </figure> --}}
                <div class="card mb-3 shadow bg-transparent ">
                  <img class="zoom" width="100%" src="{{asset('uploads/facilities/'.$fac->image)}}" alt="" />
                  <div class="facilities-heading">
                    <h4>{{$fac->title}}</h4>
                  </div>
                </div>
              </div>
            @empty
              <div class="col-12 item  d-flex justify-content-center">
                <figure class="shadow">
                  <img class=" zoom" src="{{ asset('img/fasi.jpg')}}" alt="" />
                  
                  <div class="facilities-heading">
                    <h4>Restaurent</h4>
                  </div>
                </figure>
              </div>
            @endforelse

          </div>
        </div>
      </div>
      <!-- backgourd overlay animate clircle 
      <div class="facilites-bg-shadow"></div>-->
      <div class="facilitics-circle1"></div>
      <div class="facilitics-circle2"></div>
      <div class="facilitics-circle3"></div>
    </section>
    {{-- this section for small view end --}}
    <!-- Facilities ends -->
    
    <!-- OUr Member -->
    <div class="memberdiv">
      <div class="our-members member-background">
        <section class="container-fluid px-5 pb-lg-5  d-none d-sm-block">
          {{-- <div class="our-members">
          </div> --}}
          <h4 class="animate-title title-heading">Our Members</h4>
          <div class="row owl-member owl-theme owl-carousel">
          @forelse ($ourMember as $fm)
          <div class="col-12 item pe-2 ps-2">
            <div class="card member-box shadow">
                <span class="shape"></span>
                <img class="card-img-top" src="{{asset('uploads/member_image/'.$fm->image)}}" alt="No Photos">
                <div class="card-body">
                    <span class="member-degignation">
                      {{$fm->membership_type?->member_type}}
                    </span>
                    <h3 class="member-title">{{$fm->given_name }} {{$fm->surname }}</h3>
                    <small>
                      Company:<strong class="member-company"> {{$fm->company}}</strong>
                        
                    </small>
                    <br>
                    <small>
                      Designation:<strong class="member-designation"> {{$fm->designation }}</strong>
                  </small>
                </div>
                {{-- <div class="card-footer">
                    <div class="social">
                        <big>Follow:</big>
                        <span class="social-icon"><a href="{{$fm->linkdin_link }}" target="_blank"><i class="bi bi-linkedin"></i></a></span>
                        <span class="social-icon"><a href="{{$fm->twter_link }}" target="_blank"><i class="bi bi-twitter ms-0 ps-0"></i></a></span>
                        <span class="social-icon"><a href="{{$fm->fb_link }}" target="_blank"><i class="bi bi-facebook ms-0 ps-0"></i></a></span>
                        <span class="social-icon"><a href="{{$fm->youtube_link }}" target="_blank"><i class="bi bi-youtube ms-0 ps-0"></i></a></span>
                    </div>
                </div> --}}
            </div>
          </div>
            
          @empty
            <div class="col-12 item pe-3 ps-3">
              <div class="shadow p-2 mb-3"style="background: #FFF">
                <div class="border-member">
                  <img src="{{ asset('img/Chairman or1.png')}}" alt="" />
                  <p>Md. Rafique Uddin Babul</p>
                  <p>Sizzing Group, Managing Director</p>
                  <p>Liffe Member - LM-002</p>
                </div>
              </div>
            </div>
          @endforelse
          </div>
        </section>
        {{-- This section is for small view start --}}
        <section class="container-fluid-fluid pb-2  d-sm-none">
          <h4 class="animate-title title-heading mb-3" style="font-size: 32px !important;">Our Members</h4>
          <div class="row owl-member owl-theme owl-carousel">
          @forelse ($ourMember as $fm)
          <div class="col-12 item pe-3 ps-3">
            <div class="card member-box shadow">
                <span class="shape"></span>
                <img class="card-img-top" src="{{asset('uploads/member_image/'.$fm->image)}}" alt="No Photos">
                <div class="card-body">
                    <span class="member-degignation">
                        {{$fm->membership_type?->member_type}}
                    </span>
                    <h3 class="member-title">{{$fm->given_name }} {{$fm->surname }}</h3>
                    <small>
                      Company:<strong class="member-company"> {{$fm->company}}</strong>
                        
                    </small>
                    <br>
                    <small>
                      Designation:<strong class="member-designation"> {{$fm->designation }}</strong>
                  </small>
                </div>
            </div>
          </div>
            
          @empty
            <div class="col-12 item pe-3 ps-3">
              <div class="shadow p-2 mb-3"style="background: #FFF">
                <div class="border-member">
                  <img src="{{ asset('img/Chairman or1.png')}}" alt="" />
                  <p>Md. Rafique Uddin Babul</p>
                  <p>Sizzing Group, Managing Director</p>
                  <p>Liffe Member - LM-002</p>
                </div>
              </div>
            </div>
          @endforelse
          </div>
        </section>
        {{-- This section is for small view end --}}
      </div>
    </div>
    <!-- Our Members end -->
    <!-- Gallery -->
    <section class="gallery d-none d-sm-block">
      <div class="galler-background py-3">
        <div class="container-fluid px-5">
          <h4 class="pt-lg-5 mb-md-3 animate-title title-heading">Gallery</h4>
          <div class="row justify-content-center pb-lg-5 owl-gallery owl-theme owl-carousel">
            @forelse ($pgallery_cat as $p)
              <div class="col-12 item bg-transparent px-1">
                <div class="card mb-3 shadow bg-transparent ">
                  <a href="{{route('pGallery')}}">
                    <img class="gallery-zoom" width="100%"  src="{{asset('uploads/pGcategory/'.$p->feature_image)}}" alt="" />
                  </a>
                  <div class="heading">
                    <h4>{{$p->name}}</h4>
                  </div>
                </div>
              </div>
            @empty

              <div class="col-12 item bg-transparent pe-3 ps-3">
                <div class="card mb-3 shadow bg-transparent ">
                  <img class="gallery-zoom"  src="{{ asset('img/slider-3-1.png')}}" alt="" />
                  <div class="heading">
                    <h4>AGE -2021</h4>
                  </div>
                </div>
              </div>
              <!-- <div class="col-12 item bg-transparent">
                <div class="card rounded-4 shadow mb-3 bg-transparent">
                  <img src="{{ asset('img/galary.pngz')}}" alt="" />
                  <div class="heading">
                    <h4>AGE -2021</h4>
                  </div>
                </div>
              </div> -->
            @endforelse

          </div>
        </div>
      </div>
      <div class="gallery-top-overlay"></div>
      <div class="gallery-bootom-overlay"></div>
    </section>

    {{-- This gallery section is for small view start --}}
    <section class="gallery d-sm-none">
      <div class="galler-background py-1">
        <div class="container-fluid">
          <h4 class="pt-2 mb-3 animate-title title-heading" style="font-size: 35px !important;">Gallery</h4>
          <div class="row justify-content-center pb-2 owl-gallery owl-theme owl-carousel">
            @forelse ($pgallery_cat as $p)
              <div class="col-12 item bg-transparent px-2">
                <div class="card mb-3 shadow bg-transparent ">
                  <a href="{{route('pGallery')}}">
                    <img class="gallery-zoom" width="100%"  src="{{asset('uploads/pGcategory/'.$p->feature_image)}}" alt="" />
                  </a>
                  <div class="heading">
                    <h4>{{$p->name}}</h4>
                  </div>
                </div>
              </div>
            @empty

              <div class="col-12 item bg-transparent pe-3 ps-3">
                <div class="card mb-3 shadow bg-transparent ">
                  <img class="gallery-zoom"  src="{{ asset('img/slider-3-1.png')}}" alt="" />
                  <div class="heading">
                    <h4>AGE -2021</h4>
                  </div>
                </div>
              </div>
              <!-- <div class="col-12 item bg-transparent">
                <div class="card rounded-4 shadow mb-3 bg-transparent">
                  <img src="{{ asset('img/galary.pngz')}}" alt="" />
                  <div class="heading">
                    <h4>AGE -2021</h4>
                  </div>
                </div>
              </div> -->
            @endforelse

          </div>
        </div>
      </div>
      <div class="gallery-top-overlay"></div>
      <div class="gallery-bootom-overlay"></div>
    </section>
    {{-- This gallery section is for small view end --}}
    <!-- Gallery end -->
    <!-- Facilities -->
    <section class="facilities-main benefit-of-member px-5 d-none d-sm-block">
      <div class="facilities text-center5">
        <!-- Gallery end -->
        <!-- member reg. start -->
        <div class="justify-content-center bg-light member-section shadow">
          <span class="shape"></span>
        <span class="bubble1"></span>
        <span class="bubble2"></span>
        <span class="bubble3"></span>
        <span class="bubble4"></span>
        <span class="bubble5"></span>
          <div class="p-lg-5 p-md-4 rounded shadow">
            <div class="row member-inner">
              <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4">
                <p class="animate-title">Benefits of Members</p>
                <ul class="navbar-nav benefit">
                  @forelse ($benefit as $b)
                    <li class="nav-item">
                      <span>{{$b->benefit}}</span>
                    </li>
                  @empty
                    <li class="nav-item">
                        <i class="bi bi-caret-right-fill"></i> <span>Advocacy for Software & ITES</span>
                    </li>
                  @endforelse
                </ul>
                  @if($showViewMoreButton)
                      <div class="viewbutton">
                          <a class="btn btn-sm btn-danger" href="{{ route('member.benefit') }}">View more</a>
                      </div>
                  @endif
              </div>
              <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 become-member-text my-auto">
                <p style="font-size: 7vw;"><span>Become a <span class="theme-color">Member</span></span></p>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 apply-text">
                <a class="shadow" href="{{route('member_registration')}}">Apply Now</a>
              </div>
            </div>
          </div>
        </div>
        <!-- member reg. end -->
      </div>
    </section>
    {{-- This section is for small view start --}}
    <section class="facilities-main px-2 d-sm-none">
      <div class="facilities text-center5">
        <!-- Gallery end -->
        <!-- member reg. start -->
        <div class="justify-content-center bg-light member-section shadow">
          <span class="shape"></span>
        <span class="bubble1"></span>
        <span class="bubble2"></span>
        <span class="bubble3"></span>
        <span class="bubble4"></span>
        <span class="bubble5"></span>
          <div class="p-1 rounded shadow">
            <div class="row member-inner">
              <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 text-center">
                <p class="animate-title" style="font-size: 20px;">Benefits of Members</p>
                <ul class="navbar-nav benefit" style="padding-left: 8px !important; height: 65% !important; padding-bottom: 0 !important; background-color: transparent !important;">
                  @forelse ($benefit as $b)
                    <li class="nav-item">
                       <span>{{$b->benefit}}</span>
                    </li>
                  @empty
                    <li class="nav-item">
                        <i class="bi bi-caret-right-fill"></i> <span>Advocacy for Software & ITES</span>
                    </li>
                  @endforelse
                </ul>
                  @if($showViewMoreButton)
                      <div class="ps-1 viewbutton" style="background-color: transparent !important;">
                          <a class="btn btn-sm btn-danger shadow" href="{{ route('member.benefit') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;View more&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                      </div>
                  @endif
              </div>
              <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 become-member-text my-auto">
                <p style="font-size: 7vw;"><span>Become a <span class="theme-color">Member</span></span></p>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 apply-text">
                <a class="shadow" href="{{route('member_registration')}}">Apply Now</a>
              </div>
            </div>
          </div>
        </div>
        <!-- member reg. end -->
      </div>
    </section>
    {{-- This section is for small view end --}}
    <!-- Facilities ends -->
    @endsection
    @push('scripts')
    <script>
      // document.addEventListener("DOMContentLoaded", function() {
      //     const scrollList = document.getElementById("scroll-list");
      //     const listItems = scrollList.querySelectorAll("li");
          
      //     let totalWidth = 0;
      //     listItems.forEach(item => {
      //         totalWidth += item.offsetWidth + 40;
      //     });

      //     scrollList.style.setProperty("--total-width", `${totalWidth}px`);

      //     const scrollDuration = totalWidth / 70;
      //     scrollList.style.animationDuration = `${scrollDuration}s`;
      // });
      document.addEventListener("DOMContentLoaded", function() {
        function setupScrollTicker(tickerId, speedFactor) {
            const tickerElement = document.getElementById(tickerId);
            const listItems = tickerElement.querySelectorAll("li");

            // Calculate total width of all items
            let totalWidth = 0;
            listItems.forEach(item => {
                totalWidth += item.offsetWidth + 40; // 40px padding
            });

            // Set total width to CSS variable
            tickerElement.style.setProperty("--total-width", `${totalWidth}px`);

            // Adjust animation duration based on total width and speed factor
            const scrollDuration = totalWidth / speedFactor;
            tickerElement.style.animationDuration = `${scrollDuration}s`;
        }

        setupScrollTicker("scroll-list", 70);
        setupScrollTicker("scroll-image", 50);
        setupScrollTicker("scroll-image-mobile", 50);
      });

    </script>
    <script>
      
        $('.owl-facilities').owlCarousel({
          loop:true,
          margin:10,
          dots:false,
          navText: ["<span class='bi bi-chevron-left'></span>","<span class='bi bi-chevron-right'></span>"],
          responsiveClass:true,
          responsive:{
            0:{
              items:1,
              nav:true
            },820:{
              items:2,
              nav:true
            },1000:{
              items:3,
              nav:true
            },1400:{
              items:4,
              nav:true
            },1700:{
              items:5,
              nav:true
            }
          }
        })
        $('.owl-member').owlCarousel({
          loop:true,
          margin:10,
          dots:false,
          navText: ["<span class='bi bi-chevron-left'></span>","<span class='bi bi-chevron-right'></span>"],
          responsiveClass:true,
          responsive:{
            0:{
              items:1,
              nav:false
            },820:{
              items:2,
              nav:false
            },1000:{
              items:4,
              nav:false
            },1600:{
              items:5,
              nav:false
            }
          }
        })
        $('.owl-gallery').owlCarousel({
          loop:true,
          margin:10,
          dots:false,
          navText: ["<span class='bi bi-chevron-left'></span>","<span class='bi bi-chevron-right'></span>"],
          responsiveClass:true,
          responsive:{
            0:{
              items:1,
              nav:true
            },820:{
              items:2,
              nav:true
            },1000:{
              items:3,
              nav:true
            },1400:{
              items:4,
              nav:true
            },1700:{
              items:5,
              nav:true
            }
          }
        })

        
    </script>
    <script>
        ScrollReveal({ 
          reset: true ,
          distance: '60px',
          duration: 600,
          delay: 150
        });
        ScrollReveal().reveal('.notice-title p,.views-notice', { delay: 150, origin: 'right', interval: 30  });
        ScrollReveal().reveal('.member-animate .card, .facilities-main .animate-facilities', { delay: 150,  origin: 'bottom', interval: 30 });
        ScrollReveal().reveal('.viewbutton', { delay: 150,  origin: 'bottom' });
        ScrollReveal().reveal('.become-member-text', { delay: 150,  origin: 'top' });
        ScrollReveal().reveal('.apply-text', { delay: 150,  origin: 'right' });
        ScrollReveal().reveal('.news-event-text, .animate-title', { delay: 150,  origin: 'left' });
        ScrollReveal().reveal('.benefit li', { delay: 150,  origin: 'left', interval: 30 });
        ScrollReveal().reveal('.memberdiv .owl-member, .gallery .owl-gallery', { delay: 150,  origin: 'top', interval: 30 });
    </script>
    @endpush

