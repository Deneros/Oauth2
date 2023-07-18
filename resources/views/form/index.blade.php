@extends('layout')

@section('content')

<div class="form-container">

    <h1 class="form-container__title">Info</h1>

    @if (session('success'))
    <div class="alert">
        {{ session('success') }}
    </div>
    @endif

    <form class="form-container__form" method="POST" action="{{ route('form.store') }}">
        @csrf

        <div class="form-columns">
            <div class="form-group">
                <label for="identification_type" class="form-group__label">Tipo de identificación:</label>
                <select name="identification_type" id="identification_type" class="form-group__input">
                    <option value="" disabled selected>Selecciona una opción</option>
                    @foreach($identificationTypes as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
                @error('identification_type')
                <div class="alert alert-danger">Este campo es requerido</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="identification_number" class="form-group__label">Número de identificación:</label>
                <input type="text" name="identification_number" id="identification_number" class="form-group__input">
                @error('identification_number')
                <div class="alert alert-danger">Este campo es requerido</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="gender" class="form-group__label">Género:</label>
                <select name="gender" id="gender" class="form-group__input">
                    <option value="" disabled selected>Selecciona una opción</option>
                    @foreach($genders as $id => $option)
                    <option value="{{ $id }}">{{ $option }}</option>
                    @endforeach
                </select>
                @error('gender')
                <div class="alert alert-danger">Este campo es requerido</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="moderator" class="form-group__label">Lideres:</label>
                <select name="moderator" id="moderator" class="form-group__input">
                    <option value="" disabled selected>Selecciona una opción</option>
                    @foreach($moderators as $id => $option)
                    <option value="{{ $id }}">{{ $option }}</option>
                    @endforeach
                </select>
                @error('moderator')
                <div class="alert alert-danger">Este campo es requerido</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="date_of_birth" class="form-group__label">Fecha de nacimiento:</label>
                <input type="date" name="date_of_birth" id="date_of_birth" class="form-group__input">
                @error('date_of_birth')
                <div class="alert alert-danger">Este campo es requerido</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="birth_city" class="form-group__label">Ciudad de nacimiento:</label>
                <select name="birth_city" id="birth_city" class="form-group__input">
                    <option value="" disabled selected>Selecciona una opción</option>
                    @foreach($cities as $id => $option)
                    <option value="{{ $id }}">{{ $option }}</option>
                    @endforeach
                </select>
                @error('birth_city')
                <div class="alert alert-danger">Este campo es requerido</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nationality" class="form-group__label">Nacionalidad:</label>
                <select name="nationality" id="nationality" class="form-group__input">
                    <option value="" disabled selected>Selecciona una opción</option>
                    <option value="Colombiano">Colombiano/a</option>
                </select>
                @error('nationality')
                <div class="alert alert-danger">Este campo es requerido</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="residence_address" class="form-group__label">Dirección de residencia:</label>
                <input type="text" name="residence_address" id="residence_address" class="form-group__input">
                @error('residence_address')
                <div class="alert alert-danger">Este campo es requerido</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="neighborhood" class="form-group__label">Barrio:</label>
                <input type="text" name="neighborhood" id="neighborhood" class="form-group__input">
                @error('neighborhood')
                <div class="alert alert-danger">Este campo es requerido</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="residence_location" class="form-group__label">Lugar de residencia:</label>
                <select name="residence_location" id="residence_location" class="form-group__input">
                    <option value="" disabled selected>Selecciona una opción</option>
                    @foreach($cities as $id => $option)
                    <option value="{{ $id }}">{{ $option }}</option>
                    @endforeach
                </select>
                @error('residence_location')
                <div class="alert alert-danger">Este campo es requerido</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone_number" class="form-group__label">Celular:</label>
                <input type="text" name="phone_number" id="phone_number" class="form-group__input">
                @error('phone_number')
                <div class="alert alert-danger">Este campo es requerido</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="housing_type" class="form-group__label">Tipo de vivienda:</label>
                <select name="housing_type" id="housing_type" class="form-group__input">
                    <option value="" disabled selected>Selecciona una opción</option>
                    @foreach($housingTypes as $id => $option)
                    <option value="{{ $id }}">{{ $option }}</option>
                    @endforeach
                </select>
                @error('housing_type')
                <div class="alert alert-danger">Este campo es requerido</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="dependents_count" class="form-group__label">Cantidad de personas a cargo:</label>
                <input type="number" name="dependents_count" id="dependents_count" class="form-group__input">
                @error('dependents_count')
                <div class="alert alert-danger">Este campo es requerido</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="children" class="form-group__label">Tiene hijos?:</label>
                <select name="children" id="children" class="form-group__input" onchange="toggleDependentFields()">
                    <option value="" disabled selected>Selecciona una opción</option>
                    <option value="1">Sí</option>
                    <option value="0">No</option>
                </select>
                @error('children')
                <div class="alert alert-danger">Este campo es requerido</div>
                @enderror
            </div>

            <div id="dependentFieldsContainer1" class="form-group__dependent-fields" style="display: none;">
                <div class="form-group">
                    <label for="children_count" class="form-group__label">Cuántos hijos tiene:</label>
                    <select name="children_count" id="children_count" class="form-group__input">
                        <option value="" disabled selected>Selecciona una opción</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                    @error('children_count')
                    <div class="alert alert-danger">Este campo es requerido si marco que tiene hijos</div>
                    @enderror
                </div>
            </div>

            <div id="dependentFieldsContainer2" class="form-group__dependent-fields" style="display: none;">
                <div class="form-group">
                    <label for="children_live_with" class="form-group__label">Cuántos viven con usted:</label>
                    <select name="children_live_with" id="children_live_with" class="form-group__input">
                        <option value="" disabled selected>Selecciona una opción</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                    @error('children_live_with')
                    <div class="alert alert-danger">Este campo es requerido si marco que tiene hijos</div>
                    @enderror
                </div>
            </div>

            <div id="dependentFieldsContainer3" class="form-group__dependent-fields" style="display: none;">
                <div class="form-group">
                    <label for="adult_children" class="form-group__label">Cuántos son mayores de edad:</label>
                    <select name="adult_children" id="adult_children" class="form-group__input">
                        <option value="" disabled selected>Selecciona una opción</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                    @error('adult_children')
                    <div class="alert alert-danger">Este campo es requerido si marco que tiene hijos</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="elections_2022" class="form-group__label">Votó en las anteriores elecciones del 2022 para congreso y presidencia?</label>
                <select name="elections_2022" id="elections_2022" class="form-group__input">
                    <option value="" disabled selected>Selecciona una opción</option>
                    <option value="1">Sí</option>
                    <option value="0">No</option>
                </select>
                @error('elections_2022')
                <div class="alert alert-danger">Este campo es requerido</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="elections_2019" class="form-group__label">Votó en las anteriores elecciones del 2019 para alcaldía y gobernación?</label>
                <select name="elections_2019" id="elections_2019" class="form-group__input">
                    <option value="" disabled selected>Selecciona una opción</option>
                    <option value="1">Sí</option>
                    <option value="0">No</option>
                </select>
                @error('elections_2019')
                <div class="alert alert-danger">Este campo es requerido</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="registered_in_dagua" class="form-group__label">Tiene inscrita la cédula en Dagua?</label>
                <select name="registered_in_dagua" id="registered_in_dagua" class="form-group__input">
                    <option value="" disabled selected>Selecciona una opción</option>
                    <option value="1">Sí</option>
                    <option value="0">No</option>
                </select>
                @error('registered_in_dagua')
                <div class="alert alert-danger">Este campo es requerido</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-group__label">Seleccione 3 temas que le gustaría que el próximo alcalde priorice:</label><br>
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
                <div class="alert alert-danger">Este campo debe tener al menos 3 selecciones</div>
                @endif
            </div>
        </div>

        <div class="form-actions">
            <button class="button" type="submit" class="form-actions__submit">Enviar</button>
        </div>
    </form>
</div>

<script>
    function toggleDependentFields() {
        var childrenSelect = document.getElementById('children');
        var dependentFieldsContainer1 = document.getElementById('dependentFieldsContainer1');
        var dependentFieldsContainer2 = document.getElementById('dependentFieldsContainer2');
        var dependentFieldsContainer3 = document.getElementById('dependentFieldsContainer3');

        // Show/hide the container based on the selected value of the "Hijos" select
        if (childrenSelect.value === '1') {
            dependentFieldsContainer1.style.display = 'block';
            dependentFieldsContainer2.style.display = 'block';
            dependentFieldsContainer3.style.display = 'block';
        } else {
            dependentFieldsContainer1.style.display = 'none';
            dependentFieldsContainer2.style.display = 'none';
            dependentFieldsContainer3.style.display = 'none';
        }
    }
</script>
@endsection

