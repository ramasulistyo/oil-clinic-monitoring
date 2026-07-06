<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MaintenanceLog;
use App\Models\CalibrationLog;
use App\Models\OperatingLog;
use App\Models\DowntimeLog;


class Equipment extends Model
{
    public function maintenanceLogs()
    {
        return $this->hasMany(MaintenanceLog::class);
    }

    public function calibrationLogs()
    {
        return $this->hasMany(CalibrationLog::class);
    }

    public function operatingLogs()
    {
        return $this->hasMany(OperatingLog::class);
    }

    public function downtimeLogs()
    {
        return $this->hasMany(DowntimeLog::class);
    }

    protected $fillable = [
    
    'equipment_code',

    'equipment_name',

    'manufacturer',

    'brand',

    'model',

    'serial_number',

    'category',

    'location',

    'status',

    'status_date',

    'pic',

    'maintenance_due_date',

    'calibration_due_date',

    'notes'

];

}
