<div class="tab-pane fade" id="immunization" role="tabpanel" aria-labelledby="immunization-tab">
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
                                <th width="11%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $number = 1; @endphp
                            @foreach($immunizationLabReports  as $immunizationLabReportType)
                                <tr>
                                    <th scope="row">{{ $number }}</th>
                                    <td scope="row">{{ ($immunizationLabReportType->labReportType) ? $immunizationLabReportType->labReportType->name : ''}}</th>
                                    <td>{{ $immunizationLabReportType->due_date }}</td>
                                    <td>{{ $immunizationLabReportType->perform_date }}</td>
                                    <td>{{ $immunizationLabReportType->expiry_date }}</td>
                                    <td>{{ $immunizationLabReportType->titer }}</td>
                                    <td>@if ($immunizationLabReportType->result === '1') Immune @else Non Immune  @endif</td>
                                    <td class='text-center'><span
                                        onclick="exploder('immune{{$number}}')" id="immune{{$number}}"
                                        class="exploder"><i
                                            class="las la-plus la-2x"></i></span>
                                        <a href="javascript:void(0)" class="deleteLabResult" data-id="{{ $immunizationLabReportType->id }}"><i
                                            class="las la-trash la-2x text-white pl-4"></i></a>
                                    </td>
                                </tr>
                                <tr class="explode1 d-none">
                                    <td colspan="6">
                                        <x-text-area name="note" id="note" placeholder="Enter note" value="{{$immunizationLabReportType->note}}"/>
                                        <x-hidden name="patient_lab_report_id" id="patient_lab_report_id" value="{{ $immunizationLabReportType->id }}" />
                                    </td>
                                </tr>
                                @php $number++; @endphp
                            @endforeach
                            <tr>
                                <form id="immunizationForm">
                                    @csrf
                                    <th scope="row">{{ ($immunizationLabReports) ? $immunizationLabReports->count() + 1 : '' }}</th>
                                    <td>
                                    <select name="lab_report_type_id" class="form-control">
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