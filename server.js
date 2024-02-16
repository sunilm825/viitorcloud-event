const server = require('http').createServer();
const io = require('socket.io')(server, {
    cors: {
        origin: 'http://viitorcloud-event.loc',
        methods: ['GET', 'POST'],
        credentials: true  // Add this line
    }
});
const Redis = require('ioredis');
const redis = new Redis();

io.on('connection', (socket) => {
    // console.log(`Socket connected: ${socket.id}`);
  
    // You can access the socket ID like this:
    const socketId = socket.id;
    io.emit('socketId', socket.id);
  });

redis.subscribe('vc-channel', function(err, count) {
    // console.log(err,count);
});

redis.on('message', function(channel, message) {
    console.log('Message Received: ' + message);
    message = JSON.parse(message);
    io.emit(channel + ':' + message.event, message.data);
    // vc-channel
});

server.listen(9001, function(){
    console.log('Listening on Port 9001');
});
