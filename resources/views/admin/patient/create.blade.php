@extends('pages.layouts.app')
@section('title','Clinician Details')
@section('pageTitleSection')
    Add Patient
@endsection

@section('content')
    <!-- Demographics Start Here -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <form class="add_patient_form">
    @csrf
        <table class="table table-borderless table-sm patientTable shadow">
            <thead>
                <tr class="table-active">
                    <td>
                        Demographics
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="p-0">
                        <table class="table table-borderless table-sm m-0">
                            <tbody>

                                <tr>
                                    <th class="p-0">
                                        <table class="table table-borderless border-0 m-0">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 30%;" class="text-right border-0">
                                                        <span class="mendate">*</span> Referral :
                                                    </td>
                                                    <td class="border-0" style="width: 70%;">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div style="width: 50%;">
                                                                <select name="company_id" id="company_id" class="input-small-skin select2">
                                                                    <option selected="selected" value="">Select a company</option>
                                                                    @foreach ($companies as $key => $company)
                                                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div style="width: 50%;">
                                                                <table style="width: 100%;">
                                                                    <tr>
                                                                        <td style="width: 30%;" class="text-right border-0">
                                                                        <span class="mendate">*</span> Service :
                                                                        </td>
                                                                        <td class="border-0" style="width: 70%;padding-right: 0;">
                                                                            <select name="service_id" id="service_id" class="input-small-skin select2">
                                                                                <option selected="selected" value="">Select a service</option>
                                                                                
                                                                                @foreach ($services as $key => $service)
                                                                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 30%;" class="text-right border-0">
                                                        <span class="mendate">*</span> First Name :
                                                    </td>
                                                    <td class="border-0" style="width: 70%;">
                                                        <input type="text" class="input-small-skin" name="first_name" id="first_name">
                                                        @if ($errors->has('first_name'))
                                                            <span class="invalid feedback"role="alert">
                                                                <strong class="alert alert-danger">{{ $errors->first('first_name') }}.</strong>
                                                            </span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 30%;" class="text-right border-0">
                                                        <span class="mendate">*</span> Last Name :
                                                    </td>
                                                    <td class="border-0" style="width: 70%;">
                                                        <input type="text" class="input-small-skin" name="last_name" id="last_name">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 30%;" class="text-right border-0">
                                                        <span class="mendate">*</span> Email :
                                                    </td>
                                                    <td class="border-0" style="width: 70%;">
                                                        <input type="text" class="input-small-skin email_format" name="email" id="email">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 30%;" class="text-right border-0">
                                                        <span class="mendate">*</span> Gender :
                                                    </td>
                                                    <td class="border-0" style="width: 70%;">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div style="width: 45%;">
                                                                <select name="gender" id="Gender" class="input-small-skin select2">
                                                                <option selected="selected" value="">Select a gender</option>
                                                                    @foreach (config('select.gender') as $key => $gender)
                                                                        <option value="{{ $key }}">{{ $gender }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div style="width: 55%;">
                                                                <table style="width: 100%;">
                                                                    <tr>
                                                                        <td style="width: 40%;" class="text-right border-0">
                                                                        Marital Status :
                                                                        </td>
                                                                        <td class="border-0" style="width: 80%;padding-right: 0;">
                                                                            <select class="input-small-skin" name="marital_status" id="marital_status">
                                                                                <option>Marital Status</option>
                                                                                <option value="married">Single</option>
                                                                                <option value="married">Married</option>
                                                                                <option value="widowed">Widowed</option>
                                                                                <option value="separated">Separated</option>
                                                                                <option value="divorced">Divorced</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 30%;" class="text-right border-0">
                                                        Ethnicity :
                                                    </td>
                                                    <td class="border-0" style="width: 70%;">
                                                        <select name="ethnicity" id="ethnicity" class="input-small-skin select2">
                                                            <option selected="selected" value="">Select a ethnicity</option>
                                                            @foreach (config('select.ethnicity') as $key => $ethnicity)
                                                                <option value="{{ $key }}">{{ $ethnicity }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 30%;" class="text-right border-0">
                                                        <span class="mendate">*</span> Service Request Start Date :
                                                    </td>
                                                    <td class="border-0" style="width: 70%;">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div style="width: 45%;">
                                                                <input type="text" name="serviceRequestStartDate" class="input-small-skin">
                                                            </div>
                                                            <div style="width: 55%;">
                                                                <table style="width: 100%;">
                                                                    <tr>
                                                                        <td style="width: 20%;" class="text-right border-0">
                                                                            Race :
                                                                        </td>
                                                                        <td class="border-0" style="width: 80%;padding-right: 0;">
                                                                            <select name="race" id="race" class="input-small-skin select2">
                                                                                <option selected="selected" value="">Select a race</option>
                                                                                @foreach (config('select.race') as $key => $race)
                                                                                    <option value="{{$key}}">{{$race}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!-- <tr>
                                                    <td style="width: 30%;" class="text-right border-0">
                                                        Service Request Start Date :
                                                    </td>
                                                    <td class="border-0" style="width: 70%;">
                                                        <input type="text" name="serviceRequestStartDate" class="input-small-skin">
                                                    </td>
                                                </tr>
                                               -->
                                                <!-- <tr>
                                                    <td style="width: 30%;" class="text-right border-0">
                                                        Source Of Admission :
                                                    </td>
                                                    <td class="border-0" style="width: 70%;">
                                                        <select name="SourceOfAdmission" id="SourceOfAdmission" class="input-small-skin select2" disabled>
                                                            <option selected="selected" value="">Select</option>
                                                            <option value="26068">Assistant live-in facilities</option>
                                                            <option value="213">CHHA</option>
                                                            <option value="543">Hospice</option>
                                                            <option value="208">Hospital</option>
                                                            <option value="215">LHCSA</option>
                                                            <option value="216">Local social services/Casa</option>
                                                            <option value="214">LTHHCP</option>
                                                            <option value="12761">MCO</option>
                                                            <option value="9300">MLTC</option>
                                                            <option value="209">Physician</option>
                                                            <option value="211">RHCF</option>
                                                            <option value="210">self/family/friend</option>
                                                            <option value="212">Other Institution</option>
                                                            <option value="217">Other community agency</option>
                                                            <option value="218">Other</option>
                                                        </select>
                                                    </td>
                                                </tr> -->
                                                <!-- <tr>
                                                    <td style="width: 30%;" class="text-right border-0">
                                                        Team :
                                                    </td>
                                                    <td class="border-0" style="width: 70%;">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div style="width: 45%;">
                                                                <select name="Team" id="Team" class="input-small-skin select2" disabled>
                                                                    <option selected="selected" value="">Select</option>
                                                                </select>
                                                            </div>
                                                            <div style="width: 55%;">
                                                                <table style="width: 100%;">
                                                                    <tr>
                                                                        <td style="width: 21%;" class="text-right border-0">
                                                                            Location :
                                                                        </td>
                                                                        <td class="border-0" style="width: 79%;padding-right: 0;">
                                                                            <select name="Location" id="Location" class="input-small-skin select2" disabled>
                                                                                <option selected="selected" value="">Select</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr> -->
                                                <!-- <tr>
                                                    <td style="width: 30%;" class="text-right border-0">
                                                        <span class="mendate">*</span> Accepted Services :
                                                    </td>
                                                    <td class="border-0" style="width: 70%;">
                                                        <div class="checkForm">
                                                            <div class="blocks">
                                                                <label>
                                                                    <input type="checkbox" name="accepted_services[]">
                                                                    <span style="font-size:12px; padding-left: 25px;">PCA</span>
                                                                </label>
                                                            </div>
                                                            <div class="blocks">
                                                                <label>
                                                                    <input type="checkbox" name="accepted_services[]">
                                                                    <span
                                                                        style="font-size:12px; padding-left: 25px;">HHA</span>
                                                                </label>
                                                            </div>
                                                            <div class="blocks">
                                                                <label>
                                                                    <input type="checkbox" name="accepted_services[]">
                                                                    <span
                                                                        style="font-size:12px; padding-left: 25px;">RN</span>
                                                                </label>
                                                            </div>
                                                            <div class="blocks">
                                                                <label>
                                                                    <input type="checkbox">
                                                                    <span
                                                                        style="font-size:12px; padding-left: 25px;">LPN</span>
                                                                </label>
                                                            </div>
                                                            <div class="blocks">
                                                                <label>
                                                                    <input type="checkbox">
                                                                    <span
                                                                        style="font-size:12px; padding-left: 25px;">PT</span>
                                                                </label>
                                                            </div>
                                                            <div class="blocks">
                                                                <label>
                                                                    <input type="checkbox">
                                                                    <span
                                                                        style="font-size:12px; padding-left: 25px;">OT</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="checkForm">
                                                            <div class="blocks">
                                                                <label>
                                                                    <input type="checkbox">
                                                                    <span
                                                                        style="font-size:12px; padding-left: 25px;">ST</span>
                                                                </label>
                                                            </div>
                                                            <div class="blocks">
                                                                <label>
                                                                    <input type="checkbox">
                                                                    <span
                                                                        style="font-size:12px; padding-left: 25px;">MSW</span>
                                                                </label>
                                                            </div>
                                                            <div class="blocks">
                                                                <label>
                                                                    <input type="checkbox">
                                                                    <span
                                                                        style="font-size:12px; padding-left: 25px;">HSK</span>
                                                                </label>
                                                            </div>
                                                            <div class="blocks">
                                                                <label>
                                                                    <input type="checkbox">
                                                                    <span
                                                                        style="font-size:12px; padding-left: 25px;">HMK</span>
                                                                </label>
                                                            </div>
                                                            <div class="blocks">
                                                                <label>
                                                                    <input type="checkbox">
                                                                    <span
                                                                        style="font-size:12px; padding-left: 25px;">NT</span>
                                                                </label>
                                                            </div>
                                                            <div class="blocks">
                                                                <label>
                                                                    <input type="checkbox">
                                                                    <span
                                                                        style="font-size:12px; padding-left: 25px;">RT</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="checkForm">
                                                            <div class="blocks">
                                                                <label>
                                                                    <input type="checkbox">
                                                                    <span
                                                                        style="font-size:12px; padding-left: 25px;">PA</span>
                                                                </label>
                                                            </div>
                                                            <div class="blocks">
                                                                <label>
                                                                    <input type="checkbox">
                                                                    <span
                                                                        style="font-size:12px; padding-left: 25px;">HCSS</span>
                                                                </label>
                                                            </div>
                                                            <div class="blocks">
                                                                <label>
                                                                    <input type="checkbox">
                                                                    <span
                                                                        style="font-size:12px; padding-left: 25px;">CNA</span>
                                                                </label>
                                                            </div>
                                                            <div class="blocks">
                                                                <label>
                                                                    <input type="checkbox">
                                                                    <span
                                                                        style="font-size:12px; padding-left: 25px;">COMP</span>
                                                                </label>
                                                            </div>
                                                            <div class="blocks">
                                                                <label>
                                                                    <input type="checkbox">
                                                                    <span
                                                                        style="font-size:12px; padding-left: 25px;">APC</span>
                                                                </label>
                                                            </div>
                                                            <div class="blocks">
                                                                <label>
                                                                    <input type="checkbox">
                                                                    <span
                                                                        style="font-size:12px; padding-left: 25px;">SCM</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="checkForm">
                                                            <div class="blocks">
                                                                <label>
                                                                    <input type="checkbox">
                                                                    <span
                                                                        style="font-size:12px; padding-left: 25px;">SCI</span>
                                                                </label>
                                                            </div>
                                                            <div class="blocks">
                                                                <label>
                                                                    <input type="checkbox">
                                                                    <span
                                                                        style="font-size:12px; padding-left: 25px;">ILST</span>
                                                                </label>
                                                            </div>
                                                            <div class="blocks">
                                                                <label>
                                                                    <input type="checkbox">
                                                                    <span
                                                                        style="font-size:12px; padding-left: 25px;">PBIS</span>
                                                                </label>
                                                            </div>
                                                            <div class="blocks">
                                                                <label>
                                                                    <input type="checkbox">
                                                                    <span
                                                                        style="font-size:12px; padding-left: 25px;">RESP</span>
                                                                </label>
                                                            </div>
                                                            <div class="blocks">
                                                                <label>
                                                                    <input type="checkbox">
                                                                    <span
                                                                        style="font-size:12px; padding-left: 25px;">ESC</span>
                                                                </label>
                                                            </div>
                                                            <div class="blocks">
                                                                <label>
                                                                    <input type="checkbox">
                                                                    <span
                                                                        style="font-size:12px; padding-left: 25px;">SDP</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="checkForm">
                                                            <div class="blocks">
                                                                <label>
                                                                    <input type="checkbox">
                                                                    <span
                                                                        style="font-size:12px; padding-left: 25px;">CBSA</span>
                                                                </label>
                                                            </div>
                                                            <div class="blocks">
                                                                <label>
                                                                    <input type="checkbox">
                                                                    <span
                                                                        style="font-size:12px; padding-left: 25px;">Non
                                                                        Skilled</span>
                                                                </label>
                                                            </div>
                                                            <div class="blocks">
                                                                <label>
                                                                    <input type="checkbox">
                                                                    <span
                                                                        style="font-size:12px; padding-left: 25px;">Skilled</span>
                                                                </label>
                                                            </div>
                                                            <div class="blocks">
                                                                <label>
                                                                    <input type="checkbox">
                                                                    <span
                                                                        style="font-size:12px; padding-left: 25px;">PC</span>
                                                                </label>
                                                            </div>
                                                            <div class="blocks">
                                                                <label>
                                                                    <input type="checkbox">
                                                                    <span
                                                                        style="font-size:12px; padding-left: 25px;">CH</span>
                                                                </label>
                                                            </div>
                                                            <div class="blocks">
                                                                <label>
                                                                    <input type="checkbox">
                                                                    <span
                                                                        style="font-size:12px; padding-left: 25px;">SPC</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="checkForm">
                                                            <div class="blocks">
                                                                <label>
                                                                    <input type="checkbox">
                                                                    <span
                                                                        style="font-size:12px; padding-left: 25px;">SHHA</span>
                                                                </label>
                                                            </div>
                                                            <div class="blocks">
                                                                <label>
                                                                    <input type="checkbox">
                                                                    <span
                                                                        style="font-size:12px; padding-left: 25px;">SHC</span>
                                                                </label>
                                                            </div>
                                                            <div class="blocks">
                                                                <label>
                                                                    <input type="checkbox">
                                                                    <span
                                                                        style="font-size:12px; padding-left: 25px;">NINS</span>
                                                                </label>
                                                            </div>
                                                            <div class="blocks"></div>
                                                            <div class="blocks"></div>
                                                            <div class="blocks"></div>
                                                        </div>
                                                    </td>
                                                </tr> -->
                                                
                                               
                                            </tbody>
                                        </table>
                                    </th>
                                    <th class="p-0" style="width: 50%;vertical-align: top!important;">
                                        <table class="table table-borderless border-0">
                                            <tbody>
                                                <!-- <tr>
                                                    <td style="width: 30%;" class="text-right border-0">
                                                        Middle Name :
                                                    </td>
                                                    <td class="border-0" style="width: 70%;">
                                                        <input type="text" class="input-small-skin" disabled>
                                                    </td>
                                                </tr> -->
                                                <tr>
                                                    <td style="width: 30%;" class="text-right border-0">
                                                        <span class="mendate">*</span> DOB :
                                                    </td>
                                                    <td class="border-0" style="width: 70%;">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between">
                                                            <div style="width: 45%;">
                                                                <input type="text" name="dateOfBirth" class="input-small-skin">
                                                  
                                                            </div>
                                                            <!-- <div style="width: 55%;">
                                                                <table style="width: 100%;">
                                                                    <tr>
                                                                        <td style="width: 30%;" class="text-right border-0">
                                                                            <span class="mendate">*</span>Coordinator :
                                                                        </td>
                                                                        <td class="border-0"
                                                                            style="width: 70%;padding-right: 0;">
                                                                            <select name="Coordinator" id="Coordinator" class="input-small-skin select2" disabled>
                                                                                <option selected="selected" value="">Select </option>
                                                                                <option value="29140">Abu</option>
                                                                                <option value="28689">Alicia</option>
                                                                                <option value="38046">Amna</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div> -->
                                                            <div style="width: 55%;">
                                                                <table style="width: 100%;">
                                                                    <tr>
                                                                        <td style="width: 30%;" class="text-right border-0">
                                                                            <span class="mendate">*</span>SSN :# :
                                                                        </td>
                                                                        <td class="border-0" style="width: 70%;padding-right: 0;">
                                                                            <input type="text" maxlength="11" class="input-small-skin ssn_format" name="ssn" id="ssn" placeholder="(e.g. xxx-xx-xxxx)">
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                           
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!-- <tr>
                                                    <td style="width: 30%;" class="text-right border-0">
                                                        Coordinator 2 :
                                                    </td>
                                                    <td class="border-0" style="width: 70%;">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div style="width: 45%;">
                                                                <select name="Coordinator2" id="Coordinator2" class="input-small-skin select2" disabled>
                                                                    <option selected="selected" value=""> Select</option>
                                                                    <option value="29140">Abu</option>
                                                                    <option value="28689">Alicia</option>
                                                                </select>
                                                            </div>
                                                            <div style="width: 55%; padding-right: 0;">
                                                                <table style="width: 100%;">
                                                                    <tr>
                                                                        <td style="width: 30%;" class="text-right border-0">
                                                                            Nurse :
                                                                        </td>
                                                                        <td class="border-0" style="width: 70%;padding-right: 0;">
                                                                            <select name="Nurse" id="Nurse" class="input-small-skin select2" disabled>
                                                                                <option selected="selected" value="">Select</option>
                                                                                <option value="29140">Abu</option>
                                                                                <option value="28689">Alicia</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr> -->
                                                <!-- <tr>
                                                    <td style="width: 30%;" class="text-right border-0">
                                                        EVV Required :
                                                    </td>
                                                    <td class="border-0" style="width: 70%;">
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <label>
                                                                    <input type="checkbox">
                                                                    <span style="font-size:12px"></span>
                                                                </label>
                                                            </div>
                                                            <div>
                                                                <table>
                                                                    <tr>
                                                                        <td style="width: 90%;"
                                                                            class="text-right border-0">
                                                                            Enable FOB Confirmation :
                                                                        </td>
                                                                        <td class="border-0"
                                                                            style="width: 10%;">
                                                                            <label>
                                                                                <input type="checkbox">
                                                                                <span
                                                                                    style="font-size:12px"></span>
                                                                            </label>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr> -->
                                                <!-- <tr>
                                                    <td style="width: 30%;" class="text-right border-0">
                                                        Doral ID :
                                                    </td>
                                                    <td class="border-0" style="width: 70%;">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div style="width: 45%;">
                                                                <input type="text" class="input-small-skin" name="doral_id" id="doral_id" value="{{ createDoralId() }}" readonly>
                                                            </div>
                                                            <div style="width: 55%;padding-right: 0;">
                                                                <table style="width: 100%;">
                                                                    <tr>
                                                                        <td style="width: 45%;" class="text-right border-0">Medicaid Number :</td>
                                                                        <td class="border-0" style="width: 55%;padding-right: 0;" maxlength="20">
                                                                            <input type="text" class="input-small-skin" name="medicaid_number" id="medicaid_number">
                                                                            <span class="medicaid_number-invalid-feedback text-danger" role="alert" maxlength="8"></span>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr> -->
                                                <tr>
                                                    <td style="width: 30%;" class="text-right border-0">
                                                        Medicare Number :
                                                    </td>
                                                    <td class="border-0" style="width: 70%;">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div style="width: 45%;">
                                                                <input type="text" class="input-small-skin" maxlength="11" name="medicare_number" id="medicare_number">
                                                            </div>
                                                            <div style="width: 55%;padding-right: 0;">
                                                                <table style="width: 100%;">
                                                                    <tr>
                                                                        <td style="width: 45%;" class="text-right border-0">Medicaid Number :</td>
                                                                        <td class="border-0" style="width: 55%;padding-right: 0;" maxlength="20">
                                                                            <input type="text" class="input-small-skin" name="medicaid_number" id="medicaid_number">
                                                                            <span class="medicaid_number-invalid-feedback text-danger" role="alert" maxlength="8"></span>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <!-- <div style="width: 55%;">
                                                                <table style="width: 100%;">
                                                                    <tr>
                                                                        <td style="width:45%;" class="text-right border-0">HI Claim Number :</td>
                                                                        <td class="border-0" style="width:55%;padding-right: 0;">
                                                                            <input type="text" class="input-small-skin" maxlength="9" disabled>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div> -->
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!-- <tr>
                                                    <td style="width: 30%;" class="text-right border-0">Wage Parity :</td>
                                                    <td class="border-0" style="width: 70%;">
                                                        <label>
                                                            <input type="checkbox" name="wage_parity">
                                                            <span style="font-size:12px">(Contract setup overrides Patient setup)</span>
                                                        </label>
                                                    </td>
                                                </tr> -->
                                                <!-- <tr>
                                                    <td style="width: 30%;" class="text-right border-0">
                                                        From Date
                                                    </td>
                                                    <td class="border-0" style="width: 70%;">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center">
                                                            <div style="width: 45%;">
                                                                <input type="text" name="formDate1" class="input-small-skin">
                                                            </div>
                                                            <div style="width: 55%;padding-right: 0;">
                                                                <table style="width: 100%;">
                                                                    <tr>
                                                                        <td style="width:45%;" class="text-right">To Date :</td>
                                                                        <td style="width:55%;">
                                                                            <input type="text" name="toDate1" class="input-small-skin">
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr> -->
                                                <!-- <tr>
                                                    <td style="width: 30%;" class="text-right border-0">
                                                        From Date :
                                                    </td>
                                                    <td class="border-0" style="width: 70%;">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div style="width: 45%;">
                                                                <input type="text" name="formDate2" class="input-small-skin">
                                                            </div>
                                                            <div style="width: 55%;padding-right: 0;">
                                                                <table style="width: 100%;">
                                                                    <tr>
                                                                        <td style="width:45%;"class="text-right">To Date :</td>
                                                                        <td style="width:55%;">
                                                                            <input type="text" name="toDate2" class="input-small-skin">
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr> -->
                                                <!-- <tr>
                                                    <td style="width: 30%;" class="text-right border-0">SSN :#</td>
                                                    <td class="border-0" style="width: 70%;">
                                                        <div class="d-flex align-items-center">
                                                            <div><input type="text" maxlength="11" class="input-small-skin ssn_format" name="ssn" id="ssn"></div>
                                                            <div class="d-flex align-items-center">
                                                                <div class="ml-2 mr-2">
                                                                    Allow Duplicate :
                                                                </div>
                                                                <div>
                                                                    <label>
                                                                        <input type="checkbox" disabled>
                                                                        <span style="font-size:12px"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        (e.g. xxx-xx-xxxx)
                                                    </td>
                                                </tr> -->
                                                <tr>
                                                    <td style="width: 30%;" class="text-right border-0">
                                                        Profile Picture :
                                                    </td>
                                                    <td class="border-0" style="width: 70%;">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div style="width: 45%;">
                                                                <input type="file" class="form-control"
                                                                        style="height: inherit;" id="avatar"
                                                                        name="avatar" aria-describedby="uploadphoto">
                                                                <img class="imageThumb" src="" id="s1" heigth="100" width="100" >
                                                            </div>
                                                            <!-- <div style="width: 55%;padding-right: 0;">
                                                                <table style="width: 100%;">
                                                                    <tr>
                                                                        <td style="width: 45%;" class="text-right border-0">Medicaid Number :</td>
                                                                        <td class="border-0" style="width: 55%;padding-right: 0;" maxlength="20">
                                                                            <input type="text" class="input-small-skin" name="medicaid_number" id="medicaid_number">
                                                                            <span class="medicaid_number-invalid-feedback text-danger" role="alert" maxlength="8"></span>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div> -->
                                                            <!-- <div style="width: 55%;">
                                                                <table style="width: 100%;">
                                                                    <tr>
                                                                        <td style="width:45%;" class="text-right border-0">HI Claim Number :</td>
                                                                        <td class="border-0" style="width:55%;padding-right: 0;">
                                                                            <input type="text" class="input-small-skin" maxlength="9" disabled>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div> -->
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </th>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <table style="width: 100%;">
                                            <td style="width: 15%;" class="text-right border-0">
                                                Alerts :
                                            </td>
                                            <td style="width: 85%;" class="border-0">
                                                <textarea class="input-small-skin" name="alert" id="" cols="30" rows="5"></textarea>
                                            </td>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- Demographics End Here -->
        <!-- Address Start Here -->
        <table class="table table-borderless table-sm patientTable shadow">
            <tbody>
                <tr class="table-active">
                    <td>Address</td>
                    <!-- <td>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#addressModal"
                            class="btn btn-light btn-sm font-weight-bold p-0 pl-2 pr-2">ADD</a>
                    </td> -->
                </tr>
                <tr>
                    <td>
                        <table style="width: 100%;" class="table table-borderless table-sm m-0">
                            <thead>
                                <tr>
                                    <th><span class="mendate">*</span> Address Line 1</th>
                                    <th> Address Line 2</th>
                                    <th><span class="mendate"></span> Apt#</th>
                                    <th><span class="mendate">*</span> City</th>
                                    <th><span class="mendate">*</span> State</th>
                                    <th><span class="mendate">*</span> Zipcode</th>
                                    <th>Primary</th>
                                    <th>Address Type(s)</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="text" class="input-small-skin" name="address1">
                                    </td>
                                    <td>
                                        <input type="text" class="input-small-skin" name="address2">
                                    </td>
                                    <td>
                                        <input type="text" class="input-small-skin" name="apt_building">
                                    </td>
                                    <td style="display:none" class="selectedCityState"> 
                                        <select name="city" class="input-small-skin cityStateValue">
                                            <option value="">Select a city</option>
                                        </select>
                                    </td>
                                    <td class="selectedCity"> 
                                        <select name="city" class="input-small-skin cityValue">
                                            <option value="">Select a city</option>
                                        </select>
                                    </td>
                                    <td style="display:none" class="selectedStateCity"> 
                                        <select class="input-small-skin stateCityValue" name="state">
                                            <option value="">Select a state</option>
                                        </select>
                                    </td>
                                    <td class="selectedState"> 
                                        <select class="input-small-skin stateValue" name="state">
                                            <option value="">Select a state</option>
                                        </select>
                                    </td>
                                    <!-- <td>
                                        <select name="country" class="input-small-skin select2" name="country">
                                            <option value="">Select</option>
                                            <option value="">USA</option>
                                        </select>
                                    </td> -->
                                    <td style="width: 10%;">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <!-- <div style="width: 49%;"> -->
                                                <input type="text" maxlength="5" onpaste="return false" class="input-small-skin" name="zip_code">
                                            <!-- </div> -->
                                            <!-- <div style="width: 49%;">
                                                <input type="text" maxlength="4" onpaste="return false" class="input-small-skin" disabled>
                                            </div> -->
                                        </div>
                                    </td>
                                    <!-- <td>
                                        <input type="text" class="input-small-skin" disabled>
                                    </td> -->
                                    <td>
                                        <label>
                                            <input type="checkbox" name="primary">
                                            <span style="font-size:12px; padding-left: 25px;"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <select name="addressType" class="input-small-skin select2" id="addressType">
                                            <option value="">Select a address type</option>
                                           @foreach (config('select.address_type') as $key => $address_type)
                                                <option value="{{ $key }}">{{ $address_type }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div style="width: 50%;">
                                                <a href="javascript:void(0)" target="_blank" data-toggle="modal" data-target="#addNotesModal" class="text-underline" rel="noopener noreferrer" disabled>Add</a>
                                                <input type="hidden" class="input-small-skin" name="address_note">
                                            </div>
                                            <!-- <div style="width: 50%;">
                                                <a href="javascript:void(0)" class="closebtnIcons">
                                                    <i class="lar la-window-close"></i>
                                                </a>
                                            </div> -->
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- Address End Here -->

         <!-- Phone Number Information Start Here -->
         <table class="table table-borderless table-sm patientTable shadow">
            <tbody>
                <tr class="table-active">
                    <td>Phone Number Information</td>
                    <!-- <td>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#addressModal"
                            class="btn btn-light btn-sm font-weight-bold p-0 pl-2 pr-2">ADD</a>
                    </td> -->
                </tr>
                <tr>
                    <td>
                        <table style="width: 100%;" class="table table-borderless table-sm m-0">
                            <thead>
                                <tr>
                                    <th><span class="mendate">*</span> Home Phone</th>
                                    <th>Cell Phone</th>
                                    <th>Alternate Phone</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="text" class="input-small-skin phone_format" name="home_phone" maxlength="14">
                                    </td>
                                    <td>
                                        <input type="text" class="input-small-skin phone_format" name="cell_phone" maxlength="14">
                                    </td>
                                    <td>
                                        <input type="text" class="input-small-skin phone_format" name="alternate_phone" maxlength="14">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- Phone Number Information End Here -->
        <!-- Phone Number Information Start Here -->
        <!-- <table class="table table-borderless table-sm patientTable shadow">
            <thead>
                <tr class="table-active">
                    <th colspan="2">
                        Phone Number Information
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="width: 50%;" class="border-0">
                        <table style="width: 100%;" class="table table-borderless table-sm m-0 border-0">
                            <tr>
                                <th style="width: 30%;" class="text-right">Home Phone :</th>
                                <td style="width: 70%;">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div style="width: 45%;">
                                            <div class="homePhone">
                                                <div class="step">
                                                    <input type="text" class="input-small-skin">
                                                </div>
                                                <div class="step">
                                                    <input type="text" class="input-small-skin">
                                                </div>
                                                <div class="step">
                                                    <input type="text" class="input-small-skin">
                                                </div> 
                                            </div>
                                        </div>
                                        <div style="width: 55%;">
                                            <table style="width: 100%;">
                                                <tr>
                                                    <th style="width: 30%;" class="text-right">Home Phone
                                                        Location :</th>
                                                    <td style="width: 70%;">
                                                        <select name="HomePhoneLocation1"
                                                            id="HomePhoneLocation1"
                                                            class="input-small-skin select2">
                                                            <option selected="selected" value="">
                                                                Select
                                                            </option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 30%;" class="text-right">Phone 2 :</th>
                                <td style="width: 70%;">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div style="width: 45%;">
                                            <div class="homePhone">
                                                <div class="step">
                                                    <input type="text" class="input-small-skin">
                                                </div>
                                                <div class="step">
                                                    <input type="text" class="input-small-skin">
                                                </div>
                                                <div class="step">
                                                    <input type="text" class="input-small-skin">
                                                </div>
                                            </div>
                                        </div>
                                        <div style="width: 55%;">
                                            <table style="width: 100%;">
                                                <tr>
                                                    <th style="width: 30%;" class="text-right">Phone 2 Location
                                                        :
                                                    </th>
                                                    <td style="width: 70%;">
                                                        <select name="HomePhoneLocation2"
                                                            id="HomePhoneLocation2"
                                                            class="input-small-skin select2">
                                                            <option selected="selected" value="">
                                                                Select
                                                            </option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 30%;" class="text-right">Phone 3 :</th>
                                <td style="width: 70%;">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div style="width: 45%;">
                                            <div class="homePhone">
                                                <div class="step">
                                                    <input type="text" class="input-small-skin">
                                                </div>
                                                <div class="step">
                                                    <input type="text" class="input-small-skin">
                                                </div>
                                                <div class="step">
                                                    <input type="text" class="input-small-skin">
                                                </div>
                                            </div>
                                        </div>
                                        <div style="width: 55%;">
                                            <table style="width: 100%;">
                                                <tr>
                                                    <th style="width: 30%;" class="text-right">Phone 3 Location
                                                        :
                                                    </th>
                                                    <td style="width: 70%;">
                                                        <select name="HomePhoneLocation" id="HomePhoneLocation"
                                                            class="input-small-skin select2">
                                                            <option selected="selected" value="">
                                                                Select
                                                            </option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 30%;" class="text-right">Direction :</th>
                                <td style="width: 70%;">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div style="width: 45%;">
                                            <input type="text" class="input-small-skin">
                                        </div>
                                        <div style="width: 55%;">
                                            <table style="width: 100%;">
                                                <tr>
                                                    <th style="width: 30%;" class="text-right">Alternate Billing
                                                        Address :
                                                    </th>
                                                    <td style="width: 70%;">
                                                        <label>
                                                            <input type="checkbox">
                                                            <span
                                                                style="font-size:12px; padding-left: 25px;"></span>
                                                        </label>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td style="width: 50%;" class="border-0">
                        <table style="width: 100%;" class="table table-borderless table-sm m-0">
                            <tr>
                                <th style="width: 30%;" class="text-right">
                                </th>
                                <td style="width: 70%;"></td>
                            </tr>
                            <tr>
                                <th style="width: 30%;" class="text-right">
                                    Description :
                                </th>
                                <td style="width: 70%;">
                                    <input type="text" class="input-small-skin">
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 30%;" class="text-right">
                                </th>
                                <td style="width: 70%;"></td>
                            </tr>
                            <tr>
                                <th style="width: 30%;" class="text-right">
                                    Description :
                                </th>
                                <td style="width: 70%;">
                                    <input type="text" class="input-small-skin">
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table> -->
        <!-- Phone Number Information End Here -->
        <!-- Emergency Contact Information Start Here -->
        <table class="table table-borderless table-sm patientTable shadow">
            <thead>
                <tr class="table-active">
                    <th colspan="2">
                        Emergency Contact Information
                    </th>
                </tr>
            </thead>
            <tbody class="add_more_contact_div">
                <tr>
                    <td style="width: 50%;" class="border-0">
                        <table style="width: 100%;" class="table table-borderless table-sm m-0 border-0">
                            <tr>
                                <th style="width: 30%;" class="text-right"><span class="mendate">*</span> Name :</th>
                                <td style="width: 70%;">
                                    <input type="text" class="input-small-skin" name="name">
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 30%;" class="text-right">Lives with Patient :</th>
                                <td style="width: 70%;">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div style="width: 5%;">
                                            <label>
                                                <input type="checkbox" name="lives_with_patient">
                                                <span style="font-size:12px; padding-left: 25px;"></span>
                                            </label>
                                        </div>
                                        <div style="width: 95%;">
                                            <table style="width: 100%;">
                                                <tr>
                                                    <th style="width: 14%;">Have Keys</th>
                                                    <td style="width: 86%;">
                                                        <label>
                                                            <input type="checkbox" name="have_keys">
                                                            <span style="font-size:12px; padding-left: 25px;"></span>
                                                        </label>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 30%;" class="text-right"><span class="mendate">*</span> Address Line 1 :</th>
                                <td style="width: 70%;">
                                    <input type="text" class="input-small-skin" name="emergency_address1">
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 30%;" class="text-right">Address Line 2 :</th>
                                <td style="width: 70%;">
                                    <input type="text" class="input-small-skin" name="emergency_address2">
                                </td>
                            </tr>
                            <tr>
                                <!-- <th style="width: 30%;" class="text-right">Address :</th>
                                <td style="width: 70%;">
                                    <textarea name="address_old[]" id="address_old" class="input-small-skin" cols="30" rows="5"></textarea>
                                </td> -->
                                <th style="width: 30%;" class="text-right">APT#:</th>
                                <td style="width: 70%;">
                                    <input type="text" class="input-small-skin" name="emergency_apt_building">
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td style="width: 50%;" class="border-0">
                        <table style="width: 100%;" class="table table-borderless table-sm m-0 border-0">
                            <tr>
                                <th style="width: 30%;" class="text-right"><span class="mendate">*</span> Relationship :</th>
                                <td style="width: 70%;">
                                    <select name="relation" id="relation" class="input-small-skin select2">
                                        <option value="">Select a relation</option>
                                        @foreach (config('select.relations') as $key => $relation)
                                        <option value="{{$key}}">{{$relation}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 30%;" class="text-right"><span class="mendate">*</span> Phone 1  :</th>
                                <td class="border-0" style="width: 70%;">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div style="width: 45%;">
                                            <input type="text" class="input-small-skin phone_format" name="phone1" maxlength="14">
                                        </div>
                                        <div style="width: 55%;">
                                            <table style="width: 100%;">
                                                <tr>
                                                    <th style="width: 23%;" class="text-right">Phone 2 :</th>
                                                    <td class="border-0" style="width: 80%;padding-right: 0;">
                                                        <input type="text" class="input-small-skin phone_format" name="phone2" maxlength="14">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- <tr>
                                <th style="width: 30%;" class="text-right">Phone 1 :</th>
                                <td style="width: 70%;">
                                    <input type="text" class="input-small-skin phone_format" name="phone1" maxlength="14">
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 30%;" class="text-right">Phone 2 :</th>
                                <td style="width: 70%;">
                                    <input type="text" class="input-small-skin phone_format" name="phone2" maxlength="14">
                                </td>
                            </tr> -->
                            <tr>
                                <th style="width: 30%;" class="text-right"><span class="mendate">*</span> City :</th>
                                <td style="width: 70%;display:none;" class="selectedCityState">
                                    <select name="emergency_city" class="input-small-skin cityStateValue">
                                        <option value="">Select a city</option>
                                    </select>
                                </td>
                                <td style="width: 70%;" class="selectedCity">
                                    <select name="emergency_city" class="input-small-skin cityValue">
                                        <option value="">Select a city</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 30%;" class="text-right"><span class="mendate">*</span> State :</th>
                                <td style="width: 70%;display:none;" class="selectedStateCity">
                                    <select class="input-small-skin stateCityValue" name="emergency_state">
                                        <option selected="selected" value="">Select a state</option>
                                    </select>
                                </td>
                                <td style="width: 70%;" class="selectedState">
                                    <select class="input-small-skin stateValue" name="emergency_state">
                                        <option selected="selected" value="">Select a state</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 30%;" class="text-right"><span class="mendate">*</span> ZipCode :</th>
                                <td style="width: 70%;">
                                    <input type="text" class="input-small-skin" name="emergency_zip_code">
                                </td>
                            </tr>
                            <!-- <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr> -->
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- Emergency Contact Information End Here -->
        <!-- Emergency Preparedness Start Here -->
        <!-- <table class="table table-borderless table-sm patientTable shadow">
            <thead>
                <tr class="table-active">
                    <th colspan="2">
                        Emergency Preparedness
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="width: 50%;" class="border-0">
                        <table style="width: 100%;" class="table table-borderless table-sm m-0 border-0">
                            <tr>
                                <th style="width: 30%;" class="text-right">Priority Code :</th>
                                <td style="width: 70%;">
                                    <select name="PriorityCode" id="PriorityCode"
                                        class="input-small-skin select2">
                                        <option value="">Select</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 30%;" class="text-right">Mobility Status :</th>
                                <td style="width: 70%;">
                                    <select name="MobilityStatus" id="MobilityStatus"
                                        class="input-small-skin select2">
                                        <option value="">Select</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 30%;" class="text-right">Evacuation Location :</th>
                                <td style="width: 70%;">
                                    <select name="EvacuationLocation1" id="EvacuationLocation1"
                                        class="input-small-skin select2">
                                        <option value="">Select</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td style="width: 50%;" class="border-0">
                        <table style="width: 100%;" class="table table-borderless table-sm m-0 border-0">
                            <tr>
                                <th style="width: 30%;" class="text-right">Evacuation Zone :</th>
                                <td style="width: 70%;">
                                    <select name="EvacuationZone" id="EvacuationZone"
                                        class="input-small-skin select2">
                                        <option value="">Select</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 30%;" class="text-right">Electric Equipment Dependency :</th>
                                <td style="width: 70%;">
                                    <div class="checkBoxItem">
                                        <div class="blocks">
                                            <label>
                                                <input type="checkbox">
                                                <span style="font-size:12px; padding-left: 25px;">Bi-PAP</span>
                                            </label>
                                        </div>
                                        <div class="blocks">
                                            <label>
                                                <input type="checkbox">
                                                <span style="font-size:12px; padding-left: 25px;">IV Pump</span>
                                            </label>
                                        </div>
                                        <div class="blocks">
                                            <label>
                                                <input type="checkbox">
                                                <span style="font-size:12px; padding-left: 25px;">TPN</span>
                                            </label>
                                        </div>
                                        <div class="blocks">
                                            <label>
                                                <input type="checkbox">
                                                <span style="font-size:12px; padding-left: 25px;">Feeding
                                                    Pump</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="checkBoxItem">
                                        <div class="blocks">
                                            <label>
                                                <input type="checkbox">
                                                <span style="font-size:12px; padding-left: 25px;">Oxygen</span>
                                            </label>
                                        </div>
                                        <div class="blocks">
                                            <label>
                                                <input type="checkbox">
                                                <span
                                                    style="font-size:12px; padding-left: 25px;">Ventilator</span>
                                            </label>
                                        </div>
                                        <div class="blocks"></div>
                                        <div class="blocks"></div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table> -->
        <!-- Emergency Preparedness End Here -->
        <!-- Clinical Info Start Here -->
        <!-- <table class="table table-borderless table-sm patientTable shadow">
            <thead>
                <tr class="table-active">
                    <th colspan="2">
                        Clinical Info
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <table class="table table-borderless table-sm m-0">
                            <tbody>
                                <tr>
                                    <th class="p-0 border border-white">
                                        <table class="table table-borderless border-0 m-0">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <table style="width: 100%;">
                                                            <td style="width: 30%;" class="text-right border-0">
                                                                Comments :
                                                            </td>
                                                            <td style="width: 70%;" class="border-0">
                                                                <textarea class="input-small-skin" name="" id=""
                                                                    cols="30" rows="5"></textarea>
                                                            </td>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </th>
                                    <th class="p-0" style="width: 50%;vertical-align: top!important;">
                                        <table class="table table-borderless border-0 m-0">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <table style="width: 100%;">
                                                            <td style="width: 30%;" class="text-right border-0">
                                                                Allergies :
                                                            </td>
                                                            <td style="width: 70%;" class="border-0">
                                                                <textarea class="input-small-skin" name="" id=""
                                                                    cols="30" rows="5"></textarea>
                                                            </td>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table> -->
        <!-- Clinical Info End Here -->
        <!-- Allergies Start Here -->
        <!-- <table class="table table-borderless table-sm patientTable shadow">
            <thead>
                <tr class="table-active">
                    <td colspan="2">
                        Allergies
                    </td>
                </tr>
            </thead>
            <tbody>
                <td>
                    <table class="table table-borderless table-sm m-0">
                        <tbody>
                            <tr>
                                <th class="p-0 border border-white">
                                    <table class="table table-borderless border-0 m-0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <table style="width: 100%;">
                                                        <tr>
                                                            <td style="width: 30%;"></td>
                                                            <td style="width: 70%;">
                                                                <label>
                                                                    <input type="checkbox">
                                                                    <span
                                                                        style="font-size:12px; padding-left: 25px;">NKDA</span>
                                                                </label>
                                                                <label class="ml-2">
                                                                    <input type="checkbox">
                                                                    <span
                                                                        style="font-size:12px; padding-left: 25px;">NKA</span>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </th>
                                <th class="p-0" style="width: 50%;vertical-align: top!important;">
                                    <table class="table table-borderless border-0 m-0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <table style="width: 100%;">
                                                        <tr>
                                                            <td style="width: 30%;"></td>
                                                            <td style="width: 70%;">
                                                                <label>
                                                                    <input type="radio" name="view"
                                                                        class="with-gap">
                                                                    <span
                                                                        style="font-size:12px; padding-left: 25px;">View
                                                                        All</span>
                                                                </label>
                                                                <label class="ml-2">
                                                                    <input type="radio" name="view"
                                                                        class="with-gap">
                                                                    <span
                                                                        style="font-size:12px; padding-left: 25px;">View
                                                                        Only Active</span>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tbody>
        </table> -->
        <!-- Allergies End Here -->
        <!-- Allergy Start Here -->
        <!-- <table class="table table-borderless table-sm patientTable shadow">
            <thead>
                <tr class="table-active">
                    <th>
                        <div class="d-flex justify-content-between align-items-center">
                            <div style="width: 50%;">
                                Allergy</div>
                            <div style="width: 50%;" class="d-flex justify-content-end">
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#addAllergyModal"
                                    class="btn btn-light btn-sm font-weight-bold p-0 pl-2 pr-2">ADD</a>
                            </div>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <table class="table table-borderless border-0 m-0">
                            <thead>
                                <tr>
                                    <th style="width: 20%;">Allergy</th>
                                    <th style="width: 10%;">Type</th>
                                    <th style="width: 10%;">Reaction</th>
                                    <th style="width: 10%;">Severity</th>
                                    <th style="width: 10%;">Source</th>
                                    <th style="width: 30%;">Notes</th>
                                    <th style="width: 10%;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="text" disabled value="Drug Allergy"
                                            class="input-small-skin">
                                    </td>
                                    <td>
                                        <input type="text" disabled value="Drug Allergy"
                                            class="input-small-skin">
                                    </td>
                                    <td>
                                        <select name="reaction" id="reaction" class="input-small-skin select2">
                                            <option value="">Select</option>
                                            <option selected disabled value="Anaphylaxis">Anaphylaxis</option>
                                            <option value="Blisters">Blisters</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="severity" id="severity" class="input-small-skin select2">
                                            <option selected disabled value="">Select</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="source" id="source" class="input-small-skin select2">
                                            <option selected disabled value="">Select</option>
                                        </select>
                                    </td>
                                    <td>
                                        <textarea name="" id="" cols="30" rows="2" disabled
                                            class="input-small-skin"></textarea>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div style="width: 90%;">
                                                <select name="source" id="source"
                                                    class="input-small-skin select2">
                                                    <option selected disabled value="Active">Active</option>
                                                </select>
                                            </div>
                                            <div>
                                                <a href="javascript:void(0)" class="closebtnIcons">
                                                    <i class="lar la-window-close"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table> -->
        <!-- Allergy End Here -->
        <!-- Advanced Directive(s) Start Here -->
        <!-- <table class="table table-borderless table-sm patientTable shadow">
            <thead>
                <tr class="table-active">
                    <th>
                        <div class="d-flex justify-content-between align-items-center">
                            <div style="width: 50%;">
                                Advanced Directive(s)
                            </div>
                            <div style="width: 50%;" class="d-flex justify-content-end">
                                <a href="javascript:void(0)"
                                    class="btn btn-light btn-sm font-weight-bold p-0 pl-2 pr-2">ADD</a>
                            </div>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <table class="table table-borderless border-0 m-0">
                            <thead>
                                <tr>
                                    <th style="width: 30%;">Advanced Directive</th>
                                    <th style="width: 30%;">Physician</th>
                                    <th style="width: 10%;">On File</th>
                                    <th style="width: 10%;">Date Received</th>
                                    <th style="width: 10%;">Effective Date</th>
                                    <th style="width: 10%;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table> -->
        <!-- Advanced Directive(s) End Here -->
        <!-- Physicians Start Here -->
        <!-- <table class="table table-borderless table-sm patientTable shadow">
            <thead>
                <tr class="table-active">
                    <th>
                        <div class="d-flex justify-content-between align-items-center">
                            <div style="width: 50%;">
                                Physicians
                            </div>
                            <div style="width: 50%;" class="d-flex justify-content-end">
                                <a href="javascript:void(0)" data-toggle="modal"
                                    data-target="#addPhysiciansModal"
                                    class="btn btn-light btn-sm font-weight-bold p-0 pl-2 pr-2">ADD</a>
                            </div>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <table class="table table-borderless border-0 m-0">
                            <thead>
                                <tr>
                                    <th style="width: 30%;">MD Name</th>
                                    <th style="width: 30%;">Phone</th>
                                    <th style="width: 10%;">Note</th>
                                    <th style="width: 10%;">Primary</th>
                                    <th style="width: 10%;">Address</th>
                                    <th style="width: 10%;">NPI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table> -->
        <!-- Physicians End Here -->
        <!-- Md Orders Start Here -->
        <!-- <table class="table table-borderless table-sm patientTable shadow">
            <thead>
                <tr class="table-active">
                    <td>
                        Md Orders
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        &nbsp;
                    </td>
                </tr>
            </tbody>
        </table> -->
        <!-- Md Orders End Here -->
        <!-- Diagnosis Start Here -->
        <!-- <table class="table table-borderless table-sm patientTable shadow">
            <thead>
                <tr class="table-active">
                    <th>
                        <div class="d-flex justify-content-between align-items-center">
                            <div style="width: 50%;">
                                Diagnosis
                            </div>
                            <div style="width: 50%;" class="d-flex justify-content-end">
                                <a href="javascript:void(0)" data-toggle="modal"
                                    data-target="#PatientDiagnosisInfoModal"
                                    class="btn btn-light btn-sm font-weight-bold p-0 pl-2 pr-2">ADD</a>
                            </div>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <table class="table table-borderless border-0 m-0">
                            <thead>
                                <tr>
                                    <th style="width: 10%;">ICD</th>
                                    <th style="width: 10%;">Code</th>
                                    <th style="width: 25%;">Description</th>
                                    <th style="width: 10%;">Date</th>
                                    <th style="width: 10%;">Date Type</th>
                                    <th style="width: 10%;">Historical as of</th>
                                    <th style="width: 10%;">Ident. During</th>
                                    <th style="width: 10%;">Primary</th>
                                    <th style="width: 5%;">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table> -->
        <!-- Diagnosis End Here -->
        <!-- Patient Preferences: Used for Scheduling Start Here -->
        <!-- <table class="table table-borderless table-sm patientTable shadow">
            <thead>
                <tr class="table-active">
                    <th>
                        <div class="d-flex justify-content-between align-items-center">
                            <div style="width: 50%;">
                                Patient Preferences: Used for Scheduling
                            </div>
                            <div style="width: 50%;" class="d-flex justify-content-end">
                                <a href="javascript:void(0)"
                                    class="btn btn-light btn-sm font-weight-bold p-0 pl-2 pr-2">ADD</a>
                            </div>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="checkForm1">
                            <div class="blocks">
                                <label>
                                    <input type="checkbox">
                                    <span style="font-size:12px; padding-left: 25px;">Brooklyn</span>
                                </label>
                            </div>
                            <div class="blocks">
                                <label>
                                    <input type="checkbox">
                                    <span style="font-size:12px; padding-left: 25px;">Bronx</span>
                                </label>
                            </div>
                            <div class="blocks">
                                <label>
                                    <input type="checkbox">
                                    <span style="font-size:12px; padding-left: 25px;">Queens</span>
                                </label>
                            </div>
                            <div class="blocks">
                                <label>
                                    <input type="checkbox">
                                    <span style="font-size:12px; padding-left: 25px;">Manhattan</span>
                                </label>
                            </div>
                            <div class="blocks">
                                <label>
                                    <input type="checkbox">
                                    <span style="font-size:12px; padding-left: 25px;">Staten Island</span>
                                </label>
                            </div>
                            <div class="blocks">
                                <label>
                                    <input type="checkbox">
                                    <span style="font-size:12px; padding-left: 25px;">Far Rockaway</span>
                                </label>
                            </div>
                            <div class="blocks">
                                <label>
                                    <input type="checkbox">
                                    <span style="font-size:12px; padding-left: 25px;">Nassau</span>
                                </label>
                            </div>
                            <div class="blocks">
                                <label>
                                    <input type="checkbox">
                                    <span style="font-size:12px; padding-left: 25px;">Shabbat Observant</span>
                                </label>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table> -->
        <!-- Patient Preferences: Used for Scheduling End Here -->
        <!-- Patient Preferences: Not Used for Scheduling Start Here -->
        <table class="table table-borderless table-sm patientTable shadow">
            <thead>
                <tr class="table-active">
                    <th>
                        <div class="d-flex justify-content-between align-items-center">
                            <div style="width: 50%;">
                                Patient Preferences: Not Used for Scheduling
                            </div>
                            <div style="width: 50%;" class="d-flex justify-content-end">
                                <a href="javascript:void(0)"
                                    class="btn btn-light btn-sm font-weight-bold p-0 pl-2 pr-2">ADD</a>
                            </div>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <!-- <div class="alert alert-warning text-center mb-0" role="alert">
                            No preferences found
                        </div> -->
                        <table style="width: 100%;">
                            <tbody>
                                <tr>
                                    <td style="width: 33%;" class="border-0">
                                        <table style="width: 100%;"
                                            class="table table-borderless table-sm m-0 border-0">
                                            <tbody>
                                                <tr>
                                                    <th style="width: 30%;" class="text-right">Primary Language
                                                        :
                                                    </th>
                                                    <td style="width: 70%;">
                                                        <select name="language[]" id="primaryLanguage1"
                                                            class="input-small-skin select2">
                                                            <option selected="selected" value="">Select a primary language</option>
                                                            
                                                            @foreach (config('select.language') as $key => $language)
                                                                <option value="{{ $key}}">{{$language}}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <!-- <td style="width: 33%;" class="border-0">
                                        <table style="width: 100%;"
                                            class="table table-borderless table-sm m-0 border-0">
                                            <tbody>
                                                <tr>
                                                    <th style="width: 30%;" class="text-right">Evacuation
                                                        Location :</th>
                                                    <td style="width: 70%;">
                                                        <select name="EvacuationLocation"
                                                            id="EvacuationLocation"
                                                            class="input-small-skin select2" disabled>
                                                            <option value="">Select</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td> -->
                                    <td style="width: 33%;" class="border-0">
                                        <table style="width: 100%;"
                                            class="table table-borderless table-sm m-0 border-0">
                                            <tbody>
                                                <tr>
                                                    <th style="width: 30%;" class="text-right">Secondary
                                                        Language :
                                                    </th>
                                                    <td style="width: 70%;">
                                                        <select name="language[]" id="primaryLanguage"
                                                            class="input-small-skin select2">
                                                            <option selected="selected" value="">Select a secondary language</option>
                                                            @foreach (config('select.language') as $key => $language)
                                                                <option value="{{ $key}}">{{$language}}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- <table style="width: 100%;">
                            <tr>
                                <th style="width: 10%;" class="text-right">
                                    Other :
                                </th>
                                <td style="width: 90%;">
                                    <textarea class="input-small-skin" name="other" id="other" cols="30"
                                        rows="5" disabled></textarea>
                                </td>
                            </tr>
                        </table> -->
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="d-flex mt-4 justify-content-end">
            <input type="submit" value="Submit" class="btn btn--submit btn-lg ">
            <input type="reset" value="Reset" class="btn btn--reset btn-lg ml-4">
        </div>
    </form>
    <!-- Patient Preferences: Not Used for Scheduling End Here -->
@endsection 
@section('modal')            
    <!-- Modal of Add Address Start Here-->
    <!-- <div class="modal fade" id="addressModal" tabindex="" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Address</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-4">
                    <p>Please enter Zip.</p>
                    <div class="mt-4">
                        <input type="submit" value="Okay" class="btn btn--submit btn-lg">
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Modal of Add Address End Here-->
    <!-- Modal of Add Notes Start Here-->
    <div class="modal fade" id="addNotesModal" tabindex="" aria-labelledby="allergyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Address Note</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-4">
                    <!-- <form class="add_patient_form"> -->
                      
                        <div class="form-group">
                            <label for="notes" class="label">Notes</label>
                            <textarea name="notes" class="input-skin" id="notes" cols="30" rows="10"></textarea>
                            <p>Note: Upto 500 Characters.</p>
                            <span class="note_error"></span>
                        </div>
                        <div class="d-flex mt-4 justify-content-end">
                            <input type="submit" value="Submit" id="add_note" class="btn btn--submit btn-lg">
                            <input type="reset" value="Reset" class="btn btn--reset btn-lg ml-4">
                        </div>
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Modal of Add Notes End Here-->
    <!-- Modal of Add Allergy Start Here-->
    <!-- <div class="modal fade" id="addAllergyModal" tabindex="" aria-labelledby="allergyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Allergy</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-4">
                    <form>
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label for="allergy" class="label">Allergy</label>
                                    <input type="text" class="input-skin" id="allergy" aria-describedby="allergyHelp">
                                </div>
                                <div class="form-group">
                                    <label for="reaction" class="label">Reaction</label>
                                    <input type="text" class="input-skin" id="reaction" aria-describedby="reactionHelp">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label for="type" class="label">Type</label>
                                    <input type="text" class="input-skin" id="type" aria-describedby="typeHelp">
                                </div>
                                <div class="form-group">
                                    <label for="type" class="label">Source</label>
                                    <select name="source" id="source" class="input-skin">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label for="type" class="label">Reaction</label>
                                    <select name="reactiona" id="reactiona" class="input-skin">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="type" class="label">Severity</label>
                                    <select name="severity" id="severity" class="input-skin">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="Notes1" class="label">Notes</label>
                                    <textarea name="Notes1" class="input-skin" id="notes1" cols="30"
                                        rows="3"></textarea>
                                    <p>Note: Upto 500 Characters.</p>
                                </div>
                                <div class="form-group">
                                    <label for="type" class="label">Status</label>
                                    <select name="status" id="status" class="input-skin">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                                <div>
                                    <input type="submit" value="Submit" class="btn btn--submit btn-lg">
                                    <input type="reset" value="Reset" class="btn btn--reset btn-lg ml-2">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Modal of Add Allergy End Here-->
    <!-- Modal of Add Physicians Start Here-->
    <!-- <div class="modal fade" id="addPhysiciansModal" tabindex="" aria-labelledby="addPhysiciansModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Patient MD Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-4">
                    <form>
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label for="allergy1" class="label"><span class="mendate mr-2">*</span>MD
                                        Name</label>
                                    <input type="text" class="input-skin" id="allergy1" aria-describedby="allergy1Help">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label for="phone" class="label">&nbsp;</label>
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0)" class="btn btn--submit btn-lg"
                                            id="addPhysicBtn">Add Physician</a>
                                        <i class="las la-question-circle la-2x"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label for="type" class="label">Physician Address</label>
                                    <select name="physicianAddress" id="physicianAddress" class="input-skin">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="row">
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <label for="Phone999" class="label">Phone</label>
                                                    <input type="text" class="input-skin" id="Phone999" maxlength="3"
                                                        aria-describedby="Phone999Help">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <label for="phone1" class="label">&nbsp;</label>
                                                    <input type="text" class="input-skin" id="phone1" maxlength="3"
                                                        aria-describedby="phone1Help">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <label for="phone300000000000000000" class="label">&nbsp;</label>
                                                    <input type="text" class="input-skin" id="phone300000000000000000"
                                                        maxlength="3" aria-describedby="phone300000000000000000Help">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="row">
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <label for="phone400" class="label">Phone2</label>
                                                    <input type="text" class="input-skin" id="phone400" maxlength="3"
                                                        aria-describedby="phone400Help">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <label for="phone5" class="label">&nbsp;</label>
                                                    <input type="text" class="input-skin" id="phone5" maxlength="3"
                                                        aria-describedby="phone5Help">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <label for="phone600" class="label">&nbsp;</label>
                                                    <input type="text" class="input-skin" id="phone600" maxlength="3"
                                                        aria-describedby="phone600Help">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="row">
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <label for="phone7" class="label">Phone3</label>
                                                    <input type="text" class="input-skin" id="phone7" maxlength="3"
                                                        aria-describedby="phone7Help">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <label for="Phone22222" class="label">&nbsp;</label>
                                                    <input type="text" class="input-skin" id="Phone22222" maxlength="3"
                                                        aria-describedby="Phone22222Help">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <label for="phone88888" class="label">&nbsp;</label>
                                                    <input type="text" class="input-skin" id="phone88888" maxlength="3"
                                                        aria-describedby="phone88888Help">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="row">
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <label for="fax" class="label">Fax</label>
                                                    <input type="text" class="input-skin" id="fax" maxlength="3"
                                                        aria-describedby="faxHelp">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <label for="fax1" class="label">&nbsp;</label>
                                                    <input type="text" class="input-skin" id="fax1" maxlength="3"
                                                        aria-describedby="fax1Help">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <label for="fax222" class="label">&nbsp;</label>
                                                    <input type="text" class="input-skin" id="fax222" maxlength="3"
                                                        aria-describedby="fax222Help">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <label for="phone" class="label pb-3">&nbsp;</label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Primary</label>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label for="NPI" class="label">NPI</label>
                                    <input type="text" class="input-skin" id="NPI" aria-describedby="NPIHelp">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-end">
                                    <input type="submit" value="Submit" class="btn btn--submit btn-lg">
                                    <input type="reset" value="Reset" class="btn btn--reset btn-lg ml-2">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Modal of Add Physicians End Here-->
    <!-- Modal of Add Physicians Start Here-->
    <!-- <div class="modal fade" id="addPhysicModal" tabindex="" aria-labelledby="addPhysicModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Physician</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-4">
                    <form>
                        <div class="form-group">
                            <div class="headerBox">
                                <h1 class="title-md">Physician</h1>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-sm-3">
                                    <label for="fname" class="label"><span class="mendate mr-2">*</span>First
                                        Name</label>
                                    <input type="text" class="input-skin" id="fname" aria-describedby="fnameHelp">
                                </div>
                                <div class="col-12 col-sm-3">
                                    <label for="lname" class="label"><span class="mendate mr-2">*</span>Last
                                        Name</label>
                                    <input type="text" class="input-skin" id="lname" aria-describedby="lnameHelp">
                                </div>
                                <div class="col-12 col-sm-3">
                                    <label for="licenseNo" class="label">License No</label>
                                    <input type="text" class="input-skin" id="licenseNo"
                                        aria-describedby="licenseNoHelp">
                                </div>
                                <div class="col-12 col-sm-3">
                                    <label for="status1" class="label"><span class="mendate mr-2">*</span>Status</label>
                                    <select name="status1" id="status1" class="input-skin">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-sm-3">
                                    <label for="lname" class="label">Suspension Date</label>
                                    <input type="text" class="input-skin" name="SuspensionDate" id="SuspensionDate">
                                </div>
                                <div class="col-12 col-sm-3">
                                    <label for="LicenseExpirationDate" class="label">License Expiration Date</label>
                                    <input type="text" class="input-skin" id="LicenseExpirationDate"
                                        name="LicenseExpirationDate" aria-describedby="LicenseExpirationDateHelp">
                                </div>
                                <div class="col-12 col-sm-3">
                                    <label for="NPIs" class="label">NPI</label>
                                    <input type="text" class="input-skin" name="NPIs" id="NPIs">
                                </div>
                                <div class="col-12 col-sm-3">
                                    <label for="revokeDate" class="label">Revoke Date</label>
                                    <input type="text" class="input-skin" name="revokeDate" id="revokeDate">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-sm-3">
                                    <label for="PhysicianType" class="label"><span
                                            class="mendate mr-2">*</span>Physician Type</label>
                                    <select name="PhysicianType" id="PhysicianType" class="input-skin">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-9">
                                    <div class="form-group">
                                        <label for="Notes2" class="label">Notes</label>
                                        <textarea name="Notes2" class="input-skin" id="Notes2" cols="30"
                                            rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="headerBox">
                                <h1 class="title-md">Addresses</h1>
                                <a href="javascript:void(0)" id="addAddressBtn"
                                    class="btn btn-info btn-sm font-weight-bold ">ADD</a>
                            </div>
                        </div>
                        <div class="alert alert-info text-center role=" alert">
                            No Address Added.
                        </div>
                        <div class="form-group">
                            <div class="headerBox">
                                <h1 class="title-md">Licensing Information</h1>
                                <a href="javascript:void(0)" class="btn btn-info btn-sm font-weight-bold "><i
                                        class="las la-question-circle la-2x"></i></a>
                            </div>
                        </div>
                        <div class="alert alert-info text-center role=" alert">
                            No Licensing Information Found.
                        </div>
                        <div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex justify-content-end">
                                        <input type="submit" value="Save" class="btn btn--submit btn-lg">
                                        <input type="reset" value="Reset" class="btn btn--reset btn-lg ml-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Modal of Add Physicians End Here-->
    <!-- Modal of Add Physicians Address Start Here-->
    <!-- <div class="modal fade" id="addPhysicAddressModal" tabindex="" aria-labelledby="addPhysicAddressModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Physician Address</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-4">
                    <form>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label for="Notes3" class="label"><span class="mendate">*</span>Address 1</label>
                                    <textarea name="Notes3" class="input-skin" id="Notes3" cols="30"
                                        rows="5"></textarea>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label for="Notes4" class="label">Address 2</label>
                                    <textarea name="Notes4" class="input-skin" id="Notes4" cols="30"
                                        rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label for="city" class="label"><span class="mendate">*</span>City</label>
                                    <input type="text" class="input-skin" id="city" name="city" aria-describedby="cityHelp">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label for="Zip" class="label"><span class="mendate">*</span>Zip</label>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div style="width: 49%;">
                                            <input type="text" maxlength="5" onpaste="return false" class="input-skin">
                                        </div>
                                        <div style="width: 49%;">
                                            <input type="text" maxlength="4" onpaste="return false" class="input-skin">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="row">
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <label for="phone" class="label">Phone</label>
                                                    <input type="text" class="input-skin" id="phone"
                                                        aria-describedby="PhoneHelp">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <label for="phone1" class="label">&nbsp;</label>
                                                    <input type="text" class="input-skin" id="phone1"
                                                        aria-describedby="phone1Help">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <label for="phone3" class="label">&nbsp;</label>
                                                    <input type="text" class="input-skin" id="phone3"
                                                        aria-describedby="phone3Help">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="row">
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <label for="phone4" class="label">Phone2</label>
                                                    <input type="text" class="input-skin" id="phone4"
                                                        aria-describedby="phone4Help">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <label for="phone500" class="label">&nbsp;</label>
                                                    <input type="text" class="input-skin" id="phone500"
                                                        aria-describedby="phone500Help">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <label for="phone6" class="label">&nbsp;</label>
                                                    <input type="text" class="input-skin" id="phone6"
                                                        aria-describedby="phone6Help">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="row">
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <label for="phone700" class="label">Phone3</label>
                                                    <input type="text" class="input-skin" id="phone700"
                                                        aria-describedby="phone700Help">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <label for="Phone888" class="label">&nbsp;</label>
                                                    <input type="text" class="input-skin" id="Phone888"
                                                        aria-describedby="Phone888Help">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <label for="phone8888" class="label">&nbsp;</label>
                                                    <input type="text" class="input-skin" id="phone8888"
                                                        aria-describedby="phone8888Help">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="row">
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <label for="fax11" class="label">Fax</label>
                                                    <input type="text" class="input-skin" id="fax11" maxlength="3"
                                                        aria-describedby="fax11Help">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <label for="fax111" class="label">&nbsp;</label>
                                                    <input type="text" class="input-skin" id="fax111" maxlength="3"
                                                        aria-describedby="fax111Help">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <label for="fax2" class="label">&nbsp;</label>
                                                    <input type="text" class="input-skin" id="fax2" maxlength="3"
                                                        aria-describedby="fax2Help">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                    <label class="custom-control-label" for="customCheck2">Is Primary</label>
                                </div>
                                <p class="pl-4">
                                    If a previous address for this Physician is set as "Primary", saving this address as
                                    "Primary" will remove the "Primary" distinction from the previous address.
                                </p>
                            </div>
                        </div>
                        <div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex justify-content-end">
                                        <input type="submit" value="Save" class="btn btn--submit btn-lg">
                                        <input type="reset" value="Reset" class="btn btn--reset btn-lg ml-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Modal of Add Physicians Address End Here-->
    <!-- <div class="modal fade" id="PatientDiagnosisInfoModal" tabindex=""
        aria-labelledby="PatientDiagnosisInfoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Patient Diagnosis Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-sm-3">
                                <div>
                                    <label for="ICD" class="label"><span class="mendate mr-2">*</span>ICD</label>
                                    <div class="d-flex align-items-center">
                                        <input type="text" class="input-skin" id="ICD" aria-describedby="ICDHelp"
                                            disabled>
                                        <i class="las la-question-circle la-2x ml-2"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-3">
                                <div>
                                    <label for="description" class="label"><span
                                            class="mendate mr-2">*</span>Description</label>
                                    <input type="text" class="input-skin" id="description"
                                        aria-describedby="descriptionHelp">
                                </div>
                            </div>
                            <div class="col-12 col-sm-3">
                                <label for="_date" class="label">Date</label>
                                <div class="d-flex align-items-center">
                                    <input type="text" class="input-skin" id="_date" name="_date"
                                        aria-describedby="_dateHelp">
                                    <i class="las la-question-circle la-2x ml-2"></i>
                                </div>
                            </div>
                            <div class="col-12 col-sm-3">
                                <label for="phone" class="label pb-3">Date Type</label>
                                <div class="d-flex justify-space-between align-items-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">Onset</label>
                                    </div>
                                    <div class="custom-control custom-checkbox ml-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                                        <label class="custom-control-label" for="customCheck3">Exacerbation</label>
                                    </div>
                                    <i class="las la-question-circle la-2x ml-2" style="margin-top: -10px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-sm-3">
                                <label for="_date" class="label">Historical as of</label>
                                <div class="d-flex align-items-center">
                                    <input type="text" class="input-skin" id="historicalAsOf" name="historicalAsOf"
                                        aria-describedby="historicalAsOfHelp">
                                    <i class="las la-question-circle la-2x ml-2"></i>
                                </div>
                            </div>
                            <div class="col-12 col-sm-3">
                                <label for="phone" class="label pb-3">Identified During</label>
                                <div class="d-flex justify-space-between align-items-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck22">
                                        <label class="custom-control-label" for="customCheck22">Referral</label>
                                    </div>
                                    <div class="custom-control custom-checkbox ml-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck33">
                                        <label class="custom-control-label" for="customCheck33">Assessment </label>
                                    </div>
                                    <i class="las la-question-circle la-2x ml-2" style="margin-top: -10px;"></i>
                                </div>
                            </div>
                            <div class="col-12 col-sm-3">
                                <label for="phone" class="label pb-3">Primary</label>
                                <div class="d-flex justify-space-between align-items-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck444">
                                        <label class="custom-control-label" for="customCheck444">Primary</label>
                                    </div>
                                    <i class="las la-question-circle la-2x ml-2" style="margin-top: -10px;"></i>
                                </div>
                            </div>
                            <div class="col-12 col-sm-3"></div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <input type="submit" value="Submit" class="btn btn--submit btn-lg">
                            <input type="reset" value="Reset" class="btn btn--reset btn-lg ml-2">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
@endsection


@push('scripts')
<link rel="stylesheet" href="{{ asset('assets/css/patient_ref_form.min.css') }}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script> 
    <script>
        $('#add_note').click(function() {
            var notes = $('textarea[name="notes"]').val();
           
            if (notes == '') {
                $('.note_error').text('Please enter note');
            } else {
                $('.note_error').text('');
                $('input[name="address_note"]').val(notes);
                $('#addNotesModal').modal('hide');
            }
        });
        $(document).on('change', '.stateValue', function () {
            var temp = $(this);
            var item_type_is = temp.val();
            
            if (item_type_is != "") {
                $.ajax({
                    type: "GET",
                    url: "{{url('get-city-data')}}/" + item_type_is,
                    dataType: "JSON",
                    success: function (data) {
                        temp.parents('tr').find('.selectedCityState').css({"display" : "block"});
                        temp.parents('tr').find('.selectedCity').css({"display" : "none"});
                        temp.parents('tr').find('.cityStateValue').html('');
                        if (data.status == 200) {
                            
                            if (data.result != '') {
                                
                                $.each(data.result, function (key, value) {
                                    var id = value['state_code'];
                                    var name = value['city'];
                                    temp.parents('tr').find('.cityStateValue').append('<option value="' + name + '">' + name + '</option>');
                                });
                            }
                        }
                      
                    },
                });
            } 
        });

        $(document).on('change', '.cityValue', function () {
            var temp = $(this);
            var item_type_is = temp.val();
        
            if (item_type_is != "") {
                $.ajax({
                    type: "GET",
                    url: "{{url('get-state-data')}}/" + item_type_is,
                    dataType: "JSON",
                    success: function (data) {
                        temp.parents('tr').find('.selectedStateCity').css({"display" : "block"});
                        temp.parents('tr').find('.selectedState').css({"display" : "none"});
                        temp.parents('tr').find('.stateCityValue').html('');

                        temp.parents('tr').find('.stateValue').html('');
                        if (data.status == 200) {
                            if (data.result != '') {
                                $.each(data.result, function (key, value) {
                                    var id = value['state_code'];
                                    var name = value['state'];
                                    temp.parents('tr').find('.stateCityValue').append('<option value="' + name + '">' + name + '</option>');
                                });
                            }
                        }
                      
                    },
                });
            } 
        });
       
        $('.stateValue').select2({
            minimumInputLength: 2,
            placeholder: 'Select a state',
            ajax: {
                type: "POST",
                url: "{{ route('get-state-data') }}",
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                  
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.state + '-' + item.state_code,
                                id: item.state_code
                            }
                        })
                    };
                },
                cache: true
            }
        });
                
        $('.cityValue').select2({
            minimumInputLength: 2,
            placeholder: 'Select a city',
            ajax: {
                type: "POST",
                url: "{{ route('get-city-data') }}",
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                  
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.city + '-' + item.state_code,
                                id: item.city + '-' + item.state_code
                            }
                        })
                    };
                },
                cache: true
            }
        });

        $('.cityStateValue').select2();
        $('.stateCityValue').select2();
        $('#company_id, #service_id, #Gender, #race, #ethnicity, #relation, #primaryLanguage1, #primaryLanguage, #addressType, #marital_status').select2();
        
        $('.add_patient_form').on('submit', function(event){
            event.preventDefault();
          
            var url = "{{ Route('patient.store') }}";
            $("#loader-wrapper").show();
            $.ajax({
               type:"POST",
               url:url,
               data:new FormData(this),
               headers: {
                     'X_CSRF_TOKEN': '{{ csrf_token() }}',
               },
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    if(data.status == 400) {
                        alertText(data.message,'error');
                        //  $.each( data.message, function( key, value ) {
                        //     if (data.action === 'add') {
                        //        t.parents('.insurance_company').find("." + key + "-invalid-feedback").append('<strong>' + value[0] + '</strong>');
                        //     } else if (data.action === 'edit') {
                        //        t.parents("tr").find("." + key + "-invalid-feedback").append('<strong>' + value[0] + '</strong>');
                        //     }
                        //  });
                    } else {
                        alertText(data.message,'success');
                        $('.add_patient_form')[0].reset();
                    }
                    $("#loader-wrapper").hide();
                },
                error: function() {
                    alertText("Server Timeout! Please try again",'warning');
                    $("#loader-wrapper").hide();
                }
            });
        });
  
        $(function () {
            $('input[name="serviceRequestStartDate"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            });
            $('input[name="dateOfBirth"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            }, function (start, end, label) {
                var years = moment().diff(start, 'years');
                alert("You are " + years + " years old!");
            });
          
            $('#addPhysicBtn').on('click', function () {
                $('#addPhysiciansModal').modal('hide');
                $('#addPhysicModal').modal({
                    keyboard: false
                });
            })
            $('#addAddressBtn').on('click', function () {
                $('#addPhysicModal').modal('hide');
                $('#addPhysicAddressModal').modal({
                    keyboard: false
                });
            })

            /*@ Image preview */
            $("#avatar").change(function() {
                profileimage(this);
            });
        });

        function alertText(text,status) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: status,
                title: text
            })
        }

        function profileimage(input) {
            var fileTypes = ['jpg', 'jpeg', 'png'];
            if (input.files && input.files[0]) {
                var extension = input.files[0].name.split('.').pop().toLowerCase();
                isSuccess = fileTypes.indexOf(extension) > -1;
                if (isSuccess) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#s1').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }else{
                    $('#s1').css({'display':'none'});
                }
            }
        }
    </script>
@endpush
