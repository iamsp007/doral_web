@extends('pages.layouts.app')

@section('title','Patient Detail')
@section('pageTitleSection')
    <img src="{{ asset('assets/img/icons/computer-icon.svg') }}" class="vbcIcon mr-2"> Patient Detail
@endsection

@section('content')

   <!-- <section class="app-body app-body-custom"> -->
      <div class="app-clinician-patient-chart">
         <header class="patient-chart-header">
            <div class="leftItem">
               <div class="userIcon">
                  <div class="icon">
                     <img src="../assets/img/user/01.png" alt="" srcset="../assets/img/user/01.png"
                        class="img-fluid">
                  </div>
                  <div class="name">
                     {{ $details->last_name }}
                  </div>
               </div>
               <div>
                  <ul class="shortdesc">
                     <li>Admission ID: <span>{{ $details->admission_id}}</span></li>
                     <li>Gender: <span>{{ $details->gender }}</span></li>
                     <li>DOB: <span>28/08/1981</span></li>
                  </ul>
               </div>
            </div>
            <div class="rightItem">
            </div>
         </header>
         <div class="p-4 app-pdetail">
            <div class="row">
               <div class="col-12 col-sm-2">
                  <ul class="nav flex-column nav-pills nav-patient-profile" id="v-pills-tab" role="tablist"
                     aria-orientation="vertical">
                     <li>
                        <a class="nav-link d-flex align-items-center" id="demographic-tab" data-toggle="pill"
                           href="#demographic" role="tab" aria-controls="demographic" aria-selected="true">
                           <img src="../assets/img/icons/icons_demographics.svg" alt="" class="mr-2 inactiveIcon">
                           <img src="../assets/img/icons/icons_demographics_active.svg" alt=""
                              class="mr-2 activeIcon">Demographics
                        </a>
                     </li>
                     <li>
                        <a class="nav-link d-flex align-items-center" id="insurance-tab" data-toggle="pill"
                           href="#insurance" role="tab" aria-controls="insurance" aria-selected="false">
                           <img src="../assets/img/icons/icons_insurance.svg" alt="" class="mr-2 inactiveIcon">
                           <img src="../assets/img/icons/icons_insurance_active.svg" alt=""
                              class="mr-2 activeIcon">Insurance</a>
                     </li>
                     <li>
                        <a class="nav-link active d-flex align-items-center" id="billing-tab" data-toggle="pill"
                           href="#billing" role="tab" aria-controls="billing" aria-selected="false">
                           <img src="../assets/img/icons/icons_insurance.svg" alt="" class="mr-2 inactiveIcon">
                           <img src="../assets/img/icons/icons_insurance_active.svg" alt=""
                              class="mr-2 activeIcon">Billing</a>
                     </li>
                     <li>
                        <a class="nav-link d-flex align-items-center" id="homecare-tab" data-toggle="pill"
                           href="#homecare" role="tab" aria-controls="homecare" aria-selected="false">
                           <img src="../assets/img/icons/icons_home_care.svg" alt="" class="mr-2 inactiveIcon">
                           <img src="../assets/img/icons/icons_home_care_active.svg" alt=""
                              class="mr-2 activeIcon">Home
                           Care</a>
                     </li>
                     <li>
                        <a class="nav-link  d-flex align-items-center" id="clinical-tab" data-toggle="pill"
                           href="#clinical" role="tab" aria-controls="clinical" aria-selected="false">
                           <img src="../assets/img/icons/icons_clinical.svg" alt="" class="mr-2 inactiveIcon">
                           <img src="../assets/img/icons/icons_clinical_active.svg" alt=""
                              class="mr-2 activeIcon">
                           Clinical</a>
                     </li>
                     <li>
                        <a class="nav-link d-flex align-items-center" id="physican-tab" data-toggle="pill"
                           href="#physican" role="tab" aria-controls="physican" aria-selected="false">
                           <img src="../assets/img/icons/icons_physician.svg" alt="" class="mr-2 inactiveIcon">
                           <img src="../assets/img/icons/icons_physician_active.svg" alt=""
                              class="mr-2 activeIcon">Physician</a>
                     </li>
                     <li>
                        <a class="nav-link d-flex align-items-center" id="diagnosis-tab" data-toggle="pill"
                           href="#diagnosis" role="tab" aria-controls="diagnosis" aria-selected="false">
                           <img src="../assets/img/icons/icons_daignosis.svg" alt="" class="mr-2 inactiveIcon">
                           <img src="../assets/img/icons/icons_daignosis_active.svg" alt=""
                              class="mr-2 activeIcon">Diagnosis</a>
                     </li>
                     <li>
                        <a class="nav-link d-flex align-items-center" id="medProfile-tab" data-toggle="pill"
                           href="#medProfile" role="tab" aria-controls="medProfile" aria-selected="false">
                           <img src="../assets/img/icons/icons_medprofile.svg" alt="" class="mr-2 inactiveIcon">
                           <img src="../assets/img/icons/icons_medprofile_active.svg" alt=""
                              class="mr-2 activeIcon">Med Profile</a>
                     </li>
                     <li>
                        <a class="nav-link d-flex align-items-center" id="pharmacy-tab" data-toggle="pill"
                           href="#pharmacy" role="tab" aria-controls="pharmacy" aria-selected="false">
                           <img src="../assets/img/icons/icons_pharmacy.svg" alt="" class="mr-2 inactiveIcon">
                           <img src="../assets/img/icons/icons_pharmacy_active.svg" alt=""
                              class="mr-2 activeIcon">Pharmacy</a>
                     </li>
                  </ul>
               </div>
               <div class="col-12 col-sm-10">
                  <div class="tab-content" id="v-pills-tabContent">
                     <!-- Demographics Start -->
                     <div class="tab-pane fade" id="demographic" role="tabpanel" aria-labelledby="demographic">
                        <!-- Demographics Start -->
                        <div class="app-card app-card-custom" data-name="demographics">
                           <div class="app-card-header">
                              <h1 class="title">Demographics</h1>
                              <img src="../assets/img/icons/edit-field.svg" data-toggle="tooltip"
                                 data-placement="bottom" title="Edit" class="cursor-pointer edit-icon" alt=""
                                 onclick="editAllField('demographic')">
                              <img src="../assets/img/icons/update-icon.svg" data-toggle="tooltip"
                                 data-placement="bottom" title="Update" class="cursor-pointer update-icon" alt=""
                                 onclick="updateAllField('demographic')">
                           </div>
                           <div class="head scrollbar scrollbar4">
                              <div class="p-3">
                                 <div class="form-group">
                                    <div class="row">
                                       <div class="col-12 col-sm-3 col-md-3">
                                          <div class="input_box">
                                             <div class="ls">
                                                <i class="las la-phone circle"></i>
                                             </div>
                                             <div class="rs">
                                                <h3 class="_title">Phone</h3>
                                                <!-- <h1 class="_detail">9855665324</h1> -->
                                                <div>
                                                   <input type="tel" class="form-control-plaintext _detail "
                                                      readonly name="phoneno" data-id="phoneno"
                                                      onclick="editableField('phoneno')" id="phoneno"
                                                      onkeyup="this.value=this.value.replace(/[^\d]/,'')"
                                                      placeholder="9855665324" value="9855665324">
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-12 col-sm-3 col-md-3">
                                          <div class="input_box">
                                             <div class="ls">
                                                <i class="las la-envelope circle"></i>
                                             </div>
                                             <div class="rs">
                                                <h3 class="_title">Email</h3>
                                                <input type="text" class="form-control-plaintext _detail "
                                                   readonly name="emailId" onclick="editableField('emailId')"
                                                   data-id="emailId" id="emailId" onblur="validateEmail(this);"
                                                   placeholder="example@example.com" value="example@example.com">
                                                <!-- <a href="mailto:abcinsurance@gmail.com"
                                                   class="_detail">abcinsurance@gmail.com</a> -->
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-12 col-sm-3 col-md-3">
                                          <div class="input_box">
                                             <div class="ls">
                                                <i class="las la-calendar circle"></i>
                                             </div>
                                             <div class="rs">
                                                <h3 class="_title">Start Date</h3>
                                                <!-- <h1 class="_detail">1/1/2020</h1> -->
                                                <input type="text" class="form-control-plaintext _detail "
                                                   readonly name="datepicker"
                                                   onclick="editableField('datepicker')" data-id="datepicker"
                                                   id="datepicker" placeholder="1/1/2020" value="1/1/2020">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-12 col-sm-3 col-md-3">
                                          <div class="input_box">
                                             <div class="ls">
                                                <i class="las la-angle-double-right circle"></i>
                                             </div>
                                             <div class="rs">
                                                <h3 class="_title">Ethnicity</h3>
                                                <!-- <h1 class="_detail">lorem ipus</h1> -->
                                                <input type="text" class="form-control-plaintext _detail "
                                                   readonly name="ethnicity" onclick="editableField('ethnicity')"
                                                   data-id="ethnicity" id="ethnicity" placeholder="lorem ipus"
                                                   value="lorem ipus">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <div class="row">
                                       <div class="col-12 col-sm-3">
                                          <div class="input_box">
                                             <div class="ls">
                                                <i class="las la-angle-double-right circle"></i>
                                             </div>
                                             <div class="rs">
                                                <h3 class="_title">SSN#</h3>
                                                <!-- <h1 class="_detail">8454</h1> -->
                                                <input type="text" class="form-control-plaintext _detail "
                                                   readonly name="SSN" onclick="editableField('SSN')"
                                                   data-id="SSN" id="SSN" placeholder="SSN#" value="12345678910">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-12 col-sm-3">
                                          <div class="input_box">
                                             <div class="ls">
                                                <i class="las la-angle-double-right circle"></i>
                                             </div>
                                             <div class="rs">
                                                <h3 class="_title">Admission ID:</h3>
                                                <!-- <h1 class="_detail">8965465</h1> -->
                                                <input type="text" class="form-control-plaintext _detail "
                                                   readonly name="admissionId"
                                                   onclick="editableField('admissionId')" data-id="admissionId"
                                                   id="admissionId" placeholder="Addmission ID"
                                                   value="12345678910">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-12 col-sm-3">
                                          <div class="input_box">
                                             <div class="ls">
                                                <i class="las la-angle-double-right circle"></i>
                                             </div>
                                             <div class="rs">
                                                <h3 class="_title">Nurse</h3>
                                                <!-- <h1 class="_detail">lorem ipus</h1> -->
                                                <input type="text" class="form-control-plaintext _detail "
                                                   readonly name="nurse" onclick="editableField('nurse')"
                                                   data-id="nurse" id="nurse" placeholder="lorem ipus"
                                                   value="lorem ipus">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-12 col-sm-3">
                                          <div class="input_box">
                                             <div class="ls">
                                                <i class="las la-angle-double-right circle"></i>
                                             </div>
                                             <div class="rs">
                                                <h3 class="_title">Patient ID</h3>
                                                <!-- <h1 class="_detail">8454</h1> -->
                                                <input type="text" class="form-control-plaintext _detail "
                                                   readonly name="patientID" onclick="editableField('patientID')"
                                                   data-id="patientID" id="patientID" placeholder="Patient ID"
                                                   value="123456">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <div class="row">
                                       <div class="col-12 col-sm-3">
                                          <div class="input_box">
                                             <div class="ls">
                                                <i class="las la-angle-double-right circle"></i>
                                             </div>
                                             <div class="rs">
                                                <h3 class="_title">Coordinator</h3>
                                                <!-- <h1 class="_detail">lorem ipus</h1> -->
                                                <input type="text" class="form-control-plaintext _detail "
                                                   readonly name="coordinator"
                                                   onclick="editableField('coordinator')" data-id="coordinator"
                                                   id="coordinator" placeholder="Patient ID" value="Lorem Ipsum">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-12 col-sm-3">
                                          <div class="input_box">
                                             <div class="ls">
                                                <i class="las la-angle-double-right circle"></i>
                                             </div>
                                             <div class="rs">
                                                <h3 class="_title">HI Claim Number</h3>
                                                <!-- <h1 class="_detail">75443</h1> -->
                                                <input type="number" class="form-control-plaintext _detail "
                                                   readonly name="claim_no" onclick="editableField('claim_no')"
                                                   data-id="claim_no" id="claim_no" placeholder="HI Claim Number"
                                                   value="">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-12 col-sm-6">
                                          <div class="input_box">
                                             <div class="ls">
                                                <i class="las la-map-marker circle"></i>
                                             </div>
                                             <div class="rs">
                                                <h3 class="_title">Address 1</h3>
                                                <div class="d-flex align-items-center">
                                                   <!-- <h1 class="_detail">4009 Heron Way, Portland OR Oregon,
                                                      <span>97232</span>
                                                   </h1> -->
                                                   <input type="text" class="form-control-plaintext _detail "
                                                      readonly name="address" onclick="editableField('address')"
                                                      data-id="address" id="address" placeholder="Address"
                                                      value="4009 Heron Way, Portland OR Oregon">
                                                   <a class="ml-2" data-toggle="collapse" href="#collapseExample">
                                                      <img src="../assets/img/icons/location.svg" alt=""
                                                         srcset="../assets/img/icons/location.svg"
                                                         data-toggle="tooltip" data-placement="top"
                                                         title="View Map">
                                                   </a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="collapse mt-4" id="collapseExample">
                                    <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%"
                                       height="200" frameborder="0" scrolling="no" marginheight="0"
                                       marginwidth="0"
                                       src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                 </div>
                                 <!-- Emergency contact Detail -->
                                 <div class="app-card app-card-custom no-minHeight mb-3 box-shadow-none"
                                    data-name="emergency_contact_detail">
                                    <div class="app-card-header">
                                       <h1 class="title">Emergency Contact Detail</h1>
                                    </div>
                                    <div>
                                       <div class="p-3">
                                          <div class="">
                                             <div class="row">
                                                <div class="col-12 col-sm-3 col-md-3">
                                                   <div class="input_box">
                                                      <div class="ls">
                                                         <i class="las la-user-nurse circle"></i>
                                                      </div>
                                                      <div class="rs">
                                                         <h3 class="_title">Contact Name</h3>
                                                         <!-- <h1 class="_detail">Ara lus</h1> -->
                                                         <input type="text"
                                                            class="form-control-plaintext _detail " readonly
                                                            name="contact_name"
                                                            onclick="editableField('contact_name')"
                                                            data-id="contact_name" id="contact_name"
                                                            placeholder="Contact No" value="Shashikant Parmar">
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-3 col-md-3">
                                                   <div class="input_box">
                                                      <div class="ls">
                                                         <i class="las la-phone circle"></i>
                                                      </div>
                                                      <div class="rs">
                                                         <h3 class="_title">Home Phone</h3>
                                                         <!-- <h1 class="_detail">985471236</h1> -->
                                                         <input type="tel" class="form-control-plaintext _detail "
                                                            readonly name="home_phone"
                                                            onclick="editableField('home_phone')"
                                                            data-id="home_phone" id="home_phone"
                                                            onkeyup="this.value=this.value.replace(/[^\d]/,'')"
                                                            placeholder="Home Phone" value="985471236">
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-3 col-md-3">
                                                   <div class="input_box">
                                                      <div class="ls">
                                                         <i class="las la-phone circle"></i>
                                                      </div>
                                                      <div class="rs">
                                                         <h3 class="_title">Cell Phone</h3>
                                                         <!-- <h1 class="_detail">985471236</h1> -->
                                                         <input type="tel" class="form-control-plaintext _detail "
                                                            readonly name="cell_phone"
                                                            onclick="editableField('cell_phone')"
                                                            data-id="cell_phone" id="cell_phone"
                                                            onkeyup="this.value=this.value.replace(/[^\d]/,'')"
                                                            placeholder="Cell Phone" value="985471236">
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-3 col-md-3">
                                                   <div class="input_box">
                                                      <div class="ls">
                                                         <i class="las la-phone circle"></i>
                                                      </div>
                                                      <div class="rs">
                                                         <h3 class="_title">Work Phone</h3>
                                                         <!-- <h1 class="_detail">985471236</h1> -->
                                                         <input type="tel" class="form-control-plaintext _detail "
                                                            readonly name="work_phone2"
                                                            onclick="editableField('work_phone2')"
                                                            data-id="work_phone2" id="work_phone2"
                                                            onkeyup="this.value=this.value.replace(/[^\d]/,'')"
                                                            placeholder="Work Phone" value="985471236">
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Emergency contact Detail -->
                                 <!-- If Unavailable (2nd) Contact Detail -->
                                 <div class="app-card app-card-custom no-minHeight box-shadow-none"
                                    data-name="emergency_contact_detail">
                                    <div class="app-card-header">
                                       <h1 class="title">If Unavailable (2nd) Contact Detail</h1>
                                    </div>
                                    <div>
                                       <div class="p-3">
                                          <div class="">
                                             <div class="row">
                                                <div class="col-12 col-sm-3 col-md-3">
                                                   <div class="input_box">
                                                      <div class="ls">
                                                         <i class="las la-user-nurse circle"></i>
                                                      </div>
                                                      <div class="rs">
                                                         <h3 class="_title">Contact Name</h3>
                                                         <!-- <h1 class="_detail">Ara lus</h1> -->
                                                         <input type="tel" class="form-control-plaintext _detail "
                                                            readonly name="work_phone1"
                                                            onclick="editableField('work_phone1')"
                                                            data-id="work_phone1" id="work_phone1"
                                                            onkeyup="this.value=this.value.replace(/[^\d]/,'')"
                                                            placeholder="Work Phone" value="985471236">
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-3 col-md-3">
                                                   <div class="input_box">
                                                      <div class="ls">
                                                         <i class="las la-phone circle"></i>
                                                      </div>
                                                      <div class="rs">
                                                         <h3 class="_title">Home Phone</h3>
                                                         <!-- <h1 class="_detail">985471236</h1> -->
                                                         <input type="tel" class="form-control-plaintext _detail "
                                                            readonly name="home_phone1"
                                                            onclick="editableField('home_phone1')"
                                                            data-id="home_phone1" id="home_phone1"
                                                            onkeyup="this.value=this.value.replace(/[^\d]/,'')"
                                                            placeholder="Home Phone" value="985471236">
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-3 col-md-3">
                                                   <div class="input_box">
                                                      <div class="ls">
                                                         <i class="las la-phone circle"></i>
                                                      </div>
                                                      <div class="rs">
                                                         <h3 class="_title">Cell Phone</h3>
                                                         <!-- <h1 class="_detail">985471236</h1> -->
                                                         <input type="tel" class="form-control-plaintext _detail "
                                                            readonly name="cell_phone1"
                                                            onclick="editableField('home_phone1')"
                                                            data-id="cell_phone1" id="cell_phone1"
                                                            onkeyup="this.value=this.value.replace(/[^\d]/,'')"
                                                            placeholder="Cell Phone" value="985471236">
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-3 col-md-3">
                                                   <div class="input_box">
                                                      <div class="ls">
                                                         <i class="las la-phone circle"></i>
                                                      </div>
                                                      <div class="rs">
                                                         <h3 class="_title">Work Phone</h3>
                                                         <!-- <h1 class="_detail">985471236</h1> -->
                                                         <input type="tel" class="form-control-plaintext _detail "
                                                            readonly name="work_phone3"
                                                            onclick="editableField('work_phone3')"
                                                            data-id="work_phone3" id="work_phone3"
                                                            onkeyup="this.value=this.value.replace(/[^\d]/,'')"
                                                            placeholder="Work Phone" value="985471236">
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- If Unavailable (2nd) Contact Detail -->
                              </div>
                           </div>
                        </div>
                        <!-- Demographics End -->
                     </div>
                     <!-- Demographics End -->
                     <!-- Insurance Start -->
                     <div class="tab-pane fade" id="insurance" role="tabpanel" aria-labelledby="insurance-tab">
                        <div class="app-card app-card-custom" data-name="demographics">
                           <div class="app-card-header">
                              <h1 class="title">Insurance</h1>
                              <img src="../assets/img/icons/edit-field.svg" data-toggle="tooltip"
                                 data-placement="bottom" title="Edit" class="cursor-pointer edit-icon" alt=""
                                 onclick="editAllField('insurance')">
                              <img src="../assets/img/icons/update-icon.svg" data-toggle="tooltip"
                                 data-placement="bottom" title="Update" class="cursor-pointer update-icon" alt=""
                                 onclick="updateAllField('insurance')">
                           </div>
                           <div class="head scrollbar scrollbar4">
                              <div class="p-3">
                                 <!-- Medicade Start -->
                                 <div class="app-card app-card-custom no-minHeight box-shadow-none mb-3"
                                    data-name="medicaid">
                                    <div class="app-card-header">
                                       <h1 class="title mr-2">Medicaid</h1>
                                       <button type="button" class="btn btn-sm btn-info">Verify Recertification
                                          Date</button>
                                    </div>
                                    <div class="head">
                                       <div class="p-3">
                                          <div class="row">
                                             <div class="col-12 col-sm-3">
                                                <div class="input_box">
                                                   <div class="ls">
                                                      <i class="las la-angle-double-right circle"></i>
                                                   </div>
                                                   <div class="rs">
                                                      <h3 class="_title">Madicaid No</h3>
                                                      <!-- <h1 class="_detail">ABCD1234</h1> -->
                                                      <input type="text" class="form-control-plaintext _detail "
                                                         readonly name="madicaid_no" data-id="madicaid_no"
                                                         onclick="editableField('madicaid_no')" id="madicaid_no"
                                                         placeholder="ABCD1234" value="ABCD1234">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-3"></div>
                                             <div class="col-12 col-sm-3"></div>
                                             <div class="col-12 col-sm-3"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Medicade End -->
                                 <!-- Medicare Start -->
                                 <div class="app-card app-card-custom no-minHeight box-shadow-none mb-3"
                                    data-name="medicare">
                                    <div class="app-card-header">
                                       <h1 class="title mr-2">Medicare</h1>
                                       <button type="button" class="btn btn-sm btn-info">Verify Recertification
                                          Date</button>
                                    </div>
                                    <div class="head">
                                       <div class="p-3">
                                          <div class="row">
                                             <div class="col-12 col-sm-3">
                                                <div class="input_box">
                                                   <div class="ls">
                                                      <i class="las la-angle-double-right circle"></i>
                                                   </div>
                                                   <div class="rs">
                                                      <h3 class="_title">Medicare No</h3>
                                                      <!-- <h1 class="_detail">ABCD1234</h1> -->
                                                      <input type="text" class="form-control-plaintext _detail "
                                                         readonly name="medicare_no" data-id="medicare_no"
                                                         onclick="editableField('medicare_no')" id="medicare_no"
                                                         placeholder="ABCD1234" value="ABCD1234">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-3"></div>
                                             <div class="col-12 col-sm-3"></div>
                                             <div class="col-12 col-sm-3"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Medicare End -->
                                 <!-- Croley Insurance and Financial Start -->
                                 <div
                                    class="app-card app-card-custom no-minHeight box-shadow-none _add_new_company"
                                    data-name="croley_insurance_and_financial">
                                    <div class="app-card-header">
                                       <h1 class="title mr-2">Croley Insurance and Financial</h1>
                                       <a class="add_new_company" href="javascript:void(0)" data-toggle="tooltip"
                                          data-placement="left" title="Add New Insurance Company"><i
                                             class="las la-plus-circle la-2x"></i></a>
                                    </div>
                                    <div class="head">
                                       <div class="p-3">
                                          <div class="row">
                                             <div class="col-12 col-sm-3">
                                                <div class="input_box">
                                                   <div class="ls">
                                                      <i class="las la-angle-double-right circle"></i>
                                                   </div>
                                                   <div class="rs">
                                                      <h3 class="_title">Payer Id</h3>
                                                      <!-- <h1 class="_detail">13162</h1> -->
                                                      <input type="text" class="form-control-plaintext _detail "
                                                         readonly name="payerId1" data-id="payerId1"
                                                         onclick="editableField('payerId1')" id="payerId1"
                                                         placeholder="13162" value="13162">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-3">
                                                <div class="input_box">
                                                   <div class="ls">
                                                      <i class="las la-angle-double-right circle"></i>
                                                   </div>
                                                   <div class="rs">
                                                      <h3 class="_title">Phone</h3>
                                                      <!-- <h1 class="_detail">9855665324</h1> -->
                                                      <input type="tel" class="form-control-plaintext _detail "
                                                         readonly name="Phone" data-id="Phone"
                                                         onclick="editableField('Phone')" id="Phone"
                                                         onkeyup="this.value=this.value.replace(/[^\d]/,'')"
                                                         placeholder="9855665324" value="9855665324">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-3">
                                                <div class="input_box">
                                                   <div class="ls">
                                                      <i class="las la-angle-double-right circle"></i>
                                                   </div>
                                                   <div class="rs">
                                                      <h3 class="_title">Policy Number</h3>
                                                      <!-- <h1 class="_detail">ABCD123456</h1> -->
                                                      <input type="number" class="form-control-plaintext _detail "
                                                         readonly name="policy_no" data-id="policy_no"
                                                         onclick="editableField('policy_no')" id="policy_no"
                                                         placeholder="123456" value="123456">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-3"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Insurance Company Form Start -->
                                 <div
                                    class="app-card app-card-custom no-minHeight box-shadow-none mt-3 insurance_company">
                                    <div class="app-card-header">
                                       <input type="text" class="form-control form-control-lg" id="comapnyName"
                                          name="comapnyName" aria-describedby="comapnyNameHelp"
                                          placeholder="Enter Insurance Company Name">
                                    </div>
                                    <div class="head">
                                       <div class="p-3">
                                          <div class="row">
                                             <div class="col-12 col-sm-4">
                                                <div class="input_box">
                                                   <div class="ls">
                                                      <i class="las la-angle-double-right circle"></i>
                                                   </div>
                                                   <div class="rs">
                                                      <h3 class="_title">Payer Id</h3>
                                                      <div class="_detail">
                                                         <input type="text" class="form-control form-control-lg"
                                                            id="payerId" name="payerId"
                                                            aria-describedby="payerIdHelp"
                                                            placeholder="Enter Payer ID">
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="input_box">
                                                   <div class="ls">
                                                      <i class="las la-phone circle"></i>
                                                   </div>
                                                   <div class="rs">
                                                      <h3 class="_title">Phone</h3>
                                                      <div class="_detail">
                                                         <input type="text" class="form-control form-control-lg"
                                                            id="phoneNo" name="phoneNo"
                                                            aria-describedby="phoneNoHelp"
                                                            onkeyup="this.value=this.value.replace(/[^\d]/,'')"
                                                            placeholder="Enter Phone No">
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="input_box">
                                                   <div class="ls">
                                                      <i class="las la-angle-double-right circle"></i>
                                                   </div>
                                                   <div class="rs">
                                                      <h3 class="_title">Policy Number</h3>
                                                      <div class="_detail">
                                                         <input type="text" class="form-control form-control-lg"
                                                            id="policyNo" name="policyNo"
                                                            aria-describedby="policyNoHelp"
                                                            placeholder="Enter Policy No">
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class=" d-flex justify-content-end">
                                             <button type="submit" class="btn btn-outline-green"
                                                name="Save">Save</button>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Insurance Company Form end -->
                                 <!-- Croley Insurance and Financial End -->
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Insurance End -->
                     <!-- Billing Start -->
                     <div class="tab-pane fade show active" id="billing" role="tabpanel"
                        aria-labelledby="billing-tab">
                        <div class="app-card app-card-custom" data-name="billing">
                           <div class="app-card-header">
                              <h1 class="title">Billing</h1>
                           </div>
                           <div class="head scrollbar scrollbar4">
                              <div class="p-3">
                                 <div class="card border-info">
                                    <div class="card-header text-info font-weight-bold">
                                       <div class="d-flex justify-content-between">
                                          <div>MD Order: Self Pay</div>
                                          <button type="button" onclick="redirectToInsurance()" class="cancel-btn"
                                             style="width: auto;">Check Insurance
                                             Status</button>
                                       </div>
                                    </div>
                                    <div class="card-body text-info">
                                       <table class="table m-0">
                                          <thead class="thead-light">
                                             <tr>
                                                <th>Insurance Company Name</th>
                                                <th>Phone Number</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Action</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <tr>
                                                <td>Cottage Home Care Services</td>
                                                <td>+1 650 513 0514</td>
                                                <td>example@example.com</td>
                                                <td>1600 Amphitheatre Parkway Mountain View, CA 94043</td>
                                                <td>
                                                   <button type="button" class="cancel-btn"
                                                      style="width: auto;">View Insurance Detail</button>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                                 <div class="card border-light mt-3">
                                    <div class="card-header text-info font-weight-bold">MD Order: Self Pay</div>
                                    <div class="card-body text-info">
                                       <p class="text-danger">Your Insurance has been expired on 28
                                          February, 2020!</p>
                                       <div class="row">
                                          <div class="col-12 col-sm-3">
                                             <a data-toggle="tab" href="#insurance"
                                                class="cancel-btn mt-3 d-flex align-items-center justify-content-center"
                                                style="width: auto;">Add Insurance</a>
                                          </div>
                                          <div class="col-12 col-sm-9"></div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="card border-info mt-3">
                                    <div class="card-header text-info font-weight-bold">MD Order: Self Pay
                                       (Ifselected in plan 1 and plan 2)</div>
                                    <div class="card-body text-info">
                                       <table class="table m-0">
                                          <thead class="thead-light">
                                             <tr>
                                                <th>Homecare Company Name</th>
                                                <th>Phone Number</th>
                                                <th>Action</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <tr>
                                                <td>Cottage Home Care Services</td>
                                                <td>+1 650 513 0514</td>
                                                <td>
                                                   <button type="button" class="cancel-btn"
                                                      style="width: auto;">Bill to Home
                                                      Care</button>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                                 <div class="card border-info mt-3">
                                    <div class="card-header text-info font-weight-bold">Self Pay
                                       (Insurance not available)</div>
                                    <div class="card-body text-info">
                                       <div class="row">
                                          <div class="col-12 col-sm-3"></div>
                                          <div class="col-12 col-sm-6">
                                             <div class="inlineimage mb-3">
                                                <a href="">
                                                   <img class="img-fluid images"
                                                      src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/Mastercard-Curved.png">
                                                </a>
                                                <a href="">
                                                   <img class="img-fluid images"
                                                      src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/Discover-Curved.png">
                                                </a>
                                                <a href="">
                                                   <img class="img-fluid images"
                                                      src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/Paypal-Curved.png">
                                                </a>
                                                <a href="">
                                                   <img class="img-fluid images"
                                                      src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/American-Express-Curved.png">
                                                </a>
                                             </div>
                                             <div class="form-group">
                                                <label for="cardname" class="label">Card
                                                   Number</label>
                                                <input type="text" class="form-control form-control-lg"
                                                   id="cardname" name="cardname" aria-describedby="cardnameHelp">
                                                <!-- <small id="usernameHelp" class="form-text text-muted mt-2">Assistive Text</small> -->
                                             </div>
                                             <div class="form-group">
                                                <div class="row">
                                                   <div class="col-12 col-sm-6">
                                                      <label for="cardname" class="label">Month</label>
                                                      <select class="form-control form-control-lg" name="months"
                                                         id="months">
                                                         <option value="jan">January</option>
                                                         <option value="feb">February</option>
                                                         <option value="march">March</option>
                                                         <option value="apr">April</option>
                                                         <option value="may">May</option>
                                                         <option value="june">June</option>
                                                         <option value="july">July</option>
                                                         <option value="aug">August</option>
                                                         <option value="sep">September</option>
                                                         <option value="oct">October</option>
                                                         <option value="nov">November</option>
                                                         <option value="dec">December</option>
                                                      </select>
                                                   </div>
                                                   <div class="col-12 col-sm-6">
                                                      <label for="cardname" class="label">Year</label>
                                                      <select class="form-control form-control-lg" name="years"
                                                         id="years">
                                                         <option value="2020">2020</option>
                                                      </select>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="form-group">
                                                <div class="row">
                                                   <div class="col-12 col-sm-6">
                                                      <label for="cvvname" class="label">CVV</label>
                                                      <input type="text" class="form-control form-control-lg"
                                                         id="cvvname" name="cvvname"
                                                         aria-describedby="cvvnameHelp">
                                                   </div>
                                                   <div class="col-12 col-sm-6"></div>
                                                </div>
                                             </div>
                                             <div class="form-group d-flex justify-content-center">
                                                <button class="btn btn-outline-green btn-block">
                                                   Proceed
                                                </button>
                                             </div>
                                          </div>
                                          <div class="col-12 col-sm-3"></div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="card border-info mt-3">
                                    <div class="card-header text-info font-weight-bold">Wage Parity
                                    </div>
                                    <div class="card-body text-info">
                                       <table class="table m-0">
                                          <thead class="thead-light">
                                             <tr>
                                                <th>Wage Parity Company Name</th>
                                                <th>Phone Number</th>
                                                <th>Action</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <tr>
                                                <td>Cottage Home Care Services</td>
                                                <td>+1 650 513 0514</td>
                                                <td>
                                                   <button type="button" class="cancel-btn"
                                                      style="width: auto;">Bill to Wage
                                                      Parity</button>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                                 <div class="card border-info mt-3">
                                    <div class="card-header text-info font-weight-bold">Employer Pay
                                    </div>
                                    <div class="card-body text-info">
                                       <table class="table m-0">
                                          <thead class="thead-light">
                                             <tr>
                                                <th>Employer Name</th>
                                                <th>Phone Number</th>
                                                <th>Action</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <tr>
                                                <td>Cottage Home Care Services</td>
                                                <td>+1 650 513 0514</td>
                                                <td>
                                                   <button type="button" class="cancel-btn"
                                                      style="width: auto;">Bill to
                                                      Employer</button>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Billing End -->
                     <!-- Home Care Start -->
                     <div class="tab-pane fade" id="homecare" role="tabpanel" aria-labelledby="homecare-tab">
                        <div class="app-card app-card-custom" data-name="home_care">
                           <div class="app-card-header">
                              <h1 class="title mr-2">Home Care</h1>
                              <img src="../assets/img/icons/edit-field.svg" data-toggle="tooltip"
                                 data-placement="bottom" title="Edit" class="cursor-pointer edit-icon" alt=""
                                 onclick="editAllField('homecare')">
                              <img src="../assets/img/icons/update-icon.svg" data-toggle="tooltip"
                                 data-placement="bottom" title="Update" class="cursor-pointer update-icon" alt=""
                                 onclick="updateAllField('homecare')">
                           </div>
                           <div class="head scrollbar scrollbar4">
                              <div class="p-3">
                                 <div class="form-group">
                                    <div class="row">
                                       <div class="col-12 col-sm-4">
                                          <div class="input_box">
                                             <div class="ls">
                                                <i class="las la-user-nurse circle"></i>
                                             </div>
                                             <div class="rs">
                                                <h3 class="_title">Name</h3>
                                                <!-- <h1 class="_detail">Lorem Ipsum</h1> -->
                                                <input type="text" class="form-control-plaintext _detail "
                                                   readonly name="name" data-id="name"
                                                   onclick="editableField('name')" id="name"
                                                   placeholder="Lorem Ipsum" value="Lorem Ipsum">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-12 col-sm-4">
                                          <div class="input_box">
                                             <div class="ls">
                                                <i class="las la-user-nurse circle"></i>
                                             </div>
                                             <div class="rs">
                                                <h3 class="_title">Coordinator</h3>
                                                <!-- <h1 class="_detail">Lorem Ipsum</h1> -->
                                                <input type="text" class="form-control-plaintext _detail "
                                                   readonly name="coordinator1" data-id="coordinator1"
                                                   onclick="editableField('coordinator1')" id="coordinator1"
                                                   placeholder="Lorem Ipsum" value="Lorem Ipsum">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-12 col-sm-4">
                                          <div class="input_box">
                                             <div class="ls">
                                                <i class="las la-user-nurse circle"></i>
                                             </div>
                                             <div class="rs">
                                                <h3 class="_title">Phone</h3>
                                                <!-- <h1 class="_detail">(555) 555-5555</h1> -->
                                                <input type="tel" class="form-control-plaintext _detail " readonly
                                                   name="hc_phone" data-id="hc_phone"
                                                   onclick="editableField('hc_phone')" id="hc_phone"
                                                   onkeyup="this.value=this.value.replace(/[^\d]/,'')"
                                                   placeholder="(555) 555-5555" value="(555) 555-5555">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row mt-3">
                                    <div class="col-12 col-sm-12">
                                       <div class="input_box mb-3">
                                          <div class="ls">
                                             <i class="las la-map-marker circle"></i>
                                          </div>
                                          <div class="rs">
                                             <h3 class="_title">Address</h3>
                                             <!-- <h1 class="_detail">4009 Heron Way, Portland OR Oregon,
                                                <span>97232</span>
                                             </h1> -->
                                             <textarea id="hc_address" name="hc_address" rows="4" cols="62"
                                                class="form-control-plaintext _detail " readonly
                                                onclick="editableField('hc_address')"
                                                placeholder="4009 Heron Way, Portland OR Oregon,97232"
                                                value="4009 Heron Way, Portland OR Oregon,97232">4009 Heron Way, Portland OR Oregon,97232</textarea>
                                             <!-- <a class="btn btn-info btn-sm ml-2 collapsed" data-toggle="collapse" href="#collapseExample11" aria-expanded="false"><i class="las la-map-marker"></i>View
                                                Map</a> -->
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="app-card app-card-custom box-shadow-none no-minHeight mt-3"
                                    data-name="administrator_detail">
                                    <div class="app-card-header">
                                       <h1 class="title">Administrator Detail</h1>
                                    </div>
                                    <div class="head">
                                       <div class="p-3">
                                          <div class="row">
                                             <div class="col-12 col-sm-4">
                                                <div class="input_box">
                                                   <div class="ls">
                                                      <i class="las la-user-nurse circle"></i>
                                                   </div>
                                                   <div class="rs">
                                                      <h3 class="_title">Name</h3>
                                                      <!-- <h1 class="_detail">Ara lus</h1> -->
                                                      <input type="text" class="form-control-plaintext _detail "
                                                         readonly name="a_name" data-id="a_name"
                                                         onclick="editableField('a_name')" id="a_name"
                                                         placeholder="Lorem Ipsum" value="Lorem Ipsum">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                <div class="input_box">
                                                   <div class="ls">
                                                      <i class="las la-user-nurse circle"></i>
                                                   </div>
                                                   <div class="rs">
                                                      <h3 class="_title">Phone</h3>
                                                      <!-- <h1 class="_detail">(555) 555-5555</h1> -->
                                                      <input type="tel" class="form-control-plaintext _detail "
                                                         readonly name="a_phone" data-id="a_phone"
                                                         onclick="editableField('a_phone')" id="a_phone"
                                                         onkeyup="this.value=this.value.replace(/[^\d]/,'')"
                                                         placeholder="(555) 555-5555" value="(555) 555-5555">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="app-card app-card-custom box-shadow-none no-minHeight mt-3"
                                    data-name="caregiver_detail">
                                    <div class="app-card-header">
                                       <h1 class="title">Caregiver Detail</h1>
                                       <button type="button" class="btn btn-sm btn-info">Check Update</button>
                                    </div>
                                    <div class="head">
                                       <div class="p-3">
                                          <div class="row">
                                             <div class="col-12 col-sm-3">
                                                <div class="input_box">
                                                   <div class="ls">
                                                      <i class="las la-user-nurse circle"></i>
                                                   </div>
                                                   <div class="rs">
                                                      <h3 class="_title">Caregiver Name</h3>
                                                      <!-- <h1 class="_detail">Ara lus</h1> -->
                                                      <input type="text" class="form-control-plaintext _detail "
                                                         readonly name="c_name" data-id="c_name"
                                                         onclick="editableField('c_name')" id="c_name"
                                                         placeholder="Lorem Ipsum" value="Lorem Ipsum">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-3">
                                                <div class="input_box">
                                                   <div class="ls">
                                                      <i class="las la-user-nurse circle"></i>
                                                   </div>
                                                   <div class="rs">
                                                      <h3 class="_title">Phone</h3>
                                                      <!-- <h1 class="_detail">(555) 555-5555</h1> -->
                                                      <input type="tel" class="form-control-plaintext _detail "
                                                         readonly name="c_phone" data-id="c_phone"
                                                         onclick="editableField('c_phone')" id="c_phone"
                                                         onkeyup="this.value=this.value.replace(/[^\d]/,'')"
                                                         placeholder="(555) 555-5555" value="(555) 555-5555">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-3">
                                                <div class="input_box">
                                                   <div class="ls">
                                                      <i class="las la-user-nurse circle"></i>
                                                   </div>
                                                   <div class="rs">
                                                      <h3 class="_title">Schedule start time</h3>
                                                      <!-- <h1 class="_detail">10:00 AM</h1> -->
                                                      <input type="time" class="form-control-plaintext _detail "
                                                         readonly name="start_time" data-id="start_time"
                                                         onclick="editableField('start_time')" id="start_time"
                                                         placeholder="10:00" value="10:00">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-12 col-sm-3">
                                                <div class="input_box">
                                                   <div class="ls">
                                                      <i class="las la-user-nurse circle"></i>
                                                   </div>
                                                   <div class="rs">
                                                      <h3 class="_title">Schedule End time</h3>
                                                      <!-- <h1 class="_detail">8:00 PM</h1> -->
                                                      <input type="time" class="form-control-plaintext _detail "
                                                         readonly name="end_time" data-id="end_time"
                                                         onclick="editableField('end_time')" id="end_time"
                                                         placeholder="8:50" value="">
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="app-card app-card-custom box-shadow-none no-minHeight mt-3"
                                    data-name="history">
                                    <div class="app-card-header">
                                       <h1 class="title">History</h1>
                                    </div>
                                    <div class="head">
                                       <div class="p-3">
                                          <table class="table table-bordered" style="width: 100%;"
                                             id="employee-table">
                                             <thead class="thead-inverse">
                                                <tr>
                                                   <th>Name</th>
                                                   <th>Phone No</th>
                                                   <th>Schedule Start Date Time</th>
                                                   <th>Schedule End Date Time</th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                                <tr>
                                                   <td class="text-green">Airi Satou</td>
                                                   <td><a href="javascript:void(0)"
                                                         class="patient_phone_no">8866246684</a>
                                                   </td>
                                                   <td>Sunday, 1 October 2020</td>
                                                   <td>Wednesday, 4 October 2020</td>
                                                </tr>
                                                <tr>
                                                   <td class="text-green">Airi Satou</td>
                                                   <td><a href="javascript:void(0)"
                                                         class="patient_phone_no">8866246684</a>
                                                   </td>
                                                   <td>Sunday, 1 October 2020</td>
                                                   <td>Wednesday, 4 October 2020</td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="app-card app-card-custom box-shadow-none no-minHeight mt-3"
                                    data-name="caregiver_interaction_detail">
                                    <div class="app-card-header">
                                       <h1 class="title">Caregiver Interaction Detail</h1>
                                    </div>
                                    <div class="head">
                                       <div class="p-3">
                                          <table class="table table-bordered mb-0" style="width: 100%;"
                                             id="employee-table">
                                             <thead class="thead-inverse">
                                                <tr>
                                                   <th>Infraction</th>
                                                   <th>Sent Date and Time</th>
                                                   <th>Response Date and Time</th>
                                                   <th>Action</th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                                <tr>
                                                   <td class="text-green"><a
                                                         href="javascript:void(0)">Infraction</a></td>
                                                   <td>Sunday, 1 October 2020</td>
                                                   <td>Wednesday, 4 October 2020</td>
                                                   <td>
                                                      <a href="referral_user_profile.html"
                                                         class="btn btn-info btn-sm btn-block">Action Taken</a>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td class="text-green"><a
                                                         href="javascript:void(0)">Infraction</a> </td>
                                                   <td>Sunday, 1 October 2020</td>
                                                   <td>Wednesday, 4 October 2020</td>
                                                   <td>
                                                      <a href="referral_user_profile.html"
                                                         class="btn btn-info btn-sm btn-block">Action Taken</a>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="app-card app-card-custom box-shadow-none no-minHeight mt-3"
                                    data-name="value_base_care_detail">
                                    <div class="app-card-header">
                                       <h1 class="title">Value Base Care Detail</h1>
                                    </div>
                                    <div class="head">
                                       <div class="p-3">
                                          <div class="_card">
                                             <div class="_card_header">
                                                <div class="title-head"><span style="font-weight: bold;">Q:</span>
                                                   Lorem Ipsum is simply dummy text of the printing and
                                                   typesetting industry?
                                                </div>
                                             </div>
                                             <div class="_card_body">
                                                <h1 class="_title"><span style="font-weight: bold;">Ans:</span>
                                                   Lorem Ipsum
                                                   has been the industry's standard dummy text ever since the
                                                   1500s.
                                                </h1>
                                             </div>
                                          </div>
                                          <div class="_card mt-3">
                                             <div class="_card_header">
                                                <div class="title-head"><span style="font-weight: bold;">Q:</span>
                                                   Lorem Ipsum is simply dummy text of the printing and
                                                   typesetting industry?
                                                </div>
                                             </div>
                                             <div class="_card_body">
                                                <h1 class="_title"><span style="font-weight: bold;">Ans:</span>
                                                   Lorem Ipsum
                                                   has been the industry's standard dummy text ever since the
                                                   1500s.
                                                </h1>
                                             </div>
                                          </div>
                                          <div class="_card mt-3">
                                             <div class="_card_header">
                                                <div class="title-head"><span style="font-weight: bold;">Q:</span>
                                                   Lorem Ipsum is simply dummy text of the printing and
                                                   typesetting industry?
                                                </div>
                                             </div>
                                             <div class="_card_body">
                                                <h1 class="_title"><span style="font-weight: bold;">Ans:</span>
                                                   Lorem Ipsum
                                                   has been the industry's standard dummy text ever since the
                                                   1500s.
                                                </h1>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Home Care End -->
                     <!-- Clinical Start -->
                     <div class="tab-pane fade" id="clinical" role="tabpanel" aria-labelledby="clinical-tab">
                        <div class="app-card app-card-custom" data-name="clinical">
                           <div class="app-card-header">
                              <h1 class="title">Clinical</h1>
                           </div>
                           <div class="head">
                              <div class="shadow-sm">
                                 <ul class="nav nav-pills nav-clinical mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                       <a class="nav-link rounded-0" id="social-pro-tab" data-toggle="pill"
                                          href="#social-pro" role="tab" aria-controls="social-pro"
                                          aria-selected="true">Social Pro</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                       <a class="nav-link rounded-0" id="md-med-profile-tab" data-toggle="pill"
                                          href="#md-med-profile" role="tab" aria-controls="md-med-profile"
                                          aria-selected="false">MD Med Profile</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                       <a class="nav-link rounded-0" id="behaviour-profile-tab" data-toggle="pill"
                                          href="#behaviour-profile" role="tab" aria-controls="behaviour-profile"
                                          aria-selected="false">Behaviour Profile</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                       <a class="nav-link rounded-0" id="assessment-tab" data-toggle="pill"
                                          href="#assessment" role="tab" aria-controls="assessment"
                                          aria-selected="false">Assessment</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                       <a class="nav-link rounded-0" id="progress-note-encounter-tab"
                                          data-toggle="pill" href="#progress-note-encounter" role="tab"
                                          aria-controls="progress-note-encounter" aria-selected="false">Progress
                                          Note Encounter</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                       <a class="nav-link rounded-0" id="plan-of-care-tab" data-toggle="pill"
                                          href="#plan-of-care" role="tab" aria-controls="plan-of-care"
                                          aria-selected="false">Plan Of Care</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                       <a class="nav-link rounded-0" id="cover-note-tab" data-toggle="pill"
                                          href="#cover-note" role="tab" aria-controls="cover-note"
                                          aria-selected="false">Cover Note</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                       <a class="nav-link rounded-0 active" id="lab-tab" data-toggle="pill"
                                          href="#lab-report" role="tab" aria-controls="lab-report"
                                          aria-selected="false">Lab</a>
                                    </li>
                                 </ul>
                              </div>
                              <div class="p-3 scrollbar scrollbar4">
                                 <div class="tab-content" id="pills-tabContent">
                                    <!-- Social Pro Start-->
                                    <div class="tab-pane fade" id="social-pro" role="tabpanel"
                                       aria-labelledby="social-pro-tab">
                                       <ul class="nav nav-pills nav-clinical-new mb-3" id="pills-tab"
                                          role="tablist">
                                          <li class="nav-item" role="presentation">
                                             <a class="nav-link rounded-0" id="sd-tab" data-toggle="pill"
                                                href="#sd" role="tab" aria-controls="sd"
                                                aria-selected="true">SD</a>
                                          </li>
                                          <li class="nav-item" role="presentation">
                                             <a class="nav-link rounded-0" id="msw-tab" data-toggle="pill"
                                                href="#msw" role="tab" aria-controls="msw"
                                                aria-selected="false">MSW</a>
                                          </li>
                                          <li class="nav-item" role="presentation">
                                             <a class="nav-link active rounded-0" id="aide-tab" data-toggle="pill"
                                                href="#aide" role="tab" aria-controls="aide"
                                                aria-selected="false">Aide</a>
                                          </li>
                                       </ul>
                                       <div class="tab-content" id="pills-tabContent">
                                          <!-- SD Start Here -->
                                          <div class="tab-pane fade" id="sd" role="tabpanel"
                                             aria-labelledby="sd-tab">
                                             <div class="alert alert-info">
                                                <span class="font-weight-bold">Frequency</span>: Frequency will be
                                                specified in units. 1 hour is 1 unit. 30 minutes is 0.50 units.
                                             </div>
                                             <div class="form-group">
                                                <div class="row">
                                                   <div class="col-12 col-sm-1">
                                                      <label for="range" class="label">&nbsp;</label>
                                                      <div class="custom-control custom-checkbox mb-3">
                                                         <input type="checkbox" id="range" name="range"
                                                            class="custom-control-input">
                                                         <label class="custom-control-label"
                                                            for="range">Range</label>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-2">
                                                      <label for="from1" class="label">From</label>
                                                      <input type="text" class="form-control form-control-lg"
                                                         id="from1" name="from1" aria-describedby="fromHelp1">
                                                   </div>
                                                   <div class="col-12 col-sm-2">
                                                      <label for="to" class="label">To</label>
                                                      <input type="text" class="form-control form-control-lg"
                                                         id="to" name="to" aria-describedby="toHelp">
                                                   </div>
                                                   <div class="col-12 col-sm-1">
                                                      <label for="amount" class="label">Amount</label>
                                                      <input type="text" class="form-control form-control-lg"
                                                         id="amount" name="amount" aria-describedby="amountHelp">
                                                   </div>
                                                   <div class="col-12 col-sm-1">
                                                      <label for="medication" class="label">Frequency</label>
                                                      <select name="frequency" id="frequency"
                                                         class="form-control">
                                                         <option value="">Select</option>
                                                         <option value="Sun">Sun</option>
                                                         <option value="Mon">Mon</option>
                                                         <option value="Tue">Tue</option>
                                                         <option value="Wed">Wed</option>
                                                         <option value="Thu">Thu</option>
                                                         <option value="Fri">Fri</option>
                                                         <option value="Sat">Sat</option>
                                                      </select>
                                                   </div>
                                                   <div class="col-12 col-sm-1">
                                                      <label for="duration1" class="label">Duration</label>
                                                      <input type="text" class="form-control form-control-lg"
                                                         id="duration1" name="duration1"
                                                         aria-describedby="durationHelp1">
                                                   </div>
                                                   <div class="col-12 col-sm-1">
                                                      <label for="type" class="label">Type</label>
                                                      <select name="type" id="type" class="form-control">
                                                         <option value="">Select</option>
                                                         <option value="Visit">Visit</option>
                                                      </select>
                                                   </div>
                                                   <div class="col-12 col-sm-1">
                                                      <label for="hours" class="label">Hours</label>
                                                      <input type="text" class="form-control form-control-lg"
                                                         id="hours" name="hours" aria-describedby="hoursHelp">
                                                   </div>
                                                   <div class="col-12 col-sm-2">
                                                      <label for="dates1" class="label">Dates</label>
                                                      <input type="text" class="form-control form-control-lg"
                                                         id="dates1" name="dates1" aria-describedby="datesHelp1">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-12">
                                                   <div class="form-group">
                                                      <label for="additional_orders" class="label">Additional
                                                         Order</label>
                                                      <textarea name="additional_orders" id="additional_orders"
                                                         cols="30" rows="8"
                                                         class="form-control">Home Care Services:  PCA- Bathing, Dressing, Toileting, Skin, and Hair Care, Grooming, Assist with ADL/ Ambulation, Light Housekeeping/Dusting/Patient's Laundry/Bed Change and Shopping/Errands, Medication Reminder, Fluids Encouragement  PCA  8_ hours per day x _7_ days per week RN for Assessment q 6 months, PRN RN visit for change in patient status, --Aide Supervision every 6 months</textarea>
                                                   </div>
                                                </div>
                                                <div class="col-12">
                                                   <div class="">
                                                      <label for="addtional_goals" class="label">Additional
                                                         Goals/Rehabilitation Potential/Discharge Plans</label>
                                                      <textarea name="addtional_goals" id="addtional_goals"
                                                         cols="30" rows="8" class="form-control">The patient will remain safely in the home and have ADLs and personal care needs met. The patient will improve in the current level of functionality. No discharge plan at this time or until the patient no longer qualifies for home care services.
                                                      </textarea>
                                                   </div>
                                                </div>
                                                <div class="col-12"></div>
                                             </div>
                                          </div>
                                          <!-- SD Start End -->
                                          <!-- MSW Start Here -->
                                          <div class="tab-pane fade" id="msw" role="tabpanel"
                                             aria-labelledby="msw-tab">
                                             Content goes here....
                                          </div>
                                          <!-- MSW Start End -->
                                          <!-- AIDE Start Start -->
                                          <div class="tab-pane fade show active" id="aide" role="tabpanel"
                                             aria-labelledby="aide-tab">
                                             <div class="alert alert-info">
                                                <span class="font-weight-bold">Frequency</span>: Frequency will be
                                                specified in units. 1 hour is 1 unit. 30 minutes is 0.50 units.
                                             </div>
                                             <div class="app-card frequency_tab mb-3" id="frequency_tab"
                                                style="min-height: inherit;">
                                                <div class="app-card-body">
                                                   <div class="p-3">
                                                      <div>
                                                         <div class="row">
                                                            <div class="col-12 col-sm-1">
                                                               <label for="range"
                                                                  class="label pb-2">&nbsp;</label>
                                                               <div class="custom-control custom-checkbox">
                                                                  <input type="checkbox" id="range1" name="range1"
                                                                     class="custom-control-input">
                                                                  <label class="custom-control-label"
                                                                     for="range1">Range</label>
                                                               </div>
                                                            </div>
                                                            <div class="col-12 col-sm-2">
                                                               <label for="from" class="label">From</label>
                                                               <input type="text"
                                                                  class="form-control form-control-lg" id="from"
                                                                  name="from" aria-describedby="fromHelp">
                                                            </div>
                                                            <div class="col-12 col-sm-2">
                                                               <label for="to1" class="label">To</label>
                                                               <input type="text"
                                                                  class="form-control form-control-lg" id="to1"
                                                                  name="to1" aria-describedby="toHelp1">
                                                            </div>
                                                            <div class="col-12 col-sm-1">
                                                               <label for="amount1" class="label">Amount</label>
                                                               <input type="text"
                                                                  class="form-control form-control-lg"
                                                                  id="amount1" name="amount1"
                                                                  aria-describedby="amountHelp1">
                                                            </div>
                                                            <div class="col-12 col-sm-1">
                                                               <label for="frequency1"
                                                                  class="label">Frequency</label>
                                                               <select name="frequency1" id="frequency1"
                                                                  class="form-control" multiple>
                                                                  <option value="Sun">Sun</option>
                                                                  <option value="Mon">Mon</option>
                                                                  <option value="Tue">Tue</option>
                                                                  <option value="Wed">Wed</option>
                                                                  <option value="Thu">Thu</option>
                                                                  <option value="Fri">Fri</option>
                                                                  <option value="Sat">Sat</option>
                                                               </select>
                                                            </div>
                                                            <div class="col-12 col-sm-1">
                                                               <label for="duration"
                                                                  class="label">Duration</label>
                                                               <input type="text"
                                                                  class="form-control form-control-lg"
                                                                  id="duration" name="duration"
                                                                  aria-describedby="durationHelp">
                                                            </div>
                                                            <div class="col-12 col-sm-1">
                                                               <label for="type1" class="label">Type</label>
                                                               <select name="type1" id="type1"
                                                                  class="form-control">
                                                                  <option value="Visit">Visit</option>
                                                               </select>
                                                            </div>
                                                            <div class="col-12 col-sm-1">
                                                               <label for="hours1" class="label">Hours</label>
                                                               <input type="text"
                                                                  class="form-control form-control-lg" id="hours1"
                                                                  name="hours1" aria-describedby="hoursHelp1">
                                                            </div>
                                                            <div class="col-12 col-sm-1">
                                                               <label for="dates" class="label">Dates</label>
                                                               <input type="text"
                                                                  class="form-control form-control-lg" id="dates"
                                                                  name="dates" aria-describedby="datesHelp">
                                                            </div>
                                                            <div class="col-12 col-sm-1">
                                                               <label for="dates" class="label">&nbsp;</label>
                                                               <div class="d-flex align-items-center">
                                                                  <a href="javascript:void(0)"
                                                                     class="mt-1 mr-2 add_frequency"
                                                                     onclick="addMore('frequency_tab')"
                                                                     data-toggle="tooltip" data-placement="left"
                                                                     title="" data-original-title="Add Row">
                                                                     <img
                                                                        src="../assets/img/icons/add_more_item.svg"
                                                                        alt="">
                                                                  </a>
                                                                  <a href="javascript:void(0)" class="mt-1 d-none"
                                                                     data-toggle="tooltip" data-placement="left"
                                                                     title="" data-original-title="Remove Row">
                                                                     <img src="../assets/img/icons/remove_row.svg"
                                                                        alt="">
                                                                  </a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row mb-3">
                                                <div class="col-12">
                                                   <div class="form-group">
                                                      <label for="poc_note" class="label">POC Note</label>
                                                      <textarea name="poc_note" id="poc_note" cols="30" rows="8"
                                                         class="form-control"></textarea>
                                                   </div>
                                                </div>
                                                <div class="col-12">
                                                   <div class="">
                                                      <label for="other" class="label">Other</label>
                                                      <textarea name="other" id="other" cols="30" rows="8"
                                                         class="form-control"></textarea>
                                                   </div>
                                                </div>
                                                <div class="col-12"></div>
                                             </div>
                                          </div>
                                          <!-- AIDE Start End -->
                                       </div>
                                    </div>
                                    <!-- Social Pro End-->
                                    <!-- MD Med Profile Start-->
                                    <div class="tab-pane fade" id="md-med-profile" role="tabpanel"
                                       aria-labelledby="md-med-profile-tab">
                                       Content goes here..
                                    </div>
                                    <!-- MD Med Profile End-->
                                    <!-- Behaviour Profile Start-->
                                    <div class="tab-pane fade" id="behaviour-profile" role="tabpanel"
                                       aria-labelledby="behaviour-profile-tab">
                                       Content goes here..
                                    </div>
                                    <!-- Behaviour Profile End-->
                                    <!-- Assessment Start-->
                                    <div class="tab-pane fade" id="assessment" role="tabpanel"
                                       aria-labelledby="assessment-tab">
                                       Content goes here..
                                    </div>
                                    <!-- Assessment End-->
                                    <!-- Progress Note Encounter Start-->
                                    <div class="tab-pane fade" id="progress-note-encounter" role="tabpanel"
                                       aria-labelledby="progress-note-encounter-tab">
                                       Content goes here..
                                    </div>
                                    <!-- Progress Note Encounter End-->
                                    <!-- Plan Of Care Start-->
                                    <div class="tab-pane fade" id="plan-of-care" role="tabpanel"
                                       aria-labelledby="plan-of-care-tab">
                                       Content goes here..
                                    </div>
                                    <!-- Plan Of Care End-->
                                    <!-- Cover Note Start-->
                                    <div class="tab-pane fade" id="cover-note" role="tabpanel"
                                       aria-labelledby="cover-note-tab">
                                       Content goes here..
                                    </div>
                                    <!-- Cover Note End-->
                                    <!-- Lab Start-->
                                    <div class="tab-pane fade show active" id="lab-report" role="tabpanel"
                                       aria-labelledby="lab-tab">
                                       <ul class="nav nav-pills nav-clinical-nested shadow-sm mb-3" id="pills-tab"
                                          role="tablist">
                                          <!-- PPD Start -->
                                          <li class="nav-item" role="presentation">
                                             <a class="nav-link active" id="ppd-tab" data-toggle="pill"
                                                href="#ppd" role="tab" aria-controls="ppd"
                                                aria-selected="false">PPD/QuantiFERON</a>
                                          </li>
                                          <!-- PPD End -->
                                          <!-- TB Screen Start -->
                                          <li class="nav-item" role="presentation">
                                             <a class="nav-link" id="tb-screen-tab" data-toggle="pill"
                                                href="#tb-screen" role="tab" aria-controls="tb-screen"
                                                aria-selected="true">TB Screen</a>
                                          </li>
                                          <!-- TB Screen End -->
                                          <!-- Rubeola Start -->
                                          <li class="nav-item" role="presentation">
                                             <a class="nav-link" id="rubeola-tab" data-toggle="pill"
                                                href="#rubeola" role="tab" aria-controls="rubeola"
                                                aria-selected="false">Rubeola</a>
                                          </li>
                                          <!-- Rubeola End -->
                                          <!-- Rubeola MMR1 Start -->
                                          <li class="nav-item" role="presentation">
                                             <a class="nav-link" id="rubeola-mmr1-tab" data-toggle="pill"
                                                href="#rubeola-mmr1" role="tab" aria-controls="rubeola-mmr1"
                                                aria-selected="false">Rubeola MMR1</a>
                                          </li>
                                          <!-- Rubeola MMR1 End -->
                                          <!-- Rubeola MMR2 Start -->
                                          <li class="nav-item" role="presentation">
                                             <a class="nav-link" id="rubeola-mmr2-tab" data-toggle="pill"
                                                href="#rubeola-mmr2" role="tab" aria-controls="rubeola-mmr2"
                                                aria-selected="false">Rubeola MMR2</a>
                                          </li>
                                          <!-- Rubeola MMR2 End -->
                                          <!-- Rubella Start -->
                                          <li class="nav-item" role="presentation">
                                             <a class="nav-link" id="rubella-tab" data-toggle="pill"
                                                href="#rubella" role="tab" aria-controls="rubella"
                                                aria-selected="false">Rubella</a>
                                          </li>
                                          <!-- Rubella End -->
                                          <!-- Rubella MMR Start -->
                                          <li class="nav-item" role="presentation">
                                             <a class="nav-link" id="rubella-mmr-tab" data-toggle="pill"
                                                href="#rubella-mmr" role="tab" aria-controls="rubella-mmr"
                                                aria-selected="false">Rubella MMR</a>
                                          </li>
                                          <!-- Rubella MMR End -->
                                          <!-- Facemask Provided Start -->
                                          <li class="nav-item" role="presentation">
                                             <a class="nav-link" id="facemask-provided-tab" data-toggle="pill"
                                                href="#facemask-provided" role="tab"
                                                aria-controls="facemask-provided" aria-selected="false">Facemask
                                                Provided</a>
                                          </li>
                                          <!-- Facemask Provided End -->
                                          <!-- Drug Screen Start -->
                                          <li class="nav-item" role="presentation">
                                             <a class="nav-link" id="drug-screen-tab" data-toggle="pill"
                                                href="#drug-screen" role="tab" aria-controls="drug-screen"
                                                aria-selected="false">Drug Screen</a>
                                          </li>
                                          <!-- Drug Screen End -->
                                          <!-- Annual Health Assessment Start -->
                                          <li class="nav-item" role="presentation">
                                             <a class="nav-link" id="annual-health-assessment-tab"
                                                data-toggle="pill" href="#annual-health-assessment" role="tab"
                                                aria-controls="annual-health-assessment"
                                                aria-selected="false">Annual Health Assessment</a>
                                          </li>
                                          <!-- Annual Health Assessment End -->
                                          <!-- Flu Vaccine Start -->
                                          <!-- <li class="nav-item" role="presentation">
                                             <a class="nav-link" id="flu-vaccine-tab" data-toggle="pill"
                                                href="#flu-vaccine" role="tab" aria-controls="flu-vaccine"
                                                aria-selected="false">Flu Vaccine</a>
                                          </li> -->
                                          <!-- Flu Vaccine End -->
                                       </ul>
                                       <div class="tab-content" id="pills-tabContent">
                                          <!-- PPD Start -->
                                          <div class="tab-pane fade show active" id="ppd" role="tabpanel"
                                             aria-labelledby="ppd-tab">
                                             <div class="app-vbc ppd_block p-3">
                                                <div class="add-new-patient">
                                                   <div class="icon shadow-sm"><img
                                                         src="../assets/img/icons/tuberculosis.svg"
                                                         class="img-fluid" /></div>
                                                   <button type="submit"
                                                      class="btn btn-outline-green w-600 d-table mr-auto ml-auto mt-3"
                                                      id="ppdbtn"
                                                      style="width: inherit;font-size: 18px;height: 36px;padding-left: 10px;padding-right: 10px;text-transform: uppercase;"
                                                      onclick="openRoadL('ppdbtn')" name="RoadL Request">RoadL
                                                      Request</button>
                                                   <div class="recieved_roadl d-none">
                                                      <div class="row">
                                                         <div class="col-12 col-sm-4"></div>
                                                         <div class="col-12 col-sm-4">
                                                            <div class="row">
                                                               <div class="col-12 col-sm-6">
                                                                  <select id="roadlrequest1"
                                                                     class="form-control select roadlrequest"
                                                                     multiple></select>
                                                               </div>
                                                               <div class="col-12 col-sm-6">
                                                                  <button type="submit"
                                                                     class="btn btn-outline-green w-600"
                                                                     style="width: inherit;font-size: 18px;height: 36px;padding-left: 10px;padding-right: 10px;text-transform: uppercase;"
                                                                     name="Start RoadL">Start RoadL</button>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="col-12 col-sm-4"></div>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-12 col-sm-1"></div>
                                                      <div class="col-12 col-sm-10">
                                                         <table class="table table-bordered table-hover mt-4"
                                                            id="ppdTable">
                                                            <thead class="thead-light">
                                                               <tr>
                                                                  <th>#</th>
                                                                  <th>Insert Date</th>
                                                                  <th>Read Date</th>
                                                                  <th>Expiry Date(Till 1 years valid)
                                                                  </th>
                                                                  <th>Result</th>
                                                                  <th width="11%">Action</th>
                                                               </tr>
                                                            </thead>
                                                            <tbody>
                                                               <tr class="bg-positive">
                                                                  <td class="text-white">1</td>
                                                                  <td class="text-white">28/08/1981</td>
                                                                  <td class="text-white">28/08/1986</td>
                                                                  <td class="text-white">28/08/1986</td>
                                                                  <td class="text-white">Positive</td>
                                                                  <td class='text-center text-white'><span
                                                                        onclick="exploder('exp0')" id="exp0"
                                                                        class="exploder"><i
                                                                           class="las la-plus la-2x"></i></span>
                                                                     <a href="javascript:void(0)"><i
                                                                           class="las la-trash la-2x text-white pl-4"></i></a>
                                                                  </td>
                                                               </tr>
                                                               <tr class="explode d-none">
                                                                  <td colspan="6">
                                                                     <div class="pt-3 _title1">Your Report is
                                                                        <span class="text-green">Positive</span>
                                                                        <p class="mt-3 text-green">You need to
                                                                           have <span class="text-underline">Chest
                                                                              X-Ray report</span>.</p>
                                                                     </div>
                                                                     <table class="table table-bordered mt-4">
                                                                        <thead>
                                                                           <tr>
                                                                              <th scope="col">#</th>
                                                                              <th scope="col">Date Of X-Ray</th>
                                                                              <th scope="col">Expiry Date(Till 5
                                                                                 years valid)
                                                                              </th>
                                                                           </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                           <tr>
                                                                              <td scope="row">#</td>
                                                                              <td>28/08/1981</td>
                                                                              <td>28/08/1986</td>
                                                                           </tr>
                                                                           <tr>
                                                                              <td scope="row">#</td>
                                                                              <td><input type="text"
                                                                                    class="form-control"
                                                                                    name="xraydate"
                                                                                    value="10/24/1984" /></td>
                                                                              <td>28/08/1986</td>
                                                                           </tr>
                                                                        </tbody>
                                                                     </table>
                                                                  </td>
                                                               </tr>
                                                               <tr>
                                                                  <th scope="row">2</th>
                                                                  <td>28/08/1981</td>
                                                                  <td>28/08/1986</td>
                                                                  <td>28/08/1986</td>
                                                                  <td>Negative</td>
                                                                  <td class="text-center">
                                                                     <span onclick="exploder('exp1000')"
                                                                        id="exp1000" class="exploder"><i
                                                                           class="las la-plus la-2x"></i></span>
                                                                     <a href="javascript:void(0)">
                                                                        <i
                                                                           class="las la-trash la-2x text-green pl-4"></i>
                                                                     </a>
                                                                  </td>
                                                               </tr>
                                                               <tr class="explode d-none">
                                                                  <td colspan="6">
                                                                     <div class="pt-3 _title1">Your Report is
                                                                        <span class="text-green">Positive</span>
                                                                        <p class="mt-3 text-green">You need to
                                                                           have <span class="text-underline">Chest
                                                                              X-Ray report</span>.</p>
                                                                     </div>
                                                                     <table class="table table-bordered mt-4">
                                                                        <thead>
                                                                           <tr>
                                                                              <th scope="col">#</th>
                                                                              <th scope="col">Date Of X-Ray</th>
                                                                              <th scope="col">Expiry Date(Till 5
                                                                                 years valid)
                                                                              </th>
                                                                           </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                           <tr>
                                                                              <td scope="row">#</td>
                                                                              <td>28/08/1981</td>
                                                                              <td>28/08/1986</td>
                                                                           </tr>
                                                                           <tr>
                                                                              <td scope="row">#</td>
                                                                              <td><input type="text"
                                                                                    class="form-control"
                                                                                    name="xraydate"
                                                                                    value="10/24/1984" /></td>
                                                                              <td>28/08/1986</td>
                                                                           </tr>
                                                                        </tbody>
                                                                     </table>
                                                                  </td>
                                                               </tr>
                                                               <tr class="bg-positive">
                                                                  <th class="text-white">3</th>
                                                                  <td class="text-white">28/08/1981</td>
                                                                  <td class="text-white">28/08/1986</td>
                                                                  <td class="text-white">28/08/1986</td>
                                                                  <td class="text-white">Negative</td>
                                                                  <td class="text-white text-white">
                                                                     <span onclick="exploder('exp10')" id="exp10"
                                                                        class="exploder"><i
                                                                           class="las la-plus la-2x"></i></span>
                                                                     <a href="javascript:void(0)"><i
                                                                           class="las la-trash la-2x text-white pl-4"></i></a>
                                                                  </td>
                                                               </tr>
                                                               <tr class="explode d-none">
                                                                  <td colspan="6">
                                                                     <div class="pt-3 _title1">Your Report is
                                                                        <span class="text-green">Positive</span>
                                                                        <p class="mt-3 text-green">You need to
                                                                           have <span class="text-underline">Chest
                                                                              X-Ray report</span>.</p>
                                                                     </div>
                                                                     <table class="table table-bordered mt-4">
                                                                        <thead>
                                                                           <tr>
                                                                              <th scope="col">#</th>
                                                                              <th scope="col">Date Of X-Ray</th>
                                                                              <th scope="col">Expiry Date(Till 5
                                                                                 years valid)
                                                                              </th>
                                                                           </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                           <tr>
                                                                              <td scope="row">#</td>
                                                                              <td>28/08/1981</td>
                                                                              <td>28/08/1986</td>
                                                                           </tr>
                                                                           <tr>
                                                                              <td scope="row">#</td>
                                                                              <td><input type="text"
                                                                                    class="form-control"
                                                                                    name="xraydate"
                                                                                    value="10/24/1984" /></td>
                                                                              <td>28/08/1986</td>
                                                                           </tr>
                                                                        </tbody>
                                                                     </table>
                                                                  </td>
                                                               </tr>
                                                               <tr class="bg-positive">
                                                                  <th class="text-white">4</th>
                                                                  <td class="text-white">28/08/1981</td>
                                                                  <td class="text-white">28/08/1986</td>
                                                                  <td class="text-white">28/08/1986</td>
                                                                  <td class="text-white">Negative</td>
                                                                  <td class="text-white text-white">
                                                                     <span onclick="exploder('exp11')" id="exp11"
                                                                        class="exploder"><i
                                                                           class="las la-plus la-2x"></i></span>
                                                                     <a href="javascript:void(0)"><i
                                                                           class="las la-trash la-2x text-white pl-4"></i></a>
                                                                  </td>
                                                               </tr>
                                                               <tr class="explode d-none">
                                                                  <td colspan="6">
                                                                     <div class="pt-3 _title1">Your Report is
                                                                        <span class="text-green">Positive</span>
                                                                        <p class="mt-3 text-green">You need to
                                                                           have <span class="text-underline">Chest
                                                                              X-Ray report</span>.</p>
                                                                     </div>
                                                                     <table class="table table-bordered mt-4">
                                                                        <thead>
                                                                           <tr>
                                                                              <th scope="col">#</th>
                                                                              <th scope="col">Date Of X-Ray</th>
                                                                              <th scope="col">Expiry Date(Till 5
                                                                                 years valid)
                                                                              </th>
                                                                           </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                           <tr>
                                                                              <td scope="row">#</td>
                                                                              <td>28/08/1981</td>
                                                                              <td>28/08/1986</td>
                                                                           </tr>
                                                                           <tr>
                                                                              <td scope="row">#</td>
                                                                              <td><input type="text"
                                                                                    class="form-control"
                                                                                    name="xraydate"
                                                                                    value="10/24/1984" /></td>
                                                                              <td>28/08/1986</td>
                                                                           </tr>
                                                                        </tbody>
                                                                     </table>
                                                                  </td>
                                                               </tr>
                                                               <tr>
                                                                  <th scope="row">5</th>
                                                                  <td><input type="text" class="form-control"
                                                                        name="xraydate" value="10/24/1984" /></td>
                                                                  <td><input type="text" class="form-control"
                                                                        name="xraydate" value="10/24/1984" /></td>
                                                                  <td>28/08/1986</td>
                                                                  <td></td>
                                                                  <td></td>
                                                               </tr>
                                                            </tbody>
                                                         </table>
                                                      </div>
                                                      <div class="col-12 col-sm-1"></div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-12 col-sm-2"></div>
                                                      <div class="col-12 col-sm-8">
                                                      </div>
                                                      <div class="col-12 col-sm-2"></div>
                                                   </div>
                                                   <div class="d-flex pt-4 justify-content-center">
                                                      <button type="submit" class="btn btn-outline-green"
                                                         name="Save">Save</button>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- PPD End -->
                                          <!-- TB Screen Start -->
                                          <div class="tab-pane fade" id="tb-screen" role="tabpanel"
                                             aria-labelledby="tb-screen-tab">
                                             <div class="app-vbc ppd_block p-3">
                                                <div class="add-new-patient">
                                                   <div class="icon"><img
                                                         src="../assets/img/icons/patient-img.svg"
                                                         class="img-fluid" /></div>
                                                   <button type="submit"
                                                      class="btn btn-outline-green w-600 d-table mr-auto ml-auto mt-3"
                                                      id="tbbtn"
                                                      style="width: inherit;font-size: 18px;height: 36px;padding-left: 10px;padding-right: 10px;text-transform: uppercase;"
                                                      onclick="openRoadL('tbbtn')" name="RoadL Request">RoadL
                                                      Request</button>
                                                   <div class="recieved_roadl d-none">
                                                      <div class="row">
                                                         <div class="col-12 col-sm-4"></div>
                                                         <div class="col-12 col-sm-4">
                                                            <div class="row">
                                                               <div class="col-12 col-sm-6">
                                                                  <select id="roadlrequest2"
                                                                     class="form-control select roadlrequest"
                                                                     multiple></select>
                                                               </div>
                                                               <div class="col-12 col-sm-6">
                                                                  <button type="submit"
                                                                     class="btn btn-outline-green w-600"
                                                                     style="width: inherit;font-size: 18px;height: 36px;padding-left: 10px;padding-right: 10px;text-transform: uppercase;"
                                                                     name="Start RoadL">Start RoadL</button>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="col-12 col-sm-4"></div>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-12 col-sm-1"></div>
                                                      <div class="col-12 col-sm-10">
                                                         <table class="table table-bordered table-hover mt-4">
                                                            <thead class="thead-light">
                                                               <tr>
                                                                  <th scope="col">#</th>
                                                                  <th scope="col">Date Of Screening</th>
                                                                  <th scope="col">Expiry Date(Valid till 1 years)
                                                                  </th>
                                                                  <th scope="col">Type</th>
                                                                  <th scope="col">Result</th>
                                                                  <th width="11%">Action</th>
                                                               </tr>
                                                            </thead>
                                                            <tbody>
                                                               <tr class="bg-positive">
                                                                  <td class="text-white">1</th>
                                                                  <td class="text-white">28/08/1981</td>
                                                                  <td class="text-white">28/08/1986</td>
                                                                  <td class="text-white">Gold</td>
                                                                  <td class="text-white">Positive</td>
                                                                  <td class='text-center text-white'><span
                                                                        onclick="exploder('exp1')" id="exp1"
                                                                        class="exploder"><i
                                                                           class="las la-plus la-2x"></i></span>
                                                                     <a href="javascript:void(0)"><i
                                                                           class="las la-trash la-2x text-white pl-4"></i></a>
                                                                  </td>
                                                               </tr>
                                                               <tr class="explode1 d-none">
                                                                  <td colspan="6">
                                                                     <div class="pt-3 _title1">Your Report is
                                                                        <span class="text-green">Positive</span>
                                                                        <p class="mt-3 text-green">You need to
                                                                           have <span class="text-underline">Chest
                                                                              X-Ray report</span>.</p>
                                                                     </div>
                                                                     <table class="table table-bordered mt-4">
                                                                        <thead>
                                                                           <tr>
                                                                              <th scope="col">#</th>
                                                                              <th scope="col">Date Of X-Ray</th>
                                                                              <th scope="col">Expiry Date(Till 5
                                                                                 years valid)
                                                                              </th>
                                                                           </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                           <tr>
                                                                              <th scope="row">#</th>
                                                                              <td>28/08/1981</td>
                                                                              <td>28/08/1986</td>
                                                                           </tr>
                                                                           <tr>
                                                                              <th scope="row">#</th>
                                                                              <td><input type="text"
                                                                                    class="form-control"
                                                                                    name="xraydate"
                                                                                    value="10/24/1984" /></td>
                                                                              <td>28/08/1986</td>
                                                                           </tr>
                                                                        </tbody>
                                                                     </table>
                                                                  </td>
                                                               </tr>
                                                               <tr>
                                                                  <th scope="row">2</th>
                                                                  <td>28/08/1981</td>
                                                                  <td>28/08/1986</td>
                                                                  <td>Gold Plus</td>
                                                                  <td>Negative</td>
                                                                  <td></td>
                                                               </tr>
                                                               <tr>
                                                                  <th scope="row">3</th>
                                                                  <td><input type="text" class="form-control"
                                                                        name="xraydate" value="10/24/1984" /></td>
                                                                  <td>28/08/1986</td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                               </tr>
                                                            </tbody>
                                                         </table>
                                                      </div>
                                                      <div class="col-12 col-sm-1"></div>
                                                   </div>
                                                   <div class="d-flex pt-4 justify-content-center">
                                                      <button type="submit" class="btn btn-outline-green"
                                                         name="Save">Save</button>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- TB Screen End -->
                                          <!-- Rubeola Start -->
                                          <div class="tab-pane fade" id="rubeola" role="tabpanel"
                                             aria-labelledby="rubeola-tab">
                                             <div class="app-vbc p-3">
                                                <div class="add-new-patient">
                                                   <div class="icon"><img src="../assets/img/icons/rubeola.svg"
                                                         class="img-fluid" /></div>
                                                   <button type="submit"
                                                      class="btn btn-outline-green w-600 d-table mr-auto ml-auto mt-3"
                                                      id="rubeolabtn"
                                                      style="width: inherit;font-size: 18px;height: 36px;padding-left: 10px;padding-right: 10px;text-transform: uppercase;"
                                                      onclick="openRoadL('rubeolabtn')" name="RoadL Request">RoadL
                                                      Request</button>
                                                   <div class="recieved_roadl d-none">
                                                      <div class="row">
                                                         <div class="col-12 col-sm-4"></div>
                                                         <div class="col-12 col-sm-4">
                                                            <div class="row">
                                                               <div class="col-12 col-sm-6">
                                                                  <select id="roadlrequest3"
                                                                     class="form-control select roadlrequest"
                                                                     multiple></select>
                                                               </div>
                                                               <div class="col-12 col-sm-6">
                                                                  <button type="submit"
                                                                     class="btn btn-outline-green w-600"
                                                                     style="width: inherit;font-size: 18px;height: 36px;padding-left: 10px;padding-right: 10px;text-transform: uppercase;"
                                                                     name="Start RoadL">Start RoadL</button>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="col-12 col-sm-4"></div>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-12 col-sm-1"></div>
                                                      <div class="col-12 col-sm-10">
                                                         <table class="table table-bordered table-hover mt-4">
                                                            <thead class="thead-light">
                                                               <tr>
                                                                  <th scope="col">#</th>
                                                                  <th scope="col">Due Date</th>
                                                                  <th scope="col">Date Performed</th>
                                                                  <th scope="col">Result</th>
                                                                  <th width="11%">Action</th>
                                                               </tr>
                                                            </thead>
                                                            <tbody>
                                                               <tr class="bg-positive">
                                                                  <td class="text-white">1</td>
                                                                  <td class="text-white">10/24/1984</td>
                                                                  <td class="text-white">10/24/1984</td>
                                                                  <td class="text-white">Positive</td>
                                                                  <td class='text-center text-white'><span
                                                                        onclick="exploder('exp2')" id="exp2"
                                                                        class="exploder"><i
                                                                           class="las la-plus la-2x"></i></span>
                                                                     <a href="javascript:void(0)"><i
                                                                           class="las la-trash la-2x text-white pl-4"></i></a>
                                                                  </td>
                                                               </tr>
                                                               <tr class="explode1 d-none">
                                                                  <td colspan="6">
                                                                     <div class="pt-3 _title1">Your Report is
                                                                        <span class="text-green">Positive</span>
                                                                        <p class="mt-3 text-green">You need to
                                                                           have <span class="text-underline">Chest
                                                                              X-Ray report</span>.</p>
                                                                     </div>
                                                                     <table class="table table-bordered mt-4">
                                                                        <thead>
                                                                           <tr>
                                                                              <th scope="col">#</th>
                                                                              <th scope="col">Date Of X-Ray</th>
                                                                              <th scope="col">Expiry Date(Till 5
                                                                                 years valid)
                                                                              </th>
                                                                           </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                           <tr>
                                                                              <th scope="row">1</th>
                                                                              <td>28/08/1981</td>
                                                                              <td>28/08/1986</td>
                                                                           </tr>
                                                                           <tr>
                                                                              <th scope="row">2</th>
                                                                              <td><input type="text"
                                                                                    class="form-control"
                                                                                    name="xraydate"
                                                                                    value="10/24/1984" /></td>
                                                                              <td>28/08/1986</td>
                                                                           </tr>
                                                                        </tbody>
                                                                     </table>
                                                                  </td>
                                                               </tr>
                                                               <tr>
                                                                  <td scope="row">2</td>
                                                                  <td><input type="text"
                                                                        class="form-control form-control-lg"
                                                                        name="xraydate" value="10/24/1984" /></td>
                                                                  <td><input type="text"
                                                                        class="form-control form-control-lg"
                                                                        name="xraydate" value="10/24/1984" /></td>
                                                                  <td>
                                                                     <!-- <select name="" id="" class="form-control">
                                                                        <option value="">Select</option>
                                                                        <option value="">Immune</option>
                                                                        <option value="">Not Immune</option>
                                                                     </select> -->
                                                                  </td>
                                                                  <td></td>
                                                               </tr>
                                                            </tbody>
                                                         </table>
                                                      </div>
                                                      <div class="col-12 col-sm-1"></div>
                                                   </div>
                                                   <div class="d-flex pt-4 justify-content-center">
                                                      <button type="submit" class="btn btn-outline-green"
                                                         name="Save">Save</button>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- Rubeola End -->
                                          <!-- Rubeola MMR1 Start -->
                                          <div class="tab-pane fade" id="rubeola-mmr1" role="tabpanel"
                                             aria-labelledby="rubeola-mmr1-tab">
                                             <div class="app-vbc p-3">
                                                <div class="add-new-patient">
                                                   <div class="icon"><img src="../assets/img/icons/rubeola.svg"
                                                         class="img-fluid" /></div>
                                                   <button type="submit"
                                                      class="btn btn-outline-green w-600 d-table mr-auto ml-auto mt-3"
                                                      id="mmr1btn"
                                                      style="width: inherit;font-size: 18px;height: 36px;padding-left: 10px;padding-right: 10px;text-transform: uppercase;"
                                                      onclick="openRoadL('mmr1btn')" name="RoadL Request">RoadL
                                                      Request</button>
                                                   <div class="recieved_roadl d-none">
                                                      <div class="row">
                                                         <div class="col-12 col-sm-4"></div>
                                                         <div class="col-12 col-sm-4">
                                                            <div class="row">
                                                               <div class="col-12 col-sm-6">
                                                                  <select id="roadlrequest4"
                                                                     class="form-control select roadlrequest"
                                                                     multiple></select>
                                                               </div>
                                                               <div class="col-12 col-sm-6">
                                                                  <button type="submit"
                                                                     class="btn btn-outline-green w-600"
                                                                     style="width: inherit;font-size: 18px;height: 36px;padding-left: 10px;padding-right: 10px;text-transform: uppercase;"
                                                                     name="Start RoadL">Start RoadL</button>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="col-12 col-sm-4"></div>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-12 col-sm-1"></div>
                                                      <div class="col-12 col-sm-10">
                                                         <table class="table table-bordered table-hover mt-4">
                                                            <thead class="thead-light">
                                                               <tr>
                                                                  <th scope="col">#</th>
                                                                  <th scope="col">Due Date</th>
                                                                  <th scope="col">Date Performed</th>
                                                                  <th scope="col">Result</th>
                                                                  <th width="11%">Action</th>
                                                               </tr>
                                                            </thead>
                                                            <tbody>
                                                               <tr class="bg-positive">
                                                                  <td class="text-white">1</td>
                                                                  <td class="text-white">10/24/1984</td>
                                                                  <td class="text-white">10/24/1984</td>
                                                                  <td class="text-white">Positive</td>
                                                                  <td class='text-center text-white'><span
                                                                        onclick="exploder('exp3')" id="exp3"
                                                                        class="exploder"><i
                                                                           class="las la-plus la-2x"></i></span>
                                                                     <a href="javascript:void(0)"><i
                                                                           class="las la-trash la-2x text-white pl-4"></i></a>
                                                                  </td>
                                                               </tr>
                                                               <tr class="explode1 d-none">
                                                                  <td colspan="6">
                                                                     <div class="pt-3 _title1">Your Report is
                                                                        <span class="text-green">Positive</span>
                                                                        <p class="mt-3 text-green">You need to
                                                                           have <span class="text-underline">Chest
                                                                              X-Ray report</span>.</p>
                                                                     </div>
                                                                     <table class="table table-bordered mt-4">
                                                                        <thead>
                                                                           <tr>
                                                                              <th scope="col">#</th>
                                                                              <th scope="col">Date Of X-Ray</th>
                                                                              <th scope="col">Expiry Date(Till 5
                                                                                 years valid)
                                                                              </th>
                                                                           </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                           <tr>
                                                                              <th scope="row">#</th>
                                                                              <td>28/08/1981</td>
                                                                              <td>28/08/1986</td>
                                                                           </tr>
                                                                           <tr>
                                                                              <th scope="row">#</th>
                                                                              <td><input type="text"
                                                                                    class="form-control"
                                                                                    name="xraydate"
                                                                                    value="10/24/1984" /></td>
                                                                              <td>28/08/1986</td>
                                                                           </tr>
                                                                        </tbody>
                                                                     </table>
                                                                  </td>
                                                               </tr>
                                                               <tr>
                                                                  <td scope="row">2</td>
                                                                  <td><input type="text"
                                                                        class="form-control form-control-lg"
                                                                        name="xraydate" value="10/24/1984" /></td>
                                                                  <td><input type="text"
                                                                        class="form-control form-control-lg"
                                                                        name="xraydate" value="10/24/1984" /></td>
                                                                  <td>
                                                                     <!-- <select name="" id="" class="form-control">
                                                                        <option value="">Select</option>
                                                                        <option value="">Completed</option>
                                                                        <option value="">Not Completed</option>
                                                                     </select> -->
                                                                  </td>
                                                                  <td>
                                                                  </td>
                                                               </tr>
                                                            </tbody>
                                                         </table>
                                                      </div>
                                                      <div class="col-12 col-sm-1"></div>
                                                   </div>
                                                   <div class="d-flex pt-4 justify-content-center">
                                                      <button type="submit" class="btn btn-outline-green"
                                                         name="Save">Save</button>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- Rubeola MMR1 End -->
                                          <!-- Rubeola MMR2 Start -->
                                          <div class="tab-pane fade" id="rubeola-mmr2" role="tabpanel"
                                             aria-labelledby="rubeola-mmr2-tab">
                                             <div class="app-vbc p-3">
                                                <div class="add-new-patient">
                                                   <div class="icon"><img src="../assets/img/icons/rubeola.svg"
                                                         class="img-fluid" /></div>
                                                   <button type="submit"
                                                      class="btn btn-outline-green w-600 d-table mr-auto ml-auto mt-3"
                                                      id="mmr2btn"
                                                      style="width: inherit;font-size: 18px;height: 36px;padding-left: 10px;padding-right: 10px;text-transform: uppercase;"
                                                      onclick="openRoadL('mmr2btn')" name="RoadL Request">RoadL
                                                      Request</button>
                                                   <div class="recieved_roadl d-none">
                                                      <div class="row">
                                                         <div class="col-12 col-sm-4"></div>
                                                         <div class="col-12 col-sm-4">
                                                            <div class="row">
                                                               <div class="col-12 col-sm-6">
                                                                  <select id="roadlrequest5"
                                                                     class="form-control select roadlrequest"
                                                                     multiple></select>
                                                               </div>
                                                               <div class="col-12 col-sm-6">
                                                                  <button type="submit"
                                                                     class="btn btn-outline-green w-600"
                                                                     style="width: inherit;font-size: 18px;height: 36px;padding-left: 10px;padding-right: 10px;text-transform: uppercase;"
                                                                     name="Start RoadL">Start RoadL</button>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="col-12 col-sm-4"></div>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-12 col-sm-1"></div>
                                                      <div class="col-12 col-sm-10">
                                                         <table class="table table-bordered table-hover mt-4">
                                                            <thead class="thead-light">
                                                               <tr>
                                                                  <th scope="col">#</th>
                                                                  <th scope="col">Due Date</th>
                                                                  <th scope="col">Date Performed</th>
                                                                  <th scope="col">Result</th>
                                                                  <th width="11%">Action</th>
                                                               </tr>
                                                            </thead>
                                                            <tbody>
                                                               <tr class="bg-positive">
                                                                  <td class="text-white">#</td>
                                                                  <td class="text-white">10/24/1984</td>
                                                                  <td class="text-white">10/24/1984</td>
                                                                  <td class="text-white">Positive</td>
                                                                  <td class='text-center text-white'><span
                                                                        onclick="exploder('exp4')" id="exp4"
                                                                        class="exploder"><i
                                                                           class="las la-plus la-2x"></i></span>
                                                                     <a href="javascript:void(0)"><i
                                                                           class="las la-trash la-2x text-white pl-4"></i></a>
                                                                  </td>
                                                               </tr>
                                                               <tr class="explode1 d-none">
                                                                  <td colspan="6">
                                                                     <div class="pt-3 _title1">Your Report is
                                                                        <span class="text-green">Positive</span>
                                                                        <p class="mt-3 text-green">You need to
                                                                           have <span class="text-underline">Chest
                                                                              X-Ray report</span>.</p>
                                                                     </div>
                                                                     <table class="table table-bordered mt-4">
                                                                        <thead>
                                                                           <tr>
                                                                              <th scope="col">#</th>
                                                                              <th scope="col">Date Of X-Ray</th>
                                                                              <th scope="col">Expiry Date(Till 5
                                                                                 years valid)
                                                                              </th>
                                                                           </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                           <tr>
                                                                              <td scope="row">1</td>
                                                                              <td>28/08/1981</td>
                                                                              <td>28/08/1986</td>
                                                                           </tr>
                                                                           <tr>
                                                                              <td scope="row">2</td>
                                                                              <td><input type="text"
                                                                                    class="form-control"
                                                                                    name="xraydate"
                                                                                    value="10/24/1984" /></td>
                                                                              <td>28/08/1986</td>
                                                                           </tr>
                                                                        </tbody>
                                                                     </table>
                                                                  </td>
                                                               </tr>
                                                               <tr>
                                                                  <td scope="row">#</td>
                                                                  <td><input type="text"
                                                                        class="form-control form-control-lg"
                                                                        name="xraydate" value="10/24/1984" /></td>
                                                                  <td><input type="text"
                                                                        class="form-control form-control-lg"
                                                                        name="xraydate" value="10/24/1984" /></td>
                                                                  <td>
                                                                     <!-- <select name="" id="" class="form-control">
                                                                        <option value="">Select</option>
                                                                        <option value="">Completed</option>
                                                                        <option value="">Not Completed</option>
                                                                     </select> -->
                                                                  </td>
                                                                  <td></td>
                                                               </tr>
                                                            </tbody>
                                                         </table>
                                                      </div>
                                                      <div class="col-12 col-sm-1"></div>
                                                   </div>
                                                   <div class="d-flex pt-4 justify-content-center">
                                                      <button type="submit" class="btn btn-outline-green"
                                                         name="Save">Save</button>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- Rubeola MMR2 End -->
                                          <!-- Rubella Start -->
                                          <div class="tab-pane fade" id="rubella" role="tabpanel"
                                             aria-labelledby="rubella-tab">
                                             <div class="app-vbc p-3">
                                                <div class="add-new-patient">
                                                   <div class="icon"><img src="../assets/img/icons/rubeola.svg"
                                                         class="img-fluid" /></div>
                                                   <button type="submit"
                                                      class="btn btn-outline-green w-600 d-table mr-auto ml-auto mt-3"
                                                      id="rubellabtn"
                                                      style="width: inherit;font-size: 18px;height: 36px;padding-left: 10px;padding-right: 10px;text-transform: uppercase;"
                                                      onclick="openRoadL('rubellabtn')" name="RoadL Request">RoadL
                                                      Request</button>
                                                   <div class="recieved_roadl d-none">
                                                      <div class="row">
                                                         <div class="col-12 col-sm-4"></div>
                                                         <div class="col-12 col-sm-4">
                                                            <div class="row">
                                                               <div class="col-12 col-sm-6">
                                                                  <select id="roadlrequest6"
                                                                     class="form-control select roadlrequest"
                                                                     multiple></select>
                                                               </div>
                                                               <div class="col-12 col-sm-6">
                                                                  <button type="submit"
                                                                     class="btn btn-outline-green w-600"
                                                                     style="width: inherit;font-size: 18px;height: 36px;padding-left: 10px;padding-right: 10px;text-transform: uppercase;"
                                                                     name="Start RoadL">Start RoadL</button>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="col-12 col-sm-4"></div>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-12 col-sm-1"></div>
                                                      <div class="col-12 col-sm-10">
                                                         <table class="table table-bordered table-hover mt-4">
                                                            <thead class="thead-light">
                                                               <tr>
                                                                  <th scope="col">#</th>
                                                                  <th scope="col">Due Date</th>
                                                                  <th scope="col">Date Performed</th>
                                                                  <th scope="col">Result</th>
                                                                  <th width="11%">Action</th>
                                                               </tr>
                                                            </thead>
                                                            <tbody>
                                                               <tr class="bg-positive">
                                                                  <td class="text-white">1</td>
                                                                  <td class="text-white">10/24/1984</td>
                                                                  <td class="text-white">10/24/1984</td>
                                                                  <td class="text-white">Positive</td>
                                                                  <td class='text-center text-white'><span
                                                                        onclick="exploder('exp5')" id="exp5"
                                                                        class="exploder"><i
                                                                           class="las la-plus la-2x"></i></span>
                                                                     <a href="javascript:void(0)"><i
                                                                           class="las la-trash la-2x text-white pl-4"></i></a>
                                                                  </td>
                                                               </tr>
                                                               <tr class="explode1 d-none">
                                                                  <td colspan="6">
                                                                     <div class="pt-3 _title1">Your Report is
                                                                        <span class="text-green">Positive</span>
                                                                        <p class="mt-3 text-green">You need to
                                                                           have <span class="text-underline">Chest
                                                                              X-Ray report</span>.</p>
                                                                     </div>
                                                                     <table class="table table-bordered mt-4">
                                                                        <thead>
                                                                           <tr>
                                                                              <th scope="col">#</th>
                                                                              <th scope="col">Date Of X-Ray</th>
                                                                              <th scope="col">Expiry Date(Till 5
                                                                                 years valid)
                                                                              </th>
                                                                           </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                           <tr>
                                                                              <th scope="row">#</th>
                                                                              <td>28/08/1981</td>
                                                                              <td>28/08/1986</td>
                                                                           </tr>
                                                                           <tr>
                                                                              <th scope="row">#</th>
                                                                              <td><input type="text"
                                                                                    class="form-control"
                                                                                    name="xraydate"
                                                                                    value="10/24/1984" /></td>
                                                                              <td>28/08/1986</td>
                                                                           </tr>
                                                                        </tbody>
                                                                     </table>
                                                                  </td>
                                                               </tr>
                                                               <tr>
                                                                  <td scope="row">2</td>
                                                                  <td><input type="text"
                                                                        class="form-control form-control-lg"
                                                                        name="xraydate" value="10/24/1984" /></td>
                                                                  <td><input type="text"
                                                                        class="form-control form-control-lg"
                                                                        name="xraydate" value="10/24/1984" /></td>
                                                                  <td>
                                                                     <!-- <select name="" id="" class="form-control">
                                                                        <option value="">Select</option>
                                                                        <option value="">Immune</option>
                                                                        <option value="">Not Immune</option>
                                                                     </select> -->
                                                                  </td>
                                                                  <td></td>
                                                               </tr>
                                                            </tbody>
                                                         </table>
                                                      </div>
                                                      <div class="col-12 col-sm-1"></div>
                                                   </div>
                                                   <div class="d-flex pt-4 justify-content-center">
                                                      <button type="submit" class="btn btn-outline-green"
                                                         name="Save">Save</button>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- Rubella End -->
                                          <!-- Rubella MMR Start -->
                                          <div class="tab-pane fade" id="rubella-mmr" role="tabpanel"
                                             aria-labelledby="rubella-mmr-tab">
                                             <div class="app-vbc p-3">
                                                <div class="add-new-patient">
                                                   <div class="icon"><img src="../assets/img/icons/rubeola.svg"
                                                         class="img-fluid" /></div>
                                                   <button type="submit"
                                                      class="btn btn-outline-green w-600 d-table mr-auto ml-auto mt-3"
                                                      id="rubellaMMRbtn"
                                                      style="width: inherit;font-size: 18px;height: 36px;padding-left: 10px;padding-right: 10px;text-transform: uppercase;"
                                                      onclick="openRoadL('rubellaMMRbtn')"
                                                      name="RoadL Request">RoadL
                                                      Request</button>
                                                   <div class="recieved_roadl d-none">
                                                      <div class="row">
                                                         <div class="col-12 col-sm-4"></div>
                                                         <div class="col-12 col-sm-4">
                                                            <div class="row">
                                                               <div class="col-12 col-sm-6">
                                                                  <select id="roadlrequest7"
                                                                     class="form-control select roadlrequest"
                                                                     multiple></select>
                                                               </div>
                                                               <div class="col-12 col-sm-6">
                                                                  <button type="submit"
                                                                     class="btn btn-outline-green w-600"
                                                                     style="width: inherit;font-size: 18px;height: 36px;padding-left: 10px;padding-right: 10px;text-transform: uppercase;"
                                                                     name="Start RoadL">Start RoadL</button>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="col-12 col-sm-4"></div>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-12 col-sm-1"></div>
                                                      <div class="col-12 col-sm-10">
                                                         <table class="table table-bordered table-hover mt-4">
                                                            <thead class="thead-light">
                                                               <tr>
                                                                  <th scope="col">#</th>
                                                                  <th scope="col">Due Date</th>
                                                                  <th scope="col">Date Performed</th>
                                                                  <th scope="col">Result</th>
                                                                  <th width="11%">Action</th>
                                                               </tr>
                                                            </thead>
                                                            <tbody>
                                                               <tr class="bg-positive">
                                                                  <td class="text-white">#</td>
                                                                  <td class="text-white">10/24/1984</td>
                                                                  <td class="text-white">10/24/1984</td>
                                                                  <td class="text-white">Positive</td>
                                                                  <td class='text-center text-white'><span
                                                                        onclick="exploder('exp6')" id="exp6"
                                                                        class="exploder"><i
                                                                           class="las la-plus la-2x"></i></span>
                                                                     <a href="javascript:void(0)"><i
                                                                           class="las la-trash la-2x text-white pl-4"></i></a>
                                                                  </td>
                                                               </tr>
                                                               <tr class="explode1 d-none">
                                                                  <td colspan="6">
                                                                     <div class="pt-3 _title1">Your Report is
                                                                        <span class="text-green">Positive</span>
                                                                        <p class="mt-3 text-green">You need to
                                                                           have <span class="text-underline">Chest
                                                                              X-Ray report</span>.</p>
                                                                     </div>
                                                                     <table class="table table-bordered mt-4">
                                                                        <thead>
                                                                           <tr>
                                                                              <th scope="col">#</th>
                                                                              <th scope="col">Date Of X-Ray</th>
                                                                              <th scope="col">Expiry Date(Till 5
                                                                                 years valid)
                                                                              </th>
                                                                           </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                           <tr>
                                                                              <th scope="row">#</th>
                                                                              <td>28/08/1981</td>
                                                                              <td>28/08/1986</td>
                                                                           </tr>
                                                                           <tr>
                                                                              <th scope="row">#</th>
                                                                              <td><input type="text"
                                                                                    class="form-control"
                                                                                    name="xraydate"
                                                                                    value="10/24/1984" /></td>
                                                                              <td>28/08/1986</td>
                                                                           </tr>
                                                                        </tbody>
                                                                     </table>
                                                                  </td>
                                                               </tr>
                                                               <tr>
                                                                  <td scope="row">#</td>
                                                                  <td><input type="text"
                                                                        class="form-control form-control-lg"
                                                                        name="xraydate" value="10/24/1984" /></td>
                                                                  <td><input type="text"
                                                                        class="form-control form-control-lg"
                                                                        name="xraydate" value="10/24/1984" /></td>
                                                                  <td>
                                                                     <!-- <select name="" id="" class="form-control">
                                                                        <option value="">Select</option>
                                                                        <option value="">Completed</option>
                                                                        <option value="">Not Completed</option>
                                                                     </select> -->
                                                                  </td>
                                                                  <td></td>
                                                               </tr>
                                                            </tbody>
                                                         </table>
                                                      </div>
                                                      <div class="col-12 col-sm-1"></div>
                                                   </div>
                                                   <div class="d-flex pt-4 justify-content-center">
                                                      <button type="submit" class="btn btn-outline-green"
                                                         name="Save">Save</button>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- Rubella MMR End -->
                                          <!-- Facemask Provided Start -->
                                          <div class="tab-pane fade" id="facemask-provided" role="tabpanel"
                                             aria-labelledby="facemask-provided-tab">
                                             <div class="app-vbc p-3">
                                                <div class="add-new-patient">
                                                   <div class="icon"><img src="../assets/img/icons/facemask.svg"
                                                         class="img-fluid" /></div>
                                                   <button type="submit"
                                                      class="btn btn-outline-green w-600 d-table mr-auto ml-auto mt-3"
                                                      id="facemaskbtn"
                                                      style="width: inherit;font-size: 18px;height: 36px;padding-left: 10px;padding-right: 10px;text-transform: uppercase;"
                                                      onclick="openRoadL('facemaskbtn')"
                                                      name="RoadL Request">RoadL
                                                      Request</button>
                                                   <div class="recieved_roadl d-none">
                                                      <div class="row">
                                                         <div class="col-12 col-sm-4"></div>
                                                         <div class="col-12 col-sm-4">
                                                            <div class="row">
                                                               <div class="col-12 col-sm-6">
                                                                  <select id="roadlrequest8"
                                                                     class="form-control select roadlrequest"
                                                                     multiple></select>
                                                               </div>
                                                               <div class="col-12 col-sm-6">
                                                                  <button type="submit"
                                                                     class="btn btn-outline-green w-600"
                                                                     style="width: inherit;font-size: 18px;height: 36px;padding-left: 10px;padding-right: 10px;text-transform: uppercase;"
                                                                     name="Start RoadL">Start RoadL</button>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="col-12 col-sm-4"></div>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-12 col-sm-1"></div>
                                                      <div class="col-12 col-sm-10">
                                                         <table class="table table-bordered table-hover mt-4">
                                                            <thead class="thead-light">
                                                               <tr>
                                                                  <th scope="col">#</th>
                                                                  <th scope="col">Due Date</th>
                                                                  <th scope="col">Date Performed</th>
                                                                  <th scope="col">Result</th>
                                                                  <th width="11%">Action</th>
                                                               </tr>
                                                            </thead>
                                                            <tbody>
                                                               <tr class="bg-positive text-white">
                                                                  <td scope="row">1</td>
                                                                  <td>10/24/1984</td>
                                                                  <td>10/24/1984</td>
                                                                  <td>Positive</td>
                                                                  <td class='text-center'><span
                                                                        onclick="exploder('exp7')" id="exp7"
                                                                        class="exploder"><i
                                                                           class="las la-plus la-2x"></i></span>
                                                                     <a href="javascript:void(0)"><i
                                                                           class="las la-trash la-2x text-white pl-4"></i></a>
                                                                  </td>
                                                               </tr>
                                                               <tr class="explode1 d-none">
                                                                  <td colspan="6">
                                                                     <div class="pt-3 _title1">Your Report is
                                                                        <span class="text-green">Positive</span>
                                                                        <p class="mt-3 text-green">You need to
                                                                           have <span class="text-underline">Chest
                                                                              X-Ray report</span>.</p>
                                                                     </div>
                                                                     <table class="table table-bordered mt-4">
                                                                        <thead>
                                                                           <tr>
                                                                              <th scope="col">#</th>
                                                                              <th scope="col">Date Of X-Ray</th>
                                                                              <th scope="col">Expiry Date(Till 5
                                                                                 years valid)
                                                                              </th>
                                                                           </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                           <tr>
                                                                              <th scope="row">#</th>
                                                                              <td>28/08/1981</td>
                                                                              <td>28/08/1986</td>
                                                                           </tr>
                                                                           <tr>
                                                                              <th scope="row">#</th>
                                                                              <td><input type="text"
                                                                                    class="form-control"
                                                                                    name="xraydate"
                                                                                    value="10/24/1984" /></td>
                                                                              <td>28/08/1986</td>
                                                                           </tr>
                                                                        </tbody>
                                                                     </table>
                                                                  </td>
                                                               </tr>
                                                               <tr>
                                                                  <td scope="row">2</td>
                                                                  <td><input type="text"
                                                                        class="form-control form-control-lg"
                                                                        name="xraydate" value="10/24/1984" /></td>
                                                                  <td><input type="text"
                                                                        class="form-control form-control-lg"
                                                                        name="xraydate" value="10/24/1984" /></td>
                                                                  <td>
                                                                     <!-- <select name="" id="" class="form-control">
                                                                        <option value="">Select</option>
                                                                        <option value="">Received</option>
                                                                        <option value="">Not Received</option>
                                                                     </select> -->
                                                                  </td>
                                                                  <td></td>
                                                               </tr>
                                                            </tbody>
                                                         </table>
                                                      </div>
                                                      <div class="col-12 col-sm-1"></div>
                                                   </div>
                                                   <div class="d-flex pt-4 justify-content-center">
                                                      <button type="submit" class="btn btn-outline-green"
                                                         name="Save">Save</button>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- Facemask Provided End -->
                                          <!-- Drug Screen Start -->
                                          <div class="tab-pane fade" id="drug-screen" role="tabpanel"
                                             aria-labelledby="drug-screen-tab">
                                             <div class="app-vbc p-3">
                                                <div class="add-new-patient">
                                                   <div class="icon"><img
                                                         src="../assets/img/icons/drug screening.svg"
                                                         class="img-fluid" /></div>
                                                   <button type="submit"
                                                      class="btn btn-outline-green w-600 d-table mr-auto ml-auto mt-3"
                                                      id="drugscreenbtn"
                                                      style="width: inherit;font-size: 18px;height: 36px;padding-left: 10px;padding-right: 10px;text-transform: uppercase;"
                                                      onclick="openRoadL('drugscreenbtn')"
                                                      name="RoadL Request">RoadL
                                                      Request</button>
                                                   <div class="recieved_roadl d-none">
                                                      <div class="row">
                                                         <div class="col-12 col-sm-4"></div>
                                                         <div class="col-12 col-sm-4">
                                                            <div class="row">
                                                               <div class="col-12 col-sm-6">
                                                                  <select id="roadlrequest9"
                                                                     class="form-control select roadlrequest"
                                                                     multiple></select>
                                                               </div>
                                                               <div class="col-12 col-sm-6">
                                                                  <button type="submit"
                                                                     class="btn btn-outline-green w-600"
                                                                     style="width: inherit;font-size: 18px;height: 36px;padding-left: 10px;padding-right: 10px;text-transform: uppercase;"
                                                                     name="Start RoadL">Start RoadL</button>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="col-12 col-sm-4"></div>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-12 col-sm-1"></div>
                                                      <div class="col-12 col-sm-10">
                                                         <table class="table table-bordered table-hover mt-4">
                                                            <thead class="thead-light">
                                                               <tr>
                                                                  <th scope="col">#</th>
                                                                  <th scope="col">Due Date</th>
                                                                  <th scope="col">Date Performed</th>
                                                                  <th scope="col">Result</th>
                                                                  <th width="11%">Action</th>
                                                               </tr>
                                                            </thead>
                                                            <tbody>
                                                               <tr class="bg-positive">
                                                                  <td class="text-white">1</td>
                                                                  <td class="text-white">10/24/1984</td>
                                                                  <td class="text-white">10/24/1984</td>
                                                                  <td class="text-white">Positive</td>
                                                                  <td class='text-center text-white'><span
                                                                        onclick="exploder('exp8')" id="exp8"
                                                                        class="exploder"><i
                                                                           class="las la-plus la-2x"></i></span>
                                                                     <a href="javascript:void(0)"><i
                                                                           class="las la-trash la-2x text-white pl-4"></i></a>
                                                                  </td>
                                                               </tr>
                                                               <tr class="explode1 d-none">
                                                                  <td colspan="6">
                                                                     <div class="pt-3 _title1">Your Report is
                                                                        <span class="text-green">Positive</span>
                                                                        <p class="mt-3 text-green">You need to
                                                                           have <span class="text-underline">Chest
                                                                              X-Ray report</span>.</p>
                                                                     </div>
                                                                     <table class="table table-bordered mt-4">
                                                                        <thead>
                                                                           <tr>
                                                                              <th scope="col">#</th>
                                                                              <th scope="col">Date Of X-Ray</th>
                                                                              <th scope="col">Expiry Date(Till 5
                                                                                 years valid)
                                                                              </th>
                                                                           </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                           <tr>
                                                                              <th scope="row">#</th>
                                                                              <td>28/08/1981</td>
                                                                              <td>28/08/1986</td>
                                                                           </tr>
                                                                           <tr>
                                                                              <th scope="row">#</th>
                                                                              <td><input type="text"
                                                                                    class="form-control"
                                                                                    name="xraydate"
                                                                                    value="10/24/1984" /></td>
                                                                              <td>28/08/1986</td>
                                                                           </tr>
                                                                        </tbody>
                                                                     </table>
                                                                  </td>
                                                               </tr>
                                                               <tr>
                                                                  <td scope="row">2</td>
                                                                  <td><input type="text"
                                                                        class="form-control form-control-lg"
                                                                        name="xraydate" value="10/24/1984" /></td>
                                                                  <td><input type="text"
                                                                        class="form-control form-control-lg"
                                                                        name="xraydate" value="10/24/1984" /></td>
                                                                  <td>
                                                                     <!-- <select name="" id="" class="form-control">
                                                                        <option value="">Select</option>
                                                                        <option value="">Received</option>
                                                                        <option value="">Not Received</option>
                                                                     </select> -->
                                                                  </td>
                                                                  <td></td>
                                                               </tr>
                                                            </tbody>
                                                         </table>
                                                      </div>
                                                      <div class="col-12 col-sm-1"></div>
                                                   </div>
                                                   <div class="d-flex pt-4 justify-content-center">
                                                      <button type="submit" class="btn btn-outline-green"
                                                         name="Save">Save</button>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- Drug Screen End -->
                                          <!-- Annual Health Assessment Start -->
                                          <div class="tab-pane fade" id="annual-health-assessment" role="tabpanel"
                                             aria-labelledby="annual-health-assessment-tab">
                                             <div class="app-vbc p-3">
                                                <div class="add-new-patient">
                                                   <div class="icon"><img
                                                         src="../assets/img/icons/annual_health_management.svg"
                                                         class="img-fluid" /></div>
                                                   <button type="submit"
                                                      class="btn btn-outline-green w-600 d-table mr-auto ml-auto mt-3"
                                                      id="annualbtn"
                                                      style="width: inherit;font-size: 18px;height: 36px;padding-left: 10px;padding-right: 10px;text-transform: uppercase;"
                                                      onclick="openRoadL('annualbtn')" name="RoadL Request">RoadL
                                                      Request</button>
                                                   <div class="recieved_roadl d-none">
                                                      <div class="row">
                                                         <div class="col-12 col-sm-4"></div>
                                                         <div class="col-12 col-sm-4">
                                                            <div class="row">
                                                               <div class="col-12 col-sm-6">
                                                                  <select id="roadlrequest10"
                                                                     class="form-control select roadlrequest"
                                                                     multiple></select>
                                                               </div>
                                                               <div class="col-12 col-sm-6">
                                                                  <button type="submit"
                                                                     class="btn btn-outline-green w-600"
                                                                     style="width: inherit;font-size: 18px;height: 36px;padding-left: 10px;padding-right: 10px;text-transform: uppercase;"
                                                                     name="Start RoadL">Start RoadL</button>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="col-12 col-sm-4"></div>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-12 col-sm-1"></div>
                                                      <div class="col-12 col-sm-10">
                                                         <table class="table table-bordered table-hover mt-4">
                                                            <thead class="thead-light">
                                                               <tr>
                                                                  <th scope="col">#</th>
                                                                  <th scope="col">Due Date</th>
                                                                  <th scope="col">Date Performed</th>
                                                                  <th scope="col">Result</th>
                                                                  <th width="11%">Action</th>
                                                               </tr>
                                                            </thead>
                                                            <tbody>
                                                               <tr class="bg-positive">
                                                                  <td class="text-white">#</td>
                                                                  <td class="text-white">10/24/1984</td>
                                                                  <td class="text-white">10/24/1984</td>
                                                                  <td class="text-white">Completed</td>
                                                                  <td class='text-center text-white'><span
                                                                        onclick="exploder('exp9')" id="exp9"
                                                                        class="exploder"><i
                                                                           class="las la-plus la-2x"></i></span>
                                                                     <a href="javascript:void(0)"><i
                                                                           class="las la-trash la-2x text-white pl-4"></i></a>
                                                                  </td>
                                                               </tr>
                                                               <tr class="explode1 d-none">
                                                                  <td colspan="6">
                                                                     <div class="pt-3 _title1">Your Report is
                                                                        <span class="text-green">Positive</span>
                                                                        <p class="mt-3 text-green">You need to
                                                                           have <span class="text-underline">Chest
                                                                              X-Ray report</span>.</p>
                                                                     </div>
                                                                     <table class="table table-bordered mt-4">
                                                                        <thead>
                                                                           <tr>
                                                                              <th scope="col">#</th>
                                                                              <th scope="col">Date Of X-Ray</th>
                                                                              <th scope="col">Expiry Date(Till 5
                                                                                 years valid)
                                                                              </th>
                                                                           </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                           <tr>
                                                                              <th scope="row">#</th>
                                                                              <td>28/08/1981</td>
                                                                              <td>28/08/1986</td>
                                                                           </tr>
                                                                           <tr>
                                                                              <th scope="row">#</th>
                                                                              <td><input type="text"
                                                                                    class="form-control"
                                                                                    name="xraydate"
                                                                                    value="10/24/1984" /></td>
                                                                              <td>28/08/1986</td>
                                                                           </tr>
                                                                        </tbody>
                                                                     </table>
                                                                  </td>
                                                               </tr>
                                                               <tr>
                                                                  <td scope="row">#</td>
                                                                  <td><input type="text"
                                                                        class="form-control form-control-lg"
                                                                        name="xraydate" value="10/24/1984" /></td>
                                                                  <td><input type="text"
                                                                        class="form-control form-control-lg"
                                                                        name="xraydate" value="10/24/1984" /></td>
                                                                  <td>
                                                                     <!-- <select name="" id="" class="form-control">
                                                                        <option value="">Select</option>
                                                                        <option value="">Completed</option>
                                                                        <option value="">Not Completed</option>
                                                                     </select> -->
                                                                  </td>
                                                                  <td></td>
                                                               </tr>
                                                            </tbody>
                                                         </table>
                                                      </div>
                                                      <div class="col-12 col-sm-1"></div>
                                                   </div>
                                                   <div class="d-flex pt-4 justify-content-center">
                                                      <button type="submit" class="btn btn-outline-green"
                                                         name="Save">Save</button>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- Annual Health Assessment End -->
                                          <!-- Flu Vaccine Start -->
                                          <!-- <div class="tab-pane fade" id="flu-vaccine" role="tabpanel"
                                             aria-labelledby="flu-vaccine-tab">
                                             Content goes here...
                                          </div> -->
                                          <!-- Flu Vaccine End -->
                                       </div>
                                    </div>
                                    <!-- Lab End-->
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Clinical End -->
                     <!-- Physician Start -->
                     <div class="tab-pane fade" id="physican" role="tabpanel" aria-labelledby="physican-tab">
                        <div class="app-card app-card-custom" data-name="physician">
                           <div class="app-card-header">
                              <h1 class="title">Physician</h1>
                           </div>
                           <div class="head scrollbar scrollbar4">
                              <div class="p-3">
                                 <div class="app-card app-card-custom box-shadow-none"
                                    data-name="primary_care_physician">
                                    <div class="app-card-header">
                                       <h1 class="title">Primary Care Physician</h1>
                                    </div>
                                    <div class="head">
                                       <div class="p-3">
                                          <div class="form-group">
                                             <div class="row">
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div>
                                                         <i class="las la-angle-double-right circle"></i>
                                                      </div>
                                                      <div>
                                                         <h3 class="_title">Name</h3>
                                                         <h1 class="_detail">Akshita Dariyani</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div>
                                                         <i class="las la-angle-double-right circle"></i>
                                                      </div>
                                                      <div>
                                                         <h3 class="_title">Email</h3>
                                                         <a href="mailto:akshita@dariyani.com"
                                                            class="_detail">akshita@dariyani.com</a>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="d-flex align-items-center">
                                                      <div>
                                                         <i class="las la-angle-double-right circle"></i>
                                                      </div>
                                                      <div>
                                                         <h3 class="_title">Phone Number With Ext</h3>
                                                         <h1 class="_detail">(555) 555-5555</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="row">
                                             <div class="col-12">
                                                <div class="d-flex align-items-center">
                                                   <div>
                                                      <i class="las la-angle-double-right circle"></i>
                                                   </div>
                                                   <div>
                                                      <h3 class="_title">Address</h3>
                                                      <h1 class="_detail">1797 Pitkin Avenue Brooklyn, NY 11212
                                                      </h1>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="app-card app-card-custom box-shadow-none mt-3"
                                    data-name="specialist_physician">
                                    <div class="app-card-header">
                                       <h1 class="title">Specialist Physician</h1>
                                    </div>
                                    <div class="head">
                                       <div class="p-3">
                                          <div class="form-group">
                                             <div class="row">
                                                <div class="col-12 col-sm-4">
                                                   <div class="input_box">
                                                      <div class="ls">
                                                         <i class="las la-angle-double-right circle"></i>
                                                      </div>
                                                      <div class="rs">
                                                         <h3 class="_title">Name</h3>
                                                         <h1 class="_detail">Akshita Dariyani</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="input_box">
                                                      <div class="ls">
                                                         <i class="las la-angle-double-right circle"></i>
                                                      </div>
                                                      <div class="rs">
                                                         <h3 class="_title">Email</h3>
                                                         <a href="mailto:akshita@dariyani.com"
                                                            class="_detail">akshita@dariyani.com</a>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="input_box">
                                                      <div class="ls">
                                                         <i class="las la-angle-double-right circle"></i>
                                                      </div>
                                                      <div class="rs">
                                                         <h3 class="_title">Phone Number With Ext</h3>
                                                         <h1 class="_detail">(555) 555-5555</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="row">
                                             <div class="col-12">
                                                <div class="input_box">
                                                   <div class="ls">
                                                      <i class="las la-angle-double-right circle"></i>
                                                   </div>
                                                   <div class="rs">
                                                      <h3 class="_title">Address</h3>
                                                      <h1 class="_detail">1797 Pitkin Avenue Brooklyn, NY 11212
                                                      </h1>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="app-card app-card-custom box-shadow-none no-minHeight mt-3"
                                    data-name="case_manager">
                                    <div class="app-card-header">
                                       <h1 class="title">Case Manager</h1>
                                    </div>
                                    <div class="head">
                                       <div class="p-3">
                                          <div class="">
                                             <div class="row">
                                                <div class="col-12 col-sm-4">
                                                   <div class="input_box">
                                                      <div class="ls">
                                                         <i class="las la-angle-double-right circle"></i>
                                                      </div>
                                                      <div class="rs">
                                                         <h3 class="_title">Name</h3>
                                                         <h1 class="_detail">Akshita Dariyani</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                   <div class="input_box">
                                                      <div class="ls">
                                                         <i class="las la-angle-double-right circle"></i>
                                                      </div>
                                                      <div class="rs">
                                                         <h3 class="_title">Employement Type</h3>
                                                         <h1 class="_detail">Nurse Practitioner</h1>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
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
                     <!-- Physician End -->
                     <!-- Diagnosis Start -->
                     <div class="tab-pane fade" id="diagnosis" role="tabpanel" aria-labelledby="diagnosis-tab">
                        <div class="app-card app-card-custom" data-name="diagnosis">
                           <div class="app-card-header">
                              <h1 class="title">Diagnosis</h1>
                           </div>
                           <div class="head scrollbar scrollbar4">
                              <div class="p-3">
                                 <table class="table table-bordered" style="width: 100%;" id="employee-table">
                                    <thead class="thead-inverse">
                                       <tr>
                                          <th>sr_no</th>
                                          <th>ICD10_code</th>
                                          <th>desc </th>
                                          <th>date_of_diagnosis</th>
                                          <th>historical_as_of</th>
                                          <th width="11%">Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr class="table-success">
                                          <td>1</td>
                                          <td class="text-green">56745</td>
                                          <td>Lorem Ipsum</td>
                                          <td>Sunday, 1 October 2020</td>
                                          <td>Lorem Ipsum</td>
                                          <td>
                                             <a href="#" class="btn btn-info btn-sm btn-block">Set as a Primary
                                                Diagnosis Code</a>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>2</td>
                                          <td>4365</td>
                                          <td>Lorem Ipsum</td>
                                          <td>Sunday, 1 October 2020</td>
                                          <td>Lorem Ipsum</td>
                                          <td>
                                             <a href="#" class="btn btn-info btn-sm btn-block">Set as a Primary
                                                Diagnosis Code</a>
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Diagnosis End -->
                     <!-- Med Profile Start -->
                     <div class="tab-pane fade" id="medProfile" role="tabpanel" aria-labelledby="medProfile-tab">
                        <div class="app-card app-card-custom" data-name="med_profile">
                           <div class="app-card-header">
                              <h1 class="title">Med Profile</h1>
                           </div>
                           <div class="head scrollbar scrollbar4">
                              <div class="p-3">
                                 <div>
                                    <div class="table-responsive">
                                       <table class="table" id="myTable">
                                          <thead>
                                             <tr>
                                                <th>Medication</th>
                                                <th>Dose</th>
                                                <th>Amount</th>
                                                <th>Form</th>
                                                <th>Route</th>
                                                <th>Freq.</th>
                                                <th>Order Date</th>
                                                <th>Start Date</th>
                                                <th>Date Taught</th>
                                                <th>Disc. Date</th>
                                                <th>Comments</th>
                                                <th>Status</th>
                                                <th>Doc</th>
                                                <th>User</th>
                                                <th>Action</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <tr>
                                                <td><a href="javascript:void(0)"
                                                      class="text-green text-underline">Aspirin</a></td>
                                                <td>81 MG</td>
                                                <td>1</td>
                                                <td>Tablet</td>
                                                <td>Oral</td>
                                                <td>Daily</td>
                                                <td>10/05/2020</td>
                                                <td>10/05/2020</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>New</td>
                                                <td>485-680366</td>
                                                <td>AlexT</td>
                                                <td>
                                                   <div class="btn-group btn-group-sm btn-group-doral shadow-sm"
                                                      role="group" aria-label="Basic example">
                                                      <button type="button"
                                                         class="btn btn-outline-light dt-delete"
                                                         data-toggle="tooltip" data-placement="bottom" title=""
                                                         data-original-title="Delete">
                                                         <img src="../assets/img/icons/delete-icon-new.svg"
                                                            alt="">
                                                      </button>
                                                      <button type="button" class="btn btn-outline-light"
                                                         data-toggle="tooltip" data-placement="bottom" title=""
                                                         data-original-title="Edit">
                                                         <img src="../assets/img/icons/edit-field.svg" alt="">
                                                      </button>
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><a href="javascript:void(0)"
                                                      class="text-green text-underline">Aspirin</a></td>
                                                <td>81 MG</td>
                                                <td>1</td>
                                                <td>Tablet</td>
                                                <td>Oral</td>
                                                <td>Daily</td>
                                                <td>10/05/2020</td>
                                                <td>10/05/2020</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>New</td>
                                                <td>485-680366</td>
                                                <td>AlexT</td>
                                                <td>
                                                   <div class="btn-group btn-group-sm btn-group-doral shadow-sm"
                                                      role="group" aria-label="Basic example">
                                                      <button type="button"
                                                         class="btn btn-outline-light dt-delete"
                                                         data-toggle="tooltip" data-placement="bottom" title=""
                                                         data-original-title="Delete">
                                                         <img src="../assets/img/icons/delete-icon-new.svg"
                                                            alt="">
                                                      </button>
                                                      <button type="button" class="btn btn-outline-light"
                                                         data-toggle="tooltip" data-placement="bottom" title=""
                                                         data-original-title="Edit">
                                                         <img src="../assets/img/icons/edit-field.svg" alt="">
                                                      </button>
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><a href="javascript:void(0)"
                                                      class="text-green text-underline">Aspirin</a></td>
                                                <td>81 MG</td>
                                                <td>1</td>
                                                <td>Tablet</td>
                                                <td>Oral</td>
                                                <td>Daily</td>
                                                <td>10/05/2020</td>
                                                <td>10/05/2020</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>New</td>
                                                <td>485-680366</td>
                                                <td>AlexT</td>
                                                <td>
                                                   <div class="btn-group btn-group-sm btn-group-doral shadow-sm"
                                                      role="group" aria-label="Basic example">
                                                      <button type="button"
                                                         class="btn btn-outline-light dt-delete"
                                                         data-toggle="tooltip" data-placement="bottom" title=""
                                                         data-original-title="Delete">
                                                         <img src="../assets/img/icons/delete-icon-new.svg"
                                                            alt="">
                                                      </button>
                                                      <button type="button" class="btn btn-outline-light"
                                                         data-toggle="tooltip" data-placement="bottom" title=""
                                                         data-original-title="Edit">
                                                         <img src="../assets/img/icons/edit-field.svg" alt="">
                                                      </button>
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><a href="javascript:void(0)"
                                                      class="text-green text-underline">Aspirin</a></td>
                                                <td>81 MG</td>
                                                <td>1</td>
                                                <td>Tablet</td>
                                                <td>Oral</td>
                                                <td>Daily</td>
                                                <td>10/05/2020</td>
                                                <td>10/05/2020</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>New</td>
                                                <td>485-680366</td>
                                                <td>AlexT</td>
                                                <td>
                                                   <div class="btn-group btn-group-sm btn-group-doral shadow-sm"
                                                      role="group" aria-label="Basic example">
                                                      <button type="button"
                                                         class="btn btn-outline-light dt-delete"
                                                         data-toggle="tooltip" data-placement="bottom" title=""
                                                         data-original-title="Delete">
                                                         <img src="../assets/img/icons/delete-icon-new.svg"
                                                            alt="">
                                                      </button>
                                                      <button type="button" class="btn btn-outline-light"
                                                         data-toggle="tooltip" data-placement="bottom" title=""
                                                         data-original-title="Edit">
                                                         <img src="../assets/img/icons/edit-field.svg" alt="">
                                                      </button>
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><a href="javascript:void(0)"
                                                      class="text-green text-underline">Aspirin</a></td>
                                                <td>81 MG</td>
                                                <td>1</td>
                                                <td>Tablet</td>
                                                <td>Oral</td>
                                                <td>Daily</td>
                                                <td>10/05/2020</td>
                                                <td>10/05/2020</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>New</td>
                                                <td>485-680366</td>
                                                <td>AlexT</td>
                                                <td>
                                                   <div class="btn-group btn-group-sm btn-group-doral shadow-sm"
                                                      role="group" aria-label="Basic example">
                                                      <button type="button"
                                                         class="btn btn-outline-light dt-delete"
                                                         data-toggle="tooltip" data-placement="bottom" title=""
                                                         data-original-title="Delete">
                                                         <img src="../assets/img/icons/delete-icon-new.svg"
                                                            alt="">
                                                      </button>
                                                      <button type="button" class="btn btn-outline-light"
                                                         data-toggle="tooltip" data-placement="bottom" title=""
                                                         data-original-title="Edit">
                                                         <img src="../assets/img/icons/edit-field.svg" alt="">
                                                      </button>
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><a href="javascript:void(0)"
                                                      class="text-green text-underline">Aspirin</a></td>
                                                <td>81 MG</td>
                                                <td>1</td>
                                                <td>Tablet</td>
                                                <td>Oral</td>
                                                <td>Daily</td>
                                                <td>10/05/2020</td>
                                                <td>10/05/2020</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>New</td>
                                                <td>485-680366</td>
                                                <td>AlexT</td>
                                                <td>
                                                   <div class="btn-group btn-group-sm btn-group-doral shadow-sm"
                                                      role="group" aria-label="Basic example">
                                                      <button type="button"
                                                         class="btn btn-outline-light dt-delete"
                                                         data-toggle="tooltip" data-placement="bottom" title=""
                                                         data-original-title="Delete">
                                                         <img src="../assets/img/icons/delete-icon-new.svg"
                                                            alt="">
                                                      </button>
                                                      <button type="button" class="btn btn-outline-light"
                                                         data-toggle="tooltip" data-placement="bottom" title=""
                                                         data-original-title="Edit">
                                                         <img src="../assets/img/icons/edit-field.svg" alt="">
                                                      </button>
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><a href="javascript:void(0)"
                                                      class="text-green text-underline">Aspirin</a></td>
                                                <td>81 MG</td>
                                                <td>1</td>
                                                <td>Tablet</td>
                                                <td>Oral</td>
                                                <td>Daily</td>
                                                <td>10/05/2020</td>
                                                <td>10/05/2020</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>New</td>
                                                <td>485-680366</td>
                                                <td>AlexT</td>
                                                <td>
                                                   <div class="btn-group btn-group-sm btn-group-doral shadow-sm"
                                                      role="group" aria-label="Basic example">
                                                      <button type="button"
                                                         class="btn btn-outline-light dt-delete"
                                                         data-toggle="tooltip" data-placement="bottom" title=""
                                                         data-original-title="Delete">
                                                         <img src="../assets/img/icons/delete-icon-new.svg"
                                                            alt="">
                                                      </button>
                                                      <button type="button" class="btn btn-outline-light"
                                                         data-toggle="tooltip" data-placement="bottom" title=""
                                                         data-original-title="Edit">
                                                         <img src="../assets/img/icons/edit-field.svg" alt="">
                                                      </button>
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><a href="javascript:void(0)"
                                                      class="text-green text-underline">Aspirin</a></td>
                                                <td>81 MG</td>
                                                <td>1</td>
                                                <td>Tablet</td>
                                                <td>Oral</td>
                                                <td>Daily</td>
                                                <td>10/05/2020</td>
                                                <td>10/05/2020</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>New</td>
                                                <td>485-680366</td>
                                                <td>AlexT</td>
                                                <td>
                                                   <div class="btn-group btn-group-sm btn-group-doral shadow-sm"
                                                      role="group" aria-label="Basic example">
                                                      <button type="button"
                                                         class="btn btn-outline-light dt-delete"
                                                         data-toggle="tooltip" data-placement="bottom" title=""
                                                         data-original-title="Delete">
                                                         <img src="../assets/img/icons/delete-icon-new.svg"
                                                            alt="">
                                                      </button>
                                                      <button type="button" class="btn btn-outline-light"
                                                         data-toggle="tooltip" data-placement="bottom" title=""
                                                         data-original-title="Edit">
                                                         <img src="../assets/img/icons/edit-field.svg" alt="">
                                                      </button>
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><a href="javascript:void(0)"
                                                      class="text-green text-underline">Aspirin</a></td>
                                                <td>81 MG</td>
                                                <td>1</td>
                                                <td>Tablet</td>
                                                <td>Oral</td>
                                                <td>Daily</td>
                                                <td>10/05/2020</td>
                                                <td>10/05/2020</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>New</td>
                                                <td>485-680366</td>
                                                <td>AlexT</td>
                                                <td>
                                                   <div class="btn-group btn-group-sm btn-group-doral shadow-sm"
                                                      role="group" aria-label="Basic example">
                                                      <button type="button"
                                                         class="btn btn-outline-light dt-delete"
                                                         data-toggle="tooltip" data-placement="bottom" title=""
                                                         data-original-title="Delete">
                                                         <img src="../assets/img/icons/delete-icon-new.svg"
                                                            alt="">
                                                      </button>
                                                      <button type="button" class="btn btn-outline-light"
                                                         data-toggle="tooltip" data-placement="bottom" title=""
                                                         data-original-title="Edit">
                                                         <img src="../assets/img/icons/edit-field.svg" alt="">
                                                      </button>
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><a href="javascript:void(0)"
                                                      class="text-green text-underline">Aspirin</a></td>
                                                <td>81 MG</td>
                                                <td>1</td>
                                                <td>Tablet</td>
                                                <td>Oral</td>
                                                <td>Daily</td>
                                                <td>10/05/2020</td>
                                                <td>10/05/2020</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>New</td>
                                                <td>485-680366</td>
                                                <td>AlexT</td>
                                                <td>
                                                   <div class="btn-group btn-group-sm btn-group-doral shadow-sm"
                                                      role="group" aria-label="Basic example">
                                                      <button type="button"
                                                         class="btn btn-outline-light dt-delete"
                                                         data-toggle="tooltip" data-placement="bottom" title=""
                                                         data-original-title="Delete">
                                                         <img src="../assets/img/icons/delete-icon-new.svg"
                                                            alt="">
                                                      </button>
                                                      <button type="button" class="btn btn-outline-light"
                                                         data-toggle="tooltip" data-placement="bottom" title=""
                                                         data-original-title="Edit">
                                                         <img src="../assets/img/icons/edit-field.svg" alt="">
                                                      </button>
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><a href="javascript:void(0)"
                                                      class="text-green text-underline">Aspirin</a></td>
                                                <td>81 MG</td>
                                                <td>1</td>
                                                <td>Tablet</td>
                                                <td>Oral</td>
                                                <td>Daily</td>
                                                <td>10/05/2020</td>
                                                <td>10/05/2020</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>New</td>
                                                <td>485-680366</td>
                                                <td>AlexT</td>
                                                <td>
                                                   <div class="btn-group btn-group-sm btn-group-doral shadow-sm"
                                                      role="group" aria-label="Basic example">
                                                      <button type="button"
                                                         class="btn btn-outline-light dt-delete"
                                                         data-toggle="tooltip" data-placement="bottom" title=""
                                                         data-original-title="Delete">
                                                         <img src="../assets/img/icons/delete-icon-new.svg"
                                                            alt="">
                                                      </button>
                                                      <button type="button" class="btn btn-outline-light"
                                                         data-toggle="tooltip" data-placement="bottom" title=""
                                                         data-original-title="Edit">
                                                         <img src="../assets/img/icons/edit-field.svg" alt="">
                                                      </button>
                                                   </div>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Med Profile End -->
                     <!-- Pharmacy Start -->
                     <div class="tab-pane fade" id="pharmacy" role="tabpanel" aria-labelledby="pharmacy-tab">
                        <div class="app-card app-card-custom" data-name="pharmacy">
                           <div class="app-card-header">
                              <h1 class="title">Pharmacy</h1>
                           </div>
                           <div class="head scrollbar scrollbar4">
                           </div>
                        </div>
                     </div>
                     <!-- Pharmacy End -->
                  </div>
               </div>
            </div>
         </div>
      </div>
   <!-- </section> -->
  
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
