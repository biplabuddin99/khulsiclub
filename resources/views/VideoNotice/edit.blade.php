@extends('layout.app')

@section('pageTitle',trans('Update Video notice'))
@section('pageSubTitle',trans('Update'))

@section('content')
  <section id="multiple-column-form">
      <div class="row match-height">
          <div class="col-12">
              <div class="card">
                  <div class="card-content">
                      <div class="card-body">
                          <form class="form" method="post" action="{{route(currentUser().'.vNotice.update',encryptor('encrypt',$videoNotice->id))}}">
                              @csrf
                              @method('patch')
                                <div class="row mb-3">
                                    <div class="col-8 offset-2">
                                        <label for="text"><b>{{__('Title')}}<span class="text-danger">*</span></b></label>
                                        <input type="text" class="form-control" name="title" value="{{ old('title',$videoNotice->title)}}" required>
                                    </div>
                                    <div class="col-8 offset-2">
                                        <label for="text"><b>{{__('Video link for Notice')}}:</b></label>
                                        <input type="text" class="form-control" name="link" value="{{ old('link',$videoNotice->link)}}" required>
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