<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{ 
    public function soloModeAbilities()
    {
        return $this->hasMany('App\SoloModeAbility');
    }
    
    public function squadModeAbilities()
    {
        return $this->hasMany('App\SquadModeAbility');
    }     
    
    public function skillAdvances()
    {
        return $this->belongsToMany('App\Skill', 'chapter_skill_advance', 'chapter_id', 'skill_id')->withPivot(['cost', 'proficeincy']);
    }    

    public function talentAdvances()
    {
        return $this->belongsToMany('App\Talent', 'chapter_talent_advance', 'chapter_id', 'talent_id')->withPivot(['cost', 'talent_option_id'])->leftJoin('talent_options', 'talent_options.id', '=', 'chapter_talent_advance.talent_option_id')->select('talents.*', 'talent_options.name as pivot_talent_option_name');
    }     
    
    public function psychicPowers()
    {
        return $this->hasMany('App\PsychicPower');
    }    
    
    public function weapons()
    {
        return $this->hasMany('App\Weapon');
    }    

    public function wargear()
    {
        return $this->hasMany('App\Wargear');
    }    
    
}
