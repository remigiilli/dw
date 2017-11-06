<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PsychicPowerCategory extends Model
{
    protected $table = 'psychic_power_categories';
    
    public function psychicPowers()
    {
        return $this->hasMany('App\PsychicPower');
    }    
}
