<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Chapter as Chapter;
use App\SquadModeAbility as SquadModeAbility;
use App\SoloModeAbility as SoloModeAbility;
use App\Weapon as Weapon;
use App\Wargear as Wargear;
use App\PsychicPower as PsychicPower;
use App\Skill as Skill;
use App\SkillGroup as SkillGroup;
use App\Talent as Talent;

use App\Http\Requests\StoreChapter as StoreChapter;

class ChapterController extends Controller
{
    public $attributes = array('ws' => 'WS','bs' => 'BS', 's' => 'S', 't' => 'T', 'ag' => 'Ag', 'int' => 'Int', 'per' => 'Per', 'wp' => 'WP', 'fel' => 'Fel');
    public $damage_types = array('e' => 'Energy', 'i' => 'Impact', 'r' => 'Rending', 'x' => 'Explosive');
    public $renow_levels = array('' => '-', 'r' => 'Respected', 'd' => 'Distinguished', 'f' => 'Famed', 'h' => 'Hero');
    public $classes = array('b' => 'Basic', 'h' => 'Heavy', 'm' => 'Melee', 'o' => 'Mounted', 'p' => 'Pistol', 't' => 'Thrown');  
    public $range_types = array(0 => 'Range in meters', 1 => 'SB x Range');      
    
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
	$chapters = Chapter::all();
	
        return view('chapters.index', ['chapters' => $chapters]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listing()
    {
	$chapters = Chapter::all();
	
        return view('chapters.index', ['chapters' => $chapters]);
    }       

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	$chapter = new Chapter;
        
	$skills = Skill::all()->sortBy(function($skill) {
            if (count($skill->group()->first()) > 0) {
                return $skill->group()->first()->name.' '.$skill->name;
            }
            else {
                return $skill->name;
            }
        });      
        $skill_groups = SkillGroup::all()->sortBy('name');
        $talents = Talent::all()->sortBy('name');
	
        return view('chapters.form', ['chapter' => $chapter, 'skills' => $skills, 'talents' => $talents, 'skill_groups' => $skill_groups, 'attributes' => $this->attributes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \pp\Http\Requests\StoreChapter  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChapter $request)
    {  	
        $chapter = new Chapter;

        $chapter->name = $request->name;
        $chapter->creation = $request->creation;
        $chapter->demeanour_title = $request->demeanour_title;
        $chapter->demeanour_description = $request->demeanour_description;          
        $chapter->curse_title = $request->curse_title;
        $chapter->curse_description = $request->curse_description;           

        $chapter->save();
        
	$talents = $request->input('talents');  
        if ($talents && is_array($talents)) {
            foreach ($talents as $talent) {                      
                if (is_array($talent)) {
                    if (isset($talent['talent_option_id']) && $talent['talent_option_id']) {
                        $chapter->talentAdvances()->attach($talent['id'], ['talent_option_id' => $talent['talent_option_id'], 'cost' => $talent['cost']]);
                    }
                    else {
                        $chapter->talentAdvances()->attach($talent['id'], ['cost' => $talent['cost']]);
                    }
                }       
            }
        }
        
	$skills = $request->input('skills');  
        if($skills && is_array($skills)) {
            foreach ($skills as $skill) {                      
                if (is_array($skill)) {
                    $chapter->skillAdvances()->attach($skill['id'], ['cost' => $skill['cost'], 'proficeincy' => $skill['proficeincy']]);
                }       
            }           
        }
        
        $chapter->skillGroupAdvances()->detach();
        if ($skill_groups && is_array($skill_groups)) {
            foreach ($skill_groups as $k => $skill_group) {                      
                if (is_array($skill_group)) {
                    $chapter->skillGroupAdvances()->attach($skill_group['id'], ['cost' => $skill_group['cost'], 'proficeincy' => $skill_group['proficeincy']]);
                }
            }               
        }            
        
        return redirect('admin/chapters')->with('status', 'Chapter created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	$chapter = Chapter::find($id);
	
        return view('chapters.show',  ['chapter' => $chapter, 'damage_types' => $this->damage_types, 'renow_levels' => $this->renow_levels, 'classes' => $this->classes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	$chapter = Chapter::find($id);
        
	$skills = Skill::all()->sortBy(function($skill) {
            if (count($skill->group()->first()) > 0) {
                return $skill->group()->first()->name.' '.$skill->name;
            }
            else {
                return $skill->name;
            }
        });     
        $skill_groups = SkillGroup::all()->sortBy('name');  
        $talents = Talent::all()->sortBy('name');        
       
        return view('chapters.form',  ['chapter' => $chapter, 'skills' => $skills, 'talents' => $talents, 'skill_groups' => $skill_groups, 'attributes' => $this->attributes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \pp\Http\Requests\StoreChapter  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreChapter $request, $id)
    {
	$chapter = Chapter::find($id);
        $chapter->name = $request->name;
        $chapter->creation = $request->creation;
        $chapter->demeanour_title = $request->demeanour_title;
        $chapter->demeanour_description = $request->demeanour_description;          
        $chapter->curse_title = $request->curse_title;
        $chapter->curse_description = $request->curse_description;     

	$talents = $request->input('talents');  
        $chapter->talentAdvances()->detach();
        if ($talents && is_array($talents)) {
            foreach ($talents as $talent) {                      
                if (is_array($talent)) {
                    if (isset($talent['talent_option_id']) && $talent['talent_option_id']) {
                        $chapter->talentAdvances()->attach($talent['id'], ['talent_option_id' => $talent['talent_option_id'], 'cost' => $talent['cost']]);
                    }
                    else {
                        $chapter->talentAdvances()->attach($talent['id'], ['cost' => $talent['cost']]);
                    }
                }        
            }       
        }
        
	$skills = $request->input('skills');  
        $chapter->skillAdvances()->detach();
        if ($skills && is_array($skills)) {
            foreach ($skills as $k => $skill) {                      
                if (is_array($skill)) {
                    $chapter->skillAdvances()->attach($skill['id'], ['cost' => $skill['cost'], 'proficeincy' => $skill['proficeincy']]);
                }
            }               
        }
        
	$skill_groups = $request->input('skill_groups');  
        $chapter->skillGroupAdvances()->detach();
        if ($skill_groups && is_array($skill_groups)) {
            foreach ($skill_groups as $k => $skill_group) {                      
                if (is_array($skill_group)) {
                    $chapter->skillGroupAdvances()->attach($skill_group['id'], ['cost' => $skill_group['cost'], 'proficeincy' => $skill_group['proficeincy']]);
                }
            }               
        }        
        
        $chapter->save();
        
        return redirect('admin/chapters')->with('status', 'Chapter updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chapter = Chapter::find($id);
        $chapter->talentAdvances()->detach();
        $chapter->skillAdvances()->detach();
        $chapter->skillGroupAdvances()->detach();               
        $chapter->delete();
        
        return redirect('admin/chapters')->with('status', 'Chapter deleted!');
    }
}
