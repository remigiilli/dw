<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\URL;

use App\Http\Requests;

use App\Skill as Skill;
use App\SkillGroup as SkillGroup;

use App\Http\Requests\StoreSkill as StoreSkill;

class SkillController extends Controller
{
    public $attributes = array('ws' => 'WS','bs' => 'BS', 's' => 'S', 't' => 'T', 'ag' => 'Ag', 'int' => 'Int', 'per' => 'Per', 'wp' => 'WP', 'fel' => 'Fel');
    /**
     * Instantiate a new TalentController instance.
     *
     * @return void
     */
    public function __construct()
    {
//         $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	$skills = Skill::all();
	
        return $skills;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \pp\Http\Requests\StoreSkill  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSkill $request)
    {
        $skill = new Skill;

        $skill->name = $request->name;
        $skill->attribute = $request->attribute;
        $skill->description = $request->description;       
        $skill->use = $request->use;
        $skill->special = $request->special;        
        $skill->group_id = ($request->group_id) ? $request->group_id : null;

        $skill->save();
        
	return response()->json($skill, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	$skill = Skill::find($id);
	
        return $skill;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \pp\Http\Requests\StoreSkill  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSkill $request, $id)
    {
	$skill = Skill::find($id);
        $skill->name = $request->name;
	$skill->attribute = $request->attribute;        
        $skill->description = $request->description;
        $skill->use = $request->use;
        $skill->special = $request->special;
        $skill->group_id = ($request->group_id) ? $request->group_id : null;

        $skill->save();
        
	return response()->json($skill, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skill = Skill::find($id);
        
        $skill->delete();
        
	return response()->json(null, 204);
    }
}
