<!DOCTYPE html>

<html>

<head>

    <title>Admin notif email</title>

</head>

<body>

    <h1>Hello!</h1>

    <p>You got a contact request from {{ $data['from'] }} - {{ $data['email'] }}</p>
    <p>Subject : {{ $data['subject'] }}</p>
    <p>Message : {{ $data['message'] }}</p>
    <p><a href="{{ route('admin.contact') }}">Treat it</a></p>
</body>

</html>