<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    //
    protected $fillable = ['name','race'];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d'
    ];

    function attendances() {
        return $this->hasMany('App\MedicalConsultantion', 'id', 'pet_id');
    }


   
}
