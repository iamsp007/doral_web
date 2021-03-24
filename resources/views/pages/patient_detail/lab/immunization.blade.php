<div class="app-vbc ppd_block p-3">
    <div class="add-new-patient">
        @role('clinician')
            <div class="icon"><img src="{{ asset('assets/img/icons/patient-img.svg') }}" class="img-fluid" /></div>
            <button type="button" onclick="onBroadCastOpen('{{ $patient->id }}')" class="btn btn-outline-green w-600 d-table mr-auto ml-auto mt-3" style="width: inherit;font-size: 18px;height: 36px;padding-left: 10px;padding-right: 10px;text-transform: uppercase;">Add New Request<span></span></button>
        @endrole
        <div class="row">
            <div class="col-12 col-sm-1"></div>
            <div class="col-12 col-sm-10">
                <table class="table table-bordered table-hover mt-4 immue-list-order">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Sr.No.</th>
                            <th scope="col">Test Type</th>
                            <th scope="col">Due Date</th>
                            <th scope="col">Perform Date</th>
                            <th scope="col" style="width: 11%">Expiry Date</th>
                            <th scope="col">Titer</th>
                            <th scope="col">Result</th>
                            @role('clinician')
                                <th width="11%">Reports</th>
                            @endrole
                        </tr>
                    </thead>
                    <tbody>
                        @php $number = 1; @endphp
                        @if(count($immunizationLabReports) > 0)
                            @foreach($immunizationLabReports  as $immunizationLabReportType)
                                <x-hidden name="patient_lab_report_id" id="patient_lab_report_id" value="{{ $immunizationLabReportType->id }}" />
                                <tr class="immune-main-tr">
                                    <th scope="row">{{ $number }}</th>
                                    <td scope="row">{{ ($immunizationLabReportType->labReportType) ? $immunizationLabReportType->labReportType->name : ''}}</th>
                                    <td>{{ $immunizationLabReportType->due_date }}</td>
                                    <td>{{ $immunizationLabReportType->perform_date }}</td>
                                    <td>{{ $immunizationLabReportType->expiry_date }}</td>
                                    <td>{{ $immunizationLabReportType->titer }}</td>
                                    <td>{{ $immunizationLabReportType->result }}</td>
                                    @role('clinician')
                                        <td class='text-center'>
                                            <input type="file" class="uploadLabResult" id="{{ $immunizationLabReportType->labReportType->id }}" data-id="{{ $immunizationLabReportType->lab_report_type_id }}"></input>
                                        </td>
                                    @endrole
                                </tr>
                                @php $number++; @endphp
                            @endforeach
                        @else
                            <tr class="tb-main-tr no-record-tr"><td colspan="5" scope="row">No data available in table</td></tr>
                        @endif
                    @role('clinician')
                        <tr>
                            <form id="immunizationForm">
                                @csrf
                                <th scope="row" class="immue-sequence">{{ ($immunizationLabReports) ? $immunizationLabReports->count() + 1 : '' }}</th>
                                <td>
                                    <select name="lab_report_type_id" class="form-control immue_lab_report_types">
                                        <option value="">Select a test type</option>
                                        @foreach($immunizationLabReportTypes as $immunizationLabReportType)
                                            <option value="{{ $immunizationLabReportType->id }}">{{ $immunizationLabReportType->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><x-text name="lab_due_date" class="lab_due_date" /></td>
                                <td><x-text name="lab_perform_date" class="lab_perform_date" /></td>
                                <x-hidden name="patient_referral_id" class="patient_referral_id" value="{{ $paient_id }}" />
                                <x-hidden name="lab_expiry_date" class="lab_expiry_date" />
                               
                                <td class="lab-expiry-date"></td>
                                <td><x-text name="titer" class="titer" /></td>
                                <td>
                                    <select name="result" class="form-control">
                                        <option value="">Select a result</option>
                                        @foreach(config('select.labImmunizationResult') as $key => $labResult)
                                            <option value="{{ $key }}">{{ $labResult }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td></td>
                            </form>
                        </tr>
                    @endrole
                    </tbody>
                </table>
            </div>
            <div class="col-12 col-sm-1"></div>
        </div>
        @role('clinician')
            <div class="d-flex pt-4 justify-content-center">
                <button type="submit" class="btn btn-outline-green patient-detail-lab-report" name="Save">Save</button>
            </div>
        @endrole
    </div>
</div>
