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
        Schema::create('maternal_users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('middlename');
            $table->string('surname');
            $table->date('birthdate');
            $table->string('sex')->nullable();
            $table->string('region');
            $table->string('home_address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('username')->nullable();
            $table->string('email')->nullable();
            $table->string('role')->nullable();
            $table->string('password')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maternal_users');
    }
};
