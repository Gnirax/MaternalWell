<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatments extends Model
{
    use HasFactory;

    protected $fillable = [
        'consultations_id',
        'nurses_id',
        'doctors_id',
        'mothers_id',
        'childs_id',
        'observations',
        'hypothesis',
        'diagnostic_tests',
        'diagnostics_results',
        'diagnosis',
        'medications',
        'treatment_plan'
    ];

    public function consultations(){
        return $this->belongsTo(Consultations::class);
    }
}
