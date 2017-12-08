<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SquadModeAbility extends Model
{
    protected $table = 'squad_mode_abilities';
    
    public function chapter()
    {
        return $this->belongsTo('App\Chapter');
    }    
}
