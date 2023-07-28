@extends('layout')

@section('content')

<h1>Listado de Candidatos</h1>

@if ($candidates->isEmpty())
<p>No hay candidatos registrados.</p>
@else
<table class="candidates-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Partido Político</th>
            <th>Fecha de Nacimiento</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Tipo de Identificación</th>
            <th>Número de Identificación</th>
            <th>Ciudad de Nacimiento</th>
            <th>Tipo de Candidato</th>
        </tr>
    </thead>
    <tbody>
        @foreach($candidates as $candidate)
        <tr>
            <td>{{ $candidate->first_name }} {{ $candidate->last_name }}</td>
            <td>{{ $candidate->party }}</td>
            <td>{{ $candidate->date_of_birth }}</td>
            <td>{{ $candidate->address }}</td>
            <td>{{ $candidate->phone }}</td>
            <td>{{ $candidate->identificationType->name }}</td>
            <td>{{ $candidate->identification_number }}</td>
            <td>{{ $candidate->cityOfBirth->name }}</td>
            <td>{{ $candidate->typeCandidate->name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif

@endsection
