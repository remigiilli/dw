<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talent extends Model
{
    public function options()
    {
        return $this->belongsToMany('App\TalentOption');
    }
}
