<div class="tab-pane fade show active" id="demographic" role="tabpanel" aria-labelledby="demographic">
    <div class="app-card app-card-custom" data-name="demographics">
        <div class="app-card-header">
            <h1 class="title">Demographics</h1>
            <img src="{{ asset('assets/img/icons/edit-field.svg') }}" data-toggle="tooltip" data-placement="bottom" title="Edit" class="cursor-pointer edit-icon" alt="" onclick="editAllField('demographic')">
            <img src="{{ asset('assets/img/icons/update-icon.svg') }}" style="display:none" data-toggle="tooltip" data-placement="bottom" title="Update" class="cursor-pointer update-icon" alt="" onclick="updateAllField('demographic')">
        </div>
        <div class="head scrollbar scrollbar12">
        <form id="demographic_form">
            <div class="p-3">
                <div class="form-group">
                    <div class="row">
                        <input type="hidden" name="user_id" value="{{ $patient->id }}">
                        <div class="col-12 col-sm-3 col-md-3">
                            <div class="input_box">
                                <div class="ls"><i class="las la-phone circle"></i></div>
                                <div class="rs">
                                    <h3 class="_title">First Name</h3>
                                    <div>
                                        <input type="text" class="form-control-plaintext _detail "
                                            readonly name="first_name" onclick="editableField('first_name')"
                                            data-id="first_name" id="first_name" 
                                            placeholder="First Name" value="{{ $patient->first_name }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3 col-md-3">
                            <div class="input_box">
                                <div class="ls"><i class="las la-phone circle"></i></div>
                                <div class="rs">
                                    <h3 class="_title">Last Name</h3>
                                    <div>
                                        <input type="text" class="form-control-plaintext _detail "
                                            readonly name="last_name" onclick="editableField('last_name')"
                                            data-id="last_name" id="last_name" 
                                            placeholder="Last Name" value="{{ $patient->last_name }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3 col-md-3">
                            <div class="input_box">
                                <div class="ls"><i class="las la-phone circle"></i></div>
                                <div class="rs">
                                    <h3 class="_title">Email</h3>
                                    <div>
                                        <input type="text" class="form-control-plaintext _detail "
                                            readonly name="email" onclick="editableField('email')"
                                            data-id="email" id="email" 
                                            placeholder="Last Name" value="{{ $patient->email }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3 col-md-3">
                            <div class="input_box">
                                <div class="ls"><i class="las la-phone circle"></i></div>
                                <div class="rs">
                                    <h3 class="_title">Gender</h3>
                                    <div>
                                        <select class="form-control" name="gender" data-id="gender" id="gender" >
                                            <option>Gender</option>
                                            <option value="1" {{ $patient->gender == 1 ? "selected" : null }}>Male</option>
                                            <option value="2" {{ $patient->gender == 2 ? "selected" : null }}>Female</option>
                                            <option value="3" {{ $patient->gender == 3 ? "selected" : null }}>Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <label for="dob" class="label">Date Of Birth</label>
                            <div class="input-group">
                                <span class="input-group-text input-group-text-custom"
                                    id="dateofbirth">
                                    <i class="las la-calendar"></i>
                                </span>
                                <input type="text" class="form-control form-control-lg" id="dob"
                                    name="dob" aria-describedby=""  value="{{ ($patient->dob) ? date('m-d-Y', strtotime($patient->dob)) : '' }}">
                            </div>
                            <span class="errorText dob"></span>
                        </div>
                      
                        <div class="col-12 col-sm-3 col-md-3">
                            <div class="input_box">
                                <div class="ls"><i class="las la-phone circle"></i></div>
                                <div class="rs">
                                    <h3 class="_title">SSN</h3>
                                    <div>
                                        <input type="text" class="form-control-plaintext _detail "
                                            readonly name="ssn" onclick="editableField('ssn')"
                                            data-id="ssn" id="ssn" 
                                            placeholder="SSN" value="{{ ($patient->demographic) ? $patient->demographic->ssn : '' }}">
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
                                        data-id="country_of_birth" id="country_of_birth" 
                                        placeholder="Country Of Birth" value="{{ ($patient->caregiverInfo) ? $patient->caregiverInfo->country_of_birth : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3 col-md-3">
                            <div class="input_box">
                                <div class="ls">
                                    <i class="las la-phone circle"></i>
                                </div>
                                <div class="rs">
                                    <h3 class="_title">Ethnicity</h3>
                                    <div>
                                        <input type="text" class="form-control-plaintext _detail "
                                            readonly name="ethnicity" onclick="editableField('ethnicity')"
                                            data-id="ethnicity" id="ethnicity" 
                                            placeholder="Ethnicity" value="{{ ($ethnicity[0] && $ethnicity[0]->Name) ? $ethnicity[0]->Name : '' }}">
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
                                    <h3 class="_title">Professional License Number</h3>
                                    <input type="text" class="form-control-plaintext _detail "
                                        readonly name="professional_licensenumber" onclick="editableField('professional_licensenumber')"
                                        data-id="professional_licensenumber" id="professional_licensenumber" 
                                        placeholder="Professional License Number" value="{{ ($patient->caregiverInfo) ?$patient->caregiverInfo->professional_licensenumber : '' }}">
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
                                            data-id="npi_number" id="npi_number" 
                                            placeholder="Npi Number" value="{{ ($patient->caregiverInfo) ? $patient->caregiverInfo->npi_number : '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3 col-md-3">
                            <div class="input_box">
                                <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                <div class="rs">
                                    <h3 class="_title">HomePhone</h3>
                                    <input type="text"
                                    class="form-control-plaintext _detail phoneNumber" readonly
                                    name="home_phone"
                                    onclick="editableField('home_phone')"
                                    data-id="home_phone" id="home_phone"
                                    placeholder="home_phone" value="{{ ($patient->phone) ? $patient->phone : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3 col-md-3">
                            <div class="input_box">
                                <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                <div class="rs">
                                    <h3 class="_title">Telephone</h3>
                                    <input type="text"
                                    class="form-control-plaintext _detail phoneNumber" readonly
                                    name="phone2"
                                    onclick="editableField('phone2')"
                                    data-id="phone2" id="phone2"
                                    placeholder="Telephone" value="{{ ($patient->demographic) ? $patient->demographic->telephone : '' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
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
                                    placeholder="Language1" value="{{ ($language[0] && $language[0]->Language1) ? $language[0]->Language1 : '' }}">
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
                                    placeholder="Language2" value="{{ ($language[0] && $language[0]->Language2) ? $language[0]->Language2 : '' }}">
                                </div>
                            </div>
                        </div>
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
                                    placeholder="Language3" value="{{ ($language[0] && $language[0]->Language3) ? $language[0]->Language3 : '' }}">
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
                                    placeholder="Language4" value="{{ ($language[0] && $language[0]->Language4) ? $language[0]->Language4 : '' }}">
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
                                    <h3 class="_title">Marital Status</h3>
                                    <input type="text"
                                    class="form-control-plaintext _detail " readonly
                                    name="marital_status_name"
                                    onclick="editableField('marital_status_name')"
                                    data-id="marital_status_name" id="marital_status_name"
                                    placeholder="Marital Status Name" value="{{ ($maritalStatus[0] && $maritalStatus[0]->Name) ? $maritalStatus[0]->Name : '' }}">
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

                <!-- Address Detail -->
                @if(isset($address[0]))
                    <div class="app-card app-card-custom no-minHeight mb-3 box-shadow-none"
                    data-name="emergency_contact_detail">
                        <div class="app-card-header">
                            <h1 class="title">Address Detail</h1>
                        </div>
                        <div>
                            <div class="p-3">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-sm-3 col-md-3">
                                            <div class="input_box">
                                                <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                                <div class="rs">
                                                    <h3 class="_title">Address1</h3>
                                                    <input type="text"
                                                    class="form-control-plaintext _detail " readonly
                                                    name="street1"
                                                    onclick="editableField('street1')"
                                                    data-id="street1" id="street1"
                                                    placeholder="Address1" value="{{ ($address[0]->Street1) ? $address[0]->Street1 : '' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-3 col-md-3">
                                            <div class="input_box">
                                                <div class="ls"><i class="las la-user-nurse circle"></i></div>
                                                <div class="rs">
                                                    <h3 class="_title">Address2</h3>
                                                    <input type="text"
                                                    class="form-control-plaintext _detail " readonly
                                                    name="street2"
                                                    onclick="editableField('street2')"
                                                    data-id="street2" id="street2"
                                                    placeholder="Address2" value="{{ ($address[0]->Street2) ? $address[0]->Street2 : '' }}">
                                                </div>
                                            </div>
                                        </div>
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
                                                    placeholder="City" value="{{ ($address[0]->City) ? $address[0]->City : '' }}">
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
                                                    placeholder="state" value="{{ ($address[0]->State) ? $address[0]->State : '' }}">
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
                                                    placeholder="Zip4" value="{{ ($address[0]->Zip4) ? $address[0]->Zip4 : '' }}">
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
                                                    placeholder="zip5" value="{{ ($address[0]->Zip5) ? $address[0]->Zip5 : '' }}">
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

                <!-- Referral Source  Detail -->
                @if(isset($notificationPreferences[0]))
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
                                                    placeholder="Email" value="{{ ($notificationPreferences[0]->Email) ? $notificationPreferences[0]->Email : '' }}">
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
                                                    placeholder="Method Name" value="{{ ($notificationPreferences[0]->Method->Name) ? $notificationPreferences[0]->Method->Name : '' }}">
                                                </div>
                                            </div>
                                        </div>
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
                                                    placeholder="Mobile Or SMS" value="{{ ($patient->caregiverInfo) ? $patient->caregiverInfo->mobile_phone : '' }}">
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
                                                    placeholder="Voice Message" value="{{ ($notificationPreferences[0]->VoiceMessage) ? $notificationPreferences[0]->VoiceMessage : '' }}">
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
                                                        name="contact_name"
                                                        onclick="editableField('contact_name')"
                                                        data-id="contact_name" id="contact_name"
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
                                                        class="form-control-plaintext _detail phoneNumber" readonly
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
                                                        class="form-control-plaintext _detail phoneNumber" readonly
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
                                            @foreach(json_decode($patientEmergencyContact->relation, true) as $value)
                                                <div class="col-12 col-sm-3 col-md-3">
                                                    <div class="input_box">
                                                        <div class="ls">
                                                            <i class="las la-user-nurse circle"></i>
                                                        </div>
                                                        <div class="rs">
                                                            <h3 class="_title">Relationship Name</h3>
                                                            <input type="text"
                                                                class="form-control-plaintext _detail" readonly
                                                                name="relationship_name"
                                                                onclick="editableField('relationship_name')"
                                                                data-id="relationship_name" id="relationship_name"
                                                                placeholder="Relationship Name" value="{{ ($value['Name']) ? $value['Name'] : '' }}">
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
        </fom>
        </div>
    </div>
    <!-- Demographics End -->
</div>