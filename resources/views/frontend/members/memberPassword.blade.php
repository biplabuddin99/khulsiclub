
@section('pageTitle',trans('About us'))
@section('pageSubTitle',trans('details'))
@extends('frontend.members.memberApp')
@section('memberContent')
        
<section class="py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <form action="{{route('member.password.store')}}" method="post">
                    @csrf
                    @method('POST')
                    <div class="row py-4">
                        <div class="col-10 offset-1 py-2">
                            <label for="Old">Old Password</label>
                            <input type="password" class="form-control" name="old_password">
                        </div>
                        <div class="col-10 offset-1 py-2">
                            <label for="new">New Password</label>
                            <input type="password" class="form-control" name="new_password">
                        </div>
                        <div class="col-10 offset-1 py-2">
                            <label for="confirm">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation">
                        </div>
                        <div class="col-10 offset-1 d-flex justify-content-end py-2">
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
        
@endsection