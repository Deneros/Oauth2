@extends('layout')

@section('content')

<h1>Personalización del Home</h1>

@if (session('success'))
<div class="alert">
    {{ session('success') }}
</div>
@endif

<form method="POST" action="{{ route('personalization.home.update') }}" class="form-container">
    @csrf

    <div class="form-group">
        <label for="welcome_title">Título de Bienvenida:</label>
        <input type="text" name="welcome_title" id="welcome_title" value="{{ $homeInfo->welcome_title ?? '' }}">
        @error('welcome_title')
        <div class="alert">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="welcome_description">Descripción de Bienvenida:</label>
        <textarea class="form-textarea" name="welcome_description" id="welcome_description" rows="4">{{ $homeInfo->welcome_description ?? '' }}</textarea>
        @error('welcome_description')
        <div class="alert">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="program_title">Título del Programa de Gobierno:</label>
        <input type="text" name="program_title" id="program_title" value="{{ $homeInfo->program_title ?? '' }}">
        @error('program_title')
        <div class="alert">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="program_description">Descripción del Programa de Gobierno:</label>
        <textarea class="form-textarea" name="program_description" id="program_description" rows="4">{{ $homeInfo->program_description ?? '' }}</textarea>
        @error('program_description')
        <div class="alert">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="about_title">Título de Acerca del candidato:</label>
        <input type="text" name="about_title" id="about_title" value="{{ $homeInfo->about_title ?? '' }}">
        @error('about_title')
        <div class="alert">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="about_description">Descripción de Acerca de Luis Fernando:</label>
        <textarea class="form-textarea" name="about_description" id="about_description" rows="4">{{ $homeInfo->about_description ?? '' }}</textarea>
        @error('about_description')
        <div class="alert">{{ $message }}</div>
        @enderror
    </div>

    <!-- Agrega más campos para la información que desees -->

    <div class="form-actions">
        <button class="button" type="submit">Guardar Cambios</button>
    </div>
</form>

@endsection