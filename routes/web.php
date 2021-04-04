<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\PemetaanController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FtController;


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

Route::get('/', [WebController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/pemetaan', [PemetaanController::class, 'index'])->name('pemetaan');


Route::get('/kecamatan', [KecamatanController::class, 'index'])->name('kecamatan');
Route::get('/kecamatan/add', [KecamatanController::class, 'add']);
Route::post('/kecamatan/insert', [KecamatanController::class, 'insert']);
Route::get('/kecamatan/edit/{id_kecamatan}', [KecamatanController::class, 'edit']);
Route::post('/kecamatan/update/{id_kecamatan}', [KecamatanController::class, 'update']);
Route::get('/kecamatan/delete/{id_kecamatan}', [KecamatanController::class, 'delete']);

//jenis
Route::get('/jenis', [JenisController::class, 'index'])->name('jenis');
Route::get('/jenis/add', [JenisController::class, 'add']);
Route::post('/jenis/insert', [JenisController::class, 'insert']);
Route::get('/jenis/edit/{id_jenis}', [JenisController::class, 'edit']);
Route::post('/jenis/update/{id_jenis}', [JenisController::class, 'update']);
Route::get('/jenis/delete/{id_jenis}', [JenisController::class, 'delete']);

//wisata
Route::get('/wisata', [WisataController::class, 'index'])->name('wisata');
Route::get('/wisata/add', [WisataController::class, 'add']);
Route::post('/wisata/insert', [WisataController::class, 'insert']);
Route::get('/wisata/edit/{id_wisata}', [WisataController::class, 'edit']);
Route::post('/wisata/update/{id_wisata}', [WisataController::class, 'update']);
Route::get('/wisata/delete/{id_wisata}', [WisataController::class, 'delete']);
// Route::get('/wisata/print', [WisataController::class, 'print']);
// Route::get('/wisata/pdf', [WisataController::class, 'pdf']);
Route::get('/wisata/export', [WisataController::class, 'export']);
Route::any('/wisata/ft/{id_wisata}', [WisataController::class, 'ft']);
Route::any('/wisata/ft/delete/{id}', [WisataController::class, 'ftDelete']);

//foto
Route::get('/ft', [FtController::class, 'index'])->name('ft');
Route::get('/ft/add', [FtController::class, 'add']);
Route::post('/ft/insert', [FtController     ::class, 'insert']);


//user
Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/user/add', [UserController::class, 'add']);
Route::post('/user/insert', [UserController::class, 'insert']);
Route::get('/user/edit/{id}', [UserController::class, 'edit']);
Route::post('/user/update/{id}', [UserController::class, 'update']);
Route::get('/user/delete/{id}', [UserController::class, 'delete']);

//frontend
Route::get('/kecamatan/{id_kecamatan}', [WebController::class, 'kecamatan']);
Route::get('/jenis/{id_jenis}', [WebController::class, 'jenis']);
Route::get('/detailwisata/{id_wisata}', [WebController::class, 'detailwisata']);
Route::get('/pariwisata', [WebController::class, 'pariwisata']);
Route::get('/peta', [WebController::class, 'peta']);
Route::get('/about', [WebController::class, 'about']);


