<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use App\PsychicPowerCategory as PsychicPowerCategory;

class StorePsychicPowerCategory extends Request
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
	$psychic_power_category = PsychicPowerCategory::find($this->psychicpowercategories);
	
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
		    'name' => 'required|max:255|unique:psychic_power_categories,name',
		];
	    }
	    case 'PUT':
	    case 'PATCH':
	    {
		return [
		    'name' => 'required|max:255|unique:psychic_power_categories,name,'.$psychic_power_category->id,
		];
	    }
	    default:break;
	}      
    }
}
