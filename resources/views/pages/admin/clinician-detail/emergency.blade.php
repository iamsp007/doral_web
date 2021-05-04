<div class="tab-pane fade" id="Emergency" role="tabpanel" aria-labelledby="Emergency-tab">
    <ul>
        @isset($emergency_detail)
            @foreach($emergency_detail as $index => $emergency)
                <li>
                    <div class="_card mt-3">
                        <div class="_card_header"><div class="title-head">Contact Detail {{ $index + 1 }}</div></div>
                        <div class="_card_body">
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <div class="d-flex align-items-center">
                                        <div><i class="las la-user-nurse circle-icon"></i></div>
                                        <div>
                                            <h3 class="_title">Name</h3>
                                            <h1 class="_detail">{{ isset($emergency->name) ? $emergency->name : null }}</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="d-flex align-items-center">
                                        <div><i class="las la-phone  circle-icon"></i></div>
                                        <div>
                                            <h3 class="_title">Phone No.</h3>
                                            <h1 class="_detail">{{ isset($emergency->phoneNo) ? $emergency->phoneNo : null }}</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="d-flex align-items-center">
                                        <div><i class="las la-angle-double-right circle-icon"></i></div>
                                        <div>
                                            <h3 class="_title">Relationship</h3>
                                            <h1 class="_detail">{{ isset($emergency->relation) ? $emergency->relation : null }}</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <div class="d-flex align-items-center">
                                        <div><i class="las la-angle-double-right circle-icon"></i></div>
                                        <div>
                                            <h3 class="_title">Person Relation</h3>
                                            <h1 class="_detail">{{ isset($emergency->personRelation) ? $emergency->personRelation : null }}</h1>
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
                                        <h3 class="_title">Address1</h3>
                                        <h1 class="_detail">
                                            {{ isset($emergency->address_line_1) ? $emergency->address_line_1 : null }}
                                            <a class="btn btn-info btn-sm ml-2" data-toggle="collapse" href="#collapseExample7" aria-expanded="true"><i class="las la-map-marker"></i>View
                                            Map</a>
                                        </h1>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse mb-4" id="collapseExample7">
                                <div class="card card-body">
                                    <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%"
                                    height="200" frameborder="0" scrolling="no" marginheight="0"
                                    marginwidth="0"
                                    src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-sm-12">
                                    <div class="d-flex align-items-center mb-3">
                                    <div>
                                        <i class="las la-map-marker circle-icon"></i>
                                    </div>
                                    <div>
                                        <h3 class="_title">Address2</h3>
                                        <h1 class="_detail">
                                            {{ isset($emergency->address_line_2) ? $emergency->address_line_2 : null }}
                                            <a class="btn btn-info btn-sm ml-2" data-toggle="collapse" href="#collapseExample7" aria-expanded="true"><i class="las la-map-marker"></i>View
                                            Map</a>
                                        </h1>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse mb-4" id="collapseExample7">
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
                                        <div><i class="las la-user-nurse circle-icon"></i></div>
                                        <div>
                                            <h3 class="_title">Building</h3>
                                            <h1 class="_detail">{{ isset($emergency->building) ? $emergency->building : null }}</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="d-flex align-items-center">
                                        <div><i class="las la-user-nurse circle-icon"></i></div>
                                        <div>
                                            <h3 class="_title">City</h3>
                                            <h1 class="_detail">{{ isset($emergency->city->city) ? $emergency->city->city : null }}</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="d-flex align-items-center">
                                        <div><i class="las la-user-nurse circle-icon"></i></div>
                                        <div>
                                            <h3 class="_title">State</h3>
                                            <h1 class="_detail">{{ isset($emergency->state->state) ? $emergency->state->state : null }}</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="d-flex align-items-center">
                                        <div><i class="las la-user-nurse circle-icon"></i></div>
                                        <div>
                                            <h3 class="_title">Zip Code</h3>
                                            <h1 class="_detail">{{ isset($emergency->zipcode) ? $emergency->zipcode : null }}</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        @endisset
    </ul>
</div>