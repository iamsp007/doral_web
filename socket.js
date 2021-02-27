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
  socket.on('send', function(msg){
    console.log('message received/sending: ' + msg);
    io.sockets.emit('new', msg);
  });
});

server.listen(3000);
