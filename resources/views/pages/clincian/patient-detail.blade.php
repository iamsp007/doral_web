@extends('pages.clincian.layouts.app')

@section('title','Patient Detail')
@section('pageTitleSection')
    Patient Detail
@endsection
@section('upload-btn')
    <div class="d-flex">
        <a href="javascript:void(0)" class="single-upload-btn mr-2">
            <img src="{{ asset('assets/img/icons/single-upload-icon.svg') }}" class="icon mr-2" />
            SINGLE UPLOAD</a>
        <a href="md_order_upload_bulk_data.html" class="bulk-upload-btn">
            <img src="{{ asset('assets/img/icons/bulk-upload-icon.svg') }}" class="icon mr-2" />
            Bulk Upload</a>
    </div>
@endsection

@section('content')

<section class="app-body" style="height: 100%;">
   <section class="patient-details">
      <section class="patient-details-aside navbar navbar-dark">
         <div class="sidebar mb-2" id="collapsibleNavbar">
         <div class="block">
            <div class="height-83"></div>
            <img src="{{ asset('assets/img/user/01.png') }}" alt="Welcome to Doral"
               srcset="{{ asset('assets/img/user/01.png') }}" class="img-fluid img-100">  
         </div>
         <div>
            <h1 class="patient-name mb-1">{{ $patient_detail->first_name }} {!! $patient_detail->last_name !!}</h1>
            <div class="d-flex justify-content-center">
               <ul class="pdetail">
                    <li class="nav">Admission ID:&nbsp; <span class="pdata">8965465</span></li>
                    <li class="nav">Gender:&nbsp; <span class="pdata">{!! $patient_detail->gender !!}</span></li>
                    <li class="nav">DOB:&nbsp; <span class="pdata">{!! $patient_detail->dob !!}</span></li>
               </ul>
            </div>
         </div>
         <!-- Left Section Start -->
         <div>
            <ul class="patient-nav nav" >
               <li class="mb-2">
                  <a href="#demographics" class="active"  data-toggle="pill" role="tab">
                  <img src="{{ asset('assets/img/icons/demographic_icon.svg') }}" alt=""
                     srcset="{{ asset('assets/img/icons/demographic_icon.svg') }}" class="_icon mr-2">Demographics</a>
               </li>
               <li class="mb-2">
                  <a href="#Insurance" data-toggle="pill" role="tab">
                  <img src="{{ asset('assets/img/icons/insurance_icon.svg') }}" alt=""
                     srcset="{{ asset('assets/img/icons/insurance_icon.svg') }}" class="_icon mr-2">Insurance</a>
               </li>
               <li class="mb-2"><a href="#HomeCare" data-toggle="pill" role="tab"><img src="{{ asset('assets/img/icons/homecare_icon.svg') }}" alt=""
                  srcset="{{ asset('assets/img/icons/homecare_icon.svg') }}" class="_icon mr-2">Home Care</a></li>
               <li class="mb-2"><a href="#Clinical" data-toggle="pill" role="tab"><img src="{{ asset('assets/img/icons/clinical_icon.svg') }}" alt=""
                  srcset="{{ asset('assets/img/icons/clinical_icon.svg') }}" class="_icon mr-2">Clinical</a></li>
               <li class="mb-2"><a href="#Physician" data-toggle="pill" role="tab"><img src="{{ asset('assets/img/icons/physician_icon.svg') }}" alt=""
                  srcset="{{ asset('assets/img/icons/physician_icon.svg') }}" class="_icon mr-2">Physician</a></li>
               <li class="mb-2"><a href="#Diagnosis" data-toggle="pill" role="tab"><img src="{{ asset('assets/img/icons/dignosis_icon.svg') }}" alt=""
                  srcset="{{ asset('assets/img/icons/dignosis_icon.svg') }}" class="_icon mr-2">Diagnosis</a></li>
               <li class="mb-2"><a href="#MedProfile" data-toggle="pill" role="tab"><img src="{{ asset('assets/img/icons/medprofile_icon.svg') }}" alt=""
                  srcset="{{ asset('assets/img/icons/medprofile_icon.svg') }}" class="_icon mr-2">Med Profile</a></li>
               <li class="mb-2"><a href="#Pharmacy" data-toggle="pill" role="tab"><img src="{{ asset('assets/img/icons/pharmacy_icon.svg') }}" alt=""
                  srcset="{{ asset('assets/img/icons/pharmacy_icon.svg') }}" class="_icon mr-2">Pharmacy</a></li>
            </ul>
         </div>
      </section>
      <section class="patient-details-content">
         <!-- Right section Start-->
         <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="demographics" role="tabpanel" aria-labelledby="v-pills-home-tab">
               <div class="app-card" style="min-height: auto;">
                  <div class="card-header" id="step2">
                     <div class="d-flex align-items-center">
                        <img src="{{ asset('assets/img/icons/demographic_icon.svg') }}" alt=""
                           srcset="{{ asset('assets/img/icons/demographic_icon.svg') }}" class="_icon mr-2"></a>
                           Demographics
                     </div>
                     <hr>
                  </div>
                  <div class="card-body collapse show" id="collapseWork" aria-labelledby="collapseWork"
                     data-parent="#profileAccordion">
                     <div class="row">
                        <div class="col-12 col-sm-12">
                           <div class="row mb-3">
                              <div class="col-4 col-sm-4">
                                 <div class="d-flex align-items-center">
                                    <div>
                                       <i class="las la-phone circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Phone</h3>
                                       <h1 class="_detail">{!! $patient_detail->phone1 !!}</h1>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-4 col-sm-4">
                                 <div class="d-flex align-items-center">
                                    <div>
                                       <i class="las la-envelope circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Email</h3>
                                       <h1 class="_detail">{!! $patient_detail->email !!}</h1>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-4 col-sm-4">
                                 <div>
                                    <div class="d-flex align-items-center">
                                       <div>
                                          <i class="las la-calendar circle-icon"></i>
                                       </div>
                                       <div>
                                          <h3 class="_title">Start Date</h3>
                                          <h1 class="_detail">{!! $patient_detail->start_date !!}</h1>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              
                           </div>
                           <div class="row mb-3">
                              <div class="col-4 col-sm-4">
                                 <div class="d-flex align-items-center ">
                                    <div>
                                       <i class="las la-angle-double-right circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Medicaid Number</h3>
                                       <h1 class="_detail">2344</h1>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-4 col-sm-4">
                                 <div>
                                    <div class="d-flex align-items-center">
                                       <div>
                                          <i class="las la-angle-double-right circle-icon"></i>
                                       </div>
                                       <div>
                                          <h3 class="_title">Medicare Number</h3>
                                          <h1 class="_detail">35423</h1>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-4 col-sm-4">
                                 <div>
                                    <div class="d-flex align-items-center">
                                       <div>
                                          <i class="las la-angle-double-right circle-icon"></i>
                                       </div>
                                       <div>
                                          <h3 class="_title">HI Claim Number</h3>
                                          <h1 class="_detail">75443</h1>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row mb-3">
                              <div class="col-4 col-sm-4">
                                 <div class="d-flex align-items-center ">
                                    <div>
                                       <i class="las la-angle-double-right circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Ethnicity</h3>
                                       <h1 class="_detail">lorem ipus</h1>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-4 col-sm-4">
                                 <div>
                                    <div class="d-flex align-items-center">
                                       <div>
                                          <i class="las la-angle-double-right circle-icon"></i>
                                       </div>
                                       <div>
                                          <h3 class="_title">SSN#</h3>
                                          <h1 class="_detail">8454</h1>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-4 col-sm-4">
                                 <div>
                                    <div class="d-flex align-items-center">
                                       <div>
                                          <i class="las la-angle-double-right circle-icon"></i>
                                       </div>
                                       <div>
                                          <h3 class="_title">Admission ID:</h3>
                                          <h1 class="_detail">8965465</h1>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row mb-3">
                              <div class="col-4 col-sm-4">
                                 <div class="d-flex align-items-center ">
                                    <div>
                                       <i class="las la-angle-double-right circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Nurse</h3>
                                       <h1 class="_detail">lorem ipus</h1>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-4 col-sm-4">
                                 <div>
                                    <div class="d-flex align-items-center">
                                       <div>
                                          <i class="las la-angle-double-right circle-icon"></i>
                                       </div>
                                       <div>
                                          <h3 class="_title">Patient ID</h3>
                                          <h1 class="_detail">8454</h1>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-4 col-sm-4">
                                 <div>
                                    <div class="d-flex align-items-center">
                                       <div>
                                          <i class="las la-angle-double-right circle-icon"></i>
                                       </div>
                                       <div>
                                          <h3 class="_title">Coordinator</h3>
                                          <h1 class="_detail">lorem ipus</h1>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                          
                           <div class="d-flex align-items-center mb-3">
                              <div>
                                 <i class="las la-map-marker circle-icon"></i>
                              </div>
                              <div>
                                 <h3 class="_title">Address 1</h3>
                                 <h1 class="_detail">{!! $patient_detail->address_1 !!}, {!! $patient_detail->city !!}, <span>{!! $patient_detail->Zip !!}</span></h1>
                              </div>
                           </div>
                           <div style="width: 100%;"><iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe></div>
                          
                        </div>
                     </div>
                           </div>
                
            </div>
            </div>
            <div class="tab-pane fade" id="Insurance" role="tabpanel">
               <div class="app-card" style="min-height: auto;">
                  <div class="card-header" id="step2">
                     <div class="d-flex align-items-center">
                        <img src="{{ asset('assets/img/icons/insurance_icon.svg') }}" alt=""
                           srcset="{{ asset('assets/img/icons/insurance_icon.svg') }}" class="_icon mr-2"></a>
                        Insurance
                     </div>
                     <hr>
                  </div>
                  <div class="card-body collapse show" id="collapseWork" aria-labelledby="collapseWork"
                     data-parent="#profileAccordion">
                     <div class="row">
                        <div class="col-12 col-sm-12">
                           <div class="row mb-3">
                              <div class="col-4 col-sm-4">
                                 <div class="d-flex align-items-center ">
                                    <div>
                                       <i class="las la-angle-double-right circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Name</h3>
                                       <h1 class="_detail">Era Plus</h1>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-4 col-sm-4">
                                 <div>
                                    <div class="d-flex align-items-center">
                                       <div>
                                          <i class="las la-angle-double-right circle-icon"></i>
                                       </div>
                                       <div>
                                          <h3 class="_title">Payer Id</h3>
                                          <h1 class="_detail">13162</h1>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-4 col-sm-4">
                                 <div class="d-flex align-items-center">
                                    <div>
                                       <i class="las la-phone circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Phone</h3>
                                       <h1 class="_detail">9855665324</h1>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              
                              <div class="col-4 col-sm-4">
                                 <div class="d-flex align-items-center mb-3">
                                    <div>
                                       <i class="las la-map-marker circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Address</h3>
                                       <h1 class="_detail">4009  Heron Way, Portland OR Oregon, <span>97232</span></h1>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-4 col-sm-4">
                                 <div class="d-flex align-items-center mt-3">
                                    <div>
                                       <i class="las la-envelope circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Email</h3>
                                       <h1 class="_detail">abcinsurance@gmail.com</h1>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           
                           <div style="width: 100%;"><iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe></div>
                        
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="tab-pane fade" id="HomeCare" role="tabpanel" aria-labelledby="v-pills-messages-tab">
               <div class="app-card" style="min-height: auto;">
                  <div class="card-header" id="step2">
                     <div class="d-flex align-items-center">
                        <img src="{{ asset('assets/img/icons/homecare_icon.svg') }}" alt=""
                           srcset="{{ asset('assets/img/icons/homecare_icon.svg') }}" class="_icon mr-2"></a>
                        Home Care
                     </div>
                     <hr>
                  </div>
                  <div class="card-body collapse show" id="collapseWork" aria-labelledby="collapseWork"
                     data-parent="#profileAccordion">
                     <div class="row">
                        <div class="col-12 col-sm-12">
                           <h1 class="patient-profile-title mt-1">Caregiver Detail</h1>
                           <div class="row mb-3">
                              <div class="col-4 col-sm-4">
                                 <div class="d-flex align-items-center ">
                                    <div>
                                       <i class="las la-user-nurse circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Caregiver Name</h3>
                                       <h1 class="_detail">Ara lus</h1>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-4 col-sm-4">
                                 <div>
                                    <div class="d-flex align-items-center">
                                       <div>
                                          <i class="las la-phone  circle-icon"></i>
                                       </div>
                                       <div>
                                          <h3 class="_title">Phone</h3>
                                          <h1 class="_detail">13162</h1>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-4 col-sm-4">
                                 <div class="d-flex align-items-center ">
                                    <div>
                                       <i class="las la-clock circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Schedule start time</h3>
                                       <h1 class="_detail">10:00 AM</h1>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row mb-3">
                              <div class="col-4 col-sm-4">
                                 <div class="d-flex align-items-center">
                                    <div>
                                       <i class="las la-clock circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Schedule End time</h3>
                                       <h1 class="_detail">8:00 PM</h1>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <h1 class="patient-profile-title">Medical Detail</h1>
                           <div class="row mb-3">
                              <div class="col-4 col-sm-4">
                                 <div class="d-flex">
                                    <div>
                                       <i class="las la-briefcase-medical circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Medical Treatment</h3>
                                       <h1 class="_detail">&bull; Decubitus Care <br>&bull; Dressings <br>&bull; Bed
                                          bound Care <br>&bull; Colostomy Care <br>&bull; Ostomy Care 
                                       </h1>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-4 col-sm-4">
                                 <div>
                                    <div class="d-flex align-items-center">
                                       <div>
                                          <i class="las la-angle-double-right circle-icon"></i>
                                       </div>
                                       <div>
                                          <h3 class="_title">Current Condition</h3>
                                          <h1 class="_detail">Chronic
                                             Condition
                                          </h1>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <h1 class="patient-profile-title">Hospital Detail</h1>
                           <div class="row mb-3">
                              <div class="col-4 col-sm-4">
                                 <div class="d-flex">
                                    <div>
                                       <i class="las la-hospital circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title"> Hospital Name</h3>
                                       <h1 class="_detail">eClinicalWorks</h1>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-4 col-sm-4">
                                 <div>
                                    <div class="d-flex align-items-center">
                                       <div>
                                          <i class="las la-angle-double-right circle-icon"></i>
                                       </div>
                                       <div>
                                          <h3 class="_title">Reason for Hospitalization</h3>
                                          <h1 class="_detail">Serious Chronic Condition
                                          </h1>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-4 col-sm-4">
                                 <div class="d-flex">
                                    <div>
                                       <i class="las la-calendar circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Admission Date</h3>
                                       <h1 class="_detail">01/1/2020</h1>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row mb-3">
                              <div class="col-4 col-sm-4">
                                 <div class="d-flex align-items-center">
                                    <div>
                                       <i class="las la-calendar circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Expected Date</h3>
                                       <h1 class="_detail">28/1/2020</h1>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="tab-pane fade" id="Clinical" role="tabpanel" aria-labelledby="v-pills-settings-tab">
               <div class="app-card" style="min-height: auto;">
                  <div class="card-header" id="step2">
                     <div class="d-flex align-items-center">
                        <img src="{{ asset('assets/img/icons/clinical_icon.svg') }}" alt=""
                           srcset="{{ asset('assets/img/icons/clinical_icon.svg') }}" class="_icon mr-2"></a>
                        Clinical
                     </div>
                     <hr>
                  </div>
                  <div class="card-body collapse show" id="collapseWork" aria-labelledby="collapseWork"
                     data-parent="#profileAccordion">
                     <div class="row">
                        <div class="col-12 col-sm-12">
                           <div class="row mb-3">
                              <div class="col-4 col-sm-4">
                                 <div class="d-flex align-items-center ">
                                    <div>
                                       <i class="las la-angle-double-right circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Name</h3>
                                       <h1 class="_detail">eClinicalWorks</h1>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-4 col-sm-4">
                                 <div class="d-flex align-items-center">
                                    <div>
                                       <i class="las la-phone circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Phone</h3>
                                       <h1 class="_detail">9855665324</h1>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-4 col-sm-4">
                                 <div class="d-flex align-items-center">
                                    <div>
                                       <i class="las la-envelope circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Email</h3>
                                       <h1 class="_detail">eClinicalWorks@gmail.com</h1>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <h1 class="patient-profile-title">Medical Treatment Detail</h1>
                           <div class="row mb-3">
                              <div class="col-4 col-sm-4">
                                 <div class="d-flex">
                                    <div>
                                       <i class="las la-briefcase-medical circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Medical Treatment</h3>
                                       <h1 class="_detail">Hypertension</h1>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-4 col-sm-4">
                                 <div>
                                    <div class="d-flex align-items-center">
                                       <div>
                                          <i class="las la-calendar circle-icon"></i>
                                       </div>
                                       <div>
                                          <h3 class="_title">Date of Examination</h3>
                                          <h1 class="_detail">1/1/202</h1>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-4 col-sm-4">
                                 <div>
                                    <div class="d-flex align-items-center">
                                       <div>
                                          <i class="las la-calendar circle-icon"></i>
                                       </div>
                                       <div>
                                          <h3 class="_title">Date of next Examination</h3>
                                          <h1 class="_detail">1/1/202</h1>
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
            <div class="tab-pane fade" id="Physician" role="tabpanel">
               <div class="app-card" style="min-height: auto;">
                  <div class="card-header" id="step2">
                     <div class="d-flex align-items-center">
                        <img src="{{ asset('assets/img/icons/physician_icon.svg') }}" alt=""
                           srcset="{{ asset('assets/img/icons/physician_icon.svg') }}" class="_icon mr-2"></a>
                        Physicians
                     </div>
                     <hr>
                  </div>
                  <div class="card-body collapse show" id="collapseWork" aria-labelledby="collapseWork"
                     data-parent="#profileAccordion">
                     <div class="row">
                        <div class="col-12 col-sm-12">
                           <div class="row mb-3">
                              <div class="col-4 col-sm-4">
                                 <div class="d-flex align-items-center ">
                                    <div>
                                       <i class="las la-angle-double-right circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">MD Name</h3>
                                       <h1 class="_detail">Era Plus</h1>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-4 col-sm-4">
                                 <div>
                                    <div class="d-flex">
                                       <div>
                                          <i class="las la-angle-double-right circle-icon"></i>
                                       </div>
                                       <div>
                                          <h3 class="_title">Note</h3>
                                          <h1 class="_detail">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard </h1>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-4 col-sm-4">
                                 <div>
                                    <div class="d-flex">
                                       <div>
                                          <i class="las la-angle-double-right circle-icon"></i>
                                       </div>
                                       <div>
                                          <h3 class="_title">Primary</h3>
                                          <h1 class="_detail">Lorem Ipsum is simply dummy text of the printing</h1>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row mb-3">
                              <div class="col-4 col-sm-4">
                                 <div class="d-flex align-items-center mt-3">
                                    <div>
                                       <i class="las la-phone circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Phone</h3>
                                       <h1 class="_detail">9855665324</h1>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-4 col-sm-4">
                                 <div class="d-flex align-items-center mt-3">
                                    <div>
                                       <i class="las la-envelope circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Email</h3>
                                       <h1 class="_detail">abcinsurance@gmail.com</h1>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="tab-pane fade" id="Diagnosis" role="tabpanel" aria-labelledby="v-pills-messages-tab">
               <div class="app-card" style="min-height: auto;">
                  <div class="card-header" id="step2">
                     <div class="d-flex align-items-center">
                        <img src="{{ asset('assets/img/icons/physician_icon.svg') }}" alt=""
                           srcset="{{ asset('assets/img/icons/physician_icon.svg') }}" class="_icon mr-2"></a>
                        Diagnosis
                     </div>
                     <hr>
                  </div>
                  <div class="card-body collapse show" id="collapseWork" aria-labelledby="collapseWork"
                     data-parent="#profileAccordion">
                     <div class="row">
                        <div class="col-12 col-sm-12">
                           <div class="row mb-3">
                              <div class="col-4 col-sm-4">
                                 <div class="d-flex align-items-center ">
                                    <div>
                                       <i class="las la-angle-double-right circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Sr</h3>
                                       <h1 class="_detail">12583</h1>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-4 col-sm-4">
                                 <div>
                                    <div class="d-flex">
                                       <div>
                                          <i class="las la-angle-double-right circle-icon"></i>
                                       </div>
                                       <div>
                                          <h3 class="_title">ICD Code</h3>
                                          <h1 class="_detail">9856</h1>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-4 col-sm-4">
                                 <div class="d-flex">
                                    <div>
                                       <i class="las la-angle-double-right circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Primary</h3>
                                       <h1 class="_detail">Lorem ipsum, dolor </h1>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row mb-3">
                              <div class="col-4 col-sm-4">
                                 <div class="d-flex align-items-center">
                                    <div>
                                       <i class="las la-calendar circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Date</h3>
                                       <h1 class="_detail">1/2/2020</h1>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-4 col-sm-4">
                                 <div class="d-flex align-items-center">
                                    <div>
                                       <i class="las la-calendar circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Date Type</h3>
                                       <h1 class="_detail">5/5/2020</h1>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-4 col-sm-4">
                                 <div class="d-flex align-items-center">
                                    <div>
                                       <i class="las la-angle-double-right circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Historical as of</h3>
                                       <h1 class="_detail">lorem Ipsum</h1>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row mb-3">
                              <div class="col-4 col-sm-4">
                                 <div class="d-flex align-items-center">
                                    <div>
                                       <i class="las la-clock circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Duration</h3>
                                       <h1 class="_detail">1 hours</h1>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-4 col-sm-4">
                                 <div>
                                    <div class="d-flex">
                                       <div>
                                          <i class="las la-angle-double-right circle-icon"></i>
                                       </div>
                                       <div>
                                          <h3 class="_title">Description</h3>
                                          <h1 class="_detail">Lorem Ipsum is simply dummy text of the printing</h1>
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
            <div class="tab-pane fade" id="MedProfile" role="tabpanel" aria-labelledby="v-pills-settings-tab">
               <div class="app-card" style="min-height: auto;">
                  <div class="card-header" id="step2">
                     <div class="d-flex align-items-center">
                        <img src="{{ asset('assets/img/icons/medprofile_icon.svg') }}" alt=""
                           srcset="{{ asset('assets/img/icons/medprofile_icon.svg') }}" class="_icon mr-2"></a>
                        Med Profile
                     </div>
                     <hr>
                  </div>
                  <div class="card-body collapse show" id="collapseWork" aria-labelledby="collapseWork"
                     data-parent="#profileAccordion">
                     <div class="row">
                        <div class="col-12 col-sm-12">
                           <div class="row mb-3">
                              <div class="col-4 col-sm-4">
                                 <div class="d-flex align-items-center ">
                                    <div>
                                       <i class="las la-angle-double-right circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Weight</h3>
                                       <h1 class="_detail">56</h1>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-4 col-sm-4">
                                 <div>
                                    <div class="d-flex">
                                       <div>
                                          <i class="las la-angle-double-right circle-icon"></i>
                                       </div>
                                       <div>
                                          <h3 class="_title">Height</h3>
                                          <h1 class="_detail">136 </h1>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-4 col-sm-4">
                                 <div class="d-flex">
                                    <div>
                                       <i class="las la-briefcase-medical circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Medical History</h3>
                                       <h1 class="_detail">&bull; Hypertension <br>&bull; Allergies <br>&bull; Gastric Ulcers </h1>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <h1 class="patient-profile-title mt-0">General Medical History</h1>
                           <div class="row mb-3">
                              <div class="col-4 col-sm-4">
                                 <div>
                                    <div class="d-flex">
                                       <div>
                                          <i class="las la-angle-double-right circle-icon"></i>
                                       </div>
                                       <div>
                                          <h3 class="_title">Have you had the Hepatitis B
                                             vaccination?
                                          </h3>
                                          <h1 class="_detail">YES </h1>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-4 col-sm-4">
                                 <div class="d-flex">
                                    <div>
                                       <i class="las la-angle-double-right circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Significant Medical History</h3>
                                       <h1 class="_detail">&bull; surgery <br>&bull; injuries</h1>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-4 col-sm-4">
                                 <div class="d-flex">
                                    <div>
                                       <i class="las la-angle-double-right circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">List any Medical Problems</h3>
                                       <h1 class="_detail">&bull; asthma <br>&bull; headaches</h1>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <h1 class="patient-profile-title">Medical Insurance Details</h1>
                           <div class="row mb-3">
                              <div class="col-4 col-sm-4">
                                 <div>
                                    <div class="d-flex">
                                       <div>
                                          <i class="las la-angle-double-right circle-icon"></i>
                                       </div>
                                       <div>
                                          <h3 class="_title">Do you have medical insurance?</h3>
                                          <h1 class="_detail">YES </h1>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-8 col-sm-8">
                                 <div class="d-flex">
                                    <div>
                                       <i class="las la-angle-double-right circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Do you have any other medical
                                          condition, injury or anything
                                          else we should be aware of that
                                          we have not mentioned?
                                       </h3>
                                       <h1 class="_detail">NO</h1>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row mb-3">
                              <div class="col-4 col-sm-4">
                                 <div>
                                    <div class="d-flex">
                                       <div>
                                          <i class="las la-angle-double-right circle-icon"></i>
                                       </div>
                                       <div>
                                          <h3 class="_title">Medical Treatment </h3>
                                          <h1 class="_detail">&bull; Decubitus Care <br>&bull; Dressings<br> &bull; Bed
                                             bound Care <br>&bull; Colostomy Care<br> &bull; Ostomy Care 
                                          </h1>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-8 col-sm-8">
                                 <div class="d-flex">
                                    <div>
                                       <i class="las la-angle-double-right circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Is the patient appropriate for
                                          Hospice care?
                                       </h3>
                                       <h1 class="_detail">YES</h1>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="tab-pane fade" id="Pharmacy" role="tabpanel" aria-labelledby="v-pills-settings-tab">
               <div class="app-card" style="min-height: auto;">
                  <div class="card-header" id="step2">
                     <div class="d-flex align-items-center">
                        <img src="{{ asset('assets/img/icons/pharmacy_icon.svg') }}" alt=""
                           srcset="{{ asset('assets/img/icons/pharmacy_icon.svg') }}" class="_icon mr-2"></a>
                        Pharmacy
                     </div>
                     <hr>
                  </div>
                  <div class="card-body collapse show" id="collapseWork" aria-labelledby="collapseWork"
                     data-parent="#profileAccordion">
                     <div class="row">
                        <div class="col-12 col-sm-12">
                           <div class="row mb-3">
                              <div class="col-4 col-sm-4">
                                 <div class="d-flex align-items-center ">
                                    <div>
                                       <i class="las la-angle-double-right circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Name</h3>
                                       <h1 class="_detail">Era Plus</h1>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-4 col-sm-4">
                                 <div>
                                    <div class="d-flex align-items-center">
                                       <div>
                                          <i class="las la-angle-double-right circle-icon"></i>
                                       </div>
                                       <div>
                                          <h3 class="_title">NCPDPID</h3>
                                          <h1 class="_detail">13162</h1>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-4 col-sm-4">
                                 <div class="d-flex align-items-center mt-3">
                                    <div>
                                       <i class="las la-phone circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Phone</h3>
                                       <h1 class="_detail">9855665324</h1>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="d-flex align-items-center mb-3">
                              <div>
                                 <i class="las la-map-marker circle-icon"></i>
                              </div>
                              <div>
                                 <h3 class="_title">Address 1</h3>
                                 <h1 class="_detail">4009  Heron Way, Portland OR Oregon, <span>97232</span></h1>
                              </div>
                           </div>
                           <div style="width: 100%;"><iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </section>
</section>
    


@endsection

@push('scripts')

@endpush
