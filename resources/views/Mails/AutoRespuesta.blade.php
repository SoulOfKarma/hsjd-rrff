<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Llamado de emergencia</title>
</head>
<body>
    <p>Hola! Se ha reportado un nuevo Ticket a las{{ $seguimiento->created_at }}.</p>
    <p>Estos son los datos del usuario que ha realizado la denuncia:</p>
    <ul>
        <li>ID: {{ $seguimiento->id_user }}</li>
        <li>Descripcion: {{ $seguimiento->descripcionSeguimiento }}</li>

    </ul>
</body>
</html>