<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\URL;

use App\Http\Requests;

use App\SkillGroup as SkillGroup;
use App\Skill as Skill;

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
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	$skill_groups = SkillGroup::all();
	
        return view('skillgroups.index', ['skill_groups' => $skill_groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	$skill_group = new SkillGroup;
	
        return view('skillgroups.form', ['skill_group' => $skill_group]);
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
        
        return redirect('admin/skillgroups')->with('status', 'SkillGroup created!');
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
	
        return view('skillgroups.show',  ['skill_group' => $skill_group]);
    }
    
   /**
     * Display the specified resource.
     *
     * @param  int  $name
     * @return \Illuminate\Http\Response
     */
    public function byName($name)
    {
	 $skill_group = SkillGroup::where('name', 'like', $name)	      
	      ->first();
	
        return view('skillgroups.single',  ['skill_group' => $skill_group]);
    }      

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	$skill_group = SkillGroup::find($id);
	
        return view('skillgroups.form',  ['skill_group' => $skill_group]);
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
        
        return redirect('admin/skillgroups')->with('status', 'SkillGroup updated!');
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
        
        return redirect('admin/skillgroups')->with('status', 'SkillGroup deleted!');
    }
}
