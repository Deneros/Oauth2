<style>
    .custom-select {
        width: 30%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-bottom: 10px;
        box-sizing: border-box;
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-color: #fff;
        background-image: url('arrow-down.png');
        background-repeat: no-repeat;
        background-position: right center;
    }

    .custom-select:focus {
        outline: none;
        border-color: #4caf50;
        box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
    }
</style>

<form action="{{ url('users-update', $user) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="role_id">Rol:</label>
    <select name="role_id" id="role_id" class="custom-select">
        @foreach ($roles as $id => $role)
        <option value="{{ $id }}" {{ $user->role_id == $id ? 'selected' : '' }}>
            {{ $role }}
        </option>
        @endforeach
    </select>

    <button type="submit">Actualizar Rol</button>
</form>