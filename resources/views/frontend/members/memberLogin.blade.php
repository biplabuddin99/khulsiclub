@extends('frontend.app')
@section('content')
<section class="container py-4 d-none d-sm-block">
    <div class="row merber-reg-card">
        <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
          <div class="card border-0 shadow">
                <span class="shape"></span>
                @if(Session::has('response'))
                    {!!Session::get('response')['message']!!}
                @endif
              <div class="row">
                    <div class="col-lg-4 logo-side-section">
                        <div class="loginSideText h-100 ">
                            <div class="body h-100">
                                <img class="align-self-center p-3" src="{{asset('img/khlogo3.png')}}" width="140px" alt="side image" >
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="text-center pt-4">
                            <span><i class="bi bi-person-circle" style="font-size: 3rem; color:#815B5B"></i></span>
                            <p class="p-0 m-0">Login</p>
                            <p>Become a Member</p>
                        </div>
                        <div class="p-4 mem-form">
                            <form class="form" method="post" action="{{route('memberlogin.check')}}">
                                @csrf
                                <div class="col-12 py-2">
                                    <div class="form-group">
                                        <label for="company">Email Address:</label>
                                        <input type="text" id="EmailAddress" class="form-control input-bg" placeholder="ie: member@mail.com" onfocus="this.placeholder = ''" value="{{ old('EmailAddress')}}" onblur="this.placeholder = 'ie: member@mail.com'" name="EmailAddress">
                                    </div>
                                    @if($errors->has('EmailAddress'))
                                        <small class="d-block text-danger">
                                            {{$errors->first('EmailAddress')}}
                                        </small>
                                    @endif
                                </div>
                                <div class="col-12 py-2">
                                    <div class="form-group">
                                        <label for="company">password:</label>
                                        <input type="password" id="password" class="form-control input-bg" placeholder="******" onfocus="this.placeholder = ''" onblur="this.placeholder = '******'" name="password">
                                    </div>
                                    @if($errors->has('password'))
                                        <small class="d-block text-danger">
                                            {{$errors->first('password')}}
                                        </small>
                                    @endif
                                </div>
                                <div>
                                    <a href="{{route('passwordReset')}}">Forgot Password?</a><br>
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
<section class="container py-4 d-sm-none">
    <div class="row merber-reg-card">
        <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
          <div class="card border-0 shadow">
                <span class="shape"></span>
                @if(Session::has('response'))
                    {!!Session::get('response')['message']!!}
                @endif
              <div class="row">
                    <div class="col-lg-4 text-center"style="background-color: #edaea3;">
                        <div class="loginSideText h-100 ">
                            <div class="body h-100">
                                <img class="align-self-center p-2" src="{{asset('img/khlogo3.png')}}" width="80px" alt="side image" >
                                <p class="p-0 m-0">Login</p>
                                <p>Become a Member</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        {{-- <div class="text-center pt-4">
                            <span><i class="bi bi-person-circle" style="font-size: 3rem; color:#815B5B"></i></span>
                            <p class="p-0 m-0">Login</p>
                            <p>Become a Member</p>
                        </div> --}}
                        <div class="p-4 mem-form">
                            <form class="form" method="post" action="{{route('memberlogin.check')}}">
                                @csrf
                                <div class="col-12 py-2">
                                    <div class="form-group">
                                        <label for="company">Email Address:</label>
                                        <input type="text" id="EmailAddress" class="form-control input-bg" placeholder="ie: member@mail.com" onfocus="this.placeholder = ''" value="{{ old('EmailAddress')}}" onblur="this.placeholder = 'ie: member@mail.com'" name="EmailAddress">
                                    </div>
                                    @if($errors->has('EmailAddress'))
                                        <small class="d-block text-danger">
                                            {{$errors->first('EmailAddress')}}
                                        </small>
                                    @endif
                                </div>
                                <div class="col-12 py-2">
                                    <div class="form-group">
                                        <label for="company">password:</label>
                                        <input type="password" id="password" class="form-control input-bg" placeholder="******" onfocus="this.placeholder = ''" onblur="this.placeholder = '******'" name="password">
                                    </div>
                                    @if($errors->has('password'))
                                        <small class="d-block text-danger">
                                            {{$errors->first('password')}}
                                        </small>
                                    @endif
                                </div>
                                <div>
                                    <a href="{{route('passwordReset')}}">Forgot Password?</a><br>
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
@endsection