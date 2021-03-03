<div class="tab-pane fade" id="billing" role="tabpanel" aria-labelledby="billing-tab">
   <div class="app-card app-card-custom" data-name="billing">
      <div class="app-card-header"><h1 class="title">Billing</h1></div>
      <div class="head scrollbar scrollbar4">
         <div class="p-3">
            <div class="card border-info">
               <div class="card-header text-info font-weight-bold">
                  <div class="d-flex justify-content-between">
                     <div>MD Order: Self Pay</div>
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
                           <td>Home Care Services</td>
                           <td>+1 650 513 0514</td>
                           <td>example@example.com</td>
                           <td>1600 Amphitheatre Parkway Mountain View, CA 94043</td>
                           <td><button type="button" class="cancel-btn" style="width: auto;">View Insurance Detail</button></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
            <div class="card border-light mt-3">
               <div class="card-header text-info font-weight-bold">MD Order: Self Pay</div>
               <div class="card-body text-info">
                  <p class="text-danger">Your Insurance has been expired on 28 February, 2020!</p>
                  <div class="row">
                     <div class="col-12 col-sm-3">
                        <a data-toggle="tab" href="#insurance" class="cancel-btn mt-3 d-flex align-items-center justify-content-center" style="width: auto;">Add Insurance</a>
                     </div>
                     <div class="col-12 col-sm-9"></div>
                  </div>
               </div>
            </div>
            <div class="card border-info mt-3">
               <div class="card-header text-info font-weight-bold">MD Order: Self Pay(Ifselected in plan 1 and plan 2)</div>
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
               <div class="card-header text-info font-weight-bold">Self Pay(Insurance not available)</div>
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
                           <label for="cardname" class="label">Card Number</label>
                           <input type="text" class="form-control form-control-lg" id="cardname" name="cardname" aria-describedby="cardnameHelp">
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
                                 <select class="form-control form-control-lg" name="years" id="years">
                                    <option value="2020">2020</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="row">
                              <div class="col-12 col-sm-6">
                                 <label for="cvvname" class="label">CVV</label>
                                 <input type="text" class="form-control form-control-lg" id="cvvname" name="cvvname" aria-describedby="cvvnameHelp">
                              </div>
                              <div class="col-12 col-sm-6"></div>
                           </div>
                        </div>
                        <div class="form-group d-flex justify-content-center">
                           <button class="btn btn-outline-green btn-block">Proceed</button>
                        </div>
                     </div>
                     <div class="col-12 col-sm-3"></div>
                  </div>
               </div>
            </div>
            <div class="card border-info mt-3">
               <div class="card-header text-info font-weight-bold">Wage Parity</div>
               <div class="card-body text-info">
                  <table class="table m-0">
                     <thead class="thead-light">
                        <tr>
                           <th>Wage Parity</th>
                           <th>Wage Parity From Date1</th>
                           <th>Wage Parity To Date1</th>
                           <th>Wage Parity From Date2</th>
                           <th>Wage Parity to Date2</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>{{ $patient->wage_parity }}</td>
                           <td>{{ $patient->wage_parity_from_date1 }}</td>
                           <td>{{ $patient->wage_parity_to_date1 }}</td>
                           <td>{{ $patient->wage_parity_from_date2 }}</td>
                           <td>{{ $patient->wage_parity_to_date2 }}</td>
                           <td>
                              <button type="button" class="cancel-btn"
                                 style="width: auto;">Bill to Wage Parity</button>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
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
                           <td>Cottage Home Care Services</td>
                           <td>+1 650 513 0514</td>
                           <td><button type="button" class="cancel-btn" style="width: auto;">Bill to Employer</button></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>