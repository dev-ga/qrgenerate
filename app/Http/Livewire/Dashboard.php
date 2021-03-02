<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cliente;
use App\Models\Sanitizacion;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;



class Dashboard extends Component
{

    public function delete($id)
    {
        $this->company_id = $id;
        Cliente::find($id)->delete();
        session()->flash('message', 'Company deleted successfully.');
        return redirect()->to('dashboard');
    }


    public function render()
    {
        $clientes = Cliente::all()->sortByDesc('created_at');
        return view('livewire.dashboard', ['clientes' => $clientes]);
    }
    
}
