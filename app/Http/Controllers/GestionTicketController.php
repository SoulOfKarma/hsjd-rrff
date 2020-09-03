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
        $users = GestionSolicitudes::select('gestion_solicitudes.id', 'gestion_solicitudes.id_trabajador', 'trabajadores.tra_nombre_apellido', 'gestion_solicitudes.id_solicitud')
            ->join('trabajadores', 'gestion_solicitudes.id_trabajador', '=', 'trabajadores.id')
            ->get();
        return $users;
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


    public function ValidarTicketAsignadoMod($id)
    {
        $users = GestionSolicitudes::firstWhere('id_solicitud', $id);
        if ($users === null) {
            return true;
        } else {
            return  false;
        }
    }

    public function ValidarTicketAsignado($id)
    {
        $users = GestionSolicitudes::firstWhere('id_solicitud', $id);
        return $users;
    }

    public function GetTicketAsignado($id)
    {
        $users = GestionSolicitudes::firstWhere('id_solicitud', $id);
        return $users;
    }

    public function GetDatoCalendario()
    {
        $users = SolicitudTickets::select('solicitud_tickets.id', 'solicitud_tickets.uuid', 'solicitud_tickets.descripcionP', 'solicitud_tickets.tituloP', 'solicitud_tickets.created_at', 'gestion_solicitudes.id_trabajador', 'trabajadores.tra_nombre_apellido', 'gestion_solicitudes.horaInicio', 'gestion_solicitudes.fechaInicio', 'gestion_solicitudes.horaTermino', 'gestion_solicitudes.fechaTermino')
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

    public function getSolicitudUsuariosJoin()
    {
        $ticket = SolicitudTickets::select('solicitud_tickets.*', 'users.nombre', 'estado_solicituds.descripcionEstado', DB::raw('TIMESTAMPDIFF(HOUR,solicitud_tickets.created_at,NOW()) AS Horas'), DB::raw("CONCAT(DATE_FORMAT(solicitud_tickets.created_at, '%d%m%Y'),'-',solicitud_tickets.id,'-',solicitud_tickets.id_user) as nticket"))
            ->join('users', 'solicitud_tickets.id_user', '=', 'users.id')
            ->join('estado_solicituds', 'solicitud_tickets.id_estado', '=', 'estado_solicituds.id')
            ->where('solicitud_tickets.id_categoria', 1)

            ->get();
        return  $ticket;
    }

    public function getSolicitudUsuariosJoinEM()
    {
        $ticket = SolicitudTickets::select('solicitud_tickets.*', 'users.nombre', 'estado_solicituds.descripcionEstado', DB::raw('TIMESTAMPDIFF(HOUR,solicitud_tickets.created_at,NOW()) AS Horas'), DB::raw("CONCAT(DATE_FORMAT(solicitud_tickets.created_at, '%d%m%Y'),'-',solicitud_tickets.id,'-',solicitud_tickets.id_user) as nticket"))
            ->join('users', 'solicitud_tickets.id_user', '=', 'users.id')
            ->join('estado_solicituds', 'solicitud_tickets.id_estado', '=', 'estado_solicituds.id')
            ->where('solicitud_tickets.id_categoria', 2)

            ->get();
        return  $ticket;
    }

    public function getSolicitudUsuariosJoinIND()
    {
        $ticket = SolicitudTickets::select('solicitud_tickets.*', 'users.nombre', 'estado_solicituds.descripcionEstado', DB::raw('TIMESTAMPDIFF(HOUR,solicitud_tickets.created_at,NOW()) AS Horas'), DB::raw("CONCAT(DATE_FORMAT(solicitud_tickets.created_at, '%d%m%Y'),'-',solicitud_tickets.id,'-',solicitud_tickets.id_user) as nticket"))
            ->join('users', 'solicitud_tickets.id_user', '=', 'users.id')
            ->join('estado_solicituds', 'solicitud_tickets.id_estado', '=', 'estado_solicituds.id')
            ->where('solicitud_tickets.id_categoria', 3)

            ->get();
        return  $ticket;
    }

    public function getSolicitudUsuariosJoinCA()
    {
        $ticket = SolicitudTickets::select('solicitud_tickets.*', 'users.nombre', 'estado_solicituds.descripcionEstado', DB::raw('TIMESTAMPDIFF(HOUR,solicitud_tickets.created_at,NOW()) AS Horas'), DB::raw("CONCAT(DATE_FORMAT(solicitud_tickets.created_at, '%d%m%Y'),'-',solicitud_tickets.id,'-',solicitud_tickets.id_user) as nticket"))
            ->join('users', 'solicitud_tickets.id_user', '=', 'users.id')
            ->join('estado_solicituds', 'solicitud_tickets.id_estado', '=', 'estado_solicituds.id')
            ->where('id_categoria', 4)

            ->get();
        return  $ticket;
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
        /* GestionSolicitudes::where('id_solicitud', $id)->delete();
        SolicitudTickets::where('id', $id)->delete(); */
        $estadoEliminado = 7;
        $ticket = SolicitudTickets::find($id);
        $ticket->id_estado = $estadoEliminado;
        $ticket->save();

        return true;
    }
}
