
@extends('layout.app')

@section('pageTitle',trans('Create Video Gallery Category'))
@section('pageSubTitle',trans('Create'))

@section('content')
  <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.vgalleryCat.store')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="name">Name:</label>
                                            <input type="text" id="name" class="form-control" value="{{ old('name')}}" name="name">
                                            @if($errors->has('name'))
                                                <span class="text-danger"> {{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="FeatureImage">Feature Image</label>
                                            <input type="file" id="FeatureImage" class="form-control"
                                                placeholder="FeatureImage" name="FeatureImage">
                                                @if($errors->has('FeatureImage'))
                                                    <span class="text-danger"> {{ $errors->first('FeatureImage') }}</span>
                                                @endif
                                        </div>
                                    </div>

                                    <fieldset class="col-md-6 col-12">
                                        <legend class="col-form-label col-sm-2 pt-0">Status:</legend>
                                        <div class="col-sm-10">
                                          <input type="radio" value="1" name="status" checked> Active
                                          &nbsp;
                                          <input type="radio" value="0" name="status"> Inactive
                                        </div>
                                      </fieldset>
                                </div>
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Save</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
</div>
@endsection

