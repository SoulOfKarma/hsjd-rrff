<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function imprimir()
    {

        $pdf = \PDF::loadView('invoice');
        $pdf->setOption('enable-javascript', true);
        $pdf->setOption('no-stop-slow-scripts', true);
        $pdf->setOption('viewport-size', '1280x1024');
        $pdf->setOption('dpi', 100);
        $pdf->setOption('image-quality', 100);
        return $pdf->download('invoice.pdf');
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
