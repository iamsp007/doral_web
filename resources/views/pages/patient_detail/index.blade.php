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
                     <a class="nav-link d-flex align-items-center" id="demographic-tab" data-toggle="pill"
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
                     <a class="nav-link active d-flex align-items-center" id="billing-tab" data-toggle="pill"
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
