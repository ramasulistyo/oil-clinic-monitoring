<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function index()
    {
            $equipment = Equipment::all();

            return view('equipment.index', compact('equipment'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('equipment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Equipment::create($request->all());
        return redirect('/equipment');
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipment $equipment)
    {
        $equipment->load([
    'maintenanceLogs',
    'downtimeLogs',
    'calibrationLogs',
    'operatingLogs' => function ($query) {
    $query->orderBy('operating_date', 'desc')
          ->orderBy('start_time', 'desc');
    }
]);

$totalHours = $equipment
    ->operatingLogs
    ->sum('operating_hours');

$totalSamples = $equipment
    ->operatingLogs
    ->sum('sample_count');

$totalSessions = $equipment->operatingLogs->count();

$averageHours = $totalSessions > 0
    ? $totalHours / $totalSessions
    : 0;

$lastOperation = $equipment
    ->operatingLogs
    ->sortByDesc(function ($log) {
        return $log->operating_date.' '.$log->end_time;
    })
    ->first();

// Total downtime & availability rate
$totalDowntimeHours = $equipment->downtimeLogs->sum('downtime_hours');
$totalTracked = $totalHours + $totalDowntimeHours;
$availabilityRate = $totalTracked > 0
    ? round(($totalHours / $totalTracked) * 100)
    : 100;

// Gabungkan semua log jadi satu timeline, urut dari yang terbaru
$timeline = collect()
    ->concat($equipment->downtimeLogs->map(fn ($log) => [
        'date'  => $log->down_date,
        'type'  => 'Downtime',
        'color' => 'red',
        'title' => $log->failure_type,
        'desc'  => trim(($log->cause ? "Penyebab: {$log->cause}. " : '') . ($log->action_taken ? "Tindakan: {$log->action_taken}." : '')),
        'by'    => $log->technician,
    ]))
    ->concat($equipment->maintenanceLogs->map(fn ($log) => [
        'date'  => $log->maintenance_date,
        'type'  => 'Maintenance',
        'color' => 'yellow',
        'title' => $log->maintenance_type,
        'desc'  => $log->action_taken,
        'by'    => $log->technician,
    ]))
    ->concat($equipment->calibrationLogs->map(fn ($log) => [
        'date'  => $log->calibration_date,
        'type'  => 'Calibration',
        'color' => 'blue',
        'title' => "Hasil: {$log->result}",
        'desc'  => $log->certificate_number ? "No. Sertifikat: {$log->certificate_number}" : null,
        'by'    => $log->technician,
    ]))
    ->sortByDesc('date')
    ->values();

return view('equipment.show',
    compact(
    'equipment',
    'totalHours',
    'totalSamples',
    'totalSessions',
    'averageHours',
    'lastOperation',
    'totalDowntimeHours',
    'availabilityRate',
    'timeline'
    )
     );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipment $equipment)
    {
       return view('equipment.edit',compact('equipment')
     );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equipment $equipment)
    {
        $equipment->update($request->all());

        return redirect('/equipment');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipment $equipment)
    {
         $equipment->delete();

        return redirect('/equipment');
    }
}
