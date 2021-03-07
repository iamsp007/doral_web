<div class="tab-pane fade" id="patient-referral" role="tabpanel" aria-labelledby="patient-referral-tab">
    <div class="app-card app-card-custom" data-name="patient-referral">
        <div class="app-card-header">
            <h1 class="title">Patient Referral</h1>
            <img src="{{ asset('assets/img/icons/edit-field.svg') }}" data-toggle="tooltip" data-placement="bottom" title="Edit" class="cursor-pointer edit-icon" alt="" onclick="editAllField('demographic')">
            <img src="{{ asset('assets/img/icons/update-icon.svg') }}" style="display:none" data-toggle="tooltip" data-placement="bottom" title="Update" class="cursor-pointer update-icon" alt="" onclick="updateAllField('demographic')">
        </div>
        <div class="head scrollbar scrollbar4">
            <div class="p-3">
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-3 col-md-3">
                            <div class="input_box">
                                <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                                <div class="rs">
                                <h3 class="_title">Referral ID</h3>
                                <input type="text" class="form-control-plaintext _detail "
                                    readonly name="referral_master_id" onclick="editableField('referral_master_id')"
                                    data-id="referral_master_id" id="referral_master_id" onblur="validateEmail(this);"
                                    placeholder="Referral ID" value="{{ ($patient->patientReferralInfo) ? $patient->patientReferralInfo->referral_master_id : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3 col-md-3">
                            <div class="input_box">
                                <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                                <div class="rs">
                                <h3 class="_title">Referral Name</h3>
                                <input type="text" class="form-control-plaintext _detail "
                                    readonly name="referral_name" onclick="editableField('referral_name')"
                                    data-id="referral_name" id="referral_name" onblur="validateEmail(this);"
                                    placeholder="Referral Name" value="{{ ($patient->patientReferralInfo) ? $patient->patientReferralInfo->referral_name : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3 col-md-3">
                            <div class="input_box">
                                <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                                <div class="rs">
                                <h3 class="_title">Referral Created Date</h3>
                                <input type="text" class="form-control-plaintext _detail "
                                    readonly name="referral_created_date" onclick="editableField('referral_created_date')"
                                    data-id="referral_created_date" id="referral_created_date" onblur="validateEmail(this);"
                                    placeholder="Referral Created Date" value="{{ ($patient->patientReferralInfo) ? $patient->patientReferralInfo->referral_created_date : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3 col-md-3">
                            <div class="input_box">
                                <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                                <div class="rs">
                                <h3 class="_title">Referral Received Date</h3>
                                <input type="text" class="form-control-plaintext _detail "
                                    readonly name="referral_received_date" onclick="editableField('referral_received_date')"
                                    data-id="referral_received_date" id="referral_received_date" onblur="validateEmail(this);"
                                    placeholder="Referral Received Date" value="{{ ($patient->patientClinicalDetail) ? $patient->patientClinicalDetail->referral_received_date : '' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-3 col-md-3">
                            <div class="input_box">
                                <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                                <div class="rs">
                                <h3 class="_title">Referral Status ID</h3>
                                <input type="text" class="form-control-plaintext _detail "
                                    readonly name="referral_status_id" onclick="editableField('referral_status_id')"
                                    data-id="referral_status_id" id="referral_status_id" onblur="validateEmail(this);"
                                    placeholder="Referral Status ID" value="{{ ($patient->patientReferralInfo) ? $patient->patientReferralInfo->referral_status_id : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3 col-md-3">
                            <div class="input_box">
                                <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                                <div class="rs">
                                <h3 class="_title">Referral Status</h3>
                                <input type="text" class="form-control-plaintext _detail "
                                    readonly name="referral_status" onclick="editableField('referral_status')"
                                    data-id="referral_status" id="referral_status" onblur="validateEmail(this);"
                                    placeholder="Referral Status" value="{{ ($patient->patientReferralInfo) ? $patient->patientReferralInfo->referral_status : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3 col-md-3">
                            <div class="input_box">
                                <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                                <div class="rs">
                                <h3 class="_title">Referral Commission Status ID</h3>
                                <input type="text" class="form-control-plaintext _detail "
                                    readonly name="referral_commission_status_id" onclick="editableField('referral_commission_status_id')"
                                    data-id="referral_commission_status_id" id="referral_commission_status_id" onblur="validateEmail(this);"
                                    placeholder="Referral Created Date" value="{{ ($patient->patientReferralInfo) ? $patient->patientReferralInfo->referral_commission_status_id : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3 col-md-3">
                            <div class="input_box">
                                <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                                <div class="rs">
                                <h3 class="_title">Referral Commission Status</h3>
                                <input type="text" class="form-control-plaintext _detail "
                                    readonly name="referral_commission_status" onclick="editableField('referral_commission_status')"
                                    data-id="referral_commission_status" id="referral_commission_status" onblur="validateEmail(this);"
                                    placeholder="Referral Received Date" value="{{ ($patient->patientClinicalDetail) ? $patient->patientClinicalDetail->referral_commission_status : '' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-3 col-md-3">
                            <div class="input_box">
                                <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                                <div class="rs">
                                <h3 class="_title">Referral Source ID</h3>
                                <input type="text" class="form-control-plaintext _detail "
                                    readonly name="referral_source_id" onclick="editableField('referral_source_id')"
                                    data-id="referral_source_id" id="referral_source_id" onblur="validateEmail(this);"
                                    placeholder="Referral Source ID" value="{{ ($patient->patientReferralInfo) ? $patient->patientReferralInfo->referral_source_id : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3 col-md-3">
                            <div class="input_box">
                                <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                                <div class="rs">
                                <h3 class="_title">Referral Source Name</h3>
                                <input type="text" class="form-control-plaintext _detail "
                                    readonly name="referral_source_name" onclick="editableField('referral_source_name')"
                                    data-id="referral_source_name" id="referral_source_name" onblur="validateEmail(this);"
                                    placeholder="Referral Source Name" value="{{ ($patient->patientReferralInfo) ? $patient->patientReferralInfo->referral_source_name : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3 col-md-3">
                            <div class="input_box">
                                <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                                <div class="rs">
                                <h3 class="_title">Referral Source Type</h3>
                                <input type="text" class="form-control-plaintext _detail "
                                    readonly name="referral_source_type" onclick="editableField('referral_source_type')"
                                    data-id="referral_source_type" id="referral_source_type" onblur="validateEmail(this);"
                                    placeholder="Referral Source Type" value="{{ ($patient->patientReferralInfo) ? $patient->patientReferralInfo->referral_source_type : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3 col-md-3">
                            <div class="input_box">
                                <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                                <div class="rs">
                                <h3 class="_title">Referral Contact ID</h3>
                                <input type="text" class="form-control-plaintext _detail "
                                    readonly name="referral_contact_id" onclick="editableField('referral_contact_id')"
                                    data-id="referral_contact_id" id="referral_contact_id" onblur="validateEmail(this);"
                                    placeholder="Referral Contact ID" value="{{ ($patient->patientClinicalDetail) ? $patient->patientClinicalDetail->referral_contact_id : '' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-3 col-md-3">
                            <div class="input_box">
                                <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                                <div class="rs">
                                <h3 class="_title">Referral Contact Name</h3>
                                <input type="text" class="form-control-plaintext _detail "
                                    readonly name="referral_contact_name" onclick="editableField('referral_contact_name')"
                                    data-id="referral_contact_name" id="referral_contact_name" onblur="validateEmail(this);"
                                    placeholder="Referral Contact Name" value="{{ ($patient->patientReferralInfo) ? $patient->patientReferralInfo->referral_contact_name : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3 col-md-3">
                            <div class="input_box">
                                <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                                <div class="rs">
                                <h3 class="_title">Referral Intake Person ID</h3>
                                <input type="text" class="form-control-plaintext _detail "
                                    readonly name="referral_intake_person_id" onclick="editableField('referral_intake_person_id')"
                                    data-id="referral_intake_person_id" id="referral_intake_person_id" onblur="validateEmail(this);"
                                    placeholder="Referral Intake Person ID" value="{{ ($patient->patientReferralInfo) ? $patient->patientReferralInfo->referral_intake_person_id : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3 col-md-3">
                            <div class="input_box">
                                <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                                <div class="rs">
                                <h3 class="_title">Referral Account Manager ID</h3>
                                <input type="text" class="form-control-plaintext _detail "
                                    readonly name="referral_account_manager_id" onclick="editableField('referral_account_manager_id')"
                                    data-id="referral_account_manager_id" id="referral_account_manager_id" onblur="validateEmail(this);"
                                    placeholder="Referral Account Manager ID" value="{{ ($patient->patientReferralInfo) ? $patient->patientReferralInfo->referral_account_manager_id : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3 col-md-3">
                            <div class="input_box">
                                <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                                <div class="rs">
                                <h3 class="_title">Referral Account Manager Name</h3>
                                <input type="text" class="form-control-plaintext _detail "
                                    readonly name="referral_account_manager_name" onclick="editableField('referral_account_manager_name')"
                                    data-id="referral_account_manager_name" id="referral_account_manager_name" onblur="validateEmail(this);"
                                    placeholder="Referral Account Manager Name" value="{{ ($patient->patientClinicalDetail) ? $patient->patientClinicalDetail->referral_account_manager_name : '' }}">
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
            </div>
        </div>
    </div>
</div>