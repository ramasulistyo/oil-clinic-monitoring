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
        $request->validate([
        'equipment_id'        => 'required|exists:equipment,id',
        'calibration_date'    => 'required|date',
        'result'               => 'required|in:PASS,FAIL',
        'duration_hours'       => 'nullable|numeric|min:0',
        'next_due_date'        => 'nullable|date|after_or_equal:calibration_date',
    ]);

    CalibrationLog::create([

        'equipment_id' => $request->equipment_id,

        'calibration_date' => $request->calibration_date,

        'certificate_number' => $request->certificate_number,

        'result' => $request->result,

        'technician' => $request->technician,

        'vendor' => $request->vendor,

        'duration_hours' => $request->duration_hours,

        'next_due_date' => $request->next_due_date,

        'notes' => $request->notes,

        ]);

        return redirect('/calibration-log')->with('success', 'Data kalibrasi tersimpan.');
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
         $request->validate([
        'equipment_id'        => 'required|exists:equipment,id',
        'calibration_date'    => 'required|date',
        'result'               => 'required|in:PASS,FAIL',
        'duration_hours'       => 'nullable|numeric|min:0',
        'next_due_date'        => 'nullable|date|after_or_equal:calibration_date',
    ]);

    $calibrationLog->update([

        'equipment_id' => $request->equipment_id,

        'calibration_date' => $request->calibration_date,

        'certificate_number' => $request->certificate_number,

        'result' => $request->result,

        'technician' => $request->technician,

        'vendor' => $request->vendor,

        'duration_hours' => $request->duration_hours,

        'next_due_date' => $request->next_due_date,

        'notes' => $request->notes,

    ]);

    return redirect('/calibration-log')->with('success', 'Data kalibrasi diperbarui.');
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
