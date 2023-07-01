<!DOCTYPE html>
<html>

<head>
    <title>Iniciar sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 100px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .button-container button {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .button-container button:hover {
            background-color: #45a049;
        }

        .button-container a.register-btn {
            background-color: #2196f3;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .button-container a.register-btn:hover {
            background-color: #0b7dda;
        }

        .button-container a.google-btn {
            background-color: #f44336;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .button-container a.google-btn:hover {
            background-color: #c62828;
        }

        hr {
            margin-top: 20px;
            border: none;
            border-top: 1px solid #ccc;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Iniciar sesión</h1>

        <form method="POST" action="{{ route('login.auth') }}">
            @csrf

            <label for="email">Correo electrónico:</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" required>

            <div class="button-container">
                <button type="submit">Iniciar sesión</button>
                <a href="{{ route('register') }}" class="register-btn">Registrarse</a>
            </div>
        </form>

        <hr>

        <div class="google-login">
            <a href="{{ route('login.google') }}" class="google-btn">Iniciar sesión con Google</a>
        </div>
    </div>
</body>

</html>