<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{ 
    public function soloModeAbilities()
    {
        return $this->hasMany('App\SoloModeAbility');
    }
    
    public function SquadModeAbilities()
    {
        return $this->hasMany('App\SquadModeAbility');
    }     
    
    public function skillAdvances()
    {
        return $this->belongsToMany('App\Skill', 'chapter_skill_advance', 'chapter_id', 'skill_id')->withPivot(['cost', 'proficeincy']);
    }    

    public function talentAdvances()
    {
        return $this->belongsToMany('App\Skill', 'chapter_talent_advance', 'chapter_id', 'talent_id')->withPivot(['cost']);
    }     
}
