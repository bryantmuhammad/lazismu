<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController as authadmin;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController as admin;
use App\Http\Controllers\User\UserController as user;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\User\PembayaranController;

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

//Auth Route
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/login', [authadmin::class, 'login'])->name('admin.login')->middleware('guest');
Route::get('/admin/logout', [authadmin::class, 'logout']);
Route::post('/admin/login', [authadmin::class, 'authenticate'])->name('admin.login');

//Route for CRUD Data Master
route::resource('admin/user', admin::class)->middleware(['permission:crud data master'])->except(['edit']);
route::resource('admin/kategori', KategoriController::class)->middleware(['permission:crud data master'])->except(['edit']);
route::resource('admin/program', ProgramController::class)->middleware(['permission:crud data master'])->except(['edit']);
Route::get('program/{program}', [user::class, 'detail'])->name('program.detail');
Route::get('/donasi/{program}', [PembayaranController::class, 'index'])->name('donasi');