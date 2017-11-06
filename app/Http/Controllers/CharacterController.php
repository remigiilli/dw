<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\URL;

use App\Http\Requests;

use App\Character as Character;
use App\Skill as Skill;
use App\Weapon as Weapon;
use App\Wargear as Wargear;
use App\Talent as Talent;
use App\CharacterTrait as CharacterTrait;
use App\PsychicPower as PsychicPower;

use App\Http\Requests\StoreCharacter as StoreCharacter;

class CharacterController extends Controller
{
    public $attributes = array('ws' => 'WS','bs' => 'BS', 's' => 'S', 't' => 'T', 'ag' => 'Ag', 'int' => 'Int', 'per' => 'Per', 'wp' => 'WP', 'fel' => 'Fel');
    
    /**
     * Instantiate a new CharacterController instance.
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
        
	$skills = Skill::all();        
        $talents = Talent::all();    
        $traits = CharacterTrait::all();    
        $weapons = Weapon::all();    
        $wargear = Wargear::all();    
        $psychic_powers = PsychicPower::all();              
	
        return view('characters.form', [
            'character' => $character, 
            'skills' => $skills, 
            'attributes' => $this->attributes, 
            'weapons' => $weapons, 
            'wargear' => $wargear, 
            'talents' => $talents, 
            'traits' => $traits, 
            'psychic_powers' => $psychic_powers
        ]);
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
        foreach ($talents as $k => $talent) {                      
            if (is_array($talent)) {
                foreach ($talent as $t) {
                    $character->talents()->attach($k, ['talent_option_id' => $t]);
                }
            }
            else {
                $character->talents()->attach($talent);
            }            
        }

	$psychic_powers = $request->input('psychic_powers');               
	if ($psychic_powers) {	
	    $character->psychicPowers()->sync($psychic_powers);
	}         
        
	$weapons = $request->input('weapons');               
	if ($weapons) {	
	    $character->weapons()->sync($weapons);
	}
        
	$wargear = $request->input('wargear');               
	if ($wargear) {	
	    $character->wargear()->sync($wargear);
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
        
	$skills = Skill::all();          
        $talents = Talent::all();    
        $traits = CharacterTrait::all();    
        $weapons = Weapon::all();           
        $wargear = Wargear::all();
        $psychic_powers = PsychicPower::all();      
	
        return view('characters.form', [
            'character' => $character, 
            'skills' => $skills, 
            'attributes' => $this->attributes, 
            'wargear' => $wargear, 
            'weapons' => $weapons, 
            'talents' => $talents, 
            'traits' => $traits, 
            'psychic_powers' => $psychic_powers
        ]);
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
	$character = Character::find($id);        
        
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
	else {
	    $character->skills()->detach();
	}        
        
	$traits = $request->input('traits'); 
	if ($traits) {
	    $character->traits()->sync($traits);   
	}
	else {
	    $character->traits()->detach();
	}    
        
	$talents = $request->input('talents');  
        $character->talents()->detach();
        foreach ($talents as $k => $talent) {                      
            if (is_array($talent)) {
                foreach ($talent as $t) {
                    $character->talents()->attach($k, ['talent_option_id' => $t]);
                }
            }
            else {
                $character->talents()->attach($talent);
            }            
        }
        
	$psychic_powers = $request->input('psychic_powers');               
	if ($psychic_powers) {	
	    $character->psychicPowers()->sync($psychic_powers);
	}     
	else {
	    $character->psychicPowers()->detach();
	}         

        $weapons = $request->input('weapons'); 
	if ($weapons) {
	    $character->weapons()->sync($weapons);   
	}
	else {
	    $character->weapons()->detach();
	}           
        
	$wargear = $request->input('wargear'); 
	if ($wargear) {
	    $character->wargear()->sync($wargear);   
	}
	else {
	    $character->wargear()->detach();
	}         
                
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
