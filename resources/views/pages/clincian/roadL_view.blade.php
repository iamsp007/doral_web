@extends('pages.clincian.layouts.app')

@section('title','Patient RoadL Request Map')
@section('pageTitleSection')
    RoadL
@endsection

@section('content')
    <ul>
        @if(count($patientRequestList)>0)
            @foreach($patientRequestList as $key=>$value)
                <li>
                    <div class="app-card raduis_5 mb-2">
                        <div class="app-broadcasting">
                            <div class="lside">
                                <div>
                                    <img src="{{ asset('assets/img/user/01.png') }}" class="user_photo" alt=""
                                         srcset="{{ asset('assets/img/user/01.png') }}">
                                </div>
                                <div class="content">
                                    <h1 class="_t11">{!! $value->detail->first_name !!} {!! $value->detail->last_name !!} </h1>
                                    <p class="address">{!! $value->patientDetail->address1 !!}</p>
                                    <p class="emergency_contact mb-2"> Emergency Contact
                                        <a href="tel:9966246684" class="primary_tel">{!! $value->patientDetail->emg_phone !!}</a></p>
                                    <p class="contact"><a href="tel:8866246684" class="secondary_tel">{!! $value->detail->phone !!}</a>
                                    </p>
                                </div>
                                <!-- <a href="javascript:void(0)"><i class="las la-ellipsis-v la-2x"></i></a> -->
                                <div id="_dropdown">
                                    <div class="dropdown user-dropdown">
                                        <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false" href="javascript:void(0)"><i
                                                class="las la-ellipsis-v la-2x"></i></a>
                                        <div class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="rside">
                                <div class="_lside">
                                    <ul class="specification">
                                        @if(count($value->ccrm)>0)
                                            @foreach($patientRequestList->ccrm as $ckey=>$cvalue)
                                                <li class="blood">
                                                    <img src="{{ asset('assets/img/icons/pressure.svg') }}"
                                                         class="mr-2" alt="">
                                                    {!! $cvalue->reading_type !!} : {!! $cvalue->reading_value !!}
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                                <div class="_rside">
                                    <ul class="actionBar">
                                        <li>
                                            <div class="search-clinician">
                                                <input type="text" class="form-control clinician" name="animal"
                                                       id="searchField" placeholder="Assign Manually">
                                            </div>
                                        </li>
                                        <li>
                                            <button type="button" class="btn btn-start-call">Start
                                                Call<span></span></button>
                                        </li>
                                        <li>
                                            <button type="button" class="btn btn-emergency">emergency
                                                (911)<span></span></button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        @endif
    </ul>
    <div id="floating-panel">
        <b>Mode of Travel: </b>
        <select id="mode">
            <option value="DRIVING">Driving</option>
            <option value="WALKING">Walking</option>
            <option value="BICYCLING">Bicycling</option>
            <option value="TRANSIT">Transit</option>
        </select>
    </div>
    <div id="map"></div>
@endsection

@push('styles')
    <style>
        #map {
            height: 100%;
        }
        #floating-panel {
            position: absolute;
            top: 10px;
            left: 25%;
            z-index: 5;
            background-color: #fff;
            padding: 5px;
            border: 1px solid #999;
            text-align: center;
            font-family: 'Roboto','sans-serif';
            line-height: 30px;
            padding-left: 10px;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
{{--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>--}}
    <script>
        navigator.geolocation.getCurrentPosition(showPosition);

        function showPosition(position) {
            function initMap(){
                var directionsDisplay = new google.maps.DirectionsRenderer;
                var directionsService = new google.maps.DirectionsService;
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 3,
                    center: {lat: 14.77, lng: -12.447}
                });
                directionsDisplay.setMap(map);

                calculateAndDisplayRoute(directionsService, directionsDisplay);
                document.getElementById('mode').addEventListener('change', function() {
                    calculateAndDisplayRoute(directionsService, directionsDisplay);
                });
            }

            function calculateAndDisplayRoute(directionsService, directionsDisplay) {
                var selectedMode = document.getElementById('mode').value;
                directionsService.route({

                    origin: {lat: position.coords.latitude ,lng: position.coords.longitude},  // Haight.
                    destination: {lat: 14.768, lng: -12.511},  // Ocean Beach.
                    // Note that Javascript allows us to access the constant
                    // using square brackets and a string value as its
                    // "property."
                    travelMode: google.maps.TravelMode[selectedMode]
                }, function(response, status) {
                    if (status == google.maps.DirectionsStatus.OK) {
                        directionsDisplay.setDirections(response);
                    } else {
                        window.alert('Directions request failed due to ' + status);
                    }
                });
            }
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSkdSlcQB9fgwBaHnbNlS7OEFf67kDpbo&callback=initMap">
    </script>
@endpush
