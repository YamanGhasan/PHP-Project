<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <link rel="stylesheet" href="app.css">
    <title>Login</title>
</head>
<body>
    <main>
        @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
        @endif
        <section class="photo-section">
    <div class="blurry-background"></div>
        <form class="regForm" action="{{ route('login') }}" method="post">
            @csrf
            <h1 class="welcome">Welcome</h1>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}">
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
            </div>
            <button type="submit">Login</button>
      
        <p>don't have an account yet ! <a href="{{ route('register') }}">Sign up</a></p>
      </form>
    </main>
</body>
</html>
