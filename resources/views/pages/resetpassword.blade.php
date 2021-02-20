@extends('layouts.default')
@section('content')
<div class="middle">
    <div class="container">
        <div class="innerSpace">
            <h1 class="t1 fadeIn">Always Connected For Your Health</h1>
        </div>
        <div class="row">
            <div class="col-12 col-sm-7">
                <div class="lside">
                    <img src="assets/img/login_img.png" alt="" srcset="assets/img/login_img.png">
                </div>
            </div>
            <div class="col-12 col-sm-5">
                <!-- Login Form Start -->
                <div class="login">
                    <div class="top_back"></div>
                    <div class="mid">
                        <div class="p50">
                            <h1 class="t2"><img src="assets/img/icons/doctor.svg" alt=""
                                    srcset="assets/img/icons/doctor.svg" class="mr-2">Reset Your Password</h1>
                            <p class="mt-4 text-small">
                                <small class="text-muted">
                                    Enter your user account's verified email address and we will send you a
                                    password reset link.</small>
                            </p>
                            <form class="mt-3" id="resetPasswordForm">
                                <!-- Username -->
                                <div class="form-group">
                                    <label for="emailaddress" class="label">Email</label>
                                    <input type="text" class="form-control form-control-lg" id="emailaddress"
                                        name="emailaddress" aria-describedby="emailHelp">
                                    <!-- <small id="usernameHelp" class="form-text text-muted mt-2">Assistive Text</small> -->
                                </div>
                                <div class="form-group">
                                    <span id="response"></label>
                                </div>
                                <button type="button" class="btn btn-primary btn-pink btn-block"
                                    name="signup" id="resetpassword">Send password reset email</button>
                                <div class="d-flex align-items-center justify-content-center mt-2 t3">Already a
                                    Dolar member?<a href="/" class="ml-2 underline">Sign In
                                        here</a></div>
                            </form>
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

            $("#resetpassword").click(function() {
                var email = $("#emailaddress").val();
                $("#loader-wrapper").show();
                $.ajax({
                    method: 'POST',
                    url: '/companyresetpassword',
                    data: {email},
                    success: function( response ){
                        $("#loader-wrapper").hide();
                        if(response.status == 1)
                            $("#response").css('color', 'green'); 
                        else 
                            $("#response").css('color', 'red');    
                        $("#response").text(response.message);
                    },
                    error: function( e ) {
                        $("#loader-wrapper").hide();
                        alert('Something went wrong!');
                    }
                });
                
            });

        });
</script> 
@stop