<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cliente;
use App\Models\Sanitizacion;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class RegistroSanitizaciones extends Component
{

    public $nombrecliente;
    public $servicio;
    public $area;
    public $fechainicio;
    public $fechafin;


    public function store()
    {
        $this->validate([

            'nombrecliente' => 'required',
            'servicio' => 'required',
            'area' => 'required',
            'fechainicio' => 'required',
            'fechafin' => 'required'

        ]);

        
        // Query para recuperar el cliente_id de la tabla clientes
        $query = "select id from clientes where nombre_rs like '%$this->nombrecliente%'";

        // extraigo el dato numerico
        $resul = DB::connection('mysql')->select($query);
        foreach ($resul as $item) {
            $cliente_id = $item->id;
        }

        // dd($cliente_id);
        // Generacion de codigo qr
        $qr = QrCode::generate('Make me into a QrCode!');

        // Extraigo las cadena de caracteres para guardar en base de datos
        $cadena = Str::between($qr, '?>', '\n');
        $qrsvg = Str::of($cadena)->trim();

        // dd($qrsvg);
        Sanitizacion::create([

            'cliente_id' => $cliente_id,
            'nombrecliente' => $this->nombrecliente,
            'servicio' => $this->servicio,
            'area' => $this->area,
            'fechainicio' => $this->fechainicio,
            'fechafin' => $this->fechafin,
            'qrimg' => $qrsvg

        ]);


        // Enviar mensaje a la vista si el registro fue creado.
        session()->flash('message', 'Sanitizacion successfully Progranmed.');
       
        return redirect()->to('table/sanitizaciones');
        // return redirect()->to('dashboard');


        // Limpiar el formulario despues de cargar la informacion
        $this->reset([
            'nombrecliente',
            'servicio',
            'area',
            'fechainicio',
            'fechafin'

        ]);



        #...................
        #Fin Store()
    }

    public function render()
    {
        $clientes = Cliente::all();
        return view('livewire.registro-sanitizaciones', ['clientes' => $clientes]);
    }

}
