@extends('pages.layouts.app')

@section('title','Patient Detail')
@section('pageTitleSection')
    <img src="{{ asset('assets/img/icons/computer-icon.svg') }}" class="vbcIcon mr-2"> Patient Detail
@endsection

@section('content')
   <div class="app-clinician-patient-chart">
      <header class="patient-chart-header">
         <div class="leftItem">
            <div class="userIcon">
               <div class="icon">
                  <img src="{{ asset('assets/img/user/01.png') }}" alt="" srcset="{{ asset('assets/img/user/01.png') }}" class="img-fluid">
               </div>
               <div class="name">
                  {{ $patient->first_name }}  {{ $patient->last_name }}
               </div>
            </div>
            <div>
               <ul class="shortdesc">
                  <li>Admission ID: <span>{{ $patient->admission_id}}</span></li>
                  <li>Gender: <span>{{ $patient->gender }}</span></li>
                  <li>DOB: <span>{{ $patient->gender }}</span></li>
               </ul>
            </div>
         </div>
         <div class="rightItem"></div>
      </header>
      <div class="p-4 app-pdetail">
         <div class="row">
            <div class="col-12 col-sm-2">
               <ul class="nav flex-column nav-pills nav-patient-profile" id="v-pills-tab" role="tablist"
                  aria-orientation="vertical">
                  <li>
                     <a class="nav-link active d-flex align-items-center" id="demographic-tab" data-toggle="pill"
                        href="#demographic" role="tab" aria-controls="demographic" aria-selected="true">
                        <img src="{{ asset('assets/img/icons/icons_demographics.svg') }}" alt="" class="mr-2 inactiveIcon">
                        <img src="{{ asset('assets/img/icons/icons_demographics_active.svg') }}" alt=""
                           class="mr-2 activeIcon">Demographics
                     </a>
                  </li>
                  <li>
                     <a class="nav-link d-flex align-items-center" id="insurance-tab" data-toggle="pill"
                        href="#insurance" role="tab" aria-controls="insurance" aria-selected="false">
                        <img src="{{ asset('assets/img/icons/icons_insurance.svg') }}" alt="" class="mr-2 inactiveIcon">
                        <img src="{{ asset('assets/img/icons/icons_insurance_active.svg') }}" alt=""
                           class="mr-2 activeIcon">Insurance</a>
                  </li>
                  <li>
                     <a class="nav-link d-flex align-items-center" id="billing-tab" data-toggle="pill"
                        href="#billing" role="tab" aria-controls="billing" aria-selected="false">
                        <img src="{{ asset('assets/img/icons/icons_insurance.svg') }}" alt="" class="mr-2 inactiveIcon">
                        <img src="{{ asset('assets/img/icons/icons_insurance_active.svg') }}" alt=""
                           class="mr-2 activeIcon">Billing</a>
                  </li>
                  <li>
                     <a class="nav-link d-flex align-items-center" id="homecare-tab" data-toggle="pill"
                        href="#homecare" role="tab" aria-controls="homecare" aria-selected="false">
                        <img src="{{ asset('assets/img/icons/icons_home_care.svg') }}" alt="" class="mr-2 inactiveIcon">
                        <img src="{{ asset('assets/img/icons/icons_home_care_active.svg') }}" alt=""
                           class="mr-2 activeIcon">Home
                        Care</a>
                  </li>
                  <li>
                     <a class="nav-link d-flex align-items-center" id="ccm-tab" data-toggle="pill"
                        href="#ccm" role="tab" aria-controls="ccm" aria-selected="false">
                        <img src="{{ asset('assets/img/icons/icons_home_care.svg') }}" alt="" class="mr-2 inactiveIcon">
                        <img src="{{ asset('assets/img/icons/icons_home_care_active.svg') }}" alt=""
                           class="mr-2 activeIcon">CCM
                        </a>
                  </li>
                  <li>
                     <a class="nav-link d-flex align-items-center" id="rpm-tab" data-toggle="pill"
                        href="#rpm" role="tab" aria-controls="rpm" aria-selected="false">
                        <img src="{{ asset('assets/img/icons/icons_home_care.svg') }}" alt="" class="mr-2 inactiveIcon">
                        <img src="{{ asset('assets/img/icons/icons_home_care_active.svg') }}" alt=""
                           class="mr-2 activeIcon">RPM
                        </a>
                  </li>
                  <li>
                     <a class="nav-link  d-flex align-items-center" id="clinical-tab" data-toggle="pill"
                        href="#clinical" role="tab" aria-controls="clinical" aria-selected="false">
                        <img src="{{ asset('assets/img/icons/icons_clinical.svg') }}" alt="" class="mr-2 inactiveIcon">
                        <img src="{{ asset('assets/img/icons/icons_clinical_active.svg') }}" alt=""
                           class="mr-2 activeIcon">
                        Clinical</a>
                  </li>
                  
                  <li>
                     <a class="nav-link d-flex align-items-center" id="physican-tab" data-toggle="pill"
                        href="#physican" role="tab" aria-controls="physican" aria-selected="false">
                        <img src="{{ asset('assets/img/icons/icons_physician.svg') }}" alt="" class="mr-2 inactiveIcon">
                        <img src="{{ asset('assets/img/icons/icons_physician_active.svg') }}" alt=""
                           class="mr-2 activeIcon">Physician</a>
                  </li>
                  <li>
                     <a class="nav-link d-flex align-items-center" id="diagnosis-tab" data-toggle="pill"
                        href="#diagnosis" role="tab" aria-controls="diagnosis" aria-selected="false">
                        <img src="{{ asset('assets/img/icons/icons_daignosis.svg') }}" alt="" class="mr-2 inactiveIcon">
                        <img src="{{ asset('assets/img/icons/icons_daignosis_active.svg') }}" alt=""
                           class="mr-2 activeIcon">Diagnosis</a>
                  </li>
                  <li>
                     <a class="nav-link d-flex align-items-center" id="medProfile-tab" data-toggle="pill"
                        href="#medProfile" role="tab" aria-controls="medProfile" aria-selected="false">
                        <img src="{{ asset('assets/img/icons/icons_medprofile.svg') }}" alt="" class="mr-2 inactiveIcon">
                        <img src="{{ asset('assets/img/icons/icons_medprofile_active.svg') }}" alt=""
                           class="mr-2 activeIcon">Med Profile</a>
                  </li>
                  <li>
                     <a class="nav-link d-flex align-items-center" id="pharmacy-tab" data-toggle="pill"
                        href="#pharmacy" role="tab" aria-controls="pharmacy" aria-selected="false">
                        <img src="{{ asset('assets/img/icons/icons_pharmacy.svg') }}" alt="" class="mr-2 inactiveIcon">
                        <img src="{{ asset('assets/img/icons/icons_pharmacy_active.svg') }}" alt=""
                           class="mr-2 activeIcon">Pharmacy</a>
                  </li>
               </ul>
            </div>
            <div class="col-12 col-sm-10">
               <div class="tab-content" id="v-pills-tabContent">
                  <!-- Demographics Start -->
                     @include('pages.patient_detail.demographic')
                  <!-- Demographics End -->

                  <!-- Insurance Start -->
                     @include('pages.patient_detail.insurance')
                  <!-- Insurance End -->

                  <!-- Billing Start -->
                     @include('pages.patient_detail.billing')
                  <!-- Billing End -->
                  
                  <!-- Home Care Start -->
                     @include('pages.patient_detail.home_care')
                  <!-- Home Care End -->

                  <!-- Clinical Start -->
                     @include('pages.patient_detail.clinical')
                  <!-- Clinical End -->

                  <!-- Physician Start -->
                     @include('pages.patient_detail.physician')
                  <!-- Physician End -->

                  <!-- Diagnosis Start -->
                     @include('pages.patient_detail.diagnosis')
                  <!-- Diagnosis End -->

                  <!-- Med Profile Start -->
                     @include('pages.patient_detail.med_profile')
                  <!-- Med Profile End -->

                  <!-- Pharmacy Start -->
                     @include('pages.patient_detail.physician')
                  <!-- Pharmacy End -->
               </div>
            </div>
         </div>
      </div>
   </div>
  
   <!-- Modal For Med Profile Start -->
   <div class="modal" tabindex="-1" id="patientMedicateInfo">
      <div class="modal-dialog modal-dialog-centered modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Patient Medication Info</h5>
               <button type="button" class="btn btn-outline-green ml-2">Add New</button>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="form-group">
                  <div class="row">
                     <div class="col-12 col-sm-4">
                        <div class="form-group">
                           <label for="status" class="label">Status</label>
                           <div class="d-flex">
                              <div class="custom-control custom-radio">
                                 <input type="radio" id="new" name="customRadio" class="custom-control-input">
                                 <label class="custom-control-label" for="new">New</label>
                              </div>
                              <div class="custom-control custom-radio ml-2">
                                 <input type="radio" id="existing" name="customRadio" class="custom-control-input">
                                 <label class="custom-control-label" for="existing">Existing</label>
                              </div>
                           </div>
                           <!-- <small id="usernameHelp" class="form-text text-muted mt-2">Assistive Text</small> -->
                        </div>
                     </div>
                     <div class="col-12 col-sm-4">
                        <label for="medication" class="label">Medication</label>
                        <input type="text" class="form-control form-control-lg" id="medication" name="medication"
                           aria-describedby="medicationHelp">
                     </div>
                     <div class="col-12 col-sm-4">
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <div class="col-12 col-sm-4">
                        <label for="dose" class="label">Dose</label>
                        <select class="form-control" name="dose" id="dose">
                           <option value="Select">Select</option>
                        </select>
                     </div>
                     <div class="col-12 col-sm-4">
                        <label for="form" class="label">Form</label>
                        <select class="form-control" name="form" id="form">
                           <option value="Select">Select</option>
                        </select>
                     </div>
                     <div class="col-12 col-sm-4">
                        <label for="route" class="label">Route</label>
                        <select class="form-control" name="route" id="route">
                           <option value="Select">Select</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <div class="col-12 col-sm-4">
                        <label for="amount2" class="label">Amount</label>
                        <input type="text" class="form-control form-control-lg" id="amount2" name="amount2"
                           aria-describedby="amountHelp2">
                     </div>
                     <div class="col-12 col-sm-4">
                        <label for="class" class="label">Class</label>
                        <input type="text" class="form-control form-control-lg" id="class" name="class"
                           aria-describedby="classHelp">
                     </div>
                     <div class="col-12 col-sm-4">
                        <label for="frequency" class="label">Frequency</label>
                        <select class="form-control" name="frequency" id="frequency">
                           <option value="Select">Select</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <div class="col-12 col-sm-4">
                        <label for="startdate" class="label">Start Date</label>
                        <input type="text" class="form-control form-control-lg" id="startdate" name="startdate"
                           aria-describedby="startdateHelp">
                     </div>
                     <div class="col-12 col-sm-4">
                        <label for="orderdate" class="label">Order Date</label>
                        <input type="text" class="form-control form-control-lg" id="orderdate" name="orderdate"
                           aria-describedby="orderdateHelp">
                     </div>
                     <div class="col-12 col-sm-4">
                        <label for="taughtdate" class="label">Taught Date</label>
                        <input type="text" class="form-control form-control-lg" id="taughtdate" name="taughtdate"
                           aria-describedby="taughtdateHelp">
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <div class="col-12 col-sm-4">
                        <label for="discontinuedate" class="label">Discontinue Date</label>
                        <input type="text" class="form-control form-control-lg" id="discontinuedate"
                           name="discontinuedate" aria-describedby="discontinuedateHelp">
                     </div>
                     <div class="col-12 col-sm-4">
                        <label for="discountinueorderdate" class="label">Discontinue Order Date</label>
                        <input type="text" class="form-control form-control-lg" id="discountinueorderdate"
                           name="discountinueorderdate" aria-describedby="discountinueorderdateHelp">
                     </div>
                     <div class="col-12 col-sm-4">
                        <label for="preferredPharmacy" class="label">Preferred Pharmacy</label>
                        <select class="form-control" name="preferredPharmacy" id="preferredPharmacy">
                           <option value="Select">Select</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <label for="comment" class="label">Comment</label>
                  <textarea class="form-control" id="comment" name="comment" cols="30" rows="5"></textarea>
               </div>
               <div class="form-group">
                  <div class="custom-control custom-checkbox mb-3">
                     <input type="checkbox" id="customCheckbox1" name="customCheckbox" class="custom-control-input">
                     <label class="custom-control-label" for="customCheckbox1">Include new medication in the MD
                        Order</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" id="customCheckbox2" name="customCheckbox" class="custom-control-input">
                     <label class="custom-control-label" for="customCheckbox2">Create an interim order for the new
                        medication</label>
                  </div>
               </div>
               <div>
                  Note: The 'Include New Medication in the MD Order' checkbox will add the medication in 'New' MD
                  only.
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-outline-gray mr-3" data-dismiss="modal">Save</button>
               <button type="button" class="btn btn-outline-green">Submit</button>
            </div>
         </div>
      </div>
   </div>
   <!-- Modal For Med Profile End -->

@endsection

@push('scripts')
    <script src="{{ asset('assets/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.fixedColumns.min.js') }}"></script>
    <script src="https://unpkg.com/@google/markerclustererplus@4.0.1/dist/markerclustererplus.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        var patient_id='{{ $patient->id }}';
        var map;
        function initMap() {
            var lat = $('#address').attr('data-lat');
            var lng = $('#address').attr('data-lng');
            const iconBase =
                base_url+"assets/img/icons/patient-icon.svg";
            if (lat){
                map = new google.maps.Map(document.getElementById('map'), {
                    center: new google.maps.LatLng(lat, lng),
                    zoom: 13,
                    mapTypeId: 'roadmap'
                });
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(lat,lng),
                    icon:iconBase,
                    map: map,
                    title: "{{ $patient->first_name }} {{ $patient->last_name }}"

                });
            }else {
                map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: 40.741895, lng: 73.989308},
                    zoom: 8
                });
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(lat,lng),
                    icon:iconBase,
                    map: map,
                    title: "{{ $patient->first_name }} {{ $patient->last_name }}"
                });
            }

        }
       
        $(document).ready(function() {
            $('#lab_perform_date, #lab_due_date, #lab_perform_date').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxDate: new Date()
            });

            $('[name="lab_due_date"]').on('apply.daterangepicker', function(ev, picker) {
                var selectedDate = new Date($('[name="lab_due_date"]').val());
                var date = selectedDate.getDate();
                var monthf = selectedDate.getMonth() + 1;
                var month  = (monthf < 10 ? '0' : '') + monthf; 
                var year = selectedDate.getFullYear() + 1;
                var expirydate = month + '/'+ date + '/'+ year;
                $(".lab-expiry-date").text(expirydate);
                $("#lab_expiry_date").val(expirydate);
            });
                 
            $(document).on('click','.patient-detail-lab-report',function(event) {
                event.preventDefault();

                var data = $(this).parent('div').prev('div').find("form").serializeArray();
                var url = "{{ Route('lab-report.store') }}";

                $.ajax({
                        type:"POST",
                        url:url,
                        data:data,
                        headers: {
                            'X_CSRF_TOKEN': '{{ csrf_token() }}',
                        },
                        success: function(data) {
                            if(data.status == 400) {
                                printErrorMsg(data.message);
                            } else {
                                $(".print-error-msg").hide();
                                
                                 if (data.type == 'tb') {
                                    var explodercounter = 'tb' + Number($(document).find(".tb-main-tr").length + 1);
                                 } else if (data.type == 'emmune') {
                                    var explodercounter = 'immune' + Number($(document).find(".immune-main-tr").length + 1);
                                 } else if (data.type == 'drug') {
                                    var explodercounter = 'drug' + Number($(document).find(".drug-main-tr").length + 1);
                                 }
                                 
                                var html = '<tr class="';
                                if (data.result.result === '1') {
                                
                                    html += 'bg-positive text-white';
                                }
                            
                                html +='"><th scope="row">' + data.count + '</th><td scope="row">' + data.result.lab_report_type.name +'</td><td>' + data.result.due_date + '</td>';
                                if (data.type == 'emmune' || data.type == 'drug') {
                                    html += '<td>' + data.result.perform_date + '</td>';
                                }
                        
                                html +='<td>' + data.result.expiry_date + '</td>';
                                if (data.type == 'emmune') {
                                    html += '<td>' + data.result.titer + '</td>';
                                }
                                html +='<td>' + data.result.lab_result + '</td><td class="text-center"><span onclick="exploder(\'' + explodercounter + '\')" id="' + explodercounter + '" class="exploder"><i class="las la-plus la-2x"></i></span><a href="javascript:void(0)" class="deleteLabResult" data-id="1"><i class="las la-trash la-2x text-white pl-4"></i></a></td></tr><tr class="explode1 d-none"><td colspan="6"><textarea name="note" rows="4" cols="62" class="form-control note-area" placeholder="Enter note"></textarea><input type="hidden" name="patient_lab_report_id" id="patient_lab_report_id" value="' + data.result.id + '" /></td></tr>';
                                
                                if (data.type == 'tb') {
                                    $('.tb-list-order tr:last').before(html);
                                    $(document).find('.tb-sequence').text(data.newCount);
                                    var select = $('.tb_lab_report_types').empty();
                                } else if (data.type == 'emmune') {
                                    $('.immue-list-order tr:last').before(html);
                                    $(document).find('.immue-sequence').text(data.newCount);
                                    var select = $('.immue_lab_report_types').empty();
                                } else if (data.type == 'drug') {
                                    $('.drug-list-order tr:last').before(html);
                                    $(document).find('.drug-sequence').text(data.newCount);
                                    var select = $('.drug_lab_report_types').empty();
                                }
                               
                                select.append('<option value="">Select a test type</option>');

                                $.each(data.tbLabReportTypes, function (key, value) {
                                    select.append('<option value="' + value.id + '">' + value.name + '</option>');
                                });
                                
                                swal("Success!", data.message, "success");
                            }
                        },
                        error: function()
                        {
                            swal("Server Timeout!", "Please try again", "warning");
                        }
                    });
            });

            $('body').on('click', '.deleteLabResult', function () {
                var t = $(this);
                var id = t.attr("id");
                var patient_referral_id = $(this).data("id") ;
               
                swal({
                    title: "Are you sure?",
                    text: "Are you sure want to delete this record?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            'type': 'delete',
                            'url': "{{ route('lab-report.destroy') }}",
                            'headers': {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            data: {
                                "id": id,
                                "patient_referral_id" : patient_referral_id
                            },
                            'success': function (data) {
                                if(data.status == 400) {
                                    swal(
                                        'Error!',
                                        data.message,
                                        'error'
                                    );
                                } else {
                                    t.parents("tr").fadeOut(function () {
                                        $(this).remove();
                                    });

                                    $(document).find('.sequence').text(data.newCount);

                                    var select = $('#lab_report_type_id').empty();
                                    select.append('<option value="">Select a test type</option>');
                                    alert(data.tbLabReportTypes);
                                    $.each(data.tbLabReportTypes, function (key, value) {
                                        select.append('<option value="' + value.id + '">' + value.name + '</option>');
                                    });
                                    
                                    swal(
                                        'Deleted!',
                                        data.message,
                                        'success'
                                    );
                                }
                                unload();
                            },
                            "error":function () {
                                swal("Server Timeout!", "Please try again", "warning");
                                unload();
                            }
                        });
                    } else {
                        swal(
                            'Cancelled',
                            'Your record is safe :)',
                            'error'
                        )
                    }
                });
            });
        });

              
        $('body').on('blur', '.note-area', function(e){
              e.preventDefault();
              var txtAval=$(this).val();
            
              var patient_lab_report_id = $(this).next("input[name=patient_lab_report_id]").val();
            
              $.ajax({
                 headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 },
                 type: "POST",
                 url: "{{ route('lab-report-note.store') }}",
                 data: { note:txtAval, patient_lab_report_id:patient_lab_report_id },
                 dataType: "json",
                 success: function(response) {
                    $('.update-icon').fadeOut("slow").removeClass('d-block').addClass('d-none');
                 },
                 error: function(error) {
                    alert('Something went wrong');
                 }
              });
           });
        function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{env('MAP_API_KEY')}}&callback=initMap&libraries=&v=weekly"
        defer
    ></script>
    <script src="{{ asset('assets/js/app.clinician.patient.details.js') }}"></script>
    <script src="{{ asset( 'assets/calendar/lib/main.js' ) }}"></script>

@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/tail.select-default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/fixedColumns.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/buttons.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset( 'assets/calendar/lib/main.css' ) }}" />
@endpush
