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
            var origin=response.latitude+', '+response.longitude;
            var destination=response.destination.latitude+', '+response.destination.longitude;;
            var locations=[];

            response.routes.map( (resp)=> {
                locations.push( {
                    location:resp.latitude+', '+resp.longitude,
                    lat:resp.latitude,
                    lng:resp.longitude,
                    lable:resp.user.first_name+' '+resp.user.last_name
                })
            });
            const directionsService = new google.maps.DirectionsService();
            const directionsRenderer = new google.maps.DirectionsRenderer();
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 14,
                center: new google.maps.LatLng(response.latitude,response.longitude),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            if (locations.length>0){
                var orginlat=response.latitude;
                var orginlng=response.longitude;
                if ((orginlat && orginlat!=='') && (orginlng && orginlng!=='')){
                    orginlat = locations[0].lat;
                    orginlng = locations[0].lng;
                }
                if (destination===''){
                    destination = locations[locations.length-1].lat+','+locations[locations.length-1].lng;
                }

                var myMarker = new google.maps.Marker({
                    map: map,
                    animation: google.maps.Animation.DROP,
                    position: new google.maps.LatLng(response.latitude,response.longitude),
                });
                addYourLocationButton(map, myMarker);
                calculateAndDisplayRoute(directionsService, directionsRenderer,response,locations,map);
            }else {
                alert('No Data Found')
            }
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
function calculateAndDisplayRoute(directionsService, directionsRenderer,response,waypoints,map) {
    var waypoint = waypoints.map(function (location) {
        return {location:location.location}
    })
    var request = {
        origin: response.latitude+','+response.longitude,
        destination: response.destination.latitude+','+response.destination.longitude,
        waypoints:[{location:waypoints[0].location}],
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
                console.log(leg.steps)
                $('#view-duration').html(leg.distance.text+','+leg.duration.text)
                makeMarker(leg.start_location, base_url+'assets/img/icons/patient-icon.svg', "Patient Detail", map);
                makeMarker(leg.end_location, base_url+'assets/img/icons/clinician-sb-select.svg', 'Clinician Detail', map);
            } else {
                window.alert("Directions request failed due to " + status);
            }
        }
    );
}
