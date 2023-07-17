@extends('layout')

<style>
    h1,
    h2,
    h3 {
        color: #333;
        text-align: center;
    }

    .container {
        max-width: 900px;
        margin: 0 auto;
        padding: 20px;
    }

    /* Estilos para el home */
    .welcome-section,
    .program-section,
    .about-section {
        background-color: #fff;
        padding: 40px;
        margin-bottom: 40px;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .program-section ul,
    .program-section ol {
        padding-left: 20px;
    }

    .news-item {
        margin-bottom: 20px;
        border-bottom: 1px solid #ddd;
        padding-bottom: 20px;
    }

    .news-item h3 {
        color: #555;
        margin-bottom: 10px;
    }

    .news-item p {
        color: #777;
        line-height: 1.5;
    }
</style>
@section('content')

<div>
    <div class="welcome-section">
        <h1>Bienvenido a mi aplicación</h1>
        <p>Coloco mi perfil a su disposición, para tener el honor si ustedes lo permiten de ser el próximo alcalde de nuestro querido municipio de Dagua. Siempre en mi vida he estado trabajado por nuestra comunidad, desde diferentes frentes y con la mente en alto, he luchado codo a codo con el campesino para llevar nuestros alimentos a la plaza, me he reunido como personero con los diferentes actores políticos y sociales para construir un futuro para nuestros padres, e hijos. Dagueño, el futuro comienza hoy, permíteme guiarlos en ese camino y acompáñame a generar cambios sociales y culturales en busca de un mejor porvenir.</p>
    </div>

    <div class="program-section">
        <h2>Programa de Gobierno</h2>
        <ul>
            <li>Honestidad</li>
            <li>Solidaridad</li>
            <li>Justicia Social</li>
            <li>Pluralismo</li>
            <li>Responsabilidad</li>
        </ul>
        <p>Nuestro programa de gobierno se divide en 4 pilares fundamentales:</p>
        <ol>
            <li>Impulsar el desarrollo del campo, y para ello el gobierno nacional nos brindará apoyo para realizar la implementación de programas de sustitución de cultivos de uso ilícito.</li>
            <li>Generación de empleo, buscando la capacitación en temas de tecnologías de la información y emprendimiento.</li>
            <li>Mejora de la infraestructura. La carretera Dagua - Cali debe mejorar su capacidad vehicular y su iluminación.</li>
        </ol>
    </div>

    <div class="about-section">
        <h2>Acerca de Luis Fernando</h2>
        <p>Luis Fernando es un abogado de profesión, nacido en una familia humilde y en un barrio popular. Ha logrado destacarse en los círculos políticos por su don de gente, carisma y sobre todo por su compromiso con su comunidad.</p>
    </div>

    <div class="welcome-section">
        <h2>Bienvenidos</h2>
        <p>Quiero darles la bienvenida para que integren este proyecto político, este proyecto social, que este 30 de octubre buscará darle a Dagua la oportunidad de iniciar su proyección hacia el futuro actual, teniendo en cuenta los cambios sociales, culturales y técnicos que hoy se presentan.</p>
        <p>Impulsar el campo es primordial para nuestra sociedad. Tenemos la responsabilidad de garantizar una agricultura a futuro y sostenible. Además, buscaremos quitarle a las organizaciones ilegales la capacidad de arrebatarnos a nuestros jóvenes, mediante programas deportivos y educativos.</p>
        <p>La implementación del programa de sustitución de cultivos nos ayudará a crear alternativas en el campo, pasando de una economía destructiva basada en cultivos ilícitos, a una economía constructiva en la cual podemos exportar y mejorar la calidad de vida de los Dagueños.</p>
        <p>El futuro es ahora, y juntos podemos construirlo.</p>
    </div>
</div>

@endsection