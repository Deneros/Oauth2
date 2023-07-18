@extends('layout')


@section('content')
<div class="container">
    <div class="table-container">
        <h1>Administrar Usuarios</h1>
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
                        @include('users.edit_role', ['user' => $user, 'roles' => $roles])
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@if ($user_role !== 'usuario')
<button class="button button--small" id="show-register-form" type="button">Agregar Lider</button>

<div class="register-form-container">
    @include('register.register_form', ['identificationTypes' => $identificationTypes, 'role' => $user_role])
</div>
@endif


<script>
    document.getElementById('show-register-form').addEventListener('click', function() {
        var registerFormContainer = document.querySelector('.register-form-container');
        registerFormContainer.style.display = 'block';
    });
</script>
@endsection