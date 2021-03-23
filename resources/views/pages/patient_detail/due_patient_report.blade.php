<div class="tab-pane fade" id="due_patients" role="tabpanel" aria-labelledby="due_patients-tab">
   <div class="app-card app-card-custom" data-name="due_patients">
      <div class="app-card-header"> <h1 class="title">Patient Report Details</h1></div>
      <div class="head scrollbar scrollbar12">
      <div class="p-3">
                  <table class="display responsive" id="due_patient_list" style="width: 100%;">
                  <x-hidden name="due_user_id" class="due_user_id" value="{{ $patient->id }}" />
                     <thead class="thead-light">
                        <tr>
                            <th>Sr No.</th>
                            <th>Report Type</th>
                           <th>Due Date</th>
                           <th>Result</th>
                        </tr>
                     </thead>
                     <tbody>
                      
                     </tbody>
                  </table>
                  </div>
              
      </div>
   </div>
  
</div>