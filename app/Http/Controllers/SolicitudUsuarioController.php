<?php

namespace App\Http\Controllers;

use App\Mail\TicketGenerado;
use App\SolicitudTickets;
use App\Users;
use App\SeguimientoSolicitudes;
use Uuid;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SolicitudUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $get_all = DB::table('solicitud_tickets')->get();

        return  $get_all;
    }

    public function getDataCorreo($id)
    {

        $users = DB::table('solicitud_tickets')
            ->join('users', 'solicitud_tickets.id_user', '=', 'users.id')
            ->select('solicitud_tickets.*', 'users.nombre')
            ->where('solicitud_tickets.id', '=', $id)
            ->get();

        return  $users;
    }

    public function enviarCorreo(Request $request)
    {
        $data = new SolicitudTickets();
        $data->nombre = $request->nombre;
        $data->descripcionP = $request->descripcionP;
        $data->id = $request->id;
        Log::info($data);
        $receivers = 'gomez.soto.ricardo@gmail.com';
        Mail::to($receivers)->send(new TicketGenerado($data));
    }

    public function getSolicitudUsuariosJoin()
    {

        $users = DB::table('solicitud_tickets')
            ->join('users', 'solicitud_tickets.id_user', '=', 'users.id')
            ->select('solicitud_tickets.*', 'users.nombre')
            ->get();

        return  $users;
    }

    public function indexSeguimiento($uuid)
    {

        $users = DB::table('seguimiento_solicitudes')
            ->join('users', 'seguimiento_solicitudes.id_user', '=', 'users.id')
            ->select('seguimiento_solicitudes.*', 'users.nombre')
            ->where('seguimiento_solicitudes.uuid', '=', $uuid)
            ->get();

        return  $users;
    }

    public function indexEspecifico($id)
    {

        $get_all = SolicitudTickets::find($id);
        return  $get_all;
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
        $uuid = Uuid::generate()->string;
        $response = SolicitudTickets::create(array_merge($request->all(), ['uuid' => $uuid]));
        SeguimientoSolicitudes::create(array_merge($request->all(), ['uuid' => $uuid, 'id_solicitud' => $response->id, 'descripcionSeguimiento' => 'Solicitud creada']));



        $nombre = $request->nombre;
        $descripcionP = $request->descripcionSeguimiento;
        $id_solicitud = $response->id;

        $receivers = 'gomez.soto.ricardo@gmail.com';
        Mail::send('/Mails/TicketGenerado', ['nombre' => $nombre, 'id_solicitud' => $id_solicitud, 'descripcionP' => $descripcionP], function ($message) {
            $message->to('ricardo.soto.g@redsalud.gob.cl', 'Ricardo Soto Gomez')->subject('Nuevo Ticket Generado');
            $message->from('knightwalker.zero5@gmail.com', 'Ricardo Soto Gomez');
        });

        return true;
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
