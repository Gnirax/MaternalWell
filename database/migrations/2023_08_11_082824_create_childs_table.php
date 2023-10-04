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
        Schema::create('childs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mothers_id');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('surname');
            $table->date('birthdate');
            $table->string('sex');
            $table->string('nationality');
            $table->string('region');
            $table->string('home_address');
            $table->string('fathers_name')->nullable();
            $table->string('fathers_email')->nullable();
            $table->string('fathers_phone_number')->nullable();
            $table->string('fathers_nationality')->nullable();
            $table->string('fathers_region')->nullable();
            $table->string('fathers_home_address')->nullable();
            $table->string('emergency_contact_name');
            $table->string('relationship_with_patient');
            $table->string('emergency_contact_number');
            $table->string('emergency_contact_home_address');
            $table->text('allergies')->nullable();
            $table->text('chronic_medical_condition')->nullable();
            $table->text('current_medication')->nullable();
            $table->text('previous_surgeries')->nullable();
            $table->text('family_history_of_medical_conditions')->nullable();
            $table->string('insurance_provider')->nullable();
            $table->string('member_number')->nullable();
            $table->string('group_number')->nullable();
            $table->string('insurance_phone_number')->nullable();
            $table->string('preferred_language');
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
        Schema::dropIfExists('childs');
    }
};
