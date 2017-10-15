<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use App\SkillGroup as SkillGroup;

class StoreSkillGroup extends Request
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
	$skill_group = SkillGroup::find($this->skillgroups);
	
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
		    'name' => 'required|max:255|unique:skill_groups,name',
		    'description' => 'required',
		];
	    }
	    case 'PUT':
	    case 'PATCH':
	    {
		return [
		    'name' => 'required|max:255|unique:skill_groups,name,'.$skill_group->id,
		    'description' => 'required',
		];
	    }
	    default:break;
	}
    }
}
