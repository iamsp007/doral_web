'@extends('pages.layouts.app')
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
@php
   $count1 = $count5 = $count6 = $count7 = $count8 = $count9 = $count10 = $count11 = $count12 = $count13 = $count14 = $count15 = $count16 = $count17= $count18 = $count19 = $count20 = $count21 = $count23 = $count24 = $count25 = $count26 = $count27 = $count28 = $count29 = $count30 = $count31 = $count32 = $count33 = $count34 = $count35 = $count36 = $count37 = $count38 = $count39 = $count40 = $count41 = $count42 = $count43 = 1;
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
      @php $type10 = $count10++; @endphp
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
   @elseif($document->type == 22)
      @php $type22 = $count22++; @endphp
   @elseif($document->type == 23)
      @php $type23 = $count23++; @endphp
   @elseif($document->type == 24)
      @php $type24 = $count24++; @endphp
   @elseif($document->type == 25)
      @php $type25 = $count25++; @endphp
   @elseif($document->type == 26)
      @php $type26 = $count26++; @endphp
   @elseif($document->type == 27)
      @php $type27 = $count27++; @endphp
   @elseif($document->type == 28)
      @php $type28 = $count28++; @endphp
   @elseif($document->type == 29)
      @php $type29 = $count29++; @endphp
   @elseif($document->type == 30)
      @php $type30 = $count30++; @endphp
   @elseif($document->type == 31)
      @php $type31 = $count31++; @endphp
   @elseif($document->type == 32)
      @php $type32 = $count32++; @endphp
   @elseif($document->type == 33)
      @php $type33 = $count33++; @endphp
   @elseif($document->type == 34)
      @php $type34 = $count34++; @endphp
   @elseif($document->type == 35)
      @php $type35 = $count35++; @endphp
   @elseif($document->type == 36)
      @php $type36 = $count36++; @endphp
   @elseif($document->type == 37)
      @php $type37 = $count37++; @endphp
   @elseif($document->type == 38)
      @php $type38 = $count38++; @endphp
   @elseif($document->type == 39)
      @php $type39 = $count39++; @endphp
   @elseif($document->type == 40)
      @php $type40 = $count40++; @endphp
   @elseif($document->type == 41)
      @php $type41 = $count41++; @endphp
   @elseif($document->type == 42)
      @php $type42 = $count42++; @endphp
   @elseif($document->type == 43)
      @php $type43 = $count43++; @endphp
   @endif

@endforeach

@section('content')
   <section class="details">
      <section class="details-aside navbar navbar-dark">
         <div class="sidebar mb-2" id="collapsibleNavbar">
            <div class="block">
               <div class="height-83"></div>
               <img src="{{ isset($data->avatar_image) ? $data->avatar_image : null }}" alt="Welcome to Doral" srcset="{{ isset($data->avatar_image) ? $data->avatar_image : null }}" class="img-fluid img-100">
            </div>
            <div>
               <div class="d-flex justify-content-center">
                  <ul class="list-group">
                     @isset($data->first_name)
                        <li class="list-group-item name">{{ isset($data->first_name) ? $data->first_name.' '.$data->last_name : null }}</li>
                     @endisset
                     <li class="list-group-item">
                        <span>{{ isset($data->gender_name) ? $data->gender_name : null }}</span>&nbsp;&nbsp;
                        <span>{{ isset($data->dob) ? date('m/d/Y', strtotime($data->dob)) : null }}</span>&nbsp;
                     </li>
                     @if(isset($data->phone))
                        <li class="list-group-item d-inherit">
                           @if ($data->designation)
                              <span>@if(isset($data->designation->name)) {{ $data->designation->name }} @endif</span>
                           @endif
                           @if ($data->designation && isset($applicant->phone))
                           &nbsp;/&nbsp;
                           @endif
                           @if(isset($applicant->phone) && $applicant->phone != '')
                              @php
                                 $cellphone = $applicant->phone;
                              @endphp
                              <a href="tel:{{ isset($applicant->phone) ? $applicant->phone : null }}" class="text-body call-text d-flex align-items-center"><img src="/assets/img/icons/phone_green.svg" class="mr-1" alt=""> {{ $cellphone }}</a>
                           @endif
                        </li>
                       
                     @endif
                     <li class="list-group-item"><span>{{ isset($data->email) ? $data->email : null }}</span></li>
                      <li class="list-group-item">
                        <span>
                            <a href="javascript:void(0)" data-toggle="tooltip" data-id="{{ $data->id }}" data-original-title="Accept" class="btn btn-primary btn-green shadow-sm btn--sm mr-2 update-status" data-status="1" data-action="single-action" data-url="{{ route('caregiver.changePatientStatus') }}">Accept</a>
                           <a href="javascript:void(0)" data-toggle="tooltip" data-id="{{ $data->id }}" data-original-title="Reject" class="btn btn-danger shadow-sm btn--sm mr-2 update-status" data-status="3" data-action="single-action" data-url="{{ route('caregiver.changePatientStatus') }}">REJECT</a>
                        </span>
                     </li>
                     <!--<li class="list-group-item">
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
            <div>
               <ul class="patient-nav nav">
                  <li class="mb-2">
                     <a href="#ApplicantDetail" class="active" data-toggle="pill" role="tab">
                        <img src="/assets/img/icons/applicant-clinician.svg" alt="" srcset="/assets/img/icons/applicant-clinician.svg" class="_icon mr-2">Demographic Details
                     </a>
                  </li>
                  <li class="mb-2">
                     <a href="#EducationDetails" data-toggle="pill" role="tab">
                        <img src="/assets/img/icons/education-clinician.svg" alt="" srcset="/assets/img/icons/education-clinician.svg" class="_icon mr-2">Education Details
                     </a>
                  </li>
                  @if ($data->designation_id == '2')
                  <li class="mb-2">
                     <a href="#SecurityDetails" data-toggle="pill" role="tab">
                        <img src="/assets/img/icons/education-clinician.svg" alt="" srcset="/assets/img/icons/education-clinician.svg" class="_icon mr-2">Security Details
                     </a>
                  </li>
                  <li class="mb-2">
                     <a href="#MilitaryDetails" data-toggle="pill" role="tab">
                        <img src="/assets/img/icons/education-clinician.svg" alt="" srcset="/assets/img/icons/education-clinician.svg" class="_icon mr-2">Military Details
                     </a>
                  </li>
                  <li class="mb-2">
                     <a href="#EmployerDetails" data-toggle="pill" role="tab">
                        <img src="/assets/img/icons/professional-clinician.svg" alt="" srcset="/assets/img/icons/professional-clinician.svg" class="_icon mr-2">Employer Details
                     </a>
                  </li>
                  @endif
                  <li class="mb-2">
                     <a href="#ProfessionalDetails" data-toggle="pill" role="tab">
                        <img src="/assets/img/icons/professional-clinician.svg" alt="" srcset="/assets/img/icons/professional-clinician.svg" class="_icon mr-2">Professional Details
                     </a>
                  </li>
                  @if ($data->designation_id != '2')
                  <li class="mb-2">
                     <a href="#WorkHistoryDetails" data-toggle="pill" role="tab">
                        <img src="/assets/img/icons/document-clinician.svg" alt="" srcset="/assets/img/icons/document-clinician.svg" class="_icon mr-2">Work History Details
                     </a>
                  </li>
                  @endif
                  <li class="mb-2">
                     <a href="#DepositDetails" data-toggle="pill" role="tab">
                        <img src="/assets/img/icons/deposit-clinician.svg" alt="" srcset="/assets/img/icons/deposit-clinician.svg" class="_icon mr-2">Payroll Details
                     </a>
                  </li>
                  <!--<li class="mb-2"><a href="#BackgroundDetails" data-toggle="pill" role="tab"><img
                     src="/assets/img/icons/background-clinician.svg" alt=""
                     srcset="/assets/img/icons/background-clinician.svg" class="_icon mr-2">Background Details</a>
                  </li>
                  <li class="mb-2"><a href="#VerifyIdentity" data-toggle="pill" role="tab"><img
                     src="/assets/img/icons/identity-clinician.svg" alt=""
                     srcset="/assets/img/icons/identity-clinician.svg" class="_icon mr-2">Verify Identity</a>
                  </li>-->
                  <li class="mb-2">
                     <a href="#DocumentsVerifiaction" data-toggle="pill" role="tab">
                        <img src="/assets/img/icons/document-clinician.svg" alt="" srcset="/assets/img/icons/document-clinician.svg" class="_icon mr-2">Documents Verifiaction
                     </a>
                  </li>
                  <li class="mb-2">
                     <a href="#ScanReport" data-toggle="pill" role="tab">
                        <img src="/assets/img/icons/document-clinician.svg" alt="" srcset="/assets/img/icons/document-clinician.svg" class="_icon mr-2">Credentialing Detail
                     </a>
                  </li>

               </ul>
            </div>
         </div>
      </section>
      <section class="details-content scrollbar-detail scrollbar">
         <!-- Right section Start-->
         <div class="tab-content" id="v-pills-tabContent">
            <!-- Applicant Details Start -->
            <div class="tab-pane fade show active" id="ApplicantDetail" role="tabpanel" aria-labelledby="v-pills-ApplicantDetail-tab">
               <div class="app-card" style="min-height: auto;">
                  <div class="card-header" id="step2">
                     <div class="d-flex align-items-center">
                        <img src="/assets/img/icons/applicant-clinician.svg" alt="" srcset="/assets/img/icons/applicant-clinician.svg" class="_icon mr-2"> Demographic Details
                     </div>
                  </div>
                  <div class="card-body collapse show mt-3" id="collapseWork" aria-labelledby="collapseWork" data-parent="#profileAccordion">
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
                                       <div><i class="las la-user-nurse circle-icon"></i></div>
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
                                    <div><i class="las la-angle-double-right circle-icon"></i></div>
                                       <div>
                                          <h3 class="_title">Email</h3>
                                          <h1 class="_detail">{{ isset($data->email) ? $data->email : null }}</h1>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-sm-4">
                                 <div>
                                    <div class="d-flex align-items-center">
                                       <div><i class="las la-angle-double-right circle-icon"></i></div>
                                       <div>
                                          <h3 class="_title">Gender</h3>
                                          <h1 class="_detail">{{ isset($data->gender_name) ? $data->gender_name : null }}</h1>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row mt-3">
                              <div class="col-12 col-sm-4">
                                 <div>
                                    <div class="d-flex align-items-center">
                                       <div><i class="las la-phone  circle-icon"></i></div>
                                       <div>
                                          @php
                                          	$phone = $home_phone = '';
                                          	if(isset($applicant->phone)):
                                             $phone =  "+".substr($applicant->phone, 0, 1). " (".substr($applicant->phone, 1, 3).") ".substr($applicant->phone, 4, 3)."-".substr($applicant->phone,7);
						endif;
						if(isset($applicant->home_phone)):
                                             $home_phone =  "+".substr($applicant->home_phone, 0, 1). " (".substr($applicant->home_phone, 1, 3).") ".substr($applicant->home_phone, 4, 3)."-".substr($applicant->home_phone,7);
                                             endif;
                                          @endphp
                                          <h3 class="_title">Cell Phone</h3>
                                          <h1 class="_detail">{{ isset($applicant->phone) ? $applicant->phone : '' }}</h1>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-sm-4">
                                 <div>
                                    <div class="d-flex align-items-center">
                                       <div><i class="las la-phone  circle-icon"></i></div>
                                       <div>
                                          <h3 class="_title">Home Phone</h3>
                                          <h1 class="_detail">{{ isset($applicant->home_phone) ? $applicant->home_phone : '' }}</h1>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-sm-4">
                                 <div>
                                    <div class="d-flex align-items-center">
                                       <div><i class="las la-angle-double-right circle-icon"></i></div>
                                       <div>
                                          <h3 class="_title">SSN</h3>
                                          <h1 class="_detail">{{ isset($info['ssn']) ? getSsn($info['ssn']) : null }}</h1>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row mt-3">
                              <div class="col-12 col-sm-4">
                                 <div>
                                    <div class="d-flex align-items-center">
                                       <div><i class="las la-angle-double-right circle-icon"></i></div>
                                       <div>
                                          <h3 class="_title">Date Of Birth</h3>
                                          <h1 class="_detail">{{ isset($info['dateOfBirth']) ? $info['dateOfBirth'] : null }}</h1>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              @if ($data->designation_id != '2')
                                 <div class="col-12 col-sm-4">
                                    <div>
                                       <div class="d-flex align-items-center">
                                          <div><i class="las la-angle-double-right circle-icon"></i></div>
                                          <div>
                                             <h3 class="_title">Us Citizen</h3>
                                             <h1 class="_detail">{{ isset($info['us_citizen']) && $info['us_citizen'] == '1' ? 'Yes' : 'No' }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 @if(isset($info['us_citizen']) && $info['us_citizen'] === false)
                                    <div class="col-12 col-sm-4">
                                       <div>
                                          <div class="d-flex align-items-center">
                                             <div><i class="las la-angle-double-right circle-icon"></i></div>
                                             <div>
                                                <h3 class="_title">In No, Immigration ID/Card</h3>
                                                <h1 class="_detail">{{ isset($info['immigration_id']) ? $info['immigration_id'] : null }}</h1>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 @endif
                              @endif
                           </div>
                           <div class="row mt-3">
                              <div class="col-12 col-sm-4">
                                 <div>
                                    <div class="d-flex align-items-center">
                                       <div><i class="las la-angle-double-right circle-icon"></i></div>
                                       <div>
                                          <h3 class="_title">Ethnicity</h3>
                                          <h1 class="_detail">

                                             @if(isset($info['Ethnicity']) && $info['Ethnicity'] != 'Other')
                                                {{ isset($info['Ethnicity']) ? $info['Ethnicity'] : null }}
                                             @elseif(isset($info['OtherEthnicity']))
                                                {{ isset($info['OtherEthnicity']) ? $info['OtherEthnicity'] : null }}
                                             @endif
                                          </h1>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-sm-4">
                                 <div>
                                    <div class="d-flex align-items-center">
                                       <div><i class="las la-angle-double-right circle-icon"></i></div>
                                       <div>
                                          <h3 class="_title">Date you can start work</h3>
                                          <h1 class="_detail">{{ isset($info['DateYouCanStartWork']) ? $info['DateYouCanStartWork'] : null }}</h1>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           @if(isset($info['documentType']))
                           @php
                              if ($info['documentType'] === 'passport'):
                                 $docId = isset($info['passport_id']) ? $info['passport_id']  : '';
                                 $docType = '46';
                                 $label = 'Passport';
                              elseif ($info['documentType'] === 'greencard'):
                                 $docId = isset($info['greencard_id']) ? $info['greencard_id']  : '';
                                 $docType = '47';
                                 $label = 'Greencard';
                              elseif ($info['documentType'] === 'workpermit'):
                                 $docId = isset($info['workpermit_uscisId']) ? $info['workpermit_uscisId']  : '';
                                 $docType = '48';
                                 $label = 'Workpermit';
                              endif;
                           @endphp
                           <ul>
                              <li>
                                 <div class="_card mt-3">
                                    <div class="_card_header">
                                       <div class="title-head">Document Details</div>
                                       <a class="nav-link active view_document" data-id="{{ $data->id }}" data-type="{{$docType}}" href="#" data-action="document" style="color: #ffffff;background-color: #17a2b8;border-color: #dee2e6 #dee2e6 #fff;">Document</a>

                                    </div>
                                    <div class="_card_body">
                                       <div class="row mt-3">
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center mb-3">
                                             <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                <div>
                                                   <h3 class="_title">{{ $label }}</h3>
                                                   <h1 class="_detail">{{ $docId }}
                                                   </h1>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                           @endif
                        </div>
                        <div class="tab-pane fade" id="Address" role="tabpanel" aria-labelledby="Address-tab">
                           @php
                              $address1 = isset($address['address1']) ? $address['address1']  : '';
                              $address2 = isset($address['address2']) ? $address['address2']  : '';
                              $building = isset($address['building']) ? $address['building']  : '';
                              $city = isset($address['city_id']) ? \App\Models\City::find($address['city_id'])->city : '';
                              $state = isset($address['state_id']) ? \App\Models\State::find($address['state_id'])->state : '';
                              $zipcode = isset($address['zipcode']) ? $address['zipcode'] : '';
                              $addressMap = $address1 .','. $address2 .','. $building .','. $city .','. $state .','. $zipcode;
                           @endphp
                           <ul>
                              <li>
                                 <div class="_card mt-3">
                                    <div class="_card_header">
                                       <div class="title-head">Address Details</div>
                                       <a class="btn btn-info btn-sm ml-2 viewMap"><i class="las la-map-marker"></i>View Map</a>
                                    </div>
                                    <div class="_card_body">
                                       <div class="row mt-3">
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center mb-3">
                                                <div><i class="las la-map-marker circle-icon"></i></div>
                                                <div>
                                                   <h3 class="_title">Address Line 1</h3>
                                                   <h1 class="_detail">
                                                      {{ isset($address['address1']) ? $address['address1']  : ''}}
                                                   </h1>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center mb-3">
                                                <div><i class="las la-map-marker circle-icon"></i></div>
                                                <div>
                                                   <h3 class="_title">Address Line 2</h3>
                                                   <h1 class="_detail">
                                                      {{ isset($address['address2']) ? $address['address2']  : ''}}
                                                   </h1>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center">
                                                <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                <div>
                                                   <h3 class="_title">Apt#</h3>
                                                   <h1 class="_detail">{{ isset($address['building']) ? $address['building']  : ''}}</h1>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row mt-3">
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center">
                                                <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                <div>
                                                   <h3 class="_title">City</h3>
                                                   <h1 class="_detail">{{ isset($address['city_id']) ? \App\Models\City::find($address['city_id'])->city : '' }}</h1>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center">
                                                <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                <div>
                                                   <h3 class="_title">State</h3>
                                                   <h1 class="_detail">{{ isset($address['state_id']) ? \App\Models\State::find($address['state_id'])->state : '' }}</h1>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center">
                                                <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                <div>
                                                   <h3 class="_title">Zip Code</h3>
                                                   <h1 class="_detail">{{ isset($address['zipcode']) ? $address['zipcode'] : ''}}</h1>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row mt-3">
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center">
                                                <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                <div>
                                                   <h3 class="_title">Length of time at the above address</h3>
                                                   <h1 class="_detail">{{ isset($address['how_long_resident']) ? $address['how_long_resident'] : '' }}</h1>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row mt-3">
                                          <div class="col-12 col-sm-4">
                                             <div class="mb-4 viewMapDiv" style="display:none;">
                                                <div class="card card-body">
                                                   <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q={{$addressMap}}t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                              @if($prior)
                                 @php
                                    $prioraddress1 = isset($prior['address1']) ? $prior['address1']  : '';
                                    $prioraddress2 = isset($prior['address2']) ? $prior['address2']  : '';
                                    $priorbuilding = isset($prior['building']) ? $prior['building']  : '';
                                    $priorcity = isset($prior['city_id']) ? \App\Models\City::find($prior['city_id'])->city : '';
                                    $priorstate = isset($prior['state_id']) ? \App\Models\State::find($prior['state_id'])->state : '';
                                    $priorzipcode = isset($prior['zipcode']) ? $prior['zipcode'] : '';
                                    $priorMap = $prioraddress1 .','. $prioraddress2 .','. $priorbuilding .','. $priorcity .','. $priorstate .','. $priorzipcode;
                                 @endphp
                                 <li>
                                    <div class="_card mt-3">
                                       <div class="_card_header">
                                          <div class="title-head">Prior Address Details</div>
                                          <a class="btn btn-info btn-sm ml-2 viewMap"><i class="las la-map-marker"></i>View Map</a>
                                       </div>
                                       <div class="_card_body">
                                          <div class="row mt-3">
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center mb-3">
                                                   <div><i class="las la-map-marker circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Address Line 1</h3>
                                                      <h1 class="_detail">
                                                         {{ isset($prior['address1']) ? $prior['address1']  : ''}}
                                                      </h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center mb-3">
                                                   <div><i class="las la-map-marker circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Address Line 2</h3>
                                                      <h1 class="_detail">
                                                      {{ isset($prior['address2']) ? $prior['address2']  : ''}}
                                                      </h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Apt#</h3>
                                                      <h1 class="_detail">  {{ isset($prior['building']) ? $prior['building']  : ''}}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="row mt-3">
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">City</h3>
                                                      <h1 class="_detail"> {{ isset($prior['city_id']) ? \App\Models\City::find($prior['city_id'])->city : '' }}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">State</h3>
                                                      <h1 class="_detail">{{ isset($prior['state_id']) ? \App\Models\State::find($prior['state_id'])->state : '' }}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Zip Code</h3>
                                                      <h1 class="_detail">{{ isset($prior['zipcode']) ? $prior['zipcode'] : ''}}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="row mt-3">
                                             <div class="col-12 col-sm-4">
                                                <div class="mb-4 viewMapDiv" style="display:none;">
                                                   <div class="card card-body">
                                                      <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q={{$priorMap}}t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                              @endif
                           </ul>
                        </div>
                        <div class="tab-pane fade" id="Reference" role="tabpanel" aria-labelledby="Reference-tab">
                           <ul>
                              <li>
                                 <div class="_card mt-3">
                                    <div class="_card_header"><div class="title-head">Reference Basic detail</div></div>
                                    <div class="_card_body">
                                       <div class="row mt-3">
                                          <div class="col-12 col-sm-4">
                                             <div>
                                                <div class="d-flex align-items-center">
                                                <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                   <h3 class="_title">Terms</h3>
                                                   <h1 class="_detail">{{ isset($reference_detail['terms']) && $reference_detail['terms'] == '1' ? 'Yes' : 'No' }}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row mt-3">
                                          @if ($data->designation_id != '2')
                                             <div class="col-12 col-sm-4">
                                                <div>
                                                   <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Have you ever been bonded?</h3>
                                                         <h1 class="_detail">{{ isset($reference_detail['haveYouEverBeenBonded']) && $reference_detail['haveYouEverBeenBonded'] == '1' ? 'Yes' : 'No' }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div>
                                                   <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Have you ever refused a bond?</h3>
                                                         <h1 class="_detail">{{ isset($reference_detail['haveYouEverBeenRefusedBond']) && $reference_detail['haveYouEverBeenRefusedBond'] == '1' ? 'Yes' : 'No' }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             @if ($data->designation_id != '2')
                                                <div class="col-12 col-sm-4">
                                                   <div>
                                                      <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Have you ever been convicated of a crime?</h3>
                                                            <h1 class="_detail">{{ isset($reference_detail['haveYouOverBeenConvicatedOfaCrime']) && $reference_detail['haveYouOverBeenConvicatedOfaCrime'] == '1' ? 'Yes' : 'No' }}</h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             @endif
                                          @endif
                                       </div>
                                    </div>
                                 </div>
                              </li>
                              @php $count = '1'; @endphp
                              @isset($reference_detail['reference_list'])
                                 @foreach($reference_detail['reference_list'] as $index => $reference)
                                    @php
                                       $referenceaddress1 = isset($reference['address1']) ? $reference['address1']  : '';
                                       $referenceaddress2 = isset($reference['address2']) ? $reference['address2']  : '';
                                       $referencebuilding = isset($reference['building']) ? $reference['building']  : '';
                                       $referencecity = isset($reference['city_id']) ? \App\Models\City::find($reference['city_id'])->city : '';
                                       $referencestate = isset($reference['state_id']) ? \App\Models\State::find($reference['state_id'])->state : '';
                                       $referencezipcode = isset($reference['zipcode']) ? $reference['zipcode'] : '';
                                       $referenceaddressMap = $referenceaddress1 .','. $referenceaddress2 .','. $referencebuilding .','. $referencecity .','. $referencestate .','. $referencezipcode;
                                    @endphp
                                    <li>
                                       <div class="_card mt-3">
                                          <div class="_card_header">
                                             <div class="title-head">Reference {{ $count }}</div>
                                             <a class="btn btn-info btn-sm ml-2 viewMap"><i class="las la-map-marker"></i>View Map</a>
                                          </div>
                                          <div class="_card_body">
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-user-nurse circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Reference 1</h3>
                                                         <h1 class="_detail">{{ isset($reference['name']) ? $reference['name'] : null }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                @php
                                                   $phoneData = '';
                                                   if(isset($reference['phoneNo'])):
                                                   $phoneData = "+".substr($reference['phoneNo'], 0, 1)." ". "(".substr($reference['phoneNo'], 1, 3).") ".substr($reference['phoneNo'], 4, 3)."-".substr($reference['phoneNo'],7);
                                                   endif;
                                                @endphp
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-map-marker circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Address Line 1</h3>
                                                         <h1 class="_detail">
                                                            {{ isset($reference['address1']) ? $reference['address1'] : null }}
                                                         </h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-map-marker circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Address Line 2</h3>
                                                         <h1 class="_detail">
                                                            {{ isset($reference['address2']) ? $reference['address2'] : null }}
                                                         </h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Apt#</h3>
                                                         <h1 class="_detail">  {{ isset($reference['building']) ? $reference['building']  : ''}}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">City</h3>
                                                         <h1 class="_detail"> {{ isset($reference['city_id']) ? \App\Models\City::find($reference['city_id'])->city : '' }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">State</h3>
                                                         <h1 class="_detail">{{ isset($reference['state_id']) ? \App\Models\State::find($reference['state_id'])->state : '' }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Zip Code</h3>
                                                         <h1 class="_detail">{{ isset($reference['zipcode']) ? $reference['zipcode'] : ''}}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-phone  circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Phone No.</h3>
                                                         <h1 class="_detail">{{ $phoneData }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="mb-4 viewMapDiv" style="display:none;">
                                                   <div class="card card-body">
                                                         <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q={{$referenceaddressMap}}t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                                   </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                 @php $count++; @endphp
                                 @endforeach
                              @else
                                 <li>
                                    <div class="_card mt-3">
                                       <div class="_card_header">
                                          <div class="title-head">Reference</div>
                                          <a class="btn btn-info btn-sm ml-2 viewMap"><i class="las la-map-marker"></i>View Map</a>
                                       </div>
                                       <div class="_card_body">
                                          <div class="row mt-3">
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-user-nurse circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Reference 1</h3>
                                                      <h1 class="_detail"></h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center mb-3">
                                                   <div><i class="las la-map-marker circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Address Line 1</h3>
                                                      <h1 class="_detail"></h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center mb-3">
                                                   <div><i class="las la-map-marker circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Address Line 2</h3>
                                                      <h1 class="_detail"></h1>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="row mt-3">
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Apt#</h3>
                                                      <h1 class="_detail"></h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">City</h3>
                                                      <h1 class="_detail"></h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">State</h3>
                                                      <h1 class="_detail"></h1>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="row mt-3">
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Zip Code</h3>
                                                      <h1 class="_detail"></h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-phone  circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Phone No.</h3>
                                                      <h1 class="_detail"></h1>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="row mt-3">
                                             <div class="col-12 col-sm-4">
                                                <div class="mb-4 viewMapDiv" style="display:none;">
                                                <div class="card card-body">
                                                      <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                                </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                              @endisset
                           </ul>
                        </div>
                        <div class="tab-pane fade" id="Emergency" role="tabpanel" aria-labelledby="Emergency-tab">
                           <ul>
                              @php $count = '1'; @endphp
                              @if($emergency_detail)
                                 @foreach($emergency_detail as $index => $emergency)
                                    @php
                                    $emergencyaddress1 = isset($emergency['address1']) ? $emergency['address1']  : '';
                                    $emergencyaddress2 = isset($emergency['address2']) ? $emergency['address2']  : '';
                                    $emergencybuilding = isset($emergency['building']) ? $emergency['building']  : '';
                                    $emergencycity = isset($emergency['city_id']) ? \App\Models\City::find($emergency['city_id'])->city : '';
                                    $emergencystate = isset($emergency['state_id']) ? \App\Models\State::find($emergency['state_id'])->state : '';
                                    $emergencyzipcode = isset($emergency['zipcode']) ? $emergency['zipcode'] : '';
                                    $emergencyaddressMap = $emergencyaddress1 .','. $emergencyaddress2 .','. $emergencybuilding .','. $emergencycity .','. $emergencystate .','. $emergencyzipcode;
                                    @endphp
                                    <li>
                                       <div class="_card mt-3">
                                          <div class="_card_header">
                                             <div class="title-head">Emergency Detail {{ $count }}</div>
                                             <a class="btn btn-info btn-sm ml-2 viewMap"><i class="las la-map-marker"></i>View Map</a>
                                          </div>
                                          <div class="_card_body">
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-user-nurse circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Name</h3>
                                                         <h1 class="_detail">{{ isset($emergency['name']) ? $emergency['name'] : null }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                @php
                                                   $phoneData = '';
                                                   if(isset($emergency['phoneNo'])):
                                                   $phoneData = "+".substr($emergency['phoneNo'], 0, 1)." ". "(".substr($emergency['phoneNo'], 1, 3).") ".substr($emergency['phoneNo'], 4, 3)."-".substr($emergency['phoneNo'],7);
                                                   endif;
                                                @endphp
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-phone  circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Phone No.</h3>
                                                         <h1 class="_detail">{{ $phoneData }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-map-marker circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Address Line 1</h3>
                                                         <h1 class="_detail">
                                                            {{ isset($emergency['address1']) ? $emergency['address1'] : null }}
                                                         </h1>
                                                      </div>
                                                   </div>
                                                </div>

                                             </div>
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-map-marker circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Address Line 2</h3>
                                                         <h1 class="_detail">
                                                            {{ isset($emergency['address2']) ? $emergency['address2'] : null }}
                                                         </h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Apt#</h3>
                                                         <h1 class="_detail">  {{ isset($emergency['building']) ? $emergency['building']  : ''}}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">City</h3>
                                                         <h1 class="_detail"> {{ isset($emergency['city_id']) ? \App\Models\City::find($emergency['city_id'])->city : '' }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">State</h3>
                                                         <h1 class="_detail">{{ isset($emergency['state_id']) ? \App\Models\State::find($emergency['state_id'])->state : '' }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Zip Code</h3>
                                                         <h1 class="_detail">{{ isset($emergency['zipcode']) ? $emergency['zipcode'] : ''}}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Relationship</h3>
                                                         <h1 class="_detail">
                                                         @if(isset($emergency['relation']) && $emergency['relation'] != 'Other')
                                                                  {{ isset($emergency['relation']) ? $emergency['relation'] : '' }}
                                                            @else
                                                                  {{ isset($emergency['otherRelation']) ? $emergency['otherRelation'] : '' }}
                                                            @endif
                                                         </h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="mb-4 viewMapDiv" style="display:none;">
                                                      <div class="card card-body">
                                                         <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q={{$emergencyaddressMap}}t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                 @php $count++; @endphp
                                 @endforeach
                              @else
                                 <li>
                                    <div class="_card mt-3">
                                       <div class="_card_header">
                                          <div class="title-head">Emergency Detail</div>
                                          <a class="btn btn-info btn-sm ml-2 viewMap"><i class="las la-map-marker"></i>View Map</a>
                                       </div>
                                       <div class="_card_body">
                                          <div class="row mt-3">
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-user-nurse circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Name</h3>
                                                      <h1 class="_detail"></h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-phone  circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Phone No.</h3>
                                                      <h1 class="_detail"></h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center mb-3">
                                                   <div><i class="las la-map-marker circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Address Line 1</h3>
                                                      <h1 class="_detail"></h1>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="row mt-3">
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center mb-3">
                                                   <div><i class="las la-map-marker circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Address Line 2</h3>
                                                      <h1 class="_detail"></h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Apt#</h3>
                                                      <h1 class="_detail"></h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">City</h3>
                                                      <h1 class="_detail"></h1>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="row mt-3">
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">State</h3>
                                                      <h1 class="_detail"></h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Zip Code</h3>
                                                      <h1 class="_detail"></h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Relationship</h3>
                                                      <h1 class="_detail"></h1>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="row mt-3">
                                             <div class="col-12 col-sm-4">
                                                <div class="mb-4 viewMapDiv" style="display:none;">
                                                   <div class="card card-body">
                                                      <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                              @endif
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
            @if ($data->designation_id != 2)
               <div class="tab-pane fade" id="EducationDetails" role="tabpanel"  aria-labelledby="v-pills-EducationDetails-tab">
                  <div class="app-card" style="min-height: auto;">
                     <div class="card-header" id="step2">
                        <div class="d-flex align-items-center">
                           <img src="/assets/img/icons/applicant-clinician.svg" alt="" srcset="/assets/img/icons/applicant-clinician.svg" class="_icon mr-2">Education Details
                        </div>
                     </div>
                     <div class="card-body collapse show mt-3" id="collapseWork" aria-labelledby="collapseWork" data-parent="#profileAccordion">
                        <div class="tab-content" id="myTabContent">
                           <div class="tab-pane fade show active" id="MEDICALINSTITUTE" role="tabpanel" aria-labelledby="MEDICALINSTITUTE-tab">
                              <ul>
                                 @php
                                    $medicalInstitutes = isset($education_detail['medical']) ? $education_detail['medical'] : '';
                                    $medicalCounter = 1;
                                    $residencyInstitutes = isset($education_detail['residency']) ? $education_detail['residency'] : '';
                                    $residencyCounter = 1;
                                    $fellowshipInstitutes = isset($education_detail['fellowship']) ? $education_detail['fellowship'] : '';
                                    $fellowshipCounter = 1;
                                 @endphp
                                 @if($medicalInstitutes)
                                    <li>
                                       <div class="_card mt-3">
                                          @foreach($medicalInstitutes as $medicalInstitute)
                                             @php
                                                $medical_address1 = isset($medicalInstitute['medical_address1']) ? $medicalInstitute['medical_address1']  : '';
                                                $medical_address2 = isset($medicalInstitute['medical_address2']) ? $medicalInstitute['medical_address2']  : '';
                                                $medical_building = isset($medicalInstitute['medical_building']) ? $medicalInstitute['medical_building']  : '';
                                                $medical_city = isset($medicalInstitute['medical_cityId']) ? \App\Models\City::find($medicalInstitute['medical_cityId'])->city : '';
                                                $medical_state = isset($medicalInstitute['medical_stateId']) ? \App\Models\State::find($medicalInstitute['medical_stateId'])->state : '';
                                                $medical_zipcode = isset($medicalInstitute['medical_zipcode']) ? $medicalInstitute['medical_zipcode'] : '';
                                                $medicalMap = $medical_address1 .','. $medical_address2 .','. $medical_building .','. $medical_city .','. $medical_state .','. $medical_zipcode;
                                             @endphp
                                             <div class="_card_header">
                                                <div class="title-head">Medical School {{$medicalCounter }}</div>
                                                <a class="btn btn-info btn-sm ml-2 viewMap"><i class="las la-map-marker"></i>View Map</a>
                                             </div>
                                             <div class="_card_body">
                                                <div class="row mt-3">
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center mb-3">
                                                         <div><i class="las la-map-marker circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Name of Institute</h3>
                                                            <h1 class="_detail">
                                                               {{ $medicalInstitute['medical_instituteName'] }}
                                                            </h1>
                                                         </div>
                                                      </div>
                                                   </div>

                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center mb-3">
                                                         <div><i class="las la-map-marker circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Address Line 1</h3>
                                                            <h1 class="_detail">
                                                               {{ isset($medicalInstitute['medical_address1']) ? $medicalInstitute['medical_address1']  : ''}}
                                                            </h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center mb-3">
                                                         <div><i class="las la-map-marker circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Address Line 2</h3>
                                                            <h1 class="_detail">
                                                            {{ isset($medicalInstitute['medical_address2']) ? $medicalInstitute['medical_address2']  : ''}}
                                                            </h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="row mt-3">
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Apt#</h3>
                                                            <h1 class="_detail">  {{ isset($medicalInstitute['medical_building']) ? $medicalInstitute['medical_building']  : ''}}</h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">City</h3>
                                                            <h1 class="_detail"> {{ isset($medicalInstitute['medical_cityId']) ? \App\Models\City::find($medicalInstitute['medical_cityId'])->city : '' }}</h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">State</h3>
                                                            <h1 class="_detail">{{ isset($medicalInstitute['medical_stateId']) ? \App\Models\State::find($medicalInstitute['medical_stateId'])->state : '' }}</h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="row mt-3">
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Zip Code</h3>
                                                            <h1 class="_detail">{{ isset($medicalInstitute['medical_zipcode']) ? $medicalInstitute['medical_zipcode'] : ''}}</h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center mb-3">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Year Started</h3>
                                                            <h1 class="_detail">
                                                               {{ isset($medicalInstitute['medical_yearStarted']) ? $medicalInstitute['medical_yearStarted']  : ''}}
                                                            </h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center mb-3">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Year Completed</h3>
                                                            <h1 class="_detail">
                                                               {{ isset($medicalInstitute['medical_yearEnded']) ? $medicalInstitute['medical_yearEnded']  : ''}}
                                                            </h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="row mt-3">
                                                   <div class="col-12 col-sm-4">
                                                      <div class="mb-4 viewMapDiv" style="display:none;">
                                                         <div class="card card-body">
                                                            <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q={{$medicalMap}}t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             @php $medicalCounter++ @endphp
                                          @endforeach
                                       </div>
                                    </li>
                                 @else
                                    <li>
                                       <div class="_card mt-3">
                                          <div class="_card_header">
                                             <div class="title-head">Medical School</div>
                                             <a class="btn btn-info btn-sm ml-2 viewMap"><i class="las la-map-marker"></i>View Map</a>
                                          </div>
                                          <div class="_card_body">
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-map-marker circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Name of Institute</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-map-marker circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Address Line 1</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-map-marker circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Address Line 2</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Apt#</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">City</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">State</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Zip Code</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Year Started</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Year Completed</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="mb-4 viewMapDiv" style="display:none;">
                                                      <div class="card card-body">
                                                         <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                 @endif
                                 @if($residencyInstitutes)
                                    <li>
                                       <div class="_card mt-3">
                                          @foreach($residencyInstitutes as $residencyInstitute)
                                             @php
                                                $residency_address1 = isset($residencyInstitute['residency_address1']) ? $residencyInstitute['residency_address1']  : '';
                                                $residency_address2 = isset($residencyInstitute['residency_address2']) ? $residencyInstitute['residency_address2']  : '';
                                                $residency_building = isset($residencyInstitute['residency_building']) ? $residencyInstitute['residency_building']  : '';
                                                $residency_city = isset($residencyInstitute['residency_cityId']) ? \App\Models\City::find($residencyInstitute['residency_cityId'])->city : '';
                                                $residency_state = isset($residencyInstitute['residency_stateId']) ? \App\Models\State::find($residencyInstitute['residency_stateId'])->state : '';
                                                $residency_zipcode = isset($residencyInstitute['residency_zipcode']) ? $residencyInstitute['residency_zipcode'] : '';
                                                $residencyMap = $residency_address1 .','. $residency_address2 .','. $residency_building .','. $residency_city .','. $residency_state .','. $residency_zipcode;
                                             @endphp
                                             <div class="_card_header"><div class="title-head">Residency Institute Details {{ $residencyCounter }}</div><a class="btn btn-info btn-sm ml-2 viewMap"><i class="las la-map-marker"></i>View Map</a></div>
                                             <div class="_card_body">
                                                <div class="row mt-3">
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center mb-3">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Name of Institute</h3>
                                                            <h1 class="_detail">
                                                               {{ isset($residencyInstitute['residency_instituteName']) ? $residencyInstitute['residency_instituteName']  : ''}}
                                                            </h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center mb-3">
                                                         <div><i class="las la-map-marker circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Address Line 1</h3>
                                                            <h1 class="_detail">
                                                               {{ isset($residencyInstitute['residency_address1']) ? $residencyInstitute['residency_address1']  : ''}}
                                                            </h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center mb-3">
                                                         <div><i class="las la-map-marker circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Address Line 2</h3>
                                                            <h1 class="_detail">
                                                            {{ isset($residencyInstitute['residency_address2']) ? $residencyInstitute['residency_address2']  : ''}}
                                                            </h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="row mt-3">
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Apt#</h3>
                                                            <h1 class="_detail">  {{ isset($residencyInstitute['residency_building']) ? $residencyInstitute['residency_building']  : ''}}</h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">City</h3>
                                                            <h1 class="_detail"> {{ isset($residencyInstitute['residency_cityId']) ? \App\Models\City::find($residencyInstitute['residency_cityId'])->city : '' }}</h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">State</h3>
                                                            <h1 class="_detail">{{ isset($residencyInstitute['residency_stateId']) ? \App\Models\State::find($residencyInstitute['residency_stateId'])->state : '' }}</h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="row mt-3">
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Zip Code</h3>
                                                            <h1 class="_detail">{{ isset($residencyInstitute['residency_zipcode']) ? $residencyInstitute['residency_zipcode'] : ''}}</h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center mb-3">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Year Started</h3>
                                                            <h1 class="_detail">
                                                               {{ isset($residencyInstitute['residency_yearStarted']) ? $residencyInstitute['residency_yearStarted']  : ''}}
                                                            </h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center mb-3">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Year Completed</h3>
                                                            <h1 class="_detail">
                                                               {{ isset($residencyInstitute['residency_yearEnded']) ? $residencyInstitute['residency_yearEnded']  : ''}}
                                                            </h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="row mt-3">
                                                   <div class="col-12 col-sm-4">
                                                      <div class="mb-4 viewMapDiv" style="display:none;">
                                                         <div class="card card-body">
                                                            <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q={{$residencyMap}}t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             @php $residencyCounter++ @endphp
                                          @endforeach
                                       </div>
                                    </li>
                                 @else
                                    <li>
                                       <div class="_card mt-3">
                                          <div class="_card_header"><div class="title-head">Residency Institute Details</div><a class="btn btn-info btn-sm ml-2 viewMap"><i class="las la-map-marker"></i>View Map</a></div>
                                          <div class="_card_body">
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Name of Institute</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-map-marker circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Address Line 1</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-map-marker circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Address Line 2</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Apt#</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">City</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">State</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Zip Code</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Year Started</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Year Completed</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="mb-4 viewMapDiv" style="display:none;">
                                                      <div class="card card-body">
                                                         <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                 @endif
                                 @if($fellowshipInstitutes)
                                    <li>
                                       <div class="_card mt-3">
                                          @foreach($fellowshipInstitutes as $fellowshipInstitute)
                                             @php
                                                $fellowship_address1 = isset($fellowshipInstitute['fellowship_address1']) ? $fellowshipInstitute['fellowship_address1']  : '';
                                                $fellowship_address2 = isset($fellowshipInstitute['fellowship_address2']) ? $fellowshipInstitute['fellowship_address2']  : '';
                                                $fellowship_building = isset($fellowshipInstitute['fellowship_building']) ? $fellowshipInstitute['fellowship_building']  : '';
                                                $fellowship_city = isset($fellowshipInstitute['fellowship_cityId']) ? \App\Models\City::find($fellowshipInstitute['fellowship_cityId'])->city : '';
                                                $fellowship_state = isset($fellowshipInstitute['fellowship_stateId']) ? \App\Models\State::find($fellowshipInstitute['fellowship_stateId'])->state : '';
                                                $fellowship_zipcode = isset($fellowshipInstitute['fellowship_zipcode']) ? $fellowshipInstitute['fellowship_zipcode'] : '';
                                                $fellowshipMap = $fellowship_address1 .','. $fellowship_address2 .','. $fellowship_building .','. $fellowship_city .','. $fellowship_state .','. $fellowship_zipcode;
                                             @endphp
                                             <div class="_card_header">
                                                <div class="title-head">Fellowship Institute Details {{ $fellowshipCounter}}</div>
                                                <a class="btn btn-info btn-sm ml-2 viewMap"><i class="las la-map-marker"></i>View Map</a>
                                             </div>
                                             <div class="_card_body">
                                                <div class="row mt-3">
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center mb-3">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Name of Institute</h3>
                                                            <h1 class="_detail">
                                                               {{ isset($fellowshipInstitute['fellowship_instituteName']) ? $fellowshipInstitute['fellowship_instituteName']  : ''}}
                                                            </h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center mb-3">
                                                         <div><i class="las la-map-marker circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Address Line 1</h3>
                                                            <h1 class="_detail">
                                                               {{ isset($fellowshipInstitute['fellowship_address1']) ? $fellowshipInstitute['fellowship_address1']  : ''}}
                                                            </h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center mb-3">
                                                         <div><i class="las la-map-marker circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Address Line 2</h3>
                                                            <h1 class="_detail">
                                                            {{ isset($fellowshipInstitute['fellowship_address2']) ? $fellowshipInstitute['fellowship_address2']  : ''}}
                                                            </h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="row mt-3">
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Apt#</h3>
                                                            <h1 class="_detail">  {{ isset($fellowshipInstitute['fellowship_building']) ? $fellowshipInstitute['fellowship_building']  : ''}}</h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">City</h3>
                                                            <h1 class="_detail"> {{ isset($fellowshipInstitute['fellowship_cityId']) ? \App\Models\City::find($fellowshipInstitute['fellowship_cityId'])->city : '' }}</h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">State</h3>
                                                            <h1 class="_detail">{{ isset($fellowshipInstitute['fellowship_stateId']) ? \App\Models\State::find($fellowshipInstitute['fellowship_stateId'])->state : '' }}</h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="row mt-3">
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Zip Code</h3>
                                                            <h1 class="_detail">{{ isset($fellowshipInstitute['fellowship_zipcode']) ? $fellowshipInstitute['fellowship_zipcode'] : ''}}</h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center mb-3">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Name of fellowship program</h3>
                                                            <h1 class="_detail">
                                                               {{ isset($fellowshipInstitute['fellowship_nameOfProgram']) ? $fellowshipInstitute['fellowship_nameOfProgram']  : ''}}
                                                            </h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center mb-3">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Year Started</h3>
                                                            <h1 class="_detail">
                                                               {{ isset($fellowshipInstitute['fellowship_yearStarted']) ? $fellowshipInstitute['fellowship_yearStarted']  : ''}}
                                                            </h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="row mt-3">
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center mb-3">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Year Completed</h3>
                                                            <h1 class="_detail">
                                                               {{ isset($fellowshipInstitute['fellowship_yearEnded']) ? $fellowshipInstitute['fellowship_yearEnded']  : ''}}
                                                            </h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="row mt-3">
                                                   <div class="col-12 col-sm-4">
                                                      <div class="mb-4 viewMapDiv" style="display:none;">
                                                         <div class="card card-body">
                                                            <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q={{$fellowshipMap}}t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             @php $fellowshipCounter++ @endphp
                                          @endforeach
                                       </div>
                                    </li>
                                 @else
                                    <li>
                                       <div class="_card mt-3">
                                          <div class="_card_header">
                                             <div class="title-head">Fellowship Institute Details</div>
                                             <a class="btn btn-info btn-sm ml-2 viewMap"><i class="las la-map-marker"></i>View Map</a>
                                          </div>
                                          <div class="_card_body">
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Name of Institute</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-map-marker circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Address Line 1</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-map-marker circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Address Line 2</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Apt#</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">City</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">State</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Zip Code</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Name of fellowship program</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Year Started</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Year Completed</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="mb-4 viewMapDiv" style="display:none;">
                                                      <div class="card card-body">
                                                         <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                 @endif
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            @endif
            @if ($data->designation_id == '2')
               <!-- Education Details Start -->
               <div class="tab-pane fade" id="EducationDetails" role="tabpanel"  aria-labelledby="v-pills-EducationDetails-tab">
                  <div class="app-card" style="min-height: auto;">
                     <div class="card-header" id="step2">
                        <div class="d-flex align-items-center">
                           <img src="/assets/img/icons/applicant-clinician.svg" alt="" srcset="/assets/img/icons/applicant-clinician.svg" class="_icon mr-2">Education Details
                        </div>
                     </div>
                     <div class="card-body collapse show mt-3" id="collapseWork" aria-labelledby="collapseWork" data-parent="#profileAccordion">
                        <div class="tab-content" id="myTabContent">
                           <div class="tab-pane fade show active" id="MEDICALINSTITUTE" role="tabpanel" aria-labelledby="MEDICALINSTITUTE-tab">
                              <ul>
                                 @php $count = '1'; @endphp
                                 @isset($education_detail)
                                    @foreach($education_detail as $index => $education)
                                    @php
                                       $educationaddress1 = isset($education->address1) ? $education->address1  : '';
                                       $educationaddress2 = isset($education->address2) ? $education->address2  : '';
                                       $educationbuilding = isset($education->building) ? $education->building  : '';
                                       $educationcity = isset($education->city_id) ? \App\Models\City::find($education->city_id)->city : '';
                                       $educationstate = isset($education->state_id) ? \App\Models\State::find($education->state_id)->state : '';
                                       $educationzipcode = isset($education->zipcode) ? $education->zipcode : '';
                                       $educationmap = $educationaddress1 .','. $educationaddress2 .','. $educationbuilding .','. $educationcity .','. $educationstate .','. $educationzipcode;
                                    @endphp
                                    <li>
                                       <div class="_card mt-3">
                                          <div class="_card_header">
                                             <div class="title-head">INSTITUTE {{ $count }}</div>
                                             <a class="btn btn-info btn-sm ml-2 viewMap"><i class="las la-map-marker"></i>View Map</a>
                                          </div>
                                          <div class="_card_body">
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i> </div>
                                                      <div>
                                                         <h3 class="_title">School/College Name</h3>
                                                         <h1 class="_detail">{{ isset($education->name) ? $education->name : null }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-map-marker circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Address Line 1</h3>
                                                         <h1 class="_detail">
                                                            {{ isset($education->address1) ? $education->address1 : null }}
                                                         </h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-map-marker circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Address Line 2</h3>
                                                         <h1 class="_detail">
                                                            {{ isset($education->address2) ? $education->address2 : null }}
                                                         </h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Apt#</h3>
                                                         <h1 class="_detail">  {{ isset($education->building) ? $education->building  : ''}}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">City</h3>
                                                         <h1 class="_detail"> {{ isset($education->city_id) ? \App\Models\City::find($education->city_id)->city : '' }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">State</h3>
                                                         <h1 class="_detail">{{ isset($education->state_id) ? \App\Models\State::find($education->state_id)->state : '' }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Zip Code</h3>
                                                         <h1 class="_detail">{{ isset($education->zipcode) ? $education->zipcode : ''}}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Did you graduate?</h3>
                                                         <h1 class="_detail">{{ isset($education->isGraduate) ? $education->isGraduate : null }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                @if(isset($education->isGraduate))
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Years of Graduation</h3>
                                                         <h1 class="_detail">{{ isset($education->year) ? $education->year : null }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                @endif
                                             </div>
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i> </div>
                                                      <div>
                                                         <h3 class="_title">Degree</h3>
                                                         <h1 class="_detail">{{ isset($education->degree) ? $education->degree : null }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Website</h3>
                                                         <h1 class="_detail">{{ isset($education->website) ? $education->website : null }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="mb-4 viewMapDiv" id="" style="display:none;">
                                                   <div class="card card-body">
                                                         <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q={{$educationmap}}t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                                   </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                    @php $count++; @endphp
                                    @endforeach
                                 @endisset
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="SecurityDetails" role="tabpanel"  aria-labelledby="v-pills-SecurityDetails-tab">
                  <div class="app-card" style="min-height: auto;">
                     <div class="card-header" id="step2">
                        <div class="d-flex align-items-center">
                           <img src="/assets/img/icons/applicant-clinician.svg" alt=""srcset="/assets/img/icons/applicant-clinician.svg" class="_icon mr-2">Security Details
                        </div>
                     </div>
                     <div class="card-body collapse show mt-3" id="collapseWork" aria-labelledby="collapseWork" data-parent="#profileAccordion">
                        <div class="tab-content" id="myTabContent">
                           <div class="tab-pane fade show active" id="MEDICALINSTITUTE" role="tabpanel" aria-labelledby="MEDICALINSTITUTE-tab">
                              <ul>
                                 @isset($security_detail)
                                    <li>
                                       <div class="_card mt-3">
                                          <div class="_card_header"><div class="title-head">Security</div></div>
                                          <div class="_card_body">
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Have you ever bonded?</h3>
                                                         <h1 class="_detail">{{ isset($security_detail->bond) && $security_detail->bond == '1' ? 'Yes' : 'No' }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                @if (isset($security_detail->bond) && $security_detail->bond == '1')
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">If So, Exaplain</h3>
                                                            <h1 class="_detail">{{ isset($security_detail->bond_explain) ? $security_detail->bond_explain : null }}</h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                @endif
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Have you been convicted of a falcony within the last 5 years?</h3>
                                                         <h1 class="_detail">{{ isset($security_detail->convict) && $security_detail->convict == '1' ? 'Yes' : 'No' }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row mt-3">
                                                @if (isset($security_detail->convict) && $security_detail->convict == '1')
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
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
               <div class="tab-pane fade" id="MilitaryDetails" role="tabpanel"  aria-labelledby="v-pills-MilitaryDetails-tab">
                  <div class="app-card" style="min-height: auto;">
                     <div class="card-header" id="step2">
                        <div class="d-flex align-items-center">
                           <img src="/assets/img/icons/applicant-clinician.svg" alt="" srcset="/assets/img/icons/applicant-clinician.svg" class="_icon mr-2">Military
                        </div>
                     </div>
                     <div class="card-body collapse show mt-3" id="collapseWork" aria-labelledby="collapseWork" data-parent="#profileAccordion">
                        <div class="tab-content" id="myTabContent">
                           <div class="tab-pane fade show active" id="MEDICALINSTITUTE" role="tabpanel" aria-labelledby="MEDICALINSTITUTE-tab">
                              <ul>
                                 <li>
                                    <div class="_card mt-3">
                                       <div class="_card_header"><div class="title-head">Military Detail</div></div>
                                       <div class="_card_body">
                                          <div class="row mt-3">
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Have you served in military?</h3>
                                                      <h1 class="_detail">{{ isset($military_detail->isMilitary) && $military_detail->isMilitary == '1' ? 'Yes' : 'No' }}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                             @if(isset($military_detail->isMilitary) && $military_detail->isMilitary == 'true')
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Branch</h3>
                                                         <h1 class="_detail">{{ isset($military_detail->branch) ? $military_detail->branch : null }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Served service</h3>
                                                         <h1 class="_detail">{{ isset($military_detail->serve_start_date) ? $military_detail->serve_start_date : null }} to {{ isset($military_detail->serve_end_date) ? $military_detail->serve_end_date : null }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             @endif
                                          </div>
                                          <div class="row mt-3">
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Do you have any military commitment, including National Guard service that would influence your work schedule?</h3>
                                                      <h1 class="_detail">{{ isset($military_detail->isCommited) && $military_detail->isCommited == '1' ? 'Yes' : 'No' }}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                             @if(isset($military_detail->isCommited)  && $military_detail->isCommited == 'true')
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">If so, explain </h3>
                                                         <h1 class="_detail">
                                                         {{ isset($military_detail->isCommited_explain ) && $military_detail->isCommited_explain == '1' ? 'Yes' : 'No' }}
                                                         </h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             @endif
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Are you a Vietnam veteran? </h3>
                                                      <h1 class="_detail">{{ isset($military_detail->isVietnam) && $military_detail->isVietnam == '1' ? 'Yes' : 'No' }}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="row mt-3">
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Are you a disabled veteran? </h3>
                                                      <h1 class="_detail">{{ isset($military_detail->isDisableVetran ) && $military_detail->isDisableVetran == '1' ? 'Yes' : 'No' }}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Are you a special disabled veteran?</h3>
                                                      <h1 class="_detail">{{ isset($military_detail->isSpecialDisableVereran) && $military_detail->isSpecialDisableVereran == '1' ? 'Yes' : 'No' }}</h1>
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
               <div class="tab-pane fade" id="EmployerDetails" role="tabpanel" aria-labelledby="v-pills-EmployerDetails-tab">
                  <div class="app-card" style="min-height: auto;">
                     <div class="card-header" id="step2">
                        <div class="d-flex align-items-center">
                           <img src="/assets/img/icons/applicant-clinician.svg" alt="" srcset="/assets/img/icons/applicant-clinician.svg" class="_icon mr-2">Employer Details
                        </div>
                     </div>
                     <div class="card-body collapse show mt-3" id="collapseWork" aria-labelledby="collapseWork" data-parent="#profileAccordion">
                        <div class="tab-content" id="myTabContent">
                           <div class="tab-pane fade show active" id="MEDICALINSTITUTE" role="tabpanel" aria-labelledby="MEDICALINSTITUTE-tab">
                              <ul>
                                 @php $count = '1'; @endphp
                                 @isset($employer_detail)
                                    <li>
                                       <div class="_card mt-3">
                                          <div class="_card_header"><div class="title-head">Basic Detail</div></div>
                                          <div class="_card_body">
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Position</h3>
                                                         <h1 class="_detail">{{ isset($employer_detail->position) ? $employer_detail->position : null }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Are you currently employed?</h3>
                                                         <h1 class="_detail">{{ isset($employer_detail->isCurrentEmployee) && $employer_detail->isCurrentEmployee == 'true' ? 'Yes' : 'No' }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                    @if(isset($employer_detail->employer))
                                    @foreach($employer_detail->employer as $index => $employer)
                                       @php
                                          $employer_address1 = isset($employer->address1) ? $employer->address1  : '';
                                          $employer_address2 = isset($employer->address2) ? $employer->address2  : '';
                                          $employer_building = isset($employer->building) ? $employer->building  : '';
                                          $employer_city = isset($employer->city_id) ? \App\Models\City::find($employer->city_id)->city : '';
                                          $employer_state = isset($employer->state_id) ? \App\Models\State::find($employer->state_id)->state : '';
                                          $employer_zipcode = isset($employer->zipcode) ? $employer->zipcode : '';
                                          $employerMap = $employer_address1 .','. $employer_address2 .','. $employer_building .','. $employer_city .','. $employer_state .','. $employer_zipcode;
                                       @endphp
                                       <li>
                                          <div class="_card mt-3">
                                             <div class="_card_header"><div class="title-head">Company {{ $count }}</div>
                                             <a class="btn btn-info btn-sm ml-2 viewMap"><i class="las la-map-marker"></i>View Map</a>
                                          </div>
                                             <div class="_card_body">
                                                <div class="row mt-3">
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                            <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                            <div>
                                                               <h3 class="_title">Company Name</h3>
                                                               <h1 class="_detail">{{ isset($employer->companyName) ? $employer->companyName : null }}</h1>
                                                            </div>
                                                      </div>
                                                      </div>
                                                   @php
                                                      $phoneData = '';
                                                      if(isset($employer->phoneNo)):
                                                      $phoneData = "+".substr($employer->phoneNo, 0, 1)." ". "(".substr($employer->phoneNo, 1, 3).") ".substr($employer->phoneNo, 4, 3)."-".substr($employer->phoneNo,7);
                                                      endif;
                                                   @endphp
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                            <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                            <div>
                                                               <h3 class="_title">Phone No</h3>
                                                               <h1 class="_detail">{{ $phoneData }}</h1>
                                                            </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center mb-3">
                                                         <div><i class="las la-map-marker circle-icon"></i></div>
                                                         <div>
                                                               <h3 class="_title">Address Line 1</h3>
                                                               <h1 class="_detail">
                                                                  {{ isset($employer->address1) ? $employer->address1 : null }}
                                                               </h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="row mt-3">
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center mb-3">
                                                         <div><i class="las la-map-marker circle-icon"></i></div>
                                                         <div>
                                                               <h3 class="_title">Address Line 2</h3>
                                                               <h1 class="_detail">
                                                                  {{ isset($employer->address2) ? $employer->address2 : null }}
                                                               </h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Apt#</h3>
                                                            <h1 class="_detail">  {{ isset($employer->building) ? $employer->building  : ''}}</h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                            <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                            <div>
                                                               <h3 class="_title">City</h3>
                                                               <h1 class="_detail"> {{ isset($employer->city_id) ? \App\Models\City::find($employer->city_id)->city : '' }}</h1>
                                                            </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="row mt-3">
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                            <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                            <div>
                                                               <h3 class="_title">State</h3>
                                                               <h1 class="_detail">{{ isset($employer->state_id) ? \App\Models\State::find($employer->state_id)->state : '' }}</h1>
                                                            </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                            <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                            <div>
                                                               <h3 class="_title">Zip Code</h3>
                                                               <h1 class="_detail">{{ isset($employer->zipcode) ? $employer->zipcode : ''}}</h1>
                                                            </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                            <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                            <div>
                                                               <h3 class="_title">Supervisor</h3>
                                                               <h1 class="_detail">{{ isset($employer->supervisor) ? $employer->supervisor : null }}</h1>
                                                            </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="row mt-3">
                                                   <div class="col-12 col-sm-4">
                                                      <div class="mb-4 viewMapDiv" style="display:none;">
                                                         <div class="card card-body">
                                                            <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q={{$employerMap}}t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </li>
                                       @php $count++; @endphp
                                    @endforeach
                                    @endif
                                 @endisset
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Professional Details End -->
            @endif
            <!-- Deposit Details Start -->
            <div class="tab-pane fade" id="DepositDetails" role="tabpanel" aria-labelledby="v-pills-DepositDetails-tab">
               <div class="app-card" style="min-height: auto;">
                  <div class="card-header" id="step2">
                     <div class="d-flex align-items-center">
                        <img src="/assets/img/icons/deposit-clinician.svg" alt="" srcset="/assets/img/icons/deposit-clinician.svg" class="_icon mr-2">Payroll Details
                     </div>
                  </div>
                  <div class="card-body collapse show" id="collapseWork" aria-labelledby="collapseWork" data-parent="#profileAccordion">
                     <div class="row mt-3">
                        <div class="col-12 col-sm-12">
                           <div class="_card mt-3">
                              <div class="_card_header"><div class="title-head">DIRECT DEPOSIT INFORMATION FOR YOUR EARNINGS</div></div>
                              <div class="_card_body">
                                 <div class="row mt-3">
                                    <div class="col-12 col-sm-12">
                                       <div class="d-flex align-items-center">
                                          <div><i class="las la-angle-double-right circle-icon"></i></div>
                                          <div>
                                             <h3 class="_title">How do you files your tax?<span class="text-info"></span></h3>
                                             <h1 class="_detail">{{ isset($payroll_details['filesyourtax']) ? $payroll_details['filesyourtax'] : null }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row mt-3">
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div><i class="las la-angle-double-right circle-icon"></i></div>
                                          <div>
                                             <h3 class="_title">No. of dependent children's(under age 17)?<span class="text-info"></span></h3>
                                             <h1 class="_detail">{{ isset($payroll_details['childrendependents']) ? $payroll_details['childrendependents'] : null }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div><i class="las la-angle-double-right circle-icon"></i></div>
                                          <div>
                                             <h3 class="_title">Any other dependent's?<span class="text-info"></span></h3>
                                             <h1 class="_detail">{{ isset($payroll_details['otherdependents']) ? $payroll_details['otherdependents'] : null }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div><i class="las la-angle-double-right circle-icon"></i></div>
                                          <div>
                                             <h3 class="_title">Total dependent<span class="text-info"></span></h3>
                                             <h1 class="_detail">{{ isset($payroll_details['totaldependents']) ? $payroll_details['totaldependents'] : null }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row mt-3">
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div><i class="las la-angle-double-right circle-icon"></i></div>
                                          <div>
                                             <h3 class="_title">Total claim money<span class="text-info"></span></h3>
                                             <h1 class="_detail">{{ isset($payroll_details['totalClaimAmount']) ? $payroll_details['totalClaimAmount'] : null }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="_card mt-3">
                              <div class="_card_header"><div class="title-head">Bank Information</div></div>
                              <div class="_card_body">
                                 <div class="row mt-3">
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div><i class="las la-angle-double-right circle-icon"></i></div>
                                          <div>
                                             <h3 class="_title">Bank name<span class="text-info"></span></h3>
                                             <h1 class="_detail">{{ isset($payroll_details['nameOfBank']) ? $payroll_details['nameOfBank'] : null }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div><i class="las la-angle-double-right circle-icon"></i></div>
                                          <div>
                                             <h3 class="_title">Account holder name</h3>
                                             <h1 class="_detail">{{ isset($payroll_details['nameOfAccount']) ? $payroll_details['nameOfAccount'] : null }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div><i class="las la-angle-double-right circle-icon"></i></div>
                                          <div>
                                             <h3 class="_title">Type of account</h3>
                                             <h1 class="_detail">{{ isset($payroll_details['typeOfAccount']) ? $payroll_details['typeOfAccount'] : null }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row mt-3">
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div><i class="las la-angle-double-right circle-icon"></i></div>
                                          <div>
                                             <h3 class="_title">Bank Routing Number <span class="text-info"></span></h3>
                                             <h1 class="_detail">{{ isset($payroll_details['routingNumber']) ? $payroll_details['routingNumber'] : null }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div><i class="las la-angle-double-right circle-icon"></i></div>
                                          <div>
                                             <h3 class="_title">Account number <span class="text-info"></span></h3>
                                             <h1 class="_detail">{{ isset($payroll_details['accountNumber']) ? $payroll_details['accountNumber'] : null }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="_card mt-3">
                              <div class="_card_header"><div class="title-head">Tax Information</div></div>
                              <div class="_card_body">
                                 <div class="row mt-3">
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div><i class="las la-angle-double-right circle-icon"></i></div>
                                          <div>
                                             <h3 class="_title">Are you filing as a entity?<span class="text-info"></span></h3>
                                             <h1 class="_detail">{{ isset($payroll_details['are_you_filing_as_a_entity']) && $payroll_details['are_you_filing_as_a_entity'] == 'true' ? 'Yes' : 'No' }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                    @if ($data->designation_id != '2')
                                       <div class="col-12 col-sm-4">
                                          <div class="d-flex align-items-center">
                                             <div><i class="las la-angle-double-right circle-icon"></i></div>
                                             <div>
                                                <h3 class="_title">Legal name of entity<span class="text-info"></span></h3>
                                                <h1 class="_detail">{{ isset($payroll_details['legal_entity']) ? $payroll_details['legal_entity'] : null }}</h1>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-12 col-sm-4">
                                          <div class="d-flex align-items-center">
                                             <div><i class="las la-angle-double-right circle-icon"></i></div>
                                             <div>
                                                <h3 class="_title">Taxpayer identification number<span class="text-info"></span></h3>
                                                <h1 class="_detail">{{ isset($payroll_details['taxpayer_id_number']) ? $payroll_details['taxpayer_id_number'] : null }}</h1>
                                             </div>
                                          </div>
                                       </div>
                                    @endif
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Deposit Details End -->
            @if ($data->designation_id != '2')
               <div class="tab-pane fade" id="WorkHistoryDetails" role="tabpanel"  aria-labelledby="v-pills-WorkHistoryDetails-tab">
                  <div class="app-card" style="min-height: auto;">
                     <div class="card-header" id="step2">
                        <div class="d-flex align-items-center">
                           <img src="/assets/img/icons/applicant-clinician.svg" alt="" srcset="/assets/img/icons/applicant-clinician.svg" class="_icon mr-2">Work History Details
                        </div>
                     </div>
                     <div class="card-body collapse show mt-3" id="collapseWork" aria-labelledby="collapseWork" data-parent="#profileAccordion">
                        <div class="tab-content" id="myTabContent">
                           <div class="tab-pane fade show active" id="MEDICALINSTITUTE" role="tabpanel" aria-labelledby="MEDICALINSTITUTE-tab">
                              <ul>
                                 <li>
                                    <div class="_card mt-3">
                                       <div class="_card_header"><div class="title-head">Position Desired</div></div>
                                       <div class="_card_body">
                                          <div class="row mt-3">
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Position</h3>
                                                      <h1 class="_detail">{{ isset($workHistory_detail['position']) ? $workHistory_detail['position'] : ''}}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Are you currently employed?</h3>
                                                      <h1 class="_detail"> {{ isset($workHistory_detail['isCurrentEmployee']) && $workHistory_detail['isCurrentEmployee'] == 'true' ? 'Yes' : 'No' }}
                                                         </h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-12">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">It is been noted that the large gap in your work history is due to taking time off</h3>
                                                      <h1 class="_detail">{{ isset($workHistory_detail['gapReason']) ? $workHistory_detail['gapReason'] : ''}}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                                 @php $count = '1'; @endphp
                                 @isset($workHistory_detail['list'])
                                    @foreach($workHistory_detail['list'] as $index => $workHistory)
                                       @php
                                          $workHistory_address1 = isset($workHistory['address1']) ? $workHistory['address1']  : '';
                                          $workHistory_address2 = isset($workHistory['address2']) ? $workHistory['address2']  : '';
                                          $workHistory_building = isset($workHistory['building']) ? $workHistory['building']  : '';
                                          $workHistory_city = isset($workHistory['city_id']) ? \App\Models\City::find($workHistory['city_id'])->city : '';
                                          $workHistory_state = isset($workHistory['state_id']) ? \App\Models\State::find($workHistory['state_id'])->state : '';
                                          $workHistory_zipcode = isset($workHistory['zipcode']) ? $workHistory['zipcode'] : '';
                                          $workHistoryMap = $workHistory_address1 .','. $workHistory_address2 .','. $workHistory_building .','. $workHistory_city .','. $workHistory_state .','. $workHistory_zipcode;
                                       @endphp
                                       <li>
                                          <div class="_card mt-3">
                                             <div class="_card_header">
                                                <div class="title-head">Work History {{ $count }}</div>
                                                <a class="btn btn-info btn-sm ml-2 viewMap"><i class="las la-map-marker"></i>View Map</a>
                                             </div>
                                             <div class="_card_body">
                                                <div class="row mt-3">
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                         <div><i class="las la-angle-double-right circle-icon"></i> </div>
                                                         <div>
                                                            <h3 class="_title">Employer Name</h3>
                                                            <h1 class="_detail">{{ isset($workHistory['companyName']) ? $workHistory['companyName'] : null }}</h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Position/Title</h3>
                                                            <h1 class="_detail">{{ isset($workHistory['position']) ? $workHistory['position'] : null }}</h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center mb-3">
                                                         <div><i class="las la-map-marker circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Address Line 1</h3>
                                                            <h1 class="_detail">
                                                               {{ isset($workHistory['address1']) ? $workHistory['address1'] : null }}
                                                            </h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="row mt-3">
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center mb-3">
                                                         <div><i class="las la-map-marker circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Address Line 2</h3>
                                                            <h1 class="_detail">
                                                               {{ isset($workHistory['address2']) ? $workHistory['address2'] : null }}
                                                            </h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Apt#</h3>
                                                            <h1 class="_detail">  {{ isset($workHistory['building']) ? $workHistory['building']  : ''}}</h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">City</h3>
                                                            <h1 class="_detail"> {{ isset($workHistory['cityId']) ? \App\Models\City::find($workHistory['cityId'])->city : '' }}</h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="row mt-3">
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">State</h3>
                                                            <h1 class="_detail">{{ isset($workHistory['stateId']) ? \App\Models\State::find($workHistory['stateId'])->state : '' }}</h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Zip Code</h3>
                                                            <h1 class="_detail">{{ isset($workHistory['zipCode']) ? $workHistory['zipCode'] : ''}}</h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Start Date</h3>
                                                            <h1 class="_detail">{{ isset($workHistory['startDate']) ? $workHistory['startDate'] : null }}</h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                @if(isset($workHistory_detail['isCurrentEmployee']) && $workHistory_detail['isCurrentEmployee'] == 'false')
                                                <div class="row mt-3">
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">End Date</h3>
                                                            <h1 class="_detail">{{ isset($workHistory['endDate']) ? $workHistory['endDate'] : null }}</h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <!-- <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                         <div><i class="las la-angle-double-right circle-icon"></i> </div>
                                                         <div>
                                                            <h3 class="_title">Record Id</h3>
                                                            <h1 class="_detail">{{ isset($workHistory['recordId']) ? $workHistory['recordId'] : null }}</h1>
                                                         </div>
                                                      </div>
                                                   </div> -->
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Reason of separation</h3>
                                                            <h1 class="_detail">{{ isset($workHistory['reason']) ? $workHistory['reason'] : null }}</h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                @endif
                                                <div class="row mt-3">
                                                   <div class="col-12 col-sm-4">
                                                      <div class="mb-4 viewMapDiv" style="display:none;">
                                                         <div class="card card-body">
                                                            <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q={{$workHistoryMap}}t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </li>
                                       @php $count++; @endphp
                                    @endforeach
                                 @else
                                    <li>
                                       <div class="_card mt-3">
                                          <div class="_card_header">
                                             <div class="title-head">Work History</div>
                                             <a class="btn btn-info btn-sm ml-2 viewMap"><i class="las la-map-marker"></i>View Map</a>
                                          </div>
                                          <div class="_card_body">
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i> </div>
                                                      <div>
                                                         <h3 class="_title">Employer Name</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Position/Title</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-map-marker circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Address Line 1</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-map-marker circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Address Line 2</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Apt#</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">City</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">State</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Zip Code</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Start Date</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">End Date</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Reason of separation</h3>
                                                         <h1 class="_detail"></h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="mb-4 viewMapDiv" style="display:none;">
                                                      <div class="card card-body">
                                                         <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                                      </div>
                                                   </div>
                                                </div>
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

            @endif
            <div class="tab-pane fade" id="ProfessionalDetails" role="tabpanel"  aria-labelledby="v-pills-ProfessionalDetails-tab">
               <div class="app-card" style="min-height: auto;">
                  <div class="card-header" id="step2">
                     <div class="d-flex align-items-center">
                        <img src="/assets/img/icons/applicant-clinician.svg" alt="" srcset="/assets/img/icons/applicant-clinician.svg" class="_icon mr-2">Professional Details
                     </div>
                  </div>
                  <div class="card-body collapse show mt-3" id="collapseWork" aria-labelledby="collapseWork" data-parent="#profileAccordion">
                     <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="MEDICALINSTITUTE" role="tabpanel" aria-labelledby="MEDICALINSTITUTE-tab">
                           <ul>
                              @isset($professional_detail)
                                 <li>
                                    <div class="_card mt-3">
                                       <div class="_card_header"><div class="title-head">Medicare Detail</div></div>
                                       <div class="_card_body">
                                          <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                            <h3 class="_title">Medicare Enrolled</h3>
                                                            <h1 class="_detail">
                                                               {{ isset($professional_detail['medicareEnrolled']) && $professional_detail['medicareEnrolled'] == 'true' ? 'Yes' : 'No' }}
                                                            </h1>
                                                      </div>
                                                   </div>
                                                </div>
                                          </div>
                                          @php $child1Count = 1; @endphp
                                          @if(isset($professional_detail['medicare']))
                                          @foreach($professional_detail['medicare'] as $medicare)
                                          <div class="row mt-3">
                                             <div class="col-12 col-sm-12"><div class="_card_header"><div class="title-head">Medicare {{ $child1Count }}</div></div></div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                   <h3 class="_title">State</h3>
                                                   <h1 class="_detail">{{ isset($medicare['StateID']) ? \App\Models\State::find($medicare['StateID'])->state : '' }}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center mb-3">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                   <h3 class="_title">Medicare Number(PTAN)</h3>
                                                   <h1 class="_detail">
                                                         {{ isset($medicare['Number']) ? $medicare['Number'] : null }}
                                                   </h1>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          @php $child1Count++; @endphp
                                          @endforeach
                                          @endif
                                       </div>
                                    </div>
                                    <div class="_card mt-3">
                                       <div class="_card_header"><div class="title-head">Medicaid Detail</div></div>
                                       <div class="_card_body">
                                          <div class="row mt-3">
                                             <div class="col-12 col-sm-12">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Medicaid Enrolled</h3>
                                                      <h1 class="_detail">
                                                      {{ isset($professional_detail['medicaidEnrolled']) && $professional_detail['medicaidEnrolled'] == 'true' ? 'Yes' : 'No' }}
                                                      </h1>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          @php $child2Count = 1; @endphp
                                          @if(isset($professional_detail['medicaid']))
                                          @foreach($professional_detail['medicaid'] as $medicaid)
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-12"><div class="_card_header"><div class="title-head">Medicaid {{ $child2Count }}</div></div></div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">State</h3>
                                                         <h1 class="_detail">{{ isset($medicaid['StateID']) ? \App\Models\State::find($medicaid['StateID'])->state : '' }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Medicaid Number</h3>
                                                         <h1 class="_detail">
                                                            {{ isset($medicaid['Number']) ? $medicaid['Number'] : null }}
                                                         </h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             @php $child2Count++; @endphp
                                          @endforeach
                                          @endif
                                       </div>
                                    </div>
                                    <div class="_card mt-3">
                                       <div class="_card_body">
                                          <div class="row mt-3">
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Age range you treated</h3>
                                                      <h1 class="_detail">
                                                    
                                                      @if($professional_detail && isset($professional_detail['age_0_18']))
                                                         Age 0 to 18,
                                                      @endif
                                                      @if($professional_detail && $professional_detail['age_19_40'])
                                                         Age 19 to 40,
                                                      @endif
                                                      @if($professional_detail && $professional_detail['age_41_65'])
                                                         Age 41 to 65,
                                                      @endif
                                                      @if($professional_detail && $professional_detail['age_65Plus'])
                                                         Age 65+,
                                                      @endif
                                                    
                                                      </h1>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="_card mt-3">
                                       <div class="_card_header"><div class="title-head">State License Information</div></div>
                                       <div class="_card_body">
                                          @php $child3Count = 1; @endphp
                                          @if(isset($professional_detail['stateLicense']))
                                          @foreach($professional_detail['stateLicense'] as $stateLicense)
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-12"><div class="_card_header"><div class="title-head">State License {{ $child3Count }}</div></div></div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">State</h3>
                                                         <h1 class="_detail">{{ isset($stateLicense['StateID']) ? \App\Models\State::find($stateLicense['StateID'])->state : '' }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">License Number</h3>
                                                         <h1 class="_detail">
                                                            {{ isset($stateLicense['Number']) ? $stateLicense['Number'] : null }}
                                                         </h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Categories</h3>
                                                         <h1 class="_detail">{{ isset($stateLicense['Category']) ? $stateLicense['Category'] : '' }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             @php $child3Count++; @endphp
                                          @endforeach
                                          @endif
                                       </div>
                                    </div>
                                    <div class="_card mt-3">
                                       <div class="_card_header"><div class="title-head">Board Certificates</div></div>
                                       <div class="_card_body">
                                          @php $child4Count = 1; @endphp
                                          @if(isset($professional_detail['boardCertificate']))
                                          @foreach($professional_detail['boardCertificate'] as $boardCertificate)
                                             <div class="_card_header"><div class="title-head">Board Certificate {{ $child4Count }}</div></div>
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Certifing Board</h3>
                                                         <h1 class="_detail">{{ isset($boardCertificate['certificate']) ? $boardCertificate['certificate'] : '' }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Board Certified</h3>
                                                         <h1 class="_detail">
                                                            {{ isset($boardCertificate['isBoardCertified']) && $boardCertificate['isBoardCertified'] == '1' ? 'Yes' : 'No' }}
                                                         </h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Board Eligible</h3>
                                                         <h1 class="_detail">
                                                            {{ isset($boardCertificate['isBoardEligible']) && $boardCertificate['isBoardEligible'] == '1' ? 'Yes' : 'No' }}
                                                         </h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row mt-3">
                                                @if ($data->designation_id == '4')
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">NCCPA Id</h3>
                                                         <h1 class="_detail">{{ isset($boardCertificate['nccpa_id']) ? $boardCertificate['nccpa_id'] : '' }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Certification Number</h3>
                                                         <h1 class="_detail">
                                                            {{ isset($boardCertificate['nccpa_certificate_number']) ? $boardCertificate['nccpa_certificate_number'] : null }}
                                                         </h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                @endif
                                                <!--<div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Website</h3>
                                                         <h1 class="_detail">
                                                            {{ isset($boardCertificate['website']) ? $boardCertificate['website'] : null }}
                                                         </h1>
                                                      </div>
                                                   </div>
                                                </div>-->
                                             </div>
                                             <!--<div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Speciality Type</h3>
                                                         <h1 class="_detail">
                                                            {{ isset($boardCertificate['specialtyType']) ? $boardCertificate['specialtyType'] : null }}
                                                         </h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Agency Acronym</h3>
                                                         <h1 class="_detail">
                                                            {{ isset($boardCertificate['agencyAcronym']) ? $boardCertificate['agencyAcronym'] : null }}
                                                         </h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Certification Agency</h3>
                                                         <h1 class="_detail">
                                                            {{ isset($boardCertificate['certificationAgency']) ? $boardCertificate['certificationAgency'] : null }}
                                                         </h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div> -->
                                             @php $child4Count++; @endphp
                                          @endforeach
                                          @endif
                                       </div>
                                    </div>
                                    @php
                                       $professional_address1 = isset($professional_detail['npa_address1']) ? $professional_detail['npa_address1']  : '';
                                       $professional_address2 = isset($professional_detail['npa_address2']) ? $professional_detail['npa_address2']  : '';
                                       $professional_building = isset($professional_detail['npa_building']) ? $professional_detail['npa_building']  : '';
                                     
                                       if (isset($professional_detail['npa_cityId'])):
                                          $professional_city = \App\Models\City::find($professional_detail['npa_cityId'])->city;
                                       else:
                                          $professional_city = isset($professional_detail['npa_city']) ? $professional_detail['npa_city'] : '';
                                       endif;

                                       if (isset($professional_detail['npa_stateId'])):
                                          $professional_state = \App\Models\State::find($professional_detail['npa_stateId'])->state;
                                       else:
                                          $professional_state = isset($professional_detail['npa_state']) ? $professional_detail['npa_state'] : '';
                                       endif;

                                       $professional_zipcode = isset($professional_detail['npa_zipCode']) ? $professional_detail['npa_zipCode'] : '';
                                       $professionalMap = $professional_address1 .','. $professional_address2 .','. $professional_building .','. $professional_city .','. $professional_state .','. $professional_zipcode;
                                    @endphp
                                    <div class="_card mt-3">
                                       <div class="_card_header"><div class="title-head">Federal DEA</div></div>
                                       <div class="_card_body">
                                          <div class="row mt-3">
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Federal DEA Id</h3>
                                                      <h1 class="_detail">{{ isset($professional_detail['federal_DEA_id']) ? $professional_detail['federal_DEA_id'] : null }}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Expire Month/Year</h3>
                                                      <h1 class="_detail">{{ isset($professional_detail['fedExpiredMonthYear']) ? $professional_detail['fedExpiredMonthYear'] : '' }}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="_card mt-3">
                                       <div class="_card_header"><div class="title-head">NPI</div><a class="btn btn-info btn-sm ml-2 viewMap"><i class="las la-map-marker"></i>View Map</a></div>
                                       <div class="_card_body">
                                          <div class="row mt-3">
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">NPI Number</h3>
                                                      <h1 class="_detail">{{ isset($professional_detail['npiNumber']) ? $professional_detail['npiNumber'] : null }}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i> </div>
                                                   <div>
                                                      <h3 class="_title">NPI Type</h3>
                                                      <h1 class="_detail">{{ isset($professional_detail['npiType']) ? $professional_detail['npiType'] : null }}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                             @if(isset($professional_detail['npiType']) && ($professional_detail['npiType'] == 'Individuan' || $professional_detail['npiType'] == 'Organization'))
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i> </div>
                                                   <div>
                                                      <h3 class="_title">NPI Organisation Name</h3>
                                                      <h1 class="_detail">{{ isset($professional_detail['npiOrgName']) ? $professional_detail['npiOrgName'] : null }}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                             @endif
                                          </div>
                                          <div class="row mt-3">
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center mb-3">
                                                   <div><i class="las la-map-marker circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Address Line 1</h3>
                                                      <h1 class="_detail">
                                                         {{ isset($professional_detail['npa_address1']) ? $professional_detail['npa_address1']  : ''}}
                                                      </h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center mb-3">
                                                   <div><i class="las la-map-marker circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Address Line 2</h3>
                                                      <h1 class="_detail">
                                                      {{ isset($professional_detail['npa_address2']) ? $professional_detail['npa_address2']  : ''}}
                                                      </h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Apt#</h3>
                                                      <h1 class="_detail">  {{ isset($professional_detail['npa_building']) ? $professional_detail['npa_building']  : ''}}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="row mt-3">
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">City</h3>
                                                      <h1 class="_detail"> 
                                                         @if (isset($professional_detail['npa_cityId']))
                                                            {{ \App\Models\City::find($professional_detail['npa_cityId'])->city }}
                                                         @else
                                                            {{ isset($professional_detail['npa_city']) ? $professional_detail['npa_city'] : '' }}
                                                         @endif</h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">State</h3>
                                                      <h1 class="_detail">
                                                         @if (isset($professional_detail['npa_stateId']))
                                                            {{ \App\Models\State::find($professional_detail['npa_stateId'])->state }}
                                                         @else
                                                            {{ isset($professional_detail['npa_state']) ? $professional_detail['npa_state'] : '' }}
                                                         @endif
                                                     </h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Zip Code</h3>
                                                      <h1 class="_detail">{{ isset($professional_detail['npa_zipCode']) ? $professional_detail['npa_zipCode'] : ''}}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="row mt-3">
                                             <div class="col-12 col-sm-12">
                                                <div class="d-flex align-items-center mb-3">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Taxonomy Description</h3>
                                                      <h1 class="_detail">
                                                         {{ isset($professional_detail['taxonomyDescription']) ? $professional_detail['taxonomyDescription'] : null }}
                                                      </h1>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="row mt-3">
                                             <div class="col-12 col-sm-4">
                                                <div class="mb-4 viewMapDiv" style="display:none;">
                                                   <div class="card card-body">
                                                      <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q={{$professionalMap}}t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="_card mt-3">
                                       <div class="_card_header"><div class="title-head">CAQH</div></div>
                                       <div class="_card_body">
                                          <div class="row mt-3">
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">CAQH Id</h3>
                                                      <h1 class="_detail">{{ isset($professional_detail['caqh_id']) ? $professional_detail['caqh_id'] : null }}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">CAQH User</h3>
                                                      <h1 class="_detail">{{ isset($professional_detail['caqh_user']) ? $professional_detail['caqh_user'] : '' }}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">CAQH Password</h3>
                                                      <h1 class="_detail">{{ isset($professional_detail['caqh_password']) ? $professional_detail['caqh_password'] : '' }}</h1>
                                                   </div>
                                                </div>
                                             </div>
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

            <!-- Verify Identity Start -->
            <!-- <div class="tab-pane fade" id="VerifyIdentity" role="tabpanel" aria-labelledby="v-pills-VerifyIdentity-tab">
               <div class="app-card" style="min-height: auto;">
                  <div class="card-header" id="step2">
                     <div class="d-flex align-items-center">
                        <img src="/assets/img/icons/identity-clinician.svg" alt=""srcset="/assets/img/icons/identity-clinician.svg" class="_icon mr-2">Verify Identity
                     </div>
                     <hr>
                  </div>
                  <div class="card-body collapse show" id="collapseWork" aria-labelledby="collapseWork" data-parent="#profileAccordion">
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
                                       <div class="row mt-3">
                                          <div class="col-12 col-sm-12">
                                             <div class="form-group">
                                                <div class="row mt-3">
                                                   <div class="col-12 col-sm-4">
                                                      <div>
                                                         <div class="d-flex align-items-center">
                                                            <div><i class="las la-phone circle-icon"></i></div>
                                                            <div>
                                                               <h3 class="_title">Phone number</h3>
                                                               <h1 class="_detail">{{ isset($data->applicant->phone) ? $data->applicant->phone : null }}</h1>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">SSN</h3>
                                                            <h1 class="_detail">{{ isset($data->applicant->ssn) ? $data->applicant->ssn : null }}</h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                         <div><i class="las la-calendar circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Date of Birth</h3>
                                                            <h1 class="_detail">{{ isset($data->dob) ? date('m/d/Y', strtotime($data->dob)) : null }}</h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
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
                                       <h1 class="_title"><span style="font-weight: bold;">Ans:</span> Phoenix</h1>
                                    </div>
                                 </div>
                                 <div class="_card mt-3">
                                    <div class="_card_header">
                                       <div class="title-head"><span style="font-weight: bold;">Q:</span>
                                          Which of the following is the street number of your recent previous address?
                                       </div>
                                    </div>
                                    <div class="_card_body">
                                       <h1 class="_title"><span style="font-weight: bold;">Ans:</span> 1109</h1>
                                    </div>
                                 </div>
                                 <div class="_card mt-3">
                                    <div class="_card_header">
                                       <div class="title-head"><span style="font-weight: bold;">Q:</span>
                                          Which of the following is the street name of your most recent previus address?
                                       </div>
                                    </div>
                                    <div class="_card_body">
                                       <h1 class="_title"><span style="font-weight: bold;">Ans:</span>Carriage way</h1>
                                    </div>
                                 </div>
                                 <div class="_card mt-3">
                                    <div class="_card_header">
                                       <div class="title-head"><span style="font-weight: bold;">Q:</span>
                                          Which year was your most recent mortage established?
                                       </div>
                                    </div>
                                    <div class="_card_body">
                                       <h1 class="_title"><span style="font-weight: bold;">Ans:</span> 1996</h1>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div> -->
            <!-- Verify Identity End -->
            <!--  Documents Verifiaction Start -->
            <div class="tab-pane fade" id="DocumentsVerifiaction" role="tabpanel" aria-labelledby="v-pills-DocumentsVerifiaction-tab">
               <div class="app-card" style="min-height: auto;">
                  <div class="card-header" id="step2">
                     <div class="d-flex align-items-center">
                        <img src="/assets/img/icons/document-clinician.svg" alt="" srcset="/assets/img/icons/document-clinician.svg" class="_icon mr-2">Documents Verifiaction
                     </div>
                     <hr>
                  </div>
                  <div class="card-body collapse show" id="collapseWork" aria-labelledby="collapseWork" data-parent="#profileAccordion">

                     <div class="row mt-3">
                        <div class="col-12 col-sm-12">
                           <div class="_card mt-3">
                              @php
                                 $malpractice_Insurance = ($document_information && isset($document_information['malpractice_Insurance'])) ? $document_information['malpractice_Insurance'] : '';
                                 $ECFMG_Info = ($document_information && isset($document_information['ECFMG_Info'])) ? $document_information['ECFMG_Info'] : '';
                              @endphp
                              <div class="_card_header"><div class="title-head">Malpractice Insurance</div></div>
                              <div class="_card_body">
                                 <div class="row mt-3">
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div><i class="las la-angle-double-right circle-icon"></i></div>
                                          <div>
                                             <h3 class="_title">Carrier Name<span class="text-info"></span></h3>
                                             <h1 class="_detail">
                                                @if(isset($malpractice_Insurance['carrierName']) && $malpractice_Insurance['carrierName'] != 'Other')
                                                   {{ isset($malpractice_Insurance['carrierName']) ? $malpractice_Insurance['carrierName'] : '' }}
                                                @else
                                                   {{ isset($malpractice_Insurance['otherCarrierName']) ? $malpractice_Insurance['otherCarrierName'] : '' }}
                                                @endif
                                             </h1>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div><i class="las la-angle-double-right circle-icon"></i></div>
                                          <div>
                                             <h3 class="_title">Policy Number<span class="text-info"></span></h3>
                                             <h1 class="_detail">{{ isset($malpractice_Insurance['policy_number']) ? $malpractice_Insurance['policy_number'] : '' }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div><i class="las la-angle-double-right circle-icon"></i></div>
                                          <div>
                                             <h3 class="_title">Effective Date<span class="text-info"></span></h3>
                                             <h1 class="_detail">{{ isset($malpractice_Insurance['effectiveDate']) ? $malpractice_Insurance['effectiveDate'] : '' }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row mt-3">
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div><i class="las la-angle-double-right circle-icon"></i></div>
                                          <div>
                                             <h3 class="_title">Termination Date<span class="text-info"></span></h3>
                                             <h1 class="_detail">
                                                {{ isset($malpractice_Insurance['terminationDate']) ? $malpractice_Insurance['terminationDate'] : '' }}
                                             </h1>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="_card_header"><div class="title-head">ECFMG Information</div></div>
                              <div class="_card_body">
                                 <div class="row mt-3">
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div><i class="las la-angle-double-right circle-icon"></i></div>
                                          <div>
                                             <h3 class="_title">ECFMG Id<span class="text-info"></span></h3>
                                             <h1 class="_detail">{{ isset($ECFMG_Info['ECFMG_id']) ? $ECFMG_Info['ECFMG_id'] : '' }}
                                             </h1>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row mt-3">
                        <div class="col-12 col-sm-12">
                           <div class="_card mt-3">
                              <div class="_card_header"><div class="title-head">Documents</div></div>
                              <div class="_card_body">
                                 <div class="row mt-3">
                                    <table class="table_doc" cellspacing="15">
                                       <tr>
                                          <td>
                                             <table class="table_doc" cellspacing="15">
                                                <tbody>
                                                   @php $count1 = 1; @endphp
                                                   @foreach (config('select.document_type_left') as $key => $document_type)
                                                      <tr>
                                                         <td>{{ $count1 }}</td>
                                                         <td><a class="nav-link active view_document" data-id="{{  $data->id }}" data-type="{{ $key }}" href="#" data-action="document">{{ $document_type }}</a></td>
                                                      </tr>
                                                      @php $count1 = $count1 + 2; @endphp
                                                   @endforeach
                                                </tbody>
                                             </table>
                                          </td>
                                          <td>
                                             <table class="table_doc" cellspacing="15">
                                                <tbody>
                                                   @php $count2 = 2; @endphp
                                                   @foreach (config('select.document_type_right') as $key => $document_type)
                                                      <tr>
                                                      <td>{{ $count2 }}</td>
                                                         <td><a class="nav-link active view_document" data-id="{{ $data->id }}" data-type="{{ $key }}" href="#" data-action="document">{{ $document_type }}</a></td>
                                                      </tr>
                                                      @php $count2 = $count2 + 2; @endphp
                                                   @endforeach
                                                </tbody>
                                             </table>
                                          </td>
                                       </tr>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--  Documents Verifiaction End -->

            <!--  Scan Report Start -->
            <div class="tab-pane fade" id="ScanReport" role="tabpanel" aria-labelledby="v-pills-ScanReport-tab">
               <div class="app-card" style="min-height: auto;">
                  <div class="card-header" id="step2">
                     <div class="d-flex align-items-center">
                        <img src="/assets/img/icons/document-clinician.svg" alt="" srcset="/assets/img/icons/document-clinician.svg" class="_icon mr-2">Credentialing Detail
                        <!-- <a href="javascript:void(0)" data-toggle="tooltip" data-id="{{ $data->id }}" data-original-title="Scrapping" class="btn btn-primary btn-gray shadow-sm btn--sm mr-2 " >Scrapping</a> -->
                        <div class="button-control mt-4 mb-4" id="printBtn">
                           <button type="button" onclick="doaction()" class="btn btn-primary btn-warning shadow-sm btn--sm mr-2" data-toggle="tooltip" data-placement="left" title="" data-original-title="Accept">Print <i class="fa fa-spinner fa-spin" id="loader" style="display:none;"></i></button>
                          
                           <!-- <a class="bulk-upload-btn" href="{{ route('scrapedpdf') }}"style="margin-left: 10px;"><img src="{{ asset('assets/img/icons/bulk-upload-icon.svg') }}" class="icon mr-2" />Print</a> -->
                        </div>
                        
                     </div>
                     <hr>
                  </div>
                  <div class="card-body collapse show" id="collapseWork" aria-labelledby="collapseWork" data-parent="#profileAccordion">
                     <div class="row mt-3">
                        <div class="col-12 col-sm-12">
                           <div class="_card mt-3">
                              <div class="_card_body">
                                 <form id="search_form" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                       <div class="row">
                                          <div class="col-2 col-sm-2 col-md-2">
                                             <div class="input-group">
                                                <input type="text" class="form-control" name="start_date" id="start_date" placeholder="From(Year and month only)" autocomplete="false">
                                             </div>
                                          </div>
                                          <div class="col-2 col-sm-2 col-md-2">
                                             <div class="input-group">
                                                <input type="text" class="form-control" name="end_date" id="end_date" placeholder="To(Year and month only)" autocomplete="false">
                                             </div>
                                          </div>
                                          <div class="col-2 col-sm-2 col-md-2">
                                             <div class="input-group">
                                                <select name="month" id="month" class="form-control form-control-lg">
                                                   <option selected="selected" value="">Select a month</option>
                                                   @foreach (config('select.month') as $key => $month)
                                                         <option value="{{ $key }}" {{($key == $currentMonth) ? 'selected=""' : ''}}>{{$month}}</option>
                                                   @endforeach
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-2 col-sm-2 col-md-2">
                                             <div class="input-group">
                                                <select name="year" id="year" class="form-control form-control-lg">
                                                   <option selected="selected" value="">Select a year</option>
                                                   @foreach (config('select.year') as $key => $year)
                                                         <option value="{{ $key}}">{{$year}}</option>
                                                   @endforeach
                                                </select>
                                             </div>
                                          </div>
                                          <input type="hidden" name="currentMonth" value="current">
                                          <div class="col-2 col-sm-2 col-md-2">
                                             <div class="input-group">
                                                <div class="card cardId" >
                                                   <div id="list1" class="listId" style="height: 90px;overflow-y: scroll;">
                                                      <div class="form-check">
                                                         <div class="col-md-12"><div class="checkbox"><label><input type="checkbox" id="selectAll" name="allsites" value="all"><span class="checkbtn">All Sites</span></label></div></div>
                                                      </div>
                                                      @foreach ($mapId as $sites)
                                                         <div class="form-check">
                                                            <div class="col-md-12"><div class="checkbox"><label><input type="checkbox" id="{{ $sites->id }}" class="sites" value="{{ $sites->siteInfo->sites_name }}" onchange="tableshow('{{ $sites->id }}','{{$sites->siteInfo->sites_name}}')"><span class="checkbtn">{{ ucfirst($sites->siteInfo->sites_name) }}</span></label></div></div>
                                                         </div>
                                                      @endforeach
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-5 col-sm-5 col-md-5">
                                             <div class="input-group">

                                                <button class="btn btn-primary" type="button" id="filter_btn">Apply</button>
                                                <button class="btn btn-primary reset_btn" type="button" id="reset_btn" style="margin-left: 10px;">Reset</button>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <input type="hidden" name="actual_link" id="actual_link" value="http://3.132.211.119" />
                  <div class="card-body collapse show" id="collapseWork" aria-labelledby="collapseWork" data-parent="#profileAccordion">
                        <div class="row mt-3">
                           <div class="col-12 col-sm-12">
                              <div class="_card mt-3">
                                 <div class="_card_header"><div class="title-head">Drug Enforcement Administration(DEA)</div><button class="btn btn-primary SingleRun" type="button" data-id="{{ $cat_id }}" data-scan="{{$scanId}}" data-site="14">Start</button></div>
                                 <div class="_card_body">
                                    <table id="dea" class="table" style="width: 100%;">
                                       <thead>
                                          <tr>
                                             <th><div class="checkbox"><label><input class="mainchk" type="checkbox" data-value="dea" /><span class="checkbtn"></span></label></div></th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Dea Number</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Business Activity</th>
                                            <th scope="col">Action</th>
                                          </tr>
                                       </thead>
                                       <tbody id="table-dea">
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row mt-3">
                           <div class="col-12 col-sm-12">
                              <div class="_card mt-3">
                                 <div class="_card_header"><div class="title-head">Office Medicaid Inspector(OMIG)</div><button class="btn btn-primary SingleRun" type="button" data-id="{{ $cat_id }}" data-scan="{{$scanId}}" data-site="2">Start</button></div>
                                 <div class="_card_body">
                                    <table id="omig" class="table" style="width: 100%;">
                                       <thead>
                                          <th><div class="checkbox"><label><input class="mainchk" type="checkbox" data-value="omig"/><span class="checkbtn"></span></label></div></th>
                                          <th scope="col">Date</th>
                                          <th scope="col">Provider Name</th>
                                          <th scope="col">License Number</th>
                                          <th scope="col">NPI Number</th>
                                          <th scope="col">Screenshot</th>
                                       </thead>
                                       <tbody id="table-omig">
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row mt-3">
                           <div class="col-12 col-sm-12">
                              <div class="_card mt-3">
                                 <div class="_card_header"><div class="title-head">Office Of Inspector GeneralDetail(OIG)</div><button class="btn btn-primary SingleRun" type="button" data-id="{{ $cat_id }}" data-scan="{{$scanId}}" data-site="1">Start</button></div>
                                 <div class="_card_body">
                                    <table id="oig" class="table" style="width: 100%;">
                                       <thead>
                                          <th><div class="checkbox"><label><input class="mainchk" type="checkbox" data-value="oig"/><span class="checkbtn"></span></label></div></th>
                                          <th>Date</th>
                                          <th>NPI Number</th>
                                          <th>Name</th>
                                          <th>UPIN Number</th>
                                          <th>Action</th>
                                       </thead>
                                       <tbody id="table-oig">
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row mt-3">
                           <div class="col-12 col-sm-12">
                              <div class="_card mt-3">
                                 <div class="_card_header"><div class="title-head">National Practitioner Data Bank(NPDB)</div><button class="btn btn-primary SingleRun" type="button" data-id="{{ $cat_id }}" data-scan="{{$scanId}}" data-site="11">Start</button></div>
                                 <div class="_card_body">
                                    <table id="npdb" class="table" style="width: 100%;">
                                       <thead>
                                          <th><div class="checkbox"><label><input class="mainchk" type="checkbox" data-value="npdb"/><span class="checkbtn"></span></label></div></th>
                                          <th>Date</th>
                                          <th>Screenshot</th>
                                       </thead>
                                       <tbody id="table-npdb">
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row mt-3">
                           <div class="col-12 col-sm-12">
                              <div class="_card mt-3">
                                 <div class="_card_header"><div class="title-head">SAM GOV</div><button class="btn btn-primary SingleRun" type="button" data-id="{{ $cat_id }}" data-scan="{{$scanId}}" data-site="3">Start</button></div>
                                 <div class="_card_body">
                                    <table id="samgov" class="table" style="width: 100%;">
                                       <thead>
                                          <th><div class="checkbox"><label><input class="mainchk" type="checkbox" data-value="samgov"/><span class="checkbtn"></span></label></div></th>
                                          <th>Date</th>
                                          <th>Screenshot</th>
                                       </thead>
                                       <tbody id="table-samgov">
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row mt-3">
                           <div class="col-12 col-sm-12">
                              <div class="_card mt-3">
                                 <div class="_card_header"><div class="title-head">NYS</div><button class="btn btn-primary SingleRun" type="button" data-id="{{ $cat_id }}" data-scan="{{$scanId}}" data-site="13">Start</button></div>
                                 <div class="_card_body">
                                    <table id="nys" class="table" style="width: 100%;">
                                       <thead>
                                          <th><div class="checkbox"><label><input class="mainchk" type="checkbox" data-value="nys"/><span class="checkbtn"></span></label></div></th>
                                          <th>Date</th>
                                          <th>Name</th>
                                          <th>Address</th>
                                          <th>Profession</th>
                                          <th>Action</th>
                                       </thead>
                                       <tbody id="table-nys">
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     @if ($scan_field === 'PhysicianUsers')
                        @if ($board === 'abim')
                           <div class="row mt-3">
                              <div class="col-12 col-sm-12">
                                 <div class="_card mt-3">
                                    <div class="_card_header"><div class="title-head">American Board of Internal Medicine(ABIM)</div><button class="btn btn-primary SingleRun" type="button" data-id="{{ $cat_id }}" data-scan="{{$scanId}}" data-site="4">Start</button></div>
                                    <div class="_card_body">
                                       <table id="abim" class="table" style="width: 100%;">
                                          <thead>
                                             <th><div class="checkbox"><label><input class="mainchk" type="checkbox" data-value="abim"/><span class="checkbtn"></span></label></div></th>
                                             <th>Date</th>
                                             <th>ABIM Id</th>
                                             <th>Certification Status</th>
                                             <th>Initial Certi</th>
                                             <th>Screenshot</th>
                                          </thead>
                                          <tbody id="table-abim">
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        @endif
                        @if ($board === 'abfm')
                           <div class="row mt-3">
                              <div class="col-12 col-sm-12">
                                 <div class="_card mt-3">
                                    <div class="_card_header"><div class="title-head">American Board of Family Medicine(ABFM)</div><button class="btn btn-primary SingleRun" type="button" data-id="{{ $cat_id }}" data-scan="{{$scanId}}" data-site="6">Start</button></div>
                                    <div class="_card_body">
                                       <table id="abfm" class="table" style="width: 100%;">
                                          <thead>
                                             <th><div class="checkbox"><label><input class="mainchk" type="checkbox" data-value="abfm" /><span class="checkbtn"></span></label></div></th>
                                             <th>Date</th>
                                             <th>Certification</th>
                                             <th>Certification Status</th>
                                             <th>Certification History</th>
                                             <th>Screenshot</th>
                                          </thead>
                                          <tbody id="table-abfm">
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        @endif
                           <div class="row mt-3">
                              <div class="col-12 col-sm-12">
                                 <div class="_card mt-3">
                                    <div class="_card_header"><div class="title-head">Everify</div><button class="btn btn-primary SingleRun" type="button" data-id="{{ $cat_id }}" data-scan="{{$scanId}}" data-site="9">Start</button></div>
                                    <div class="_card_body">
                                       <table id="everify" class="table" style="width: 100%;">
                                          <thead>
                                             <th><div class="checkbox"><label><input class="mainchk" type="checkbox" data-value="everify" /><span class="checkbtn"></span></label></div></th>
                                             <th>Verification Number</th>
                                             <th>Case status</th>
                                             <th>Submitted By</th>
                                             <th>Current case result</th>
                                             <th>Reason for Closure</th>
                                             <th>Date</th>
                                             <th>Screenshot</th>
                                          </thead>
                                          <tbody id="table-everify">
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row mt-3">
                              <div class="col-12 col-sm-12">
                                 <div class="_card mt-3">
                                    <div class="_card_header"><div class="title-head">Educational Commission for Foreign Medical Graduates(ECFMG)</div><button class="btn btn-primary SingleRun" type="button" data-id="{{ $cat_id }}" data-scan="{{$scanId}}" data-site="8">Start</button></div>
                                    <div class="_card_body">
                                       <table id="ecfmg" class="table" style="width: 100%;">
                                          <thead>
                                             <th><div class="checkbox"><label><input class="mainchk" type="checkbox" data-value="ecfmg" /><span class="checkbtn"></span></label></div></th>
                                             <th>Date</th>
                                             <th>Requester</th>
                                             <th>Usmle Id</th>
                                             <th>Applicant Name</th>
                                             <th>Request Status</th>
                                             <th>Created At</th>
                                             <th>Screenshot</th>
                                          </thead>
                                          <tbody id="table-ecfmg">
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                     @endif
                     @if ($scan_field === 'PhysicianAssistantUsers')
                        <div class="row mt-3">
                           <div class="col-12 col-sm-12">
                              <div class="_card mt-3">
                                 <div class="_card_header"><div class="title-head">NCCPA</div><button class="btn btn-primary SingleRun" type="button" data-id="{{ $cat_id }}" data-scan="{{$scanId}}" data-site="10">Start</button></div>
                                 <div class="_card_body">
                                    <table id="nccpa" class="table" style="width: 100%;">
                                       <thead>
                                          <th><div class="checkbox"><label><input class="mainchk" type="checkbox" data-value="nccpa" /><span class="checkbtn"></span></label></div></th>
                                          <th>Date</th>
                                          <th>NCCPA Detail</th>
                                          <th>Screenshot</th>
                                       </thead>
                                       <tbody id="table-nccpa">
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     @endif
                     @if ($scan_field === 'NursePractitionerUsers')
                           <div class="row mt-3">
                              <div class="col-12 col-sm-12">
                                 <div class="_card mt-3">
                                    <div class="_card_header"><div class="title-head">American Academy of Nurse Practitioners(AANP)</div><button class="btn btn-primary SingleRun" type="button" data-id="{{ $cat_id }}" data-scan="{{$scanId}}" data-site="7">Start</button></div>
                                    <div class="_card_body">
                                       <table id="aanp" class="table" style="width: 100%;">
                                          <thead>
                                             <th><div class="checkbox"><label><input class="mainchk" type="checkbox" data-value="aanp" /><span class="checkbtn"></span></label></div></th>
                                             <th>Order Details</th>
                                             <th>Pdf</th>
                                             <th>Date</th>
                                             <th>Screenshot</th>
                                          </thead>
                                          <tbody id="table-aanp">
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row mt-3">
                              <div class="col-12 col-sm-12">
                                 <div class="_card mt-3">
                                    <div class="_card_header"><div class="title-head">Nursing World</div><button class="btn btn-primary SingleRun" type="button" data-id="{{ $cat_id }}" data-scan="{{$scanId}}" data-site="12">Start</button></div>
                                    <div class="_card_body">
                                       <table id="nursingWorld" class="table" style="width: 100%;">
                                          <thead>
                                             <th><div class="checkbox"><label><input class="mainchk" type="checkbox" data-value="nursingWorld" /><span class="checkbtn"></span></label></div></th>
                                             <th>Order Number</th>
                                             <th>Date</th>
                                             <th>Screenshot</th>
                                             <th>PDF File</th>
                                          </thead>
                                          <tbody id="table-nursingWorld">
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                     @endif
                     @if ($scan_field === 'PhysicianAssistantUsers' || $scan_field === 'PhysicianUsers')
                        <div class="row mt-3">
                           <div class="col-12 col-sm-12">
                              <div class="_card mt-3">
                                 <div class="_card_header"><div class="title-head">AMA</div><button class="btn btn-primary SingleRun" type="button" data-id="{{ $cat_id }}" data-scan="{{$scanId}}" data-site="5">Start</button></div>
                                 <div class="_card_body">
                                    <table id="ama" class="table" style="width: 100%;">
                                       <thead>
                                          <th><div class="checkbox"><label><input class="mainchk" type="checkbox" data-value="ama" /><span class="checkbtn"></span></label></div></th>
                                          <th>Order Number</th>
                                          <th>Date</th>
                                          <th>Screenshot</th>
                                       </thead>
                                       <tbody id="table-ama">
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     @endif
                  </div>
               </div>
            </div>
         </div>
          <!-- Modal Popup for image -->
         <input type="hidden" name="user_id" id="user_id" value="{{ $scanId }}">
         <input type="hidden" name="category_id" id="category_id" value="{{ $cat_id }}">
         <input type="hidden" name="scan_field" id="scan_field" value="{{ $scan_field }}">
         <input type="hidden" name="board" id="board" value="{{ $board }}">

      </section>
   </section>
@endsection

@section('modal')
<div class="modal fade bd-example-modal-xl" id="MyPopupImage" tabindex="-1" role="dialog"
            aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-xl">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <b>NCCPA Screenshot</b>
                        <button type="button" class="close" data-dismiss="modal">
                            &times;</button>
                        <h4 class="modal-title">
                        </h4>
                    </div>
                    <div class="modal-body" id="imageShow">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            Close</button>
                    </div>
                </div>
            </div>
        </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/fonts/Montserrat.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/detail.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.min.css') }}">
    <style>
      .scrollbar-detail {
            height: 800px;
         }

    </style>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css" />
@endpush

@push('scripts')
	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
   <script src="{{ asset('assets/js/popper.min.js') }}"></script>
   <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
   <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
   <script src="{{ asset('assets/js/app.common.min.js') }}"></script>
   <script src="{{ asset('js/dropzone.js') }}"></script>
   <script src="{{ asset('assets/js/daterangepicker.min.js') }}"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
   <script>
      $(document).ready(function(){
         $('#selectAll').click();
         setTimeout(refresh, 5000);
         //setInterval( refresh , 1000 );
      });

      var phpVar = <?php echo json_encode($mapId); ?>;
      $.each(phpVar, function (key, value) {
         var columnDaTa = [];
         columnDaTa.push(
            {data:'checkbox_id',"className": "text-center","bSortable": false},
         );
              
         if (value.site_info.sites_name === 'dea') {
            columnDaTa.push(
               {data:'created_at',"className": "text-center","bSortable": false},
               {data: 'dea_no', orderable: false, searchable: false,"className": "text-left"},
               {data: 'name', orderable: false, searchable: false,"className": "text-left"},
               {data: 'business_activity', orderable: false, searchable: false,"className": "text-left"},
               {data: 'action', orderable: false, searchable: false,"className": "text-left"},
            );
         }

         if (value.site_info.sites_name === 'omig') {
            columnDaTa.push(
               {data:'created_at',"className": "text-center","bSortable": false},
               {data: 'provider_name', orderable: false, searchable: false,"className": "text-left"},
               {data: 'license_number', orderable: false, searchable: false,"className": "text-left"},
               {data: 'npi_number', orderable: false, searchable: false,"className": "text-left"},
               {data: 'action', orderable: false, searchable: false,"className": "text-left"},
            );
         }

         if (value.site_info.sites_name === 'oig') {
            columnDaTa.push(
               {data:'created_at',"className": "text-center","bSortable": false},
               {data: 'npi_no', orderable: false, searchable: false,"className": "text-left"},
               {data: 'name', orderable: false, searchable: false,"className": "text-left"},
               {data: 'upin_no', orderable: false, searchable: false,"className": "text-left"},
               {data: 'action', orderable: false, searchable: false,"className": "text-left"},
            );
         }

         if (value.site_info.sites_name === 'npdb') {
            columnDaTa.push(
               {data:'created_at',"className": "text-center","bSortable": false},
               {data: 'action', orderable: false, searchable: false,"className": "text-left"},
            );
         }

         if (value.site_info.sites_name === 'samgov') {
            columnDaTa.push(
               {data:'created_at',"className": "text-center","bSortable": false},
               {data: 'action', orderable: false, searchable: false,"className": "text-left"},
            );
         }

         if (value.site_info.sites_name === 'nys') {
            columnDaTa.push(
               {data:'created_at',"className": "text-center","bSortable": false},
               {data: 'name', orderable: false, searchable: false,"className": "text-left"},
               {data: 'address', orderable: false, searchable: false,"className": "text-left"},
               {data: 'profession', orderable: false, searchable: false,"className": "text-left"},
               {data: 'action', orderable: false, searchable: false,"className": "text-left"},
            );
         }

         var board = $("#scan_field").val();
         if (board === 'abim'){
            if (value.site_info.sites_name === 'abim') {
               columnDaTa.push(
                  {data:'created_at',"className": "text-center","bSortable": false},
                  {data: 'abim_id', orderable: false, searchable: false,"className": "text-left"},
                  {data: 'certification_status', orderable: false, searchable: false,"className": "text-left"},
                  {data: 'initial_certi', orderable: false, searchable: false,"className": "text-left"},
                  {data: 'action', orderable: false, searchable: false,"className": "text-left"},
               );
            }
         }

         if (board === 'abfm'){
            if (value.site_info.sites_name === 'abfm') {
               columnDaTa.push(
                     {data:'created_at',"className": "text-center","bSortable": false},
                     {data: 'certification', orderable: false, searchable: false,"className": "text-left"},
                     {data: 'cert_status', orderable: false, searchable: false,"className": "text-left"},
                     {data: 'cert_history', orderable: false, searchable: false,"className": "text-left"},
                     {data: 'action', orderable: false, searchable: false,"className": "text-left"},
               );
            }
         }

         if (value.site_info.sites_name === 'everify') {
            columnDaTa.push(
               {data: 'verification_num', orderable: false, searchable: false,"className": "text-left"},
               {data: 'case_status', orderable: false, searchable: false,"className": "text-left"},
               {data: 'submitted_by', orderable: false, searchable: false,"className": "text-left"},
               {data: 'case_result', orderable: false, searchable: false,"className": "text-left"},
               {data: 'clouser', orderable: false, searchable: false,"className": "text-left"},
               {data:'created_at',"className": "text-center","bSortable": false},
               {data: 'action', orderable: false, searchable: false,"className": "text-left"},
            );
         }

         if (value.site_info.sites_name === 'ecfmg') {
            columnDaTa.push(
               {data:'created_at',"className": "text-center","bSortable": false},
               {data: 'requester', orderable: false, searchable: false,"className": "text-left"},
               {data: 'usmle_id', orderable: false, searchable: false,"className": "text-left"},
               {data: 'applicant_name', orderable: false, searchable: false,"className": "text-left"},
               {data: 'request_status', orderable: false, searchable: false,"className": "text-left"},
               {data: 'action', orderable: false, searchable: false,"className": "text-left"},
            );
         }

         if (value.site_info.sites_name === 'nccpa') {
            columnDaTa.push(
               {data:'created_at',"className": "text-center","bSortable": false},
               {data: 'nccpa_detail', orderable: false, searchable: false,"className": "text-left"},
               {data: 'action', orderable: false, searchable: false,"className": "text-left"},
            );
         }

         if (value.site_info.sites_name === 'aanp') {
            columnDaTa.push(
               {data: 'order_num', orderable: false, searchable: false,"className": "text-left"},
               {data: 'pdf', orderable: false, searchable: false,"className": "text-left"},
               {data:'created_at',"className": "text-center","bSortable": false},
               {data: 'action', orderable: false, searchable: false,"className": "text-left"},
            );
         }

         if (value.site_info.sites_name === 'ama') {
            columnDaTa.push(
               {data: 'order_id', orderable: false, searchable: false,"className": "text-left"},
               {data:'created_at',"className": "text-center","bSortable": false},
               {data: 'action', orderable: false, searchable: false,"className": "text-left"},
            );
         }

         if (value.site_info.sites_name === 'nursingworld') {
            columnDaTa.push(
               {data: 'order_id', orderable: false, searchable: false,"className": "text-left"},
               {data:'created_at',"className": "text-center","bSortable": false},
               {data: 'action', orderable: false, searchable: false,"className": "text-left"},
            );
         }

         $('#'+value.site_info.sites_name).DataTable({
            "processing": true,
            "serverSide": true,
            "bSort" : false,
            // "language": {
            //    processing: '<div id="loader-wrapper"><div class="overlay"></div><div class="pulse"></div></div>'
            // },
            ajax: {
               'type': 'POST',
               'url': "{{ route('get-scrap-list.ajax') }}",
               'headers': {
                     'X-CSRF-TOKEN': '{{ csrf_token() }}'
               },
               data: function (d) {
                     d.month = $('select[name="month"]').val();
                     d.year = $('select[name="year"]').val();
                     d.start_date = $('input[name="start_date"]').val();
                     d.end_date = $('input[name="end_date"]').val();
                     d.currentMonth = $('input[name="currentMonth"]').val();
                     d.sites_name = value.site_info.sites_name;
                     d.scan_field = scan_field = $("#scan_field").val();
                     d.scanId = $("#user_id").val();
                     d.board = $("#scan_field").val();
                     d.category_id = $("#category_id").val();
               },
               'headers': {
                     'X-CSRF-TOKEN': '{{ csrf_token() }}'
               }
            },
            columns:columnDaTa,
            "pageLength": 5,
            "lengthMenu": [ [5,10, 20, 50, 100, -1], [5,10, 20, 50, 100, "All"] ],
            'columnDefs': [
               {
                  "order": [ 1, "desc"],
               }
            ],
         });
      });

      /*table reload at filter time*/
      $("#filter_btn").click(function () {
         $('input[name="currentMonth"]').val('filter');
         refresh();
      });

      $(".mainchk").click(function () {
         var ch = $(this).prop("checked");
         var type = $(this).attr('data-value')
            
         if(ch == true) {
            $(".innerallchk"+type).prop("checked","checked");
            $('#printBtn').show();
         } else {
            $(".innerallchk"+type).prop("checked","");
            $('#printBtn').hide();
         }
      });
      
      $(document).ready(function () {
         $('body').on('click', '.SingleRun', function () {
            var cat_id = $(this).attr('data-id');
            var userid = $(this).attr('data-scan');
            var site_id = $(this).attr('data-site');
            
            if(confirm("Are you sure you want to run this user?")){
               $.ajax({
                     type: 'GET',
                     url: "{{Route('manually-scrap') }}",
                     data: {
                        categoryid: cat_id,
                        userid: userid,
                        siteid: site_id
                     },
                     success: function(response) {
                        console.log(response);
                        // $('#message').text(response);
                        // $('#exampleModal').modal('show')
                     }
               });
            } else {
               console.log('cancelled');
            }
         });
      });

      function chkmain(type) {
         var ch = $(".innerallchk"+type).prop("checked");
         if(ch == true) {
               $('#printBtn').show();
               var len = $(".innerallchk"+type+":unchecked").length;
               if(len == 0) {
                  $(".mainchk").prop("checked","checked");
               } else {
                  $(".mainchk").prop("checked","");
               }
         } else {
               var len = $(".innerallchk"+type+":checked").length;
               if(len == 0) {
                  $('#printBtn').hide();
               } else {
                  $('#printBtn').show();
                  var len = $(".innerallchk"+type+":unchecked").length;
                  if(len == 0) {
                     $(".mainchk").prop("checked","checked");
                  } else {
                     $(".mainchk").prop("checked","");
                  }
               }
         }
      }

      function doaction()
      {
         var len = $(".innerallchk1:checked").length;
         if (len == 0) {
            alertText('Please select at least one record to continue.','warning');
         } else {
            var selectArray = []; 
            $('.innerallchk1:checked').each(function( i, x ){
               selectArray.push({"id":x.id, "value":x.value})   
            });
         }

         var token = $('input[name="_token"]').val();
         $('#loader').show();
         $.ajax({
            type: 'POST',
            url: "{{route('scrapedpdf') }}",
            data: {
               'data':selectArray,
            },
            headers: {
               'X-CSRF-Token': token
            },
            xhrFields: {
               responseType: 'blob'
            },
            success: function(response){
               var blob = new Blob([response]);
            
               var link = document.createElement('a');
               link.href = window.URL.createObjectURL(blob);
               link.download = 'sample.pdf';
               link.click();
               refresh();
               $('#loader').hide();
            },
            error: function(blob){
               console.log(blob);
               $('#loader').hide();
            }
         });
      }
        
      function refresh() {
         $.each(phpVar, function (key, value) {
            $('#'+value.site_info.sites_name).DataTable().ajax.reload(null, false);
         });
      }

      $("#selectAll").click(function(){
         $(".sites").not('#selectAll').click();
      });

      $('.viewMap').on('click', function(e) {
         $(this).parents("li").find('.viewMapDiv').toggle();
      });

      function tableshow(item_id, table_id) {
         if ($('#'+item_id).is(':checked')){
            $('#'+table_id).show();
         }
         else{
            $('#'+table_id).hide();
         }
      }

      $(function() {
         $('#start_date').datepicker({
            yearRange: "c-100:c",
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            closeText: 'Select',
            currentText: 'This year',
            onClose: function(dateText, inst) {
               var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
               var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
               $(this).val($.datepicker.formatDate('yy-mm', new Date(year, month, 1)));
            }
         }).focus(function() {
            $(".ui-datepicker-calendar").hide();
            $(".ui-datepicker-current").hide();
            $("#ui-datepicker-div").position({
               my: "left top",
               at: "left bottom",
               of: $(this)
            });
         }).attr("readonly", false);

         $('#end_date').datepicker({
            yearRange: "c-100:c",
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            closeText: 'Select',
            currentText: 'This year',
            onClose: function(dateText, inst) {
               var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
               var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
               $(this).val($.datepicker.formatDate('yy-mm', new Date(year, month, 1)));
            }
         }).focus(function() {
            $(".ui-datepicker-calendar").hide();
            $(".ui-datepicker-current").hide();
            $("#ui-datepicker-div").position({
               my: "left top",
               at: "left bottom",
               of: $(this)
            });
         }).attr("readonly", false);
      });

      $("#reset_btn").click(function () {
         $('input[name="currentMonth"]').val('current');
         $('#search_form').trigger("reset");
         refresh();
      })

      $('body').on('click', '.update-status', function () {
         var status = $(this).attr('data-status');
         var val = $(this).attr('data-id');
         var action = $(this).attr('data-action');
         var url = $(this).attr('data-url');

         postdataforaction(status, val,action,url);
      });

      // $('body').on('click', '.scanview', function () {
      //    var ss = $(this).attr('data-value');
      //    $('#imageShow').empty();
      //       $("#MyPopupImage").modal("show");

      //       var data = '<img id="firstImage" width="1100" hieght="auto" src="'+ss+'">';
      //       $('#imageShow').append(data);
      // });

      function postdataforaction(status,val,action,url) {
         const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: true,
            timer: 3000,
            timerProgressBar: true,
            buttonsStyling: true,
            didOpen: (toast) => {
               toast.addEventListener('mouseenter', Swal.stopTimer)
               toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
         })

         Toast.fire({
            title: 'Are you sure?',
            text: "Are you sure want to update status of this patient?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, change it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
         }).then((result) => {
            if (result.isConfirmed) {
               $("#loader-wrapper").show();
               $.ajax({
                  'type': 'POST',
                  'url':url,
                  'headers': {
                     'X-CSRF-TOKEN': '{{ csrf_token() }}'
                  },
                  data: {
                     "id": val,
                     "status" : status,
                     "action" : action,
                  },
                  'success': function (data) {
                     if(data.status == 400) {
                        alertText(data.message,'error');
                     } else {
                        refresh()
                        alertText(data.message,'success');

                        $('#printBtn').hide();
                        $('.messageViewModel').modal('hide');
                     }
                     $("#loader-wrapper").hide();
                  },
                  "error":function () {
                     alertText("Server Timeout! Please try again",'error');
                     $("#loader-wrapper").hide();
                  }
               });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                  alertText("Your file file is safe :)",'warning');
                  $(".innerallchk, .mainchk").prop("checked","");
                  $('#printBtn').hide();
            }
         });
      }

      /*Open message in model */
      $("body").on('click','.view_document',function () {
         var user_id = $(this).attr('data-id');
         var type_id = $(this).attr('data-type');
         var action = $(this).attr('data-action');
         var field = $(this).attr('data-field');
         var value = $(this).attr('data-value');
         var url = '{{route("clinician.getDocument")}}';

         $.ajax({
            url : url,
            type: 'POST',
            data: {
               user_id: user_id,
               type_id: type_id,
               action: action,
               field: field,
               value: value,
            },
            headers: {
               'X_CSRF_TOKEN':'{{ csrf_token() }}',
            },
            success:function(data, textStatus, jqXHR){
               $(".messageViewModel").html(data);
               $(".messageViewModel").modal('show');
            },
            error: function(jqXHR, textStatus, errorThrown){
               console.log('error');
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
@endpush'
