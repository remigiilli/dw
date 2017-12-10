<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wargear extends Model
{
    protected $table = 'wargear';
    
    public function category()
    {    
        return $this->belongsTo('App\WargearCategory', 'wargear_category_id');
    }   
    
    public function chapter()
    {
        return $this->belongsTo('App\Chapter');
    }      
}
