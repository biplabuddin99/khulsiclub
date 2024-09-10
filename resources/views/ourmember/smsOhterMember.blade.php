@extends('layout.app')
@section('pageTitle',trans('SMS To Other'))
@section('pageSubTitle',trans('List'))

@section('content')
<style>
    @media (min-width: 1192px){
        .choices__inner{
            width: 546px !important;
        }
    }
</style>
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                @if(Session::has('response'))
                    {!!Session::get('response')['message']!!}
                @endif
                <!-- table bordered -->
                <form method="post" action="{{route(currentUser().'.sms_to_member_success')}}">
                    @csrf
                    <div class="row">
                        <div class="col-3">
                            <input type="text" onkeyup="mobile_varify(this)" name="recipiant_number" class="form-control" placeholder="recipiant number" required>
                            <span id="dueMessage" class="text-danger text-end"></span>
                        </div>
                        <div class="col-5">
                            <textarea class="form-control" name="sms" rows="2" required placeholder="message type here"></textarea>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-sm btn-info me-1 mb-1 py-0 my-0 px-4" id="submitBtn"><i class="bi bi-send" style="font-size: 2.5rem;"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
    function mobile_varify(e) {
        var mobileNumber = e.value;
        mobileNumber = mobileNumber.replace(/\D/g, '');
        e.value = mobileNumber;

        var mobileNumberPattern = /^0\d{0,10}$/;

        if (mobileNumber.length === 0) {
            $('#dueMessage').text("Please enter a mobile number");
            $('#submitBtn').prop('disabled', true);
        } else if (mobileNumberPattern.test(mobileNumber)) {
            if (mobileNumber.length === 11) {
                $('#dueMessage').text("");
                $('#submitBtn').prop('disabled', false);
            } else {
                $('#dueMessage').text("Invalid mobile number");
                $('#submitBtn').prop('disabled', true);
            }
        } else if (!mobileNumber.startsWith('0')) {
            $('#dueMessage').text("Please start with 0");
            $('#submitBtn').prop('disabled', true);
        } else if (mobileNumber.length > 11) {
            $('#dueMessage').text("Cannot accept more than 11 characters");
            $('#submitBtn').prop('disabled', true);
        } else {
            $('#dueMessage').text("Invalid mobile number");
            $('#submitBtn').prop('disabled', true);
        }
    }
</script>

@endpush