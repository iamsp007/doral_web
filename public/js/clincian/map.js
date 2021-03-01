var patient_request_id = $('#patient_request_id').val();

var directionsService;
var directionsRenderer;

var map;
var referral_type = [];
var marker = [];
var zoom=10;
function initMap() {

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:base_url+'clinician/patient-roladl-proccess',
        data:{
            patient_request_id:patient_request_id
        },
        method:'POST',
        dataType:'json',
        success:function (response) {
            map = new google.maps.Map(document.getElementById("map"), {
                zoom:5,
                center: new google.maps.LatLng(response.patient.latitude,response.patient.longitude),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            var destination = new google.maps.LatLng(response.patient.latitude,response.patient.longitude);

            response.clinicians.map(function (resp) {
                var originName = resp.first_name+' '+resp.last_name+'   Role : '+resp.referral_type;
                var destinationName = response.patient.detail.first_name+' '+response.patient.detail.last_name+'  Role : Patient';
                var current = new google.maps.LatLng(resp.start_latitude,resp.end_longitude);
                if (resp.latitude!==null){
                    current = new google.maps.LatLng(resp.latitude,resp.longitude);
                }
                referral_type[resp.id]={
                    directionsService:new google.maps.DirectionsService(),
                    directionsRenderer:new google.maps.DirectionsRenderer({suppressMarkers: true}),
                    id:resp.id,
                    color:resp.color,
                    icon:resp.icon,
                    start_icon:base_url+'assets/img/icons/patient-icon.svg',
                    originName:originName,
                    destinationName:destinationName,
                    destination:destination,
                    current:current,
                }
                calculateAndDisplayRoute(current,destination,resp.id,referral_type[resp.id])
                updateMap(destination,destinationName,resp.id)
            })
        },
        error:function (error) {
            console.log(error)
        }
    })
}
function makeMarker(position, icon, title,duration=0,hours=0) {
   var markers = new google.maps.Marker({
        position: position,
        map: map,
        icon: icon,
        title: title
    });
    const contentString ='<div class="row"> ' +
        '<div class="col-12">' +
        '<div class="col-md-4"><b>Name : </b>'+title+'</div>' +
        '<div class="col-md-4"><b>Duration : </b>'+duration+'</div>' +
        '<div class="col-md-4"><b>Distance : </b>'+hours+'</div>' +
        '</div>' +
        ' </div>';

    const infowindow = new google.maps.InfoWindow({
        content: contentString,
    });
    markers.addListener("click", () => {
        infowindow.open(map, markers);
        map.setZoom(20)
        map.setCenter(markers.getPosition());
        zoom=20;
    });
    return markers;
}

var html='';

function updateMap(destination,name,id) {
    console.log(id)
    socket.on('receive-location-'+id,function (data) {
        var referrals = referral_type[data.id];
        var current = new google.maps.LatLng(data.latitude,data.longitude);
        calculateAndDisplayRoute(current,referrals.destination,data.id,referrals)
        // calculateAndDisplayRoute(current,destination,response.referral_type,originName,destinationName,response.color,response.icon)
    })
    // window.Echo.channel('location').listen('SendLocation',function (e) {
    //     const response = e.location;
    //     console.log(response,response.id,parseInt(referral_type[response.referral_type].id))
    //     if (parseInt(response.id)===parseInt(referral_type[response.referral_type].id)){
    //         var current = new google.maps.LatLng(response.latitude,response.longitude);
    //         var originName = response.first_name+' '+response.last_name+'  Role : '+response.referral_type;
    //         var destinationName = name+'  Role : Patient';
    //         map.setZoom(zoom);
    //         calculateAndDisplayRoute(current,destination,response.referral_type,originName,destinationName,response.color,response.icon)
    //     }
    // })
}

//
function calculateAndDisplayRoute(current,destination,type,referrals) {
    var directionsService = referrals.directionsService;
    var directionsRenderer = referrals.directionsRenderer;
    console.log(current)
    var request = {
        origin: current,
        destination: destination,
        optimizeWaypoints: false,
        travelMode: google.maps.TravelMode['DRIVING'],
        unitSystem: google.maps.UnitSystem.METRIC,

    };
    directionsService.route(request,(response, status)=>{
        if (status === 'OK') {

            directionsRenderer.setMap(map)
            directionsRenderer.setDirections(response)
            directionsRenderer.setOptions({
                draggable: true,
                hideRouteIndex: false,
                polylineOptions : {
                    strokeColor: referrals.color,
                    strokeOpacity: 1.0,
                    strokeWeight: 5
                }
            });
            var leg = response.routes[0].legs[0];
            if (referral_type[type].marker){
                referral_type[type].marker.setMap(null);
            }
            if (referral_type[type].patient_marker){
                referral_type[type].patient_marker.setMap(null);
            }
            referral_type[type].patient_marker=makeMarker( leg.end_location, referrals.start_icon, referrals.destinationName,leg.distance.text,leg.duration.text );
            referral_type[type].marker=makeMarker( leg.start_location, referrals.icon, referrals.originName,leg.distance.text,leg.duration.text );

            // makeMarker( leg.end_location, referrals.start_icon, referrals.destinationName );
        }
    })
}

//This function takes in latitude and longitude of two location and returns the distance between them as the crow flies (in km)
function calcCrow(lat1, lon1, lat2, lon2)
{
    var R = 6371; // km
    var dLat = toRad(lat2-lat1);
    var dLon = toRad(lon2-lon1);
    var lat1 = toRad(lat1);
    var lat2 = toRad(lat2);

    var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
        Math.sin(dLon/2) * Math.sin(dLon/2) * Math.cos(lat1) * Math.cos(lat2);
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
    var d = R * c;
    return d;
}

// Converts numeric degrees to radians
function toRad(Value)
{
    return Value * Math.PI / 180;
}

function animateCircle(line) {
    let count = 0;
    window.setInterval(() => {
        count = (count + 1) % 200;
        const icons = line.get("icons");
        icons[0].offset = count / 2 + "%";
        line.set("icons", icons);
    }, 20);
}


