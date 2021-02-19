<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cliente;
use App\Models\Sanitizacion;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;



class Dashboard extends Component
{


    public function editar($id)
    {
        # code...
        $prueba = $id;
        return view('editar-clientes', ['prueba' => $prueba]);
        // dd($id);
    }

    public function render()
    {
        $clientes = Cliente::all()->sortByDesc('created_at');
        return view('livewire.dashboard', ['clientes' => $clientes]);
    }
    
}
