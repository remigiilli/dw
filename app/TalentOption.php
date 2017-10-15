<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TalentOption extends Model
{
    public function talents()
    {
        return $this->belongsToMany('App\TalentOption');
    }
}
