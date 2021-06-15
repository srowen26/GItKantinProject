<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiMenuController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('kantin/menu', [ApiMenuController::class, 'getDataMenu']);
Route::post('kantin/menu/add', [ApiMenuController::class, 'createMenu']);
Route::get('kantin/menu/{id}', [ApiMenuController::class, 'detailMenu']);
Route::post('kantin/menu/update', [ApiMenuController::class, 'updateMenu']);
Route::delete('kantin/menu/{id}', [ApiMenuController::class, 'deleteMenu']);
