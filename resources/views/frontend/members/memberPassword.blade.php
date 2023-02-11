
@section('pageTitle',trans('About us'))
@section('pageSubTitle',trans('details'))
@extends('frontend.members.memberApp')
@section('memberContent')
        
<section class="py-0">
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @if(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif

                <form action="{{route('member.passwordUpdate')}}" method="post">
                    @csrf
                    <div class="row py-4">
                        <div class="col-10 offset-1 py-2">
                            <label for="current_password">Current Password:</label>
                            <input type="password" class="form-control" id="current_password" name="current_password">
                        </div>
                        <div class="col-10 offset-1 py-2">
                            <label for="new_password">New Password:</label>
                            <input type="password" class="form-control" id="new_password" name="new_password">
                        </div>
                        <div class="col-10 offset-1 py-2">
                            <label for="new_password_confirmation">Confirm New Password:</label>
                            <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
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