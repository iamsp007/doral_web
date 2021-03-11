var patient_request_id = $('#patient_request_id').val();
var directionsService;
var directionsRenderer;
var map;
var referral_type = [];
var marker = [];
var zoom = 10;
var default_clinician_id = null;
function CenterControl(controlDiv, map) {
    // Set CSS for the control border.
    const controlUI = document.createElement("div");
    controlUI.classList.add('mapbox');
    controlUI.style.backgroundColor = "#006C76";
    controlUI.style.border = "2px solid #006C76";
    controlUI.style.borderRadius = "5px";
    controlUI.style.boxShadow = "0 2px 6px rgba(0,0,0,.3)";
    controlUI.style.cursor = "pointer";
    controlUI.style.marginBottom = "22px";
    controlUI.style.textAlign = "center";
    controlUI.title = "Click to recenter the map";
    controlDiv.appendChild(controlUI);
    // Set CSS for the control interior.
    const controlText = document.createElement("div");
    controlText.style.color = "#fff";
    controlText.style.fontFamily = "Roboto,Arial,sans-serif";
    controlText.style.fontSize = "18px";
    controlText.style.lineHeight = "38px";
    controlText.style.paddingLeft = "15px";
    controlText.style.paddingRight = "15px";
    controlText.innerHTML = "Re-Center Map";
    controlUI.appendChild(controlText);
    // Setup the click event listeners: simply set the map to Chicago.
    controlUI.addEventListener("click", () => {
        var referrals = referral_type[default_clinician_id];
        map.setZoom(8)
        map.setCenter(referrals.marker.getPosition());
    });
}
function initMap() {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: base_url + 'clinician/patient-roladl-proccess',
        data: {
            patient_request_id: patient_request_id
        },
        method: 'POST',
        dataType: 'json',
        success: function (response) {
            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 8,
                center: new google.maps.LatLng(response.patient.latitude, response.patient.longitude),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                mapTypeControl: true,
                mapTypeControlOptions: {
                    style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
                    mapTypeIds: ["roadmap", "terrain"],
                    position: google.maps.ControlPosition.LEFT_TOP
                },
                zoomControlOptions: {
                    position: google.maps.ControlPosition.LEFT_CENTER,
                },
                scaleControl: true,
                streetViewControl: false,
                streetViewControlOptions: {
                    position: google.maps.ControlPosition.LEFT_TOP,
                },
                fullscreenControl: true,
            });
            const centerControlDiv = document.createElement("div");
            CenterControl(centerControlDiv, map);
            map.controls[google.maps.ControlPosition.BOTTOM_CENTER].push(centerControlDiv);
            var destination = new google.maps.LatLng(response.patient.latitude, response.patient.longitude);
            var html = '';
            response.clinicians.map(function (resp) {
                default_clinician_id = resp.id;
                var originName = resp.first_name + ' ' + resp.last_name;
                var role = 'Role:' + resp.referral_type;
                var destinationName = response.patient.detail.first_name + ' ' + response.patient.detail.last_name + '  Role : Patient';
                var current = new google.maps.LatLng(resp.start_latitude, resp.end_longitude);
                if (resp.latitude !== null) {
                    current = new google.maps.LatLng(resp.latitude, resp.longitude);
                }
                referral_type[resp.id] = {
                    directionsService: new google.maps.DirectionsService(),
                    directionsRenderer: new google.maps.DirectionsRenderer({ suppressMarkers: true }),
                    id: resp.id,
                    color: resp.color,
                    icon: resp.icon,
                    start_icon: base_url + 'assets/img/icons/icons_patient.svg',
                    originName: originName,
                    role: role,
                    destinationName: destinationName,
                    destination: destination,
                    current: current,
                }
                html += '<option value="' + resp.id + '">' + originName + '</option>';
                calculateAndDisplayRoute(current, destination, resp.id, referral_type[resp.id])
                updateMap(destination, destinationName, resp.id)
            })
            $('#referral_type').html(html);
        },
        error: function (error) {
            console.log(error)
        }
    })
}
function makeMarker(position, icon, title, duration = 0, hours = 0, role_title) {
    var markers = new google.maps.Marker({
        position: position,
        map: map,
        icon: icon,
        title: title
    });
    var str = title;
    const contentString =
        '<div class="item_status" style="background:#F8FFFF;border-bottom:1px solid #00E2F2;padding:10px;color:#008591">' +
        '<div style="font-size:18px;font-weight:600">' + str.replace(/Role/gi, '<span style="color:#000;font-size:14px">' + "<br/> Role") + '</div>' +
        '</div>' +
        '<div style="background:#fff;padding:10px;color:#008591">' +
        '<div style="font-size:16px;font-weight:600;margin-bottom:5px"><span style="font-size:14px;color:#000;margin-right:10px">Services Type:</span>' + "Lab" + '</div>' +
        '<div style="font-size:16px;font-weight:600;margin-bottom:5px"><span style="font-size:14px;color:#000;margin-right:10px">Duration:</span>' + duration + '</div>' +
        '<div style="font-size:16px;font-weight:600"><span style="font-size:14px;color:#000;margin-right:10px">Distance:</span>' + hours + '</div>' +
        '</div>';
    const infowindow = new google.maps.InfoWindow({
        content: contentString,
    });
    markers.addListener("click", () => {
        infowindow.open(map, markers);
        map.setZoom(30)
        map.setCenter(markers.getPosition());
    });
    return markers;
}
function updateMap(destination, name, id) {
    console.log(id)
    socket.on('receive-location-' + id, function (data) {
        var referrals = referral_type[data.id];
        var current = new google.maps.LatLng(data.latitude, data.longitude);
        calculateAndDisplayRoute(current, referrals.destination, data.id, referrals)
    })
}
$('#referral_type').on('change', function (event) {
    var referrals = referral_type[event.target.value];
    default_clinician_id = event.target.value;
    map.setZoom(30)
    map.setCenter(referrals.marker.getPosition());
})
$('#re-center').on('click', function (event) {
    var referrals = referral_type[default_clinician_id];
    map.setZoom(8)
    map.setCenter(referrals.marker.getPosition());
})
//
function calculateAndDisplayRoute(current, destination, type, referrals) {
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
    directionsService.route(request, (response, status) => {
        if (status === 'OK') {
            directionsRenderer.setMap(map)
            directionsRenderer.setPanel(document.getElementById('infoPanel'));
            directionsRenderer.setDirections(response)
            directionsRenderer.setOptions({
                draggable: true,
                hideRouteIndex: false,
                polylineOptions: {
                    strokeColor: referrals.color,
                    strokeOpacity: 1.0,
                    strokeWeight: 5
                }
            });
            var leg = response.routes[0].legs[0];
            if (referral_type[type].marker) {
                referral_type[type].marker.setMap(null);
            }
            if (referral_type[type].patient_marker) {
                referral_type[type].patient_marker.setMap(null);
            }
            referral_type[type].patient_marker = makeMarker(leg.end_location, referrals.start_icon, referrals.destinationName, leg.distance.text, leg.duration.text);
            referral_type[type].marker = makeMarker(leg.start_location, referrals.icon, referrals.originName, leg.distance.text, leg.duration.text);
            if (default_clinician_id === type) {
                var referral = referral_type[default_clinician_id];
                map.setZoom(30)
                map.setCenter(referral_type[type].marker.getPosition());
            }
            // makeMarker( leg.end_location, referrals.start_icon, referrals.destinationName );
        }
    })
}
//This function takes in latitude and longitude of two location and returns the distance between them as the crow flies (in km)
function calcCrow(lat1, lon1, lat2, lon2) {
    var R = 6371; // km
    var dLat = toRad(lat2 - lat1);
    var dLon = toRad(lon2 - lon1);
    var lat1 = toRad(lat1);
    var lat2 = toRad(lat2);
    var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
        Math.sin(dLon / 2) * Math.sin(dLon / 2) * Math.cos(lat1) * Math.cos(lat2);
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    var d = R * c;
    return d;
}
// Converts numeric degrees to radians
function toRad(Value) {
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