@extends('frontend.memDashboard.memberApp')
@section('memberContent')
        
<section class="py-0">
    <div class="row">
        <div class="col-12 member-service">
            <div class="card shadow-sm ">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif 
                    
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card-header mem-password">
                    <h5>Help Desk</h5>
                </div>
                <div class="card-body">
                    <form class="form" method="post" enctype="multipart/form-data" action="{{route('member.help.store')}}">
                        @csrf
                        <input type="hidden" name="member_id" value="{{encryptor('decrypt', request()->session()->get('userId'))}}">
                        <div class="row mb-3">
                            <label for="payment" class="col-sm-2 offset-1 col-form-label text-end"><b>{{__('Topic')}}<span class="text-danger">*</span></b></label>
                            <div class="col-sm-6 offset-1 m-0">
                                <select name="topic" class="form-control form-select" required>
                                    <option value="">Select</option>
                                    @forelse (App\Models\member_contact_reason::all(); as $d)
                                    <option value="{{$d->id}}" {{ old('topic')==$d->id?"selected":""}}> {{ $d->reason}}</option>
                                    @empty
                                    <option value="">No Data Found</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="amount" class="col-sm-2 offset-1 col-form-label text-end"><b>{{__('Subject')}}</b></label>
                            <div class="col-sm-6 offset-1 m-0">
                                <input type="text" value="{{ old('subject')}}" class="form-control" name="subject">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="amount" class="col-sm-2 offset-1 col-form-label text-end"><b>{{__('Message')}}</b></label>
                            <div class="col-sm-6 offset-1 m-0">
                                <textarea class="form-control" name="message" rows="3">{{ old('message')}}</textarea>
                            </div>
                        </div>
                        <div class="col-6 offset-3 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">{{__('Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section> 
@endsection