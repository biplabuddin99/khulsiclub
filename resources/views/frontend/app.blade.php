@php $setting=\App\Models\setting::first(); @endphp
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Khulsi Club International | @yield('pageTitle')</title>
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
    
    @yield('content')

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
