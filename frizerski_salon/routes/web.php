<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {});


Route::resource('users', App\Http\Controllers\UserController::class)->except('create', 'store');

Route::resource('uslugas', App\Http\Controllers\UslugaController::class);

Route::resource('termins', App\Http\Controllers\TerminController::class)->except('destroy');

Route::resource('racuns', App\Http\Controllers\RacunController::class)->except('edit', 'update', 'destroy');

Route::resource('obavestenjas', App\Http\Controllers\ObavestenjaController::class)->only('index', 'show');
