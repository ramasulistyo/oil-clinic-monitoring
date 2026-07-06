<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('equipment', function (Blueprint $table) {
            $table->string('pic')->nullable();

            $table->date('maintenance_due_date')->nullable();

            $table->date('calibration_due_date')->nullable();

            $table->date('last_maintenance_date')->nullable();

            $table->date('last_calibration_date')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('equipment', function (Blueprint $table) {
            
            $table->dropColumn([
                'pic',
                'maintenance_due_date',
                'calibration_due_date',
                'last_maintenance_date',
                'last_calibration_date'
            ]);
            
        });
    }
};
