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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('price');  
            $table->timestamps(); 

            $table->bigInteger('medicine_id')->unsigned();

            $table->foreign('medicine_id')->references('id')->on('medicines');

            $table->bigInteger('pharmacy_id')->unsigned();

            $table->foreign('pharmacy_id')->references('id')->on('pharmacies');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
