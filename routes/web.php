<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TerminController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth','uloga:admin'])->group(function(){

    Route::resource('users', App\Http\Controllers\UserController::class)->except('create', 'store');

    Route::resource('uslugas', App\Http\Controllers\UslugaController::class);

    Route::resource('racuns', App\Http\Controllers\RacunController::class)->except('edit', 'update', 'destroy');

});

Route::middleware(['auth','uloga:frizer,admin'])->group(function(){

    Route::resource('racuns', App\Http\Controllers\RacunController::class)->only('show');

    Route::resource('termins', App\Http\Controllers\TerminController::class);

    Route::resource('obavestenjas', App\Http\Controllers\ObavestenjaController::class)->only('destroy');

    Route::put('/termins/potvrdi/{termin}', [TerminController::class, 'potvrdi'])->name('termins.potvrdi');

    Route::put('/termins/zavrsi/{termin}', [TerminController::class, 'zavrsi'])->name('termins.zavrsi');
    
    Route::put('/termins/propusten/{termin}', [TerminController::class, 'propusten'])->name('termins.propusten');

    Route::put('/termins/otkazi/{termin}', [TerminController::class, 'otkazi'])->name('termins.otkazi');

    Route::put('/termins/generisi_racun/{termin}', [TerminController::class, 'generisi'])->name('termins.generisi');
});

Route::middleware(['auth', 'uloga:klijent,frizer,admin'])->group(function(){

    Route::resource('users', App\Http\Controllers\UserController::class)->except('create', 'store');

    Route::resource('termins', App\Http\Controllers\TerminController::class)->except('edit','update');

    Route::put('/termins/otkazi/{termin}', [TerminController::class, 'otkazi'])->name('termins.otkazi');


});