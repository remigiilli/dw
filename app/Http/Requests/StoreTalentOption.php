<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use App\TalentOption as TalentOption;

class StoreTalentOption extends Request
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
	$talent_option = TalentOption::find($this->talentoptions);
	
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
		    'name' => 'required|max:255|unique:talent_options,name',
		];
	    }
	    case 'PUT':
	    case 'PATCH':
	    {
		return [
		    'name' => 'required|max:255|unique:talent_options,name,'.$talent_option->id,
		];
	    }
	    default:break;
	}      
    }
}
