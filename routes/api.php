<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiMenuController;
use App\Http\Controllers\API\ApiVendorController;
use App\Http\Controllers\API\ApiBagianController;
use App\Http\Controllers\API\ApiUserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('kantin/menu', [ApiMenuController::class, 'getDataMenu']);
Route::post('kantin/menu/add', [ApiMenuController::class, 'createMenu']);
Route::get('kantin/menu/{id}', [ApiMenuController::class, 'detailMenu']);
Route::post('kantin/menu/update', [ApiMenuController::class, 'updateMenu']);
Route::delete('kantin/menu/{id}', [ApiMenuController::class, 'deleteMenu']);

Route::get('kantin/vendor', [ApiVendorController::class, 'getVendorData']);
Route::post('kantin/vendor/add', [ApiVendorController::class, 'createVendor']);
Route::get('kantin/vendor/{id}', [ApiVendorController::class, 'showVendor']);
Route::post('kantin/vendor/update', [ApiVendorController::class, 'updateVendor']);
Route::delete('kantin/vendor/{id}', [ApiVendorController::class, 'deleteVendor']);

Route::get('kantin/bagian', [ApiBagianController::class, 'getBagianData']);
Route::post('kantin/bagian/add', [ApiBagianController::class, 'createBagian']);
Route::get('kantin/bagian/{id}', [ApiBagianController::class, 'showBagian']);
Route::post('kantin/bagian/update', [ApiBagianController::class, 'updateBagian']);
Route::delete('kantin/bagian/{id}', [ApiBagianController::class, 'deleteBagian']);

Route::get('kantin/user', [ApiUserController::class, 'getUserData']);
Route::post('kantin/login', [ApiUserController::class, 'login']);
