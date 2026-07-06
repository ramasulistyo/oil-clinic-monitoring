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
            MaintenanceLog::create([

            'equipment_id'      => $request->equipment_id,

            'maintenance_date'  => $request->maintenance_date,

            'maintenance_type'  => $request->maintenance_type,

            'technician'        => $request->technician,

            'vendor'            => $request->vendor,

            'cost'              => $request->cost,

            'parts_replaced'    => $request->parts_replaced,

            'action_taken'      => $request->action_taken,

            'next_maintenance'  => $request->next_maintenance,

            'remarks'           => $request->remarks,

        ]);

        return redirect('/maintenance-log');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
