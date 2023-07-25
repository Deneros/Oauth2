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
<br>
<button class="button button--small" id="show-register-form-candidate" type="button">Agregar Candidato</button>

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="register-form-container container--invisible">
    @include('register.register_leader', ['identificationTypes' => $identificationTypes, 'cities'=>$cities])
</div>
<div class="register-form-container-candidate container--invisible">
    @include('register.register_candidate', ['identificationTypes' => $identificationTypes, 'candidate_type'=>$candidate_type, 'cities'=>$cities])
</div>
@endif


<script>
    document.getElementById('show-register-form').addEventListener('click', function() {
        var registerFormContainer = document.querySelector('.register-form-container');
        registerFormContainer.style.display = 'block';
    });
    document.getElementById('show-register-form-candidate').addEventListener('click', function() {
        var registerFormContainerCandidate = document.querySelector('.register-form-container-candidate');
        registerFormContainerCandidate.style.display = 'block';
    });
</script>
@endsection