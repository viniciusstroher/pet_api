<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalConsultation extends Model
{
	use SoftDeletes;
    protected $fillable = ['pet_id','description','attendance_at'];
    // protected $casts = [ 'attendance_at'  => 'date:Y-m-d'];
	
    function pet() {
        return $this->hasOne(Pet::class, 'id', 'pet_id');
    }
}
