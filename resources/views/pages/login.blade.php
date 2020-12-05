@extends('layouts.default')
@section('content')
<div class="middle">
    <div class="container">
        <div class="innerSpace">
            <h1 class="t1 fadeIn">Stay Connected With Absulate Distance!</h1>
        </div>
        <div class="row">

            <div class="col-12 col-sm-5">
                <!-- Login Form Start -->
                <div class="login">
                    <div class="top_back"></div>
                    <div class="mid">
                        <div class="p50">
                            <h1 class="t2"><img src="{{ asset('assets/img/icons/doctor.svg') }}" alt=""
                                    srcset="{{ asset('assets/img/icons/doctor.svg') }}" class="mr-2">Login</h1>
                            <form class="mt-4 pt-2" id="loginForm">
                                <!-- Username -->
                                <div class="form-group">
                                    <div class="d-flex justify-content-between">
                                        <label for="username" class="label">Username</label>
                                        <a href="javascript:void(0)" target="_blank" class="t3 forgot">Remind
                                            Me</a>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" id="username"
                                        name="username" aria-describedby="emailHelp">
                                    <!-- <small id="usernameHelp" class="form-text text-muted mt-2">Assistive Text</small> -->
                                </div>
                                <!-- Passowrd -->
                                <div class="form-group">
                                    <div class="d-flex justify-content-between">
                                        <label for="password" class="label">Password</label>
                                        <a href="/resetpassword" target="_blank"
                                            class="t3 forgot">Forgot</a>
                                    </div>
                                    <input type="password" class="form-control form-control-lg" id="password"
                                        name="password">
                                    <!-- <small id="passwordHelp" class="form-text text-muted mt-2">Assistive Text</small> -->
                                </div>
                                <!-- Submit Btn -->
                                <button type="button" class="btn btn-primary btn-pink btn-block"
                                    name="signup" id="login">Login</button>
                                <div class="d-flex align-items-center justify-content-center mt-2 t3">New
                                    here?<a href="/register" class="ml-2 underline">Create Doral
                                        Account</a></div>
                            </form>
                            <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert" style="display: none">
                                <strong>Error!</strong> <span id="response"></span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                            </div>
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

            $("#login").click(function() {
                var email = $("#username").val();
                var password = $("#password").val();

                $.ajax({
                    method: 'POST',
                    url: '/companylogin',
                    data: {email, password},
                    success: function( response ){
                        if(response.status == 1) {
                            window.location = "/referral/employee-pre-physical";
                        }
                        else {
                            $(".alert").show();
                            $("#response").text(response.message);
                            setTimeout(function(){
                                $(".alert").hide();
                            }, 1000);
                        }

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
