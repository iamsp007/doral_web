var base_url = $('#base_url').val();
// socket.on('receive-location', function (data) {
// console.log(data,"receive-location")
// });
// socket.emit('send-location', { latitude: '15.552255',longitude: '16.055222' });
var patient_request_id = $('#patient_request_id').val();
// Initialize and add the map
function getRoadLProcess(callback) {
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
                var origin='';
                var destination='';
                var locations=[];
                response.map( (resp)=> {
                    if (resp.status==='start'){
                        origin=resp.latitude+', '+resp.longitude
                    }else if (resp.status==='complete'){
                        destination=resp.latitude+', '+resp.longitude;
                    }else {
                        locations.push( {
                            location:resp.latitude+', '+resp.longitude,
                            lat:resp.latitude,
                            lng:resp.longitude,
                            lable:resp.status
                        })
                    }
                });
                callback(locations,origin,destination)
            },
            error:function (error) {
                console.log(error)
            }
        })
    },10000)
}
var postLatLong={ lat: 25.552255, lng:  69.552255 };

if (navigator.geolocation){
    navigator.geolocation.getCurrentPosition((position => {
        postLatLong={ lat: position.coords.latitude, lng:  position.coords.longitude };
        initMap(postLatLong)
    }),(error)=>{

    },{enableHighAccuracy:true,maximumAge:3000,timeout:5000});
}
var locations =[
    // { location:'21.9347,69.6393',lat: 21.9347, lng: 69.6393,lable:'Sanakhala'},
    // { location:'21.9408,69.6673',lat: 21.9408, lng: 69.6673,lable:'Simar'},
    // { location:'21.9290,69.7838',lat: 21.9290, lng: 69.7838,lable:'Bhanvad'},
    // { location:'22.4707,70.0577',lat: 22.4707, lng: 70.0577,lable:'Jamnager'},
    // { location:'22.3039,70.8022',lat: 22.3039, lng: 70.8022,lable:'Rajkot'},
    // { location:'23.0225,72.5714',lat: 23.0225, lng: 72.5714,lable:'Ahmedabad'},
];

function initMap(postLatLng=null) {
    if (postLatLng){
        postLatLong=postLatLng
    }

    if (navigator.geolocation)
    {
        const directionsService = new google.maps.DirectionsService();
        const directionsRenderer = new google.maps.DirectionsRenderer();

        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 14,
            center: postLatLong,
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
            zoom: 14,
            map: map,
            position: new google.maps.LatLng(postLatLong.lat,postLatLong.lng),
            title: 'Your current location',
        });

        var circle = new google.maps.Circle({
            map: map,
            radius: 25000,    // 5 miles in metres
            fillColor: '#5aba5c'
        });
        circle.bindTo('center', cmarker, 'position');

        // Create an array of alphabetical characters used to label the markers.
        const labels = "Sunil Karmur";
        const contentString =
            '<div id="content">' +
            '<div id="siteNotice">' +
            "</div>" +
            '<h1 id="firstHeading" class="firstHeading">Uluru</h1>' +
            '<div id="bodyContent">' +
            "<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large " +
            "sandstone rock formation in the southern part of the " +
            "Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) " +
            "south west of the nearest large town, Alice Springs; 450&#160;km " +
            "(280&#160;mi) by road. Kata Tjuta and Uluru are the two major " +
            "features of the Uluru - Kata Tjuta National Park. Uluru is " +
            "sacred to the Pitjantjatjara and Yankunytjatjara, the " +
            "Aboriginal people of the area. It has many springs, waterholes, " +
            "rock caves and ancient paintings. Uluru is listed as a World " +
            "Heritage Site.</p>" +
            '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">' +
            "https://en.wikipedia.org/w/index.php?title=Uluru</a> " +
            "(last visited June 22, 2009).</p>" +
            "</div>" +
            "</div>";


        const infowindow = new google.maps.InfoWindow({
            content: contentString,
        });
        const infoWindow = new google.maps.InfoWindow();

        const locationButton = document.createElement("button");
        locationButton.textContent = "Pan to Current Location";
        locationButton.classList.add("custom-map-control-button");
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
        locationButton.addEventListener("click", () => {
            if (navigator.geolocation){
                navigator.geolocation.getCurrentPosition((position)=>{
                    const pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };
                    infoWindow.setPosition(pos);
                    infoWindow.setContent("Location found.");
                    infoWindow.open(map);
                    map.setCenter(pos);

                },(error)=>{

                },{enableHighAccuracy:true,maximumAge:2000})
            }
        })

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

        google.maps.event.addListener(markers,'click',function() {
            var pos = map.getZoom();
            map.setZoom(14);
            map.setCenter(marker.getPosition());
            window.setTimeout(function() {map.setZoom(pos);},3000);
        });
        directionsRenderer.setMap(map);
        var patient_request_id = $('#patient_request_id').val();
        getRoadLProcess((locations,origin,destination)=>{
            console.log(locations,origin,destination)
            if (locations.length>0){
                // var origin = locations[0].lat+','+locations[0].lng;
                // var destination = locations[2].lat+','+locations[2].lng;
                // origin = locations[0].lat+','+locations[0].lng;
                // destination = locations[locations.length-1].lat+','+locations[locations.length-1].lng;
                calculateAndDisplayRoute(directionsService, directionsRenderer,origin,destination,locations);
            }else {
                alert('No Data Found')
            }
        })

    }
    else
    {
        alert('It seems like Geolocation, which is required for this page, is not enabled in your browser.');
    }

}
//
function calculateAndDisplayRoute(directionsService, directionsRenderer,origin,destination,waypoints) {
    var waypoints = waypoints.map(function (location) {
        return {location:location.location}
    })

    var request = {
        origin: origin,
        destination: destination,
        waypoints: waypoints,
        durationInTraffic: true,
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
