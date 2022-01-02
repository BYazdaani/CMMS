<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\V1\{
    AuthController,
    FCMController
};

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

Route::post('/login',[AuthController::class, 'login'])->name("login");

Route::middleware(['banned', 'auth:sanctum'])->group(function () {

    Route::post('/logout',[AuthController::class, 'logout'])->name("logout");


});
Route::post('/fcm',[FCMController::class, 'store'])->name("store");
