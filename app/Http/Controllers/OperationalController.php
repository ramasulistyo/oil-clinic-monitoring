<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\OperatingLog;

class OperationalController extends Controller
{
    /**
     * Tampilkan checklist harian.
     * Method ini HANYA menampilkan data — proses simpan data
     * tetap ditangani oleh OperatingLogController::store()
     * supaya logic perhitungan jam operasi cuma ada di 1 tempat.
     */
    public function index()
    {
        $today = now()->toDateString();

        $equipment = Equipment::whereIn('status', ['Ready', 'In Use'])
            ->orderBy('equipment_code')
            ->get();

        $filledToday = OperatingLog::whereDate('operating_date', $today)
            ->pluck('equipment_id')
            ->toArray();

        return view('operational.index', compact('equipment', 'filledToday', 'today'));
    }
}