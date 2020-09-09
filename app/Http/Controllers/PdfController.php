<?php

namespace App\Http\Controllers;

use App\GestionSolicitudes;
use App\Trabajadores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\App;
use Spatie\Browsershot\Browsershot;
use DB;
use Svg\Tag\Rect;

class PdfController extends Controller
{
    public function imprimir()
    {
        $data = GestionSolicitudes::select(
            'gestion_solicitudes.*',
            'edificios.descripcionEdificio',
            'servicios.descripcionServicio',
            'unidad_esps.descripcionUnidadEsp',
            'estado_solicituds.descripcionEstado',
            'tipo_reparacions.descripcionTipoReparacion',
            'trabajadores.tra_nombre_apellido',
            'supervisores.sup_nombre_apellido',
            DB::raw("DATE_FORMAT(solicitud_tickets.created_at, '%d/%m/%Y') as nfechaS"),
            DB::raw("DATE_FORMAT(gestion_solicitudes.fechaInicio, '%d/%m/%Y') as nfechaI"),
            'solicitud_tickets.descripcionP'

        )
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

        $idApoyo1 = $data->idApoyo1;
        $idApoyo2 = $data->idApoyo2;
        $idApoyo3 = $data->idApoyo3;

        $apoyo1 = Trabajadores::firstWhere('id', $idApoyo1);
        $apoyo2 = Trabajadores::firstWhere('id', $idApoyo2);
        $apoyo3 = Trabajadores::firstWhere('id', $idApoyo3);



        $idSol = $data->id_solicitud;
        $nombreTra = $data->tra_nombre_apellido;
        $nombreSup = $data->sup_nombre_apellido;
        $desEdificio = $data->descripcionEdificio;
        $desServicio = $data->descripcionServicio;
        $desUnidadEsp = $data->descripcionUnidadEsp;
        $desEstado = $data->descripcionEstado;
        $desTipoRep = $data->descripcionTipoReparacion;
        $fechaS = $data->nfechaS;
        $fechaI = $data->nfechaI;
        $horasEjecucion = $data->horasEjecucion;
        $diasEjecucion = $data->diasEjecucion;
        $nomApoyo1 = $apoyo1->tra_nombre_apellido;
        $nomApoyo2 = $apoyo2->tra_nombre_apellido;
        $nomApoyo3 = $apoyo3->tra_nombre_apellido;
        $descripcionPro = $data->descripcionP;

        $data = [
            'nombreTra' =>  $nombreTra,
            'idSolicitud' => $idSol,
            'nombreSup' => $nombreSup,
            'desEdificio' => $desEdificio,
            'desServicio' => $desServicio,
            'desUnidadEsp' => $desUnidadEsp,
            'desEstado' => $desEstado,
            'desTipoRep' => $desTipoRep,
            'fechaS' => $fechaS,
            'fechaI' => $fechaI,
            'horasEjecucion' => $horasEjecucion,
            'diasEjecucion' => $diasEjecucion,
            'nomApoyo1' => $nomApoyo1,
            'nomApoyo2' => $nomApoyo2,
            'nomApoyo3' => $nomApoyo3,
            'descripcionPro' => $descripcionPro
        ];
        $pdf = App::make("dompdf.wrapper");
        $pdf->loadView('TicketEM', $data);
        return $pdf->stream("TicketEM.pdf", array("Attachment" => 0));
    }

    public function imprimirPorTicket($id)
    {

        log::info($id);
        $data = GestionSolicitudes::select(
            'gestion_solicitudes.*',
            'edificios.descripcionEdificio',
            'servicios.descripcionServicio',
            'unidad_esps.descripcionUnidadEsp',
            'estado_solicituds.descripcionEstado',
            'tipo_reparacions.descripcionTipoReparacion',
            'trabajadores.tra_nombre_apellido',
            'supervisores.sup_nombre_apellido',
            DB::raw("DATE_FORMAT(solicitud_tickets.created_at, '%d/%m/%Y') as nfechaS"),
            DB::raw("DATE_FORMAT(gestion_solicitudes.fechaInicio, '%d/%m/%Y') as nfechaI"),
            'solicitud_tickets.descripcionP'

        )
            ->join('trabajadores', 'gestion_solicitudes.id_trabajador', '=', 'trabajadores.id')
            ->join('supervisores', 'gestion_solicitudes.id_supervisor', '=', 'supervisores.id')
            ->join('solicitud_tickets', 'gestion_solicitudes.id_solicitud', '=', 'solicitud_tickets.id')
            ->join('edificios', 'solicitud_tickets.id_edificio', '=', 'edificios.id')
            ->join('servicios', 'solicitud_tickets.id_servicio', '=', 'servicios.id')
            ->join('unidad_esps', 'solicitud_tickets.id_ubicacionEx', '=', 'unidad_esps.id')
            ->join('estado_solicituds', 'solicitud_tickets.id_estado', '=', 'estado_solicituds.id')
            ->join('tipo_reparacions', 'solicitud_tickets.id_tipoReparacion', '=', 'tipo_reparacions.id')
            ->where('gestion_solicitudes.id_solicitud', $id)
            ->first();

        $idApoyo1 = $data->idApoyo1;
        $idApoyo2 = $data->idApoyo2;
        $idApoyo3 = $data->idApoyo3;

        $apoyo1 = Trabajadores::firstWhere('id', $idApoyo1);
        $apoyo2 = Trabajadores::firstWhere('id', $idApoyo2);
        $apoyo3 = Trabajadores::firstWhere('id', $idApoyo3);



        $idSol = $data->id_solicitud;
        $nombreTra = $data->tra_nombre_apellido;
        $nombreSup = $data->sup_nombre_apellido;
        $desEdificio = $data->descripcionEdificio;
        $desServicio = $data->descripcionServicio;
        $desUnidadEsp = $data->descripcionUnidadEsp;
        $desEstado = $data->descripcionEstado;
        $desTipoRep = $data->descripcionTipoReparacion;
        $fechaS = $data->nfechaS;
        $fechaI = $data->nfechaI;
        $horasEjecucion = $data->horasEjecucion;
        $diasEjecucion = $data->diasEjecucion;
        $nomApoyo1 = $apoyo1->tra_nombre_apellido;
        $nomApoyo2 = $apoyo2->tra_nombre_apellido;
        $nomApoyo3 = $apoyo3->tra_nombre_apellido;
        $descripcionPro = $data->descripcionP;

        $data = [
            'nombreTra' =>  $nombreTra,
            'idSolicitud' => $idSol,
            'nombreSup' => $nombreSup,
            'desEdificio' => $desEdificio,
            'desServicio' => $desServicio,
            'desUnidadEsp' => $desUnidadEsp,
            'desEstado' => $desEstado,
            'desTipoRep' => $desTipoRep,
            'fechaS' => $fechaS,
            'fechaI' => $fechaI,
            'horasEjecucion' => $horasEjecucion,
            'diasEjecucion' => $diasEjecucion,
            'nomApoyo1' => $nomApoyo1,
            'nomApoyo2' => $nomApoyo2,
            'nomApoyo3' => $nomApoyo3,
            'descripcionPro' => $descripcionPro
        ];
        $pdf = App::make("dompdf.wrapper");
        $pdf->loadView('TicketEM', $data);

        return $pdf->stream("TicketEM.pdf", array("Attachment" => 0));
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
