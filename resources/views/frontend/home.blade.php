@extends('frontend.app')
@section('pageTitle',trans('Home'))
@section('pageSubTitle',trans('List'))

@section('content')
    <!-- slider -->
    <section class="slider">
      <div
        id="carouselExampleIndicators"
        class="carousel slide"
        data-bs-ride="true"
      >
        <div class="carousel-indicators">
          @forelse ($slider as $slide)
          <button
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide-to="{{$loop->index}}"
            class="{{$loop->index==0?'active':''}}"
            {{$loop->index==0?'aria-current="true"':''}}
            aria-label="Slide {{++$loop->index}}"
          ></button>
          @empty
          <button
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide-to="0"
            class="active"
            aria-current="true"
            aria-label="Slide 1"
          ></button>
          @endforelse

        </div>
        <div class="carousel-inner">
            @forelse ($slider as $slide)
              <div class="carousel-item {{$loop->index==0?'active':''}}">
                    <img
                    src="{{asset('uploads/Slide_image/thumb/'.$slide->image)}}"
                    class="d-block w-100 slider-img"
                    alt="..."
                    />
              </div>
            @empty
            <div class="carousel-item active">
              <img
                src="{{ asset('img/slider2.jpg')}}"
                class="d-block w-100 slider-img"
                alt="..."
              />
            </div>
            @endforelse
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#carouselExampleIndicators"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselExampleIndicators"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>
    <!-- slider end -->
    <!-- Member Counter -->
    <section class="member-counter container my-5">
      <div class="row text-center">
          <div class="col">
            <div class="card p-1 shadow my-2">
              <span class="material-icons"> person_add </span>
              <p>{{$donor}}</p>
              <p class="my-auto">Donor Member</p>
            </div>
          </div>
          <div class="col">
            <div class="card p-1 shadow my-2">
              <span class="material-icons"> person_add </span>
              <p>{{$Service}}</p>
              <p class="my-auto">Service Member</p>
            </div>
          </div>
          <div class="col">
            <div class="card p-1 shadow my-2">
              <span class="material-icons"> person_add </span>
              <p>{{$Life}}</p>
              <p class="my-auto">Life Member</p>
            </div>
          </div>
          <div class="col">
            <div class="card p-1 shadow my-2">
              <span class="material-icons"> person_add </span>
              <p>{{$Temporary}}</p>
              <p class="my-auto">Temporary Member</p>
            </div>
          </div>
          <div class="col">
            <div class="card p-1 shadow my-2">
              <span class="material-icons"> person_add </span>
              <p class="counter">{{$Permanent}}</p>
              <p class="my-auto">Permanent Member</p>
            </div>
          </div>
          <div class="col">
            <div class="card p-1 shadow my-2">
              <span class="material-icons"> person_add </span>
              <p>{{$Honorary}}</p>
              <p class="my-auto">Honorary Member</p>
            </div>
          </div>
          <div class="col">
            <div class="card p-1 shadow my-2">
              <span class="material-icons"> person_add </span>
              <p>{{$Corporate}}</p>
              <p class="my-auto">Corporate Member</p>
            </div>
          </div>
          <div class="col">
            <div class="card p-1 shadow my-2">
              <span class="material-icons"> person_add </span>
              <p>{{$Diplomate}}</p>
              <p class="my-auto">Diplomate Member</p>
            </div>
          </div>
      </div>


      
    </section>
    <!-- Member counter end -->
    <!-- Blog slide & Notice Section -->
    <section class="pb-5">
      <div class="container notice-blog bg-light shadow rounded-3">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-7 mt-4">
            <div
              id="carouselExampleControls"
              class="carousel slide"
              data-bs-ride="carousel"
            >
              <div class="carousel-inner">
                @forelse ($notice as $notic)

                <div class="carousel-item {{$loop->index==0?'active':''}}">
                    <img
                      src="{{asset('uploads/notice_image/'.$notic->image)}}"
                      class="d-block w-100"
                      alt="..."
                    />
                  </div>
                @empty
                <div class="carousel-item active">
                    <img
                      src="{{ asset('img/slider-3-2.jpg')}}"
                      class="d-block w-100"
                      alt="..."
                    />
                  </div>
                @endforelse
              </div>
              <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#carouselExampleControls"
                data-bs-slide="prev"
              >
                <span
                  class="carousel-control-prev-icon"
                  aria-hidden="true"
                ></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#carouselExampleControls"
                data-bs-slide="next"
              >
                <span
                  class="carousel-control-next-icon"
                  aria-hidden="true"
                ></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
            <p class="news-event-text">News & Events</p>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-5 notice">
            <div class="mt-3 d-flex notice-div-one">
              <span class="material-icons me-2"> today </span>
              <p>Notice</p>
            </div>
            <div>
                @forelse ($notice as $n)

                  <div class="notice-title notice-div-two">
                    <p class="mb-0">
                      <a href="{{asset('uploads/notice_image/'.$notic->noticefile)}}" class="notice_title" target="_blank">{{$n->title}}</a>
                    </p>
                    <div class="d-flex notice-time">
                      <span class="material-symbols-outlined"> alarm </span>
                      <p>{{date('j F, Y', strtotime($n->published_date))}} </p>
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
                      <p>19 January, 2023</p>
                    </div>
                </div>
                @endforelse
                <div class="views-notice">
                  <a href="#">Views All Notices</a>
                </div>

            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Blog & Notice end -->
    <!-- Facilities -->
    <section class="facilities-main">
      <div class="facilities text-center py-5">
        <div class="container my-4">
          <h4 class="section-title">FACILITIES</h4>
          <div class="row justify-content-center owl-facilities owl-theme">
            @forelse ($facilities as $fac)
              <div class="col-12 item  d-flex justify-content-center">
                <figure>
                  <img src="{{asset('uploads/facilities/thumb/'.$fac->image)}}" alt="" />
                  <p>{{$fac->title}}</p>
                </figure>
              </div>
            @empty
              <div class="col-12 justify-content-center">
                <img src="{{ asset('img/fasi.jpg')}}" alt="" />
                <p>Restaurent</p>
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
    <!-- Facilities ends -->
    <!-- OUr Member -->
    <div class="memberdiv">
      <div class="member-background">
        <section class="container member pb-5 ">
          <h4>OUR MEMBERS</h4>
          <div class="row owl-member owl-theme">
          @forelse ($ourMember as $member)
            <div class="col-12 item pe-3 ps-3">
              <div class="shadow p-2 mb-3 memeber-card ">
                <div class="border-member">
                  <img src="{{asset('uploads/member_image/thumb/'.$member->image)}}" alt="Photo" />
                  <p>{{$member->full_name}}</p>
                  <p>{{$member->company}}, {{$member->profession}}</p>
                  <p>@if($member->membership_applied == 1) {{__('Donor Member, DM') }}{{str_pad($member->id, 3, "0", STR_PAD_LEFT)}}

                    @elseif ($member->membership_applied == 2) {{__('Service Member, SM') }}{{str_pad($member->id, 3, "0", STR_PAD_LEFT)}}
                    @elseif ($member->membership_applied == 3) {{__('Life Member, LM') }}{{str_pad($member->id, 3, "0", STR_PAD_LEFT)}}
                    @elseif ($member->membership_applied == 4) {{__('Temporary Member, TM') }}{{str_pad($member->id, 3, "0", STR_PAD_LEFT)}}
                    @elseif ($member->membership_applied == 5) {{__('Permanent Member, PM') }}{{str_pad($member->id, 3, "0", STR_PAD_LEFT)}}
                    @elseif ($member->membership_applied == 6) {{__('Honorary Member, HM') }}{{str_pad($member->id, 3, "0", STR_PAD_LEFT)}}
                    @elseif ($member->membership_applied == 7) {{__('Corporate Member, CM') }}{{str_pad($member->id, 3, "0", STR_PAD_LEFT)}}
                    @elseif ($member->membership_applied == 8) {{__('Diplomate Member DM') }}{{str_pad($member->id, 3, "0", STR_PAD_LEFT)}}

                    @else {{__('') }} @endif</p>
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
      </div>
    </div>
    <!-- Our Members end -->
    <!-- Gallery -->
    <section class="gallery">
      <div class="galler-background py-3">
        <div class="container">
          <h4 class="pt-5">GALLERY</h4>
          <div class="row justify-content-center pb-5 owl-gallery owl-theme">
            @forelse ($pgallery_cat as $p)
              <div class="col-12 item bg-transparent pe-3 ps-3">
                <div class="card mb-3 bg-transparent ">
                  <img src="{{asset('uploads/pGcategory/thumb/'.$p->feature_image)}}" alt="" />
                  <div class="heading">
                    <h4>{{$p->name}}</h4>
                  </div>
                </div>
              </div>
            @empty
              <div class="col-12 item bg-transparent">
                <div class="card mb-3 bg-transparent">
                  <img src="{{ asset('img/galary.pngz')}}" alt="" />
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
    <!-- Gallery end -->
    <!-- Facilities -->
    <section class="facilities-main px-5">
      <div class="facilities text-center5">
        <!-- Gallery end -->
        <!-- member reg. start -->
        <div class="justify-content-center bg-light member-section shadow">
        <span class="bubble1"></span>
        <span class="bubble2"></span>
        <span class="bubble3"></span>
        <span class="bubble4"></span>
        <span class="bubble5"></span>
          <div class="p-5 rounded shadow">
            <div class="row member-inner">
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
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
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                <p>Become a Member</p>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                <a class="shadow" href="{{route('member.registration')}}">Apply Now</a>
              </div>
            </div>
          </div>
        </div>
        <!-- member reg. end -->
      </div>
    </section>
    <!-- Facilities ends -->
    @endsection
    @push('scripts')
    <script>
        $('.owl-facilities').owlCarousel({
          loop:true,
          autoPlay:true,
          slideSpeed:1000,
          margin:10,
          responsive: true,
          items : 3,
          itemsDesktop : [1199,4],
          itemsDesktopSmall : [980,3],
          itemsTablet: [768,1],
          itemsMobile : [479,1]
        })

        $('.owl-member').owlCarousel({
          loop:true,
          autoPlay:true,
          slideSpeed:1000,
          margin:25,
          responsive: true,
          items : 4,
          itemsDesktop : [1199,4],
          itemsDesktopSmall : [980,3],
          itemsTablet: [768,2],
          itemsMobile : [479,1]
        })
        $('.owl-gallery').owlCarousel({
          loop:true,
          autoPlay:true,
          slideSpeed:1000,
          margin:25,
          responsive: true,
          items : 3,
          itemsDesktop : [1199,4],
          itemsDesktopSmall : [980,3],
          itemsTablet: [768,2],
          itemsMobile : [479,1]
        })

        
    </script>
    @endpush

