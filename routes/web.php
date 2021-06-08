<?php

use App\Http\Controllers\MasterBagianController;
use App\Http\Controllers\MasterMenuController;
use App\Http\Controllers\MasterVendorController;
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

Route::get('/kantin', function () {
    return view('index');
});

Route::get('/kantin/vendor',[MasterVendorController::class,'index']); 
Route::get('/kantin/vendor/edit/{vendor}',[MasterVendorController::class,'edit']); 
Route::get('/kantin/vendor/add',[MasterVendorController::class,'create']); 
Route::post('/kantin/vendor',[MasterVendorController::class,'store']); 
Route::delete('/kantin/vendor/delete/{vendor}',[MasterVendorController::class,'destroy']); 
Route::patch('/kantin/vendor/{vendor}',[MasterVendorController::class,'update']); 

Route::get('/kantin/menu',[MasterMenuController::class,'index']); 
Route::get('/kantin/menu/edit/{menu}',[MasterMenuController::class,'edit']); 
Route::get('/kantin/menu/add',[MasterMenuController::class,'create']); 
Route::post('/kantin/menu',[MasterMenuController::class,'store']); 
Route::delete('/kantin/menu/delete/{menu}',[MasterMenuController::class,'destroy']); 
Route::patch('/kantin/menu/{menu}',[MasterMenuController::class,'update']); 

Route::get('/kantin/bagian',[MasterBagianController::class,'index']); 
Route::get('/kantin/bagian/edit/{bagian}',[MasterBagianController::class,'edit']); 
Route::get('/kantin/bagian/add',[MasterBagianController::class,'create']); 
Route::post('/kantin/bagian',[MasterBagianController::class,'store']); 
Route::delete('/kantin/bagian/delete/{bagian}',[MasterBagianController::class,'destroy']); 
Route::patch('/kantin/bagian/{bagian}',[MasterBagianController::class,'update']); 
