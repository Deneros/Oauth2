<!DOCTYPE html>
<html>

<head>
    <title>luisfernandobolanosargaez</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/meetings.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/reports.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/home.css') }}"> 

</head>

<body>
    <div class="layout-container">
        <div class="sidebar">
            <ul class="sidebar__list">
                <li class="sidebar__item"><a class="sidebar__link" href="{{ route('home.index') }}">Inicio</a></li>
                <li class="sidebar__item"><a class="sidebar__link" href="{{ route('form.index') }}">Formulario</a></li>
                <li class="sidebar__item"><a class="sidebar__link" href="{{ route('meetings.index') }}">Reuniones</a></li>
                <li class="sidebar__item"><a class="sidebar__link" href="{{ route('backstage.user') }}">Administrar</a></li>
                <li class="sidebar__item"><a class="sidebar__link" href="{{ route('backstage.references') }}">Referencias</a></li>
                <li class="sidebar__item"><a class="sidebar__link" href="{{ route('reports.index') }}">Reportes</a></li>
                <li class="sidebar__item">
                    <form class="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="button" type="submit">Salir</button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>

</html>
