<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Equipment;

class OperatingLog extends Model
{
      protected $fillable = [
        'equipment_id',
        'operating_date',
        'start_time',
        'end_time',
        'operating_hours',
        'sample_count',
        'pic',
        'remarks'
    ];

     public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }

}
