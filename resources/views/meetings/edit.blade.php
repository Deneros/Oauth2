@extends('layout')

@section('content')

<h1>Editar Reunión</h1>

@if (session('success'))
<div class="alert">
    {{ session('success') }}
</div>
@endif

<form class="form-container__form " method="POST" action="{{ route('meetings.update', $meeting->id) }}" class="form-container">
    @csrf
    @method('PUT')

    <div class="form-columns form-columns--single form-columns--compact">
        <div class="form-group">
            <label for="title">Título:</label>
            <input type="text" name="title" id="title" value="{{ $meeting->title }}">
            @error('title')
            <div class="alert">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="location">Ubicación:</label>
            <input type="text" name="location" id="location" value="{{ $meeting->location }}">
            @error('location')
            <div class="alert">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="date_meeting">Fecha y hora de la reunión:</label>
            <input type="datetime-local" name="date_meeting" id="date_meeting" value="{{ date('Y-m-d\TH:i', strtotime($meeting->date_meeting)) }}">
            @error('date_meeting')
            <div class="alert">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Descripción:</label>
            <textarea class="form-textarea" name="description" id="description" rows="4">{{ $meeting->description }}</textarea>
            @error('description')
            <div class="alert">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-actions">
            <button class="button" type="submit">Actualizar Reunión</button>
        </div>

    </div>
</form>

@endsection