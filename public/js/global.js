$(document).ready(function(){
    $("#loader-wrapper").hide();

    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register(base_url+'js/firebase-messaging-sw.js')
            .then(function(registration) {
                // console.log('Registration successful, scope is:', registration.scope);
                const config = {
                    apiKey: "AIzaSyCRAJgZT7W43PSBlhKIu_0uN58Onqb_o7w",
                    projectId: "doctorapp-b4032",
                    messagingSenderId: "409560615341",
                    appId: "1:409560615341:web:5d352036d35e5a5aed3924"
                };
                firebase.initializeApp(config);
                const messaging = firebase.messaging();
                messaging.useServiceWorker(registration)
                messaging
                    .requestPermission()
                    .then(function () {
                        // console.log("Notification permission granted.");

                        // get the token in the form of promise
                        return messaging.getToken()
                    })
                    .then(function(token) {
                        // print the token on the HTML page
                        $("#loader-wrapper").show();
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url:save_token_url,
                            method:'POST',
                            dataType:'json',
                            data:{
                                device_token:token
                            },
                            success:function (response) {
                                $("#loader-wrapper").hide();
                            },
                            error:function (error) {
                                // console.log(error.responseJSON.status+': '+error.responseJSON.message);
                                $("#loader-wrapper").hide();
                            }
                        })
                    })
                    .catch(function (err) {
                        // console.log("Unable to get permission to notify.", err);
                    });

                messaging.onMessage(function(payload) {
                    // var data = JSON.parse(payload.notification.body);
                    const noteTitle = payload.notification.title;
                    const noteOptions = {
                        body: noteTitle,
                        icon: payload.notification.icon,
                    };

                    new Notification(noteTitle, noteOptions).onclick = function (event) {

                        if (payload.data['gcm.notification.notification_type']==='1'){
                            window.location.href=base_url+'clinician/start-roadl/'+payload.data.id;
                        }else if (payload.data['gcm.notification.notification_type']==="2"){
                            window.location.href=base_url+'clinician/running-roadl/'+payload.data.id;
                        }else if (payload.data['gcm.notification.notification_type']==="3"){
                            window.location.href=base_url+'clinician/scheduled-appointment';
                        }else if (payload.data['gcm.notification.notification_type']==="4"){
                            window.location.href=base_url+'clinician/scheduled-appointment';
                        }
                    };
                });

            }).catch(function(err) {
            // console.log('Service worker registration failed, error:', err);
        });
    }
});
