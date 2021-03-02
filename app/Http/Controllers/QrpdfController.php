<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Sanitizacion;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;
use Dompdf\Options as Options;
use Dompdf\Dompdf;

class QrpdfController extends Controller
{

    public function qrpdf($id)
    {
        $cliente = Cliente::find($id);
        $nombre = $cliente->nombre_rs;
        $cedularif = $cliente->cedula_rif;
        $qr = QrCode::size(150)->generate('http://pbqr.pg2015.com.ve/public/sanitizaciones/'.$id);
    
        $data = [
            'title'     => 'QR Generate',
            'Nombre'    => $nombre,
            'Documento' => $cedularif,
            'date'      => date('m/d/Y'),
            'qr'        => $qr,
            'id'        => $id
        ];
          
        $pdf = PDF::loadView('qrpdf', $data)->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->download('generateqr.pdf');
    }
  
}
