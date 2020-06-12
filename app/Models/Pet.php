<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App;

class Pet extends Model
{
	use SoftDeletes;
    protected $fillable = ['name','race'];
    // protected $casts = ['created_at' => 'datetime:Y-m-d','updated_at' => 'datetime:Y-m-d'];

    function attendances() {
        return $this->hasMany(MedicalConsultation::class, 'pet_id', 'id');
    }

}
