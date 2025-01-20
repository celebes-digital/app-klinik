<?php

use App\Livewire\Profil;
use App\Livewire\Profil\Update;
use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;

// Pasien
use App\Livewire\Pasien\View as PasienView;
use App\Livewire\Pasien\Create as PasienCreate;
use App\Livewire\Pasien\Update as PasienUpdate;
use App\Livewire\PenunjangMedis\ListForm;
use App\Livewire\Poli\PoliView;
use App\Livewire\Profil\ViewProfil;


use App\Livewire\RuangPerawatan\Create as RuangPerawatanCreate;
use App\Livewire\RuangPerawatan\View as RuangPerawatanView;
// Staff
use App\Livewire\Staff\View as StaffView;
use App\Livewire\Staff\CreateUpdate as StaffCreateUpdate;
// Tenaga Medis
use App\Livewire\TenagaMedis\View as TenagaMedisView;
use App\Livewire\TenagaMedis\Create as TenagaMedisCreate;
use App\Livewire\TenagaMedis\Konfigurasi as TenagaMedisKonfigurasi;
use App\Livewire\TindakanMedis\ListForm as TindakanMedisListForm;

Route::get('/', Welcome::class);

Route::get('/profil', ViewProfil::class);

Route::get('/poliklinik', PoliView::class);

Route::get('/penunjang-medis', ListForm::class);

Route::get('/tindakan-medis', TindakanMedisListForm::class);

// FORM PASIEN
Route::get('/pasien', PasienView::class);
Route::get('/pasien/create', PasienCreate::class);
Route::get('/pasien/update/{id_pasien}', PasienCreate::class);

// FORM STAFF
Route::get('/staff', StaffView::class);
Route::get('/staff/create', StaffCreateUpdate::class);
Route::get('/staff/update/{id_staff}', StaffCreateUpdate::class);

// FORM TENAGA MEDIS
Route::get('/tenaga-medis', TenagaMedisView::class);
Route::get('/tenaga-medis/create', TenagaMedisCreate::class);
Route::get('/tenaga-medis/update/{id_tenaga_medis}', TenagaMedisCreate::class);
Route::get('/tenaga-medis/konfigurasi', TenagaMedisKonfigurasi::class);
// Route::get('/tenaga-medis/update/{id_tenaga_medis}', TenagaMedisUpdate::class);

// FORM RUANG PERAWATAN
Route::get('/ruang-perawatan', RuangPerawatanView::class);
Route::get('/ruang-perawatan/create', RuangPerawatanCreate::class);
Route::get('/ruang-perawatan/update/{id_ruang_perawatan}', RuangPerawatanCreate::class);
