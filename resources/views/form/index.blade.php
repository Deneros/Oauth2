<!DOCTYPE html>
<html>

<head>
    <title>Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            /* padding: 20px; */
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            /* margin-bottom: 20px; */
        }

        .form-group label {
            display: block;
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group input[type="date"],
        .form-group select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* .form-group select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32"><path d="M0 8 L32 8 L16 24 Z" /></svg>') no-repeat right 8px center/10px 10px;
            padding-right: 32px;
        } */

        .form-columns {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 40px;
        }



        .form-container {
            max-width: 1000px;
            margin: 0 auto;
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
    <div class="form-container">

        <h1>Info</h1>

        @if (session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('form.store') }}">
            @csrf

            <div class="form-columns">
                <div class="form-group">
                    <label for="identification_type">Tipo de identificación:</label>
                    <select name="identification_type" id="identification_type">
                        @foreach($identificationTypes as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                    @error('identification_type')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="identification_number">Número de identificación:</label>
                    <input type="text" name="identification_number" id="identification_number">
                    @error('identification_number')
                    <div class="alert alert-danger">Este campo es requerido</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="gender">Género:</label>
                    <select name="gender" id="gender">
                        @foreach($genders as $id => $option)
                        <option value="{{ $id }}">{{ $option }}</option>
                        @endforeach
                    </select>
                    @error('gender')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="date_of_birth">Fecha de nacimiento:</label>
                    <input type="date" name="date_of_birth" id="date_of_birth">
                    @error('date_of_birth')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="birth_city">Ciudad de nacimiento:</label>
                    <select name="birth_city" id="birth_city">
                        <!-- Options from the locations table -->
                    </select>
                    @error('birth_city')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nationality">Nacionalidad:</label>
                    <select name="nationality" id="nationality">
                        <option value="Colombia">Colombia</option>
                    </select>
                    @error('nationality')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="residence_address">Dirección de residencia:</label>
                    <input type="text" name="residence_address" id="residence_address">
                    @error('residence_address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="neighborhood">Barrio:</label>
                    <input type="text" name="neighborhood" id="neighborhood">
                    @error('neighborhood')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="residence_location">Lugar de residencia:</label>
                    <select name="residence_location" id="residence_location">
                        <!-- Options from the locations table -->
                    </select>
                    @error('residence_location')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="cell_phone">Celular:</label>
                    <input type="text" name="phone_number" id="phone_number">
                    @error('phone_number')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="housing_type">Tipo de vivienda:</label>
                    <select name="housing_type" id="housing_type">
                        @foreach($housingTypes as $id => $option)
                        <option value="{{ $id }}">{{ $option }}</option>
                        @endforeach
                    </select>
                    @error('housing_type')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="dependents_count">Cantidad de personas a cargo:</label>
                    <input type="number" name="dependents_count" id="dependents_count">
                    @error('dependents_count')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="children">Hijos:</label>
                    <select name="children" id="children">
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                    @error('children')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="children_count">Cuántos hijos tiene:</label>
                    <input type="number" name="children_count" id="children_count">
                    @error('children_count')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="children_live_with">Cuántos viven con usted:</label>
                    <input type="number" name="children_live_with" id="children_live_with">
                    @error('children_live_with')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="adult_children">Cuántos son mayores de edad:</label>
                    <input type="number" name="adult_children" id="adult_children">
                    @error('adult_children')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="elections_2022">Votó en las anteriores elecciones del 2022 para congreso y presidencia?</label>
                    <select name="elections_2022" id="elections_2022">
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                    @error('elections_2022')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="elections_2019">Votó en las anteriores elecciones del 2019 para alcaldía y gobernación?</label>
                    <select name="elections_2019" id="elections_2019">
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                    @error('elections_2019')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="registered_in_dagua">Tiene inscrita la cédula en Dagua?</label>
                    <select name="registered_in_dagua" id="registered_in_dagua">
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                    @error('registered_in_dagua')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Seleccione 3 temas que le gustaría que el próximo alcalde priorice:</label><br>
                    <input type="checkbox" name="topics[]" value="1">Desarrollo de la Agricultura<br>
                    <input type="checkbox" name="topics[]" value="2">Desarrollo de la Minería<br>
                    <input type="checkbox" name="topics[]" value="3">Economía<br>
                    <input type="checkbox" name="topics[]" value="4">Emprendimiento<br>
                    <input type="checkbox" name="topics[]" value="5">Seguridad<br>
                    <input type="checkbox" name="topics[]" value="6">Crear oportunidades de Empleo<br>
                    <input type="checkbox" name="topics[]" value="7">Educación<br>
                    <input type="checkbox" name="topics[]" value="8">Salud<br>
                    <input type="checkbox" name="topics[]" value="9">Recreación<br>
                    <input type="checkbox" name="topics[]" value="10">Turismo<br>
                    @if ($errors->has('topics'))
                    <div class="alert alert-danger">{{ $errors->first('topics') }}</div>
                    @endif
                </div>
            </div>

            <div class="form-actions">
                <button type="submit">Enviar</button>
            </div>
        </form>
    </div>
</body>

</html>