<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required autofocus>
        @error('email')
            <div>{{ $message }}</div>
        @enderror
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        @error('password')
            <div>{{ $message }}</div>
        @enderror
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>

