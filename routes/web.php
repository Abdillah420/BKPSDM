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
use App\Http\Controllers\User\BeritaController as UserBeritaController;
use App\Http\Controllers\User\IniFileUnduhController as IniFileUnduhController;
use App\Http\Controllers\User\IniFileUnduhController as UserIniFileUnduhController;
use App\Http\Controllers\User\GaleriController;
use App\Http\Controllers\User\IniArtikelController;
// use App\Http\Controllers\User\FileUnduhController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\PopupController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/admin', [SlideController::class, 'index'])->name('admin.index');

Route::group(['as' => 'user.'], function() {
    Route::resource("slides",SlideController::class);
    Route::resource('berita', BeritaController::class);
    Route::resource('artikel', ArtikelController::class);
    Route::resource('file_unduh', FileUnduhController::class);
    Route::resource('berita', BeritaController::class);
    Route::resource('agenda',AgendaController::class);
    Route::resource('foto',FotoController::class);
});

Route::get('/profil', function () {
    return view('profil');
})->name('profil');

// Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
// Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');

// Route::get('/berita', function () {
//     return view('berita');
// })->name('berita');


Route::get('/unduh', function () {
    return view('unduh');
})->name('unduh');

Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');

Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak.index');

// Route untuk menampilkan daftar berita
Route::get('/berita', [userBeritaController::class, 'index'])->name('berita.index');

// Route untuk menampilkan detail berita
Route::get('/berita/{slug}', [userBeritaController::class, 'show'])->name('berita.show');


Route::get('/unduh', [UserIniFileUnduhController::class, 'index'])->name('unduh.index');

// Route untuk menampilkan detail berita
Route::get('/unduh/{slug}', [userIniFileUnduhController::class, 'show'])->name('unduh.show');

Route::get('/berita/download/{slug}', [UserIniFileUnduhController::class, 'downloadPDF'])->name('berita.download');

Route::get('/berita/latest', [BeritaController::class, 'getLatestNews'])->name('berita.latest');

Route::get('/popup/latest-news', [PopupController::class, 'getLatestNews'])->name('popup.latest');

// Rute untuk menampilkan daftar artikel
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');

// Rute untuk menampilkan detail artikel
Route::get('/artikel/{slug}', [ArtikelController::class, 'show'])->name('artikel.show');

require __DIR__.'/auth.php';
