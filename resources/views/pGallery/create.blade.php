@extends('layout.app')
@section('pageTitle',trans('Create Photo Gallery'))
@section('pageSubTitle',trans('Create'))
@push("styles")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css">
@endpush
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
                                <label for="date" class="col-sm-2 offset-1 col-form-label"><b>{{__('Album')}}<span class="text-danger">*</span></b></label>
                                <div class="col-sm-6 offset-1">
                                    <select class="form-control form-select" name="album" id="album" required>
                                        <option value="">Select Album</option>
                                        @forelse($pGalleryCat as $d)
                                            <option value="{{$d->id}}" {{ old('album')==$d->id?"selected":""}}> {{ $d->name}}</option>
                                        @empty
                                            <option value="">No Data found</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="status" class="col-sm-2 offset-1 col-form-label"><b>{{__('Status')}}<span class="text-danger">*</span></b></label>
                                <div class="col-sm-6 offset-1">
                                    <select class="form-control form-select" value="{{ old('status')}}" name="status" required>
                                    <option value="">Select Status</option>
                                        <option value="0">Inactive</option>
                                        <option value="1">Active</option>
                                </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 offset-1 col-form-label"><b>{{__('Gallery Photo')}}:</b></label>
                                <div class="col-sm-6 offset-1">
                                    <div id="dropzone" class="dropzone"></div>
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
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
<script>
    // Initialize Dropzone
    Dropzone.options.dropzone = {
        url: "{{ route(currentUser().'.pGallery.store') }}",
        paramName: "feature_image", // Name of the input field
        maxFilesize: 2, // Maximum file size in MB
        acceptedFiles: ".jpg,.jpeg,.png", // Accepted file types
        addRemoveLinks: true, // Show remove links
        dictDefaultMessage: "Drag and drop an image here or click to upload",
        success: function (file, response) {
            // Handle successful upload here
        },
        error: function (file, errorMessage) {
            // Handle error here
        },
        sending: function(file, xhr, formData) {
            console.log('Sending file:', file);
        },
    };
    </script>
@endpush