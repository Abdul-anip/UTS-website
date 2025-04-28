<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServisController; // Import ServisController

Route::get('/', function () {
    return view('welcome');
});

// PENTING: trashed dan restore HARUS DULUAN
Route::get('servis/trashed', [ServisController::class, 'trashed'])->name('servis.trashed');
Route::post('servis/{id}/restore', [ServisController::class, 'restore'])->name('servis.restore');

// Baru resource terakhir
Route::resource('servis', ServisController::class);
