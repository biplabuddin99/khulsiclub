@extends('layout.app')

@section('pageTitle',trans('Create Member'))
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
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.ourMember.store')}}">
                                @csrf
                                <div class="row">
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="fullName">1. FULL Name(Block Capital Letter)</label>
                                            <input type="text" id="fullName" class="form-control" value="{{ old('fullName')}}" name="fullName">
                                            @if($errors->has('fullName'))
                                                <span class="text-danger"> {{ $errors->first('fullName') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label for="Fathers">2. Father's Name:</label>
                                            <input type="text" id="Fathers" class="form-control" value="{{ old('Fathers')}}" name="Fathers">
                                            @if($errors->has('Fathers'))
                                                <span class="text-danger"> {{ $errors->first('Fathers') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="husbanName">2.1 Husband's Name:</label>
                                            <input type="text" id="husbanName" class="form-control" value="{{ old('husbanName')}}" name="husbanName">
                                            @if($errors->has('husbanName'))
                                                <span class="text-danger"> {{ $errors->first('husbanName') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="mothersName">3. Mother's Name:</label>
                                            <input type="text" id="mothersName" class="form-control" value="{{ old('mothersName')}}" name="mothersName">
                                            @if($errors->has('mothersName'))
                                                <span class="text-danger"> {{ $errors->first('mothersName') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label for="nominee">4. Nominee:</label>
                                            <input type="text" id="nominee" class="form-control" name="nominee">
                                                @if($errors->has('nominee'))
                                                    <span class="text-danger"> {{ $errors->first('nominee') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="dateOfBirth">5. Date and Place of Birth:</label>
                                            <input type="text" id="dateOfBirth" class="form-control" name="dateOfBirth">
                                                @if($errors->has('dateOfBirth'))
                                                    <span class="text-danger"> {{ $errors->first('dateOfBirth') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nationality">Nationality:</label>
                                                <input type="text" id="nationality" class="form-control" name="nationality">
                                                    @if($errors->has('nationality'))
                                                        <span class="text-danger"> {{ $errors->first('nationality') }}</span>
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="profession">Profession:</label>
                                                <input type="text" id="profession" class="form-control" name="profession">
                                                    @if($errors->has('profession'))
                                                        <span class="text-danger"> {{ $errors->first('profession') }}</span>
                                                    @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="cellno">Cell No:</label>
                                                <input type="text" id="cellno" class="form-control" name="cellno">
                                                    @if($errors->has('cellno'))
                                                        <span class="text-danger"> {{ $errors->first('cellno') }}</span>
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="tel">Tel:</label>
                                                <input type="text" id="tel" class="form-control" name="tel">
                                                    @if($errors->has('tel'))
                                                        <span class="text-danger"> {{ $errors->first('tel') }}</span>
                                                    @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="fax">Fax:</label>
                                                <input type="text" id="fax" class="form-control" name="fax">
                                                    @if($errors->has('fax'))
                                                        <span class="text-danger"> {{ $errors->first('fax') }}</span>
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email">E-mail:</label>
                                                <input type="email" id="email" class="form-control" name="email">
                                                    @if($errors->has('email'))
                                                        <span class="text-danger"> {{ $errors->first('email') }}</span>
                                                    @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="bloodGroup">Blood Group:</label>
                                                <select class="form-control" name="bloodGroup" id="blood">
                                                    <option value="">Select Blood Group</option>
                                                    <option value="A+" {{ old('patientBlood')=='A+' ? 'selected':''}}>A+</option>
                                                    <option value="A-"{{ old('patientBlood')=='A-' ? 'selected':''}}>A-</option>
                                                    <option value="B+"{{ old('patientBlood')=='B+' ? 'selected':''}}>B+</option>
                                                    <option value="B-"{{ old('patientBlood')=='B-' ? 'selected':''}}>B-</option>
                                                    <option value="O+"{{ old('patientBlood')=='O+' ? 'selected':''}}>O+</option>
                                                    <option value="O-"{{ old('patientBlood')=='O-' ? 'selected':''}}>O-</option>
                                                    <option value="AB+"{{ old('patientBlood')=='AB+' ? 'selected':''}}>AB+</option>
                                                    <option value="AB-"{{ old('patientBlood')=='AB-' ? 'selected':''}}>AB-</option>
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
                                            <input type="text" id="nationalid" class="form-control" name="nationalid">
                                                @if($errors->has('nationalid'))
                                                    <span class="text-danger"> {{ $errors->first('nationalid') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="qualification">7. Educational Qualification:</label>
                                        <input type="text" id="qualification" class="form-control" name="qualification">
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
                                                <input type="text" id="vill" class="form-control" name="vill">
                                                    @if($errors->has('vill'))
                                                        <span class="text-danger"> {{ $errors->first('vill') }}</span>
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="postoffice">P.O:</label>
                                                <input type="text" id="postoffice" class="form-control" name="postoffice">
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
                                                <input type="text" id="upazila" class="form-control" name="upazila">
                                                    @if($errors->has('upazila'))
                                                        <span class="text-danger"> {{ $errors->first('upazila') }}</span>
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="district">Dist:</label>
                                                <input type="text" id="district" class="form-control" name="district">
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
                                        <input type="text" id="presentAddress" class="form-control" name="presentAddress">
                                            @if($errors->has('presentAddress'))
                                                <span class="text-danger"> {{ $errors->first('presentAddress') }}</span>
                                            @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="officeAddress">10. Office Address:</label>
                                        <input type="text" id="officeAddress" class="form-control" name="officeAddress">
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
                                                <input type="othersdate" id="othersdate" class="form-control" name="othersdate">
                                                    @if($errors->has('othersdate'))
                                                        <span class="text-danger"> {{ $errors->first('othersdate') }}</span>
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="signatureApplicant">Signature Of Applicant:</label>
                                                <input type="file" id="signatureApplicant" class="form-control" name="signatureApplicant">
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
                                                <input type="text" id="identifyPresident" class="form-control" name="identifyPresident">
                                                    @if($errors->has('identifyPresident'))
                                                        <span class="text-danger"> {{ $errors->first('identifyPresident') }}</span>
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="memberNo">Member No:</label>
                                                <input type="text" id="memberNo" class="form-control" name="memberNo">
                                                    @if($errors->has('memberNo'))
                                                        <span class="text-danger"> {{ $errors->first('memberNo') }}</span>
                                                    @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="mrormis">Mr./Mis.:</label>
                                            <input type="text" id="mrormis" class="form-control" name="mrormis">
                                                @if($errors->has('mrormis'))
                                                    <span class="text-danger"> {{ $errors->first('mrormis') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="otheraddress">Address:</label>
                                            <input type="text" id="otheraddress" class="form-control" name="otheraddress">
                                                @if($errors->has('otheraddress'))
                                                    <span class="text-danger"> {{ $errors->first('otheraddress') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="signaturefounderpresident">Signature Of Founder President:</label>
                                                <input type="file" id="signaturefounderpresident" class="form-control" name="signaturefounderpresident">
                                                    @if($errors->has('signaturefounderpresident'))
                                                        <span class="text-danger"> {{ $errors->first('signaturefounderpresident') }}</span>
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="foundervicepresident">Signature Of Founder Vice President:</label>
                                                <input type="file" id="foundervicepresident" class="form-control" name="foundervicepresident">
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
                                                placeholder="remarks" name="remarks" rows="5">{{ old('remarks')}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="updateincometax">12. Updated Income Tax Paid With TIN/GIR No:</label>
                                        <input type="text" id="updateincometax" class="form-control" name="updateincometax">
                                            @if($errors->has('updateincometax'))
                                                <span class="text-danger"> {{ $errors->first('updateincometax') }}</span>
                                            @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="emergencycontact">13. Emergency Contact Person Name and Cell No:</label>
                                        <input type="text" id="emergencycontact" class="form-control" name="emergencycontact">
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
                                            <input type="text" id="passportnotype" class="form-control" name="passportnotype">
                                                @if($errors->has('passportnotype'))
                                                    <span class="text-danger"> {{ $errors->first('passportnotype') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group ms-5">
                                            <label for="pdateissue">2)Place and Date of Issue:</label>
                                            <input type="text" id="pdateissue" class="form-control" name="pdateissue">
                                                @if($errors->has('pdateissue'))
                                                    <span class="text-danger"> {{ $errors->first('pdateissue') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group ms-5">
                                            <label for="issuingAuthority">3)Issuing Authority:</label>
                                            <input type="text" id="issuingAuthority" class="form-control" name="issuingAuthority">
                                                @if($errors->has('issuingAuthority'))
                                                    <span class="text-danger"> {{ $errors->first('issuingAuthority') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group ms-5">
                                            <label for="validity">4)Validity:</label>
                                            <input type="text" id="validity" class="form-control" name="validity">
                                                @if($errors->has('validity'))
                                                    <span class="text-danger"> {{ $errors->first('validity') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                    <label class="mx-3" for="permanentaddress">b)Family Details:</label>
                                    <div class="row">
                                        <div class="form-group ms-5">
                                            <label for="namespouse">1)Name of Spouse:</label>
                                            <input type="text" id="namespouse" class="form-control" name="namespouse">
                                                @if($errors->has('namespouse'))
                                                    <span class="text-danger"> {{ $errors->first('namespouse') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group ms-5">
                                            <label for="occupationSpouse">2)Occupation of Spouse:</label>
                                            <input type="text" id="occupationSpouse" class="form-control" name="occupationSpouse">
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
                                                <tr class="bg-primary text-white text-center">
                                                    <th class="p-2">Serial</th>
                                                    <th class="p-2">Name</th>
                                                    <th class="p-2">Sex</th>
                                                    <th class="p-2">Date of Birth</th>
                                                    <th class="p-2">Occupation With Address</th>
                                                </tr>
                                            </thead>
                                            <tbody id="details_data">
                                                <tr>
                                                    <td>1.</td>
                                                    <td><input type="text" id="Name1" class="form-control" name="Name1" placeholder=" Enter Name"></td>
                                                    <td><input type="radio" id="male1" name="gender1" value="11"> <label for="male1">Male</label>
                                                        <input type="radio" id="female1" name="gender1" value="12"> <label for="female1">Female</label></td>
                                                    <td><input type="date" id="birth_date1" class="form-control" name="birth_date1" placeholder="Date of Birth"></td>
                                                    <td><input type="text" id="occupation1" class="form-control" name="occupation1" placeholder="Occupation With Address"></td>
                                                </tr>
                                                <tr>
                                                    <td>2.</td>
                                                    <td><input type="text" id="Name2" class="form-control" name="Name2" placeholder=" Enter Name"></td>
                                                    <td><input type="radio" id="male2" name="gender2" value="21"> <label for="male2">Male</label>
                                                        <input type="radio" id="female2" name="gender2" value="22"> <label for="female2">Female</label></td>
                                                    <td><input type="date" id="birth_date2" class="form-control" name="birth_date2" placeholder="Date of Birth"></td>
                                                    <td><input type="text" id="occupation2" class="form-control" name="occupation2" placeholder="Occupation With Address"></td>
                                                </tr>
                                                <tr>
                                                    <td>3.</td>
                                                    <td><input type="text" id="Name3" class="form-control" name="Name3" placeholder=" Enter Name"></td>
                                                    <td><input type="radio" id="male3" name="gender3" value="31"> <label for="male3">Male</label>
                                                        <input type="radio" id="female3" name="gender3" value="32"> <label for="female3">Female</label></td>
                                                    <td><input type="date" id="birth_date3" class="form-control" name="birth_date3" placeholder="Date of Birth"></td>
                                                    <td><input type="text" id="occupation3" class="form-control" name="occupation3" placeholder="Occupation With Address"></td>
                                                </tr>
                                                <tr>
                                                    <td>4.</td>
                                                    <td><input type="text" id="Name4" class="form-control" name="Name4" placeholder=" Enter Name"></td>
                                                    <td><input type="radio" id="male4" name="gender4" value="41"> <label for="male4">Male</label>
                                                        <input type="radio" id="female4" name="gender4" value="42"> <label for="female4">Female</label></td>
                                                    <td><input type="date" id="birth_date4" class="form-control" name="birth_date4" placeholder="Date of Birth"></td>
                                                    <td><input type="text" id="occupation4" class="form-control" name="occupation4" placeholder="Occupation With Address"></td>
                                                </tr>
                                                <tr>
                                                    <td>5.</td>
                                                    <td><input type="text" id="Name5" class="form-control" name="Name5" placeholder=" Enter Name"></td>
                                                    <td><input type="radio" id="male5" name="gender5" value="51"> <label for="male5">Male</label>
                                                        <input type="radio" id="female5" name="gender5" value="52"> <label for="female5">Female</label></td>
                                                    <td><input type="date" id="birth_date5" class="form-control" name="birth_date5" placeholder="Date of Birth"></td>
                                                    <td><input type="text" id="occupation5" class="form-control" name="occupation5" placeholder="Occupation With Address"></td>
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
                                                <input type="radio" id="donermember" name="categorymembership" value="1">
                                                    @if($errors->has('donermember'))
                                                        <span class="text-danger"> {{ $errors->first('donermember') }}</span>
                                                    @endif
                                                <label for="donermember">Donor Member</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <input type="radio" id="servicemember" name="categorymembership" value="2">
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
                                                <input type="radio" id="lifemember" name="categorymembership" value="3">
                                                    @if($errors->has('lifemember'))
                                                        <span class="text-danger"> {{ $errors->first('lifemember') }}</span>
                                                    @endif
                                                <label for="lifemember">Life Member</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <input type="radio" id="temporarymember" name="categorymembership" value="4">
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
                                                <input type="radio" id="permanentmember" name="categorymembership" value="5">
                                                    @if($errors->has('permanentmember'))
                                                        <span class="text-danger"> {{ $errors->first('permanentmember') }}</span>
                                                    @endif
                                                <label for="permanentmember">Permanent Member</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <input type="radio" id="honorarymember" name="categorymembership" value="6">
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
                                                <input type="radio" id="cprporatemember" name="categorymembership" value="7">
                                                    @if($errors->has('cprporatemember'))
                                                        <span class="text-danger"> {{ $errors->first('cprporatemember') }}</span>
                                                    @endif
                                                <label for="cprporatemember">Corporate Member</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <input type="radio" id="diplomatedmember" name="categorymembership" value="8">
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
                                                <input type="text" id="proposedname" class="form-control" name="proposedname">
                                                    @if($errors->has('proposedname'))
                                                        <span class="text-danger"> {{ $errors->first('proposedname') }}</span>
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-8 ms-5">
                                                <label for="membershipno">b)Membership No:</label>
                                                <input type="text" id="membershipno" class="form-control" name="membershipno">
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
@endsection
