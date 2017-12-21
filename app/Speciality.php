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
        return $this->belongsToMany('App\Skill', 'speciality_skill_advance', 'speciality_id', 'skill_id')->withPivot(['cost', 'rank', 'proficeincy']);
    }    

    public function talentAdvances()
    {
        return $this->belongsToMany('App\Skill', 'speciality_talent_advance', 'speciality_id', 'talent_id')->withPivot(['cost', 'rank']);
    }        
}
