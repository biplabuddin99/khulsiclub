@extends('layout.app')

@section('pageTitle',trans('Total Dues List'))
@section('pageSubTitle',trans('List'))

@section('content')


    <!-- Bordered table start -->
    <section class="section">
        <div class="row" id="table-bordered">
            <div class="col-12">
                <div class="card">
                        <!-- table bordered -->
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                            <a class="float-end" href="{{route(currentUser().'.tdue.create')}}"style="font-size:1.7rem"><i class="bi bi-plus-square-fill"></i></a>
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">{{__('#SL')}}</th>
                                        <th scope="col">{{__('Member Type')}}</th>
                                        <th scope="col">{{__('Member Name')}}</th>
                                        <th scope="col">{{__('Membership code')}}</th>
                                        <th scope="col">{{__('2016')}}</th>
                                        <th scope="col">{{__('2017')}}</th>
                                        <th scope="col">{{__('2018')}}</th>
                                        <th scope="col">{{__('2019')}}</th>
                                        <th scope="col">{{__('2020')}}</th>
                                        <th scope="col">{{__('2021')}}</th>
                                        <th scope="col">{{__('10% Interest in Subscription')}}</th>
                                        <th scope="col">{{__('Land Development Fee Dues 10% Interest')}}</th>
                                        <th scope="col">{{__('Land Development Fee Due')}}</th>
                                        <th class="white-space-nowrap">{{__('ACTION')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $mt=array("","Founder Member","Life Member","Permanent Member","Permanent Terminated Member"); @endphp
                                    @forelse($data as $m)
                                    <tr class="text-center">
                                    <th scope="row">{{ ++$loop->index }}</th>
                                        <td>{{$mt[$m->member_type]}}</td>
                                        <td>{{$m->member_name}}</td>
                                        <td>{{$m->membership_code}}</td>
                                        <td>{{$m->y2016}}</td>
                                        <td>{{$m->y2017}}</td>
                                        <td>{{$m->y2018}}</td>
                                        <td>{{$m->y2019}}</td>
                                        <td>{{$m->y2020}}</td>
                                        <td>{{$m->y2021}}</td>
                                        <td>{{$m->subscription_interest}}</td>
                                        <td>{{$m->land_interest}}</td>
                                        <td>{{$m->land_developmnet_fee}}</td>
                                        
                                        <td class="white-space-nowrap">
                                            <a class="btn btn-sm btn-success" href="{{route(currentUser().'.tdue.edit',encryptor('encrypt',$m->id))}}">Edit</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <th colspan="14" class="text-center">No Data Found</th>
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