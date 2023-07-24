@extends('layout')


@section('content')


<h2>Crear referencias</h2>

<!-- Select para líderes -->
<form action="{{ route('backstage.references.save') }}" method="POST">
    @csrf
    <label for="selectLeader">Select Leader:</label>
    <select name="leader_id" id="selectLeader">
        <option value="">Select a Leader</option>
        @foreach($leaders as $leader)
        <option value="{{ $leader->id }}">{{ $leader->first_name }} {{ $leader->last_name }}</option>
        @endforeach
    </select>

    <label for="selectCandidate">Select Candidate:</label>
    <select name="candidate_id" id="selectCandidate">
        <option value="">Select a Candidate</option>
        @foreach($candidates as $candidate)
        <option value="{{ $candidate->id }}">{{ $candidate->first_name }} {{ $candidate->last_name }}</option>
        @endforeach
    </select>

    <button type="submit">Save</button>
</form>


<hr>

<h2>Lideres y sus candidatos</h2>

<!-- Lista para mostrar líderes y sus candidatos -->
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
                    <button type="submit">Quitar Candidato</button>
                </form>
                @endforeach
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection