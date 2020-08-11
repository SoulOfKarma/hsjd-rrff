<?php

namespace App\Http\Controllers;

use App\SolicitudTickets;
use DB;
use Illuminate\Http\Request;

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
        $solicitud = new SolicitudTickets();
        $solicitud->id_user = 2;
        $solicitud->id_estado = 1;
        $solicitud->id_edificio = $request->idEdificio;
        $solicitud->id_servicio = $request->idServicio;
        $solicitud->id_ubicacionEx = $request->idUnidadEsp;
        $solicitud->id_tipoReparacion = $request->idTipoRep;
        $solicitud->tituloP = $request->valorTitulo;
        $solicitud->descripcionP = $request->areaT;
        //$solicitud->user_id = auth()->id();
        $solicitud->save();

        return $solicitud;
        //
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
