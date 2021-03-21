<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Patient Due Report List</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeReferralPopup()">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <table class="table m-0 insurance-list-order">
                <thead class="thead-light">
                <tr>
                    <th>Report Type</th>
                    <th>Due Date</th>
                    <th>Result</th>
                </tr>
                </thead>
                <tbody>
                @foreach($patientData->patientLabReport as $data)
                    <tr>
                        <td>{{$data->labReportType->name}}</td>
                        <td>{{$data->due_date}}</td>
                        <td>{{$data->result}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>           
        </div>
    </div>
</div>
