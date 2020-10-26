@extends('layouts.default')
@section('content')
<div class="middle">
    <div class="container">
        <div class="innerSpace">
            <h1 class="t1 fadeIn">Stay Connected With Absulate Distance!</h1>
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
                                    srcset="assets/img/icons/doctor.svg" class="mr-2">Login</h1>
                            <form class="mt-4 pt-2" id="loginForm" method="post">
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
                                <button type="submit" class="btn btn-primary btn-pink btn-block"
                                    name="signup">Login</button>
                                <div class="d-flex align-items-center justify-content-center mt-2 t3">New
                                    here?<a href="/register" class="ml-2 underline">Create Doral
                                        Account</a></div>
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
@stop