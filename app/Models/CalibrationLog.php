<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalibrationLog extends Model
{
    protected $fillable = [
        'equipment_id',

        'calibration_date',

        'certificate_number',

        'result',

        'technician',

        'vendor',

        'duration_hours',

        'next_due_date',

        'notes'
    ];

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }
}
