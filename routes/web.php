<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/datps', 'datos')->name('datos');

    Route::get('/asignaturas/notas',   'edit')->name('asignaturas.notas.edit');
    Route::post('/asignaturas/notas',  'update')->name('asignaturas.notas.update');
});
