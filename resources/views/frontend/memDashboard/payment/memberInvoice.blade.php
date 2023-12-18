@extends('frontend.memDashboard.memberApp')
@section('memberContent')
        
<section class="py-0">
    <div class="row">
        <div class="col-12 member-service">
            <div class="card shadow-sm ">
                <div class="card-header mem-password">
                    <h5>Member Invoice</h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr class="text-center bg-danger text-white">
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('DATE ')}}</th>
                                <th scope="col">{{__('PURPOSE')}}</th>
                                <th scope="col">{{__('DUE AMOUNT')}}</th>
                                <th scope="col">{{__('Status')}}</th>
                                <th class="white-space-nowrap">{{__('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $b)
                            <tr class="text-center">
                            <th scope="row">{{ ++$loop->index }}</th>
                                <td>{{date('d M,Y',strtotime($b->invoice_date))}}</td>
                                <td>{{$b->purpose}}</td>
                                <td>{{$b->total_amount}}</td>
                                @if($b->status == 1)
                                    <td class="text-success fw-bold">Paid</td>
                                @elseif($b->status == 2)
                                    <td class="text-warning fw-bold">Request to check</td>
                                @else
                                    <td class="text-danger fw-bold">Pending</td>
                                @endif
                                <td><a class="btn btn-sm btn-danger" href="#">Pay Now</a></td>
                                
                            </tr>
                            @empty
                            <tr>
                                <th colspan="6" class="text-center">No Data Found</th>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{-- <div class="my-3">
                        {!! $data->links()!!}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section> 
@endsection