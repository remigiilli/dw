<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use App\SpecialQuality as SpecialQuality;

class StoreSpecialQuality extends Request
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
	$special_quality = SpecialQuality::find($this->specialqualities);
	
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
		    'name' => 'required|max:255|unique:special_qualities,name',
		    'description' => 'required',
		];
	    }
	    case 'PUT':
	    case 'PATCH':
	    {
		return [
		    'name' => 'required|max:255|unique:special_qualities,name,'.$special_quality->id,
		    'description' => 'required',
		];
	    }
	    default:break;
	}      
    }
}
