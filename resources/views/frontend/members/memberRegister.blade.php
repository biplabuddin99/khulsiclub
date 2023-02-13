@extends('frontend.app')
@section('pageTitle',trans('Home'))
@section('pageSubTitle',trans('List'))

@section('content')
<!-- // Basic multiple Column Form section start -->
<section class="container py-4">
    <div class="row merber-reg-card">
        <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
          <div class="card shadow">
          <span class="shape" ></span>
              @if(Session::has('response'))
                  {!!Session::get('response')['message']!!}
              @endif
              <div class="text-center pt-4">
                <h4 style="font-weight: bold;">Want to be a member of Club</h4>
                <p>Member Registration</p>
              </div>
              <div class=" p-4 mem-form">
                <form class="form" method="post" enctype="multipart/form-data" action="{{route('memberRegister.store')}}">
                    @csrf
                    <div class="row">
                    <div class="col-12 py-2">
                        <div class="form-group">
                            <label for="fullName">Full Name</label>
                            <input type="text" id="fullName" class="form-control input-bg" onfocus="this.placeholder = ''" value="{{ old('fullName')}}" onblur="this.placeholder = 'Your Full Name'" name="fullName">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-md-12 py-2">
                        <div class="form-group">
                            <label for="company">Email Address</label>
                            <input type="text" id="EmailAddress" class="form-control input-bg" onfocus="this.placeholder = ''" value="{{ old('EmailAddress')}}" onblur="this.placeholder = 'ie: member@mail.com'" name="EmailAddress">
                        </div>
                        @if($errors->has('EmailAddress'))
                            <small class="d-block text-danger">
                                {{$errors->first('EmailAddress')}}
                            </small>
                        @endif
                    </div>
                    <div class="col-lg-6 col-sm-12 col-md-12 py-2">
                        <div class="form-group">
                            <label for="Mobile">Mobile Number</label>
                            <input type="text" id="PhoneNumber" class="form-control input-bg" onfocus="this.placeholder = ''" value="{{ old('PhoneNumber')}}" onblur="this.placeholder = 'ie: 01****'" name="PhoneNumber">
                        </div>
                        @if($errors->has('PhoneNumber'))
                            <small class="d-block text-danger">
                                {{$errors->first('PhoneNumber')}}
                            </small>
                        @endif
                    </div>
                    <div class="col-lg-6 col-sm-12 col-md-12 py-2">
                        <div class="form-group">
                            <label for="company">password</label>
                            <input type="password" id="password" class="form-control input-bg" onfocus="this.placeholder = ''" onblur="this.placeholder = 'ie: A-Z, a-z,digit(0-9),special character'" name="password">
                        </div>
                        @if($errors->has('password'))
                            <small class="d-block text-danger">
                                {{$errors->first('password')}}
                            </small>
                        @endif
                    </div>
                    <div class="col-lg-6 col-sm-12 col-md-12 py-2">
                        <div class="form-group">
                            <label for="company">Confirm password</label>
                            <input type="password" class="form-control input-bg" onfocus="this.placeholder = ''" value="{{ old('company')}}" onblur="this.placeholder = 'Re-type your password'" name="password_confirmation">
                        </div>
                        @if($errors->has('password_confirmation'))
                            <small class="d-block text-danger">
                                {{$errors->first('password_confirmation')}}
                            </small>
                        @endif
                    </div>
                    <div class="col-12 py-2">
                        <div class="form-group">
                            <input type="checkbox" class="form-check-input">
                            <label>You must agree with above <a href="#">Terms & Conditions</a></label>
                        </div>
                    </div>
                    </div>
                    <div class="row py-4">
                        <div class="col-lg-6 col-sm-12 col-md-12 d-flex justify-content-start">
                            <button type="submit" class="btn btn-success me-1 mb-1">Submit</button>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-md-12 d-flex justify-content-end">
                            <span class="pt-2 me-1">If you are already registered ?</span>
                            <a class="btn btn-danger me-1 mb-1" href="{{route('memberLogin')}}">Login</a>
                        </div>
                    </div>
                </form>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- // Basic multiple Column Form section end -->
    @endsection