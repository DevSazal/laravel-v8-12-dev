<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Add API Directory
use App\Http\Controllers\API\ApiController;

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

Route::get('dummyAPI', [ApiController::class, 'DummyAPI']);
Route::get('/list/{id?}', [ApiController::class, 'getMemberAPI']);
// Route::get("list/{key:name?}", ['ApiController::class', 'list']);
Route::post('/store-data', [ApiController::class, 'storeDataPostAPI']);
Route::post('/store-brand', [ApiController::class, 'storeBrandPostAPI']);
