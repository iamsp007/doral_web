<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="../assets/css/fonts/Montserrat.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/caregiver.min.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <link rel="stylesheet" href="../assets/css/tail.select-default.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
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
                                   <h1 class="t2">Note</h1>
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
                                       
                                         <!-- Reason -->
                                         <div class="form-group">
                                                <label class="label">Reason we approached:</label>
                                                <p class="t5">Your patient's sugar is slightly higher than regular kindly follow recommend actions below</p>
                                                
                                        </div>
                                          <!-- Recommendation -->
                                          <div class="form-group">
                                            <label for="recommendation" class="label">Recommendation:</label>
                                            <p class="t5"><b class="f-20">&bull;</b> Please patient takes their insulin or glucose medication.</p>
                                            <p class="t5"><b class="f-20">&bull;</b> Please ensure that patient is not standing or walking.</p>
                                            <p class="t5"><b class="f-20">&bull;</b> Please repeat finger-stick in one hour.</p>
                                           
                                    </div>
                                          <!-- Recommendation -->
<!--                                        <div class="form-group">
                                            <label for="recommendation" class="label">Please select your action taken.</label>
                                            <select class="form-group recommendation">
                                                 <option disabled selected>--Select--</option>
                                                <option>Play calm music</option>
                                                <option>Offer water to patient</option>
                                                <option>Engage Patient Pleasant conversation</option>
                                                <option>Ensure Patient medication was taken today</option>
                                            </select>
                                    </div>-->
<!--                                        Reason 
                                       <div class="form-group">
                                        <label class="label">Caregiver Recommendation:</label>
                                        <p class="t5">Observe patient closely. If you see following symptoms:</p>
                                       
                                    </div>
                                
                                  Reason 
                                 <div class="form-group">
                                    <label class="label">what are the symptoms you see:</label>
                                    <div class="input-group-prepend mr-2">
                                        <select class="select" multiple id="department">
                                            <option>Is patient sweating Heavy?</option>
                                            <option>Is patient complaining Dizzines or Vomiting?</option>
                                            <option>Patient Head hurts?</option>
                                            <option>Patient feeling of lightheadedness or dizziness, or other signs?</option>
                                            
                                        </select>
                                    </div>
                                   
                            </div>-->
                                       
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
    <script src="../assets/js/login.js"></script>
    <script src="../assets/js/tail.select-full.min.js"></script>
    <script src="../assets/js/app.common.min.js"></script>
    <script src="../assets/js/app.clinician.caregiver.min.js"></script>
    <script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#caregiverResponse").click(function () {
                window.location = "http://doralhealthconnect.com";
//                var response = $("#response").val();
//                  $("#loader-wrapper").hide();
//                $.ajax({
//                    method: 'POST',
//                    url: '/caregiverResponseSubmit',
//                    data: {response},
//                    success: function (response) {
    //                      $("#loader-wrapper").hide();
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
    //                      $("#loader-wrapper").hide();
//                        console.log(e);
//                    }
//                });

            });

        });
    </script>
</body>

</html>