<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use App\Speciality as Speciality;

class StoreSpeciality extends Request
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
	$speciality = Speciality::find($this->specialities);
	
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
		    'name' => 'required|max:255|unique:specialities,name',	
		];
	    }
	    case 'PUT':
	    case 'PATCH':
	    {
		return [
		    'name' => 'required|max:255|unique:specialities,name,'.$speciality->id,
		];
	    }
	    default:break;
	}      
    }
}
