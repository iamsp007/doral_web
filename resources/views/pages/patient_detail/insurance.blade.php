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