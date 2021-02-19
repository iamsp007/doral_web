/*
Give the service worker access to Firebase Messaging.
Note that you can only use Firebase Messaging here, other Firebase libraries are not available in the service worker.
*/
importScripts('https://www.gstatic.com/firebasejs/6.3.4/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/6.3.4/firebase-messaging.js');

/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
* New configuration for app@pulseservice.com
*/
firebase.initializeApp({
    apiKey: "AIzaSyC5rTr8rSUyQeKlbaAHW1Xo-ezNoQO0dUE",
    projectId: "doral-roadl",
    messagingSenderId: "606071434218",
    appId: "1:606071434218:web:8ba9b96b1af8ff8309a093"
});

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();

messaging.setBackgroundMessageHandler(function(payload) {
    console.log(
        "[firebase-messaging-sw.js] Received background message ",
        payload,
    );
    console.log(payload.data)
    // Customize notification here
    const notificationTitle = "Background Message Title";
    const notificationOptions = {
        body: "Background Message body.",
        icon: "/itwonders-web-logo.png",
    };

    self.addEventListener('notificationclick', function(event) {
        console.log('On notification click: ', event.notification.tag);
        // Android doesn't close the notification when you click on it
        // See: http://crbug.com/463146
        event.notification.close();

        // This looks to see if the current is already open and
        // focuses if it is
        event.waitUntil(
            clients.matchAll({
                type: "window"
            })
                .then(function(clientList) {
                    for (var i = 0; i < clientList.length; i++) {
                        var client = clientList[i];
                        if (client.url == '/' && 'focus' in client)
                            return client.focus();
                    }
                    if (clients.openWindow) {
                        return clients.openWindow('/');
                    }
                })
        );
    });


    return self.registration.showNotification(
        notificationTitle,
        notificationOptions,
    );
});
