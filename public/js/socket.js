var socket = io('ws://localhost:3001', {
    token: 1,
    transports: ['websocket']
});
socket.on('connect', function () {
    console.log('send-location!');
    socket.emit('send-location', { message: 'Hello Mr.Server!' });
});
