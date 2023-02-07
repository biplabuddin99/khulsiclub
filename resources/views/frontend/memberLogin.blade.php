@extends('frontend.app')
@section('pageTitle',trans('Home'))
@section('pageSubTitle',trans('List'))

@section('content')

<!-- // Basic multiple Column Form section start -->
<section class="container py-4">
    <div class="row merber-reg-card">
        <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
          <div class="card shadow" style="overflow: hidden;">
                                <span class="shape" style="
                                    width: 400px;
                                    height: 400px;
                                    background: var(--red);
                                    opacity: .1;
                                    position: absolute !important;
                                    top: 0;
                                    right: -150px;
                                    border-radius: 80px;
                                    transform: rotate(45deg);
                                    
                                "></span>
                                @if(Session::has('response'))
                                    {!!Session::get('response')['message']!!}
                                @endif
              <div class="row">
                <div class="col-lg-4" style="background-color: #f0dedb; vertical-align: middle;">
                    <div class="loginSideText align-middle h-100 ">
                        <div class="body text-center justify-content-center align-middle h-100" style="display: flex;
    justify-content: center;
    align-items: center;">
                            <img class="align-self-center" src="{{asset('img/khulsi_club_logo.png')}}" width="200px" alt="side image" >
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="text-center pt-4">
                        <span><i class="bi bi-person-circle" style="font-size: 3rem"></i></span>
                        <p>Login</p>
                        <p>Become a Member</p>
                    </div>
                    <div class=" p-4" style="position:relative; z-index: 100;">
                        <form class="form" method="post" action="{{route('memberlogin.check')}}">
                            @csrf
                            <div class="col-12 py-2">
                                <div class="form-group">
                                    <label for="company">Email Address:</label>
                                    <input type="text" id="EmailAddress" class="form-control" onfocus="this.placeholder = ''" value="{{ old('EmailAddress')}}" onblur="this.placeholder = 'ie: member@mail.com'" name="EmailAddress" style="background-color: transparent;">
                                </div>
                            </div>
                            <div class="col-12 py-2">
                                <div class="form-group">
                                    <label for="company">password:</label>
                                    <input type="password" id="password" class="form-control" onfocus="this.placeholder = ''" onblur="this.placeholder = '******'" name="password" style="background-color: transparent;">
                                </div>
                            </div>
                            <div>
                                <a href="">Forgot Password?</a><br>
                                <span>Don't have an account? </span><a href="{{route('member_registration')}}">Sign up.</a>
                            </div>
                            <div class="col-12 py-4 d-flex justify-content-end">
                                <button type="submit" class="btn btn-danger">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- // Basic multiple Column Form section end -->
    @endsection