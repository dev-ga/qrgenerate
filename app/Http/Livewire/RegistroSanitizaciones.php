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
    public $estatus;

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
     * @var $atr_editar
     * *Variable para activar la accion de editar para cambiar las propiedades del formulario.
     * *Por defecto el valor en 'inactivo'
     */
    public $atr_editar = 'inactivo';


    /**
     * @var $idUpdate
     * *Variable que maneja el id del cliente cuya data se va a editar para luego ser actualizada.
     */
    public $idUpdate;


    /**
     * @var $messages
     **asignar el mensaje de validacion personalizado a los campos del formulario
     */
    public $messages = [

        'nombrecliente.required'    => "Cliente requerido",
        'servicio.required'         => "Servicio requerido",
        'area.required'             => "Area requerida",
        'fechainicio.required'      => "Fecha inicio requerida",
        'fechafin.required'         => "Fecha vencimiento requerida"
    ];

    /** 
    * @param atr_formulario
    * @param atr_boton
    **Funcion para mostrar el formulario y ocultar el boton para
    **agregar un nuevo registro
    */
    public function verFormulario()
    {
        $this->atr_formulario   = '';
        $this->atr_boton        = 'hidden';

    }


    public function render()
    {
        return view('livewire.registro-sanitizaciones', ['clientes' => Sanitizacion::where('id', 'like', "%{$this->buscar}%")
            ->orWhere('nombrecliente', 'like', "%{$this->buscar}%")
            ->orWhere('area', 'like', "%{$this->buscar}%")
            ->orWhere('servicio', 'like', "%{$this->buscar}%")
            ->orderBy('id', 'desc')
            ->paginate($this->n_paginas),
   
            'clientesr' => Cliente::all()->where('estatus', '1')
        ]); 
    }

    public function store()
    {
        $this->validate([

            'nombrecliente'     => 'required',
            'servicio'          => 'required',
            'area'              => 'required',
            'fechainicio'       => 'required',
            'fechafin'          => 'required'

        ]);

        
        // Query para recuperar el cliente_id de la tabla clientes
        $query = "select id from clientes where nombre_rs like '%$this->nombrecliente%'";

        // extraigo el dato numerico
        $resul = DB::connection('mysql')->select($query);
        foreach ($resul as $item) {
            $cliente_id = $item->id;
        }


        /**
         * Query para validar que el cliente no posee sanitizacion programada
         * @param cliente_id
         */
        $query2 = "select cliente_id from sanitizacions where cliente_id = '$cliente_id'";
        $resul2 = DB::connection('mysql')->select($query2);

        if (Empty($resul2)) {

            Sanitizacion::create([

                'cliente_id'    => $cliente_id,
                'nombrecliente' => $this->nombrecliente,
                'servicio'      => $this->servicio,
                'area'          => $this->area,
                'fechainicio'   => $this->fechainicio,
                'fechafin'      => $this->fechafin
    
            ]);
    
    
            // Enviar mensaje a la vista si el registro fue creado.
            session()->flash('message', 'Sanitizacion successfully Progranmed.');
           
            return redirect()->to('table/sanitizaciones');
    
            // Limpiar el formulario despues de cargar la informacion
            $this->reset([
                'nombrecliente',
                'servicio',
                'area',
                'fechainicio',
                'fechafin'
            ]);

            #Fin Store()


           
        }else {

            session()->flash('error', 'El cliente ya posee una Sanitizacion programada.');
            
        }

        // dd($qrsvg);
       
    }


    /**
    *@param id
    **Funcion para EDITAR registro del cliente en la base de datos
    */
    public function edit($id)
    {
        $this->idUpdate = $id;
        $data = Sanitizacion::findorfail($id);

        /**
         * Datos que se pintaran en el formulario de actualizacion
         */
        $this->nombrecliente    = $data->nombrecliente;
        $this->servicio         = $data->servicio;
        $this->area             = $data->area;
        $this->fechainicio      = $data->fechainicio;
        $this->fechafin         = $data->fechafin;

        /**
         * Funcion para mostrar el formulario y poder editar la data
         */
        $this->verFormulario();

        /**
         * Datos para activar el boton de actualizar
         */
        $this->atr_editar = 'activo';
    }

    public function update()
    {
        $this->validate([

            'nombrecliente'     => 'required',
            'servicio'          => 'required',
            'area'              => 'required',
            'fechainicio'       => 'required',
            'fechafin'          => 'required'

        ]);

        Sanitizacion::where('id', $this->idUpdate)->update([

            'nombrecliente'     => $this->nombrecliente,
            'servicio'          => $this->servicio,
            'area'              => $this->area,
            'fechainicio'       => $this->fechainicio,
            'fechafin'          => $this->fechafin

            ]);

        /**
         * *Enviar mensaje a la vista si el registro fue satisfactorio
         * *Libreria TOARDs
         */
        session()->flash('message', 'Sanitizacion actualizada con Exito.');

        $this->reset();
        
    }

    public function delete($id)
    {
        Sanitizacion::find($id)->delete();
        session()->flash('message', 'La Sanitizacion fue eliminada.');
    }

}
