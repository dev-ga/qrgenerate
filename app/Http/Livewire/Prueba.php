<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Cliente;
use Facade\FlareClient\Http\Client;

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

    public $atr_form = 'hidden';

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

    public function render()
    {
        return view('livewire.prueba', ['clientes' => Cliente::where('nombre_rs', 'like', "%{$this->buscar}%")
            ->orWhere('cedula_rif', 'like', "%{$this->buscar}%")
            ->orWhere('email', 'like', "%{$this->buscar}%")
            ->orWhere('telefono1', 'like', "%{$this->buscar}%")
            ->paginate($this->n_paginas)
        ]); 
    }

    public function view_form()
    {
        $this->atr_form = '';

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
       
        return redirect()->to('vistaprueba');

        #Limpiar el formulario despues de cargar la informacion
        $this->reset([
            'nombre_rs',
            'cedula_rif',
            'direccion',
            'email',
            'telefono1'

        ]);

        #...................
        #Fin Store()
    }

    public function destroy($id)
    {
        dd($id);
        # code...
    }

}
