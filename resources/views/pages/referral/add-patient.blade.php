@extends('pages.layouts.app')

@section('title','Add Patient')

@section('pageTitleSection')
Add Patient
@endsection

@section('content')
<div class="container-fluid">
    <main role="main" class="pb-3">
        <ul class="nav nav-tabs c-cep--tabsWrapper">
            <li class="nav-item">
                <a style="color: #006C76;" href="#Demographics" class="nav-link active" data-toggle="tab" data-ajax="true" id="tabDemographics">Demographics</a>
            </li>
            <li class="nav-item">
                <a style="color: #006C76;" href="#ReferenceAndContact" class="nav-link" data-toggle="tab" data-ajax="true" id="tabReferenceAndContact">Contacts & References</a>
            </li>
            <li class="nav-item">
                <a style="color: #006C76;" href="#Education" class="nav-link" data-toggle="tab" data-ajax="true" id="tabEducation">Clinical Information</a>
            </li>
<!--            <li class="nav-item">
                <a href="#PreviousEmployeeDetails" class="nav-link" data-toggle="tab" data-ajax="true" id="tabPreviousEmployeeDetails">Previous Employee Details</a>
            </li>
            <li class="nav-item">
                <a href="#CriminalHistory" class="nav-link" data-toggle="tab" data-ajax="true" id="tabCriminalHistory">Criminal History</a>
            </li>
            <li class="nav-item">
                <a href="#WithHoldingInformation" class="nav-link" data-toggle="tab" data-ajax="true" id="tabWithHoldingInformation">Withholding Information</a>
            </li>

            <li class="nav-item">
                <a href="#Disclosure" class="nav-link" data-toggle="tab" data-ajax="true" id="tabDisclosure">Disclosure</a>
            </li>
            <li class="nav-item">
                <a href="#DocumentUpload" class="nav-link" data-toggle="tab" data-ajax="true" id="tabDocumentUpload">Document Upload</a>
            </li>-->
        </ul>

        <div class="tab-content position-relative">
            <div class="tab-pane mt-3 show active" id="Demographics">
                <form id="addPersonalInfo" data-ajax="true" data-ajax-method="POST" data-ajax-failure="failed" data-ajax-success="completed" action="/NonSkilled/PersonalInformation" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
<!--                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="PreAssignedPatient">Pre-Assigned HOME Patient</label>
                                            <input type="text" class="form-control" placeholder="Enter Patient Name" id="PreAssignedPatient" name="PreAssignedPatient" value="">
                                        </div>
                                    </div>-->
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="b-a-1 rounded p-4">
                                                <p><strong>Personal Information</strong></p>
                                                <div class="row">
                                                    <div class="form-group col-md-3 col-sm-6">
                                                        <label for="Title">Title</label>
                                                        <select id="inputTitle" class="form-control" autoComplete="off" name="Title">
                                                            <option value="" disabled selected>Select title</option>
                                                            <option>Mr</option>
                                                            <option>Mrs</option>
                                                            <option>Miss</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3 col-sm-6">
                                                        <label for="FirstName">First Name</label><span class="text-danger"> *</span>
                                                        <input type="text" class="form-control" placeholder="Enter First Name" autoComplete="off" data-val="true" data-val-required="First Name is required" id="FirstName" name="FirstName" value="">
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="FirstName" data-valmsg-replace="true"></span>
                                                    </div>
                                                    <div class="form-group col-md-3 col-sm-6">
                                                        <label for="MiddleName">Middle Name</label>
                                                        <input type="text" class="form-control" placeholder="Enter Middle Name" autoComplete="off" id="MiddleName" name="MiddleName" value="">
                                                    </div>
                                                    <div class="form-group col-md-3 col-sm-6">
                                                        <label for="LastName">Last Name</label><span class="text-danger"> *</span>
                                                        <input type="text" class="form-control" placeholder="Enter Last Name" autoComplete="off" data-val="true" data-val-required="Last Name is required" id="LastName" name="LastName" value="">
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="LastName" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-4 col-sm-6">
                                                        <label for="EmailId">Email</label>
                                                        <input type="email" class="form-control" placeholder="Enter Email" autoComplete="off" data-val="true" data-val-email="Invalid email address." id="EmailId" name="EmailId" value="">
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="EmailId" data-valmsg-replace="true"></span>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-6">
                                                        <label for="DateofBirth">Date of Birth</label><span class="text-danger"> *</span>
                                                        <input type="date" class="form-control" placeholder="Enter Date of Birth" autoComplete="off" data-val="true" data-val-required="Date of Birth is required" id="DateofBirth" name="DateofBirth" value="">
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="DateofBirth" data-valmsg-replace="true"></span>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-6">
                                                        <label for="inputGender">Gender</label>
                                                        <select id="inputGender" class="form-control" name="Gender">
                                                            <option value="" disabled selected>Select Gender</option>
                                                            <option>Male</option>
                                                            <option>Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-4 col-sm-6">
                                                        <label for="inputStaus">Marital Status</label>
                                                        <select id="inputStaus" class="form-control" name="MeritialStatus">
                                                            <option value="" disabled selected>Select Marital status</option>
                                                            <option>Single </option>
                                                            <option>Married</option>
                                                            <option>Widowed</option>
                                                            <option>Separated</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-6">
                                                        <label for="inputStaus">Race</label>
                                                        <select id="inputStaus" class="form-control" name="MeritialStatus">
                                                            <option value="" disabled selected>Select Race</option>
                                                            <option>American Indian or Alaska Native</option>
                                                            <option>Asian</option>
                                                            <option>Black or African American</option>
                                                            <option>Native Hawaiian or Other Pacific Islander</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-6">
                                                        <label for="inputStaus">Ethnicity</label>
                                                        <select id="inputStaus" class="form-control" name="MeritialStatus">
                                                            <option value="" disabled selected>Select Ethnicity</option>
                                                            <option>Hispanic or Latino</option>
                                                            <option>Not Hispanic or Latino</option>
                                                        </select>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-4 col-sm-6">
                                                        <label for="HomePhone">Phone (H)</label><span class="text-danger"> *</span>
                                                        <input type="tel" class="form-control" placeholder="Enter Phone(h)" autoComplete="off" data-val="true" data-val-phone="The Phone (H) field is not a valid phone number." data-val-required="Home Phone is required" id="HomePhone" name="HomePhone" value="">
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="HomePhone" data-valmsg-replace="true"></span>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-6">
                                                        <label for="MobilePhone">Phone (C)</label><span class="text-danger"> *</span>
                                                        <input type="tel" class="form-control" placeholder="Enter Phone(C)" autoComplete="off" data-val="true" data-val-phone="The Phone (C) field is not a valid phone number." data-val-required="Cell Phone is required" id="MobilePhone" name="MobilePhone" value="">
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="MobilePhone" data-valmsg-replace="true"></span>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-6">
                                                        <label for="OtherContctNumber">Other (contact)</label>
                                                        <input type="tel" class="form-control" placeholder="Enter Other(contact Number)" autoComplete="off" data-val="true" data-val-phone="The Other (contact) field is not a valid phone number." id="OtherContctNumber" name="OtherContctNumber" value="">
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="OtherContctNumber" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-4 col-sm-6">
                                                        <label for="SSN">SSN (e.g. xxx-xx-xxxx)</label>
                                                        <input type="number" min="0" class="form-control" placeholder="xxx-xx-xxxx" autocomplete="off" data-val="true" data-val-range="Enter valid SSN" data-val-range-max="999999999" data-val-range-min="1" data-val-required="The SSN field is required." id="SSN" name="SSN" value="" />
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="SSN" data-valmsg-replace="true"></span>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-6">
                                                        <label for="DateofBirth">Service Request Start Date</label><span class="text-danger"></span>
                                                        <input type="date" class="form-control" placeholder="Enter Date of Birth" autoComplete="off" data-val="true" data-val-required="Date of Birth is required" id="DateofBirth" name="DateofBirth" value="">
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="DateofBirth" data-valmsg-replace="true"></span>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-6">
                                                        <label for="inputStaus">Source Of Admission</label>
                                                        <select id="inputStaus" class="form-control" name="MeritialStatus">
                                                            <option value="" disabled selected>Select</option>
                                                            <option>VBC</option>
                                                            <option>MD Order</option>
                                                            <option>Occupational Health</option>
                                                            <option>Telehealth</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-4 col-sm-6">
                                                        <label for="ReferredBy">Medicaid Number (e.g.XX99999X)</label>
                                                        <input type="text" class="form-control" placeholder="XX99999X" autocomplete="off" id="ReferredBy" name="ReferredBy" value="" />
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="ReferredBy" data-valmsg-replace="true"></span>
                                                    </div>

                                                    <div class="form-group col-md-4 col-sm-6">
                                                        <label for="MaidenMotherName">Medicare Number</label>
                                                        <input type="text" class="form-control" placeholder="" autocomplete="off" id="MaidenMotherName" name="MaidenMotherName" value="" />
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="MaidenMotherName" data-valmsg-replace="true"></span>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-6">
                                                        <label for="Alias">HI Claim Number</label>
                                                        <input type="text" class="form-control" placeholder="" autocomplete="off" id="Alias" name="Alias" value="" />
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="Alias" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>

<!--                                                <div class="row">
                                                    <div class="form-group col-md-4 col-sm-6">
                                                        <label class="control-label" for="DateAvailable">Date Available</label>
                                                        <input type="date" class="form-control" id="DateAvailable" name="DateAvailable" value="" />
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="DateAvailable" data-valmsg-replace="true"></span>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-6">
                                                        <label class="control-label" for="ImmigrationID">Immigration ID</label>
                                                        <input type="text" class="form-control" id="ImmigrationID" name="ImmigrationID" value="" />
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="ImmigrationID" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
-->                                                <div class="row col-sm-6 row">
                                                    <p class="mt-3 mr-3">Have you ever used maiden name?</p>
                                                    <div class="mt-3">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="maiden" id="maidenYes"> Yes
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="maiden" id="maidenFalse"> No
                                                        </label>
                                                    </div>
                                                </div><!--
                                                <div class="row" id="maidenInfo" style="display:none">
                                                    <div class="form-group col-md-6 col-sm-6">
                                                        <label for="MaidenName">Maiden Name</label><span class="text-danger"> *</span>
                                                        <input type="text" class="form-control" placeholder="Enter Maiden Name" autoComplete="off" id="MaidenName" name="MaidenName" value="">
                                                    </div>
                                                    <div class="form-group col-md-5 col-sm-6 ">
                                                        <label for="YearLastUsed">Year Last Used</label>
                                                        <input formControlName="yearLastUsed" type="month" class="form-control" placeholder="Enter Year last used" autoComplete="off" id="RefusedBond" name="RefusedBond" value="">
                                                    </div>
                                                </div>-->
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="b-a-1 rounded p-4 mt-4 mt-md-0">
                                                <p><strong>Address</strong></p>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Address Line 1</label><span class="text-danger"> *</span>
                                                        <input type="text" class="form-control" placeholder="Enter Address" autoComplete="off" data-val="true" data-val-required="Address is required" id="AddressEntity_Street1" name="AddressEntity.Street1" value="">
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="AddressEntity.Street1" data-valmsg-replace="true"></span>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Address Line 2</label><span class="text-danger"> *</span>
                                                        <input type="text" class="form-control" placeholder="Enter Address" autoComplete="off" data-val="true" data-val-required="Address is required" id="AddressEntity_Street1" name="AddressEntity.Street1" value="">
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="AddressEntity.Street1" data-valmsg-replace="true"></span>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="APT">APT#Building<span class="text-danger"> *</span></label>
                                                        <input type="text" class="form-control" placeholder="Enter APT#" autoComplete="off" id="APT" name="APT" value="">
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-6">
                                                        <label for="inputState">State</label><span class="text-danger"> *</span>
                                                        <select class="form-control" data-val="true" data-val-required="State is required" id="AddressEntity_State" name="AddressEntity.State">
                                                            <option value="" disabled selected>Select State</option>
                                                            <option>Alabama </option>
                                                            <option> Alaska</option>
                                                            <option>California</option>
                                                            <option>Connecticut</option>
                                                            <option>Delaware</option>
                                                            <option>Florida</option>
                                                            <option>Georgia</option>
                                                            <option>Idaho</option>
                                                        </select>
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="AddressEntity.State" data-valmsg-replace="true"></span>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-6">
                                                        <label for="inputState">City</label><span class="text-danger"> *</span>
                                                        <select class="form-control" data-val="true" data-val-required="State is required" id="AddressEntity_State" name="AddressEntity.State">
                                                            <option value="" disabled selected>Select City</option>
                                                            <option>Alabama </option>
                                                            <option> Alaska</option>
                                                            <option>California</option>
                                                            <option>Connecticut</option>
                                                            <option>Delaware</option>
                                                            <option>Florida</option>
                                                            <option>Georgia</option>
                                                            <option>Idaho</option>
                                                        </select>
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="AddressEntity.State" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6 col-sm-6">
                                                        <label for="AddressEntity_Zipcode">Zip</label><span class="text-danger"> *</span>
                                                        <input type="text" class="form-control" placeholder="Enter Zip" autoComplete="off" id="AddressEntity_Zipcode" name="AddressEntity.Zipcode" value="">
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="AddressEntity.Zipcode" data-valmsg-replace="true"></span>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="AddressEntity_POBox">P.O.Box</label>
                                                        <input type="text" class="form-control" placeholder="Enter P.O. Box" autoComplete="off" id="AddressEntity_POBox" name="AddressEntity.POBox" value="">
                                                    </div>
                                                </div>
<!--                                                <div class="row">
                                                    <div class="col-md-12 col-sm-6 d-flex">
                                                        <p class="mt-2">Are you allergic to:</p>
                                                        <div class="form-check form-check-inline ml-3">
                                                            <input class="form-check-input" type="checkbox" data-val="true" data-val-required="The Cats field is required." id="AreCatsOk" name="AreCatsOk" value="true" />
                                                            <label class="form-check-label" for="AreCatsOk">Cat</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" data-val="true" data-val-required="The Dogs field is required." id="AreDogsOk" name="AreDogsOk" value="true" />
                                                            <label class="form-check-label" for="AreDogsOk">Dog</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" data-val="true" data-val-required="The Smoking field is required." id="AreSmokingOk" name="AreSmokingOk" value="true" />
                                                            <label class="form-check-label" for="AreSmokingOk">Smoking</label>
                                                        </div>
                                                    </div>
                                                </div>-->
                                            </div>

                                        </div>
                                    </div>

<!--                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="b-a-1 rounded mt-4 p-4">
                                                <p><strong>Work Availability</strong></p>
                                                <table class="table table-responsive">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th class="text-center">Sunday</th>
                                                            <th class="text-center">Monday</th>
                                                            <th class="text-center">Tuesday</th>
                                                            <th class="text-center">Wednesday</th>
                                                            <th class="text-center">Thursday</th>
                                                            <th class="text-center">Friday</th>
                                                            <th class="text-center">Saturday</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td></td>
                                                            <td class="text-center">
                                                                <div class="form-check form-check-inline ml-3">
                                                                    <input class="form-check-input" type="checkbox" data-val="true" data-val-required="The Sunday field is required." id="WorkAvailabilityEntity_IsSunday" name="WorkAvailabilityEntity.IsSunday" value="true" />
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="form-check form-check-inline ml-3">
                                                                    <input class="form-check-input" type="checkbox" data-val="true" data-val-required="The Monday field is required." id="WorkAvailabilityEntity_IsMonday" name="WorkAvailabilityEntity.IsMonday" value="true" />
                                                                </div>
                                                            </td>
                                                            <td class="text-center"><input class="form-check-input" type="checkbox" data-val="true" data-val-required="The Tuesday field is required." id="WorkAvailabilityEntity_IsTuesday" name="WorkAvailabilityEntity.IsTuesday" value="true" /></td>
                                                            <td class="text-center"><input class="form-check-input" type="checkbox" data-val="true" data-val-required="The Wednesday field is required." id="WorkAvailabilityEntity_IsWednesday" name="WorkAvailabilityEntity.IsWednesday" value="true" /></td>
                                                            <td class="text-center"><input class="form-check-input" type="checkbox" data-val="true" data-val-required="The Thursday field is required." id="WorkAvailabilityEntity_IsThursday" name="WorkAvailabilityEntity.IsThursday" value="true" /></td>
                                                            <td class="text-center"><input class="form-check-input" type="checkbox" data-val="true" data-val-required="The Friday field is required." id="WorkAvailabilityEntity_IsFriday" name="WorkAvailabilityEntity.IsFriday" value="true" /></td>
                                                            <td class="text-center"><input class="form-check-input" type="checkbox" data-val="true" data-val-required="The Saturday field is required." id="WorkAvailabilityEntity_IsSaturday" name="WorkAvailabilityEntity.IsSaturday" value="true" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <strong>From</strong>
                                                            </td>
                                                            <td>
                                                                <input type="text" placeholder="hh:mm" class="form-control" autoComplete="off" id="WorkAvailabilityEntity_FromSunday" name="WorkAvailabilityEntity.FromSunday" value="" />
                                                            </td>
                                                            <td>
                                                                <input type="text" placeholder="hh:mm" class="form-control" autoComplete="off" id="WorkAvailabilityEntity_FromMonday" name="WorkAvailabilityEntity.FromMonday" value="" />
                                                            </td>
                                                            <td>
                                                                <input type="text" placeholder="hh:mm" class="form-control" autoComplete="off" id="WorkAvailabilityEntity_FromTuesday" name="WorkAvailabilityEntity.FromTuesday" value="" />
                                                            </td>
                                                            <td>
                                                                <input type="text" placeholder="hh:mm" class="form-control" autoComplete="off" id="WorkAvailabilityEntity_FromWednesday" name="WorkAvailabilityEntity.FromWednesday" value="" />
                                                            </td>
                                                            <td>
                                                                <input type="text" placeholder="hh:mm" class="form-control" autoComplete="off" id="WorkAvailabilityEntity_FromThursday" name="WorkAvailabilityEntity.FromThursday" value="" />
                                                            </td>
                                                            <td>
                                                                <input type="text" placeholder="hh:mm" class="form-control" autoComplete="off" id="WorkAvailabilityEntity_FromFriday" name="WorkAvailabilityEntity.FromFriday" value="" />
                                                            </td>
                                                            <td>
                                                                <input type="text" placeholder="hh:mm" class="form-control" autoComplete="off" id="WorkAvailabilityEntity_FromSaturday" name="WorkAvailabilityEntity.FromSaturday" value="" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <strong>To</strong>
                                                            </td>
                                                            <td>
                                                                <input type="text" placeholder="hh:mm" class="form-control" autoComplete="off" id="WorkAvailabilityEntity_ToSunday" name="WorkAvailabilityEntity.ToSunday" value="" />
                                                            </td>
                                                            <td>
                                                                <input type="text" placeholder="hh:mm" class="form-control" autoComplete="off" id="WorkAvailabilityEntity_ToMonday" name="WorkAvailabilityEntity.ToMonday" value="" />
                                                            </td>
                                                            <td>
                                                                <input type="text" placeholder="hh:mm" class="form-control" autoComplete="off" id="WorkAvailabilityEntity_ToTuesday" name="WorkAvailabilityEntity.ToTuesday" value="" />
                                                            </td>
                                                            <td>
                                                                <input type="text" placeholder="hh:mm" class="form-control" autoComplete="off" id="WorkAvailabilityEntity_ToWednesday" name="WorkAvailabilityEntity.ToWednesday" value="" />
                                                            </td>
                                                            <td>
                                                                <input type="text" placeholder="hh:mm" class="form-control" autoComplete="off" id="WorkAvailabilityEntity_ToThursday" name="WorkAvailabilityEntity.ToThursday" value="" />
                                                            </td>
                                                            <td>
                                                                <input type="text" placeholder="hh:mm" class="form-control" autoComplete="off" id="WorkAvailabilityEntity_ToFriday" name="WorkAvailabilityEntity.ToFriday" value="" />
                                                            </td>
                                                            <td>
                                                                <input type="text" placeholder="hh:mm" class="form-control" autoComplete="off" id="WorkAvailabilityEntity_ToSaturday" name="WorkAvailabilityEntity.ToSaturday" value="" />
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="row mb-2">
                                                    <div class="col-md-2 col-sm-4">
                                                        <label class="form-check-label">
                                                            Availability:
                                                        </label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="row">
                                                            <label class="radio-inline col-md-4 col-sm-4">
                                                                <input type="radio" value="4hrs" id="WorkAvailabilityEntity_DailyAvailability" name="WorkAvailabilityEntity.DailyAvailability"> 4 hrs.
                                                            </label>
                                                            <label class="radio-inline col-md-4 col-sm-4">
                                                                <input type="radio" value="6hrs" id="WorkAvailabilityEntity_DailyAvailability" name="WorkAvailabilityEntity.DailyAvailability"> 6 hrs.
                                                            </label>
                                                            <label class="radio-inline col-md-4 col-sm-4">
                                                                <input type="radio" value="8hrs" id="WorkAvailabilityEntity_DailyAvailability" name="WorkAvailabilityEntity.DailyAvailability"> 8 hrs.
                                                            </label>
                                                            <label class="radio-inline col-md-4 col-sm-4">
                                                                <input type="radio" value="10hrs" id="WorkAvailabilityEntity_DailyAvailability" name="WorkAvailabilityEntity.DailyAvailability"> 10 hrs.
                                                            </label>
                                                            <label class="radio-inline col-md-4 col-sm-4">
                                                                <input type="radio" value="12hrs" id="WorkAvailabilityEntity_DailyAvailability" name="WorkAvailabilityEntity.DailyAvailability"> 12 hrs.
                                                            </label>
                                                            <label class="radio-inline col-md-4 col-sm-4">
                                                                <input type="radio" value="12hrs" id="WorkAvailabilityEntity_DailyAvailability" name="WorkAvailabilityEntity.DailyAvailability"> Live-in(24 hrs.)
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-md-2 col-sm-4">
                                                        <label class="form-check-label">
                                                            Transportation:
                                                        </label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="row">
                                                            <label class="radio-inline col-md-2 col-sm-4">
                                                                <input name="transportOption" type="radio" value="Car" data-val="true" data-val-required="The Car field is required." id="IsCar"> Car
                                                            </label>
                                                            <label class="radio-inline col-md-2 col-sm-4">
                                                                <input name="transportOption" type="radio" value="Bus" data-val="true" data-val-required="The Bus field is required." id="IsBus"> Bus
                                                            </label>
                                                            <label class="radio-inline col-md-2 col-sm-4">
                                                                <input name="transportOption" type="radio" value="Train" data-val="true" data-val-required="The Train field is required." id="IsTrain"> Train
                                                            </label>
                                                            <label class="radio-inline col-md-2 col-sm-4">
                                                                <input name="transportOption" type="radio" value="Other" data-val="true" data-val-required="The Other field is required." id="IsOther"> Other
                                                            </label>
                                                            <div class="col-md-4" id="transport">
                                                                <input class="form-control" placeholder="Enter Transportation Name" type="text" id="TransportationMode" name="TransportationMode" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="b-a-1 rounded mt-4 p-4">
                                                <p><strong>Working Area</strong></p>
                                                <p><strong>What boroughs are you available to work in?</strong></p>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" data-val="true" data-val-required="The Brooklyn field is required." id="WorkingAreaEntity_IsBrooklyn" name="WorkingAreaEntity.IsBrooklyn" value="true">
                                                    <label class="form-check-label" for="WorkingAreaEntity_IsBrooklyn">Brooklyn</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" data-val="true" data-val-required="The Queens field is required." id="WorkingAreaEntity_IsQueens" name="WorkingAreaEntity.IsQueens" value="true">
                                                    <label class="form-check-label" for="WorkingAreaEntity_IsQueens">Queens</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" data-val="true" data-val-required="The Manhattan field is required." id="WorkingAreaEntity_IsManhattan" name="WorkingAreaEntity.IsManhattan" value="true">
                                                    <label class="form-check-label" for="WorkingAreaEntity_IsManhattan">Manhattan </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" data-val="true" data-val-required="The Bronx field is required." id="WorkingAreaEntity_IsBronx" name="WorkingAreaEntity.IsBronx" value="true">
                                                    <label class="form-check-label" for="WorkingAreaEntity_IsBronx">Bronx </label>
                                                </div>
                                                <p class="mt-4"><strong>Certification</strong></p>
                                                <div class="row">
                                                    <div class="col-md-9 col-sm-6 d-flex">
                                                        <label class="mt-2"> Type of Certification (Check all that apply):</label>
                                                        <div class="form-check form-check-inline ml-3">
                                                            <input class="form-check-input" type="checkbox" data-val="true" data-val-required="The HHA field is required." id="IsHHA" name="IsHHA" value="true" />
                                                            <label class="form-check-label" for="IsHHA">HHA</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" data-val="true" data-val-required="The PCA field is required." id="IsPCA" name="IsPCA" value="true">
                                                            <label class="form-check-label" for="IsPCA">PCA</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label>Special Qualifications</label>
                                                        <input type="text" class="form-control" placeholder="Special Qualifications" autoComplete="off" id="SpecialQualifications" name="SpecialQualifications" value="" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-right my-4">
                            <button class="btn btn-primary btnNext" id="submit" type="submit">Next</button>
                        </div>
                    </div>
                    <input name="__RequestVerificationToken" type="hidden" value="CfDJ8EuV0NPboZ1Alha0wXfSm4VR2ER6_cbHk5a6xH3z6WeDBD0-RJyhGyUxDnOGS3LibWTdsdyl9m3rAURzXZvgDa4Jo6JvEtmiNsKGud-_gL4OzIJ2eEHfZXLU15IbCv1FfigzES2shwjPtaeoQY1DIuY" /><input name="AreCatsOk" type="hidden" value="false" /><input name="AreDogsOk" type="hidden" value="false" /><input name="AreSmokingOk" type="hidden" value="false" /><input name="WorkAvailabilityEntity.IsSunday" type="hidden" value="false" /><input name="WorkAvailabilityEntity.IsMonday" type="hidden" value="false" /><input name="WorkAvailabilityEntity.IsTuesday" type="hidden" value="false" /><input name="WorkAvailabilityEntity.IsWednesday" type="hidden" value="false" /><input name="WorkAvailabilityEntity.IsThursday" type="hidden" value="false" /><input name="WorkAvailabilityEntity.IsFriday" type="hidden" value="false" /><input name="WorkAvailabilityEntity.IsSaturday" type="hidden" value="false" /><input name="WorkingAreaEntity.IsBrooklyn" type="hidden" value="false"><input name="WorkingAreaEntity.IsQueens" type="hidden" value="false"><input name="WorkingAreaEntity.IsManhattan" type="hidden" value="false"><input name="WorkingAreaEntity.IsBronx" type="hidden" value="false"><input name="IsHHA" type="hidden" value="false" /><input name="IsPCA" type="hidden" value="false"></form>
            </div>
            <div class="tab-pane fade mt-3" id="ReferenceAndContact">
                <form id="addReferenceAndContact" data-ajax="true" data-ajax-method="POST" data-ajax-failure="failed" data-ajax-success="completed" action="/NonSkilled/ReferenceAndContact" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="b-a-1 rounded p-4 mt-4 mt-md-0">

                                                <p><strong>Reference Contact Information</strong></p>
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-6 form-group">
                                                        <label for="ReferenceName1">Reference Name</label><span class="text-danger"> *</span>
                                                        <input placeholder="Enter Name" class="form-control" type="text" autocomplete="off" data-val="true" data-val-required="The Reference Name field is required." id="ReferenceName1" name="ReferenceName1" value="">
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="ReferenceName1" data-valmsg-replace="true">
                                                        </span>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-6">
                                                        <label for="RefRelationShip1">Relationship</label>
                                                        <select id="RefRelationShip1" class="form-control" name="RefRelationShip1">
                                                            <option value="" disabled selected>Select</option>
                                                            <option>Brother</option>
                                                            <option>Sister</option>
                                                            <option>Father</option>
                                                            <option>Mother</option>
                                                            <option>Spouse</option>
                                                            <option>Friend</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6 form-group">
                                                        <label for="RefPhoneNumber1">Reference Phone</label><span class="text-danger"> *</span>
                                                        <input type="text" placeholder="Enter Phone" class="form-control" autocomplete="off" data-val="true" data-val-phone="Not valid phone number" data-val-required="The Reference Phone field is required." id="RefPhoneNumber1" name="RefPhoneNumber1" value="">
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="RefPhoneNumber1" data-valmsg-replace="true">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Address Line 1</label><span class="text-danger"> *</span>
                                                        <input type="text" class="form-control" placeholder="Enter Address" autoComplete="off" data-val="true" data-val-required="Address is required" id="AddressEntity_Street1" name="AddressEntity.Street1" value="">
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="AddressEntity.Street1" data-valmsg-replace="true"></span>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Address Line 2</label><span class="text-danger"> *</span>
                                                        <input type="text" class="form-control" placeholder="Enter Address" autoComplete="off" data-val="true" data-val-required="Address is required" id="AddressEntity_Street1" name="AddressEntity.Street1" value="">
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="AddressEntity.Street1" data-valmsg-replace="true"></span>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="APT">APT#Building<span class="text-danger"> *</span></label>
                                                        <input type="text" class="form-control" placeholder="Enter APT#" autoComplete="off" id="APT" name="APT" value="">
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-6">
                                                        <label for="inputState">State</label><span class="text-danger"> *</span>
                                                        <select class="form-control" data-val="true" data-val-required="State is required" id="AddressEntity_State" name="AddressEntity.State">
                                                            <option value="" disabled selected>Select State</option>
                                                            <option>Alabama </option>
                                                            <option> Alaska</option>
                                                            <option>California</option>
                                                            <option>Connecticut</option>
                                                            <option>Delaware</option>
                                                            <option>Florida</option>
                                                            <option>Georgia</option>
                                                            <option>Idaho</option>
                                                        </select>
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="AddressEntity.State" data-valmsg-replace="true"></span>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-6">
                                                        <label for="inputState">City</label><span class="text-danger"> *</span>
                                                        <select class="form-control" data-val="true" data-val-required="State is required" id="AddressEntity_State" name="AddressEntity.State">
                                                            <option value="" disabled selected>Select City</option>
                                                            <option>Alabama </option>
                                                            <option> Alaska</option>
                                                            <option>California</option>
                                                            <option>Connecticut</option>
                                                            <option>Delaware</option>
                                                            <option>Florida</option>
                                                            <option>Georgia</option>
                                                            <option>Idaho</option>
                                                        </select>
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="AddressEntity.State" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6 col-sm-6">
                                                        <label for="AddressEntity_Zipcode">Zip</label><span class="text-danger"> *</span>
                                                        <input type="text" class="form-control" placeholder="Enter Zip" autoComplete="off" id="AddressEntity_Zipcode" name="AddressEntity.Zipcode" value="">
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="AddressEntity.Zipcode" data-valmsg-replace="true"></span>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="AddressEntity_POBox">P.O.Box</label>
                                                        <input type="text" class="form-control" placeholder="Enter P.O. Box" autoComplete="off" id="AddressEntity_POBox" name="AddressEntity.POBox" value="">
                                                    </div>
                                                </div>
                                                <p class="mt-3"><strong>Reference Contact Information</strong></p>
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-6 form-group">
                                                        <label for="ReferenceName2">Reference Name</label> <span class="text-danger"> *</span>
                                                        <input placeholder="Enter Name" class="form-control" type="text" autocomplete="off" data-val="true" data-val-required="The Reference Name field is required." id="ReferenceName2" name="ReferenceName2" value="">
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="ReferenceName2" data-valmsg-replace="true">
                                                        </span>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-6">
                                                        <label for="RefRelationShip1">Relationship</label>
                                                        <select id="RefRelationShip1" class="form-control" name="RefRelationShip1">
                                                            <option value="" disabled selected>Select</option>
                                                            <option>Brother</option>
                                                            <option>Sister</option>
                                                            <option>Father</option>
                                                            <option>Mother</option>
                                                            <option>Spouse</option>
                                                            <option>Friend</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6 form-group">
                                                        <label for="RefPhoneNumber1">Reference Phone</label><span class="text-danger"> *</span>
                                                        <input type="text" placeholder="Enter Phone" class="form-control" autocomplete="off" data-val="true" data-val-phone="Not valid phone number" data-val-required="The Reference Phone field is required." id="RefPhoneNumber1" name="RefPhoneNumber1" value="">
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="RefPhoneNumber1" data-valmsg-replace="true">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Address Line 1</label><span class="text-danger"> *</span>
                                                        <input type="text" class="form-control" placeholder="Enter Address" autoComplete="off" data-val="true" data-val-required="Address is required" id="AddressEntity_Street1" name="AddressEntity.Street1" value="">
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="AddressEntity.Street1" data-valmsg-replace="true"></span>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Address Line 2</label><span class="text-danger"> *</span>
                                                        <input type="text" class="form-control" placeholder="Enter Address" autoComplete="off" data-val="true" data-val-required="Address is required" id="AddressEntity_Street1" name="AddressEntity.Street1" value="">
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="AddressEntity.Street1" data-valmsg-replace="true"></span>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="APT">APT#Building<span class="text-danger"> *</span></label>
                                                        <input type="text" class="form-control" placeholder="Enter APT#" autoComplete="off" id="APT" name="APT" value="">
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-6">
                                                        <label for="inputState">State</label><span class="text-danger"> *</span>
                                                        <select class="form-control" data-val="true" data-val-required="State is required" id="AddressEntity_State" name="AddressEntity.State">
                                                            <option value="" disabled selected>Select State</option>
                                                            <option>Alabama </option>
                                                            <option> Alaska</option>
                                                            <option>California</option>
                                                            <option>Connecticut</option>
                                                            <option>Delaware</option>
                                                            <option>Florida</option>
                                                            <option>Georgia</option>
                                                            <option>Idaho</option>
                                                        </select>
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="AddressEntity.State" data-valmsg-replace="true"></span>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-6">
                                                        <label for="inputState">City</label><span class="text-danger"> *</span>
                                                        <select class="form-control" data-val="true" data-val-required="State is required" id="AddressEntity_State" name="AddressEntity.State">
                                                            <option value="" disabled selected>Select City</option>
                                                            <option>Alabama </option>
                                                            <option> Alaska</option>
                                                            <option>California</option>
                                                            <option>Connecticut</option>
                                                            <option>Delaware</option>
                                                            <option>Florida</option>
                                                            <option>Georgia</option>
                                                            <option>Idaho</option>
                                                        </select>
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="AddressEntity.State" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6 col-sm-6">
                                                        <label for="AddressEntity_Zipcode">Zip</label><span class="text-danger"> *</span>
                                                        <input type="text" class="form-control" placeholder="Enter Zip" autoComplete="off" id="AddressEntity_Zipcode" name="AddressEntity.Zipcode" value="">
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="AddressEntity.Zipcode" data-valmsg-replace="true"></span>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="AddressEntity_POBox">P.O.Box</label>
                                                        <input type="text" class="form-control" placeholder="Enter P.O. Box" autoComplete="off" id="AddressEntity_POBox" name="AddressEntity.POBox" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="b-a-1 rounded p-4 mt-4 mt-md-0">
                                                <div class="form-group">
                                                    <p><strong>Emergency Contact Information</strong></p>
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label for="EmergencyName1">Emergency Contact Name</label>
                                                            <input type="text" class="form-control" placeholder="Enter Contact Name" autocomplete="off" data-val="true" data-val-required="The Emergency Contact Name field is required." id="EmergencyName1" name="EmergencyName1" value="">
                                                            <span class="text-danger field-validation-valid" data-valmsg-for="EmergencyName1" data-valmsg-replace="true"></span>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="RefRelationShip1">Relationship</label>
                                                            <select id="RefRelationShip1" class="form-control" name="RefRelationShip1">
                                                                <option value="" disabled selected>Select</option>
                                                                <option>Brother</option>
                                                                <option>Sister</option>
                                                                <option>Father</option>
                                                                <option>Mother</option>
                                                                <option>Spouse</option>
                                                                <option>Friend</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Address Line 1</label><span class="text-danger"> *</span>
                                                        <input type="text" class="form-control" placeholder="Enter Address" autoComplete="off" data-val="true" data-val-required="Address is required" id="AddressEntity_Street1" name="AddressEntity.Street1" value="">
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="AddressEntity.Street1" data-valmsg-replace="true"></span>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Address Line 2</label><span class="text-danger"> *</span>
                                                        <input type="text" class="form-control" placeholder="Enter Address" autoComplete="off" data-val="true" data-val-required="Address is required" id="AddressEntity_Street1" name="AddressEntity.Street1" value="">
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="AddressEntity.Street1" data-valmsg-replace="true"></span>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="APT">APT#Building<span class="text-danger"> *</span></label>
                                                        <input type="text" class="form-control" placeholder="Enter APT#" autoComplete="off" id="APT" name="APT" value="">
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-6">
                                                        <label for="inputState">State</label><span class="text-danger"> *</span>
                                                        <select class="form-control" data-val="true" data-val-required="State is required" id="AddressEntity_State" name="AddressEntity.State">
                                                            <option value="" disabled selected>Select State</option>
                                                            <option>Alabama </option>
                                                            <option> Alaska</option>
                                                            <option>California</option>
                                                            <option>Connecticut</option>
                                                            <option>Delaware</option>
                                                            <option>Florida</option>
                                                            <option>Georgia</option>
                                                            <option>Idaho</option>
                                                        </select>
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="AddressEntity.State" data-valmsg-replace="true"></span>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-6">
                                                        <label for="inputState">City</label><span class="text-danger"> *</span>
                                                        <select class="form-control" data-val="true" data-val-required="State is required" id="AddressEntity_State" name="AddressEntity.State">
                                                            <option value="" disabled selected>Select City</option>
                                                            <option>Alabama </option>
                                                            <option> Alaska</option>
                                                            <option>California</option>
                                                            <option>Connecticut</option>
                                                            <option>Delaware</option>
                                                            <option>Florida</option>
                                                            <option>Georgia</option>
                                                            <option>Idaho</option>
                                                        </select>
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="AddressEntity.State" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6 col-sm-6">
                                                        <label for="AddressEntity_Zipcode">Zip</label><span class="text-danger"> *</span>
                                                        <input type="text" class="form-control" placeholder="Enter Zip" autoComplete="off" id="AddressEntity_Zipcode" name="AddressEntity.Zipcode" value="">
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="AddressEntity.Zipcode" data-valmsg-replace="true"></span>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="AddressEntity_POBox">P.O.Box</label>
                                                        <input type="text" class="form-control" placeholder="Enter P.O. Box" autoComplete="off" id="AddressEntity_POBox" name="AddressEntity.POBox" value="">
                                                    </div>
                                                </div>
                                                    <div class="row ">
                                                        <div class="form-group col-md-6">
                                                            <label for="EmerPhoneNumber1">Emergency Contact Home Phone</label>
                                                            <input type="text" class="form-control" autocomplete="off" placeholder="Enter Emergency Contact Phone Home" data-val="true" data-val-phone="Not valid phone number" data-val-required="The Emergency Contact Home Phone field is required." id="EmerPhoneNumber1" name="EmerPhoneNumber1" value="">
                                                            <span class="text-danger field-validation-valid" data-valmsg-for="EmerPhoneNumber1" data-valmsg-replace="true"></span>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="EmergencyCellNumber1">Emergency Contact Cell Phone</label>
                                                            <input type="text" class="form-control" placeholder="Enter Emergency Contact Cell Phone" autocomplete="off" data-val="true" data-val-phone="Not valid phone number" id="EmergencyCellNumber1" name="EmergencyCellNumber1" value="">
                                                            <span class="text-danger field-validation-valid" data-valmsg-for="EmergencyCellNumber1" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div>
                                                    <p class="mt-3"><strong>Emergency Contact Information</strong></p>
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label for="EmergencyName2">Emergency Contact Name</label>
                                                            <input type="text" class="form-control" placeholder="Enter Contact Name" autocomplete="off" data-val="true" data-val-required="The Emergency Contact Name field is required." id="EmergencyName2" name="EmergencyName2" value="">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="RefRelationShip1">Relationship</label>
                                                            <select id="RefRelationShip1" class="form-control" name="RefRelationShip1">
                                                                <option value="" disabled selected>Select</option>
                                                                <option>Brother</option>
                                                                <option>Sister</option>
                                                                <option>Father</option>
                                                                <option>Mother</option>
                                                                <option>Spouse</option>
                                                                <option>Friend</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Address Line 1</label><span class="text-danger"> *</span>
                                                        <input type="text" class="form-control" placeholder="Enter Address" autoComplete="off" data-val="true" data-val-required="Address is required" id="AddressEntity_Street1" name="AddressEntity.Street1" value="">
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="AddressEntity.Street1" data-valmsg-replace="true"></span>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Address Line 2</label><span class="text-danger"> *</span>
                                                        <input type="text" class="form-control" placeholder="Enter Address" autoComplete="off" data-val="true" data-val-required="Address is required" id="AddressEntity_Street1" name="AddressEntity.Street1" value="">
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="AddressEntity.Street1" data-valmsg-replace="true"></span>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="APT">APT#Building<span class="text-danger"> *</span></label>
                                                        <input type="text" class="form-control" placeholder="Enter APT#" autoComplete="off" id="APT" name="APT" value="">
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-6">
                                                        <label for="inputState">State</label><span class="text-danger"> *</span>
                                                        <select class="form-control" data-val="true" data-val-required="State is required" id="AddressEntity_State" name="AddressEntity.State">
                                                            <option value="" disabled selected>Select State</option>
                                                            <option>Alabama </option>
                                                            <option> Alaska</option>
                                                            <option>California</option>
                                                            <option>Connecticut</option>
                                                            <option>Delaware</option>
                                                            <option>Florida</option>
                                                            <option>Georgia</option>
                                                            <option>Idaho</option>
                                                        </select>
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="AddressEntity.State" data-valmsg-replace="true"></span>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-6">
                                                        <label for="inputState">City</label><span class="text-danger"> *</span>
                                                        <select class="form-control" data-val="true" data-val-required="State is required" id="AddressEntity_State" name="AddressEntity.State">
                                                            <option value="" disabled selected>Select City</option>
                                                            <option>Alabama </option>
                                                            <option> Alaska</option>
                                                            <option>California</option>
                                                            <option>Connecticut</option>
                                                            <option>Delaware</option>
                                                            <option>Florida</option>
                                                            <option>Georgia</option>
                                                            <option>Idaho</option>
                                                        </select>
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="AddressEntity.State" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6 col-sm-6">
                                                        <label for="AddressEntity_Zipcode">Zip</label><span class="text-danger"> *</span>
                                                        <input type="text" class="form-control" placeholder="Enter Zip" autoComplete="off" id="AddressEntity_Zipcode" name="AddressEntity.Zipcode" value="">
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="AddressEntity.Zipcode" data-valmsg-replace="true"></span>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="AddressEntity_POBox">P.O.Box</label>
                                                        <input type="text" class="form-control" placeholder="Enter P.O. Box" autoComplete="off" id="AddressEntity_POBox" name="AddressEntity.POBox" value="">
                                                    </div>
                                                </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label for="EmerPhoneNumber2">Emergency Contact Home Phone</label>
                                                            <input type="text" class="form-control" placeholder="Enter Emergency Contact Phone Home" autocomplete="off" data-val="true" data-val-phone="Not valid phone number" data-val-required="The Emergency Contact Home Phone field is required." id="EmerPhoneNumber2" name="EmerPhoneNumber2" value="">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="EmergencyCellNumber2">Emergency Contact Cell Phone</label>
                                                            <input type="text" class="form-control" placeholder="Enter Emergency Contact Cell Phone" autocomplete="off" data-val="true" data-val-phone="Not valid phone number" id="EmergencyCellNumber2" name="EmergencyCellNumber2" value="">
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
                    <div class="d-flex my-4">
                        <button class="btn btn-outline-primary btnPrevious" type="button">Previous</button>
                        <button class="btn btn-primary ml-auto btnNext" type="submit">Next</button>
                    </div>
                    <input name="__RequestVerificationToken" type="hidden" value="CfDJ8EuV0NPboZ1Alha0wXfSm4VR2ER6_cbHk5a6xH3z6WeDBD0-RJyhGyUxDnOGS3LibWTdsdyl9m3rAURzXZvgDa4Jo6JvEtmiNsKGud-_gL4OzIJ2eEHfZXLU15IbCv1FfigzES2shwjPtaeoQY1DIuY" /></form>
            </div>
            <div class="tab-pane fade mt-3" id="Education">

                <form id="educationCreate" data-ajax="true" data-ajax-method="POST" data-ajax-failure="failed" data-ajax-update="#educationTable" data-ajax-success="educationComplete" action="/Education/Create" method="post">

                    <div class="container-fluid p-0">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Button to Open the Modal -->
                                <div class="text-right mb-2">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#educationModel">
                                        Add
                                    </button>
                                </div>
                                <!-- The Modal -->
                                <div class="modal" id="educationModel">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Education</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body form-group">
                                                <div class="row form-group">
                                                    <div class="col-sm-6 col-md-6 ">
                                                        <label class="form-control" for="EducationSchoolAttended">Education School Attended</label>
                                                        <select id="inputTitle" class="form-control" autoComplete="off" data-val="true" data-val-required="The Education School Attended field is required." name="EducationSchoolAttended">
                                                            <option value="" disabled selected>Select title</option>
                                                            <option>HIGH SCHOOL</option>
                                                            <option>COLLEGE</option>
                                                            <option>GRADUATE SCHOOL</option>
                                                            <option>BUSINESS SCHOOL</option>
                                                            <option>TRAINING PROGRAM</option>
                                                            <option>MEDICAL INSTITUTE</option>
                                                            <option>RESIDENCY INSTITUTE</option>
                                                            <option>FELLOWSHIP INSTITUTE</option>
                                                            <option>OTHER</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 ">
                                                        <label for="SchoolName">Name of school</label><span class="text-danger"> *</span>
                                                        <input type="text" class="form-control" data-val="true" data-val-required="The Name of school field is required." id="SchoolName" name="SchoolName" value="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 form-group">
                                                        <label for="DegreeName">Degree name</label><span class="text-danger"> *</span>
                                                        <input type="text" class="form-control" data-val="true" data-val-required="The Degree name field is required." id="DegreeName" name="DegreeName" value="">
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 form-group">
                                                        <label for="CourseMajor">Course of major</label>
                                                        <input type="text" class="form-control" id="CourseMajor" name="CourseMajor" value="">
                                                    </div>
                                                </div>
                                                <div class="row ">
                                                    <div class="col-md-6 col-sm-6 form-group">
                                                        <label for="Address">Address</label>
                                                        <input type="text" class="form-control" id="Address" name="Address" value="">
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 form-group">
                                                        <label for="YearOfCompleted">Year of completed</label><span class="text-danger"> *</span>
                                                        <input type="text" class="form-control" data-val="true" data-val-required="The Year of completed field is required." id="YearOfCompleted" name="YearOfCompleted" value="">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-6 row ">
                                                    <p class="col-md-4 form-check-inline ">Did you graduate ? </p>
                                                    <label class="radio-inline col-md-2 col-sm-4">
                                                        <input name="graduate" type="radio" value="graduate" data-val="true" data-val-required="The Did you Graduate? field is required." id="GraduateORNot"> Yes
                                                    </label>
                                                    <label class="radio-inline col-md-2 col-sm-4">
                                                        <input name="graduate" type="radio" value="not-graduate" id="GraduateORNot"> No
                                                    </label>
                                                </div>
                                                <div class="col-md-12 col-sm-6 row" id="courseTypeDiv">
                                                    <div class="d-flex">
                                                        <p class="col-md-4 form-check-inline">Course type </p>
                                                        <label class="radio-inline col-md-4 col-sm-4 ml-4">
                                                            <input name="degree" type="radio" value="diploma" id="CourseType"> Diploma
                                                        </label>
                                                        <label class="radio-inline col-md-4 col-sm-4">
                                                            <input name="degree" type="radio" value="degree" id="CourseType"> Degree
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Add</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card p-2">
                                    <div class="card-body card mt-4 table-responsive" id="educationTable">
                                        <table class="table table-striped table-bordered ">
                                            <thead>
                                                <tr>
                                                    <th>Name of school & Address</th>
                                                    <th>Did you graduate</th>
                                                    <th>Diploma/Degree</th>
                                                    <th>Course of major</th>
                                                    <th>Year of completed</th>
                                                    <th>Remove</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex my-4">
                        <button class="btn btn-outline-primary btnPrevious" type="button">Previous</button>
                        <button class="btn btn-primary ml-auto btnNext" type="submit" id="submit">Next</button>
                    </div>
                    <input name="__RequestVerificationToken" type="hidden" value="CfDJ8EuV0NPboZ1Alha0wXfSm4VR2ER6_cbHk5a6xH3z6WeDBD0-RJyhGyUxDnOGS3LibWTdsdyl9m3rAURzXZvgDa4Jo6JvEtmiNsKGud-_gL4OzIJ2eEHfZXLU15IbCv1FfigzES2shwjPtaeoQY1DIuY" /></form>
            </div>
            <div class="tab-pane fade mt-3" id="PreviousEmployeeDetails">
                <form id="addReferenceAndContact" data-ajax="true" data-ajax-method="POST" data-ajax-update="#employeeDetailsTable" data-ajax-failure="failed" data-ajax-success="employeeDetailsComplete" action="/EmployeeDetails/Create" method="post">

                    <div class="container-fluid p-0">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Button to Open the Modal -->
                                <div class="text-right mb-2">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#employeeDetails">
                                        Add
                                    </button>
                                </div>
                                <!-- The Modal -->
                                <div class="modal" id="employeeDetails">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Previous Employee Details</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body form-group">
                                                <div class="row ">
                                                    <div class="col-md-6 col-sm-6 form-group">
                                                        <label for="CompanyName">Company Name</label><span class="text-danger"> *</span>
                                                        <input type="text" class="form-control" autocomplete="off" data-val="true" data-val-required="The Company Name field is required." id="CompanyName" name="CompanyName" value="">
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 form-group">
                                                        <label for="JobTitle">Job title</label>
                                                        <input type="text" class="form-control" autocomplete="off" id="JobTitle" name="JobTitle" value="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-6 form-group">
                                                        <label for="Address">Address</label><span class="text-danger"> *</span>
                                                        <input type="text" class="form-control" autocomplete="off" data-val="true" data-val-required="The Address field is required." id="Address" name="Address" value="">
                                                    </div>
                                                </div>

                                                <div class="row ">
                                                    <div class="col-md-6 col-sm-6 form-group">
                                                        <label for="Phone">Phone</label>
                                                        <input type="text" class="form-control" autocomplete="off" id="Phone" name="Phone" value="">
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 form-group">
                                                        <label for="Fax">Fax</label><span class="text-danger"> *</span>
                                                        <input type="text" class="form-control" autocomplete="off" data-val="true" data-val-required="The Fax field is required." id="Fax" name="Fax" value="">
                                                    </div>
                                                </div>
                                                <div class="row ">
                                                    <div class="col-md-6 col-sm-6 form-group">
                                                        <label for="Supervisor">Supervisor</label>
                                                        <input type="text" class="form-control" autocomplete="off" id="Supervisor" name="Supervisor" value="">
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 form-group">
                                                        <label for="Salary">Salary</label>
                                                        <input type="number" min="0" class="form-control" autocomplete="off" data-val="true" data-val-number="The field Salary must be a number." data-val-required="The Salary field is required." id="Salary" name="Salary" value="">
                                                    </div>
                                                </div>
                                                <div class="row ">
                                                    <div class="col-md-12 col-sm-6 form-group">
                                                        <label for="DurationFrom">DurationFrom</label>
                                                        <div class="d-flex">
                                                            <input type="Date" class="form-control" data-val="true" data-val-required="The DurationFrom field is required." id="DurationFrom" name="DurationFrom" value="">
                                                            <input type="Date" class="form-control ml-4" data-val="true" data-val-required="The Duration field is required." id="DurationTo" name="DurationTo" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-6">
                                                        <label for="ReasonOfLeaving">Reason of leaving</label>
                                                        <input type="text" class="form-control" autocomplete="off" id="ReasonOfLeaving" name="ReasonOfLeaving" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Add</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card p-2">
                                    <div class="card-body card mt-4 table-responsive" id="employeeDetailsTable">

                                        <table class="table table-striped table-bordered ">
                                            <thead>
                                                <tr>
                                                    <th>Name </th>
                                                    <th>Address</th>
                                                    <th>Job title</th>
                                                    <th>Phone</th>
                                                    <th>Fax</th>
                                                    <th>Supervisor</th>
                                                    <th>Duration</th>
                                                    <th>Reason For Leaving</th>
                                                    <th>Remove</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex my-4">
                        <button class="btn btn-outline-primary btnPrevious" type="button">Previous</button>
                        <button class="btn btn-primary ml-auto btnNext" type="submit">Next</button>
                    </div>
                    <input name="__RequestVerificationToken" type="hidden" value="CfDJ8EuV0NPboZ1Alha0wXfSm4VR2ER6_cbHk5a6xH3z6WeDBD0-RJyhGyUxDnOGS3LibWTdsdyl9m3rAURzXZvgDa4Jo6JvEtmiNsKGud-_gL4OzIJ2eEHfZXLU15IbCv1FfigzES2shwjPtaeoQY1DIuY" /></form>
            </div>
            <div class="tab-pane fade mt-3" id="CriminalHistory">

                <form id="criminalHistoryCreate" data-ajax="true" data-ajax-method="POST" data-ajax-failure="failed" data-ajax-update="#criminalHistoryTable" data-ajax-success="criminalHistoryComplete" action="/CriminalHistory/Create" method="post">

                    <div class="card ">
                        <div class="card-body ">
                            <div class="form-group  card mb-1 ">
                                <ol class="mt-2 mr-3">
                                    <li class="mb-3">
                                        I have applied to an agency to provide direct care or
                                        supervision
                                        to residents or patients. I understand that as part of the
                                        application process, the
                                        Public Health Law (PHL) Article 28-E requires that the New York
                                        State Department of Health perform a criminal history check on
                                        me
                                        with the New
                                        York State Division of Criminal Justice Services (DCJS) and the
                                        Federal Bureau of Investigation (FBI).
                                    </li>
                                    <li class="mb-3">
                                        I acknowledge and consent to having my fingerprints taken for
                                        the
                                        purpose of a criminal history record check by the DCJS and the
                                        FBI.
                                    </li>
                                    <li class="mb-3">
                                        I have been advised that DOH is authorized by law to receive the
                                        results of the criminal history record check from DCJS and the
                                        FBI
                                        for the purpose
                                        of developing a criminal history record summary to be provided
                                        to
                                        the agency to which I applied for a position to provide direct
                                        care
                                        or supervision
                                        to residents or patients. I have been advised that the criminal
                                        history record summary will indicate whether I have a criminal
                                        history, as maintained
                                        by DCJS or the FBI, including convictions of a crime (felony or
                                        misdemeanor) or criminal charges which do not reflect a
                                        disposition.
                                        I have been
                                        advised that by law, DOH is authorized and may be required to
                                        provide the results of the criminal history record check through
                                        a
                                        criminal history
                                        record summary to the agency. The criminal history record
                                        summary
                                        prepared by DOH and sent to the agency will contain the results
                                        of
                                        the
                                        criminal history record check performed by DCJS. I have been
                                        advised
                                        that the information shall be confidential pursuant to
                                        applicable
                                        federal and
                                        state laws, rules and regulations and shall only be disclosed to
                                        persons authorized by law.
                                    </li>
                                    <li class="mb-3">
                                        I hereby consent to DOH sharing with any DCJS agency to which I
                                        applied for a position to provide direct care or supervision,
                                        any
                                        criminal history
                                        record check information provided to DOH by the FBI, including
                                        the
                                        specific crime(s) for which I was convicted or charged, the date
                                        of
                                        the arrest for
                                        such charge, and/or date of conviction, and the jurisdiction in
                                        which the arrest or conviction took place.
                                    </li>
                                    <li class="mb-3">
                                        I have been informed of the procedures and my rights to obtain,
                                        review and seek correction of my criminal history information
                                        pursuant to
                                        regulations and procedures established by the DCJS and the FBI.
                                    </li>
                                    <li class="mb-3">
                                        I understand that I have the right to withdraw my application
                                        for
                                        employment, without prejudice, any time before employment is
                                        offered
                                        or
                                        declined, regardless of whether an agency, DOH or I have
                                        reviewed my
                                        criminal history information.
                                    </li>
                                    <li class="mb-3">
                                        I certify to the best of my knowledge and belief that I (check
                                        as
                                        appropriate):
                                        <div class="d-flex mt-2">
                                            <label class="radio-inline">
                                                <input type="radio" name="IsConvictedOption" value="Have" id="IsConvicted"><strong>
                                                    Have
                                                </strong>
                                            </label>
                                            <label class="radio-inline ml-2">
                                                <input type="radio" name="IsConvictedOption" value="HaveNot" id="IsConvicted"><strong>
                                                    Have not been convicted of a crime in New York State or any other jurisdiction
                                                </strong>
                                            </label>
                                        </div>

                                        <div class="d-flex mt-2">
                                            <label class="radio-inline">
                                                <input type="radio" name="IsResidentAbuseOption" value="Do" id="IsResidentAbuse"><strong>
                                                    Do
                                                </strong>
                                            </label>
                                            <label class="radio-inline ml-2">
                                                <input type="radio" name="IsResidentAbuseOption" value="DoNot" id="IsResidentAbuse"><strong>
                                                    Do not have a final finding of patient or resident abuse
                                                </strong>
                                            </label>
                                        </div>
                                        <p class="mb-2">
                                            If you have checked either “Have” and/or “Do”, please provide a brief explanation.
                                            (Optional)
                                        </p>
                                        <input type="text" class="form-control col-md-6 col-sm-6" />
                                    </li>

                                    <li class="mb-3">
                                        My current mailing or home address is indicated in Section 1 of
                                        this form.
                                    </li>
                                    <li>
                                        I have read this form and hereby consent to the request by the
                                        agency to use my fingerprints to obtain my criminal history
                                        record,
                                        if any, from the
                                        DCJS and the FBI. I hereby consent to the redisclosure of any
                                        convictions or open charges on my criminal history record,
                                        received
                                        by DOH from
                                        DCJS, to the requesting agency. I declare and affirm that the
                                        information I have provided on this consent form is true,
                                        complete
                                        and accurate and
                                        that the fingerprints to be submitted are my own (not applicable
                                        for
                                        Expedited Review submitted pursuant to CHRC Form 104).
                                    </li>
                                </ol>
                                <div class="ml-3 mr-3">
                                    <p class="font-weight"><strong>Statement of Disclosure of Abuse or Conviction</strong></p>
                                    <p>
                                        <span> I,</span><input type="text" disabled> herby authorize
                                        HouseCalls
                                        HC, to submit a request to the Attorney General of the United States to conduct a Search of
                                        the record of the Criminal Justice information Services Division of the Federal Bureau of
                                        Investigation for any criminal history records corresponding to the fingerprints or other
                                        identification information submitted by me.
                                        I further authorize the exchange of such information between the Attorney General of the
                                        United States, the New York State Department of Health, and HouseCalls HC. This information
                                        may be used only by HouseCalls HC, and only
                                        for the purpose of determining my suitability for employment in a position involved in
                                        direct patient care supervision.
                                    </p>
                                    <p>
                                        DISCLOSURE OF FINDINGS
                                    </p>
                                    <p>
                                        I hereby affirm and/or swear under penalties of perjury that I have not been found guilty in
                                        any forum of patient and/or resident abuse and that I have not been convicted of any crime
                                        or violation, other than traffic infractions, except the following:
                                    </p>
                                    <div class="text-right mb-2">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#criminalHistory">
                                            Add
                                        </button>
                                    </div>
                                    <!-- The Modal -->
                                    <div class="modal" id="criminalHistory">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Criminal History</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body form-group">
                                                    <div class="row ">
                                                        <div class="col-md-6 col-sm-6 form-group">
                                                            <label for="Court">Court</label>
                                                            <input type="text" class="form-control" id="Court" name="Court" value="">
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 form-group">
                                                            <label for="SectionOfLawViolated">Section Of Law Violated</label>
                                                            <input type="text" class="form-control" id="SectionOfLawViolated" name="SectionOfLawViolated" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 form-group">
                                                        <label for="Date">Date</label>
                                                        <input type="Date" class="form-control " id="Date" name="Date" value="">
                                                    </div>
                                                </div>
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">Add</button>
                                                    <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive" id="criminalHistoryTable">

                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Court</th>
                                                    <th>Section of law violated</th>
                                                    <th>Remove</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div>
                                        <label class="radio-inline">
                                            <input type="radio" name="disabilitiesOption" value="iHave" id="CertOfRelief">
                                            I have
                                        </label>
                                        <label class="radio-inline ml-2">
                                            <input type="radio" name="disabilitiesOption" value="haveNot" id="CertOfRelief">
                                            have not (check one) been issued a
                                            Certificate of
                                            Relief from Civil Disabilities and Forfeitures and/or Certificate of Good Conduct in
                                            conjunction with the above offenses, A copy of any such certificate is attached
                                            herewith.
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mb-4 mt-2 col-md-12">
                                        <input class="form-check-input" type="checkbox" id="agree" value="agree" name="agree">
                                        <label class="form-check-label" for="agree">
                                            I have read and agree for above concent
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex my-4">
                        <button class="btn btn-outline-primary btnPrevious" type="button">Previous</button>
                        <button class="btn btn-primary ml-auto btnNext" id="submit" type="submit">Next</button>
                    </div>
                    <input name="__RequestVerificationToken" type="hidden" value="CfDJ8EuV0NPboZ1Alha0wXfSm4VR2ER6_cbHk5a6xH3z6WeDBD0-RJyhGyUxDnOGS3LibWTdsdyl9m3rAURzXZvgDa4Jo6JvEtmiNsKGud-_gL4OzIJ2eEHfZXLU15IbCv1FfigzES2shwjPtaeoQY1DIuY" /></form>
            </div>
            <div class="tab-pane fade mt-3" id="WithHoldingInformation">

                <form id="withHoldingCertificate" data-ajax="true" data-ajax-method="POST" data-ajax-failure="failed" data-ajax-success="completed" action="/UserWithHolding/Create" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card ">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="b-a-1 rounded p-4 mt-4 mt-md-0">
                                                <strong>Step 1:</strong>
                                                <div class="mb-2">
                                                    <strong>Claim Dependents</strong>
                                                </div>
                                                <p>
                                                    If your income will be $200,000 or less ($400,000 or less if married filing jointly)
                                                </p>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <ol>
                                                            <li class="mb-3">
                                                                Multiply the number of qualifying children under age 17 by $2,000
                                                            </li>
                                                        </ol>
                                                    </div>
                                                    <div class="col-md-2 col-sm-6">
                                                        <input type="number" min="0" class="form-control mb-2" data-val="true" data-val-required="The NoOfChildren field is required." id="UserWithHoldingEntity_NoOfChildren" name="UserWithHoldingEntity.NoOfChildren" value="">
                                                    </div>
                                                    <div class="col-md-2 col-sm-6">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input class="form-control" id="qualifyingChildrenValue" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <ol start="2">
                                                            <li class="mb-3">Multiply the number of other dependents by $500</li>
                                                        </ol>
                                                    </div>
                                                    <div class="col-md-2 col-sm-6">
                                                        <input type="number" min="0" class="form-control mb-3" data-val="true" data-val-required="The NoOfDependents field is required." id="UserWithHoldingEntity_NoOfDependents" name="UserWithHoldingEntity.NoOfDependents" value="">
                                                    </div>
                                                    <div class="col-md-2 col-sm-6">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input class="form-control" id="dependentsValue" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-8 col-sm-4">
                                                        Add the amounts above and enter the total here
                                                    </div>
                                                    <div class="col-md-2 col-sm-2 font-weight-bold font-lg text-right">Total</div>
                                                    <div class="col-md-2 col-sm-6">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input class="form-control" id="finalValue" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-6">
                                                        <ol start="3">
                                                            <li class="mb-3"><label for="UserWithHoldingEntity_WithHoldingIncomeFilling">WithHoldingIncomeFilling</label></li>
                                                        </ol>
                                                    </div>
                                                    <div class="col-md-8 col-sm-6">
                                                        <label class="radio-inline col-md-4">
                                                            <input id="separately" type="radio" value="Filling Separately" name="UserWithHoldingEntity.WithHoldingIncomeFilling" /> Filling Separately
                                                        </label>
                                                        <label class="radio-inline col-md-4">
                                                            <input id="jointly" type="radio" value="Filling Jointly" name="UserWithHoldingEntity.WithHoldingIncomeFilling" /> Filling Jointly
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input id="houseHold" type="radio" value="Head Of HouseHold" name="UserWithHoldingEntity.WithHoldingIncomeFilling" /> Head Of HouseHold
                                                        </label>
                                                    </div>
                                                </div>
                                                <hr>
                                                <strong>Step 2:</strong>
                                                <div class="mb-3">
                                                    <strong> Other Adjustments (optional)</strong>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <ol>
                                                            <li>
                                                                Other income (not from jobs). If you want tax withheld for other income you expect this year that won’t have withholding, enter the amount of other income here. This may include interest, dividends, and retirement income.
                                                            </li>
                                                        </ol>
                                                    </div>
                                                    <div class="col-md-2 col-sm-6">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="number" min="0" class="form-control" data-val="true" data-val-number="The field OtherIncome must be a number." data-val-required="The OtherIncome field is required." id="UserWithHoldingEntity_OtherIncome" name="UserWithHoldingEntity.OtherIncome" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <ol start="2">
                                                            <li>
                                                                Deductions. If you expect to claim deductions other than the standard deduction and want to reduce your withholding, use the Deductions Worksheet on page 3 and enter the result here
                                                            </li>
                                                        </ol>
                                                    </div>
                                                    <div class="col-md-2 col-sm-6">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="number" min="0" class="form-control" data-val="true" data-val-number="The field Deductions must be a number." data-val-required="The Deductions field is required." id="UserWithHoldingEntity_Deductions" name="UserWithHoldingEntity.Deductions" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <ol start="3">
                                                            <li>
                                                                Extra withholding. Enter any additional tax you want  withheld each pay period
                                                            </li>
                                                        </ol>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="number" min="0" class="form-control" data-val="true" data-val-number="The field ExtraWithHolding must be a number." data-val-required="The ExtraWithHolding field is required." id="UserWithHoldingEntity_ExtraWithHolding" name="UserWithHoldingEntity.ExtraWithHolding" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="b-a-1 rounded p-4 mt-4 mt-md-0">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p>Are you a resident of New York City? </p>
                                                    </div>
                                                    <div class="withholding">
                                                        <div class="form-check form-check-inline">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="nyResidentOptionOption" value="yes" data-val="true" data-val-required="The IsNyResident field is required." id="WithHoldingAllowanceEntity_IsNyResident"> Yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline ml-5">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="nyResidentOptionOption" value="no" id="WithHoldingAllowanceEntity_IsNyResident"> No
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row ">
                                                    <div class="col-md-4">
                                                        <p>Are you a resident of Yonkers? </p>
                                                    </div>
                                                    <div class="withholding">
                                                        <div class="form-check form-check-inline">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="yonkersResidentOption" value="yes" data-val="true" data-val-required="The IsYonkersResident field is required." id="WithHoldingAllowanceEntity_IsYonkersResident"> Yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline ml-5">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="yonkersResidentOption" value="no" id="WithHoldingAllowanceEntity_IsYonkersResident"> No
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="mb-3">
                                                    <strong>Complete the worksheet on page 4 before making any entries.</strong>
                                                </div>
                                                <ol>
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                Total number of allowances you are claiming for New York State and Yonkers, if applicable
                                                            </div>
                                                            <div class="col-md-3 col-sm-3">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">$</span>
                                                                    </div>
                                                                    <input type="number" min="0" class="form-control" data-val="true" data-val-number="The field TotalAllwanceForNYState must be a number." data-val-required="The TotalAllwanceForNYState field is required." id="WithHoldingAllowanceEntity_TotalAllwanceForNYState" name="WithHoldingAllowanceEntity.TotalAllwanceForNYState" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                Total number of allowances for New York City
                                                            </div>
                                                            <div class="col-md-3 col-sm-3">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">$</span>
                                                                    </div>
                                                                    <input type="number" min="0" class="form-control" data-val="true" data-val-number="The field TotalAllwanceForNYCity must be a number." data-val-required="The TotalAllwanceForNYCity field is required." id="WithHoldingAllowanceEntity_TotalAllwanceForNYCity" name="WithHoldingAllowanceEntity.TotalAllwanceForNYCity" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ol>
                                                <p>
                                                    <strong>
                                                        Use lines 3, 4, and 5 below to have additional withholding per pay period under special agreement with your employer.
                                                    </strong>
                                                </p>
                                                <ol start="3">
                                                    <li class="mb-2">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                New York State Amount
                                                            </div>
                                                            <div class="col-md-3 col-sm-6">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">$</span>
                                                                    </div>
                                                                    <input type="number" min="0" class="form-control" data-val="true" data-val-number="The field NYStateAmount must be a number." data-val-required="The NYStateAmount field is required." id="WithHoldingAllowanceEntity_NYStateAmount" name="WithHoldingAllowanceEntity.NYStateAmount" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-2">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                New York City Amount
                                                            </div>
                                                            <div class="input-group col-md-3 col-sm-6">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">$</span>
                                                                </div>
                                                                <input type="number" min="0" class="form-control" data-val="true" data-val-number="The field NYCityAmount must be a number." data-val-required="The NYCityAmount field is required." id="WithHoldingAllowanceEntity_NYCityAmount" name="WithHoldingAllowanceEntity.NYCityAmount" value="">
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-2">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                Yonkers amount
                                                            </div>
                                                            <div class="col-md-3 col-sm-6">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">$</span>
                                                                    </div>
                                                                    <input type="number" min="0" class="form-control" data-val="true" data-val-number="The field YonkersAmount must be a number." data-val-required="The YonkersAmount field is required." id="WithHoldingAllowanceEntity_YonkersAmount" name="WithHoldingAllowanceEntity.YonkersAmount" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ol>
                                                <p>
                                                    <strong>Penalty –</strong> A penalty of $500 may be imposed for any false statement you
                                                    make that decreases the amount of money you have withheld
                                                    from your wages. You may also be subject to criminal penalties.
                                                </p>
                                                <p><strong>Employer: Keep this certificate with your records</strong></p>
                                                <p>
                                                    Mark an X in box A and/or box B to indicate why you are sending a copy of this
                                                    form to New York State (see instructions):
                                                </p>

                                                <div class="form-check form-check-inline mt-2">
                                                    <label class="form-check-label " for="claimed"> Employee claimed more than 14 exemption allowances for NYS</label>
                                                    <input class="form-check-input ml-2" type="checkbox" id="claimed" name="claimed">
                                                </div>
                                                <div class="row">
                                                    <label class="col-md-6 col-sm-6 mt-4">
                                                        Employee is a new hire or a rehire First
                                                        date
                                                        employee performed services for pay (mm-dd-yyyy) (see instr.):
                                                        <input class="form-check-input ml-2" type="checkbox" id="hire" name="hire">
                                                    </label>
                                                    <div class="col-md-3 col-sm-6 mt-3 ml-4">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="number" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 mt-2">
                                                        <p>Are dependent health insurance benefits available for this employee? </p>
                                                    </div>
                                                    <div class="withholding">
                                                        <div class="form-check form-check-inline mt-2">
                                                            <input class="form-check-input" type="radio" id="dependent" name="dependent">
                                                            <label class="form-check-label" for="dependent"> Yes </label>
                                                        </div>
                                                        <div class="form-check form-check-inline ml-5 mt-2">
                                                            <input class="form-check-input" type="radio" id="notDependent" name="dependent">
                                                            <label class="form-check-label" for="notDependent"> No </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 mt-4">
                                                        If Yes, enter the date the employee qualifies (mm-dd-yyyy):
                                                    </div>
                                                    <div class="col-md-3 col-sm-6 mt-3 ml-2">
                                                        <input class="ml-3 form-control" type="date">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex my-4">
                        <button class="btn btn-outline-primary btnPrevious" type="button">Previous</button>
                        <button class="btn btn-primary ml-auto btnNext" type="submit">Next</button>
                    </div>
                    <input name="__RequestVerificationToken" type="hidden" value="CfDJ8EuV0NPboZ1Alha0wXfSm4VR2ER6_cbHk5a6xH3z6WeDBD0-RJyhGyUxDnOGS3LibWTdsdyl9m3rAURzXZvgDa4Jo6JvEtmiNsKGud-_gL4OzIJ2eEHfZXLU15IbCv1FfigzES2shwjPtaeoQY1DIuY" /></form>
            </div>

            <div class="tab-pane fade mt-3" id="Disclosure">

                <form id="addFluVaccination" data-ajax="true" data-ajax-method="POST" data-ajax-failure="failed" data-ajax-success="completed" action="/NonSkilled/AddConsents" method="post">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card ">
                                <div class="card-body">
                                    <h3>Affidavit</h3>
                                    <div class="form-group">
                                        <p>
                                            I have applied for a position as a<input type="text" disabled
                                                                                     class="ml-2 mr-2">with HouseCalls HC. All of the
                                            information I have submitted is true to the best of my knowledge.
                                            All certificates are valid (or copies of originals) and all background information is
                                            correct. I authorize House Calls HC to obtain any information regarding and pertaining
                                            to my employment and health status. I understand
                                            that this may include contacting the following to obtain information to verify
                                            signatures, dates, forms and data.
                                        </p>
                                        <ul>
                                            <li>Medical providers (M.D. lab, etc…) </li>
                                            <li>Previous employers</li>
                                            <li>Schools and training programs</li>
                                            <li>Personal and professional references </li>
                                        </ul>
                                        <p>
                                            I further release HouseCalls HC of any liability that may occur as a result of my
                                            personal negligence or as a result of any information that I wrongfully or fraudulently
                                            submitted to HouseCalls HC, or in the course of applying for a position during my
                                            association with them. I understand that any information fraudulently submitted will
                                            result in my immediate termination. As a job applicant/employee of HouseCalls HC I
                                            hereby attest to the fact that I have received no special
                                            inducements, remuneration, or promises thereof to work for this agency. I understand
                                            that I will receive a salary commensurate and also in line with what other employee of
                                            this agency are receiving for similar work and
                                            experience. All other benefits that I may be eligible for will be in accordance with
                                            policies established by HouseCalls HC.
                                        </p>
                                        <p>
                                            Hiring of personnel, salaries and benefits are awarded without regard to race, religion,
                                            disability, marital status, or sexual orientation. HouseCalls HC is an equal opportunity
                                            employer. I have read the preceding statement and I understand and agree
                                            with its contents.
                                        </p>
                                    </div>
                                    <hr />
                                    <div class="mb-3">
                                        <h3>Notice of applicant</h3>
                                    </div>
                                    <div>
                                        Pursuant to Title 10, Section 400.23 of New York Code of Rules and Regulations, HouseCalls
                                        HC is required to conduct a criminal background check of all applicants for employment in
                                        non-licensed positions providing direct resident care and/or supervision.
                                        Pursuant to these regulations we are required to notify you of the following:
                                    </div>
                                    <ol>
                                        <li>
                                            We will submit your fingerprints t the New York State Department of Health and request
                                            the Department of Health to forward such information to the Attorney General of the
                                            United States. The Attorney General will then conduct
                                            a full search of the records of the Federal Bureau of Investigation to ascertain if you
                                            have any record of a criminal conviction.
                                        </li>
                                        <li>
                                            The Attorney General will provide its findings to the New York State Department of
                                            Health, which will in turn forward these results to us. If the background check reveals
                                            that you have been convicted of certain enumerated crimes,
                                            your application for employment will be rejected. If you have been offered provisional
                                            employment, such employment will be terminated.
                                        </li>
                                        <li>
                                            Pursuant to the regulations, you have the right to:
                                            <ul>
                                                <li>
                                                    Obtain a copy of the results of the criminal background check, review the
                                                    information contained and explain same.
                                                </li>
                                                <li>
                                                    Withdraw your application for employment without prejudice at any time before we
                                                    make a decision on your application. In such event we will destroy your
                                                    fingerprint card and any information we may have obtained in connection
                                                    with the criminal background check.
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            The fingerprinting and criminal background checks are conducted at no cost to you.
                                        </li>
                                        <li>
                                            Any information we receive about you as a result of a criminal background check will be
                                            used only for determining your suitability for employment in a position involving direct
                                            patient care or supervision. Such information will be treated as confidential
                                            and will to be disclosed to anyone else except as permitted by law.
                                        </li>
                                        <li>
                                            If your employment application is denied because of information obtained during the
                                            course of a criminal background check we will provide you with a written statement of
                                            our decision and the basis thereof
                                        </li>
                                    </ol>
                                    <p>
                                        <b>
                                            I HAVE RECEIVED A COPY OF THIS NOTICE OF CRIMINAL BACKGROUND
                                            CHECKS ON
                                            THE
                                            DATE SET FORTH BELOW.
                                        </b>
                                    </p>
                                    <hr />
                                    <div class="mb-3">
                                        <h3> Vaccine Declination</h3>
                                    </div>
                                    <p>
                                        <strong>I am declining the Hepatitis B Vaccination</strong>
                                    </p>
                                    <p>
                                        I understand that due to my occupational exposure to blood or other potential infectious
                                        materials, I may be at risk of acquiring Hepatitis B Virus (HBV) infection. I have been
                                        given the opportunity to be vaccinated with the Hepatitis B Vaccine. I have
                                        also been asked if I have questions regarding this information and if I had questions, they
                                        were fully answered to my satisfaction. I have been offered the opportunity to be vaccinated
                                        with the Hepatitis B Vaccine at no charge
                                        to myself.
                                    </p>
                                    <p class="mb-3">
                                        I decline Hepatitis B vaccine at this time. I understand that by declining this vaccine, I
                                        continue to be at risk of acquiring Hepatitis B, a serious disease. If, in the future, while
                                        employed byHouseCalls Home Care, I continue
                                        to have occupational exposure to blood or other potentially infectious materials and I want
                                        to be vaccinated with Hepatitis B vaccine, I can receive the vaccination series at no charge
                                        to me.
                                    </p>

                                    <hr />
                                    <div class="mb-3">
                                        <h3> Rubeola Immunity</h3>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-8">
                                            <label for="inputNamed4">Name:</label>
                                            <input type="text" class="form-control" id="inputNamed4" placeholder="Enter FullName">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">SSN:</label>
                                            <input type="email" class="form-control" id="inputEmail4" placeholder="Enter SSN">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="inputNamed4">DOB:</label>
                                            <input type="date" class="form-control" id="inputNamed4" placeholder="Enter DOB">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Document Proof:</label>
                                            <input type="email" class="form-control" id="inputEmail4" placeholder="Enter SSN">
                                        </div>
                                    </div>
                                    <p class="mb-3">
                                        Rubeola Immunity titer/vaccination is not required for this employee as he/she was born prior
                                        to January 1, 1957.
                                    </p>
                                    <hr />
                                    <div class="mb-3">
                                        <h3> Declination</h3>
                                    </div>
                                    <p class="underline-text"><b>I DO NOT WANT A FLU SHOT:</b></p>
                                    <p>I acknowledge that I am aware of the following facts: </p>
                                    <ul>
                                        <li>
                                            Influenza is a serious respiratory disease; on average, 36,000 Americans die every year
                                            from influenza-related causes.
                                        </li>
                                        <li>
                                            Influenza virus may be shed for up to 24 hours before symptoms begin, increasing the
                                            risk of transmission to others.
                                        </li>
                                        <li>
                                            Some people with influenza have no symptoms, increasing the risk of transmission to
                                            others. Influenza virus changes often, making annual vaccination necessary. Immunity
                                            following vaccination is strongest for 2 to 6 months.
                                            [In California, influenza usually begins circulating in early January and continues
                                            through February or March.]
                                        </li>
                                        <li>
                                            I understand that the influenza vaccine cannot transmit influenza and it does not
                                            prevent all disease
                                        </li>
                                        <li>
                                            I have declined to receive the influenza vaccine for the 2019-2020 season. I
                                            acknowledge that influenza vaccination is recommended by the Centers for Disease Control
                                            and Prevention for all healthcare workers in order to prevent
                                            infection from and transmission of influenza and its complications, including death, to
                                            patients, my coworkers, my family, and my community.
                                        </li>
                                    </ul>
                                    <p>
                                        Knowing these facts, I choose to decline vaccination at this time:
                                    </p>
                                    <p>
                                        I may change my mind and accept vaccination later, if vaccine is available. I have read and
                                        fully understand the information on this declination form. I am declining due to the
                                        following reasons (check all that apply):
                                    </p>
                                    <ul>
                                        <li>I believe I will get influenza if I get thevaccine.</li>
                                        <li>
                                            I do not likeneedles.
                                        </li>
                                        <li>
                                            My philosophical or religious beliefs prohibitvaccination.
                                        </li>
                                        <li>
                                            I have an allergy or medical contraindication to receiving thevaccine.
                                        </li>
                                        <li class="mb-2 mt-2">
                                            Other reason – please tell us:<input type="text" class="col-md-6  form-control">
                                        </li>
                                        <li>
                                            I understand that if I choose to decline the influenza vaccine, and my job duties may
                                            cause me to infect patients or to become infected, I will be required to wear a surgical
                                            mask or respirator, as appropriate, within 6 feet
                                            of patients or in designated areas during influenzaseason.
                                        </li>
                                        <li>
                                            I understand that I may change my mind at any time and accept influenza vaccination, if
                                            vaccine is available.
                                        </li>
                                    </ul>
                                    <hr />
                                    <div class="mb-3">
                                        <h3> W-11 Consents</h3>
                                    </div>
                                    <p>
                                        I certify that I have been unemployed or have not worked for anyone for more than 40 hours
                                        during the 60-day period ending on the
                                        date I began employment with this employer.
                                    </p>
                                    <p>
                                        Under penalties of perjury, I declare that I have examined this affidavit and, to the best of my
                                        knowledge and belief, it is true, correct,
                                        and complete.
                                    </p>
                                </div>
                                <div class=" d-flex mb-3 ml-4">
                                    <input class="form-control col-md-1 " type="text" placeholder="I Agree" id="Consents" name="Consents" value="" />
                                    <p class="ml-2 mt-2">
                                        I have read and agree for
                                        above concent
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex my-4">
                        <button class="btn btn-outline-primary btnPrevious" type="button">Previous</button>
                        <button class="btn btn-primary ml-auto btnNext" type="submit">Next</button>
                    </div>
                    <input name="__RequestVerificationToken" type="hidden" value="CfDJ8EuV0NPboZ1Alha0wXfSm4VR2ER6_cbHk5a6xH3z6WeDBD0-RJyhGyUxDnOGS3LibWTdsdyl9m3rAURzXZvgDa4Jo6JvEtmiNsKGud-_gL4OzIJ2eEHfZXLU15IbCv1FfigzES2shwjPtaeoQY1DIuY" /></form>
            </div>
            <div class="tab-pane fade mt-3" id="DocumentUpload">
                <form id="applicationDocuments" enctype="multipart/form-data" data-ajax="true" data-ajax-method="POST" data-ajax-failure="failed" data-ajax-success="completed" action="/ApplicationDocuments/Create" method="post">

                    <div class="container-fluid p-0 ">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card m-3">
                                    <div class="card-body card-body document card mt-4 ml-3 table-responsive upload">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Document</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <label for="SSNFrontFile">SSN</label>
                                                    </td>
                                                    <td>
                                                        Front  <input class="form-contro" type="file" data-val="true" data-val-required="select file for SSN front" id="SSNFrontFile" name="SSNFrontFile" />
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="SSNFrontFile" data-valmsg-replace="true"></span>
                                                    </td>
                                                    <td>
                                                        Back  <input type="file" class="form-contro" data-val="true" data-val-required="select file for SSN Back" id="SSNBackFile" name="SSNBackFile" />
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="SSNBackFile" data-valmsg-replace="true"></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="DLPPFrontFile">Driving Licence, Passport or Other</label>
                                                    </td>
                                                    <td>
                                                        Front  <input type="file" class="form-contro" data-val="true" data-val-required="select file for Driving Licence, Passport or Other front" id="DLPPFrontFile" name="DLPPFrontFile" />
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="DLPPFrontFile" data-valmsg-replace="true"></span>
                                                    </td>
                                                    <td>
                                                        Back  <input type="file" class="form-contro" data-val="true" data-val-required="select file for Driving Licence, Passport or Other back" id="DLPPBackFile" name="DLPPBackFile" />
                                                        <span class="text-danger field-validation-valid" data-valmsg-for="DLPPBackFile" data-valmsg-replace="true"></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="MedicalReportsFile">Medical Reports</label>
                                                    </td>
                                                    <td colspan="2">
                                                        <input type="file" class="form-contro" id="MedicalReportsFile" name="MedicalReportsFile" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="CertificatesFile">Certificates</label>
                                                    </td>
                                                    <td colspan="2">
                                                        <input type="file" class="form-contro" id="CertificatesFile" name="CertificatesFile" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="OtherFile">Other</label>
                                                    </td>
                                                    <td colspan="2">
                                                        <input type="file" class="form-contro" id="OtherFile" name="OtherFile" />
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex my-4">
                        <button class="btn btn-outline-primary btnPrevious" type="button">Previous</button>
                        <button class="btn btn-primary ml-auto btnNext" id="signaturePopup" type="submit">Next</button>
                    </div>
                    <input name="__RequestVerificationToken" type="hidden" value="CfDJ8EuV0NPboZ1Alha0wXfSm4VR2ER6_cbHk5a6xH3z6WeDBD0-RJyhGyUxDnOGS3LibWTdsdyl9m3rAURzXZvgDa4Jo6JvEtmiNsKGud-_gL4OzIJ2eEHfZXLU15IbCv1FfigzES2shwjPtaeoQY1DIuY" /></form>

                <div class="modal" role="dialog" id="modal">
                    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                        <div class="modal-content" id="modalContent">
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    Signature
                                    <button type="button" class="close" data-dismiss="modal" id="close-modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </h5>
                            </div>
                            <div class="modal-body">
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class=col-md-3 col-sm-3">

                                                 <form id="signaturepad" data-ajax="true" data-ajax-method="POST" data-ajax-failure="failed" data-ajax-success="completed" action="/NonSkilled/AddSignature" method="post">
                                                    <label class="control-label"></label><span class="text-danger">*</span>
                                                    <input hidden class="form-control" type="text" id="Signature" name="Signature" value="" />
                                                    <div class="consentsign"></div>
                                                    <span class="text-danger"></span>
                                                    <button type="button" class="btn btn-danger mb-4 ml-5 consentsignbtnclr">Clear</button>

                                                    <div class="d-flex ml-5">
                                                        <button class="btn btn-primary" id="saveSign" type="submit">Submit</button>
                                                        <button type="button" class="btn btn-secondary ml-4" data-dismiss="modal" id="close-modal" aria-label="Close">Cancel</button>
                                                    </div>
                                                    <input name="__RequestVerificationToken" type="hidden" value="CfDJ8EuV0NPboZ1Alha0wXfSm4VR2ER6_cbHk5a6xH3z6WeDBD0-RJyhGyUxDnOGS3LibWTdsdyl9m3rAURzXZvgDa4Jo6JvEtmiNsKGud-_gL4OzIJ2eEHfZXLU15IbCv1FfigzES2shwjPtaeoQY1DIuY" /></form>

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


    </main>
</div>
</section>
@endsection

@push('styles')
<!--<link rel="stylesheet" href="{{ asset('assets/css/tail.select-default.min.css') }}">-->
<!--<link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.min.css') }}">-->
<!--<link rel="stylesheet" href="{{ asset('assets/css/add-patient.css') }}">-->
<link href="{{ asset('add_patient/add_patient.css') }}" rel="stylesheet" />
<style>
    .errorText {
        color: red;
        /* visibility: hidden; */
    }
</style>
@endpush

@push('scripts')
<!--<script src="{{ asset('assets/js/daterangepicker.min.js') }}"></script>-->
<!--<script src="{{ asset('assets/js/add-patient.js') }}"></script>-->
<!--<script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/js/additional-methods.js') }}"></script>-->
@endpush
