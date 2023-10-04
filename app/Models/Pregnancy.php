<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pregnancy extends Model
{
    use HasFactory;

    protected $fillable = ['mothers_id', 'pregnancy_count', 'estimated_due_date', 'last_menstrual_period'];
    
    public function mothers(){
       return $this->BelongsTo(Mothers::class);
    }
}
