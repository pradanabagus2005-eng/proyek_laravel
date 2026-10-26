<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratMasukController;

Route::get('/', function () {
     return view('dashboard');
})->name('dashboard');

// Route controller untuk halaman utama surat masuk (index)
Route::get('/surat-masuk', [SuratMasukController::class, 'index'])
    ->name('surat-masuk.index');

// Route controller untuk halaman detail (show)
Route::get('/surat-masuk/{id}', [SuratMasukController::class, 'show'])
    ->name('surat-masuk.show');

Route::get('/surat-keluar', [App\Http\Controllers\SuratKeluarController::class, 'index'])->name('surat-keluar.index');
Route::get('/surat-keluar/{id}', [App\Http\Controllers\SuratKeluarController::class, 'show'])->name('surat-keluar.show');