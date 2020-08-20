<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitudTickets extends Model
{
    //
    protected $fillable = [
        'uuid', 'id_user', 'id_estado', 'id_edificio',
        'id_servicio', 'id_ubicacionEx', 'id_tipoReparacion',
        'tituloP', 'descripcionP'
    ];
}
