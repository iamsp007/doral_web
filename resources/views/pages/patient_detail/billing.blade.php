<div class="tab-pane fade" id="billing" role="tabpanel" aria-labelledby="billing-tab">
   <div class="app-card app-card-custom" data-name="billing">
      <div class="app-card-header"><h1 class="title">Billing</h1></div>
      <div class="head">
         <div class="p-3">
            @foreach($payment as $pay)
            @if($pay->service_payment_plan_details_id == 6 || $pay->service_payment_plan_details_id == 9 || $pay->service_payment_plan_details_id == 12)
                <div class="card border-info mt-3">
                    <div class="card-header text-info font-weight-bold">Wage Parity</div>
                    <div class="card-body text-info">
                       <table class="table m-0">
                          <thead class="thead-light">
                             <tr>
                                <th>Wage Parity</th>
                                <th>Wage Parity From Date</th>
                                <th>Wage Parity To Date</th>
                                <th>Action</th>
                             </tr>
                          </thead>
                          <tbody>
                             <tr>
                                <td>{{ $patient->wage_parity }}</td>
                                <td>{{ $patient->wage_parity_from_date1 }}</td>
                                <td>{{ $patient->wage_parity_to_date1 }}</td>
                                <td>
                                   <button type="button" class="cancel-btn"
                                      style="width: auto;">Bill to Wage Parity</button>
                                </td>
                             </tr>
                          </tbody>
                       </table>
                    </div>
                </div>
            @elseif($pay->service_payment_plan_details_id == 1 || $pay->service_payment_plan_details_id == 3 || $pay->service_payment_plan_details_id == 7 || $pay->service_payment_plan_details_id == 10 || $pay->service_payment_plan_details_id == 13)
                <div class="card border-info mt-3">
                    <div class="card-header text-info font-weight-bold">
                       <div class="d-flex justify-content-between">
                          <div>Self Pay</div>
                          <button type="button" onclick="redirectToInsurance()" class="cancel-btn" style="width: auto;">Check Insurance Status</button>
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
                                <td>---</td>
                                <td>---</td>
                                <td>---</td>
                                <td>---</td>
                                <td><button type="button" class="cancel-btn" style="width: auto;">View Insurance Detail</button></td>
                             </tr>
                          </tbody>
                       </table>
                    </div>
                </div>
                <div class="card border-light mt-3">
                   <div class="card-header text-info font-weight-bold">Self Pay</div>
                   <div class="card-body text-info">
                      <p class="text-danger">Your Insurance has been expired on 28 February, 2021!</p>
                      <div class="row">
                         <div class="col-12 col-sm-3">
                            <a data-toggle="tab" href="#insurance" class="cancel-btn mt-3 d-flex align-items-center justify-content-center" style="width: auto;">Add Insurance</a>
                         </div>
                         <div class="col-12 col-sm-9"></div>
                      </div>
                   </div>
                </div>
            @elseif($pay->service_payment_plan_details_id == 8 || $pay->service_payment_plan_details_id == 11 || $pay->service_payment_plan_details_id == 14)
                <div class="card border-info mt-3">
                    <div class="card-header text-info font-weight-bold">Employer Pay</div>
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
                                <td>---</td>
                                <td>---</td>
                                <td><button type="button" class="cancel-btn" style="width: auto;">Bill to Employer</button></td>
                             </tr>
                          </tbody>
                       </table>
                    </div>
                </div>
            @elseif($pay->service_payment_plan_details_id == 2 || $pay->service_payment_plan_details_id == 4)
                <div class="card border-info mt-3">
                    <div class="card-header text-info font-weight-bold">Home Care Pay</div>
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
                                <td>---</td>
                                <td>---</td>
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
            @endif()
            @endforeach
         </div>
      </div>
   </div>
</div>