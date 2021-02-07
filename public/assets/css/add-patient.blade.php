@extends('pages.layouts.app')

@section('title','Welcome to Doral')

@section('pageTitleSection')
    Add Patient
@endsection

@section('content')
	<section>
        <h2 class="text-center t4 mb-3 mt-3">Add Patient Details</h2>
        <div class="p-4">
		<div class="row">
                        <div class="col-12 col-sm-3"></div>
                        <div class="col-12 col-sm-6">
                            <form id="msform">
                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li class="active" id="account"><strong>Questions 1</strong></li>
                                    <li id="personal"><strong>Questions 2</strong></li>
                                    <li id="finish"><strong>Questions 3</strong></li>
                                    <li id="last"><strong>Questions 4</strong></li>
                                </ul>
                                <!-- fieldsets -->
                                <fieldset class="form-card pb-4">
                                    <div class="pl-4 pr-4 pb-4 pt-4">
                                        <h2 class="fs-title">Please Select Patient Enrollment Status</h2>
                                        <div class="d-flex justify-content-center align-items-center mt-4">
                                            <div class="custom-control custom-radio mr-3">
                                                <input type="radio" id="customRadio1" name="customRadio"
                                                    value="boarding" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio1">On Boarding
                                                    Patient</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio2" name="customRadio"
                                                    value="existing_patient" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio2">Existing
                                                    Patient</label>
                                            </div>
                                        </div>
                                        <div class="app-card no-shadow no-minHeight mt-3 existing_patient">
                                            <div class="pl-4 pr-4 pb-4 pt-4">
                                                <p class="text-center">Kindly provide MD Order</p>
                                                <div class="row mt-3">
                                                    <div class="col-12 col-sm-3"></div>
                                                    <div class="col-12 col-sm-6">
                                                        <label for="username" class="label">Creation Date</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text input-group-text-custom"
                                                                id="firstname"><i class="las la-calendar"></i></span>
                                                            <input type="text"
                                                                class="form-control form-control-lg creation_date"
                                                                placeholder="" aria-label="creation_date"
                                                                aria-describedby="creation_date" id="creation_date"
                                                                name="creation_date"><br>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-3"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="next" class="next cancel-btn m-auto"
                                        style="margin-bottom: 15px;display: block;" value="Next" />
                                </fieldset>
                                <fieldset class="form-card pb-4">
                                    <div class="pl-4 pr-4 pb-4 pt-4">
                                        <h2 class="fs-title">Please select type of services</h2>
                                        <div class="d-flex justify-content-center align-items-center mt-4">
                                            <div class="custom-control custom-radio mr-3">
                                                <input type="radio" id="customRadio11" name="customRadio01"
                                                    value="cdpap" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio11">CDPAP</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio22" name="customRadio01"
                                                    value="lhcsa" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio22">LHCSA</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="if-CDPAP mb-4">
                                        <div class="app-card no-shadow mb-3">
                                            <div class="pl-4 pr-4 pb-4 pt-4">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-4">
                                                            <label for="first_names" class="label">First Name</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text input-group-text-custom"
                                                                    id="firstnames"><i
                                                                        class="las la-user-tie"></i></span>
                                                                <input type="text" class="form-control form-control-lg"
                                                                    placeholder="" aria-label="first_names"
                                                                    aria-describedby="first_names" id="first_names"
                                                                    name="first_names"><br>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-4">
                                                            <label for="middle_names" class="label">Middle Name</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text input-group-text-custom"
                                                                    id="middlenames"><i
                                                                        class="las la-user-tie"></i></span>
                                                                <input type="text" class="form-control form-control-lg"
                                                                    placeholder="" aria-label="middle_names"
                                                                    aria-describedby="middle_names" id="middle_names"
                                                                    name="middle_names">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-4">
                                                            <label for="last_names" class="label">Last Name</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text input-group-text-custom"
                                                                    id="lastnames"><i
                                                                        class="las la-user-tie"></i></span>
                                                                <input type="text" class="form-control form-control-lg"
                                                                    placeholder="" aria-label="last_names"
                                                                    aria-describedby="last_names" id="last_names"
                                                                    name="last_names">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-4">
                                                            <label for="Gender" class="label">Gender</label>
                                                            <div class="input-group">
                                                                <div
                                                                    class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" id="males" name="gender1"
                                                                        value="1" class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="males">Male</label>
                                                                </div>
                                                                <div
                                                                    class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" id="females" name="gender1"
                                                                        value="2" class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="females">Female</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-4">
                                                            <label for="dob" class="label">Phone</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text input-group-text-custom"
                                                                    id="phoneno">
                                                                    <i class="las la-phone"></i>
                                                                </span>
                                                                <input type="text" class="form-control form-control-lg"
                                                                    id="phone" name="phone" aria-describedby="">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-4">
                                                            <label for="ssn" class="label">Email</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text input-group-text-custom"
                                                                    id="email_no"><i class="las la-envelope"></i></span>
                                                                <input type="email" class="form-control form-control-lg"
                                                                    placeholder="" aria-label="email"
                                                                    aria-describedby="email" id="email" name="email">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="app-card no-shadow mb-3">
                                            <div class="pl-4 pr-4 pb-4 pt-4">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-4">
                                                            <label for="first_namess" class="label">First Name</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text input-group-text-custom"
                                                                    id="firstnames"><i
                                                                        class="las la-user-tie"></i></span>
                                                                <input type="text" class="form-control form-control-lg"
                                                                    placeholder="" aria-label="first_namess"
                                                                    aria-describedby="first_namess" id="first_namess"
                                                                    name="first_namess"><br>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-4">
                                                            <label for="middle_namess" class="label">Middle Name</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text input-group-text-custom"
                                                                    id="middle_namess"><i
                                                                        class="las la-user-tie"></i></span>
                                                                <input type="text" class="form-control form-control-lg"
                                                                    placeholder="" aria-label="middle_namess"
                                                                    aria-describedby="middle_names" id="middle_namess"
                                                                    name="middle_namess">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-4">
                                                            <label for="last_namess" class="label">Last Name</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text input-group-text-custom"
                                                                    id="lastnamess"><i
                                                                        class="las la-user-tie"></i></span>
                                                                <input type="text" class="form-control form-control-lg"
                                                                    placeholder="" aria-label="last_namess"
                                                                    aria-describedby="last_namess" id="last_namess"
                                                                    name="last_namess">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-4">
                                                            <label for="Gender" class="label">Gender</label>
                                                            <div class="input-group">
                                                                <div
                                                                    class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" id="males" name="gender11"
                                                                        value="1" class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="maless">Male</label>
                                                                </div>
                                                                <div
                                                                    class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" id="femaless" name="gender11"
                                                                        value="2" class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="females">Female</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-4">
                                                            <label for="dob" class="label">Phone</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text input-group-text-custom"
                                                                    id="phonenos">
                                                                    <i class="las la-phone"></i>
                                                                </span>
                                                                <input type="text" class="form-control form-control-lg"
                                                                    id="phones" name="phones" aria-describedby="">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-4">
                                                            <label for="ssn" class="label">Email</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text input-group-text-custom"
                                                                    id="email_nos"><i
                                                                        class="las la-envelope"></i></span>
                                                                <input type="email" class="form-control form-control-lg"
                                                                    placeholder="" aria-label="emails"
                                                                    aria-describedby="emails" id="emails" name="emails">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <a href="javascript:void(0)" class="d-flex justify-content-end"><i class="las la-plus-circle la-2x"></i></a> -->
                                    </div>
                                    <input type="button" name="next" class="next cancel-btn float-right mr-4"
                                        value="Next" />
                                    <input type="button" name="previous" class="previous continue-btn float-left ml-4"
                                        value="Previous" />
                                </fieldset>
                                <fieldset class="form-card pb-4">
                                    <div class="pl-4 pr-4 pb-4 pt-4">
                                        <h2 class="fs-title">Select Insurance Type</h2>
                                        <div class="d-flex justify-content-center align-items-center mt-4">
                                            <div class="custom-control custom-radio mr-3">
                                                <input type="radio" id="customRadio111" name="customRadio02" value="hmo"
                                                    class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio111">HMO</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio222" name="customRadio02"
                                                    value="mltc" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio222">MLTC</label>
                                            </div>
                                        </div>
                                        <div class="app-card no-shadow no-minHeight mt-3 on_hmo">
                                            <div class="pl-4 pr-4 pb-4 pt-4">
                                                <p>Want to patient change from HMO to MLTC?</p>
                                                <div class="d-flex mt-3">
                                                    <div class="custom-control custom-radio mr-3">
                                                        <input type="radio" id="yes" name="yes" value=""
                                                            class="custom-control-input">
                                                        <label class="custom-control-label" for="yes">Yes</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="no" name="no" value=""
                                                            class="custom-control-input">
                                                        <label class="custom-control-label" for="no">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="previous"
                                        class="previous action-button continue-btn float-left ml-4" value="Previous" />
                                    <input type="button" name="next" class="next cancel-btn float-right mr-4"
                                        value="Next" />
                                </fieldset>
                                <fieldset class="form-card pb-4">
                                    <div class="pl-4 pr-4 pb-4 pt-4">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-12 col-sm-4">
                                                    <label for="username" class="label">First Name</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text input-group-text-custom"
                                                            id="firstname"><i class="las la-user-tie"></i></span>
                                                        <input type="text" class="form-control form-control-lg"
                                                            placeholder="" aria-label="first_name"
                                                            aria-describedby="first_name" id="first_name"
                                                            name="first_name"><br>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                    <label for="middle_name" class="label">Middle Name</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text input-group-text-custom"
                                                            id="middlename"><i class="las la-user-tie"></i></span>
                                                        <input type="text" class="form-control form-control-lg"
                                                            placeholder="" aria-label="middle_name"
                                                            aria-describedby="middle_name" id="middle_name"
                                                            name="middle_name">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                    <label for="last_name" class="label">Last Name</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text input-group-text-custom"
                                                            id="lastname"><i class="las la-user-tie"></i></span>
                                                        <input type="text" class="form-control form-control-lg"
                                                            placeholder="" aria-label="last_name"
                                                            aria-describedby="last_name" id="last_name"
                                                            name="last_name">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-12 col-sm-4">
                                                    <label for="Gender" class="label">Gender</label>
                                                    <div class="input-group">
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="male" name="gender" value="1"
                                                                class="custom-control-input">
                                                            <label class="custom-control-label" for="male">Male</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="female" name="gender" value="2"
                                                                class="custom-control-input">
                                                            <label class="custom-control-label"
                                                                for="female">Female</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                    <label for="dob" class="label">Date Of Birth</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text input-group-text-custom"
                                                            id="dateofbirth">
                                                            <i class="las la-calendar"></i>
                                                        </span>
                                                        <input type="text" class="form-control form-control-lg" id="dob"
                                                            name="dob" aria-describedby="">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                    <label for="ssn" class="label">SSN Number</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text input-group-text-custom"
                                                            id="ssn_no"><i class="las la-angle-double-right"></i></span>
                                                        <input type="text" class="form-control form-control-lg"
                                                            placeholder="" aria-label="ssn" aria-describedby="ssn"
                                                            id="ssn" name="ssn">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-12 col-sm-4">
                                                    <label for="medicare_number" class="label">Medicare Number</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text input-group-text-custom"
                                                            id="medicare_no"><i
                                                                class="las la-angle-double-right"></i></span>
                                                        <input type="text" class="form-control form-control-lg"
                                                            placeholder="" aria-label="medicare_number"
                                                            aria-describedby="medicare_number" id="medicare_number"
                                                            name="medicare_number">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                    <label for="medicaid_number" class="label">Medicaid Number</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text input-group-text-custom"
                                                            id="Medicaid_no"><i
                                                                class="las la-angle-double-right"></i></span>
                                                        <input type="text" class="form-control form-control-lg"
                                                            placeholder="" aria-label="medicaid_number"
                                                            aria-describedby="medicaid_number" id="medicaid_number"
                                                            name="medicaid_number">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-4"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="address_1" class="label">Address</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text input-group-text-custom"
                                                            id="address"><i class="las la-map-marker"></i></span>
                                                        <input type="text" class="form-control form-control-lg"
                                                            placeholder="" aria-label="address_1"
                                                            aria-describedby="address_1" id="address_1"
                                                            name="address_1">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="row">
                                                <div class="col-12 col-sm-4">
                                                    <label for="state" class="label">State</label>
                                                    <div class="input-group">
                                                        <select name="state" id="state"
                                                            class="form-control form-control-lg">
                                                            <option value="">Select</option>
                                                            @foreach ($states as $item)
                                                            <option value="{{ $item->id }}">{{ $item->state }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                    <label for="city" class="label">City</label>
                                                    <div class="input-group">
                                                        <select name="city" id="city"
                                                            class="form-control form-control-lg">
                                                            <option value="">Select</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                    <label for="Zip" class="label">Zip Code</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text input-group-text-custom"
                                                            id="Zip_Code"><i
                                                                class="las la-angle-double-right"></i></span>
                                                        <input type="text" class="form-control form-control-lg"
                                                            placeholder="" aria-label="Zip" aria-describedby="Zip"
                                                            id="Zip" name="Zip">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="previous" class="previous continue-btn float-left ml-4"
                                        value="Previous" />
                                    <input type="submit" name="submit" class="submit float-right mr-4 cancel-btn"
                                        value="Submit" />
                                </fieldset>
                            </form>
                        </div>
                        <div class="col-12 col-sm-3"></div>
                    </div>
        </div>
       	</section>
</section>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/tail.select-default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/add-patient.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/js/daterangepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/add-patient.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/additional-methods.js') }}"></script>
    <script>
        $(function () {
            $('input[name="dob"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            }, function (start, end, label) {
                var years = moment().diff(start, 'years');
                alert("You are " + years + " years old!");
			});
			$('select, input').change(function(){
				if ($(this).val() != "") {
					if ($(this).attr("name") == 'state') {
						$('span.state_error').text('');
					} else if ($(this).attr("name") == 'city') {
						$('span.city_error').text('');
					} else {
						$('span.'+$(this)[0]['name']).text('');
					}
				}
			});
			$("#msform").validate({
				rules: {
					first_name: "required",
					middle_name: "required",
					last_name: "required",
					gender: "required",
					dob: "required",
					ssn: "required",
					medicare_number: "required",
					medicaid_number: "required",
					address_1: "required",
					city: "required",
					state: "required",
					Zip: "required",
				},
				messages: {},
				errorPlacement: function(error, element) {
					if (element.attr("name") == "city") {
						$(".city_error").text(error[0]['innerText']).css('color', 'red');
					} else if (element.attr("name") == "state") {
						$(".state_error").text(error[0]['innerText']).css('color', 'red');
					} else {
						$("."+element.attr("name")).text(error[0]['innerText']).css('color', 'red');
					}
				},
				submitHandler: function(form) {
					form.submit();
				}
			});
			$('#state').change( function() {
				var val = $(this).val();
				$.ajax({
					url: "{{ route('referral.filter-cities') }}",
					dataType: 'html',
					data: { state : val },
					success: function(response) {
						var obj = jQuery.parseJSON(response);
						var city_options = [];
						$.each(obj, function(key,value) {
							var newOption = '<option value="' + value.id + '">' + value.city + '</option>';
         					city_options.push(newOption);
						});
						$('#city').html( city_options );
					}
				});
			});
			$('.on_hmo').hide()
            $('.existing_patient').hide()
            $('[name="customRadio"]').on('change', function (e) {
                e.preventDefault();
                if ($(this).val() == 'boarding') {
                    // alert('boarding')
                    $('.existing_patient').hide()
                }
                if ($(this).val() == 'existing_patient') {
                    // alert('boarding')
                    $('.existing_patient').show()
                }
            })
            $('[name="customRadio02"]').on('change', function (e) {
                e.preventDefault();
                if ($(this).val() == 'hmo') {
                    $('.on_hmo').show()
                }
                if ($(this).val() == 'mltc') {
                    $('.on_hmo').hide()
                }
            })
            $('.if-CDPAP').hide()
            $('[name="customRadio01"]').on('change', function (e) {
                e.preventDefault();
                if ($(this).val() == 'cdpap') {
                    $('.if-CDPAP').show()
                }
                if ($(this).val() == 'lhcsa') {
                    $('.if-CDPAP').hide()
                }
            })
            $('input[name="creation_date"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            }, function (start, end, label) {
                var years = moment().diff(start, 'years');
                alert("You are " + years + " years old!");
            });
        });
    </script>
@endpush
