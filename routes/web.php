<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\MemberController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::get('/','DefaultController@index');

Route::get('/', [DefaultController::class, 'index']);
Route::get('/test',[DefaultController::class, 'index']);
Route::get('/about',[DefaultController::class, 'about']);
Route::get('/apiusers',[DefaultController::class, 'apiUsers']);

// for One to one relation
Route::get('/member-data',[MemberController::class, 'index']);
