// var base_url = $('#base_url').val();
// socket.on('receive-location', function (data) {
// console.log(data,"receive-location")
// });
// socket.emit('send-location', { latitude: '15.552255',longitude: '16.055222' });
var patient_request_id = $('#patient_request_id').val();
// Initialize and add the map
function getRoadLProcess(callback) {

}

function initMap(postLatLng=null) {
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
            $('#view-duration').html('')
            const directionsService = new google.maps.DirectionsService();
            const directionsRenderer = new google.maps.DirectionsRenderer();
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 14,
                center: new google.maps.LatLng(response.patient.latitude,response.patient.longitude),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            var myMarker = new google.maps.Marker({
                map: map,
                animation: google.maps.Animation.DROP,
                position: new google.maps.LatLng(response.patient.latitude,response.patient.longitude),
            });
            makeMarker(new google.maps.LatLng(response.patient.latitude,response.patient.longitude), base_url+'assets/img/icons/patient-icon.svg', "Doral Patient", map);
            response.clinicians.map(function (value) {
                if(value.status!=='pending'){
                    // makeMarker(new google.maps.LatLng(value.start_latitude,value.end_longitude), base_url+'assets/img/icons/clinician-sb-select.svg', value.first_name+' '+value.last_name+' ( '+value.referral_type+' )', map);
                    var destination = response.patient.latitude+','+response.patient.longitude;
                    var origin = value.start_latitude+','+value.end_longitude;
                    var current = origin;
                    if (value.latitude!==null){
                        makeMarker(new google.maps.LatLng(value.latitude,value.longitude), base_url+'assets/img/icons/clinician-sb-select.svg', value.first_name+' '+value.last_name+' ( '+value.referral_type+' )', map);
                       current = value.latitude+', '+value.longitude;
                    }else {
                        makeMarker(new google.maps.LatLng(value.start_latitude,value.end_longitude), base_url+'assets/img/icons/clinician-sb-select.svg', value.first_name+' '+value.last_name+' ( '+value.referral_type+' )', map);

                    }
                    calculateAndDisplayRoute(directionsService, directionsRenderer,origin,destination,current,map,value.first_name+' '+value.last_name+' ( '+value.referral_type+' )');
                }
            })
            addYourLocationButton(map, myMarker);
        },
        error:function (error) {
            console.log(error)
        }
    })

}

function addYourLocationButton (map, marker) {
    var controlDiv = document.createElement('div');

    var firstChild = document.createElement('button');
    firstChild.style.backgroundColor = '#fff';
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

function makeMarker(position, icon, title, map) {
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
        map.setZoom(15)
    });


}

//
function calculateAndDisplayRoute(directionsService, directionsRenderer,origin,destination,current,map,name) {

    var request = {
        origin: current,
        destination: destination,
        provideRouteAlternatives: true,
        travelMode: 'DRIVING',
        unitSystem: google.maps.UnitSystem.METRIC
    };
    directionsService.route(request,
        (response, status) => {
            if (status === "OK") {


                new google.maps.DirectionsRenderer({
                    map: map,
                    directions: response,
                    suppressMarkers: true
                });
                var leg = response.routes[0].legs[0];
                var duration_text='Name : '+name+'<br/>';
                duration_text+='Total Duration : '+leg.duration.text+'</br>';
                duration_text+='Total Distance : '+leg.distance.text+'<br/></br>';
                $('#view-duration').append(duration_text)
                // makeMarker(leg.start_location, base_url+'assets/img/icons/patient-icon.svg', "Patient Detail", map);
                // makeMarker(leg.end_location, base_url+'assets/img/icons/clinician-sb-select.svg', 'Clinician Detail', map);
            } else {
                window.alert("Directions request failed due to " + status);
            }
        }
    );
}
