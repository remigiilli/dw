<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use App\CharacterTrait as CharacterTrait;

class StoreCharacterTrait extends Request
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
	$trait = CharacterTrait::find($this->traits);
	
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
		    'name' => 'required|max:255|unique:traits,name',
		    'description' => 'required',
		];
	    }
	    case 'PUT':
	    case 'PATCH':
	    {
		return [
		    'name' => 'required|max:255|unique:traits,name,'.$trait->id,
		    'description' => 'required',
		];
	    }
	    default:break;
	}
    }
}
