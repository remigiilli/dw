<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\URL;

use App\Http\Requests;

use App\Character as Character;
use App\SpecialQuality as SpecialQuality;

use App\Http\Requests\StoreCharacter as StoreCharacter;

class CharacterController extends Controller
{
    /**
     * Instantiate a new CharacterController instance.
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
	$characters = Character::all();
	
        return view('characters.index', ['characters' => $characters]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
	$character = new Character;
	
        return view('characters.form', ['character' => $character]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCharacter  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCharacter $request)
    {
        $character = new Character;

        $character->name = $request->name;
        $character->description = $request->description;
        $character->ws = $request->ws;
        $character->bs = $request->bs;        
        $character->s = $request->s;
        $character->t = $request->t;
        $character->ag = $request->ag;
        $character->per = $request->per;
        $character->int = $request->int;
        $character->wp = $request->wp;
        $character->fel = $request->fel;
        $character->wounds = $request->wounds;
        $character->psy = $request->psy;
        
        $character->save();

	$skills = $request->input('skills');               
	if ($skills) {	
	    $character->skills()->sync($skills);
	}
	
	$traits = $request->input('traits');               
	if ($skills) {	
	    $character->traits()->sync($traits);
	}
        
	$talents = $request->input('talents');               
	if ($talents) {	
	    $character->talents()->sync($talents);
	}
        
	$weapons = $request->input('weapons');               
	if ($skills) {	
	    $character->weapons()->sync($weapons);
	}
                
        return redirect('characters')->with('status', 'Character created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	$character = Character::find($id);
	
        return view('characters.show',  ['character' => $character]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	$character = Character::find($id);
	
        return view('characters.form', ['character' => $character]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreCharacter  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCharacter $request, $id)
    {
        $character->name = $request->name;
        $character->description = $request->description;
        $character->ws = $request->ws;
        $character->bs = $request->bs;        
        $character->s = $request->s;
        $character->t = $request->t;
        $character->ag = $request->ag;
        $character->per = $request->per;
        $character->int = $request->int;
        $character->wp = $request->wp;
        $character->fel = $request->fel;
        $character->wounds = $request->wounds;
        $character->psy = $request->psy;
        
        $character->save();

	$skills = $request->input('skills');               
	$character->skills()->sync($skills);
	
	$traits = $request->input('traits');               
	$character->traits()->sync($traits);
        
	$talents = $request->input('talents');               
	$character->talents()->sync($talents);
        
	$weapons = $request->input('weapons');               
	$character->weapons()->sync($weapons);
                
        return redirect('characters')->with('status', 'Character updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $character = Character::find($id);
        
        $character->skills()->detach();
        $character->traits()->detach();
        $character->talents()->detach();
        $character->weapons()->detach();
        $character->delete();
        
        return redirect('characters')->with('status', 'Character deleted!');
    }
}
