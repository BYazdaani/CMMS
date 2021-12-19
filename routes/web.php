<?php

use App\Models\MaintenanceTechnician;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController,
    LoginHistoryController,
    ZoneController,
    EquipmentController,
    WorkRequestController,
    WorkOrderController
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

Route::middleware(['banned', 'auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get("users/restrict/{user}", [UserController::class, 'restrict'])->name('users.restrict');
    Route::resource('users', UserController::class);

    Route::resource('logs', LoginHistoryController::class);

    Route::post("zones/initializeData", [ZoneController::class, 'initializeData'])->name('zones.initializeData');
    Route::resource('zones', ZoneController::class);

    Route::post("equipments/initializeData", [EquipmentController::class, 'initializeData'])->name('equipments.initializeData');
    Route::post("equipments/print/{equipment}", [EquipmentController::class, 'print'])->name('equipments.print');
    Route::resource('equipments', EquipmentController::class);

    Route::resource('work_requests', WorkRequestController::class);
    Route::post("work_requests/cancel/{work_request}", [WorkRequestController::class, 'cancel'])->name('work_requests.cancel');

    Route::resource('work_orders', WorkOrderController::class);

});

Route::post("zones/initializeData", [ZoneController::class, 'initializeData'])->name('zones.initializeData');

Route::post("equipments/initializeData", [EquipmentController::class, 'initializeData'])->name('equipments.initializeData');

require __DIR__ . '/auth.php';
