<div class="tab-pane fade" id="clinical" role="tabpanel" aria-labelledby="clinical-tab">
   <div class="app-card app-card-custom" data-name="clinical">
      <div class="app-card-header">
         <h1 class="title">Clinical</h1>
      </div>
      <div class="head">
         <div class="shadow-sm">
            <ul class="nav nav-pills nav-clinical mb-3" id="pills-tab" role="tablist">
               <li class="nav-item" role="presentation">
                  <a class="nav-link rounded-0" id="social-pro-tab" data-toggle="pill"
                     href="#social-pro" role="tab" aria-controls="social-pro"
                     aria-selected="true">Social Pro</a>
               </li>
               <li class="nav-item" role="presentation">
                  <a class="nav-link rounded-0" id="md-med-profile-tab" data-toggle="pill"
                     href="#md-med-profile" role="tab" aria-controls="md-med-profile"
                     aria-selected="false">MD Med Profile</a>
               </li>
               <li class="nav-item" role="presentation">
                  <a class="nav-link rounded-0" id="behaviour-profile-tab" data-toggle="pill"
                     href="#behaviour-profile" role="tab" aria-controls="behaviour-profile"
                     aria-selected="false">Behaviour Profile</a>
               </li>
               <li class="nav-item" role="presentation">
                  <a class="nav-link rounded-0" id="assessment-tab" data-toggle="pill"
                     href="#assessment" role="tab" aria-controls="assessment"
                     aria-selected="false">Assessment</a>
               </li>
               <li class="nav-item" role="presentation">
                  <a class="nav-link rounded-0" id="progress-note-encounter-tab"
                     data-toggle="pill" href="#progress-note-encounter" role="tab"
                     aria-controls="progress-note-encounter" aria-selected="false">Progress
                     Note Encounter</a>
               </li>
               <li class="nav-item" role="presentation">
                  <a class="nav-link rounded-0" id="plan-of-care-tab" data-toggle="pill"
                     href="#plan-of-care" role="tab" aria-controls="plan-of-care"
                     aria-selected="false">Plan Of Care</a>
               </li>
               <li class="nav-item" role="presentation">
                  <a class="nav-link rounded-0" id="cover-note-tab" data-toggle="pill"
                     href="#cover-note" role="tab" aria-controls="cover-note"
                     aria-selected="false">Cover Note</a>
               </li>
               <li class="nav-item" role="presentation">
                  <a class="nav-link rounded-0 active" id="lab-tab" data-toggle="pill"
                     href="#lab-report" role="tab" aria-controls="lab-report"
                     aria-selected="false">Lab</a>
               </li>
            </ul>
         </div>
         <div class="p-3 scrollbar scrollbar4">
            <div class="tab-content" id="pills-tabContent">
               <!-- Social Pro Start-->
               <div class="tab-pane fade" id="social-pro" role="tabpanel"
                  aria-labelledby="social-pro-tab">
                  <ul class="nav nav-pills nav-clinical-new mb-3" id="pills-tab"
                     role="tablist">
                     <li class="nav-item" role="presentation">
                        <a class="nav-link rounded-0" id="sd-tab" data-toggle="pill"
                           href="#sd" role="tab" aria-controls="sd"
                           aria-selected="true">SD</a>
                     </li>
                     <li class="nav-item" role="presentation">
                        <a class="nav-link rounded-0" id="msw-tab" data-toggle="pill"
                           href="#msw" role="tab" aria-controls="msw"
                           aria-selected="false">MSW</a>
                     </li>
                     <li class="nav-item" role="presentation">
                        <a class="nav-link active rounded-0" id="aide-tab" data-toggle="pill"
                           href="#aide" role="tab" aria-controls="aide"
                           aria-selected="false">Aide</a>
                     </li>
                  </ul>
                  <div class="tab-content" id="pills-tabContent">
                     <!-- SD Start Here -->
                     <div class="tab-pane fade" id="sd" role="tabpanel"
                        aria-labelledby="sd-tab">
                        <div class="alert alert-info">
                           <span class="font-weight-bold">Frequency</span>: Frequency will be
                           specified in units. 1 hour is 1 unit. 30 minutes is 0.50 units.
                        </div>
                        <div class="form-group">
                           <div class="row">
                              <div class="col-12 col-sm-1">
                                 <label for="range" class="label">&nbsp;</label>
                                 <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" id="range" name="range"
                                       class="custom-control-input">
                                    <label class="custom-control-label"
                                       for="range">Range</label>
                                 </div>
                              </div>
                              <div class="col-12 col-sm-2">
                                 <label for="from1" class="label">From</label>
                                 <input type="text" class="form-control form-control-lg"
                                    id="from1" name="from1" aria-describedby="fromHelp1">
                              </div>
                              <div class="col-12 col-sm-2">
                                 <label for="to" class="label">To</label>
                                 <input type="text" class="form-control form-control-lg"
                                    id="to" name="to" aria-describedby="toHelp">
                              </div>
                              <div class="col-12 col-sm-1">
                                 <label for="amount" class="label">Amount</label>
                                 <input type="text" class="form-control form-control-lg"
                                    id="amount" name="amount" aria-describedby="amountHelp">
                              </div>
                              <div class="col-12 col-sm-1">
                                 <label for="medication" class="label">Frequency</label>
                                 <select name="frequency" id="frequency"
                                    class="form-control">
                                    <option value="">Select</option>
                                    <option value="Sun">Sun</option>
                                    <option value="Mon">Mon</option>
                                    <option value="Tue">Tue</option>
                                    <option value="Wed">Wed</option>
                                    <option value="Thu">Thu</option>
                                    <option value="Fri">Fri</option>
                                    <option value="Sat">Sat</option>
                                 </select>
                              </div>
                              <div class="col-12 col-sm-1">
                                 <label for="duration1" class="label">Duration</label>
                                 <input type="text" class="form-control form-control-lg"
                                    id="duration1" name="duration1"
                                    aria-describedby="durationHelp1">
                              </div>
                              <div class="col-12 col-sm-1">
                                 <label for="type" class="label">Type</label>
                                 <select name="type" id="type" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Visit">Visit</option>
                                 </select>
                              </div>
                              <div class="col-12 col-sm-1">
                                 <label for="hours" class="label">Hours</label>
                                 <input type="text" class="form-control form-control-lg"
                                    id="hours" name="hours" aria-describedby="hoursHelp">
                              </div>
                              <div class="col-12 col-sm-2">
                                 <label for="dates1" class="label">Dates</label>
                                 <input type="text" class="form-control form-control-lg"
                                    id="dates1" name="dates1" aria-describedby="datesHelp1">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-12">
                              <div class="form-group">
                                 <label for="additional_orders" class="label">Additional
                                    Order</label>
                                 <textarea name="additional_orders" id="additional_orders"
                                    cols="30" rows="8"
                                    class="form-control">Home Care Services:  PCA- Bathing, Dressing, Toileting, Skin, and Hair Care, Grooming, Assist with ADL/ Ambulation, Light Housekeeping/Dusting/Patient's Laundry/Bed Change and Shopping/Errands, Medication Reminder, Fluids Encouragement  PCA  8_ hours per day x _7_ days per week RN for Assessment q 6 months, PRN RN visit for change in patient status, --Aide Supervision every 6 months</textarea>
                              </div>
                           </div>
                           <div class="col-12">
                              <div class="">
                                 <label for="addtional_goals" class="label">Additional
                                    Goals/Rehabilitation Potential/Discharge Plans</label>
                                 <textarea name="addtional_goals" id="addtional_goals"
                                    cols="30" rows="8" class="form-control">The patient will remain safely in the home and have ADLs and personal care needs met. The patient will improve in the current level of functionality. No discharge plan at this time or until the patient no longer qualifies for home care services.
                                 </textarea>
                              </div>
                           </div>
                           <div class="col-12"></div>
                        </div>
                     </div>
                     <!-- SD Start End -->
                     <!-- MSW Start Here -->
                     <div class="tab-pane fade" id="msw" role="tabpanel"
                        aria-labelledby="msw-tab">
                        Content goes here....
                     </div>
                     <!-- MSW Start End -->
                     <!-- AIDE Start Start -->
                     <div class="tab-pane fade show active" id="aide" role="tabpanel"
                        aria-labelledby="aide-tab">
                        <div class="alert alert-info">
                           <span class="font-weight-bold">Frequency</span>: Frequency will be
                           specified in units. 1 hour is 1 unit. 30 minutes is 0.50 units.
                        </div>
                        <div class="app-card frequency_tab mb-3" id="frequency_tab"
                           style="min-height: inherit;">
                           <div class="app-card-body">
                              <div class="p-3">
                                 <div>
                                    <div class="row">
                                       <div class="col-12 col-sm-1">
                                          <label for="range"
                                             class="label pb-2">&nbsp;</label>
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" id="range1" name="range1"
                                                class="custom-control-input">
                                             <label class="custom-control-label"
                                                for="range1">Range</label>
                                          </div>
                                       </div>
                                       <div class="col-12 col-sm-2">
                                          <label for="from" class="label">From</label>
                                          <input type="text"
                                             class="form-control form-control-lg" id="from"
                                             name="from" aria-describedby="fromHelp">
                                       </div>
                                       <div class="col-12 col-sm-2">
                                          <label for="to1" class="label">To</label>
                                          <input type="text"
                                             class="form-control form-control-lg" id="to1"
                                             name="to1" aria-describedby="toHelp1">
                                       </div>
                                       <div class="col-12 col-sm-1">
                                          <label for="amount1" class="label">Amount</label>
                                          <input type="text"
                                             class="form-control form-control-lg"
                                             id="amount1" name="amount1"
                                             aria-describedby="amountHelp1">
                                       </div>
                                       <div class="col-12 col-sm-1">
                                          <label for="frequency1"
                                             class="label">Frequency</label>
                                          <select name="frequency1" id="frequency1"
                                             class="form-control" multiple>
                                             <option value="Sun">Sun</option>
                                             <option value="Mon">Mon</option>
                                             <option value="Tue">Tue</option>
                                             <option value="Wed">Wed</option>
                                             <option value="Thu">Thu</option>
                                             <option value="Fri">Fri</option>
                                             <option value="Sat">Sat</option>
                                          </select>
                                       </div>
                                       <div class="col-12 col-sm-1">
                                          <label for="duration"
                                             class="label">Duration</label>
                                          <input type="text"
                                             class="form-control form-control-lg"
                                             id="duration" name="duration"
                                             aria-describedby="durationHelp">
                                       </div>
                                       <div class="col-12 col-sm-1">
                                          <label for="type1" class="label">Type</label>
                                          <select name="type1" id="type1"
                                             class="form-control">
                                             <option value="Visit">Visit</option>
                                          </select>
                                       </div>
                                       <div class="col-12 col-sm-1">
                                          <label for="hours1" class="label">Hours</label>
                                          <input type="text"
                                             class="form-control form-control-lg" id="hours1"
                                             name="hours1" aria-describedby="hoursHelp1">
                                       </div>
                                       <div class="col-12 col-sm-1">
                                          <label for="dates" class="label">Dates</label>
                                          <input type="text"
                                             class="form-control form-control-lg" id="dates"
                                             name="dates" aria-describedby="datesHelp">
                                       </div>
                                       <div class="col-12 col-sm-1">
                                          <label for="dates" class="label">&nbsp;</label>
                                          <div class="d-flex align-items-center">
                                             <a href="javascript:void(0)"
                                                class="mt-1 mr-2 add_frequency"
                                                onclick="addMore('frequency_tab')"
                                                data-toggle="tooltip" data-placement="left"
                                                title="" data-original-title="Add Row">
                                                <img
                                                   src="{{ asset('assets/img/icons/add_more_item.svg') }}"
                                                   alt="">
                                             </a>
                                             <a href="javascript:void(0)" class="mt-1 d-none"
                                                data-toggle="tooltip" data-placement="left"
                                                title="" data-original-title="Remove Row">
                                                <img src="{{ asset('assets/img/icons/remove_row.svg') }}"
                                                   alt="">
                                             </a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <div class="col-12">
                              <div class="form-group">
                                 <label for="poc_note" class="label">POC Note</label>
                                 <textarea name="poc_note" id="poc_note" cols="30" rows="8"
                                    class="form-control"></textarea>
                              </div>
                           </div>
                           <div class="col-12">
                              <div class="">
                                 <label for="other" class="label">Other</label>
                                 <textarea name="other" id="other" cols="30" rows="8"
                                    class="form-control"></textarea>
                              </div>
                           </div>
                           <div class="col-12"></div>
                        </div>
                     </div>
                     <!-- AIDE Start End -->
                  </div>
               </div>
               <!-- Social Pro End-->
               <!-- MD Med Profile Start-->
               <div class="tab-pane fade" id="md-med-profile" role="tabpanel"
                  aria-labelledby="md-med-profile-tab">
                  Content goes here..
               </div>
               <!-- MD Med Profile End-->
               <!-- Behaviour Profile Start-->
               <div class="tab-pane fade" id="behaviour-profile" role="tabpanel"
                  aria-labelledby="behaviour-profile-tab">
                  Content goes here..
               </div>
               <!-- Behaviour Profile End-->
               <!-- Assessment Start-->
               <div class="tab-pane fade" id="assessment" role="tabpanel"
                  aria-labelledby="assessment-tab">
                  Content goes here..
               </div>
               <!-- Assessment End-->
               <!-- Progress Note Encounter Start-->
               <div class="tab-pane fade" id="progress-note-encounter" role="tabpanel"
                  aria-labelledby="progress-note-encounter-tab">
                  Content goes here..
               </div>
               <!-- Progress Note Encounter End-->
               <!-- Plan Of Care Start-->
               <div class="tab-pane fade" id="plan-of-care" role="tabpanel"
                  aria-labelledby="plan-of-care-tab">
                  Content goes here..
               </div>
               <!-- Plan Of Care End-->
               <!-- Cover Note Start-->
               <div class="tab-pane fade" id="cover-note" role="tabpanel"
                  aria-labelledby="cover-note-tab">
                  Content goes here..
               </div>
               <!-- Cover Note End-->
               <!-- Lab Start-->
               <div class="tab-pane fade show active" id="lab-report" role="tabpanel" aria-labelledby="lab-tab">
                  <ul class="nav nav-pills nav-clinical-nested shadow-sm mb-3" id="pills-tab" role="tablist">
                     @foreach($labReportTypes as $key => $labReportType)
                        <li class="nav-item" role="presentation">
                              <a class="nav-link @if ($key === 0) active @endif" id="{{  (new \App\Helpers\Helper)->clean($labReportType->name) }}-tab" data-toggle="pill"
                                 href='#{{  (new \App\Helpers\Helper)->clean($labReportType->name) }}'
                                 role="tab" aria-controls="{{  (new \App\Helpers\Helper)->clean($labReportType->name) }}"
                                 aria-selected="false">{{ $labReportType->name }}</a>
                        </li>
                     @endforeach
                  </ul>
                  <div class="tab-content" id="pills-tabContent">
                     <!-- TB Screen Start -->
                     @include('pages.patient_detail.lab.tb-screen')
                     <!-- TB Screen End -->
                 
                     <!-- Drug Screen Start -->
                     <div class="tab-pane fade" id="drug-screen" role="tabpanel"
                        aria-labelledby="drug-screen-tab">
                        <div class="app-vbc p-3">
                           <div class="add-new-patient">
                              <div class="icon"><img
                                    src="{{ asset('assets/img/icons/drug screening.svg') }}"
                                    class="img-fluid" /></div>
                              <button type="submit"
                                 class="btn btn-outline-green w-600 d-table mr-auto ml-auto mt-3"
                                 id="drugscreenbtn"
                                 style="width: inherit;font-size: 18px;height: 36px;padding-left: 10px;padding-right: 10px;text-transform: uppercase;"
                                 onclick="openRoadL('drugscreenbtn')"
                                 name="RoadL Request">RoadL
                                 Request</button>
                              <div class="recieved_roadl d-none">
                                 <div class="row">
                                    <div class="col-12 col-sm-4"></div>
                                    <div class="col-12 col-sm-4">
                                       <div class="row">
                                          <div class="col-12 col-sm-6">
                                             <select id="roadlrequest9"
                                                class="form-control select roadlrequest"
                                                multiple></select>
                                          </div>
                                          <div class="col-12 col-sm-6">
                                             <button type="submit"
                                                class="btn btn-outline-green w-600"
                                                style="width: inherit;font-size: 18px;height: 36px;padding-left: 10px;padding-right: 10px;text-transform: uppercase;"
                                                name="Start RoadL">Start RoadL</button>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12 col-sm-4"></div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-12 col-sm-1"></div>
                                 <div class="col-12 col-sm-10">
                                    <table class="table table-bordered table-hover mt-4">
                                       <thead class="thead-light">
                                          <tr>
                                             <th scope="col">#</th>
                                             <th scope="col">Due Date</th>
                                             <th scope="col">Date Performed</th>
                                             <th scope="col">Result</th>
                                             <th width="11%">Action</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <tr class="bg-positive">
                                             <td class="text-white">1</td>
                                             <td class="text-white">10/24/1984</td>
                                             <td class="text-white">10/24/1984</td>
                                             <td class="text-white">Positive</td>
                                             <td class='text-center text-white'><span
                                                   onclick="exploder('exp8')" id="exp8"
                                                   class="exploder"><i
                                                      class="las la-plus la-2x"></i></span>
                                                <a href="javascript:void(0)"><i
                                                      class="las la-trash la-2x text-white pl-4"></i></a>
                                             </td>
                                          </tr>
                                          <tr class="explode1 d-none">
                                             <td colspan="6">
                                                <div class="pt-3 _title1">Your Report is
                                                   <span class="text-green">Positive</span>
                                                   <p class="mt-3 text-green">You need to
                                                      have <span class="text-underline">Chest
                                                         X-Ray report</span>.</p>
                                                </div>
                                                <table class="table table-bordered mt-4">
                                                   <thead>
                                                      <tr>
                                                         <th scope="col">#</th>
                                                         <th scope="col">Date Of X-Ray</th>
                                                         <th scope="col">Expiry Date(Till 5
                                                            years valid)
                                                         </th>
                                                      </tr>
                                                   </thead>
                                                   <tbody>
                                                      <tr>
                                                         <th scope="row">#</th>
                                                         <td>28/08/1981</td>
                                                         <td>28/08/1986</td>
                                                      </tr>
                                                      <tr>
                                                         <th scope="row">#</th>
                                                         <td><input type="text"
                                                               class="form-control"
                                                               name="xraydate"
                                                               value="10/24/1984" /></td>
                                                         <td>28/08/1986</td>
                                                      </tr>
                                                   </tbody>
                                                </table>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td scope="row">2</td>
                                             <td><input type="text"
                                                   class="form-control form-control-lg"
                                                   name="xraydate" value="10/24/1984" /></td>
                                             <td><input type="text"
                                                   class="form-control form-control-lg"
                                                   name="xraydate" value="10/24/1984" /></td>
                                             <td>
                                                <!-- <select name="" id="" class="form-control">
                                                   <option value="">Select</option>
                                                   <option value="">Received</option>
                                                   <option value="">Not Received</option>
                                                </select> -->
                                             </td>
                                             <td></td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                                 <div class="col-12 col-sm-1"></div>
                              </div>
                              <div class="d-flex pt-4 justify-content-center">
                                 <button type="submit" class="btn btn-outline-green"
                                    name="Save">Save</button>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Drug Screen End -->
                     <!-- Annual Health Assessment Start -->
                     <div class="tab-pane fade" id="annual-health-assessment" role="tabpanel"
                        aria-labelledby="annual-health-assessment-tab">
                        <div class="app-vbc p-3">
                           <div class="add-new-patient">
                              <div class="icon"><img
                                    src="{{ asset('assets/img/icons/annual_health_management.svg') }}"
                                    class="img-fluid" /></div>
                              <button type="submit"
                                 class="btn btn-outline-green w-600 d-table mr-auto ml-auto mt-3"
                                 id="annualbtn"
                                 style="width: inherit;font-size: 18px;height: 36px;padding-left: 10px;padding-right: 10px;text-transform: uppercase;"
                                 onclick="openRoadL('annualbtn')" name="RoadL Request">RoadL
                                 Request</button>
                              <div class="recieved_roadl d-none">
                                 <div class="row">
                                    <div class="col-12 col-sm-4"></div>
                                    <div class="col-12 col-sm-4">
                                       <div class="row">
                                          <div class="col-12 col-sm-6">
                                             <select id="roadlrequest10"
                                                class="form-control select roadlrequest"
                                                multiple></select>
                                          </div>
                                          <div class="col-12 col-sm-6">
                                             <button type="submit"
                                                class="btn btn-outline-green w-600"
                                                style="width: inherit;font-size: 18px;height: 36px;padding-left: 10px;padding-right: 10px;text-transform: uppercase;"
                                                name="Start RoadL">Start RoadL</button>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12 col-sm-4"></div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-12 col-sm-1"></div>
                                 <div class="col-12 col-sm-10">
                                    <table class="table table-bordered table-hover mt-4">
                                       <thead class="thead-light">
                                          <tr>
                                             <th scope="col">#</th>
                                             <th scope="col">Due Date</th>
                                             <th scope="col">Date Performed</th>
                                             <th scope="col">Result</th>
                                             <th width="11%">Action</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <tr class="bg-positive">
                                             <td class="text-white">#</td>
                                             <td class="text-white">10/24/1984</td>
                                             <td class="text-white">10/24/1984</td>
                                             <td class="text-white">Completed</td>
                                             <td class='text-center text-white'><span
                                                   onclick="exploder('exp9')" id="exp9"
                                                   class="exploder"><i
                                                      class="las la-plus la-2x"></i></span>
                                                <a href="javascript:void(0)"><i
                                                      class="las la-trash la-2x text-white pl-4"></i></a>
                                             </td>
                                          </tr>
                                          <tr class="explode1 d-none">
                                             <td colspan="6">
                                                <div class="pt-3 _title1">Your Report is
                                                   <span class="text-green">Positive</span>
                                                   <p class="mt-3 text-green">You need to
                                                      have <span class="text-underline">Chest
                                                         X-Ray report</span>.</p>
                                                </div>
                                                <table class="table table-bordered mt-4">
                                                   <thead>
                                                      <tr>
                                                         <th scope="col">#</th>
                                                         <th scope="col">Date Of X-Ray</th>
                                                         <th scope="col">Expiry Date(Till 5
                                                            years valid)
                                                         </th>
                                                      </tr>
                                                   </thead>
                                                   <tbody>
                                                      <tr>
                                                         <th scope="row">#</th>
                                                         <td>28/08/1981</td>
                                                         <td>28/08/1986</td>
                                                      </tr>
                                                      <tr>
                                                         <th scope="row">#</th>
                                                         <td><input type="text"
                                                               class="form-control"
                                                               name="xraydate"
                                                               value="10/24/1984" /></td>
                                                         <td>28/08/1986</td>
                                                      </tr>
                                                   </tbody>
                                                </table>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td scope="row">#</td>
                                             <td><input type="text"
                                                   class="form-control form-control-lg"
                                                   name="xraydate" value="10/24/1984" /></td>
                                             <td><input type="text"
                                                   class="form-control form-control-lg"
                                                   name="xraydate" value="10/24/1984" /></td>
                                             <td>
                                                <!-- <select name="" id="" class="form-control">
                                                   <option value="">Select</option>
                                                   <option value="">Completed</option>
                                                   <option value="">Not Completed</option>
                                                </select> -->
                                             </td>
                                             <td></td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                                 <div class="col-12 col-sm-1"></div>
                              </div>
                              <div class="d-flex pt-4 justify-content-center">
                                 <button type="submit" class="btn btn-outline-green"
                                    name="Save">Save</button>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Annual Health Assessment End -->
                     <!-- Flu Vaccine Start -->
                     <!-- <div class="tab-pane fade" id="flu-vaccine" role="tabpanel"
                        aria-labelledby="flu-vaccine-tab">
                        Content goes here...
                     </div> -->
                     <!-- Flu Vaccine End -->
                  </div>
               </div>
               <!-- Lab End-->
            </div>
         </div>
      </div>
   </div>
</div>