<div class="tab-pane fade" id="homecare" role="tabpanel" aria-labelledby="homecare-tab">
   <div class="app-card app-card-custom" data-name="home_care">
      <div class="app-card-header">
         <h1 class="title mr-2">Home Care</h1>
         <img src="{{ asset('assets/img/icons/edit-field.svg') }}" data-toggle="tooltip" data-placement="bottom" title="Edit" class="cursor-pointer edit-icon" alt="" onclick="editAllField('homecare')">
         <img src="{{ asset('assets/img/icons/update-icon.svg') }}" style="display:none" data-toggle="tooltip" data-placement="bottom" title="Update" class="cursor-pointer update-icon" alt="" onclick="updateAllField('homecare')">
      </div>
      <div class="head scrollbar scrollbar12">
         <div class="p-3">
            <div class="form-group">
               <div class="row">
                  @if(!empty($patient->caregiverInfo) && (!empty($patient->caregiverInfo->company)))
                     <div class="col-12 col-sm-4">
                        <div class="input_box">
                           <div class="ls"><i class="las la-user-nurse circle"></i></div>
                           <div class="rs">
                              <h3 class="_title">Name</h3>
                              <input type="text" class="form-control-plaintext _detail "
                                 readonly name="name" data-id="name"
                                 onclick="editableField('name')" id="name"
                                 placeholder="Name" value="{{ ($patient->caregiverInfo->company->name) ?$patient->caregiverInfo->company->name : '' }}">
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-sm-4">
                        <div class="input_box">
                           <div class="ls"><i class="las la-user-nurse circle"></i></div>
                           <div class="rs">
                              <h3 class="_title">Email</h3>
                              <input type="text" class="form-control-plaintext _detail "
                                 readonly name="email" data-id="email"
                                 onclick="editableField('email')" id="email"
                                 placeholder="Email" value="{{ ($patient->caregiverInfo->company->email) ? $patient->caregiverInfo->company->email : '' }}">
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-sm-4">
                        <div class="input_box">
                           <div class="ls"><i class="las la-user-nurse circle"></i></div>
                           <div class="rs">
                              <h3 class="_title">Phone</h3>
                              <input type="tel" class="form-control-plaintext _detail " readonly
                                 name="hc_phone" data-id="hc_phone"
                                 onclick="editableField('hc_phone')" id="hc_phone"
                                 onkeyup="this.value=this.value.replace(/[^\d]/,'')"
                                 placeholder="" value="{{ ($patient->caregiverInfo->company->phone) ? $patient->caregiverInfo->company->phone : '' }}">
                           </div>
                        </div>
                     </div>
                  @endif
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  @if(!empty($patient->caregiverInfo) && (!empty($patient->caregiverInfo->company)))
                     <div class="col-12 col-sm-4">
                        <div class="input_box">
                           <div class="ls"><i class="las la-user-nurse circle"></i></div>
                           <div class="rs">
                              <h3 class="_title">Fax No</h3>
                              <input type="text" class="form-control-plaintext _detail "
                                 readonly name="fax_no" data-id="fax_no"
                                 onclick="editableField('fax_no')" id="fax_no"
                                 placeholder="Fax No" value="{{ ($patient->caregiverInfo->company->fax_no) ? $patient->caregiverInfo->company->fax_no : '' }}">
                           </div>
                        </div>
                     </div>
                  @endif
                  @if(!empty($patient->caregiverInfo->company->services))
                     @foreach(explode(",",$patient->caregiverInfo->company->services) as $value)
                        @php 
                              $name = '';
                              if($value == '1'):
                                 $name = 'VBC';
                              endif;
                              if($value == '2'):
                                 $name = 'MD Order';
                              endif;
                              if($value == '3'):
                                 $name = 'Occupational Health';
                              endif;
                        @endphp
                        <div class="col-12 col-sm-4">
                           <div class="input_box">
                              <div class="ls"><i class="las la-user-nurse circle"></i></div>
                              <div class="rs">
                                 <h3 class="_title">Services</h3>
                                 <input type="text" class="form-control-plaintext _detail "
                                    readonly name="services" data-id="services"
                                    onclick="editableField('services')" id="services"
                                    placeholder="Services" value="{{ $name }}">
                              </div>
                           </div>
                        </div>
                     @endforeach
                  @endif
                  @if(!empty($patient->caregiverInfo) && (!empty($patient->caregiverInfo->company)))
                     <div class="col-12 col-sm-4">
                        <div class="input_box">
                           <div class="ls"><i class="las la-user-nurse circle"></i></div>
                           <div class="rs">
                              <h3 class="_title">Zip</h3>
                              <input type="text" class="form-control-plaintext _detail "
                                 readonly name="zip" data-id="zip"
                                 onclick="editableField('zip')" id="zip"
                                 placeholder="Zip" value="{{ ($patient->caregiverInfo->company->zip) ? $patient->caregiverInfo->company->zip : '' }}">
                           </div>
                        </div>
                     </div>
                  @endif
               </div>
            </div>
            @if(!empty($patient->caregiverInfo) && (!empty($patient->caregiverInfo->company)))
               <div class="form-group">
                  <div class="row">
                     <div class="col-12 col-sm-12">
                        <div class="input_box mb-3">
                           <div class="ls"><i class="las la-map-marker circle"></i></div>
                           <div class="rs">
                              <h3 class="_title">Address1</h3>
                              <textarea id="address1" name="address1" rows="4" cols="62"
                                 class="form-control-plaintext _detail " readonly
                                 onclick="editableField('address1')"
                                 placeholder=""
                                 value="">{!! ($patient->caregiverInfo->company->address1) ? $patient->caregiverInfo->company->address1 : '' !!}</textarea>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-sm-12">
                        <div class="input_box mb-3">
                           <div class="ls"><i class="las la-map-marker circle"></i></div>
                           <div class="rs">
                              <h3 class="_title">Address2</h3>
                              <textarea id="address2" name="address2" rows="4" cols="62"
                                 class="form-control-plaintext _detail " readonly
                                 onclick="editableField('address2')"
                                 placeholder=""
                                 value="">{!! ($patient->caregiverInfo->company->address2) ? $patient->caregiverInfo->company->address2 : '' !!}</textarea>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            @endif
            <div class="app-card app-card-custom box-shadow-none no-minHeight mt-3"
               data-name="administrator_detail">
               <div class="app-card-header">
                  <h1 class="title">Administrator Detail</h1>
               </div>
               <div class="head">
                  <div class="p-3">
                     <div class="form-group">
                        <div class="row">
                           @if(!empty($patient->caregiverInfo) && (!empty($patient->caregiverInfo->company)))
                              <div class="col-12 col-sm-4">
                                 <div class="input_box">
                                    <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                    <div class="rs">
                                       <h3 class="_title">Registration Name</h3>
                                       <input type="text" class="form-control-plaintext _detail "
                                          readonly name="administrator_name" data-id="administrator_name"
                                          onclick="editableField('administrator_name')" id="administrator_name"
                                          placeholder="Registration Name" value="{{ ($patient->caregiverInfo->company->administrator_name) ? $patient->caregiverInfo->company->administrator_name : '' }}">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-sm-4">
                                 <div class="input_box">
                                    <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                    <div class="rs">
                                       <h3 class="_title">Registration No</h3>
                                       <input type="text" class="form-control-plaintext _detail "
                                          readonly name="registration_no" data-id="registration_no"
                                          onclick="editableField('registration_no')" id="registration_no"
                                          placeholder="Registration No" value="{{ ($patient->caregiverInfo->company->registration_no) ? $patient->caregiverInfo->company->registration_no : '' }}">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-sm-4">
                                 <div class="input_box">
                                    <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                    <div class="rs">
                                       <h3 class="_title">Administrator Email</h3>
                                       <input type="text" class="form-control-plaintext _detail "
                                          readonly name="administrator_emailId" data-id="administrator_emailId"
                                          onclick="editableField('administrator_emailId')" id="administrator_emailId"
                                          placeholder="Administrator Email" value="{{ ($patient->caregiverInfo->company->administrator_emailId) ? $patient->caregiverInfo->company->administrator_emailId : '' }}">
                                    </div>
                                 </div>
                              </div>
                           @endif
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="row">
                           @if(!empty($patient->caregiverInfo) && (!empty($patient->caregiverInfo->company)))
                              <div class="col-12 col-sm-4">
                                 <div class="input_box">
                                    <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                    <div class="rs">
                                       <h3 class="_title">Licence Number</h3>
                                       <input type="text" class="form-control-plaintext _detail "
                                          readonly name="licence_no" data-id="licence_no"
                                          onclick="editableField('licence_no')" id="licence_no"
                                          placeholder="Licence Number" value="{{ ($patient->caregiverInfo->company->licence_no) ? $patient->caregiverInfo->company->licence_no : '' }}">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-sm-4">
                                 <div class="input_box">
                                    <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                    <div class="rs">
                                       <h3 class="_title">Administrator Phone Number</h3>
                                       <input type="text" class="form-control-plaintext _detail "
                                          readonly name="administrator_phone_no" data-id="administrator_phone_no"
                                          onclick="editableField('administrator_phone_no')" id="administrator_phone_no"
                                          placeholder="Administrator Phone Number" value="{{ ($patient->caregiverInfo->company->administrator_phone_no) ? $patient->caregiverInfo->company->administrator_phone_no : '' }}">
                                    </div>
                                 </div>
                              </div>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
            </div>       
            <div class="app-card app-card-custom box-shadow-none no-minHeight mt-3"
               data-name="administrator_detail">
               <div class="app-card-header">
                  <h1 class="title">Mal Practitiner Insurance Detail</h1>
               </div>
               <div class="head">
                  <div class="p-3">
                     <div class="form-group">
                        <div class="row">
                           @if(!empty($patient->caregiverInfo) && (!empty($patient->caregiverInfo->company)))
                              <div class="col-12 col-sm-4">
                                 <div class="input_box">
                                    <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                    <div class="rs">
                                       <h3 class="_title">Insurance ID</h3>
                                       <input type="text" class="form-control-plaintext _detail "
                                          readonly name="insurance_id" data-id="insurance_id"
                                          onclick="editableField('insurance_id')" id="insurance_id"
                                          placeholder="Administrator Phone Number" value="{{ ($patient->caregiverInfo->company->insurance_id) ? $patient->caregiverInfo->company->insurance_id : '' }}">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-sm-4">
                                 <div class="input_box">
                                    <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                    <div class="rs">
                                       <h3 class="_title">Expiration Date</h3>
                                       <input type="text" class="form-control-plaintext _detail "
                                          readonly name="expiration_date" data-id="expiration_date"
                                          onclick="editableField('expiration_date')" id="expiration_date"
                                          placeholder="Expiration Date" value="{{ ($patient->caregiverInfo->company->expiration_date) ? $patient->caregiverInfo->company->expiration_date : ''}}">
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
</div>
<script type="text/javascript">
    function updateCaregiver(patientId) {
         $("#loader-wrapper").show();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:"/clinician/caregiver-update/"+patientId,
            method:'POST',
            dataType:'json',
            data:{patient_id:patientId},
            success:function (response) {
               $("#loader-wrapper").hide();
                alert('Caregiver updated successfully.');
                location.reload();
            }
            ,
            error:function (error) {
               $("#loader-wrapper").hide();
                alert('Something is wrong. Please try again later.');
                location.reload();
            }


        });
    }
</script>