<!DOCTYPE html>
<html>

<head>
    <title>Iniciar sesión</title>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-form {
            font-weight: bold;
            max-height: 90%;
            max-width: 80%;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
        }

        .form-content {
            color: white;
            padding: 2rem;
            background-color: #361E7E;
            width: 40%;
            margin-right: 20px;
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

        .google-login {
            text-align: center;
            margin-top: 20px;
        }

        .google-login a.google-btn {
            background-color: #f44336;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .google-login a.google-btn:hover {
            background-color: #c62828;
        }

        .image-container {
            width: 60%;
            display: flex;
            justify-content: center;
        }

        .image-container img {
            object-fit: cover;
            height: 100%;
        }

        .logo {
            width: 80%;
            margin: auto;
            display: block;
        }

        .login-content {
            margin-top: 6rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-form">
            <div class="form-content">
                <img class="logo" src="{{ asset('img/logo-partidos-2.png') }}" alt="Imagen">

                <div class="login-content">
                    <h1>Iniciar Sesión</h1>
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

                    @if ($errors->any())
                    <div style="color: red; margin-top: 10px;">
                        {{ $errors->first('message') }}
                    </div>
                    @endif
                    <hr>
                    <div class="google-login">
                        <a href="{{ route('login.google') }}" class="google-btn">Iniciar sesión con Google</a>
                    </div>
                </div>
            </div>

            <div class="image-container">
                <img src="{{ asset('img/lfb_1.png') }}" alt="Imagen">
            </div>
        </div>
    </div>
</body>

</html>