<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Add API Directory
use App\Http\Controllers\API\ApiController;
use App\Http\Controllers\API\BrandController;
use App\Http\Controllers\API\AuthController;

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


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('dummyAPI', [ApiController::class, 'DummyAPI']);

// Route::get("list/{key:name?}", ['ApiController::class', 'list']);
Route::post('/store-data', [ApiController::class, 'storeDataPostAPI']);
Route::post('/store-brand', [ApiController::class, 'storeBrandPostAPI']);
Route::put('/update-member/{id}', [ApiController::class, 'updateMemberPutAPI']);
Route::delete('/delete-member/{id}', [ApiController::class, 'deleteMemberAPI']);
// search api
Route::get('/search-api/{key}', [ApiController::class, 'searchMemberAPI']);

// API with Resource Controller
Route::apiResource('/brand', BrandController::class);
// API Login
Route::post('/login', [AuthController::class, 'index']);

Route::group(['middleware'=>'auth:sanctum'], function(){
  // All Secure API URL
  Route::get('/list/{id?}', [ApiController::class, 'getMemberAPI']);
});
