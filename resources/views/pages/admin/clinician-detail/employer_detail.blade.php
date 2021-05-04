<!-- Applicant Details Start -->
<div class="tab-pane fade" id="Employer_detail" role="tabpanel" aria-labelledby="v-pills-Employer_detail-tab">
    <div class="app-card" style="min-height: auto;">
        <div class="card-header" id="step2">
            <div class="d-flex align-items-center">
                <img src="/assets/img/icons/applicant-clinician.svg" alt="" srcset="/assets/img/icons/applicant-clinician.svg" class="_icon mr-2"></a>Employer Details
            </div>
        </div>
        <div class="card-body collapse show mt-3" id="collapseWork" aria-labelledby="collapseWork"
            data-parent="#profileAccordion">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="employee-details-tab" data-toggle="tab" href="#employee-details" role="tab" aria-controls="employee-details" aria-selected="true">DETAILS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="position-details-tab" data-toggle="tab" href="#position-details" role="tab" aria-controls="position-details" aria-selected="false">POSITION</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="employee-details" role="tabpanel" aria-labelledby="employee-details-tab">
                    <div class="row mt-3">
                        <div class="col-12 col-sm-4">
                            <div>
                            <div class="d-flex align-items-center">
                                <div>
                                    <i class="las la-user-nurse circle-icon"></i>
                                </div>
                                <div>
                                    <h3 class="_title">Address</h3>
                                    <h1 class="_detail">{{ isset($employer_detail->address) ? $employer_detail->address : null }}</h1>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <i class="las la-user-nurse circle-icon"></i>
                                    </div>
                                    <div>
                                        <h3 class="_title">Phone No</h3>
                                        <h1 class="_detail">{{ isset($employer_detail->phoneNo) ? $employer_detail->phoneNo : null }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <i class="las la-angle-double-right circle-icon"></i>
                                    </div>
                                    <div>
                                        <h3 class="_title">Supervisor</h3>
                                        <h1 class="_detail">{{ isset($employer_detail->supervisor) ? getSsn($employer_detail->supervisor) : null }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 col-sm-4">
                            <div>
                            <div class="d-flex align-items-center">
                                <div>
                                    <i class="las la-phone  circle-icon"></i>
                                </div>
                                <div>
                                    <h3 class="_title">Company Name</h3>
                                    <h1 class="_detail">{{ isset($employer_detail->companyName) ? getPhone($employer_detail->companyName) : null }}</h1>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="position-details" role="tabpanel" aria-labelledby="position-details-tab">
                <ul>
                    <li>
                        <div class="_card mt-3">
                            <div class="_card_header">
                                <div class="title-head">Position Details</div>
                            </div>
                            <div class="_card_body">
                                <div class="row">
                                    <div class="col-12 col-sm-12">
                                        <div class="d-flex align-items-center mb-3">
                                        <div>
                                            <i class="las la-map-marker circle-icon"></i>
                                        </div>
                                        <div>
                                            <h3 class="_title">Date</h3>
                                            <h1 class="_detail">
                                                {{ isset($employer_detail->date) ? $employer_detail->date : null }}
                                            </h1>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-12">
                                        <div class="d-flex align-items-center mb-3">
                                        <div>
                                            <i class="las la-map-marker circle-icon"></i>
                                        </div>
                                        <div>
                                            <h3 class="_title">Position</h3>
                                            <h1 class="_detail">
                                                {{ isset($employer_detail->position) ? $employer_detail->position : null }}
                                            </h1>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

            