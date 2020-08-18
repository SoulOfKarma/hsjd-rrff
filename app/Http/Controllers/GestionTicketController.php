<?php

namespace App\Http\Controllers;

use App\GestionSolicitudes;
use App\Mail\TicketAsignado;
use App\SeguimientoSolicitudes;
use App\SolicitudTickets;
use App\Mail\AutoRespuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
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

    public function getDataCorreo($uuid)
    {

        $users = DB::table('gestion_solicitudes')
            ->join('solicitud_tickets', 'gestion_solicitudes.id_solicitud', '=', 'solicitud_tickets.id')
            ->join('users', 'solicitud_tickets.id_user', '=', 'users.id')
            ->join('trabajadores', 'gestion_solicitudes.id_trabajador', '=', 'trabajadores.id')
            ->join('supervisores', 'gestion_solicitudes.id_supervisor', '=', 'supervisores.id')
            ->select('gestion_solicitudes.*', 'solicitud_tickets.descripcionP', 'users.nombre', 'trabajadores.tra_nombre_apellido', 'supervisores.sup_nombre_apellido')
            ->where('gestion_solicitudes.uuidTicket', '=', $uuid)
            ->get();

        return  $users;
    }

    public function GetTicketAsignado($uuid)
    {

        $users = DB::table('gestion_solicitudes')->get()
            ->where('uuidTicket', '=', $uuid);

        return  $users;
    }



    public function enviarCorreo(Request $request)
    {
        $data = new GestionSolicitudes();
        $data->nombreUsuario = $request->nombreUsuario;
        $data->descripcionP = $request->descripcionP;
        $data->idTicket = $request->idTicket;
        $data->nombreTra = $request->nombreTra;
        $data->nombreSupervisor = $request->nombreSupervisor;
        $data->fechaInicio = $request->fechaInicio;
        $data->horaInicio = $request->horaInicio;
        $data->fechaTermino = $request->fechaTermino;
        $data->horaTermino = $request->horaTermino;
        Log::info($data);
        $receivers = 'gomez.soto.ricardo@gmail.com';
        Mail::to($receivers)->send(new TicketAsignado($data));
        return $data;
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
        $ticket = new GestionSolicitudes();
        $ticket = array(
            'uuidTicket' => $request->uuid,
            'id_solicitud' => $request->idSolicitud,
            'id_trabajador' => $request->idTrabajador,
            'id_supervisor' => $request->idSupervisor,
            'horaInicio' => $request->time1,
            'horaTermino' => $request->time2,
            'fechaInicio' => $request->fromDate,
            'fechaTermino' => $request->toDate,
            'diasEjecucion' => $request->diaCalculado,
            'horasEjecucion' => $request->horasCalculadas,
            'idApoyo1' => $request->idApoyo1,
            'idApoyo2' => $request->idApoyo2,
            'idApoyo3' => $request->idApoyo3,
        );


        $modificar = new SolicitudTickets();
        $modificar = array(
            'id_estado' => $request->idEstado,
            'id_edificio' => $request->idEdificio,
            'id_servicio' => $request->idServicio,
            'id_ubicacionEx' => $request->idUnidadEsp,
            'id_tipoReparacion' => $request->idTipoRep
        );

        $response = DB::table('solicitud_tickets')
            ->where('uuid', '=',  $request->uuid)
            ->update($modificar);
        $response = DB::table('gestion_solicitudes')->updateOrInsert($ticket);

        return $response;

        $seguimiento = new SeguimientoSolicitudes();

        $seguimiento->uuid = $request->uuid;
        $seguimiento->id_user = $request->idSolicitud;
        $seguimiento->descripcionSeguimiento = "Mensaje enviado";

        $receivers = 'derek.carvajal@redsalud.gob.cl';
        Mail::to($receivers)->send(new AutoRespuesta($seguimiento));
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
        $ticket = new GestionSolicitudes();
        $ticket = array(
            'uuidTicket' => $request->uuid,
            'id_solicitud' => $request->idSolicitud,
            'id_trabajador' => $request->idTrabajador,
            'id_supervisor' => $request->idSupervisor,
            'horaCambiada' => $request->time1,
            'horaTermino' => $request->time2,
            'fechaCambiada' => $request->fromDate,
            'fechaTermino' => $request->toDate,
            'diasEjecucion' => $request->diaCalculado,
            'horasEjecucion' => $request->horasCalculadas,
            'idApoyo1' => $request->idApoyo1,
            'idApoyo2' => $request->idApoyo2,
            'idApoyo3' => $request->idApoyo3,
        );


        $modificar = new SolicitudTickets();
        $modificar = array(
            'id_estado' => $request->idEstado,
            'id_edificio' => $request->idEdificio,
            'id_servicio' => $request->idServicio,
            'id_ubicacionEx' => $request->idUnidadEsp,
            'id_tipoReparacion' => $request->idTipoRep
        );

        $response = DB::table('solicitud_tickets')
            ->where('uuid', '=',  $request->uuid)
            ->update($modificar);
        $response = DB::table('gestion_solicitudes')
            ->where('uuidTicket', '=',  $request->uuid)
            ->update($ticket);

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
