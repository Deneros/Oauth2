@extends('layout')

@section('content')
<style>
    .container {
        width: 100% !important;
        display: flex;
        justify-content: center;
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    a {
        color: #337ab7;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    .register-form-container {
        display: none;
    }

    .table-container {
        width: 100% !important;
        margin-bottom: 20px;
        text-align: center;
    }
</style>

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
<button id="show-register-form" type="button">Agregar Lider</button>

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