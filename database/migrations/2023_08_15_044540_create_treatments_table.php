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
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nurses_id')->nullable();
            $table->unsignedBigInteger('doctors_id');
            $table->unsignedBigInteger('mothers_id')->nullable();
            $table->unsignedBigInteger('childs_id')->nullable();
            $table->text('observations');
            $table->text('hypothesis');
            $table->text('diagnostic_tests');
            $table->string('diagnostics_results');
            $table->text('diagnosis');
            $table->text('medications');
            $table->text('treatment_plan');
            $table->timestamps();

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
        Schema::dropIfExists('treatments');
    }
};
