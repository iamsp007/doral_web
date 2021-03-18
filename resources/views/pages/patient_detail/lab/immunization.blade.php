<div class="app-vbc ppd_block p-3">
    <div class="add-new-patient">
        <div class="icon"><img src="{{ asset('assets/img/icons/patient-img.svg') }}" class="img-fluid" /></div>
        @role('clinician')
            <button type="button" onclick="onBroadCastOpen({{ $patient->id }})"
                    class="btn btn-outline-green w-600 d-table mr-auto ml-auto mt-3"
                    style="width: inherit;font-size: 18px;height: 36px;padding-left: 10px;padding-right: 10px;text-transform: uppercase;"
            >Add New Request <span></span>
            </button>
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
                        <th scope="col">Expiry Date</th>
                        <th scope="col">Titer</th>
                        <th scope="col">Result</th>
                        @role('clinician')
                            <th width="11%">Reports</th>
                        @endrole
                        <!--<th width="11%">Reports</th>-->
                    </tr>
                    </thead>
                    <tbody>
                    @php $number = 1; @endphp
                    @foreach($immunizationLabReports  as $immunizationLabReportType)
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
                                    <!--<span
                                        onclick="exploder('immune{{$number}}')" id="immune{{$number}}"
                                        class="exploder"><i
                                            class="las la-plus la-2x"></i></span>-->
                                    <!--<a href="javascript:void(0)" class="deleteLabResult" data-id="{{ $immunizationLabReportType->id }}"><i class="las la-trash la-2x pl-4"></i></a>-->
                                    <input type="file" class="uploadLabResult" id="{{ $immunizationLabReportType->labReportType->id }}" data-id="{{ $immunizationLabReportType->lab_report_type_id }}" >
                                    <!--<i class="las la-upload la-2x pl-4" ></i>-->
                                    </input>
                                </td>
                            @endrole
                        </tr>
                        <tr class="explode1 d-none">
                            <td colspan="6">
                                <!--<x-text-area name="note" placeholder="Enter note" value="{{$immunizationLabReportType->note}}" class="note-area" />-->
                                <x-hidden name="patient_lab_report_id" id="patient_lab_report_id" value="{{ $immunizationLabReportType->id }}" />
                            </td>
                        </tr>
                        @php $number++; @endphp
                    @endforeach
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
