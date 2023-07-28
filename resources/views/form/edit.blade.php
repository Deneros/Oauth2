@extends('layout')

@section('content')

<div class="form-container">

    <h1 class="form-container__title">Editar Info</h1>

    @if (session('success'))
    <div class="alert">
        {{ session('success') }}
    </div>
    @endif

    <form class="form-container__form" method="POST" action="{{ route('form.update', ['id' => $form_data->id]) }}">
        @csrf
        @method('PUT')

        <div class="form-columns">
            <div class="form-group">
                <label for="identification_type" class="form-group__label">Tipo de identificación:</label>
                <select name="identification_type" id="identification_type" class="form-group__input">
                    <option value="" disabled>Selecciona una opción</option>
                    @foreach($identificationTypes as $id => $name)
                    <option value="{{ $id }}" {{ $id == $form_data->identification_type_id ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
                @error('identification_type')
                <div class="alert alert-danger">Este campo es requerido</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="identification_number" class="form-group__label">Número de identificación:</label>
                <input type="text" name="identification_number" id="identification_number" class="form-group__input" value="{{ $form_data->identification_number }}">
                @error('identification_number')
                <div class="alert alert-danger">Este campo es requerido</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="gender" class="form-group__label">Género:</label>
                <select name="gender" id="gender" class="form-group__input">
                    <option value="" disabled>Selecciona una opción</option>
                    @foreach($genders as $id => $option)
                    <option value="{{ $id }}" {{ $id == $form_data->gender_id ? 'selected' : '' }}>{{ $option }}</option>
                    @endforeach
                </select>
                @error('gender')
                <div class="alert alert-danger">Este campo es requerido</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="leader" class="form-group__label">Lideres:</label>
                <select name="leader" id="leader" class="form-group__input">
                    <option value="" disabled>Selecciona una opción</option>
                    @foreach($leaders as $id => $name)
                    <option value="{{ $id }}" {{ $id == $form_data->leader_id ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
                @error('leader')
                <div class="alert alert-danger">Este campo es requerido</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="date_of_birth" class="form-group__label">Fecha de nacimiento:</label>
                <input type="date" name="date_of_birth" id="date_of_birth" class="form-group__input" value="{{ $form_data->date_of_birth }}">
                @error('date_of_birth')
                <div class="alert alert-danger">Este campo es requerido</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="birth_city" class="form-group__label">Ciudad de nacimiento:</label>
                <select name="birth_city" id="birth_city" class="form-group__input">
                    <option value="" disabled>Selecciona una opción</option>
                    @foreach($cities as $id => $name)
                    <option value="{{ $id }}" {{ $id == $form_data->birth_city_id ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
                @error('birth_city')
                <div class="alert alert-danger">Este campo es requerido</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nationality" class="form-group__label">Nacionalidad:</label>
                <select name="nationality" id="nationality" class="form-group__input">
                    <option value="" disabled>Selecciona una opción</option>
                    <option value="Colombiano" {{ $form_data->nationality === 'Colombiano' ? 'selected' : '' }}>Colombiano/a</option>
                </select>
                @error('nationality')
                <div class="alert alert-danger">Este campo es requerido</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="residence_address" class="form-group__label">Dirección de residencia:</label>
                <input type="text" name="residence_address" id="residence_address" class="form-group__input" value="{{ $form_data->residence_address }}">
                @error('residence_address')
                <div class="alert alert-danger">Este campo es requerido</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="neighborhood" class="form-group__label">Barrio:</label>
                <input type="text" name="neighborhood" id="neighborhood" class="form-group__input" value="{{ $form_data->neighborhood }}">
                @error('neighborhood')
                <div class="alert alert-danger">Este campo es requerido</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="residence_location" class="form-group__label">Lugar de residencia:</label>
                <select name="residence_location" id="residence_location" class="form-group__input">
                    <option value="" disabled>Selecciona una opción</option>
                    @foreach($cities as $id => $name)
                    <option value="{{ $id }}" {{ $id == $form_data->residence_location_id ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
                @error('residence_location')
                <div class="alert alert-danger">Este campo es requerido</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone_number" class="form-group__label">Celular:</label>
                <input type="text" name="phone_number" id="phone_number" class="form-group__input" value="{{ $form_data->phone_number }}">
                @error('phone_number')
                <div class="alert alert-danger">Este campo es requerido</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="housing_type" class="form-group__label">Tipo de vivienda:</label>
                <select name="housing_type" id="housing_type" class="form-group__input">
                    <option value="" disabled>Selecciona una opción</option>
                    @foreach($housingTypes as $id => $name)
                    <option value="{{ $id }}" {{ $id == $form_data->housing_type_id ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
                @error('housing_type')
                <div class="alert alert-danger">Este campo es requerido</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="dependents_count" class="form-group__label">Cantidad de personas a cargo:</label>
                <input type="number" name="dependents_count" id="dependents_count" class="form-group__input" value="{{ $form_data->dependents_count }}">
                @error('dependents_count')
                <div class="alert alert-danger">Este campo es requerido</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="children" class="form-group__label">Tiene hijos?:</label>
                <select name="children" id="children" class="form-group__input" onchange="toggleDependentFields()">
                    <option value="" disabled>Selecciona una opción</option>
                    <option value="1" {{ $form_data->has_children ? 'selected' : '' }}>Sí</option>
                    <option value="0" {{ !$form_data->has_children ? 'selected' : '' }}>No</option>
                </select>
                @error('children')
                <div class="alert alert-danger">Este campo es requerido</div>
                @enderror
            </div>

            <div id="dependentFieldsContainer1" class="form-group__dependent-fields" style="display: {{ $form_data->has_children ? 'block' : 'none' }}">
                <div class="form-group">
                    <label for="children_count" class="form-group__label">Cuántos hijos tiene:</label>
                    <select name="children_count" id="children_count" class="form-group__input">
                        <option value="" disabled>Selecciona una opción</option>
                        @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}" {{ $i == $form_data->children_count ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                    @error('children_count')
                    <div class="alert alert-danger">Este campo es requerido si marco que tiene hijos</div>
                    @enderror
                </div>
            </div>

            <div id="dependentFieldsContainer2" class="form-group__dependent-fields" style="display: {{ $form_data->has_children ? 'block' : 'none' }}">
                <div class="form-group">
                    <label for="children_live_with" class="form-group__label">Cuántos viven con usted:</label>
                    <select name="children_live_with" id="children_live_with" class="form-group__input">
                        <option value="" disabled>Selecciona una opción</option>
                        @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}" {{ $i == $form_data->children_live_with ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                    @error('children_live_with')
                    <div class="alert alert-danger">Este campo es requerido si marco que tiene hijos</div>
                    @enderror
                </div>
            </div>

            <div id="dependentFieldsContainer3" class="form-group__dependent-fields" style="display: {{ $form_data->has_children ? 'block' : 'none' }}">
                <div class="form-group">
                    <label for="adult_children" class="form-group__label">Cuántos son mayores de edad:</label>
                    <select name="adult_children" id="adult_children" class="form-group__input">
                        <option value="" disabled>Selecciona una opción</option>
                        @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}" {{ $i == $form_data->adult_children ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                    @error('adult_children')
                    <div class="alert alert-danger">Este campo es requerido si marco que tiene hijos</div>
                    @enderror
                </div>
            </div>
            <!-- Rest of the form fields ... -->

        </div>

        <div class="form-actions">
            <button class="button" type="submit" class="form-actions__submit">Actualizar</button>
        </div>
    </form>
</div>

<script>
    // The JavaScript function for toggling dependent fields remains the same as in the original code
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
