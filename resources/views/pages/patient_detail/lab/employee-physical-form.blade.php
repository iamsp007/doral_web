<div class="app-vbc ppd_block p-3">
    <div class="add-new-patient">
        <div class="icon"><img src="{{ asset('assets/img/icons/patient-img.svg') }}" class="img-fluid" /></div>
        
        <div class="row">
            <div class="col-12 col-sm-1"></div>
            <div class="col-12 col-sm-10">
                <table class="table table-bordered table-hover mt-4 physical-list-order">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Sr. No.</th>
                        <th scope="col">Test Type</th>
                        <th scope="col">Due Date</th>
                        <th scope="col">Performed Date</th>
                        <th scope="col">Expiry Date</th>
                        <th scope="col">Result</th>
                        <th width="11%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $number = 1; @endphp
                    @foreach($employeePhysicalForm as $employeePhysical)
                        <tr class="@if ($employeePhysical->result === 'Positive') bg-positive @endif physical-main-tr">
                            <td scope="row">{{ $number }}</td>
                            <td scope="row">{{ ($employeePhysical->labReportType) ? $employeePhysical->labReportType->name : ''}}</th>
                            <td>{{ $employeePhysical->due_date }}</td>
                            <td>{{ $employeePhysical->perform_date }}</td>
                            <td>{{ $employeePhysical->expiry_date }}</td>
                            <td>{{ $employeePhysical->result }}</td>
                            <td class='text-center'><span
                                    onclick="exploder('physical{{$number}}')" id="physical{{$number}}"
                                    class="exploder"><i
                                        class="las la-plus la-2x"></i></span>
                                <a href="javascript:void(0)" class="deleteLabResult" id="{{ $employeePhysical->id }}"><i
                                        class="las la-trash la-2x pl-4"></i></a>
                            </td>
                        </tr>
                        <tr class="explode1 d-none">
                            <td colspan="6">
                                <x-text-area name="note" placeholder="Enter note" value="{{$employeePhysical->note}}" class="note-area"/>
                                <x-hidden name="patient_lab_report_id" id="patient_lab_report_id" value="{{ $employeePhysical->id }}" />
                            </td>
                        </tr>
                        @php $number++; @endphp
                    @endforeach
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    <tr>
                        <form id="physicalScreenForm">
                            @csrf
                            <th scope="row" class="physical-sequence">{{ ($employeePhysical) ? $employeePhysicalForm->count() + 1 : '' }}</th>
                            <td>
                                <select name="lab_report_type_id" class="form-control physical_lab_report_types">
                                    <option value="">Select a test type</option>
                                    @foreach($employeePhysicalFormTypes as $employeePhysicalFormType)
                                        <option value="{{ $employeePhysicalFormType->id }}">{{ $employeePhysicalFormType->name }}</option>
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
