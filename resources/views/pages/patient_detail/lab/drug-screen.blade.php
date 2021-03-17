<div class="app-vbc ppd_block p-3">
    <div class="add-new-patient">
        <div class="icon"><img src="{{ asset('assets/img/icons/patient-img.svg') }}" class="img-fluid" /></div>
        <button type="button" onclick="onBroadCastOpen({{ $patient->id }})"
                class="btn btn-outline-green w-600 d-table mr-auto ml-auto mt-3"
                style="width: inherit;font-size: 18px;height: 36px;padding-left: 10px;padding-right: 10px;text-transform: uppercase;"
        >Add New Request <span></span>
        </button>
        <div class="row">
            <div class="col-12 col-sm-1"></div>
            <div class="col-12 col-sm-10">
                <table class="table table-bordered table-hover mt-4 drug-list-order">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Sr. No.</th>
                        <th scope="col">Test Type</th>
                        <th scope="col">Due Date</th>
                        <th scope="col">Performed Date</th>
                        <th scope="col">Expiry Date</th>
                        <th scope="col">Result</th>
                        <th width="11%">Reports</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $number = 1; @endphp
                    @foreach($drugLabReports as $drugLabReport)
                        <tr class="@if ($drugLabReport->result === '1') bg-positive @endif drug-main-tr">
                            <td scope="row">{{ $number }}</td>
                            <td scope="row">{{ ($drugLabReport->labReportType) ? $drugLabReport->labReportType->name : ''}}</th>
                            <td>{{ $drugLabReport->due_date }}</td>
                            <td>{{ $drugLabReport->perform_date }}</td>
                            <td>{{ $drugLabReport->expiry_date }}</td>
                            <td>{{ $drugLabReport->result }}</td>
                            <td class='text-center'>
<!--                                <span
                                    onclick="exploder('drug{{$number}}')" id="drug{{$number}}"
                                    class="exploder"><i
                                        class="las la-plus la-2x"></i></span>
                                <a href="javascript:void(0)" class="deleteLabResult" id="{{ $drugLabReport->id }}"><i
                                        class="las la-trash la-2x pl-4"></i></a>-->
                                <input type="file" class="uploadLabResult" onchange="singleLabReportUpload(this,'{{ $drugLabReport->labReportType->id }}')" id="{{ $drugLabReport->labReportType->id }}" data-id="{{ $drugLabReport->labReportType->id }}" >
                                <!--<i class="las la-upload la-2x pl-4" ></i>-->
                                </input>
                            </td>
                        </tr>
                        <tr class="explode1 d-none">
                            <td colspan="6">
                                <!--<x-text-area name="note" placeholder="Enter note" value="{{$drugLabReport->note}}" class="note-area"/>-->
                                <x-hidden name="patient_lab_report_id" id="patient_lab_report_id" value="{{ $drugLabReport->id }}" />
                            </td>
                        </tr>
                        @php $number++; @endphp
                    @endforeach
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    <tr>
                        <form id="drugScreenForm">
                            @csrf
                            <th scope="row" class="drug-sequence">{{ ($drugLabReports) ? $drugLabReports->count() + 1 : '' }}</th>
                            <td>
                                <select name="lab_report_type_id" class="form-control drug_lab_report_types">
                                    <option value="">Select a test type</option>
                                    @foreach($drugLabReportTypes as $drugLabReportType)
                                        <option value="{{ $drugLabReportType->id }}">{{ $drugLabReportType->name }}</option>
                                    @endforeach
                                </select>
                                @error('lab_report_type_id')
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </td>
                            <td><x-text name="lab_due_date" class="lab_due_date" /></td>
                            <td><x-text name="lab_perform_date" class="lab_perform_date" /></td>
                            <x-hidden name="patient_referral_id" class="patient_referral_id" value="{{ $paient_id }}" />
                            <x-hidden name="lab_expiry_date" class="lab_expiry_date" />
                            <td class="lab-expiry-date"></td>
                            <td>
                                <select name="result" class="form-control">
                                    <option value="">Select a result</option>
                                    @foreach(config('select.labResult') as $key => $labResult)
                                        <option value="{{ $key }}">{{ $labResult }}</option>
                                    @endforeach
                                </select>
                                @error('result')
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </td>
                            <td></td>
                        </form>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-12 col-sm-1"></div>
        </div>
        <div class="d-flex pt-4 justify-content-center">
            <button type="submit" class="btn btn-outline-green patient-detail-lab-report" name="Save">Save</button>
        </div>
    </div>
</div>
