<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use App\Weapon as Weapon;

class StoreWeapon extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
	return true;    
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
	$weapon = Weapon::find($this->weapons);
	
	switch($this->method())
	{
	    case 'GET':
	    case 'DELETE':
	    {
		return [];
	    }
	    case 'POST':
	    {
		return [
		    'name' => 'required|max:255|unique:weapons,name',
		    'type' => 'in:b,h,m,o,p,t',		
                    'range' => 'numeric',
                    'range_type' => 'integer',
		    'rof1' => 'boolean',
		    'rof2' => 'integer',
		    'rof3' => 'integer',		    
		    'dmg1' => 'required|integer',
		    'dmg2' => 'required|integer',
		    'dmg3' => 'required|integer',
		    'dmg4' => 'in:e,x,i,r',
		    'clip' => 'integer',
		    'rld' => 'numeric',
		    'pen' => 'required|integer',
		    'weight' => 'numeric',
		    'req' => 'integer',
		    'renown' => 'in:r,d,f,h',
		];
	    }
	    case 'PUT':
	    case 'PATCH':
	    {
		return [
		    'name' => 'required|max:255|unique:weapons,name,'.$weapon->id,
		    'type' => 'in:b,h,m,o,p,t',		
                    'range' => 'numeric',
                    'range_type' => 'integer',                    
		    'rof1' => 'boolean',
		    'rof2' => 'integer',
		    'rof3' => 'integer',		    
		    'dmg1' => 'required|integer',
		    'dmg2' => 'required|integer',
		    'dmg3' => 'required|integer',
		    'dmg4' => 'in:e,x,i,r',
		    'clip' => 'integer',
		    'rld' => 'numeric',
		    'pen' => 'required|integer',
		    'weight' => 'numeric',
		    'req' => 'integer',
		    'renown' => 'in:r,d,f,h',
		];
	    }
	    default:break;
	}      
    }
}
