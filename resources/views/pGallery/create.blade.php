@extends('layout.app')

@section('pageTitle',trans('Create Photo Gallery'))
@section('pageSubTitle',trans('Create'))

@section('content')
  <section id="multiple-column-form">
      <div class="row match-height">
          <div class="col-12">
              <div class="card">
                  <div class="card-content">
                      <div class="card-body">
                          <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.pGallery.store')}}">
                            @csrf
                            <div class="row mb-3">
                                <label for="Caption" class="col-sm-2 offset-1 col-form-label"><b>{{__('Caption')}}:</b></label>
                                <div class="col-sm-6 offset-1">
                                    <input type="text" value="{{ old('Caption')}}" class="form-control"
                                        placeholder="Caption" name="Caption">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="date" class="col-sm-2 offset-1 col-form-label"><b>{{__('Publish Date')}}:</b></label>
                                <div class="col-sm-6 offset-1">
                                    <input type="date" value="{{ old('publish_date')}}" class="form-control"
                                        placeholder="Publish date" name="publish_date">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="date" class="col-sm-2 offset-1 col-form-label"><b>{{__('Unpublish Date')}}:</b></label>
                                <div class="col-sm-6 offset-1">
                                    <input type="date" value="{{ old('unpublish_date')}}" class="form-control"
                                        placeholder="Unpublish date" name="unpublish_date">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="status" class="col-sm-2 offset-1 col-form-label"><b>{{__('Status')}}:</b></label>
                                <div class="col-sm-6 offset-1">
                                    <select class="form-control form-select" value="{{ old('status')}}" name="status">
                                    <option value="">Select Status</option>
                                        <option value="0">Inactive</option>
                                        <option value="1">Active</option>
                                </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 offset-1 col-form-label"><b>{{__('Feature Image')}}:</b></label>
                                <div class="col-sm-6 offset-1">
                                    <input type="file" id="feature_image" class="form-control"
                                        placeholder="feature image" name="feature_image">
                                </div>
                            </div>
                            
                            <div class="col-8 offset-2 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">{{__('Save')}}</button>
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