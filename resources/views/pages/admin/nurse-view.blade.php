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
                        <img src="{{ isset($data->avatar_image) ? $data->avatar_image : null }}" alt="Welcome to Doral" srcset="{{ isset($data->avatar_image) ? $data->avatar_image : null }}"
                           class="img-fluid img-100">
                     </div>
                     <div>
                        <!-- <h1 class="patient-name mb-1">Mitchell C. Shay</h1> -->
                        <div class="d-flex justify-content-center">
                           <ul class="list-group">
                              @isset($data->first_name)
                              <li class="list-group-item name">{{ isset($data->first_name) ? $data->first_name.' '.$data->last_name : null }}</li>
                              @endisset
                              <li class="list-group-item">
                                 <span>{{ isset($data->gender_name) ? $data->gender_name : null }}</span>&nbsp;/&nbsp;
                                 <span>{{ isset($data->dob) ? date('m-d-Y', strtotime($data->dob)) : null }}</span>&nbsp;
                              </li>
                              @if(isset($data->background) && isset($data->phone))
                              <li class="list-group-item d-inherit">
                                 @php
                                    $key = null;
                                    if ($data->background) {
                                       end($data->background);
                                       $key = key($data->background);
                                    }
                                 @endphp
                                 @if(!empty($data->background))
                                 <span>{{ isset($data->background[$key]->position) ? $data->background[$key]->position : null }}</span>&nbsp;/&nbsp;
                                 @endif
                                 @isset($data->phone)
                                 <a href="tel:{{ isset($data->phone) ? $data->phone : null }}" class="text-body call-text d-flex align-items-center"><img src="/assets/img/icons/phone_green.svg" class="mr-1" alt=""> {{ isset($data->phone) ? $data->phone : null }}</a>
                                 @endisset
                              </li>
                              @endif
                              <li class="list-group-item"><span>{{ isset($data->email) ? $data->email : null }}</span></li>
<!--                              <li class="list-group-item"> 
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="TeleHealth">
                                    <label class="form-check-label" for="inlineCheckbox1">TeleHealth</label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="RoadL">
                                    <label class="form-check-label" for="inlineCheckbox2">RoadL</label>
                                 </div>
                              </li>-->
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
                           <li class="mb-2">
                              <a href="#SecurityDetails" data-toggle="pill" role="tab">
                              <img src="/assets/img/icons/education-clinician.svg" alt=""
                                 srcset="/assets/img/icons/education-clinician.svg" class="_icon mr-2">Security Details</a>
                           </li>
                           <li class="mb-2">
                              <a href="#MilitaryDetails" data-toggle="pill" role="tab">
                              <img src="/assets/img/icons/education-clinician.svg" alt=""
                                 srcset="/assets/img/icons/education-clinician.svg" class="_icon mr-2">Military Details</a>
                           </li>
                           <li class="mb-2"><a href="#ProfessionalDetails" data-toggle="pill" role="tab"><img
                              src="/assets/img/icons/professional-clinician.svg" alt=""
                              srcset="/assets/img/icons/professional-clinician.svg" class="_icon mr-2">Professional Details</a></li>
                           <li class="mb-2"><a href="#DepositDetails" data-toggle="pill" role="tab"><img
                              src="/assets/img/icons/deposit-clinician.svg" alt=""
                              srcset="/assets/img/icons/deposit-clinician.svg" class="_icon mr-2">Payroll Details</a></li>
<!--                           <li class="mb-2"><a href="#BackgroundDetails" data-toggle="pill" role="tab"><img
                              src="/assets/img/icons/background-clinician.svg" alt=""
                              srcset="/assets/img/icons/background-clinician.svg" class="_icon mr-2">Background Details</a>
                           </li>
                           <li class="mb-2"><a href="#VerifyIdentity" data-toggle="pill" role="tab"><img
                              src="/assets/img/icons/identity-clinician.svg" alt=""
                              srcset="/assets/img/icons/identity-clinician.svg" class="_icon mr-2">Verify Identity</a></li>-->
                           <li class="mb-2"><a href="#DocumentsVerifiaction" data-toggle="pill" role="tab"><img
                              src="/assets/img/icons/document-clinician.svg" alt=""
                              srcset="/assets/img/icons/document-clinician.svg" class="_icon mr-2">Documents Verifiaction</a></li>
                           </ul>
                     </div>
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
                                                   <h1 class="_detail">{{ isset($data->first_name) ? $data->first_name.' '.$data->last_name : null }}</h1>
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
                                                   <h3 class="_title">Home Phone</h3>
                                                   <h1 class="_detail">{{ isset($data->phone) ? $data->phone : null }}</h1>
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
                                                   <h3 class="_title">Email</h3>
                                                   <h1 class="_detail">{{ isset($data->email) ? $data->email : null }}</h1>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
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
                                                               {{ isset($data->applicant->address_detail->address->address1) ? $data->applicant->address_detail->address->address1 : null }}
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
                                                               {{ isset($data->applicant->address_detail->address->address2) ? $data->applicant->address_detail->address->address2 : null }}
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
                                                            <h1 class="_detail">{{ isset($data->applicant->address_detail->address->city) ? $data->applicant->address_detail->address->city : null }}</h1>
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
                                                            <h1 class="_detail">{{ isset($data->applicant->address_detail->address->state) ? $data->applicant->address_detail->address->state : null }}</h1>
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
                                                            <h1 class="_detail">{{ isset($data->applicant->address_detail->address->zipcode) ? $data->applicant->address_detail->address->zipcode : null }}</h1>
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
                                       @isset($data->applicant->reference_detail)
                                       @foreach($data->applicant->reference_detail as $index => $reference)
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
                                                            <h1 class="_detail">{{ isset($reference->name) ? $reference->name : null }}</h1>
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
                                                            <h1 class="_detail">{{ isset($reference->phoneNo) ? $reference->phoneNo : null }}</h1>
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
                                                            <h1 class="_detail">{{ isset($reference->relation) ? $reference->relation : null }}</h1>
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
                                                               {{ isset($reference->address_line_1) ? $reference->address_line_1 : null }}
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
                                             </div>
                                          </div>
                                       </li>
                                       @endforeach
                                       @endisset
                                    </ul>
                                 </div>
                                 <div class="tab-pane fade" id="Emergency" role="tabpanel" aria-labelledby="Emergency-tab">
                                    <ul>
                                       @isset($data->applicant->emergency_detail)
                                       @foreach($data->applicant->emergency_detail as $index => $emergency)
                                       <li>
                                          <div class="_card mt-3">
                                             <div class="_card_header">
                                                <div class="title-head">Emergency Detail {{ $index + 1 }}</div>
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
                                                            <h1 class="_detail">{{ isset($emergency->name) ? $emergency->name : null }}</h1>
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
                                                            <h1 class="_detail">{{ isset($emergency->phoneNo) ? $emergency->phoneNo : null }}</h1>
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
                                                            <h1 class="_detail">{{ isset($emergency->relation) ? $emergency->relation : null }}</h1>
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
                                                               {{ isset($emergency->address_line_1) ? $emergency->address_line_1 : null }}
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
                                             </div>
                                          </div>
                                       </li>
                                       @endforeach
                                       @endisset
                                    </ul>
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
                                 <img src="/assets/img/icons/applicant-clinician.svg" alt=""
                                    srcset="/assets/img/icons/applicant-clinician.svg" class="_icon mr-2"></a>
                                 Education Details
                              </div>
                           </div>
                              <div class="card-body collapse show mt-3" id="collapseWork" aria-labelledby="collapseWork"
                                 data-parent="#profileAccordion">
                                 <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="MEDICALINSTITUTE" role="tabpanel" aria-labelledby="MEDICALINSTITUTE-tab">
                                       <ul>
                                          @isset($data->applicant->education_detail)
                                          @foreach($data->applicant->education_detail as $index => $education)
                                          <li>
                                             <div class="_card mt-3">
                                                <div class="_card_header">
                                                   <div class="title-head">INSTITUTE {{ $index + 1 }}</div>
                                                </div>
                                                <div class="_card_body">
                                                   <div class="row">
                                                      <div class="col-12 col-sm-4">
                                                         <div class="d-flex align-items-center">
                                                            <div>
                                                               <i class="las la-angle-double-right circle-icon"></i>
                                                            </div>
                                                            <div>
                                                               <h3 class="_title">Degree</h3>
                                                               <h1 class="_detail">{{ isset($education->Degree) ? $education->Degree : null }}</h1>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="col-12 col-sm-4">
                                                         <div class="d-flex align-items-center">
                                                            <div>
                                                               <i class="las la-angle-double-right circle-icon"></i>
                                                            </div>
                                                            <div>
                                                               <h3 class="_title">Is Graduate?</h3>
                                                               <h1 class="_detail">{{ isset($education->isGraduate) ? $education->isGraduate : null }}</h1>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="col-12 col-sm-4">
                                                         <div class="d-flex align-items-center">
                                                            <div>
                                                               <i class="las la-angle-double-right circle-icon"></i>
                                                            </div>
                                                            <div>
                                                               <h3 class="_title">Year</h3>
                                                               <h1 class="_detail">{{ isset($education->year) ? $education->year : null }}</h1>
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
                                                                  {{ isset($education->address) ? $education->address : null }}
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
                                                 </div>
                                             </div>
                                          </li>
                                          @endforeach
                                          @endisset
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="SecurityDetails" role="tabpanel"  aria-labelledby="v-pills-EducationDetails-tab">
                           <div class="app-card" style="min-height: auto;">
                               <div class="card-header" id="step2">
                              <div class="d-flex align-items-center">
                                 <img src="/assets/img/icons/applicant-clinician.svg" alt=""
                                    srcset="/assets/img/icons/applicant-clinician.svg" class="_icon mr-2"></a>
                                 Security Details
                              </div>
                           </div>
                              <div class="card-body collapse show mt-3" id="collapseWork" aria-labelledby="collapseWork"
                                 data-parent="#profileAccordion">
                                 <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="MEDICALINSTITUTE" role="tabpanel" aria-labelledby="MEDICALINSTITUTE-tab">
                                       <ul>
                                          @isset($security_detail)
                                         
                                          <li>
                                             <div class="_card mt-3">
                                                <div class="_card_header">
                                                   <div class="title-head">Security {{ $index }}</div>
                                                </div>
                                                <div class="_card_body">
                                                   <div class="row">
                                                      <div class="col-12 col-sm-4">
                                                         <div class="d-flex align-items-center">
                                                            <div>
                                                               <i class="las la-angle-double-right circle-icon"></i>
                                                            </div>
                                                            <div>
                                                               <h3 class="_title">Have you ever been bonded?Bond</h3>
                                                               <h1 class="_detail">{{ isset($security_detail->bond) ? isBoolean($security_detail->bond) : null }}</h1>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      @if ($security_detail->bond == '1')
                                                         <div class="col-12 col-sm-4">
                                                            <div class="d-flex align-items-center">
                                                               <div>
                                                                  <i class="las la-angle-double-right circle-icon"></i>
                                                               </div>
                                                               <div>
                                                                  <h3 class="_title">If So, Exaplain</h3>
                                                                  <h1 class="_detail">{{ isset($security_detail->bond_explain) ? $security_detail->bond_explain : null }}</h1>
                                                               
                                                               </div>
                                                            </div>
                                                         </div>
                                                      @endif
                                                      <div class="col-12 col-sm-4">
                                                         <div class="d-flex align-items-center">
                                                            <div>
                                                               <i class="las la-angle-double-right circle-icon"></i>
                                                            </div>
                                                            <div>
                                                               <h3 class="_title">Have you been convicted of a falcony within the last 5 years?</h3>
                                                               <h1 class="_detail">{{ isset($security_detail->convict) ? isBoolean($security_detail->convict) : null }}</h1>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      @if ($security_detail->convict == '1')
                                                         <div class="col-12 col-sm-4">
                                                            <div class="d-flex align-items-center">
                                                               <div>
                                                                  <i class="las la-angle-double-right circle-icon"></i>
                                                               </div>
                                                               <div>
                                                                  <h3 class="_title">If so, exaplain(this will not necessarily exclude you from consideration)</h3>
                                                                  <h1 class="_detail">{{ isset($security_detail->convict_explain) ? $security_detail->convict_explain : null }}</h1>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      @endif
                                                   </div>
                                                </div>
                                             </div>
                                          </li>
                                          @endisset
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="MilitaryDetails" role="tabpanel"  aria-labelledby="v-pills-EducationDetails-tab">
                           <div class="app-card" style="min-height: auto;">
                               <div class="card-header" id="step2">
                              <div class="d-flex align-items-center">
                                 <img src="/assets/img/icons/applicant-clinician.svg" alt=""
                                    srcset="/assets/img/icons/applicant-clinician.svg" class="_icon mr-2"></a>
                                 Military Details
                              </div>
                           </div>
                              <div class="card-body collapse show mt-3" id="collapseWork" aria-labelledby="collapseWork"
                                 data-parent="#profileAccordion">
                                 <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="MEDICALINSTITUTE" role="tabpanel" aria-labelledby="MEDICALINSTITUTE-tab">
                                       <ul>
                                          <li>
                                             <div class="_card mt-3">
                                                <div class="_card_header">
                                                   <div class="title-head">Military Detail</div>
                                                </div>
                                                <div class="_card_body">
                                                   <div class="row">
                                                      <div class="col-12 col-sm-4">
                                                         <div class="d-flex align-items-center">
                                                            <div>
                                                               <i class="las la-angle-double-right circle-icon"></i>
                                                            </div>
                                                            <div>
                                                               <h3 class="_title">Branch</h3>
                                                               <h1 class="_detail">{{ isset($data->applicant->military_detail->branch) ? $data->applicant->military_detail->branch : null }}</h1>
                                                               </div>
                                                         </div>
                                                      </div>
                                                      <div class="col-12 col-sm-4">
                                                         <div class="d-flex align-items-center">
                                                            <div>
                                                               <i class="las la-angle-double-right circle-icon"></i>
                                                            </div>
                                                            <div>
                                                               <h3 class="_title">Is Vietnam?</h3>
                                                               <h1 class="_detail">{{ isset($data->applicant->military_detail->isVietnam) ? $data->applicant->military_detail->isVietnam : null }}</h1>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="col-12 col-sm-4">
                                                         <div class="d-flex align-items-center">
                                                            <div>
                                                               <i class="las la-angle-double-right circle-icon"></i>
                                                            </div>
                                                            <div>
                                                               <h3 class="_title">Is Cimmited?</h3>
                                                               <h1 class="_detail">{{ isset($data->applicant->military_detail->isCommited) ? $data->applicant->military_detail->isCommited : null }}</h1>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-12 col-sm-4">
                                                         <div class="d-flex align-items-center">
                                                            <div>
                                                               <i class="las la-angle-double-right circle-icon"></i>
                                                            </div>
                                                            <div>
                                                               <h3 class="_title">Is Military?</h3>
                                                               <h1 class="_detail">{{ isset($data->applicant->military_detail->isMilitary) ? $data->applicant->military_detail->isMilitary : null }}</h1>
                                                               </div>
                                                         </div>
                                                      </div>
                                                      <div class="col-12 col-sm-4">
                                                         <div class="d-flex align-items-center">
                                                            <div>
                                                               <i class="las la-angle-double-right circle-icon"></i>
                                                            </div>
                                                            <div>
                                                               <h3 class="_title">Start Server Date</h3>
                                                               <h1 class="_detail">{{ isset($data->applicant->military_detail->serve_start_date) ? $data->applicant->military_detail->serve_start_date : null }}</h1>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="col-12 col-sm-4">
                                                         <div class="d-flex align-items-center">
                                                            <div>
                                                               <i class="las la-angle-double-right circle-icon"></i>
                                                            </div>
                                                            <div>
                                                               <h3 class="_title">Is Disable Vetran?</h3>
                                                               <h1 class="_detail">{{ isset($data->applicant->military_detail->isDisableVetran) ? $data->applicant->military_detail->isDisableVetran : null }}</h1>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-12 col-sm-4">
                                                         <div class="d-flex align-items-center">
                                                            <div>
                                                               <i class="las la-angle-double-right circle-icon"></i>
                                                            </div>
                                                            <div>
                                                               <h3 class="_title">Is Commited Explain?</h3>
                                                               <h1 class="_detail">{{ isset($data->applicant->military_detail->isCommited_explain) ? $data->applicant->military_detail->isCommited_explain : null }}</h1>
                                                               </div>
                                                         </div>
                                                      </div>
                                                      <div class="col-12 col-sm-4">
                                                         <div class="d-flex align-items-center">
                                                            <div>
                                                               <i class="las la-angle-double-right circle-icon"></i>
                                                            </div>
                                                            <div>
                                                               <h3 class="_title">Is Special Disable Vereram?</h3>
                                                               <h1 class="_detail">{{ isset($data->applicant->military_detail->isSpecialDisableVereran) ? $data->applicant->military_detail->isSpecialDisableVereran : null }}</h1>
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
                                 <img src="/assets/img/icons/applicant-clinician.svg" alt=""
                                    srcset="/assets/img/icons/applicant-clinician.svg" class="_icon mr-2"></a>
                                 Professional Details
                              </div>
                           </div>
                              <div class="card-body collapse show mt-3" id="collapseWork" aria-labelledby="collapseWork"
                                 data-parent="#profileAccordion">
                                 <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="MEDICALINSTITUTE" role="tabpanel" aria-labelledby="MEDICALINSTITUTE-tab">
                                       <ul>
                                           <?php
//                                           echo "<pre>";
//                                           print_r($data->applicant->employer_detail);
//                                           exit();
                                           ?>
                                          @isset($data->applicant->employer_detail)
                                          @foreach($data->applicant->employer_detail->employer as $index => $employer)
                                          <li>
                                             <div class="_card mt-3">
                                                <div class="_card_header">
                                                   <div class="title-head">Company {{ $index + 1 }}</div>
                                                </div>
                                                <div class="_card_body">
                                                   <div class="row">
                                                      <div class="col-12 col-sm-4">
                                                         <div class="d-flex align-items-center">
                                                            <div>
                                                               <i class="las la-angle-double-right circle-icon"></i>
                                                            </div>
                                                            <div>
                                                               <h3 class="_title">Company</h3>
                                                               <h1 class="_detail">{{ isset($employer->company) ? $employer->company : null }}</h1>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="col-12 col-sm-4">
                                                         <div class="d-flex align-items-center">
                                                            <div>
                                                               <i class="las la-angle-double-right circle-icon"></i>
                                                            </div>
                                                            <div>
                                                               <h3 class="_title">Phone Number</h3>
                                                               <h1 class="_detail">{{ isset($employer->phoneNo) ? $employer->phoneNo : null }}</h1>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="col-12 col-sm-4">
                                                         <div class="d-flex align-items-center">
                                                            <div>
                                                               <i class="las la-angle-double-right circle-icon"></i>
                                                            </div>
                                                            <div>
                                                               <h3 class="_title">Supervisor</h3>
                                                               <h1 class="_detail">{{ isset($employer->supervisor) ? $employer->supervisor : null }}</h1>
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
                                                                  {{ isset($employer->address) ? $employer->address : null }}
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
                                                 </div>
                                             </div>
                                          </li>
                                          @endforeach
                                          @endisset
                                       </ul>
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
                                       Payroll Details
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
                                                         <h1 class="_detail">{{ isset($data->applicant->payroll_details->nameOfAccount) ? $data->applicant->payroll_details->nameOfAccount : null }}</h1>
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
                                                         <h1 class="_detail">{{ isset($data->applicant->payroll_details->typeOfAccount) ? $data->applicant->payroll_details->typeOfAccount : null }}</h1>
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
                                                         <h3 class="_title">Rounting number <span class="text-info"></span></h3>
                                                         <h1 class="_detail">{{ isset($data->applicant->payroll_details->routingNumber) ? $data->applicant->payroll_details->routingNumber : null }}</h1>
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
                                                         <h3 class="_title">Account  number <span class="text-info"></span></h3>
                                                         <h1 class="_detail">{{ isset($data->applicant->payroll_details->accountNumber) ? $data->applicant->payroll_details->accountNumber : null }}</h1>
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
