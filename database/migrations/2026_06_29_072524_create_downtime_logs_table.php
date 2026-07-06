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
        Schema::create('downtime_logs', function (Blueprint $table) {
            $table->id();

        $table->foreignId('equipment_id')
              ->constrained('equipment')
              ->cascadeOnDelete();

        $table->date('down_date');

        $table->time('start_time');

        $table->time('end_time')->nullable();

        $table->decimal('downtime_hours',8,2)->default(0);

        $table->string('failure_type');

        $table->string('cause')->nullable();

        $table->string('action_taken')->nullable();

        $table->string('technician');

        $table->text('remarks')->nullable();

        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('downtime_logs');
    }
};
