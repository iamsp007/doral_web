<div class="tab-pane fade" id="EducationDetails" role="tabpanel"  aria-labelledby="v-pills-EducationDetails-tab">
    <div class="app-card" style="min-height: auto;">
        <div class="card-header" id="step2">
            <div class="d-flex align-items-center">
            <img src="/assets/img/icons/education-clinician.svg" alt=""
                srcset="/assets/img/icons/education-clinician.svg" class="_icon mr-2"></a>
                Education Details
            </div>
        </div>
        <div class="card-body collapse show mt-3" id="collapseWork" aria-labelledby="collapseWork"
            data-parent="#profileAccordion">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="Details-tab" data-toggle="tab" href="#MEDICALINSTITUTE" role="tab" aria-controls="Details" aria-selected="true">MEDICAL INSTITUTE</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Address-tab" data-toggle="tab" href="#RESIDENCYINSTITUTE" role="tab" aria-controls="Address" aria-selected="false">RESIDENCY INSTITUTE</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Reference-tab" data-toggle="tab" href="#FELLOWSHIPINSTITUTE" role="tab" aria-controls="Reference" aria-selected="false">FELLOWSHIP INSTITUTE</a>
            </li>
            </ul>
            <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="MEDICALINSTITUTE" role="tabpanel" aria-labelledby="MEDICALINSTITUTE-tab">
                <ul>
                    <li>
                        <div class="_card mt-3">
                        <div class="_card_header">
                            <div class="title-head">MEDICAL INSTITUTE</div>
                        </div>
                        <div class="_card_body">
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <div class="d-flex align-items-center">
                                    <div>
                                        <i class="las la-university circle-icon"></i>
                                    </div>
                                    <div>
                                        <h3 class="_title">Name of Institute</h3>
                                        <h1 class="_detail">{{ isset($data->education->medical_institute_name) ? $data->education->medical_institute_name : null }}</h1>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="d-flex align-items-center">
                                    <div>
                                        <i class="las la-angle-double-right circle-icon"></i>
                                    </div>
                                    <div>
                                        <h3 class="_title">Year Started</h3>
                                        <h1 class="_detail">{{ isset($data->education->medical_institute_year_started) ? $data->education->medical_institute_year_started : null }}</h1>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="d-flex align-items-center">
                                    <div>
                                        <i class="las la-angle-double-right circle-icon"></i>
                                    </div>
                                    <div>
                                        <h3 class="_title">Year Completed</h3>
                                        <h1 class="_detail">{{ isset($data->education->medical_institute_year_completed) ? $data->education->medical_institute_year_completed : null }}</h1>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-sm-12">
                                    <div class="d-flex align-items-center mb-3">
                                    <div>
                                        <i class="las la-map-marker circle-icon"></i>
                                    </div>
                                    <div>
                                        <h3 class="_title">Address</h3>
                                        <h1 class="_detail">
                                            {{ isset($data->education->medical_institute_address) ? $data->education->medical_institute_address : null }}
                                            <a class="btn btn-info btn-sm ml-2" data-toggle="collapse" href="#collapseExample1" aria-expanded="true"><i class="las la-map-marker"></i>View
                                            Map</a>
                                        </h1>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse mb-4" id="collapseExample1">
                                <div class="card card-body">
                                    <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%"
                                    height="200" frameborder="0" scrolling="no" marginheight="0"
                                    marginwidth="0"
                                    src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <div class="d-flex align-items-center">
                                    <div>
                                        <i class="las la-angle-double-right circle-icon"></i>
                                    </div>
                                    <div>
                                        <h3 class="_title">City</h3>
                                        <h1 class="_detail">{{ isset($data->education->medical_institute_city->city) ? $data->education->medical_institute_city->city : null }}</h1>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="d-flex align-items-center">
                                    <div>
                                        <i class="las la-angle-double-right circle-icon"></i>
                                    </div>
                                    <div>
                                        <h3 class="_title">State</h3>
                                        <h1 class="_detail">{{ isset($data->education->medical_institute_state->state) ? $data->education->medical_institute_state->state : null }}</h1>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="tab-pane fade" id="RESIDENCYINSTITUTE" role="tabpanel" aria-labelledby="RESIDENCYINSTITUTE-tab">
                <ul>
                    <li>
                        <div class="_card mt-3">
                        <div class="_card_header">
                            <div class="title-head">RESIDENCY INSTITUTE</div>
                        </div>
                        <div class="_card_body">
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <div class="d-flex align-items-center">
                                    <div>
                                        <i class="las la-university circle-icon"></i>
                                    </div>
                                    <div>
                                        <h3 class="_title">Name of Institute</h3>
                                        <h1 class="_detail">{{ isset($data->education->residency_institute_name) ? $data->education->residency_institute_name : null }}</h1>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="d-flex align-items-center">
                                    <div>
                                        <i class="las la-angle-double-right circle-icon"></i>
                                    </div>
                                    <div>
                                        <h3 class="_title">Year Started</h3>
                                        <h1 class="_detail">{{ isset($data->education->residency_institute_year_started) ? $data->education->residency_institute_year_started : null }}</h1>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="d-flex align-items-center">
                                    <div>
                                        <i class="las la-angle-double-right circle-icon"></i>
                                    </div>
                                    <div>
                                        <h3 class="_title">Year Completed</h3>
                                        <h1 class="_detail">{{ isset($data->education->residency_institute_year_completed) ? $data->education->residency_institute_year_completed : null }}</h1>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-sm-12">
                                    <div class="d-flex align-items-center mb-3">
                                    <div>
                                        <i class="las la-map-marker circle-icon"></i>
                                    </div>
                                    <div>
                                        <h3 class="_title">Address</h3>
                                        <h1 class="_detail">
                                            {{ isset($data->education->residency_institute_address) ? $data->education->residency_institute_address : null }}
                                            <a class="btn btn-info btn-sm ml-2" data-toggle="collapse" href="#collapseExample12" aria-expanded="true"><i class="las la-map-marker"></i>View
                                            Map</a>
                                        </h1>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse mb-4" id="collapseExample12">
                                <div class="card card-body">
                                    <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%"
                                    height="200" frameborder="0" scrolling="no" marginheight="0"
                                    marginwidth="0"
                                    src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <div class="d-flex align-items-center">
                                    <div>
                                        <i class="las la-angle-double-right circle-icon"></i>
                                    </div>
                                    <div>
                                        <h3 class="_title">City</h3>
                                        <h1 class="_detail">{{ isset($data->education->residency_institute_city->city) ? $data->education->residency_institute_city->city : null }}</h1>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="d-flex align-items-center">
                                    <div>
                                        <i class="las la-angle-double-right circle-icon"></i>
                                    </div>
                                    <div>
                                        <h3 class="_title">State</h3>
                                        <h1 class="_detail">{{ isset($data->education->residency_institute_state->state) ? $data->education->residency_institute_state->state : null }}</h1>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="tab-pane fade" id="FELLOWSHIPINSTITUTE" role="tabpanel" aria-labelledby="FELLOWSHIPINSTITUTE-tab">
                <ul>
                    <li>
                        <div class="_card mt-3">
                        <div class="_card_header">
                            <div class="title-head">FELLOWSHIP INSTITUTE</div>
                        </div>
                        <div class="_card_body">
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <div class="d-flex align-items-center">
                                    <div>
                                        <i class="las la-university circle-icon"></i>
                                    </div>
                                    <div>
                                        <h3 class="_title">Name of Institute</h3>
                                        <h1 class="_detail">{{ isset($data->education->fellowship_institute_name) ? $data->education->fellowship_institute_name : null }}</h1>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="d-flex align-items-center">
                                    <div>
                                        <i class="las la-angle-double-right circle-icon"></i>
                                    </div>
                                    <div>
                                        <h3 class="_title">Year Started</h3>
                                        <h1 class="_detail">{{ isset($data->education->fellowship_institute_year_started) ? $data->education->fellowship_institute_year_started : null }}</h1>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="d-flex align-items-center">
                                    <div>
                                        <i class="las la-angle-double-right circle-icon"></i>
                                    </div>
                                    <div>
                                        <h3 class="_title">Year Completed</h3>
                                        <h1 class="_detail">{{ isset($data->education->fellowship_institute_year_completed) ? $data->education->fellowship_institute_year_completed : null }}</h1>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-sm-12">
                                    <div class="d-flex align-items-center mb-3">
                                    <div>
                                        <i class="las la-map-marker circle-icon"></i>
                                    </div>
                                    <div>
                                        <h3 class="_title">Address</h3>
                                        <h1 class="_detail">
                                            {{ isset($data->education->fellowship_institute_address) ? $data->education->fellowship_institute_address : null }}
                                            <a class="btn btn-info btn-sm ml-2" data-toggle="collapse" href="#collapseExample14" aria-expanded="true"><i class="las la-map-marker"></i>View
                                            Map</a>
                                        </h1>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse mb-4" id="collapseExample14">
                                <div class="card card-body">
                                    <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%"
                                    height="200" frameborder="0" scrolling="no" marginheight="0"
                                    marginwidth="0"
                                    src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <div class="d-flex align-items-center">
                                    <div>
                                        <i class="las la-angle-double-right circle-icon"></i>
                                    </div>
                                    <div>
                                        <h3 class="_title">City</h3>
                                        <h1 class="_detail">{{ isset($data->education->fellowship_institute_city->city) ? $data->education->fellowship_institute_city->city : null }}</h1>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="d-flex align-items-center">
                                    <div>
                                        <i class="las la-angle-double-right circle-icon"></i>
                                    </div>
                                    <div>
                                        <h3 class="_title">State</h3>
                                        <h1 class="_detail">{{ isset($data->education->fellowship_institute_state->state) ? $data->education->fellowship_institute_state->state : null }}</h1>
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
</div>