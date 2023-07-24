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
<ul>
    @foreach($leaders as $leader)
    <li>
        {{ $leader->first_name }} {{ $leader->last_name }} -
        @if($leader->candidate)
        {{ $leader->candidate->first_name }} {{ $leader->candidate->last_name }} (Candidate)
        @else
        No Candidate Assigned
        @endif
    </li>
    @endforeach
</ul>

@endsection