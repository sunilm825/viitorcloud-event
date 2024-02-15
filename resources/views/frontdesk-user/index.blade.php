<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <title>Simple Form</title>
</head>
<body>
    
  <form action="{{ route('event') }}" method="POST">
  @csrf

    <input type="hidden" id="name" name="unique_id" value="{{ request()->unique_id }}" >
    <label for="name">Receiver name:</label>
    <input type="text" id="name" name="receiver_name" value="{{ request()->receiver_name }}" readonly >

    <label for="name">Sender Name:</label>
    <input type="text" id="name" name="sender_name" required>
    <br>
    <label for="message">Comment:</label>
    <textarea id="comment" name="comment" rows="4" cols="50" required></textarea>
    <br>
    <!-- <input type="checkbox" name="event_like" value="1">
    <br> -->
    <input type="submit" value="Submit">
  </form>

</body>
</html>
