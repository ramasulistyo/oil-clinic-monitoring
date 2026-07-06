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
        Schema::create('operating_logs', function (Blueprint $table) {
            $table->id();

        // Relasi ke equipment
        $table->foreignId('equipment_id')
              ->constrained('equipment')
              ->onDelete('cascade');

        // Tanggal penggunaan alat
        $table->date('operating_date');

        // Jam mulai
        $table->time('start_time');

        // Jam selesai
        $table->time('end_time');

        // Lama penggunaan (jam)
        $table->decimal('operating_hours', 5, 2);

        // Jumlah sampel
        $table->integer('sample_count')->default(0);

        // Operator/PIC
        $table->string('pic');

        // Catatan
        $table->text('remarks')->nullable();

        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operating_logs');
    }
};
