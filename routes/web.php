<?php

use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;

// Pasien
use App\Livewire\Pasien\View as PasienView;
use App\Livewire\Pasien\Create as PasienCreate;
use App\Livewire\Pasien\Update as PasienUpdate;

// Staff
use App\Livewire\Staff\View as StaffView;

// Tenaga Medis
use App\Livewire\TenagaMedis\View as TenagaMedisView;

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
Route::get('/pasien', PasienView::class);
Route::get('/pasien/create', PasienCreate::class);
Route::get('/pasien/update/{id_pasien}', PasienUpdate::class);

// FORM STAFF
Route::get('/staff', StaffView::class);
// Route::get('/staff/create', StaffCreate::class);
// Route::get('/staff/update/{id_staff}', StaffUpdate::class);

// FORM TENAGA MEDIS
Route::get('/tenaga-medis', TenagaMedisView::class);
// Route::get('/tenaga-medis/create', TenagaMedisCreate::class);
// Route::get('/tenaga-medis/update/{id_tenaga_medis}', TenagaMedisUpdate::class);
