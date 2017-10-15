<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use App\Skill as Skill;

class StoreSkill extends Request
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
	$skill = Skill::find($this->skills);
	
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
		    'name' => 'required|max:255|unique_with:skills,name,group_id',
		    'attribute' => 'required|in:ws,bs,s,t,ag,per,int,wp,fel',
		];
	    }
	    case 'PUT':
	    case 'PATCH':
	    {
		return [
		    'name' => 'required|max:255|unique_with:skills,name,group_id,'.$skill->id.'',
		    'attribute' => 'required|in:ws,bs,s,t,ag,per,int,wp,fel',
		];
	    }
	    default:break;
	}
    }
}
