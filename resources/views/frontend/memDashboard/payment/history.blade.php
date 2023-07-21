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
                <div class="card-header mem-password">
                    <h5>Payemnt History</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr class="text-center bg-danger text-white">
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('DATE ')}}</th>
                                <th scope="col">{{__('INVOICE ID')}}</th>
                                <th scope="col">{{__('PURPOSE')}}</th>
                                <th scope="col">{{__('AMOUNT')}}</th>
                                <th scope="col">{{__('Status')}}</th>
                                <th class="white-space-nowrap">{{__('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $b)
                            <tr class="text-center">
                            <th scope="row">{{ ++$loop->index }}</th>
                                <td>{{$b->apply_date}}</td>
                                <td>{{$b->invoice_id}}</td>
                                <td>{{$b->ppurpose?->purpose}}</td>
                                <td>{{$b->ppurpose?->amount}}</td>
                                {{-- <td class="text-warning fw-bold">@if($b->status == 0) {{__('Pending') }} @else {{__('Paid') }} @endif</td> --}}
                                @if($b->status == 0)
                                    <td class="text-danger fw-bold">Pending</td>
                                @else
                                    <td class="text-success fw-bold">Paid</td>
                                @endif
                                <td>
                                    <a class="btn btn-sm btn-info text-white" href="#">Invoice</a>
                                    @if($b->status == 0)
                                        <a class="btn btn-sm btn-success text-white" href="#">Check Out</a>
                                    @else
                                        <a class="btn btn-sm btn-success text-white" href="#">Money Receipts</a>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <th colspan="5" class="text-center">No Data Found</th>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="my-3">
                        {!! $data->links()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 
@endsection