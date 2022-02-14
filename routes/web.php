<?php

use App\Models\MaintenanceTechnician;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController,
    LoginHistoryController,
    ZoneController,
    EquipmentController,
    WorkRequestController,
    WorkOrderController,
    SparePartController,
    SparePartCategoryController,
    StockSiteController,
    InvoiceController
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
    return redirect()->route("login");
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
    Route::get("equipments/print/{equipment}", [EquipmentController::class, 'print'])->name('equipments.print');
    Route::resource('equipments', EquipmentController::class);

    Route::resource('work_requests', WorkRequestController::class);
    Route::post("work_requests/cancel/{work_request}", [WorkRequestController::class, 'cancel'])->name('work_requests.cancel');
    Route::get("work_requests/print/{work_request}", [WorkRequestController::class, 'print'])->name('work_requests.print');

    Route::resource('work_orders', WorkOrderController::class);
    Route::get("work_orders/print/{work_order}", [WorkOrderController::class, 'print'])->name('work_orders.print');

    Route::prefix("stock/")->group(function () {
        Route::resource('spare_parts', SparePartController::class);
        Route::resource('categories', SparePartCategoryController::class);
        Route::resource('stock_sites', StockSiteController::class);
        Route::resource('invoices', InvoiceController::class);
    });

    Route::get("send", function (){
        \Illuminate\Support\Facades\Auth::user()->notify(new \App\Notifications\witalcareNotification());
    });

});

Route::post("zones/initializeData", [ZoneController::class, 'initializeData'])->name('zones.initializeData');

Route::post("equipments/initializeData", [EquipmentController::class, 'initializeData'])->name('equipments.initializeData');

require __DIR__ . '/auth.php';
