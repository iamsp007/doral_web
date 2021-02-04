<div class="tab-pane fade show active" id="tb-screen" role="tabpanel" aria-labelledby="tb-screen-tab">
   <div class="app-vbc ppd_block p-3">
      <div class="add-new-patient">
         <div class="icon">
            <img src="{{ asset('assets/img/icons/patient-img.svg') }}" class="img-fluid" />
         </div>
         <button 
            type="submit"
            class="btn btn-outline-green w-600 d-table mr-auto ml-auto mt-3" id="tbbtn"
            style="width: inherit;font-size: 18px;height: 36px;padding-left: 10px;padding-right: 10px;text-transform: uppercase;"
            onclick="openRoadL('tbbtn')" name="RoadL Request">RoadL Request
         </button>  
         <div class="recieved_roadl d-none">
            <div class="row">
               <div class="col-12 col-sm-4"></div>
               <div class="col-12 col-sm-4">
                  <div class="row">
                     <div class="col-12 col-sm-6">
                        <select id="roadlrequest2" class="form-control select roadlrequest" multiple></select>
                     </div>
                     <div class="col-12 col-sm-6">
                        <button
                           type="submit"
                           class="btn btn-outline-green w-600"
                           style="width: inherit;font-size: 18px;height: 36px;padding-left: 10px;padding-right: 10px;text-transform: uppercase;" name="Start RoadL">Start RoadL
                        </button>
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
                        <th scope="col">Sr. No.</th>
                        <th scope="col">Test Type</th>
                        <th scope="col">Insert/Screening Date</th>
                        <th scope="col">Expiry Date</th>
                        <th scope="col">Result</th>
                        <th width="11%">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @php $number = 1; @endphp
                     @foreach($tbpatientLabReport as $ppdquantiferon)
                        <tr class="@if ($ppdquantiferon->result === '1') bg-positive text-white @endif">
                           <th scope="row">{{ $number }}</th>
                           <td scope="row">{{ $ppdquantiferon->labReportType->name}}</th>
                           <td>28/08/1981</td>
                           <td>28/08/1986</td>
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
                              <x-text-area name="note" placeholder="Enter note"/>
                           </td>
                        </tr>
                     @php $number++; @endphp
                     @endforeach
                     <tr>
                        <th scope="row">{{$tbpatientLabReport->count() + 1 }}</th>
                        <td>
                           <select>
                              @foreach($tbLabReportTypes as $tbLabReportType)
                                 <option value="{{ $tbLabReportType->id }}">{{ $tbLabReportType->name }}</option>
                              @endforeach
                           </select>
                        </td>
                        <td><input type="text" class="form-control" name="xraydate" value="10/24/1984" /></td>
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
         <button
                type="submit"
                class="btn btn-outline-green patient-detail-lab-report"
                name="Save">Save</button>
         </div>
      </div>
   </div>
</div>