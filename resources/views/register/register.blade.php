<!DOCTYPE html>
<html>

<head>
    <title>Registro</title>
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

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        .select-container {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .select-container select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            box-sizing: border-box;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-color: #fff;
            background-image: url('arrow-down.png');
            background-repeat: no-repeat;
            background-position: right center;
        }

        .select-icon {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            pointer-events: none;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Registro</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('register.save') }}">
            @csrf

            <label for="name">Nombres:</label>
            <input type="text" name="name" id="name" required>

            <label for="name">Apellidos:</label>
            <input type="text" name="family_name" id="family_name" required>

            <label for="email">Correo electrónico:</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" required>

            <label for="password_confirmation">Confirmar contraseña:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>

            @if ($role === 'moderador')

            <label for="identification_type">Tipo de identificación:</label>
            <div class="select-container">
                <select name="identification_type" id="identification_type" required>
                    <option value="" disabled selected>Selecciona una opción</option>
                    @foreach($identificationTypes as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
                <span class="select-icon">&#9662;</span>
            </div>
            @error('identification_type')
            <div class="alert alert-danger">Este campo es requerido</div>
            @enderror



            <label for="identification_number">Número de identificación:</label>
            <input type="text" name="identification_number" id="identification_number" required>

            <input type="hidden" name="role" value="{{ $role }}">
            @endif
            <label>
                <input type="checkbox" name="terms" required>
                Acepto los términos y condiciones
            </label>
            @error('terms')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label>
                <input type="checkbox" name="data_protection" required>
                Acepto el tratamiento de datos personales
            </label>
            @error('data_protection')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            <button type="submit">Registrarse</button>
        </form>
    </div>
</body>

</html>