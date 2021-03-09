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
                  <li>Status: <span>{{ isset($status[0]) ? $status[0]->Name : '' }}</span></li>
                  <li>Doral ID: <span>{{ ($patient->caregiverInfo) ? $patient->demographic->doral_id : '' }}</span></li>
                  <li>Gender: <span>{{ $patient->gender_data }}</span></li>
                  <li>DOB: <span>{{ ($patient->caregiverInfo) ? date('m-d-Y', strtotime($patient->dob)) : '' }}</span></li>
<!--                  <button type="button" class="btn btn-outline-green mr-3 d-flex align-items-center">
                      <i class="las la-file-upload la-2x mr-2"></i>
                      <a target="_blank" href="{{route('get-employee-physical-examination-report', ['id' => $patient->id])}}">Employee Physical Form</a></button>-->
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
                  <!-- <li>
                     <a class="nav-link d-flex align-items-center" id="patient-referral-tab" data-toggle="pill"
                        href="#patient-referral" role="tab" aria-controls="patient-referral" aria-selected="true">
                        <img src="{{ asset('assets/img/icons/icons_demographics.svg') }}" alt="" class="mr-2 inactiveIcon">
                        <img src="{{ asset('assets/img/icons/icons_demographics_active.svg') }}" alt=""
                           class="mr-2 activeIcon">Patient Referral
                     </a>
                  </li> -->
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
                  <!-- <li>
                     <a class="nav-link  d-flex align-items-center" id="clinical-info-tab1" data-toggle="pill"
                        href="#clinical-info1" role="tab" aria-controls="clinical-info1" aria-selected="false">
                        <img src="{{ asset('assets/img/icons/icons_clinical.svg') }}" alt="" class="mr-2 inactiveIcon">
                        <img src="{{ asset('assets/img/icons/icons_clinical_active.svg') }}" alt=""
                           class="mr-2 activeIcon">
                        Clinical Info</a>
                  </li> -->
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
                  <li>
                     <a class="nav-link d-flex align-items-center" id="reports-tab" data-toggle="pill"
                        href="#reports" role="tab" aria-controls="reports" aria-selected="false">
                        <img src="{{ asset('assets/img/icons/icons_pharmacy.svg') }}" alt="" class="mr-2 inactiveIcon">
                        <img src="{{ asset('assets/img/icons/icons_pharmacy_active.svg') }}" alt=""
                           class="mr-2 activeIcon">Reports</a>
                  </li>
               </ul>
            </div>
            <div class="col-12 col-sm-10">
               <div class="tab-content" id="v-pills-tabContent">
                  <!-- Demographics Start -->
                  @include('pages.patient_detail.caregiver_demographic')
                  @if($patient->demographic)
                     @if($patient->demographic->type === '1')
                        @include('pages.patient_detail.demographic')
                     @elseif($patient->demographic->type === '2')
                        @include('pages.patient_detail.caregiver_demographic')
                     @endif
                  @endif
                  <!-- Demographics End -->

                  <!-- Patient Referral Start -->
                   <!-- @include('pages.patient_detail.patient_referral') -->
                  <!-- Patient Referral End -->

                  <!-- Insurance Start -->
                     @include('pages.patient_detail.insurance')
                  <!-- Insurance End -->

                  <!-- Billing Start -->
                     @include('pages.patient_detail.billing')
                  <!-- Billing End -->

                  <!-- Home Care Start -->
                     @include('pages.patient_detail.home_care')
                  <!-- Home Care End -->

                   <!-- Home Care Start -->
                   @include('pages.patient_detail.ccm')
                  <!-- Home Care End -->

                   <!-- Home Care Start -->
                   @include('pages.patient_detail.rpm')
                  <!-- Home Care End -->

                  <!-- Clinical Start -->
                     @include('pages.patient_detail.clinical')
                  <!-- Clinical End -->

                   <!-- Clinical Start -->
                   <!-- @include('pages.patient_detail.clinical-info') -->
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

   <!-- Modal for lab reports -->
   <div class="modal fade" id="labreportModal" tabindex="-1" aria-labelledby="labreportModal" aria-hidden="true">
       <div class="modal-dialog modal-large modal-dialog-centered">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">View Lab Reports</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <div class="pb-5">
                       <div class="d-flex justify-content-end mb-4">
                           <button type="submit" class="btn btn-outline-green d-flex align-items-center"
                                   name="Download">Download All Reports</button>
                       </div>
                       <div class="scrollbar scrollbar9" id="view-lab-report-file">
                           <div class="row">
                               <div class="col-12 col-sm-2 mt-4">
                                   <div class="card shadow-sm">
                                       <div class="card-body">
                                           <img class="img-fluid" alt="" jsaction="load:G7tQM" data-drive-wiz-load-handling=""
                                                src="../assets/img/All Banner copy.docx.png">
                                       </div>
                                       <div class="card-footer file-footer">
                                           <a href="javascript:void(0)" onclick="openDoc()"
                                              class="d-flex align-items-center text-success">
                                               <i class="lar la-file-pdf la-2x"></i> All Bill.pdf
                                           </a>
                                           <div>
                                               <div class="dropdown">
                                                   <button class="btn btn-light btn-sm dropdown-toggle" type="button"
                                                           id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                           aria-expanded="false">
                                                       <i class="las la-ellipsis-v"></i>
                                                   </button>
                                                   <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                       <a class="dropdown-item" href="#">Download File</a>
                                                       <a class="dropdown-item" data-toggle="modal" data-target="#docViewerModal"
                                                          href="#">View Details</a>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-12 col-sm-2 mt-4">
                                   <div class="card shadow-sm">
                                       <div class="card-body">
                                           <img class="img-fluid" alt="" jsaction="load:G7tQM" data-drive-wiz-load-handling=""
                                                src="../assets/img/All Banner copy.docx.png">
                                       </div>
                                       <div class="card-footer file-footer">
                                           <a href="javascript:void(0)" class="d-flex align-items-center text-success">
                                               <i class="lar la-file-pdf la-2x"></i> All Bill.pdf
                                           </a>
                                           <div>
                                               <div class="dropdown">
                                                   <button class="btn btn-light btn-sm dropdown-toggle" type="button"
                                                           id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                           aria-expanded="false">
                                                       <i class="las la-ellipsis-v"></i>
                                                   </button>
                                                   <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                       <a class="dropdown-item" href="#">Download File</a>
                                                       <a class="dropdown-item" href="#">View Details</a>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-12 col-sm-2 mt-4">
                                   <div class="card shadow-sm">
                                       <div class="card-body">
                                           <img class="img-fluid" alt="" jsaction="load:G7tQM" data-drive-wiz-load-handling=""
                                                src="../assets/img/All Banner copy.docx.png">
                                       </div>
                                       <div class="card-footer file-footer">
                                           <a href="javascript:void(0)" class="d-flex align-items-center text-success">
                                               <i class="lar la-file-word la-2x"></i> Healthcare.docx
                                           </a>
                                           <div>
                                               <div class="dropdown">
                                                   <button class="btn btn-light btn-sm dropdown-toggle" type="button"
                                                           id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                           aria-expanded="false">
                                                       <i class="las la-ellipsis-v"></i>
                                                   </button>
                                                   <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                       <a class="dropdown-item" href="#">Download File</a>
                                                       <a class="dropdown-item" href="#">View Details</a>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-12 col-sm-2">
                                   <div class="card shadow-sm">
                                       <div class="card-body">
                                           <img class="img-fluid" alt="" jsaction="load:G7tQM" data-drive-wiz-load-handling=""
                                                src="../assets/img/All Banner copy.docx.png">
                                       </div>
                                       <div class="card-footer file-footer">
                                           <a href="javascript:void(0)" class="d-flex align-items-center text-success">
                                               <i class="lar la-file-word la-2x"></i> Lab.docx
                                           </a>
                                           <div>
                                               <div class="dropdown">
                                                   <button class="btn btn-light btn-sm dropdown-toggle" type="button"
                                                           id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                           aria-expanded="false">
                                                       <i class="las la-ellipsis-v"></i>
                                                   </button>
                                                   <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                       <a class="dropdown-item" href="#">Download File</a>
                                                       <a class="dropdown-item" href="#">View Details</a>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-12 col-sm-2 mt-4">
                                   <div class="card shadow-sm">
                                       <div class="card-body">
                                           <img class="img-fluid" alt="" jsaction="load:G7tQM" data-drive-wiz-load-handling=""
                                                src="../assets/img/All Banner copy.docx.png">
                                       </div>
                                       <div class="card-footer file-footer">
                                           <a href="javascript:void(0)" class="d-flex align-items-center text-success">
                                               <i class="lar la-file-word la-2x"></i> X-Ray.docx
                                           </a>
                                           <div>
                                               <div class="dropdown">
                                                   <button class="btn btn-light btn-sm dropdown-toggle" type="button"
                                                           id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                           aria-expanded="false">
                                                       <i class="las la-ellipsis-v"></i>
                                                   </button>
                                                   <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                       <a class="dropdown-item" href="#">Download File</a>
                                                       <a class="dropdown-item" href="#">View Details</a>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-12 col-sm-2 mt-4">
                                   <div class="card shadow-sm">
                                       <div class="card-body">
                                           <img class="img-fluid" alt="" jsaction="load:G7tQM" data-drive-wiz-load-handling=""
                                                src="../assets/img/All Banner copy.docx.png">
                                       </div>
                                       <div class="card-footer file-footer">
                                           <a href="javascript:void(0)" class="d-flex align-items-center text-success">
                                               <i class="lar la-file-word la-2x"></i> CHHA.docx
                                           </a>
                                           <div>
                                               <div class="dropdown">
                                                   <button class="btn btn-light btn-sm dropdown-toggle" type="button"
                                                           id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                           aria-expanded="false">
                                                       <i class="las la-ellipsis-v"></i>
                                                   </button>
                                                   <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                       <a class="dropdown-item" href="#">Download File</a>
                                                       <a class="dropdown-item" href="#">View Details</a>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-12 col-sm-2 mt-4">
                                   <div class="card shadow-sm">
                                       <div class="card-body">
                                           <img class="img-fluid" alt="" jsaction="load:G7tQM" data-drive-wiz-load-handling=""
                                                src="../assets/img/All Banner copy.docx.png">
                                       </div>
                                       <div class="card-footer file-footer">
                                           <a href="javascript:void(0)" class="d-flex align-items-center text-success">
                                               <i class="lar la-file-word la-2x"></i> CHHA.docx
                                           </a>
                                           <div>
                                               <div class="dropdown">
                                                   <button class="btn btn-light btn-sm dropdown-toggle" type="button"
                                                           id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                           aria-expanded="false">
                                                       <i class="las la-ellipsis-v"></i>
                                                   </button>
                                                   <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                       <a class="dropdown-item" href="#">Download File</a>
                                                       <a class="dropdown-item" href="#">View Details</a>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!-- Modal end for lab reports -->
   <!-- Modal For Doc Viewer Start -->
   <div class="modal fade" id="docViewerModal" tabindex="-1" aria-labelledby="docViewerModalLabel"
        aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered modal-large">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">All Bill.pdf</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body pb-4">
                   Load
               </div>
           </div>
       </div>
   </div>
   <!-- Modal For Doc Viewer End -->
   <!-- Modal -->
   <div class="modal fade" id="uploadLabReportModal" tabindex="-1" aria-labelledby="uploadLabReportModalLabel"
        aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Upload Lab Report(s)</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <div class="pb-4">
                       <div class="form-group">
                           <label for="selectRole" class="label-custom"><span>Proposed</span> Date(s)</label>
                           <select name="selectRole" id="selectRole" class="input-skin">
                               <option value="">Select Type</option>
                           </select>
                       </div>
                       <div class="form-group">
                           <div class="upload-your-files dropzone" id="dropzone-file-lab-report">
                               <h1>Upload your files</h1>
                               <p>Upload from your computer (.xls, .xlsx, .csv,.pdf)</p>
                               <div class="upload-files">

                                   <input type="hidden" name="formSelect" id="formSelect" value="">
                                   <input type="hidden" name="enrollstatus" id="enrollstatus" value="">
                                   <input type="hidden" name="services" id="services" value="">
                                   <div class="upload_icon"></div>
                                   <div>
                                       <h1 class="_title">Drag & Drop</h1>
                                       <p>Or</p>
                                       <div class="mt-3">
                                           <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                    height="17" viewBox="0 0 20 17">
                                                   <path
                                                       d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                               </svg> <span>Choose a file&hellip;</span></label>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="d-flex mt-4">
                           <input type="button" value="Upload File(s)" onclick="uploadLabReport(this)" class="btn btn--submit btn-lg" style="width: 50%;">
                           <input type="cancel" value="Cancel"  data-dismiss="modal" aria-label="Close" style="width: 50%;">
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>

@endsection

@push('scripts')
    <script src="{{ asset('assets/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.fixedColumns.min.js') }}"></script>
    <script src="https://unpkg.com/@google/markerclustererplus@4.0.1/dist/markerclustererplus.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        var lab_referral_url="{{ route('patient.lab.report.referral') }}";
        var lab_report_upload_url="{{ route('patient.lab.report.upload') }}";
        var lab_report_data_url="{{ route('patient.lab.report.data') }}";
        var patient_id='{{ $patient->id }}';
        var map;
        function initMap() {
            var lat = $('#address').attr('data-lat');
            var lng = $('#address').attr('data-lng');
            const iconBase =
                base_url+"assets/img/icons/patient-icon.svg";
            if (lat) {
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
            } else {
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
            $('input[name="dob"]').daterangepicker({
               singleDatePicker: true,
               showDropdowns: true,
               minYear: 1901,
               maxYear: parseInt(moment().format('YYYY'), 10)
            }, function (start, end, label) {
               var years = moment().diff(start, 'years');
               alert("You are " + years + " years old!");
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
                     swal('Cancelled', 'Your record is safe :)','error');
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
{{--    <script--}}
{{--        src="https://maps.googleapis.com/maps/api/js?key={{env('MAP_API_KEY')}}&callback=initMap&libraries=&v=weekly"--}}
{{--        defer--}}
{{--    ></script>--}}
    <script src="{{ asset('assets/js/app.clinician.patient.details.js') }}"></script>
    <script src="{{ asset( 'assets/calendar/lib/main.js' ) }}"></script>
    @stack('patient-detail-js')
@endpush
