<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weapon extends Model
{

    public function specialQualities()
    {
        return $this->belongsToMany('App\SpecialQuality', 'weapon_special_quality')->withPivot('extra');
    }

    public function category()
    {    
        return $this->belongsTo('App\WeaponCategory', 'weapon_category_id');
    }
    
    public function chapter()
    {
        return $this->belongsTo('App\Chapter');
    }      
}
