<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OperatingLog;
use App\Models\Equipment;
use Carbon\Carbon;

class OperatingLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $logs = OperatingLog::with('equipment')->latest()->get();

        return view('operating-log.index', compact('logs')
    );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $equipment = Equipment::orderBy('equipment_name')->get();

    return view('operating-log.create', compact('equipment')
    );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'equipment_id'   => 'required|exists:equipment,id',
        'operating_date' => 'required|date',
        'start_time'     => 'required',
        'end_time'       => 'required|after:start_time',
        'sample_count'   => 'nullable|integer|min:0',
        'pic'            => 'required|string',
    ]);

    $start = Carbon::parse($request->start_time);
    $end = Carbon::parse($request->end_time);

    $minutes = $start->diffInMinutes($end);
    $hours = round($minutes / 60, 2);

    OperatingLog::create([

        'equipment_id' => $request->equipment_id,

        'operating_date' => $request->operating_date,

        'start_time' => $request->start_time,

        'end_time' => $request->end_time,

        'operating_hours' => $hours,

        'sample_count' => $request->sample_count ?? 0,

        'pic' => $request->pic,

        'remarks' => $request->remarks

    ]);

        return redirect('/operational')->with('success', 'Data operasional tersimpan.');
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
    public function edit(OperatingLog $operatingLog)
    {
        $equipment = Equipment::orderBy('equipment_name')->get();

        return view(
            'operating-log.edit',
            compact(
                'operatingLog',
                'equipment'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OperatingLog $operatingLog)
    {
            $request->validate([
            'equipment_id' => 'required',
            'operating_date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'sample_count' => 'required|integer|min:0',
            'pic' => 'required'
        ]);

        $start = Carbon::parse($request->start_time);
        $end = Carbon::parse($request->end_time);

        $minutes = $start->diffInMinutes($end);
        $hours = round($minutes / 60, 2);

        $operatingLog->update([

            'equipment_id' => $request->equipment_id,

            'operating_date' => $request->operating_date,

            'start_time' => $request->start_time,

            'end_time' => $request->end_time,

            'operating_hours' => $hours,

            'sample_count' => $request->sample_count,

            'pic' => $request->pic,

            'remarks' => $request->remarks

        ]);

        return redirect('/operating-log');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OperatingLog $operatingLog)
    {
         $operatingLog->delete();

        return redirect('/operating-log');
    }
}
