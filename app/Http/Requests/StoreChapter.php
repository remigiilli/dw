<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use App\Chapter as Chapter;

class StoreChapter extends Request
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
	$chapter = Chapter::find($this->chapters);
	
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
		    'name' => 'required|max:255|unique:chapters,name',	
		    'creation' => 'required',
                    'demeanour_title' => 'required',
                    'demeanour_description' => 'required',
                    'curse_title' => 'required',
                    'curse_description' => 'required',
		];
	    }
	    case 'PUT':
	    case 'PATCH':
	    {
		return [
		    'name' => 'required|max:255|unique:chapters,name,'.$chapter->id,
		    'creation' => 'required',
                    'demeanour_title' => 'required',
                    'demeanour_description' => 'required',
                    'curse_title' => 'required',
                    'curse_description' => 'required',
		];
	    }
	    default:break;
	}      
    }
}
