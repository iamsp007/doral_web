<div class="tab-pane fade" id="insurance" role="tabpanel" aria-labelledby="insurance-tab">
   <div class="app-card app-card-custom" data-name="insurance">
      <div class="app-card-header"> <h1 class="title">Insurance</h1>
         <img src="{{ asset('assets/img/icons/edit-field.svg') }}" data-toggle="tooltip" data-placement="bottom" title="Edit" class="cursor-pointer edit-icon" alt="" onclick="editAllField('insurance')">
         <img src="{{ asset('assets/img/icons/update-icon.svg') }}" style="display:none" data-toggle="tooltip" data-placement="bottom" title="Update" class="cursor-pointer update-icon" alt="" onclick="updateAllField('insurance')">
      </div>
      <div class="head scrollbar scrollbar12">
         <div class="p-3">
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
                                 <h3 class="_title">Madicaid No</h3>
                                 <input type="text" class="form-control-plaintext _detail" readonly name="madicaid_no" data-id="madicaid_no" id="madicaid_no" placeholder="Medicaid Number" value="{{ $patient->medicaid_number}}">
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
                                 <input type="text" class="form-control-plaintext _detail" readonly name="medicare_no" data-id="medicare_no" id="medicare_no" placeholder="Medicare Number" value="{{ $patient->medicare_number}}">
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
            <div class="app-card app-card-custom no-minHeight box-shadow-none _add_new_company" data-name="croley_insurance_and_financial">
               <div class="app-card-header">
                  <h1 class="title mr-2">Croley Insurance and Financial</h1>
                  <a class="add_new_company" href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Add New Insurance Company"><i class="las la-plus-circle la-2x"></i></a>
               </div>
               <div class="card-body text-info">
                  <table class="table m-0 insurance-list-order">
                     <thead class="thead-light">
                        <tr>
                           <th>Payer Id</th>
                           <th>Phone</th>
                           <th>Policy Number</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($insurances as $insurance)
                           <tr>
                              <td>{{ $insurance->payer_id }}</td>
                              <td>{{ $insurance->phone }}</td>
                              <td>{{ $insurance->policy_no }}</td>
                              <td>EDIT | DELETE</td>
                           </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
            <!-- Insurance Company Form Start -->
            <div class="app-card app-card-custom no-minHeight box-shadow-none mt-3 insurance_company">
               <div class="app-card-header">
                  <input type="text" class="form-control form-control-lg" id="comapnyName" name="comapnyName" aria-describedby="comapnyNameHelp" placeholder="Enter Insurance Company Name">
               </div>
               <div class="head">
                  <div class="p-3">
                     <form id="insurance_form">
                        <div class="row">
                           <div class="col-12 col-sm-4">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Payer Id</h3>
                                    <div class="_detail">
                                       <input type="text" class="form-control form-control-lg" id="payerId" name="payerId" aria-describedby="payerIdHelp" placeholder="Enter Payer ID">
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
                                       <input type="text" class="form-control form-control-lg" id="phoneNo" name="phoneNo" aria-describedby="phoneNoHelp" onkeyup="this.value=this.value.replace(/[^\d]/,'')" placeholder="Enter Phone No">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 col-sm-4">
                              <div class="input_box">
                                 <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                                 <div class="rs">
                                    <h3 class="_title">Policy Number</h3>
                                    <div class="_detail">
                                       <input type="text" class="form-control form-control-lg" id="policyNo" name="policyNo" aria-describedby="policyNoHelp" placeholder="Enter Policy No">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class=" d-flex justify-content-end">
                           <button type="submit" class="btn btn-outline-green save-record" name="Save">Save</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            <!-- Insurance Company Form end -->
            <!-- Croley Insurance and Financial End -->
         </div>
      </div>
   </div>
</div>