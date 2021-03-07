<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../assets/css/fonts/Montserrat.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Welcome to Doral</title>
</head>

<body>
    <!-- Header Section Start -->
    <header class="header">
        <div class="container">
            <div class="block">
                <div>
                    <!-- Logo Start -->
                    <a href="/admin/" title="Welcome to Doral"  class="logo">
                        <img src="../assets/img/logo-white.svg" alt="Welcome to Doral" srcset="../assets/img/logo-white.svg">
                    </a>
                    <!-- Logo End -->
                </div>
                <div>
                    
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
    <!-- Middle Section Start -->
    <section>
        <div class="middle">
            <div class="container">
                <div class="innerSpace">
                    <h1 class="t1 fadeIn">Always Connected For Your Health</h1>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-7">
                        <div class="lside">
                            <img src="../assets/img/login_img.png" alt="" srcset="assets/img/login_img.png">
                        </div>
                    </div>
                    <div class="col-12 col-sm-5">
                        <!-- Login Form Start -->
                        <div class="login">
                            <div class="top_back"></div>
                            <div class="mid">
                                <div class="p50">
                                    <h1 class="t2"><img src="../assets/img/icons/doctor.svg" alt=""
                                            srcset="../assets/img/icons/doctor.svg" class="mr-2">Login</h1>
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
                                                <a href="reset_password.html" target="_blank"
                                                    class="t3 forgot">Forgot</a>
                                            </div>
                                            <input type="password" class="form-control form-control-lg" id="password"
                                                name="password">
                                            <!-- <small id="passwordHelp" class="form-text text-muted mt-2">Assistive Text</small> -->
                                        </div>
                                        
                                        <!-- Submit Btn -->
                                        <button type="button" class="btn btn-primary btn-pink btn-block"
                                            name="signup" id="login">Login</button>
                                        
                                    </form>
                                    
                                    <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert" style="display: none">
                                        <strong>Error!</strong> <span id="error"></span>
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
    </section>
    <!-- Middle Section End -->
    <!-- Footer Section Start -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-2">
                    <!-- Logo Start -->
                    <a href="/admin/login" title="Welcome to Doral">
                        <img src="../assets/img/logo-white.svg" alt="Welcome to Doral" srcset="../assets/img/logo-white.svg">
                    </a>
                    <!-- Logo End -->
                </div>
                <div class="col-12 col-sm-10">
                    <div class="block">
                        <div class="step">
                            <h1 class="t4 mb-2">For Business</h1>
                            <ul class="links">
                                <li><a href="javascript:void(0)">Our Platform</a></li>
                                <li><a href="javascript:void(0)">Telemedicine Equipment</li>
                                <li><a href="javascript:void(0)">Resource Center</li>
                                <li><a href="javascript:void(0)">Contact Sales</li>
                            </ul>
                        </div>
                        <div class="step">
                            <h1 class="t4 mb-2">For Patients</h1>
                            <ul class="links">
                                <li><a href="javascript:void(0)">Our Services</a></li>
                                <li><a href="javascript:void(0)">What We Treat</li>
                                <li><a href="javascript:void(0)">Prescriptions</li>
                                <li><a href="javascript:void(0)">Insurance</li>
                                <li><a href="javascript:void(0)">FAQ's</li>
                                <li><a href="javascript:void(0)">Patient Support</li>
                            </ul>
                        </div>
                        <div class="step">
                            <h1 class="t4 mb-2">For Providers</h1>
                            <ul class="links">
                                <li><a href="javascript:void(0)">Doral Medical Group</a></li>
                                <li><a href="javascript:void(0)">Practicing Online</li>
                                <li><a href="javascript:void(0)">Providers FAQ's</li>
                            </ul>
                        </div>
                        <div class="step">
                            <h1 class="t4 mb-2">About Us</h1>
                            <ul class="links">
                                <li><a href="javascript:void(0)">Careers</a></li>
                                <li><a href="javascript:void(0)">Newsroom</li>
                                <li><a href="javascript:void(0)">Leadership</li>
                                <li><a href="javascript:void(0)">Board of Directors</li>
                                <li><a href="javascript:void(0)">Investors</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ftr">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <ul class="socialIcons">
                            <li>
                                <a href="javascript:void(0)" title="Facebook">
                                    <img src="../assets/img/icons/fb.svg" alt="" srcset="../assets/img/icons/fb.svg">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" title="Instagram">
                                    <img src="../assets/img/icons/instagram.svg" alt=""
                                        srcset="../assets/img/icons/instagram.svg">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" title="LinkedIn">
                                    <img src="../assets/img/icons/linkedin.svg" alt=""
                                        srcset="../assets/img/icons/linkedin.svg">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" title="Twitter">
                                    <img src="../assets/img/icons/twitter.svg" alt=""
                                        srcset="../assets/img/icons/twitter.svg">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" title="Youtube">
                                    <img src="../assets/img/icons/youtube.svg" alt=""
                                        srcset="../assets/img/icons/youtube.svg">
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-6">
                        <ul class="copyright">
                            <li>
                                <a href="javascript:void(0)">Privacy</a><span class="ml-2 mr-2">|</span>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Terms Of Use</a><span class="ml-2 mr-2">|</span>
                            </li>
                            <li>
                                ©2020 Doral Corporation
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.validate.min.js"></script>
    <script src="../assets/js/login.js"></script>
</body>

<script>
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#login").click(function() {
            $("#loader-wrapper").show();
            var email = $("#username").val();
            var password = $("#password").val();
            $.ajax({
                method: 'POST',
                url: '/admin/loginaccess',
                data: {email, password},
                success: function( response ){
                    $("#loader-wrapper").hide();
                    if(response.status == 1)
                        window.location = "/admin/referral-approval";
                    else 
                        $(".alert").show();    
                    $("#error").text(response.message);
                    
                },
                error: function( e ) {
                    $("#loader-wrapper").hide();
                    alert('Something went wrong!');
                }
            });
            
        });

    });
</script> 

</html>