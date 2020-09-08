<?php

namespace App\Http\Controllers;

use App\GestionSolicitudes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\App;
use Spatie\Browsershot\Browsershot;

class PdfController extends Controller
{
    public function imprimir()
    {
        $usuarios = GestionSolicitudes::select('gestion_solicitudes.id', 'gestion_solicitudes.id_trabajador', 'edificios.descripcionEdificio', 'servicios.descripcionServicio', 'unidad_esps.descripcionUnidadEsp', 'estado_solicituds.descripcionEstado', 'tipo_reparacions.descripcionTipoReparacion', 'trabajadores.tra_nombre_apellido', 'supervisores.sup_nombre_apellido', 'gestion_solicitudes.id_solicitud')
            ->join('trabajadores', 'gestion_solicitudes.id_trabajador', '=', 'trabajadores.id')
            ->join('supervisores', 'gestion_solicitudes.id_supervisor', '=', 'supervisores.id')
            ->join('solicitud_tickets', 'gestion_solicitudes.id_solicitud', '=', 'solicitud_tickets.id')
            ->join('edificios', 'solicitud_tickets.id_edificio', '=', 'edificios.id')
            ->join('servicios', 'solicitud_tickets.id_servicio', '=', 'servicios.id')
            ->join('unidad_esps', 'solicitud_tickets.id_ubicacionEx', '=', 'unidad_esps.id')
            ->join('estado_solicituds', 'solicitud_tickets.id_estado', '=', 'estado_solicituds.id')
            ->join('tipo_reparacions', 'solicitud_tickets.id_tipoReparacion', '=', 'tipo_reparacions.id')
            ->where('gestion_solicitudes.id_solicitud', 1)
            ->first();

        log::info($usuarios);
        $idSol = $usuarios->id_solicitud;
        $nombreTra = $usuarios->tra_nombre_apellido;
        $nombreSup = $usuarios->sup_nombre_apellido;
        $desEdificio = $usuarios->descripcionEdificio;
        $desServicio = $usuarios->descripcionServicio;
        $desUnidadEsp = $usuarios->descripcionUnidadEsp;
        $desEstado = $usuarios->descripcionEstado;
        $desTipoRep = $usuarios->descripcionTipoReparacion;

        $data = [
            'nombreTra' =>  $nombreTra,
            'idSolicitud' => $idSol,
            'nombreSup' => $nombreSup,
            'desEdificio' => $desEdificio,
            'desServicio' => $desServicio,
            'desUnidadEsp' => $desUnidadEsp,
            'desEstado' => $desEstado,
            'desTipoRep' => $desTipoRep
        ];
        $pdf = App::make("dompdf.wrapper");
        $pdf->loadView('TicketEM', $data);
        return $pdf->stream();

        //$path_node = realpath('C:\\node\\nodejs\\node.exe');
        // $path_npm = realpath('C:\\Users\\Diabetin\\AppData\\Roaming\\npm');



        //return $pdf->download('invoice.pdf');

        /*  $pdf->setOption('enable-javascript', true);
        $pdf->setOption('javascript-delay', 2000);
        $pdf->setOption('enable-smart-shrinking', true);
        $pdf->setOption('no-stop-slow-scripts', true); */
    }

    public function getData()
    {
        $data =  [
            'quantity'      => '1',
            'description'   => 'some ramdom text',
            'price'   => '500',
            'total'     => '500'
        ];
        return $data;
    }
}
