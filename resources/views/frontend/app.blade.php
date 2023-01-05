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
    <!--OWL CSS-->
    <!-- Basic stylesheet -->
    <link rel="stylesheet" href="{{ asset('owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{ asset('owl-carousel/owl.theme.css')}}">
    
  </head>
  <body>
        <!-- header section -->
    <header class="bg-white">
      <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
        <div class="row">
          <div class="col-sm-2 logo-sec">
            <img src="{{asset('uploads/settings/'.$setting?->header_logo)}}" alt="" />
          </div>

          <div class="col-sm-10 header-right">
            <div class="d-flex justify-content-end">
              <a id="text-right-dec" href="#">Member Login</a>
              <a href="#">Become a Member</a>
            </div>
            
            <div class="row">
              <div class="col-sm-8 d-flex justify-content-center" >
                <nav class="navbar navbar-expand-lg navbar-light">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item">
                        <a class="nav-link" href="">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="">About Us</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="">Club Facilities</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="">Members</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="">Publications</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="">Media</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="">Contact Us</a>
                      </li>
                    </ul>
                  </div>
                </nav>
              </div>
              <div class="col-sm-4 d-flex justify-content-end mt-4">
                <div class="social-icon">
                  <i class="bi bi-facebook"></i>
                  <i class="bi bi-twitter"></i>
                  <i class="bi bi-linkedin"></i>
                  <i class="bi bi-youtube"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    @yield('content')

    <!--  support -->
    <section class="support justify-content-center">
      <div class="container">
        <div class="row">
          <div class="col-sm-4 d-flex justify-content-center">
            <i class="bi bi-headset"></i>
            <p>{{ $setting?->footer_top_p1_text }}</p>
          </div>
          <div class="col-sm-4">
            <p id="support-number">{{ $setting?->footer_top_p2_text }}</p>
          </div>
          <div class="col-sm-4">
            <p>{{ $setting?->footer_top_p3_text }}</p>
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
            <img src="{{asset('uploads/settings/'.$setting?->footer_logo)}}" alt="" />
          </div>
          <div class="row footer-nav">
            <div class="col-sm-4">
              <h6>Location</h6>
              <div class="contact">
                <span
                  ><i class="bi bi-geo-alt-fill"></i>
                  <p>
                    {{ $setting?->address }}
                  </p>
                </span>
                <span>
                  <i class="bi bi-telephone-fill"></i>
                  <p>{{ $setting?->contact_no }}</p>
                </span>
                <span>
                  <i class="bi bi-envelope-fill"></i>
                  <p>{{ $setting?->email_address }}</p>
                </span>
              </div>
            </div>
            <div class="col-sm-4"></div>
            <div class="col-sm-4 justify-content-end">
              <h6>Connet With Us</h6>
              <div class="social-icon">
                <a href="{{ $setting?->facebook_link }}"><i class="bi bi-facebook"></i></a>
                <a href="{{ $setting?->twitter_link }}"><i class="bi bi-twitter"></i></a>
                <a href="{{ $setting?->linkdin_link }}"><i class="bi bi-linkedin"></i></a>
                <a href="{{ $setting?->youtube_link }}"><i class="bi bi-youtube"></i></a>

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

    <!-- owl js -->
    <script src="{{ asset('assets/js/jquery-1.9.1.min.js')}}"></script>
    <script src="{{ asset('owl-carousel/owl.carousel.js')}}"></script>
    @stack('scripts')
  </body>
</html>
