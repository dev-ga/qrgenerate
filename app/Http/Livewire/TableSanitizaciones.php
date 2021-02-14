<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cliente;
use App\Models\Sanitizacion;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TableSanitizaciones extends Component
{
    public function render()
    {
        $data = Sanitizacion::all()->sortByDesc('created_at');
        return view('livewire.table-sanitizaciones', ['data' => $data]);
    }
}
