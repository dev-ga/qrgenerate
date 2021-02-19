<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($data)
    {

        // $data = $id;
         $datas = Cliente::find($data)->sanitizaciones()->get();
        // dd($datas);
        return view('card-sanitizaciones')->with('datas', $datas);
        // echo "prueba";
    }

  
}
