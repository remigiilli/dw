<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use App\SoloModeAbility as SoloModeAbility;

class StoreSoloModeAbility extends Request
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
	$solo_mode_ability = SoloModeAbility::find($this->solomodeabilities);
	
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
		    'name' => 'required|max:255|unique:solo_mode_abilities,name',	
		    'action' => 'numeric',
		    'rank' => 'integer',                    
		    'effect' => 'required',
                    'improvement' => 'required',                    
		];
	    }
	    case 'PUT':
	    case 'PATCH':
	    {
		return [
		    'name' => 'required|max:255|unique:solo_mode_abilities,name,'.$solo_mode_ability->id,
		    'action' => 'numeric',
		    'rank' => 'integer',                    
		    'effect' => 'required',
                    'improvement' => 'required',  
		];
	    }
	    default:break;
	}      
    }
}
