<!-- Formulario para cambiar el rol de usuario -->
<form action="{{ route('users.update_role', $user) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="role_id">Rol:</label>
    <select name="role_id" id="role_id">
        @foreach ($roles as $role)
        <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
            {{ $role->name }}
        </option>
        @endforeach
    </select>

    <button type="submit">Actualizar Rol</button>
</form>