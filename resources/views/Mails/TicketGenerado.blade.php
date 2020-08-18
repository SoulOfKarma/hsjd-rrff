<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Nuevo Ticket Generado</title>
</head>
<body>
    <p>Hola {{ $data->nombre }}</p>
    <p>Se ha generado el Ticket N°: {{ $data->id }}</p>   
    <p>Descripcion: {{ $data->descripcionP }}</p>  
    <p>Esto sera atendido por un agente lo mas pronto posible</p> 
    <p>Este correo es informativo, favor no responder a esta dirección de correo, ya que no se encuentra habilitada para recibir mensajes. 
        Si requiere mayor información sobre el contenido de este mensaje.
        Para cualquier duda o consulta favor comunicarse al correo 
        </p>
        <p>Teléfono: (+56 2)  - Anexo: </p>
</body>
</html>