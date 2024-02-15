'use strict';

var app = require('express')();
var server = require('http').Server(app);

let io = require('socket.io')(server,{
    allowEIO3: true,
    cors: {
        origin: true,
        credentials: true
    },
});
require('dotenv').config();
var cors = require('cors'); // Add the cors middleware


var redisPort = process.env.REDIS_PORT;
var redisHost = process.env.REDIS_HOST;
var ioRedis = require('ioredis');
var redis = new ioRedis(redisPort, redisHost);
redis.subscribe('viitorcloud-event');
redis.on('message', function (channel, message) {
//   message  = JSON.parse(message);
  console.log(message);
//   io.emit(channel + ':' + message.event, message.data);
});

var broadcastPort = process.env.BROADCAST_PORT;
server.listen(broadcastPort, function () {
  console.log('Socket server is running. -'+broadcastPort);
});

