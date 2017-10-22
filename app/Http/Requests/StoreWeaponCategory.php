<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use App\WeaponCategory as WeaponCategory;

class StoreWeaponCategory extends Request
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
	$weapon_categories = WeaponCategory::find($this->weaponcategories);
	
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
		    'name' => 'required|max:255|unique:weapon_categories,name',
		];
	    }
	    case 'PUT':
	    case 'PATCH':
	    {
		return [
		    'name' => 'required|max:255|unique:weapon_categories,name,'.$weapon_categories->id,
		];
	    }
	    default:break;
	}      
    }
}
