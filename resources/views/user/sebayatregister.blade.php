@extends('user.layouts.app')

@section('styles')
    <!--- Internal Select2 css-->
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <span class="main-content-title mg-b-0 mg-b-lg-1">SEBAYAT REGISTRATION</span>
        </div>
        <div class="justify-content-center mt-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">SEBAYAT REGISTRATION</li>
            </ol>
        </div>
    </div>
    <!-- /breadcrumb -->
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    @if (session()->has('success'))
        <div class="alert alert-success" id="Message">
            {{ session()->get('success') }}
        </div>
    @endif
    <form action="{{ route('user.updateUserInfo', urlencode($userinfo->user_id)) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Your form fields here -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            Profile Information
                        </div>
                        <div class="row">
                            <input type="hidden" class="form-control" name="user_id" value="{{ $userinfo->user_id ?? '' }}">
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" value="{{ $userinfo->first_name ?? '' }}" name="first_name" placeholder="Enter First Name">
                                </div>
    
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" value="{{ $userinfo->email ?? '' }}" name="email" placeholder="Enter email">
                                </div>
                            </div>
    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" value="{{ $userinfo->last_name ?? '' }}" name="last_name" placeholder="Enter Last Name">
                                </div>
                                <div class="form-group">
                                    <label for="phonenumber">Phone Number</label>
                                    <input type="text" class="form-control" value="{{ $userinfo->phonenumber ?? '' }}" name="phonenumber" placeholder="Phone Number">
                                </div>
                            </div>
    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="dob">DOB</label>
                                    <input type="date" class="form-control" value="{{ $userinfo->dob ?? '' }}" name="dob">
                                </div>
    
                                <div class="form-group">
                                    <label for="bloodgrp">Blood Group</label>
                                    <input type="text" class="form-control" value="{{ $userinfo->bloodgrp ?? '' }}" name="bloodgrp" placeholder="Enter Blood Group">
                                </div>
                            </div>
    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="qualification">Educational Qualification</label>
                                    <input type="text" class="form-control" value="{{ $userinfo->qualification ?? '' }}" name="qualification" placeholder="Enter Educational Qualification">
                                </div>
                            </div>
    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="healthcard">Health Card Number</label>
                                    <input type="text" class="form-control" name="healthcard" value="{{ $userinfo->healthcard ?? '' }}" placeholder="Enter Health Card Number">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="templeid">Temple Id</label>
                                    <input type="text" name="templeid" class="form-control" value="{{ $userinfo->templeid ?? '' }}" id="templeid" placeholder="Enter Temple Id">
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="userphoto">Photo</label>
                                    <input type="file" name="userphoto" class="form-control">
                                </div>
                                @if ($userinfo->userphoto != '')
                                    <div class="form-group">
                                        <img class="br-5" src="{{ asset('storage/assets/uploads/userphoto/' . $userinfo->userphoto) }}" alt="user" style="width: 399px; height: 300px;">
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="datejoin">Date of join in temple seba</label>
                                    <input type="date" class="form-control" id="datejoin" value="{{ $userinfo->datejoin ?? '' }}" name="datejoin" placeholder="">
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="">
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    
    <!-- Family Information -->
    <!-- Family Information Form //done -->
    <form action="{{  route('user.updateFamilyInfo', urlencode($userinfo->user_id)) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            Family Information
                        </div>

                        <div class="row">
                            <!-- Hidden input for user_id -->
                            <input type="hidden" class="form-control" name="user_id" value="{{ $userinfo->user_id ?? '' }}">

                            <!-- Father's Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fathername">Father's Name</label>
                                    <input type="text" class="form-control" name="fathername"
                                        value="{{ $familyinfo->fathername ?? '' }}" placeholder="Enter Father's Name">
                                </div>
                            </div>

                            <!-- Father's Photo -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fatherphoto">Father's Photo</label>
                                    @if($familyinfo && $familyinfo->fatherphoto)
                                        <div>
                                            <img src="{{ asset('storage/' . $familyinfo->fatherphoto) }}" alt="Father's Photo"
                                                style="max-width: 150px; height: auto;">
                                        </div>
                                    @endif
                                    <input type="file" class="form-control" name="fatherphoto">
                                </div>
                            </div>

                            <!-- Mother's Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mothername">Mother's Name</label>
                                    <input type="text" class="form-control" name="mothername"
                                        value="{{ $familyinfo->mothername ?? '' }}" placeholder="Enter Mother's Name">
                                </div>
                            </div>

                            <!-- Mother's Photo -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="motherphoto">Mother's Photo</label>
                                    @if($familyinfo && $familyinfo->motherphoto)
                                        <div>
                                            <img src="{{ asset('storage/' . $familyinfo->motherphoto) }}" alt="Mother's Photo"
                                                style="max-width: 150px; height: auto;">
                                        </div>
                                    @endif
                                    <input type="file" class="form-control" name="motherphoto">
                                </div>
                            </div>

                            <!-- Marital Status -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="marital">Marital Status</label>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="rdiobox">
                                                <input name="marital" value="married" type="radio"
                                                    {{ isset($familyinfo) && $familyinfo->marital == 'married' ? 'checked' : '' }}
                                                    onchange="toggleSpouseAndChildren(this)">
                                                <span>Married</span>
                                            </label>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="rdiobox">
                                                <input name="marital" value="unmarried" type="radio"
                                                    {{ isset($familyinfo) && $familyinfo->marital == 'unmarried' ? 'checked' : '' }}
                                                    onchange="toggleSpouseAndChildren(this)">
                                                <span>Unmarried</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                           <!-- Spouse's Name -->
                            <div class="col-md-6" id="spouse-info" style="display: none;">
                                <div class="form-group">
                                    <label for="spouse">Spouse's Name</label>
                                    <input type="text" class="form-control" name="spouse"
                                        value="{{ $familyinfo->spouse ?? '' }}" placeholder="Enter Spouse's Name">
                                </div>
                            </div>

                            <!-- Spouse's Photo -->
                            <div class="col-md-6" id="spouse-photo" style="display: none;">
                                <div class="form-group">
                                    <label for="spousephoto">Spouse's Photo</label>
                                    @if($familyinfo && $familyinfo->spousephoto)
                                        <div>
                                            <img src="{{ asset('storage/' . $familyinfo->spousephoto) }}" alt="Spouse's Photo"
                                                style="max-width: 150px; height: auto;">
                                        </div>
                                    @endif
                                    <input type="file" class="form-control" name="spousephoto">
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Children Information -->
    <div class="row" id="children-info" style="display: none;">
        <div class="col-lg-12 col-md-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        Children Information
                    </div>
                    <form action="{{ route('user.updateChildInfo') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    
                        <div id="show_item">
                            <div class="row" id="child-row-0">
                                <input type="hidden" class="form-control" name="user_id"
                                    value="{{ $userinfo->user_id ?? '' }}">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="childrenname[]" placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="dob">DOB</label>
                                        <input type="date" class="form-control" name="dob[]" placeholder="Enter DOB">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select name="gender[]" class="form-control">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="dob">Children Photo</label>
                                        <input type="file" class="form-control" name="childphoto[]">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-1  mb-2">
                            <button type="button" class="btn btn-success add_more" id="addChild">Add More</button>
                        </div>
                    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Existing Children Table -->
                    <table class="table table-bordered mt-4">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Child Name</th>
                                <th>Child DOB</th>
                                <th>Gender</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($childinfos as $index => $childinfo)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $childinfo->childrenname }}</td>
                                    <td>{{ $childinfo->dob }}</td>
                                    <td>{{ ucfirst($childinfo->gender) }}</td>
                                    <td>
                                        <form action="{{ route('user.updateChildStatus', $childinfo->id) }}" method="POST" onsubmit="return confirmDelete();">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!---ID card info -->

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        ID Card Information
                    </div>
                    <form action="{{ route('user.updateIdInfo') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="user_id" value="{{ $userinfo->user_id ?? '' }}">

                                        <div id="show_doc_item">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="idproof">Select ID Proof</label>
                                                        <select name="idproof[]" class="form-control" id="idproof">
                                                            <option value="adhar">Adhar Card</option>
                                                            <option value="voter">Voter Card</option>
                                                            <option value="pan">Pan Card</option>
                                                            <option value="DL">Driving License</option>
                                                            <option value="health card">Health Card</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="idnumber">Number</label>
                                                        <input type="text" class="form-control" name="idnumber[]" id="idnumber"
                                                            placeholder="Enter Number">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="uploadoc">Upload Document</label>
                                                        <input type="file" class="form-control" name="uploadoc[]" id="uploadoc">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-dark add_item_btn" id="adddoc">Add More</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-primary" value="Submit">
                                                </div>
                                            </div>
                                        </div>


                                
                    </form>
                    
                    <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                        <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">ID Number</th>
                                <th class="border-bottom-0">Doc Image</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($iddetails as $index => $iddetail)
                                @if ($iddetail->idproof != '')
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $iddetail->idproof }}</td>
                                        <td>{{ $iddetail->idnumber }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/id_docs/' . $iddetail->uploadoc) }}" style="width:150px; height:100px" alt="">
                                        </td>
                                        <td>
                                            <form action="{{ route('user.updateIdstatus', $iddetail->id) }}" method="POST" onsubmit="return confirmDelete();">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                        
                                    </tr>
                                @else
                                    <tr>
                                        <td colspan="5">Nothing</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->


    <!-- Address Information Row -->
    <form action="{{ route('user.updateAddressInfo', urlencode($userinfo->user_id)) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            Address Information
                        </div>
                        <input type="hidden" name="user_id" value="{{ $userinfo->user_id ?? '' }}">
    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="preaddress">Present Address</label>
                                    <input type="text" class="form-control" name="preaddress" value="{{ old('preaddress', $address->preaddress ?? '') }}" id="preaddress" placeholder="Enter Address">
                                </div>
                            
                                <!-- Row for Post and District -->
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-6">
                                        <label for="prepost">Post</label>
                                        <input type="text" class="form-control" name="prepost" value="{{ old('prepost', $address->prepost ?? '') }}" id="prepost" placeholder="Enter Post">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="predistrict">District</label>
                                        <input type="text" class="form-control" name="predistrict" value="{{ old('predistrict', $address->predistrict ?? '') }}" id="predistrict" placeholder="Enter District">
                                    </div>
                                  </div>
                                </div>
                            
                                <!-- Row for State and Country -->
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="prestate">State</label>
                                            <input type="text" class="form-control" name="prestate" value="{{ old('prestate', $address->prestate ?? 'Odisha') }}" id="prestate" placeholder="Enter State">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="precountry">Country</label>
                                            <input type="text" class="form-control" name="precountry" value="{{ old('precountry', $address->precountry ?? 'India') }}" id="precountry" placeholder="Enter Country">
                                        </div>
                                    </div>
                                </div>
                            
                                <!-- Other form groups -->
                                <div class="form-group">
                                    <label for="prepincode">Pincode</label>
                                    <input type="text" class="form-control" name="prepincode" value="{{ old('prepincode', $address->prepincode ?? '') }}" id="prepincode" placeholder="Enter Pincode">
                                </div>
                                <div class="form-group">
                                    <label for="prelandmark">Landmark</label>
                                    <input type="text" class="form-control" name="prelandmark" value="{{ old('prelandmark', $address->prelandmark ?? '') }}" id="prelandmark" placeholder="Enter Landmark">
                                </div>
                                <label class="ckbox">
                                    <input type="checkbox" id="same" onchange="addressFunction()"
                                        {{ $address && $address->peraddress ? 'checked' : '' }}>
                                    <span class="mg-b-10">Same as Present Address</span>
                                </label>
                            </div>
                            
    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="peraddress">Permanent Address</label>
                                    <input type="text" class="form-control" name="peraddress" value="{{ old('peraddress', $address->peraddress ?? '') }}" id="peraddress" placeholder="Enter Address">
                                </div>
                            
                                <!-- Row for Post and District -->
                                <div class="form-group">
                                   <div class="row">
                                        <div class="col-md-6">
                                            <label for="perpost">Post</label>
                                            <input type="text" class="form-control" name="perpost" value="{{ old('perpost', $address->perpost ?? '') }}" id="perpost" placeholder="Enter Post">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="perdistri">District</label>
                                            <input type="text" class="form-control" name="perdistri" value="{{ old('perdistri', $address->perdistri ?? '') }}" id="perdistri" placeholder="Enter District">
                                        </div>
                                   </div>
                                </div>
                            
                                <!-- Row for State and Country -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="perstate">State</label>
                                            <input type="text" class="form-control" name="perstate" value="{{ old('perstate', $address->perstate ?? '') }}" id="perstate" placeholder="Enter State">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="percountry">Country</label>
                                            <input type="text" class="form-control" name="percountry" value="{{ old('percountry', $address->percountry ?? '') }}" id="percountry" placeholder="Enter Country">
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <label for="perpincode">Pincode</label>
                                    <input type="text" class="form-control" name="perpincode" value="{{ old('perpincode', $address->perpincode ?? '') }}" id="perpincode" placeholder="Enter Pincode">
                                </div>
                                <div class="form-group">
                                    <label for="perlandmark">Landmark</label>
                                    <input type="text" class="form-control" name="perlandmark" value="{{ old('perlandmark', $address->perlandmark ?? '') }}" id="perlandmark" placeholder="Enter Landmark">
                                </div>
                            </div>
                            
                        </div>
    
                        <div class="row">
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

   <!--Bank info row -->
    <form action="{{ route('user.updateBankInfo', urlencode($userinfo->user_id)) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            Bank Information
                        </div>
                        <div class="row">
                            <input type="hidden" class="form-control" name="user_id" value="{{ $userinfo->user_id ?? '' }}">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bankname">Bank Name</label>
                                    <input type="text" class="form-control" name="bankname" id="bankname" value="{{ old('bankname', $bankinfo->bankname ?? '') }}" placeholder="Enter Bank Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="branchname">Branch Name</label>
                                    <input type="text" class="form-control" name="branchname" id="branchname" value="{{ old('branchname', $bankinfo->branchname ?? '') }}" placeholder="Enter Branch Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ifsccode">IFSC Code</label>
                                    <input type="text" class="form-control" name="ifsccode" id="ifsccode" value="{{ old('ifsccode', $bankinfo->ifsccode ?? '') }}" placeholder="Enter IFSC Code">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="accname">Account Holder Name</label>
                                    <input type="text" class="form-control" name="accname" id="accname" value="{{ old('accname', $bankinfo->accname ?? '') }}" placeholder="Enter Account Holder Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="accnumber">Account Number</label>
                                    <input type="text" class="form-control" name="accnumber" id="accnumber" value="{{ old('accnumber', $bankinfo->accnumber ?? '') }}" placeholder="Enter Account Number">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <!--- other info -->
    <div class="row" >
        <div class="col-lg-12 col-md-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        Other Information
                    </div>
                    <form action="{{ route('user.updateOtherInfo') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    
                        <div id="show_seba">
                            <div class="row" id="child-row-0">
                                <input type="hidden" class="form-control" name="user_id"
                                    value="{{ $userinfo->user_id ?? '' }}">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Type Of Seba</label>
                                        <input type="text" class="form-control" name="typeseba[]" placeholder="Enter Type Of Seba">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="dob">Beddha Seba</label>
                                        <input type="text" class="form-control" name="beddhaseba[]" placeholder="Enter Beddha Seba">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4  mb-2">
                                    <button type="button" class="btn btn-success add_more" id="addseba">Add More</button>
                                </div>
                               
                            </div>
                        </div>
                     
                    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Existing Children Table -->
                    @if(!empty($typeofsebas) && $typeofsebas->count() > 0)
                    <table class="table table-bordered mt-4">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Type Of Seba</th>
                                <th>Beddha Seba</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($typeofsebas as $typeofseba)
                                <tr>
                                    <td>{{ $loop->iteration }}</td> <!-- This will output the current iteration number -->
                                    <td>{{ $typeofseba->typeseba }}</td>
                                    <td>{{ $typeofseba->beddhaseba }}</td>
                                    <td>
                                        <form action="{{ route('user.updateSebaStatus', $typeofseba->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                @else
                    <p>No Seba information available.</p>
                @endif
                
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->

     <!--- other info -->
      <!-- row -->
      <form action="{{ route('user.updateSocialMedia', urlencode($userinfo->user_id)) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            Social Media
                        </div>
                        <!-- <p class="mg-b-20">A form control layout using basic layout.</p> -->
                        <div class="row">
                            <input type="hidden" class="form-control" id="exampleInputEmail1" name="user_id"
                                value="{{ $userinfo->user_id ?? '' }}" placeholder="Enter First Name">

                            <div class="col-md-4">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Facebook Url</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        value="{{ $socialmedia->facebookurl ?? '' }}" name="facebookurl" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Instagram Url</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1"
                                        name="instagramurl" value="{{ $socialmedia->instagramurl ?? '' }}"
                                        placeholder="">
                                </div>


                            </div>
                            <div class="col-md-4">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Youtube Url</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="youtubeurl"
                                        value="{{ $socialmedia->youtubeurl ?? '' }}" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Linkedin Url</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="linkedinurl"
                                        value="{{ $socialmedia->linkedinurl ?? '' }}" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Twitter Url</label>
                                    <input type="text" name="twitterurl" class="form-control"
                                        value="{{ $socialmedia->twitterurl ?? '' }}" id="exampleInputEmail1"
                                        placeholder="">
                                </div>

                            </div>
                            

                        </div>
                        <div class="row">
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <!-- <button class="btn btn-primary add_item_btn" id="adddoc">Add More</button> -->
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- /row -->





    



                    



  

 
 
@endsection

@section('modal')
@endsection

@section('scripts')
    <!-- Form-layouts js -->
    <script src="{{ asset('assets/js/form-layouts.js') }}"></script>

    <!--Internal  Select2 js -->
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script>
        $(document).ready(function() {
            // Add Children Information Input
            $("#addChild").click(function() {
                $("#show_item").append(`
                    <div class="row input-wrapper">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="childrenname">Name</label>
                                <input type="text" class="form-control" name="childrenname[]" placeholder="Enter Children name">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="dob">DOB</label>
                                <input type="date" class="form-control" name="dob[]" placeholder="Enter DOB">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select name="gender[]" class="form-control">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="dob">Children Photo</label>
                                        <input type="file" class="form-control" name="childphoto[]" >
                                    </div>
                                </div>
                        <div class="col-md-2">
                            <div class="form-group mt-2">
                                <button type="button" class="btn btn-danger removeChild">Remove</button>
                            </div>
                        </div>
                    </div>
                `);
            });
    
            // Remove Children Information Input
            $(document).on('click', '.removeChild', function() {
                $(this).closest('.input-wrapper').remove(); // Closest parent div with class input-wrapper is removed
            });


            $("#addseba").click(function() {
                $("#show_seba").append(`
                    <div class="row input-wrapper1">
                        <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Type Of Seba</label>
                                        <input type="text" class="form-control" name="typeseba[]" placeholder="Enter Type Of Seba">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="dob">Beddha Seba</label>
                                        <input type="text" class="form-control" name="beddhaseba[]" placeholder="Enter Beddha Seba">
                                    </div>
                                </div>
                        
                       
                        <div class="col-md-2">
                            <div class="form-group mt-4 mt-2">
                                <button type="button" class="btn btn-danger removeseba">Remove</button>
                            </div>
                        </div>
                    </div>
                `);
            });
    
            // Remove Children Information Input
            $(document).on('click', '.removeseba', function() {
                $(this).closest('.input-wrapper1').remove(); // Closest parent div with class input-wrapper is removed
            });
    
    
            // Add Document Input
            $("#adddoc").click(function() {
                $("#show_doc_item").append(`
                    <div class="row input-wrapper_doc">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="idproof">Select ID Proof</label>
                                <select name="idproof[]" class="form-control">
                                    <option value="adhar">Adhar Card</option>
                                    <option value="voter">Voter Card</option>
                                    <option value="pan">Pan Card</option>
                                    <option value="DL">Driving License</option>
                                    <option value="health card">Health Card</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="idnumber">Number</label>
                                <input type="text" name="idnumber[]" class="form-control" placeholder="Enter Number">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="uploadoc">Upload Document</label>
                                <input type="file" name="uploadoc[]" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 mt-2 mb-1">
                            <button type="button" class="btn btn-danger remove_doc">Remove</button>
                        </div>
                    </div>
                `);
            });
    
            // Remove Document Input
            $(document).on('click', '.remove_doc', function() {
                $(this).closest('.input-wrapper_doc').remove();
            });
        });
    </script>
    
    <script>
        function addressFunction() {
            if (document.getElementById("same").checked) {
                document.getElementById("peraddress").value = document.getElementById("preaddress").value;
                document.getElementById("perpost").value = document.getElementById("prepost").value;
                document.getElementById("perdistri").value = document.getElementById("predistrict").value;
                document.getElementById("perstate").value = document.getElementById("prestate").value;
                document.getElementById("percountry").value = document.getElementById("precountry").value;
                document.getElementById("perpincode").value = document.getElementById("prepincode").value;
                document.getElementById("perlandmark").value = document.getElementById("prelandmark").value;

            } else {
                document.getElementById("peraddress").value = "";
                document.getElementById("perpost").value = "";
                document.getElementById("perdistri").value = "";
                document.getElementById("perstate").value = "";
                document.getElementById("percountry").value = "";
                document.getElementById("perpincode").value = "";
                document.getElementById("perlandmark").value = "";
            }
        }
    </script>
    <script>
        setTimeout(function(){
            document.getElementById('Message').style.display = 'none';
        }, 3000);
    </script>
    <script>
        function toggleSpouseAndChildren(radio) {
            var isMarried = radio.value === 'married';
            document.getElementById('spouse-info').style.display = isMarried ? 'block' : 'none';
            document.getElementById('spouse-photo').style.display = isMarried ? 'block' : 'none';
            document.getElementById('children-info').style.display = isMarried ? 'block' : 'none';
        }
    
        // Initialize visibility based on the current marital status on page load
        document.addEventListener('DOMContentLoaded', function () {
            var maritalStatus = document.querySelector('input[name="marital"]:checked');
            if (maritalStatus) {
                toggleSpouseAndChildren(maritalStatus);
            }
        });
    </script>
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this record?");
        }
    </script>


    


@endsection
