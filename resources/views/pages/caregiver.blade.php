<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="../assets/css/fonts/Montserrat.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.min.css">
    <link rel="stylesheet" href="../assets/css/responsive.min.css">
    <title>Doral Health Connect | Caregiver</title>
</head>

<body>
    <!-- Header Section Start -->
    <header class="header">
        <div class="container">
            <div class="block">
                <div>
                    <!-- Logo Start -->
                    <a href="../landing/index.html" title="Welcome to Doral"  class="logo">
                        <img src="../assets/img/logo-white.svg" alt="Welcome to Doral"
                            srcset="../assets/img/logo-white.svg">
                    </a>
                    <!-- Logo End -->
                </div>
               
            </div>
        </div>
    </header>
    <!-- Header Section End -->
    <!-- Middle Section Start -->
    <section>
        <div class="middle">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-5 col-md-8">
                        <!-- caregiver response Form Start -->
                        <div class="caregiver_response">
                            <div class="top_back"></div>
                            <div class="mid">
                                <div class="p50">
                                   <h1 class="t2">Caregiver Response : </h1>
                                   <hr class="hr_border">
                                   <form class="mt-4" id="ResponseForm" method="get">
                                        <!-- Patient Name -->
                                        <div class="form-group">
                                                <label for="patient_name" class="label">Patient Name:</label>
                                                <p class="t5">John Doe</p>
                                        </div>
                                        <!-- Generated Time -->
                                        <div class="form-group">
                                                <label class="label">Generated Time:</label>
                                                <p class="t5">12.00AM</p>
                                        </div>
                                         <!-- Solved Time -->
                                         <div class="form-group">
                                                <label class="label">Solved Time:</label>
                                                <p class="t5">1:00AM</p>
                                         </div>
                                         <!-- Reason -->
                                         <div class="form-group">
                                                <label class="label">Reason:</label>
                                                <p class="t5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                                        </div>
                                         <!-- Response -->
                                         <div class="form-group">
                                                <label class="label">Detail Note:</label>
                                                <textarea class="form-control form-control-green" rows="5" id="response"></textarea>
                                        </div>
                                        <!-- Submit Btn -->
                                        <button type="button" class="btn btn-primary btn-pink btn-block"
                                                name="signup" id="caregiverResponse">Submit</button>
                                        </form>
                                </div>
                            </div>
                            <div class="btm_back"></div>
                        </div>
                        <!-- caregiver response Form End -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Middle Section End -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.validate.min.js"></script>
    <script src="../assets/js/login.min.js"></script>
    <script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#caregiverResponse").click(function () {
                window.location = "/";
//                var response = $("#response").val();
//                $.ajax({
//                    method: 'POST',
//                    url: '/caregiverResponseSubmit',
//                    data: {response},
//                    success: function (response) {
//                        if (response.status == 1) {
//                            window.location = "/";
//                        } else {
//                            $(".alert").show();
//                            $("#response").text(response.message);
//                            setTimeout(function () {
//                                $(".alert").hide();
//                            }, 1000);
//                        }
//                        console.log(response);
//                    },
//                    error: function (e) {
//                        console.log(e);
//                    }
//                });

            });

        });
    </script>
</body>

</html>