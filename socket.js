let mix = require("laravel-mix");
require("dotenv").config();
var fs = require("fs");
server = require("http").Server();
var io = require("socket.io")(server, {
    cors: {
        origin: "*"
    }
});

io.on('connection', function(socket){
  socket.on('send-location', function(data){
    console.log('message received/sending: ' + data.id);
    var room = 'receive-location-'+data.id;
    io.sockets.emit(room, data);
  });
});

server.listen(3000, function () {
    console.log('Server is running on ' + 3000 + ' port !');
});
