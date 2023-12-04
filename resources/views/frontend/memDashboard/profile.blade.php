@extends('frontend.memDashboard.memberApp')
@section('memberContent')
<div class="regi-form tab-pane">
    <div class="member-service">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12 ">
                <div class="card regi-form shadow-sm mb-3">
                    <div class="card-header">
                        <h5>Personal Information</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data" action="{{route('profile.update')}}">
                            @csrf
                            @method('POST')
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
                                                    <input type="text" class="form-control" value="{{ old('given_name',$member->given_name)}}" disabled>
                                                    <input type="hidden" class="form-control" value="{{ old('given_name',$member->given_name)}}" name="given_name">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="surname">Surname</label>
                                                    <input type="text" class="form-control" value="{{ old('surname',$member->surname)}}" disabled>
                                                    <input type="hidden" class="form-control" value="{{ old('surname',$member->surname)}}" name="surname">
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
                                                <fieldset>
                                                    <legend>Marital Status</legend>
                                                    <input type="radio"  name="marit_status" value="0" {{ old('marit_status',$member->marital_status)=="0" ? "checked":"" }}>
                                                    <label for="">Single</label>
                                                    <input type="radio"  name="marit_status" value="1" {{ old('marit_status',$member->marital_status)=="1" ? "checked":"" }}>
                                                    <label for="">Married</label>
                                                </fieldset>
                                            </div>
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
                                                    <input type="text"  class="form-control" value="{{ $member->cell_number}}" disabled>
                                                    <input type="hidden" class="form-control" value="{{ old('cellno',$member->cell_number)}}" name="cellno">
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
                                                    <input type="email" class="form-control" value="{{$member->email}}" disabled>
                                                    <input type="hidden" class="form-control" value="{{ $member->email}}" name="emailAddress">
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
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="vill">House/Village</label>
                                                    <input type="text" class="form-control" value="{{ $member->village}}" disabled>
                                                    <input type="hidden" class="form-control" value="{{ old('vill',$member->village)}}" name="vill">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="block">Road/Block/Sector</label>
                                                    <input type="text" class="form-control" value="{{ $member->block}}" disabled>
                                                    <input type="hidden" class="form-control" value="{{ old('block',$member->block)}}" name="block">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="policeStation">Police Station:</label>
                                                    <input type="text" class="form-control" value="{{ $member->police_station}}" disabled>
                                                    <input type="hidden" class="form-control" value="{{ old('policeStation',$member->police_station)}}" name="policeStation">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="postoffice">Post Office:</label>
                                                    <input type="text"  class="form-control" value="{{$member->post_office}}" disabled>
                                                    <input type="hidden" class="form-control" value="{{ old('postoffice',$member->post_office)}}" name="postoffice">
                                                </div>
                                            </div>
                                            <div>
                                                <h6><b>Permanent Address</b></h6>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="vill">House/Village</label>
                                                    <input type="text" class="form-control" value="{{ $member->perVillage}}" disabled>
                                                    <input type="hidden" class="form-control" value="{{ old('perVillage',$member->perVillage)}}" name="perVillage">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="block">Road/Block/Sector</label>
                                                    <input type="text" class="form-control" value="{{ $member->perBlock}}" disabled>
                                                    <input type="hidden" class="form-control" value="{{ old('perBlock',$member->perBlock)}}" name="perBlock">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="policeStation">Police Station:</label>
                                                    <input type="text" class="form-control" value="{{ $member->perPoliceStation}}" disabled>
                                                    <input type="hidden" class="form-control" value="{{ old('perPoliceStation',$member->perPoliceStation)}}" name="perPoliceStation">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="postoffice">Post Office:</label>
                                                    <input type="text" class="form-control" value="{{ $member->perPostOffice}}" disabled>
                                                    <input type="hidden" class="form-control" value="{{ old('perPostOffice',$member->perPostOffice)}}" name="perPostOffice">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="postcode">Postal Code:</label>
                                                    <input type="text" class="form-control" value="{{ $member->perPostalCode}}" disabled>
                                                    <input type="hidden" class="form-control" value="{{ old('perPostalCode',$member->perPostalCode)}}" name="perPostalCode">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="district">District:</label>
                                                    <input type="text" class="form-control" value="{{$member->perDistrict}}" disabled>
                                                    <input type="hidden" class="form-control" value="{{ old('perDistrict',$member->perDistrict)}}" name="perDistrict">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="country">Country:</label>
                                                    <input type="text" class="form-control" value="{{$member->perCountry}}" disabled>
                                                    <input type="hidden" class="form-control" value="{{ old('perCountry',$member->perCountry)}}" name="perCountry">
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
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="vill">House/Village</label>
                                                    <input type="text" class="form-control" value="{{ old('profVillage',$member->profVillage)}}" name="profVillage">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="block">Road/Block/Sector</label>
                                                    <input type="text" class="form-control" value="{{ old('profBlock',$member->profBlock)}}" name="profBlock">
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
                                                    <input type="text" class="form-control" value="{{ old('profDistrict',$member->profDistrict)}}" name="profDistrict">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="country">Country:</label>
                                                    <input type="text" class="form-control" value="{{ old('profCountry',$member->profCountry)}}" name="profCountry">
                                                </div>
                                            </div>
                                            <div class="section-heading d-none">
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
                                            {{-- <div class="col-lg-6 col-sm-12 col-md-12 d-none">
                                                <div class="form-group py-2">
                                                    <input type="radio" id="donermember" name="categorymembership" value="1" {{ old('categorymembership',$member->membership_applied)=="1" ? "checked":"" }}>
                                                    <label for="donermember">Donor Member</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12 d-none">
                                                <div class="form-group py-2">
                                                    <input type="radio" id="servicemember" name="categorymembership" value="2" {{ old('categorymembership',$member->membership_applied)=="2" ? "checked":"" }}>
                                                    <label for="servicemember">Service Member</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12 d-none">
                                                <div class="form-group py-2">
                                                    <input type="radio" id="lifemember" name="categorymembership" value="3" {{ old('categorymembership',$member->membership_applied)=="3" ? "checked":"" }}>
                                                    <label for="lifemember">Life Member</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12 d-none">
                                                <div class="form-group py-2">
                                                    <input type="radio" id="temporarymember" name="categorymembership" value="4" {{ old('categorymembership',$member->membership_applied)=="4" ? "checked":"" }}>
                                                    <label for="temporarymember">Temporary Member</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12 d-none">
                                                <div class="form-group py-2">
                                                    <input type="radio" id="permanentmember" name="categorymembership" value="5" {{ old('categorymembership',$member->membership_applied)=="5" ? "checked":"" }}>
                                                    <label for="permanentmember">Permanent Member</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12 d-none">
                                                <div class="form-group py-2">
                                                    <input type="radio" id="honorarymember" name="categorymembership" value="6" {{ old('categorymembership',$member->membership_applied)=="6" ? "checked":"" }}>
                                                    <label for="honorarymember">Honorary Member</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12 d-none">
                                                <div class="form-group py-2">
                                                    <input type="radio" id="cprporatemember" name="categorymembership" value="7" {{ old('categorymembership',$member->membership_applied)=="7" ? "checked":"" }}>
                                                    <label for="cprporatemember">Corporate Member</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12 d-none">
                                                <div class="form-group py-2">
                                                    <input type="radio" id="diplomatedmember" name="categorymembership" value="8" {{ old('categorymembership',$member->membership_applied)=="8" ? "checked":"" }}>
                                                    <label for="diplomatedmember">Diplomate and Foreing National Member</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12 d-none">
                                                <div class="form-group py-2">
                                                    <input type="radio" id="foundingmember" name="categorymembership" value="9" {{ old('categorymembership',$member->membership_applied)=="9" ? "checked":"" }}>
                                                    <label for="foundingmember">Founding Member</label>
                                                </div>
                                            </div> --}}
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
                                                <h5 class="text-uppercase m-0"><b>File Section</b></h5>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="photo">Photo:</label>
                                                    <input type="file" id="image" class="form-control" name="image">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12 d-none">
                                                <div class="form-group py-2">
                                                    <label for="status">Request for approval</label>
                                                    <select class="form-control form-select" name="status" id="status" readonly>
                                                        <option value="">Select yes for approval</option>
                                                        <option value="0" {{ old('status',$member->status)=='0' ? 'selected':''}}>Pending</option>
                                                        <option value="1" {{ old('status',$member->status)=='1' ? 'selected':''}}>Applied for approval</option>
                                                        <option value="2" {{ old('status',$member->status)=='2' ? 'selected':''}}>Approvbed</option>
                                                        <option value="3" {{ old('status',$member->status)=='3' ? 'selected':''}}>Suspended</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-md-12 d-flex justify-content-end">
                                            <button type="button" class="btn btn-secondary prev-step m-2">Previous</button>
                                            <button type="submit" class="btn btn-danger m-2">Preview</button>
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
</div>
@endsection