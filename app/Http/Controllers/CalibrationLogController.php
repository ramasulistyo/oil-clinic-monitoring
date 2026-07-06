<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\CalibrationLog;
use App\Models\Equipment;


class CalibrationLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logs = CalibrationLog::with('equipment')
            ->latest()
            ->get();

        return view(
            'calibration-log.index',
            compact('logs')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $equipment = Equipment::orderBy('equipment_name')->get();

    return view(
        'calibration-log.create',
        compact('equipment')
    );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        CalibrationLog::create([

        'equipment_id' => $request->equipment_id,

        'calibration_date' => $request->calibration_date,

        'certificate_number' => $request->certificate_number,

        'result' => $request->result,

        'notes' => $request->notes,

        ]);

        return redirect('/calibration-log');
    }

    /**
     * Display the specified resource.
     */
    public function show(CalibrationLog $calibrationLog)
    {
        return view(
        'calibration-log.show',
        compact('calibrationLog')
    );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CalibrationLog $calibrationLog)
    {
        $equipment = Equipment::orderBy('equipment_name')->get();

        return view(
            'calibration-log.edit',
            compact(
                'calibrationLog',
                'equipment'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CalibrationLog $calibrationLog)
    {
         $calibrationLog->update([

        'equipment_id' => $request->equipment_id,

        'calibration_date' => $request->calibration_date,

        'certificate_number' => $request->certificate_number,

        'result' => $request->result,

        'notes' => $request->notes,

        ]);

        return redirect('/calibration-log');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CalibrationLog $calibrationLog)
    {
         $calibrationLog->delete();

          return redirect('/calibration-log');
    }
}
