<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    use HasFactory;

    protected $fillable=[
        'users_id'
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
