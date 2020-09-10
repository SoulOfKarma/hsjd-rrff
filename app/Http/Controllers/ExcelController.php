<?php

namespace App\Http\Controllers;

use App\GestionSolicitudes;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GestionExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return GestionSolicitudes::all();
    }

    public function headings(): array
    {
        return [
            'N° Ticket',
            'Fecha Solicitud',
            'Servicio',
            'Edificio',
            'Unidad Especifica',
            'Especialidad Requerida',
            'Responsable',
            'Apoyo 1',
            'Apoyo 2',
            'Apoyo 3',
            'Supervisor a Cargo',
            'Fecha de Programacion - Visita',
            'Horas de Ejecucion',
            'Dias de Ejecucion',
            'Estado Ticket',
            'Descripcion del Servicio Solicitado ',
            'Resolucion del Problema',
            'Nombre Solicitante',
            'Hora Inicio',
            'Hora Termino',
        ];
    }
}


class ExcelController extends Controller
{
    public function generarExcel()
    {

        return \Excel::download(new GestionExport, 'invoices.xlsx');
    }
}
