<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/fonts/Montserrat.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/caregiver.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/tail.select-default.min.css') }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
    <title>Doral Health Connect | Caregiver</title>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="block">
                <div>
                    <a href="../landing/index.html" title="Welcome to Doral"  class="logo">
                        <img src="{{ asset('assets/img/logo-white.svg') }}" alt="Welcome to Doral" srcset="{{ asset('assets/img/logo-white.svg') }}">
                    </a>
                </div>
            </div>
        </div>
    </header>
    <section>
        <div class="middle">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-5 col-md-8">
                        <div class="caregiver_response">
                            <div class="top_back"></div>
                            <div class="mid">
                                <div class="p50">
                                    <h1 class="t2">Note</h1>
                                    <hr class="hr_border">
                                    <form class="mt-4" id="ResponseForm">
                                        @csrf
                                        <div class="form-group">
                                            <label for="patient_name" class="label">Patient Name:</label>
                                            <input type="hidden" value="{{$userDeviceLog->id}}" name="id" id="id">
                                            <p class="t5">{{ $patient_name }}</p>
                                        </div>
                                       <div class="form-group">
                                            <label for="patient_name" class="label">Reading:</label>
                                            
                                            <p class="t5">{{ $userDeviceLog->value }}</p>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label class="label">Generated Time:</label>
                                            <p class="t5">{{ viewDateTimeFormat($userDeviceLog->reading_time) }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label class="label">Reason we approached:</label>
                                            <p class="t5">{{ $message }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="recommendation" class="label">Recommendation:</label>
                                            {!! $recomdation !!}
                                        </div>
                                        <div class="form-group">
                                            <label for="recommendation" class="label">Note:</label>
                                            <textarea class="form-control" rows="10" id="note" name="note[]">{!! $notes !!}</textarea>
                                        </div>
                                        <input type="hidden" name="_method" value="PUT">
                                        <button type="submit" id="caregiverResponse" class="btn btn-primary btn-pink btn-block" data-url="{{ Route('ccm.update',[$userDeviceLog]) }} ">Submit</button>
                                    </form>
                                </div>
                            </div>
                            <div class="btm_back"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Middle Section End -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/login.js') }}"></script>
    <script src="{{ asset('assets/js/tail.select-full.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.common.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.clinician.caregiver.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var val = $("#ResponseForm").validate({
                ignore: [],
                rules: {
                    note: {
                        required: true
                    },
                },
            
                messages : {
                    note: {
                        required : "Please enter note."
                    },
                },
            });
            
            // /*add and edit user data*/
            // $(".noteappend").on('click',function (e) {
            //     value = $(this).attr("value");
            //     var ch = $(this).prop("checked");
            //     if(ch == true) {
            //         $("#note").append(value);
            //     }
            // });
            /*add and edit user data*/
            $("#caregiverResponse").on('click',function (e) {
                e.preventDefault();
                var t = $(this);
             
                if(val.form() != false) {
                    var formdata = new FormData($("#ResponseForm")[0]);
                    var url = $(this).attr("data-url");
                
                    $("#loader-wrapper").show();
                    $.ajax({
                        type:"POST", 
                        url:url,
                        data: formdata,
                        contentType: false,
                        processData: false,
                        success:function (data) {
                            if(data.status == 200) {
                                alertText(data.message,'success');

                                setTimeout(function () {
                                    location.href = "https://doralhealthconnect.com/";
                                },2000);
                            } else {
                                alertText(data.message,'error');
                            }
                            
                            $("#loader-wrapper").hide();
                        },
                        error:function () {
                            alertText("Server Timeout! Please try again",'error');
                            $("#loader-wrapper").hide();
                        }
                    });
                } else {
                    return false;
                }
            });
        });
        function alertText(text,status) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: status,
                title: text
            })
        }
    </script>
</body>

</html>