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
        return $this->belongsToMany('App\CharacterTrait', 'character_trait', 'character_id', 'trait_id')->withPivot('extra');
    }

    public function talents()
    {
        return $this->belongsToMany('App\Talent', 'character_talent')->withPivot('talent_option_id')->leftJoin('talent_options', 'talent_options.id', '=', 'character_talent.talent_option_id');        
    }

    public function weapons()
    {
        return $this->belongsToMany('App\Weapon');
    }    
    
    public function psychicPowers()
    {
        return $this->belongsToMany('App\PsychicPower');
    }       
    
    public function wargear()
    {
        return $this->belongsToMany('App\Wargear')->withPivot('amount');
    }    
}
