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
        Schema::table('calibration_logs', function (Blueprint $table) {
            $table->string('technician')->nullable()->after('result');
            $table->string('vendor')->nullable()->after('technician');
            $table->decimal('duration_hours', 8, 2)->nullable()->after('vendor');
            $table->date('next_due_date')->nullable()->after('duration_hours');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('calibration_logs', function (Blueprint $table) {
            $table->dropColumn(['technician', 'vendor', 'duration_hours', 'next_due_date']);
        });
    }
};
