<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\KalenderController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::redirect('/', '/login');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard',
        [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('ruangan',
        RuanganController::class);

    Route::resource('peminjam',
        PeminjamController::class);

    Route::resource('reservasi',
        ReservasiController::class);

    Route::get('/profile',
        [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile',
        [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile',
        [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

        Route::get('/kalender', [KalenderController::class, 'index'])
    ->name('kalender.index');

    Route::post('/cek-bentrok', [ReservasiController::class, 'cekBentrok'])
    ->name('reservasi.cekBentrok');


});

require __DIR__.'/auth.php';