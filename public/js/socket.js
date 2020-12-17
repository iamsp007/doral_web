var socket = io('http://socket.doralhealthconnect.com', {
    token: 1,
    transports: ['websocket']
});
socket.on('connect', function () {
    socket.emit('send-location', { message: 'Hello Mr.Server!' });

    socket.on('receive-location',function (data) {
        console.log(data,"receive-location")
    })
});
