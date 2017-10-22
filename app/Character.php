<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    public function skills()
    {
        return $this->belongsToMany('App\Skill')->withPivot('proficeincy');
    }
    
    public function traits()
    {
        return $this->belongsToMany('App\CharacterTraits')->withPivot('extra');
    }

    public function talents()
    {
        return $this->belongsToMany('App\Talent', 'App\TalentOption');
    }

    public function weapons()
    {
        return $this->belongsToMany('App\Weapons');
    }    
    
    public function psychicPowers()
    {
        return $this->belongsToMany('App\PsychicPowers');
    }       
    
    public function wargear()
    {
        return $this->belongsToMany('App\Wargear')->withPivot('amount');
    }       
}
