@extends('layout.app')

@section('pageTitle',trans('Photo Gallery Category List'))
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
                            <a class="float-end" href="{{route(currentUser().'.pGalleryCat.create')}}"style="font-size:1.7rem"><i class="bi bi-plus-square-fill"></i></a>
                                <thead>
                                    <tr>
                                        <th scope="col">{{__('#SL')}}</th>
                                        <th scope="col">{{__('Name')}}</th>
                                        <th scope="col">{{__('Feature Image')}}</th>
                                        <th class="white-space-nowrap">{{__('ACTION')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($pGalleryCat as $cat)
                                    <tr>
                                    <th scope="row">{{ ++$loop->index }}</th>
                                        <td>{{$cat->name}}</td>
                                        <td><img width="80px" height="40px" class="float-first" src="{{asset('uploads/pGcategory/'.$cat->feature_image)}}" alt=""></td>
                                        <td class="white-space-nowrap">
                                            <a href="{{route(currentUser().'.pGalleryCat.edit',encryptor('encrypt',$cat->id))}}">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <th colspan="4" class="text-center">No Category Found</th>
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