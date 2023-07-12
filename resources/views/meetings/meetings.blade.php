<!DOCTYPE html>
<html>

<head>
    <title>Crear Reunión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }

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
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
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
                    <label for="description">Descripción:</label>
                    <textarea name="description" id="description" rows="4"></textarea>
                    @error('description')
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

                <div class="form-actions">
                    <button type="submit">Crear Reunión</button>
                </div>
            </form>
        </div>
        <div class="column">
            <h2>Reuniones existentes:</h2>
            <ul class="meetings-list">
                @foreach($meetings as $meeting)
                <li class="meeting-item">
                    <strong>Título:</strong> {{ $meeting->title }}<br>
                    <strong>Descripción:</strong> {{ $meeting->description }}<br>
                    <strong>Fecha y Hora:</strong> {{ $meeting->date_meeting }}
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>

</html>