@extends('layout')

@section('content')
<style>
    .filters {
        margin-bottom: 20px;
    }

    .filters select {
        margin-right: 10px;
    }

    .results-table {
        width: 100%;
        border-collapse: collapse;
    }

    .results-table th,
    .results-table td {
        padding: 10px;
        border: 1px solid #ccc;
    }
</style>

<h1>Generar Reportes</h1>

<div class="filters">
    <form action="{{ route('reports.index') }}" method="GET">
        <select name="gender">
            <option value="">Seleccione un género</option>
            @foreach ($genders as $gender)
            <option value="{{ $gender->id }}">{{ $gender->name }}</option>
            @endforeach
        </select>

        <select name="housing_type">
            <option value="">Seleccione un tipo de vivienda</option>
            @foreach ($housingTypes as $housingType)
            <option value="{{ $housingType->id }}">{{ $housingType->name }}</option>
            @endforeach
        </select>

        <select name="identification_type">
            <option value="">Seleccione un tipo de identificación</option>
            @foreach ($identificationTypes as $identificationType)
            <option value="{{ $identificationType->id }}">{{ $identificationType->name }}</option>
            @endforeach
        </select>

        <select name="city_of_birth">
            <option value="">Seleccione una ciudad de nacimiento</option>
            @foreach ($citiesOfBirth as $city)
            <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
        </select>

        <select name="city_of_residence">
            <option value="">Seleccione una ciudad de residencia</option>
            @foreach ($citiesOfResidence as $city)
            <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
        </select>

        <button type="submit">Filtrar</button>
    </form>
</div>

@if ($results->isEmpty())
<p>No se encontraron resultados.</p>
@else
<table class="results-table">
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
        </tr>
        @endforeach
    </tbody>
</table>
@endif

@endsection