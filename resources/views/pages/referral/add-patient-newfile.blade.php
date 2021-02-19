<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../assets/css/fonts/Montserrat.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/line-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/tail.select-default.min.css" />
    <link rel="stylesheet" href="../assets/css/daterangepicker.min.css">
    <link rel="stylesheet" href="../assets/css/sidebar.css">
    <link rel="stylesheet" href="../assets/css/add-patient.css">
    <link rel="stylesheet" href="../assets/css/style.min.css">
    <link rel="stylesheet" href="../assets/css/responsive.min.css">
    <title>Welcome to Doral</title>
</head>

<body>
    <!-- Clinician to Patient pop up -->
    <section class="app">
        <section class="app-aside navbar navbar-dark">
            <div class="sidebar _shrink" id="collapsibleNavbar">
                <div>
                    <div class="logo">
                        <a href="#" class="icon-logo"></a>
                    </div>
                    <ul class="cbp-vimenu">
                        <li title="Dashboard" class="active">
                            <a href="#" class="text-center">
                                <img src="../assets/img/icons/home-sb-select.svg" alt="" class="icon selected">
                                <img src="../assets/img/icons/home-sb.svg" alt="" class="icon noselected">
                                <p class="i-title">Home</p>
                            </a>
                        </li>
                        <li class="parent" title="Services">
                            <a href="javascript:void(0)">
                                <img src="../assets/img/icons/service-sb-select.svg" alt="" class="icon selected">
                                <img src="../assets/img/icons/service-sb.svg" alt="" class="icon noselected">
                                <p class="i-title">Services</p>
                            </a>
                            <ul class="child">
                                <li class="arrow--4"></li>
                                <li><a href="javascript:void(0)">VBC</a></li>
                                <li><a href="javascript:void(0)">MD Order</a></li>
                                <li><a href="javascript:void(0)">Occupational</a></li>
                            </ul>
                        </li>
                        <li title="Create Patients">
                            <a href="javascript:void(0)">
                                <img src="../assets/img/icons/create-patient-sb-select.svg" alt=""
                                    class="icon selected">
                                <img src="../assets/img/icons/create-patient-sb.svg" alt="" class="icon noselected">
                                <p class="i-title">Create Patient</p>
                            </a>
                        </li>
                        <li class="cbp-vicurrent" title="Logout">
                            <a href="javascript:void(0)">
                                <img src="../assets/img/icons/logout-sb-select.svg" alt="" class="icon selected">
                                <img src="../assets/img/icons/logout-sb.svg" alt="" class="icon noselected">
                                <p class="i-title">Logout</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="block d-none">
                <!-- Logo Start -->
                <a href="index.html" title="Welcome to Doral">
                    <img src="../assets/img/logo-white.svg" alt="Welcome to Doral" srcset="../assets/img/logo-white.svg"
                        class="img-fluid">
                </a>
                <!-- Logo End -->
                <i class="las la-times-circle la-3x white d-block d-xl-none d-lg-none d-md-none d-sm-none"
                    id="closeMenu"></i>
            </div>
            <ul class="sidenav d-none">
                <li><a href="dashboard.html" class="nav">Dashboard<span class="dot"></span></a></li>
                <li><a href="patientlist.html" class="nav">Patient List<span class="dot"></span></a></li>
                <li><a href="employee_view.html" class="nav active">Employee<span class="dot"></span></a></li>
                <li data-toggle="collapse" data-target="#caseboard">
                    <a href="javascript:void(0)" data-target="case_board.html" class="nav">
                        Case Board <i class="las la-angle-down _arrow"></i>
                    </a>
                    <ul class="sub collapse" id="caseboard">
                        <li>
                            <a class="_nav" href="reassign.html">Re-Assign <span class="dot"></span></a>
                        </li>
                    </ul>
                </li>
                <li><a href="../login.html" class="nav">Log Out<span class="dot"></span></a></li>
            </ul>
            </div>
            <!-- Left Section End -->
        </section>
        <section class="app-content _new">
            <!-- Right section Start-->
            <header class="app-header-block _fullwidth">
                <div class="app-header">
                    <div class="nav">
                        <button class="navbar-toggler d-none" type="button" data-toggle="collapse"
                            data-target="#collapsibleNavbar" aria-controls="collapsibleNavbar" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon">
                                <i class="las la-bars white"></i>
                            </span></button>
                        <h1 class="title">Clinician</h1>
                    </div>
                    <div>
                        <ul class="menus">
                            <li>
                                <a href="javascript:void(0)" class="notify">
                                    <i class="las la-bell la-3x white"></i>
                                    <span class="number">6</span>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown user-dropdown">
                                    <div class="user dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <span>Hi, Sean</span>
                                        <a href="javascript:void(0)">
                                            <i class="las la-user-circle la-3x ml-2"></i>
                                        </a>
                                    </div>
                                    <div class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Profile</a>
                                        <a class="dropdown-item" href="#">Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="app-title-box _full">
                    <div class="app-title">
                        Add Patient
                    </div>
                </div>
            </header>
            <section class="app-body">
                <!-- multistep form -->
                <div class="create-patient p-4">
                    <div class="row">
                        <div class="col-12 col-sm-1"></div>
                        <div class="col-12 col-sm-10">
                            <form method="post" action="{{ route('referral.store-patient') }}" id="msform">
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
                                            <label>
                                                <input class="with-gap" name="enrollment" type="radio" id="customRadio1"
                                                    value="boarding" />
                                                <span>On Boarding Patient</span>
                                            </label>
                                            <label class="ml-3">
                                                <input class="with-gap" name="enrollment" type="radio" id="customRadio2"
                                                    value="existing_patient" />
                                                <span>Existing Patient</span>
                                            </label>
                                        </div>
                                        <div class="app-card no-shadow no-minHeight mt-3 existing_patient">
                                            <div class="pl-4 pr-4 pb-4 pt-4">
                                                <p class="text-center">Kindly provide MD Order</p>
                                                <div class="row mt-3">
                                                    <div class="col-12 col-sm-3"></div>
                                                    <div class="col-12 col-sm-6">
                                                        <label for="cDate" class="label">Creation Date</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text input-group-text-custom">
                                                                <i class="las la-calendar"></i></span>
                                                            <input type="text"
                                                                class="form-control form-control-lg cDate"
                                                                placeholder="" aria-describedby="" id="cDate"
                                                                name="cDate"><br>
                                                        </div>
                                                        <div class="errorClass cDate mt-1"></div>
                                                    </div>
                                                    <div class="col-12 col-sm-3"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="next" class="next datesubmit cancel-btn m-auto" id="enroll"
                                        style="margin-bottom: 15px;display: block;" value="Next" />
                                </fieldset>
                                <fieldset class="form-card pb-4">
                                    <div class="pl-4 pr-4 pb-4 pt-4">
                                        <h2 class="fs-title">Please select type of services</h2>
                                        <div class="d-flex justify-content-center align-items-center mt-4">
                                            <label>
                                                <input class="with-gap" id="customRadio01" type="radio" name="services"
                                                    value="cdpap" />
                                                <span>CDPAP</span>
                                            </label>
                                            <label class="ml-3">
                                                <input class="with-gap" id="customRadio02" type="radio" name="services"
                                                    value="lhcsa" />
                                                <span>LHCSA</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="if-CDPAP mb-4 p-4">
                                        <p class="pb-3">Please provide us PA/CDPAP employee details to process referral
                                            quickly.</p>
                                        <div class="app-card no-shadow _cdpap mb-3">
                                            <div class="app-card-header-new pt-3 pb-3 pl-4 pr-4">
                                                <div>
                                                    Personal Assistance 1
                                                </div>
                                                <div>
                                                    <a href="javascript:void(0)" data-toggle="tooltip" id="btnAdd"
                                                        class="add-record" data-placement="left" title=""
                                                        data-original-title="Add More">
                                                        <img src="../assets/img/icons/add_more_item.svg" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="p-4">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-4">
                                                            <label for="nameFirst1" class="label">First Name</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text input-group-text-custom" id="firstnames"><i
                                                                        class="las la-user-tie"></i></span>
                                                                <input type="text" class="form-control form-control-lg"
                                                                    placeholder="" aria-label="First Name" value=""
                                                                    aria-describedby="nameFirst1" id="nameFirst1"
                                                                    name="nameFirst1" onkeypress="return (event.charCode > 64 && 
                                                                    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)">
                                                            </div>
                                                            <div class="errorClass nameFirst1 mt-1"></div>
                                                        </div>
                                                        <div class="col-12 col-sm-4">
                                                            <label for="nameMiddle1" class="label">Middle Name</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text input-group-text-custom" id="middlenames"><i
                                                                        class="las la-user-tie"></i></span>
                                                                <input type="text" class="form-control form-control-lg" value=""
                                                                    placeholder="" aria-label="Middle Name"
                                                                    aria-describedby="middle_names" id="nameMiddle1"
                                                                    name="nameMiddle1" onkeypress="return (event.charCode > 64 && 
                                                                    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)">
                                                            </div>
                                                            <div class="errorClass nameMiddle1 mt-1"></div>
                                                        </div>
                                                        <div class="col-12 col-sm-4">
                                                            <label for="nameLast1" class="label">Last Name</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text input-group-text-custom" id="lastnames"><i
                                                                        class="las la-user-tie"></i></span>
                                                                <input type="text" class="form-control form-control-lg"
                                                                    placeholder="" aria-label="nameLast1"
                                                                    aria-describedby="nameLast1" id="nameLast1"
                                                                    name="nameLast1" onkeypress="return (event.charCode > 64 && 
                                                                    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)">
                                                            </div>
                                                            <div class="errorClass nameLast1 mt-1"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-4">
                                                            <label for="Gender" class="label">Gender</label>               
                                                            <div class="d-flex align-items-center">
                                                                <label>
                                                                    <input class="with-gap" name="gender" id="maleGender"
                                                                        type="radio" value="Male" required>
                                                                    <span>Male</span>
                                                                </label>
                                                                <label class="ml-3">
                                                                    <input class="with-gap" name="gender" id="femaleGender"
                                                                        type="radio" value="Female" required>
                                                                    <span>Female</span>
                                                                </label>
                                                            </div>
                                                            <div class="errorClass gender mt-1"></div>
                                                        </div>
                                                        <div class="col-12 col-sm-4">
                                                            <label for="phone" class="label">Phone</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text input-group-text-custom">
                                                                    <i class="las la-phone"></i>
                                                                </span>
                                                                <input type="text" class="form-control form-control-lg"
                                                                    id="phone" name="phone" aria-describedby="">
                                                            </div>
                                                            <div class="errorClass phone mt-1"></div>
                                                        </div>
                                                        <div class="col-12 col-sm-4">
                                                            <label for="email" class="label">Email</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text input-group-text-custom">
                                                                    <i class="las la-envelope"></i></span>
                                                                <input type="email" class="form-control form-control-lg"
                                                                    placeholder="" aria-label="email"
                                                                    aria-describedby="email" id="email" name="email">
                                                            </div>
                                                            <div class="errorClass email mt-1"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="customer_records_dynamic"></div>
                                        <!-- <a href="javascript:void(0)" class="d-flex justify-content-end"><i class="las la-plus-circle la-2x"></i></a> -->
                                    </div>
                                    <input type="button" name="next" id="next" class="next form_next cancel-btn float-right mr-4"
                                        value="Next" />
                                    <input type="button" name="previous" class="previous continue-btn float-left ml-4"
                                        value="Previous" />
                                </fieldset>
                                <fieldset class="form-card pb-4">
                                    <div class="pl-4 pr-4 pb-4 pt-4">
                                        <h2 class="fs-title">Select Insurance Type</h2>
                                        <div class="d-flex justify-content-center align-items-center mt-4">
                                            <label>
                                                <input class="with-gap" name="customRadio02" type="radio" value="hmo" />
                                                <span>HMO</span>
                                            </label>
                                            <label class="ml-3">
                                                <input class="with-gap" name="customRadio02" type="radio"
                                                    value="mltc" />
                                                <span>MLTC</span>
                                            </label>
                                        </div>
                                        <div class="app-card no-shadow no-minHeight mt-3 on_hmo">
                                            <div class="pl-4 pr-4 pb-4 pt-4">
                                                <p>Want to patient change from HMO to MLTC?</p>
                                                <div class="d-flex mt-3">
                                                    <label>
                                                        <input class="with-gap" name="changefrom" type="radio"
                                                            value="" />
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="ml-3">
                                                        <input class="with-gap" name="changefrom" type="radio"
                                                            value="" />
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="previous"
                                        class="previous action-button continue-btn float-left ml-4" value="Previous" />
                                    <input type="button" name="next" class="next cancel-btn float-right mr-4"
                                        value="Next" />
                                </fieldset>
                                <!-- 4th Tab Start Here -->
                                <fieldset class="form-card pb-4">
                                    
                                        <div class="pl-4 pr-4 pb-4 pt-4">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-12 col-sm-4">
                                                        <label for="nameFirst" class="label">First Name</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text input-group-text-custom"><i
                                                                    class="las la-user-tie"></i></span>
                                                            <input type="text" class="form-control form-control-lg"
                                                                placeholder="" aria-label="First Name"
                                                                aria-describedby="nameFirst" id="nameFirst" value=""
                                                                name="nameFirst"
                                                                onkeypress="return (event.charCode > 64 && 
                                                                event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)">
                                                        </div>
                                                        <div class="errorClass nameFirst mt-1"></div>
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <label for="nameMiddle" class="label">Middle Name</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text input-group-text-custom"><i
                                                                    class="las la-user-tie"></i></span>
                                                            <input type="text" class="form-control form-control-lg"
                                                                placeholder="" aria-label="Middle Name"
                                                                aria-describedby="nameMiddle" id="nameMiddle" value=""
                                                                name="nameMiddle"
                                                                onkeypress="return (event.charCode > 64 && 
                                                                event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)">
                                                        </div>
                                                        <div class="errorClass nameMiddle mt-1"></div>
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <label for="nameLast" class="label">Last Name</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text input-group-text-custom">
                                                                <i class="las la-user-tie"></i>
                                                            </span>
                                                            <input type="text" class="form-control form-control-lg"
                                                                placeholder="" aria-label="Last Name"
                                                                aria-describedby="nameLast" id="nameLast"
                                                                name="nameLast"
                                                                onkeypress="return (event.charCode > 64 && 
                                                                event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)">
                                                        </div>
                                                        <div class="errorClass nameLast mt-1"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-12 col-sm-4">
                                                        <label for="Gender" class="label">Gender</label>
                                                        <div class="d-flex align-items-center">
                                                            <label>
                                                                <input class="with-gap" name="gender" id="mgender"
                                                                    type="radio" value="Male" required>
                                                                <span>Male</span>
                                                            </label>
                                                            <label class="ml-3">
                                                                <input class="with-gap" name="gender" id="fgender"
                                                                    type="radio" value="Female" required>
                                                                <span>Female</span>
                                                            </label>
                                                        </div>
                                                        <div class="errorClass gender mt-1"></div>
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <label for="dob" class="label">Date Of Birth</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text input-group-text-custom"
                                                                id="dateofbirth">
                                                                <i class="las la-calendar"></i>
                                                            </span>
                                                            <input type="text" class="form-control form-control-lg"
                                                                id="dob" name="dob" aria-describedby="">
                                                        </div>
                                                        <div class="errorClass dob mt-1"></div>
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <label for="ssn" class="label">SSN Number</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text input-group-text-custom"
                                                                id="ssn_no"><i
                                                                    class="las la-angle-double-right"></i></span>
                                                            <input type="text" class="form-control form-control-lg"
                                                                placeholder="000-00-0000" aria-label="ssn"
                                                                aria-describedby="ssn" id="ssn" name="ssn"
                                                                ng-model="modelssn" ssn-input>
                                                        </div>
                                                        <div class="errorClass ssn mt-1"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-12 col-sm-4">
                                                        <label for="medicare_number" class="label">Medicare
                                                            Number</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text input-group-text-custom"
                                                                id="medicare_no"><i
                                                                    class="las la-angle-double-right"></i></span>
                                                            <input type="text" class="form-control form-control-lg"
                                                                placeholder="" aria-label="medicare_number"
                                                                aria-describedby="medicare_number" id="medicare_number"
                                                                name="medicare_number" onkeypress="return (event.charCode > 47 && 
                                                                event.charCode < 58)">
                                                        </div>
                                                        <div class="errorClass medicare_number mt-1"></div>
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <label for="medicaid_number" class="label">Medicaid
                                                            Number</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text input-group-text-custom"
                                                                id="Medicaid_no"><i
                                                                    class="las la-angle-double-right"></i></span>
                                                            <input type="text" class="form-control form-control-lg"
                                                                placeholder="" aria-label="medicaid_number"
                                                                aria-describedby="medicaid_number" id="medicaid_number"
                                                                name="medicaid_number" maxlength="11" size="11"
                                                                onkeypress="return (event.charCode > 47 && 
                                                                event.charCode < 58)">
                                                        </div>
                                                        <div class="errorClass medicaid_number mt-1"></div>
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
                                                        <div class="errorClass address mt-1"></div>
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
                                                                <option value="">--SELECT--</option>
                                                                <option value="Albany">Albany</option>
                                                                <option value="Montgomery">Montgomery</option>
                                                            </select>
                                                        </div>
                                                        <div class="errorClass state mt-1"></div>
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <label for="city" class="label">City</label>
                                                        <div class="input-group">
                                                            <select name="city" id="city"
                                                                class="form-control form-control-lg">
                                                                <option value="">--SELECT--</option>
                                                                <option value="Cayuga">Cayuga</option>
                                                                <option value="Genesee">Genesee</option>
                                                                <option value="Broome">Broome</option>
                                                            </select>
                                                        </div>
                                                        <div class="errorClass city mt-1"></div>
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
                                                        <div class="errorClass Zip mt-1"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="button" name="previous"
                                            class="previous continue-btn float-left ml-4" value="Previous" />
                                        <input type="submit" id="submit" name="submit"
                                            class="submit float-right mr-4 cancel-btn" value="Submit" />
                                </fieldset>
                                <!-- 4th Tab End Here -->
                            </form>
                        </div>
                        <div class="col-12 col-sm-12"></div>
                    </div>
                </div>
            </section>
        </section>
    </section>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/moment.min.js"></script>
    <script src="../assets/js/daterangepicker.min.js"></script>
    <script src="../assets/js/app.common.min.js"></script>
    <script src="../assets/js/tail.select-full.min.js"></script>
    <script src="../assets/js/jquery.validate.min.js"></script>
    <script src="../assets/js/add-patient.min.js"></script>
    <script>
        $(function () {
            $('#ssn').keyup(function () {
            var val = this.value.replace(/\D/g, '');
            val = val.replace(/^(\d{3})/, '$1-');
            val = val.replace(/-(\d{2})/, '-$1-');
            val = val.replace(/(\d)-(\d{4}).*/, '$1-$2');
            this.value = val;
        });
        $('#phone').keyup(function () {
            var val = this.value.replace(/\D/g, '');
            val = val.replace(/^(\d{3})/, '($1)-');
            val = val.replace(/-(\d{3})/, '-$1-');
            val = val.replace(/(\d)-(\d{4}).*/, '$1-$2');
            this.value = val;
        });
        $('#phone1').keyup(function () {
            var val = this.value.replace(/\D/g, '');
            val = val.replace(/^(\d{3})/, '($1)-');
            val = val.replace(/-(\d{3})/, '-$1-');
            val = val.replace(/(\d)-(\d{4}).*/, '$1-$2');
            this.value = val;
        });
            var message = {
                firstname: 'Please Enter Your First Name',
                middlename: 'Please Enter Your Middle Name',
                lastname: 'Please Enter Your Last Name',
                email: 'Please Enter Email Id',
                phone: 'Please Enter Phone Number',
                gender: 'Please Select Gender',
                dob: 'Please Select Date Of Birth',
                ssn: 'Please Enter Your SSN Number',
                medicare_number: 'Please Enter Your Medicare Number',
                medicaid_number: 'Please Enter Your Medicaid Number',
                address: 'Please Enter Your Address',
                state: 'Please Enter Your State',
                city: 'Please Enter Your City',
                zip: 'Please Enter Your Zip'
            }
            $('.datesubmit').on('click', function (event, element) {
                event.preventDefault()
                var cDate = $('#cDate');
                // Creation Date
                if (cDate.val() == '') {
                    cDate.closest('div').next('div').html(message.dob)
                    cDate.addClass('invalid').prevUntil('.input-group').css({ "color": "red", "border": "1px solid red" });
                } else if (cDate.val() != '') {
                    function myFunction(years) {
                        alert(years)
                    }
                    cDate.removeClass('invalid').prevUntil('.input-group').css({ "color": "#006C76", "border": "1px solid #006C76" });
                    $(".cDate").text("Looks good!").removeClass('errorClass').addClass('valid').addClass('looksGood');
                }
            });
            $('.form_next').on('click', function (event, element) {
                event.preventDefault()
                // Personal Assistance 1
                var fname1 = $('#nameFirst1');
                var mname1 = $('#nameMiddle1');
                var lname1 = $("#nameLast1");
                var gender = document.getElementsByName("gender");
                var mgender = $('#maleGender');
                var email = $('#email');
                var phone = $('#phone');
                // Back-Up Personal Assistance 1
                var fname2 = $('#nameFirst2');
                var mname2 = $('#nameMiddle2');
                var lname2 = $("#nameLast2");
                var gender2 = document.getElementsByName("gender1");
                var mgender2 = $('#maleGender1');
                var email2 = $('#email1');
                var phone1 = $('#phone1');
                
                // Personal Assistance 1
                // First Name1
                if (fname1.val() == '') {
                    fname1.closest('div').next('div').html(message.firstname);
                    fname1.addClass('invalid').prevUntil('.input-group').css({ "color": "red", "border": "1px solid red" });
                } else if (fname1.val() != '') {
                    fname1.removeClass('invalid').prevUntil('.input-group').css({ "color": "#006C76", "border": "1px solid #006C76" });
                    $(".nameFirst1").text("Looks good!").removeClass('errorClass').addClass('valid').addClass('looksGood');
                }
                 // Middle Name1
                 if (mname1.val() == '') {
                    mname1.closest('div').next('div').html(message.middlename);
                    mname1.addClass('invalid').prevUntil('.input-group').css({ "color": "red", "border": "1px solid red" });
                } else if (mname1.val() != '') {
                    mname1.removeClass('invalid').prevUntil('.input-group').css({ "color": "#006C76", "border": "1px solid #006C76" });
                    $(".nameMiddle1").text("Looks good!").removeClass('errorClass').addClass('valid').addClass('looksGood');
                }
                // Last Name
                if (lname1.val() == '') {
                    lname1.closest('div').next('div').html(message.lastname)
                    lname1.addClass('invalid').prevUntil('.input-group').css({ "color": "red", "border": "1px solid red" });
                } else if (lname1.val() != '') {
                    lname1.removeClass('invalid').prevUntil('.input-group').css({ "color": "#006C76", "border": "1px solid #006C76" });
                    $(".nameLast1").text("Looks good!").removeClass('errorClass').addClass('valid').addClass('looksGood');
                }
                // Gender
                if (!(gender[0].checked || gender[1].checked)) {
                    mgender.closest('div').next('div').html(message.gender)
                    mgender.addClass('invalid')
                } else if ((gender[0].checked || gender[1].checked)) {
                    mgender.removeClass('invalid');
                    $(".gender").text("Looks good!").removeClass('errorClass').addClass('valid').addClass('looksGood');
                }
                // Email Id
                if (email.val() == '') {
                    email.closest('div').next('div').html(message.email)
                    email.addClass('invalid').prevUntil('.input-group').css({ "color": "red", "border": "1px solid red" });
                } else if (email.val() != '') {
                    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    if (regex.test(email.val())) {
                        email.removeClass('invalid').prevUntil('.input-group').css({ "color": "#006C76", "border": "1px solid #006C76" });
                        $(".email").text("Looks good!").removeClass('errorClass').addClass('valid').addClass('looksGood');
                    }
                }
                if (phone.val() == '') {
                    phone.closest('div').next('div').html(message.phone)
                    phone.addClass('invalid').prevUntil('.input-group').css({ "color": "red", "border": "1px solid red" });
                } else if (phone.val() != '') {
                    var regex = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;
                    if (regex.test(phone.val())) {
                        phone.removeClass('invalid').prevUntil('.input-group').css({ "color": "#006C76", "border": "1px solid #006C76" });
                        $(".phone").text("Looks good!").removeClass('errorClass').addClass('valid').addClass('looksGood');
                    }
                }
                // Back-Up Personal Assistance 1
                // First Name1
                if (fname2.val() == '') {
                    fname2.closest('div').next('div').html(message.firstname);
                    fname2.addClass('invalid').prevUntil('.input-group').css({ "color": "red", "border": "1px solid red" });
                } else if (fname2.val() != '') {
                    fname2.removeClass('invalid').prevUntil('.input-group').css({ "color": "#006C76", "border": "1px solid #006C76" });
                    $(".nameFirst2").text("Looks good!").removeClass('errorClass').addClass('valid').addClass('looksGood');
                }
                 // Middle Name1
                 if (mname2.val() == '') {
                    mname2.closest('div').next('div').html(message.middlename);
                    mname2.addClass('invalid').prevUntil('.input-group').css({ "color": "red", "border": "1px solid red" });
                } else if (mname2.val() != '') {
                    mname2.removeClass('invalid').prevUntil('.input-group').css({ "color": "#006C76", "border": "1px solid #006C76" });
                    $(".nameMiddle2").text("Looks good!").removeClass('errorClass').addClass('valid').addClass('looksGood');
                }
                // Last Name
                if (lname2.val() == '') {
                    lname2.closest('div').next('div').html(message.lastname)
                    lname2.addClass('invalid').prevUntil('.input-group').css({ "color": "red", "border": "1px solid red" });
                } else if (lname2.val() != '') {
                    lname2.removeClass('invalid').prevUntil('.input-group').css({ "color": "#006C76", "border": "1px solid #006C76" });
                    $(".nameLast2").text("Looks good!").removeClass('errorClass').addClass('valid').addClass('looksGood');
                }
                // Gender
                if (!(gender2[0].checked || gender2[1].checked)) {
                    mgender2.closest('div').next('div').html(message.gender)
                    mgender2.addClass('invalid')
                } else if ((gender2[0].checked || gender2[1].checked)) {
                    mgender2.removeClass('invalid');
                    $(".gender1").text("Looks good!").removeClass('errorClass').addClass('valid').addClass('looksGood');
                }
                // Email Id
                if (email2.val() == '') {
                    email2.closest('div').next('div').html(message.email)
                    email2.addClass('invalid').prevUntil('.input-group').css({ "color": "red", "border": "1px solid red" });
                } else if (email2.val() != '') {
                    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    if (regex.test(email2.val())) {
                        email2.removeClass('invalid').prevUntil('.input-group').css({ "color": "#006C76", "border": "1px solid #006C76" });
                        $(".email1").text("Looks good!").removeClass('errorClass').addClass('valid').addClass('looksGood');
                    }
                }
                if (phone1.val() == '') {
                    phone1.closest('div').next('div').html(message.phone)
                    phone1.addClass('invalid').prevUntil('.input-group').css({ "color": "red", "border": "1px solid red" });
                } else if (phone1.val() != '') {
                    var regex = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;
                    if (regex.test(phone1.val())) {
                        phone1.removeClass('invalid').prevUntil('.input-group').css({ "color": "#006C76", "border": "1px solid #006C76" });
                        $(".phone1").text("Looks good!").removeClass('errorClass').addClass('valid').addClass('looksGood');
                    }
                }
                
            });
            $('#submit').on('click', function (event, element) {
                var fname = $('#nameFirst');
                var mname = $('#nameMiddle');
                var lname = $("#nameLast");
                var gender = document.getElementsByName("gender");
                var mgender = $('#mgender');
                var dob = $("#dob");
                var ssn = $("#ssn");
                var medicare_number = $("#medicare_number");
                var medicaid_number = $("#medicaid_number");
                var ssn = $("#ssn");
                var address = $("#address_1");
                var state = $("#state");
                var city = $("#city");
                var zip = $("#Zip");
                

                // First Name
                if (fname.val() == '') {
                    fname.closest('div').next('div').html(message.firstname);
                    fname.addClass('invalid').prevUntil('.input-group').css({ "color": "red", "border": "1px solid red" });
                } else if (fname.val() != '') {
                    fname.removeClass('invalid').prevUntil('.input-group').css({ "color": "#006C76", "border": "1px solid #006C76" });
                    $(".nameFirst").text("Looks good!").removeClass('errorClass').addClass('valid').addClass('looksGood');
                }
                // Middle Name
                if (mname.val() == '') {
                    mname.closest('div').next('div').html(message.middlename);
                    mname.addClass('invalid').prevUntil('.input-group').css({ "color": "red", "border": "1px solid red" });
                } else if (mname.val() != '') {
                    mname.removeClass('invalid').prevUntil('.input-group').css({ "color": "#006C76", "border": "1px solid #006C76" });
                    $(".nameMiddle").text("Looks good!").removeClass('errorClass').addClass('valid').addClass('looksGood');
                }
                // Last Name
                if (lname.val() == '') {
                    lname.closest('div').next('div').html(message.lastname)
                    lname.addClass('invalid').prevUntil('.input-group').css({ "color": "red", "border": "1px solid red" });
                } else if (lname.val() != '') {
                    lname.removeClass('invalid').prevUntil('.input-group').css({ "color": "#006C76", "border": "1px solid #006C76" });
                    $(".nameLast").text("Looks good!").removeClass('errorClass').addClass('valid').addClass('looksGood');
                }
                // gender

                if (!(gender[0].checked || gender[1].checked)) {
                    mgender.closest('div').next('div').html(message.gender)
                    mgender.addClass('invalid')
                } else if ((gender[0].checked || gender[1].checked)) {
                    mgender.removeClass('invalid');
                    $(".gender").text("Looks good!").removeClass('errorClass').addClass('valid').addClass('looksGood');
                }
                // dob
                if (dob.val() == '') {
                    dob.closest('div').next('div').html(message.dob)
                    dob.addClass('invalid').prevUntil('.input-group').css({ "color": "red", "border": "1px solid red" });
                } else if (dob.val() != '') {
                    function myFunction(years) {
                        alert(years)
                    }
                    dob.removeClass('invalid').prevUntil('.input-group').css({ "color": "#006C76", "border": "1px solid #006C76" });
                    $(".dob").text("Looks good!").removeClass('errorClass').addClass('valid').addClass('looksGood');
                }
                // ssn

                if (ssn.val() == '') {
                    ssn.closest('div').next('div').html(message.ssn)
                    ssn.addClass('invalid').prevUntil('.input-group').css({ "color": "red", "border": "1px solid red" });
                } else if (ssn.val() != '') {
                    var regex = /^(?!000|666)[0-8][0-9]{2}-(?!00)[0-9]{2}-(?!0000)[0-9]{4}$/;
                    if (regex.test(ssn.val())) {
                        ssn.removeClass('invalid').prevUntil('.input-group').css({ "color": "#006C76", "border": "1px solid #006C76" });
                        $(".ssn").text("Looks good!").removeClass('errorClass').addClass('valid').addClass('looksGood');
                    }
                }
                // Medicare Number
                if (medicare_number.val() == '') {
                    medicare_number.closest('div').next('div').html(message.medicare_number)
                    medicare_number.addClass('invalid').prevUntil('.input-group').css({ "color": "red", "border": "1px solid red" });
                } else if (medicare_number.val() != '') {
                    medicare_number.removeClass('invalid').prevUntil('.input-group').css({ "color": "#006C76", "border": "1px solid #006C76" });
                    $(".medicare_number").text("Looks good!").removeClass('errorClass').addClass('valid').addClass('looksGood');
                }
                // Medicaid Number
                if (medicaid_number.val() == '') {
                    medicaid_number.closest('div').next('div').html(message.medicaid_number)
                    medicaid_number.addClass('invalid').prevUntil('.input-group').css({ "color": "red", "border": "1px solid red" });
                } else if (medicaid_number.val() != '') {
                    medicaid_number.removeClass('invalid').prevUntil('.input-group').css({ "color": "#006C76", "border": "1px solid #006C76" });
                    $(".medicaid_number").text("Looks good!").removeClass('errorClass').addClass('valid').addClass('looksGood');
                }
                // address
                if (address.val() == '') {
                    address.closest('div').next('div').html(message.address)
                    address.addClass('invalid').prevUntil('.input-group').css({ "color": "red", "border": "1px solid red" });
                } else if (address.val() != '') {
                    address.removeClass('invalid').prevUntil('.input-group').css({ "color": "#006C76", "border": "1px solid #006C76" });
                    $(".address").text("Looks good!").removeClass('errorClass').addClass('valid').addClass('looksGood');
                }
                // state
                if (state.val() == '') {
                    state.closest('div').next('div').html(message.state)
                    state.addClass('invalid').prevUntil('.input-group').css({ "color": "red", "border": "1px solid red" });
                } else if (state.val() != '') {
                    state.removeClass('invalid').prevUntil('.input-group').css({ "color": "#006C76", "border": "1px solid #006C76" });
                    $(".state").text("Looks good!").removeClass('errorClass').addClass('valid').addClass('looksGood');
                }
                // city
                if (city.val() == '') {
                    city.closest('div').next('div').html(message.city)
                    city.addClass('invalid').prevUntil('.input-group').css({ "color": "red", "border": "1px solid red" });
                } else if (city.val() != '') {
                    city.removeClass('invalid').prevUntil('.input-group').css({ "color": "#006C76", "border": "1px solid #006C76" });
                    $(".city").text("Looks good!").removeClass('errorClass').addClass('valid').addClass('looksGood');
                }
                // zip
                if (zip.val() == '') {
                    zip.closest('div').next('div').html(message.zip)
                    zip.addClass('invalid').prevUntil('.input-group').css({ "color": "red", "border": "1px solid red" });
                } else if (zip.val() != '') {
                    zip.removeClass('invalid').prevUntil('.input-group').css({ "color": "#006C76", "border": "1px solid #006C76" });
                    $(".Zip").text("Looks good!").removeClass('errorClass').addClass('valid').addClass('looksGood');
                }
            });
            $("#btnAdd").bind("click", function () {
                var div = $("<div />");
                div.html(GetDynamicTextBox(""));
                $(".customer_records_dynamic").append(div);
            });
           
            $('input[name="dob"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                autoUpdateInput: false,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            }, function (start, end, label) {
                var years = moment().diff(start, 'years');
                // alert("You are " + years + " years old!");
                if (years <= 15) {
                    $('#myModal').modal({
                        keyboard: false
                    })
                }
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
            $('input[name="cDate"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                autoUpdateInput: false,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            }, function (start, end, label) {
                var years = moment().diff(start, 'years');
                // alert("You are " + years + " years old!");

            });
        });
        var count = 0;
        function GetDynamicTextBox(value) {
            return '<div class="app-card no-shadow _cdpap mb-3"><div class="app-card-header-new pt-3 pb-3 pl-4 pr-4" id="pa' + count++ + '"><div>Back-Up Personal Assistance 1</div><div><a href="javascript:void(0)" data-toggle="tooltip" id="btnAdd" class="remove-record" data-placement="left" title="" data-original-title="Add More"><img src="../assets/img/icons/remove_row.svg" alt=""></a></div></div><div class="p-4"><div class="form-group"><div class="row"><div class="col-12 col-sm-4"><label for="nameFirst2" class="label">First Name</label><div class="input-group"><span class="input-group-text input-group-text-custom"><i class="las la-user-tie"></i></span> <input type="text" class="form-control form-control-lg" placeholder="" aria-label="First Name" value="" aria-describedby="nameFirst2" id="nameFirst2" name="nameFirst2" onkeypress="return 64<event.charCode&&event.charCode<91||96<event.charCode&&event.charCode<123"></div><div class="errorClass nameFirst2 mt-1"></div></div><div class="col-12 col-sm-4"><label for="nameMiddle2" class="label">Middle Name</label><div class="input-group"><span class="input-group-text input-group-text-custom"><i class="las la-user-tie"></i></span> <input type="text" class="form-control form-control-lg" value="" placeholder="" aria-label="Middle Name" aria-describedby="middle_names" id="nameMiddle2" name="nameMiddle2" onkeypress="return 64<event.charCode&&event.charCode<91||96<event.charCode&&event.charCode<123"></div><div class="errorClass nameMiddle2 mt-1"></div></div><div class="col-12 col-sm-4"><label for="nameLast2" class="label">Last Name</label><div class="input-group"><span class="input-group-text input-group-text-custom"><i class="las la-user-tie"></i></span> <input type="text" class="form-control form-control-lg" placeholder="" aria-label="nameLast2" aria-describedby="nameLast2" id="nameLast2" name="nameLast2" onkeypress="return 64<event.charCode&&event.charCode<91||96<event.charCode&&event.charCode<123"></div><div class="errorClass nameLast2 mt-1"></div></div></div></div><div class="form-group"><div class="row"><div class="col-12 col-sm-4"><label for="Gender" class="label">Gender</label><div class="d-flex align-items-center"><label><input class="with-gap" name="gender1" id="maleGender1" type="radio" value="Male" required> <span>Male</span></label> <label class="ml-3"><input class="with-gap" name="gender1" id="femaleGender1" type="radio" value="Female" required> <span>Female</span></label></div><div class="errorClass gender1 mt-1"></div></div><div class="col-12 col-sm-4"><label for="phone1" class="label">Phone</label><div class="input-group"><span class="input-group-text input-group-text-custom"><i class="las la-phone"></i> </span><input type="text" class="form-control form-control-lg" id="phone1" name="phone1" aria-describedby=""></div><div class="errorClass phone1 mt-1"></div></div><div class="col-12 col-sm-4"><label for="email1" class="label">Email</label><div class="input-group"><span class="input-group-text input-group-text-custom"><i class="las la-envelope"></i></span> <input type="email1" class="form-control form-control-lg" placeholder="" aria-label="email1" aria-describedby="email1" id="email1" name="email1"></div><div class="errorClass email1 mt-1"></div></div></div></div></di></div>'
        }
    </script>
    <div class="modal" tabindex="-1" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">You are not elegible</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="font-weight-bold">Your age is 16 year.</p>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
</body>

</html>

