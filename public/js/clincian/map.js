var patient_request_id = $('#patient_request_id').val();

var directionsService;
var directionsRenderer;

var map;
function initMap() {


    navigator.geolocation.getCurrentPosition(function (position) {
        map = new google.maps.Map(document.getElementById("map"), {
            center: new google.maps.LatLng(position.coords.latitude,position.coords.longitude),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
    },(error)=>{

    },{enableHighAccuracy:true,maximumAge:3000,timeout:3000})
    directionsService = new google.maps.DirectionsService();
    directionsRenderer = new google.maps.DirectionsRenderer();
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
            var destination = new google.maps.LatLng(response.patient.latitude,response.patient.longitude);
            makeMarker(destination, base_url+'assets/img/icons/patient-selected-sb.svg', 'Patient');
            response.clinicians.map(function (resp) {
                var current = new google.maps.LatLng(resp.latitude,resp.longitude);
                var origin = new google.maps.LatLng(resp.start_latitude,resp.end_longitude);
                makeMarker(origin, base_url+'assets/img/icons/clinician-sb-select.svg', resp.first_name+' '+resp.last_name);
                makeMarker(current, base_url+'assets/img/icons/clinician-sb-select.svg', resp.first_name+' '+resp.last_name);

                calculateAndDisplayRoute(origin,destination,current)
                updateMap(destination,map)
            })
        },
        error:function (error) {
            console.log(error)
        }
    })

}
var j=0;


function addYourLocationButton (map, marker) {
    var controlDiv = document.createElement('div');

    var firstChild = document.createElement('button');
    firstChild.style.backgroundColor = '#bba5a5';
    firstChild.style.border = 'none';
    firstChild.style.outline = 'none';
    firstChild.style.width = '28px';
    firstChild.style.height = '28px';
    firstChild.style.borderRadius = '2px';
    firstChild.style.boxShadow = '0 1px 4px rgba(0,0,0,0.3)';
    firstChild.style.cursor = 'pointer';
    firstChild.style.marginRight = '10px';
    firstChild.style.padding = '0';
    firstChild.title = 'Your Location';
    controlDiv.appendChild(firstChild);

    var secondChild = document.createElement('div');
    secondChild.style.margin = '5px';
    secondChild.style.width = '18px';
    secondChild.style.height = '18px';
    secondChild.style.backgroundImage = 'url(https://maps.gstatic.com/tactile/mylocation/mylocation-sprite-2x.png)';
    secondChild.style.backgroundSize = '180px 18px';
    secondChild.style.backgroundPosition = '0 0';
    secondChild.style.backgroundRepeat = 'no-repeat';
    firstChild.appendChild(secondChild);

    google.maps.event.addListener(map, 'center_changed', function () {
        secondChild.style['background-position'] = '0 0';
    });

    firstChild.addEventListener('click', function () {
        var imgX = 0,
            animationInterval = setInterval(function () {
                imgX = -imgX - 18 ;
                secondChild.style['background-position'] = imgX+'px 0';
            }, 500);

        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                map.setCenter(latlng);
                map.setZoom(12)
                const cityCircle = new google.maps.Circle({
                    strokeColor: "#b1dba2",
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: "#b1dba2",
                    fillOpacity: 0.35,
                    map,
                    center: latlng,
                    radius: ((5 * 1000)*0.62137),
                });
                clearInterval(animationInterval);
                secondChild.style['background-position'] = '-144px 0';
            },()=>{

            },{
                enableHighAccuracy: true,
                timeout: 10 * 1000 // 10 seconds
            });
        } else {
            clearInterval(animationInterval);
            secondChild.style['background-position'] = '0 0';
        }
    });

    controlDiv.index = 1;
    map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(controlDiv);
}

function makeMarker(position, icon, title) {
    var markers = new google.maps.Marker({
        position: position,
        map: map,
        icon: icon,
        title: title
    });
    const contentString =
        '<div id="content">' +
        '<div id="siteNotice">' +
        "</div>" +
        '<h1 id="firstHeading" class="firstHeading">'+title+'</h1>' +
        "</div>";

    const infowindow = new google.maps.InfoWindow({
        content: contentString,
    });
    markers.addListener("click", () => {
        infowindow.open(map, markers);
        map.setZoom(20)
    });
}

var prev_lat=null;
var prev_lng=null;
function updateMap(destination,map) {
    setInterval(function () {
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
                response.clinicians.map(function (resp) {
                    var check = calcCrow(resp.latitude,resp.longitude,prev_lat,prev_lng).toFixed(1);
                    prev_lat=resp.latitude;
                    prev_lng=resp.longitude;
                    if (check>0){
                        var current = new google.maps.LatLng(resp.latitude,resp.longitude);
                        var origin = new google.maps.LatLng(resp.start_latitude,resp.end_longitude);
                        makeMarker(origin, base_url+'assets/img/icons/clinician-sb-select.svg', resp.first_name+' '+resp.last_name);
                        makeMarker(current, base_url+'assets/img/icons/roadl-ambulance-sb-select.svg', resp.first_name+' '+resp.last_name);
                        calculateAndDisplayRoute(origin,destination,current)
                    }

                })
            },
            error:function (error) {
                console.log(error)
            }
        })
    },1000)
}

//
function calculateAndDisplayRoute(origin,destination,current) {


    var request = {
        origin: current,
        destination: destination,
        optimizeWaypoints: true,
        travelMode: 'DRIVING',
        unitSystem: google.maps.UnitSystem.IMPERIAL
    };
    directionsService.route(request,(response, status)=>{
        if (status === 'OK') {
            var leg = response.routes[0].legs;
            var start = new google.maps.LatLng(leg.start_location);

            directionsRenderer.setMap(map)
            directionsRenderer.setDirections(response)
            directionsRenderer.setOptions({
                draggable: true,
                hideRouteIndex: true,
                polylineOptions : {
                    strokeColor: '#0a5293',
                    strokeOpacity: 1.0,
                    strokeWeight: 5
                }
            });

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
