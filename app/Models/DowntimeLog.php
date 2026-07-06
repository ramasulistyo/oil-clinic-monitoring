<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Equipment;

class DowntimeLog extends Model
{
    protected $fillable = [

        'equipment_id',

        'down_date',

        'start_time',

        'end_time',

        'downtime_hours',

        'failure_type',

        'cause',

        'action_taken',

        'technician',

        'remarks'

    ];

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }
}