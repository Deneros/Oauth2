@extends('layout')

@section('content')

@if ($homeInfo)
<div class="welcome-section">
    <h1 class="welcome-section__title">{{ $homeInfo->welcome_title }}</h1>
    <p class="welcome-section__description">{{ $homeInfo->welcome_description }}</p>
</div>

<div class="about-section">
    <h2 class="about-section__title">{{ $homeInfo->about_title }}</h2>
    <p class="about-section__description">{{ $homeInfo->about_description }}</p>
</div>

<div class="program-section">
    <h2 class="program-section__title">{{ $homeInfo->program_title }}</h2>
    <!-- <ul class="program-section__list">
        <li class="program-section__item">Honestidad</li>
        <li class="program-section__item">Solidaridad</li>
        <li class="program-section__item">Justicia Social</li>
        <li class="program-section__item">Pluralismo</li>
        <li class="program-section__item">Responsabilidad</li>
    </ul> -->
    <p class="program-section__description">{{ $homeInfo->program_description }}</p>
</div>

@else
<div class="welcome-section">
    <h1 class="welcome-section__title">Bienvenido a mi aplicación</h1>
    <p class="welcome-section__description">Coloco mi perfil a su disposición, para tener el honor si ustedes lo permiten de ser el próximo alcalde de nuestro querido municipio de Dagua. Siempre en mi vida he estado trabajado por nuestra comunidad, desde diferentes frentes y con la mente en alto, he luchado codo a codo con el campesino para llevar nuestros alimentos a la plaza, me he reunido como personero con los diferentes actores políticos y sociales para construir un futuro para nuestros padres, e hijos. Dagueño, el futuro comienza hoy, permíteme guiarlos en ese camino y acompáñame a generar cambios sociales y culturales en busca de un mejor porvenir.</p>
</div>


@endif

@endsection