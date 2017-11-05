<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use App\WargearCategory as WargearCategory;

class StoreWargearCategory extends Request
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
	$wargear_categories = WargearCategory::find($this->wargearcategories);
	
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
		    'name' => 'required|max:255|unique:wargear_categories,name',
		];
	    }
	    case 'PUT':
	    case 'PATCH':
	    {
		return [
		    'name' => 'required|max:255|unique:wargear_categories,name,'.$wargear_categories->id,
		];
	    }
	    default:break;
	}      
    }
}
