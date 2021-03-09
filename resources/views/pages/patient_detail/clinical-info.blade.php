<div class="tab-pane fade" id="clinical-info1" role="tabpanel" aria-labelledby="clinical-info-tab1">
   <div class="app-card app-card-custom" data-name="clinical-info1">
      <div class="app-card-header">
         <h1 class="title">Clinical Info</h1>
         <img src="{{ asset('assets/img/icons/edit-field.svg') }}" data-toggle="tooltip" data-placement="bottom" title="Edit" class="cursor-pointer edit-icon" alt="" onclick="editAllField('demographic')">
         <img src="{{ asset('assets/img/icons/update-icon.svg') }}" style="display:none" data-toggle="tooltip" data-placement="bottom" title="Update" class="cursor-pointer update-icon" alt="" onclick="updateAllField('demographic')">
      </div>
      <div class="head scrollbar scrollbar12">
         <div class="p-3">
            <div class="form-group">
               <div class="row">
                  <div class="col-12 col-sm-3 col-md-3">
                     <div class="input_box">
                        <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                        <div class="rs">
                           <h3 class="_title">Nursing Visits Due</h3>
                           <input type="text" class="form-control-plaintext _detail "
                              readonly name="nursing_visits_due" onclick="editableField('nursing_visits_due')"
                              data-id="nursing_visits_due" id="nursing_visits_due" onblur="validateEmail(this);"
                              placeholder="Nursing Visits Due" value="{{ ($patient->patientClinicalDetail) ? $patient->patientClinicalDetail->nursing_visits_due : '' }}">
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-sm-3 col-md-3">
                     <div class="input_box">
                        <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                        <div class="rs">
                           <h3 class="_title">MD Order Required</h3>
                           <input type="text" class="form-control-plaintext _detail "
                              readonly name="md_order_required" onclick="editableField('md_order_required')"
                              data-id="md_order_required" id="md_order_required" onblur="validateEmail(this);"
                              placeholder="MD Order Required" value="{{ ($patient->patientClinicalDetail) ? $patient->patientClinicalDetail->md_order_required : '' }}">
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-sm-3 col-md-3">
                     <div class="input_box">
                        <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                        <div class="rs">
                           <h3 class="_title">MD Order Due</h3>
                           <input type="text" class="form-control-plaintext _detail "
                              readonly name="md_order_due" onclick="editableField('md_order_due')"
                              data-id="md_order_due" id="md_order_due" onblur="validateEmail(this);"
                              placeholder="MD Order Due" value="{{ ($patient->patientClinicalDetail) ? $patient->patientClinicalDetail->md_order_due : '' }}">
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-sm-3 col-md-3">
                     <div class="input_box">
                        <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                        <div class="rs">
                           <h3 class="_title">MD Visit Due</h3>
                           <input type="text" class="form-control-plaintext _detail "
                              readonly name="md_visit_due" onclick="editableField('md_visit_due')"
                              data-id="md_visit_due" id="md_visit_due" onblur="validateEmail(this);"
                              placeholder="MD Visit Due" value="{{ ($patient->patientClinicalDetail) ? $patient->patientClinicalDetail->md_visit_due : '' }}">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @if($patient->patientClinicalDetail)
               @foreach($patient->patientClinicalDetail->patientAllergy as $patientAllergy)
                  <div class="app-card app-card-custom no-minHeight mb-3 box-shadow-none"
                  data-name="emergency_contact_detail">
                     <div class="app-card-header">
                        <h1 class="title">Patient Allergies</h1>
                     </div>
                     <div>
                        <div class="p-3">
                           <div class="">
                              <div class="row">
                                 <div class="col-12 col-sm-3 col-md-3">
                                    <div class="input_box">
                                       <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                       <div class="rs">
                                          <h3 class="_title">Allergy</h3>
                                          <input type="text" class="form-control-plaintext _detail "
                                          readonly name="allergy" onclick="editableField('allergy')"
                                          data-id="allergy" id="allergy" placeholder="Allergy" value="{{ $patientAllergy->allergy }}">
                                    </div>
                                    </div>
                                 </div>
                                 <div class="col-12 col-sm-6 col-md-6">
                                    <div class="input_box">
                                       <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                       <div class="rs">
                                       <h3 class="_title">Comment</h3>
                                    <textarea name="comment" id="comment" cols="30" rows="8" class="form-control">{!! $patientAllergy->comment !!}</textarea>
                                    </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
               </div>
               @endforeach
            @endif
            <div class="collapse mt-4" id="collapseExample">
               <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%"
                  height="200" frameborder="0" scrolling="no" marginheight="0"
                  marginwidth="0"
                  src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
            </div>
         </div>
      </div>
   </div>
</div>