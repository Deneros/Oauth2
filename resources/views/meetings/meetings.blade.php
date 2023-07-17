@extends('layout')

@section('content')
<style>
    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    .row {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }

    .column {
        flex: 1;
        margin-right: 20px;
    }

    .form-container {
        max-width: 600px;
        margin: 0 auto;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-weight: bold;
    }

    .form-group input[type="text"],
    .form-group input[type="number"],
    .form-group input[type="date"],
    .form-group select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .form-actions {
        margin-top: 20px;
        text-align: center;
    }

    .form-actions button[type="submit"] {
        padding: 10px 20px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .alert {
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        color: #333;
        background-color: #f5f5f5;
    }

    .meetings-list {
        list-style: none;
        padding: 0;
    }

    .meeting-item {
        margin-bottom: 20px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #f5f5f5;
    }

    .meeting-item strong {
        font-weight: bold;
    }

    .meeting-item .status {
        margin-top: 10px;
    }

    .meeting-item .document {
        margin-top: 10px;
    }

    .meeting-item .actions {
        margin-top: 10px;
    }

    .meeting-item .actions button {
        padding: 6px 12px;
        margin-right: 10px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .meeting-item .actions form {
        display: inline;
    }

    .meeting-item .actions input[type="file"] {
        margin-top: 10px;
    }

    .meeting-item .actions a {
        margin-top: 10px;
        display: inline-block;
        padding: 6px 12px;
        background-color: #337ab7;
        color: #fff;
        border: none;
        border-radius: 4px;
        text-decoration: none;
    }
</style>

<div class="row">
    <div class="column">
        <h1>Crear Reunión</h1>

        @if (session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
        @endif

        <form method="POST" action="{{ route('meetings.store') }}" class="form-container">
            @csrf

            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" name="title" id="title">
                @error('title')
                <div class="alert">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="location">Ubicación:</label>
                <input type="text" name="location" id="location">
                @error('location')
                <div class="alert">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="date_meeting">Fecha y hora de la reunión:</label>
                <input type="datetime-local" name="date_meeting" id="date_meeting">
                @error('date_meeting')
                <div class="alert">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea name="description" id="description" rows="4"></textarea>
                @error('description')
                <div class="alert">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit">Crear Reunión</button>
            </div>
        </form>
    </div>
    <div class="column">
        <h2>Reuniones existentes:</h2>
        @if ($meetings->isEmpty())
        <p>No hay reuniones programadas.</p>
        @else
        <ul class="meetings-list">
            @foreach($meetings as $meeting)
            <li class="meeting-item">
                <div>
                    <strong>Título:</strong> {{ $meeting->title }}
                </div>
                <div>
                    <strong>Descripción:</strong> {{ $meeting->description }}
                </div>
                <div>
                    <strong>Fecha y Hora:</strong> {{ $meeting->date_meeting }}
                </div>
                <div>
                    <strong>Ubicación:</strong> {{ $meeting->location }}
                </div>
                <div class="status">
                    <strong>Estado:</strong>
                    @if ($meeting->completed)
                    Completada
                    @else
                    Pendiente
                    @endif
                </div>
                <div class="document">
                    <strong>Documento adjunto:</strong>
                    @if ($meeting->document_path)
                    <a href="{{ route('meetings.downloadDocument', $meeting->id) }}">Descargar documento</a>
                    @else
                    No adjunto
                    @endif
                </div>
                <div class="actions">
                    @if (!$meeting->completed)
                    <form action="{{ route('meetings.markCompleted', $meeting->id) }}" method="POST">
                        @csrf
                        <button type="submit" onclick="return confirm('¿Estás seguro de marcar esta reunión como completada?')">Marcar como completada</button>
                    </form>
                    @endif
                    @if (!$meeting->document_path && !$meeting->completed)
                    <form action="{{ route('meetings.attachDocument', $meeting->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="document">Adjuntar documento:</label>
                            <input type="file" name="document" id="document">
                        </div>
                        <button type="submit">Adjuntar</button>
                    </form>
                    @endif
                    @if ($meeting->document)
                    <a href="{{ asset('storage/documents/' . $meeting->document) }}" download>Descargar documento</a>
                    @endif
                </div>
            </li>
            @endforeach
        </ul>
        @endif
    </div>
</div>
@endsection
