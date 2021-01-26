var socket = io(socket_url, {
    query:"token="+1,
    transports: ['websocket']
});
