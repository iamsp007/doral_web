@extends('layouts.default')
@section('content')
<div class="middle register">
    <div class="container">
        <div class="innerSpace">
            <h1 class="t1 fadeIn">Stay Connected With Absulate Distance!</h1>
        </div>
        <div class="row">
            <div class="col-12 col-xl-7 col-lg-7 col-md-7 col-sm-12">
                <div class="lside">
                    <img src="assets/img/login_img.png" alt="" srcset="assets/img/login_img.png">
                </div>
            </div>
            <div class="col-12 col-xl-5 col-lg-7 col-md-5 col-sm-12">
                <!-- Login Form Start -->
                <div class="login">
                    <div class="top_back"></div>
                    <div class="mid">
                        <div class="p50">
                            <h1 class="t2"><img src="assets/img/icons/doctor.svg" alt=""
                                    srcset="assets/img/icons/doctor.svg" class="mr-2">Sign Up</h1>
                            <!-- Your Referral Type -->
                            <div class="form-group mt-4 pt-2">
                                <label for="referralType" class="label d-block">Your Referral Type</label>
                                <select class="form-control js-example-matcher-start select" name="referralType"
                                    id="referralType">
                                    <option value="1">Insurance</option>
                                    <option value="2">Home Care</option>
                                    <option value="3">Others</option>
                                </select>
                            </div>
                            <form id="ReferralTypeInsurance">
                                <div id="insurance">
                                    <!-- Company Name -->
                                    <div class="form-group">
                                        <label for="company" class="label">Company Name</label>
                                        <select class="form-control  hsbc" name="company" id="company">
                                            <option value="Company 1">Company 1</option>
                                            <option value="Company 2">Company 2</option>
                                            <option value="Company 3">Company 3</option>
                                        </select>
                                    </div>
                                    <!-- Email -->
                                    <div class="form-group">
                                        <label for="email" class="label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                    <div class="form-group">
                                        <span id="response"></label>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-pink btn-block"
                                        name="signup" id="register">Create Your Account</button>
                                </div>
                            </form>
                            <div id="homecare">
                            </div>
                            <form id="ReferralTypeOther">
                                <div id="other">
                                    <div class="row">
                                        <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                            <!-- First Name -->
                                            <div class="form-group">
                                                <label for="fname" class="label">First Name</label>
                                                <input type="text" class="form-control " id="fname"
                                                    name="fname">
                                            </div>
                                        </div>
                                        <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                            <!-- Last Name -->
                                            <div class="form-group">
                                                <label for="lname" class="label">Last Name</label>
                                                <input type="text" class="form-control " id="lname"
                                                    name="lname">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Email -->
                                    <div class="form-group">
                                        <label for="email1" class="label">Email</label>
                                        <input type="email" class="form-control " id="email1" name="email1">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-pink btn-block"
                                        name="signup">Create Your Account</button>
                                </div>
                            </form>
                            <!-- Submit Btn -->
                            <div class="d-flex align-items-center justify-content-center mt-2 t3">Already a
                                Dolar member?<a href="/" class="ml-2 underline">Sign In
                                    here</a></div>
                        </div>
                    </div>
                    <div class="btm_back"></div>
                </div>
                <!-- Login Form End -->
            </div>
        </div>
    </div>
</div>
<script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#register").click(function() {
                var referralType = $("#referralType").val();
                var company = $("#company").val();
                var email = $("#email").val();

                $.ajax({
                    method: 'POST',
                    url: '/companyregister',
                    data: {referralType, company, email},
                    success: function( response ){
                        if(response.status == 1)
                            $("#response").css('color', 'green'); 
                        else 
                            $("#response").css('color', 'red');    
                        $("#response").text(response.message);
                        console.log( response );
                    },
                    error: function( e ) {
                        console.log(e);
                    }
                });
                
            });

        });
</script>    
@stop