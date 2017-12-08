<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use App\SquadModeAbility as SquadModeAbility;

class StoreSquadModeAbility extends Request
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
	$squad_mode_ability = SquadModeAbility::find($this->squadmodeabilities);
	
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
		    'name' => 'required|max:255|unique:squad_mode_abilities,name',	
		    'action' => 'numeric',
		    'cost' => 'integer',                    
                    'sustained' => 'boolean',
		    'effect' => 'required',
                    'improvement' => 'required',                    
		];
	    }
	    case 'PUT':
	    case 'PATCH':
	    {
		return [
		    'name' => 'required|max:255|unique:squad_mode_abilities,name,'.$squad_mode_ability->id,
		    'action' => 'numeric',
		    'cost' => 'integer',                   
                    'sustained' => 'boolean',
		    'effect' => 'required',
                    'improvement' => 'required',  
		];
	    }
	    default:break;
	}      
    }
}
