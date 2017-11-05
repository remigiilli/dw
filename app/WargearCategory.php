<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WargearCategory extends Model
{
    protected $table = 'wargear_categories';
    
    public function wargear()
    {
        return $this->hasMany('App\Wargear');
    }    
}
