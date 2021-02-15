@extends('pages.layouts.app')
@section('title','Schedule Appointment List')
@section('pageTitleSection')
    Schedule Appointment List
@endsection
@section('content')
    <div class="app-roles">
        <!-- View Employee List HTML -->
        <div class="pt-2">
            <table id="appointmentScheduled" class="table">
                <thead>
                <tr>
                    <th><input type="checkbox" class="selectall"></th>
                    <th>Patient Name</th>
                    <th>Gender</th>
                    <th>Reason Of Appointment</th>
                    <th>Date and Time</th>
                    <th>Duration</th>
                    <th>Status</th>
                    <th width="34%">Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <!-- Modal -->
            <div class="modal fade" id="patient_request_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('app-video')
    <div class="app-video">
        <div class="app-video-body">
            <div class="app-video-left videoSection">
                <div class="app-video-header shadow-sm">
                    <div class="pt-2 pb-0 pl-3" id="patient-information">
                    </div>
                </div>
            </div>
        </div>
        <div class="app-video-body">
            <div class="app-video-left b-tab active" id="orange">
                <div class="video_container">
                    <!-- added on import -->
                    <div id="zmmtg-root" style="width: 95% !important; height: 300px !important;  "></div>

                </div>
            </div>
            <div class="app-video-left b-tab" id="green">
                <div class="content">
                    <div class="p-4">
                        <div class="custom-nav-pills">
                            <div class="d-flex align-items-start">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                     aria-orientation="vertical">
                                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill"
                                       href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                                       aria-selected="true">Information</a>
                                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill"
                                       href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                       aria-selected="false">Physical Examination</a>
                                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill"
                                       href="#v-pills-messages" role="tab" aria-controls="v-pills-messages"
                                       aria-selected="false">Laboratory Results</a>
                                </div>
                                <div class="tab-content" id="v-pills-tabContent">
                                    <!-- Information -->
                                    <div class="tab-pane fade show active shadow" id="v-pills-home" role="tabpanel"
                                         aria-labelledby="v-pills-home-tab">
                                        <div>
                                            <div class="scrollbar scrollbar1">
                                                <div class="p-4">
                                                    <h1 class="_t1">EMPLOYEE PHYSICAL EXAMINATION REPORT</h1>
                                                    <div class="row mt-3">
                                                        <div class="col-12 col-sm-12">
                                                            <div class="card shadow-sm">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-12 col-sm-6">
                                                                            <div
                                                                                class="custom-control custom-checkbox mb-3">
                                                                                <input type="checkbox" name="physical_examination_report[]"
                                                                                       class="custom-control-input"
                                                                                       value="PEPA"
                                                                                       id="customCheck1">
                                                                                <label class="custom-control-label"
                                                                                       for="customCheck1">Pre-Employment
                                                                                    Physical
                                                                                    Assessment</label>
                                                                            </div>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox"
                                                                                       name="physical_examination_report[]"
                                                                                       class="custom-control-input"
                                                                                       value="AA"
                                                                                       id="customCheck2">
                                                                                <label class="custom-control-label"
                                                                                       for="customCheck2">Annual
                                                                                    Assessment</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-sm-6">
                                                                            <div
                                                                                class="custom-control custom-checkbox mb-3">
                                                                                <input type="checkbox"
                                                                                       name="physical_examination_report[]"
                                                                                       class="custom-control-input"
                                                                                       id="customCheck3">
                                                                                <label class="custom-control-label"
                                                                                       for="customCheck3">Pre-Employment
                                                                                    Physical
                                                                                    Assessment</label>
                                                                            </div>
                                                                            <div
                                                                                class="custom-control custom-checkbox m-0">
                                                                                <input type="checkbox"
                                                                                       name="physical_examination_report[]"
                                                                                       class="custom-control-input"
                                                                                       id="customCheck4">
                                                                                <label class="custom-control-label"
                                                                                       for="customCheck4">Annual
                                                                                    Assessment</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h1 class="_t1 text-center mt-4">AHTHORIZATION TO RELEASE
                                                        INFORMATION
                                                    </h1>
                                                    <div class="row mt-3">
                                                        <div class="col-12 col-sm-12">
                                                            <div class="card shadow-sm">
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <div class="d-flex align-items-center">
                                                                            <div>I hereby authorize</div>
                                                                            <div class="ml-2 mr-2"><input type="text"
                                                                                                          class="form-control form-control-lg">
                                                                            </div>
                                                                            <div>to release all health information about
                                                                                me
                                                                                to
                                                                                Cottage Homecare
                                                                                Services, Inc.</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="">
                                                                        <label for="eSignature" class="label">Employee
                                                                            Signature</label>
                                                                        <textarea name="eSignature" class="form-control"
                                                                                  id="" cols="10" rows="5"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h1 class="_t1 text-center mt-4">DEMOGRAPHIC INFORMATION</h1>
                                                    <div class="row mt-3">
                                                        <div class="col-12 col-sm-12">
                                                            <div class="card shadow-sm">
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <!-- First Name -->
                                                                            <div class="col-12 col-sm-4">
                                                                                <label for="firstname"
                                                                                       class="label">First Name</label>
                                                                                <input type="text"
                                                                                       class="form-control fname"
                                                                                       id="firstname" value=""
                                                                                       name="firstname"
                                                                                       aria-describedby="firstnameHelp">
                                                                                <div class="invalid-feedback d-none">
                                                                                </div>
                                                                            </div>
                                                                            <!-- Last Name -->
                                                                            <div class="col-12 col-sm-4">
                                                                                <label for="lastname" class="label">Last
                                                                                    Name</label>
                                                                                <input type="text"
                                                                                       class="form-control lname"
                                                                                       id="lastname" value=""
                                                                                       name="lastname"
                                                                                       aria-describedby="lastnameHelp">
                                                                                <div class="invalid-feedback d-none">
                                                                                </div>
                                                                            </div>
                                                                            <!-- Gender -->
                                                                            <div class="col-12 col-sm-4">
                                                                                <label for="gender"
                                                                                       class="label">Sex</label>
                                                                                <div
                                                                                    class="form-check form-check-inline">
                                                                                    <input class="form-check-input"
                                                                                           type="radio"
                                                                                           name="inlineRadioOptions"
                                                                                           id="maleRadio" value="option1">
                                                                                    <label class="form-check-label"
                                                                                           for="maleRadio">Male</label>
                                                                                </div>
                                                                                <div
                                                                                    class="form-check form-check-inline">
                                                                                    <input class="form-check-input"
                                                                                           type="radio"
                                                                                           name="inlineRadioOptions"
                                                                                           id="femaleRadio"
                                                                                           value="option2">
                                                                                    <label class="form-check-label"
                                                                                           for="femaleRadio">Female</label>
                                                                                </div>
                                                                                <div class="invalid-feedback d-none">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <!-- Date Of Birth -->
                                                                            <div class="col-12 col-sm-4">
                                                                                <label for="dob"
                                                                                       class="label">DOB</label>
                                                                                <input type="text" class="form-control"
                                                                                       id="dobID" name="dobID"
                                                                                       aria-describedby="dobHelp">
                                                                                <div class="invalid-feedback d-none">
                                                                                </div>
                                                                            </div>
                                                                            <!-- Date Of Exam -->
                                                                            <div class="col-12 col-sm-4">
                                                                                <label for="dob" class="label">Date Of
                                                                                    Exam </label>
                                                                                <input type="text" class="form-control"
                                                                                       id="dateOfExamId"
                                                                                       name="dateOfExamId"
                                                                                       aria-describedby="dateOfExamHelp">
                                                                                <div class="invalid-feedback d-none">
                                                                                </div>
                                                                            </div>
                                                                            <!-- SSN -->
                                                                            <div class="col-12 col-sm-4">
                                                                                <label for="ssn"
                                                                                       class="label">SSN</label>
                                                                                <input type="text" class="form-control"
                                                                                       id="ssn" value="" name="ssn"
                                                                                       aria-describedby="ssn">
                                                                                <div class="invalid-feedback d-none">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <div class="row">
                                                                            <div class="col-12 col-sm-4">
                                                                                <label for="email"
                                                                                       class="label">Email</label>
                                                                                <input type="text" class="form-control"
                                                                                       id="email" value="" name="email"
                                                                                       aria-describedby="email">
                                                                                <div class="invalid-feedback d-none">
                                                                                </div>
                                                                            </div>
                                                                            <!--Marital Status-->
                                                                            <div class="col-12 col-sm-4">
                                                                                <label for="maritalstatus"
                                                                                       class="label">Marital
                                                                                    Status</label>
                                                                                <div
                                                                                    class="d-flex justify-content-start">
                                                                                    <div
                                                                                        class="form-check form-check-inline">
                                                                                        <input class="form-check-input"
                                                                                               type="checkbox"
                                                                                               id="inlineCheckbox1"
                                                                                               value="option1">
                                                                                        <label class="form-check-label"
                                                                                               for="inlineCheckbox1">M</label>
                                                                                    </div>
                                                                                    <div
                                                                                        class="form-check form-check-inline">
                                                                                        <input class="form-check-input"
                                                                                               type="checkbox"
                                                                                               id="inlineCheckbox2"
                                                                                               value="option2">
                                                                                        <label class="form-check-label"
                                                                                               for="inlineCheckbox2">S</label>
                                                                                    </div>
                                                                                    <div
                                                                                        class="form-check form-check-inline">
                                                                                        <input class="form-check-input"
                                                                                               type="checkbox"
                                                                                               id="inlineCheckbox3"
                                                                                               value="option3">
                                                                                        <label class="form-check-label"
                                                                                               for="inlineCheckbox3">W</label>
                                                                                    </div>
                                                                                    <div
                                                                                        class="form-check form-check-inline">
                                                                                        <input class="form-check-input"
                                                                                               type="checkbox"
                                                                                               id="inlineCheckbox4"
                                                                                               value="option4">
                                                                                        <label class="form-check-label"
                                                                                               for="inlineCheckbox4">D</label>
                                                                                    </div>
                                                                                    <div
                                                                                        class="invalid-feedback d-none">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-3 d-flex justify-content-end">
                                                        <button type="button"
                                                                class="btn btn-primary btn-view  text-capitalize shadow-sm btn--sm mr-2"
                                                                data-toggle="tooltip" data-placement="left" title=""
                                                                data-original-title="Cancel">Cancel</button>
                                                        <button type="button"
                                                                class="btn btn-outline-pink btn-sm text-uppercase fw-600"
                                                                onclick="onSavePatientInformation(this)"
                                                                name="cancel" data-toggle="tooltip" data-placement="left"
                                                                title="" data-original-title="Continue">Continue</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Physical Examination -->
                                    <div class="tab-pane fade shadow" id="v-pills-profile" role="tabpanel"
                                         aria-labelledby="v-pills-profile-tab">
                                        <div class="scrollbar scrollbar1">
                                            <div class="p-4">
                                                <h1 class="_t1">PHYSICAL EXAMINATION</h1>
                                                <div class="row mt-3">
                                                    <div class="col-12 col-sm-12">
                                                        <div class="card shadow-sm">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-12 col-sm-4">
                                                                        <div
                                                                            class="custom-control custom-checkbox mb-3">
                                                                            <input type="checkbox"
                                                                                   class="custom-control-input"
                                                                                   id="customCheck100">
                                                                            <label class="custom-control-label"
                                                                                   for="customCheck100">HT</label>
                                                                        </div>
                                                                        <div
                                                                            class="custom-control custom-checkbox mb-3">
                                                                            <input type="checkbox"
                                                                                   class="custom-control-input"
                                                                                   id="customCheck101">
                                                                            <label class="custom-control-label"
                                                                                   for="customCheck101">WT</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-4">
                                                                        <div
                                                                            class="custom-control custom-checkbox mb-3">
                                                                            <input type="checkbox"
                                                                                   class="custom-control-input"
                                                                                   id="customCheck102">
                                                                            <label class="custom-control-label"
                                                                                   for="customCheck102">BP</label>
                                                                        </div>
                                                                        <div
                                                                            class="custom-control custom-checkbox mb-3">
                                                                            <input type="checkbox"
                                                                                   class="custom-control-input"
                                                                                   id="customCheck103">
                                                                            <label class="custom-control-label"
                                                                                   for="customCheck103">PULSE</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-4">
                                                                        <div
                                                                            class="custom-control custom-checkbox mb-3">
                                                                            <input type="checkbox"
                                                                                   class="custom-control-input"
                                                                                   id="customCheck104">
                                                                            <label class="custom-control-label"
                                                                                   for="customCheck104">RESP</label>
                                                                        </div>
                                                                        <div class="custom-control custom-checkbox m-0">
                                                                            <input type="checkbox"
                                                                                   class="custom-control-input"
                                                                                   id="customCheck105">
                                                                            <label class="custom-control-label"
                                                                                   for="customCheck105">TEMP</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <table class="table table-bordered mt-3">
                                                    <thead>
                                                    <tr>
                                                        <th width="50%" scope="col">Physical Condition</th>
                                                        <th width="50%" scope="col">Experiencing any of the symptoms
                                                            below?</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row">
                                                            <div class="form-group">
                                                                <select class="select physicalCondition"
                                                                        name="physical_condition"
                                                                        id="physical_condition" class="form-control">
                                                                    <option value="HEAD/ENT">HEAD/ENT</option>
                                                                    <option value="Eyes">Eyes</option>
                                                                    <option value="Neck">Neck</option>
                                                                    <option value="Breats">Breats</option>
                                                                    <option value="Lungs">Lungs</option>
                                                                    <option value="Cardiovascular">Cardiovascular
                                                                    </option>
                                                                    <option value="Skeletal">Muscular/Skeletal
                                                                    </option>
                                                                    <option value="Abdomen">Abdomen</option>
                                                                    <option value="Genitourinary">Genitourinary
                                                                    </option>
                                                                    <option value="Nurological">Nurological</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="label" for="head_ent">HEAD/ENT</label>
                                                                <input type="text"
                                                                       class="form-control form-control-lg"
                                                                       id="head_ent" aria-describedby="head_entHelp">
                                                            </div>
                                                            <div class="_control">
                                                                <a href="javascript:void(0)" class="_plus mr-2"><i
                                                                        class="las la-plus"></i></a>
                                                                <a href="javascript:void(0)" class="_minus"><i
                                                                        class="las la-minus"></i></a>
                                                            </div>
                                                        </th>
                                                        <td>
                                                            <div class="form-group">
                                                                <select class="select symptoms" name="symptoms"
                                                                        id="symptoms" class="form-control">
                                                                    <option value="Weakness">Weakness</option>
                                                                    <option value="Fatigue">Fatigue</option>
                                                                    <option value="Lack of Appetite">Lack of
                                                                        Appetite
                                                                    </option>
                                                                    <option value="Weight Loss">Weight Loss</option>
                                                                    <option value="Fever">Fever</option>
                                                                    <option value="Night Sweats">Night Sweats
                                                                    </option>
                                                                    <option value="Chest Pains">Chest Pains</option>
                                                                    <option value="Shortness Of Breath">Shortness Of
                                                                        Breath
                                                                    </option>
                                                                    <option value="Presistent Cough">Presistent
                                                                        Cough
                                                                    </option>
                                                                    <option value="Blood-Streaked Sputum">
                                                                        Blood-Streaked
                                                                        Sputum</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="label" for="Weakness">Weakness</label>
                                                                <input type="text"
                                                                       class="form-control form-control-lg"
                                                                       id="Weakness" aria-describedby="WeaknessHelp">
                                                            </div>
                                                            <div class="_control">
                                                                <a href="javascript:void(0)" class="_plus mr-2"><i
                                                                        class="las la-plus"></i></a>
                                                                <a href="javascript:void(0)" class="_minus"><i
                                                                        class="las la-minus"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <div class="mt-3 d-flex justify-content-end">
                                                    <button type="button"
                                                            class="btn btn-primary btn-view  text-capitalize shadow-sm btn--sm mr-2"
                                                            data-toggle="tooltip" data-placement="left" title=""
                                                            data-original-title="Cancel">Cancel</button>
                                                    <button type="submit"
                                                            class="btn btn-outline-pink btn-sm text-uppercase fw-600"
                                                            name="cancel" data-toggle="tooltip" data-placement="left"
                                                            title="" data-original-title="Continue">Continue</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Laboratory Results -->
                                    <div class="tab-pane fade shadow" id="v-pills-messages" role="tabpanel"
                                         aria-labelledby="v-pills-messages-tab">
                                        <div class="scrollbar scrollbar1">
                                            <div class="p-4">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="row">
                                                            <div class="col text-center font-weight-bold">Test</div>
                                                            <div class="col text-center font-weight-bold">Date Performed
                                                            </div>
                                                            <div class="col text-center font-weight-bold">Results</div>
                                                            <div class="col text-center font-weight-bold">Lab Value
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Rubella Titer Start-->
                                                <div class="row mt-3">
                                                    <div class="col text-center">
                                                        <select name="test" id="test"
                                                                class="form-control select testcase">
                                                            <option value="Rubella Titer" selected>Rubella Titer
                                                            </option>
                                                            <option value="Rubeola/Measles Titer">Rubeola/Measles Titer
                                                            </option>
                                                            <option value="Mumps Titer">Mumps Titer</option>
                                                            <option value="PPD Or QFT(Circle One)">PPD Or QFT(Circle
                                                                One)
                                                            </option>
                                                            <option value="Chest X-Ray">Chest X-Ray (If
                                                                Positive)
                                                            </option>
                                                            <option value="Drug Screening">Drug Screening</option>
                                                            <option value="Hepatitis B">Hepatitis B</option>
                                                        </select>
                                                    </div>
                                                    <div class="col text-center">
                                                        <input type="text" class="form-control form-control-lg"
                                                               name="datePerformed" value="10/24/1984" />
                                                    </div>
                                                    <div class="col text-center">
                                                        <select class="form-control reulsts select" name="referralType"
                                                                id="referralType" multiple>
                                                            <option value="Insurance">Immune</option>
                                                            <option value="Home Care">Not Immune</option>
                                                        </select>
                                                    </div>
                                                    <div class="col text-center">
                                                        <input type="text" class="form-control form-control-lg"
                                                               id="labvalue" name="labvalue"
                                                               aria-describedby="labvalueHelp">
                                                    </div>
                                                </div>
                                                <!-- Rubella Titer End-->
                                                <!-- Rubeola/Measles Titer Start-->
                                                <div class="row mt-3 rubeola_measles_titer_block">
                                                    <div class="col text-center">
                                                        <select name="rubeola_measles_titer" id="rubeola_measles_titer"
                                                                class="form-control select rubeola_measles_titer">
                                                            <option value="Rubella Titer">Rubella Titer</option>
                                                            <option value="Rubeola/Measles Titer" selected>
                                                                Rubeola/Measles Titer
                                                            </option>
                                                            <option value="Mumps Titer">Mumps Titer</option>
                                                            <option value="PPD Or QFT(Circle One)">PPD Or QFT(Circle
                                                                One)
                                                            </option>
                                                            <option value="Chest X-Ray">Chest X-Ray (If
                                                                Positive)
                                                            </option>
                                                            <option value="Drug Screening">Drug Screening</option>
                                                            <option value="Hepatitis B">Hepatitis B</option>
                                                        </select>
                                                    </div>
                                                    <div class="col text-center">
                                                        <input type="text" class="form-control form-control-lg"
                                                               name="datePerformed1" value="10/24/1984" />
                                                    </div>
                                                    <div class="col text-center">
                                                        <select class="form-control reulsts select" name="referralType"
                                                                id="referralType" multiple>
                                                            <option value="Insurance">Immune</option>
                                                            <option value="Home Care">Not Immune</option>
                                                        </select>
                                                    </div>
                                                    <div class="col text-center">
                                                        <input type="text" class="form-control form-control-lg"
                                                               id="labvalue" name="labvalue"
                                                               aria-describedby="labvalueHelp">
                                                    </div>
                                                </div>
                                                <!-- Rubeola/Measles Titer End-->
                                                <!-- Mumps Titer Start-->
                                                <div class="row mt-3 mumps_titer_block">
                                                    <div class="col text-center">
                                                        <select name="mumps_titer" id="mumps_titer"
                                                                class="form-control select mumps_titer">
                                                            <option value="Rubella Titer">Rubella Titer</option>
                                                            <option value="Rubeola/Measles Titer">Rubeola/Measles Titer
                                                            </option>
                                                            <option value="Mumps Titer" selected>Mumps Titer</option>
                                                            <option value="PPD Or QFT(Circle One)">PPD Or QFT(Circle
                                                                One)
                                                            </option>
                                                            <option value="Chest X-Ray">Chest X-Ray (If
                                                                Positive)
                                                            </option>
                                                            <option value="Drug Screening">Drug Screening</option>
                                                            <option value="Hepatitis B">Hepatitis B</option>
                                                        </select>
                                                    </div>
                                                    <div class="col text-center">
                                                        <input type="text" class="form-control form-control-lg"
                                                               name="datePerformed2" value="10/24/1984" />
                                                    </div>
                                                    <div class="col text-center">
                                                        <select class="form-control reulsts select" name="referralType"
                                                                id="referralType" multiple>
                                                            <option value="Insurance">Immune</option>
                                                            <option value="Home Care">Not Immune</option>
                                                        </select>
                                                    </div>
                                                    <div class="col text-center">
                                                        <input type="text" class="form-control form-control-lg"
                                                               id="labvalue" name="labvalue"
                                                               aria-describedby="labvalueHelp">
                                                    </div>
                                                </div>
                                                <!-- Mumps Titer End-->
                                                <!-- PPD Or QFT(Circle One) Start-->
                                                <div class="row mt-3 PPD_QFT_block">
                                                    <div class="col text-center">
                                                        <select name="PPD_QFT" id="PPD_QFT"
                                                                class="form-control select PPD_QFT">
                                                            <option value="Rubella Titer">Rubella Titer</option>
                                                            <option value="Rubeola/Measles Titer">Rubeola/Measles Titer
                                                            </option>
                                                            <option value="Mumps Titer">Mumps Titer</option>
                                                            <option value="PPD Or QFT(Circle One)" selected>PPD Or
                                                                QFT(Circle
                                                                One)
                                                            </option>
                                                            <option value="Chest X-Ray">Chest X-Ray (If
                                                                Positive)
                                                            </option>
                                                            <option value="Drug Screening">Drug Screening</option>
                                                            <option value="Hepatitis B">Hepatitis B</option>
                                                        </select>
                                                    </div>
                                                    <div class="col text-center">
                                                        <input type="text" class="form-control form-control-lg"
                                                               name="datePerformed2" value="10/24/1984" />
                                                    </div>
                                                    <div class="col text-center">
                                                        <select class="form-control reulsts select" name="result1"
                                                                id="result1" multiple>
                                                            <option value="Positive">Positive</option>
                                                            <option value="Negative">Negative</option>
                                                        </select>
                                                    </div>
                                                    <div class="col text-center">
                                                        <input type="text" class="form-control form-control-lg"
                                                               name="datePerformed5" value="10/24/1984" />
                                                    </div>
                                                </div>
                                                <!-- PPD Or QFT(Circle One) End-->
                                                <!-- Chest X-Ray (If Positive) Start-->
                                                <div class="row mt-3 Chest_XRay_block">
                                                    <div class="col text-center">
                                                        <select name="Chest_XRay" id="Chest_XRay"
                                                                class="form-control select Chest_XRay">
                                                            <option value="Rubella Titer">Rubella Titer</option>
                                                            <option value="Rubeola/Measles Titer">Rubeola/Measles Titer
                                                            </option>
                                                            <option value="Mumps Titer">Mumps Titer</option>
                                                            <option value="PPD Or QFT(Circle One)">PPD Or
                                                                QFT(Circle
                                                                One)
                                                            </option>
                                                            <option value="Chest X-Ray" selected>Chest X-Ray (If
                                                                Positive)
                                                            </option>
                                                            <option value="Drug Screening">Drug Screening</option>
                                                            <option value="Hepatitis B">Hepatitis B</option>
                                                        </select>
                                                    </div>
                                                    <div class="col text-center">
                                                        <input type="text" class="form-control form-control-lg"
                                                               name="datePerformed2" value="10/24/1984" />
                                                    </div>
                                                    <div class="col text-center">
                                                        <select class="form-control reulsts select" name="result2"
                                                                id="result2" multiple>
                                                            <option value="Positive">Positive</option>
                                                            <option value="Negative">Negative</option>
                                                        </select>
                                                    </div>
                                                    <div class="col text-center">
                                                        <input type="text" class="form-control form-control-lg"
                                                               name="datePerformed6" value="10/24/1984" />
                                                    </div>
                                                </div>
                                                <!-- Chest X-Ray (If Positive) End-->
                                                <!-- Drug Screening Start-->
                                                <div class="row mt-3 drug_screening_block">
                                                    <div class="col-12 col-sm-3 text-center">
                                                        <select name="drug_screening" id="drug_screening"
                                                                class="form-control select drug_screening">
                                                            <option value="Rubella Titer">Rubella Titer</option>
                                                            <option value="Rubeola/Measles Titer">Rubeola/Measles Titer
                                                            </option>
                                                            <option value="Mumps Titer">Mumps Titer</option>
                                                            <option value="PPD Or QFT(Circle One)">PPD Or
                                                                QFT(Circle
                                                                One)
                                                            </option>
                                                            <option value="Chest X-Ray">Chest X-Ray (If
                                                                Positive)
                                                            </option>
                                                            <option value="Drug Screening" selected>Drug Screening
                                                            </option>
                                                            <option value="Hepatitis B">Hepatitis B</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-12 col-sm-3 text-center">
                                                        <input type="text" class="form-control form-control-lg"
                                                               name="datePerformed7" value="10/24/1984" />
                                                    </div>
                                                    <div class="col-12 col-sm-6 text-center">
                                                        <input type="text" class="form-control" placeholder="Results">
                                                    </div>
                                                </div>
                                                <!-- Drug Screening End-->
                                                <!-- Hepatitis B Start-->
                                                <div class="row mt-3 hepatitis_B_block">
                                                    <div class="col-12 col-sm-3 text-center">
                                                        <select name="hepatitis_B" id="hepatitis_B"
                                                                class="form-control select hepatitis_B">
                                                            <option value="Rubella Titer">Rubella Titer</option>
                                                            <option value="Rubeola/Measles Titer">Rubeola/Measles Titer
                                                            </option>
                                                            <option value="Mumps Titer">Mumps Titer</option>
                                                            <option value="PPD Or QFT(Circle One)">PPD Or
                                                                QFT(Circle
                                                                One)
                                                            </option>
                                                            <option value="Chest X-Ray">Chest X-Ray (If
                                                                Positive)
                                                            </option>
                                                            <option value="Drug Screening">Drug Screening
                                                            </option>
                                                            <option value="Hepatitis B" selected>Hepatitis B</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-12 col-sm-3 text-center">
                                                        <input type="text" class="form-control form-control-lg"
                                                               name="datePerformed8" value="10/24/1984" />
                                                    </div>
                                                    <div class="col-12 col-sm-3 text-center">
                                                        <input type="text" class="form-control form-control-lg"
                                                               name="datePerformed9" value="10/24/1984" />
                                                    </div>
                                                    <div class="col-12 col-sm-3 text-center">
                                                        <input type="text" class="form-control form-control-lg"
                                                               name="datePerformed10" value="10/24/1984" />
                                                    </div>
                                                </div>
                                                <!-- Hepatitis B End-->
                                                <div class="_control">
                                                    <a href="javascript:void(0)" class="_plus mr-2"><i
                                                            class="las la-plus"></i></a>
                                                    <a href="javascript:void(0)" class="_minus"><i
                                                            class="las la-minus"></i></a>
                                                </div>
                                                <div class="mt-3">
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                   id="customCheck10">
                                                            <label class="custom-control-label" for="customCheck10">This
                                                                individual is free from any health impairment that is a
                                                                potential risk to the patient or another employee of
                                                                which
                                                                may
                                                                interfere with the performance of his/her duties
                                                                including
                                                                the
                                                                habitation or addiction or drugs or alcohol.</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox mt-2">
                                                            <input type="checkbox" class="custom-control-input"
                                                                   id="customCheck11">
                                                            <label class="custom-control-label" for="customCheck11">This
                                                                individual is able to work with the following
                                                                limitations</label>
                                                        </div>
                                                        <textarea name="limitations" id="limitations" cols="30" rows="5"
                                                                  class="form-control mt-3"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox mt-2">
                                                            <input type="checkbox" class="custom-control-input"
                                                                   id="customCheck11">
                                                            <label class="custom-control-label" for="customCheck11">This
                                                                individual is NOT physically/mentally able to work
                                                                (specify
                                                                reason)</label>
                                                        </div>
                                                        <textarea name="specifyReason" id="specifyReason" cols="30"
                                                                  rows="5" class="form-control mt-3"></textarea>
                                                    </div>
                                                </div>
                                                <div class="card shadow-sm">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-12 col-sm-4">
                                                                    <label class="label" for="physicianName">Physician
                                                                        Name</label>
                                                                    <input type="text" class="form-control"
                                                                           id="physicianName"
                                                                           aria-describedby="physicianName">
                                                                </div>
                                                                <div class="col-12 col-sm-4">
                                                                    <label class="label"
                                                                           for="physicianLicenseNo">Physician
                                                                        License No</label>
                                                                    <input type="text" class="form-control"
                                                                           id="physicianLicenseNo"
                                                                           aria-describedby="physicianLicenseNo">
                                                                </div>
                                                                <div class="col-12 col-sm-4">
                                                                    <label class="label" for="physicianStamp">Physican
                                                                        Stamp</label>
                                                                    <input type="text" class="form-control"
                                                                           id="physicianStamp" name="physicianStamp"
                                                                           aria-describedby="physicianStamp">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="row">
                                                                <div class="col-12 col-sm-4">
                                                                    <label class="label"
                                                                           for="physicianSignature">Physician
                                                                        Signature</label>
                                                                    <div class="signature">
                                                                        <img src="../assets/img/signature.png"
                                                                             class="img-fluid" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-4">
                                                                    <label class="label" for="dateSigned">Date
                                                                        Signed</label>
                                                                    <input type="text" name="datePerformed"
                                                                           class="form-control" id="dateSigned"
                                                                           aria-describedby="dateSigned">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mt-3 d-flex justify-content-end">
                                                            <button type="button"
                                                                    class="btn btn-primary btn-view  text-capitalize shadow-sm btn--sm mr-2"
                                                                    data-toggle="tooltip" data-placement="left" title=""
                                                                    data-original-title="Cancel">Cancel</button>
                                                            <button type="submit"
                                                                    class="btn btn-outline-pink btn-sm text-uppercase fw-600"
                                                                    name="cancel" data-toggle="tooltip"
                                                                    data-placement="left" title=""
                                                                    data-original-title="Continue">Continue</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-video-middle" id="pills-tab" role="tablist">
                <ul class="app-video-nav app-video-tab">
                    <li class="b-nav-tab" data-toggle="tooltip" title="Video Conference">
                        <a href="javascript:void(0)" class="active" data-tab="orange">
                            <img src="{{ asset('assets/img/icons/video-conference.svg') }}" alt="View Patient Detial">
                        </a>
                    </li>
                    <li class="b-nav-tab" data-toggle="tooltip" title="View Forms" id="md-form">
                        <a href="javascript:void(0)" data-tab="green">
                            <img src="{{ asset('assets/img/icons/icon_md_form.svg') }}" alt="">
                        </a>
                    </li>
                    <li data-toggle="tooltip" title="Close" class="closeAppointment">
                        <a href="javascript:void(0)">
                            <i class="las la-times la-4x"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css" rel="stylesheet">
    <link type="text/css" href="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />
    <link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.8.3/css/bootstrap.css" />
     <link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.8.3/css/react-select.css" />
      <link rel="stylesheet" href="{{ asset('assets/css/tail.select-default.min.css') }}" />
{{--    <style>--}}
{{--        html, body {overflow: auto;}--}}
{{--        body > #zmmtg-root {display: none;}--}}
{{--        #zmmtg-root, .meeting-client, .meeting-client-inner {position: relative;width:97%;}--}}
{{--        #wc-footer {--}}
{{--        bottom: auto !important;width: 97% !important;}--}}
{{--        #dialog-join {width: 97% !important;}--}}
{{--        #sv-active-video, .active-main, #sv-active-speaker-view, .main-layout {height: 100% !important;width: 100% !important;}--}}
{{--        .suspension-window {transform: translate(-444px, 10px) !important;}--}}
{{--        #dialog-invite {display: none;}--}}
{{--        .video_container{background:none!important;position:relative!important;}--}}
{{--        .app-video .app-video-body .app-video-middle{position:relative;}--}}
{{--        .app-video .app-video-header{position:relative;z-index:9999;}--}}
{{--    </style>--}}
@endpush
@push('scripts')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script>
       var scheduleAppointmentAjax = "{{  route('clinician.scheduleAppoimentList.ajax') }}";
       var patient_detail_url = "{{  url('/patient-detail/') }}";
    </script>
    <script src="https://source.zoom.us/1.8.3/lib/vendor/react.min.js"></script>
    <script src="https://source.zoom.us/1.8.3/lib/vendor/react-dom.min.js"></script>
    <script src="https://source.zoom.us/1.8.3/lib/vendor/redux.min.js"></script>
    <script src="https://source.zoom.us/1.8.3/lib/vendor/redux-thunk.min.js"></script>
{{--    <script src="https://source.zoom.us/1.8.3/lib/vendor/jquery.min.js"></script>--}}
    <script src="https://source.zoom.us/1.8.3/lib/vendor/lodash.min.js"></script>
    <script src="https://source.zoom.us/zoom-meeting-1.8.3.min.js"></script>
    <script src="{{ asset('js/Zoom/index.js') }}"></script>
    <script>
        const simd = async () => WebAssembly.validate(new Uint8Array([0, 97, 115, 109, 1, 0, 0, 0, 1, 4, 1, 96, 0, 0, 3, 2, 1, 0, 10, 9, 1, 7, 0, 65, 0, 253, 15, 26, 11]))
        simd().then((res) => {
            console.log("simd check", res);
        });
    </script>
     <script src="{{ asset('js/clincian/app.clinician.appointment.scheduled.js') }}"></script>
@endpush
