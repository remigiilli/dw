<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeaponCategory extends Model
{
    protected $table = 'weapon_categories';
    
    public function weapons()
    {
        return $this->hasMany('App\Weapons');
    }    
}
