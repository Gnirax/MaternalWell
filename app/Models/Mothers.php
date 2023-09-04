<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mothers extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'firstname',
        'middlename',
        'surname',
        'birthdate',
        'sex',
        'region',
        'address',
        'email',
        'phone_number',
        'emergency_contact_name',
        'relationship_with_patient',
        'emergency_contact_number',
        'estimated_due_date',
        'last_menstrual_period',
        'number_of_previous_pregnancies',
        'number_of_previous_live_births',
        'number_of_previous_miscarriages',
        'allergies',
        'chronic_medical_condition',
        'current_medication',
        'previous_surgeries',
        'family_history_of_medical_conditions',
        'insurance_provider',
        'member_number',
        'group_number',
        'insurance_phone_number',
        'preferred_language'
    ];
    public function maternal_users(){
        return $this->belongsTo(Maternal_users::class);
    }

    public function treatments(){
        return $this->hasMany(Treatments::class);
    }

    public function consultations(){
        return $this->hasMany(Consultations::class);
    }
}
