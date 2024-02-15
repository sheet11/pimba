<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(BarangController::class)->middleware('auth')->prefix('/data_barang')->group(function(){
    Route::get('/', 'index')->name('barang');
    Route::post('/', 'store')->name('barang.store');
    Route::get('/{barang}/edit', 'edit')->name('barang.edit');
    Route::patch('/update', 'update')->name('barang.update');
    Route::delete('/{barang}/delete', 'delete')->name('barang.delete');
    Route::get('/{barang}/download_file', 'downloadfile')->name('barang.downloadFile');
});

Route::controller(UserController::class)->middleware('auth')->prefix('/data_user')->group(function(){
    Route::get('/', 'index')->name('user');
    Route::post('/', 'store')->name('user.store');
    Route::get('/{user}/edit', 'edit')->name('user.edit');
    Route::patch('/update', 'update')->name('user.update');
    Route::delete('/{user}/delete', 'delete')->name('user.delete');
    Route::get('/{user}/download_file', 'downloadfile')->name('user.downloadFile');

});

Route::controller(PeminjamController::class)->middleware('auth')->prefix('/data_peminjam')->group(function(){
    Route::get('/', 'index')->name('peminjam');
    Route::post('/', 'store')->name('peminjam.store');
    Route::get('/{peminjam}/edit', 'edit')->name('peminjam.edit');
    Route::patch('/pengembalian', 'pengembalian')->name('peminjam.pengembalian');
    Route::patch('/update', 'update')->name('peminjam.update');
    Route::delete('/{peminjam}/delete', 'delete')->name('peminjam.delete');
    Route::get('/download', 'download')->name('peminjam.download');
});
// samping get barang itu variabel kalau di name itu namanya url harus sama di profix
