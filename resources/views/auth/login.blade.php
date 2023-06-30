<!DOCTYPE html>
<html>

<head>
    <title>Iniciar sesión</title>
</head>

<body>
    <h1>Iniciar sesión</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <label for="email">Correo electrónico:</label>
        <input type="email" name="email" id="email" required>
        <br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>
        <br>

        <button type="submit">Iniciar sesión</button>
    </form>

    <hr>

    <a href="{{ route('login.google') }}">Iniciar sesión con Google</a>
</body>

</html>