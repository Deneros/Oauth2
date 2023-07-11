<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role->name }}</td>
            <td>
                <!-- Botones para deshabilitar y habilitar usuarios -->
                @if ($user->disabled)
                <form action="{{ route('users.enable', $user) }}" method="POST">
                    @csrf
                    <button type="submit">Habilitar</button>
                </form>
                @else
                <form action="{{ route('users.disable', $user) }}" method="POST">
                    @csrf
                    <button type="submit">Deshabilitar</button>
                </form>
                @endif

                <!-- Botón para cambiar el rol de usuario -->
                <a href="{{ route('users.edit_role', $user) }}">Cambiar Rol</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>