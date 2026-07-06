<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaintenanceLog extends Model
{
    protected $fillable = [

        'equipment_id',

        'maintenance_date',

        'maintenance_type',

        'technician',

        'vendor',

        'cost',

        'parts_replaced',

        'action_taken',

        'next_maintenance',

        'remarks'
    ];

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }
}