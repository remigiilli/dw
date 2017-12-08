<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialAbility extends Model
{
    protected $table = 'special_abilities';
    
    public function speciality()
    {
        return $this->belongsTo('App\Speciality');
    }
}
