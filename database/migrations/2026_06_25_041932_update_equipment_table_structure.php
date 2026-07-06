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

            $table->string('manufacturer')->nullable();

            $table->string('category')->nullable();

            $table->date('status_date')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('equipment', function (Blueprint $table) {
            
            $table->dropColumn([
                'manufacturer',
                'category',
                'status_date'
            ]);
        });
    }
};
