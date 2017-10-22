<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use App\Wargear as Wargear;

class StoreWargear extends Request
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
	$wargear = Wargear::find($this->wargear);
	
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
		    'name' => 'required|max:255|unique:wargear,name',	
		    'weight' => 'numeric',
		    'req' => 'integer',
		    'renown' => 'in:r,d,f,h',
		];
	    }
	    case 'PUT':
	    case 'PATCH':
	    {
		return [
		    'name' => 'required|max:255|unique:wargear,name,'.$wargear->id,
		    'weight' => 'numeric',
		    'req' => 'integer',
		    'renown' => 'in:r,d,f,h',
		];
	    }
	    default:break;
	}      
    }
}
