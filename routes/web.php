<?php

use App\Livewire\Pemeriksaan\Laboratorium\CreatePemeriksaan as PemeriksaanLaboratorium;
use Illuminate\Support\Facades\Route;
use App\Livewire\Settings\Apotik\CreateObat;
use App\Livewire\Settings\Apotik\EditObat;
use App\Livewire\Settings\Apotik\UpdateStokObat;
use App\Livewire\Settings\Apotik\ViewDaftarObat;
use App\Livewire\Welcome;

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
		Route::get('/obat/{obat}/edit', EditObat::class);
		Route::get('/tambah-obat', CreateObat::class);
		Route::get('/stok-obat/{stok}', UpdateStokObat::class);
	});
});

Route::prefix('pemeriksaan')->group( function () {
		Route::get('/laboratorium/create', PemeriksaanLaboratorium::class);
		// Route::get('/radiologi', ViewDaftarObat::class);
		// Route::get('/poliklinik', ViewDaftarObat::class);
		// Route::get('/poliklinik', ViewDaftarObat::class);
});