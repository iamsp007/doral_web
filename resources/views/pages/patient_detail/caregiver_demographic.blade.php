<div class="tab-pane fade show active" id="demographic" role="tabpanel" aria-labelledby="demographic">
    <div class="app-card app-card-custom" data-name="demographics">
        <div class="app-card-header">
            <h1 class="title">Demographics</h1>
            <img src="{{ asset('assets/img/icons/edit-field.svg') }}" data-toggle="tooltip" data-placement="bottom" title="Edit" class="cursor-pointer edit-icon" alt="" onclick="editAllField('demographic')">
            <img src="{{ asset('assets/img/icons/update-icon.svg') }}" data-toggle="tooltip" data-placement="bottom" title="Update" class="cursor-pointer update-icon" alt="" onclick="updateAllField('demographic')">
        </div>
        <div class="head scrollbar scrollbar4">
        <div class="p-3">
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-3 col-md-3">
                        <div class="input_box">
                            <div class="ls">
                                <i class="las la-phone circle"></i>
                            </div>
                            <div class="rs">
                                <h3 class="_title">Patient ID</h3>
                                <div>
                                    <input type="text" class="form-control-plaintext _detail "
                                        readonly name="caregiver_id" onclick="editableField('caregiver_id')"
                                        data-id="caregiver_id" id="caregiver_id" onblur="validateEmail(this);"
                                        placeholder="Patient ID" value="{{ $patient->caregiverInfo->caregiver_id }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-3 col-md-3">
                        <div class="input_box">
                            <div class="ls">
                                <i class="las la-envelope circle"></i>
                            </div>
                            <div class="rs">
                                <h3 class="_title">Intials</h3>
                                <input type="text" class="form-control-plaintext _detail "
                                    readonly name="intials" onclick="editableField('intials')"
                                    data-id="intials" id="intials" onblur="validateEmail(this);"
                                    placeholder="Intials" value="{{ $patient->caregiverInfo->intials }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-3 col-md-3">
                        <div class="input_box">
                            <div class="ls">
                                <i class="las la-calendar circle"></i>
                            </div>
                            <div class="rs">
                                <h3 class="_title">Caregiver Code</h3>
                                <input type="text" class="form-control-plaintext _detail "
                                    readonly name="caregiver_code" onclick="editableField('caregiver_code')"
                                    data-id="caregiver_code" id="caregiver_code" onblur="validateEmail(this);"
                                    placeholder="Caregiver Code" value="{{ $patient->caregiverInfo->caregiver_code }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-3 col-md-3">
                        <div class="input_box">
                            <div class="ls">
                                <i class="las la-angle-double-right circle"></i>
                            </div>
                            <div class="rs">
                                <h3 class="_title">Alternate Caregiver Code</h3>
                                <input type="text" class="form-control-plaintext _detail "
                                    readonly name="alternate_caregiver_code" onclick="editableField('alternate_caregiver_code')"
                                    data-id="alternate_caregiver_code" id="alternate_caregiver_code" onblur="validateEmail(this);"
                                    placeholder="Alternate Caregiver Code" value="{{ $patient->caregiverInfo->alternate_caregiver_code }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-3 col-md-3">
                        <div class="input_box">
                            <div class="ls">
                                <i class="las la-phone circle"></i>
                            </div>
                            <div class="rs">
                                <h3 class="_title">Time Attendance Pin</h3>
                                <div>
                                    <input type="text" class="form-control-plaintext _detail "
                                        readonly name="time_attendance_pin" onclick="editableField('time_attendance_pin')"
                                        data-id="time_attendance_pin" id="time_attendance_pin" onblur="validateEmail(this);"
                                        placeholder="Time Attendance Pin" value="{{ $patient->caregiverInfo->time_attendance_pin }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-3 col-md-3">
                        <div class="input_box">
                            <div class="ls">
                                <i class="las la-angle-double-right circle"></i>
                            </div>
                            <div class="rs">
                                <h3 class="_title">Country Of Birth</h3>
                                <input type="text" class="form-control-plaintext _detail "
                                    readonly name="country_of_birth" onclick="editableField('country_of_birth')"
                                    data-id="country_of_birth" id="country_of_birth" onblur="validateEmail(this);"
                                    placeholder="Country Of Birth" value="{{ $patient->caregiverInfo->country_of_birth }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-3 col-md-3">
                        <div class="input_box">
                            <div class="ls">
                                <i class="las la-phone circle"></i>
                            </div>
                            <div class="rs">
                                <h3 class="_title">Employee Type</h3>
                                <div>
                                    <input type="text" class="form-control-plaintext _detail "
                                        readonly name="employee_type" onclick="editableField('employee_type')"
                                        data-id="employee_type" id="employee_type" onblur="validateEmail(this);"
                                        placeholder="Employee Type" value="{{ $patient->caregiverInfo->employee_type }}">
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-12 col-sm-3 col-md-3">
                        <div class="input_box">
                            <div class="ls">
                                <i class="las la-calendar circle"></i>
                            </div>
                            <div class="rs">
                                <h3 class="_title">Caregiver Code</h3>
                                <input type="text" class="form-control-plaintext _detail "
                                    readonly name="caregiver_code" onclick="editableField('caregiver_code')"
                                    data-id="caregiver_code" id="caregiver_code" onblur="validateEmail(this);"
                                    placeholder="Caregiver Code" value="{{ $patient->caregiverInfo->caregiver_code }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-3 col-md-3">
                        <div class="input_box">
                            <div class="ls">
                                <i class="las la-angle-double-right circle"></i>
                            </div>
                            <div class="rs">
                                <h3 class="_title">Dependents</h3>
                                <input type="text" class="form-control-plaintext _detail "
                                    readonly name="dependents" onclick="editableField('dependents')"
                                    data-id="dependents" id="dependents" onblur="validateEmail(this);"
                                    placeholder="Dependents" value="{{ $patient->caregiverInfo->dependents }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-3 col-md-3">
                        <div class="input_box">
                            <div class="ls">
                                <i class="las la-envelope circle"></i>
                            </div>
                            <div class="rs">
                                <h3 class="_title">Employee ID</h3>
                                <input type="text" class="form-control-plaintext _detail "
                                    readonly name="employee_id" onclick="editableField('employee_id')"
                                    data-id="employee_id" id="employee_id" onblur="validateEmail(this);"
                                    placeholder="Employee ID" value="{{ $patient->caregiverInfo->employee_id }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-3 col-md-3">
                        <div class="input_box">
                            <div class="ls">
                                <i class="las la-calendar circle"></i>
                            </div>
                            <div class="rs">
                                <h3 class="_title">Application Date</h3>
                                <input type="text" class="form-control-plaintext _detail "
                                    readonly name="application_date" onclick="editableField('application_date')"
                                    data-id="application_date" id="application_date" onblur="validateEmail(this);"
                                    placeholder="Application Date" value="{{ $patient->caregiverInfo->application_date }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-3 col-md-3">
                        <div class="input_box">
                            <div class="ls">
                                <i class="las la-angle-double-right circle"></i>
                            </div>
                            <div class="rs">
                                <h3 class="_title">Hire Date</h3>
                                <input type="text" class="form-control-plaintext _detail "
                                    readonly name="hire_date" onclick="editableField('hire_date')"
                                    data-id="hire_date" id="hire_date" onblur="validateEmail(this);"
                                    placeholder="Hire Date" value="{{ $patient->caregiverInfo->hire_date }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-3 col-md-3">
                        <div class="input_box">
                            <div class="ls">
                                <i class="las la-phone circle"></i>
                            </div>
                            <div class="rs">
                                <h3 class="_title">Rehire Date</h3>
                                <div>
                                    <input type="text" class="form-control-plaintext _detail "
                                        readonly name="rehire_date" onclick="editableField('rehire_date')"
                                        data-id="rehire_date" id="rehire_date" onblur="validateEmail(this);"
                                        placeholder="Rehire Date" value="{{ $patient->caregiverInfo->rehire_date }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-3 col-md-3">
                        <div class="input_box">
                            <div class="ls">
                                <i class="las la-envelope circle"></i>
                            </div>
                            <div class="rs">
                                <h3 class="_title">First Work Date</h3>
                                <input type="text" class="form-control-plaintext _detail "
                                    readonly name="first_work_date" onclick="editableField('first_work_date')"
                                    data-id="first_work_date" id="first_work_date" onblur="validateEmail(this);"
                                    placeholder="First Work Date" value="{{ $patient->caregiverInfo->first_work_date }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-3 col-md-3">
                        <div class="input_box">
                            <div class="ls">
                                <i class="las la-calendar circle"></i>
                            </div>
                            <div class="rs">
                                <h3 class="_title">Last Work Date</h3>
                                <input type="text" class="form-control-plaintext _detail "
                                    readonly name="last_work_date" onclick="editableField('last_work_date')"
                                    data-id="last_work_date" id="last_work_date" onblur="validateEmail(this);"
                                    placeholder="Last Work Date" value="{{ $patient->caregiverInfo->last_work_date }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-3 col-md-3">
                        <div class="input_box">
                            <div class="ls">
                                <i class="las la-angle-double-right circle"></i>
                            </div>
                            <div class="rs">
                                <h3 class="_title">Registry Number</h3>
                                <input type="text" class="form-control-plaintext _detail "
                                    readonly name="registry_number" onclick="editableField('registry_number')"
                                    data-id="registry_number" id="registry_number" onblur="validateEmail(this);"
                                    placeholder="Registry Number" value="{{ $patient->caregiverInfo->registry_number }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-3 col-md-3">
                        <div class="input_box">
                            <div class="ls">
                                <i class="las la-phone circle"></i>
                            </div>
                            <div class="rs">
                                <h3 class="_title">Registry Checked Date</h3>
                                <div>
                                    <input type="text" class="form-control-plaintext _detail "
                                        readonly name="registry_checked_date" onclick="editableField('registry_checked_date')"
                                        data-id="registry_checked_date" id="registry_checked_date" onblur="validateEmail(this);"
                                        placeholder="Registry Checked Date" value="{{ $patient->caregiverInfo->registry_checked_date }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-3 col-md-3">
                        <div class="input_box">
                            <div class="ls">
                                <i class="las la-calendar circle"></i>
                            </div>
                            <div class="rs">
                                <h3 class="_title">Referral Person</h3>
                                <input type="text" class="form-control-plaintext _detail "
                                    readonly name="referral_person" onclick="editableField('referral_person')"
                                    data-id="referral_person" id="referral_person" onblur="validateEmail(this);"
                                    placeholder="Referral Person" value="{{ $patient->caregiverInfo->referral_person }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-3 col-md-3">
                        <div class="input_box">
                            <div class="ls">
                                <i class="las la-calendar circle"></i>
                            </div>
                            <div class="rs">
                                <h3 class="_title">Terminated Date</h3>
                                <input type="text" class="form-control-plaintext _detail "
                                    readonly name="TerminatedDate" onclick="editableField('TerminatedDate')"
                                    data-id="TerminatedDate" id="TerminatedDate" onblur="validateEmail(this);"
                                    placeholder="Terminated Date" value="{{ $patient->caregiverInfo->TerminatedDate }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-3 col-md-3">
                        <div class="input_box">
                            <div class="ls">
                                <i class="las la-angle-double-right circle"></i>
                            </div>
                            <div class="rs">
                                <h3 class="_title">Professional License Number</h3>
                                <input type="text" class="form-control-plaintext _detail "
                                    readonly name="professional_licensenumber" onclick="editableField('professional_licensenumber')"
                                    data-id="professional_licensenumber" id="professional_licensenumber" onblur="validateEmail(this);"
                                    placeholder="Professional License Number" value="{{ $patient->caregiverInfo->professional_licensenumber }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-3 col-md-3">
                        <div class="input_box">
                            <div class="ls">
                                <i class="las la-phone circle"></i>
                            </div>
                            <div class="rs">
                                <h3 class="_title">Npi Number</h3>
                                <div>
                                    <input type="text" class="form-control-plaintext _detail "
                                        readonly name="npi_number" onclick="editableField('npi_number')"
                                        data-id="npi_number" id="npi_number" onblur="validateEmail(this);"
                                        placeholder="Npi Number" value="{{ $patient->caregiverInfo->npi_number }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-3 col-md-3">
                        <div class="input_box">
                            <div class="ls">
                                <i class="las la-envelope circle"></i>
                            </div>
                            <div class="rs">
                                <h3 class="_title">Signed Payroll Agreement Date</h3>
                                <input type="text" class="form-control-plaintext _detail "
                                    readonly name="signed_payroll_agreement_date" onclick="editableField('signed_payroll_agreement_date')"
                                    data-id="signed_payroll_agreement_date" id="signed_payroll_agreement_date" onblur="validateEmail(this);"
                                    placeholder="Signed Payroll Agreement Date" value="{{ $patient->caregiverInfo->signed_payroll_agreement_date }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="collapse mt-4" id="collapseExample">
                <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%"
                    height="200" frameborder="0" scrolling="no" marginheight="0"
                    marginwidth="0"
                    src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
            </div>
           
            <!-- Mobile Detail -->
            @if(isset($mobile[0]))
                <div class="app-card app-card-custom no-minHeight mb-3 box-shadow-none"
                data-name="emergency_contact_detail">
                    <div class="app-card-header">
                        <h1 class="title">Mobile Detail</h1>
                    </div>
                    <div>
                        <div class="p-3">
                            <div class="">
                                <div class="row">
                                <div class="col-12 col-sm-3 col-md-3">
                                    <div class="input_box">
                                        <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                        <div class="rs">
                                            <h3 class="_title">Mobile ID</h3>
                                            <input type="text"
                                            class="form-control-plaintext _detail " readonly
                                            name="mobile_id"
                                            onclick="editableField('mobile_id')"
                                            data-id="mobile_id" id="mobile_id"
                                            placeholder="Mobile ID" value="{{ $mobile[0]->ID }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-3 col-md-3">
                                    <div class="input_box">
                                        <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                        <div class="rs">
                                            <h3 class="_title">Mobile ID Type Description</h3>
                                            <input type="text"
                                            class="form-control-plaintext _detail " readonly
                                            name="mobile_id_type_description"
                                            onclick="editableField('mobile_id_type_description')"
                                            data-id="mobile_id_type_description" id="mobile_id_type_description"
                                            placeholder="Mobile ID Type Description" value="{{ $mobile[0]->MobileIDTypeDescription }}">
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- Mobile Detail -->

            <!-- Ethnicity Detail -->
            @if(isset($ethnicity[0]))
                <div class="app-card app-card-custom no-minHeight mb-3 box-shadow-none"
                data-name="emergency_contact_detail">
                    <div class="app-card-header">
                        <h1 class="title">Ethnicity Detail</h1>
                    </div>
                    <div>
                        <div class="p-3">
                            <div class="">
                                <div class="row">
                                <div class="col-12 col-sm-3 col-md-3">
                                    <div class="input_box">
                                        <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                        <div class="rs">
                                            <h3 class="_title">Ethnicity ID</h3>
                                            <input type="text"
                                            class="form-control-plaintext _detail " readonly
                                            name="ethnicity_id"
                                            onclick="editableField('ethnicity_id')"
                                            data-id="ethnicity_id" id="ethnicity_id"
                                            placeholder="Ethnicity ID" value="{{ $ethnicity[0]->ID }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-3 col-md-3">
                                    <div class="input_box">
                                        <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                        <div class="rs">
                                            <h3 class="_title">Ethnicity Name</h3>
                                            <input type="text"
                                            class="form-control-plaintext _detail " readonly
                                            name="ethnicity_name"
                                            onclick="editableField('ethnicity_name')"
                                            data-id="ethnicity_name" id="ethnicity_name"
                                            placeholder="Ethnicity Name" value="{{ $ethnicity[0]->Name }}">
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- Ethnicity Detail -->

            <!-- Marital Status Detail -->
            @if(!empty($maritalStatus[0]))
                <div class="app-card app-card-custom no-minHeight mb-3 box-shadow-none"
                data-name="emergency_contact_detail">
                    <div class="app-card-header">
                        <h1 class="title">Marital Status Detail</h1>
                    </div>
                    <div>
                        <div class="p-3">
                            <div class="">
                                <div class="row">
                                <div class="col-12 col-sm-3 col-md-3">
                                    <div class="input_box">
                                        <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                        <div class="rs">
                                            <h3 class="_title">Marital Status ID</h3>
                                            <input type="text"
                                            class="form-control-plaintext _detail " readonly
                                            name="marital_status_id"
                                            onclick="editableField('marital_status_id')"
                                            data-id="marital_status_id" id="marital_status_id"
                                            placeholder="Marital Status ID" value="{{ $maritalStatus[0]->ID }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-3 col-md-3">
                                    <div class="input_box">
                                        <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                        <div class="rs">
                                            <h3 class="_title">Marital Status Name</h3>
                                            <input type="text"
                                            class="form-control-plaintext _detail " readonly
                                            name="marital_status_name"
                                            onclick="editableField('marital_status_name')"
                                            data-id="marital_status_name" id="marital_status_name"
                                            placeholder="Marital Status Name" value="{{ $maritalStatus[0]->Name }}">
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- Marital Status  Detail -->

            <!-- Status Detail -->
            @if(!empty($status[0]))
                <div class="app-card app-card-custom no-minHeight mb-3 box-shadow-none"
                data-name="emergency_contact_detail">
                    <div class="app-card-header">
                        <h1 class="title">Status Detail</h1>
                    </div>
                    <div>
                        <div class="p-3">
                            <div class="">
                                <div class="row">
                                <div class="col-12 col-sm-3 col-md-3">
                                    <div class="input_box">
                                        <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                        <div class="rs">
                                            <h3 class="_title">Status ID</h3>
                                            <input type="text"
                                            class="form-control-plaintext _detail " readonly
                                            name="status_id"
                                            onclick="editableField('status_id')"
                                            data-id="status_id" id="status_id"
                                            placeholder="Status ID" value="{{ $status[0]->ID) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-3 col-md-3">
                                    <div class="input_box">
                                        <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                        <div class="rs">
                                            <h3 class="_title">Status Name</h3>
                                            <input type="text"
                                            class="form-control-plaintext _detail " readonly
                                            name="status_name"
                                            onclick="editableField('status_name')"
                                            data-id="status_name" id="status_name"
                                            placeholder="Status Name" value="{{ $status[0]->Name) }}">
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- Status  Detail -->

            <!-- Referral Source  Detail -->
            @if(!empty($referralSource[0]))
                <div class="app-card app-card-custom no-minHeight mb-3 box-shadow-none"
                data-name="emergency_contact_detail">
                    <div class="app-card-header">
                        <h1 class="title">Referral Source Detail</h1>
                    </div>
                    <div>
                        <div class="p-3">
                            <div class="">
                                <div class="row">
                                <div class="col-12 col-sm-3 col-md-3">
                                    <div class="input_box">
                                        <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                        <div class="rs">
                                            <h3 class="_title">Referral Source ID</h3>
                                            <input type="text"
                                            class="form-control-plaintext _detail " readonly
                                            name="referral_source_id"
                                            onclick="editableField('referral_source_id')"
                                            data-id="referral_source_id" id="referral_source_id"
                                            placeholder="Referral Source ID" value="{{ $referralSource[0]->ID) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-3 col-md-3">
                                    <div class="input_box">
                                        <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                        <div class="rs">
                                            <h3 class="_title">Referral Source Name</h3>
                                            <input type="text"
                                            class="form-control-plaintext _detail " readonly
                                            name="referral_source_name"
                                            onclick="editableField('referral_source_name')"
                                            data-id="referral_source_name" id="referral_source_name"
                                            placeholder="Referral Source Name" value="{{ $referralSource[0]->Name) }}">
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- Referral Source   Detail -->

            <!-- Referral Source  Detail -->
            @if(!empty($notificationPreferences[0]))
                <div class="app-card app-card-custom no-minHeight mb-3 box-shadow-none"
                data-name="emergency_contact_detail">
                    <div class="app-card-header">
                        <h1 class="title">Notification Preferences Detail</h1>
                    </div>
                    <div>
                        <div class="p-3">
                            <div class="">
                                <div class="row">
                                <div class="col-12 col-sm-3 col-md-3">
                                    <div class="input_box">
                                        <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                        <div class="rs">
                                            <h3 class="_title">Email</h3>
                                            <input type="text"
                                            class="form-control-plaintext _detail" readonly
                                            name="notification_preferences_email"
                                            onclick="editableField('notification_preferences_email')"
                                            data-id="notification_preferences_email" id="notification_preferences_email"
                                            placeholder="Referral Source ID" value="{{ $notificationPreferences[0]->ID }}">
                                        </div>
                                    </div>
                                </div>
                                @if(isset($notificationPreferences[0]->Method))
                                <div class="col-12 col-sm-3 col-md-3">
                                    <div class="input_box">
                                        <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                        <div class="rs">
                                            <h3 class="_title">Method ID</h3>
                                            <input type="text"
                                                class="form-control-plaintext _detail" readonly
                                                name="method_id"
                                                onclick="editableField('method_id')"
                                                data-id="method_id" id="method_id"
                                                placeholder="Method ID" value="{{ $notificationPreferences[0]->Method->ID }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-3 col-md-3">
                                    <div class="input_box">
                                        <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                        <div class="rs">
                                            <h3 class="_title">Method Name</h3>
                                            <input type="text"
                                            class="form-control-plaintext _detail" readonly
                                            name="method_name"
                                            onclick="editableField('method_name')"
                                            data-id="method_name" id="method_name"
                                            placeholder="Method Name" value="{{ $notificationPreferences[0]->Method->Name }}">
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="col-12 col-sm-3 col-md-3">
                                    <div class="input_box">
                                        <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                        <div class="rs">
                                            <h3 class="_title">Mobile Or SMS</h3>
                                            <input type="text"
                                            class="form-control-plaintext _detail" readonly
                                            name="mobile_or_sms"
                                            onclick="editableField('mobile_or_sms')"
                                            data-id="mobile_or_sms" id="mobile_or_sms"
                                            placeholder="Mobile Or SMS" value="{{ $notificationPreferences[0]->MobileOrSMS }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-3 col-md-3">
                                    <div class="input_box">
                                        <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                        <div class="rs">
                                            <h3 class="_title">Voice Message</h3>
                                            <input type="text"
                                            class="form-control-plaintext _detail" readonly
                                            name="voice_message"
                                            onclick="editableField('voice_message')"
                                            data-id="voice_message" id="voice_message"
                                            placeholder="Voice Message" value="{{ $notificationPreferences[0]->VoiceMessage }}">
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- Referral Source  Detail -->

            <!-- Referral Source  Detail -->
            @if(!empty($caregiverOffices[0]['Office']))
                <div class="app-card app-card-custom no-minHeight mb-3 box-shadow-none"
                data-name="emergency_contact_detail">
                    <div class="app-card-header">
                        <h1 class="title">Office Detail</h1>
                    </div>
                    <div>
                        <div class="p-3">
                            <div class="">
                                <div class="row">
                                <div class="col-12 col-sm-3 col-md-3">
                                    <div class="input_box">
                                        <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                        <div class="rs">
                                            <h3 class="_title">Office ID</h3>
                                            <input type="text"
                                            class="form-control-plaintext _detail" readonly
                                            name="office_id"
                                            onclick="editableField('office_id')"
                                            data-id="office_id" id="office_id"
                                            placeholder="Office ID" value="{{ $caregiverOffices[0]['Office']->OfficeID }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-3 col-md-3">
                                    <div class="input_box">
                                        <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                        <div class="rs">
                                            <h3 class="_title">Is Primary</h3>
                                            <input type="text"
                                            class="form-control-plaintext _detail" readonly
                                            name="is_primary"
                                            onclick="editableField('is_primary')"
                                            data-id="is_primary" id="is_primary"
                                            placeholder="Is Primary" value="{{ $caregiverOffices[0]['Office']->IsPrimary }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-3 col-md-3">
                                    <div class="input_box">
                                        <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                        <div class="rs">
                                            <h3 class="_title">Office Name</h3>
                                            <input type="text"
                                            class="form-control-plaintext _detail" readonly
                                            name="office_name"
                                            onclick="editableField('office_name')"
                                            data-id="office_name" id="office_name"
                                            placeholder="Office Name" value="{{ $caregiverOffices[0]['Office']->OfficeName }}">
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- Referral Source  Detail -->

            <!-- Referral Source  Detail -->
            @if(!empty($inactiveReasonDetail[0]))
                <div class="app-card app-card-custom no-minHeight mb-3 box-shadow-none"
                data-name="emergency_contact_detail">
                    <div class="app-card-header">
                        <h1 class="title">Inactive Reason Detail</h1>
                    </div>
                    <div>
                        <div class="p-3">
                            <div class="">
                                <div class="row">
                                <div class="col-12 col-sm-3 col-md-3">
                                    <div class="input_box">
                                        <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                        <div class="rs">
                                            <h3 class="_title">Inactive Note</h3>
                                            <input type="text"
                                            class="form-control-plaintext _detail" readonly
                                            name="inactive_note"
                                            onclick="editableField('inactive_note')"
                                            data-id="inactive_note" id="inactive_note"
                                            placeholder="Inactive Note" value="{{ $inactiveReasonDetail[0]->InactiveNote }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-3 col-md-3">
                                    <div class="input_box">
                                        <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                        <div class="rs">
                                            <h3 class="_title">Inactive Reason</h3>
                                            <input type="text"
                                            class="form-control-plaintext _detail" readonly
                                            name="inactive_reason"
                                            onclick="editableField('inactive_reason')"
                                            data-id="inactive_reason" id="inactive_reason"
                                            placeholder="Inactive Reason" value="{{ $inactiveReasonDetail[0]->InactiveReason }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-3 col-md-3">
                                    <div class="input_box">
                                        <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                        <div class="rs">
                                            <h3 class="_title">Inactive Reason ID</h3>
                                            <input type="text"
                                            class="form-control-plaintext _detail" readonly
                                            name="inactive_reason_id"
                                            onclick="editableField('inactive_reason_id')"
                                            data-id="inactive_reason_id" id="inactive_reason_id"
                                            placeholder="Inactive Reason ID" value="{{ $inactiveReasonDetail[0]->InactiveReasonID }}">
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- Referral Source  Detail -->
            
            <!-- Emergency contact Detail -->
            <div class="app-card app-card-custom no-minHeight mb-3 box-shadow-none"
                data-name="emergency_contact_detail">
                <div class="app-card-header">
                    <h1 class="title">Emergency Contact Detail</h1>
                </div>
                <div>
                    <div class="p-3">
                    <div class="">
                        <div class="row">
                            <div class="col-12 col-sm-3 col-md-3">
                                <div class="input_box">
                                <div class="ls">
                                    <i class="las la-user-nurse circle"></i>
                                </div>
                                <div class="rs">
                                    <h3 class="_title">Contact Name</h3>
                                    <!-- <h1 class="_detail">Ara lus</h1> -->
                                    <input type="text"
                                        class="form-control-plaintext _detail " readonly
                                        name="contact_name"
                                        onclick="editableField('contact_name')"
                                        data-id="contact_name" id="contact_name"
                                        placeholder="Contact No" value="Shashikant Parmar">
                                </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-3 col-md-3">
                                <div class="input_box">
                                <div class="ls">
                                    <i class="las la-phone circle"></i>
                                </div>
                                <div class="rs">
                                    <h3 class="_title">Home Phone</h3>
                                    <!-- <h1 class="_detail">985471236</h1> -->
                                    <input type="tel" class="form-control-plaintext _detail "
                                        readonly name="home_phone"
                                        onclick="editableField('home_phone')"
                                        data-id="home_phone" id="home_phone"
                                        onkeyup="this.value=this.value.replace(/[^\d]/,'')"
                                        placeholder="Home Phone" value="985471236">
                                </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-3 col-md-3">
                                <div class="input_box">
                                <div class="ls">
                                    <i class="las la-phone circle"></i>
                                </div>
                                <div class="rs">
                                    <h3 class="_title">Cell Phone</h3>
                                    <!-- <h1 class="_detail">985471236</h1> -->
                                    <input type="tel" class="form-control-plaintext _detail "
                                        readonly name="cell_phone"
                                        onclick="editableField('cell_phone')"
                                        data-id="cell_phone" id="cell_phone"
                                        onkeyup="this.value=this.value.replace(/[^\d]/,'')"
                                        placeholder="Cell Phone" value="985471236">
                                </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-3 col-md-3">
                                <div class="input_box">
                                <div class="ls">
                                    <i class="las la-phone circle"></i>
                                </div>
                                <div class="rs">
                                    <h3 class="_title">Work Phone</h3>
                                    <!-- <h1 class="_detail">985471236</h1> -->
                                    <input type="tel" class="form-control-plaintext _detail "
                                        readonly name="work_phone2"
                                        onclick="editableField('work_phone2')"
                                        data-id="work_phone2" id="work_phone2"
                                        onkeyup="this.value=this.value.replace(/[^\d]/,'')"
                                        placeholder="Work Phone" value="985471236">
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <!-- Emergency contact Detail -->
            <!-- If Unavailable (2nd) Contact Detail -->
            <div class="app-card app-card-custom no-minHeight box-shadow-none"
                data-name="emergency_contact_detail">
                <div class="app-card-header">
                    <h1 class="title">If Unavailable (2nd) Contact Detail</h1>
                </div>
                <div>
                    <div class="p-3">
                    <div class="">
                        <div class="row">
                            <div class="col-12 col-sm-3 col-md-3">
                                <div class="input_box">
                                <div class="ls">
                                    <i class="las la-user-nurse circle"></i>
                                </div>
                                <div class="rs">
                                    <h3 class="_title">Contact Name</h3>
                                    <!-- <h1 class="_detail">Ara lus</h1> -->
                                    <input type="tel" class="form-control-plaintext _detail "
                                        readonly name="work_phone1"
                                        onclick="editableField('work_phone1')"
                                        data-id="work_phone1" id="work_phone1"
                                        onkeyup="this.value=this.value.replace(/[^\d]/,'')"
                                        placeholder="Work Phone" value="985471236">
                                </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-3 col-md-3">
                                <div class="input_box">
                                <div class="ls">
                                    <i class="las la-phone circle"></i>
                                </div>
                                <div class="rs">
                                    <h3 class="_title">Home Phone</h3>
                                    <!-- <h1 class="_detail">985471236</h1> -->
                                    <input type="tel" class="form-control-plaintext _detail "
                                        readonly name="home_phone1"
                                        onclick="editableField('home_phone1')"
                                        data-id="home_phone1" id="home_phone1"
                                        onkeyup="this.value=this.value.replace(/[^\d]/,'')"
                                        placeholder="Home Phone" value="985471236">
                                </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-3 col-md-3">
                                <div class="input_box">
                                <div class="ls">
                                    <i class="las la-phone circle"></i>
                                </div>
                                <div class="rs">
                                    <h3 class="_title">Cell Phone</h3>
                                    <!-- <h1 class="_detail">985471236</h1> -->
                                    <input type="tel" class="form-control-plaintext _detail "
                                        readonly name="cell_phone1"
                                        onclick="editableField('home_phone1')"
                                        data-id="cell_phone1" id="cell_phone1"
                                        onkeyup="this.value=this.value.replace(/[^\d]/,'')"
                                        placeholder="Cell Phone" value="985471236">
                                </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-3 col-md-3">
                                <div class="input_box">
                                <div class="ls">
                                    <i class="las la-phone circle"></i>
                                </div>
                                <div class="rs">
                                    <h3 class="_title">Work Phone</h3>
                                    <!-- <h1 class="_detail">985471236</h1> -->
                                    <input type="tel" class="form-control-plaintext _detail "
                                        readonly name="work_phone3"
                                        onclick="editableField('work_phone3')"
                                        data-id="work_phone3" id="work_phone3"
                                        onkeyup="this.value=this.value.replace(/[^\d]/,'')"
                                        placeholder="Work Phone" value="985471236">
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <!-- If Unavailable (2nd) Contact Detail -->
        </div>
        </div>
    </div>
    <!-- Demographics End -->
</div>