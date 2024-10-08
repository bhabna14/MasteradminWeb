@extends('layouts.custom-app')

    @section('styles')

    @endsection

    @section('class')

        <div class="bg-primary">

    @endsection

    @section('content')

            <div class="page-single">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6 col-md-8 col-sm-8 col-xs-10 card-sigin-main py-45 justify-content-center mx-auto">
                            <div class="card-sigin mt-5 mt-md-0">
                                <!-- Demo content-->
                                <div class="main-card-signin d-md-flex">
                                    <div class="wd-100p"><div class="d-flex mb-4"><a href="{{url('index')}}"><img src="{{asset('assets/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a></div>
                                        <div class="">
                                            <div class="main-signup-header">
                                                <h2 class="text-dark">Get Started</h2>
                                                <h6 class="font-weight-normal mb-4">It's free to signup and only takes a minute.</h6>
                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                <form action="{{ route('store') }}" method="post">
                                                    @csrf

                                                     <div class="row">
                                                         <div class="col-md-6">
                                                            <div class="form-group">
                                                              <label>Firstname </label> <input class="form-control" name="first_name" placeholder="Enter your firstname" type="text" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                              <label>Lastname</label> <input class="form-control" name="last_name" placeholder="Enter your lastname" type="text" required>
                                                            </div>
                                                        </div>
                                                     </div>
                                                     <div class="form-group">
                                                        <label>Phone Number</label> 
                                                        <div style="display: flex; align-items: center;">
                                                            <input type="text" class="form-control" id="country_code" value="+91" readonly style="background-color: #f1f1f1; width: 60px; text-align: center;">
                                                            <input type="text" class="form-control" id="phone" name="phonenumber" placeholder="Enter your phone number" style="margin-left: 5px; flex: 1;" 
                                                                pattern="\d{10}" 
                                                                title="Phone number must be 10 digits without any letters." 
                                                                required>
                                                        </div>
                                                    </div>
                                                    
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label> <input class="form-control"  name="email" placeholder="Enter your Email" type="text" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Health Card Number</label> <input class="form-control" placeholder="Enter your Healthcard Number" name="healthcard" type="healthcard" required>
                                                    </div>
                                                    <!-- <a href="{{url('signin')}}" class="btn btn-primary btn-block">Create Account</a> -->
                                                    <input type="submit" class="btn btn-primary" value="Create Account">
                                                   
                                                </form>
                                                <div class="main-signup-footer mt-3 text-center">
                                                    <p>Already have an account? <a href="{{url('/')}}">Sign In</a></p>
                                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    @endsection

    @section('scripts')

    @endsection
