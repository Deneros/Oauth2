<form action="{{ url('users-update', $user) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="role_id">Rol:</label>
    <select name="role_id" id="role_id">
        @foreach ($roles as $id => $role)
        <option value="{{ $id }}" {{ $user->role_id == $id ? 'selected' : '' }}>
            {{ $role }}
        </option>
        @endforeach
    </select>

    <button type="submit">Actualizar Rol</button>
</form>