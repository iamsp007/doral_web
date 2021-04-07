<div class="tab-pane fade" id="Address" role="tabpanel" aria-labelledby="Address-tab">
    <ul>
        <li>
            <div class="_card mt-3">
            <div class="_card_header">
                <div class="title-head">Address Details</div>
            </div>
            <div class="_card_body">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="d-flex align-items-center mb-3">
                        <div>
                            <i class="las la-map-marker circle-icon"></i>
                        </div>
                        <div>
                            <h3 class="_title">Address 1</h3>
                            <h1 class="_detail">
                                {{ isset($address_detail->address1) ? $address_detail->address1 : null }}
                                <a class="btn btn-info btn-sm ml-2" data-toggle="collapse" href="#collapseExample" aria-expanded="true"><i class="las la-map-marker"></i>View
                                Map</a>
                            </h1>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="collapse mb-4" id="collapseExample">
                    <div class="card card-body">
                        <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%"
                        height="200" frameborder="0" scrolling="no" marginheight="0"
                        marginwidth="0"
                        src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="d-flex align-items-center mb-3">
                        <div>
                            <i class="las la-map-marker circle-icon"></i>
                        </div>
                        <div>
                            <h3 class="_title">Address 2</h3>
                            <h1 class="_detail">
                                {{ isset($address_detail->address2) ? $address_detail->address2 : null }}
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
                    <div class="col-12 col-sm-8">
                        <div class="d-flex align-items-center">
                        <div>
                            <i class="las la-angle-double-right circle-icon"></i>
                        </div>
                        <div>
                            <h3 class="_title">Building</h3>
                            <h1 class="_detail">{{ isset($address_detail->building) ? $address_detail->building : null }}</h1>
                        </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="d-flex align-items-center">
                        <div>
                            <i class="las la-angle-double-right circle-icon"></i>
                        </div>
                        <div>
                            <h3 class="_title">City</h3>
                            <h1 class="_detail">{{ isset($address_detail->city) ? $address_detail->city : null }}</h1>
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
                            <h1 class="_detail">{{ isset($address_detail->state) ? $address_detail->state : null }}</h1>
                        </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="d-flex align-items-center">
                        <div>
                            <i class="las la-angle-double-right circle-icon"></i>
                        </div>
                        <div>
                            <h3 class="_title">Zip Code</h3>
                            <h1 class="_detail">{{ isset($address_detail->zipcode) ? $address_detail->zipcode : null }}</h1>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </li>
    </ul>
</div>