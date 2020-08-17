<?php

namespace App\Http\Controllers;

use App\GestionSolicitudes;
use App\SeguimientoSolicitudes;
use App\SolicitudTickets;
use App\Mail\AutoRespuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        $out->writeln("Hola c:");
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

        $seguimiento = new SeguimientoSolicitudes();

        $seguimiento->uuid = $request->uuid;
        $seguimiento->id_user = $request->idSolicitud;
        $seguimiento->descripcionSeguimiento = "Mensaje enviado";

        $receivers = 'gomez.soto.ricardo@gmail.com';
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
