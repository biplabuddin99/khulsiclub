@extends('layout.app')
@section('pageTitle',trans('Approved Member List'))
@section('pageSubTitle',trans('List'))

@section('content')
<style>
    @media (min-width: 1192px){
        .choices__inner{
            width: 435px !important;
        }
    }
</style>

<!-- Bordered table start -->
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                @if(Session::has('response'))
                    {!!Session::get('response')['message']!!}
                @endif
                <form action="" method="get">
                    <div class="row py-2">
                        <div class="input-group input-group-sm d-flex justify-content-between">
                            <div class="col-2 pe-1">
                                <input type="text" class="form-control" name="member_id" value="{{request('member_id')}}" placeholder="Member ID">
                            </div>
                            <div class="col-2 pe-1">
                                <input type="text" class="form-control" name="mobile" value="{{request('mobile')}}" placeholder="Contact number">
                            </div>
                            <div class="col-3 pe-1">
                                <div>
                                    <select class="form-control" name="member_type">
                                        <option value="">Select Type</option>
                                        @forelse($mType as $d)
                                            <option value="{{$d->id}}" {{ (request('member_type') == $d->id ? 'selected' : '') }}>{{ $d->member_type}}</option>
                                        @empty
                                            <option value="">No Data Found</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="col-5 pe-1">
                                <div class="d-flex">
                                    <select class="form-control choices" name="nane">
                                        <option value="">Select Member</option>
                                        @forelse($member as $d)
                                            <option value="{{$d->id}}" {{ (request('nane') == $d->id ? 'selected' : '') }}>{{ $d->full_name}}</option>
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
                                        <a class="btn btn-warning ms-2" href="{{route(currentUser().'.approve_member')}}" title="Clear"><i class="bi bi-arrow-clockwise"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- table bordered -->
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('Name')}}</th>
                                <th scope="col">{{__('Member ID')}}</th>
                                <th scope="col">{{__('Membership Type')}}</th>
                                <th scope="col">{{__('Profession')}}</th>
                                <th scope="col">{{__('Emergency Contact No')}}</th>
                                <th class="white-space-nowrap">{{__('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($ourmember as $p)
                            <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                <td>{{$p->full_name}}</td>
                                <td>{{$p->membership_no}}</td>
                                <td>{{$p->membership_type?->member_type}}</td>
                                <td>{{$p->profession}}</td>
                                <td>{{$p->cell_number}}</td>
                                <td class="white-space-nowrap">
                                    <a href="{{route(currentUser().'.ourMember.show',encryptor('encrypt',$p->id))}}">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>&nbsp;
                                    <a href="{{route(currentUser().'.member_document',encryptor('encrypt',$p->id))}}">
                                        <i class="bi bi-card-image"></i>
                                    </a>&nbsp;
                                    <a href="{{route(currentUser().'.ourMember.edit',encryptor('encrypt',$p->id))}}">
                                        <i class="bi bi-pencil-square"></i>
                                    </a> &nbsp;
                                    <a class="text-danger" href="javascript:void()" onclick="$('#form{{$p->id}}').submit()">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    <form id="form{{$p->id}}" onsubmit="return confirm('Are you sure?')" action="{{route(currentUser().'.ourMember.destroy',encryptor('encrypt',$p->id))}}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <th colspan="7" class="text-center">No Data Found</th>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end my-3">
                        {!! $ourmember->links()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
