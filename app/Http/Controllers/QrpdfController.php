<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Sanitizacion;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;
use Dompdf\Options as Options;
use Dompdf\Dompdf;
use Illuminate\Support\Str;

class QrpdfController extends Controller
{

    public function qrpdf($id)
    {
        $cliente = Cliente::find($id);
        $nombre = $cliente->nombre_rs;
        $cedularif = $cliente->cedula_rif;
        $qr = QrCode::size(150)->generate('http://pbqr.pg2015.com.ve/public/sanitizaciones/'.$id);

        $path = 'image/logoPG.png';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);


    
        $data = [
            'title'     => 'QR Generate',
            'Nombre'    => $nombre,
            'Documento' => $cedularif,
            'date'      => date('m/d/Y'),
            'qr'        => $qr,
            'id'        => $id,
            'base64'   => $base64
        ];
        
        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->setIsHtml5ParserEnabled(true);
        $options->isRemoteEnabled(true);
        $dompdf->setOptions($options);

        $pdf = PDF::loadView('qrpdf', $data)->setOptions(['defaultFont' => 'sans-serif']);
    //  $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('qrpdf', $data)->stream();

        return $pdf->download('generateqr.pdf');
    }
  
}
