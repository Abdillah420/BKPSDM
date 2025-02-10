<?php

use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FileUnduhController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\FotoController;
use App\Http\Controllers\ProfileController;
use App\Models\Foto;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get("admin/dashboard",[DashboardController::class,"index"])->name("admin.dashboard");



Route::group(["as"=>"user."],function(){
    Route::resource("slides",SlideController::class);
});


Route::group(['as' => 'user.'], function() {
    Route::resource('berita', BeritaController::class);
    Route::resource('artikel', ArtikelController::class);
    Route::resource('file_unduh', FileUnduhController::class);
    Route::resource('berita', BeritaController::class);
    Route::resource('agenda',AgendaController::class);
    Route::resource('foto',FotoController::class);
});


require __DIR__.'/auth.php';
