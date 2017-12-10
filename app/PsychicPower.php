<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PsychicPower extends Model
{
    public function category()
    {    
        return $this->belongsTo('App\PsychicPowerCategory', 'psychic_power_category_id');
    }    
    
    public function chapter()
    {
        return $this->belongsTo('App\Chapter');
    }      
}
