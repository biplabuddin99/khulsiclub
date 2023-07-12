@extends('layout.app')

@section('pageTitle',trans('Update Payment'))
@section('pageSubTitle',trans('update'))

@section('content')
  <section id="multiple-column-form">
      <div class="row match-height">
          <div class="col-12">
              <div class="card">
                  <div class="card-content">
                      <div class="card-body">
                          <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.payment.update',encryptor('encrypt',$payments->id))}}">
                              @csrf
                              @method('patch')
                              <div class="row mb-3">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="member">Member</label>
                                        <select name="member_id" class="form-control form-select">
                                                <option value="">Select Member</option>
                                            @forelse ($members as $m)
                                                <option value="{{$m->id}}" {{ old('member_id',$payments->member_id)=="$m->id"?"selected":""}}>{{$m->full_name}}</option>
                                            @empty
                                                <option value="">No Data Found</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="purpose">Payment Purpose</label>
                                        <select name="purpose_id" class="form-control form-select">
                                                <option value="">Select</option>
                                            @forelse ($ppurpose as $m)
                                                <option value="{{$m->id}}" {{ old('purpose_id',$payments->purpose_id)=="$m->id"?"selected":""}}>{{$m->purpose}}</option>
                                            @empty
                                                <option value="">No Data Found</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control form-select">
                                            <option value="">Select</option>
                                            <option value="0" {{old('status',$payments->status)=="0"?"selected":""}}>Pending</option>
                                            <option value="1" {{old('status',$payments->status)=="1"?"selected":""}}>Paid</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-info me-1 mb-1">{{__('Update')}}</button>
                            </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
@endsection