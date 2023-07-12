<!DOCTYPE html>
<html>

<head>
</head>
<title>Lista de Usuarios</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        height: 100vh;
    }

    .container {
        width: 600px;
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
    
</style>

<body>
    <div class="container">
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
</body>

</html>