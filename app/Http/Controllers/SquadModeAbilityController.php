<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\SquadModeAbility as SquadModeAbility;
use App\Chapter as Chapter;

use App\Http\Requests\StoreSquadModeAbility as StoreSquadModeAbility;

class SquadModeAbilityController extends Controller
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
	$squad_mode_abilities = SquadModeAbility::all();
	
        return view('squad_mode_abilities.index', ['squad_mode_abilities' => $squad_mode_abilities]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listing()
    {
	$squad_mode_abilities = SquadModeAbility::all()->sortBy('name');        
	
        return view('squad_mode_abilities.list', ['squad_mode_abilities' => $squad_mode_abilities]);
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
	$squad_mode_abilities = SquadModeAbility::where('chapter_id', $id)->get()->sortBy('name');        
	
        return view('squad_mode_abilities.list', ['chapter' => $chapter, 'squad_mode_abilities' => $squad_mode_abilities]);
    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	$squad_mode_ability = new SquadModeAbility;
        
        $chapters = Chapter::lists('name', 'id');
	
        return view('squad_mode_abilities.form', ['squad_mode_ability' => $squad_mode_ability, 'chapters' => $chapters]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreSquadModeAbility  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSquadModeAbility $request)
    {
        $squad_mode_ability = new SquadModeAbility;

        $squad_mode_ability->name = $request->name;
        $squad_mode_ability->cost = $request->cost;
        $squad_mode_ability->action = $request->action;
        $squad_mode_ability->sustained = $request->sustained;
        $squad_mode_ability->effect = $request->effect;
        $squad_mode_ability->improvement = $request->improvement;
        $squad_mode_ability->chapter_id = ($request->chapter_id) ? $request->chapter_id : null;
        
        $squad_mode_ability->save();
        
        return redirect('admin/squadmodeabilities')->with('status', 'SquadModeAbility created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	$squad_mode_ability = SquadModeAbility::find($id);
	
        return view('squad_mode_abilities.show',  ['squad_mode_ability' => $squad_mode_ability]);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function justcontent($id)
    {
	$squad_mode_ability = SquadModeAbility::find($id);
	
        return view('squad_mode_abilities.single',  ['squad_mode_ability' => $squad_mode_ability]);
    }     

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	$squad_mode_ability = SquadModeAbility::find($id);
        
        $chapters = Chapter::lists('name', 'id');

        return view('squad_mode_abilities.form', ['squad_mode_ability' => $squad_mode_ability, 'chapters' => $chapters]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\StoreSquadModeAbility
     */
    public function update(StoreSquadModeAbility $request, $id)
    {
	$squad_mode_ability = SquadModeAbility::find($id);
        $squad_mode_ability->cost = $request->cost;
        $squad_mode_ability->action = $request->action;
        $squad_mode_ability->sustained = $request->sustained;
        $squad_mode_ability->effect = $request->effect;
        $squad_mode_ability->improvement = $request->improvement;
        $squad_mode_ability->chapter_id = ($request->chapter_id) ? $request->chapter_id : null;        
        
        $squad_mode_ability->save();
        
        return redirect('admin/squadmodeabilities')->with('status', 'SquadModeAbility updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $squad_mode_ability = SquadModeAbility::find($id);
        
        $squad_mode_ability->delete();
        
        return redirect('admin/squadmodeabilities')->with('status', 'SquadModeAbility deleted!');
    }
}
