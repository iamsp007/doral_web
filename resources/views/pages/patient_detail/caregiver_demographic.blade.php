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
                                    <h3 class="_title">SSN</h3>
                                    <div>
                                        <input type="text" class="form-control-plaintext _detail "
                                            readonly name="ssn" onclick="editableField('ssn')"
                                            data-id="ssn" id="ssn" onblur="validateEmail(this);"
                                            placeholder="SSN" value="{{ $patient->demographic->ssn }}">
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
                                    <h3 class="_title">Alternate Caregiver Code</h3>
                                    <input type="text" class="form-control-plaintext _detail "
                                        readonly name="alternate_caregiver_code" onclick="editableField('alternate_caregiver_code')"
                                        data-id="alternate_caregiver_code" id="alternate_caregiver_code" onblur="validateEmail(this);"
                                        placeholder="Alternate Caregiver Code" value="{{ $patient->caregiverInfo->alternate_caregiver_code }}">
                                </div>
                            </div>
                        </div>
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
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
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
                <div class="form-group">
                    <div class="row">
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
                    </div>
                </div>
                <div class="collapse mt-4" id="collapseExample">
                    <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%"
                        height="200" frameborder="0" scrolling="no" marginheight="0"
                        marginwidth="0"
                        src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                </div>
                
                <!-- Team Detail -->
                @if(isset($team[0]))
                    <div class="app-card app-card-custom no-minHeight mb-3 box-shadow-none"
                    data-name="emergency_contact_detail">
                        <div class="app-card-header">
                            <h1 class="title">Team Detail</h1>
                        </div>
                        <div>
                            <div class="p-3">
                                <div class="">
                                    <div class="row">
                                    <div class="col-12 col-sm-3 col-md-3">
                                        <div class="input_box">
                                            <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                            <div class="rs">
                                                <h3 class="_title">Team Name</h3>
                                                <input type="text"
                                                class="form-control-plaintext _detail " readonly
                                                name="team_name"
                                                onclick="editableField('team_name')"
                                                data-id="team_name" id="team_name"
                                                placeholder="Team Name" value="{{ $team[0]->Name }}">
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <!-- Team Detail -->

                <!-- Location Detail -->
                @if(isset($location[0]))
                    <div class="app-card app-card-custom no-minHeight mb-3 box-shadow-none"
                    data-name="emergency_contact_detail">
                        <div class="app-card-header">
                            <h1 class="title">Location Detail</h1>
                        </div>
                        <div>
                            <div class="p-3">
                                <div class="">
                                    <div class="row">
                                    <div class="col-12 col-sm-3 col-md-3">
                                        <div class="input_box">
                                            <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                            <div class="rs">
                                                <h3 class="_title">Location Name</h3>
                                                <input type="text"
                                                class="form-control-plaintext _detail " readonly
                                                name="location_name"
                                                onclick="editableField('location_name')"
                                                data-id="location_name" id="location_name"
                                                placeholder="Location Name" value="{{ $location[0]->Name }}">
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <!-- Location Detail -->

                <!-- Branch Detail -->
                @if(isset($branch[0]))
                    <div class="app-card app-card-custom no-minHeight mb-3 box-shadow-none"
                    data-name="emergency_contact_detail">
                        <div class="app-card-header">
                            <h1 class="title">Branch Detail</h1>
                        </div>
                        <div>
                            <div class="p-3">
                                <div class="">
                                    <div class="row">
                                    <div class="col-12 col-sm-3 col-md-3">
                                        <div class="input_box">
                                            <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                            <div class="rs">
                                                <h3 class="_title">Branch Name</h3>
                                                <input type="text"
                                                class="form-control-plaintext _detail " readonly
                                                name="branch_name"
                                                onclick="editableField('branch_name')"
                                                data-id="branch_name" id="branch_name"
                                                placeholder="Branch Name" value="{{ $branch[0]->Name }}">
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <!-- Branch Detail -->

                <!-- Accepted Services Detail -->
                @if(isset($acceptedServices[0]))
                    <div class="app-card app-card-custom no-minHeight mb-3 box-shadow-none"
                    data-name="emergency_contact_detail">
                        <div class="app-card-header">
                            <h1 class="title">Accepted Services Detail</h1>
                        </div>
                        <div>
                            <div class="p-3">
                                <div class="">
                                    <div class="row">
                                    <div class="col-12 col-sm-3 col-md-3">
                                        <div class="input_box">
                                            <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                            <div class="rs">
                                                <h3 class="_title">Discipline</h3>
                                                <input type="text"
                                                class="form-control-plaintext _detail " readonly
                                                name="accepted_services"
                                                onclick="editableField('accepted_services')"
                                                data-id="accepted_services" id="accepted_services"
                                                placeholder="Accepted Services" value="{{ $acceptedServices[0]->Discipline }}">
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <!-- Location Detail -->

                <!-- Address Detail -->
                @if(isset($address[0]))
                    <div class="app-card app-card-custom no-minHeight mb-3 box-shadow-none"
                    data-name="emergency_contact_detail">
                        <div class="app-card-header">
                            <h1 class="title">Address Detail</h1>
                        </div>
                        <div>
                            <div class="p-3">
                                <div class="">
                                    <div class="row">
                                        <div class="col-12 col-sm-3 col-md-3">
                                            <div class="input_box">
                                                <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                                <div class="rs">
                                                    <h3 class="_title">City</h3>
                                                    <input type="text"
                                                    class="form-control-plaintext _detail " readonly
                                                    name="city"
                                                    onclick="editableField('city')"
                                                    data-id="city" id="city"
                                                    placeholder="City" value="{{ $address[0]->City }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-3 col-md-3">
                                            <div class="input_box">
                                                <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                                <div class="rs">
                                                    <h3 class="_title">Zip4</h3>
                                                    <input type="text"
                                                    class="form-control-plaintext _detail " readonly
                                                    name="zip4"
                                                    onclick="editableField('zip4')"
                                                    data-id="zip4" id="zip4"
                                                    placeholder="Zip4" value="{{ $address[0]->Zip4 }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-3 col-md-3">
                                            <div class="input_box">
                                                <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                                <div class="rs">
                                                    <h3 class="_title">Zip5</h3>
                                                    <input type="text"
                                                    class="form-control-plaintext _detail " readonly
                                                    name="zip5"
                                                    onclick="editableField('zip5')"
                                                    data-id="zip5" id="zip5"
                                                    placeholder="zip5" value="{{ $address[0]->Zip5 }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-3 col-md-3">
                                            <div class="input_box">
                                                <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                                <div class="rs">
                                                    <h3 class="_title">State</h3>
                                                    <input type="text"
                                                    class="form-control-plaintext _detail " readonly
                                                    name="state"
                                                    onclick="editableField('state')"
                                                    data-id="state" id="state"
                                                    placeholder="state" value="{{ $address[0]->State }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="row">
                                        <div class="col-12 col-sm-3 col-md-3">
                                            <div class="input_box">
                                                <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                                <div class="rs">
                                                    <h3 class="_title">Phone2</h3>
                                                    <input type="text"
                                                    class="form-control-plaintext _detail " readonly
                                                    name="phone2"
                                                    onclick="editableField('phone2')"
                                                    data-id="phone2" id="phone2"
                                                    placeholder="phone2" value="{{ ($address[0]->Phone2) ? $address[0]->Phone2 : '' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-3 col-md-3">
                                            <div class="input_box">
                                                <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                                <div class="rs">
                                                    <h3 class="_title">Phone3</h3>
                                                    <input type="text"
                                                    class="form-control-plaintext _detail " readonly
                                                    name="phone3"
                                                    onclick="editableField('phone3')"
                                                    data-id="phone3" id="phone3"
                                                    placeholder="phone3" value="{{ ($address[0]->Phone3) ? $address[0]->Phone3 : '' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-3 col-md-3">
                                            <div class="input_box">
                                                <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                                <div class="rs">
                                                    <h3 class="_title">Street1</h3>
                                                    <input type="text"
                                                    class="form-control-plaintext _detail " readonly
                                                    name="street1"
                                                    onclick="editableField('street1')"
                                                    data-id="street1" id="street1"
                                                    placeholder="street1" value="{{ $address[0]->Street1 }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-3 col-md-3">
                                            <div class="input_box">
                                                <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                                <div class="rs">
                                                    <h3 class="_title">Street2</h3>
                                                    <input type="text"
                                                    class="form-control-plaintext _detail " readonly
                                                    name="street2"
                                                    onclick="editableField('street2')"
                                                    data-id="street2" id="street2"
                                                    placeholder="street2" value="{{ ($address[0]->Street2) ? $address[0]->Street2 : '' }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="row">
                                        <div class="col-12 col-sm-3 col-md-3">
                                            <div class="input_box">
                                                <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                                <div class="rs">
                                                    <h3 class="_title">HomePhone</h3>
                                                    <input type="text"
                                                    class="form-control-plaintext _detail " readonly
                                                    name="home_phone"
                                                    onclick="editableField('home_phone')"
                                                    data-id="home_phone" id="home_phone"
                                                    placeholder="home_phone" value="{{ $address[0]->HomePhone }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <!-- Address Detail -->

                <!-- Lanuguage Detail -->
                @if(isset($language[0]))
                    <div class="app-card app-card-custom no-minHeight mb-3 box-shadow-none"
                    data-name="emergency_contact_detail">
                        <div class="app-card-header">
                            <h1 class="title">Lanuguage Detail</h1>
                        </div>
                        <div>
                            <div class="p-3">
                                <div class="">
                                    <div class="row">
                                        <div class="col-12 col-sm-3 col-md-3">
                                            <div class="input_box">
                                                <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                                <div class="rs">
                                                    <h3 class="_title">Language1</h3>
                                                    <input type="text"
                                                    class="form-control-plaintext _detail " readonly
                                                    name="language1"
                                                    onclick="editableField('language1')"
                                                    data-id="language1" id="language1"
                                                    placeholder="Language1" value="{{ $language[0]->Language1 }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-3 col-md-3">
                                            <div class="input_box">
                                                <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                                <div class="rs">
                                                    <h3 class="_title">Language2</h3>
                                                    <input type="text"
                                                    class="form-control-plaintext _detail " readonly
                                                    name="language2"
                                                    onclick="editableField('language2')"
                                                    data-id="language2" id="language2"
                                                    placeholder="Language2" value="{{ $language[0]->Language2 }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="row">
                                        <div class="col-12 col-sm-3 col-md-3">
                                            <div class="input_box">
                                                <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                                <div class="rs">
                                                    <h3 class="_title">Language3</h3>
                                                    <input type="text"
                                                    class="form-control-plaintext _detail " readonly
                                                    name="language3"
                                                    onclick="editableField('language3')"
                                                    data-id="language3" id="language3"
                                                    placeholder="Language3" value="{{ $language[0]->Language3 }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-3 col-md-3">
                                            <div class="input_box">
                                                <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                                <div class="rs">
                                                    <h3 class="_title">Language4</h3>
                                                    <input type="text"
                                                    class="form-control-plaintext _detail " readonly
                                                    name="language4"
                                                    onclick="editableField('language4')"
                                                    data-id="language4" id="language4"
                                                    placeholder="Language4" value="{{ $language[0]->Language4 }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <!-- Lanuguage Detail -->

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
                                                <h3 class="_title">Status Name</h3>
                                                <input type="text"
                                                class="form-control-plaintext _detail " readonly
                                                name="status_name"
                                                onclick="editableField('status_name')"
                                                data-id="status_name" id="status_name"
                                                placeholder="Status Name" value="{{ $status[0]->Name }}">
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
                                                <h3 class="_title">Referral Source Name</h3>
                                                <input type="text"
                                                class="form-control-plaintext _detail " readonly
                                                name="referral_source_name"
                                                onclick="editableField('referral_source_name')"
                                                data-id="referral_source_name" id="referral_source_name"
                                                placeholder="Referral Source Name" value="{{ $referralSource[0]->Name }}">
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
                                                    placeholder="Email" value="{{ $notificationPreferences[0]->Email }}">
                                                </div>
                                            </div>
                                        </div>
                                        @if(isset($notificationPreferences[0]->Method))
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
                @if(!empty($caregiverOffices[0]->Office))
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
                                                <h3 class="_title">Is Primary</h3>
                                                <input type="text"
                                                class="form-control-plaintext _detail" readonly
                                                name="is_primary"
                                                onclick="editableField('is_primary')"
                                                data-id="is_primary" id="is_primary"
                                                placeholder="Is Primary" value="{{ $caregiverOffices[0]->Office->IsPrimary }}">
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
                                                placeholder="Office Name" value="{{ $caregiverOffices[0]->Office->OfficeName }}">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <!-- Referral Source  Detail -->
                
                <!-- Emergency contact Detail -->
                <!-- Emergency contact Detail -->
                @if($patient->patientEmergency)
                    @foreach($patient->patientEmergency as $key => $patientEmergencyContact)
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
                                                    <input type="text"
                                                        class="form-control-plaintext _detail " readonly
                                                        name="name"
                                                        onclick="editableField('name')"
                                                        data-id="name" id="name"
                                                        placeholder="Contact Name" value="{{ $patientEmergencyContact->name }}">
                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3 col-md-3">
                                                <div class="input_box">
                                                <div class="ls">
                                                    <i class="las la-phone circle"></i>
                                                </div>
                                                <div class="rs">
                                                    <h3 class="_title">Phone1</h3>
                                                    <input type="text"
                                                        class="form-control-plaintext _detail " readonly
                                                        name="phone1"
                                                        onclick="editableField('phone1')"
                                                        data-id="phone1" id="phone1"
                                                        placeholder="Phone1" value="{{ $patientEmergencyContact->phone1 }}">
                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3 col-md-3">
                                                <div class="input_box">
                                                <div class="ls">
                                                    <i class="las la-phone circle"></i>
                                                </div>
                                                <div class="rs">
                                                    <h3 class="_title">Phone2</h3>
                                                        <input type="text"
                                                        class="form-control-plaintext _detail " readonly
                                                        name="phone2"
                                                        onclick="editableField('phone2')"
                                                        data-id="phone2" id="phone2"
                                                        placeholder="Phone2" value="{{ $patientEmergencyContact->phone2 }}">
                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3 col-md-3">
                                                <div class="input_box">
                                                <div class="ls">
                                                    <i class="las la-user-nurse circle"></i>
                                                </div>
                                                <div class="rs">
                                                    <h3 class="_title">Address</h3>
                                                    <input type="text"
                                                        class="form-control-plaintext _detail " readonly
                                                        name="address"
                                                        onclick="editableField('address')"
                                                        data-id="address" id="address"
                                                        placeholder="Address" value="{{ $patientEmergencyContact->address }}">
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-3">
                                    <div class="">
                                        <div class="row">
                                            @foreach(json_decode($patientEmergencyContact->relation, true) as $value)
                                                <div class="col-12 col-sm-3 col-md-3">
                                                    <div class="input_box">
                                                    <div class="ls">
                                                        <i class="las la-user-nurse circle"></i>
                                                    </div>
                                                    <div class="rs">
                                                        <h3 class="_title">Relationship Name</h3>
                                                        <input type="text"
                                                            class="form-control-plaintext _detail " readonly
                                                            name="relationship_name"
                                                            onclick="editableField('relationship_name')"
                                                            data-id="relationship_name" id="relationship_name"
                                                            placeholder="Relationship Name" value="{{ $value['Name']}}">
                                                    </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                <!-- Emergency contact Detail -->
            </div>
        </div>
    </div>
    <!-- Demographics End -->
</div>