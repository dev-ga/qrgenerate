<?php

use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use App\Http\Livewire\CardSanitizaciones;
use App\Http\Controllers\CardController;
use App\Http\Controllers\QrpdfController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// prueba para rutas por grupos
 Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('registro/clientes', function () {
        return view('registro-clientes');
    })->name('registro.clientes');

    Route::get('registro', function () {
        return view('livewire.clientes');
    })->name('livewire.clientes');

    Route::get('registro/sanitizaciones', function () {
        return view('registro-sanitizaciones');
    })->name('registro.sanitizaciones');

    Route::get('table/sanitizaciones', function () {
        return view('table-sanitizaciones');
    })->name('table.sanitizaciones');

    Route::get('editar/clientes', function () {
        return view('editar-cliente');
    })->name('editar.cliente');

    Route::get('qr/{id}/pdf', [QrpdfController::class, 'qrpdf'])->name('generate.qrpdf');

    
 });




Route::get('pruebaqr', function() {
    // return QrCode::generate('Make me into a QrCode!');
    $qr = QrCode::generate('Make me into a QrCode!');
    dd($qr);

    /*Para extraer la cadena <svg></svg> que contiene el codigo qr
    este dato es el que se almacenara en la base de datos*/
    /************************************/
    $cadena = Str::between($qr, '?>', '\n');
    $svg = Str::of($cadena)->trim();
    /***********************************/
    
    return $qr;
    //
});


Route::get('/sanitizaciones/{data}', [CardController::class, 'index'])->name('sanitizaciones');



Route::get('vistaprueba', function () {
    return view('prueba-componente');
})->name('prueba.componente');

