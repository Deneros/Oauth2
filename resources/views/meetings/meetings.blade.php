@extends('layout')

@section('content')


<div class="row">
    <div class="column">
        <h1>Crear Reunión</h1>

        @if (session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
        @endif

        <form class="form-container__form " method="POST" action="{{ route('meetings.store') }}" class="form-container">
            @csrf

            <div class="form-columns form-columns--single form-columns--compact">
                <div class="form-group">
                    <label for="leader">Líder:</label>
                    <select name="leader" id="leader">
                        <option value="">Seleccione un líder</option>
                        @foreach ($leaders as $id => $leader)
                        <option value="{{ $id }}">{{ $leader }}</option>
                        @endforeach
                    </select>
                    @error('leader')
                    <div class="alert">{{ $message }}</div>
                    @enderror
                </div>

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
                    <textarea class="form-textarea" name="description" id="description" rows="4"></textarea>
                    @error('description')
                    <div class="alert">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-actions">
                    <button class="button" type="submit">Crear Reunión</button>
                </div>

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
                    <a href="{{ route('meetings.edit', $meeting->id) }}" class="button">Editar</a>
                    <form action="{{ route('meetings.markCompleted', $meeting->id) }}" method="POST">
                        @csrf
                        <button class="button" type="submit" onclick="return confirm('¿Estás seguro de marcar esta reunión como completada?')">Marcar como completada</button>
                    </form>
                    @endif
                    @if (!$meeting->document_path && !$meeting->completed)
                    <form action="{{ route('meetings.attachDocument', $meeting->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label class="custom-file-upload" for=" document">Adjuntar documento:</label>
                            <input type="file" name="document" id="document">
                        </div>
                        <button class="button" type="submit">Guardar</button>
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