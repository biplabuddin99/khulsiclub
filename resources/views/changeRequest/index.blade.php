@extends('layout.app')

@section('pageTitle',trans('Change Request List'))
@section('pageSubTitle',trans('List'))

@section('content')
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('Apply Date')}}</th>
                                <th scope="col">{{__('Member Name')}}</th>
                                <th scope="col">{{__('Change Type')}}</th>
                                <th scope="col">{{__('Change Requests')}}</th>
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
                                {{-- <td>
                                    <ul class="text-start">
                                        @if ($b->mobile != null)
                                        <li><b>Mobile No:</b> {{$b->mobile}}</li>
                                        @else
                                        @endif

                                        @if ($b->email != null)
                                        <li><b>Email:</b> {{$b->email}}</li>
                                        @else
                                        @endif

                                        @if ($b->address != null)
                                        <li><b>Address:</b> {{$b->address}}</li>
                                        @else
                                        @endif

                                        @if ($b->member_type != null)
                                        <li><b>Member Type:</b> {{$b->member_type}}</li>
                                        @else
                                        @endif
                                    </ul>
                                </td> --}}
                                <td>
                                    <table class="table">
                                        @if ($b->mobile != null)
                                        <tr class="text-start">
                                            <th>Mobile No:</th>
                                            <td>{{$b->mobile}}</td>
                                        </tr>
                                        @else
                                        @endif

                                        @if ($b->email != null)
                                        <tr class="text-start">
                                            <th>Email:</th>
                                            <td>{{$b->email}}</td>
                                        </tr>
                                        @else
                                        @endif
                                        
                                        @if ($b->address != null)
                                        <tr class="text-start">
                                            <th>Address:</th>
                                            <td>{{$b->address}}</td>
                                        </tr>
                                        @else
                                        @endif

                                        @if ($b->member_type != null)
                                        <tr class="text-start">
                                            <th>Member Type:</th>
                                            <td>{{$b->member_type}}</td>
                                        </tr>
                                        @else
                                        @endif
                                    </table>
                                </td>
                                <td >@if($b->status == 0) {{__('Pending') }} @else {{__('Approved') }} @endif</td>
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