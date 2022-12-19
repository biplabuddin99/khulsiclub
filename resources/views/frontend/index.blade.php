<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Khulsi Club International | Khusli Club</title>
    <!-- Bootstrap 5.2 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/main.css')}}" />
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
  </head>
  <body>
    <!-- header section -->
    <header id="header" class="container bg-light">
      <!-- header for Desktop -->
      <!-- Logo Section -->
      <div class="row">
        <div id="scroll-hide1" class="col-sm-4 mt-3 mobile-device">
          <div class="d-flex">
            <span class="material-symbols-outlined"> search </span>
            <p>Search</p>
          </div>
        </div>
        <div class="col-sm-4 text-center d-flex">
          <img
            class="img-fluid logo"
            src="{{asset('uploads/settings/'.$setting->header_logo)}}"
            alt="khulsi_club"
          />
          <!-- Logo end -->
          <div class="mobile-device-icon pt-3 m-auto">
            <div class="dropdown">
              <button
                class="btn dropdown-toggle"
                type="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <span class="material-symbols-outlined"> menu </span>
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                  <a class="dropdown-item" href="#">Something else here</a>
                </li>
              </ul>
            </div>
            <!-- <span class="material-symbols-outlined"> menu </span> -->
          </div>
        </div>
        <div class="col-sm-4 mt-2 mobile-device" id="scroll-hide2">
          <div
            class="navbar navbar-expand-lg justify-content-end"
            id="navbarNav"
          >
            <ul class="navbar-nav">
              <li class="nav-item">
                <a href="" class="nav-link"> Member Login</a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">Become a Member</a>
              </li>
              <li class="nav-item"><a href="" class="nav-link"> B2B</a></li>
            </ul>
          </div>
        </div>
      </div>

      <!-- navigation -->
      <div class="mt-2 mobile-device">
        <nav
          id="nav"
          class="navbar navbar-expand-lg bg-light p-2 rounded-3 shadow"
        >
          <div class="container-fluid">
            <div id="nav-text" class="m-auto">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#"
                    >Home</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link">Disabled</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- slider -->
    <section class="slider mt-3">
      <div
        id="carouselExampleIndicators"
        class="carousel slide"
        data-bs-ride="true"
      >
        <div class="carousel-indicators">
          <button
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide-to="0"
            class="active"
            aria-current="true"
            aria-label="Slide 1"
          ></button>
          <button
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide-to="1"
            aria-label="Slide 2"
          ></button>
          <button
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide-to="2"
            aria-label="Slide 3"
          ></button>
        </div>
        <div class="carousel-inner">
            @forelse ($slider as $slide)
              <div class="carousel-item active">
                    <img
                    src="{{asset('uploads/Slide_image/'.$slide->image)}}"
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
          {{-- <div class="carousel-item">
            <img
              src="{{ asset('img/slider2.jpg')}}"
              class="d-block w-100 slider-img"
              alt="..."
            />
          </div>
          <div class="carousel-item">
            <img
              src="{{ asset('img/slider2.jpg')}}"
              class="d-block w-100 slider-img"
              alt="..."
            />
          </div> --}}
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
            <p>2026</p>
            <p>Donners Mambers</p>
          </div>
        </div>
        <div class="col">
          <div class="card p-1 shadow mb-3">
            <span class="material-icons"> person_add </span>
            <p>2026</p>
            <p>Donners Mambers</p>
          </div>
        </div>
        <div class="col">
          <div class="card p-1 shadow mb-3">
            <span class="material-icons"> person_add </span>
            <p>2026</p>
            <p>Donners Mambers</p>
          </div>
        </div>
        <div class="col">
          <div class="card p-1 shadow mb-3">
            <span class="material-icons"> person_add </span>
            <p>2026</p>
            <p>Donners Mambers</p>
          </div>
        </div>
        <div class="col">
          <div class="card p-1 shadow mb-3">
            <span class="material-icons"> person_add </span>
            <p>2026</p>
            <p>Donners Mambers</p>
          </div>
        </div>
        <div class="col">
          <div class="card p-1 shadow mb-3">
            <span class="material-icons"> person_add </span>
            <p>2026</p>
            <p>Donners Mambers</p>
          </div>
        </div>
        <div class="col">
          <div class="card p-1 shadow mb-3">
            <span class="material-icons"> person_add </span>
            <p>2026</p>
            <p>Donners Mambers</p>
          </div>
        </div>
        <div class="col">
          <div class="card p-1 shadow mb-3">
            <span class="material-icons"> person_add </span>
            <p>2026</p>
            <p>Donners Mambers</p>
          </div>
        </div>
        <div class="col">
          <div class="card p-1 shadow mb-3">
            <span class="material-icons"> person_add </span>
            <p>2026</p>
            <p>Donners Mambers</p>
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

                <div class="carousel-item active">
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

                {{-- <div class="carousel-item">
                  <img
                    src="{{ asset('img/slider-3-2.jpg')}}"
                    class="d-block w-100"
                    alt="..."
                  />
                </div>
                <div class="carousel-item">
                  <img
                    src="{{ asset('img/slider-3-2.jpg')}}"
                    class="d-block w-100"
                    alt="..."
                  />
                </div> --}}
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

              {{-- <div class="d-flex">
                <span class="material-symbols-outlined me-2">
                  arrow_forward
                </span>
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Dolores, numquam?
                </p>
              </div>
              <div class="d-flex">
                <span class="material-symbols-outlined me-2">
                  arrow_forward
                </span>
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Dolores, numquam?
                </p>
              </div>
              <div class="d-flex">
                <span class="material-symbols-outlined me-2">
                  arrow_forward
                </span>
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Dolores, numquam?
                </p>
              </div>
              <div class="d-flex">
                <span class="material-symbols-outlined me-2">
                  arrow_forward
                </span>
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Dolores, numquam?
                </p>
              </div> --}}
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
          <div class="row justify-content-center">
            @forelse ($facilities as $fac)
            <div class="col-sm-4 col-md-3 col-lg-2">
                <img src="{{asset('uploads/facilities/'.$fac->image)}}" alt="" />
                <p>{{$fac->title}}</p>
            </div>
            @empty
                <div class="col-sm-4 col-md-3 col-lg-2">
                    <img src="{{ asset('img/fasi.jpg')}}" alt="" />
                    <p>Restaurent</p>
                </div>
            @endforelse

            {{-- <div class="col-sm-4 col-md-3 col-lg-2">
              <img src="{{ asset('img/fasi.jpg')}}" alt="" />
              <p>restaurent</p>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-2">
              <img src="{{ asset('img/fasi.jpg')}}" alt="" />
              <p>Restaurent</p>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-2">
              <img src="{{ asset('img/fasi.jpg')}}" alt="" />
              <p>Restaurent</p>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-2">
              <img src="{{ asset('img/fasi.jpg')}}" alt="" />
              <p>Restaurent</p>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-2">
              <img src="{{ asset('img/fasi.jpg')}}" alt="" />
              <p>Restaurent</p>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-2">
              <img src="{{ asset('img/fasi.jpg')}}" alt="" />
              <p>Restaurent</p>
            </div> --}}
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
      <div class="row justify-content-center">
        <div class="col-sm-4 col-md-3 col-lg-3">
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
        <div class="col-sm-4 col-md-3 col-lg-3">
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
        <div class="col-sm-4 col-md-3 col-lg-3">
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
        <div class="col-sm-4 col-md-3 col-lg-3">
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
          <div class="row justify-content-center pb-5">
            @forelse ($pgallery_cat as $p)
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="card rounded-4 shadow mb-3">
                  <img src="{{asset('uploads/pGcategory/'.$p->feature_image)}}" alt="" />
                  <div class="heading">
                    <h4>{{$p->name}}</h4>
                  </div>
                </div>
              </div>
            @empty
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="card rounded-4 shadow mb-3">
                  <img src="{{ asset('img/slider1.png')}}" alt="" />
                  <div class="heading">
                    <h4>AGE -2021</h4>
                  </div>
                </div>
              </div>
            @endforelse

            {{-- <div class="col-sm-6 col-md-4 col-lg-4">
              <div class="card rounded-4 shadow mb-3">
                <img src="{{ asset('img/slider1.png')}}" alt="" />
                <div class="heading">
                  <h4>AGE -2021</h4>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
              <div class="card rounded-4 shadow mb-3">
                <img src="{{ asset('img/slider1.png')}}" alt="" />
                <div class="heading">
                  <h4>AGE -2021</h4>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
              <div class="card rounded-4 shadow mb-3">
                <img src="{{ asset('img/slider1.png')}}" alt="" />
                <div class="heading">
                  <h4>AGE -2021</h4>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
              <div class="card rounded-4 shadow mb-3">
                <img src="{{ asset('img/slider1.png')}}" alt="" />
                <div class="heading">
                  <h4>AGE -2021</h4>
                </div>
              </div>
            </div> --}}
          </div>
        </div>
      </div>
      <div class="gallery-top-overlay"></div>
      <div class="gallery-bootom-overlay"></div>
    </section>
    <!-- Gallery end -->
    <!-- Member Reg. -->
    <section class="member-reg pt-5">
      <div class="member-reg-backgroud">
        <div class="row">
          <div class="col-sm-6">
            <h4><span> BECOME A</span> MEMBER</h4>
          </div>
          <div class="col-sm-6">
            <a class="button" href="{{route(currentUser().'.ourMember.create')}}">Apply Now</a>
          </div>
        </div>
      </div>
    </section>
    <!-- Member Reg. ends -->
    <!--  support -->
    <section class="support justify-content-center">
      <div class="container">
        <div class="row">
          <div class="col-sm-4 d-flex justify-content-center">
            <i class="bi bi-headset"></i>
            <p>{{ $setting->footer_top_p1_text }}</p>
          </div>
          <div class="col-sm-4">
            <p id="support-number">{{ $setting->footer_top_p2_text }}</p>
          </div>
          <div class="col-sm-4">
            <p>{{ $setting->footer_top_p3_text }}</p>
          </div>
        </div>
      </div>
    </section>
    <!--  support ends -->
    <!-- footer -->
    <footer class="position-relative">
      <div class="footer">
        <div class="container">
          <div class="footer-logo">
            <img src="{{asset('uploads/settings/'.$setting->footer_logo)}}" alt="" />
          </div>
          <div class="row footer-nav">
            <div class="col-sm-4">
              <h6>Location</h6>
              <div class="contact">
                <span
                  ><i class="bi bi-geo-alt-fill"></i>
                  <p>
                    {{ $setting->address }}
                  </p>
                </span>
                <span>
                  <i class="bi bi-telephone-fill"></i>
                  <p>{{ $setting->contact_no }}</p>
                </span>
                <span>
                  <i class="bi bi-envelope-fill"></i>
                  <p>{{ $setting->email_address }}</p>
                </span>
              </div>
            </div>
            <div class="col-sm-4"></div>
            <div class="col-sm-4 justify-content-end">
              <h6>Connet With Us</h6>
              <div class="social-icon">
                <a href="{{ $setting->facebook_link }}"><i class="bi bi-facebook"></i></a>
                <a href="{{ $setting->twitter_link }}"><i class="bi bi-twitter"></i></a>
                <a href="{{ $setting->linkdin_link }}"><i class="bi bi-linkedin"></i></a>
                <a href="{{ $setting->youtube_link }}"><i class="bi bi-youtube"></i></a>

              </div>
            </div>
          </div>
          <hr />
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-3 copyright">
              <p>&copy 2022 BASIS</p>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 d-flex payment-img">
              <p>We Accept</p>
              <img class="img-fluid" src="{{ asset('img/amex.png')}}" alt="" />
              <img class="img-fluid" src="{{ asset('img/visa.png')}}" alt="" />
              <img class="img-fluid" src="{{ asset('img/master.png')}}" alt="" />
            </div>
            <div class="col-sm-12 col-md-12 col-lg-5 mt-2 developer">
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
    <!-- My JS -->
    <script src="{{ asset('js/app.js')}}"></script>
  </body>
</html>
