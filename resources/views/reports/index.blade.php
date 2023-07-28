@extends('layout')

@section('content')

<h1>Generar Reportes</h1>

<div class="report">
    <form action="{{ route('reports.index') }}" method="GET" class="report__filters">
        <div>
            <label for="gender">Género:</label>
            <select name="gender" id="gender" class="report__select">
                <option value="">Seleccione un género</option>
                @foreach ($genders as $gender)
                <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="housing_type">Tipo de vivienda:</label>
            <select name="housing_type" id="housing_type" class="report__select">
                <option value="">Seleccione un tipo de vivienda</option>
                @foreach ($housingTypes as $housingType)
                <option value="{{ $housingType->id }}">{{ $housingType->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="identification_type">Tipo de identificación:</label>
            <select name="identification_type" id="identification_type" class="report__select">
                <option value="">Seleccione un tipo de identificación</option>
                @foreach ($identificationTypes as $identificationType)
                <option value="{{ $identificationType->id }}">{{ $identificationType->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="city_of_birth">Ciudad de nacimiento:</label>
            <select name="city_of_birth" id="city_of_birth" class="report__select">
                <option value="">Seleccione una ciudad de nacimiento</option>
                @foreach ($citiesOfBirth as $city)
                <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="city_of_residence">Ciudad de residencia:</label>
            <select name="city_of_residence" id="city_of_residence" class="report__select">
                <option value="">Seleccione una ciudad de residencia</option>
                @foreach ($citiesOfResidence as $city)
                <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="button button--small">Filtrar</button>
    </form>
</div>

@if ($results->isEmpty())
<p>No se encontraron resultados.</p>
@else
<table class="report__table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Género</th>
            <th>Tipo de vivienda</th>
            <th>Tipo de identificación</th>
            <th>Ciudad de nacimiento</th>
            <th>Ciudad de residencia</th>
            <th>Edad</th>
            <th>Tiene hijos</th>
            <th>Cantidad de hijos</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($results as $result)
        <tr>
            <td>{{ optional($result->user)->name }}</td>
            <td>{{ optional($result->user)->family_name }}</td>
            <td>{{ optional($result->gender)->name }}</td>
            <td>{{ optional($result->housingType)->name }}</td>
            <td>{{ optional($result->identificationType)->name }}</td>
            <td>{{ optional($result->cityOfBirth)->name }}</td>
            <td>{{ optional($result->cityOfResidence)->name }}</td>
            <td>{{ $result->age }}</td>
            <td>{{ $result->has_children ? 'Sí' : 'No' }}</td>
            <td>{{ $result->number_of_children }}</td>
            <td> <a href="{{ route('form.edit', ['id' => $result->id]) }}">Editar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<br>
Total resultados: {{ $totalResults }}
<a href="{{ route('reports.generate-excel') }}" class="button button--small">Descargar Excel</a>
@endif

@endsection