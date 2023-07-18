<form action="{{ url('users-update', $user) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="role_id" class="form-label">Rol:</label>
    <select name="role_id" id="role_id" class="custom-select">
        @foreach ($roles as $id => $role)
        <option value="{{ $id }}" {{ $user->role_id == $id ? 'selected' : '' }}>
            {{ $role }}
        </option>
        @endforeach
    </select>

    <button class="button" type="submit" class="form-button form-button--primary">Actualizar Rol</button>
</form>