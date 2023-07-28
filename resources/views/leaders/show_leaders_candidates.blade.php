@extends('layout')


@section('content')


<h2>Crear referencias</h2>

<form class="form-container__form form-container__form--medium" action="{{ route('backstage.references.save') }}" method="POST">
    @csrf

    <div class="form-columns form-columns--single form-columns--compact">

        <div class="form-group">
            <label for="selectLeader">Selecciona un lider:</label>
            <select name="leader_id" id="selectLeader">
                <option value="">Escoge una opcion</option>
                @foreach($leaders as $leader)
                <option value="{{ $leader->id }}">{{ $leader->first_name }} {{ $leader->last_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="selectCandidate">Selecciona un candidato:</label>
            <select name="candidate_id" id="selectCandidate">
                <option value="">Escoge una opcion</option>
                @foreach($candidates as $candidate)
                <option value="{{ $candidate->id }}">{{ $candidate->first_name }} {{ $candidate->last_name }}</option>
                @endforeach
            </select>
        </div>

    </div>
    <button class="button button--small" type="submit">Guardar</button>
</form>


<hr>

<h2>Lideres y sus candidatos</h2>

<table>
    <thead>
        <tr>
            <th>Nombre del lider</th>
            <th>Nombre del candidato</th>
            <th>Tipo de candidato</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($leaders as $leader)
        <tr>
            <td>{{ $leader->first_name }} {{ $leader->last_name }}</td>
            <td>
                @if($leader->candidates->count() > 0)
                @foreach($leader->candidates as $candidate)
                {{ $candidate->first_name }} {{ $candidate->last_name }}
                @endforeach
                @else
                No tiene candidato asignado
                @endif
            </td>
            <td>
                @if($leader->candidates->count() > 0)
                @foreach($leader->candidates as $candidate)
                {{ $candidate->typeCandidate->name }}
                @endforeach
                @endif
            </td>
            <td>
                @if($leader->candidates->count() > 0)
                @foreach($leader->candidates as $candidate)
                <form method="POST" action="{{ route('leader.remove_candidate', ['leader' => $leader->id, 'candidate' => $candidate->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button class="button button--medium" type="submit">Quitar Candidato</button>
                </form>
                @endforeach
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection