<?php

namespace App\Http\Controllers;

use App\SeguimientoSolicitudes;
use App\Mail\AutoRespuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use DB;


class SeguimientoController extends Controller
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
    public function store(Request $request, $uuid)
    {
        $seguimiento = new SeguimientoSolicitudes();

        $seguimiento->uuid = $uuid;
        $seguimiento->id_user = $request->id_user;
        $seguimiento->descripcionSeguimiento = $request->descripcionSeguimiento;

        $seguimiento2 = new SeguimientoSolicitudes();
        $seguimiento2->uuid = $uuid;
        $seguimiento2->id_user = $request->id_user;
        $seguimiento2->descripcionSeguimiento = $request->descripcionSeguimiento;
        $seguimiento2->id = $request->id;
        $seguimiento2->nombre = $request->nombre;

        $receivers = 'gomez.soto.ricardo@gmail.com';
        Mail::to($receivers)->send(new AutoRespuesta($seguimiento2));

        $seguimiento->save();
        //
    }

    public function indexSeguimiento($uuid)
    {
        $users = DB::table('seguimiento_solicitudes')
            ->join('users', 'seguimiento_solicitudes.id_user', '=', 'users.id')
            ->select('seguimiento_solicitudes.*', 'users.nombre')
            ->where('seguimiento_solicitudes.uuid', '=', $uuid)
            ->orderBy('seguimiento_solicitudes.id', 'desc')
            ->get();

        return  $users;
    }

    public function indexEspecifico($id)
    {

        $users = DB::table('solicitud_tickets')
            ->join('users', 'solicitud_tickets.id_user', '=', 'users.id')
            ->join('edificios', 'solicitud_tickets.id_edificio', '=', 'edificios.id')
            ->join('servicios', 'solicitud_tickets.id_servicio', '=', 'servicios.id')
            ->join('unidad_esps', 'solicitud_tickets.id_ubicacionEx', '=', 'unidad_esps.id')
            ->select('solicitud_tickets.*', 'users.nombre', 'edificios.descripcionEdificio', 'servicios.descripcionServicio', 'unidad_esps.descripcionUnidadEsp')
            ->where('solicitud_tickets.uuid', '=', $id)
            ->get();

        return  $users;
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
