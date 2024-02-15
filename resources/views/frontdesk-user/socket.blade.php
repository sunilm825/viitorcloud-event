<div class=”container”>
  <h1>Team A Score</h1>
  <div id=”team1_score”></div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"> </script>
<script>
  var sock = io("{{ env('PUBLISHER_URL') }}:{{ env('BROADCAST_PORT') }}");
  sock.on('action-channel-one:App\\Events\\ActionEvent', function (data){
    console.log(data);
      //data.actionId and data.actionData hold the data that was broadcast
      //process the data, add needed functionality here
      var action = data.actionId;
      var actionData = data.actionData;
if(action == "score_update" && actionData.team1_score) {
          $("#team1_score").html(actionData.team1_score);
    }
});
</script>