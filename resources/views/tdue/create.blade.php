@extends('layout.app')

@section('pageTitle',trans('Create Total Dues'))
@section('pageSubTitle',trans('Create'))

@section('content')
  <section id="multiple-column-form">
      <div class="row match-height">
          <div class="col-12">
              <div class="card">
                  <div class="card-content">
                      <div class="card-body">
                          <form class="form" method="post" action="{{route(currentUser().'.tdue.store')}}">
                              @csrf
                                <div class="row"> 
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="mtype">Member Type</label>
                                            <select class="form-control form-select" name="member_type">
                                                <option value="">Select Member Type</option>
                                                <option value="1">Founder Members</option>
                                                <option value="2">Life Member</option>
                                                <option value="3">Permanent Member</option>
                                                <option value="4">Permanent Terminated Member</option>
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Member Name</label>
                                            <input type="text"class="form-control" value="{{ old('member_name')}}" name="member_name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email"class="form-control" value="{{ old('email')}}" name="email">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Contact</label>
                                            <input type="text"class="form-control" value="{{ old('contact')}}" name="contact">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Address</label>
                                            <textarea class="form-control" name="address"  rows="2">{{ old('address')}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="mtype">Status</label>
                                            <select class="form-control form-select" name="status">
                                                <option value="">Select member status</option>
                                                <option value="1">Active</option>
                                                <option value="2">Inactive</option>
                                                <option value="3">Terminated</option>
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for=""> Membership Code</label>
                                            <input type="text"class="form-control" value="{{ old('membership_code')}}" name="membership_code">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="">2016</label>
                                            <input type="text"class="form-control" value="{{ old('y2016')}}" name="y2016">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="">2017</label>
                                            <input type="text"class="form-control" value="{{ old('y2017')}}" name="y2017">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="">2018</label>
                                            <input type="text"class="form-control" value="{{ old('y2018')}}" name="y2018">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="">2019</label>
                                            <input type="text"class="form-control" value="{{ old('y2019')}}" name="y2019">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="">2020</label>
                                            <input type="text"class="form-control" value="{{ old('y2020')}}" name="y2020">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="">2021</label>
                                            <input type="text"class="form-control" value="{{ old('y2021')}}" name="y2021">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="">10% Interest in Subscription</label>
                                            <input type="text"class="form-control" value="{{ old('subscription_interest')}}" name="subscription_interest">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Land Development Fee Dues 10% Interest</label>
                                            <input type="text"class="form-control" value="{{ old('land_interest')}}" name="land_interest">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Land Development Fee Due</label>
                                            <input type="text"class="form-control" value="{{ old('land_developmnet_fee')}}" name="land_developmnet_fee">
                                        </div>
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
@endsection





