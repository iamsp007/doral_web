<div class="tab-pane fade" id="insurance" role="tabpanel" aria-labelledby="insurance-tab">
   <div class="app-card app-card-custom" data-name="insurance">
      <div class="app-card-header"> <h1 class="title">Insurance</h1>
         <img src="{{ asset('assets/img/icons/edit-field.svg') }}" data-toggle="tooltip" data-placement="bottom" title="Edit" class="cursor-pointer edit-icon" alt="" onclick="editAllField('insurance')">
         <img src="{{ asset('assets/img/icons/update-icon.svg') }}" style="display:none" data-toggle="tooltip" data-placement="bottom" title="Update" class="cursor-pointer update-icon" alt="" onclick="updateAllField('insurance')">
      </div>
      <div class="head scrollbar scrollbar12">
         <div class="p-3">
            <form id="medicare_form">
               <input type="hidden" name="user_id" value="{{ $patient->id }}">
               <div class="app-card app-card-custom no-minHeight box-shadow-none mb-3" data-name="medicaid">
                  <div class="app-card-header">
                     <h1 class="title mr-2">Medicaid</h1>
                     <button type="button" class="btn btn-sm btn-info">Verify Recertification Date</button>
                  </div>
                  <div class="head">
                     <div class="p-3">
                        <div class="row">
                           <div class="col-12 col-sm-3">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Medicaid No</h3>
                                    <input type="text" class="form-control-plaintext _detail" readonly name="medicaid_number" data-id="medicaid_number" id="medicaid_number" placeholder="Medicaid Number" value="{{ isset($patient->demographic) && isset($patient->demographic->medicaid_number) ? $patient->demographic->medicaid_number : '' }}" maxlength="8">
                                    <span class="medicaid_number-invalid-feedback text-danger" role="alert" maxlength="8"></span>
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
               <div class="app-card app-card-custom no-minHeight box-shadow-none mb-3" data-name="medicare">
                  <div class="app-card-header">
                     <h1 class="title mr-2">Medicare</h1>
                     <button type="button" class="btn btn-sm btn-info">Verify Recertification Date</button>
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
                                    <input type="text" class="form-control-plaintext _detail" readonly name="medicare_number" data-id="medicare_number" id="medicare_number" placeholder="Medicare Number" value="{{ isset($patient->demographic) && isset($patient->demographic->medicare_number) ? $patient->demographic->medicare_number : '' }}" maxlength="11" pattern="\d{11}">
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
            </form>
            <!-- Croley Insurance and Financial Start -->
            <div class="app-card app-card-custom no-minHeight box-shadow-none _add_new_company" data-name="croley_insurance_and_financial">
               <div class="app-card-header">
                  <h1 class="title mr-2">Insurance Details</h1>
                  <a class="add_new_company" href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Add New Insurance Company"><i class="las la-plus-circle la-2x"></i></a>
               </div>
               <div class="card-body text-info">
                  <table class="table m-0 insurance-list-order">
                     <thead class="thead-light">
                        <tr>
                           <th>Name</th>
                           <th>Payer Id</th>
                           <th>Phone</th>
                           <th>Policy Number</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($insurances as $insurance)
                           <tr>
                              <form class="insurance_form">
                                 <input type="hidden" name="insurance_id" value="{{ $insurance->id }}">
                                 <input type="hidden" name="user_id" value="{{ $patient->id }}">
                                 <td>
                                    <span class='label'>{{ $insurance->name }}</span>
                                    <div class='phone-text'>
                                       <input type="text" class="form-control form-control-lg" name="name" aria-describedby="nameHelp" placeholder="Enter Insurance Company Name" value="{{ $insurance->name }}">
                                       <span class="name-invalid-feedback text-danger" role="alert"></span>
                                    </div>
                                 </td>
                                 <td>
                                    <span class='label'>{{ $insurance->payer_id }}</span>
                                    <div class='phone-text'>
                                       <input type="text" class="form-control form-control-lg" id="payer_id" name="payer_id" aria-describedby="payerIdHelp" placeholder="Enter Payer ID" value="{{ $insurance->payer_id }}">
                                    </div>
                                    <span class="payer_id-invalid-feedback text-danger" role="alert"></span>
                                 </td>
                                 <td>
                                    <span class='label'>{{ $insurance->phone }}</span>
                                    <div class='phone-text'>
                                       <input type="text" class="form-control form-control-lg" name="phone" aria-describedby="phoneHelp" onkeyup="this.value=this.value.replace(/[^\d]/,'')" placeholder="Enter Phone Number" value="{{ $insurance->phone }}">
                                    </div>
                                    <span class="phone-invalid-feedback text-danger" role="alert"></span>
                                 </td>
                                 <td>
                                    <span class='label'>{{ $insurance->policy_no }}</span>
                                    <div class='phone-text'>
                                       <input type="text" class="form-control form-control-lg" id="policy_no" name="policy_no" aria-describedby="policyNoHelp" placeholder="Enter Policy No" value="{{ $insurance->policy_no }}">
                                    </div>
                                    <span class="policy_no-invalid-feedback text-danger" role="alert"></span>
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
                     </tbody>
                  </table>
               </div>
            </div>
            <!-- Insurance Company Form Start -->
            <div class="app-card app-card-custom no-minHeight box-shadow-none mt-3 insurance_company">
               <form class="insurance_form">
                  <input type="hidden" name="user_id" value="{{ $patient->id }}">
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
                                       <span class="payer_id-invalid-feedback text-danger" role="alert"></span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-4">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Payer Id</h3>
                                    <div class="_detail">
                                       <input type="text" class="form-control form-control-lg" id="payer_id" name="payer_id" 
                                       aria-describedby="payerIdHelp" placeholder="Enter Payer ID">
                                       <span class="payer_id-invalid-feedback text-danger" role="alert"></span>
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
                                       <input type="text" class="form-control form-control-lg" name="phone" id="insurance_detail_phone" aria-describedby="phoneHelp" placeholder="Enter Phone Number">
                                       <span class="phone-invalid-feedback text-danger" role="alert" maxlength="14"></span>
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
                                    <h3 class="_title">Policy Number</h3>
                                    <div class="_detail">
                                       <input type="text" class="form-control form-control-lg" id="policy_no" name="policy_no" aria-describedby="policyNoHelp" placeholder="Enter Policy No">
                                       <span class="policy_no-invalid-feedback text-danger" role="alert"></span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class=" d-flex justify-content-end">
                           <button type="submit" class="btn btn-outline-green save_record" data-action="add" name="Save">Save</button>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
            <!-- Insurance Company Form end -->
            <!-- Croley Insurance and Financial End -->
         </div>
      </div>
   </div>
</div>