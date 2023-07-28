@extends('layout')

@section('content')

<h1>Listado de Líderes</h1>

@if ($leaders->isEmpty())
    <p>No hay líderes registrados.</p>
@else
    <table class="leaders-list">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha de Nacimiento</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Tipo de Identificación</th>
                <th>Número de Identificación</th>
                <th>Ciudad de Nacimiento</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leaders as $leader)
                <tr>
                    <td>{{ $leader->first_name }}</td>
                    <td>{{ $leader->last_name }}</td>
                    <td>{{ $leader->date_of_birth }}</td>
                    <td>{{ $leader->address }}</td>
                    <td>{{ $leader->phone }}</td>
                    <td>{{ $leader->identificationType->name }}</td>
                    <td>{{ $leader->identification_number }}</td>
                    <td>{{ $leader->cityOfBirth->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@endsection
