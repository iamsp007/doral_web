@extends('pages.layouts.app')

@section('title','Welcome to Doral')

@section('pageTitleSection')
    Add Patient
@endsection

@section('content')
	<section class="app-body">
        <h2 class="text-center t4 mb-3 mt-3">Add Patient Details</h2>
        <div class="create-patient shadow p-4">
            <form method="post" action="{{ route('referral.store-patient') }}" id="msform" enctype="multipart/form-data">
				<!-- progressbar -->
				<ul id="progressbar">
					<li id="account" class="active" ><strong>Q1</strong></li>
					<li id="account"><strong>Q2</strong></li>
					<li id="account"><strong>Demographics</strong></li>
						</ul>
				<!-- fieldsets -->
				<fieldset>
					<div class="form-card">
						<div class="row">
							<div class="col-7">
								<h2 class="fs-title">Q1:</h2>
							</div>
							<div class="col-5">
								<h2 class="steps">Step 1 - 3</h2>
							</div>
						</div> 
					</div> 
					<input type="button" name="next" class="next cancel-btn float-right ml-2" value="Next" /> 
				</fieldset>
				<fieldset>
					<div class="form-card">
						<div class="row">
							<div class="col-7">
								<h2 class="fs-title">Q2:</h2>
							</div>
							<div class="col-5">
								<h2 class="steps">Step 2 - 3</h2>
							</div>
						</div> 
					</div> 
					<input type="button" name="next" class="next cancel-btn float-right ml-2" value="Next" />
					<input type="button" name="previous" class="previous continue-btn float-right" value="Previous" />
				</fieldset>
				
				<fieldset>
					<div class="form-card">
						<h2 class="steps">Step 3 - 3</h2>
						<div class=" row gutter">
							<!-- First Name -->
							<div class="col-12 col-sm-3 pl-0">
								<div class="form-group">
									<label for="first_name" class="label">First Name</label>
									<div class="input-group">
										<span class="input-group-text input-group-text-custom" id="firstname"><i
											class="las la-user-tie"></i></span>
										<input type="text" class="form-control form-control-lg" placeholder=""
										aria-label="first_name" aria-describedby="first_name" id="first_name" name="first_name"><br>
									</div>
									<span class="error_text first_name"></span>
								</div>
							</div>
							<!-- Middle Name -->
							<div class="col-12 col-sm-3">
								<div class="form-group">
									<label for="middle_name" class="label">Middle Name</label>
									<div class="input-group">
										<span class="input-group-text input-group-text-custom" id="middlename"><i
											class="las la-user-tie"></i></span>
										<input type="text" class="form-control form-control-lg" placeholder=""
										aria-label="middle_name" aria-describedby="middle_name" id="middle_name" name="middle_name">
									</div>
									<span class="error_text middle_name"></span>
								</div>
							</div>
								<!-- Last Name -->
							<div class="col-12 col-sm-3">
								<div class="form-group">
									<label for="last_name" class="label">Last Name</label>
									<div class="input-group">
										<span class="input-group-text input-group-text-custom" id="lastname"><i
											class="las la-user-tie"></i></span>
										<input type="text" class="form-control form-control-lg" placeholder=""
											aria-label="last_name" aria-describedby="last_name" id="last_name" name="last_name">
									</div>
									<span class="error_text last_name"></span>
								</div>
								</div>
								<!-- Gender -->
							<div class="col-12 col-sm-3 pr-0">
								<div class="form-group">
									<label for="Gender" class="label" style="margin-bottom: 20px;">Gender</label>
									<div class="input-group">
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" id="male"
												name="gender"
												class="custom-control-input">
											<label class="custom-control-label"
												for="male">Male</label>
										</div>
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" id="female"
												name="gender"
												class="custom-control-input">
											<label class="custom-control-label"
												for="female">Female</label>
										</div>
									</div>
									<br>
									<span class="error_text gender"></span>
									</div>
								</div>
							</div> 
							<hr class="mt-0">   
							<div class=" row gutter">
							<!-- Date Of Birth -->
							<div class="col-12 col-sm-3 pl-0">
								<div class="form-group">
									<label for="dob" class="label">Date Of Birth</label>
									<div class="input-group">
										<span class="input-group-text input-group-text-custom" id="dateofbirth">
											<i class="las la-calendar"></i>
										</span>
										<input type="text" class="form-control form-control-lg" id="dob" name="dob" aria-describedby="">
									</div>
									<span class="error_text dob"></span>
								</div>
								</div>
							<!-- SSN Number -->
							<div class="col-12 col-sm-3">
								<div class="form-group">
									<label for="ssn" class="label">SSN Number</label>
									<div class="input-group">
										<span class="input-group-text input-group-text-custom" id="ssn_no"><i
											class="las la-angle-double-right"></i></span>
										<input type="text" class="form-control form-control-lg" placeholder=""
										aria-label="ssn" aria-describedby="ssn" id="ssn" name="ssn">
									</div>
									<span class="error_text ssn"></span>
								</div>
							</div>
								<!-- Medicare Number -->
								<div class="col-12 col-sm-3">
								<div class="form-group">
									<label for="medicare_number" class="label">Medicare Number</label>
									<div class="input-group">
										<span class="input-group-text input-group-text-custom" id="medicare_no"><i
											class="las la-angle-double-right"></i></span>
										<input type="text" class="form-control form-control-lg" placeholder=""
											aria-label="medicare_number" aria-describedby="medicare_number" id="medicare_number" name="medicare_number">
									</div>
									<span class="error_text medicare_number"></span>
								</div>
								</div>
								<!-- Medicaid Number -->
								<div class="col-12 col-sm-3">
								<div class="form-group">
									<label for="medicaid_number" class="label">Medicaid Number</label>
									<div class="input-group">
										<span class="input-group-text input-group-text-custom" id="Medicaid_no"><i
											class="las la-angle-double-right"></i></span>
										<input type="text" class="form-control form-control-lg" placeholder=""
											aria-label="medicaid_number" aria-describedby="medicaid_number" id="medicaid_number" name="medicaid_number">
									</div>
									<span class="error_text medicaid_number"></span>
								</div>
								</div>
							</div> 
							<hr class="mt-0"> 
							<div class=" row gutter">
								<!-- Address -->
							<div class="col-12 col-sm-6">
								<div class="form-group">
									<label for="address_1" class="label">Address</label>
									<div class="input-group">
										<span class="input-group-text input-group-text-custom" id="address"><i
											class="las la-map-marker"></i></span>
										<input type="text" class="form-control form-control-lg" placeholder=""
										aria-label="address_1" aria-describedby="address_1" id="address_1" name="address_1">
									</div>
									<span class="error_text address_1"></span>
								</div>
							</div>
								<!-- State -->
								<div class="col-12 col-sm-3">
									<div class="form-group">
										<label for="state" class="label">State</label>
										<div class="input-group">
											<select name="state" id="state" class="form-control form-control-lg">
												<option value="">Select</option>
												@foreach ($states as $item)
													<option value="{{ $item->id }}">{{ $item->state }}</option>
												@endforeach
											</select>
										</div>
										<span class="error_text state_error"></span>
										</div>
								</div>
								<!-- city -->
								<div class="col-12 col-sm-3">
								<div class="form-group">
									<label for="city" class="label">City</label>
									<div class="input-group">
										<select name="city" id="city" class="form-control form-control-lg">
											<option value="">Select</option>
										</select>
									</div>
									<span class="error_text city_error"></span>
									</div>
								</div>
							</div>
							<div class=" row gutter">
								<!-- Zip Code -->
								<div class="col-12 col-sm-3">
									<div class="form-group">
										<label for="Zip" class="label">Zip Code</label>
										<div class="input-group">
											<span class="input-group-text input-group-text-custom" id="Zip_Code"><i
												class="las la-angle-double-right"></i></span>
											<input type="text" class="form-control form-control-lg" placeholder=""
											aria-label="Zip" aria-describedby="Zip" id="Zip" name="Zip">
										</div>
									<span class="error_text Zip"></span>
									</div>
								</div>
							</div>
					</div>
					<input type="button" name="previous" class="previous continue-btn float-right" value="Previous" />
					<button type="submit" name="submit" class="cancel-btn float-right">{{ __('Store') }}</button>
				</fieldset>
			</form>
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
        });
    </script>
@endpush
