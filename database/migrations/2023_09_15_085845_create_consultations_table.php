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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('treatments_id')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('nurses_id')->nullable();
            $table->unsignedBigInteger('doctors_id');
            $table->unsignedBigInteger('mothers_id')->nullable();
            $table->unsignedBigInteger('childs_id')->nullable();
            $table->date('date');
            $table->string('pressure')->nullable();
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->string('BMI')->nullable();
            $table->string('ticket_number');
            $table->time('starting_time')->nullable();
            $table->time('ending_time')->nullable();
            $table->timestamps();

            $table->foreign('treatments_id')
            ->references('id')
            ->on('treatments')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('nurses_id')
            ->references('id')
            ->on('nurses')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('doctors_id')
            ->references('id')
            ->on('doctors')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('mothers_id')
            ->references('id')
            ->on('mothers')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('childs_id')
            ->references('id')
            ->on('childs')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
