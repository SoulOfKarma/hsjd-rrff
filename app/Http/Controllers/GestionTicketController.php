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
        /* $ticket = new GestionSolicitudes();

        $ticket = array(
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
        ); */


        /*  $insertarGestion = new SolicitudTickets();
        $insertarGestion = array(
            'id_estado' => $request->idEstado,
            'id_edificio' => $request->idEdificio,
            'id_servicio' => $request->idServicio,
            'id_ubicacionEx' => $request->idUnidadEsp,
            'id_tipoReparacion' => $request->idTipoRep
        ); */

        /*     $response = DB::table('solicitud_tickets')
            ->insert($insertarGestion);
        $response = DB::table('gestion_solicitudes')->updateOrInsert($ticket); */

        /* return $response;

        $seguimiento = new SeguimientoSolicitudes();

        $seguimiento->uuid = $request->uuid;
        $seguimiento->id_user = $request->idSolicitud;
        $seguimiento->descripcionSeguimiento = "Mensaje enviado";

        $receivers = 'derek.carvajal@redsalud.gob.cl';
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
