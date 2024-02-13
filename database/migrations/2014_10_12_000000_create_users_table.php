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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');   
            $table->string('email')->unique(); 
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone');
            $table->integer('role')->default(0); // 0 for admin , 1 for owner
            $table->integer('gender'); // 0 for woman , 1 for man
            $table->float('salary')->default(5000);
            $table->integer('age');
            $table->integer('academic_degree'); // 0 for not have certificate , 1 for have certificate
            $table->string('address');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
