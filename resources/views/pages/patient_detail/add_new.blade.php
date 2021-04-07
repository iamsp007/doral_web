@extends('pages.layouts.app')

@section('title','Patient')

@section('pageTitleSection')
    Add Patient
@endsection
@section('content')
    <!-- Demographics Start Here -->
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
                                        <span class="mendate">*</span> First Name :
                                    </td>
                                    <td class="border-0" style="width: 70%;">
                                        <input type="text" class="input-small-skin">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 30%;" class="text-right border-0">
                                        <span class="mendate">*</span> Last Name :
                                    </td>
                                    <td class="border-0" style="width: 70%;">
                                        <input type="text" class="input-small-skin">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 30%;" class="text-right border-0">
                                        <span class="mendate">*</span> Gender :
                                    </td>
                                    <td class="border-0" style="width: 70%;">
                                        <div
                                            class="d-flex align-items-center justify-content-between">
                                            <div style="width: 45%;">
                                                <select name="Gender" id="Gender"
                                                        class="input-small-skin select2">
                                                    <option value="">Male</option>
                                                    <option value="">Female</option>
                                                    <option value="">Other</option>
                                                </select>
                                            </div>
                                            <div style="width: 55%;">
                                                <table style="width: 100%;">
                                                    <tr>
                                                        <td style="width: 20%;"
                                                            class="text-right border-0">
                                                            Race :
                                                        </td>
                                                        <td class="border-0"
                                                            style="width: 80%;padding-right: 0;">
                                                            <select name="Race" id="Race"
                                                                    class="input-small-skin select2">
                                                                <option selected="selected"
                                                                        value="-1">Select
                                                                </option>
                                                                <option value="1">American
                                                                    Indian or Alaska Native
                                                                </option>
                                                                <option value="2">Asian</option>
                                                                <option value="3">Black or
                                                                    African American</option>
                                                                <option value="4">Native
                                                                    Hawaiian or Other Pacific
                                                                    Islander</option>
                                                                <option value="5">White</option>
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
                                        <select name="Ethnicity" id="Ethnicity"
                                                class="input-small-skin select2">
                                            <option selected="selected" value="-1">Select
                                            </option>
                                            <option value="1">Hispanic or Latino</option>
                                            <option value="2">Not Hispanic or Latino</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 30%;" class="text-right border-0">
                                        Service Request Start Date :
                                    </td>
                                    <td class="border-0" style="width: 70%;">
                                        <input type="text" name="serviceRequestStartDate"
                                               class="input-small-skin">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 30%;" class="text-right border-0">
                                        Source Of Admission :
                                    </td>
                                    <td class="border-0" style="width: 70%;">
                                        <select name="SourceOfAdmission" id="SourceOfAdmission"
                                                class="input-small-skin select2">
                                            <option selected="selected" value="-1">Select
                                            </option>
                                            <option value="26068">Assistant live-in facilities
                                            </option>
                                            <option value="213">CHHA</option>
                                            <option value="543">Hospice</option>
                                            <option value="208">Hospital</option>
                                            <option value="215">LHCSA</option>
                                            <option value="216">Local social services/Casa
                                            </option>
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
                                </tr>
                                <tr>
                                    <td style="width: 30%;" class="text-right border-0">
                                        Team :
                                    </td>
                                    <td class="border-0" style="width: 70%;">
                                        <div
                                            class="d-flex align-items-center justify-content-between">
                                            <div style="width: 45%;">
                                                <select name="Team" id="Team"
                                                        class="input-small-skin select2">
                                                    <option selected="selected" value="-1">
                                                        Select
                                                    </option>
                                                </select>
                                            </div>
                                            <div style="width: 55%;">
                                                <table style="width: 100%;">
                                                    <tr>
                                                        <td style="width: 21%;"
                                                            class="text-right border-0">
                                                            Location :
                                                        </td>
                                                        <td class="border-0"
                                                            style="width: 79%;padding-right: 0;">
                                                            <select name="Location"
                                                                    id="Location"
                                                                    class="input-small-skin select2">
                                                                <option selected="selected"
                                                                        value="-1">Select
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
                                    <td style="width: 30%;" class="text-right border-0">
                                        <span class="mendate">*</span> Accepted Services :
                                    </td>
                                    <td class="border-0" style="width: 70%;">
                                        <div class="checkForm">
                                            <div class="blocks">
                                                <label>
                                                    <input type="checkbox">
                                                    <span
                                                        style="font-size:12px; padding-left: 25px;">PCA</span>
                                                </label>
                                            </div>
                                            <div class="blocks">
                                                <label>
                                                    <input type="checkbox">
                                                    <span
                                                        style="font-size:12px; padding-left: 25px;">HHA</span>
                                                </label>
                                            </div>
                                            <div class="blocks">
                                                <label>
                                                    <input type="checkbox">
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
                                </tr>
                                </tbody>
                            </table>
                        </th>
                        <th class="p-0" style="width: 50%;vertical-align: top!important;">
                            <table class="table table-borderless border-0">
                                <tbody>
                                <tr>
                                    <td style="width: 30%;" class="text-right border-0">
                                        Middle Name :
                                    </td>
                                    <td class="border-0" style="width: 70%;">
                                        <input type="text" class="input-small-skin">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 30%;" class="text-right border-0">
                                        <span class="mendate">*</span> DOB :
                                    </td>
                                    <td class="border-0" style="width: 70%;">
                                        <div
                                            class="d-flex align-items-center justify-content-between">
                                            <div style="width: 45%;">
                                                <input type="text" name="dob"
                                                       class="input-small-skin">
                                            </div>
                                            <div style="width: 55%;">
                                                <table style="width: 100%;">
                                                    <tr>
                                                        <td style="width: 30%;"
                                                            class="text-right border-0">
                                                            <span class="mendate">*</span>
                                                            Coordinator :
                                                        </td>
                                                        <td class="border-0"
                                                            style="width: 70%;padding-right: 0;">
                                                            <select name="Coordinator"
                                                                    id="Coordinator"
                                                                    class="input-small-skin select2">
                                                                <option selected="selected"
                                                                        value="-1">Select
                                                                </option>
                                                                <option value="29140">Abu
                                                                </option>
                                                                <option value="28689">Alicia
                                                                </option>
                                                                <option value="38046">Amna
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
                                    <td style="width: 30%;" class="text-right border-0">
                                        Coordinator 2 :
                                    </td>
                                    <td class="border-0" style="width: 70%;">
                                        <div
                                            class="d-flex justify-content-between align-items-center">
                                            <div style="width: 45%;">
                                                <select name="Coordinator2" id="Coordinator2"
                                                        class="input-small-skin select2">
                                                    <option selected="selected" value="-1">
                                                        Select
                                                    </option>
                                                    <option value="29140">Abu</option>
                                                    <option value="28689">Alicia</option>
                                                </select>
                                            </div>
                                            <div style="width: 55%; padding-right: 0;">
                                                <table style="width: 100%;">
                                                    <tr>
                                                        <td style="width: 30%;"
                                                            class="text-right border-0">
                                                            Nurse :
                                                        </td>
                                                        <td class="border-0"
                                                            style="width: 70%;padding-right: 0;">
                                                            <select name="Nurse" id="Nurse"
                                                                    class="input-small-skin select2">
                                                                <option selected="selected"
                                                                        value="-1">Select
                                                                </option>
                                                                <option value="29140">Abu
                                                                </option>
                                                                <option value="28689">Alicia
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
                                </tr>
                                <tr>
                                    <td style="width: 30%;" class="text-right border-0">
                                        Doral ID :
                                    </td>
                                    <td class="border-0" style="width: 70%;">
                                        <div
                                            class="d-flex justify-content-between align-items-center">
                                            <div style="width: 45%;">
                                                <input type="text" class="input-small-skin">
                                            </div>
                                            <div style="width: 55%;padding-right: 0;">
                                                <table style="width: 100%;">
                                                    <tr>
                                                        <td style="width: 45%;"
                                                            class="text-right border-0">
                                                            Medicaid Number :
                                                        </td>
                                                        <td class="border-0"
                                                            style="width: 55%;padding-right: 0;">
                                                            <input type="text"
                                                                   class="input-small-skin">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 30%;" class="text-right border-0">
                                        Medicare Number :
                                    </td>
                                    <td class="border-0" style="width: 70%;">
                                        <div
                                            class="d-flex justify-content-between align-items-center">
                                            <div style="width: 45%;">
                                                <input type="text" class="input-small-skin">
                                            </div>
                                            <div style="width: 55%;">
                                                <table style="width: 100%;">
                                                    <tr>
                                                        <td style="width:45%;"
                                                            class="text-right border-0">
                                                            HI Claim Number :
                                                        </td>
                                                        <td class="border-0"
                                                            style="width:55%;padding-right: 0;">
                                                            <input type="text"
                                                                   class="input-small-skin">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 30%;" class="text-right border-0">
                                        Wage Parity :
                                    </td>
                                    <td class="border-0" style="width: 70%;">
                                        <label>
                                            <input type="checkbox">
                                            <span style="font-size:12px">(Contract setup
                                                                        overrides Patient setup)</span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 30%;" class="text-right border-0">
                                        From Date
                                    </td>
                                    <td class="border-0" style="width: 70%;">
                                        <div
                                            class="d-flex justify-content-between align-items-center">
                                            <div style="width: 45%;">
                                                <input type="text" name="formDate1"
                                                       class="input-small-skin">
                                            </div>
                                            <div style="width: 55%;padding-right: 0;">
                                                <table style="width: 100%;">
                                                    <tr>
                                                        <td style="width:45%;;"
                                                            class="text-right">
                                                            To Date :
                                                        </td>
                                                        <td style="width:55%;">
                                                            <input type="text" name="toDate1"
                                                                   class="input-small-skin">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 30%;" class="text-right border-0">
                                        From Date :
                                    </td>
                                    <td class="border-0" style="width: 70%;">
                                        <div
                                            class="d-flex justify-content-between align-items-center">
                                            <div style="width: 45%;">
                                                <input type="text" name="formDate2"
                                                       class="input-small-skin">
                                            </div>
                                            <div style="width: 55%;padding-right: 0;">
                                                <table style="width: 100%;">
                                                    <tr>
                                                        <td style="width:45%;;"
                                                            class="text-right">
                                                            To Date :
                                                        </td>
                                                        <td style="width:55%;">
                                                            <input type="text" name="toDate2"
                                                                   class="input-small-skin">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 30%;" class="text-right border-0">
                                        SSN :#
                                    </td>
                                    <td class="border-0" style="width: 70%;">
                                        <div class="d-flex align-items-center">
                                            <div><input type="text" class="input-small-skin">
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="ml-2 mr-2">
                                                    Allow Duplicate :
                                                </div>
                                                <div>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span style="font-size:12px"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        (e.g. xxx-xx-xxxx)
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
                                                        <textarea class="input-small-skin" name="" id="" cols="30"
                                                                  rows="5"></textarea>
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
        </tr>
        <tr>
            <td>
                <table style="width: 100%;" class="table table-borderless table-sm m-0">
                    <thead>
                    <tr>
                        <th>Address Line 1</th>
                        <th>Address Line 2</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Country</th>
                        <th>Zip</th>
                        <th>Cross Street</th>
                        <th>Primary</th>
                        <th>Address Type(s)</th>
                        <th>Notes</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <input type="text" class="input-small-skin">
                        </td>
                        <td>
                            <input type="text" class="input-small-skin">
                        </td>
                        <td>
                            <input type="text" class="input-small-skin">
                        </td>
                        <td>
                            <select id="ddlState0" class="input-small-skin select2">
                                <option value="-1">Select</option>
                                <option value="AK">AK</option>
                                <option value="AL">AL</option>
                                <option value="AR">AR</option>
                                <option value="AZ">AZ</option>
                                <option value="CA">CA</option>
                                <option value="CO">CO</option>
                                <option value="CT">CT</option>
                                <option value="DC">DC</option>
                                <option value="DE">DE</option>
                                <option value="FL">FL</option>
                                <option value="GA">GA</option>
                                <option value="HI">HI</option>
                                <option value="IA">IA</option>
                                <option value="ID">ID</option>
                                <option value="IL">IL</option>
                                <option value="IN">IN</option>
                                <option value="KS">KS</option>
                                <option value="KY">KY</option>
                                <option value="LA">LA</option>
                                <option value="MA">MA</option>
                                <option value="MD">MD</option>
                                <option value="ME">ME</option>
                                <option value="MI">MI</option>
                                <option value="MN">MN</option>
                                <option value="MO">MO</option>
                                <option value="MS">MS</option>
                                <option value="MT">MT</option>
                                <option value="NC">NC</option>
                                <option value="ND">ND</option>
                                <option value="NE">NE</option>
                                <option value="NH">NH</option>
                                <option value="NJ">NJ</option>
                                <option value="NM">NM</option>
                                <option value="NV">NV</option>
                                <option value="NY">NY</option>
                                <option value="OH">OH</option>
                                <option value="OK">OK</option>
                                <option value="OR">OR</option>
                                <option value="PA">PA</option>
                                <option value="PR">PR</option>
                                <option value="RI">RI</option>
                                <option value="SC">SC</option>
                                <option value="SD">SD</option>
                                <option value="TN">TN</option>
                                <option value="TX">TX</option>
                                <option value="UT">UT</option>
                                <option value="VA">VA</option>
                                <option value="VT">VT</option>
                                <option value="WA">WA</option>
                                <option value="WI">WI</option>
                                <option value="WV">WV</option>
                                <option value="WY">WY</option>
                            </select>
                        </td>
                        <td>
                            <select name="country" class="input-small-skin select2" id="country">
                                <option value="-1">Select</option>
                                <option value="">USA</option>
                            </select>
                        </td>
                        <td>
                            <div class="d-flex justify-content-between align-items-center">
                                <div style="width: 49%;">
                                    <input type="text" class="input-small-skin">
                                </div>
                                <div style="width: 49%;">
                                    <input type="text" class="input-small-skin">
                                </div>
                            </div>
                        </td>
                        <td>
                            <input type="text" class="input-small-skin">
                        </td>
                        <td>
                            <label>
                                <input type="checkbox">
                                <span style="font-size:12px; padding-left: 25px;"></span>
                            </label>
                        </td>
                        <td>
                            <select name="addressType" class="input-small-skin select2"
                                    id="addressType">
                                <option value="-1">Select</option>
                                <option value="GPS">GPS</option>
                                <option value="Home">Home</option>
                                <option value="Community">Community</option>
                            </select>
                        </td>
                        <td>
                            <div class="d-flex justify-content-between align-items-center">
                                <div style="width: 50%;">
                                    <a href="javascript:void(0)" target="_blank"
                                       class="text-underline" rel="noopener noreferrer">
                                        Add
                                    </a>
                                </div>
                                <div style="width: 50%;">
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
    </table>
    <!-- Address End Here -->
    <!-- Phone Number Information Start Here -->
    <table class="table table-borderless table-sm patientTable shadow">
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
                                                    <option selected="selected" value="-1">
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
                                                    <option selected="selected" value="-1">
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
                                                    <option selected="selected" value="-1">
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
    </table>
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
        <tbody>
        <tr>
            <td style="width: 50%;" class="border-0">
                <table style="width: 100%;" class="table table-borderless table-sm m-0 border-0">
                    <tr>
                        <th style="width: 30%;" class="text-right">Name :</th>
                        <td style="width: 70%;">
                            <input type="text" class="input-small-skin">
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 30%;" class="text-right">Lives with Patient :</th>
                        <td style="width: 70%;">
                            <div class="d-flex justify-content-between align-items-center">
                                <div style="width: 5%;">
                                    <label>
                                        <input type="checkbox">
                                        <span style="font-size:12px; padding-left: 25px;"></span>
                                    </label>
                                </div>
                                <div style="width: 95%;">
                                    <table style="width: 100%;">
                                        <tr>
                                            <th style="width: 14%;">
                                                Have Keys
                                            </th>
                                            <td style="width: 86%;">
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
                    <tr>
                        <th style="width: 30%;" class="text-right">Address :</th>
                        <td style="width: 70%;">
                                            <textarea name="address1" id="address1" class="input-small-skin" cols="30"
                                                      rows="5"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 30%;" class="text-right">Name :</th>
                        <td style="width: 70%;">
                            <div class="d-flex align-items-center">
                                <div style="width: 45%;">
                                    <input type="text" class="input-small-skin">
                                </div>
                                <div style="width: 55%;">
                                    <table style="width: 100%;">
                                        <tr>
                                            <th style="width: 50%;">
                                                <label class="ml-2">
                                                    <input type="checkbox">
                                                    <span
                                                        style="font-size:12px; padding-left: 25px;font-weight: bold;">Lives
                                                                        with Patient</span>
                                                </label>
                                            </th>
                                            <td style="width: 50%;">
                                                <label>
                                                    <input type="checkbox">
                                                    <span
                                                        style="font-size:12px; padding-left: 25px;font-weight: bold;">Have
                                                                        Keys</span>
                                                </label>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 30%;" class="text-right">Address :</th>
                        <td style="width: 70%;">
                                            <textarea name="address1" id="address1" class="input-small-skin" cols="30"
                                                      rows="5"></textarea>
                        </td>
                    </tr>
                </table>
            </td>
            <td style="width: 50%;" class="border-0">
                <table style="width: 100%;" class="table table-borderless table-sm m-0 border-0">
                    <tr>
                        <th style="width: 30%;" class="text-right">Relationship :</th>
                        <td style="width: 70%;">
                            <select name="relationship1" id="relationship1"
                                    class="input-small-skin select2">
                                <option value="-1">Select</option>
                                <option value="274859">Babysitter</option>
                                <option value="274858">Babysitter and Friend</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 30%;" class="text-right">Phone 1 :</th>
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
                                </div>
                            </div>
                        </td>
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
                    </tr>
                    <tr>
                        <th style="width: 30%;" class="text-right">Relationship :</th>
                        <td style="width: 70%;">
                            <select name="relationship" id="relationship"
                                    class="input-small-skin select2">
                                <option value="-1">Select</option>
                                <option value="274859">Babysitter</option>
                                <option value="274858">Babysitter and Friend</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 30%;" class="text-right">Phone 1 :</th>
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
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
    <!-- Emergency Contact Information End Here -->
    <!-- Emergency Preparedness Start Here -->
    <table class="table table-borderless table-sm patientTable shadow">
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
                                <option value="-1">Select</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 30%;" class="text-right">Mobility Status :</th>
                        <td style="width: 70%;">
                            <select name="MobilityStatus" id="MobilityStatus"
                                    class="input-small-skin select2">
                                <option value="-1">Select</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 30%;" class="text-right">Evacuation Location :</th>
                        <td style="width: 70%;">
                            <select name="EvacuationLocation1" id="EvacuationLocation1"
                                    class="input-small-skin select2">
                                <option value="-1">Select</option>
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
                                <option value="-1">Select</option>
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
    </table>
    <!-- Emergency Preparedness End Here -->
    <!-- Clinical Info Start Here -->
    <table class="table table-borderless table-sm patientTable shadow">
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
    </table>
    <!-- Clinical Info End Here -->
    <!-- Allergies Start Here -->
    <table class="table table-borderless table-sm patientTable shadow">
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
    </table>
    <!-- Allergies End Here -->
    <!-- Allergy Start Here -->
    <table class="table table-borderless table-sm patientTable shadow">
        <thead>
        <tr class="table-active">
            <th>
                <div class="d-flex justify-content-between align-items-center">
                    <div style="width: 50%;">
                        Allergy</div>
                    <div style="width: 50%;" class="d-flex justify-content-end">
                        <a href="javascript:void(0)"
                           class="btn btn-light btn-sm font-weight-bold p-0 pl-2 pr-2"
                           data-toggle="modal" data-target="#allergyModal">ADD</a>
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
                                <option value="-1">Select</option>
                                <option selected disabled value="Anaphylaxis">Anaphylaxis</option>
                                <option value="Blisters">Blisters</option>
                            </select>
                        </td>
                        <td>
                            <select name="severity" id="severity" class="input-small-skin select2">
                                <option selected disabled value="-1">Select</option>
                            </select>
                        </td>
                        <td>
                            <select name="source" id="source" class="input-small-skin select2">
                                <option selected disabled value="-1">Select</option>
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
    </table>
    <!-- Allergy End Here -->
    <!-- Advanced Directive(s) Start Here -->
    <table class="table table-borderless table-sm patientTable shadow">
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
    </table>
    <!-- Advanced Directive(s) End Here -->
    <!-- Physicians Start Here -->
    <table class="table table-borderless table-sm patientTable shadow">
        <thead>
        <tr class="table-active">
            <th>
                <div class="d-flex justify-content-between align-items-center">
                    <div style="width: 50%;">
                        Physicians
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
    </table>
    <!-- Physicians End Here -->
    <!-- Md Orders Start Here -->
    <table class="table table-borderless table-sm patientTable shadow">
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
    </table>
    <!-- Md Orders End Here -->
    <!-- Diagnosis Start Here -->
    <table class="table table-borderless table-sm patientTable shadow">
        <thead>
        <tr class="table-active">
            <th>
                <div class="d-flex justify-content-between align-items-center">
                    <div style="width: 50%;">
                        Diagnosis
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
    </table>
    <!-- Diagnosis End Here -->
    <!-- Patient Preferences: Used for Scheduling Start Here -->
    <table class="table table-borderless table-sm patientTable shadow">
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
    </table>
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
                <div class="alert alert-warning text-center mb-0" role="alert">
                    No preferences found
                </div>
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
                                        <select name="primaryLanguage1" id="primaryLanguage1"
                                                class="input-small-skin select2">
                                            <option selected="selected" value="-1">Select
                                            </option>
                                            <option value="44">African</option>
                                            <option value="19">Albanian</option>
                                            <option value="64">American Sign Language</option>
                                            <option value="66">Amharic</option>
                                            <option value="11">Arabic</option>
                                            <option value="51">Armenian</option>
                                            <option value="45">Ashanti</option>
                                            <option value="81">Azerbaijani</option>
                                            <option value="83">Belarusian</option>
                                            <option value="30">Bengali</option>
                                            <option value="46">Bilingual</option>
                                            <option value="70">Bosnian</option>
                                            <option value="31">Bulgaria</option>
                                            <option value="90">Burmese</option>
                                            <option value="15">Cantonese</option>
                                            <option value="4">Chinese</option>
                                            <option value="12">Creole</option>
                                            <option value="97">Croatian</option>
                                            <option value="82">Czech</option>
                                            <option value="84">Danish</option>
                                            <option value="71">Dari</option>
                                            <option value="57">Dutch</option>
                                            <option value="68">Edo/Bini</option>
                                            <option value="2">English</option>
                                            <option value="85">Estonian</option>
                                            <option value="72">Ethiopian</option>
                                            <option value="25">Farsi</option>
                                            <option value="65">Filipino</option>
                                            <option value="5">French</option>
                                            <option value="14">Fukkianese</option>
                                            <option value="78">Fula/Fulani</option>
                                            <option value="54">Fuzhounese</option>
                                            <option value="33">Georgian</option>
                                            <option value="37">German</option>
                                            <option value="47">Ghana</option>
                                            <option value="34">Greek</option>
                                            <option value="73">Gujarati</option>
                                            <option value="63">Guyanese</option>
                                            <option value="98">Haitian</option>
                                            <option value="55">Hakka</option>
                                            <option value="79">Hausa</option>
                                            <option value="6">Hebrew</option>
                                            <option value="17">Hindi</option>
                                            <option value="8">Hungarian</option>
                                            <option value="67">IGBO</option>
                                            <option value="96">Indonesian</option>
                                            <option value="10">Italian</option>
                                            <option value="48">Jamaican</option>
                                            <option value="49">Japanese</option>
                                            <option value="21">Kajainese</option>
                                            <option value="89">Kannada</option>
                                            <option value="87">Kazakh</option>
                                            <option value="93">khmer</option>
                                            <option value="62">Khmer/Cambodian</option>
                                            <option value="101">Kinyarwanda</option>
                                            <option value="18">Korean</option>
                                            <option value="60">Krio</option>
                                            <option value="100">Kurdish</option>
                                            <option value="58">Kyrgyz</option>
                                            <option value="94">Lao</option>
                                            <option value="43">Latvian</option>
                                            <option value="99">Lingala</option>
                                            <option value="86">Lithuanian</option>
                                            <option value="95">Malayalam</option>
                                            <option value="50">Mandarin</option>
                                            <option value="74">Nepali</option>
                                            <option value="75">Pashto</option>
                                            <option value="28">Patwa</option>
                                            <option value="35">Persian</option>
                                            <option value="13">Polish</option>
                                            <option value="52">Portuguese</option>
                                            <option value="61">POTWARI</option>
                                            <option value="53">Punjabi</option>
                                            <option value="26">Romanian</option>
                                            <option value="7">Russian</option>
                                            <option value="91">Serbian</option>
                                            <option value="23">Shanghainese</option>
                                            <option value="69">Sinhala</option>
                                            <option value="76">Somali</option>
                                            <option value="77">Soninke</option>
                                            <option value="1">Spanish</option>
                                            <option value="38">Swahili</option>
                                            <option value="36">Tagalog</option>
                                            <option value="56">Taishan</option>
                                            <option value="16">Taishanese</option>
                                            <option value="22">Taiwanese</option>
                                            <option value="80">Tajik</option>
                                            <option value="59">Temne</option>
                                            <option value="92">Thai</option>
                                            <option value="88">Tibetan</option>
                                            <option value="27">Turkish</option>
                                            <option value="39">Twi</option>
                                            <option value="40">Ukrainian</option>
                                            <option value="29">Urdu</option>
                                            <option value="20">Uzbek</option>
                                            <option value="41">Vietnamese</option>
                                            <option value="24">Wenzhounese</option>
                                            <option value="3">Yiddish</option>
                                            <option value="42">Yoruba</option>
                                            <option value="32">Yugoslavia</option>
                                        </select>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                        <td style="width: 33%;" class="border-0">
                            <table style="width: 100%;"
                                   class="table table-borderless table-sm m-0 border-0">
                                <tbody>
                                <tr>
                                    <th style="width: 30%;" class="text-right">Evacuation
                                        Location :</th>
                                    <td style="width: 70%;">
                                        <select name="EvacuationLocation"
                                                id="EvacuationLocation"
                                                class="input-small-skin select2">
                                            <option value="-1">Select</option>
                                        </select>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                        <td style="width: 33%;" class="border-0">
                            <table style="width: 100%;"
                                   class="table table-borderless table-sm m-0 border-0">
                                <tbody>
                                <tr>
                                    <th style="width: 30%;" class="text-right">Secondary
                                        Language :
                                    </th>
                                    <td style="width: 70%;">
                                        <select name="primaryLanguage" id="primaryLanguage"
                                                class="input-small-skin select2">
                                            <option selected="selected" value="-1">Select
                                            </option>
                                            <option value="44">African</option>
                                            <option value="19">Albanian</option>
                                            <option value="64">American Sign Language</option>
                                            <option value="66">Amharic</option>
                                            <option value="11">Arabic</option>
                                            <option value="51">Armenian</option>
                                            <option value="45">Ashanti</option>
                                            <option value="81">Azerbaijani</option>
                                            <option value="83">Belarusian</option>
                                            <option value="30">Bengali</option>
                                            <option value="46">Bilingual</option>
                                            <option value="70">Bosnian</option>
                                            <option value="31">Bulgaria</option>
                                            <option value="90">Burmese</option>
                                            <option value="15">Cantonese</option>
                                            <option value="4">Chinese</option>
                                            <option value="12">Creole</option>
                                            <option value="97">Croatian</option>
                                            <option value="82">Czech</option>
                                            <option value="84">Danish</option>
                                            <option value="71">Dari</option>
                                            <option value="57">Dutch</option>
                                            <option value="68">Edo/Bini</option>
                                            <option value="2">English</option>
                                            <option value="85">Estonian</option>
                                            <option value="72">Ethiopian</option>
                                            <option value="25">Farsi</option>
                                            <option value="65">Filipino</option>
                                            <option value="5">French</option>
                                            <option value="14">Fukkianese</option>
                                            <option value="78">Fula/Fulani</option>
                                            <option value="54">Fuzhounese</option>
                                            <option value="33">Georgian</option>
                                            <option value="37">German</option>
                                            <option value="47">Ghana</option>
                                            <option value="34">Greek</option>
                                            <option value="73">Gujarati</option>
                                            <option value="63">Guyanese</option>
                                            <option value="98">Haitian</option>
                                            <option value="55">Hakka</option>
                                            <option value="79">Hausa</option>
                                            <option value="6">Hebrew</option>
                                            <option value="17">Hindi</option>
                                            <option value="8">Hungarian</option>
                                            <option value="67">IGBO</option>
                                            <option value="96">Indonesian</option>
                                            <option value="10">Italian</option>
                                            <option value="48">Jamaican</option>
                                            <option value="49">Japanese</option>
                                            <option value="21">Kajainese</option>
                                            <option value="89">Kannada</option>
                                            <option value="87">Kazakh</option>
                                            <option value="93">khmer</option>
                                            <option value="62">Khmer/Cambodian</option>
                                            <option value="101">Kinyarwanda</option>
                                            <option value="18">Korean</option>
                                            <option value="60">Krio</option>
                                            <option value="100">Kurdish</option>
                                            <option value="58">Kyrgyz</option>
                                            <option value="94">Lao</option>
                                            <option value="43">Latvian</option>
                                            <option value="99">Lingala</option>
                                            <option value="86">Lithuanian</option>
                                            <option value="95">Malayalam</option>
                                            <option value="50">Mandarin</option>
                                            <option value="74">Nepali</option>
                                            <option value="75">Pashto</option>
                                            <option value="28">Patwa</option>
                                            <option value="35">Persian</option>
                                            <option value="13">Polish</option>
                                            <option value="52">Portuguese</option>
                                            <option value="61">POTWARI</option>
                                            <option value="53">Punjabi</option>
                                            <option value="26">Romanian</option>
                                            <option value="7">Russian</option>
                                            <option value="91">Serbian</option>
                                            <option value="23">Shanghainese</option>
                                            <option value="69">Sinhala</option>
                                            <option value="76">Somali</option>
                                            <option value="77">Soninke</option>
                                            <option value="1">Spanish</option>
                                            <option value="38">Swahili</option>
                                            <option value="36">Tagalog</option>
                                            <option value="56">Taishan</option>
                                            <option value="16">Taishanese</option>
                                            <option value="22">Taiwanese</option>
                                            <option value="80">Tajik</option>
                                            <option value="59">Temne</option>
                                            <option value="92">Thai</option>
                                            <option value="88">Tibetan</option>
                                            <option value="27">Turkish</option>
                                            <option value="39">Twi</option>
                                            <option value="40">Ukrainian</option>
                                            <option value="29">Urdu</option>
                                            <option value="20">Uzbek</option>
                                            <option value="41">Vietnamese</option>
                                            <option value="24">Wenzhounese</option>
                                            <option value="3">Yiddish</option>
                                            <option value="42">Yoruba</option>
                                            <option value="32">Yugoslavia</option>
                                        </select>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table style="width: 100%;">
                    <tr>
                        <th style="width: 10%;" class="text-right">
                            Other :
                        </th>
                        <td style="width: 90%;">
                                            <textarea class="input-small-skin" name="other" id="other" cols="30"
                                                      rows="5"></textarea>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
    <div class="d-flex mt-4 justify-content-end">
        <input type="submit" value="Submit" class="btn btn--submit btn-lg">
        <input type="reset" value="Reset" class="btn btn--reset btn-lg ml-4">
    </div>
    <!-- Patient Preferences: Not Used for Scheduling End Here -->
@endsection

@section('app-video')
    <!-- Modal of Allergy Start Here-->
    <div class="modal fade" id="allergyModal" tabindex="-1" aria-labelledby="allergyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Allergy</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-4">
                    Content goes here....
                </div>
            </div>
        </div>
    </div>
    <!-- Modal of Allergy End Here-->
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('new/assets/css/patient_ref_form.css') }}">
    <link rel="stylesheet" href="{{ asset('new/assets/css/daterangepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('new/assets/css/sidebar.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
          integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
          crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('new/assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('new/assets/css/responsive.min.css') }}">
@endpush
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"
            integrity="sha512-RtZU3AyMVArmHLiW0suEZ9McadTdegwbgtiQl5Qqo9kunkVg1ofwueXD8/8wv3Af8jkME3DDe3yLfR8HSJfT2g=="
            crossorigin="anonymous"></script>
    <script>
        $(function () {
            $('input[name="formDate1"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            }, function (start, end, label) {
                var years = moment().diff(start, 'years');
                alert("You are " + years + " years old!");
            });
            $('input[name="toDate1"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            }, function (start, end, label) {
                var years = moment().diff(start, 'years');
                alert("You are " + years + " years old!");
            });
            $('input[name="formDate2"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            }, function (start, end, label) {
                var years = moment().diff(start, 'years');
                alert("You are " + years + " years old!");
            });
            $('input[name="toDate2"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            }, function (start, end, label) {
                var years = moment().diff(start, 'years');
                alert("You are " + years + " years old!");
            });
            $('input[name="dob"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            }, function (start, end, label) {
                var years = moment().diff(start, 'years');
                alert("You are " + years + " years old!");
            });
            $('input[name="serviceRequestStartDate"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            }, function (start, end, label) {
                var years = moment().diff(start, 'years');
                alert("You are " + years + " years old!");
            });
            $('.select2').select2({
                theme: "doral"
            });
        });
    </script>
@endpush
