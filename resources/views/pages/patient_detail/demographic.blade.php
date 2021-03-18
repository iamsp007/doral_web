<div class="tab-pane fade show active" id="demographic" role="tabpanel" aria-labelledby="demographic">
   <div class="app-card app-card-custom" data-name="demographics">
      <div class="app-card-header">
         <h1 class="title">Demographics</h1>
         @role('clinician')
            <img src="{{ asset('assets/img/icons/edit-field.svg') }}" data-toggle="tooltip" data-placement="bottom" title="Edit" class="cursor-pointer edit-icon" alt="" onclick="editAllField('demographic')">
            <img src="{{ asset('assets/img/icons/update-icon.svg') }}" style="display:none" data-toggle="tooltip" data-placement="bottom" title="Update" class="cursor-pointer update-icon" alt="" onclick="updateAllField('demographic')">
         @endrole
      </div>
      <div class="head scrollbar scrollbar12">
         <div class="p-3">
            <div class="form-group">
               <div class="row">
                  <div class="col-12 col-sm-3 col-md-3">
                     <div class="input_box">
                        <div class="ls"><i class="las la-envelope circle"></i></div>
                        <div class="rs">
                           <h3 class="_title">Agency ID</h3>
                           <input type="text" class="form-control-plaintext _detail "
                              readonly name="agency_id" onclick="editableField('agency_id')"
                              data-id="agency_id" id="agency_id" onblur="validateEmail(this);"
                              placeholder="Agency ID" value="{{ $patient->agency_id }}">
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-sm-3 col-md-3">
                     <div class="input_box">
                        <div class="ls"><i class="las la-envelope circle"></i></div>
                        <div class="rs">
                           <h3 class="_title">Office ID</h3>
                           <input type="text" class="form-control-plaintext _detail "
                              readonly name="office_id" onclick="editableField('office_id')"
                              data-id="office_id" id="office_id" onblur="validateEmail(this);"
                              placeholder="Office ID" value="{{ $patient->office_id }}">
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-sm-3 col-md-3">
                     <div class="input_box">
                        <div class="ls"><i class="las la-envelope circle"></i></div>
                        <div class="rs">
                           <h3 class="_title">Patient ID</h3>
                           <input type="text" class="form-control-plaintext _detail "
                              readonly name="patient_id" onclick="editableField('patient_id')"
                              data-id="patient_id" id="patient_id" onblur="validateEmail(this);"
                              placeholder="Patient ID" value="{{ $patient->patient_id }}">
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-sm-3 col-md-3">
                     <div class="input_box">
                        <div class="ls"><i class="las la-envelope circle"></i></div>
                        <div class="rs">
                           <h3 class="_title">Priority Code</h3>
                           <input type="text" class="form-control-plaintext _detail "
                              readonly name="priority_code" onclick="editableField('priority_code')"
                              data-id="priority_code" id="priority_code" onblur="validateEmail(this);"
                              placeholder="Priority Code" value="{{ $patient->priority_code }}">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-12 col-sm-3">
                     <div class="input_box">
                        <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                        <div class="rs">
                           <h3 class="_title">Service Request Start Date</h3>
                           <input type="text" class="form-control-plaintext _detail "
                              readonly name="service_request_start_date" onclick="editableField('service_request_start_date')"
                              data-id="service_request_start_date" id="service_request_start_date" placeholder="Service Request Start Date"
                              value="{{ date('m-d-Y', strtotime($patient->service_request_start_date)) }}">
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-sm-3">
                     <div class="input_box">
                        <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                        <div class="rs">
                           <h3 class="_title">Admission ID:</h3>
                           <input type="text" class="form-control-plaintext _detail "
                              readonly name="admission_id"
                              onclick="editableField('admission_id')" data-id="admission_id"
                              id="admission_id" placeholder="Addmission ID"
                              value="{{ $patient->admission_id}}">
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-sm-3">
                     <div class="input_box">
                        <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                        <div class="rs">
                           <h3 class="_title">Patient Status ID</h3>
                           <input type="text" class="form-control-plaintext _detail "
                              readonly name="patient_status_id" onclick="editableField('patient_status_id')"
                              data-id="patient_status_id" id="patient_status_id" placeholder="Patient Status ID" value="{{ $patient->patient_status_id}}">
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-sm-3">
                     <div class="input_box">
                        <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                        <div class="rs">
                           <h3 class="_title">Patient Status Name</h3>
                           <input type="text" class="form-control-plaintext _detail "
                              readonly name="patient_status_name" onclick="editableField('patient_status_name')"
                              data-id="patient_status_name" id="patient_status_name" placeholder="Patient Status Name" value="{{ $patient->patient_status_name}}">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-12 col-sm-3">
                     <div class="input_box">
                        <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                        <div class="rs">
                           <h3 class="_title">SSN#</h3>
                           <input type="text" class="form-control-plaintext _detail "
                              readonly name="ssn" onclick="editableField('ssn')"
                              data-id="ssn" id="ssn" placeholder="ssn" value="{{ $patient->ssn}}">
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

            <!-- Coordinator Detail -->
            @foreach($patient->coordinators as $coordinator)
               <div class="app-card app-card-custom no-minHeight mb-3 box-shadow-none"
                  data-name="emergency_contact_detail">
                  <div class="app-card-header">
                     <h1 class="title">Coordinator Detail</h1>
                  </div>
                  <div>
                     <div class="p-3">
                        <div class="">
                           <div class="row">
                              <div class="col-12 col-sm-3 col-md-3">
                                 <div class="input_box">
                                    <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                    <div class="rs">
                                       <h3 class="_title">Coordinator ID</h3>
                                       <input type="text"
                                          class="form-control-plaintext _detail " readonly
                                          name="coordinator_id"
                                          onclick="editableField('coordinator_id')"
                                          data-id="coordinator_id" id="coordinator_id"
                                          placeholder="Coordinator ID" value="{{ $coordinator->coordinator_id }}">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-sm-3 col-md-3">
                                 <div class="input_box">
                                    <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                    <div class="rs">
                                       <h3 class="_title">Coordinator Name</h3>
                                       <input type="text"
                                          class="form-control-plaintext _detail " readonly
                                          name="coordinator_name"
                                          onclick="editableField('coordinator_name')"
                                          data-id="coordinator_name" id="coordinator_name"
                                          placeholder="Coordinator Name" value="{{ $coordinator->name }}">
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
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Nurse ID</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="nurse_id"
                                       onclick="editableField('nurse_id')"
                                       data-id="nurse_id" id="nurse_id"
                                       placeholder="Nurse ID" value="{{ $patient->nurse_id }}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Nurse Name</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="nurse_name"
                                       onclick="editableField('nurse_name')"
                                       data-id="nurse_name" id="nurse_name"
                                       placeholder="Nurse Name" value="{{ $patient->nurse_name }}">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Nurse Detail -->

            <!-- Accepted Services Detail -->
            @foreach($patient->acceptedServices as $acceptedService)
            <div class="app-card app-card-custom no-minHeight mb-3 box-shadow-none"
               data-name="emergency_contact_detail">
               <div class="app-card-header">
                  <h1 class="title">Accepted Services Detail</h1>
               </div>
               <div>
                  <div class="p-3">
                     <div class="">
                        <div class="row">
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">type</h3>
                                    <ul>
                                       <li>{{ $acceptedService->type }}</li>
                                       @foreach(json_decode($acceptedService->value) as $value)
                                          <ul>
                                             <li>{{ $value }}</li>
                                          </ul>
                                       @endforeach
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
            <!-- Accepted Services Detail -->

            <!-- Alert Detail -->
            <div class="app-card app-card-custom no-minHeight mb-3 box-shadow-none"
               data-name="emergency_contact_detail">
               <div class="app-card-header">
                  <h1 class="title">Alert Detail</h1>
               </div>
               <div>
                  <div class="p-3">
                     <div class="">
                        <div class="row">
                           <div class="col-12 col-sm-12 col-md-12">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Alert</h3>
                                    <textarea name="additional_orders" id="additional_orders" cols="30" rows="8" class="form-control">{!! $patient->alert !!}</textarea>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Alert Detail -->

            <!-- Source Of Admission Detail-->
            <div class="app-card app-card-custom no-minHeight mb-3 box-shadow-none"
               data-name="emergency_contact_detail">
               <div class="app-card-header">
                  <h1 class="title">Source Of Admission</h1>
               </div>
               <div>
                  <div class="p-3">
                     <div class="">
                        <div class="row">
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Source Of Admission ID</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="source_admission_id"
                                       onclick="editableField('source_admission_id')"
                                       data-id="source_admission_id" id="source_admission_id"
                                       placeholder="Source Of Admission ID" value="{{ $patient->source_admission_id }}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Source Of Admission Name</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="source_admission_name"
                                       onclick="editableField('source_admission_name')"
                                       data-id="source_admission_name" id="source_admission_name"
                                       placeholder="Source Of Admission Name" value="{{ $patient->source_admission_name }}">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Source Of Admission Detail -->

            <!-- Team Detail-->
            <div class="app-card app-card-custom no-minHeight mb-3 box-shadow-none"
               data-name="emergency_contact_detail">
               <div class="app-card-header">
                  <h1 class="title">Team</h1>
               </div>
               <div>
                  <div class="p-3">
                     <div class="">
                        <div class="row">
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Team ID</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="team_id"
                                       onclick="editableField('team_id')"
                                       data-id="team_id" id="team_id"
                                       placeholder="Team ID" value="{{ $patient->team_id }}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Team Name</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="team_name"
                                       onclick="editableField('team_name')"
                                       data-id="team_name" id="team_name"
                                       placeholder="Team Name" value="{{ $patient->team_name }}">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Team Detail -->

            <!-- Location Detail-->
            <div class="app-card app-card-custom no-minHeight mb-3 box-shadow-none"
               data-name="emergency_contact_detail">
               <div class="app-card-header">
                  <h1 class="title">Location</h1>
               </div>
               <div>
                  <div class="p-3">
                     <div class="">
                        <div class="row">
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Location ID</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="location_id"
                                       onclick="editableField('location_id')"
                                       data-id="location_id" id="location_id"
                                       placeholder="Location ID" value="{{ $patient->location_id }}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Location Name</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail" readonly
                                       name="location_name"
                                       onclick="editableField('location_name')"
                                       data-id="location_name" id="location_name"
                                       placeholder="Location Name" value="{{ $patient->location_name }}">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Location Detail -->

            <!-- Branch Detail-->
            <div class="app-card app-card-custom no-minHeight mb-3 box-shadow-none"
               data-name="emergency_contact_detail">
               <div class="app-card-header">
                  <h1 class="title">Branch</h1>
               </div>
               <div>
                  <div class="p-3">
                     <div class="">
                        <div class="row">
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Branch ID</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="branch_id"
                                       onclick="editableField('branch_id')"
                                       data-id="branch_id" id="branch_id"
                                       placeholder="Branch ID" value="{{ $patient->branch_id }}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Branch Name</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail" readonly
                                       name="branch_name"
                                       onclick="editableField('branch_name')"
                                       data-id="branch_name" id="branch_name"
                                       placeholder="Branch Name" value="{{ $patient->branch_name }}">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Branch Detail -->

            <!-- Patient Address Detail-->
            <div class="app-card app-card-custom no-minHeight mb-3 box-shadow-none"
               data-name="emergency_contact_detail">
               <div class="app-card-header">
                  <h1 class="title">Patient Address</h1>
               </div>
               <div>
                  <div class="p-3">
                     <div class="">
                        <div class="row">
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Address ID</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="address_id"
                                       onclick="editableField('address_id')"
                                       data-id="address_id" id="address_id"
                                       placeholder="Address ID" value="{{ ($patient->patientAddress) ? $patient->patientAddress->address_id : '-' }}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Address1</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="address1"
                                       onclick="editableField('address1')"
                                       data-id="address1" id="address1"
                                       placeholder="Address1" value="{{ ($patient->patientAddress) ? $patient->patientAddress->address1 : '-' }}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Address2</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="address2"
                                       onclick="editableField('address2')"
                                       data-id="address2" id="address2"
                                       placeholder="Address2" value="{{ ($patient->patientAddress) ? $patient->patientAddress->address2 : '-' }}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Cross Street</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="cross_street"
                                       onclick="editableField('cross_street')"
                                       data-id="cross_street" id="cross_street"
                                       placeholder="Cross Street" value="{{ ($patient->patientAddress) ? $patient->patientAddress->cross_street : '-' }}">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Zip5</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="zip5"
                                       onclick="editableField('zip5')"
                                       data-id="zip5" id="zip5"
                                       placeholder="Zip5" value="{{ ($patient->patientAddress) ? $patient->patientAddress->zip5 : '-' }}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Zip4</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="zip4"
                                       onclick="editableField('zip4')"
                                       data-id="zip4" id="zip4"
                                       placeholder="Zip4" value="{{ ($patient->patientAddress) ? $patient->patientAddress->zip4 : '-' }}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Is Primary Address</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="is_primary_address"
                                       onclick="editableField('is_primary_address')"
                                       data-id="is_primary_address" id="is_primary_address"
                                       placeholder="Is Primary Address" value="{{ ($patient->patientAddress) ? $patient->patientAddress->is_primary_address : '-' }}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Address Types</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="address_type"
                                       onclick="editableField('address_type')"
                                       data-id="address_type" id="address_type"
                                       placeholder="address_type" value="{{ ($patient->patientAddress) ? $patient->patientAddress->address_type : '-' }}">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Patient Address Detail -->

            <!-- Contact Detail -->
            <div class="app-card app-card-custom no-minHeight mb-3 box-shadow-none"
               data-name="emergency_contact_detail">
               <div class="app-card-header">
                  <h1 class="title">Home Phone Detail</h1>
               </div>
               <div>
                  <div class="p-3">
                     <div class="">
                        <div class="row">
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Home Phone</h3>
                                    <input type="text" class="form-control-plaintext _detail "
                                       readonly name="home_phone" onclick="editableField('home_phone')"
                                       data-id="home_phone" id="home_phone" placeholder="Home Phone" value="{{ $patient->home_phone}}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Phone2</h3>
                                    <input type="text" class="form-control-plaintext _detail "
                                       readonly name="phone2" onclick="editableField('phone2')"
                                       data-id="phone2" id="phone2" placeholder="Phone2" value="{{ $patient->phone2}}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Phone2 Description</h3>
                                    <input type="text" class="form-control-plaintext _detail "
                                       readonly name="phone2_description" onclick="editableField('phone2_description')"
                                       data-id="phone2_description" id="phone2_description" placeholder="Phone2 Description" value="{{ $patient->phone2_description}}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Phone3</h3>
                                    <input type="text" class="form-control-plaintext _detail "
                                       readonly name="phone3" onclick="editableField('phone3')"
                                       data-id="phone3" id="phone3" placeholder="Phone3" value="{{ $patient->phone3}}">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Phone3 Description</h3>
                                    <input type="text" class="form-control-plaintext _detail "
                                       readonly name="phone3_description" onclick="editableField('phone3_description')"
                                       data-id="phone3_description" id="phone3_description" placeholder="Phone3 Description" value="{{ $patient->phone3_description}}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Home Phone Location Address ID</h3>
                                    <input type="text" class="form-control-plaintext _detail "
                                       readonly name="home_phone_location_address_id" onclick="editableField('home_phone_location_address_id')"
                                       data-id="home_phone_location_address_id" id="home_phone_location_address_id" placeholder="home_phone_location_address_id" value="{{ $patient->home_phone_location_address_id}}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Home Phone Location Address</h3>
                                    <input type="text" class="form-control-plaintext _detail "
                                       readonly name="home_phone_location_address" onclick="editableField('home_phone_location_address')"
                                       data-id="home_phone_location_address" id="home_phone_location_address" placeholder="home_phone_location_address" value="{{ $patient->home_phone_location_address }}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Home Phone2 Location Address ID</h3>
                                    <input type="text" class="form-control-plaintext _detail "
                                       readonly name="home_phone2_location_address_id" onclick="editableField('home_phone2_location_address_id')"
                                       data-id="home_phone2_location_address_id" id="home_phone2_location_address_id" placeholder="home_phone2_location_address_id" value="{{ $patient->home_phone2_location_address_id}}">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Home Phone2 Location Address</h3>
                                    <input type="text" class="form-control-plaintext _detail "
                                       readonly name="home_phone2_location_address" onclick="editableField('home_phone2_location_address')"
                                       data-id="home_phone2_location_address" id="home_phone2_location_address" placeholder="Home Phone2 Location Address" value="{{ $patient->home_phone2_location_address}}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Home Phone3 Location Address ID</h3>
                                    <input type="text" class="form-control-plaintext _detail "
                                       readonly name="home_phone3_location_address_id" onclick="editableField('home_phone3_location_address_id')"
                                       data-id="home_phone3_location_address_id" id="home_phone3_location_address_id" placeholder="Home Phone3 Location Address ID" value="{{ $patient->home_phone3_location_address_id}}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Home Phone3 Location Address</h3>
                                    <input type="text" class="form-control-plaintext _detail "
                                       readonly name="home_phone3_location_address" onclick="editableField('home_phone3_location_address')"
                                       data-id="home_phone3_location_address" id="home_phone3_location_address" placeholder="Home Phone3 Location Address" value="{{ $patient->home_phone3_location_address}}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Direction</h3>
                                    <input type="text" class="form-control-plaintext _detail "
                                       readonly name="direction" onclick="editableField('direction')"
                                       data-id="direction" id="direction" placeholder="Direction" value="{{ $patient->direction}}">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Contact Detail -->

            <!-- Alternate Billing Detail -->
            <div class="app-card app-card-custom no-minHeight mb-3 box-shadow-none"
               data-name="emergency_contact_detail">
               <div class="app-card-header">
                  <h1 class="title">Alternate Billing</h1>
               </div>
               <div>
                  <div class="p-3">
                     <div class="">
                        <div class="row">
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">First Name</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="first_name"
                                       onclick="editableField('first_name')"
                                       data-id="first_name" id="first_name"
                                       placeholder="First Name" value="{{ ($patient->alternateBilling) ? $patient->alternateBilling->first_name : '' }}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Middle Name</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="middle_name"
                                       onclick="editableField('middle_name')"
                                       data-id="middle_name" id="middle_name"
                                       placeholder="Middle Name" value="{{ ($patient->alternateBilling) ? $patient->alternateBilling->middle_name : '' }}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Last Name</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="last_name"
                                       onclick="editableField('last_name')"
                                       data-id="last_name" id="last_name"
                                       placeholder="Last Name" value="{{ ($patient->alternateBilling) ? $patient->alternateBilling->last_name : '' }}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Street</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="street"
                                       onclick="editableField('street')"
                                       data-id="street" id="street"
                                       placeholder="Street" value="{{ ($patient->alternateBilling) ? $patient->alternateBilling->street : '' }}">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Zip5</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="zip5"
                                       onclick="editableField('zip5')"
                                       data-id="zip5" id="zip5"
                                       placeholder="Zip5" value="{{ ($patient->alternateBilling) ? $patient->alternateBilling->zip5 : '' }}">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Alternate Billing Detail -->
         
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
                                       <input type="text"
                                          class="form-control-plaintext _detail " readonly
                                          name="phone1"
                                          onclick="editableField('phone1')"
                                          data-id="phone1" id="phone1"
                                          placeholder="Phone1" value="{{ $patientEmergencyContact->phone1 }}">
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
                                          <input type="text"
                                          class="form-control-plaintext _detail " readonly
                                          name="phone2"
                                          onclick="editableField('phone2')"
                                          data-id="phone2" id="phone2"
                                          placeholder="Phone2" value="{{ $patientEmergencyContact->phone2 }}">
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
                                       <h3 class="_title">Relationship ID</h3>
                                       <input type="text"
                                          class="form-control-plaintext _detail " readonly
                                          name="relationship_id"
                                          onclick="editableField('relationship_id')"
                                          data-id="relationship_id" id="relationship_id"
                                          placeholder="Relationship ID" value="{{ $patientEmergencyContact->relationship_id }}">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-sm-3 col-md-3">
                                 <div class="input_box">
                                    <div class="ls">
                                       <i class="las la-user-nurse circle"></i>
                                    </div>
                                    <div class="rs">
                                       <h3 class="_title">Relationship Name</h3>
                                       <input type="text"
                                          class="form-control-plaintext _detail " readonly
                                          name="relationship_name"
                                          onclick="editableField('relationship_name')"
                                          data-id="relationship_name" id="relationship_name"
                                          placeholder="Relationship Name" value="{{ $patientEmergencyContact->relationship_name }}">
                                    </div>
                                 </div>
                              </div>
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

            <!-- Emergency Preparedness Detail -->
            <div class="app-card app-card-custom no-minHeight mb-3 box-shadow-none"
               data-name="emergency_contact_detail">
               <div class="app-card-header">
                  <h1 class="title">Emergency Preparedness</h1>
               </div>
               <div>
                  <div class="p-3">
                     <div class="">
                        <div class="row">
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Type</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="type"
                                       onclick="editableField('type')"
                                       data-id="type" id="type"
                                       placeholder="Type" value="{{ ($patient->emergencyPreparednes) ? $patient->emergencyPreparednes->type : '' }}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Emergency Preparedness ID</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="emergency_preparedness_id"
                                       onclick="editableField('emergency_preparedness_id')"
                                       data-id="emergency_preparedness_id" id="emergency_preparedness_id"
                                       placeholder="Emergency Preparedness ID" value="">
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Name</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="emergency_preparedness_name"
                                       onclick="editableField('emergency_preparedness_name')"
                                       data-id="emergency_preparedness_name" id="emergency_preparedness_name"
                                       placeholder="Name" value="">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Emergency Preparedness-->

            <!-- Payer Detail -->
            <div class="app-card app-card-custom no-minHeight mb-3 box-shadow-none"
               data-name="emergency_contact_detail">
               <div class="app-card-header">
                  <h1 class="title">Payer Detail</h1>
               </div>
               <div>
                  <div class="p-3">
                     <div class="">
                        <div class="row">
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Payer ID</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="payer_id"
                                       onclick="editableField('payer_id')"
                                       data-id="payer_id" id="payer_id"
                                       placeholder="Payer ID" value="{{ $patient->payer_id }}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Payer Name</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="payer_name"
                                       onclick="editableField('payer_name')"
                                       data-id="payer_name" id="payer_name"
                                       placeholder="Payer Name" value="{{ $patient->payer_name }}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Payer Coordinator ID</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="payer_coordinator_id"
                                       onclick="editableField('payer_coordinator_id')"
                                       data-id="payer_coordinator_id" id="payer_coordinator_id"
                                       placeholder="Payer Coordinator ID" value="{{ $patient->payer_coordinator_id }}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Payer Coordinator Name</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="payer_coordinator_name"
                                       onclick="editableField('payer_coordinator_name')"
                                       data-id="payer_coordinator_name" id="payer_coordinator_name"
                                       placeholder="Payer Coordinator Name" value="{{ $patient->payer_coordinator_name }}">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Payer Detail -->

            <!-- Language -->
            <div class="app-card app-card-custom no-minHeight mb-3 box-shadow-none"
               data-name="emergency_contact_detail">
               <div class="app-card-header">
                  <h1 class="title">Language</h1>
               </div>
               <div>
                  <div class="p-3">
                     <div class="">
                        <div class="row">
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Primary Language ID</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="primary_language_id"
                                       onclick="editableField('primary_language_id')"
                                       data-id="primary_language_id" id="primary_language_id"
                                       placeholder="Primary Language ID" value="{{ $patient->primary_language_id }}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Primary Language</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="primary_language"
                                       onclick="editableField('primary_language')"
                                       data-id="primary_language" id="primary_language"
                                       placeholder="Primary Language" value="{{ $patient->primary_language }}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Secondary Language ID</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="secondary_language_id"
                                       onclick="editableField('secondary_language_id')"
                                       data-id="secondary_language_id" id="secondary_language_id"
                                       placeholder="Primary Language ID" value="{{ $patient->secondary_language_id }}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Secondary Language</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="secondary_language"
                                       onclick="editableField('secondary_language')"
                                       data-id="secondary_language" id="secondary_language"
                                       placeholder="Primary Language" value="{{ $patient->secondary_language }}">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Language-->

            <!-- Language -->
            <div class="app-card app-card-custom no-minHeight mb-3 box-shadow-none"
               data-name="emergency_contact_detail">
               <div class="app-card-header">
                  <h1 class="title">Wage Parity</h1>
               </div>
               <div>
                  <div class="p-3">
                     <div class="">
                        <div class="row">
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Wage Parity</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="wage_parity"
                                       onclick="editableField('wage_parity')"
                                       data-id="wage_parity" id="wage_parity"
                                       placeholder="Wage Parity" value="{{ $patient->wage_parity }}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Wage Parity From Date1</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="wage_parity_from_date1"
                                       onclick="editableField('wage_parity_from_date1')"
                                       data-id="wage_parity_from_date1" id="wage_parity_from_date1"
                                       placeholder="Wage Parity From Date1" value="{{ $patient->wage_parity_from_date1 }}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Wage Parity To Date1</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="wage_parity_to_date1"
                                       onclick="editableField('wage_parity_to_date1')"
                                       data-id="wage_parity_to_date1" id="wage_parity_to_date1"
                                       placeholder="Wage Parity To Date1" value="{{ $patient->wage_parity_to_date1 }}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Wage Parity From Date2</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="wage_parity_from_date2"
                                       onclick="editableField('wage_parity_from_date2')"
                                       data-id="wage_parity_from_date2" id="wage_parity_from_date2"
                                       placeholder="Wage Parity From Date2" value="{{ $patient->wage_parity_from_date2 }}">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="">
                        <div class="row">
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Wage Parity To Date2</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="wage_parity_to_date2"
                                       onclick="editableField('wage_parity_to_date2')"
                                       data-id="wage_parity_to_date2" id="wage_parity_to_date2"
                                       placeholder="Wage Parity To Date2" value="{{ $patient->wage_parity_to_date2 }}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Wage Parity From Date1</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="wage_parity_from_date1"
                                       onclick="editableField('wage_parity_from_date1')"
                                       data-id="wage_parity_from_date1" id="wage_parity_from_date1"
                                       placeholder="Wage Parity From Date1" value="{{ $patient->wage_parity_from_date1 }}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Wage Parity To Date1</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="wage_parity_to_date1"
                                       onclick="editableField('wage_parity_to_date1')"
                                       data-id="wage_parity_to_date1" id="wage_parity_to_date1"
                                       placeholder="Wage Parity To Date1" value="{{ $patient->wage_parity_to_date1 }}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-3 col-md-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Wage Parity From Date2</h3>
                                    <input type="text"
                                       class="form-control-plaintext _detail " readonly
                                       name="wage_parity_from_date2"
                                       onclick="editableField('wage_parity_from_date2')"
                                       data-id="wage_parity_from_date2" id="wage_parity_from_date2"
                                       placeholder="Wage Parity From Date2" value="{{ $patient->wage_parity_from_date2 }}">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Language-->
         </div>
      </div>
   </div>
   <!-- Demographics End -->
</div>