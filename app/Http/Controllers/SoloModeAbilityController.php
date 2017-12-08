<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SoloModeAbility as SoloModeAbility;
use App\Chapter as Chapter;

use App\Http\Requests\StoreSoloModeAbility as StoreSoloModeAbility;

class SoloModeAbilityController extends Controller
{
    /**
     * Instantiate a new WeaponController instance.
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
	$solo_mode_abilities = SoloModeAbility::all();
	
        return view('solo_mode_abilities.index', ['solo_mode_abilities' => $solo_mode_abilities]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listing()
    {
	$solo_mode_abilities = SoloModeAbility::all()->sortBy('name');        
	
        return view('solo_mode_abilities.list', ['solo_mode_abilities' => $solo_mode_abilities]);
    }      
    
    /**
     * Display a listing of the resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function chapterListing($id)
    {
        $chapter = Chapter::find($id);
	$solo_mode_abilities = SoloModeAbility::where('chapter_id', $id)->get()->sortBy('name');        
	
        return view('solo_mode_abilities.list', ['chapter' => $chapter, 'solo_mode_abilities' => $solo_mode_abilities]);
    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	$solo_mode_ability = new SoloModeAbility;
        
        $chapters = Chapter::lists('name', 'id');
	
        return view('solo_mode_abilities.form', ['solo_mode_ability' => $solo_mode_ability, 'chapters' => $chapters]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreSoloModeAbility  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSoloModeAbility $request)
    {
        $solo_mode_ability = new SoloModeAbility;

        $solo_mode_ability->name = $request->name;
        $solo_mode_ability->rank = $request->rank;
        $solo_mode_ability->action = $request->action;
        $solo_mode_ability->effect = $request->effect;
        $solo_mode_ability->improvement = $request->improvement;
        $solo_mode_ability->chapter_id = ($request->chapter_id) ? $request->chapter_id : null;
        
        $solo_mode_ability->save();
        
        return redirect('admin/solomodeabilities')->with('status', 'SoloModeAbility created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	$solo_mode_ability = SoloModeAbility::find($id);
	
        return view('solo_mode_abilities.show',  ['solo_mode_ability' => $solo_mode_ability]);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function justcontent($id)
    {
	$solo_mode_ability = SoloModeAbility::find($id);
	
        return view('solo_mode_abilities.single',  ['solo_mode_ability' => $solo_mode_ability]);
    }     

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	$solo_mode_ability = SoloModeAbility::find($id);
        
        $chapters = Chapter::lists('name', 'id');

        return view('solo_mode_abilities.form', ['solo_mode_ability' => $solo_mode_ability, 'chapters' => $chapters]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\StoreSoloModeAbility
     */
    public function update(StoreSoloModeAbility $request, $id)
    {
	$solo_mode_ability = SoloModeAbility::find($id);
        $solo_mode_ability->rank = $request->rank;
        $solo_mode_ability->action = $request->action;
        $solo_mode_ability->effect = $request->effect;
        $solo_mode_ability->improvement = $request->improvement;
        $solo_mode_ability->chapter_id = ($request->chapter_id) ? $request->chapter_id : null;        
        
        $solo_mode_ability->save();
        
        return redirect('admin/solomodeabilities')->with('status', 'SoloModeAbility updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $solo_mode_ability = SoloModeAbility::find($id);
        
        $solo_mode_ability->delete();
        
        return redirect('admin/solomodeabilities')->with('status', 'SoloModeAbility deleted!');
    }
}