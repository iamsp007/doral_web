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
    <div id="map"></div>
    <div id="pano"></div>
    <div id="marker-popup" style="display: none;">
        <div id="modal-popup">
            <button style="height: 100px; width: 300px;background-color: #4aac27;">Accept</button>
            <button style="height: 100px; width: 300px;background-color: red">Reject</button>
        </div>
    </div>
@endsection

@push('styles')
    <style type="text/css">
        /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
        #map {
            width: 50px !important;
            position: inherit !important;
        }
        #pano {
            float: left;
            height: 100%;
            width: 50%;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://unpkg.com/@google/markerclustererplus@4.0.1/dist/markerclustererplus.min.js"></script>
    <script>
        socket.on('receive-location', function (data) {
            console.log(data,"receive-location");
        });
        socket.emit('send-location', { latitude: '15.552255',longitude: '16.055222' });

        // Initialize and add the map
        const locations = [
            { lat: 21.9290, lng: 69.7838,lable:'Sunil' },
            { lat: 23.0225, lng: 72.5714,lable:'Shashikant' },
            { lat: 22.4707, lng: 70.0577,lable:'Ramesh' },
        ];

        function initMap() {
            if (navigator.geolocation)
            {
                navigator.geolocation.getCurrentPosition(function (position) {
                    console.log(position,"position")
                    const directionsService = new google.maps.DirectionsService();
                    const directionsRenderer = new google.maps.DirectionsRenderer();
                    const map = new google.maps.Map(document.getElementById("map"), {
                        zoom: 8,
                        center: { lat: position.coords.latitude, lng: position.coords.longitude },
                        mapTypeId: "terrain",
                    });

                    const cityCircle = new google.maps.Circle({
                        strokeColor: "#FF0000",
                        strokeOpacity: 0.8,
                        strokeWeight: 2,
                        fillColor: "#FF0000",
                        fillOpacity: 0.35,
                        map,
                        center: { lat: position.coords.latitude, lng: position.coords.longitude },
                        radius: Math.sqrt(1) * 100,
                    });

                    map.panTo({
                        lat: position.coords.latitude, lng: position.coords.longitude
                    })

                    // Create an array of alphabetical characters used to label the markers.
                    const labels = "Sunil Karmur";
                    const contentString ='<div id="modal-popup">'+
                        '<button style="height: 100px; width: 300px;background-color: #4aac27;">Accept</button>'+
                    '<button style="height: 100px; width: 300px;background-color: red">Reject</button>'+
                '</div>';

                    const infowindow = new google.maps.InfoWindow({
                        content: contentString,
                    });

                    // Add some markers to the map.
                    // Note: The code uses the JavaScript Array.prototype.map() method to
                    // create an array of markers based on a given "locations" array.
                    // The map() method here has nothing to do with the Google Maps API.
                    const markers = locations.map((location, i) => {
                        if (i===1 || i===locations.length){
                            console.log(i,locations.length)
                        }
                        var marker = new google.maps.Marker({
                            position: location,
                            label: location.lable,
                        });

                        marker.addListener("click", () => {
                            infowindow.open(map, marker);
                        });
                        return marker;
                    });

                    // Add a marker clusterer to manage the markers.
                    new MarkerClusterer(map, markers, {
                        imagePath:
                            "https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m",
                    });

                    google.maps.event.addListener(markers,'click',function() {
                        var pos = map.getZoom();
                        map.setZoom(14);
                        map.setCenter(marker.getPosition());
                        window.setTimeout(function() {map.setZoom(pos);},3000);
                    });
                    directionsRenderer.setMap(map);
                    var origin = locations[0].lat+','+locations[0].lng;
                    var destination = locations[2].lat+','+locations[2].lng;
                    if (locations.length>0){
                        origin = locations[0].lat+','+locations[0].lng;
                        destination = locations[locations.length-1].lat+','+locations[locations.length-1].lng;
                    }

                    calculateAndDisplayRoute(directionsService, directionsRenderer,origin,destination);
                }, function (error) {
                    console.log(error,"error")
                }, {maximumAge:10000, timeout:5000, enableHighAccuracy: true});
            }
            else
            {
                alert('It seems like Geolocation, which is required for this page, is not enabled in your browser.');
            }

        }
        //
        function directionInitMap() {
            var latitude = '21.9347';
            var longitude = '69.6393';
            var origin = latitude+','+longitude
            var destination = latitude+','+longitude
            navigator.geolocation.watchPosition(function (position) {
                origin = position.coords.latitude+','+position.coords.longitude;
                const directionsService = new google.maps.DirectionsService();
                const directionsRenderer = new google.maps.DirectionsRenderer();
                const map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 14,
                    center: { lat: position.coords.latitude, lng: position.coords.longitude },
                });
                const locations = [
                    { lat: position.coords.latitude, lng: position.coords.longitude,lable:'Sunil' },
                    { lat: latitude, lng: longitude,lable:'Shashikant' }
                ];
                var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
                const panorama = new google.maps.StreetViewPanorama(
                    document.getElementById("pano"),
                    {
                        position: { lat: position.coords.latitude, lng: position.coords.longitude },
                        pov: {
                            heading: 34,
                            pitch: 20,
                        },
                    }
                );
                map.setStreetView(panorama);

                const labels = "Sunil Karmur";
                const contentString ='<div id="modal-popup">'+
                    '<button style="height: 100px; width: 300px;background-color: #4aac27;">Accept</button>'+
                    '<button style="height: 100px; width: 300px;background-color: red">Reject</button>'+
                    '</div>';

                const infowindow = new google.maps.InfoWindow({
                    content: contentString,
                });

                // Add some markers to the map.
                // Note: The code uses the JavaScript Array.prototype.map() method to
                // create an array of markers based on a given "locations" array.
                // The map() method here has nothing to do with the Google Maps API.
                const markers = locations.map((location, i) => {
                    var marker = new google.maps.Marker({
                        position: location,
                        label: location.lable,
                    });

                    marker.addListener("click", () => {
                        infowindow.open(map, marker);
                    });
                    return marker;
                });

                // Add a marker clusterer to manage the markers.
                new MarkerClusterer(map, markers, {
                    imagePath:
                        "https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m",
                });

                // google.maps.event.addListener(markers,'click',function() {
                //     var pos = map.getZoom();
                //     map.setZoom(20);
                //     map.setCenter(marker.getPosition());
                //     window.setTimeout(function() {map.setZoom(pos);},3000);
                // });

                directionsRenderer.setMap(map);
                calculateAndDisplayRoute(directionsService, directionsRenderer,locations[0],locations[1]);
            },function (error) {
                console.log(error)
            })
        }
        //
        function calculateAndDisplayRoute(directionsService, directionsRenderer,origin,destination) {
            // var start = latitude+','+longitude;
            // var end = '21.9290,69.7838';
            // console.log(start)
            var request = {
                origin: origin,
                destination: destination,
                travelMode: google.maps.DirectionsTravelMode.DRIVING
            };
            directionsService.route(request,
                (response, status) => {
                    if (status === "OK") {
                        directionsRenderer.setDirections(response);
                    } else {
                        window.alert("Directions request failed due to " + status);
                    }
                }
            );
        }

    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCdb6t1uHzeJgQadBsAUhcrpCwkIooWT5Y&callback=initMap&libraries=&v=weekly"
        defer
    ></script>

@endpush
