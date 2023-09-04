<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultations extends Model
{
    use HasFactory;

    protected $fillable=[
        'nurses_id',
        'doctors_id',
        'mothers_id',
        'childs_id',
        'date',
        'starting_time',
        'ending_time'
    ];

    public function mothers(){
        return $this->belongsTo(Mothers::class);
    }

    public function nurses(){
        return $this->belongsTo(Nurses::class);
    }

    public function doctors(){
        return $this->belongsTo(Doctors::class);
    }

    public function treatments(){
        return $this->hasOne(Treatments::class);
    }
}
