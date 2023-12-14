@extends('frontend.memDashboard.memberApp')
@section('memberContent')
        
<section class="py-0">
    <style>
        .card-header.mem-password {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    
        .card-header.mem-password > div {
            margin-right: 10px;
        }
    </style>
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
                    <h5>Change Request</h5>
                    <div>
                       <a class="btn btn-sm btn-outline-danger" href="{{route('member.pending_request')}}"><span>Pending Request</span></a>
                    </div>
                    <div>
                       <a class="btn btn-sm btn-outline-danger" href="{{route('member.request_history')}}"><span>Request History</span></a>
                    </div>
                </div>
                <div class="card-body">
                    @php $mt=array("","Life Member","Permanent Member","Donor Member","Service Member","Temporary Member","Honorary Member","Corporate Member","Diplomate Member");
                        $membershipType = request()->session()->get('membership_type');
                        $decryptedType = encryptor('decrypt', $membershipType);
                        $decryptedValue = $mt[$decryptedType];
                    @endphp
                    <form id="myForm" class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.changeReq.store')}}">
                        @csrf
                        <input type="hidden" name="member_id" value="{{encryptor('decrypt', request()->session()->get('userId'))}}">
                        <div class="row mb-4">
                            <div class="col-12 d-flex justify-content-between mb-2">
                                <div class="mobileChange">
                                    <input type="checkbox" name="changeType[]" value="Mobile Number" id="mobile">
                                    <label for="mobile"><b>Mobile Number</b></label>
                                </div>
                                <div class="emailChange">
                                    <input type="checkbox" name="changeType[]" value="Email" id="email">
                                    <label for="email"><b>Email</b></label>
                                </div>
                                <div class="addressChange">
                                    <input type="checkbox" name="changeType[]" value="Address" id="address">
                                    <label for="address"><b>Address</b></label>
                                </div>
                                <div class="memberTypeChange">
                                    <input type="checkbox" name="changeType[]" value="Member Type" id="type">
                                    <label for="type"><b>Member Type</b></label>
                                </div>
                            </div>
                            <hr class="text-danger">
                        </div>
                        <div class="row d-none" id="mobileChange">
                            <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                <label for="phone">Mobile Number</label>
                                <input type="text" class="form-control" value="{{encryptor('decrypt', request()->session()->get('phone'))}}" disabled>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 mb-2">
                                <label for="name">New Mobile Number</label>
                                <input type="text" class="form-control" name="mobile" value="{{old('mobile')}}">
                            </div>
                        </div>
                        <div class="row d-none" id="emailChange">
                            <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" value="{{encryptor('decrypt', request()->session()->get('email'))}}" disabled>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                <label for="email">New Email</label>
                                <input type="email" class="form-control" name="email" value="{{old('email')}}">
                            </div>
                        </div>
                        <div class="row d-none" id="addressChange">
                            <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" value="{{encryptor('decrypt', request()->session()->get('address'))}}" disabled>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 mb-2">
                                <label for="address">New Address</label>
                                <input type="text" class="form-control" name="address" value="{{old('address')}}">
                            </div>
                        </div>
                        <div class="row d-none" id="typeChange">
                            <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                @foreach (App\Models\MembershipType::where('id',$decryptedType)->get() as $mt)
                                    <label for="member">Member Type</label>
                                    <input type="text" class="form-control" value="{{$mt->member_type}}" disabled>
                                @endforeach
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                <label for="member">New Member Type</label>
                                <select name="memberType" class="form-control form-select">
                                    <option value="">Select Member Type</option>
                                        @forelse ($memberType as $mt)
                                        <option value="{{$mt->member_type}}">{{$mt->member_type}}</option>
                                        @empty
                                        <option value="">No Data Found</option>
                                        @endforelse
                                        {{-- <option value="Permanent Member">Permanent Member</option>
                                        <option value="Donor Member">Donor Member</option>
                                        <option value="Service Member">Service Member</option>
                                        <option value="Temporary Member">Temporary Member</option>
                                        <option value="Honorary Member">Honorary Member</option>
                                        <option value="Corporate Member">Corporate Member</option>
                                        <option value="Diplomate Member">Diplomate Member</option>
                                        <option value="Founding Member">Founding Member</option> --}}
                                </select>
                            </div>
                            <div class="col-12 mb-2">
                                <label for="reason">Reason Why</label>
                                <textarea name="details" class="form-control" rows="2">{{old('details')}}</textarea>
                            </div>
                        </div>
                        <div class="col-12  d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1 d-none">{{__('Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section> 
@endsection
@push('scripts')
<script>
$(document).ready(function() {
    // Hide the button initially
    $('button[type="submit"]').addClass('d-none');

    // Attach change event handler to checkboxes
    $('.form input[type="checkbox"]').change(function() {
        var targetId = $(this).attr('id') + 'Change';
        $('#' + targetId).toggleClass('d-none', !this.checked);

        // Check if any checkbox is checked
        var anyChecked = $('.form input[type="checkbox"]:checked').length > 0;

        // Show/hide the button based on checkbox status
        $('button[type="submit"]').toggleClass('d-none', !anyChecked);
    });
});
</script>
@endpush