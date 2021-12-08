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
                        <img src="/assets/img/icons/applicant-clinician.svg" alt="" srcset="/assets/img/icons/applicant-clinician.svg" class="_icon mr-2">Applicant Details
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
                  @else
                  <li class="mb-2">
                     <a href="#WorkHistoryDetails" data-toggle="pill" role="tab">
                        <img src="/assets/img/icons/document-clinician.svg" alt="" srcset="/assets/img/icons/document-clinician.svg" class="_icon mr-2">Work History Details
                     </a>
                  </li>
                  <li class="mb-2">
                     <a href="#ProfessionalDetails" data-toggle="pill" role="tab">
                        <img src="/assets/img/icons/professional-clinician.svg" alt="" srcset="/assets/img/icons/professional-clinician.svg" class="_icon mr-2">Professional Details
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
                        <img src="/assets/img/icons/applicant-clinician.svg" alt="" srcset="/assets/img/icons/applicant-clinician.svg" class="_icon mr-2"> Applicant Details
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
                                       <div><i class="las la-phone  circle-icon"></i></div>
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
                                    <div><i class="las la-angle-double-right circle-icon"></i></div>
                                       <div>
                                          <h3 class="_title">Email</h3>
                                          <h1 class="_detail">{{ isset($data->email) ? $data->email : null }}</h1>
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
                                          <h3 class="_title">SSN</h3>
                                          <h1 class="_detail">{{ isset($info->ssn) ? $info->ssn : null }}</h1>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-sm-4">
                                 <div>
                                    <div class="d-flex align-items-center">
                                       <div><i class="las la-angle-double-right circle-icon"></i></div>
                                       <div>
                                          <h3 class="_title">Ethnicity</h3>
                                          <h1 class="_detail">{{ isset($info->Ethnicity) ? $info->Ethnicity : null }}</h1>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-sm-4">
                                 <div>
                                    <div class="d-flex align-items-center">
                                       <div><i class="las la-angle-double-right circle-icon"></i></div>
                                       <div>
                                          <h3 class="_title">Date Of Birth</h3>
                                          <h1 class="_detail">{{ isset($info->dateOfBirth) ? $info->dateOfBirth : null }}</h1>
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
                                          <h3 class="_title">Salary Desired</h3>
                                          <h1 class="_detail">{{ isset($info->salaryDesired) ? $info->salaryDesired : null }}</h1>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-sm-4">
                                 <div>
                                    <div class="d-flex align-items-center">
                                       <div><i class="las la-angle-double-right circle-icon"></i></div>
                                       <div>
                                          <h3 class="_title">Other Ethnicity</h3>
                                          <h1 class="_detail">{{ isset($info->OtherEthnicity) ? $info->OtherEthnicity : null }}</h1>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-sm-4">
                                 <div>
                                    <div class="d-flex align-items-center">
                                       <div><i class="las la-angle-double-right circle-icon"></i></div>
                                       <div>
                                          <h3 class="_title">Date You Can Start Work</h3>
                                          <h1 class="_detail">{{ isset($info->DateYouCanStartWork) ? $info->DateYouCanStartWork : null }}</h1>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           @if ($data->designation_id != '2')
                              <div class="row mt-3">
                                 <div class="col-12 col-sm-4">
                                    <div>
                                       <div class="d-flex align-items-center">
                                          <div><i class="las la-angle-double-right circle-icon"></i></div>
                                          <div>
                                             <h3 class="_title">Date</h3>
                                             <h1 class="_detail">{{ isset($info->date) ? $info->date : null }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12 col-sm-4">
                                    <div>
                                       <div class="d-flex align-items-center">
                                          <div><i class="las la-angle-double-right circle-icon"></i></div>
                                          <div>
                                             <h3 class="_title">Us Citizen</h3>
                                             <h1 class="_detail">{{ isset($info->us_citizen) && $info->us_citizen == '1' ? 'True' : 'False' }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12 col-sm-4">
                                    <div>
                                       <div class="d-flex align-items-center">
                                          <div><i class="las la-angle-double-right circle-icon"></i></div>
                                          <div>
                                             <h3 class="_title">Immigration Id</h3>
                                             <h1 class="_detail">{{ isset($info->immigration_id) ? $info->immigration_id : null }}</h1>
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
                                             <h3 class="_title">Emergency Phone</h3>
                                             <h1 class="_detail">{{ isset($info->emergency_phone) ? $info->emergency_phone : null }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           @endif
                        </div>
                        <div class="tab-pane fade" id="Address" role="tabpanel" aria-labelledby="Address-tab">
                           <ul>
                              <li>
                                 <div class="_card mt-3">
                                    <div class="_card_header"><div class="title-head">Prior Address Details</div></div>
                                    <div class="_card_body">
                                       <div class="row mt-3">
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center mb-3">
                                                <div><i class="las la-map-marker circle-icon"></i></div>
                                                <div>
                                                   <h3 class="_title">Address1</h3>
                                                   <h1 class="_detail">
                                                      {{ isset($prior->address1) ? $prior->address1  : ''}}
                                                      <a class="btn btn-info btn-sm ml-2" data-toggle="collapse" href="#collapseExample" aria-expanded="true"><i class="las la-map-marker"></i>View Map</a>
                                                   </h1>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="collapse mb-4" id="collapseExample">
                                             <div class="card card-body">
                                                <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                             </div>
                                          </div>
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center mb-3">
                                                <div><i class="las la-map-marker circle-icon"></i></div>
                                                <div>
                                                   <h3 class="_title">Address2</h3>
                                                   <h1 class="_detail">
                                                   {{ isset($prior->address2) ? $prior->address2  : ''}}
                                                      <a class="btn btn-info btn-sm ml-2" data-toggle="collapse" href="#collapseExample1" aria-expanded="true"><i class="las la-map-marker"></i>View Map</a>
                                                   </h1>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="collapse mb-4" id="collapseExample1">
                                             <div class="card card-body">
                                                <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                             </div>
                                          </div>
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center">
                                                <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                <div>
                                                   <h3 class="_title">Building</h3>
                                                   <h1 class="_detail">  {{ isset($prior->building) ? $prior->building  : ''}}</h1>
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
                                                   <h1 class="_detail"> {{ isset($prior->city_id) ? \App\Models\City::find($prior->city_id)->city : '' }}</h1>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center">
                                                <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                <div>
                                                   <h3 class="_title">State</h3>
                                                   <h1 class="_detail">{{ isset($prior->state_id) ? \App\Models\State::find($prior->state_id)->state : '' }}</h1>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center">
                                                <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                <div>
                                                   <h3 class="_title">Zip Code</h3>
                                                   <h1 class="_detail">{{ isset($prior->zipcode) ? $prior->zipcode : ''}}</h1>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                              <li>
                                 <div class="_card mt-3">
                                    <div class="_card_header"><div class="title-head">Address Details</div></div>
                                    <div class="_card_body">
                                       <div class="row mt-3">
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center mb-3">
                                                <div><i class="las la-map-marker circle-icon"></i></div>
                                                <div>
                                                   <h3 class="_title">Address1</h3>
                                                   <h1 class="_detail">
                                                      {{ isset($address->address1) ? $address->address1  : ''}}
                                                      <a class="btn btn-info btn-sm ml-2" data-toggle="collapse" href="#collapseExample" aria-expanded="true"><i class="las la-map-marker"></i>View Map</a>
                                                   </h1>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="collapse mb-4" id="collapseExample">
                                             <div class="card card-body">
                                                <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                             </div>
                                          </div>
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center mb-3">
                                                <div><i class="las la-map-marker circle-icon"></i></div>
                                                <div>
                                                   <h3 class="_title">Address2</h3>
                                                   <h1 class="_detail">
                                                      {{ isset($address->address2) ? $address->address2  : ''}}
                                                      <a class="btn btn-info btn-sm ml-2" data-toggle="collapse" href="#collapseExample1" aria-expanded="true"><i class="las la-map-marker"></i>View Map</a>
                                                   </h1>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="collapse mb-4" id="collapseExample1">
                                             <div class="card card-body">
                                                <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                             </div>
                                          </div>
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center">
                                                <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                <div>
                                                   <h3 class="_title">Building</h3>
                                                   <h1 class="_detail">{{ isset($address->building) ? $address->building  : ''}}</h1>
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
                                                   <h1 class="_detail">{{ isset($address->city_id) ? \App\Models\City::find($address->city_id)->city : '' }}</h1>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center">
                                                <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                <div>
                                                   <h3 class="_title">State</h3>
                                                   <h1 class="_detail">{{ isset($address->state_id) ? \App\Models\State::find($address->state_id)->state : '' }}</h1>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-12 col-sm-4">
                                             <div class="d-flex align-items-center">
                                                <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                <div>
                                                   <h3 class="_title">Zip Code</h3>
                                                   <h1 class="_detail">{{ isset($address->zipcode) ? $address->zipcode : ''}}</h1>
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
                              @php $count = '1'; @endphp
                              @isset($reference_detail->reference_list)
                                 @foreach($reference_detail->reference_list as $index => $reference)
                                    <li>
                                       <div class="_card mt-3">
                                          <div class="_card_header"><div class="title-head">Reference {{ $count }}</div></div>
                                          <div class="_card_body">
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-user-nurse circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Name</h3>
                                                         <h1 class="_detail">{{ isset($reference->name) ? $reference->name : null }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-phone  circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Phone No.</h3>
                                                         <h1 class="_detail">{{ isset($reference->phoneNo) ? $reference->phoneNo : null }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-map-marker circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Address1</h3>
                                                         <h1 class="_detail">
                                                            {{ isset($reference->address1) ? $reference->address1 : null }}
                                                            <a class="btn btn-info btn-sm ml-2" data-toggle="collapse" href="#collapseExample7" aria-expanded="true"><i class="las la-map-marker"></i>View Map</a>
                                                         </h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="collapse mb-4" id="collapseExample7">
                                                   <div class="card card-body">
                                                      <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-map-marker circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Address2</h3>
                                                         <h1 class="_detail">
                                                            {{ isset($reference->address2) ? $reference->address2 : null }}
                                                            <a class="btn btn-info btn-sm ml-2" data-toggle="collapse" href="#collapseExample7" aria-expanded="true"><i class="las la-map-marker"></i>View Map</a>
                                                         </h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="collapse mb-4" id="collapseExample7">
                                                   <div class="card card-body">
                                                      <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Building</h3>
                                                         <h1 class="_detail">  {{ isset($reference->building) ? $reference->building  : ''}}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">City</h3>
                                                         <h1 class="_detail"> {{ isset($reference->city_id) ? \App\Models\City::find($reference->city_id)->city : '' }}</h1>
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
                                                         <h1 class="_detail">{{ isset($reference->state_id) ? \App\Models\State::find($reference->state_id)->state : '' }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Zip Code</h3>
                                                         <h1 class="_detail">{{ isset($reference->zipcode) ? $reference->zipcode : ''}}</h1>
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
                              <li>
                                 <div class="_card mt-3">
                                    <div class="_card_header"><div class="title-head">Reference Basic detail</div></div>
                                    <div class="_card_body">
                                       <div class="row mt-3">
                                          <div class="col-12 col-sm-4">
                                             <div>
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-user-nurse circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Terms</h3>
                                                      <h1 class="_detail">{{ isset($reference_detail->terms) && $reference_detail->terms == '1' ? 'True' : 'False' }}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          @if ($data->designation_id != '2')
                                             <div class="col-12 col-sm-4">
                                                <div>
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-user-nurse circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Have You Ever Been Bonded</h3>
                                                         <h1 class="_detail">{{ isset($reference_detail->haveYouEverBeenBonded) && $reference_detail->haveYouEverBeenBonded == '1' ? 'True' : 'False' }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div>
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-user-nurse circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Have You Ever Been Refused Bond</h3>
                                                         <h1 class="_detail">{{ isset($reference_detail->haveYouEverBeenRefusedBond) && $reference_detail->haveYouEverBeenRefusedBond == '1' ? 'True' : 'False' }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          @endif
                                       </div>
                                       @if ($data->designation_id != '2')
                                          <div class="row mt-3">
                                             <div class="col-12 col-sm-4">
                                                <div>
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-user-nurse circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Have You Over Been Convicated Of a Crime</h3>
                                                         <h1 class="_detail">{{ isset($reference_detail->haveYouOverBeenConvicatedOfaCrime) && $reference_detail->haveYouOverBeenConvicatedOfaCrime == '1' ? 'True' : 'False' }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       @endif
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                        <div class="tab-pane fade" id="Emergency" role="tabpanel" aria-labelledby="Emergency-tab">
                           <ul>
                              @php $count = '1'; @endphp
                              @isset($emergency_detail)
                                 @foreach($emergency_detail as $index => $emergency)
                                 <li>
                                    <div class="_card mt-3">
                                       <div class="_card_header"><div class="title-head">Emergency Detail {{ $count }}</div></div>
                                       <div class="_card_body">
                                          <div class="row mt-3">
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-user-nurse circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Name</h3>
                                                      <h1 class="_detail">{{ isset($emergency->name) ? $emergency->name : null }}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-phone  circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Phone No.</h3>
                                                      <h1 class="_detail">{{ isset($emergency->phoneNo) ? $emergency->phoneNo : null }}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Relation</h3>
                                                      <h1 class="_detail">{{ isset($emergency->relation) ? $emergency->relation : null }}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="row mt-3">
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Other Relation</h3>
                                                      <h1 class="_detail">{{ isset($emergency->otherRelation) ? $emergency->otherRelation : null }}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center mb-3">
                                                   <div><i class="las la-map-marker circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Address1</h3>
                                                      <h1 class="_detail">
                                                         {{ isset($emergency->address1) ? $emergency->address1 : null }}
                                                         <a class="btn btn-info btn-sm ml-2" data-toggle="collapse" href="#collapseExample7" aria-expanded="true"><i class="las la-map-marker"></i>View Map</a>
                                                      </h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="collapse mb-4" id="collapseExample7">
                                                <div class="card card-body">
                                                   <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center mb-3">
                                                   <div><i class="las la-map-marker circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Address2</h3>
                                                      <h1 class="_detail">
                                                         {{ isset($emergency->address2) ? $emergency->address2 : null }}
                                                         <a class="btn btn-info btn-sm ml-2" data-toggle="collapse" href="#collapseExample7" aria-expanded="true"><i class="las la-map-marker"></i>View Map</a>
                                                      </h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="collapse mb-4" id="collapseExample7">
                                                <div class="card card-body">
                                                   <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="row mt-3">
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Building</h3>
                                                      <h1 class="_detail">  {{ isset($emergency->building) ? $emergency->building  : ''}}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">City</h3>
                                                      <h1 class="_detail"> {{ isset($emergency->city_id) ? \App\Models\City::find($emergency->city_id)->city : '' }}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">State</h3>
                                                      <h1 class="_detail">{{ isset($emergency->state_id) ? \App\Models\State::find($emergency->state_id)->state : '' }}</h1>
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
                                                      <h1 class="_detail">{{ isset($emergency->zipcode) ? $emergency->zipcode : ''}}</h1>
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
                           <img src="/assets/img/icons/applicant-clinician.svg" alt="" srcset="/assets/img/icons/applicant-clinician.svg" class="_icon mr-2">Medical Institute Details
                        </div>
                     </div>
                     <div class="card-body collapse show mt-3" id="collapseWork" aria-labelledby="collapseWork" data-parent="#profileAccordion">
                        <div class="tab-content" id="myTabContent">
                           <div class="tab-pane fade show active" id="MEDICALINSTITUTE" role="tabpanel" aria-labelledby="MEDICALINSTITUTE-tab">
                              <ul>
                                 @php
                                    $medicalInstitute = $education_detail->medicalInstitute;
                                    $residencyInstitute = $education_detail->residencyInstitute;
                                    $fellowshipInstitute = $education_detail->fellowshipInstitute;
                                 @endphp
                                 <li>
                                    <div class="_card mt-3">
                                       <div class="_card_header"><div class="title-head">Medical Institute Details</div></div>
                                       <div class="_card_body">
                                          <div class="row mt-3">
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center mb-3">
                                                   <div><i class="las la-map-marker circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Medical Institute Name</h3>
                                                      <h1 class="_detail">
                                                         {{ isset($medicalInstitute->medical_instituteName) ? $medicalInstitute->medical_instituteName  : ''}}
                                                      </h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center mb-3">
                                                   <div><i class="las la-map-marker circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Medical Year Started</h3>
                                                      <h1 class="_detail">
                                                         {{ isset($medicalInstitute->medical_yearStarted) ? $medicalInstitute->medical_yearStarted  : ''}}
                                                      </h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center mb-3">
                                                   <div><i class="las la-map-marker circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Medical Year Ended</h3>
                                                      <h1 class="_detail">
                                                         {{ isset($medicalInstitute->medical_yearEnded) ? $medicalInstitute->medical_yearEnded  : ''}}
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
                                                      <h3 class="_title">Address1</h3>
                                                      <h1 class="_detail">
                                                         {{ isset($medicalInstitute->medical_address1) ? $medicalInstitute->medical_address1  : ''}}
                                                         <a class="btn btn-info btn-sm ml-2" data-toggle="collapse" href="#collapseExample" aria-expanded="true"><i class="las la-map-marker"></i>View Map</a>
                                                      </h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="collapse mb-4" id="collapseExample">
                                                <div class="card card-body">
                                                   <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center mb-3">
                                                   <div><i class="las la-map-marker circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Address2</h3>
                                                      <h1 class="_detail">
                                                      {{ isset($medicalInstitute->medical_address2) ? $medicalInstitute->medical_address2  : ''}}
                                                         <a class="btn btn-info btn-sm ml-2" data-toggle="collapse" href="#collapseExample1" aria-expanded="true"><i class="las la-map-marker"></i>View Map</a>
                                                      </h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="collapse mb-4" id="collapseExample1">
                                                <div class="card card-body">
                                                   <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Building</h3>
                                                      <h1 class="_detail">  {{ isset($medicalInstitute->medical_building) ? $medicalInstitute->medical_building  : ''}}</h1>
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
                                                      <h1 class="_detail"> {{ isset($medicalInstitute->medical_cityId) ? \App\Models\City::find($medicalInstitute->medical_cityId)->city : '' }}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">State</h3>
                                                      <h1 class="_detail">{{ isset($medicalInstitute->medical_stateId) ? \App\Models\State::find($medicalInstitute->medical_stateId)->state : '' }}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Zip Code</h3>
                                                      <h1 class="_detail">{{ isset($medicalInstitute->medical_zipcode) ? $medicalInstitute->medical_zipcode : ''}}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                                 <li>
                                    <div class="_card mt-3">
                                       <div class="_card_header"><div class="title-head">Residency Institute Details</div></div>
                                       <div class="_card_body">
                                          <div class="row mt-3">
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center mb-3">
                                                   <div><i class="las la-map-marker circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Medical Institute Name</h3>
                                                      <h1 class="_detail">
                                                         {{ isset($residencyInstitute->medical_instituteName) ? $residencyInstitute->medical_instituteName  : ''}}
                                                      </h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center mb-3">
                                                   <div><i class="las la-map-marker circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Medical Year Started</h3>
                                                      <h1 class="_detail">
                                                         {{ isset($residencyInstitute->medical_yearStarted) ? $residencyInstitute->medical_yearStarted  : ''}}
                                                      </h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center mb-3">
                                                   <div><i class="las la-map-marker circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Medical Year Ended</h3>
                                                      <h1 class="_detail">
                                                         {{ isset($residencyInstitute->medical_yearEnded) ? $residencyInstitute->medical_yearEnded  : ''}}
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
                                                      <h3 class="_title">Address1</h3>
                                                      <h1 class="_detail">
                                                         {{ isset($residencyInstitute->medical_address1) ? $residencyInstitute->medical_address1  : ''}}
                                                         <a class="btn btn-info btn-sm ml-2" data-toggle="collapse" href="#collapseExample" aria-expanded="true"><i class="las la-map-marker"></i>View Map</a>
                                                      </h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="collapse mb-4" id="collapseExample">
                                                <div class="card card-body">
                                                   <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center mb-3">
                                                   <div><i class="las la-map-marker circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Address2</h3>
                                                      <h1 class="_detail">
                                                      {{ isset($residencyInstitute->medical_address2) ? $residencyInstitute->medical_address2  : ''}}
                                                         <a class="btn btn-info btn-sm ml-2" data-toggle="collapse" href="#collapseExample1" aria-expanded="true"><i class="las la-map-marker"></i>View Map</a>
                                                      </h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="collapse mb-4" id="collapseExample1">
                                                <div class="card card-body">
                                                   <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Building</h3>
                                                      <h1 class="_detail">  {{ isset($residencyInstitute->medical_building) ? $residencyInstitute->medical_building  : ''}}</h1>
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
                                                      <h1 class="_detail"> {{ isset($residencyInstitute->medical_cityId) ? \App\Models\City::find($residencyInstitute->medical_cityId)->city : '' }}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">State</h3>
                                                      <h1 class="_detail">{{ isset($residencyInstitute->medical_stateId) ? \App\Models\State::find($residencyInstitute->medical_stateId)->state : '' }}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Zip Code</h3>
                                                      <h1 class="_detail">{{ isset($residencyInstitute->medical_zipcode) ? $residencyInstitute->medical_zipcode : ''}}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                                 <li>
                                    <div class="_card mt-3">
                                       <div class="_card_header"><div class="title-head">Medical Institute Details</div></div>
                                       <div class="_card_body">
                                          <div class="row mt-3">
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center mb-3">
                                                   <div><i class="las la-map-marker circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Medical Institute Name</h3>
                                                      <h1 class="_detail">
                                                         {{ isset($fellowshipInstitute->medical_instituteName) ? $fellowshipInstitute->medical_instituteName  : ''}}
                                                      </h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center mb-3">
                                                   <div><i class="las la-map-marker circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Medical Year Started</h3>
                                                      <h1 class="_detail">
                                                         {{ isset($fellowshipInstitute->medical_yearStarted) ? $fellowshipInstitute->medical_yearStarted  : ''}}
                                                      </h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center mb-3">
                                                   <div><i class="las la-map-marker circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Medical Year Ended</h3>
                                                      <h1 class="_detail">
                                                         {{ isset($fellowshipInstitute->medical_yearEnded) ? $fellowshipInstitute->medical_yearEnded  : ''}}
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
                                                      <h3 class="_title">Address1</h3>
                                                      <h1 class="_detail">
                                                         {{ isset($fellowshipInstitute->medical_address1) ? $fellowshipInstitute->medical_address1  : ''}}
                                                         <a class="btn btn-info btn-sm ml-2" data-toggle="collapse" href="#collapseExample" aria-expanded="true"><i class="las la-map-marker"></i>View Map</a>
                                                      </h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="collapse mb-4" id="collapseExample">
                                                <div class="card card-body">
                                                   <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center mb-3">
                                                   <div><i class="las la-map-marker circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Address2</h3>
                                                      <h1 class="_detail">
                                                      {{ isset($fellowshipInstitute->medical_address2) ? $fellowshipInstitute->medical_address2  : ''}}
                                                         <a class="btn btn-info btn-sm ml-2" data-toggle="collapse" href="#collapseExample1" aria-expanded="true"><i class="las la-map-marker"></i>View Map</a>
                                                      </h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="collapse mb-4" id="collapseExample1">
                                                <div class="card card-body">
                                                   <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Building</h3>
                                                      <h1 class="_detail">  {{ isset($fellowshipInstitute->medical_building) ? $fellowshipInstitute->medical_building  : ''}}</h1>
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
                                                      <h1 class="_detail"> {{ isset($fellowshipInstitute->medical_cityId) ? \App\Models\City::find($fellowshipInstitute->medical_cityId)->city : '' }}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">State</h3>
                                                      <h1 class="_detail">{{ isset($fellowshipInstitute->medical_stateId) ? \App\Models\State::find($fellowshipInstitute->medical_stateId)->state : '' }}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Zip Code</h3>
                                                      <h1 class="_detail">{{ isset($fellowshipInstitute->medical_zipcode) ? $fellowshipInstitute->medical_zipcode : ''}}</h1>
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
                                    <li>
                                       <div class="_card mt-3">
                                          <div class="_card_header"><div class="title-head">INSTITUTE {{ $count }}</div></div>
                                          <div class="_card_body">
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i> </div>
                                                      <div>
                                                         <h3 class="_title">Name</h3>
                                                         <h1 class="_detail">{{ isset($education->name) ? $education->name : null }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
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
                                                         <h3 class="_title">Is Graduate?</h3>
                                                         <h1 class="_detail">{{ isset($education->isGraduate) ? $education->isGraduate : null }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Year</h3>
                                                         <h1 class="_detail">{{ isset($education->year) ? $education->year : null }}</h1>
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
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-map-marker circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Address1</h3>
                                                         <h1 class="_detail">
                                                            {{ isset($education->address1) ? $education->address1 : null }}
                                                            <a class="btn btn-info btn-sm ml-2" data-toggle="collapse" href="#collapseExample7" aria-expanded="true"><i class="las la-map-marker"></i>View Map</a>
                                                         </h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="collapse mb-4" id="collapseExample7">
                                                   <div class="card card-body">
                                                      <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-map-marker circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Address2</h3>
                                                         <h1 class="_detail">
                                                            {{ isset($education->address2) ? $education->address2 : null }}
                                                            <a class="btn btn-info btn-sm ml-2" data-toggle="collapse" href="#collapseExample7" aria-expanded="true"><i class="las la-map-marker"></i>View Map</a>
                                                         </h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="collapse mb-4" id="collapseExample7">
                                                   <div class="card card-body">
                                                      <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Building</h3>
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
                                             </div>
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">State</h3>
                                                         <h1 class="_detail">{{ isset($education->state_id) ? \App\Models\State::find($education->state_id)->state : '' }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Zip Code</h3>
                                                         <h1 class="_detail">{{ isset($education->zipcode) ? $education->zipcode : ''}}</h1>
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
                                                         <h3 class="_title">Have you ever been bonded?Bond</h3>
                                                         <h1 class="_detail">{{ isset($security_detail->bond) ? isBoolean($security_detail->bond) : null }}</h1>
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
                                                         <h1 class="_detail">{{ isset($security_detail->convict) ? isBoolean($security_detail->convict) : 'False' }}</h1>
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
                                                      <h3 class="_title">Branch</h3>
                                                      <h1 class="_detail">{{ isset($military_detail->branch) ? $military_detail->branch : null }}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Is Vietnam?</h3>
                                                      <h1 class="_detail">{{ isset($military_detail->isVietnam) && $military_detail->isVietnam == '1' ? 'True' : 'False' }}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Is Cimmited?</h3>
                                                      <h1 class="_detail">{{ isset($military_detail->isCommited) && $military_detail->isCommited == '1' ? 'True' : 'False' }}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="row mt-3">
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Is Military?</h3>
                                                      <h1 class="_detail">{{ isset($military_detail->isMilitary) && $military_detail->isMilitary == '1' ? 'True' : 'False' }}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Server Start Date</h3>
                                                      <h1 class="_detail">{{ isset($military_detail->serve_start_date) ? $military_detail->serve_start_date : null }}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Server End Date</h3>
                                                      <h1 class="_detail">{{ isset($military_detail->serve_end_date) ? $military_detail->serve_end_date : null }}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="row mt-3">
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Is Disable Vetran?</h3>
                                                      <h1 class="_detail">{{ isset($military_detail->isDisableVetran ) && $military_detail->isDisableVetran == '1' ? 'True' : 'False' }}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Is Commited Explain?</h3>
                                                      <h1 class="_detail">{{ isset($military_detail->isCommited_explain) ? $military_detail->isCommited_explain : null }}</h1>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                   <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                   <div>
                                                      <h3 class="_title">Is Special Disable Vereram?</h3>
                                                      <h1 class="_detail">{{ isset($military_detail->isSpecialDisableVereran) && $military_detail->isSpecialDisableVereran == '1' ? 'True' : 'False' }}</h1>
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
                                    @foreach($employer_detail->employer as $index => $employer)
                                       <li>
                                          <div class="_card mt-3">
                                             <div class="_card_header"><div class="title-head">Company {{ $count }}</div></div>
                                             <div class="_card_body">
                                                <div class="row mt-3">
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                            <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                            <div>
                                                               <h3 class="_title">Company</h3>
                                                               <h1 class="_detail">{{ isset($employer->companyName) ? $employer->companyName : null }}</h1>
                                                            </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                            <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                            <div>
                                                               <h3 class="_title">Phone Number</h3>
                                                               <h1 class="_detail">{{ isset($employer->phoneNo) ? $employer->phoneNo : null }}</h1>
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
                                                      <div class="d-flex align-items-center mb-3">
                                                         <div><i class="las la-map-marker circle-icon"></i></div>
                                                         <div>
                                                               <h3 class="_title">Address1</h3>
                                                               <h1 class="_detail">
                                                                  {{ isset($employer->address1) ? $employer->address1 : null }}
                                                                  <a class="btn btn-info btn-sm ml-2" data-toggle="collapse" href="#collapseExample7" aria-expanded="true"><i class="las la-map-marker"></i>View Map</a>
                                                               </h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="collapse mb-4" id="collapseExample7">
                                                      <div class="card card-body">
                                                         <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center mb-3">
                                                         <div><i class="las la-map-marker circle-icon"></i></div>
                                                         <div>
                                                               <h3 class="_title">Address2</h3>
                                                               <h1 class="_detail">
                                                                  {{ isset($employer->address2) ? $employer->address2 : null }}
                                                                  <a class="btn btn-info btn-sm ml-2" data-toggle="collapse" href="#collapseExample7" aria-expanded="true"><i class="las la-map-marker"></i>View Map</a>
                                                               </h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="collapse mb-4" id="collapseExample7">
                                                      <div class="card card-body">
                                                         <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Building</h3>
                                                            <h1 class="_detail">  {{ isset($employer->building) ? $employer->building  : ''}}</h1>
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
                                                               <h1 class="_detail"> {{ isset($employer->city_id) ? \App\Models\City::find($employer->city_id)->city : '' }}</h1>
                                                            </div>
                                                      </div>
                                                   </div>
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
                                                </div>
                                             </div>
                                          </div>
                                       </li>
                                       @php $count++; @endphp
                                    @endforeach
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
                                                         <h3 class="_title">Is Current Employee</h3>
                                                         <h1 class="_detail">{{ isset($employer_detail->isCurrentEmployee) && $employer_detail->isCurrentEmployee == 'true' ? 'True' : 'False' }}</h1>
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
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div><i class="las la-angle-double-right circle-icon"></i></div>
                                          <div>
                                             <h3 class="_title">Name on account</h3>
                                             <h1 class="_detail">{{ isset($payroll_details->nameOfAccount) ? $payroll_details->nameOfAccount : null }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div><i class="las la-angle-double-right circle-icon"></i></div>
                                          <div>
                                             <h3 class="_title">Type of account</h3>
                                             <h1 class="_detail">{{ isset($payroll_details->typeOfAccount) ? $payroll_details->typeOfAccount : null }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div><i class="las la-angle-double-right circle-icon"></i></div>
                                          <div>
                                             <h3 class="_title">Rounting number <span class="text-info"></span></h3>
                                             <h1 class="_detail">{{ isset($payroll_details->routingNumber) ? $payroll_details->routingNumber : null }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row mt-3">
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div><i class="las la-angle-double-right circle-icon"></i></div>
                                          <div>
                                             <h3 class="_title">Account number <span class="text-info"></span></h3>
                                             <h1 class="_detail">{{ isset($payroll_details->accountNumber) ? $payroll_details->accountNumber : null }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div><i class="las la-angle-double-right circle-icon"></i></div>
                                          <div>
                                             <h3 class="_title">Name Of Bank <span class="text-info"></span></h3>
                                             <h1 class="_detail">{{ isset($payroll_details->nameOfBank) ? $payroll_details->nameOfBank : null }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div><i class="las la-angle-double-right circle-icon"></i></div>
                                          <div>
                                             <h3 class="_title">Dependents<span class="text-info"></span></h3>
                                             <h1 class="_detail">{{ isset($payroll_details->dependents) ? $payroll_details->dependents : null }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row mt-3">
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div><i class="las la-angle-double-right circle-icon"></i></div>
                                          <div>
                                             <h3 class="_title">Other Dependents <span class="text-info"></span></h3>
                                             <h1 class="_detail">{{ isset($payroll_details->otherdependents) ? $payroll_details->otherdependents : null }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div><i class="las la-angle-double-right circle-icon"></i></div>
                                          <div>
                                             <h3 class="_title">Children Dependents<span class="text-info"></span></h3>
                                             <h1 class="_detail">{{ isset($payroll_details->childrendependents) ? $payroll_details->childrendependents : null }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div><i class="las la-angle-double-right circle-icon"></i></div>
                                          <div>
                                             <h3 class="_title">Total Dependents<span class="text-info"></span></h3>
                                             <h1 class="_detail">{{ isset($payroll_details->totaldependents) ? $payroll_details->totaldependents : null }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 @if ($data->designation_id != '2')
                                    <div class="row mt-3">
                                       <div class="col-12 col-sm-4">
                                          <div class="d-flex align-items-center">
                                             <div><i class="las la-angle-double-right circle-icon"></i></div>
                                             <div>
                                                <h3 class="_title">Legal Entity<span class="text-info"></span></h3>
                                                <h1 class="_detail">{{ isset($payroll_details->legal_entity) ? $payroll_details->legal_entity : null }}</h1>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-12 col-sm-4">
                                          <div class="d-flex align-items-center">
                                             <div><i class="las la-angle-double-right circle-icon"></i></div>
                                             <div>
                                                <h3 class="_title">Tax Payer Id Number<span class="text-info"></span></h3>
                                                <h1 class="_detail">{{ isset($payroll_details->taxpayer_id_number) ? $payroll_details->taxpayer_id_number : null }}</h1>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-12 col-sm-4">
                                          <div class="d-flex align-items-center">
                                             <div><i class="las la-angle-double-right circle-icon"></i></div>
                                             <div>
                                                <h3 class="_title">Are You Filing As A Entity<span class="text-info"></span></h3>
                                                <h1 class="_detail">{{ isset($payroll_details->are_you_filing_as_a_entity) ? $payroll_details->are_you_filing_as_a_entity : null }}</h1>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 @endif
                                 <div class="row mt-3">
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div><i class="las la-angle-double-right circle-icon"></i></div>
                                          <div>
                                             <h3 class="_title">Files Your Tax<span class="text-info"></span></h3>
                                             <h1 class="_detail">{{ isset($payroll_details->filesyourtax) ? $payroll_details->filesyourtax : null }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div><i class="las la-map-marker circle-icon"></i></div>
                                          <div>
                                             <h3 class="_title">Address on account line 1</h3>
                                             <h1 class="_detail">
                                                {{ isset($payroll_details->address1) ? $payroll_details->address1 : null }}
                                                <a class="btn btn-info btn-sm ml-2" data-toggle="collapse" href="#collapseExample16"><i class="las la-map-marker"></i>View Map</a>
                                             </h1>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="collapse mt-4" id="collapseExample16">
                                       <div class="card card-body">
                                          <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row mt-3">
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div><i class="las la-map-marker circle-icon"></i></div>
                                          <div>
                                             <h3 class="_title">Address on account line 2</h3>
                                             <h1 class="_detail">
                                                {{ isset($payroll_details->address2) ? $payroll_details->address2 : null }}
                                                <a class="btn btn-info btn-sm ml-2" data-toggle="collapse" href="#collapseExample17"><i class="las la-map-marker"></i>View Map</a>
                                             </h1>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="collapse mt-4" id="collapseExample17">
                                       <div class="card card-body">
                                          <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                       </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div><i class="las la-angle-double-right circle-icon"></i></div>
                                          <div>
                                             <h3 class="_title">Building</h3>
                                             <h1 class="_detail">  {{ isset($payroll_details->building) ? $payroll_details->building  : ''}}</h1>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div><i class="las la-angle-double-right circle-icon"></i></div>
                                          <div>
                                             <h3 class="_title">City</h3>
                                             <h1 class="_detail"> {{ isset($payroll_details->city_id) ? \App\Models\City::find($payroll_details->city_id)->city : '' }}</h1>
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
                                             <h1 class="_detail">{{ isset($payroll_details->state_id) ? \App\Models\State::find($payroll_details->state_id)->state : '' }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                       <div class="d-flex align-items-center">
                                          <div><i class="las la-angle-double-right circle-icon"></i></div>
                                          <div>
                                             <h3 class="_title">Zip Code</h3>
                                             <h1 class="_detail">{{ isset($payroll_details->zip_code) ? $payroll_details->zip_code : null }}</h1>
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
                                 @php $count = '1'; @endphp
                                 @isset($workHistory_detail->list)
                                    @foreach($workHistory_detail->list as $index => $workHistory)
                                    <li>
                                       <div class="_card mt-3">
                                          <div class="_card_header"><div class="title-head">INSTITUTE {{ $count }}</div></div>
                                          <div class="_card_body">
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i> </div>
                                                      <div>
                                                         <h3 class="_title">Company Name</h3>
                                                         <h1 class="_detail">{{ isset($workHistory->companyName) ? $workHistory->companyName : null }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i> </div>
                                                      <div>
                                                         <h3 class="_title">Record Id</h3>
                                                         <h1 class="_detail">{{ isset($workHistory->recordId) ? $workHistory->recordId : null }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Start Date</h3>
                                                         <h1 class="_detail">{{ isset($workHistory->startDate) ? $workHistory->startDate : null }}</h1>
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
                                                         <h1 class="_detail">{{ isset($workHistory->endDate) ? $workHistory->endDate : null }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Reason</h3>
                                                         <h1 class="_detail">{{ isset($workHistory->reason) ? $workHistory->reason : null }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Position</h3>
                                                         <h1 class="_detail">{{ isset($workHistory->position) ? $workHistory->position : null }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-map-marker circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Address1</h3>
                                                         <h1 class="_detail">
                                                            {{ isset($workHistory->address1) ? $workHistory->address1 : null }}
                                                            <a class="btn btn-info btn-sm ml-2" data-toggle="collapse" href="#collapseExample7" aria-expanded="true"><i class="las la-map-marker"></i>View Map</a>
                                                         </h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="collapse mb-4" id="collapseExample7">
                                                   <div class="card card-body">
                                                      <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-map-marker circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Address2</h3>
                                                         <h1 class="_detail">
                                                            {{ isset($workHistory->address2) ? $workHistory->address2 : null }}
                                                            <a class="btn btn-info btn-sm ml-2" data-toggle="collapse" href="#collapseExample7" aria-expanded="true"><i class="las la-map-marker"></i>View Map</a>
                                                         </h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="collapse mb-4" id="collapseExample7">
                                                   <div class="card card-body">
                                                      <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Building</h3>
                                                         <h1 class="_detail">  {{ isset($workHistory->building) ? $workHistory->building  : ''}}</h1>
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
                                                         <h1 class="_detail"> {{ isset($workHistory->cityId) ? \App\Models\City::find($workHistory->cityId)->city : '' }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">State</h3>
                                                         <h1 class="_detail">{{ isset($workHistory->stateId) ? \App\Models\State::find($workHistory->stateId)->state : '' }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Zip Code</h3>
                                                         <h1 class="_detail">{{ isset($workHistory->zipCode) ? $workHistory->zipCode : ''}}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                    @php $count++; @endphp
                                    @endforeach
                                    <li>
                                       <div class="_card mt-3">
                                          <div class="_card_header"><div class="title-head">Other Detail</div></div>
                                          <div class="_card_body">
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Gap Reason</h3>
                                                         <h1 class="_detail">{{ isset($workHistory_detail->gapReason) ? $workHistory_detail->gapReason : ''}}</h1>
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
                                          <div class="_card_header"><div class="title-head">Professional</div></div>
                                          <div class="_card_body">
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i> </div>
                                                      <div>
                                                         <h3 class="_title">Npi Orginal Name</h3>
                                                         <h1 class="_detail">{{ isset($professional_detail->npiOrgName) ? $professional_detail->npiOrgName : null }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i> </div>
                                                      <div>
                                                         <h3 class="_title">Npi Type</h3>
                                                         <h1 class="_detail">{{ isset($professional_detail->npiType) ? $professional_detail->npiType : null }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Age</h3>
                                                         <h1 class="_detail">
                                                         @if(isset($professional_detail->age_0_18))
                                                            Age 0 to 18,
                                                         @endif
                                                         @if(isset($professional_detail->age_19_40))
                                                            Age 19 to 40,
                                                         @endif
                                                         @if(isset($professional_detail->age_41_65))
                                                            Age 41 to 65,
                                                         @endif
                                                         @if(isset($professional_detail->age_65Plus))
                                                            Age 65+,
                                                         @endif
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
                                                         <h3 class="_title">Npi Number</h3>
                                                         <h1 class="_detail">{{ isset($professional_detail->npiNumber) ? $professional_detail->npiNumber : null }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Federal DEA Id</h3>
                                                         <h1 class="_detail">{{ isset($professional_detail->federal_DEA_id) ? $professional_detail->federal_DEA_id : null }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Medicaid Enrolled</h3>
                                                         <h1 class="_detail">{{ isset($professional_detail->medicaidEnrolled) ? $professional_detail->medicaidEnrolled : null }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Medicare Enrolled</h3>
                                                         <h1 class="_detail">
                                                            {{ isset($professional_detail->medicareEnrolled) ? $professional_detail->medicareEnrolled : null }}
                                                         </h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Taxonomy Description</h3>
                                                         <h1 class="_detail">
                                                            {{ isset($professional_detail->taxonomyDescription) ? $professional_detail->taxonomyDescription : null }}
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
                                                         <h3 class="_title">Fed Expired</h3>
                                                         <h1 class="_detail">{{ isset($professional_detail->fedExpiredMonthYear) ? $professional_detail->fedExpiredMonthYear : '' }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-map-marker circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Address1</h3>
                                                         <h1 class="_detail">
                                                            {{ isset($professional_detail->npa_address1) ? $professional_detail->npa_address1  : ''}}
                                                            <a class="btn btn-info btn-sm ml-2" data-toggle="collapse" href="#collapseExample" aria-expanded="true"><i class="las la-map-marker"></i>View Map</a>
                                                         </h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="collapse mb-4" id="collapseExample">
                                                   <div class="card card-body">
                                                      <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center mb-3">
                                                      <div><i class="las la-map-marker circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Address2</h3>
                                                         <h1 class="_detail">
                                                         {{ isset($professional_detail->npa_address2) ? $professional_detail->npa_address2  : ''}}
                                                            <a class="btn btn-info btn-sm ml-2" data-toggle="collapse" href="#collapseExample1" aria-expanded="true"><i class="las la-map-marker"></i>View Map</a>
                                                         </h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="collapse mb-4" id="collapseExample1">
                                                   <div class="card card-body">
                                                      <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Building</h3>
                                                         <h1 class="_detail">  {{ isset($professional_detail->npa_building) ? $professional_detail->npa_building  : ''}}</h1>
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
                                                         <h1 class="_detail"> {{ isset($professional_detail->npa_cityId) ? \App\Models\City::find($professional_detail->npa_cityId)->city : '' }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">State</h3>
                                                         <h1 class="_detail">{{ isset($professional_detail->npa_stateId) ? \App\Models\State::find($professional_detail->npa_stateId)->state : '' }}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                      <div>
                                                         <h3 class="_title">Zip Code</h3>
                                                         <h1 class="_detail">{{ isset($professional_detail->npa_zipCode) ? $professional_detail->npa_zipCode : ''}}</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             @php $child1Count = 1; @endphp
                                             @foreach($professional_detail->medicare as $medicare)
                                                <div class="row mt-3">
                                                   <div class="col-12 col-sm-12"><div class="_card_header"><div class="title-head">Medicare {{ $child1Count }}</div></div></div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center mb-3">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Number</h3>
                                                            <h1 class="_detail">
                                                               {{ isset($medicare->Number) ? $medicare->Number : null }}
                                                            </h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">State</h3>
                                                            <h1 class="_detail">{{ isset($medicare->StateID) ? \App\Models\State::find($medicare->StateID)->state : '' }}</h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                @php $child1Count++; @endphp
                                             @endforeach
                                             @php $child2Count = 1; @endphp
                                             @foreach($professional_detail->medicaid as $medicaid)
                                                <div class="row mt-3">
                                                   <div class="col-12 col-sm-12"><div class="_card_header"><div class="title-head">Medicaid {{ $child2Count }}</div></div></div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center mb-3">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Number</h3>
                                                            <h1 class="_detail">
                                                               {{ isset($medicaid->Number) ? $medicaid->Number : null }}
                                                            </h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">State</h3>
                                                            <h1 class="_detail">{{ isset($medicaid->StateID) ? \App\Models\State::find($medicaid->StateID)->state : '' }}</h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                @php $child2Count++; @endphp
                                             @endforeach
                                             @php $child3Count = 1; @endphp
                                             @foreach($professional_detail->stateLicense as $stateLicense)
                                                <div class="row mt-3">
                                                   <div class="col-12 col-sm-12"><div class="_card_header"><div class="title-head">State License {{ $child3Count }}</div></div></div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center mb-3">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Number</h3>
                                                            <h1 class="_detail">
                                                               {{ isset($stateLicense->Number) ? $stateLicense->Number : null }}
                                                            </h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">State</h3>
                                                            <h1 class="_detail">{{ isset($stateLicense->StateID) ? \App\Models\State::find($stateLicense->StateID)->state : '' }}</h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Category</h3>
                                                            <h1 class="_detail">{{ isset($stateLicense->Category) ? $stateLicense->Category : '' }}</h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                @php $child3Count++; @endphp
                                             @endforeach
                                             @php $child4Count = 1; @endphp
                                             @foreach($professional_detail->boardCertificate as $boardCertificate)
                                                <div class="row mt-3">
                                                   <div class="col-12 col-sm-12"><div class="_card_header"><div class="title-head">Board Certificate {{ $child4Count }}</div></div></div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center mb-3">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Status</h3>
                                                            <h1 class="_detail">
                                                               {{ isset($boardCertificate->status) ? $boardCertificate->status : null }}
                                                            </h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-4">
                                                      <div class="d-flex align-items-center">
                                                         <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                         <div>
                                                            <h3 class="_title">Certificate</h3>
                                                            <h1 class="_detail">{{ isset($boardCertificate->Catecertificategory) ? $boardCertificate->certificate : '' }}</h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                @php $child4Count++; @endphp
                                             @endforeach
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
            <!-- Verify Identity Start -->
            <div class="tab-pane fade" id="VerifyIdentity" role="tabpanel" aria-labelledby="v-pills-VerifyIdentity-tab">
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
                                                            <h1 class="_detail">{{ isset($data->dob) ? date('m-d-Y', strtotime($data->dob)) : null }}</h1>
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
            </div>
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
                     <table class="table_doc" cellspacing="15">
                        <tr>
                           <td>
                              <table class="table_doc" cellspacing="15">
                                 <tbody>
                                    <tr>
                                       <td>1</td>
                                       <td><a class="nav-link active view_document" data-id="{{ $data->id }}" data-type="1" id="Details-tab" data-toggle="tab" href="#IDProof" role="tab" aria-controls="IDProof" aria-selected="true">ID Proof {{isset($type1)  ? '('.$type1.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
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
                                       <td>3</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="6" id="professionalReferrance-tab" data-toggle="tab" href="#professionalReferrance" role="tab" aria-controls="professionalReferrance" aria-selected="false">Professional Referrance {{isset($type6)  ? '('.$type6.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
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
                                       <td>5</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="8" id="nycNurseCertificate-tab" data-toggle="tab" href="#nycNurseCertificate" role="tab" aria-controls="nycNurseCertificate" aria-selected="false">Nyc Nurse Certificate {{isset($type8)  ? '('.$type8.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
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
                                       <td>7</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="10" id="physical-tab" data-toggle="tab" href="#physical" role="tab" aria-controls="physical" aria-selected="false">Physical {{isset($type10)  ? '('.$type10.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
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
                                       <td>9</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="12" id="RubellaImmunization-tab" data-toggle="tab" href="#RubellaImmunization" role="tab" aria-controls="RubellaImmunization" aria-selected="false">Rubella Immunization {{isset($type12)  ? '('.$type12.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
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
                                       <td>11</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="14" id="MalpracticeInsurance-tab" data-toggle="tab" href="#MalpracticeInsurance" role="tab" aria-controls="MalpracticeInsurance" aria-selected="false">Malpractice Insurance {{isset($type14)  ? '('.$type14.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
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
                                       <td>13</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="16" id="AnnualPPD-tab" data-toggle="tab" href="#AnnualPPD" role="tab" aria-controls="AnnualPPD" aria-selected="false">Annual PPD {{isset($type16)  ? '('.$type16.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
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
                                       <td>15</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="18" id="AnnualTubeScreening-tab" data-toggle="tab" href="#AnnualTubeScreening" role="tab" aria-controls="AnnualTubeScreening" aria-selected="false">Annual Tube Screening {{isset($type18)  ? '('.$type18.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
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
                                       <td>17</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="20" id="idProofBack-tab" data-toggle="tab" href="#idProofBack" role="tab" aria-controls="idProofBack" aria-selected="false">Id Proof Back {{isset($type20)  ? '('.$type20.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
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
                                       <td>19</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="22" id="pdfDoc-tab" data-toggle="tab" href="#pdfDoc" role="tab" aria-controls="pdfDoc" aria-selected="false">PDF Doc {{isset($type22)  ? '('.$type22.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
                                                   @foreach($data->documents as $document)
                                                      @if($document->type == 22)
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
                                       <td>21</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="26" id="currentCV-tab" data-toggle="tab" href="#currentCV" role="tab" aria-controls="currentCV" aria-selected="false">Current CV {{isset($type24)  ? '('.$type24.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
                                                   @foreach($data->documents as $document)
                                                      @if($document->type == 26)
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
                                       <td>23</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="28" id="StateRegistrationCertificate-tab" data-toggle="tab" href="#StateRegistrationCertificate" role="tab" aria-controls="StateRegistrationCertificate" aria-selected="false">State Registration Certificate {{isset($type26)  ? '('.$type26.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
                                                   @foreach($data->documents as $document)
                                                      @if($document->type == 28)
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
                                       <td>25</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="30" id="ControlledSubstanceStateLicense-tab" data-toggle="tab" href="#ControlledSubstanceStateLicense" role="tab" aria-controls="ControlledSubstanceStateLicense" aria-selected="false">Controlled Substance State License {{isset($type28)  ? '('.$type28.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
                                                   @foreach($data->documents as $document)
                                                      @if($document->type == 30)
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
                                       <td>27</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="32" id="ExplanationOfAllMalpractice-tab" data-toggle="tab" href="#ExplanationOfAllMalpractice" role="tab" aria-controls="ExplanationOfAllMalpractice" aria-selected="false">Explanation Of All Malpractice {{isset($type30)  ? '('.$type30.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
                                                   @foreach($data->documents as $document)
                                                      @if($document->type == 32)
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
                                       <td>29</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="34" id="ResidencyCertificate-tab" data-toggle="tab" href="#ResidencyCertificate" role="tab" aria-controls="ResidencyCertificate" aria-selected="false">Residency Certificate {{isset($type32)  ? '('.$type32.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
                                                   @foreach($data->documents as $document)
                                                      @if($document->type == 34)
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
                                       <td>31</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="36" id="IntershipCertificate-tab" data-toggle="tab" href="#IntershipCertificate" role="tab" aria-controls="IntershipCertificate" aria-selected="false">Intership Certificate {{isset($type34)  ? '('.$type34.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
                                                   @foreach($data->documents as $document)
                                                      @if($document->type == 36)
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
                                       <td>33</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="38" id="BoardCertificate-tab" data-toggle="tab" href="#BoardCertificate" role="tab" aria-controls="BoardCertificate" aria-selected="false">Board Certificate {{isset($type36)  ? '('.$type36.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
                                                   @foreach($data->documents as $document)
                                                      @if($document->type == 38)
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
                                       <td>35</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="40" id="SanctionsQueries-tab" data-toggle="tab" href="#SanctionsQueries" role="tab" aria-controls="SanctionsQueries" aria-selected="false">Sanctions Queries {{isset($type38)  ? '('.$type38.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
                                                   @foreach($data->documents as $document)
                                                      @if($document->type == 40)
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
                                       <td>37</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="42" id="SignedW9-tab" data-toggle="tab" href="#SignedW9" role="tab" aria-controls="SignedW9" aria-selected="false">Signed W9 {{isset($type40)  ? '('.$type40.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
                                                   @foreach($data->documents as $document)
                                                      @if($document->type == 42)
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
                                       <td>39</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="42" id="CPRACLS-tab" data-toggle="tab" href="#CPRACLS" role="tab" aria-controls="CPRACLS" aria-selected="false">CPR ACLS {{isset($type42)  ? '('.$type42.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
                                                   @foreach($data->documents as $document)
                                                      @if($document->type == 45)
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
                           </td>
                           <td>
                              <table class="table_doc" cellspacing="15">
                                 <tbody>
                                    <tr>
                                       <td>2</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="5" id="socialSecurity-tab" data-toggle="tab" href="#socialSecurity" role="tab" aria-controls="socialSecurity" aria-selected="true">Social Security {{isset($type5)  ? '('.$type5.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
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
                                       <td>4</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="7" id="mainPracticeInsurance-tab" data-toggle="tab" href="#mainPracticeInsurance" role="tab" aria-controls="mainPracticeInsurance" aria-selected="false">Main Practice Insurance {{isset($type7)  ? '('.$type7.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
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
                                       <td>6</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="9" id="CPR-tab" data-toggle="tab" href="#CPR" role="tab" aria-controls="CPR" aria-selected="false">CPR {{isset($type9)  ? '('.$type9.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
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
                                       <td>8</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="11" id="forensicDrugScreen-tab" data-toggle="tab" href="#forensicDrugScreen" role="tab" aria-controls="forensicDrugScreen" aria-selected="false">Forensic Drug Screen {{isset($type11)  ? '('.$type11.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
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
                                       <td>10</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="13" id="RubellaMeasiesImmunization-tab" data-toggle="tab" href="#RubellaMeasiesImmunization" role="tab" aria-controls="RubellaMeasiesImmunization" aria-selected="false">Rubella Measies Immunization {{isset($type13)  ? '('.$type13.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
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
                                       <td>12</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="15" id="Flu-tab" data-toggle="tab" href="#Flu" role="tab" aria-controls="Flu" aria-selected="false">Flu {{isset($type15)  ? '('.$type15.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
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
                                       <td>14</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="17" id="ChestXRay-tab" data-toggle="tab" href="#ChestXRay" role="tab" aria-controls="ChestXRay" aria-selected="false">Chest X-Ray {{isset($type17)  ? '('.$type17.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
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
                                       <td>16</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="19" id="w4document-tab" data-toggle="tab" href="#w4document" role="tab" aria-controls="w4document" aria-selected="false">w4document {{isset($type19)  ? '('.$type19.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
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
                                       <td>18</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="21" id="socialSecurityBack-tab" data-toggle="tab" href="#socialSecurityBack" role="tab" aria-controls="socialSecurityBack" aria-selected="false">Social Security Back {{isset($type21)  ? '('.$type21.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
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
                                    <tr>
                                       <td>20</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="25" id="pictureIdentification-tab" data-toggle="tab" href="#pictureIdentification" role="tab" aria-controls="pictureIdentification" aria-selected="false">Picture Identification {{isset($type23)  ? '('.$type23.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
                                                   @foreach($data->documents as $document)
                                                      @if($document->type == 25)
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
                                       <td>22</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="27" id="ProfessionalLicense-tab" data-toggle="tab" href="#ProfessionalLicense" role="tab" aria-controls="ProfessionalLicense" aria-selected="false">Professional License {{isset($type25)  ? '('.$type25.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
                                                   @foreach($data->documents as $document)
                                                      @if($document->type == 27)
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
                                       <td>24</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="29" id="DEALicense-tab" data-toggle="tab" href="#DEALicense" role="tab" aria-controls="DEALicense" aria-selected="false">DEA License {{isset($type27)  ? '('.$type27.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
                                                   @foreach($data->documents as $document)
                                                      @if($document->type == 29)
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
                                       <td>26</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="31" id="MalpracticeCertificateOfInsurance-tab" data-toggle="tab" href="#MalpracticeCertificateOfInsurance" role="tab" aria-controls="MalpracticeCertificateOfInsurance" aria-selected="false">Malpractice Certificate Of Insurance {{isset($type29)  ? '('.$type29.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
                                                   @foreach($data->documents as $document)
                                                      @if($document->type == 31)
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
                                       <td>28</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="33" id="MedicalSchoolDiploma-tab" data-toggle="tab" href="#MedicalSchoolDiploma" role="tab" aria-controls="MedicalSchoolDiploma" aria-selected="false">Malpractice Certificate Of Insurance {{isset($type31)  ? '('.$type31.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
                                                   @foreach($data->documents as $document)
                                                      @if($document->type == 33)
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
                                       <td>30</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="35" id="FellowshipCertificate-tab" data-toggle="tab" href="#FellowshipCertificate" role="tab" aria-controls="FellowshipCertificate" aria-selected="false">Fellowship Certificate {{isset($type33)  ? '('.$type33.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
                                                   @foreach($data->documents as $document)
                                                      @if($document->type == 35)
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
                                       <td>32</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="37" id="ECFMGCertificate-tab" data-toggle="tab" href="#ECFMGCertificate" role="tab" aria-controls="ECFMGCertificate" aria-selected="false">ECFMG Certificate {{isset($type35)  ? '('.$type35.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
                                                   @foreach($data->documents as $document)
                                                      @if($document->type == 37)
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
                                       <td>34</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="39" id="HospitalAffiliationLetter-tab" data-toggle="tab" href="#HospitalAffiliationLetter" role="tab" aria-controls="HospitalAffiliationLetter" aria-selected="false">Hospital Affiliation Letter {{isset($type37)  ? '('.$type37.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
                                                   @foreach($data->documents as $document)
                                                      @if($document->type == 39)
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
                                       <td>36</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="41" id="MedicalWelcomeLetter-tab" data-toggle="tab" href="#MedicalWelcomeLetter" role="tab" aria-controls="MedicalWelcomeLetter" aria-selected="false">Medical Welcome Letter {{isset($type39)  ? '('.$type39.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
                                                   @foreach($data->documents as $document)
                                                      @if($document->type == 41)
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
                                       <td>38</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="43" id="SignedESignatureForm-tab" data-toggle="tab" href="#SignedESignatureForm" role="tab" aria-controls="SignedESignatureForm" aria-selected="false">Signed ESignature Form {{isset($type41)  ? '('.$type41.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
                                                   @foreach($data->documents as $document)
                                                      @if($document->type == 43)
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
                                       <td>40</td>
                                       <td><a class="nav-link view_document" data-id="{{ $data->id }}" data-type="43" id="CovidCertificate-tab" data-toggle="tab" href="#CovidCertificate" role="tab" aria-controls="CovidCertificate" aria-selected="false">Covid Certificate {{isset($type43)  ? '('.$type43.')' : ''}}</a></td>
                                       <td>
                                          @isset($data->documents)
                                             <table>
                                                <tr>
                                                   @foreach($data->documents as $document)
                                                      @if($document->type == 44)
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
                           </td>
                        </tr>
                     </table>
                  </div>
               </div>
               <!--  Documents Verifiaction End -->
            </div>
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