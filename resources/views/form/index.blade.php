<!DOCTYPE html>
<html>

<head>
    <title>Formulario</title>
</head>

<body>
    <h1>Formulario</h1>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form method="POST" action="{{ route('formulario.store') }}">
        @csrf

        <label for="tipo_identificacion">Tipo de identificación:</label>
        <select name="tipo_identificacion" id="tipo_identificacion">
            <option value="Cédula de ciudadanía">Cédula de ciudadanía</option>
            <option value="Cédula de extranjería">Cédula de extranjería</option>
        </select>
        <br>

        <label for="numero_identificacion">Número de identificación:</label>
        <input type="text" name="numero_identificacion" id="numero_identificacion" required>
        <br>

        <!-- Agrega los demás campos del formulario aquí -->

        <label>Temas prioritarios:</label><br>
        <input type="checkbox" name="temas[]" value="Desarrollo de la Agricultura">Desarrollo de la Agricultura<br>
        <input type="checkbox" name="temas[]" value="Desarrollo de la Minería">Desarrollo de la Minería<br>
        <input type="checkbox" name="temas[]" value="Economía">Economía<br>
        <input type="checkbox" name="temas[]" value="Emprendimiento">Emprendimiento<br>
        <input type="checkbox" name="temas[]" value="Seguridad">Seguridad<br>
        <input type="checkbox" name="temas[]" value="Crear oportunidades de Empleo">Crear oportunidades de Empleo<br>
        <input type="checkbox" name="temas[]" value="Educación">Educación<br>
        <input type="checkbox" name="temas[]" value="Salud">Salud<br>
        <input type="checkbox" name="temas[]" value="Recreación">Recreación<br>
        <input type="checkbox" name="temas[]" value="Turismo">Turismo<br>
        <br>

        <button type="submit">Enviar</button>
    </form>
</body>

</html>