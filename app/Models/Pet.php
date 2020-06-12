<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;

class Pet extends Model
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
    
    protected $fillable = ['name','race'];
    // protected $casts = ['created_at' => 'datetime:Y-m-d','updated_at' => 'datetime:Y-m-d'];

    function attendances() {
        return $this->hasMany(MedicalConsultation::class, 'pet_id', 'id');
    }

    //soft cascade delete usando os eventos do laravel
    public static function boot()
    {
	    Pet::deleted(function($pet) {
		    $pet->attendances()->delete();
		});
	}
}
