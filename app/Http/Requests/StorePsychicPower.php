<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use App\PsychicPower as PsychicPower;

class StorePsychicPower extends Request
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
	$psychic_power = PsychicPower::find($this->psychicpowers);
	
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
		    'name' => 'required|max:255|unique:psychic_powers,name',
                    'range' => 'numeric',
                    'range_type' => 'integer',
		    'opposed' => 'boolean',
                    'sustained' => 'boolean',
		    'action' => 'numeric',
		    'description' => 'required',                    
		];
	    }
	    case 'PUT':
	    case 'PATCH':
	    {
		return [
		    'name' => 'required|max:255|unique:weapons,name,'.$psychic_power->id,
                    'range' => 'numeric',
                    'range_type' => 'integer',
		    'opposed' => 'boolean',
                    'sustained' => 'boolean',
		    'action' => 'numeric',
		    'description' => 'required',                    
		];
	    }
	    default:break;
	}      
    }
}
