<div class="tab-pane fade" id="homecare" role="tabpanel" aria-labelledby="homecare-tab">
   <div class="app-card app-card-custom" data-name="home_care">
      <div class="app-card-header">
         <h1 class="title mr-2">Care team</h1>
         @role('clinician')
            <img src="{{ asset('assets/img/icons/edit-field.svg') }}" data-toggle="tooltip" data-placement="bottom" title="Edit" class="cursor-pointer edit-icon" alt="" onclick="editAllField('homecare')">
            <img src="{{ asset('assets/img/icons/update-icon.svg') }}" style="display:none" data-toggle="tooltip" data-placement="bottom" title="Update" class="cursor-pointer update-icon" alt="" onclick="updateAllField('homecare')">
         @endrole
      </div>
      <div class="head">
         <div class="p-3">
            <form id="homecare_form">
               <input type="hidden" name="company_id" value="{{ ($patient->demographic &&  $patient->demographic->company) ? $patient->demographic->company->id : '' }}">
               <div class="form-group">
                  <div class="row">
                     @if(!empty($patient->demographic) && (!empty($patient->demographic->company)))
                        <div class="col-12 col-sm-4">
                           <div class="input_box">
                              <div class="ls"><i class="las la-user-tie circle"></i></div>
                              <div class="rs">
                                 <h3 class="_title">Name</h3>
                                 <input type="text" class="form-control-plaintext _detail" readonly name="name" data-id="name" placeholder="Name" value="{{ ($patient->demographic->company->name) ?$patient->demographic->company->name : '' }}">
                              </div>
                           </div>
                        </div>
                        <div class="col-12 col-sm-4">
                           <div class="input_box">
                              <div class="ls"><i class="las la-envelope circle"></i></div>
                              <div class="rs">
                                 <h3 class="_title">Email</h3>
                                 <input type="text" class="form-control-plaintext _detail email_format" readonly name="email" data-id="email" placeholder="Email" value="{{ ($patient->demographic->company->email) ? $patient->demographic->company->email : '' }}">
                              </div>
                           </div>
                        </div>
                        <div class="col-12 col-sm-4">
                           <div class="input_box">
                              <div class="ls"><i class="las la-phone circle"></i></div>
                              <div class="rs">
                                 <h3 class="_title">Phone</h3>
                                 <input type="tel" class="form-control-plaintext _detail" readonly name="phone" id="company_phone" data-id="phone" placeholder="Phone" value="{{ ($patient->demographic->company->phone) ? $patient->demographic->company->phone : '' }}" maxlength="14">
                              </div>
                           </div>
                        </div>
                     @endif
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     @if(!empty($patient->demographic) && (!empty($patient->demographic->company)))
                        <div class="col-12 col-sm-4">
                           <div class="input_box">
                              <div class="ls"><i class="las la-fax circle"></i></div>
                              <div class="rs">
                                 <h3 class="_title">Fax No</h3>
                                 <input type="text" class="form-control-plaintext _detail" readonly name="fax_no" data-id="fax_no" id="fax_no" placeholder="Fax No" value="{{ ($patient->demographic->company->fax_no) ? $patient->demographic->company->fax_no : '' }}">
                              </div>
                           </div>
                        </div>
                     @endif
                     <div class="col-12 col-sm-4">
                        <div class="input_box">
                           <div class="ls"><i class="lab la-servicestack circle"></i></div>
                           <div class="rs">
                              <h3 class="_title">Services</h3>
                              @if(isset($services)&&!empty($services))
                                 @foreach($services as $s_row)
                                    <div class="normal_service_div">
                                       <input type="text" class="form-control-plaintext _detail" readonly value="{{$s_row['name']}}">
                                    </div>
                                    <div class="editable_service_div">
                                       <div class="custom-control custom-checkbox">
                                          <input type="checkbox" class="custom-control-input"
                                             id="customCheck{{$s_row['id']}}" name="services[]" value="{{$s_row['id']}}"<?php if (in_array($s_row['id'], explode(",",isset($patient->demographic->company->services)?$patient->demographic->company->services:''))) { echo "checked";} ?>>
                                          <label class="custom-control-label t5"
                                             for="customCheck{{$s_row['id']}}">{{$s_row['name']}}</label>
                                       </div>
                                    </div>
                                 @endforeach
                              @endif
                           </div>
                        </div>
                     </div>
                     @if(!empty($patient->demographic) && (!empty($patient->demographic->company)))
                        <div class="col-12 col-sm-4">
                           <div class="input_box">
                              <div class="ls"><i class="las la-code circle"></i></div>
                              <div class="rs">
                                 <h3 class="_title">Zip</h3>
                                 <input type="text" class="form-control-plaintext _detail zip" readonly name="zip" data-id="zip" id="zip" placeholder="Zip" value="{{ ($patient->demographic->company->zip) ? $patient->demographic->company->zip : '' }}">
                              </div>
                           </div>
                        </div>
                     @endif
                  </div>
               </div>
               @if(!empty($patient->demographic) && (!empty($patient->demographic->company)))
                  <div class="form-group">
                     <div class="row">
                        <div class="col-12 col-sm-12">
                           <div class="input_box mb-3">
                              <div class="ls"><i class="las la-map-marker circle"></i></div>
                              <div class="rs">
                                 <h3 class="_title">Address1</h3>
                                 <textarea id="address1" data-id="address1" name="address1" rows="4" cols="62" class="form-control-plaintext _detail" readonly placeholder="Address1">{!! ($patient->demographic->company->address1) ? $patient->demographic->company->address1 : '' !!}</textarea>
                              </div>
                           </div>
                        </div>
                        <div class="col-12 col-sm-12">
                           <div class="input_box mb-3">
                              <div class="ls"><i class="las la-map-marker circle"></i></div>
                              <div class="rs">
                                 <h3 class="_title">Address2</h3>
                                 <textarea id="address2" data-id="address2" name="address2" rows="4" cols="62" class="form-control-plaintext _detail" readonly placeholder="Address2">{!! ($patient->demographic->company->address2) ? $patient->demographic->company->address2 : '' !!}</textarea>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               @endif

               <!-- Caregiver Start -->
               <div class="app-card app-card-custom no-minHeight box-shadow-none">
                  <div class="app-card-header">
                     <h1 class="title mr-2">Caregiver Details</h1>
                     <a href="javascript:void(0)" class="bulk-upload-btn autoImportPatient" data-url="{{ url('import-caregiver-from-hha') }}" data-action="check-caregiver" data-id="{{$patient->id}}" style="margin-left: 10px;"><img src="{{ asset('assets/img/icons/bulk-upload-icon.svg') }}" class="icon mr-2" />Check Current Caregiver</a>
                  </div>
                  <div class="card-body text-info">
                     <table class="table m-0 ">
                        <thead class="thead-light">
                           <tr>
                              <th>Phone</th>
                              <th>Schedule Start</th>
                              <th>Schedule End</th>
                              <th>Coordinator Name</th>
                           </tr>
                        </thead>
                        <tbody class="caregiver-list-order">
                             
                        </tbody>
                     </table>
                  </div>
               </div>
               <!-- Caregiver end -->

               <!-- Family Start -->
               <div class="app-card app-card-custom no-minHeight box-shadow-none">
                  <div class="app-card-header">
                     <h1 class="title mr-2">Family Details</h1>
                     <a class="_add_family_company" href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Add New Family Detail"><i class="las la-plus-circle la-2x"></i></a>
                  </div>
                  <div class="card-body text-info">
                     <table class="table m-0 family-list-order">
                        <thead class="thead-light">
                           <tr>
                              <th>Name</th>
                              <th>Relation</th>
                              <th>Phone</th>
                              <th>HCP</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @if(isset($careTeams['family_detail']))
                              @foreach($careTeams['family_detail'] as $family)
                                 <tr>
                                    <form class="family_form">
                                       <input type="hidden" name="family_id" value="{{ $family->id }}">
                                       
                                       <input type="hidden" name="user_id" value="{{ $patient->id }}">
                                       <td>
                                          <span class='label'>{{ $family->name }}</span>
                                          <div class='phone-text'>
                                             <input type="text" class="form-control form-control-lg" name="family_detail['name']" aria-describedby="nameHelp" placeholder="Enter Family Company Name" value="{{ $family->name }}">
                                             <span class="name-invalid-feedback text-danger" role="alert"></span>
                                          </div>
                                       </td>
                                       <td>
                                          <span class='label'>{{ $family->relation }}</span>
                                          <div class='phone-text'>
                                             <input type="text" class="form-control form-control-lg" id="relation" name="family_detail['relation']" aria-describedby="relationHelp" placeholder="Enter relation" value="{{ $family->relation }}">
                                          </div>
                                          <span class="relation-invalid-feedback text-danger" role="alert"></span>
                                       </td>
                                       <td>
                                          <span class='label'>{{ $family->phone }}</span>
                                          <div class='phone-text'>
                                             <input type="text" class="form-control form-control-lg phone_format" name="family_detail['phone']" aria-describedby="phoneHelp" placeholder="Enter Phone Number" value="{{ $family->phone }}" maxlength="14">
                                          </div>
                                          <span class="phone-invalid-feedback text-danger" role="alert"></span>
                                       </td>
                                       <td>
                                          <span class='label'>{{ $family->hcp }}</span>
                                          $careTeams['family_detail']         <label>
                                                      <input type="checkbox" name="family_detail['hcp']">
                                                      <span
                                                         style="font-size:12px; padding-left: 25px;">HCP</span>
                                                </label>
                                             </div>
                                          <span class="hcp-invalid-feedback text-danger" role="alert"></span>
                                       </td>
                                       <td>
                                          <div class="normal">
                                             <a class="edit_btn btn btn-sm" title="Edit" style="background: #006c76; color: #fff">Edit</a>
                                          </div>
                                          <div class="while_edit">
                                             <a class="save_record btn btn-sm" data-action="edit" title="Save" style="background: #626a6b; color: #fff">Save</a><a class="cancel_edit btn btn-sm" title="Cancel" style="background: #bbc2c3; color: #fff">Close</a>
                                          </div>
                                       </td>
                                    </form>
                                 </tr>
                              @endforeach
                           @else
                              <tr><td>Data not found.</td></td>
                           @endif
                        </tbody>
                     </table>
                  </div>
               </div>
               <div class="app-card app-card-custom no-minHeight box-shadow-none mt-3 form_div">
                  <form>
                     <input type="hidden" name="user_id" value="{{ $patient->id }}">
                     <input type="hidden" name="section" value="family">
                     <span class="name-invalid-feedback text-danger" role="alert"></span>
                     <div class="head">
                        <div class="p-3">
                           <div class="row">
                              <div class="col-12 col-sm-4">
                                 <div class="input_box">
                                    <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                                    <div class="rs">
                                       <h3 class="_title">Name</h3>
                                       <div class="_detail">
                                          <input type="text" class="form-control form-control-lg" name="name" 
                                          aria-describedby="nameHelp" placeholder="Enter Name">
                                          <span class="name-invalid-feedback text-danger" role="alert"></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-sm-4">
                                 <div class="input_box">
                                    <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                                    <div class="rs">
                                       <h3 class="_title">Relation</h3>
                                       <div class="_detail">
                                          <input type="text" class="form-control form-control-lg" id="relation" name="relation" aria-describedby="relationHelp" placeholder="Enter relation">
                                          <span class="relation-invalid-feedback text-danger" role="alert"></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-sm-4">
                                 <div class="input_box">
                                    <div class="ls"><i class="las la-phone circle"></i></div>
                                    <div class="rs">
                                       <h3 class="_title">Phone</h3>
                                       <div class="_detail">
                                          <input type="text" class="form-control form-control-lg phone_format" name="phone" id="family_detail_phone" aria-describedby="phoneHelp" placeholder="Enter Phone Number" maxlength="14">
                                          <span class="phone-invalid-feedback text-danger" role="alert"></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="p-3">
                           <div class="row">
                              <div class="col-12 col-sm-4">
                                 <div class="input_box">
                                    <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                                    <div class="rs">
                                       <h3 class="_title">HCP</h3>
                                       <div class="_detail">
                                          <label>
                                                <input type="checkbox" name="hcp">
                                                <span style="font-size:12px; padding-left: 25px;"></span>
                                          </label>
                                          <span class="policy_no-invalid-feedback text-danger" role="alert"></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class=" d-flex justify-content-end">
                              <button type="submit" class="btn btn-outline-green save_record" data-url="{{ Route('care-team.store') }}" data-redirecturl="{{ Route('clinician.new-patient-list') }}" data-action="add"><i class="fa fa-save"></i> Save</button>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
               <!-- Family End -->
               
               <!-- Case Manager Start -->
               <div class="app-card app-card-custom no-minHeight box-shadow-none mt-3" data-name="croley_family_and_financial">
                  <div class="app-card-header">
                     <h1 class="title mr-2">Case Manager Details</h1>
                  </div>
                  <div class="card-body text-info">
                     <table class="table m-0">
                        <thead class="thead-light">
                           <tr>
                              <th>Name</th>
                              <th>Phone</th>
                              <th>FAX</th>
                              <th>Address</th>
                              <th>NPI</th>
                              <th>Primary</th>
                           </tr>
                        </thead>
                        <tbody>
                           @if(isset($caseManagements))
                              @foreach($caseManagements as $caseManager)
                                 <tr>
                                    <td>
                                       {{ $caseManager->clinician->full_name }}
                                    </td>
                                    <td>
                                       {{ $caseManager->clinician->phone }}
                                    </td>
                                    <td>
                                       
                                    </td>
                                    <td>
                                       
                                    </td>
                                    <td>
                                       
                                    </td>
                                    <td>
                                       
                                    </td>
                                 </tr>
                              @endforeach
                           @else
                              <tr><td>Data not found.</td></td>
                           @endif
                        </tbody>
                     </table>
                  </div>
               </div>
               <!-- Case Manager End -->

               <!-- Physician Start -->
               <div class="app-card app-card-custom no-minHeight box-shadow-none mt-3" data-name="croley_family_and_financial">
                  <div class="app-card-header">
                     <h1 class="title mr-2">Physician Details</h1>
                  </div>
                  <div class="card-body text-info">
                     <table class="table m-0">
                        <thead class="thead-light">
                           <tr>
                              <th>Name</th>
                              <th>Phone</th>
                              <th>FAX</th>
                              <th>Address</th>
                              <th>NPI</th>
                              <th>Primary</th>
                           </tr>
                        </thead>
                        <tbody>
                           @if(isset($careTeams['physician_detail']))
                              @foreach($careTeams['physician_detail'] as $physician)
                                 <tr>
                                    <form class="family_form">
                                       <input type="hidden" name="family_id" value="{{ $physician->id }}">
                                       
                                       <input type="hidden" name="user_id" value="{{ $patient->id }}">
                                       <td>
                                          <span class='label'>{{ $physician->name }}</span>
                                          <div class='phone-text'>
                                             <input type="text" class="form-control form-control-lg" name="name" aria-describedby="nameHelp" placeholder="Enter physician Name" value="{{ $physician->name }}">
                                             <span class="name-invalid-feedback text-danger" role="alert"></span>
                                          </div>
                                       </td>
                                       <td>
                                          <span class='label'>{{ $physician->phone }}</span>
                                          <div class='phone-text'>
                                             <input type="text" class="form-control form-control-lg phone_format" name="phone" aria-describedby="phoneHelp" placeholder="Enter Phone Number" value="{{ $physician->phone }}" maxlength="14">
                                          </div>
                                          <span class="phone-invalid-feedback text-danger" role="alert"></span>
                                       </td>
                                       <td>
                                          <span class='label'>{{ $physician->fax }}</span>
                                          <div class='fax-text'>
                                             <input type="text" class="form-control form-control-lg" name="fax" aria-describedby="faxHelp" placeholder="Enter fax" value="{{ $physician->fax }}">
                                          </div>
                                          <span class="phone-invalid-feedback text-danger" role="alert"></span>
                                       </td>
                                       <td>
                                          <span class='label'>{{ $physician->address }}</span>
                                          <div class='phone-text'>
                                             <input type="text" class="form-control form-control-lg" id="address" name="address" aria-describedby="addressHelp" placeholder="Enter address" value="{{ $physician->address }}">
                                          </div>
                                          <span class="address-invalid-feedback text-danger" role="alert"></span>
                                       </td>
                                       <td>
                                          <span class='label'>{{ $physician->npi }}</span>
                                          <div class='phone-text'>
                                             <input type="text" class="form-control form-control-lg" id="npi" name="npi" aria-describedby="npiHelp" placeholder="Enter npi" value="{{ $physician->npi }}">
                                          </div>
                                          <span class="npi-invalid-feedback text-danger" role="alert"></span>
                                       </td>
                                       <td>
                                          <span class='label'>{{ $physician->primary }}</span>
                                          <div class='phone-text'>
                                             <input type="text" class="form-control form-control-lg" id="primary" name="primary" aria-describedby="primaryHelp" placeholder="Enter primary" value="{{ $physician->primary }}">
                                          </div>
                                          <span class="primary-invalid-feedback text-danger" role="alert"></span>
                                       </td>
                                       <td>
                                          <div class="normal">
                                             <a class="edit_btn btn btn-sm" title="Edit" style="background: #006c76; color: #fff">Edit</a>
                                          </div>
                                          <div class="while_edit">
                                             <a class="save_record btn btn-sm" data-action="edit" title="Save" style="background: #626a6b; color: #fff">Save</a><a class="cancel_edit btn btn-sm" title="Cancel" style="background: #bbc2c3; color: #fff">Close</a>
                                          </div>
                                       </td>
                                    </form>
                                 </tr>
                              @endforeach
                           @endif
                        </tbody>
                     </table>
                  </div>
               </div>
               <div class="app-card app-card-custom no-minHeight box-shadow-none mt-3 form_div">
                  <form class="family_form">
                     <input type="hidden" name="user_id" value="{{ $patient->id }}">
                     <input type="hidden" name="section" value="physician">
                     <span class="name-invalid-feedback text-danger" role="alert"></span>
                     <div class="head">
                        <div class="p-3">
                           <div class="row">
                              <div class="col-12 col-sm-4">
                                 <div class="input_box">
                                    <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                                    <div class="rs">
                                       <h3 class="_title">Name</h3>
                                       <div class="_detail">
                                          <input type="text" class="form-control form-control-lg" name="name" 
                                          aria-describedby="nameHelp" placeholder="Enter Name">
                                          <span class="name-invalid-feedback text-danger" role="alert"></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-sm-4">
                                 <div class="input_box">
                                    <div class="ls"><i class="las la-phone circle"></i></div>
                                    <div class="rs">
                                       <h3 class="_title">Phone</h3>
                                       <div class="_detail">
                                          <input type="text" class="form-control form-control-lg phone_format" name="phone" id="family_detail_phone" aria-describedby="phoneHelp" placeholder="Enter Phone Number" maxlength="14">
                                          <span class="phone-invalid-feedback text-danger" role="alert"></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-sm-4">
                                 <div class="input_box">
                                    <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                                    <div class="rs">
                                       <h3 class="_title">Fax</h3>
                                       <div class="_detail">
                                          <input type="text" class="form-control form-control-lg" id="fax" name="fax" aria-describedby="faxHelp" placeholder="Enter fax">
                                          <span class="fax-invalid-feedback text-danger" role="alert"></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-sm-4">
                                 <div class="input_box">
                                    <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                                    <div class="rs">
                                       <h3 class="_title">Address</h3>
                                       <div class="_detail">
                                          <textarea id="address" data-id="address" name="address" rows="4" cols="62" class="form-control-plaintext _detail" readonly placeholder="address"></textarea>
                                          <span class="fax-invalid-feedback text-danger" role="alert"></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-sm-4">
                                 <div class="input_box">
                                    <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                                    <div class="rs">
                                       <h3 class="_title">NPI</h3>
                                       <div class="_detail">
                                          <input type="text" class="form-control form-control-lg" id="npi" name="npi" aria-describedby="npiHelp" placeholder="Enter npi">
                                          <span class="npi-invalid-feedback text-danger" role="alert"></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="p-3">
                           <div class="row">
                              <div class="col-12 col-sm-4">
                                 <div class="input_box">
                                    <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                                    <div class="rs">
                                       <h3 class="_title">Primary</h3>
                                       <div class="_detail">
                                          <label>
                                                <input type="checkbox" name="primary">
                                                <span style="font-size:12px; padding-left: 25px;"></span>
                                          </label>
                                          <span class="policy_no-invalid-feedback text-danger" role="alert"></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class=" d-flex justify-content-end">
                              <button type="submit" id="add" class="btn btn-outline-green" data-url="{{ Route('care-team.store') }}" data-redirecturl="{{ Route('clinician.new-patient-list') }}"><i class="fa fa-save"></i> Save</button>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
               <!-- Physician End -->

               <!-- Pharmacy Start -->
               <div class="app-card app-card-custom no-minHeight box-shadow-none mt-3" data-name="croley_family_and_financial">
                  <div class="app-card-header">
                     <h1 class="title mr-2">Pharmacy Details</h1>
                  </div>
                  <div class="card-body text-info">
                     <table class="table m-0">
                        <thead class="thead-light">
                           <tr>
                              <th>Name</th>
                              <th>Phone</th>
                              <th>Address</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @if(isset($careTeams['pharmacy_detail']))
                              @foreach($careTeams['pharmacy_detail'] as $physician)
                                 <tr>
                                    <form class="family_form">
                                       <input type="hidden" name="family_id" value="{{ $physician->id }}">
                                       
                                       <input type="hidden" name="user_id" value="{{ $patient->id }}">
                                       <td>
                                          <span class='label'>{{ $physician->name }}</span>
                                          <div class='phone-text'>
                                             <input type="text" class="form-control form-control-lg" name="name" aria-describedby="nameHelp" placeholder="Enter physician Name" value="{{ $physician->name }}">
                                             <span class="name-invalid-feedback text-danger" role="alert"></span>
                                          </div>
                                       </td>
                                       <td>
                                          <span class='label'>{{ $physician->phone }}</span>
                                          <div class='phone-text'>
                                             <input type="text" class="form-control form-control-lg phone_format" name="phone" aria-describedby="phoneHelp" placeholder="Enter Phone Number" value="{{ $physician->phone }}" maxlength="14">
                                          </div>
                                          <span class="phone-invalid-feedback text-danger" role="alert"></span>
                                       </td>
                                       <td>
                                          <span class='label'>{{ $physician->address }}</span>
                                          <div class='phone-text'>
                                             <input type="text" class="form-control form-control-lg" id="relation" name="address" aria-describedby="relationHelp" placeholder="Enter relation" value="{{ $physician->address }}">
                                          </div>
                                          <span class="relation-invalid-feedback text-danger" role="alert"></span>
                                       </td>
                                       <td>
                                          <span class='label'>{{ $physician->status }}</span>
                                          <div class='phone-text'>
                                             <input type="text" class="form-control form-control-lg" id="status" name="status" aria-describedby="statusHelp" placeholder="Enter status" value="{{ $physician->status }}">
                                          </div>
                                          <span class="status-invalid-feedback text-danger" role="alert"></span>
                                       </td>
                                       <td>
                                          <div class="normal">
                                             <a class="edit_btn btn btn-sm" title="Edit" style="background: #006c76; color: #fff">Edit</a>
                                          </div>
                                          <div class="while_edit">
                                             <a class="save_record btn btn-sm" data-action="edit" title="Save" style="background: #626a6b; color: #fff">Save</a><a class="cancel_edit btn btn-sm" title="Cancel" style="background: #bbc2c3; color: #fff">Close</a>
                                          </div>
                                       </td>
                                    </form>
                                 </tr>
                              @endforeach
                           @endif
                        </tbody>
                     </table>
                  </div>
               </div>
               <div class="app-card app-card-custom no-minHeight box-shadow-none mt-3 form_div">
                  <form class="family_form">
                     <input type="hidden" name="user_id" value="{{ $patient->id }}">
                     <input type="hidden" name="section" value="pharmacy">
                     <span class="name-invalid-feedback text-danger" role="alert"></span>
                     <div class="head">
                        <div class="p-3">
                           <div class="row">
                              <div class="col-12 col-sm-4">
                                 <div class="input_box">
                                    <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                                    <div class="rs">
                                       <h3 class="_title">Name</h3>
                                       <div class="_detail">
                                          <input type="text" class="form-control form-control-lg" name="name" 
                                          aria-describedby="nameHelp" placeholder="Enter Name">
                                          <span class="name-invalid-feedback text-danger" role="alert"></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-sm-4">
                                 <div class="input_box">
                                    <div class="ls"><i class="las la-phone circle"></i></div>
                                    <div class="rs">
                                       <h3 class="_title">Phone</h3>
                                       <div class="_detail">
                                          <input type="text" class="form-control form-control-lg phone_format" name="phone" id="family_detail_phone" aria-describedby="phoneHelp" placeholder="Enter Phone Number" maxlength="14">
                                          <span class="phone-invalid-feedback text-danger" role="alert"></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-sm-4">
                                 <div class="input_box">
                                    <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                                    <div class="rs">
                                       <h3 class="_title">Address</h3>
                                       <div class="_detail">
                                          <textarea id="address" data-id="address" name="address" rows="4" cols="62" class="form-control-plaintext _detail" readonly placeholder="address"></textarea>
                                          <span class="fax-invalid-feedback text-danger" role="alert"></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="p-3">
                           <div class="row">
                              <div class="col-12 col-sm-4">
                                 <div class="input_box">
                                    <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                                    <div class="rs">
                                       <h3 class="_title">Active</h3>
                                       <div class="_detail">
                                          <label>
                                                <input type="checkbox" name="active">
                                                <span style="font-size:12px; padding-left: 25px;"></span>
                                          </label>
                                          <span class="policy_no-invalid-feedback text-danger" role="alert"></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class=" d-flex justify-content-end">
                              <button type="submit" class="btn btn-outline-green save_record" data-url="{{ Route('care-team.store') }}" data-redirecturl="{{ Route('clinician.new-patient-list') }}" data-action="add"><i class="fa fa-save"></i> Save</button>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
               <!-- Pharmacy End -->

               <div class="app-card app-card-custom box-shadow-none no-minHeight mt-3"
                  data-name="administrator_detail">
                  <div class="app-card-header">
                     <h1 class="title">Administrator Detail</h1>
                  </div>
                  <div class="head">
                     <div class="p-3">
                        <div class="form-group">
                           <div class="row">
                              @if(!empty($patient->demographic) && (!empty($patient->demographic->company)))
                                 <div class="col-12 col-sm-4">
                                    <div class="input_box">
                                       <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                       <div class="rs">
                                          <h3 class="_title">Registration Name</h3>
                                          <input type="text" class="form-control-plaintext _detail" readonly name="administrator_name" data-id="administrator_name" id="administrator_name" placeholder="Registration Name" value="{{ ($patient->demographic->company->administrator_name) ? $patient->demographic->company->administrator_name : '' }}">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12 col-sm-4">
                                    <div class="input_box">
                                       <div class="ls"><i class="las la-sort-numeric-down circle"></i></div>
                                       <div class="rs">
                                          <h3 class="_title">Registration No</h3>
                                          <input type="text" class="form-control-plaintext _detail" readonly name="registration_no" data-id="registration_no" id="registration_no" placeholder="Registration No" value="{{ ($patient->demographic->company->registration_no) ? $patient->demographic->company->registration_no : '' }}">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12 col-sm-4">
                                    <div class="input_box">
                                       <div class="ls"><i class="las la-envelope circle"></i></div>
                                       <div class="rs">
                                          <h3 class="_title">Administrator Email</h3>
                                          <input type="text" class="form-control-plaintext _detail" readonly name="administrator_emailId" data-id="administrator_emailId" id="administrator_emailId" placeholder="Administrator Email" value="{{ ($patient->demographic->company->administrator_emailId) ? $patient->demographic->company->administrator_emailId : '' }}">
                                       </div>
                                    </div>
                                 </div>
                              @endif
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="row">
                              @if(!empty($patient->demographic) && (!empty($patient->demographic->company)))
                                 <div class="col-12 col-sm-4">
                                    <div class="input_box">
                                       <div class="ls"><i class="las la-sort-numeric-down circle"></i></div>
                                       <div class="rs">
                                          <h3 class="_title">Licence Number</h3>
                                          <input type="text" class="form-control-plaintext _detail" readonly name="licence_no" data-id="licence_no" id="licence_no" placeholder="Licence Number" value="{{ ($patient->demographic->company->licence_no) ? $patient->demographic->company->licence_no : '' }}">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12 col-sm-4">
                                    <div class="input_box">
                                       <div class="ls"><i class="llas la-phone circle"></i></div>
                                       <div class="rs">
                                          <h3 class="_title">Administrator Phone Number</h3>
                                          <input type="text" class="form-control-plaintext _detail" readonly name="administrator_phone_no" data-id="administrator_phone_no" id="administrator_phone_no" placeholder="Administrator Phone Number" value="{{ ($patient->demographic->company->administrator_phone_no) ? $patient->demographic->company->administrator_phone_no : '' }}" maxlength="14">
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
                     <h1 class="title">Mal Practitioner Insurance Detail</h1>
                  </div>
                  <div class="head">
                     <div class="p-3">
                        <div class="form-group">
                           <div class="row">
                              @if(!empty($patient->demographic) && (!empty($patient->demographic->company)))
                                 <div class="col-12 col-sm-4">
                                    <div class="input_box">
                                       <div class="ls"><i class="las la-sort-numeric-down circle"></i></div>
                                       <div class="rs">
                                          <h3 class="_title">Insurance ID</h3>
                                          <input type="text" class="form-control-plaintext _detail" readonly name="insurance_id" data-id="insurance_id" id="insurance_id" placeholder="Administrator Phone Number" value="{{ ($patient->demographic->company->insurance_id) ? $patient->demographic->company->insurance_id : '' }}">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12 col-sm-4">
                                    <div class="input_box">
                                       <div class="ls"><i class="las la-calendar circle"></i></div>
                                       <div class="rs">
                                          <h3 class="_title">Expiration Date</h3>
                                          <input type="text" class="form-control-plaintext _detail" readonly name="expiration_date" data-id="expiration_date" id="expiration_date" placeholder="Expiration Date" value="{{ ($patient->demographic->company->expiration_date) ? $patient->demographic->company->expiration_date : ''}}">
                                       </div>
                                    </div>
                                 </div>
                              @endif
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
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
//                location.reload();

            }
            ,
            error:function (error) {
               $("#loader-wrapper").hide();

                alert('Something is wrong. Please try again later.');
//                location.reload();

            }
           


        });
    }
</script>
