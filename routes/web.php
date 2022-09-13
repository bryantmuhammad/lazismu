<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\User\PembayaranController;
use App\Http\Controllers\User\UserController as user;
use App\Http\Controllers\Admin\UserController as admin;
use App\Http\Controllers\Admin\AuthController as authadmin;
use App\Http\Controllers\Admin\PemasukanController;
use App\Http\Controllers\Admin\PengeluaranController;

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

Route::get('/', [user::class, 'index']);
Route::get('/visimisi', [user::class, 'visimisi'])->name('user.visimisi');
Route::get('/tentangkami', [user::class, 'tentangkami'])->name('user.tentangkami');
Route::get('/program', [user::class, 'program']);
Route::get('/program/kategori/{kategori}', [user::class, 'programByKategori']);

//Auth Route
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/login', [authadmin::class, 'login'])->name('admin.login')->middleware('guest');
Route::get('/admin/logout', [authadmin::class, 'logout']);
Route::post('/admin/login', [authadmin::class, 'authenticate'])->name('admin.login');

//Route for CRUD Data Master
route::resource('admin/user', admin::class)->middleware(['permission:crud data master'])->except(['edit']);
route::resource('admin/kategori', KategoriController::class)->middleware(['permission:crud data master'])->except(['edit']);
route::resource('admin/program', ProgramController::class)->middleware(['permission:crud data master'])->except(['edit']);

Route::get('/program/{program}', [user::class, 'detail'])->name('program.detail');
Route::get('/donasi/{program}', [PembayaranController::class, 'index'])->name('donasi');
Route::post('/donasi/pembayaran', [PembayaranController::class, 'bayar']);
Route::post('/donasi/pembayaran/simpan', [PembayaranController::class, 'store']);
Route::get('/donasi/caramembayar/{pemasukan}', [PembayaranController::class, 'caramembayar']);
Route::delete('/pemasukan/{pemasukan}', [PemasukanController::class, 'destroy']);
Route::middleware(['permission:transaksi'])->group(function () {
    Route::get('/admin/donasi', [PemasukanController::class, 'index'])->name('admin.donasi');
    Route::post('/pengeluaran/store', [PengeluaranController::class, 'store'])->name('pengeluaran.store');
    Route::get('/admin/pemasukan', [PemasukanController::class, 'pemasukan'])->name('admin.pemasukan');
    Route::get('/admin/pengeluaran', [PengeluaranController::class, 'index'])->name('admin.pengeluaran');
});
