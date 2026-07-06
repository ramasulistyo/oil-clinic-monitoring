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
                Schema::create('equipment', function (Blueprint $table) {
            $table->id();

            $table->string('equipment_code')->unique();
            $table->string('equipment_name');

            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('serial_number')->nullable();

            $table->string('location')->nullable();

            $table->enum('status', [
                'Ready',
                'In Use',
                'Maintenance',
                'Calibration',
                'Down'
            ])->default('Ready');

            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment');
    }
};
