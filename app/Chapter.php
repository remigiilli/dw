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
        return $this->belongsToMany('App\Skill', 'chapter_skill_advances', 'chapter_id', 'trait_id')->withPivot(['cost', 'rank', 'proficeincy']);
    }    

    public function TraitAdvances()
    {
        return $this->belongsToMany('App\Skill', 'chapter_trait_advances', 'chapter_id', 'trait_id')->withPivot(['cost', 'rank']);
    }     
}
