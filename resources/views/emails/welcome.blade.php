<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Our Application</title>
</head>
<body>
    <h1>Welcome, {{ $user->name }}!</h1>
    <p>Thank you for registering with our application.</p>
    <p>Please click the following link to verify your email:</p>
    {{--  <a href="{{ route('verify-email', ['token' => $token]) }}">Verify Email</a>  --}}
</body>
</html>
