@extends('layout.app')

@section('pageTitle',trans('Update Member'))
@section('pageSubTitle',trans('Create'))

@section('content')
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                @if(Session::has('response'))
                    {!!Session::get('response')['message']!!}
                @endif
                <div class="card-content">
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data" action="{{route(currentUser().'.ourMember.update',encryptor('encrypt',$member->id))}}">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="uptoken" value="{{encryptor('encrypt',$member->id)}}">
                            <div class="steps progress-tabmenu d-flex flex-column">
                                <ul class="nav nav-pills mt-3 mb-5" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link step-1-tab active" id="step-1-tab" data-toggle="pill" href="#step-1" role="tab" aria-controls="step-1" aria-selected="true"><span>1</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link step-2-tab" id="step-2-tab" data-toggle="pill" href="#step-2" role="tab" aria-controls="step-2" aria-selected="false"><span>2</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link step-3-tab" id="step-3-tab" data-toggle="pill" href="#step-3" role="tab" aria-controls="step-3" aria-selected="false"><span>3</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link step-4-tab" id="step-4-tab" data-toggle="pill" href="#step-4" role="tab" aria-controls="step-4" aria-selected="false"><span>4</span></a>
                                    </li>
                                </ul>
                                <div class="text-end">
                                    <button type="button" class="btn btn-sm btn-info text-white">Save as Draft</button>
                                </div>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="step-1" role="tabpanel" aria-labelledby="step-1-tab">
                                        <!-- Step 1 -->
                                        <div class="section-heading">
                                            <h5 class="text-uppercase m-0"><b>Personal Information</b></h5>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="givenName">Given Name</label>
                                                    <input type="text" id="givenName" class="form-control" value="{{ old('given_name',$member->given_name)}}" name="given_name">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="surname">Surname</label>
                                                    <input type="text" id="surname" class="form-control" value="{{ old('surname',$member->surname)}}" name="surname">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="Fathers">Father's Name:</label>
                                                    <input type="text" id="Fathers" class="form-control" value="{{ old('Fathers',$member->father_name)}}" name="Fathers">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="mothersName">Mother's Name:</label>
                                                    <input type="text" id="mothersName" class="form-control" value="{{ old('mothersName',$member->mother_name)}}" name="mothersName">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label class="pb-2" for="mothersName">Marital Status</label><br>
                                                    <input type="radio"  name="marit_status" value="0" {{ old('marit_status',$member->marital_status)=="0" ? "checked":"" }}>
                                                    <label for="">Single</label>
                                                    <input type="radio"  name="marit_status" value="1" {{ old('marit_status',$member->marital_status)=="1" ? "checked":"" }}>
                                                    <label for="">Married</label>
                                                </div>
                                            </div>
                                            {{-- <div class="col-lg-4 col-sm-6 col-md-12">
                                                <fieldset>
                                                    <legend>Marital Status</legend>
                                                    <input type="radio"  name="marit_status" value="0" {{ old('marit_status',$member->marital_status)=="0" ? "checked":"" }}>
                                                    <label for="">Single</label>
                                                    <input type="radio"  name="marit_status" value="1" {{ old('marit_status',$member->marital_status)=="1" ? "checked":"" }}>
                                                    <label for="">Married</label>
                                                </fieldset>
                                            </div> --}}
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="anniversary">Anniversary:</label>
                                                    <input type="text" id="anniversary" class="form-control" value="{{ old('anniversary',$member->anniversary)}}" name="anniversary">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="">Spouse Name:</label>
                                                    <input type="text" class="form-control" value="{{ old('namespouse',$member->name_of_spouse)}}" name="namespouse">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="professionOfSpouse">Profession:</label>
                                                    <input type="text" class="form-control" value="{{ old('occupation_spouse',$member->occupation_of_spouse)}}" name="occupation_spouse">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="dateOfBirth">Date of Birth:</label>
                                                    <input type="date" id="dateOfBirth" class="form-control" value="{{ old('dateOfBirth',$member->birth_date)}}" name="dateOfBirth">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="placeOfBirth">Place:</label>
                                                    <input type="text" class="form-control" value="{{ old('placeOfBirth',$member->place_of_birth)}}" name="placeOfBirth">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="cellno">Cell No:</label>
                                                    <input type="text" id="cellno" class="form-control" value="{{ old('cellno',$member->cell_number)}}" name="cellno">
                                                        @if($errors->has('cellno'))
                                                            <span class="text-danger"> {{ $errors->first('cellno') }}</span>
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="tel">Tel:</label>
                                                    <input type="text" id="tel" class="form-control" value="{{ old('tel',$member->tel_number)}}" name="tel">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group">
                                                    <label for="email">E-mail:</label>
                                                    <input type="email" class="form-control" value="{{ old('emailAddress',$member->email)}}" name="emailAddress">
                                                        @if($errors->has('emailAddress'))
                                                            <span class="text-danger"> {{ $errors->first('emailAddress') }}</span>
                                                        @endif
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="nationality">Nationality:</label>
                                                    <input type="text" id="nationality" class="form-control" value="{{ old('nationality',$member->nationality)}}" name="nationality">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="nid">National ID No:</label>
                                                    <input type="text" class="form-control" value="{{ old('nationalid',$member->national_id)}}" name="nationalid">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="passportno">Passport No:</label>
                                                    <input type="text" class="form-control" value="{{ old('passportNo',$member->passport_no)}}" name="passportNo">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="bloodGroup">Blood Group:</label>
                                                        <select class="form-control form-select" name="bloodGroup" id="blood">
                                                            <option value="">Select Blood Group</option>
                                                            <option value="A+" {{ old('patientBlood',$member->blood_group)=='A+' ? 'selected':''}}>A+</option>
                                                            <option value="A-"{{ old('patientBlood',$member->blood_group)=='A-' ? 'selected':''}}>A-</option>
                                                            <option value="B+"{{ old('patientBlood',$member->blood_group)=='B+' ? 'selected':''}}>B+</option>
                                                            <option value="B-"{{ old('patientBlood',$member->blood_group)=='B-' ? 'selected':''}}>B-</option>
                                                            <option value="O+"{{ old('patientBlood',$member->blood_group)=='O+' ? 'selected':''}}>O+</option>
                                                            <option value="O-"{{ old('patientBlood',$member->blood_group)=='O-' ? 'selected':''}}>O-</option>
                                                            <option value="AB+"{{ old('patientBlood',$member->blood_group)=='AB+' ? 'selected':''}}>AB+</option>
                                                            <option value="AB-"{{ old('patientBlood',$member->blood_group)=='AB-' ? 'selected':''}}>AB-</option>
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="qualification">Educational Qualifications:</label>
                                                    <input type="text" id="qualification" class="form-control" value="{{ old('qualification',$member->qualification)}}" name="qualification">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="namOfInstitution">Institution Name:</label>
                                                    <input type="text" class="form-control" value="{{ old('namOfInstitution',$member->name_of_institute)}}" name="namOfInstitution">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="tinNo">e- TIN No:</label>
                                                    <input type="text" class="form-control" value="{{ old('tinNo',$member->e_tin_number)}}" name="tinNo">
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="col-lg-12 col-sm-12 col-md-12 d-flex justify-content-end">
                                            <button type="button" class="btn btn-sm btn-info text-white me-2">Save as Draft</button>
                                            <button type="button" class="btn btn-danger next-step">Next</button>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="step-2" role="tabpanel" aria-labelledby="step-2-tab">
                                        <!-- Step 2 -->
                                        <div class="row">
                                            <div>
                                                <h6><b>Present Address</b></h6>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12 d-none">
                                                <div class="form-group py-2">
                                                    <label for="vill">House/Village</label>
                                                    <input type="text" class="form-control" id="presentVillage" value="{{ old('vill',$member->village)}}" name="vill">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12 d-none">
                                                <div class="form-group py-2">
                                                    <label for="block">Road/Block/Sector</label>
                                                    <input type="text" class="form-control" id="presentBlock" value="{{ old('block',$member->block)}}" name="block">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="address">Address</label>
                                                    <input type="text" class="form-control" id="presentAddress" value="{{ old('address',$member->address)}}" name="address">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="policeStation">Police Station:</label>
                                                    <input type="text" class="form-control" id="presentPoliceStation" value="{{ old('policeStation',$member->police_station)}}" name="policeStation">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="postoffice">Post Office:</label>
                                                    <input type="text" class="form-control" id="presentPostOffice" value="{{ old('postoffice',$member->post_office)}}" name="postoffice">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="postcode">Postal Code:</label>
                                                    <input type="text" class="form-control" id="presentPostalCode" value="{{ old('postalCode',$member->postalCode)}}" name="postalCode">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="district">District:</label>
                                                    {{-- <input type="text" class="form-control" id="presentDistrict" value="{{ old('district',$member->district)}}" name="district"> --}}
                                                    <select name="district" class="choices form-control form-select" id="presentDistrict">
                                                        <option value="">Select</option>
                                                        @forelse ($district as $d)
                                                            <option value="{{$d->id}}"{{ old('district',$member->district)== $d->id ? 'selected':''}}>{{$d->name}}</option>
                                                        @empty
                                                            <option value="">No Data Found</option>
                                                        @endforelse
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="country">Country:</label>
                                                    {{-- <input type="text" class="form-control" id="presentCountry" value="{{ old('country',$member->country)}}" name="country"> --}}
                                                    <select name="country" class="choices form-control form-select" id="presentCountry">
                                                        <option value="">Select</option>
                                                        @forelse ($country as $d)
                                                            <option value="{{$d->id}}"{{ old('country',$member->country)== $d->id ? 'selected':''}}>{{$d->name}}</option>
                                                        @empty
                                                            <option value="">No Data Found</option>
                                                        @endforelse
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <h6><b>Permanent Address</b>&nbsp;&nbsp;<input type="checkbox" id="sameAsPresent" name="sameAsPresent">&nbsp;Same As Present Address</h6>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12 d-none">
                                                <div class="form-group py-2">
                                                    <label for="vill">House/Village</label>
                                                    <input type="text" class="form-control" id="permanentVillage" value="{{ old('perVillage',$member->perVillage)}}" name="perVillage">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12 d-none">
                                                <div class="form-group py-2">
                                                    <label for="block">Road/Block/Sector</label>
                                                    <input type="text" class="form-control" id="permanentBlock" value="{{ old('perBlock',$member->perBlock)}}" name="perBlock">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="address">Address</label>
                                                    <input type="text" class="form-control" id="permanentAddress" value="{{ old('perAddress',$member->perAddress)}}" name="perAddress">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="policeStation">Police Station:</label>
                                                    <input type="text" class="form-control" id="permanentPoliceStation" value="{{ old('perPoliceStation',$member->perPoliceStation)}}" name="perPoliceStation">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="postoffice">Post Office:</label>
                                                    <input type="text" class="form-control" id="permanentPostOffice" value="{{ old('perPostOffice',$member->perPostOffice)}}" name="perPostOffice">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="postcode">Postal Code:</label>
                                                    <input type="text" class="form-control" id="permanentPostalCode" value="{{ old('perPostalCode',$member->perPostalCode)}}" name="perPostalCode">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="district">District:</label>
                                                    {{-- <input type="text" class="form-control" id="permanentDistrict" value="{{ old('perDistrict',$member->perDistrict)}}" name="perDistrict"> --}}
                                                    <select name="perDistrict" class="choices form-control form-select" id="permanentDistrict">
                                                        <option value="">Select</option>
                                                        @forelse ($district as $d)
                                                            <option value="{{$d->id}}"{{ old('perDistrict',$member->perDistrict)== $d->id ? 'selected':''}}>{{$d->name}}</option>
                                                        @empty
                                                            <option value="">No Data Found</option>
                                                        @endforelse
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="country">Country:</label>
                                                    {{-- <input type="text" class="form-control" id="permanentCountry" value="{{ old('perCountry',$member->perCountry)}}" name="perCountry"> --}}
                                                    <select name="perCountry" class="choices form-control form-select" id="permanentCountry">
                                                        <option value="">Select</option>
                                                        @forelse ($country as $d)
                                                            <option value="{{$d->id}}"{{ old('perCountry',$member->perCountry)== $d->id ? 'selected':''}}>{{$d->name}}</option>
                                                        @empty
                                                            <option value="">No Data Found</option>
                                                        @endforelse
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-sm-12 col-md-12">
                                                <div class="py-2">
                                                    <label for="detailschildresns" class="mt-3">Details of Children:(Must be Added with Birth Certificate copy):</label>
                                                    <table class="table table-striped mb-3">
                                                        <thead>
                                                            <tr class="bg-danger text-center text-white">
                                                                <th scope="col">Serial</th>
                                                                <th scope="col">Name</th>
                                                                <th scope="col">Sex</th>
                                                                <th scope="col">Date of Birth</th>
                                                                <th scope="col">Occupation With Address</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="details_data">
                                                            @if($member->children)
                                                            @foreach($member->children as $c)
                                                                <tr class="text-center">
                                                                    <td>{{$j=$loop->index + 1}}.
                                                                        <input type="hidden" name="id[]" value="{{$c->id}}">
                                                                    </td>
                                                                    <td><input type="text" id="Name{{$loop->index}}" class="form-control" name="cname[]" value="{{ $c->name }}" placeholder=" Enter Name"></td>
                                                                    <td><input type="radio" id="male{{$loop->index}}" name="cgender[{{$loop->index}}]" value="1" {{ old('cgender',$c->gender)=="1" ? "checked":"" }}> <label for="male{{$loop->index}}">Male</label>
                                                                        <input type="radio" id="female{{$loop->index}}" name="cgender[{{$loop->index}}]" value="2" {{ old('cgender',$c->gender)=="2" ? "checked":"" }}> <label for="female{{$loop->index}}">Female</label></td>
                                                                    <td><input type="date" id="birth_date{{$loop->index}}" class="form-control" name="cbirth_date[]" value="{{ $c->birth_date }}" placeholder="Date of Birth"></td>
                                                                    <td><input type="text" id="occupation{{$loop->index}}" class="form-control" name="coccupation[]" value="{{ $c->occupation }}"  placeholder="Occupation"></td>
                                                                </tr>
                                                            @endforeach
                                                            @endif
                                                            
                                                            @for($i=$member->children->count();$i<5;$i++ )
                                                            <tr class="text-center">
                                                                <td>{{$j=$i + 1}}.
                                                                    <input type="hidden" name="id[]" value="">
                                                                </td>
                                                                <td><input type="text" id="Name{{$i}}" class="form-control" name="cname[]" placeholder=" Enter Name"></td>
                                                                <td><input type="radio" id="male{{$i}}" name="cgender[{{$i}}]" value="1" {{ old('cgender')=="1" ? "checked":"" }}> <label for="male{{$i}}">Male</label>
                                                                    <input type="radio" id="female{{$i}}" name="cgender[{{$i}}]" value="2" {{ old('cgender')=="2" ? "checked":"" }}> <label for="female{{$i}}">Female</label></td>
                                                                <td><input type="date" id="birth_date{{$i}}" class="form-control" name="cbirth_date[]" placeholder="Date of Birth"></td>
                                                                <td><input type="text" id="occupation{{$i}}" class="form-control" name="coccupation[]" placeholder="Occupation"></td>
                                                            </tr>
                                                            @endfor

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div> 
                                        </div>
                                        
                                        <div class="col-lg-12 col-sm-12 col-md-12 text-end">
                                            <button type="button" class="btn btn-info text-white me-2">Save as Draft</button>
                                            <button type="button" class="btn btn-secondary prev-step m-2">Previous</button>
                                            <button type="button" class="btn btn-danger next-step m-2">Next</button>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="step-3" role="tabpanel" aria-labelledby="step-3-tab">
                                        <!-- Step 3 -->
                                        <div class="row">
                                            <div class="section-heading">
                                                <h5 class="text-uppercase m-0"><b>Nominee Information</b></h5>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="nominee">Name:</label>
                                                    <input type="text"class="form-control" value="{{ old('nominee_name',$member->nominee_name)}}" name="nominee_name">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="nominee">Relation:</label>
                                                    <input type="text"class="form-control" value="{{ old('nominee_relation',$member->nominee_relation)}}" name="nominee_relation">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="nominee">Occupation:</label>
                                                    <input type="text"class="form-control" value="{{ old('nominee_occupation',$member->nominee_occupation)}}" name="nominee_occupation">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="nominee">Date Of Birth:</label>
                                                    <input type="date"class="form-control" value="{{ old('nominee_date_of_birth',$member->nominee_date_of_birth)}}" name="nominee_date_of_birth">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="nominee">Place:</label>
                                                    <input type="text"class="form-control" value="{{ old('nominee_place',$member->nominee_place)}}" name="nominee_place">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="nominee">Email:</label>
                                                    <input type="email"class="form-control" value="{{ old('nominee_email',$member->nominee_email)}}" name="nominee_email">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="nominee">Phone:</label>
                                                    <input type="text"class="form-control" value="{{ old('nominee_phone',$member->nominee_phone)}}" name="nominee_phone">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="nominee">NID NO:</label>
                                                    <input type="text"class="form-control" value="{{ old('nominee_nid_no',$member->nominee_nid_no)}}" name="nominee_nid_no">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="nominee">Passport NO:</label>
                                                    <input type="text"class="form-control" value="{{ old('nominee_passport_no',$member->nominee_passport_no)}}" name="nominee_passport_no">
                                                </div>
                                            </div>
                                            <div class="section-heading">
                                                <h5 class="text-uppercase m-0"><b>Profession Information</b></h5>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="profession">Profession:</label>
                                                    <input type="text" id="profession" class="form-control" value="{{ old('profession',$member->profession)}}" name="profession">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group">
                                                    <label for="designation">Designation:</label>
                                                    <input type="text" class="form-control" value="{{ old('designation',$member->designation)}}" name="designation">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="company">Company:</label>
                                                    <input type="text" id="company" class="form-control" value="{{ old('company',$member->company)}}" name="company">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12 d-none">
                                                <div class="form-group py-2">
                                                    <label for="vill">House/Village</label>
                                                    <input type="text" class="form-control" value="{{ old('profVillage',$member->profVillage)}}" name="profVillage">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12 d-none">
                                                <div class="form-group py-2">
                                                    <label for="block">Road/Block/Sector</label>
                                                    <input type="text" class="form-control" value="{{ old('profBlock',$member->profBlock)}}" name="profBlock">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="address">Address</label>
                                                    <input type="text" class="form-control" value="{{ old('profAddress',$member->profAddress)}}" name="profAddress">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="policeStation">Police Station:</label>
                                                    <input type="text" class="form-control" value="{{ old('profPoliceStation',$member->profPoliceStation)}}" name="profPoliceStation">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="postoffice">Post Office:</label>
                                                    <input type="text" class="form-control" value="{{ old('profPostOffice',$member->profPostOffice)}}" name="profPostOffice">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="postcode">Postal Code:</label>
                                                    <input type="text" class="form-control" value="{{ old('profPostalCode',$member->profPostalCode)}}" name="profPostalCode">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="district">District:</label>
                                                    {{-- <input type="text" class="form-control" value="{{ old('profDistrict',$member->profDistrict)}}" name="profDistrict"> --}}
                                                    <select name="profDistrict" class="choices form-control form-select">
                                                        <option value="">Select</option>
                                                        @forelse ($district as $d)
                                                            <option value="{{$d->id}}"{{ old('profDistrict',$member->profDistrict)== $d->id ? 'selected':''}}>{{$d->name}}</option>
                                                        @empty
                                                            <option value="">No Data Found</option>
                                                        @endforelse
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="country">Country:</label>
                                                    {{-- <input type="text" class="form-control" value="{{ old('profCountry',$member->profCountry)}}" name="profCountry"> --}}
                                                    <select name="profCountry" class="choices form-control form-select">
                                                        <option value="">Select</option>
                                                        @forelse ($country as $d)
                                                            <option value="{{$d->id}}" {{ old('profCountry',$member->profCountry)== $d->id ? 'selected':''}}>{{$d->name}}</option>
                                                        @empty
                                                            <option value="">No Data Found</option>
                                                        @endforelse
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="section-heading">
                                                <h5 class="text-uppercase m-0"><b>Category Of Membership</b></h5>
                                            </div>
                                            @forelse ($memberType as $mt)
                                                
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <input type="radio" id="type{{$mt->id}}" name="categorymembership" value="{{$mt->id}}" {{ old('categorymembership',$member->membership_applied)=="$mt->id" ? "checked":"" }}>
                                                    <label for="type{{$mt->id}}">{{$mt->member_type}}</label>
                                                </div>
                                            </div>
                                            @empty
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <input type="radio" name="categorymembership" value="1" {{ old('categorymembership')=="1" ? "checked":"" }} disabled>
                                                    <label for="donermember">No Data Found</label>
                                                </div>
                                            </div>
                                            @endforelse
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-md-12 text-end">
                                            <button type="button" class="btn btn-info text-white me-2">Save as Draft</button>
                                            <button type="button" class="btn btn-secondary prev-step m-2">Previous</button>
                                            <button type="button" class="btn btn-danger next-step m-2">Next</button>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="step-4" role="tabpanel" aria-labelledby="step-4-tab">
                                        <!-- Step 4 -->
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12 col-md-12">
                                                <div class="py-2">
                                                    <label for="detailschildresns" class="mt-3 text-uppercase"><b>Details of Other Club Membership (If any)</b>:</label>
                                                    <table class="table table-striped mb-3">
                                                        <thead>
                                                            <tr class="bg-danger text-center text-white">
                                                                <th scope="col">Serial</th>
                                                                <th scope="col">Name</th>
                                                                <th scope="col">Membership Type</th>
                                                                <th scope="col">Year</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="details_data">
                                                            @if($member->otherClub)
                                                            @foreach($member->otherClub as $c)
                                                                <tr class="text-center">
                                                                    <td>{{$j=$loop->index + 1}}.
                                                                        <input type="hidden" name="id[]" value="{{$c->id}}">
                                                                    </td>
                                                                    <td><input type="text" id="Name{{$loop->index}}" class="form-control" name="clubName[]" value="{{ $c->name }}" placeholder=" Enter Name"></td>
                                                                    <td><input type="text" id="memberType{{$loop->index}}" class="form-control" name="membershipType[]" value="{{ $c->membership_type }}"></td>
                                                                    <td><input type="text" id="year{{$loop->index}}" class="form-control" name="year[]" value="{{ $c->year }}"></td>
                                                                </tr>
                                                            @endforeach
                                                            @endif
                                                            
                                                            @for($i=$member->otherClub->count();$i<5;$i++ )
                                                            <tr class="text-center">
                                                                <td>{{$j=$i + 1}}.
                                                                    <input type="hidden" name="id[]" value="">
                                                                </td>
                                                                <td><input type="text" id="Name{{$i}}" class="form-control" name="clubName[]" placeholder=" Enter Name"></td>
                                                                <td><input type="text" id="memberType{{$i}}" class="form-control" name="membershipType[]"></td>
                                                                <td><input type="text" id="year{{$i}}" class="form-control" name="year[]"></td>
                                                            </tr>
                                                            @endfor

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="section-heading">
                                                <h5 class="text-uppercase m-0"><b>Proposed by (Any Member Of CKCL)</b></h5>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="name">Name:</label>
                                                    <input type="text" class="form-control" value="{{ old('proposedname',$member->proposed_name)}}" name="proposedname">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="membershipid">Membership ID:</label>
                                                    <input type="text" class="form-control" value="{{ old('memberNo',$member->proposed_membership_id)}}" name="memberNo">
                                                </div>
                                            </div>
                                            <div class="section-heading">
                                                <h5 class="text-uppercase m-0"><b>File & Approval Section</b></h5>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="photo">Applicant Photo:</label>
                                                    <input type="file" id="image" class="form-control" name="image">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="photo">Nomimee Photo:</label>
                                                    <input type="file" class="form-control" name="nominee_photo">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="photo">NID:</label>
                                                    <input type="file" class="form-control" name="nid">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="photo">Passport:</label>
                                                    <input type="file" class="form-control" name="passport">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="photo">ETIN:</label>
                                                    <input type="file" class="form-control" name="etin">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group">
                                                    <label for="show">Show Font:</label>
                                                        <select class="form-control form-select" name="show_font" id="show_font">
                                                            <option value="">Select Show Font</option>
                                                            <option value="1" {{ old('show_font',$member->show_font)=='1' ? 'selected':''}}>Yes</option>
                                                            <option value="0" {{ old('show_font',$member->show_font)=='0' ? 'selected':''}}>No</option>
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group">
                                                    <label for="designation">Club Designation:</label>
                                                    <input type="text" class="form-control" value="{{ old('club_designation',$member->club_designation)}}" name="club_designation">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group">
                                                    <label for="membershipno">Membership No:</label>
                                                    <input type="text" id="membershipno" class="form-control" value="{{ old('membershipno',$member->membership_no)}}" name="membershipno">
                                                    @if($errors->has('membershipno'))
                                                        <span class="text-danger"> {{ $errors->first('membershipno') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <select class="form-control form-select" name="status" id="status">
                                                        <option value="">Select Status</option>
                                                        <option value="0" {{ old('status',$member->status)=='0' ? 'selected':''}}>Pending</option>
                                                        <option value="1" {{ old('status',$member->status)=='1' ? 'selected':''}}>Applied for approval</option>
                                                        <option value="2" {{ old('status',$member->status)=='2' ? 'selected':''}}>Approved</option>
                                                        <option value="3" {{ old('status',$member->status)=='3' ? 'selected':''}}>Suspended</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group">
                                                    <label for="password">Password:</label>
                                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                                        @if($errors->has('password'))
                                                            <span class="text-danger"> {{ $errors->first('password') }}</span>
                                                        @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-md-12 d-flex justify-content-end">
                                            <button type="button" class="btn btn-secondary prev-step m-2">Previous</button>
                                            <button type="submit" class="btn btn-info m-2">Update</button>
                                        </div>
                                    </div>
                                </div>
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
<script>
$(document).ready(function() {

$('.next-step').click(function() {
    var currentTab = $(this).closest('.tab-pane').attr('id');
    var nextTab = $(this).closest('.tab-pane').next().attr('id');

    $('#' + currentTab).removeClass('show active');
    $('#' + currentTab + '-tab').removeClass('active');
    $('#' + nextTab).addClass('show active');
    $('#' + nextTab + '-tab').addClass('active');
});

$('.prev-step').click(function() {
    var currentTab = $(this).closest('.tab-pane').attr('id');
    var prevTab = $(this).closest('.tab-pane').prev().attr('id');

    $('#' + currentTab).removeClass('show active');
    $('#' + currentTab + '-tab').removeClass('active');
    $('#' + prevTab).addClass('show active');
    $('#' + prevTab + '-tab').addClass('active');
});

$('.nav-item a').click(function(e) {
  var currentTab = $(this).attr('href');
  var prevTab = $('.tab-content .tab-pane.show').attr('id');
  
  $('#' + prevTab).removeClass('show active');
  $('#' + prevTab + '-tab').removeClass('active');
  $(currentTab).addClass('show active');
  $(currentTab + '-tab').addClass('active');
  e.preventDefault();
});

});
</script>
<script>
    const sameAsPresentCheckbox = document.getElementById('sameAsPresent');
    const permanentVillage = document.getElementById('permanentVillage');
    const permanentBlock = document.getElementById('permanentBlock');
    const permanentAddress = document.getElementById('permanentAddress');
    const permanentPoliceStation = document.getElementById('permanentPoliceStation');
    const permanentPostOffice = document.getElementById('permanentPostOffice');
    const permanentPostalCode = document.getElementById('permanentPostalCode');
    const permanentDistrict = document.getElementById('permanentDistrict');
    const permanentCountry = document.getElementById('permanentCountry');

    sameAsPresentCheckbox.addEventListener('change', function () {
        if (this.checked) {
            permanentVillage.value = document.getElementById('presentVillage').value;
            permanentBlock.value = document.getElementById('presentBlock').value;
            permanentAddress.value = document.getElementById('presentAddress').value;
            permanentPoliceStation.value = document.getElementById('presentPoliceStation').value;
            permanentPostOffice.value = document.getElementById('presentPostOffice').value;
            permanentPostalCode.value = document.getElementById('presentPostalCode').value;
            permanentDistrict.value = document.getElementById('presentDistrict').value;
            permanentCountry.value = document.getElementById('presentCountry').value;
        } else {
            permanentVillage.value = '';
            permanentBlock.value = '';
            permanentAddress.value = '';
            permanentPoliceStation.value = '';
            permanentPostOffice.value = '';
            permanentPostalCode.value = '';
            permanentDistrict.value = '';
            permanentCountry.value = '';
        }
    });
</script>
@endpush
