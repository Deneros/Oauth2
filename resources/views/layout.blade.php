<!DOCTYPE html>
<html>

<head>
    <title>Título de tu aplicación</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .layout-container {
            display: flex;
            height: 100vh;
            margin: 0;
        }

        .sidebar {
            width: 250px;
            background-color: #f1f1f1;
            padding: 20px;
            height: 100%;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar li {
            margin-bottom: 10px;
        }

        .sidebar a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: #333;
            background-color: #ddd;
            border-radius: 5px;
        }

        .sidebar a:hover {
            background-color: #ccc;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
            height: 100%;
        }

        /* Estilos adicionales */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            /* padding: 20px; */
            /* display: flex; */
            /* justify-content: center;
            align-items: flex-start; */
            height: 100vh;
        }

        .container {
            width: 600px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            color: #337ab7;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>

</head>

<body>
    <div class="layout-container">
        <div class="sidebar">
            <ul>
                <li><a href="{{ route('form.index') }}">Formulario</a></li>
                <li><a href="{{ route('meetings.index') }}">Reuniones</a></li>
                <li><a href="{{ route('backstage.user') }}">Administrar</a></li>
                <li><a href="#">Reportes</a></li>
                <li><a href="#">Salir</a></li>
            </ul>
        </div>
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>

</html>