
<div class="tab-pane fade" id="FamilyDetails" role="tabpanel" aria-labelledby="v-pills-FamilyDetails-tab">
    <div class="app-card" style="min-height: auto;">
        <div class="card-header" id="step2">
            <div class="d-flex align-items-center">
                <img src="/assets/img/icons/employee-sb-select.svg" alt="" srcset="/assets/img/icons/employee-sb-select.svg" class="_icon mr-2"></a>Family Details
            </div>
            <hr>
        </div>
        <div class="card-body collapse show" id="collapseWork" aria-labelledby="collapseWork"
            data-parent="#profileAccordion">
            <div class="_card">
                <div class="_card_header"><div class="title-head">BASIC INFORMATION</div></div>
                <div class="_card_body">
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <div>
                                            <div class="d-flex align-items-center">
                                                <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                <div>
                                                    <h3 class="_title">Father Name</h3>
                                                    <h1 class="_detail">{{ isset($family_detail->father_name) ? $family_detail->father_name : null }}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div>
                                            <div class="d-flex align-items-center">
                                                <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                <div>
                                                    <h3 class="_title">Mother Name</h3>
                                                    <h1 class="_detail">{{ isset($family_detail->mother_name) ? $family_detail->mother_name : null }}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div>
                                            <div class="d-flex align-items-center">
                                                <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                <div>
                                                    <h3 class="_title">Spouse Name</h3>
                                                    <h1 class="_detail">{{ isset($family_detail->spouse_name) ? $family_detail->spouse_name : null }}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div>
                                            <div class="d-flex align-items-center">
                                                <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                <div>
                                                    <h3 class="_title">Parents Name</h3>
                                                    <h1 class="_detail">{{ isset($family_detail->parents_name) ? $family_detail->parents_name : null }}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div>
                                            <div class="d-flex align-items-center">
                                                <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                <div>
                                                    <h3 class="_title">Children Name</h3>
                                                    <h1 class="_detail">{{ isset($family_detail->children_name) ? $family_detail->children_name : null }}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div>
                                            <div class="d-flex align-items-center">
                                                <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                <div>
                                                    <h3 class="_title">Siblings Name</h3>
                                                    <h1 class="_detail">{{ isset($family_detail->siblings_name) ? $family_detail->siblings_name : null }}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div>
                                            <div class="d-flex align-items-center">
                                                <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                <div>
                                                    <h3 class="_title">Father In Low Name</h3>
                                                    <h1 class="_detail">{{ isset($family_detail->father_in_low_name) ? $family_detail->father_in_low_name : null }}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div>
                                            <div class="d-flex align-items-center">
                                                <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                <div>
                                                    <h3 class="_title">Mother In Low Name</h3>
                                                    <h1 class="_detail">{{ isset($family_detail->mother_in_low_name) ? $family_detail->mother_in_low_name : null }}</h1>
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
        </div>
    </div>
</div>
