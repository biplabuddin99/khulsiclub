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
                    <h5>Pending Request</h5>
                    <div>
                        <a class="btn btn-sm btn-outline-danger" href="{{route('member.request')}}"><span>Change Request</span></a>
                     </div>
                     <div>
                        <a class="btn btn-sm btn-outline-danger" href="{{route('member.request_history')}}"><span>Request History</span></a>
                     </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr class="text-center bg-danger text-white">
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('Apply Date')}}</th>
                                <th scope="col">{{__('Member Name')}}</th>
                                <th scope="col">{{__('Change Type')}}</th>
                                <th scope="col">{{__('Status')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $b)
                            <tr class="text-center">
                            <th scope="row">{{ ++$loop->index }}</th>
                                <td>{{$b->date}}</td>
                                <td>{{$b->member?->full_name}}</td>
                                <td>
                                    <ul class="text-start">
                                        @foreach(explode(',', $b->change_type) as $type)
                                        <li>{{$type}}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="text-danger fw-bold">@if($b->status == 0) {{__('Pending') }} @else {{__('Approved') }} @endif</td>
                            </tr>
                            @empty
                            <tr>
                                <th colspan="5" class="text-center">No Data Found</th>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section> 
@endsection