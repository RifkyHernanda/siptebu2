<?php

use App\Http\Controllers\PanenController;
use App\Http\Controllers\SupirController;
use App\Models\Supir;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetaniController;
use Psy\SuperglobalsEnv;
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
///Route::get('/', function () {
    ///return view('welcome');
///});

//Route::group(['middleware' => 'auth'], function(){
//    Route::get('/', [PanenController::class, 'index'])->name('panen.index');
//});

Route::get('petani/add', [PetaniController::class, 'create'])->name('petani.create');
Route::post('petani/store', [PetaniController::class, 'store'])->name('petani.store');
Route::get('petani/', [PetaniController::class, 'index'])->name('petani.index');
Route::get('petani/edit/{id}', [PetaniController::class, 'edit'])->name('petani.edit');
Route::post('petani/update/{id}', [PetaniController::class, 'update'])->name('petani.update');
Route::post('petani/delete/{id}', [PetaniController::class, 'delete'])->name('petani.delete');
Route::post('petani/hardDelete/{id}', [PetaniController::class, 'hardDelete'])->name('petani.hardDelete');
Route::post('petani/restore/{id}', [PetaniController::class, 'restore'])->name('petani.restore');
Route::get('petani/indexDelete', [PetaniController::class, 'indexDelete'])->name('petani.indexDelete');



Route::get('supir/add', [SupirController::class, 'create'])->name('supir.create');
Route::post('supir/store', [SupirController::class, 'store'])->name('supir.store');
Route::get('supir/', [SupirController::class, 'index'])->name('supir.index');
Route::get('supir/edit/{id}', [SupirController::class, 'edit'])->name('supir.edit');
Route::post('supir/update/{id}', [SupirController::class, 'update'])->name('supir.update');
Route::post('supir/delete/{id}', [SupirController::class, 'delete'])->name('supir.delete');
Route::post('supir/hardDelete/{id}', [SupirController::class, 'hardDelete'])->name('supir.hardDelete');
Route::post('supir/restore/{id}', [SupirController::class, 'restore'])->name('supir.restore');
Route::get('supir/indexDelete', [SupirController::class, 'indexDelete'])->name('supir.indexDelete');


Route::get('panen/add', [PanenController::class, 'create'])->name('panen.create');
Route::post('panen/store', [PanenController::class, 'store'])->name('panen.store');
Route::get('panen/', [PanenController::class, 'index'])->name('panen.index');
Route::get('panen/edit/{id}', [PanenController::class, 'edit'])->name('panen.edit');
Route::post('panen/update/{id}', [PanenController::class, 'update'])->name('panen.update');
Route::post('panen/delete/{id}', [PanenController::class, 'delete'])->name('panen.delete');
Route::post('panen/hardDelete/{id}', [PanenController::class, 'hardDelete'])->name('panen.hardDelete');
Route::post('panen/restore/{id}', [PanenController::class, 'restore'])->name('panen.restore');
Route::get('panen/indexDelete', [PanenController::class, 'indexDelete'])->name('panen.indexDelete');
//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');