 <div class="tab-pane fade" id="tb-screen" role="tabpanel"
    aria-labelledby="tb-screen-tab">
    <div class="app-vbc ppd_block p-3">
       <div class="add-new-patient">
          <div class="icon"><img
                src="{{ asset('assets/img/icons/patient-img.svg') }}"
                class="img-fluid" /></div>
          <button type="submit"
          class="btn btn-outline-green w-600 d-table mr-auto ml-auto mt-3" id="tbbtn" style="width: inherit;font-size: 18px;height: 36px;padding-left: 10px;padding-right: 10px;text-transform: uppercase;"
          onclick="openRoadL('tbbtn')" name="RoadL Request">RoadL
          Request</button>  
          <div class="recieved_roadl d-none">
             <div class="row">
                <div class="col-12 col-sm-4"></div>
                <div class="col-12 col-sm-4">
                   <div class="row">
                      <div class="col-12 col-sm-6">
                         <select id="roadlrequest2"
                            class="form-control select roadlrequest"
                            multiple></select>
                      </div>
                      <div class="col-12 col-sm-6">
                         <button type="submit" class="btn btn-outline-green w-600" style="width: inherit;font-size: 18px;height: 36px;padding-left: 10px;padding-right: 10px;text-transform: uppercase;" name="Start RoadL">Start RoadL</button>
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
                         <th scope="col">Date Of Screening</th>
                         <th scope="col">Expiry Date(Valid till 1 years)
                         </th>
                         <th scope="col">Type</th>
                         <th scope="col">Result</th>
                         <th width="11%">Action</th>
                      </tr>
                   </thead>
                   <tbody>
                      <tr class="bg-positive text-white">
                         <th scope="row">1</th>
                         <td>28/08/1981</td>
                         <td>28/08/1986</td>
                         <td>Gold</td>
                         <td>Positive</td>
                         <td class='text-center'><span
                               onclick="exploder('exp1')" id="exp1"
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
                         <th scope="row">2</th>
                         <td>28/08/1981</td>
                         <td>28/08/1986</td>
                         <td>Gold Plus</td>
                         <td>Negative</td>
                         <td></td>
                      </tr>
                      <tr>
                         <th scope="row">3</th>
                         <td><input type="text" class="form-control"
                               name="xraydate" value="10/24/1984" /></td>
                         <td>28/08/1986</td>
                         <td></td>
                         <td></td>
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