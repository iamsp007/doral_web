@php
    $email_notify = $method_notify = $mobile_or_SMS_notify = $voice_message_notify = '';
    if(count($notificationPreferences) > 0 && ($patient->demographic && $patient->demographic->type === '2')):
        $email_notify =  $notificationPreferences['email'] ? $notificationPreferences['email'] : '';
        $method_notify = $notificationPreferences['method'] ? $notificationPreferences['method'] : '';
        $mobile_or_SMS_notify = $notificationPreferences['mobile_or_SMS'] ? $notificationPreferences['mobile_or_SMS'] : '';
        $voice_message_notify = $notificationPreferences['voice_message'] ? $notificationPreferences['voice_message'] : '';
    endif;
  
    $aptBuilding = $address1 = $address2 = $address_city = $address_state = $address_zip_code = '';
    if(count($address) > 0):
        $aptBuilding = '';
        $address1 =  $address['address1'] ? $address['address1'] : '';
        $address2 = $address['address2'] ? $address['address2'] : '';
        $address_city = $address['city'] ? $address['city'] : '';
        $address_state = $address['state'] ? $address['state'] : '';
        $address_zip_code = $address['zip_code'] ? $address['zip_code'] : '';
    endif;
@endphp

<div class="tab-pane fade show active" id="demographic" role="tabpanel" aria-labelledby="demographic">
    <div class="app-card app-card-custom" data-name="demographics">
        <div class="app-card-header">
            <h1 class="title">Demographics</h1>
            <img src="{{ asset('assets/img/icons/edit-field.svg') }}" data-toggle="tooltip" data-placement="bottom" title="Edit" class="cursor-pointer edit-icon" alt="" onclick="editAllField('demographic')">
            <img src="{{ asset('assets/img/icons/update-icon.svg') }}" style="display:none" data-toggle="tooltip" data-placement="bottom" title="Update" class="cursor-pointer update-icon" alt="" onclick="updateAllField('demographic')">
        </div>
        <div class="head">
            <form id="demographic_form">
                <div class="p-3">
                    <div class="form-group">
                        <div class="row">
                            <input type="hidden" name="user_id" value="{{ $patient->id }}">
                            <div class="col-12 col-sm-3 col-md-3">
                                <div class="input_box">
                                    <div class="ls"><i class="las la-user-tie circle"></i></div>
                                    <div class="rs">
                                        <h3 class="_title">First Name</h3>
                                        <input type="text" class="form-control-plaintext _detail" readonly name="first_name" data-id="first_name" id="first_name" placeholder="First Name" value="{{ ($patient->first_name) ? $patient->first_name : '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-3 col-md-3">
                                <div class="input_box">
                                    <div class="ls"><i class="las la-user-tie circle"></i></div>
                                    <div class="rs">
                                        <h3 class="_title">Last Name</h3>
                                        <input type="text" class="form-control-plaintext _detail" readonly name="last_name" data-id="last_name" id="last_name" placeholder="Last Name" value="{{ ($patient->last_name) ? $patient->last_name : '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-3 col-md-3">
                                <div class="input_box">
                                    <div class="ls"><i class="las la-envelope circle"></i></div>
                                    <div class="rs">
                                        <h3 class="_title">Email</h3>
                                        <input type="text" class="form-control-plaintext _detail" readonly name="email" data-id="email" placeholder="Email" value="{{ isset($patient->email) ? $patient->email : '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-3 col-md-3">
                                <div class="input_box">
                                    <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                                    <div class="rs">
                                        <h3 class="_title">Gender</h3>
                                        <div class="normal_gender_div">
                                            <input type="text" class="form-control-plaintext _detail" readonly name="gender" data-id="gender" placeholder="gender" value="{{ $patient->gender_data }}">
                                        </div>
                                        <div class="editable_gender_div">
                                            <select class="form-control" name="gender" data-id="gender">
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
                        <div class="col-12 col-sm-3 col-md-3">
                                <div class="input_box">
                                    <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                                    <div class="rs">
                                        <h3 class="_title">Date Of Birth</h3>
                                        <div>
                                            <input type="text" class="form-control-plaintext _detail "
                                                readonly name="dob"
                                                data-id="dob" id="dob"
                                                placeholder="DOB" value="{{ ($patient->dob) ? date('m-d-Y', strtotime($patient->dob)) : '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-3 col-md-3">
                                <div class="input_box">
                                    <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                                    <div class="rs">
                                        <h3 class="_title">SSN</h3>
                                        <input type="text" class="form-control-plaintext _detail ssn_format" readonly name="ssn" data-id="ssn" id="ssn" placeholder="SSN" value="{{ isset($patient->demographic) && isset($patient->demographic->ssn) ? getSsn($patient->demographic->ssn) : '' }}" maxlength="11">
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
                                        <input type="text" class="form-control-plaintext _detail" readonly name="country_of_birth" data-id="country_of_birth" id="country_of_birth" placeholder="Country Of Birth" value="{{ isset($patient->demographic) && isset($patient->demographic->country_of_birth) ? $patient->demographic->country_of_birth : '' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-3 col-md-3">
                                <div class="input_box">
                                    <div class="ls"><i class="las la-angle-double-right circle"></i></div>
                                    <div class="rs">
                                        <h3 class="_title">Ethnicity</h3>
                                        <input type="text" class="form-control-plaintext _detail" readonly name="ethnicity" data-id="ethnicity" id="ethnicity" placeholder="Ethnicity" value="{{ isset($patient->demographic) && isset($patient->demographic->ethnicity) ? $patient->demographic->ethnicity : '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-sm-3 col-md-3">
                                <div class="input_box">
                                    <div class="ls"><i class="las la-language circle"></i></div>
                                    <div class="rs">
                                        <h3 class="_title">Language</h3>
                                        <input type="text" class="form-control-plaintext _detail " readonly name="language" data-id="language" id="language" placeholder="Language" value="{{ isset($patient->demographic) && isset($patient->demographic->language) ? $patient->demographic->language : '' }}">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-3 col-md-3">
                                <div class="input_box">
                                    <div class="ls"><i class="las la-phone circle"></i></i></div>
                                    <div class="rs">
                                        <h3 class="_title">Home Phone</h3>
                                        <input type="text" class="form-control-plaintext _detail phoneNumber phone_format" readonly name="home_phone" data-id="home_phone" id="home_phone" placeholder="Home Phone" value="{{ ($patient->phone) ? $patient->phone : '' }}" maxlength="14">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-3 col-md-3">
                                <div class="input_box">
                                    <div class="ls">
                                        <i class="las la-ring circle"></i>
                                    </div>
                                    <div class="rs">
                                        <h3 class="_title">Marital Status</h3>
                                        <input type="text" class="form-control-plaintext _detail" readonly name="marital_status" data-id="marital_status" id="marital_status" placeholder="Marital Status" value="{{ isset($patient->demographic) && isset($patient->demographic->marital_status) ? $patient->demographic->marital_status : '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-3 col-md-3">
                                <div class="input_box">
                                    <div class="ls">
                                        <i class="lab la-servicestack circle"></i>
                                    </div>
                                    <div class="rs">
                                        <h3 class="_title">Notification</h3>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="email" name="notification[]" value="">
                                            <label class="custom-control-label t5" for="email">Email</label>
                                            <input type="checkbox" class="custom-control-input" id="sms" name="notification[]" value="">
                                            <label class="custom-control-label t5" for="sms">SMS</label>
                                            <input type="checkbox" class="custom-control-input" id="call" name="notification[]" value="">
                                            <label class="custom-control-label t5" for="call">Call</label>
                                       </div>
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
                                                <div class="ls"><i class="las la-address-book circle"></i></div>
                                                <div class="rs">
                                                    <h3 class="_title">Apt building</h3>
                                                    <input type="text" class="form-control-plaintext _detail" readonly name="apt_building" data-id="apt_building" id="apt_building" placeholder="apt_building" value="{{ $aptBuilding }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-3 col-md-3">
                                            <div class="input_box">
                                                <div class="ls"><i class="las la-address-book circle"></i></div>
                                                <div class="rs">
                                                    <h3 class="_title">Address1</h3>
                                                    <input type="text" class="form-control-plaintext _detail" readonly name="address1" data-id="address1" id="address1" placeholder="Address1" value="{{ $address1 }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-3 col-md-3">
                                            <div class="input_box">
                                                <div class="ls"><i class="las la-address-book circle"></i></div>
                                                <div class="rs">
                                                    <h3 class="_title">Address2</h3>
                                                    <input type="text" class="form-control-plaintext _detail " readonly name="address2" data-id="address2" id="address2" placeholder="Address2" value="{{ $address2 }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-3 col-md-3">
                                            <div class="input_box">
                                                <div class="ls"><i class="las la-city circle"></i></div>
                                                <div class="rs">
                                                    <h3 class="_title">City</h3>
                                                    <input type="text" class="form-control-plaintext _detail " readonly name="city" data-id="city" id="city" placeholder="City" value="{{ $address_city }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-sm-3 col-md-3">
                                            <div class="input_box">
                                                <div class="ls"><i class="las la-archway circle"></i></div>
                                                <div class="rs">
                                                    <h3 class="_title">State</h3>
                                                    <input type="text" class="form-control-plaintext _detail " readonly name="state" data-id="state" id="state" placeholder="State" value="{{ $address_state }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-3 col-md-3">
                                            <div class="input_box">
                                                <div class="ls"><i class="las la-code circle"></i></div>
                                                <div class="rs">
                                                    <h3 class="_title">Zipcode</h3>
                                                    <input type="text" class="form-control-plaintext _detail zip " readonly name="zip_code" data-id="zip_code" id="zip_code" placeholder="Zipcode" value="{{ $address_zip_code }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Address Detail -->

                    <!-- Emergency contact Detail -->
                    <div class="app-card app-card-custom no-minHeight mb-3 box-shadow-none"
                        data-name="emergency_contact_detail">
                        @if(count($patient->patientEmergency) > 0 )
                            @php
                            $i = 1;
                            @endphp
                            @foreach($patient->patientEmergency as $key => $patientEmergencyContact)
                            <div class="app-card-header">
                                <h1 class="title">Emergency Contact Detail {{$i++}}</h1>
                            </div>
                                <div class="main_div">
                                    <div class="p-3">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-12 col-sm-3 col-md-3">
                                                    <div class="input_box">
                                                        <div class="ls">
                                                            <i class="las la-portrait circle"></i>
                                                        </div>
                                                        <div class="rs">
                                                            <h3 class="_title">Name</h3>
                                                            <input type="text" class="form-control-plaintext _detail " readonly name="contact_name[]" data-id="contact_name" placeholder="Name" value="{{ $patientEmergencyContact->name }}">
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
                                                            <input type="text" class="form-control-plaintext _detail phoneNumber phone_format emergencyPhone1" readonly name="phone1[]" data-id="phone1" placeholder="Phone1" value="{{ $patientEmergencyContact->phone1 }}" maxlength="14">
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
                                                                <input type="text" class="form-control-plaintext _detail phoneNumber phone_format emergencyPhone1" readonly name="phone2[]" data-id="phone2" placeholder="Phone2" value="{{ $patientEmergencyContact->phone2 }}" maxlength="14">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-3 col-md-3">
                                                    <div class="input_box">
                                                        <div class="ls">
                                                            <i class="las la-address-book circle"></i>
                                                        </div>
                                                        <div class="rs">
                                                            <h3 class="_title">Address</h3>
                                                            <input type="text" class="form-control-plaintext _detail " readonly name="address[]" data-id="address" placeholder="Address" value="{{ $patientEmergencyContact->address_old }}">
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
                                                            <i class="las la-user-nurse circle"></i>
                                                        </div>
                                                        <div class="rs">
                                                            <h3 class="_title">Relationship</h3>
                                                            <input type="text" class="form-control-plaintext _detail" readonly name="relationship_name[]" data-id="relationship_name" placeholder="Relationship" value="{{ $patientEmergencyContact->relation }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="app-card-header">
                                <h1 class="title">Emergency Contact Detail 1</h1>
                            </div>
                            <div class="add_more_contact_div">
                                <div class="main_div">
                                    <div class="p-3">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-12 col-sm-3 col-md-3">
                                                    <div class="input_box">
                                                        <div class="ls"><i class="las la-portrait circle"></i></div>
                                                        <div class="rs">
                                                            <h3 class="_title">Name</h3>
                                                            <input type="text" class="form-control-plaintext _detail" name="contact_name[]" data-id="contact_name" id="contact_name" placeholder="Name" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-3 col-md-3">
                                                    <div class="input_box">
                                                        <div class="ls"><i class="las la-phone circle"></i></div>
                                                        <div class="rs">
                                                            <h3 class="_title">Home Phone</h3>
                                                            <input type="text" class="form-control-plaintext _detail phoneNumber emergencyPhone1 phone_format" name="phone1[]" data-id="phone1"  placeholder="Home Phone" value="" maxlength="14">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-3 col-md-3">
                                                    <div class="input_box">
                                                        <div class="ls"><i class="las la-phone circle"></i></div>
                                                        <div class="rs">
                                                            <h3 class="_title">Cell Phone</h3>
                                                            <input type="text" class="form-control-plaintext _detail phone_format phoneNumber emergencyPhone2" name="phone2[]" data-id="phone2"  placeholder="Cell Phone" value="" maxlength="14">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-3 col-md-3">
                                                    <div class="input_box">
                                                        <div class="ls"><i class="las la-address-book circle"></i></div>
                                                        <div class="rs">
                                                            <h3 class="_title">Address</h3>
                                                            <input type="text" class="form-control-plaintext _detail" name="address[]" data-id="address" id="address" placeholder="Address" value="">
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
                                                            <h3 class="_title">Relationship</h3>
                                                            <input type="text" class="form-control-plaintext _detail" name="relationship_name[]" data-id="relationship_name" id="relationship_name" placeholder="Relationship" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="display:flex;justify-content:center;align-items:center">
                                            <button type="button" class="btn btn-danger remove-tr text-center">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="add_more_contact_div"></div>
                    </div>
                 
                    <button type="button" name="add" id="add" class="btn btn-success">Add More Emergency Contact</button>
                    <!-- Emergency contact Detail -->
                </div>
            </form>
        </div>
    </div>
    <!-- Demographics End -->
</div>
