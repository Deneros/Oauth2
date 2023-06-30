<!DOCTYPE html>
<html>

<head>
    <title>Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-columns {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 20px;
        }

        .form-actions {
            margin-top: 20px;
        }

        button[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            color: #333;
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>
    <h1>Form</h1>

    @if (session('success'))
    <div class="alert">
        {{ session('success') }}
    </div>
    @endif

    <form method="POST" action="{{ route('formulario.store') }}">
        @csrf

        <div class="form-columns">
            <div class="form-group">
                <label for="identification_type">Tipo de identificación:</label>
                <select name="identification_type" id="identification_type">
                    <option value="Cédula de ciudadanía">Cédula de ciudadanía</option>
                    <option value="Cédula de extranjería">Cédula de extranjería</option>
                </select>
            </div>

            <div class="form-group">
                <label for="identification_number">Número de identificación:</label>
                <input type="text" name="identification_number" id="identification_number" required>
            </div>

            <div class="form-group">
                <label for="first_name">Nombres:</label>
                <input type="text" name="first_name" id="first_name" required>
            </div>

            <div class="form-group">
                <label for="last_name">Apellidos:</label>
                <input type="text" name="last_name" id="last_name" required>
            </div>

            <div class="form-group">
                <label for="gender">Genero:</label>
                <select name="gender" id="gender">
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="No binario">No binario</option>
                </select>
            </div>

            <div class="form-group">
                <label for="date_of_birth">Fecha de nacimiento:</label>
                <input type="text" name="date_of_birth" id="date_of_birth" required>
            </div>

            <div class="form-group">
                <label for="birth_city">Ciudad de nacimiento:</label>
                <select name="birth_city" id="birth_city">
                    <!-- Options from the locations table -->
                </select>
            </div>

            <div class="form-group">
                <label for="nationality">Nacionalidad:</label>
                <select name="nationality" id="nationality">
                    <!-- Options from the locations table (countries) -->
                </select>
            </div>

            <div class="form-group">
                <label for="residence_address">Dirección de residencia:</label>
                <input type="text" name="residence_address" id="residence_address" required>
            </div>

            <div class="form-group">
                <label for="neighborhood">Barrio:</label>
                <input type="text" name="neighborhood" id="neighborhood" required>
            </div>

            <div class="form-group">
                <label for="residence_location">Lugar de residencia:</label>
                <select name="residence_location" id="residence_location">
                    <!-- Options from the locations table -->
                </select>
            </div>

            <div class="form-group">
                <label for="cell_phone">Celular:</label>
                <input type="text" name="cell_phone" id="cell_phone" required>
            </div>

            <div class="form-group">
                <label for="email">Correo:</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div class="form-group">
                <label for="housing_type">Tipo de vivienda:</label>
                <select name="housing_type" id="housing_type">
                    <option value="Propia">Propia</option>
                    <option value="Familiar">Familiar</option>
                    <option value="Arriendo">Arriendo</option>
                </select>
            </div>

            <div class="form-group">
                <label for="dependents_count">Cantidad de personas a cargo:</label>
                <input type="number" name="dependents_count" id="dependents_count" required>
            </div>

            <div class="form-group">
                <label for="children">Hijos:</label>
                <select name="children" id="children">
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>

            <div class="form-group">
                <label for="number_of_children">Cuantos hijos tiene:</label>
                <input type="number" name="number_of_children" id="number_of_children" required>
            </div>

            <div class="form-group">
                <label for="children_living_with_you">Cuantos viven con usted:</label>
                <input type="number" name="children_living_with_you" id="children_living_with_you" required>
            </div>

            <div class="form-group">
                <label for="adult_children">Cuantos son mayores de edad:</label>
                <input type="number" name="adult_children" id="adult_children" required>
            </div>

            <div class="form-group">
                <label for="elections_2022">Votó en las anteriores elecciones del 2022 para congreso y presidencia?</label>
                <select name="elections_2022" id="elections_2022">
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>

            <div class="form-group">
                <label for="elections_2019">Votó en las anteriores elecciones del 2019 para alcaldía y gobernación?</label>
                <select name="elections_2019" id="elections_2019">
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>

            <div class="form-group">
                <label for="dagua_id">Tiene inscrita la cédula en Dagua?</label>
                <select name="dagua_id" id="dagua_id">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>

            <div class="form-group">
                <label>Select 3 topics that you want the next mayor to prioritize:</label><br>
                <input type="checkbox" name="topics[]" value="Agricultural Development">Desarrollo de la Agricultura<br>
                <input type="checkbox" name="topics[]" value="Mining Development">Desarrollo de la Minería<br>
                <input type="checkbox" name="topics[]" value="Economy">Economía<br>
                <input type="checkbox" name="topics[]" value="Entrepreneurship">Emprendimiento<br>
                <input type="checkbox" name="topics[]" value="Security">Seguridad<br>
                <input type="checkbox" name="topics[]" value="Job Opportunities">Crear oportunidades de Empleo<br>
                <input type="checkbox" name="topics[]" value="Education">Educación<br>
                <input type="checkbox" name="topics[]" value="Health">Salud<br>
                <input type="checkbox" name="topics[]" value="Recreation">Recreación<br>
                <input type="checkbox" name="topics[]" value="Tourism">Turismo<br>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit">Enviar</button>
        </div>
    </form>
</body>

</html>