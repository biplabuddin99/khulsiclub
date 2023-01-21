@extends('layout.app')

@section('pageTitle',trans('Create Benefit'))
@section('pageSubTitle',trans('Create'))

@section('content')
  <section id="multiple-column-form">
      <div class="row match-height">
          <div class="col-12">
              <div class="card">
                  <div class="card-content">
                      <div class="card-body">
                          <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.benefit.store')}}">
                              @csrf
                                  <div class="row mb-3">
                                      <label for="benefit" class="col-sm-2 offset-1 col-form-label text-end"><b>{{__('Benefit')}}:</b></label>
                                      <div class="col-sm-6 offset-1 m-0">
                                          <input type="text" id="benefit" value="{{ old('benefit')}}" class="form-control"
                                              placeholder="Benefit" name="benefit">
                                      </div>
                                  </div>
                                  <div class="col-6 offset-3 d-flex justify-content-end">
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