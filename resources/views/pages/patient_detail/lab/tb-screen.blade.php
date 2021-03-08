<div class="app-vbc ppd_block p-3">
    <div class="add-new-patient">
        <div class="icon"><img src="{{ asset('assets/img/icons/patient-img.svg') }}" class="img-fluid" /></div>
        <button type="submit"
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
                            <button type="submit"
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
                <table class="table table-bordered table-hover mt-4 tb-list-order">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Sr. No.</th>
                        <th scope="col">Test Type</th>
                        <th scope="col">Insert/Screening Date</th>
                        <th scope="col">Expiry Date</th>
                        <th scope="col">Result</th>
                        <th width="11%">Notes</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $number = 1; @endphp

                    @foreach($tbpatientLabReports as $tbpatientLabReport)
                        <tr class="@if ($tbpatientLabReport->result === '1') bg-positive @endif tb-main-tr">
                            <th scope="row">{{ $number }}</th>
                            <td scope="row">{{ ($tbpatientLabReport->labReportType) ? $tbpatientLabReport->labReportType->name : ''}}</th>

                            <td><?php echo date('m-d-Y',strtotime($tbpatientLabReport->due_date)); ?></td>
                            <td><?php echo date('m-d-Y',strtotime($tbpatientLabReport->expiry_date)); ?></td>
                            <td>{{ $tbpatientLabReport->result }}</td>
                            <td class='text-center'><span
                                    onclick="exploder('tb{{$number}}')" id="tb{{$number}}"
                                    class="exploder"><i
                                        class="las la-plus la-2x"></i></span>
                                <a href="javascript:void(0)" class="deleteLabResult" id="{{ $tbpatientLabReport->id }}" data-id="{{ $tbpatientLabReport->patient_referral_id }}"><i class="las la-trash la-2x pl-4" ></i></a>
                                <input type="file" class="uploadLabResult" onchange="singleLabReportUpload(this,{{ $tbpatientLabReport->labReportType->id }})" id="{{ $tbpatientLabReport->lab_report_type_id }}" data-id="{{ $tbpatientLabReport->patient_referral_id }}" ><i class="las la-upload la-2x pl-4" ></i></input>
                            </td>
                        </tr>
                        <tr class="explode1 d-none">
                            <td colspan="6">
                                <x-text-area name="note" placeholder="Enter note" value="{{$tbpatientLabReport->note}}" class="note-area"/>
                                <x-hidden name="patient_lab_report_id" id="patient_lab_report_id" value="{{ $tbpatientLabReport->id }}" />
                            </td>
                        </tr>
                        @php $number++; @endphp
                    @endforeach
                    <tr>
                        <div class="alert alert-danger print-error-msg" style="display:none">
                            <ul></ul>
                        </div>
                        <form id="tbScreenForm">
                            @csrf
                            <th scope="row" class="tb-sequence">{{ (isset($tbpatientLabReports)) ? $tbpatientLabReports->count() + 1 : ''}}</th>
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
