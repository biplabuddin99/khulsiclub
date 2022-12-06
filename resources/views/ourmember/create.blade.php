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
                                            <label for="Fathers">2. Father's/Husband's Name:</label>
                                            <input type="text" id="Fathers" class="form-control" value="{{ old('Fathers')}}" name="Fathers">
                                            @if($errors->has('Fathers'))
                                                <span class="text-danger"> {{ $errors->first('Fathers') }}</span>
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
                                            <input type="text" id="bloodGroup" class="form-control"
                                                placeholder="bloodGroup" name="bloodGroup">
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
                                    <div class="form-group">
                                        <label for="nationalid">6. National ID No/Passport No/Driving License No:</label>
                                        <input type="text" id="nationalid" class="form-control" name="nationalid">
                                            @if($errors->has('nationalid'))
                                                <span class="text-danger"> {{ $errors->first('nationalid') }}</span>
                                            @endif
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
                                                <label for="distic">Dist:</label>
                                                <input type="text" id="distic" class="form-control" name="distic">
                                                    @if($errors->has('distic'))
                                                        <span class="text-danger"> {{ $errors->first('distic') }}</span>
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
                                                <label for="date">Date:</label>
                                                <input type="date" id="date" class="form-control" name="date">
                                                    @if($errors->has('date'))
                                                        <span class="text-danger"> {{ $errors->first('date') }}</span>
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
                                            <label for="issuingAuthotity">3)Issuing Authotity:</label>
                                            <input type="text" id="issuingAuthotity" class="form-control" name="issuingAuthotity">
                                                @if($errors->has('issuingAuthotity'))
                                                    <span class="text-danger"> {{ $errors->first('issuingAuthotity') }}</span>
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
                                            <label for="occupationSpouse">2)Pccupation of Spouse:</label>
                                            <input type="text" id="occupationSpouse" class="form-control" name="occupationSpouse">
                                                @if($errors->has('occupationSpouse'))
                                                    <span class="text-danger"> {{ $errors->first('occupationSpouse') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="detailschildresns" class="mt-3">15. Details of Childresns:(Must be Added with Birth Certificate copy):</label>
                                        <input type="text" id="detailschildresns" class="form-control" name="detailschildresns">
                                            @if($errors->has('detailschildresns'))
                                                <span class="text-danger"> {{ $errors->first('detailschildresns') }}</span>
                                            @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="categorymembership" class="mt-3">16. Category of Membership Applied for(Please Tick Mark One Box):</label>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <input class="form-check-input" type="checkbox" id="donermember" class="form-control" name="donermember">
                                                    @if($errors->has('donermember'))
                                                        <span class="text-danger"> {{ $errors->first('donermember') }}</span>
                                                    @endif
                                                <label for="donermember">Donor Member</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <input class="form-check-input" type="checkbox" id="servicemember" class="form-control" name="servicemember">
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
                                                <input class="form-check-input" type="checkbox" id="lifemember" class="form-control" name="lifemember">
                                                    @if($errors->has('lifemember'))
                                                        <span class="text-danger"> {{ $errors->first('lifemember') }}</span>
                                                    @endif
                                                <label for="lifemember">Life Member</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <input class="form-check-input" type="checkbox" id="temporarymember" class="form-control" name="temporarymember">
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
                                                <input class="form-check-input" type="checkbox" id="permanentmember" class="form-control" name="permanentmember">
                                                    @if($errors->has('permanentmember'))
                                                        <span class="text-danger"> {{ $errors->first('permanentmember') }}</span>
                                                    @endif
                                                <label for="permanentmember">Permanent Member</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <input class="form-check-input" type="checkbox" id="honorarymember" class="form-control" name="honorarymember">
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
                                                <input class="form-check-input" type="checkbox" id="cprporatemember" class="form-control" name="cprporatemember">
                                                    @if($errors->has('cprporatemember'))
                                                        <span class="text-danger"> {{ $errors->first('cprporatemember') }}</span>
                                                    @endif
                                                <label for="cprporatemember">Corporate Member</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <input class="form-check-input" type="checkbox" id="diplomatedmember" class="form-control" name="diplomatedmember">
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
                                                <label for="membershipno">b)Nembership No:</label>
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
</div>
@endsection
