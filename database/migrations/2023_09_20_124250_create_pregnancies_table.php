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
        Schema::create('pregnancies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mothers_id');
            $table->string('pregnancy_count');
            $table->date('estimated_due_date');
            $table->date('last_menstrual_period');
            $table->timestamps();

            $table->foreign('mothers_id')
            ->references('id')
            ->on('mothers')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pregnancies');
    }
};
