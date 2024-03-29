<div class="app-vbc ppd_block p-3">
    <div class="add-new-patient">
        @role('clinician')
            <div class="icon"><img src="{{ asset('assets/img/icons/patient-img.svg') }}" class="img-fluid" /></div>
            <button type="button" onclick="onBroadCastOpen('{{ $patient->id }}')" class="btn btn-outline-green w-600 d-table mr-auto ml-auto mt-3" style="width: inherit;font-size: 18px;height: 36px;padding-left: 10px;padding-right: 10px;text-transform: uppercase;">RoadL Request<span></span></button>
        @endrole
        <div class="row">
            <div class="col-12 col-sm-1"></div>
            <div class="col-12 col-sm-10">
                <table class="table table-bordered table-hover mt-4 tb-list-order">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Sr. No.</th>
                            <th scope="col">Test Type</th>
                            <th scope="col">Insert/Screening Date</th>
                            <th scope="col" style="width: 11%">Expiry Date</th>
                            <th scope="col">Result</th>
                            @if(\Illuminate\Support\Facades\Auth::guard('partner')->check() || \Illuminate\Support\Facades\Auth::user()->roles->pluck('name')->toArray()[0] === 'clinician')
                                <th width="11%">Reports</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @php $number = 1; @endphp
                        @if(count($tbpatientLabReports) > 0)
                            @foreach($tbpatientLabReports as $tbpatientLabReport)
                                <x-hidden name="patient_lab_report_id" id="patient_lab_report_id" value="{{ $tbpatientLabReport->id }}" />
                                <tr class="tb-main-tr">
                                    <td scope="row">{{ $number }}</td>
                                    <td scope="row">{{ ($tbpatientLabReport->labReportType) ? $tbpatientLabReport->labReportType->name : ''}}</td>
                                    <td>{{ $tbpatientLabReport->due_date }}</td>
                                    <td>{{ $tbpatientLabReport->expiry_date }}</td>
                                    <td>{{ $tbpatientLabReport->result }}</td>
                                    @if(\Illuminate\Support\Facades\Auth::guard('partner')->check() || \Illuminate\Support\Facades\Auth::user()->roles->pluck('name')->toArray()[0] === 'clinician')
                                        <td class='text-center'>
                                            <input type="file" class="uploadLabResult" id="{{ $tbpatientLabReport->lab_report_type_id }}" data-id="{{ $tbpatientLabReport->patient_referral_id }}" >
                                        </td>
                                    @endif
                                </tr>
                                
                                @php $number++; @endphp
                            @endforeach
                        @else
                            <tr class="tb-main-tr no-record-tr"><td colspan="5" scope="row">No data available in table</td></tr>
                        @endif
                        
                        @if(\Illuminate\Support\Facades\Auth::guard('partner')->check() || \Illuminate\Support\Facades\Auth::user()->roles->pluck('name')->toArray()[0] === 'clinician')
                        <tr>
                            <div class="alert alert-danger print-error-msg" style="display:none">
                                <ul></ul>
                            </div>
                            <form>
                                @csrf
                                <td scope="row" class="tb-sequence">{{ (isset($tbpatientLabReports)) ? $tbpatientLabReports->count() + 1 : ''}}</td>
                                <td>
                                    <select name="lab_report_type_id" class="form-control tb_lab_report_types">
                                        <option value="">Select a test type</option>
                                        @foreach($tbLabReportTypes as $tbLabReportType)
                                            <option value="{{ $tbLabReportType->id }}">{{ $tbLabReportType->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('lab_report_type_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td><x-text name="lab_due_date" class="lab_due_date" /></td>
                                <x-hidden name="patient_referral_id" class="patient_referral_id" value="{{ $paient_id }}" />
                                <x-hidden name="lab_expiry_date" class="lab_expiry_date" />
                                
                                <td class="lab-expiry-date"></td>
                                <td>
                                    <select name="result" class="result" class="form-control">
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
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="col-12 col-sm-1"></div>
        </div>
        @if(\Illuminate\Support\Facades\Auth::guard('partner')->check() || \Illuminate\Support\Facades\Auth::user()->roles->pluck('name')->toArray()[0] === 'clinician')
            <div class="d-flex pt-4 justify-content-center">
                <button type="submit" class="btn btn-outline-green patient-detail-lab-report" name="Save">Save</button>
            </div>
        @endif
    </div>
</div>
