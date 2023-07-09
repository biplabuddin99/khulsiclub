@extends('frontend.memDashboard.memberApp')
@section('memberContent')
        
<section class="py-0">
    <div class="row">
        <div class="col-12 member-service">
            <div class="card shadow-sm ">
                <div class="card-header mem-password">
                    <h5>Bank List</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr class="text-center bg-danger text-white">
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('Bank Name')}}</th>
                                <th scope="col">{{__('Branch Name')}}</th>
                                <th scope="col">{{__('Account No')}}</th>
                                <th scope="col">{{__('Routing No')}}</th>
                                <th scope="col">{{__('Account Name')}}</th>
                                <th scope="col">{{__('Logo')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($bank as $b)
                            <tr class="text-center">
                            <th scope="row">{{ ++$loop->index }}</th>
                                <td>{{$b->name_of_bank}}</td>
                                <td>{{$b->branch_name}}</td>
                                <td>{{$b->account_number}}</td>
                                <td>{{$b->routing_number}}</td>
                                <td>{{$b->account_name}}</td>
                                <td><img width="80px" height="40px" class="float-first" src="{{asset('uploads/banklogo/'.$b->logo)}}" alt="logo"></td>
                            </tr>
                            @empty
                            <tr>
                                <th colspan="7" class="text-center">No Data Found</th>
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