<?php

namespace App\Http\Controllers;

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
	
        return view('skills.index', ['skills' => $skills, 'attributes' => $this->attributes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	$skill = new Skill;	
 	$skillgroups = SkillGroup::lists('name', 'id');

	
        return view('skills.form', ['skill' => $skill, 'skillgroups' => $skillgroups, 'attributes' => $this->attributes]);

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
        
        return redirect('skills')->with('status', 'Skill created!');
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
	
        return view('skills.show',  ['skill' => $skill]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function justcontent($id)
    {
	$skill = Skill::find($id);
	
        return view('skills.single',  ['skill' => $skill, 'attributes' => $this->attributes]);
    }        
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	$skill = Skill::find($id);
 	$skillgroups = SkillGroup::lists('name', 'id');
	
        return view('skills.form', ['skill' => $skill, 'skillgroups' => $skillgroups, 'attributes' => $this->attributes]);
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
        
        return redirect('skills')->with('status', 'Skill updated!');
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
        
        return redirect('skills')->with('status', 'Skill deleted!');
    }
}
