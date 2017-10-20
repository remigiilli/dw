<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\URL;

use App\Http\Requests;

use App\SkillGroup as SkillGroup;

use App\Http\Requests\StoreSkillGroup as StoreSkillGroup;

class SkillGroupController extends Controller
{
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
	$skill_groups = SkillGroup::all();
	
        return $skill_groups;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \pp\Http\Requests\StoreSkillGroup  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSkillGroup $request)
    {  	
        $skill_group = new SkillGroup;

        $skill_group->name = $request->name;
        $skill_group->description = $request->description;
        $skill_group->use = $request->use;
        $skill_group->special = $request->special;        

        $skill_group->save();
        
        return response()->json($skill_group, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	$skill_group = SkillGroup::find($id);
	
        return $skill_group;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \pp\Http\Requests\StoreSkillGroup  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSkillGroup $request, $id)
    {
	$skill_group = SkillGroup::find($id);
        $skill_group->name = $request->name;
        $skill_group->description = $request->description;
        $skill_group->use = $request->use;
        $skill_group->special = $request->special;          

        $skill_group->save();
        
	return response()->json($skill_group, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skill_group = SkillGroup::find($id);
        
        $skill_group->delete();
        
	return response()->json(null, 204);
    }
}
