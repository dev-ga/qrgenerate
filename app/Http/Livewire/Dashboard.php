<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cliente;
use App\Models\Sanitizacion;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;



class Dashboard extends Component
{

    // public $clientes;

    public function render()
    {
        $clientes = Cliente::all()->sortByDesc('created_at');
        return view('livewire.dashboard', ['clientes' => $clientes]);
    }

    public function prueba()
    {
        
        return view('livewire.registro-clientes');
    }
    
}
