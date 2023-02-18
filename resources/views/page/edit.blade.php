@extends('layout.app')

@section('pageTitle',trans('Update page'))
@section('pageSubTitle',trans('Update'))

@section('content')
  <section id="multiple-column-form">
      <div class="row match-height">
          <div class="col-12">
              <div class="card">
                  <div class="card-content">
                      <div class="card-body">
                          <form class="form" method="post" action="{{route(currentUser().'.page.update',encryptor('encrypt',$page->id))}}">
                              @csrf
                              @method('patch')
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="title"><b>{{__('Title')}}:</b></label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" id="title" value="{{ old('title',$page->page_title)}}" class="form-control"
                                            placeholder="Post title" name="title">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="details"><b>{{__('Details')}}:</b></label>
                                    </div>
                                    <div class="col-12">
                                        <textarea name="details" class="form-control ckeditor" id="Ck"  rows="5">{{ old('details',$page->details)}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="published"><b>{{__('Published')}}:</b></label>
                                    </div>
                                    <div class="col-12">
                                        <select class="form-control form-select" value="{{ old('published')}}" name="published" required>
                                            <option value="">Select Published</option>
                                            <option value="1" {{ old('published',$page->published)=="1"?"selected":""}}>Show</option>
                                            <option value="0" {{ old('published',$page->published)=="0"?"selected":""}}>Hide</option>
                                        </select>
                                    </div>
                                </div>
                                  
                                <div class="col-12 d-flex justify-content-end">
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
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
            .create( document.querySelector( '.ckeditor' ),{
                ckfinder: {
                    uploadUrl: '{{route('image.upload').'?_token='.csrf_token()}}',
                }
            })
            .then( editor => {
                editor.ui.view.editable.element.style.height = '500px';
                
            } )
            .catch( error => {
                console.error( error );
            } );

    // ClassicEditor.create( document.querySelector( '.ckeditor' ) )
    //     .then( editor => {
    //         editor.ui.view.editable.element.style.height = '500px';
    //     } )
    //     .catch( error => {
    //         console.error( error );
    //     } );
    
</script>

@endpush

