@extends('layout.app')

@section('pageTitle',trans('Photo Gallery List'))
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
                            <a class="float-end" href="{{route(currentUser().'.pGallery.create')}}"style="font-size:1.7rem"><i class="bi bi-plus-square-fill"></i></a>
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">{{__('#SL')}}</th>
                                        <th scope="col">{{__('Caption')}}</th>
                                        <th scope="col">{{__('Publish Date')}}</th>
                                        <th scope="col">{{__('Unpublish Date')}}</th>
                                        <th scope="col">{{__('Feature Image')}}</th>
                                        <th scope="col">{{__('Status')}}</th>
                                        <th class="white-space-nowrap">{{__('ACTION')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($pGallery as $cat)
                                    <tr class="text-center">
                                    <th scope="row">{{ ++$loop->index }}</th>
                                        <td>{{$cat->Caption}}</td>
                                        <td>{{$cat->publish_date}}</td>
                                        <td>{{$cat->unpublish_date}}</td>
                                        <td><img width="80px" height="40px" class="float-first" src="{{asset('uploads/pGgallery/'.$cat->feature_image)}}" alt=""></td>
                                        <td>{{ $cat->status == 1?"Active":"Inactive" }}</td>
                                        <td class="white-space-nowrap">
                                            <a class="ebutton" href="{{route(currentUser().'.pGallery.edit',encryptor('encrypt',$cat->id))}}">Edit</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <th colspan="6" class="text-center">No Data Found</th>
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