<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    protected $table = 'specialities';
  
    public function specialAbilities()
    {
        return $this->hasMany('App\SpecialAbility');
    }
    
    public function skills()
    {
        return $this->belongsToMany('App\Skill', 'speciality_skill', 'speciality_id', 'skill_id');
    }
    
    public function weapons()
    {
        return $this->belongsToMany('App\Weapon');
    }    
    
    public function wargear()
    {
        return $this->belongsToMany('App\Wargear');
    }
    
    public function skillAdvances()
    {
        return $this->belongsToMany('App\Skill', 'speciality_skill_advances', 'speciality_id', 'trait_id')->withPivot(['cost', 'rank', 'proficeincy']);
    }    

    public function TraitAdvances()
    {
        return $this->belongsToMany('App\Skill', 'speciality_trait_advances', 'speciality_id', 'trait_id')->withPivot(['cost', 'rank']);
    }        
}
