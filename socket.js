
'use strict';

import fs from 'fs';
import express from 'express';
import app from 'express';
const env = process.env;
require("dotenv").config();
const Redis = require("ioredis");
app.use(express.static("public")); if (env.ISHTTP_SECURE == "true") {
    const http = require("https");
    const privateKey = fs.readFileSync(env.REDIS_PRIVATE_KEY, "utf8");
    const certificate = fs.readFileSync(env.REDIS_CERTIFICATE, "utf8");
    //const redisauth = fs.readFileSync(env.REDIS_PASSWORD,"utf9");
    const credentials = {
        key: privateKey,
        cert: certificate,
    };
    var server = http.createServer(credentials);
} else {
    var server = require("http").Server();
} const io = require("socket.io")(server, {
    cors: {
        origin: "*",
    },
    pingTimeout: 30000,
});
io.on('connection', function(socket) {
            console.log("Socket connected");
            console.log("Socket ID - "+socket.id);
            console.log("Socket connection status - "+socket.connected);
            socket.on("deviceScreenData", function(data) {
               // console.log("screen Id ::: "+data.screenId);
               // console.log("device Id ::: "+data.deviceId);
                //console.log("screen"+data.screenId);
                socket.join("screen"+data.screenId);
                console.log("user connected on room "+ data.screenId);
                console.log(socket.rooms);
            });         socket.on('disconnect', function() {
                console.log(socket.id+'A user disconnected');
            });
        //for test
        //socket.broadcast.emit('ScreenLayoutDiya',{'name':"test"});
    });
var redis = new Redis({
    host: env.REDIS_HOST,
    port: env.REDIS_PORT,
    password: env.REDIS_PASSWORD,
  });
redis.subscribe('Map-diya-wall-channel1',function(err,count) {
});
redis.on('message',function(channel,message) {
        console.log('Message Recieved: ' +message);
        console.log('Message Channel: ' +channel);
        message= JSON.parse(message);
        //for test
        //io.emit('testEvent',{"name" : "new redis socket connected"});
       // io.emit(message.event,message.data);
       io.to("screen"+message.data.screen_id).emit(message.event, message.data);
       console.log("Emit data on screen"+ message.data.screen_id);
        //io.broadcast.emit(channel+ ':' + message.event,message.data);
    });
server.listen(env.SOCKET_PORT, /*env.SOCKET_URL,*/ function () {
    console.log("Listening on Port ", server.address());
}); server.on('listening',function(){
    console.log('ok, server is running');
});
