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
use App\Talent as Talent;

use App\Http\Requests\StoreChapter as StoreChapter;

class ChapterController extends Controller
{
    public $attributes = array('ws' => 'WS','bs' => 'BS', 's' => 'S', 't' => 'T', 'ag' => 'Ag', 'int' => 'Int', 'per' => 'Per', 'wp' => 'WP', 'fel' => 'Fel');
    
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
        
	$skills = Skill::all();        
        $talents = Talent::all();            
	
        return view('chapters.form', ['chapter' => $chapter, 'skills' => $skills, 'talents' => $talents, 'attributes' => $this->attributes]);
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
                    if (isset($talent['talent_option_id'])) {
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
	
        return view('chapters.show',  ['chapter' => $chapter]);
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
        
	$skills = Skill::all();        
        $talents = Talent::all();        
	
        return view('chapters.form',  ['chapter' => $chapter, 'skills' => $skills, 'talents' => $talents, 'attributes' => $this->attributes]);
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
                    if (isset($talent['talent_option_id'])) {
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
        
        $chapter->delete();
        
        return redirect('admin/chapters')->with('status', 'Chapter deleted!');
    }
}
