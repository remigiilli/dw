<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TalentOption extends Model
{
    protected $hidden = ['created_at', 'updated_at', 'pivot'];
    
    public function talents()
    {
        return $this->belongsToMany('App\Talent');
    }
}
