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
    use WithPagination;

    public $nombrecliente;
    public $servicio;
    public $area;
    public $fechainicio;
    public $fechafin;

     /**
     * @var $buscar
     * *Variable para la busqueda dinamica
     */
    public $buscar = '';

    /**
     * @var $n_paginas
     * *Variable para la busqueda dinamica
     */
    public $n_paginas = '5';


    /**
     * @var $atr_formulario
     * *Variable para ocultar el formulario de registro
     */
    public $atr_formulario = 'hidden';

    /**
     * @var $atr_boton
     * *Variable para mostrar el boton para agregar registro
     */
    public $atr_boton = '';

    /**
     * @var $messages
     **asignar el mensaje de validacion personalizado a los campos del formulario
     */
    public $messages = [

        'nombrecliente.required'    => "Cliente requerido",
        'servicio.required'   => "Servicio requerido",
        'area.required'      => "Area requerida",
        'fechainicio.required'    => "Fecha inicio requerida",
        'fechafin.required'        => "Fecha vencimiento requerida"
    ];

    /** 
    * @param atr_formulario
    * @param atr_boton
    **Funcion para mostrar el formulario y ocultar el boton para
    **agregar un nuevo registro
    */
    public function verFormulario()
    {
        $this->atr_formulario = '';
        $this->atr_boton = 'hidden';

    }


    public function render()
    {
        // $clientes = Cliente::all();
        // return view('livewire.registro-sanitizaciones', ['clientes' => $clientes]);
        return view('livewire.registro-sanitizaciones', ['clientes' => Sanitizacion::where('id', 'like', "%{$this->buscar}%")
            ->orWhere('nombrecliente', 'like', "%{$this->buscar}%")
            ->orWhere('area', 'like', "%{$this->buscar}%")
            ->orWhere('servicio', 'like', "%{$this->buscar}%")
            ->orderBy('id', 'desc')
            ->paginate($this->n_paginas),
            'clientesr' => Cliente::all()
        ]); 
    }

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

}
