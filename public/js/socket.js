var socket = io('http://localhost:3000', {
    query:"token="+1,
    transports: ['websocket']
});
