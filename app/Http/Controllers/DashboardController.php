<?php

namespace App\Http\Controllers;

use App\Models\Equipment;

class DashboardController extends Controller
{
    public function index()
    {
        $ready = Equipment::where('status', 'Ready')->count();

        $maintenance = Equipment::where('status', 'Maintenance')->count();

        $down = Equipment::where('status', 'Down')->count();

        $totalEquipment = Equipment::count();

        $maintenanceDue = Equipment::whereDate(
            'maintenance_due_date',
            '<=',
            now()->addDays(30)
        )->count();

        $calibrationDue = Equipment::whereDate(
            'calibration_due_date',
            '<=',
            now()->addDays(30)
        )->count();

        return view('dashboard.index', compact(
            'ready',
            'maintenance',
            'down',
            'totalEquipment',
            'maintenanceDue',
            'calibrationDue'
        ));
    }
}