@extends('pages.layouts.app')
@section('title','Clinician Details')
@section('pageTitleSection')
    Clinician Details
@endsection
@push('styles')
<style>
.table_doc { 
    border-spacing: 10px;
    border-collapse: separate;
}
</style>
@endpush
@section('pageTitleSection')
    Clinician Details
@endsection
@php
$count1 = $count5 = $count6 = $count7 = $count8 = $count9 = $count10 = $count11 = $count12 = $count13 = $count14 = $count15 = $count16 = $count17= $count18 = $count19 = $count20 = $count21 = 1;
@endphp
@foreach($data->documents as $document)
@if($document->type == 1)
   @php $type1 = $count1++;  @endphp
@elseif($document->type == 5)
   @php $type5 = $count5++; @endphp
@elseif($document->type == 6)
   @php $type6 = $count6++; @endphp
@elseif($document->type == 7)
   @php $type7 = $count7++;@endphp
@elseif($document->type == 8)
   @php $type8 = $count8++;@endphp
@elseif($document->type == 9)
   @php $type9 = $count9++;@endphp
@elseif($document->type == 10)
   @php $type10 = $count10++;   @endphp  
@elseif($document->type == 11)
   @php $type11 = $count11++;@endphp
@elseif($document->type == 12)
   @php $type12 = $count12++;@endphp
@elseif($document->type == 13)
   @php $type13 = $count13++; @endphp
@elseif($document->type == 14)
   @php $type14 = $count14++;@endphp
@elseif($document->type == 15)
   @php $type15 = $count15++;@endphp
@elseif($document->type == 16)
   @php $type16 = $count16++; @endphp
@elseif($document->type == 17)
   @php $type17 = $count17++; @endphp
@elseif($document->type == 18)
   @php $type18 = $count18++; @endphp
   @elseif($document->type == 19)
   @php $type19 = $count19++; @endphp
@elseif($document->type == 20)
   @php $type20 = $count20++; @endphp
@elseif($document->type == 21)
   @php $type21 = $count21++; @endphp
@endif
@endforeach

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
                                 <li class="nav-item">
                                    <a class="nav-link" id="notification-tab" data-toggle="tab" href="#notification" role="tab" aria-controls="notification" aria-selected="false">Send Notification</a>
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
                                 <div class="tab-pane fade" id="notification" role="tabpanel" aria-labelledby="notification-tab">
                                    <ul>
                                       <li>
                                          <button type="button" class="btn btn-outline-green d-flex align-items-center send_notification" data-id="{{ $data->id }}"><i class="las la-binoculars la-2x mr-2"></i> Send Notification</button>
                                       </li>
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
                                                   <div class="title-head">Security</div>
                                                </div>
                                                <div class="_card_body">
                                                   <div class="row mt-3">
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
                                                      @if (isset($security_detail->bond) && $security_detail->bond == '1')
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
                                                   <div class="row mt-3">
                                                      @if (isset($security_detail->convict) && $security_detail->convict == '1')
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
                                    <img src="/assets/img/icons/document-clinician.svg" alt="" srcset="/assets/img/icons/document-clinician.svg" class="_icon mr-2"></a>Documents Verifiaction
                                 </div>
                                 <hr>
                              </div>
                              <div class="card-body collapse show" id="collapseWork" aria-labelledby="collapseWork"
                                 data-parent="#profileAccordion">
                                 <table class="table_doc" cellspacing="15">
  <tbody>
    <tr>
      <td>1</td>
      <td>
      <a class="nav-link active view_document" data-id="{{ $data->id }}" data-type="1"  id="Details-tab" data-toggle="tab" href="#IDProof" role="tab" aria-controls="IDProof" aria-selected="true">ID Proof {{isset($type1)  ? '('.$type1.')' : ''}}</a>
      </td>
      <td>
      @isset($data->documents)
      <table><tr>
          @php
             $type = '';
          @endphp
          @foreach($data->documents as $document)
             @if($document->type == 1)
                @php $type = $document->type; @endphp
                <td>
                <button type="button" class="btn btn-outline-green d-flex align-items-center btn-sm ml-1"  name=""><i class="las la-binoculars sm-2x mr-2"></i><a href="{{$document->file_url}}" target="_blank"> View Documents</a></button>
                </td>
          @endif
          @endforeach
          </tr> 
      </table> 
      @endisset
      </td>
    </tr>
    <tr>
      <td>2</td>
      <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="5" id="socialSecurity-tab" data-toggle="tab" href="#socialSecurity" role="tab" aria-controls="socialSecurity" aria-selected="true">Social Security {{isset($type5)  ? '('.$type5.')' : ''}}</a>
      </td>
      <td>
      @isset($data->documents)
      <table><tr>
          @php
             $type = '';
          @endphp
          @foreach($data->documents as $document)
             @if($document->type == 5)
                @php $type = $document->type; @endphp
                <td>
                <button type="button" class="btn btn-outline-green d-flex align-items-center btn-sm ml-1"  name=""><i class="las la-binoculars sm-2x mr-2"></i><a href="{{$document->file_url}}" target="_blank"> View Documents</a></button>
                </td>
          @endif
          @endforeach
          </tr> 
      </table> 
      @endisset
      </td>
    </tr>
    <tr>
      <td>3</td>
      <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="6" id="professionalReferrance-tab" data-toggle="tab" href="#professionalReferrance" role="tab" aria-controls="professionalReferrance" aria-selected="false">Professional Referrance {{isset($type6)  ? '('.$type6.')' : ''}}</a>
      </td>
      <td>
     @isset($data->documents)
      <table><tr>
          @php
             $type = '';
          @endphp
          @foreach($data->documents as $document)
             @if($document->type == 6)
                @php $type = $document->type; @endphp
                <td>
                <button type="button" class="btn btn-outline-green d-flex align-items-center btn-sm ml-1"  name=""><i class="las la-binoculars sm-2x mr-2"></i><a href="{{$document->file_url}}" target="_blank"> View Documents</a></button>
                </td>
          @endif
          @endforeach
          </tr> 
      </table> 
      @endisset
      </td>
    </tr>
    <tr>
      <td>4</td>
      <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="7" id="mainPracticeInsurance-tab" data-toggle="tab" href="#mainPracticeInsurance" role="tab" aria-controls="mainPracticeInsurance" aria-selected="false">Main Practice Insurance {{isset($type7)  ? '('.$type7.')' : ''}}</a>
      </td>
      <td>
      @isset($data->documents)
      <table><tr>
          @php
             $type = '';
          @endphp
          @foreach($data->documents as $document)
             @if($document->type == 7)
                @php $type = $document->type; @endphp
                <td>
                <button type="button" class="btn btn-outline-green d-flex align-items-center btn-sm ml-1"  name=""><i class="las la-binoculars sm-2x mr-2"></i><a href="{{$document->file_url}}" target="_blank"> View Documents</a></button>
                </td>
          @endif
          @endforeach
          </tr> 
      </table> 
      @endisset
      </td>
    </tr>
    <tr>
      <td>5</td>
      <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="8" id="nycNurseCertificate-tab" data-toggle="tab" href="#nycNurseCertificate" role="tab" aria-controls="nycNurseCertificate" aria-selected="false">Nyc Nurse Certificate {{isset($type8)  ? '('.$type8.')' : ''}}</a>
      </td>
      <td>
      @isset($data->documents)
      <table><tr>
          @php
             $type = '';
          @endphp
          @foreach($data->documents as $document)
             @if($document->type == 8)
                @php $type = $document->type; @endphp
                <td>
                <button type="button" class="btn btn-outline-green d-flex align-items-center btn-sm ml-1"  name=""><i class="las la-binoculars sm-2x mr-2"></i><a href="{{$document->file_url}}" target="_blank"> View Documents</a></button>
                </td>
          @endif
          @endforeach
          </tr> 
      </table> 
      @endisset
      </td>
    </tr>
    <tr>
      <td>6</td>
      <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="9" id="CPR-tab" data-toggle="tab" href="#CPR" role="tab" aria-controls="CPR" aria-selected="false">CPR {{isset($type9)  ? '('.$type9.')' : ''}}</a>
      </td>
      <td>
      @isset($data->documents)
      <table><tr>
          @php
             $type = '';
          @endphp
          @foreach($data->documents as $document)
             @if($document->type == 9)
                @php $type = $document->type; @endphp
                <td>
                <button type="button" class="btn btn-outline-green d-flex align-items-center btn-sm ml-1"  name=""><i class="las la-binoculars sm-2x mr-2"></i><a href="{{$document->file_url}}" target="_blank"> View Documents</a></button>
                </td>
          @endif
          @endforeach
          </tr> 
      </table> 
      @endisset
      </td>
    </tr>
    <tr>
      <td>7</td>
      <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="10" id="physical-tab" data-toggle="tab" href="#physical" role="tab" aria-controls="physical" aria-selected="false">Physical {{isset($type10)  ? '('.$type10.')' : ''}}</a>
      </td>
      <td>
     @isset($data->documents)
      <table><tr>
          @php
             $type = '';
          @endphp
          @foreach($data->documents as $document)
             @if($document->type == 10)
                @php $type = $document->type; @endphp
                <td>
                <button type="button" class="btn btn-outline-green d-flex align-items-center btn-sm ml-1"  name=""><i class="las la-binoculars sm-2x mr-2"></i><a href="{{$document->file_url}}" target="_blank"> View Documents</a></button>
                </td>
          @endif
          @endforeach
          </tr> 
      </table> 
      @endisset
      </td>
    </tr>
    <tr>
      <td>8</td>
      <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="11" id="forensicDrugScreen-tab" data-toggle="tab" href="#forensicDrugScreen" role="tab" aria-controls="forensicDrugScreen" aria-selected="false">Forensic Drug Screen {{isset($type11)  ? '('.$type11.')' : ''}}</a>
      </td>
      <td>
      @isset($data->documents)
      <table><tr>
          @php
             $type = '';
          @endphp
          @foreach($data->documents as $document)
             @if($document->type == 11)
                @php $type = $document->type; @endphp
                <td>
                <button type="button" class="btn btn-outline-green d-flex align-items-center btn-sm ml-1"  name=""><i class="las la-binoculars sm-2x mr-2"></i><a href="{{$document->file_url}}" target="_blank"> View Documents</a></button>
                </td>
          @endif
          @endforeach
          </tr> 
      </table> 
      @endisset
      </td>
    </tr>
    <tr>
      <td>9</td>
      <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="12" id="RubellaImmunization-tab" data-toggle="tab" href="#RubellaImmunization" role="tab" aria-controls="RubellaImmunization" aria-selected="false">Rubella Immunization {{isset($type12)  ? '('.$type12.')' : ''}}</a>
      </td>
      <td>
     @isset($data->documents)
      <table><tr>
          @php
             $type = '';
          @endphp
          @foreach($data->documents as $document)
             @if($document->type == 12)
                @php $type = $document->type; @endphp
                <td>
                <button type="button" class="btn btn-outline-green d-flex align-items-center btn-sm ml-1"  name=""><i class="las la-binoculars sm-2x mr-2"></i><a href="{{$document->file_url}}" target="_blank"> View Documents</a></button>
                </td>
          @endif
          @endforeach
          </tr> 
      </table> 
      @endisset
      </td>
    </tr>
    <tr>
      <td>10</td>
      <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="13" id="RubellaMeasiesImmunization-tab" data-toggle="tab" href="#RubellaMeasiesImmunization" role="tab" aria-controls="RubellaMeasiesImmunization" aria-selected="false">Rubella Measies Immunization {{isset($type13)  ? '('.$type13.')' : ''}}</a>
      </td>
      <td>
      @isset($data->documents)
      <table><tr>
          @php
             $type = '';
          @endphp
          @foreach($data->documents as $document)
             @if($document->type == 13)
                @php $type = $document->type; @endphp
                <td>
                <button type="button" class="btn btn-outline-green d-flex align-items-center btn-sm ml-1"  name=""><i class="las la-binoculars sm-2x mr-2"></i><a href="{{$document->file_url}}" target="_blank"> View Documents</a></button>
                </td>
          @endif
          @endforeach
          </tr> 
      </table> 
      @endisset
      </td>
    </tr>
    <tr>
      <td>11</td>
      <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="14" id="MalpracticeInsurance-tab" data-toggle="tab" href="#MalpracticeInsurance" role="tab" aria-controls="MalpracticeInsurance" aria-selected="false">Malpractice Insurance {{isset($type14)  ? '('.$type14.')' : ''}}</a>
      </td>
      <td>
      @isset($data->documents)
      <table><tr>
          @php
             $type = '';
          @endphp
          @foreach($data->documents as $document)
             @if($document->type == 14)
                @php $type = $document->type; @endphp
                <td>
                <button type="button" class="btn btn-outline-green d-flex align-items-center btn-sm ml-1"  name=""><i class="las la-binoculars sm-2x mr-2"></i><a href="{{$document->file_url}}" target="_blank"> View Documents</a></button>
                </td>
          @endif
          @endforeach
          </tr> 
      </table> 
      @endisset
      </td>
    </tr>
    <tr>
      <td>12</td>
      <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="15" id="Flu-tab" data-toggle="tab" href="#Flu" role="tab" aria-controls="Flu" aria-selected="false">Flu {{isset($type15)  ? '('.$type15.')' : ''}}</a>
      </td>
      <td>
      @isset($data->documents)
      <table><tr>
          @php
             $type = '';
          @endphp
          @foreach($data->documents as $document)
             @if($document->type == 15)
                @php $type = $document->type; @endphp
                <td>
                <button type="button" class="btn btn-outline-green d-flex align-items-center btn-sm ml-1"  name=""><i class="las la-binoculars sm-2x mr-2"></i><a href="{{$document->file_url}}" target="_blank"> View Documents</a></button>
                </td>
          @endif
          @endforeach
          </tr> 
      </table> 
      @endisset
      </td>
    </tr>
    <tr>
      <td>13</td>
      <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="16" id="AnnualPPD-tab" data-toggle="tab" href="#AnnualPPD" role="tab" aria-controls="AnnualPPD" aria-selected="false">Annual PPD {{isset($type16)  ? '('.$type16.')' : ''}}</a>
      </td>
      <td>
     @isset($data->documents)
      <table><tr>
          @php
             $type = '';
          @endphp
          @foreach($data->documents as $document)
             @if($document->type == 16)
                @php $type = $document->type; @endphp
                <td>
                <button type="button" class="btn btn-outline-green d-flex align-items-center btn-sm ml-1"  name=""><i class="las la-binoculars sm-2x mr-2"></i><a href="{{$document->file_url}}" target="_blank"> View Documents</a></button>
                </td>
          @endif
          @endforeach
          </tr> 
      </table> 
      @endisset
      </td>
    </tr>
    <tr>
      <td>14</td>
      <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="17" id="ChestXRay-tab" data-toggle="tab" href="#ChestXRay" role="tab" aria-controls="ChestXRay" aria-selected="false">Chest X-Ray {{isset($type17)  ? '('.$type17.')' : ''}}</a>
      </td>
      <td>
      @isset($data->documents)
      <table><tr>
          @php
             $type = '';
          @endphp
          @foreach($data->documents as $document)
             @if($document->type == 17)
                @php $type = $document->type; @endphp
                <td>
                <button type="button" class="btn btn-outline-green d-flex align-items-center btn-sm ml-1"  name=""><i class="las la-binoculars sm-2x mr-2"></i><a href="{{$document->file_url}}" target="_blank"> View Documents</a></button>
                </td>
          @endif
          @endforeach
          </tr> 
      </table> 
      @endisset
      </td>
    </tr>
    <tr>
      <td>15</td>
      <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="18" id="AnnualTubeScreening-tab" data-toggle="tab" href="#AnnualTubeScreening" role="tab" aria-controls="AnnualTubeScreening" aria-selected="false">Annual Tube Screening {{isset($type18)  ? '('.$type18.')' : ''}}</a>
      </td>
      <td>
      @isset($data->documents)
      <table><tr>
          @php
             $type = '';
          @endphp
          @foreach($data->documents as $document)
             @if($document->type == 18)
                @php $type = $document->type; @endphp
                <td>
                <button type="button" class="btn btn-outline-green d-flex align-items-center btn-sm ml-1"  name=""><i class="las la-binoculars sm-2x mr-2"></i><a href="{{$document->file_url}}" target="_blank"> View Documents</a></button>
                </td>
          @endif
          @endforeach
          </tr> 
          
      </table> 
      @endisset
      </td>
    </tr>
     <tr>
      <td>16</td>
      <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="19" id="w4document-tab" data-toggle="tab" href="#w4document" role="tab" aria-controls="w4document" aria-selected="false">w4document {{isset($type19)  ? '('.$type19.')' : ''}}</a>
      </td>
      <td>
      @isset($data->documents)
      <table><tr>
          @php
             $type = '';
          @endphp
          @foreach($data->documents as $document)
             @if($document->type == 19)
                @php $type = $document->type; @endphp
                <td>
                <button type="button" class="btn btn-outline-green d-flex align-items-center btn-sm ml-1"  name=""><i class="las la-binoculars sm-2x mr-2"></i><a href="{{$document->file_url}}" target="_blank"> View Documents</a></button>
                </td>
          @endif
          @endforeach
          </tr> 
          
      </table> 
      @endisset
      </td>
    </tr>
     <tr>
      <td>17</td>
      <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="20" id="idProofBack-tab" data-toggle="tab" href="#idProofBack" role="tab" aria-controls="idProofBack" aria-selected="false">Id Proof Back {{isset($type20)  ? '('.$type20.')' : ''}}</a>
      </td>
      <td>
      @isset($data->documents)
      <table><tr>
          @php
             $type = '';
          @endphp
          @foreach($data->documents as $document)
             @if($document->type == 20)
                @php $type = $document->type; @endphp
                <td>
                <button type="button" class="btn btn-outline-green d-flex align-items-center btn-sm ml-1"  name=""><i class="las la-binoculars sm-2x mr-2"></i><a href="{{$document->file_url}}" target="_blank"> View Documents</a></button>
                </td>
          @endif
          @endforeach
          </tr> 
          
      </table> 
      @endisset
      </td>
    </tr>
     <tr>
      <td>18</td>
      <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="21" id="socialSecurityBack-tab" data-toggle="tab" href="#socialSecurityBack" role="tab" aria-controls="socialSecurityBack" aria-selected="false">Social Security Back {{isset($type21)  ? '('.$type21.')' : ''}}</a>
      </td>
      <td>
      @isset($data->documents)
      <table><tr>
          @php
             $type = '';
          @endphp
          @foreach($data->documents as $document)
             @if($document->type == 21)
                @php $type = $document->type; @endphp
                <td>
                <button type="button" class="btn btn-outline-green d-flex align-items-center btn-sm ml-1"  name=""><i class="las la-binoculars sm-2x mr-2"></i><a href="{{$document->file_url}}" target="_blank"> View Documents</a></button>
                </td>
          @endif
          @endforeach
          </tr> 
          
      </table> 
      @endisset
      </td>
    </tr>
  </tbody>
</table>

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
    <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet" />
@endpush

@push('scripts')
	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets/js/app.common.min.js') }}"></script>
    <script src="{{ asset('js/dropzone.js') }}"></script>
    <script>
         /*Open message in model */
         $("body").on('click','.view_document',function () {
        
            var user_id = $(this).attr('data-id');
            var type_id = $(this).attr('data-type');
         
            var url = '{{route("clinician.getDocument")}}';
            
            $.ajax({
               url : url,
               type: 'POST',
               data: {
                  user_id: user_id,
                  type_id: type_id,
               },
               headers: {
                     'X_CSRF_TOKEN':'{{ csrf_token() }}',
               },  
               success:function(data, textStatus, jqXHR){
               
                  $(".messageViewModel").html(data);
                  $(".messageViewModel").modal('show');

               },
               error: function(jqXHR, textStatus, errorThrown){
               alert('error');
                  
               }
            });
         });
        
         /*Open message in model */
         $("body").on('click','.send_notification',function () {
        
            var user_id = $(this).attr('data-id');
            var url = '{{route("notification.send")}}';
            
            $.ajax({
               url : url,
               type: 'POST',
               data: {
                  user_id: user_id,
               },
               headers: {
                  'X_CSRF_TOKEN':'{{ csrf_token() }}',
               },  
               success:function(data, textStatus, jqXHR){
                  if(data.status == 400) {
                     alertText(data.message,'error');
                  } else {
                     alertText(data.message,'success');
                  }
               },
               error: function(jqXHR, textStatus, errorThrown){
                  alertText("Server Timeout! Please try again",'warning');
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
        function openfancy() {
    $('.fancybox-media').fancybox({
        openEffect: 'none',
        closeEffect: 'none',
        type : "image",
        helpers: {
            media: {}
        }
    });
}
    </script>
@endpush