<?php

use App\Livewire\Settings\Apotik\CreateObat;
use App\Livewire\Settings\Apotik\ViewDaftarObat;
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

// ===== SETTING ===== //
Route::prefix('settings')->group( function () {
	Route::prefix('apotik')->group( function () {
		Route::get('/daftar-obat', ViewDaftarObat::class);
		Route::get('/tambah-obat', CreateObat::class);
	});
});