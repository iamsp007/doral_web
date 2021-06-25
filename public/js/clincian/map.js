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
        map.setZoom(10)
        map.setCenter(referrals.patient_marker.getPosition());
    });
}
function initMap() {
    navigator.geolocation.getCurrentPosition(function (param) {
        var center = new google.maps.LatLng(param.coords.latitude, param.coords.longitude);
        map = new google.maps.Map(document.getElementById("map"), {
            zoom: 15,
            center:center,
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
    })

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
            const sources = response;
            var html = '';
            var requestInfo = '';
            html+='<button type="button" class="btn btn-outline-info font-weight-bold active mr-2" onclick="buttonVendorClick(0)">All</button>';
            sources.clinicians.map(function (resp,key) {
                default_clinician_id = resp.id;
                var roleName = resp.referral_type;
                html+='<button type="button" class="btn btn-outline-info font-weight-bold mr-2" onclick="buttonVendorClick('+resp.id+')" style="border-color: '+resp.color+'">'+roleName+'</button>';
                var destination = '';
                var role = 'Role:' + roleName;
                var color = resp.color;
                var icon = resp.icon;
                // var icon = base_url + 'assets/img/icons/icons_patient.svg';
                var destinationName = response.patient.first_name + ' ' + response.patient.last_name + '  Role : Patient';
                var originName = null;
                var current = '';
                if (resp.clincial_id===null){
                    destination = new google.maps.LatLng(response.patient.latitude, response.patient.longitude);
                    originName = null;
                    current = null;
                    destinationName = response.patient.first_name + ' ' + response.patient.last_name + '  Role : Patient';
                }else {
                    destination = new google.maps.LatLng(response.patient.latitude, response.patient.longitude);
                    originName = resp.first_name + ' ' + resp.last_name;
                    current = new google.maps.LatLng(resp.latitude, resp.longitude);
                    destinationName = response.patient.first_name + ' ' + response.patient.last_name + '  Role : Patient';
                }
                referral_type[resp.id] = {
                    directionsService: new google.maps.DirectionsService(),
                    directionsRenderer: new google.maps.DirectionsRenderer({ suppressMarkers: true }),
                    id: resp.id,
                    color: color,
                    icon: icon,
                    start_icon: base_url + 'assets/img/icons/icons_patient.svg',
                    originName: originName,
                    role: role,
                    roleName: roleName,
                    destinationName: destinationName,
                    destination: destination,
                    current: current,
                    status:resp.status
                }
              //  html += '<option value="' + resp.id + '">' + originName + '</option>';
                if (current!==null){
                    calculateAndDisplayRoute(current, destination, resp.id, referral_type[resp.id])
                }
                requestInfo+='<li>\n' +
                    '                        <div class="requestInfo labBlock" style="border-color: '+color+'">\n' +
                    '                            <div class="p-3 border-bottom">\n' +
                    '                                <div class="name" id="vendor-name-'+resp.id+'" style="color: '+color+'">'+originName+'</div>\n' +
                    '                                <div class="role" id="vendor-role-'+resp.id+'">Role: '+roleName+' Technician</div>\n' +
                    '                                <div class="role" id="vendor-status-'+resp.id+'">Status: '+resp.status+'</div>\n' +
                    '                            </div>\n' +
                    '                            <div class="pt-2 pb-3 pl-3 pr-3 bg-white">\n' +
                    '                                <div class="status" id="vendor-duration-'+resp.id+'"><span class="mr-2">Duration:</span>0KM</div>\n' +
                    '                                <div class="status mt-1" id="vendor-distance-'+resp.id+'"><span class="mr-2">Distance:</span>0 Mins</div>\n' +
                    '                            </div>\n' +
                    '                        </div>\n' +
                    '                    </li>';

                updateMap(destination, destinationName, resp.id,resp.parent_id)
                $('#patient-name').html(destinationName);
            })

            $('#requestInfo').html(requestInfo);
            $('#btn-roadl-group').html(html);
        },
        error: function (error) {
            console.log(error)
        }
    })
}
function makeMarker(position, icon, title, duration = 0, hours = 0, referrals=null) {
    var markers = new google.maps.Marker({
        position: position,
        map: map,
        icon: icon,
        title: title
    });
    var str = title;
    var contentString =
        '<div class="item_status" style="background:#F8FFFF;border-bottom:1px solid #00E2F2;padding:10px;color:#008591">' +
        '<div style="font-size:18px;font-weight:600">' + str.replace(/Role/gi, '<span style="color:#000;font-size:14px">' + "<br/> Role") + '</div>' +
        '</div>' +
        '<div style="background:#fff;padding:10px;color:#008591">' ;

        if (referrals){
            contentString+= '<div style="font-size:16px;font-weight:600;margin-bottom:5px"><span style="font-size:14px;color:#000;margin-right:10px">Services Type:</span>' + referrals.role + '</div>';
            contentString+= '<div style="font-size:16px;font-weight:600;margin-bottom:5px"><span style="font-size:14px;color:#000;margin-right:10px">Status:</span>' + referrals.status + '</div>';
        }

       contentString+='<div style="font-size:16px;font-weight:600;margin-bottom:5px"><span style="font-size:14px;color:#000;margin-right:10px">Duration:</span>' + duration + '</div>' +
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
function updateMap(destination, name, id,parent_id) {

    socket.on('receive-location-' + parent_id, function (data) {
        
        var referrals = referral_type[data.id];
        var current = new google.maps.LatLng(data.latitude, data.longitude);
        var role = 'Role:' + data.referral_type;
        var color = data.color;
        var icon = data.icon;
        var originName = data.first_name + ' ' + data.last_name;
        if (referrals===undefined){
            var html='<button type="button" class="btn btn-outline-info font-weight-bold mr-2" onclick="buttonVendorClick('+data.id+')" style="border-color: '+data.color+'">'+data.referral_type+'</button>';
            $('#btn-roadl-group').append(html);
            referral_type[data.id] = {
                directionsService: new google.maps.DirectionsService(),
                directionsRenderer: new google.maps.DirectionsRenderer({ suppressMarkers: true }),
                id: data.id,
                color: color,
                icon: icon,
                start_icon: base_url + 'assets/img/icons/icons_patient.svg',
                originName: originName,
                role: role,
                roleName:data.referral_type,
                destinationName: name,
                destination: destination,
                current: current,
                status:data.status
            }
            var requestInfo='<li>\n' +
                '                        <div class="requestInfo labBlock" style="border-color: '+color+'">\n' +
                '                            <div class="p-3 border-bottom">\n' +
                '                                <div class="name" style="color: '+color+'">'+originName+'</div>\n' +
                '                                <div class="role">Role: '+data.referral_type+' Technician</div>\n' +
                '                                <div class="role">Status: '+data.status+'</div>\n' +
                '                            </div>\n' +
                '                            <div class="pt-2 pb-3 pl-3 pr-3 bg-white">\n' +
                '                                <div class="status" id="vendor-duration-'+data.id+'"><span class="mr-2">Duration:</span>0KM</div>\n' +
                '                                <div class="status mt-1" id="vendor-distance-'+data.id+'"><span class="mr-2">Distance:</span>0 Mins</div>\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                    </li>';
            $('#requestInfo').append(requestInfo);
        }else{
            referral_type[data.id].icon=icon;
            referral_type[data.id].color=color;
            referral_type[data.id].current=current;
            referral_type[data.id].originName=originName;
            referral_type[data.id].role=role;
            referral_type[data.id].roleName=data.referral_type;
            referral_type[data.id].status=data.status;
        }
        referrals = referral_type[data.id];
        console.log("socket",default_clinician_id===data.id)
        if(default_clinician_id===data.id){
            map.setZoom(30)
            map.setCenter(referrals.marker.getPosition());
            
        }
        calculateAndDisplayRoute(current, referrals.destination, data.id, referrals)
        $('#vendor-name-'+data.id).html(referrals.originName);
        $('#vendor-name-'+data.id).css({'color': color});
        $('#vendor-role-'+data.id).html('Role: '+referrals.roleName+' Technician');
        $('#vendor-status-'+data.id).html('Status: '+referrals.status);


    })
}
$('#referral_type').on('change', function (event) {
    var id = event.target.value;
    var referrals = referral_type[id];
    if (referrals!==undefined){
        if (referrals.status!=='active'){
            default_clinician_id = id;
            map.setZoom(30)
            map.setCenter(referrals.marker.getPosition());
        }
    }
})

function buttonVendorClick(id) {
    $('#btn-roadl-group').find('.active').removeClass('active');
    $(this).addClass('active');
    var referrals = referral_type[id];
    if (referrals!==undefined){
        if (referrals.status!=='active'){
            default_clinician_id = id;
            map.setZoom(30)
            map.setCenter(referrals.marker.getPosition());
        }
    }else {
        navigator.geolocation.getCurrentPosition(function (param) {
            var center = new google.maps.LatLng(param.coords.latitude, param.coords.longitude);
            map.setZoom(8)
            map.setCenter(center);
        })

    }
}

$('#re-center').on('click', function (event) {
    var referrals = referral_type[default_clinician_id];
    map.setZoom(8)
    map.setCenter(referrals.marker.getPosition());
})
//
function calculateAndDisplayRoute(current, destination, type, referrals) {
    var directionsService = referrals.directionsService;
    var directionsRenderer = referrals.directionsRenderer;
    console.log(current.lat(),destination.lat(),"update")
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
                draggable: false,
                hideRouteIndex: false,
                polylineOptions: {
                    strokeColor: referrals.color,
                    strokeOpacity: 1.0,
                    strokeWeight: 5
                }
            });
            var leg = response.routes[0].legs[0];
            console.log("direction log",leg)
            if (referral_type[type].marker) {
                referral_type[type].marker.setMap(null);
            }
            if (referral_type[type].patient_marker) {
                referral_type[type].patient_marker.setMap(null);
            }
            referral_type[type].patient_marker = makeMarker(leg.end_location, referrals.start_icon, referrals.destinationName, leg.distance.text, leg.duration.text);
            referral_type[type].marker = makeMarker(leg.start_location, referrals.icon, referrals.originName, leg.distance.text, leg.duration.text,referrals);
            if (default_clinician_id === type) {
                var referral = referral_type[default_clinician_id];
                map.setZoom(30)
                map.setCenter(referral_type[type].marker.getPosition());
            }
            let distance = computeTotals(response);
            var duration_text='<span class="mr-2">Duration:</span>'+leg.duration.text;
            var distance_text='<span class="mr-2">Distance:</span>'+distance+' mile';
            $('#vendor-duration-'+type).html(duration_text);
            $('#vendor-distance-'+type).html(distance_text);
            // makeMarker( leg.end_location, referrals.start_icon, referrals.destinationName );
        }else {
            console.log(status)
        }
    })
}

function computeTotals(result) {
    var totalDist = 0;
    var totalTime = 0;
    var myroute = result.routes[0];
    for (i = 0; i < myroute.legs.length; i++) {
      totalDist += myroute.legs[i].distance.value;
      totalTime += myroute.legs[i].duration.value;
    }
    totalDist = totalDist / 1000;
    return (totalDist * 0.621371).toFixed(2)
    // infowindow.setContent(infowindow.getContent() + "<br>total distance=" + totalDist.toFixed(2) + " km (" + (totalDist * 0.621371).toFixed(2) + " miles)<br>total time=" + (totalTime / 60).toFixed(2) + " minutes");
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
