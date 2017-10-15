<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use App\Talent as Talent;

class StoreTalent extends Request
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
	$talent = Talent::find($this->talents);
	
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
		    'name' => 'required|max:255|unique:talents,name',
		    'description' => 'required',
		];
	    }
	    case 'PUT':
	    case 'PATCH':
	    {
		return [
		    'name' => 'required|max:255|unique:talents,name,'.$talent->id,
		    'description' => 'required',
		];
	    }
	    default:break;
	}      
    }
}
