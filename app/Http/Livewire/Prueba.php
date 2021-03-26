<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Cliente;
use Facade\FlareClient\Http\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Prueba extends Component
{

    use WithPagination;

    /**
     * *Variables publicas del formulario
     */
    public $nombre_rs;
    public $prefijo;
    public $cedula_rif;
    public $direccion;
    public $email;
    public $telefono1;
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
    public $n_paginas = '10';


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

        'nombre_rs.required'    => "Nombre o Razon Social requerido",
        'cedula_rif.required'   => "Cedula o Rif requerido",
        'prefijo.required'      => "Requerido",
        'direccion.required'    => "Direccion principal requerida",
        'email.required'        => "Correo Electronico requerido",
        'telefono1.required'    => "Telefono Principal requerido"
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
        return view('livewire.prueba', ['clientes' => Cliente::where('nombre_rs', 'like', "%{$this->buscar}%")
            ->orWhere('cedula_rif', 'like', "%{$this->buscar}%")
            ->orWhere('email', 'like', "%{$this->buscar}%")
            ->orWhere('telefono1', 'like', "%{$this->buscar}%")
            ->orWhere('estatus', '2')
            ->orderBy('id', 'desc')
            ->paginate($this->n_paginas)
        ]); 
    }


    /**
     **Funcion para guardar los datos de cliente en la base de datos
     */
    public function store()
    {
        $this->validate([

            'nombre_rs' => 'required',
            'prefijo' => 'required',
            'cedula_rif' => 'required',
            'direccion' => 'required',
            'email' => 'required|email',
            'telefono1' => 'required'

        ]);

        Cliente::create([

            'nombre_rs' => $this->nombre_rs,
            'cedula_rif' => $this->prefijo.''.$this->cedula_rif,
            'direccion' => $this->direccion,
            'email' => $this->email,
            'telefono1' => $this->telefono1

        ]);


        /**
         * *Enviar mensaje a la vista si el registro fue satisfactorio
         * *Libreria TOARDs
         */
        session()->flash('message', 'Cliente successfully created.');

        $this->reset();

        #...................
        #Fin Store()
    }


    /**
    *@param id
    **Funcion para EDITAR registro del cliente en la base de datos
    */
    public function edit($id)
    {
        $this->idUpdate = $id;
        $data = Cliente::findorfail($id);

        /**
         * Datos que se pintaran en el formulario de actualizacion
         */
        $this->nombre_rs = $data->nombre_rs;
        $this->cedula_rif = $data->cedula_rif;
        $this->direccion = $data->direccion;
        $this->email = $data->email;
        $this->telefono1 = $data->telefono1;

        /**
         * Funcion para mostrar el formulario y poder editar la data
         */
        $this->verFormulario();

        /**
         * Datos para activar el boton de actualizar
         */
        $this->atr_editar = 'activo';

        /**
         * Manejo del prefijo, ya que esteno esta en la base de datos
         */
        if ($value = Str::startsWith($this->cedula_rif, 'J-')) {

            $this->prefijo = 'J-';
            $this->cedula_rif = ltrim($this->cedula_rif, 'J-');
            
        }
        if ($value = Str::startsWith($this->cedula_rif, 'V-')) {

            $this->prefijo = 'V-';
            $this->cedula_rif = ltrim($this->cedula_rif, 'V-');

        }
        if ($value = Str::startsWith($this->cedula_rif, 'G-')) {

            $this->prefijo = 'G-';
            $this->cedula_rif = ltrim($this->cedula_rif, 'G-');

        }
        if ($value = Str::startsWith($this->cedula_rif, 'E-')) {

            $this->prefijo = 'E-';
            $this->cedula_rif = ltrim($this->cedula_rif, 'E-');

        }

    }

    public function update()
    {
        // $prueba =$this->idUpdate;
        // dd($prueba);
        $this->validate([

            'nombre_rs' => 'required',
            'prefijo' => 'required',
            'cedula_rif' => 'required',
            'direccion' => 'required',
            'email' => 'required|email',
            'telefono1' => 'required'

        ]);

        Cliente::where('id', $this->idUpdate)->update([

            'nombre_rs' => $this->nombre_rs,
            'cedula_rif' => $this->prefijo.''.$this->cedula_rif,
            'direccion' => $this->direccion,
            'email' => $this->email,
            'telefono1' => $this->telefono1,

            ]);

        /**
         * *Enviar mensaje a la vista si el registro fue satisfactorio
         * *Libreria TOARDs
         */
        session()->flash('message', 'Cliente actualizado con Exito.');

        $this->reset();
        
    }


    /**
    *@param id
    **Funcion para ELIMIAR registro del cliente en la base de datos
    */
    public function delete($id)
    {
        Cliente::find($id)->update(['estatus' => 2]);
    }


    /**
    *@param id
    **Funcion para ACTIVAR registro del cliente en la base de datos
    */
    public function activarCliente($id)
    {
        Cliente::find($id)->update(['estatus' => 1]);
        // session()->flash('message', 'Cliente Activado con exito.');
        // return redirect()->to('/dashboard');
    }

}
