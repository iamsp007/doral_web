@extends('pages.layouts.app')

@section('content')
    <div class="app-admin-dashboard m-0">
        <div class="pad-admin">
            <div class="row">
                <div class="col-12">
                    <ul class="specs">
                        <!-- Clinician (Assigned Roles) -->
                        <li>
                            <a href="javascript:void(0)" class="app-card">
                                <div class="app-card-body">
                                    <div class="_block">
                                        <div class="sideLeft">
                                            <div class="_t1">Total Employees</div>
                                            <h1 class="_t2 red">{{ $total ?? 0 }}</h1>
                                            <button onclick="window.location='{{ route('employees.list') }}'" type="submit" class="btn btn-outline-red btn-outline-admin mt-3"
                                                    name="signup">VIEW ALL</button>
                                        </div>
                                        <div class="sideRight">
                                            <div class="icons border-red">
                                                <img src="{{ asset('assets/img/icons/clinician.svg') }}" alt=""
                                                     srcset="{{ asset('assets/img/icons/clinician.svg') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- Administration (Assigned Roles) -->
                        <li>
                            <a href="javascript:void(0)" class="app-card">
                                <div class="app-card-body">
                                    <div class="_block">
                                        <div class="sideLeft">
                                            <div class="_t1">Active Employees</div>
                                            <h1 class="_t2 purple">{{ isset($employee[1]) ? $employee[1]['total'] : 0 }}</h1>
                                            <button onclick="window.location='{{ route('employees.list') }}'" type="submit" class="btn btn-outline-purple btn-outline-admin mt-3"
                                                    name="signup">VIEW ALL</button>
                                        </div>
                                        <div class="sideRight">
                                            <div class="icons border-purple">
                                                <img src="{{ asset('assets/img/icons/doctor-icon.svg') }}" alt=""
                                                     srcset="{{ asset('assets/img/icons/doctor-icon.svg') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- Co-ordinator (Assigned Roles) -->
                        <li>
                            <a href="javascript:void(0)" class="app-card">
                                <div class="app-card-body">
                                    <div class="_block">
                                        <div class="sideLeft">
                                            <div class="_t1">Deactivate Employees</div>
                                            <h1 class="_t2 red">{{ isset($employee[2]) ? $employee[2]['total'] : 0 }}</h1>
                                            <button onclick="window.location='{{ route('employees.list') }}'" type="submit" class="btn btn-outline-red btn-outline-admin mt-3"
                                                    name="signup">VIEW ALL</button>
                                        </div>
                                        <div class="sideRight">
                                            <div class="icons border-red">
                                                <img src="{{ asset('assets/img/icons/appointment_cal.svg') }}" alt=""
                                                     srcset="{{ asset('assets/img/icons/appointment_cal.svg') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- Patients (Assigned Roles) -->
                        <li>
                            <a href="javascript:void(0)" class="app-card">
                                <div class="app-card-body">
                                    <div class="_block">
                                        <div class="sideLeft">
                                            <div class="_t1">Total Doral Requests</div>
                                            <h1 class="_t2 purple">5000</h1>
                                            <button type="submit" class="btn btn-outline-purple btn-outline-admin mt-3"
                                                    name="signup">VIEW ALL</button>
                                        </div>
                                        <div class="sideRight">
                                            <div class="icons border-prple">
                                                <img src="{{ asset('assets/img/icons/patient.svg') }}" alt=""
                                                     srcset="{{ asset('assets/img/icons/patient.svg') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- By Designation -->
                        <li>
                            <a href="javascript:void(0)" class="app-card">
                                <div class="app-card-body">
                                    <div class="_block">
                                        <div class="d-flex align-items-center justify-content-between w-100">
                                            <div class="_t1 red mr-2">Accepted Requests</div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between w-100">
                                            <div class="sideLeft">
                                                <div class="_np">
                                                    <h1 class="_t2 red">1000</h1>
                                                    <button type="submit" class="btn btn-outline-red btn-outline-admin mt-3"
                                                            name="signup">VIEW ALL</button>
                                                </div>
                                                
                                            </div>
                                            <div class="sideRight">
                                                <div class="icons border-red">
                                                    <img src="{{ asset('assets/img/icons/designation.svg') }}" alt=""
                                                         srcset="{{ asset('assets/img/icons/designation.svg') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- By Permission -->
                        <li>
                            <a href="javascript:void(0)" class="app-card">
                                <div class="app-card-body">
                                    <div class="_block">
                                        <div class="d-flex align-items-center justify-content-between w-100">
                                            <div class="_t1 purple mr-2">Cancelled Requests</div>

                                        </div>
                                        <div class="d-flex align-items-center justify-content-between w-100">
                                            <div class="sideLeft">
                                                <div class="_create">
                                                    <h1 class="_t2 purple">400</h1>
                                                    <button type="submit" class="btn btn-outline-purple btn-outline-admin mt-3"
                                                            name="signup">VIEW ALL</button>
                                                </div>
                                                
                                            </div>
                                            <div class="sideRight">
                                                <div class="icons border-purple">
                                                    <img src="{{ asset('assets/img/icons/permission.svg') }}" alt=""
                                                         srcset="{{ asset('assets/img/icons/permission.svg') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="pad-admin sky_bg">
            <!-- Employees -->
            <h1 class="title">Running Visits</h1>
            <div class="row">
                <div class="col-12">
                    <ul class="specs">
                        <!-- By Designation -->
                        <li>
                            <a href="javascript:void(0)" class="app-card">
                                <div class="app-card-body">
                                    <div class="_block">
                                        <div class="d-flex align-items-center justify-content-between w-100">
                                            <div class="_t1 red mr-2">Running</div>
                                            <div class="dropdown-150">

                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between w-100">
                                            <div class="sideLeft">
                                                <div class="_np">
                                                    <h1 class="_t2 orange">50</h1>
                                                    <button type="submit" class="btn btn-outline-orange btn-outline-admin mt-3"
                                                            name="signup">VIEW ALL</button>
                                                </div>
                                                
                                            </div>
                                            <div class="sideRight">
                                                <div class="icons border-orange">
                                                    <img src="{{ asset('assets/img/icons/designation.svg') }}" alt=""
                                                         srcset="{{ asset('assets/img/icons/designation.svg') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- Total Employees -->
                        <li>
                            <a href="javascript:void(0)" class="app-card">
                                <div class="app-card-body">
                                    <div class="_block">
                                        <div class="sideLeft">
                                            <div class="_t1">Completed</div>
                                            <h1 class="_t2 purple">40</h1>
                                            <button type="submit" class="btn btn-outline-purple btn-outline-admin mt-3"
                                                    name="signup">VIEW ALL</button>
                                        </div>
                                        <div class="sideRight">
                                            <div class="icons border-prple">
                                                <img src="{{ asset('assets/img/icons/employee.svg') }}" alt=""
                                                     srcset="{{ asset('assets/img/icons/employee.svg') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- By Permission -->
                        <li>
                            <a href="javascript:void(0)" class="app-card">
                                <div class="app-card-body">
                                    <div class="_block">
                                        <div class="d-flex align-items-center justify-content-between w-100">
                                            <div class="_t1 orange mr-2">On Hold</div>

                                        </div>
                                        <div class="d-flex align-items-center justify-content-between w-100">
                                            <div class="sideLeft">
                                                <div class="_create">
                                                    <h1 class="_t2 orange">15</h1>
                                                    <button type="submit" class="btn btn-outline-orange btn-outline-admin mt-3"
                                                            name="signup">VIEW ALL</button>
                                                </div>
                                                
                                            </div>
                                            <div class="sideRight">
                                                <div class="icons border-orange">
                                                    <img src="{{ asset('assets/img/icons/permission.svg') }}" alt=""
                                                         srcset="{{ asset('assets/img/icons/permission.svg') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

    </div>
@endsection
