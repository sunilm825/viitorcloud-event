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
    <label for="name">Username:</label>
    <input type="text" id="name" name="event_username" value="{{ request()->username }}" readonly >

    <label for="name">Name:</label>
    <input type="text" id="name" name="event_name" required>
    <br>
    <label for="message">Message:</label>
    <textarea id="message" name="event_message" rows="4" cols="50" required></textarea>
    <br>
    <input type="checkbox" name="event_like" value="1">
    <br>
    <input type="submit" value="Submit">
  </form>

</body>
</html>
