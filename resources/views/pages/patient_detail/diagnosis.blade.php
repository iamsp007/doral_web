<div class="tab-pane fade" id="diagnosis" role="tabpanel" aria-labelledby="diagnosis-tab">
   <div class="app-card app-card-custom" data-name="diagnosis">
      <div class="app-card-header">
         <h1 class="title">Diagnosis</h1>
         <a href="javascript:void(0)" data-toggle="tooltip" id="{{ $patient->id }}" data-original-title="Due Report" class="btn btn-danger text-capitalize btn--sm cdoc_model" style="background: #006c76; color: #fff">Add Diagnosis</a>
      </div>
      <div class="head scrollbar scrollbar12">
         <div class="p-3">
            <table class="table table-bordered display responsive" id="employee-table" style="width: 100%;">
                  <x-hidden name="patient_id" class="cdoc_patient" value="{{ $patient->id }}" />
                  <thead class="thead-light">
                     <tr>
                        <th>Sr.No</th>
                        <th>ICD10 Code</th>
                        <th>Desc</th>
                        <th>Date Of Diagnosis</th>
                        <th>Historical As Of</th>
                        <th width="11%">Action</th>
                     </tr>
                  </thead>
               <tbody>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>