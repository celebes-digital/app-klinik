<?php

use App\Livewire\Pasien\View;
use App\Livewire\Pasien\Create;
use App\Livewire\Pasien\Update;
use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', Welcome::class);

// FORM PASIEN
Route::get('/pasien', View::class);
Route::get('/pasien/create', Create::class);
Route::get('/pasien/update/{id_pasien}', Update::class);