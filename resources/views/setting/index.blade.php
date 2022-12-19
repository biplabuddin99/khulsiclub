@extends('layout.app')

@section('pageTitle',trans('Setting List'))
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
                            <a class="float-end" href="{{route(currentUser().'.settings.create')}}"style="font-size:1.7rem"><i class="bi bi-plus-square-fill"></i></a>
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">{{__('#SL')}}</th>
                                        <th scope="col">{{__('Contact')}}</th>
                                        <th scope="col">{{__('Address')}}</th>
                                        <th scope="col">{{__('Email')}}</th>
                                        <th scope="col">{{__('We Accept')}}</th>
                                        <th scope="col">{{__('Header logo')}}</th>
                                        <th scope="col">{{__('Footer logo')}}</th>
                                        <th scope="col">{{__('Footer1 Image')}}</th>
                                        <th scope="col">{{__('Footer2 Image')}}</th>
                                        <th scope="col">{{__('Footer3 Image')}}</th>
                                        <th class="white-space-nowrap">{{__('ACTION')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($settings as $s)
                                    <tr class="text-center">
                                    <th scope="row">{{ ++$loop->index }}</th>
                                        <td>{{$s->contact_no}}</td>
                                        <td>{{$s->address}}</td>
                                        <td>{{$s->email_address}}</td>
                                        <td><img width="80px" height="40px" class="float-first" src="{{asset('uploads/settings/'.$s->we_accept)}}" alt=""></td>
                                        <td><img width="80px" height="40px" class="float-first" src="{{asset('uploads/settings/'.$s->header_logo)}}" alt=""></td>
                                        <td><img width="80px" height="40px" class="float-first" src="{{asset('uploads/settings/'.$s->footer_logo)}}" alt=""></td>
                                        <td><img width="80px" height="40px" class="float-first" src="{{asset('uploads/settings/'.$s->footer_top_p1_image)}}" alt=""></td>
                                        <td><img width="80px" height="40px" class="float-first" src="{{asset('uploads/settings/'.$s->footer_top_p2_image)}}" alt=""></td>
                                        <td><img width="80px" height="40px" class="float-first" src="{{asset('uploads/settings/'.$s->footer_top_p3_image)}}" alt=""></td>
                                        <td class="white-space-nowrap">
                                            <a class="ebutton" href="{{route(currentUser().'.settings.edit',encryptor('encrypt',$s->id))}}">Edit</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <th colspan="11" class="text-center">No Data Found</th>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            
        </div>
    </section>
    <!-- Bordered table end -->
</div>

@endsection