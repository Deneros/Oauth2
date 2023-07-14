@extends('layout')

@section('content')
    <h1>Bienvenido a mi aplicación</h1>

    <div class="sidebar-menu">
        <ul>
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Perfil</a></li>
            <li><a href="#">Configuración</a></li>
            <li><a href="#">Salir</a></li>
        </ul>
    </div>

    <div class="main-content">
        <h2>Últimas noticias</h2>
        <div class="news-item">
            <h3>Título de la noticia 1</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam accumsan tortor at lectus tristique, eu porta lectus vestibulum.</p>
        </div>
        <div class="news-item">
            <h3>Título de la noticia 2</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam accumsan tortor at lectus tristique, eu porta lectus vestibulum.</p>
        </div>
        <div class="news-item">
            <h3>Título de la noticia 3</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam accumsan tortor at lectus tristique, eu porta lectus vestibulum.</p>
        </div>
    </div>
@endsection