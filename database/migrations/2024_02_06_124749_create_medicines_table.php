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
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();  
            $table->string('name');
            $table->text('description');
            $table->string('qr_code')->nullable()->unique();
            $table->integer('price');
            $table->integer('N_of_pieces');
            $table->string('type');
            $table->string('company_name');  
            $table->integer('buy')->default(0); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicine');
    }
};
