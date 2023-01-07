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
            <div class="card p-1 shadow mb-3">
              <span class="material-icons"> person_add </span>
              <p>{{$donor}}</p>
              <p>Donor Member</p>
            </div>
          </div>
          <div class="col">
            <div class="card p-1 shadow mb-3">
              <span class="material-icons"> person_add </span>
              <p>{{$Service}}</p>
              <p>Service Member</p>
            </div>
          </div>
          <div class="col">
            <div class="card p-1 shadow mb-3">
              <span class="material-icons"> person_add </span>
              <p>{{$Life}}</p>
              <p>Life Member</p>
            </div>
          </div>
          <div class="col">
            <div class="card p-1 shadow mb-3">
              <span class="material-icons"> person_add </span>
              <p>{{$Temporary}}</p>
              <p>Temporary Member</p>
            </div>
          </div>
          <div class="col">
            <div class="card p-1 shadow mb-3">
              <span class="material-icons"> person_add </span>
              <p class="counter">{{$Permanent}}</p>
              <p>Permanent Member</p>
            </div>
          </div>
          <div class="col">
            <div class="card p-1 shadow mb-3">
              <span class="material-icons"> person_add </span>
              <p>{{$Honorary}}</p>
              <p>Honorary Member</p>
            </div>
          </div>
          <div class="col">
            <div class="card p-1 shadow mb-3">
              <span class="material-icons"> person_add </span>
              <p>{{$Corporate}}</p>
              <p>Corporate Member</p>
            </div>
          </div>
          <div class="col">
            <div class="card p-1 shadow mb-3">
              <span class="material-icons"> person_add </span>
              <p>{{$Diplomate}}</p>
              <p>Diplomate Member</p>
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
          </div>
          <div class="col-sm-12 col-md-12 col-lg-5 notice">
            <div class="mt-3 d-flex">
              <span class="material-icons me-2"> today </span>
              <p>Notice</p>
              <span class="material-symbols-outlined text-align-end">
                arrow_circle_right
              </span>
            </div>
            <hr />
            <div>
                @forelse ($notice as $n)

                <div class="d-flex">
                    <span class="material-symbols-outlined me-2">
                      arrow_forward
                    </span>
                    <p>
                        {{$n->title}}
                    </p>
                  </div>
                @empty
                <div class="d-flex">
                    <span class="material-symbols-outlined me-2">
                      arrow_forward
                    </span>
                    <p>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                      Dolores, numquam?
                    </p>
                  </div>
                @endforelse

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
          <h4>Facilities</h4>
          <div class="row justify-content-center owl-facilities owl-theme">
            @forelse ($facilities as $fac)
              <div class="col-12 item  d-flex justify-content-center">
                <figure>
                  <img src="{{asset('uploads/facilities/thumb/'.$fac->image)}}" alt="" />
                  <figcaption>{{$fac->title}}</figcaption>
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
      <!-- backgourd overlay animate clircle -->
      <div class="facilites-bg-shadow"></div>
      <div class="facilitics-circle1"></div>
      <div class="facilitics-circle2"></div>
      <div class="facilitics-circle3"></div>
    </section>
    <!-- Facilities ends -->
    <!-- OUr Member -->
    <section class="container member pb-5">
      <h4>Our Members</h4>
      <div class="row justify-content-center owl-member owl-theme">
        <div class="col-12 item">
          <div class="shadow p-2 rounded-4 mb-3">
            <img src="{{ asset('img/Chairman or1.png')}}" alt="" />
            <p>Md. Rafique Uddin Babul</p>
            <p>Chairman</p>
            <i class="bi bi-facebook"></i>
            <i class="bi bi-twitter"></i>
            <i class="bi bi-linkedin"></i>
            <i class="bi bi-youtube"></i>
          </div>
        </div>
        <div class="col-12 item">
          <div class="shadow p-2 rounded-4 mb-3">
            <img src="{{ asset('img/Chairman or1.png')}}" alt="" />
            <p>Md. Rafique Uddin Babul</p>
            <p>Chairman</p>
            <i class="bi bi-facebook"></i>
            <i class="bi bi-twitter"></i>
            <i class="bi bi-linkedin"></i>
            <i class="bi bi-youtube"></i>
          </div>
        </div>
        <div class="col-12 item">
          <div class="shadow p-2 rounded-4 mb-3">
            <img src="{{ asset('img/Chairman or1.png')}}" alt="" />
            <p>Md. Rafique Uddin Babul</p>
            <p>Chairman</p>
            <i class="bi bi-facebook"></i>
            <i class="bi bi-twitter"></i>
            <i class="bi bi-linkedin"></i>
            <i class="bi bi-youtube"></i>
          </div>
        </div>
        <div class="col-12 item">
          <div class="shadow p-2 rounded-4 mb-3">
            <img src="{{ asset('img/Chairman or1.png')}}" alt="" />
            <p>Md. Rafique Uddin Babul</p>
            <p>Chairman</p>
            <i class="bi bi-facebook"></i>
            <i class="bi bi-twitter"></i>
            <i class="bi bi-linkedin"></i>
            <i class="bi bi-youtube"></i>
          </div>
        </div>
        <div class="col-12 item">
          <div class="shadow p-2 rounded-4 mb-3">
            <img src="{{ asset('img/Chairman or1.png')}}" alt="" />
            <p>Md. Rafique Uddin Babul</p>
            <p>Chairman</p>
            <i class="bi bi-facebook"></i>
            <i class="bi bi-twitter"></i>
            <i class="bi bi-linkedin"></i>
            <i class="bi bi-youtube"></i>
          </div>
        </div>
      </div>
    </section>
    <!-- Our Members end -->
    <!-- Gallery -->
    <section class="gallery">
      <div class="galler-background">
        <div class="container">
          <h4 class="pt-5">Gallery</h4>
          <div class="row justify-content-center pb-5 owl-gallery owl-theme">
            @forelse ($pgallery_cat as $p)
              <div class="col-12 item bg-transparent pe-2 ps-2">
                <div class="card rounded-4 shadow mb-3 bg-transparent ">
                  <img src="{{asset('uploads/pGcategory/thumb/'.$p->feature_image)}}" alt="" />
                  <div class="heading">
                    <h4>{{$p->name}}</h4>
                  </div>
                </div>
              </div>
            @empty
            <div class="col-12 item bg-transparent">
              <div class="card rounded-4 shadow mb-3 bg-transparent">
                  <img src="{{ asset('img/galary.pngz')}}" alt="" />
                  <div class="heading">
                    <h4>AGE -2021</h4>
                  </div>
                </div>
              </div>
            @endforelse

          </div>
        </div>
      </div>
      <div class="gallery-top-overlay"></div>
      <div class="gallery-bootom-overlay"></div>
    </section>
    <!-- Gallery end -->
    <!-- Member Reg. -->
    <section class="container-fluid member-reg pt-5">
      <div class="member-reg-backgroud">
        <div class="row">
          <div class="col-sm-6">
            <h4 class="pb-4 pb-sm-0 text-center"><span> BECOME A</span> MEMBER</h4>
          </div>
          <div class="col-sm-6">
            <a class="button" href="{{route('member.registration')}}">Apply Now</a>
          </div>
        </div>
      </div>
    </section>
    <!-- Member Reg. ends -->
    @endsection
    @push('scripts')
    <script>
      // $(document).ready(function(){
          
      //   $('.counter').counterUp({
      //               delay: 10,
      //               time: 2000
      //           });
      // });

     
 
        $('.owl-facilities').owlCarousel({
          loop:true,
          autoPlay:true,
          slideSpeed:1000,
          margin:10,
          responsive: true,
          items : 5,
          itemsDesktop : [1199,4],
          itemsDesktopSmall : [980,3],
          itemsTablet: [768,2],
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
          items : 4,
          itemsDesktop : [1199,4],
          itemsDesktopSmall : [980,3],
          itemsTablet: [768,2],
          itemsMobile : [479,1]
        })

        
    </script>
    @endpush

