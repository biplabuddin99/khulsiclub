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
                            <span class="text-danger">Insert New Password</span>
                            <p>Reset Password</p>
                        </div>
                        <div class="p-4 mem-form">
                            <form class="form" method="post" action="{{route('memlogin.check')}}">
                                @csrf
                                <div class="col-12 py-2">
                                    <input type="hidden" name="member_id" value="{{$findMember->id}}">
                                    <div class="form-group">
                                        <label for="newpassword">Create New Password</label>
                                        <input type="password" class="form-control input-bg" placeholder="******" onfocus="this.placeholder = ''" value="{{ old('newpassword')}}" onblur="this.placeholder = '******'" name="newpassword" required>
                                    </div>
                                    @if($errors->has('newpassword'))
                                        <small class="d-block text-danger">
                                            {{$errors->first('newpassword')}}
                                        </small>
                                    @endif
                                </div>
                                <div class="col-12 py-2">
                                    <div class="form-group">
                                        <label for="confirm">Confirm Password</label>
                                        <input type="password" class="form-control input-bg" placeholder="******" onfocus="this.placeholder = ''" onblur="this.placeholder = '******'" name="confirmPassword" required>
                                    </div>
                                    @if($errors->has('confirmPassword'))
                                        <small class="d-block text-danger">
                                            {{$errors->first('confirmPassword')}}
                                        </small>
                                    @endif
                                </div>
                                <div class="col-12 py-4 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-danger">Submit</button>
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