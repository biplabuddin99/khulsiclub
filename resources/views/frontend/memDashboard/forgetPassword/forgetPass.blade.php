@extends('frontend.app')
@section('content')

<section class="container py-4">
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
                            {{-- <span><i class="bi bi-person-circle" style="font-size: 3rem; color:#815B5B"></i></span> --}}
                            <span class="text-danger">Please put your representative email & member id for</span>
                            <p>Reset Password</p>
                        </div>
                        <div class="p-4 mem-form">
                            <form class="form" method="post" action="{{route('forget_password_reset')}}">
                                @csrf
                                <div class="col-12 py-2">
                                    <div class="form-group">
                                        <label for="memberId">Member ID</label>
                                        <input type="text" id="memberId" class="form-control input-bg" placeholder="Member id" onfocus="this.placeholder = ''" value="{{ old('memberId')}}" onblur="this.placeholder = 'Member id'" name="memberId" required>
                                    </div>
                                    @if($errors->has('memberId'))
                                        <small class="d-block text-danger">
                                            {{$errors->first('memberId')}}
                                        </small>
                                    @endif
                                </div>
                                <div class="col-12 py-2">
                                    <div class="form-group">
                                        <label for="company">Email:</label>
                                        <input type="email" class="form-control input-bg" placeholder="example@gmail.com" onfocus="this.placeholder = ''" onblur="this.placeholder = 'example@gmail.com'" name="email" required>
                                    </div>
                                    @if($errors->has('email'))
                                        <small class="d-block text-danger">
                                            {{$errors->first('email')}}
                                        </small>
                                    @endif
                                </div>
                                <div class="col-12 py-4 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-danger">Next</button>
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