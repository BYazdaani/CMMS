<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController,
    LoginHistoryController,
    ZoneController,
    EquipmentController
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
    Route::get("users/restrict/{user}", [UserController::class, 'restrict'])->name('users.restrict');

    Route::resource('logs', LoginHistoryController::class)->middleware(['auth']);

    Route::resource('zones', ZoneController::class)->middleware(['auth']);
    Route::post("zones/initializeData", [ZoneController::class, 'initializeData'])->name('zones.initializeData');

    Route::resource('equipments', EquipmentController::class)->middleware(['auth']);
    Route::post("equipments/initializeData", [EquipmentController::class, 'initializeData'])->name('equipments.initializeData');

});

Route::post("zones/initializeData", [ZoneController::class, 'initializeData'])->name('zones.initializeData');

Route::post("equipments/initializeData", [EquipmentController::class, 'initializeData'])->name('equipments.initializeData');

require __DIR__ . '/auth.php';
