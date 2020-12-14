<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/fonts/Montserrat.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/caregiver.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/tail.select-default.min.css') }}" />
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
                        <img src="{{ asset('assets/img/logo-white.svg') }}" alt="Welcome to Doral"
                            srcset="{{ asset('assets/img/logo-white.svg') }}">
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
                                   <form class="mt-4" id="ResponseForm">
                                        <!-- Patient Name -->
                                        <div class="form-group">
                                                <label for="patient_name" class="label">Patient Name:</label>
                                                <input type="hidden" value="1" name="patientId" id="patientId">
                                                <input type="hidden" value="caregiver/1" name="url" id="url">
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
                                                <p class="t5">Your patient's blood pressure is slightly higher than regular kindly follow recommend actions below</p>
                                                
                                        </div>
                                          <!-- Recommendation -->
                                          <div class="form-group">
                                            <label for="recommendation" class="label">Recommendation:</label>
                                            <p class="t5"><b class="f-20">&bull;</b> Play calm music</p>
                                            <p class="t5"><b class="f-20">&bull;</b> Offer water to patient</p>
                                            <p class="t5"><b class="f-20">&bull;</b> Engage Patient Pleasant conversation</p>
                                            <p class="t5"><b class="f-20">&bull;</b> Ensure Patient medication was taken today</p>
                                           
                                    </div>
                                          <!-- Recommendation -->
                                        <div class="form-group">
                                            <label for="recommendation" class="label">Please select your action taken.</label>
                                            <select class="form-group recommendation" name="actionTaken" id="actionTaken">
                                                <option disabled selected>--Select--</option>
                                                <option>Play calm music</option>
                                                <option>Offer water to patient</option>
                                                <option>Engage Patient Pleasant conversation</option>
                                                <option>Ensure Patient medication was taken today</option>
                                            </select>
                                    </div>
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
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/login.min.js') }}"></script>
    <script src="{{ asset('assets/js/tail.select-full.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.common.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.clinician.caregiver.min.js') }}"></script>
    <script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#caregiverResponse").click(function () {
                //window.location = "http://doralhealthconnect.com";
                var patientId = $("#patientId").val();
                var actionTaken = $("#actionTaken").val();
                var url = $("#url").val();
                   $.ajax({
                    method: 'POST',
                    url: '/caregiverResponseSubmit',
                    data: {patientId, actionTaken, url},
                    success: function (response) {
                        if (response.status == 1) {
                            window.location = "/";
                        } else {
                            $(".alert").show();
                            $("#response").text(response.message);
                            setTimeout(function () {
                                $(".alert").hide();
                            }, 1000);
                        }
                        console.log(response);
                    },
                       error: function (e) {
                        console.log(e);
                    }
                });

            });

        });
    </script>
</body>

</html>