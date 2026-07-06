<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OperatingLogController;
use App\Http\Controllers\DowntimeLogController;
use App\Http\Controllers\MaintenanceLogController;
use App\Http\Controllers\CalibrationLogController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('equipment', EquipmentController::class);
Route::resource('operating-log', OperatingLogController::class);
Route::resource('downtime-log', DowntimeLogController::class);
Route::resource('maintenance-log', MaintenanceLogController::class);
Route::resource('calibration-log', CalibrationLogController::class);
Route::get('/dashboard', [DashboardController::class, 'index']);