@extends('pages.layouts.app')

@section('content')
<div class="p-3 app-partner">
    <div class="row">
        <div class="col-12 col-sm-12">
                <div class="app-card no-minHeight">
                    <div class="app-card-header">
                        <div class="titleBox">
                            <div class="title">
                                View Employee
                            </div>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label for="EmployeeID" class="label">Employee ID</label>
                                    <div class="input-group">
                                        <h4>{{ $employee->employeeID ?? '--' }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label for="firstName" class="label">First Name</label>
                                    <div class="input-group">
                                        <h4>{{ $employee->first_name ?? '--' }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label for="lastName" class="label">Last Name</label>
                                    <div class="input-group">
                                        <h4>{{ $employee->last_name ?? '--' }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label for="emailID" class="label">Email ID</label>
                                    <div class="input-group">
                                        <h4>{{ $employee->email ?? '--' }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label for="phoneNumber" class="label">Phone Number</label>
                                    <div class="input-group">
                                        <h4>{{ $employee->phone ?? '--' }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label for="dlNumber" class="label">Driving License Number</label>
                                    <div class="input-group">
                                        <h4>{{ $employee->dlNumber ?? '--' }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label for="dob" class="label">DOB</label>
                                    <div class="input-group">
                                        <h4>{{ $employee->dob ? date('m/d/Y', strtotime($employee->dob)) : '--' }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush