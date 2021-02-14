<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cliente;

class RegistroClientes extends Component
{
    public $nombre_rs;
    public $cedula_rif;
    public $direccion;
    public $email;
    public $telefono1;
    public $telefono2;

    public function store()
    {
        $this->validate([

            'nombre_rs' => 'required',
            'cedula_rif' => 'required',
            'direccion' => 'required',
            'email' => 'required|email',
            'telefono1' => 'required'


        ]);

        Cliente::create([

            'nombre_rs' => $this->nombre_rs,
            'cedula_rif' => $this->cedula_rif,
            'direccion' => $this->direccion,
            'email' => $this->email,
            'telefono1' => $this->telefono1,
            'telefono2' => $this->telefono2,

        ]);


        #enviar mensaje a la vista si el registro fue creado.
        session()->flash('message', 'Cliente successfully created.');
       
        // return redirect()->to('registro/clientes');
        return redirect()->to('dashboard');


        #Limpiar el formulario despues de cargar la informacion
        $this->reset([
            'nombre_rs',
            'cedula_rif',
            'direccion',
            'email',
            'telefono1',
            'telefono2',

        ]);



        #...................
        #Fin Store()
    }

    public function render()
    {
        return view('livewire.registro-clientes');
    }


}