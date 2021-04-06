@extends('pages.layouts.app')
@section('title','Clinician Details')
@section('pageTitleSection')
    Clinician Details
@endsection

@section('content')
   <section class="details">
      <section class="details-aside navbar navbar-dark">
         <div class="sidebar mb-2" id="collapsibleNavbar">
         <div class="block">
            <div class="height-83"></div>
            <img src="/{{ isset($data->avatar_image) ? $data->avatar_image : null }}" alt="Welcome to Doral" srcset="/{{ isset($data->avatar_image) ? $data->avatar_image : null }}"
               class="img-fluid img-100">
         </div>
         <div>
            <!-- <h1 class="patient-name mb-1">Mitchell C. Shay</h1> -->
            <div class="d-flex justify-content-center">
               <ul class="list-group">
                  @isset($data->applicant->applicant_name)
                  <li class="list-group-item name">{{ isset($data->applicant->applicant_name) ? $data->applicant->applicant_name : null }}</li>
                  @endisset
                  <li class="list-group-item">
                     <span>{{ isset($data->gender_name) ? $data->gender_name : null }}</span>&nbsp;/&nbsp;
                     <span>{{ isset($data->dob) ? date('m-d-Y', strtotime($data->dob)) : null }}</span>&nbsp;
                  </li>
                  @if(isset($data->background) && isset($data->applicant->phone))
                  <li class="list-group-item d-inherit">
                     @php
                        $key = null;
                        if ($data->background) {
                           end($data->background);
                           $key = key($data->background);
                        }
                     @endphp
                     @isset($data->background)
                     <span>{{ isset($data->background[$key]->position) ? $data->background[$key]->position : null }}</span>&nbsp;/&nbsp;
                     @endisset
                     @isset($data->applicant->phone)
                     <a href="tel:{{ isset($data->applicant->phone) ? $data->applicant->phone : null }}" class="text-body call-text d-flex align-items-center"><img src="/assets/img/icons/phone_green.svg" class="mr-1" alt=""> {{ isset($data->applicant->phone) ? $data->applicant->phone : null }}</a>
                     @endisset
                  </li>
                  @endif
                  <li class="list-group-item"><span>{{ isset($data->email) ? $data->email : null }}</span></li>
                  <li class="list-group-item"> 
                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="TeleHealth">
                        <label class="form-check-label" for="inlineCheckbox1">TeleHealth</label>
                     </div>
                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="RoadL">
                        <label class="form-check-label" for="inlineCheckbox2">RoadL</label>
                     </div>
                  </li>
                  </ul>
            </div>
         </div>
         <!-- Left Section Start -->
         <div>
            <ul class="patient-nav nav">
               <li class="mb-2">
                  <a href="#ApplicantDetail" class="active" data-toggle="pill" role="tab">
                  <img src="/assets/img/icons/applicant-clinician.svg" alt=""
                     srcset="/assets/img/icons/applicant-clinician.svg"
                     class="_icon mr-2">Applicant Details</a>
               </li>
               <li class="mb-2">
                  <a href="#EducationDetails" data-toggle="pill" role="tab">
                  <img src="/assets/img/icons/education-clinician.svg" alt=""
                     srcset="/assets/img/icons/education-clinician.svg" class="_icon mr-2">Education Details</a>
               </li>
               <li class="mb-2"><a href="#ProfessionalDetails" data-toggle="pill" role="tab"><img
                  src="/assets/img/icons/professional-clinician.svg" alt=""
                  srcset="/assets/img/icons/professional-clinician.svg" class="_icon mr-2">Professional Details</a></li>
               <li class="mb-2"><a href="#DepositDetails" data-toggle="pill" role="tab"><img
                  src="/assets/img/icons/deposit-clinician.svg" alt=""
                  srcset="/assets/img/icons/deposit-clinician.svg" class="_icon mr-2">Deposit Details</a></li>
               <li class="mb-2"><a href="#BackgroundDetails" data-toggle="pill" role="tab"><img
                  src="/assets/img/icons/background-clinician.svg" alt=""
                  srcset="/assets/img/icons/background-clinician.svg" class="_icon mr-2">Background Details</a>
               </li>
               <li class="mb-2"><a href="#VerifyIdentity" data-toggle="pill" role="tab"><img
                  src="/assets/img/icons/identity-clinician.svg" alt=""
                  srcset="/assets/img/icons/identity-clinician.svg" class="_icon mr-2">Verify Identity</a></li>
               <li class="mb-2"><a href="#DocumentsVerifiaction" data-toggle="pill" role="tab"><img
                  src="/assets/img/icons/document-clinician.svg" alt=""
                  srcset="/assets/img/icons/document-clinician.svg" class="_icon mr-2">Documents Verifiaction</a></li>
               </ul>
         </div>
      </section>
      <section class="details-content scrollbar-detail scrollbar">
         <!-- Right section Start-->
         <div class="tab-content" id="v-pills-tabContent">
         <!-- Applicant Details Start -->
         <div class="tab-pane fade show active" id="ApplicantDetail" role="tabpanel"
            aria-labelledby="v-pills-ApplicantDetail-tab">
            <div class="app-card" style="min-height: auto;">
               <div class="card-header" id="step2">
                  <div class="d-flex align-items-center">
                     <img src="/assets/img/icons/applicant-clinician.svg" alt=""
                        srcset="/assets/img/icons/applicant-clinician.svg" class="_icon mr-2"></a>
                     Applicant Details
                  </div>
               </div>
               <div class="card-body collapse show mt-3" id="collapseWork" aria-labelledby="collapseWork"
                  data-parent="#profileAccordion">
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link active" id="Details-tab" data-toggle="tab" href="#Details" role="tab" aria-controls="Details" aria-selected="true">DETAILS</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="Address-tab" data-toggle="tab" href="#Address" role="tab" aria-controls="Address" aria-selected="false">ADDRESS</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="Reference-tab" data-toggle="tab" href="#Reference" role="tab" aria-controls="Reference" aria-selected="false">REFERENCE</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="Emergency-tab" data-toggle="tab" href="#Emergency" role="tab" aria-controls="Emergency" aria-selected="false">EMERGENCY</a>
                     </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                     <div class="tab-pane fade show active" id="Details" role="tabpanel" aria-labelledby="Details-tab">
                        <div class="row mt-3">
                           <div class="col-12 col-sm-4">
                              <div>
                                 <div class="d-flex align-items-center">
                                    <div>
                                       <i class="las la-user-nurse circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Applicant Name</h3>
                                       <h1 class="_detail">{{ isset($data->applicant->applicant_name) ? $data->applicant->applicant_name : null }}</h1>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-4">
                              <div>
                                 <div class="d-flex align-items-center">
                                    <div>
                                       <i class="las la-user-nurse circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Other Name (if applicable)</h3>
                                       <h1 class="_detail">{{ isset($data->applicant->other_name) ? $data->applicant->other_name : null }}</h1>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-4">
                              <div>
                                 <div class="d-flex align-items-center">
                                    <div>
                                       <i class="las la-angle-double-right circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">SSN</h3>
                                       <h1 class="_detail">{{ isset($data->applicant->ssn) ? $data->applicant->ssn : null }}</h1>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row mt-3">
                           <div class="col-12 col-sm-4">
                              <div>
                                 <div class="d-flex align-items-center">
                                    <div>
                                       <i class="las la-phone  circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Phone No.</h3>
                                       <h1 class="_detail">{{ isset($data->applicant->phone) ? $data->applicant->phone : null }}</h1>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-4">
                              <div>
                                 <div class="d-flex align-items-center">
                                    <div>
                                       <i class="las la-phone  circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Home Home</h3>
                                       <h1 class="_detail">{{ isset($data->applicant->home_phone) ? $data->applicant->home_phone : null }}</h1>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-4">
                              <div>
                                 <div class="d-flex align-items-center">
                                    <div>
                                       <i class="las la-phone  circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Emergency Phone</h3>
                                       <h1 class="_detail">{{ isset($data->applicant->emergency_phone) ? $data->applicant->emergency_phone : null }}</h1>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row mt-3">
                           <div class="col-12 col-sm-4">
                              <div>
                                 <div class="d-flex align-items-center">
                                    <div>
                                       <i class="las la-calendar circle-icon"></i>
                                    </div>
                                    <div>
                                       <h3 class="_title">Date Available</h3>
                                       <h1 class="_detail">{{ isset($data->applicant->date) ? date('m-d-Y', strtotime($data->applicant->date)) : null }}</h1>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        @if(isset($data->applicant->us_citizen))
                        <div class="_card mt-3">
                           <div class="_card_header">
                              <div class="title-head"><span style="font-weight: bold;">Q:</span>
                                 US Citizen
                              </div>
                           </div>
                           <div class="_card_body">
                              <h1 class="_title"><span style="font-weight: bold;">Ans:</span> YES
                              </h1>
                           </div>
                        </div>
                        @else
                        <div class="_card mt-3">
                           <div class="_card_header">
                              <div class="title-head"><span style="font-weight: bold;">Q:</span>
                                 US Citizen
                              </div>
                           </div>
                           <div class="_card_body">
                              <h1 class="_title"><span style="font-weight: bold;">Ans:</span> No (Immigration ID/Card) : {{ isset($data->applicant->immigration_id) ? $data->applicant->immigration_id : null }}
                              </h1>
                           </div>
                        </div>
                        @endif
                     </div>
                     <div class="tab-pane fade" id="Address" role="tabpanel" aria-labelledby="Address-tab">
                        <ul>
                           <li>
                              <div class="_card mt-3">
                                 <div class="_card_header">
                                    <div class="title-head">Address Details</div>
                                 </div>
                                 <div class="_card_body">
                                    <div class="row">
                                       <div class="col-12 col-sm-12">
                                          <div class="d-flex align-items-center mb-3">
                                             <div>
                                                <i class="las la-map-marker circle-icon"></i>
                                             </div>
                                             <div>
                                                <h3 class="_title">Address Line 1</h3>
                                                <h1 class="_detail">
                                                   {{ isset($data->applicant->address_line_1) ? $data->applicant->address_line_1 : null }}
                                                   <a class="btn btn-info btn-sm ml-2" data-toggle="collapse" href="#collapseExample" aria-expanded="true"><i class="las la-map-marker"></i>View
                                                   Map</a>
                                                </h1>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="collapse mb-4" id="collapseExample">
                                       <div class="card card-body">
                                          <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%"
                                             height="200" frameborder="0" scrolling="no" marginheight="0"
                                             marginwidth="0"
                                             src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-12 col-sm-12">
                                          <div class="d-flex align-items-center mb-3">
                                             <div>
                                                <i class="las la-map-marker circle-icon"></i>
                                             </div>
                                             <div>
                                                <h3 class="_title">Address Line 2</h3>
                                                <h1 class="_detail">
                                                   {{ isset($data->applicant->address_line_2) ? $data->applicant->address_line_2 : null }}
                                                   <a class="btn btn-info btn-sm ml-2" data-toggle="collapse" href="#collapseExample1" aria-expanded="true"><i class="las la-map-marker"></i>View
                                                   Map</a>
                                                </h1>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="collapse mb-4" id="collapseExample1">
                                       <div class="card card-body">
                                          <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%"
                                             height="200" frameborder="0" scrolling="no" marginheight="0"
                                             marginwidth="0"
                                             src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-12 col-sm-4">
                                          <div class="d-flex align-items-center">
                                             <div>
                                                <i class="las la-angle-double-right circle-icon"></i>
                                             </div>
                                             <div>
                                                <h3 class="_title">City</h3>
                                                <h1 class="_detail">{{ isset($data->applicant->city->city) ? $data->applicant->city->city : null }}</h1>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-12 col-sm-4">
                                          <div class="d-flex align-items-center">
                                             <div>
                                                <i class="las la-angle-double-right circle-icon"></i>
                                             </div>
                                             <div>
                                                <h3 class="_title">State</h3>
                                                <h1 class="_detail">{{ isset($data->applicant->state->state) ? $data->applicant->state->state : null }}</h1>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-12 col-sm-4">
                                          <div class="d-flex align-items-center">
                                             <div>
                                                <i class="las la-angle-double-right circle-icon"></i>
                                             </div>
                                             <div>
                                                <h3 class="_title">Zip Code</h3>
                                                <h1 class="_detail">{{ isset($data->applicant->zip) ? $data->applicant->zip : null }}</h1>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row mt-3">
                                       <div class="col-12 col-sm-8">
                                          <div class="d-flex align-items-center">
                                             <div>
                                                <i class="las la-angle-double-right circle-icon"></i>
                                             </div>
                                             <div>
                                                <h3 class="_title">Length of time at the above address</h3>
                                                <h1 class="_detail">{{ isset($data->applicant->address_life) ? $data->applicant->address_life : null }}</h1>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </li>
                        </ul>
                     </div>
                     <div class="tab-pane fade" id="Reference" role="tabpanel" aria-labelledby="Reference-tab">
                        <ul>
                           @isset($data->applicant->references)
                           @foreach($data->applicant->references as $index => $reference)
                           <li>
                              <div class="_card mt-3">
                                 <div class="_card_header">
                                    <div class="title-head">Reference {{ $index + 1 }}</div>
                                 </div>
                                 <div class="_card_body">
                                    <div class="row">
                                       <div class="col-12 col-sm-4">
                                          <div class="d-flex align-items-center">
                                             <div>
                                                <i class="las la-user-nurse circle-icon"></i>
                                             </div>
                                             <div>
                                                <h3 class="_title">Name</h3>
                                                <h1 class="_detail">{{ isset($reference->reference_name) ? $reference->reference_name : null }}</h1>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-12 col-sm-4">
                                          <div class="d-flex align-items-center">
                                             <div>
                                                <i class="las la-phone  circle-icon"></i>
                                             </div>
                                             <div>
                                                <h3 class="_title">Phone No.</h3>
                                                <h1 class="_detail">{{ isset($reference->reference_phone) ? $reference->reference_phone : null }}</h1>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-12 col-sm-4">
                                          <div class="d-flex align-items-center">
                                             <div>
                                                <i class="las la-angle-double-right circle-icon"></i>
                                             </div>
                                             <div>
                                                <h3 class="_title">Relationship</h3>
                                                <h1 class="_detail">{{ isset($reference->reference_relationship) ? $reference->reference_relationship : null }}</h1>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row mt-3">
                                       <div class="col-12 col-sm-12">
                                          <div class="d-flex align-items-center mb-3">
                                             <div>
                                                <i class="las la-map-marker circle-icon"></i>
                                             </div>
                                             <div>
                                                <h3 class="_title">Address</h3>
                                                <h1 class="_detail">
                                                   {{ isset($reference->reference_address) ? $reference->reference_address : null }}
                                                   <a class="btn btn-info btn-sm ml-2" data-toggle="collapse" href="#collapseExample7" aria-expanded="true"><i class="las la-map-marker"></i>View
                                                   Map</a>
                                                </h1>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="collapse mb-4" id="collapseExample7">
                                       <div class="card card-body">
                                          <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%"
                                             height="200" frameborder="0" scrolling="no" marginheight="0"
                                             marginwidth="0"
                                             src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                       </div>
                                    </div>
                                    <div class="_card mt-3">
                                       <div class="_card_header">
                                          <div class="title-head"><span style="font-weight: bold;">Q:</span>
                                             Have you ever been bonded?
                                          </div>
                                       </div>
                                       <div class="_card_body">
                                          <h1 class="_title"><span style="font-weight: bold;">Ans:</span> {{ (isset($data->applicant->bonded) && $data->applicant->bonded == 1) ? 'Yes' : 'No' }}
                                          </h1>
                                       </div>
                                    </div>
                                    <div class="_card mt-3">
                                       <div class="_card_header">
                                          <div class="title-head"><span style="font-weight: bold;">Q:</span>
                                             Have you ever been refused a bond?
                                          </div>
                                       </div>
                                       <div class="_card_body">
                                          <h1 class="_title"><span style="font-weight: bold;">Ans:</span> {{ (isset($data->applicant->refused_bond) && $data->applicant->refused_bond == 1) ? 'Yes' : 'No' }}
                                          </h1>
                                       </div>
                                    </div>
                                    <div class="_card mt-3">
                                       <div class="_card_header">
                                          <div class="title-head"><span style="font-weight: bold;">Q:</span>
                                             Have you ever been convicted of a crime?
                                          </div>
                                       </div>
                                       <div class="_card_body">
                                          <h1 class="_title"><span style="font-weight: bold;">Ans:</span> {{ (isset($data->applicant->convicted_crime) && $data->applicant->convicted_crime == 1) ? 'Yes' : 'No' }}
                                          </h1>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </li>
                           @endforeach
                           @endisset
                        </ul>
                     </div>
                     <div class="tab-pane fade" id="Emergency" role="tabpanel" aria-labelledby="Emergency-tab">
                        <div class="row mt-3">
                           <div class="col-12 col-sm-4">
                              <div class="d-flex align-items-center">
                                 <div>
                                    <i class="las la-user-nurse circle-icon"></i>
                                 </div>
                                 <div>
                                    <h3 class="_title">Name</h3>
                                    <h1 class="_detail">{{ isset($data->applicant->emergency_name) ? $data->applicant->emergency_name : null }}</h1>
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-4">
                              <div class="d-flex align-items-center">
                                 <div>
                                    <i class="las la-phone  circle-icon"></i>
                                 </div>
                                 <div>
                                    <h3 class="_title">Phone No.</h3>
                                    <h1 class="_detail">{{ isset($data->applicant->emergency_phone) ? $data->applicant->emergency_phone : null }}</h1>
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-4">
                              <div class="d-flex align-items-center">
                                 <div>
                                    <i class="las la-angle-double-right circle-icon"></i>
                                 </div>
                                 <div>
                                    <h3 class="_title">Relationship</h3>
                                    <h1 class="_detail">{{ isset($data->applicant->emergency_relationship) ? $data->applicant->emergency_relationship : null }}</h1>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row mt-3">
                           <div class="col-12 col-sm-12">
                              <div class="d-flex align-items-center mb-3">
                                 <div>
                                    <i class="las la-map-marker circle-icon"></i>
                                 </div>
                                 <div>
                                    <h3 class="_title">Address</h3>
                                    <h1 class="_detail">
                                       {{ isset($data->applicant->emergency_address) ? $data->applicant->emergency_address : null }}
                                       <a class="btn btn-info btn-sm ml-2" data-toggle="collapse" href="#collapseExample10" aria-expanded="true"><i class="las la-map-marker"></i>View
                                       Map</a>
                                    </h1>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="collapse mb-4" id="collapseExample10">
                           <div class="card card-body">
                              <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%"
                                 height="200" frameborder="0" scrolling="no" marginheight="0"
                                 marginwidth="0"
                                 src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                           </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--  Applicant Details End -->
            <!-- Education Details Start -->
            <div class="tab-pane fade" id="EducationDetails" role="tabpanel"  aria-labelledby="v-pills-EducationDetails-tab">
               <div class="app-card" style="min-height: auto;">
                  <div class="card-header" id="step2">
                     <div class="d-flex align-items-center">
                        <img src="/assets/img/icons/education-clinician.svg" alt=""
                           srcset="/assets/img/icons/education-clinician.svg" class="_icon mr-2"></a>
                           Education Details
                     </div>
                  </div>
                  <div class="card-body collapse show mt-3" id="collapseWork" aria-labelledby="collapseWork"
                     data-parent="#profileAccordion">
                     <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                           <a class="nav-link active" id="Details-tab" data-toggle="tab" href="#MEDICALINSTITUTE" role="tab" aria-controls="Details" aria-selected="true">MEDICAL INSTITUTE</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" id="Address-tab" data-toggle="tab" href="#RESIDENCYINSTITUTE" role="tab" aria-controls="Address" aria-selected="false">RESIDENCY INSTITUTE</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" id="Reference-tab" data-toggle="tab" href="#FELLOWSHIPINSTITUTE" role="tab" aria-controls="Reference" aria-selected="false">FELLOWSHIP INSTITUTE</a>
                        </li>
                        </ul>
                     <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="MEDICALINSTITUTE" role="tabpanel" aria-labelledby="MEDICALINSTITUTE-tab">
                           <ul>
                              <li>
                                 <div class="_card mt-3">
                                    <div class="_card_header">
                                       <div class="title-head">MEDICAL INSTITUTE</div>
                                    </div>
                                    <div class="_card_body">
                                       <div class="row">
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center">
                                                <div>
                                                   <i class="las la-university circle-icon"></i>
                                                </div>
                                                <div>
                                                   <h3 class="_title">Name of Institute</h3>
                                                   <h1 class="_detail">{{ isset($data->education->medical_institute_name) ? $data->education->medical_institute_name : null }}</h1>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center">
                                                <div>
                                                   <i class="las la-angle-double-right circle-icon"></i>
                                                </div>
                                                <div>
                                                   <h3 class="_title">Year Started</h3>
                                                   <h1 class="_detail">{{ isset($data->education->medical_institute_year_started) ? $data->education->medical_institute_year_started : null }}</h1>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center">
                                                <div>
                                                   <i class="las la-angle-double-right circle-icon"></i>
                                                </div>
                                                <div>
                                                   <h3 class="_title">Year Completed</h3>
                                                   <h1 class="_detail">{{ isset($data->education->medical_institute_year_completed) ? $data->education->medical_institute_year_completed : null }}</h1>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row mt-3">
                                          <div class="col-12 col-sm-12">
                                             <div class="d-flex align-items-center mb-3">
                                                <div>
                                                   <i class="las la-map-marker circle-icon"></i>
                                                </div>
                                                <div>
                                                   <h3 class="_title">Address</h3>
                                                   <h1 class="_detail">
                                                      {{ isset($data->education->medical_institute_address) ? $data->education->medical_institute_address : null }}
                                                      <a class="btn btn-info btn-sm ml-2" data-toggle="collapse" href="#collapseExample1" aria-expanded="true"><i class="las la-map-marker"></i>View
                                                      Map</a>
                                                   </h1>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="collapse mb-4" id="collapseExample1">
                                          <div class="card card-body">
                                             <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%"
                                                height="200" frameborder="0" scrolling="no" marginheight="0"
                                                marginwidth="0"
                                                src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center">
                                                <div>
                                                   <i class="las la-angle-double-right circle-icon"></i>
                                                </div>
                                                <div>
                                                   <h3 class="_title">City</h3>
                                                   <h1 class="_detail">{{ isset($data->education->medical_institute_city->city) ? $data->education->medical_institute_city->city : null }}</h1>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center">
                                                <div>
                                                   <i class="las la-angle-double-right circle-icon"></i>
                                                </div>
                                                <div>
                                                   <h3 class="_title">State</h3>
                                                   <h1 class="_detail">{{ isset($data->education->medical_institute_state->state) ? $data->education->medical_institute_state->state : null }}</h1>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                        <div class="tab-pane fade" id="RESIDENCYINSTITUTE" role="tabpanel" aria-labelledby="RESIDENCYINSTITUTE-tab">
                           <ul>
                              <li>
                                 <div class="_card mt-3">
                                    <div class="_card_header">
                                       <div class="title-head">RESIDENCY INSTITUTE</div>
                                    </div>
                                    <div class="_card_body">
                                       <div class="row">
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center">
                                                <div>
                                                   <i class="las la-university circle-icon"></i>
                                                </div>
                                                <div>
                                                   <h3 class="_title">Name of Institute</h3>
                                                   <h1 class="_detail">{{ isset($data->education->residency_institute_name) ? $data->education->residency_institute_name : null }}</h1>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center">
                                                <div>
                                                   <i class="las la-angle-double-right circle-icon"></i>
                                                </div>
                                                <div>
                                                   <h3 class="_title">Year Started</h3>
                                                   <h1 class="_detail">{{ isset($data->education->residency_institute_year_started) ? $data->education->residency_institute_year_started : null }}</h1>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center">
                                                <div>
                                                   <i class="las la-angle-double-right circle-icon"></i>
                                                </div>
                                                <div>
                                                   <h3 class="_title">Year Completed</h3>
                                                   <h1 class="_detail">{{ isset($data->education->residency_institute_year_completed) ? $data->education->residency_institute_year_completed : null }}</h1>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row mt-3">
                                          <div class="col-12 col-sm-12">
                                             <div class="d-flex align-items-center mb-3">
                                                <div>
                                                   <i class="las la-map-marker circle-icon"></i>
                                                </div>
                                                <div>
                                                   <h3 class="_title">Address</h3>
                                                   <h1 class="_detail">
                                                      {{ isset($data->education->residency_institute_address) ? $data->education->residency_institute_address : null }}
                                                      <a class="btn btn-info btn-sm ml-2" data-toggle="collapse" href="#collapseExample12" aria-expanded="true"><i class="las la-map-marker"></i>View
                                                      Map</a>
                                                   </h1>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="collapse mb-4" id="collapseExample12">
                                          <div class="card card-body">
                                             <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%"
                                                height="200" frameborder="0" scrolling="no" marginheight="0"
                                                marginwidth="0"
                                                src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center">
                                                <div>
                                                   <i class="las la-angle-double-right circle-icon"></i>
                                                </div>
                                                <div>
                                                   <h3 class="_title">City</h3>
                                                   <h1 class="_detail">{{ isset($data->education->residency_institute_city->city) ? $data->education->residency_institute_city->city : null }}</h1>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center">
                                                <div>
                                                   <i class="las la-angle-double-right circle-icon"></i>
                                                </div>
                                                <div>
                                                   <h3 class="_title">State</h3>
                                                   <h1 class="_detail">{{ isset($data->education->residency_institute_state->state) ? $data->education->residency_institute_state->state : null }}</h1>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                        <div class="tab-pane fade" id="FELLOWSHIPINSTITUTE" role="tabpanel" aria-labelledby="FELLOWSHIPINSTITUTE-tab">
                           <ul>
                              <li>
                                 <div class="_card mt-3">
                                    <div class="_card_header">
                                       <div class="title-head">FELLOWSHIP INSTITUTE</div>
                                    </div>
                                    <div class="_card_body">
                                       <div class="row">
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center">
                                                <div>
                                                   <i class="las la-university circle-icon"></i>
                                                </div>
                                                <div>
                                                   <h3 class="_title">Name of Institute</h3>
                                                   <h1 class="_detail">{{ isset($data->education->fellowship_institute_name) ? $data->education->fellowship_institute_name : null }}</h1>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center">
                                                <div>
                                                   <i class="las la-angle-double-right circle-icon"></i>
                                                </div>
                                                <div>
                                                   <h3 class="_title">Year Started</h3>
                                                   <h1 class="_detail">{{ isset($data->education->fellowship_institute_year_started) ? $data->education->fellowship_institute_year_started : null }}</h1>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center">
                                                <div>
                                                   <i class="las la-angle-double-right circle-icon"></i>
                                                </div>
                                                <div>
                                                   <h3 class="_title">Year Completed</h3>
                                                   <h1 class="_detail">{{ isset($data->education->fellowship_institute_year_completed) ? $data->education->fellowship_institute_year_completed : null }}</h1>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row mt-3">
                                          <div class="col-12 col-sm-12">
                                             <div class="d-flex align-items-center mb-3">
                                                <div>
                                                   <i class="las la-map-marker circle-icon"></i>
                                                </div>
                                                <div>
                                                   <h3 class="_title">Address</h3>
                                                   <h1 class="_detail">
                                                      {{ isset($data->education->fellowship_institute_address) ? $data->education->fellowship_institute_address : null }}
                                                      <a class="btn btn-info btn-sm ml-2" data-toggle="collapse" href="#collapseExample14" aria-expanded="true"><i class="las la-map-marker"></i>View
                                                      Map</a>
                                                   </h1>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="collapse mb-4" id="collapseExample14">
                                          <div class="card card-body">
                                             <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%"
                                                height="200" frameborder="0" scrolling="no" marginheight="0"
                                                marginwidth="0"
                                                src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center">
                                                <div>
                                                   <i class="las la-angle-double-right circle-icon"></i>
                                                </div>
                                                <div>
                                                   <h3 class="_title">City</h3>
                                                   <h1 class="_detail">{{ isset($data->education->fellowship_institute_city->city) ? $data->education->fellowship_institute_city->city : null }}</h1>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center">
                                                <div>
                                                   <i class="las la-angle-double-right circle-icon"></i>
                                                </div>
                                                <div>
                                                   <h3 class="_title">State</h3>
                                                   <h1 class="_detail">{{ isset($data->education->fellowship_institute_state->state) ? $data->education->fellowship_institute_state->state : null }}</h1>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                        </div>
                     </div>
                  </div>
            </div>
            <!-- Education Details End -->
            <!-- Professional Details Start -->
            <div class="tab-pane fade" id="ProfessionalDetails" role="tabpanel" aria-labelledby="v-pills-ProfessionalDetails-tab">
               <div class="app-card" style="min-height: auto;">
                  <div class="card-header" id="step2">
                     <div class="d-flex align-items-center">
                        <img src="/assets/img/icons/professional-clinician.svg" alt=""
                           srcset="/assets/img/icons/professional-clinician.svg" class="_icon mr-2"></a>
                           Professional Details
                     </div>
                  </div>
                  <div class="card-body collapse show mt-3" id="collapseWork" aria-labelledby="collapseWork"
                     data-parent="#profileAccordion">
                     <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                           <a class="nav-link active" id="Details-tab" data-toggle="tab" href="#LICENSES-CERTIFICATE" role="tab" aria-controls="LICENSES-CERTIFICATE" aria-selected="true">LICENSES / CERTIFICATE</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" id="Address-tab" data-toggle="tab" href="#WORKHISTORY" role="tab" aria-controls="WORKHISTORY" aria-selected="false">WORKHISTORY</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" id="Reference-tab" data-toggle="tab" href="#ATTESTATONS" role="tab" aria-controls="ATTESTATONS" aria-selected="false">ATTESTATONS</a>
                        </li>
                     </ul>
                     <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="LICENSES-CERTIFICATE" role="tabpanel" aria-labelledby="LICENSES-CERTIFICATE-tab">
                           <div class="_card mt-3">
                              <div class="_card_header">
                                 <div class="title-head"><span style="font-weight: bold;">Q:</span>
                                    Medicare enrolled
                                 </div>
                              </div>
                              <div class="_card_body">
                                 <h1 class="_title"><span style="font-weight: bold;">Ans:</span> {{ (isset($data->professional->medicare_enrolled) && $data->professional->medicare_enrolled == 1) ? 'YES' : 'NO' }}
                                 </h1>
                                 <div class="row mt-3">
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div>
                                             <i class="las la-angle-double-right circle-icon"></i>
                                          </div>
                                          <div>
                                             <h3 class="_title">State</h3>
                                             <h1 class="_detail">{{ isset($data->professional->medicare_state->state) ? $data->professional->medicare_state->state : null }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div>
                                             <i class="las la-angle-double-right circle-icon"></i>
                                          </div>
                                          <div>
                                             <h3 class="_title">Medicare Number</h3>
                                             <h1 class="_detail">{{ isset($data->professional->medicare_number) ? $data->professional->medicare_number : null }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                    
                                 </div>
                              </div>
                           </div>
                           <div class="_card mt-3">
                              <div class="_card_header">
                                 <div class="title-head"><span style="font-weight: bold;">Q:</span>
                                    US Citizen
                                 </div>
                              </div>
                              <div class="_card_body">
                                 <h1 class="_title"><span style="font-weight: bold;">Ans:</span> No
                                 </h1>
                              </div>
                           </div>
                           <div class="_card mt-3">
                              <div class="_card_header">
                                 <div class="title-head"><span style="font-weight: bold;">Q:</span>
                                    Medicaid enrolled
                                 </div>
                              </div>
                              <div class="_card_body">
                                 <h1 class="_title"><span style="font-weight: bold;">Ans:</span> {{ (isset($data->professional->medicaid_enrolled) && $data->professional->medicaid_enrolled == 1) ? 'YES' : 'NO' }}
                                 </h1>
                                 <div class="row mt-3">
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div>
                                             <i class="las la-angle-double-right circle-icon"></i>
                                          </div>
                                          <div>
                                             <h3 class="_title">State</h3>
                                             <h1 class="_detail">{{ isset($data->professional->medicaid_state->state) ? $data->professional->medicaid_state->state : null }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div>
                                             <i class="las la-angle-double-right circle-icon"></i>
                                          </div>
                                          <div>
                                             <h3 class="_title">Medicaid Number</h3>
                                             <h1 class="_detail">{{ isset($data->professional->medicaid_number) ? $data->professional->medicaid_number : null }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                    
                                 </div>
                              </div>
                           </div>
                           <div class="_card mt-3">
                              <div class="_card_header">
                                 <div class="title-head">Age Ranges Treated
                                 </div>
                              </div>
                              <div class="_card_body">
                                 @isset($data->professional->age_ranges)
                                 @foreach($data->professional->age_ranges as $index => $ageRange)
                                 <h1 class="_title">{{ $ageRange->age_range_treated }}
                                 </h1>
                                 @endforeach
                                 @endisset
                              </div>
                           </div>
                           <div class="_card mt-3">
                              <div class="_card_header">
                                 <div class="title-head">State Licenses
                                 </div>
                              </div>
                              <div class="_card_body">
                                 @isset($data->professional->state_licenses)
                                 @foreach($data->professional->state_licenses as $index => $stateLicense)
                                 <div class="row">
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div>
                                             <i class="las la-angle-double-right circle-icon"></i>
                                          </div>
                                          <div>
                                             <h3 class="_title">State</h3>
                                             <h1 class="_detail">{{ $stateLicense->license_state->state }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div>
                                             <i class="las la-angle-double-right circle-icon"></i>
                                          </div>
                                          <div>
                                             <h3 class="_title">License Number</h3>
                                             <h1 class="_detail">{{ $stateLicense->license_number }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 @if(isset($data->professional->state_licenses[$index+1]))
                                 <br>
                                 @endif
                                 @endforeach
                                 @endisset
                              </div>
                           </div>
                           <div class="_card mt-3">
                              <div class="_card_header">
                                 <div class="title-head">Board Certifications
                                 </div>
                              </div>
                              <div class="_card_body">
                                 @isset($data->professional->board_certificates)
                                 @foreach($data->professional->board_certificates as $index => $boardCertificate)
                                 <div class="row">
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div>
                                             <i class="las la-angle-double-right circle-icon"></i>
                                          </div>
                                          <div>
                                             <h3 class="_title">Certifying Board</h3>
                                             <h1 class="_detail">{{ $boardCertificate->certifying_board }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div>
                                             <i class="las la-angle-double-right circle-icon"></i>
                                          </div>
                                          <div>
                                             <h3 class="_title">Status</h3>
                                             <h1 class="_detail">{{ $boardCertificate->status }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 @if(isset($data->professional->board_certificates[$index+1]))
                                 <br>
                                 @endif
                                 @endforeach
                                 @endisset
                              </div>
                           </div>
                           <div class="_card mt-3">
                              <div class="_card_header">
                                 <div class="title-head">Federal DEA ID
                                 </div>
                              </div>
                              <div class="_card_body">
                                 <h1 class="_title">{{ isset($data->professional->federal_dea_id) ? $data->professional->federal_dea_id : null }}
                                 </h1>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="WORKHISTORY" role="tabpanel" aria-labelledby="WORKHISTORY-tab">
                           <ul>
                              @isset($data->background)
                              @foreach($data->background as $index => $workHistory)
                              <li>
                                 <div class="_card mt-3">
                                    <div class="_card_header">
                                       <div class="title-head">COMPANY NAME {{ $index + 1 }}</div>
                                    </div>
                                    <div class="_card_body">
                                       <div class="row">
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center">
                                                <div>
                                                   <i class="las la-hospital circle-icon"></i>
                                                </div>
                                                <div>
                                                   <h3 class="_title">Company</h3>
                                                   <h1 class="_detail">{{ isset($workHistory->company_name) ? $workHistory->company_name : null }}</h1>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center">
                                                <div>
                                                   <i class="las la-angle-double-right circle-icon"></i>
                                                </div>
                                                <div>
                                                   <h3 class="_title">Position/Title</h3>
                                                   <h1 class="_detail">{{ isset($workHistory->position) ? $workHistory->position : null }}</h1>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center">
                                                <div>
                                                   <i class="las la-angle-double-right circle-icon circle-icon"></i>
                                                </div>
                                                <div>
                                                   <h3 class="_title">Reason for leaving</h3>
                                                   <h1 class="_detail">{{ isset($workHistory->work_gap_reason) ? $workHistory->work_gap_reason : null }}</h1>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row mt-3">
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center">
                                                <div>
                                                   <i class="las la-angle-double-right circle-icon"></i>
                                                </div>
                                                <div>
                                                   <h3 class="_title">Country</h3>
                                                   <h1 class="_detail">{{ isset($workHistory->country->name) ? $workHistory->country->name : null }}</h1>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center">
                                                <div>
                                                   <i class="las la-angle-double-right circle-icon"></i>
                                                </div>
                                                <div>
                                                   <h3 class="_title">City</h3>
                                                   <h1 class="_detail">{{ isset($workHistory->city->city) ? $workHistory->city->city : null }}</h1>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center">
                                                <div>
                                                   <i class="las la-angle-double-right circle-icon"></i>
                                                </div>
                                                <div>
                                                   <h3 class="_title">State</h3>
                                                   <h1 class="_detail">{{ isset($workHistory->state->state) ? $workHistory->state->state : null }}</h1>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row mt-3">
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center">
                                                <div>
                                                   <i class="las la-calendar circle-icon"></i>
                                                </div>
                                                <div>
                                                   <h3 class="_title">Start Date</h3>
                                                   <h1 class="_detail">{{ isset($workHistory->start_date) ? date('m-d-Y', strtotime($workHistory->start_date)) : null }}</h1>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center">
                                                <div>
                                                   <i class="las la-calendar circle-icon circle-icon"></i>
                                                </div>
                                                <div>
                                                   <h3 class="_title">End Date</h3>
                                                   <h1 class="_detail">{{ isset($workHistory->end_date) ? date('m-d-Y', strtotime($workHistory->end_date)) : null }}</h1>
                                                </div>
                                             </div>
                                          </div>
                                          
                                       </div>
                                    </div>
                                 </div>
                              </li>
                              @endforeach
                              @endisset
                        </div>
                        <div class="tab-pane fade" id="ATTESTATONS" role="tabpanel" aria-labelledby="ATTESTATONS-tab">
                           @isset($data->attestation)
                           @foreach($data->attestation as $index => $attestation)
                           @if($index == 0)
                           <div class="_card mt-3">
                              <div class="_card_header">
                                 <div class="title-head">
                                    Licensure
                                 </div>
                              </div>
                              <div class="_card_body">
                                 <h1 class="_title"><span style="font-weight: bold;">Q:</span> --- --- is simply dummy text of the printing and typesetting industry
                                 </h1>
                                 <h1 class="_title"><span style="font-weight: bold;">Ans:</span> {{ $attestation->statement ? 'YES' : 'NO' }}
                                 </h1>
                              </div>
                           </div>
                           @endif
                           @if($index == 1)
                           <div class="_card mt-3">
                              <div class="_card_header">
                                 <div class="title-head">
                                    Medicare, Medicaid and Other Government Program Participation
                                 </div>
                              </div>
                              <div class="_card_body">
                                 <h1 class="_title"><span style="font-weight: bold;">Q:</span> --- --- is simply dummy text of the printing and typesetting industry
                                 </h1>
                                 <h1 class="_title"><span style="font-weight: bold;">Ans:</span> {{ $attestation->statement ? 'YES' : 'NO' }}
                                 </h1>
                              </div>
                           </div>
                           @endif
                           @if($index == 2)
                           <div class="_card mt-3">
                              <div class="_card_header">
                                 <div class="title-head">
                                    Hospital Priviledges and Other Affiliations
                                 </div>
                              </div>
                              <div class="_card_body">
                                 <h1 class="_title"><span style="font-weight: bold;">Q:</span> --- --- is simply dummy text of the printing and typesetting industry
                                 </h1>
                                 <h1 class="_title"><span style="font-weight: bold;">Ans:</span> {{ $attestation->statement ? 'YES' : 'NO' }}
                                 </h1>
                              </div>
                           </div>
                           @endif
                           @if($index == 3)
                           <div class="_card mt-3">
                              <div class="_card_header">
                                 <div class="title-head">
                                    Other Sanctions or Investigations
                                 </div>
                              </div>
                              <div class="_card_body">
                                 <h1 class="_title"><span style="font-weight: bold;">Q:</span> --- --- is simply dummy text of the printing and typesetting industry
                                 </h1>
                                 <h1 class="_title"><span style="font-weight: bold;">Ans:</span> {{ $attestation->statement ? 'YES' : 'NO' }}
                                 </h1>
                              </div>
                           </div>
                           @endif
                           @if($index == 4)
                           <div class="_card mt-3">
                              <div class="_card_header">
                                 <div class="title-head">
                                    Criminal/Civil History
                                 </div>
                              </div>
                              <div class="_card_body">
                                 <h1 class="_title"><span style="font-weight: bold;">Q:</span> --- --- is simply dummy text of the printing and typesetting industry
                                 </h1>
                                 <h1 class="_title"><span style="font-weight: bold;">Ans:</span> {{ $attestation->statement ? 'YES' : 'NO' }}
                                 </h1>
                              </div>
                           </div>
                           @endif
                           @if($index == 5)
                           <div class="_card mt-3">
                              <div class="_card_header">
                                 <div class="title-head">
                                    Professional Liability Insurance Information and Claims History
                                 </div>
                              </div>
                              <div class="_card_body">
                                 <h1 class="_title"><span style="font-weight: bold;">Q:</span> --- --- is simply dummy text of the printing and typesetting industry
                                 </h1>
                                 <h1 class="_title"><span style="font-weight: bold;">Ans:</span> {{ $attestation->statement ? 'YES' : 'NO' }}
                                 </h1>
                              </div>
                           </div>
                           @endif
                           @if($index == 6)
                           <div class="_card mt-3">
                              <div class="_card_header">
                                 <div class="title-head">
                                    Ability to perfotm Job
                                 </div>
                              </div>
                              <div class="_card_body">
                                 <h1 class="_title"><span style="font-weight: bold;">Q:</span> --- --- is simply dummy text of the printing and typesetting industry
                                 </h1>
                                 <h1 class="_title"><span style="font-weight: bold;">Ans:</span> {{ $attestation->statement ? 'YES' : 'NO' }}
                                 </h1>
                              </div>
                           </div>
                           @endif
                           @if($index == 7)
                           <div class="_card mt-3">
                              <div class="_card_header">
                                 <div class="title-head">
                                    DEA or Controlled Substance Registartion
                                 </div>
                              </div>
                              <div class="_card_body">
                                 <h1 class="_title"><span style="font-weight: bold;">Q:</span> --- --- is simply dummy text of the printing and typesetting industry
                                 </h1>
                                 <h1 class="_title"><span style="font-weight: bold;">Ans:</span> {{ $attestation->statement ? 'YES' : 'NO' }}
                                 </h1>
                              </div>
                           </div>
                           @endif
                           @if($index == 8)
                           <div class="_card mt-3">
                              <div class="_card_header">
                                 <div class="title-head">
                                    Education, Training and Board Certification
                                 </div>
                              </div>
                              <div class="_card_body">
                                 <h1 class="_title"><span style="font-weight: bold;">Q:</span> --- --- is simply dummy text of the printing and typesetting industry
                                 </h1>
                                 <h1 class="_title"><span style="font-weight: bold;">Ans:</span> {{ $attestation->statement ? 'YES' : 'NO' }}
                                 </h1>
                              </div>
                           </div>
                           @endif
                           @if($index == 9 || $index == 10 || $index == 11)
                           <div class="_card mt-3">
                              <div class="_card_header">
                                 <div class="title-head">
                                    Additional Attestions 
                                 </div>
                              </div>
                              <div class="_card_body">
                                 <ul>
                                    @if($index == 9)
                                    <li class="pb-2">
                                          <h1 class="_title"><span style="font-weight: bold;">Q:</span> <span class="text-info">Appeal Rights:</span> I confirm I have read and understand my rights in the appeal process.
                                          </h1>
                                          <h1 class="_title"><span style="font-weight: bold;">Ans:</span> {{ $attestation->statement ? 'YES' : 'NO' }}
                                          </h1>
                                    </li>
                                    @endif
                                    @if($index == 10)
                                    <li class="pb-2">
                                       <h1 class="_title"><span style="font-weight: bold;">Q:</span> <span class="text-info">Credentialing Rights:</span> I confirm I have read and understand my rights in the Credentialing process.
                                       </h1>
                                       <h1 class="_title"><span style="font-weight: bold;">Ans:</span> {{ $attestation->statement ? 'YES' : 'NO' }}
                                       </h1>
                                    </li>
                                    @endif
                                    @if($index == 11)
                                    <li>
                                       <h1 class="_title"><span style="font-weight: bold;">Q:</span> Do you hold a controlling interest of 5% or greater of a jointly owned healthcare business?
                                       </h1>
                                       <h1 class="_title"><span style="font-weight: bold;">Ans:</span> {{ $attestation->statement ? 'YES' : 'NO' }}
                                       </h1>
                                    </li>
                                    @endif
                                 </ul>
                                 
                              </div>
                           </div>
                           @endif
                           @endforeach
                           @endisset
                        </div>
                        </div>
                     </div>
                  </div>
            </div>
            <!-- Professional Details End -->
            <!-- Deposit Details Start -->
            <div class="tab-pane fade" id="DepositDetails" role="tabpanel" aria-labelledby="v-pills-DepositDetails-tab">
               <div class="app-card" style="min-height: auto;">
                  <div class="card-header" id="step2">
                     <div class="d-flex align-items-center">
                        <img src="/assets/img/icons/deposit-clinician.svg" alt=""
                           srcset="/assets/img/icons/deposit-clinician.svg" class="_icon mr-2"></a>
                           Deposit Details
                     </div>
                  </div>
                  <div class="card-body collapse show" id="collapseWork" aria-labelledby="collapseWork"
                     data-parent="#profileAccordion">
                     <div class="row">
                        <div class="col-12 col-sm-12">
                           <div class="_card mt-3">
                              <div class="_card_header">
                                 <div class="title-head">DIRECT DEPOSIT INFORMATION FOR YOUR EARNINGS</div>
                              </div>
                              <div class="_card_body">
                                 <div class="row">
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div>
                                             <i class="las la-angle-double-right circle-icon"></i>
                                          </div>
                                          <div>
                                             <h3 class="_title">Name on account</h3>
                                             <h1 class="_detail">{{ isset($data->deposit->account_name) ? $data->deposit->account_name : null }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div>
                                             <i class="las la-angle-double-right circle-icon"></i>
                                          </div>
                                          <div>
                                             <h3 class="_title">Type of account</h3>
                                             <h1 class="_detail">{{ isset($data->deposit->account_type) ? $data->deposit->account_type : null }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row mt-3">
                                    <div class="col-12 col-sm-12">
                                       <div class="d-flex align-items-center">
                                          <div>
                                             <i class="las la-angle-double-right circle-icon"></i>
                                          </div>
                                          <div>
                                             <h3 class="_title">Rounting number <span class="text-info">(where to find this)</span></h3>
                                             <h1 class="_detail">{{ isset($data->deposit->routing_number) ? $data->deposit->routing_number : null }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row mt-3">
                                    <div class="col-12 col-sm-12">
                                       <div class="d-flex align-items-center">
                                          <div>
                                             <i class="las la-angle-double-right circle-icon"></i>
                                          </div>
                                          <div>
                                             <h3 class="_title">Account  number <span class="text-info">(where to find this)</span></h3>
                                             <h1 class="_detail">{{ isset($data->deposit->account_number) ? $data->deposit->account_number : null }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row mt-3">
                                    <div class="col-12 col-sm-12">
                                       <div class="d-flex align-items-center">
                                          <div>
                                             <i class="las la-map-marker circle-icon"></i>
                                          </div>
                                          <div>
                                             <h3 class="_title">Address on account line 1</h3>
                                             <h1 class="_detail">
                                                {{ isset($data->deposit->address_line_1) ? $data->deposit->address_line_1 : null }}
                                                <a class="btn btn-info btn-sm ml-2" data-toggle="collapse"
                                                   href="#collapseExample16"><i class="las la-map-marker"></i>View
                                                Map</a>
                                             </h1>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="collapse mt-4" id="collapseExample16">
                                    <div class="card card-body">
                                       <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%"
                                          height="200" frameborder="0" scrolling="no" marginheight="0"
                                          marginwidth="0"
                                          src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                    </div>
                                 </div>
                                 <div class="row mt-3">
                                    <div class="col-12 col-sm-12">
                                       <div class="d-flex align-items-center">
                                          <div>
                                             <i class="las la-map-marker circle-icon"></i>
                                          </div>
                                          <div>
                                             <h3 class="_title">Address on account line 2</h3>
                                             <h1 class="_detail">
                                                {{ isset($data->deposit->address_line_2) ? $data->deposit->address_line_2 : null }}
                                                <a class="btn btn-info btn-sm ml-2" data-toggle="collapse"
                                                   href="#collapseExample17"><i class="las la-map-marker"></i>View
                                                Map</a>
                                             </h1>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="collapse mt-4" id="collapseExample17">
                                    <div class="card card-body">
                                       <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%"
                                          height="200" frameborder="0" scrolling="no" marginheight="0"
                                          marginwidth="0"
                                          src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                    </div>
                                 </div>
                                 <div class="row mt-3">
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div>
                                             <i class="las la-angle-double-right circle-icon"></i>
                                          </div>
                                          <div>
                                             <h3 class="_title">City</h3>
                                             <h1 class="_detail">{{ isset($data->deposit->city->city) ? $data->deposit->city->city : null }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div>
                                             <i class="las la-angle-double-right circle-icon"></i>
                                          </div>
                                          <div>
                                             <h3 class="_title">State</h3>
                                             <h1 class="_detail">{{ isset($data->deposit->state->state) ? $data->deposit->state->state : null }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div>
                                             <i class="las la-angle-double-right circle-icon"></i>
                                          </div>
                                          <div>
                                             <h3 class="_title">Zip Code</h3>
                                             <h1 class="_detail">{{ isset($data->deposit->zip) ? $data->deposit->zip : null }}</h1>
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
            <!-- Deposit Details End -->
            <!-- BackgroundDetails Start -->
            <div class="tab-pane fade" id="BackgroundDetails" role="tabpanel" aria-labelledby="v-pills-BackgroundDetails-tab">
               <div class="app-card" style="min-height: auto;">
                  <div class="card-header" id="step2">
                     <div class="d-flex align-items-center">
                        <img src="/assets/img/icons/background-clinician.svg" alt=""
                           srcset="/assets/img/icons/background-clinician.svg" class="_icon mr-2"></a>
                           Background Details
                     </div>
                     <hr>
                  </div>
                  <div class="card-body collapse show" id="collapseWork" aria-labelledby="collapseWork"
                     data-parent="#profileAccordion">
                     <div class="_card">
                        <div class="_card_header">
                           <div class="title-head">TAX INFORMATION</div>
                        </div>
                        <div class="_card_body">
                           <div class="row">
                              <div class="col-12 col-sm-12">
                                 <div class="form-group">
                                    <div class="row">
                                       <div class="col-12 col-sm-4">
                                          <div>
                                             <div class="d-flex align-items-center">
                                                <div>
                                                   <i class="las la-angle-double-right circle-icon"></i>
                                                </div>
                                                <div>
                                                   <h3 class="_title">Send tax documents to</h3>
                                                   <h1 class="_detail">{{ isset($data->deposit->send_tax_documents_to) ? $data->deposit->send_tax_documents_to : null }}</h1>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-12 col-sm-4">
                                          <div class="d-flex align-items-center">
                                             <div>
                                                <i class="las la-phone circle-icon"></i>
                                             </div>
                                             <div>
                                                <h3 class="_title">Legal entity</h3>
                                                <h1 class="_detail">{{ isset($data->deposit->legal_entity) ? $data->deposit->legal_entity : null }}</h1>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div>
                                    <div class="row">
                                       <div class="col-12 col-sm-8">
                                          <div class="d-flex align-items-center ">
                                             <div>
                                                <i class="las la-angle-double-right circle-icon"></i>
                                             </div>
                                             <div>
                                                <h3 class="_title">Taxpayer identification Number</h3>
                                                <h1 class="_detail">{{ isset($data->deposit->tax_payer_id_number) ? $data->deposit->tax_payer_id_number : null }}</h1>
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
            <!-- BackgroundDetails End -->
            <!-- Verify Identity Start -->
            <div class="tab-pane fade" id="VerifyIdentity" role="tabpanel" aria-labelledby="v-pills-VerifyIdentity-tab">
               <div class="app-card" style="min-height: auto;">
                  <div class="card-header" id="step2">
                     <div class="d-flex align-items-center">
                        <img src="/assets/img/icons/identity-clinician.svg" alt=""
                           srcset="/assets/img/icons/identity-clinician.svg" class="_icon mr-2"></a>
                           Verify Identity
                     </div>
                     <hr>
                  </div>
                  <div class="card-body collapse show" id="collapseWork" aria-labelledby="collapseWork"
                     data-parent="#profileAccordion">
                     <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                           <a class="nav-link active" id="Details-tab" data-toggle="tab" href="#VERIFY-YOUR-IDENTITY" role="tab" aria-controls="Details" aria-selected="true">INFORMATION TO VERIFY YOUR IDENTITY</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" id="Address-tab" data-toggle="tab" href="#VERIFICATION-QUESTIONS" role="tab" aria-controls="Address" aria-selected="false">IDENTITY VERIFICATION QUESTIONS</a>
                        </li>
                        </ul>
                     <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="VERIFY-YOUR-IDENTITY" role="tabpanel" aria-labelledby="VERIFY-YOUR-IDENTITY-tab">
                           <ul>
                              <li>
                              <div class="_card mt-3">
                                 <div class="_card_header">
                                    <div class="title-head">INFORMATION TO VERIFY YOUR IDENTITY</div>
                                 </div>
                                 <div class="_card_body">
                                    <div class="row">
                                       <div class="col-12 col-sm-12">
                                          <div class="form-group">
                                             <div class="row">
                                                <div class="col-12 col-sm-4">
                                                   <div>
                                                      <div class="d-flex align-items-center">
                                                         <div>
                                                            <i class="las la-phone circle-icon"></i>
                                                         </div>
                                                         <div>
                                                            <h3 class="_title">Phone number</h3>
                                                            <h1 class="_detail">{{ isset($data->applicant->phone) ? $data->applicant->phone : null }}</h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div>
                                                         <i class="las la-angle-double-right circle-icon"></i>
                                                      </div>
                                                      <div>
                                                         <h3 class="_title">SSN</h3>
                                                         <h1 class="_detail">{{ isset($data->applicant->ssn) ? $data->applicant->ssn : null }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div>
                                                         <i class="las la-calendar circle-icon"></i>
                                                      </div>
                                                      <div>
                                                         <h3 class="_title">Date of Birth</h3>
                                                         <h1 class="_detail">{{ isset($data->dob) ? date('m-d-Y', strtotime($data->dob)) : null }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div>
                                             </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              </li>
                           </ul>
                        </div>
                        <div class="tab-pane fade" id="VERIFICATION-QUESTIONS" role="tabpanel" aria-labelledby="VERIFICATION-QUESTIONS-tab">
                           <ul>
                              <li>
                                 <div class="_card mt-3">
                                    <div class="_card_header">
                                       <div class="title-head"><span style="font-weight: bold;">Q:</span>
                                          In which city does Avron Shein live or own property?
                                       </div>
                                    </div>
                                    <div class="_card_body">
                                       <h1 class="_title"><span style="font-weight: bold;">Ans:</span> Phoenix
                                       </h1>
                                       </div>
                                 </div>
                                 <div class="_card mt-3">
                                    <div class="_card_header">
                                       <div class="title-head"><span style="font-weight: bold;">Q:</span>
                                          Which of the following is the street number of your recent previous address?
                                       </div>
                                    </div>
                                    <div class="_card_body">
                                       <h1 class="_title"><span style="font-weight: bold;">Ans:</span> 1109
                                       </h1>
                                       </div>
                                 </div>
                                 <div class="_card mt-3">
                                    <div class="_card_header">
                                       <div class="title-head"><span style="font-weight: bold;">Q:</span>
                                          Which of the following is the street name of your most recent previus address?
                                       </div>
                                    </div>
                                    <div class="_card_body">
                                       <h1 class="_title"><span style="font-weight: bold;">Ans:</span>Carriage way
                                       </h1>
                                       </div>
                                 </div>
                                 <div class="_card mt-3">
                                    <div class="_card_header">
                                       <div class="title-head"><span style="font-weight: bold;">Q:</span>
                                          Which year was your most recent mortage established?
                                       </div>
                                    </div>
                                    <div class="_card_body">
                                       <h1 class="_title"><span style="font-weight: bold;">Ans:</span> 1996
                                       </h1>
                                       </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                        </div>
                     </div>
               </div>
            </div>
            <!-- Verify Identity End -->
            <!--  Documents Verifiaction Start -->
            <div class="tab-pane fade" id="DocumentsVerifiaction" role="tabpanel" aria-labelledby="v-pills-DocumentsVerifiaction-tab">
               <div class="app-card" style="min-height: auto;">
                  <div class="card-header" id="step2">
                     <div class="d-flex align-items-center">
                        <img src="/assets/img/icons/document-clinician.svg" alt=""
                           srcset="/assets/img/icons/document-clinician.svg" class="_icon mr-2"></a>
                           Documents Verifiaction
                     </div>
                     <hr>
                  </div>
                  <div class="card-body collapse show" id="collapseWork" aria-labelledby="collapseWork"
                     data-parent="#profileAccordion">
                     <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                           <a class="nav-link active" id="Details-tab" data-toggle="tab" href="#IDProof" role="tab" aria-controls="IDProof" aria-selected="true">ID Proof</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" id="Address-tab" data-toggle="tab" href="#DegreeProof" role="tab" aria-controls="DegreeProof" aria-selected="false">Degree Proof</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" id="Address-tab" data-toggle="tab" href="#MedicalReport" role="tab" aria-controls="MedicalReport" aria-selected="false">Medical Report</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" id="Address-tab" data-toggle="tab" href="#InsuranceReports" role="tab" aria-controls="InsuranceReports" aria-selected="false">Insurance Reports</a>
                        </li>
                        </ul>
                     <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="IDProof" role="tabpanel" aria-labelledby="IDProof-tab">
                           <!-- View ID Proof button Start -->
                           <ul>
                              <!-- <li>
                              <button class="btn btn-primary file-upload mt-3 w-100" type="button">ID Proof.pdf</button>
                              </li>
                              <li>
                              <button class="btn btn-light file-view mt-3 w-100" type="button">ID Proof.pdf</button>
                              </li>
                              <li> -->
                                 @isset($data->documents)
                              @foreach($data->documents as $document)
                              @if($document->type == 1)
                              <div class="_card mt-3">
                                 <div class="_card_header">
                                    {{ $document->file_name }}
                                    <div>
                                       <a href="javascript:void(0)"><img src="/assets/img/icons/direct-download.svg" alt=""
                                       srcset="/assets/img/icons/direct-download.svg"
                                       class="_icon mr-2"></a>
                                    </div>
                                 </div>
                              </div>
                              @endif
                              @endforeach
                                 @endisset
                              </li>
                           </ul>
                              <!-- View ID Proof button End -->
                        </div>
                        <div class="tab-pane fade" id="DegreeProof" role="tabpanel" aria-labelledby="DegreeProof-tab">
                           <!-- View Degree Proof button Start -->
                           <ul>
                              <!-- <li>
                                 <button class="btn btn-primary file-upload mt-3 w-100" type="button">ID Proof.pdf</button>
                              </li>
                              <li>
                                 <button class="btn btn-light file-view mt-3 w-100" type="button">ID Proof.pdf</button>
                              </li> -->
                              <li>
                                 @isset($data->documents)
                                 @foreach($data->documents as $document)
                              @if($document->type == 2)
                              <div class="_card mt-3">
                                 <div class="_card_header">
                                    {{ $document->file_name }}
                                    <div>
                                       <a href="javascript:void(0)"><img src="/assets/img/icons/direct-download.svg" alt=""
                                       srcset="/assets/img/icons/direct-download.svg"
                                       class="_icon mr-2"></a>
                                    </div>
                                 </div>
                              </div>
                              @endif
                              @endforeach
                              @endisset
                              </li>
                              </ul>
                              <!-- View Degree Proof button End -->
                        </div>
                        <div class="tab-pane fade" id="MedicalReport" role="tabpanel" aria-labelledby="MedicalReport-tab">
                           <!-- View Medical Report button Start -->
                           <ul>
                           <!-- <li>
                              <button class="btn btn-primary file-upload mt-3 w-100" type="button">ID Proof.pdf</button>
                           </li>
                           <li>
                              <button class="btn btn-light file-view mt-3 w-100" type="button">ID Proof.pdf</button>
                           </li> -->
                           <li>
                              @isset($data->documents)
                           @foreach($data->documents as $document)
                           @if($document->type == 3)
                           <div class="_card mt-3">
                              <div class="_card_header">
                                 {{ $document->file_name }}
                                 <div>
                                    <a href="javascript:void(0)"><img src="/assets/img/icons/direct-download.svg" alt=""
                                    srcset="/assets/img/icons/direct-download.svg"
                                    class="_icon mr-2"></a>
                                 </div>
                              </div>
                           </div>
                           @endif
                           @endforeach
                           @endisset
                           </li>
                           </ul>
                           <!-- View Medical Report button End -->
                        </div>
                           <div class="tab-pane fade" id="InsuranceReports" role="tabpanel" aria-labelledby="InsuranceReports-tab">
                           <!-- View Insurance Reports button Start -->
                           <ul>
                              <!-- <li>
                                 <button class="btn btn-primary file-upload mt-3 w-100" type="button">ID Proof.pdf</button>
                              </li>
                              <li>
                                 <button class="btn btn-light file-view mt-3 w-100" type="button">ID Proof.pdf</button>
                              </li> -->
                              <li>
                                 @isset($data->documents)
                              @foreach($data->documents as $document)
                              @if($document->type == 4)
                              <div class="_card mt-3">
                                 <div class="_card_header">
                                    {{ $document->file_name }}
                                    <div>
                                       <a href="javascript:void(0)"><img src="/assets/img/icons/direct-download.svg" alt=""
                                       srcset="/assets/img/icons/direct-download.svg"
                                       class="_icon mr-2"></a>
                                    </div>
                                 </div>
                              </div>
                              @endif
                              @endforeach
                              @endisset
                              </li>
                              </ul>
                              <!-- View Insurance Reports button End -->
                           </div>
                        </div>
                     </div>
               </div>
            </div>
            <!--  Documents Verifiaction End -->
         </div>
      </section>
   </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/fonts/Montserrat.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/detail.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
@endpush

@push('scripts')
	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets/js/app.common.min.js') }}"></script>
    <script>
        
    </script>
@endpush
