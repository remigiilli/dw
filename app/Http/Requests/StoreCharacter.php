<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use App\Character as Character;

class StoreCharacter extends Request
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
	$character = Character::find($this->characters);
	
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
		    'name' => 'required|max:255|unique:characters,name',    
		    'ws' => 'required|integer',
		    'bs' => 'required|integer',    
		    's' => 'required|integer',
		    't' => 'required|integer',
		    'ag' => 'required|integer',
		    'int' => 'required|integer',
		    'per' => 'required|integer',
		    'wp' => 'required|integer',
		    'fel' => 'required|integer',
		    'wounds' => 'required|integer',
		    'psy' => 'required|integer',
		    'renown' => 'required|integer',
		];
	    }
	    case 'PUT':
	    case 'PATCH':
	    {
		return [
		    'name' => 'required|max:255|unique:characters,name,'.$character->id,
		    'ws' => 'required|integer',
		    'bs' => 'required|integer',    
		    's' => 'required|integer',
		    't' => 'required|integer',
		    'ag' => 'required|integer',
		    'int' => 'required|integer',
		    'per' => 'required|integer',
		    'wp' => 'required|integer',
		    'fel' => 'required|integer',
		    'wounds' => 'required|integer',
		    'psy' => 'required|integer',
		    'renown' => 'required|integer',
		];
	    }
	    default:break;
	}      
    }
}
