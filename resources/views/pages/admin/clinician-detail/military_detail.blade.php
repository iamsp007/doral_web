
<div class="tab-pane fade" id="Military_detail" role="tabpanel" aria-labelledby="v-pills-Military_detail-tab">
    <div class="app-card" style="min-height: auto;">
        <div class="card-header" id="step2">
            <div class="d-flex align-items-center">
                <img src="/assets/img/icons/md-order-selected-sb.svg" alt="" srcset="/assets/img/icons/md-order-selected-sb.svg" class="_icon mr-2"></a>Family Details
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
                                                    <h3 class="_title">Branch</h3>
                                                    <h1 class="_detail">{{ isset($military_detail->branch) ? $military_detail->branch : null }}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div>
                                            <div class="d-flex align-items-center">
                                                <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                <div>
                                                    <h3 class="_title">Serve End Date</h3>
                                                    <h1 class="_detail">{{ isset($military_detail->serve_end_date) ? $military_detail->serve_end_date : null }}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div>
                                            <div class="d-flex align-items-center">
                                                <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                <div>
                                                    <h3 class="_title">Serve Start Date</h3>
                                                    <h1 class="_detail">{{ isset($military_detail->serve_start_date) ? $military_detail->serve_start_date : null }}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div>
                                            <div class="d-flex align-items-center">
                                                <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                <div>
                                                    <h3 class="_title">Is Vietnam</h3>
                                                    <h1 class="_detail">{{ isset($military_detail->isVietnam) ? $military_detail->isVietnam : null }}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div>
                                            <div class="d-flex align-items-center">
                                                <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                <div>
                                                    <h3 class="_title">Is Commited</h3>
                                                    <h1 class="_detail">{{ isset($military_detail->isCommited) ? $military_detail->isCommited : null }}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div>
                                            <div class="d-flex align-items-center">
                                                <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                <div>
                                                    <h3 class="_title">Is Military</h3>
                                                    <h1 class="_detail">{{ isset($military_detail->isMilitary) ? $military_detail->isMilitary : null }}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div>
                                            <div class="d-flex align-items-center">
                                                <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                <div>
                                                    <h3 class="_title">Is Commited Explain</h3>
                                                    <h1 class="_detail">{{ isset($military_detail->isCommited_explain) ? $military_detail->isCommited_explain : null }}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div>
                                            <div class="d-flex align-items-center">
                                                <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                <div>
                                                    <h3 class="_title">Is Disable Vetran</h3>
                                                    <h1 class="_detail">{{ isset($military_detail->isDisableVetran) ? $military_detail->isDisableVetran : null }}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div>
                                            <div class="d-flex align-items-center">
                                                <div><i class="las la-angle-double-right circle-icon"></i></div>
                                                <div>
                                                    <h3 class="_title">Is Special Disable Vereran</h3>
                                                    <h1 class="_detail">{{ isset($military_detail->isSpecialDisableVereran) ? $military_detail->isSpecialDisableVereran : null }}</h1>
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
