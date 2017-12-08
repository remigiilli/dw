<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoloModeAbility extends Model
{
    protected $table = 'solo_mode_abilities';
    
    public function chapter()
    {
        return $this->belongsTo('App\Chapter');
    }        
}
