<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StokController;
use App\Http\Controllers\KalibrasiAlatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\HasilPemeriksaanController;

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



Route::resource('daftar_pemeriksaan', PasienController::class);
Route::post('daftar_pemeriksaan/store', [PasienController::class, 'store'])->name('daftar_pemeriksaan.store');


Route::get('/hasil_pemeriksaan/{pasienId}', [HasilPemeriksaanController::class, 'index'])->name('hasil_pemeriksaan.index');
Route::post('/hasil_pemeriksaan/{pasienId}', [HasilPemeriksaanController::class, 'store'])->name('hasil_pemeriksaan.store');
Route::get('/hasil-pemeriksaan/{pasienId}/print', [HasilPemeriksaanController::class, 'print'])->name('hasil_pemeriksaan.print');



Route::get('/pemeriksaan', function () {
    return view('pemeriksaan');
})->name('pemeriksaan');

Route::get('/riwayat_pemeriksaan', [PasienController::class, 'updateStatus'])->name('updateStatus');
Route::get('/updateStatus', [PasienController::class, 'showRiwayatPemeriksaan'])->name('riwayat_pemeriksaan');
Route::get('/updateStatus/{id}', [PasienController::class, 'updateStatus'])->name('updateStatus');
Route::get('/pengambilan_sampel', [PasienController::class, 'showPengambilanSampel'])->name('pengambilan_sampel');
Route::get('/pembayaran', [PasienController::class, 'showPembayaran'])->name('pembayaran');




// Menjadikan route sebagai resource untuk CRUD
Route::resource('kalibrasi', KalibrasiAlatController::class);



// route untuk reagen
Route::get('/stok_reagen', [StokController::class, 'index'])->name('stok_reagen');
Route::get('/stok_reagen/create', [StokController::class, 'create'])->name('stok_reagen.create');
Route::post('/stok_reagen/store', [StokController::class, 'store'])->name('stok_reagen.store');

Route::get('/reagen_masuk', [StokController::class, 'recapMasuk'])->name('reagen_masuk');
Route::get('/reagen_keluar', [StokController::class, 'recapKeluar'])->name('reagen_keluar');


Route::get('/hematologi', [PasienController::class, 'showByGroup'])->name('hematologi')->defaults('group', 'Hematologi');
Route::get('/kimia_darah', [PasienController::class, 'showByGroup'])->name('kimia_darah')->defaults('group', 'Kimia Darah');
Route::get('/urinalisis', [PasienController::class, 'showByGroup'])->name('urinalisis')->defaults('group', 'Urinalisis');
Route::get('/imunoserologi', [PasienController::class, 'showByGroup'])->name('imunoserologi')->defaults('group', 'Imunoserologi');
Route::get('/mikrobiologi', [PasienController::class, 'showByGroup'])->name('mikrobiologi')->defaults('group', 'Mikrobiologi');
Route::get('/lain_lain', [PasienController::class, 'showByGroup'])->name('lain_lain')->defaults('group', 'Lain-lain');

use App\Http\Controllers\PatientController;
use App\Http\Controllers\ExaminationController;

// // Routes untuk pasien
// Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');
// Route::get('/patients/create', [PatientController::class, 'create'])->name('patients.create');
// Route::post('/patients/store', [PatientController::class, 'store'])->name('patients.store');
// Route::get('/patients/{id}', [PatientController::class, 'show'])->name('patients.show');
// Route::post('/patients/{id}/accept', [PatientController::class, 'accept'])->name('patients.accept');
// Route::post('/patients/{id}/reject', [PatientController::class, 'reject'])->name('patients.reject');

// // Routes untuk pemeriksaan
// Route::get('/examinations', [ExaminationController::class, 'index'])->name('examinations.index');
// Route::get('/examinations/{id}', [ExaminationController::class, 'show'])->name('examinations.show');
