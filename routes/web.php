<?php

use App\Http\Controllers\HistoryKunjunganController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Opsi;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');
Route::get('/blank', function () {
    return view('blank');
});


Route::group(['middleware' => 'role:admin'], function () {

    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
    Route::post('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
    Route::get('/geolocation', [App\Http\Controllers\AdminController::class, 'lokasi'])->name('geolocation');
    Route::post('geolocation/post', [App\Http\Controllers\AdminController::class, 'post'])->name('geolocation');
    Route::delete('/geolocation/{koordinat}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('geolocation');
    Route::get('/pengunjung', [App\Http\Controllers\AdminController::class, 'pengunjung'])->name('pengunjung');
    Route::get('/pengunjung/export_excel', [App\Http\Controllers\AdminController::class, 'simpan'])->name('pengunjung');
    Route::get('/management', [App\Http\Controllers\ManajemenPengunjung::class, 'index'])->name('user.index');

    // Route::post('add', [App\Http\Controllers\AdminController::class, 'question'])->name('survey');
    Route::get('survei', [\App\Http\Controllers\SurveiKepuasan::class, 'index'])->name('survei');
    // Route::get('/survei-result', [\App\Http\Controllers\SurveiKepuasan::class, 'total'])->name('survei.result');
    Route::get('/pertanyaan', [\App\Http\Controllers\pertanyaanController::class, 'index'])->name('index');
    Route::post('/tambah-pertanyaan', [\App\Http\Controllers\pertanyaanController::class, 'store'])->name('store');
    Route::delete('/hapus-pertanyaan/{id}', [\App\Http\Controllers\pertanyaanController::class, 'destroy'])->name('hapus.pertanyaan');



    // Route::get('/survey', [App\Http\Controllers\AdminController::class, 'survey'])->name('survey');

    Route::get('/user/create', [App\Http\Controllers\ManajemenPengunjung::class, 'create'])->name('user.create');
    Route::post('/user', [App\Http\Controllers\ManajemenPengunjung::class, 'store'])->name('user.store');
    Route::get('/user/{user}', [App\Http\Controllers\ManajemenPengunjung::class], 'show')->name('user.show');
    Route::get('/user/{user}/edit', [App\Http\Controllers\ManajemenPengunjung::class,'edit'])->name('user.edit');
    Route::put('/user/{user}', [App\Http\Controllers\ManajemenPengunjung::class, 'update'])->name('user.update');
    Route::delete('/user/{user}', [App\Http\Controllers\ManajemenPengunjung::class, 'destroy'])->name('user.destroy');
});

Auth::routes();





Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/history', [App\Http\Controllers\HistoryKunjunganController::class, 'index'])->name('history.kunjungan');
    // Route::post('/historykunjungan', [App\Http\Controllers\HistoryKunjunganController::class, 'store'])->name('history.kunjungan.tambah');
    // Route::get('/bebastanggungan', [App\Http\Controllers\BebasTanggungan::class, 'index'])->name('bebastanggungan');

    Route::get('/surveikepuasan/{id}', [App\Http\Controllers\KuisionerController::class, 'index'])->name('surveikepuasan');
    // Route::get('/surveikepuasan', [App\Http\Controllers\KuisionerController::class, 'option'])->name('surveikepuasan.opsi');
    // Route::get('/history', [App\Http\Controllers\BottombarController::class, 'history'])->name('historyKunjungan');
    Route::post('/set-button-clicked', [HistoryKunjunganController::class, 'setButtonClicked'])->name('setButtonClicked');
    Route::post('/tambahkepuasan', [\App\Http\Controllers\SurveiKepuasan::class, 'store'])->name('tambah.kuisioner');

    #ini presensi
    Route::get('/presensi', [App\Http\Controllers\BottombarController::class, 'index'])->name('presensi');
    Route::get('/geolokasi', [App\Http\Controllers\BottombarController::class, 'geolokasi'])->name('geolokasi');
    Route::post('post', [App\Http\Controllers\BottombarController::class, 'post'])->name('post');
    Route::get('/facescan', [App\Http\Controllers\BottombarController::class, 'facescan'])->name('facescan');

    #ini profile
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    Route::put('profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile');
});

Route::get('/offline', function () {
    return view('offline');
});
