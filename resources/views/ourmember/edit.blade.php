@extends('layout.app')

@section('pageTitle',trans('Update Member'))
@section('pageSubTitle',trans('Create'))

@section('content')
  <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    @if(Session::has('response'))
                        {!!Session::get('response')['message']!!}
                    @endif
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.ourMember.update',encryptor('encrypt',$member->id))}}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="uptoken" value="{{encryptor('encrypt',$member->id)}}">
                                <div class="row">
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="fullName">1. FULL Name(Block Capital Letter)</label>
                                            <input type="text" id="fullName" class="form-control" value="{{ old('fullName',$member->full_name)}}" name="fullName">
                                            @if($errors->has('fullName'))
                                                <span class="text-danger"> {{ $errors->first('fullName') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label for="Fathers">2. Father's Name:</label>
                                            <input type="text" id="Fathers" class="form-control" value="{{ old('Fathers',$member->father_name)}}" name="Fathers">
                                            @if($errors->has('Fathers'))
                                                <span class="text-danger"> {{ $errors->first('Fathers',$member->father_name) }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="husbanName">2.1 Husband's Name:</label>
                                            <input type="text" id="husbanName" class="form-control" value="{{ old('husbanName',$member->husban_name)}}" name="husbanName">
                                            @if($errors->has('husbanName'))
                                                <span class="text-danger"> {{ $errors->first('husbanName') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="mothersName">3. Mother's Name:</label>
                                            <input type="text" id="mothersName" class="form-control" value="{{ old('mothersName',$member->mother_name)}}" name="mothersName">
                                            @if($errors->has('mothersName'))
                                                <span class="text-danger"> {{ $errors->first('mothersName') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label for="nominee">4. Nominee:</label>
                                            <input type="text" id="nominee" class="form-control" value="{{ old('nominee',$member->nominee)}}" name="nominee">
                                                @if($errors->has('nominee'))
                                                    <span class="text-danger"> {{ $errors->first('nominee') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="dateOfBirth">5. Date and Place of Birth:</label>
                                            <input type="text" id="dateOfBirth" class="form-control" value="{{ old('dateOfBirth',$member->birth_date)}}" name="dateOfBirth">
                                                @if($errors->has('dateOfBirth'))
                                                    <span class="text-danger"> {{ $errors->first('dateOfBirth') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="photo">Photo:</label>
                                                <input type="file" id="image" class="form-control" name="image">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="show">Show Font:</label>
                                                    <select class="form-control form-select" name="show_font" id="show_font">
                                                        <option value="">Select Show Font</option>
                                                        <option value="1" {{ old('show_font',$member->show_font)=='1' ? 'selected':''}}>Yes</option>
                                                        <option value="0" {{ old('show_font',$member->show_font)=='0' ? 'selected':''}}>No</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="orderby">Order By:</label>
                                                    <select class="form-control form-select" name="order_b" id="order_b">
                                                        <option value="">Select Order By</option>
                                                        <option value="1" {{ old('order_b',$member->order_b)=='1' ? 'selected':''}}>Yes</option>
                                                        <option value="0" {{ old('order_b',$member->order_b)=='0' ? 'selected':''}}>No</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="facebook">Facebook link:</label>
                                                <input type="text" id="fb_link" class="form-control" value="{{ old('nationality',$member->fb_link)}}" name="fb_link">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="twitter">Twitter link:</label>
                                                <input type="text" id="twter_link" class="form-control" value="{{ old('nationality',$member->twter_link)}}" name="twter_link">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="linkedin">Linkedin link:</label>
                                                <input type="text" id="linkdin_link" class="form-control" value="{{ old('nationality',$member->linkdin_link)}}" name="linkdin_link">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="youtube">Youtube link:</label>
                                                <input type="text" id="youtube_link" class="form-control" value="{{ old('nationality',$member->youtube_link)}}" name="youtube_link">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nationality">Nationality:</label>
                                                <input type="text" id="nationality" class="form-control" value="{{ old('nationality',$member->nationality)}}" name="nationality">
                                                    @if($errors->has('nationality'))
                                                        <span class="text-danger"> {{ $errors->first('nationality') }}</span>
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="profession">Profession:</label>
                                                <input type="text" id="profession" class="form-control" value="{{ old('profession',$member->profession)}}" name="profession">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="company">Company:</label>
                                                <input type="text" id="company" class="form-control" value="{{ old('profession',$member->company)}}" name="company">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="cellno">Cell No:</label>
                                                <input type="text" id="cellno" class="form-control" value="{{ old('cellno',$member->cell_number)}}" name="cellno">
                                                    @if($errors->has('cellno'))
                                                        <span class="text-danger"> {{ $errors->first('cellno') }}</span>
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="tel">Tel:</label>
                                                <input type="text" id="tel" class="form-control" value="{{ old('tel',$member->tel_number)}}" name="tel">
                                                    @if($errors->has('tel'))
                                                        <span class="text-danger"> {{ $errors->first('tel') }}</span>
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="fax">Fax:</label>
                                                <input type="text" id="fax" class="form-control" value="{{ old('fax',$member->fax_number)}}" name="fax">
                                                    @if($errors->has('fax'))
                                                        <span class="text-danger"> {{ $errors->first('fax') }}</span>
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email">E-mail:</label>
                                                <input type="email" id="email" class="form-control" value="{{ old('email',$member->email)}}" name="email">
                                                    @if($errors->has('email'))
                                                        <span class="text-danger"> {{ $errors->first('email') }}</span>
                                                    @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
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
                                                @if($errors->has('bloodGroup'))
                                                    <span class="text-danger"> {{ $errors->first('bloodGroup') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" id="image" class="form-control"
                                                placeholder="Image" name="image">
                                                @if($errors->has('image'))
                                                    <span class="text-danger"> {{ $errors->first('image') }}</span>
                                                @endif
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="row">
                                    <label for="nationalid">6. </label>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <select  class="form-control form-select" name="credit">
                                                <option value="">National ID No</option>
                                                <option value="">Passport No</option>
                                                <option value="">Driving License No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            {{-- <label for="nationalid">6. National ID No/Passport No/Driving License No:</label> --}}
                                            <input type="text" id="nationalid" class="form-control" value="{{ old('nationalid',$member->national_id)}}" name="nationalid">
                                                @if($errors->has('nationalid'))
                                                    <span class="text-danger"> {{ $errors->first('nationalid') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="qualification">7. Educational Qualification:</label>
                                        <input type="text" id="qualification" class="form-control" value="{{ old('qualification',$member->qualification)}}" name="qualification">
                                            @if($errors->has('qualification'))
                                                <span class="text-danger"> {{ $errors->first('qualification') }}</span>
                                            @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="my-3" for="permanentaddress">8. Permanent Address:</label>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="vill">Vill:</label>
                                                <input type="text" id="vill" class="form-control" value="{{ old('vill',$member->village)}}" name="vill">
                                                    @if($errors->has('vill'))
                                                        <span class="text-danger"> {{ $errors->first('vill') }}</span>
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="postoffice">P.O:</label>
                                                <input type="text" id="postoffice" class="form-control" value="{{ old('postoffice',$member->postoffice)}}" name="postoffice">
                                                    @if($errors->has('postoffice'))
                                                        <span class="text-danger"> {{ $errors->first('postoffice') }}</span>
                                                    @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="upazila">P.S/UP:</label>
                                                <input type="text" id="upazila" class="form-control" value="{{ old('upazila',$member->upazila)}}" name="upazila">
                                                    @if($errors->has('upazila'))
                                                        <span class="text-danger"> {{ $errors->first('upazila') }}</span>
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="district">Dist:</label>
                                                <input type="text" id="district" class="form-control" value="{{ old('district',$member->district)}}" name="district">
                                                    @if($errors->has('district'))
                                                        <span class="text-danger"> {{ $errors->first('district') }}</span>
                                                    @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="presentAddress">9. Present/Mailing Residential Address:</label>
                                        <input type="text" id="presentAddress" class="form-control" value="{{ old('presentAddress',$member->present_address)}}" name="presentAddress">
                                            @if($errors->has('presentAddress'))
                                                <span class="text-danger"> {{ $errors->first('presentAddress') }}</span>
                                            @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="officeAddress">10. Office Address:</label>
                                        <input type="text" id="officeAddress" class="form-control" value="{{ old('officeAddress',$member->office_address)}}" name="officeAddress">
                                            @if($errors->has('officeAddress'))
                                                <span class="text-danger"> {{ $errors->first('officeAddress') }}</span>
                                            @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="my-3" for="othersclub">11. Details Of Other Club Membership(IF Any):</label>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="othersdate">Date:</label>
                                                <input type="othersdate" id="othersdate" class="form-control" value="{{ old('othersdate',$member->others_date)}}" name="othersdate">
                                                    @if($errors->has('othersdate'))
                                                        <span class="text-danger"> {{ $errors->first('othersdate') }}</span>
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="signatureApplicant">Signature Of Applicant:</label>
                                                <input type="file" id="signatureApplicant" class="form-control" value="{{ old('signatureApplicant',$member->signature_applicant)}}" name="signatureApplicant">
                                                    @if($errors->has('signatureApplicant'))
                                                        <span class="text-danger"> {{ $errors->first('signatureApplicant') }}</span>
                                                    @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="identifyPresident">Identified by President/Vice President:</label>
                                                <input type="text" id="identifyPresident" class="form-control" value="{{ old('identifyPresident',$member->identify_president)}}" name="identifyPresident">
                                                    @if($errors->has('identifyPresident'))
                                                        <span class="text-danger"> {{ $errors->first('identifyPresident') }}</span>
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="memberNo">Member No:</label>
                                                <input type="text" id="memberNo" class="form-control" value="{{ old('memberNo',$member->member_no)}}" name="memberNo">
                                                    @if($errors->has('memberNo'))
                                                        <span class="text-danger"> {{ $errors->first('memberNo') }}</span>
                                                    @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="mrormis">Mr./Mis.:</label>
                                            <input type="text" id="mrormis" class="form-control" value="{{ old('mrormis',$member->mr_mis)}}" name="mrormis">
                                                @if($errors->has('mrormis'))
                                                    <span class="text-danger"> {{ $errors->first('mrormis') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="otheraddress">Address:</label>
                                            <input type="text" id="otheraddress" class="form-control" value="{{ old('otheraddress',$member->other_address)}}" name="otheraddress">
                                                @if($errors->has('otheraddress'))
                                                    <span class="text-danger"> {{ $errors->first('otheraddress') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="signaturefounderpresident">Signature Of Founder President:</label>
                                                <input type="file" id="signaturefounderpresident" class="form-control" value="{{ old('signaturefounderpresident',$member->signature_founder_president)}}" name="signaturefounderpresident">
                                                    @if($errors->has('signaturefounderpresident'))
                                                        <span class="text-danger"> {{ $errors->first('signaturefounderpresident') }}</span>
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="foundervicepresident">Signature Of Founder Vice President:</label>
                                                <input type="file" id="foundervicepresident" class="form-control" value="{{ old('foundervicepresident',$member->signature_founder_vicepresident)}}" name="foundervicepresident">
                                                    @if($errors->has('foundervicepresident'))
                                                        <span class="text-danger"> {{ $errors->first('foundervicepresident') }}</span>
                                                    @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="remarks">Remarks:</label>
                                            <textarea  class="form-control" id="remarks"
                                                placeholder="remarks" name="remarks" rows="5">{{ old('remarks',$member->remarks)}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="updateincometax">12. Updated Income Tax Paid With TIN/GIR No:</label>
                                        <input type="text" id="updateincometax" class="form-control" value="{{ old('updateincometax',$member->update_incometax)}}" name="updateincometax">
                                            @if($errors->has('updateincometax'))
                                                <span class="text-danger"> {{ $errors->first('updateincometax') }}</span>
                                            @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="emergencycontact">13. Emergency Contact Person Name and Cell No:</label>
                                        <input type="text" id="emergencycontact" class="form-control" value="{{ old('emergencycontact',$member->emergency_contact)}}" name="emergencycontact">
                                            @if($errors->has('emergencycontact'))
                                                <span class="text-danger"> {{ $errors->first('emergencycontact') }}</span>
                                            @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="mt-3" for="permanentaddress">14.</label>
                                    <label class="mx-3" for="permanentaddress">a)Details of Passport:</label>
                                    <div class="row">
                                        <div class="form-group ms-5">
                                            <label for="passportnotype">1)Passport No and Type:</label>
                                            <input type="text" id="passportnotype" class="form-control" value="{{ old('passportnotype',$member->passport_notype)}}" name="passportnotype">
                                                @if($errors->has('passportnotype'))
                                                    <span class="text-danger"> {{ $errors->first('passportnotype') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group ms-5">
                                            <label for="pdateissue">2)Place and Date of Issue:</label>
                                            <input type="text" id="pdateissue" class="form-control" value="{{ old('pdateissue',$member->pdate_issue)}}" name="pdateissue">
                                                @if($errors->has('pdateissue'))
                                                    <span class="text-danger"> {{ $errors->first('pdateissue') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group ms-5">
                                            <label for="issuingAuthority">3)Issuing Authority:</label>
                                            <input type="text" id="issuingAuthority" class="form-control" value="{{ old('issuingAuthority',$member->issuing_authority)}}" name="issuingAuthority">
                                                @if($errors->has('issuingAuthority'))
                                                    <span class="text-danger"> {{ $errors->first('issuingAuthority') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group ms-5">
                                            <label for="validity">4)Validity:</label>
                                            <input type="text" id="validity" class="form-control" value="{{ old('validity',$member->validity)}}" name="validity">
                                                @if($errors->has('validity'))
                                                    <span class="text-danger"> {{ $errors->first('validity') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                    <label class="mx-3" for="permanentaddress">b)Family Details:</label>
                                    <div class="row">
                                        <div class="form-group ms-5">
                                            <label for="namespouse">1)Name of Spouse:</label>
                                            <input type="text" id="namespouse" class="form-control" value="{{ old('namespouse',$member->name_spouse)}}" name="namespouse">
                                                @if($errors->has('namespouse'))
                                                    <span class="text-danger"> {{ $errors->first('namespouse') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group ms-5">
                                            <label for="occupationSpouse">2)Occupation of Spouse:</label>
                                            <input type="text" id="occupationSpouse" class="form-control" value="{{ old('occupation_spouse',$member->occupation_spouse)}}" name="occupationSpouse">
                                                @if($errors->has('occupationSpouse'))
                                                    <span class="text-danger"> {{ $errors->first('occupationSpouse') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="detailschildresns" class="mt-3">15. Details of Children:(Must be Added with Birth Certificate copy):</label>
                                        <table class="table mb-5">
                                            <thead>
                                                <tr class="bg-primary text-white">
                                                    <th class="p-2">Serial</th>
                                                    <th class="p-2">Name</th>
                                                    <th class="p-2">Sex</th>
                                                    <th class="p-2">Date of Birth</th>
                                                    <th class="p-2">Occupation With Address</th>
                                                    <th class="p-2">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="details_data">
                                                <tr>
                                                    <td>1.</td>
                                                    <td><input type="text" id="Name1" class="form-control" name="Name1" value="{{ $member->childresns_name1 }}" placeholder=" Enter Name"></td>
                                                    <td><input type="radio" id="male1" name="gender1" value="11" {{ old('gender1',$member->gender1)=="11" ? "checked":"" }}> <label for="male1">Male</label>
                                                        <input type="radio" id="female1" name="gender1" value="12" {{ old('gender1',$member->gender1)=="12" ? "checked":"" }}> <label for="female1">Female</label></td>
                                                    <td><input type="date" id="birth_date1" class="form-control" name="birth_date1" value="{{ $member->birth_date1 }}" placeholder="Date of Birth"></td>
                                                    <td><input type="text" id="occupation1" class="form-control" name="occupation1" value="{{ $member->occupation1 }}"  placeholder="Occupation With Address"></td>
                                                </tr>
                                                <tr>
                                                    <td>2.</td>
                                                    <td><input type="text" id="Name2" class="form-control" name="Name2" value="{{ $member->childresns_name2 }}" placeholder=" Enter Name"></td>
                                                    <td><input type="radio" id="male2" name="gender2" value="21" {{ old('gender2',$member->gender2)=="21" ? "checked":"" }}> <label for="male2">Male</label>
                                                        <input type="radio" id="female2" name="gender2" value="22" {{ old('gender2',$member->gender2)=="22" ? "checked":"" }}> <label for="female2">Female</label></td>
                                                    <td><input type="date" id="birth_date2" class="form-control" name="birth_date2" value="{{ $member->birth_date2 }}" placeholder="Date of Birth"></td>
                                                    <td><input type="text" id="occupation2" class="form-control" name="occupation2" value="{{ $member->occupation2 }}"  placeholder="Occupation With Address"></td>
                                                </tr>
                                                <tr>
                                                    <td>3.</td>
                                                    <td><input type="text" id="Name3" class="form-control" name="Name3" value="{{ $member->childresns_name3 }}" placeholder=" Enter Name"></td>
                                                    <td><input type="radio" id="male3" name="gender3" value="31" {{ old('gender3',$member->gender3)=="31" ? "checked":"" }}> <label for="male3">Male</label>
                                                        <input type="radio" id="female3" name="gender3" value="32" {{ old('gender3',$member->gender3)=="32" ? "checked":"" }}> <label for="female3">Female</label></td>
                                                    <td><input type="date" id="birth_date3" class="form-control" name="birth_date3" value="{{ $member->birth_date3 }}" placeholder="Date of Birth"></td>
                                                    <td><input type="text" id="occupation3" class="form-control" name="occupation3" value="{{ $member->occupation3 }}"  placeholder="Occupation With Address"></td>
                                                </tr>
                                                <tr>
                                                    <td>4.</td>
                                                    <td><input type="text" id="Name4" class="form-control" name="Name4" value="{{ $member->childresns_name4 }}" placeholder=" Enter Name"></td>
                                                    <td><input type="radio" id="male4" name="gender4" value="41" {{ old('gender4',$member->gender4)=="41" ? "checked":"" }}> <label for="male4">Male</label>
                                                        <input type="radio" id="female4" name="gender4" value="42" {{ old('gender4',$member->gender4)=="42" ? "checked":"" }}> <label for="female4">Female</label></td>
                                                    <td><input type="date" id="birth_date4" class="form-control" name="birth_date4" value="{{ $member->birth_date4 }}" placeholder="Date of Birth"></td>
                                                    <td><input type="text" id="occupation4" class="form-control" name="occupation4" value="{{ $member->occupation4 }}" placeholder="Occupation With Address"></td>
                                                </tr>
                                                <tr>
                                                    <td>5.</td>
                                                    <td><input type="text" id="Name5" class="form-control" name="Name5" value="{{ $member->childresns_name5 }}" placeholder=" Enter Name"></td>
                                                    <td><input type="radio" id="male5" name="gender5" value="51"  {{ old('gender5',$member->gender5)=="51" ? "checked":"" }}> <label for="male5">Male</label>
                                                        <input type="radio" id="female5" name="gender5" value="52"  {{ old('gender5',$member->gender5)=="52" ? "checked":"" }}> <label for="female5">Female</label></td>
                                                    <td><input type="date" id="birth_date5" class="form-control" name="birth_date5" value="{{ $member->birth_date5 }}" placeholder="Date of Birth"></td>
                                                    <td><input type="text" id="occupation5" class="form-control" name="occupation5" value="{{ $member->occupation5 }}" placeholder="Occupation With Address"></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                        {{-- <input type="text" id="detailschildresns" class="form-control" name="detailschildresns">
                                            @if($errors->has('detailschildresns'))
                                                <span class="text-danger"> {{ $errors->first('detailschildresns') }}</span>
                                            @endif --}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="categorymembership" class="mt-3">16. Category of Membership Applied for(Please Tick Mark One Box):</label>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <input type="radio" id="donermember" name="categorymembership" value="1" {{ old('categorymembership',$member->membership_applied)=="1" ? "checked":"" }}>
                                                    @if($errors->has('donermember'))
                                                        <span class="text-danger"> {{ $errors->first('donermember') }}</span>
                                                    @endif
                                                <label for="donermember">Donor Member</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <input type="radio" id="servicemember" name="categorymembership" value="2" {{ old('categorymembership',$member->membership_applied)=="2" ? "checked":"" }}>
                                                    @if($errors->has('servicemember'))
                                                        <span class="text-danger"> {{ $errors->first('servicemember') }}</span>
                                                    @endif
                                                <label for="servicemember">Service Member</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <input type="radio" id="lifemember" name="categorymembership" value="3" {{ old('categorymembership',$member->membership_applied)=="3" ? "checked":"" }}>
                                                    @if($errors->has('lifemember'))
                                                        <span class="text-danger"> {{ $errors->first('lifemember') }}</span>
                                                    @endif
                                                <label for="lifemember">Life Member</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <input type="radio" id="temporarymember" name="categorymembership" value="4" {{ old('categorymembership',$member->membership_applied)=="4" ? "checked":"" }}>
                                                    @if($errors->has('temporarymember'))
                                                        <span class="text-danger"> {{ $errors->first('temporarymember') }}</span>
                                                    @endif
                                                <label for="temporarymember">Temporary Member</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <input type="radio" id="permanentmember" name="categorymembership" value="5" {{ old('categorymembership',$member->membership_applied)=="5" ? "checked":"" }}>
                                                    @if($errors->has('permanentmember'))
                                                        <span class="text-danger"> {{ $errors->first('permanentmember') }}</span>
                                                    @endif
                                                <label for="permanentmember">Permanent Member</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <input type="radio" id="honorarymember" name="categorymembership" value="6" {{ old('categorymembership',$member->membership_applied)=="6" ? "checked":"" }}>
                                                    @if($errors->has('honorarymember'))
                                                        <span class="text-danger"> {{ $errors->first('honorarymember') }}</span>
                                                    @endif
                                                <label for="honorarymember">Honorary Member</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <input type="radio" id="cprporatemember" name="categorymembership" value="7" {{ old('categorymembership',$member->membership_applied)=="7" ? "checked":"" }}>
                                                    @if($errors->has('cprporatemember'))
                                                        <span class="text-danger"> {{ $errors->first('cprporatemember') }}</span>
                                                    @endif
                                                <label for="cprporatemember">Corporate Member</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <input type="radio" id="diplomatedmember" name="categorymembership" value="8" {{ old('categorymembership',$member->membership_applied)=="8" ? "checked":"" }}>
                                                    @if($errors->has('diplomatedmember'))
                                                        <span class="text-danger"> {{ $errors->first('diplomatedmember') }}</span>
                                                    @endif
                                                <label for="diplomatedmember">Diplomate and Foreing National Member</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="mt-3" for="proposed">17. Proposed by (Any Member of chittagong Khulshi Club Ltd.):</label>
                                        <div class="row">
                                            <div class="form-group col-8 ms-5">
                                                <label for="proposedname">a)Name:</label>
                                                <input type="text" id="proposedname" class="form-control" value="{{ old('proposedname',$member->proposed_name)}}" name="proposedname">
                                                    @if($errors->has('proposedname'))
                                                        <span class="text-danger"> {{ $errors->first('proposedname') }}</span>
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-8 ms-5">
                                                <label for="membershipno">b)Membership No:</label>
                                                <input type="text" id="membershipno" class="form-control" value="{{ old('membershipno',$member->membership_no)}}" name="membershipno">
                                                    @if($errors->has('membershipno'))
                                                        <span class="text-danger"> {{ $errors->first('membershipno') }}</span>
                                                    @endif
                                            </div>
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
