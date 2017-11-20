<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkillGroup extends Model
{
    public function skills()
    {
        return $this->hasMany('App\Skill', 'group_id');
    }    
}
