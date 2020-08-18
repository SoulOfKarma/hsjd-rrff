<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Ticket Asignado</title>
</head>
<body>
    <p>Hola {{ $data->nombreUsuario }}</p>
    <p>Se ha asignado el Ticket N°: {{ $data->idTicket }}</p>
    <p>A : {{ $data->nombreTra }} Y Al Supervisor : {{ $data->nombreSupervisor }}</p>
    <p>Para su revision </p>   
    <p>Descripcion Ticket: {{ $data->descripcionP }}</p> 
    <p>Fecha Visita: {{ $data->fechaInicio }}, Hora Visita: {{ $data->horaInicio }}</p> 
    <p>Fecha Termino: {{ $data->fechaTermino }}, Hora Termino: {{ $data->horaTermino }}</p> 
    
    <p>Este correo es informativo, favor no responder a esta dirección de correo, ya que no se encuentra habilitada para recibir mensajes. 
        Si requiere mayor información sobre el contenido de este mensaje.
        Para cualquier duda o consulta favor comunicarse al correo 
        </p>
        <p>Teléfono: (+56 2)  - Anexo: </p>
</body>
</html>