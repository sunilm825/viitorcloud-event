<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Test Socket</title>    
</head>

<body>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Id screen1</th>
                    <th>Diya row-column position</th>
                    <th>Image</th>
                    <th>Is lighten ?</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Test</td>
                    <td>Las</td>
                    <td><div id="notification">Yes</div></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Test-2</td>
                    <td>Las</td>
                    <td><div id="notification">Yes</div></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
<script src="https://cdn.socket.io/4.5.4/socket.io.min.js" 
integrity="sha384-/KNQL8Nu5gCHLqwqfQjA689Hhoqgi2S84SNUxC3roTe4EhJ9AfLkp8QiQcU8AMzI" 
crossorigin="anonymous"></script>
<script type="text/javascript">
    $( document ).ready(function() {
        var socket = io('http://g20-map-diya-laravellive.org:3000');
            // socket.on('Map-diya-wall-channel:ScreenLayoutDiya', function (data){
            // console.log(data);
            // });
        socket.on("connect", () => {
            console.log("clients side socket start 1111111111");
            console.log(socket.id); // x8WIv7-mJelg7on_ALbx
            console.log(socket.connected); // true
             var c = io.connect('http://216.157.91.131:8080/', { query: "foo=bar" });
        });

        //send device and screen data
        socket.emit("deviceScreenData", {screenId : 1,deviceId : '11111'});
        socket.emit("globalDeviceScreenData", {screenId : 'globalscreen',deviceId : '11111'});


        //listen in which room data has been broadcasted
        // socket.on('screen5:ScreenLayoutDiya', function (){
        //     console.log("FONRT CONNECTED");
        // });
        socket.on('ScreenLayoutDiya', function (data){
            console.log("FONRT CONNECTED and get data 1 ScreenLayoutDiya");
            console.log('data -> ',data);
        });
        socket.on('ScreenLayoutContinue', function (data){
            console.log("FONRT CONNECTED and get data 1 ScreenLayoutContinue");
            console.log('data -> ',data);
        });
        socket.on('ScreenLayoutFresh', function (data){
            console.log("FONRT CONNECTED and get data 1 ScreenLayoutFresh");
            console.log('data -> ',data);
        });
        socket.on('ScreenLayoutGlobal', function (data){
            console.log("FONRT CONNECTED and get data 1 ScreenLayoutGlobal");
            console.log('data -> ',data);
        });
    });

    // $( document ).ready(function() {
    //     var socket = io('http://map-diya-wall-laravellive.org:3000');

    //     socket.on('light-up-diya', function (data,client){
    //         console.log(data,client);
    //        });

    // });

</script>
</html>