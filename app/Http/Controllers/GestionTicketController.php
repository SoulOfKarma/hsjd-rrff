<?php

namespace App\Http\Controllers;

use App\GestionSolicitudes;
use App\Mail\TicketAsignado;
use App\SeguimientoSolicitudes;
use App\SolicitudTickets;
use App\Mail\AutoRespuesta;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;
use DB;

class GestionTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getTicketCreado($id)
    {
        return  SolicitudTickets::where('id', $id)->get();
    }

    public function getUsuarios()
    {
        //Traer a todos los usuarios
        $users = Users::all();
        return  $users;
    }


    public function GetTicketAsignado($uuid)
    {
        $users = GestionSolicitudes::firstWhere('uuid', $uuid);
        return  $users;
    }

    public function GetDatoCalendario()
    {
        $users = SolicitudTickets::select('solicitud_tickets.id', 'solicitud_tickets.uuid', 'solicitud_tickets.created_at', 'gestion_solicitudes.id_trabajador', 'trabajadores.tra_nombre_apellido', 'gestion_solicitudes.horaInicio', 'gestion_solicitudes.fechaInicio', 'gestion_solicitudes.horaTermino', 'gestion_solicitudes.fechaTermino')
            ->join('gestion_solicitudes', 'solicitud_tickets.id', '=', 'gestion_solicitudes.id_solicitud')
            ->join('trabajadores', 'gestion_solicitudes.id_trabajador', '=', 'trabajadores.id')
            ->get();
        return  $users;
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Insertando Ticket


        $response2 = SolicitudTickets::where('id', $request->id_solicitud)
            ->update(['id_edificio' => $request->id_edificio, 'id_servicio' => $request->id_servicio, 'id_ubicacionEx' => $request->id_ubicacionEx, 'id_tipoReparacion' => $request->id_tipoReparacion, 'id_estado' => $request->id_estado]);

        $response = GestionSolicitudes::create($request->all());
        return $response2;
    }

    public function NuevoTicket(Request $request)
    {
        //Insertando Ticket

        $uuid = Uuid::uuid4();
        $id = SolicitudTickets::create(array_merge($request->all(), ['uuid' => $uuid]))->id;

        $response = GestionSolicitudes::create(array_merge($request->all(), ['uuid' => $uuid, 'id_solicitud' => $id]));
        return $response;
        /* 

        $receivers = 'ricardo.soto.g@redsalud.gob.cl';
        Mail::to($receivers)->send(new AutoRespuesta($seguimiento)); */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

    }

    public function modificarTicket(Request $request)
    {
        //Modificando Ticket
        $response2 = SolicitudTickets::where('uuid', $request->uuid)
            ->where('id', $request->id_solicitud)
            ->update([
                'id_edificio' => $request->id_edificio, 'id_servicio' => $request->id_servicio,
                'id_ubicacionEx' => $request->id_ubicacionEx, 'id_tipoReparacion' => $request->id_tipoReparacion,
                'id_estado' => $request->id_estado
            ]);
        $response = GestionSolicitudes::where('uuid', $request->uuid)
            ->where('id_solicitud', $request->id_solicitud)
            ->update([
                'id_supervisor' => $request->id_supervisor, 'id_trabajador' => $request->id_trabajador,
                'idApoyo1' => $request->idApoyo1, 'idApoyo2' => $request->idApoyo2,
                'idApoyo3' => $request->idApoyo3, 'horaCambiada' => $request->horaCambiada,
                'fechaCambiada' => $request->fechaCambiada, 'horaTermino' => $request->horaTermino,
                'fechaTermino' => $request->fechaTermino
            ]);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
