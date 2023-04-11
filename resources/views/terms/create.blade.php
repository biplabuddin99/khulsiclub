@extends('layout.app')

@section('pageTitle',trans('Create Terms & Condition'))
@section('pageSubTitle',trans('Create'))

@section('content')
  <section id="multiple-column-form">
      <div class="row match-height">
          <div class="col-12">
              <div class="card">
                  <div class="card-content">
                      <div class="card-body">
                          <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.terms.store')}}">
                              @csrf
                                <div class="row mb-3">
                                    <div class="col-lg-12">
                                    <label for="title"><b>{{__('Title')}}:</b></label>
                                    <input type="text" id="title" value="{{ old('title')}}" class="form-control" name="title" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-12">
                                    <label for="terms"><b>{{__('Terms & Condition')}}:</b></label>
                                    <textarea name="terms" id="default" class="form-control">{{old('terms')}}</textarea>
                                    </div>
                                </div>
                                
                                <div class="col-lg-12 d-flex justify-content-end">
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
@push('scripts')
<script src="{{ asset('/assets/extensions/tinymce/tinymce.min.js')}}"></script>
<script src="{{ asset('/assets/js/pages/tinymce.js')}}"></script>
@endpush