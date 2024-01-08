@extends('frontend.memDashboard.memberApp')
@section('memberContent')
        
<section class="py-0">
    <div class="row">
        <div class="col-12 member-service">
            <div class="card shadow-sm ">
                <div class="card-header mem-password">
                    <h5>Payment History</h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr class="text-center bg-danger text-white">
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('DATE ')}}</th>
                                <th scope="col">{{__('INVOICE ID')}}</th>
                                <th scope="col">{{__('PURPOSE')}}</th>
                                <th scope="col">{{__('AMOUNT')}}</th>
                                <th scope="col">{{__('Status')}}</th>
                                <th class="white-space-nowrap">{{__('Invoice') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $b)
                            <tr class="text-center">
                            <th scope="row">{{ ++$loop->index }}</th>
                                <td>{{date('d M,Y',strtotime($b->created_at))}}</td>
                                <td>{{$b->txnid}}</td>
                                <td>Due Payment</td>
                                <td>{{$b->amount}}</td>
                                @if($b->status == 1)
                                    <td class="text-danger fw-bold">Paid</td>
                                    <td>
                                        <a class="btn btn-sm btn-info text-white" href="#">Invoice</a>
                                        <a class="btn btn-sm btn-success text-white" href="#">Money Receipts</a>
                                    </td>
                                @elseif($b->status == 0)
                                    <td class="text-success fw-bold">Pending</td>
                                    <td>
                                        <a class="btn btn-sm btn-success" href="{{route('member.online_payment_invoice',$b->id)}}">view invoice</a>
                                    </td>
                                @else
                                    <td class="text-success fw-bold">Fail</td>
                                    <td></td>
                                @endif
                                
                            </tr>
                            @empty
                            <tr>
                                <th colspan="7" class="text-center">No Data Found</th>
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