@extends('pages.layouts.app')

@section('title','Patient RoadL Request Map')
@section('pageTitleSection')
    Near By clinician Listing
@endsection

@section('content')
    <input type="hidden" name="patient_request_id" id="patient_request_id" value="{{ $patient_request_id }}">
    <div id="map"></div>
@endsection

@push('styles')
    <style type="text/css">
        /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
        #map {
            /*width:820px !important;*/
            height: 500px !important;
            position: relative !important;
            overflow: scroll;
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
{{--    <script src="{{ asset('js/clincian/map.js') }}"></script>--}}
    <script>
        var patient_request_id = $('#patient_request_id').val();
        function getNearByClinicianList(callback) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:base_url+'clinician/get-near-by-clinician-list/'+patient_request_id,
                method:'GET',
                dataType:'json',
                success:function (response) {
                    if (response.clinicianList.length>0){
                        callback(response.clinicianList,response.patientDetail)
                    }else {
                        callback([],response.patientDetail)
                    }
                },
                error: function (request, status, error) {
                    var response = JSON.parse(request.responseText);
                    window.location.href = '{{ env("APP_URL") }}'+"clinician/running-roadl/"+patient_request_id;

                }
            })
        }
        if (navigator.geolocation){
            navigator.geolocation.getCurrentPosition((position => {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;
                var iconBase=base_url+'/assets/img/icons/';


                getNearByClinicianList( (response,patientDetail)=> {
                    console.log(response,patientDetail)
                    const map = new google.maps.Map(document.getElementById("map"), {
                        zoom: 12,
                        center: new google.maps.LatLng(patientDetail.latitude,patientDetail.longitude),
                        icon:iconBase+'patient-icon.svg',
                        position: new google.maps.LatLng(patientDetail.latitude,patientDetail.longitude),
                        title: patientDetail.detail.first_name+' '+patientDetail.detail.last_name,
                        disableDefaultUI: true,
                        mapTypeControl: true,
                        zoomControl: true,
                        zoomControlOptions: {
                            position: google.maps.ControlPosition.LEFT_CENTER,
                        },
                        scaleControl: true,
                        streetViewControl: true,
                        streetViewControlOptions: {
                            position: google.maps.ControlPosition.LEFT_TOP,
                        },
                        rotateControl: true,
                        fullscreenControl: true,
                        heading: 90,
                        tilt: 45,
                    });

                    var cmarker = new google.maps.Marker({
                        icon:iconBase+'clinician-sb-select.svg',
                        map: map,
                        position: new google.maps.LatLng(patientDetail.latitude,patientDetail.longitude),
                        title: patientDetail.detail.first_name+' '+patientDetail.detail.last_name,
                    });

                    var circle = new google.maps.Circle({
                        map: map,
                        strokeColor: "#0079C3",
                        fillOpacity: 0.2,
                        icon:iconBase+'patient-icon.svg',
                        position: new google.maps.LatLng(patientDetail.latitude,patientDetail.longitude),
                        radius: ((5 * 1000)*0.62137),    // 5 miles in metres
                        label: patientDetail.detail.first_name+' '+patientDetail.detail.last_name,
                        title: '5 km area of circle',
                    });
                    circle.bindTo('center', cmarker, 'position');

                    const markers = response.map((resp,i)=> {
                        const contentString =
                            '<div id="content">' +
                            '<div id="siteNotice">' +
                            "</div>" +
                            '<h1 id="firstHeading" class="firstHeading">'+resp.first_name+' '+resp.last_name+'</h1>' +
                            "</div>";

                        const infowindow = new google.maps.InfoWindow({
                            content: contentString,
                        });

                        var marker = new google.maps.Marker({
                            icon:iconBase+'clinician-sb-select.svg',
                            position: new google.maps.LatLng(resp.latitude,resp.longitude),
                            label: resp.first_name+' '+resp.last_name,
                        });

                        marker.addListener("click", () => {
                            infowindow.open(map, marker);
                        });

                        return marker;
                    });
                    // map.markers.push(markers);
                    var mc = new MarkerClusterer(map, markers, {
                        imagePath:iconBase+'clinician-sb-select.svg',
                    });
                })
            }),(error)=>{

            },{enableHighAccuracy:true,maximumAge:3000,timeout:5000});
        }
        function clinicianAcceptReject(userId,status) {
            alert(userId)
        }
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{env('MAP_API_KEY')}}&callback=initMap&libraries=&v=weekly"
        defer
    ></script>

@endpush
