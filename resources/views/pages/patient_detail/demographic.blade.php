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
                           <div>
                              <x-telephone name="phoneno" />
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
            
            <!-- Nurse Detail -->
            @foreach($patient->nurses as $key => $patientNurse)
               <div class="app-card app-card-custom no-minHeight mb-3 box-shadow-none"
                  data-name="emergency_contact_detail">
                  <div class="app-card-header">
                     <h1 class="title">Nurse Detail</h1>
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
                                       <h3 class="_title">Name</h3>
                                       <input type="text"
                                          class="form-control-plaintext _detail " readonly
                                          name="name"
                                          onclick="editableField('name')"
                                          data-id="name" id="name"
                                          placeholder="Contact Name" value="{{ $patientNurse->name }}">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            @endforeach
            <!-- Nurse Detail -->

            <!-- Emergency contact Detail -->
            @foreach($patient->patientEmergencyContact as $key => $patientEmergencyContact)
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
                                       <input type="text"
                                          class="form-control-plaintext _detail " readonly
                                          name="name"
                                          onclick="editableField('name')"
                                          data-id="name" id="name"
                                          placeholder="Contact Name" value="{{ $patientEmergencyContact->name }}">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-sm-3 col-md-3">
                                 <div class="input_box">
                                    <div class="ls">
                                       <i class="las la-phone circle"></i>
                                    </div>
                                    <div class="rs">
                                       <h3 class="_title">Phone1</h3>
                                       <x-telephone name="phone1" />
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-sm-3 col-md-3">
                                 <div class="input_box">
                                    <div class="ls">
                                       <i class="las la-phone circle"></i>
                                    </div>
                                    <div class="rs">
                                       <h3 class="_title">Phone2</h3>
                                          <x-telephone name="Phone2" />
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-sm-3 col-md-3">
                                 <div class="input_box">
                                    <div class="ls">
                                       <i class="las la-user-nurse circle"></i>
                                    </div>
                                    <div class="rs">
                                       <h3 class="_title">Address</h3>
                                       <input type="text"
                                          class="form-control-plaintext _detail " readonly
                                          name="address"
                                          onclick="editableField('address')"
                                          data-id="address" id="address"
                                          placeholder="Address" value="{{ $patientEmergencyContact->address }}">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="p-3">
                        <div class="">
                           <div class="row">
                              <div class="col-12 col-sm-3 col-md-3">
                                 <div class="input_box">
                                    <div class="ls">
                                       <i class="las la-user-nurse circle"></i>
                                    </div>
                                    <div class="rs">
                                       <h3 class="_title">Lives With Patient</h3>
                                       <input type="text"
                                          class="form-control-plaintext _detail " readonly
                                          name="lives_with_patient"
                                          onclick="editableField('lives_with_patient')"
                                          data-id="lives_with_patient" id="lives_with_patient"
                                          placeholder="Lives With Patient" value="{{ $patientEmergencyContact->lives_with_patient }}">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-sm-3 col-md-3">
                                 <div class="input_box">
                                    <div class="ls">
                                       <i class="las la-user-nurse circle"></i>
                                    </div>
                                    <div class="rs">
                                       <h3 class="_title">Have Keys</h3>
                                       <input type="text"
                                          class="form-control-plaintext _detail " readonly
                                          name="have_keys"
                                          onclick="editableField('have_keys')"
                                          data-id="have_keys" id="have_keys"
                                          placeholder="Have Keys" value="{{ $patientEmergencyContact->have_keys }}">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            @endforeach
            <!-- Emergency contact Detail -->
         </div>
      </div>
   </div>
   <!-- Demographics End -->
</div>