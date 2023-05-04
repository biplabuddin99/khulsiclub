@extends('layout.app')

@section('pageTitle',trans('Create District'))
@section('pageSubTitle',trans('Create'))

@section('content')
  <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" action="{{route(currentUser().'.district.store')}}">
                                @csrf
                                <div class="row">
                                    
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="division_id">Division<span class="text-danger">*</span></label>
                                            <select required class="form-control form-select" name="division_id" id="division_id">
                                                <option value="">Select Division</option>
                                                @forelse($divisions as $d)
                                                    <option value="{{$d->id}}" {{ old('division_id')==$d->id?"selected":""}}> {{ $d->name}}</option>
                                                @empty
                                                    <option value="">No Division found</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="districtName">District Name<span class="text-danger">*</span></label>
                                            <input required type="text" id="districtName" class="form-control" value="{{ old('districtName')}}" name="districtName">
                                            @if($errors->has('districtName'))
                                                <span class="text-danger"> {{ $errors->first('districtName') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="districtBn">District Bangla</label>
                                            <input type="text" id="districtBn" class="form-control" value="{{ old('districtBn')}}" name="districtBn">
                                        </div>
                                    </div>
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
