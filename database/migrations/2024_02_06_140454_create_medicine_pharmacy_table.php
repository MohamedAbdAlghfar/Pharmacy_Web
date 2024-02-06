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
        Schema::create('medicine_pharmacy', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medicine_id');
            $table->foreignId('pharmacy_id');
            $table->timestamps();





        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicine_pharmacy');
    }
};
