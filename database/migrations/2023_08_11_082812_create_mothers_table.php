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
        Schema::create('mothers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('surname');
            $table->date('birthdate');
            $table->string('sex');
            $table->string('region');
            $table->string('address');
            $table->string('email');
            $table->string('phone_number');
            $table->string('emergency_contact_name');
            $table->string('relationship_with_patient');
            $table->string('emergency_contact_number');
            $table->date('estimated_due_date');
            $table->date('last_menstrual_period');
            $table->integer('number_of_previous_pregnancies');
            $table->integer('number_of_previous_live_births');
            $table->integer('number_of_previous_miscarriages');
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

            $table->foreign('users_id')
            ->references('id')
            ->on('maternal_users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mothers');
    }
};
