
<div class="tab-pane fade" id="Security_detail" role="tabpanel" aria-labelledby="v-pills-Security_detail-tab">
    <div class="app-card" style="min-height: auto;">
        <div class="card-header" id="step2">
            <div class="d-flex align-items-center">
                <img src="/assets/img/icons/background-clinician.svg" alt="" srcset="/assets/img/icons/background-clinician.svg" class="_icon mr-2"></a>Family Details
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
                                                    <h3 class="_title">Bond</h3>
                                                    <h1 class="_detail">{{ isset($security_detail->bond) ? $security_detail->bond : null }}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div>
                                            <div class="d-flex align-items-center">
                                                <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                <div>
                                                    <h3 class="_title">Convict</h3>
                                                    <h1 class="_detail">{{ isset($security_detail->convict) ? $security_detail->convict : null }}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div>
                                            <div class="d-flex align-items-center">
                                                <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                <div>
                                                    <h3 class="_title">Bond Explain</h3>
                                                    <h1 class="_detail">{{ isset($security_detail->bond_explain) ? $security_detail->bond_explain : null }}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div>
                                            <div class="d-flex align-items-center">
                                                <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                <div>
                                                    <h3 class="_title">Convict Explain</h3>
                                                    <h1 class="_detail">{{ isset($security_detail->convict_explain) ? $security_detail->convict_explain : null }}</h1>
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
