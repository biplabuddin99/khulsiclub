
@extends('layout.app')

@section('pageTitle',trans('Create Video Gallery Caption'))
@section('pageSubTitle',trans('Create'))

@section('content')
  <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                                <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.vgallery.update',encryptor('encrypt',$videogallery->id))}}">
                                    @csrf
                                    @method('PATCH')
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="caption">Caption:</label>
                                            <input type="text" id="caption" class="form-control" value="{{ old('caption',$videogallery->caption)}}" name="caption">
                                            @if($errors->has('caption'))
                                                <span class="text-danger"> {{ $errors->first('caption') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="FeatureImage">Feature Image</label>
                                            <input type="file" id="FeatureImage" class="form-control"
                                                placeholder="FeatureImage" name="FeatureImage">
                                                <img width="50px" src="{{asset('uploads/vgallery_image/'.$videogallery->feature_image)}}" alt="">
                                                @if($errors->has('FeatureImage'))
                                                    <span class="text-danger"> {{ $errors->first('FeatureImage') }}</span>
                                                @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="videoId">Video Id:</label>
                                            <input type="text" class="form-control" id="videoId"
                                                placeholder="video Id" name="videoId" rows="3" value="{{ old('videoId',$videogallery->video_id )}}">
                                        </div>
                                    </div>


                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="publishedDate">Published Date</label>
                                            <input type="date" id="publishedDate" class="form-control" value="{{ old('publishedDate',$videogallery->publish_date)}}" name="publishedDate">
                                            @if($errors->has('publishedDate'))
                                                <span class="text-danger"> {{ $errors->first('publishedDate') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="unpublishedDate">Unpublished Date</label>
                                            <input type="date" id="unpublishedDate" class="form-control" value="{{ old('unpublishedDate',$videogallery->unpublished_date)}}" name="unpublishedDate">
                                            @if($errors->has('unpublishedDate'))
                                                <span class="text-danger"> {{ $errors->first('unpublishedDate') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <fieldset class="col-md-6 col-12">
                                        <legend class="col-form-label col-sm-2 pt-0">Status:</legend>
                                        <div class="col-sm-10">
                                          <input type="radio" value="1" {{$videogallery->status == '1' ? 'checked' : ''}} name="status"> Active
                                          &nbsp;
                                          <input type="radio" value="0" {{$videogallery->status == '0' ? 'checked' : ''}} name="status"> Inactive
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

