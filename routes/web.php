<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MunicipioController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    $estados = Http::withBasicAuth('abinadad', 'Mi7shak7')->get('localhost:9090/estados');
    $estadosArray = $estados->json();
    return view('estado', compact('estadosArray'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/estado', function () {
    $estados = Http::withBasicAuth('abinadad', 'Mi7shak7')->get('localhost:9090/estados');
    $estadosArray = $estados->json();
    return view('estado', compact('estadosArray'));
})->middleware(['auth', 'verified'])->name('estado');

Route::get('/estadoEliminar/{id}', function ($id) {
   $estados = Http::withBasicAuth('abinadad', 'Mi7shak7')->delete('localhost:9090/estados/'.$id);
   return redirect('/estado')->with('success', 'Stock removed. ');
})->middleware(['auth', 'verified'])->name('estadoEliminar');

Route::get('/guardaEstado/{estado}/{codigo}', function ($estado,$codigo) {
   
    $response = Http::withBasicAuth('abinadad', 'Mi7shak7')->post('localhost:9090/estados/', [
        'estado' => $estado,
        'codigo' => $codigo,
    ]);
    return back();
})->middleware(['auth', 'verified'])->name('guardaEstado');

Route::get('/municipio', function () {
    $municipios = Http::withBasicAuth('abinadad', 'Mi7shak7')->get('localhost:9090/municipio');
    $municipiosArray = $municipios->json();

    $estados = Http::withBasicAuth('abinadad', 'Mi7shak7')->get('localhost:9090/estados');
    $estadosArray = $estados->json();

    return view('municipio')
            ->with("municipiosArray", $municipiosArray)
            ->with("estadosArray", $estadosArray);
})->middleware(['auth', 'verified'])->name('municipio');

Route::get('/guardMunicipio/{municipio}/{idestado}', function ($municipio,$idestado) {
   
    $response = Http::withBasicAuth('abinadad', 'Mi7shak7')->post('localhost:9090/municipio/', [
        'municipio' => $municipio,
        'idestado' => $idestado,
    ]);

    return back();
})->middleware(['auth', 'verified'])->name('guardMunicipio');

Route::get('/eliminarMunicipio/{id}', function ($id) {
    $estados = Http::withBasicAuth('abinadad', 'Mi7shak7')->delete('localhost:9090/municipio/'.$id);
    return redirect('/municipio');
 })->middleware(['auth', 'verified'])->name('eliminarMunicipio');

Route::get('/codigoPostal', function () {
    $codigoPostales = Http::withBasicAuth('abinadad', 'Mi7shak7')->get('localhost:9090/codigoPostal');
    $codigoPostalesArray = $codigoPostales->json();

    $municipios = Http::withBasicAuth('abinadad', 'Mi7shak7')->get('localhost:9090/municipio');
    $municipiosArray = $municipios->json();

    return view('codigoPostal')
    ->with("codigoPostalesArray", $codigoPostalesArray)
    ->with("municipiosArray", $municipiosArray);
})->middleware(['auth', 'verified'])->name('codigoPostal');

Route::get('/eliminarCP/{id}', function ($id) {
    $estados = Http::withBasicAuth('abinadad', 'Mi7shak7')->delete('localhost:9090/codigoPostal/'.$id);
    return redirect('/codigoPostal');
 })->middleware(['auth', 'verified'])->name('eliminarCP');

Route::get('/guardaCP/{idMunicipio}/{cp}', function ($idMunicipio,$cp) {
   
    $response = Http::withBasicAuth('abinadad', 'Mi7shak7')->post('localhost:9090/codigoPostal/', [
        'codigopostal' => $cp,
        'idmunicipio' => $idMunicipio,
    ]);

    return back();
})->middleware(['auth', 'verified'])->name('guardaCP'); 

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
