@extends('layout.app')

@section('pageTitle',trans('Payment List'))
@section('pageSubTitle',trans('List'))

@section('content')


    <!-- Bordered table start -->
    <section class="section">
        <div class="row" id="table-bordered">
            <div class="col-12">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                        <a class="float-end" href="{{route(currentUser().'.payment.create')}}"style="font-size:1.7rem"><i class="bi bi-plus-square-fill"></i></a>
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">{{__('#SL')}}</th>
                                    <th scope="col">{{__('Date')}}</th>
                                    <th scope="col">{{__('Member Name')}}</th>
                                    <th scope="col">{{__('Invoice ID')}}</th>
                                    <th scope="col">{{__('Purpose')}}</th>
                                    <th scope="col">{{__('Amount')}}</th>
                                    <th scope="col">{{__('Status')}}</th>
                                    <th class="white-space-nowrap">{{__('ACTION')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data as $b)
                                <tr class="text-center">
                                <th scope="row">{{ ++$loop->index }}</th>
                                    <td>{{$b->apply_date}}</td>
                                    <td>{{$b->member?->full_name}}</td>
                                    <td>{{$b->invoice_id}}</td>
                                    <td>{{$b->ppurpose?->purpose}}</td>
                                    <td>{{$b->ppurpose?->amount}}</td>
                                    <td>{{ $b->status == 0?"Pending":"Paid" }}</td>
                                    <td class="white-space-nowrap">
                                        <a href="{{route(currentUser().'.payment.edit',encryptor('encrypt',$b->id))}}">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a class="text-danger" href="javascript:void()" onclick="$('#form{{$b->id}}').submit()">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        <form id="form{{$b->id}}" onsubmit="return confirm('Are you sure?')" action="{{route(currentUser().'.payment.destroy',encryptor('encrypt',$b->id))}}" method="post">
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
                        <div class="my-3">
                            {!! $data->links()!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection