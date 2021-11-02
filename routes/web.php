<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    SuperAdminController,
    UserController,
    LoginHistoryController
};

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

Route::get('/', function () {
    return view('welcome');
})->name('gmao');

Route::middleware('banned')->group(function () {

    Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth'])->name('dashboard');

//*************super admin**********************************************************************************************
    Route::resource('users', UserController::class)->middleware(['auth']);
    Route::resource('logs', LoginHistoryController::class)->middleware(['auth']);

});


require __DIR__ . '/auth.php';


