@extends('layout.app')
@section('pageTitle',trans('Document View'))
@section('pageSubTitle',trans('List'))

@section('content')
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="row">
                    <div class="col-4 text-center">
                        @if($show_data->image != '')
                            <label for="">Member Image</label><br>
                            <img class="m-2" src="{{ asset('uploads/member_image/'.$show_data->image) }}" width="120px" height="140px" alt="No image found">
                            <br>
                            <a class="p-2" href="{{ asset('uploads/member_image/'.$show_data->image) }}" download>
                                <button class="btn btn-sm btn-danger">Download</button>
                            </a>
                        @endif
                    </div>
                    <div class="col-4 text-center">
                        @if($show_data->nominee_photo != '')
                            <label for="">Nominee Image</label><br>
                            <img class="m-2" src="{{asset('uploads/nominee/'.$show_data->nominee_photo)}}" width="120px" height="140px" alt="No image found">
                            <br>
                            <a class="p-2" href="{{asset('uploads/nominee/'.$show_data->nominee_photo)}}" download>
                                <button class="btn btn-sm btn-danger">Download</button>
                            </a>
                        @endif
                    </div>
                    <div class="col-4 text-center">
                        @if($show_data->nid != '')
                            <label for="">Nid</label><br>
                            <img class="m-2" src="{{asset('uploads/nid/'.$show_data->nid)}}" width="120px" height="140px" alt="No image found">
                            <br>
                            <a class="p-2" href="{{asset('uploads/nid/'.$show_data->nid)}}" download>
                                <button class="btn btn-sm btn-danger">Download</button>
                            </a>
                        @endif
                    </div>
                    <div class="col-4 text-center">
                        @if($show_data->passport != '')
                            <label for="">Passport</label><br>
                            <img class="m-2" src="{{asset('uploads/passport/'.$show_data->passport)}}" width="120px" height="140px" alt="No image found">
                            <br>
                            <a class="p-2" href="{{asset('uploads/passport/'.$show_data->passport)}}" download>
                                <button class="btn btn-sm btn-danger">Download</button>
                            </a>
                        @endif
                    </div>
                    <div class="col-4 text-center">
                        @if($show_data->etin != '')
                            <label for="">E-Tin</label><br>
                            <img class="m-2" src="{{asset('uploads/etin/'.$show_data->etin)}}" width="120px" height="140px" alt="No image found">
                            <br>
                            <a class="p-2" href="{{asset('uploads/etin/'.$show_data->etin)}}" download>
                                <button class="btn btn-sm btn-danger">Download</button>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection