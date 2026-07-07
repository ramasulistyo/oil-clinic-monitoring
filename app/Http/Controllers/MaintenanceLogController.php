<?php

namespace App\Http\Controllers;


use App\Models\MaintenanceLog;
use App\Models\Equipment;
use Illuminate\Http\Request;

class MaintenanceLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $logs = MaintenanceLog::with('equipment')
                ->latest()
                ->get();

        return view(
            'maintenance-log.index',
            compact('logs')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $equipment = Equipment::orderBy('equipment_name')
                    ->get();

        return view(
            'maintenance-log.create',
            compact('equipment')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
             $request->validate([
        'equipment_id'     => 'required|exists:equipment,id',
        'maintenance_date' => 'required|date',
        'maintenance_type' => 'required|string',
        'technician'       => 'required|string',
        'cost'             => 'nullable|numeric|min:0',
        'next_maintenance' => 'nullable|date|after_or_equal:maintenance_date',
        'action_taken'     => 'required|string',
    ]);

    MaintenanceLog::create([

        'equipment_id'      => $request->equipment_id,

        'maintenance_date'  => $request->maintenance_date,

        'maintenance_type'  => $request->maintenance_type,

        'technician'        => $request->technician,

        'vendor'            => $request->vendor,

        'cost'              => $request->cost ?? 0,

        'parts_replaced'    => $request->parts_replaced,

        'action_taken'      => $request->action_taken,

        'next_maintenance'  => $request->next_maintenance,

        'remarks'           => $request->remarks,

    ]);

    return redirect('/maintenance-log')->with('success', 'Data maintenance tersimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MaintenanceLog $maintenanceLog)
    {
         $maintenanceLog->load('equipment');

        return view(
            'maintenance-log.show',
            compact('maintenanceLog')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MaintenanceLog $maintenanceLog)
    {
        $equipment = Equipment::orderBy('equipment_name')->get();

        return view(
            'maintenance-log.edit',
            compact(
                'maintenanceLog',
                'equipment'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MaintenanceLog $maintenanceLog)
    {
        $request->validate([
        'equipment_id'     => 'required|exists:equipment,id',
        'maintenance_date' => 'required|date',
        'maintenance_type' => 'required|string',
        'technician'       => 'required|string',
        'cost'             => 'nullable|numeric|min:0',
        'next_maintenance' => 'nullable|date|after_or_equal:maintenance_date',
        'action_taken'     => 'required|string',
    ]);

    $maintenanceLog->update([

        'equipment_id'      => $request->equipment_id,

        'maintenance_date'  => $request->maintenance_date,

        'maintenance_type'  => $request->maintenance_type,

        'technician'        => $request->technician,

        'vendor'            => $request->vendor,

        'cost'              => $request->cost ?? 0,

        'parts_replaced'    => $request->parts_replaced,

        'action_taken'      => $request->action_taken,

        'next_maintenance'  => $request->next_maintenance,

        'remarks'           => $request->remarks,

    ]);

    return redirect('/maintenance-log')->with('success', 'Data maintenance diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MaintenanceLog $maintenanceLog)
    {
         $maintenanceLog->delete();

        return redirect('/maintenance-log');
    }
}
