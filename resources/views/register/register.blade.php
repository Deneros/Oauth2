<!DOCTYPE html>
<html>

<head>
    <title>Registro</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>
    @include('register.register_form', ['identificationTypes' => $identificationTypes, 'role' => $role])

</body>

</html>