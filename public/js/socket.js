var socket = io('http://localhost:3000');

socket.on('connect',function (socket) {


    socket.on('user-channel',function (data) {
        console.log(data,"user channel")
    })
    socket.on('disconnect',function (data) {
        console.log(data,"disconnect")
    })
})
