@extends('layout.app')
@section('pageTitle',trans('SMS To Member'))
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
                <form action="" method="get">
                    <div class="row my-2">
                        <div class="text-center my-2"><h5>Member Search</h5></div>
                        <div class="input-group input-group-sm d-flex justify-content-between">
                            <div class="col-3 pe-1">
                                <input type="text" class="form-control" name="member_id" value="{{request('member_id')}}" placeholder="Member ID">
                            </div>
                            <div class="col-3 pe-1">
                                <input type="text" class="form-control" name="contact" value="{{request('contact')}}" placeholder="Contact">
                            </div>
                            <div class="col-6">
                                <div class="d-flex">
                                    <select class="choices form-select multiple-remove" name="member_type[]" multiple="multiple">
                                        <option value="">Select Member Type</option>
                                        @forelse ($memberType as $type)
                                            <option value="{{$type->id}}" {{ (request('member_type') == $type->id ? 'selected' : '') }}>{{$type->member_type}}</option>
                                        @empty
                                            <option value="">No Data Found</option>
                                        @endforelse
                                    </select>
                
                                    <div class="input-group-append" style="margin-left: 6px;">
                                        <button type="submit" class="btn btn-info">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </div>
                                    <div class="input-group-append" style="margin-left: -2px;">
                                        <a class="btn btn-warning ms-2" href="{{route(currentUser().'.sms_to_member')}}" title="Clear"><i class="bi bi-arrow-clockwise"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- table bordered -->
                <form method="post" action="{{route(currentUser().'.sms_to_member_success')}}">
                    @csrf
                    <div class="row">
                        <div class="col-5">
                            <textarea class="form-control" name="sms" rows="2" required></textarea>
                        </div>
                        <div class="col-7">
                            <button type="submit" class="btn btn-sm btn-info me-1 mb-1 py-0 my-0 px-4 submit_button" disabled><i class="bi bi-send" style="font-size: 2.5rem;"></i></button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th scope="row"><input class="check_all" onchange="check_all()" type="checkbox"></th>
                                    <th scope="col">{{__('Name')}}</th>
                                    <th scope="col">{{__('Member ID')}}</th>
                                    <th scope="col">{{__('Membership Type')}}</th>
                                    <th scope="col">{{__('Emergency Contact No')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($ourmember as $p)
                                <tr>
                                    <th scope="row"><input class="get_data" name="member_id[]" value="{{$p->id}}" type="checkbox"></th>
                                    <td>{{$p->full_name}}</td>
                                    <td>{{$p->membership_no}}</td>
                                    <td>{{$p->membership_type?->member_type}}</td>
                                    <td>{{$p->cell_number}}</td>
                                </tr>
                                @empty
                                <tr>
                                    <th colspan="5" class="text-center">No Data Found</th>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $('.get_data').change(function() {
            var checkedCount = $('.get_data:checked').length;
            if (checkedCount > 0) {
                $('.submit_button').prop('disabled', false);
            } else {
                $('.submit_button').prop('disabled', true);
            }
        });

        $('.check_all').change(function() {
            if ($(this).is(':checked')) {
                $('.get_data').prop('checked', true);
            } else {
                $('.get_data').prop('checked', false);
            }
            $('.get_data').trigger('change');
        });
    });
</script>

@endpush