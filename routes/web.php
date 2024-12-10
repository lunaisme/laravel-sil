<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StokController;
use App\Http\Controllers\KalibrasiAlatController;

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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/daftar_pemeriksaan', function () {
    return view('daftar_pemeriksaan.daftar_pemeriksaan');
})->name('daftar_pemeriksaan');
Route::get('/detail_pemeriksaan', function () {
    return view('daftar_pemeriksaan.detail_pemeriksaan');
})->name('detail_pemeriksaan');

Route::get('/pemeriksaan', function () {
    return view('pemeriksaan');
})->name('pemeriksaan');
Route::get('/riwayat_pemeriksaan', function () {
    return view('riwayat_pemeriksaan');
})->name('riwayat_pemeriksaan');
Route::get('/pembayaran', function () {
    return view('pembayaran');
})->name('pembayaran');




// Menjadikan route sebagai resource untuk CRUD
Route::resource('kalibrasi', KalibrasiAlatController::class);



// route untuk reagen
Route::get('/stok_reagen', [StokController::class, 'index'])->name('stok_reagen');
Route::get('/stok_reagen/create', [StokController::class, 'create'])->name('stok_reagen.create');
Route::post('/stok_reagen/store', [StokController::class, 'store'])->name('stok_reagen.store');

Route::get('/reagen_masuk', [StokController::class, 'recapMasuk'])->name('reagen_masuk');
Route::get('/reagen_keluar', [StokController::class, 'recapKeluar'])->name('reagen_keluar');


// ini route ga jelas belum dikerjakan
Route::get('/pengambilan_sampel', function () {
    return view('pengambilan_sampel');
})->name('pengambilan_sampel');

Route::get('/hematologi', function () {
    return view('hematologi');
})->name('hematologi');

Route::get('/kimia_darah', function () {
    return view('kimia_darah');
})->name('kimia_darah');

Route::get('/urinalisis', function () {
    return view('urinalisis');
})->name('urinalisis');

Route::get('/imunoserologi', function () {
    return view('imunoserologi');
})->name('imunoserologi');

Route::get('/mikrobiologi', function () {
    return view('mikrobiologi');
})->name('mikrobiologi');

Route::get('/lain_lain', function () {
    return view('lain_lain');
})->name('lain_lain');
