<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cliente;


class Clientes extends Component
{

    public $clientes;
    public $nombre_rs;
    public $prefijo;
    public $cedula_rif;
    public $direccion;
    public $email;
    public $telefono1;

    public function render()
    {
        // $clientes = Cliente::all()->sortByDesc('created_at');
        // return view('livewire.clientes', ['clientes' => $clientes]);
        $this->clientes = Cliente::all()->sortByDesc('created_at');
        return view('livewire.clientes');

    } 


    public function storee()
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


        #enviar mensaje a la vista si el registro fue creado.
        session()->flash('message', 'Cliente successfully created.');
       
        // return redirect()->to('registro/clientes');
        // return redirect()->to('dashboard');
        return back();


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

    
}
