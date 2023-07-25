<form class="form-container__form" method="POST" action="{{ route('register_leader') }}">
    @csrf

    <div class="form-columns form-columns--single form-columns--compact">
        <h2>Información del Líder</h2>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="form-group">
            <label for="first_name">Nombre:</label>
            <input type="text" name="first_name" id="first_name">
        </div>

        <div class="form-group">
            <label for="last_name">Apellido:</label>
            <input type="text" name="last_name" id="last_name">
        </div>

        <div class="form-group">
            <label for="date_of_birth">Fecha de Nacimiento:</label>
            <input type="date" name="date_of_birth" id="date_of_birth">
        </div>

        <div class="form-group">
            <label for="address">Dirección:</label>
            <input type="text" name="address" id="address">
        </div>

        <div class="form-group">
            <label for="phone">Teléfono:</label>
            <input type="text" name="phone" id="phone">
        </div>

        <div class="form-group">
            <label for="identification_type">Tipo de Identificación:</label>
            <select name="identification_type" id="identification_type" required>
                <option value="" disabled selected>Selecciona una opción</option>
                @foreach($identificationTypes as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="identification_number">Número de Identificación:</label>
            <input type="text" name="identification_number" id="identification_number">
        </div>

        <div class="form-group">
            <label for="city_of_birth">Ciudad de Nacimiento:</label>
            <select name="city_of_birth" id="city_of_birth" required>
                <option value="" disabled selected>Selecciona una opción</option>
                @foreach($cities as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>

    </div>

    <button class="button" type="submit">Registrar Líder</button>
</form>