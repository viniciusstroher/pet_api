<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalConsultation extends Model
{
    //
    protected $fillable = ['pet_id','description'];
}
