<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Childs extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'middlename',
        'surname',
        'birthdate',
        'sex',
        'mothers_id',
        'region',
        'address',
        'email',
        'phone_number',
        'emergency_contact_name',
        'relationship_with_patient',
        'emergency_contact_number',
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

    public function mothers(){
        return $this->belongsTo(Mothers::class);
    }
}
