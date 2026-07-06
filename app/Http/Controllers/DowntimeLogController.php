<?php

namespace App\Http\Controllers;

use App\Models\DowntimeLog;
use App\Models\Equipment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DowntimeLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logs = DowntimeLog::with('equipment')
                ->latest()
                ->get();

        return view(
            'downtime-log.index',
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
            'downtime-log.create',
            compact('equipment')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $start = Carbon::parse($request->start_time);
        $end   = Carbon::parse($request->end_time);

        $hours = round(
        $start->diffInMinutes($end) / 60,2);

        DowntimeLog::create([

            'equipment_id'   => $request->equipment_id,

            'down_date'      => $request->down_date,

            'start_time'     => $request->start_time,

            'end_time'       => $request->end_time,

            'downtime_hours' => $hours,

            'failure_type'   => $request->failure_type,

            'cause'          => $request->cause,

            'action_taken'   => $request->action_taken,

            'technician'     => $request->technician,

            'remarks'        => $request->remarks,

        ]);

        return redirect('/downtime-log');
    }

    /**
     * Display the specified resource.
     */
    public function show(DowntimeLog $downtimeLog)
    {
        $downtimeLog->load('equipment');

        return view(
            'downtime-log.show',
            compact('downtimeLog')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DowntimeLog $downtimeLog)
    {
         $equipment = Equipment::orderBy('equipment_name')->get();

        return view(
            'downtime-log.edit',
            compact(
                'downtimeLog',
                'equipment'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DowntimeLog $downtimeLog)
    {
         $start = Carbon::parse($request->start_time);
    $end = Carbon::parse($request->end_time);

    $hours = round($start->diffInMinutes($end) / 60, 2);

    $downtimeLog->update([
        'equipment_id'  => $request->equipment_id,
        'down_date'     => $request->down_date,
        'start_time'    => $request->start_time,
        'end_time'      => $request->end_time,
        'downtime_hours'=> $hours,
        'failure_type'  => $request->failure_type,
        'cause'         => $request->cause,
        'action_taken'  => $request->action_taken,
        'technician'    => $request->technician,
        'remarks'       => $request->remarks,
    ]);

    return redirect('/downtime-log');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DowntimeLog $downtimeLog)
    {
        $downtimeLog->delete();

        return redirect('/downtime-log');
    }
}
