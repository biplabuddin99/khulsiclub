@extends('layout.app')

@section('pageTitle',trans('Update Photo Gallery Category'))
@section('pageSubTitle',trans('Update'))

@section('content')
  <section id="multiple-column-form">
      <div class="row match-height">
          <div class="col-12">
              <div class="card">
                  <div class="card-content">
                      <div class="card-body">
                          <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.pGalleryCat.update',encryptor('encrypt',$pGalleryCat->id))}}">
                              @csrf
                              @method('patch')
                              <div class="row">
                                  <div class="col-md-6 col-12">
                                      <div class="form-group">
                                          <label for="name">{{__('Name')}}</label>
                                          <input type="text" id="name" value="{{ old('name',$pGalleryCat->name)}}" class="form-control"
                                              placeholder="Category Name" name="name">
                                      </div>
                                      @if($errors->has('category'))
                                      <span class="text-danger"> {{ $errors->first('category') }}</span>
                                      @endif
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-group">
                                          <label for="image">{{__('Feature Image')}}</label>
                                          <input type="file" id="feature_image" class="form-control"
                                              placeholder="feature image" name="feature_image">
                                      </div>
                                  </div>
                                  
                                  <div class="col-12 d-flex justify-content-end">
                                  <img width="80px" height="40px" class="float-first" src="{{asset('uploads/pGcategory/'.$pGalleryCat->feature_image)}}" alt="">
                                      <button type="submit" class="btn btn-primary me-1 mb-1">{{__('Save')}}</button>
                                      
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