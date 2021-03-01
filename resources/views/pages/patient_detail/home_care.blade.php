<div class="tab-pane fade" id="homecare" role="tabpanel" aria-labelledby="homecare-tab">
   <div class="app-card app-card-custom" data-name="home_care">
      <div class="app-card-header">
         <h1 class="title mr-2">Home Care</h1>
         <img src="{{ asset('assets/img/icons/edit-field.svg') }}" data-toggle="tooltip" data-placement="bottom" title="Edit" class="cursor-pointer edit-icon" alt="" onclick="editAllField('homecare')">
         <img src="{{ asset('assets/img/icons/update-icon.svg') }}" style="display:none" data-toggle="tooltip" data-placement="bottom" title="Update" class="cursor-pointer update-icon" alt="" onclick="updateAllField('homecare')">
      </div>
      <div class="head scrollbar scrollbar4">
         <div class="p-3">
            <div class="form-group">
               <div class="row">
                  <div class="col-12 col-sm-4">
                     <div class="input_box">
                        <div class="ls"><i class="las la-user-nurse circle"></i></div>
                        <div class="rs">
                           <h3 class="_title">Name</h3>
                           <input type="text" class="form-control-plaintext _detail "
                              readonly name="name" data-id="name"
                              onclick="editableField('name')" id="name"
                              placeholder="" value="">
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-sm-4">
                     <div class="input_box">
                        <div class="ls"><i class="las la-user-nurse circle"></i></div>
                        <div class="rs">
                           <h3 class="_title">Coordinator</h3>
                           <input type="text" class="form-control-plaintext _detail "
                              readonly name="coordinator1" data-id="coordinator1"
                              onclick="editableField('coordinator1')" id="coordinator1"
                              placeholder="" value="">
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
                              placeholder="" value="">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row mt-3">
               <div class="col-12 col-sm-12">
                  <div class="input_box mb-3">
                     <div class="ls"><i class="las la-map-marker circle"></i></div>
                     <div class="rs">
                        <h3 class="_title">Address</h3>
                        <!-- <h1 class="_detail">4009 Heron Way, Portland OR Oregon,
                           <span>97232</span>
                        </h1> -->
                        <textarea id="hc_address" name="hc_address" rows="4" cols="62"
                           class="form-control-plaintext _detail " readonly
                           onclick="editableField('hc_address')"
                           placeholder=""
                           value=""></textarea>
                        <!-- <a class="btn btn-info btn-sm ml-2 collapsed" data-toggle="collapse" href="#collapseExample11" aria-expanded="false"><i class="las la-map-marker"></i>View
                           Map</a> -->
                     </div>
                  </div>
               </div>
            </div>
            <div class="app-card app-card-custom box-shadow-none no-minHeight mt-3"
               data-name="administrator_detail">
               <div class="app-card-header">
                  <h1 class="title">Administrator Detail</h1>
               </div>
               <div class="head">
                  <div class="p-3">
                     <div class="row">
                        <div class="col-12 col-sm-4">
                           <div class="input_box">
                              <div class="ls"><i class="las la-user-nurse circle"></i></div>
                              <div class="rs">
                                 <h3 class="_title">Name</h3>
                                 <input type="text" class="form-control-plaintext _detail "
                                    readonly name="a_name" data-id="a_name"
                                    onclick="editableField('a_name')" id="a_name"
                                    placeholder="" value="">
                              </div>
                           </div>
                        </div>
                        <div class="col-12 col-sm-4">
                           <div class="input_box">
                              <div class="ls"><i class="las la-user-nurse circle"></i></div>
                              <div class="rs">
                                 <h3 class="_title">Phone</h3>
                                 <input type="tel" class="form-control-plaintext _detail "
                                    readonly name="a_phone" data-id="a_phone"
                                    onclick="editableField('a_phone')" id="a_phone"
                                    onkeyup="this.value=this.value.replace(/[^\d]/,'')"
                                    placeholder="" value="">
                              </div>
                           </div>
                        </div>
                        <div class="col-12 col-sm-4"></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="app-card app-card-custom box-shadow-none no-minHeight mt-3"
               data-name="caregiver_detail">
               <div class="app-card-header">
                  <h1 class="title">Caregiver Detail</h1>
                  <button type="button" class="btn btn-sm btn-info" onclick='updateCaregiver("{{ $patient->patient_id }}")'> Check Update</button>
               </div>
               <div class="head">
                  <div class="p-3">
                     <div class="row">
                        <div class="col-12 col-sm-3">
                           <div class="input_box">
                              <div class="ls"><i class="las la-user-nurse circle"></i></div>
                              <div class="rs">
                                 <h3 class="_title">Caregiver Name</h3>
                                 <input type="text" class="form-control-plaintext _detail "
                                    readonly name="c_name" data-id="c_name"
                                    onclick="editableField('c_name')" id="c_name"
                                    placeholder="" value="{{ ($patient->visitorDetail) ? $patient->visitorDetail->first_name.' '.$patient->visitorDetail->last_name : '' }}">
                              </div>
                           </div>
                        </div>
                        <div class="col-12 col-sm-3">
                           <div class="input_box">
                              <div class="ls"><i class="las la-user-nurse circle"></i></div>
                              <div class="rs">
                                 <h3 class="_title">Caregiver Code</h3>
                                 <input type="text" class="form-control-plaintext _detail "
                                    readonly name="caregiver_code" data-id="caregiver_code"
                                    onclick="editableField('caregiver_code')" id="caregiver_code"
                                    placeholder="" value="{{ ($patient->visitorDetail) ? $patient->visitorDetail->caregiver_code : '' }}">
                              </div>
                           </div>
                        </div>
                        <div class="col-12 col-sm-3">
                           <div class="input_box">
                              <div class="ls"><i class="las la-user-nurse circle"></i></div>
                              <div class="rs">
                                 <h3 class="_title">Caregiver ID</h3>
                                 <input type="text" class="form-control-plaintext _detail "
                                    readonly name="caregiver_id" data-id="caregiver_id"
                                    onclick="editableField('caregiver_id')" id="caregiver_id"
                                    placeholder="" value="{{ ($patient->visitorDetail) ? $patient->visitorDetail->caregiver_id : '' }}">
                              </div>
                           </div>
                        </div>
                        <div class="col-12 col-sm-3">
                           <div class="input_box">
                              <div class="ls"><i class="las la-user-nurse circle"></i></div>
                              <div class="rs">
                                 <h3 class="_title">Visit Date</h3>
                                 <input type="text" class="form-control-plaintext _detail "
                                    readonly name="visit_date" data-id="visit_date"
                                    onclick="editableField('visit_date')" id="visit_date"
                                    placeholder="" value="{{ ($patient->visitorDetail) ? $patient->visitorDetail->visit_date : '' }}">
                              </div>
                           </div>
                        </div>
                        <div class="col-12 col-sm-3">
                           <div class="input_box">
                              <div class="ls"><i class="las la-user-nurse circle"></i></div>
                              <div class="rs">
                                 <h3 class="_title">Schedule Start Time</h3>
                                 <input type="text" class="form-control-plaintext _detail "
                                    readonly name="schedule_end_time" data-id="schedule_end_time"
                                    onclick="editableField('schedule_end_time')" id="schedule_end_time"
                                    placeholder="" value="{{ ($patient->visitorDetail) ? $patient->visitorDetail->schedule_start_time : '' }}">
                              </div>
                           </div>
                        </div>
                        <div class="col-12 col-sm-3">
                           <div class="input_box">
                              <div class="ls"><i class="las la-user-nurse circle"></i></div>
                              <div class="rs">
                                 <h3 class="_title">Schedule End Time</h3>
                                 <input type="text" class="form-control-plaintext _detail "
                                    readonly name="schedule_end_time" data-id="schedule_end_time"
                                    onclick="editableField('schedule_end_time')" id="schedule_end_time"
                                    placeholder="" value="{{ ($patient->visitorDetail) ? $patient->visitorDetail->schedule_end_time : '' }}">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="app-card app-card-custom box-shadow-none no-minHeight mt-3"
               data-name="history">
               <div class="app-card-header">
                  <h1 class="title">History</h1>
               </div>
               <div class="head">
                  <div class="p-3">
                     <table class="table table-bordered" style="width: 100%;"
                        id="employee-table">
                        <thead class="thead-inverse">
                           <tr>
                              <th>Name</th>
                              <th>Phone No</th>
                              <th>Schedule Start Date Time</th>
                              <th>Schedule End Date Time</th>
                           </tr>
                        </thead>
                        <tbody>
                              <?php
//                                              echo "<pre>";
//                                              print_r($patient->visitorDetail);
//                                              exit();
                              ?>
                              <tr>
                                    <td class="text-green"></td>
                                    <td>
<!--                                                        <a href="javascript:void(0)"
                                          class="patient_phone_no">
                                       </a>-->
                                    </td>
                                    <td></td>
                                    <td></td>
                              </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
<!--                              <div class="app-card app-card-custom box-shadow-none no-minHeight mt-3"
               data-name="caregiver_interaction_detail">
               <div class="app-card-header">
                  <h1 class="title">Caregiver Interaction Detail</h1>
               </div>
               <div class="head">
                  <div class="p-3">
                     <table class="table table-bordered mb-0" style="width: 100%;"
                        id="employee-table">
                        <thead class="thead-inverse">
                           <tr>
                              <th>Infraction</th>
                              <th>Sent Date and Time</th>
                              <th>Response Date and Time</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td class="text-green"><a
                                    href="javascript:void(0)">Infraction</a></td>
                              <td>Sunday, 1 October 2020</td>
                              <td>Wednesday, 4 October 2020</td>
                              <td>
                                 <a href="referral_user_profile.html"
                                    class="btn btn-info btn-sm btn-block">Action Taken</a>
                              </td>
                           </tr>
                           <tr>
                              <td class="text-green"><a
                                    href="javascript:void(0)">Infraction</a> </td>
                              <td>Sunday, 1 October 2020</td>
                              <td>Wednesday, 4 October 2020</td>
                              <td>
                                 <a href="referral_user_profile.html"
                                    class="btn btn-info btn-sm btn-block">Action Taken</a>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            <div class="app-card app-card-custom box-shadow-none no-minHeight mt-3"
               data-name="value_base_care_detail">
               <div class="app-card-header">
                  <h1 class="title">Value Base Care Detail</h1>
               </div>
               <div class="head">
                  <div class="p-3">
                     <div class="_card">
                        <div class="_card_header">
                           <div class="title-head"><span style="font-weight: bold;">Q:</span>
                                 is simply dummy text of the printing and
                              typesetting industry?
                           </div>
                        </div>
                        <div class="_card_body">
                           <h1 class="_title"><span style="font-weight: bold;">Ans:</span>
                              
                              has been the industry's standard dummy text ever since the
                              1500s.
                           </h1>
                        </div>
                     </div>
                     <div class="_card mt-3">
                        <div class="_card_header">
                           <div class="title-head"><span style="font-weight: bold;">Q:</span>
                                 is simply dummy text of the printing and
                              typesetting industry?
                           </div>
                        </div>
                        <div class="_card_body">
                           <h1 class="_title"><span style="font-weight: bold;">Ans:</span>
                              
                              has been the industry's standard dummy text ever since the
                              1500s.
                           </h1>
                        </div>
                     </div>
                     <div class="_card mt-3">
                        <div class="_card_header">
                           <div class="title-head"><span style="font-weight: bold;">Q:</span>
                                 is simply dummy text of the printing and
                              typesetting industry?
                           </div>
                        </div>
                        <div class="_card_body">
                           <h1 class="_title"><span style="font-weight: bold;">Ans:</span>
                              
                              has been the industry's standard dummy text ever since the
                              1500s.
                           </h1>
                        </div>
                     </div>
                  </div>
               </div>
            </div>-->
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