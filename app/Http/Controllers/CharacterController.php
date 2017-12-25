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
        
	$skills = Skill::all()->sortBy(function($skill) {
            if (count($skill->group()->first()) > 0) {
                return $skill->group()->first()->name.' '.$skill->name;
            }
            else {
                return $skill->name;
            }
        });      
        $talents = Talent::all()->sortBy('name');     
        $traits = CharacterTrait::all()->sortBy('name');     
        $weapons = Weapon::all()->sortBy('name');     
        $wargear = Wargear::all()->sortBy('name');     
        $psychic_powers = PsychicPower::all()->sortBy('name');               
	
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
        if($skills && is_array($skills)) {
            foreach ($skills as $skill) {                      
                if (is_array($skill)) {
                    $character->skills()->attach($skill['id'], ['proficeincy' => $skill['proficeincy']]);
                }       
            }           
        }        
        
	$traits = $request->input('traits'); 
        if ($traits && is_array($traits)) {
            foreach ($traits as $trait) {                      
                if (is_array($trait)) {
                    $character->traits()->attach($trait['id']);
                }       
            }
        }          

	$talents = $request->input('talents');  
        if ($talents && is_array($talents)) {
            foreach ($talents as $talent) {                      
                if (is_array($talent)) {
                    if (isset($talent['talent_option_id'])) {
                        $character->talents()->attach($talent['id'], ['talent_option_id' => $talent['talent_option_id']]);
                    }
                    else {
                        $character->talents()->attach($talent['id']);
                    }
                }       
            }
        }           
        
	$psychic_powers = $request->input('psychic_powers');
        if ($psychic_powers && is_array($psychic_powers)) {
            foreach ($psychic_powers as $psychic_power) {                      
                if (is_array($psychic_power)) {
                    $character->psychicPowers()->attach($psychic_power['id']);
                }       
            }
        }       
        
	$weapons = $request->input('weapons'); 
        if ($weapons && is_array($weapons)) {
            foreach ($weapons as $weapon) {                      
                if (is_array($weapon)) {
                    $character->wargear()->attach($weapon['id']);
                }       
            }
        }           
        
	$wargear = $request->input('wargear'); 
        if ($wargear && is_array($wargear)) {
            foreach ($wargear as $wargear_item) {                      
                if (is_array($wargear_item)) {
                    $character->wargear()->attach($wargear_item['id']);
                }       
            }
        }         
                
        return redirect('admin/characters')->with('status', 'Character created!');
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
        
	$skills = Skill::all()->sortBy(function($skill) {
            if (count($skill->group()->first()) > 0) {
                return $skill->group()->first()->name.' '.$skill->name;
            }
            else {
                return $skill->name;
            }
        });        
        $talents = Talent::all()->sortBy('name');     
        $traits = CharacterTrait::all()->sortBy('name');     
        $weapons = Weapon::all()->sortBy('name');            
        $wargear = Wargear::all()->sortBy('name'); 
        $psychic_powers = PsychicPower::all()->sortBy('name');       
	
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
        $character->skills()->detach();        
        if($skills && is_array($skills)) {
            foreach ($skills as $skill) {                      
                if (is_array($skill)) {
                    $character->skills()->attach($skill['id'], ['proficeincy' => $skill['proficeincy']]);
                }       
            }           
        }        
        
	$traits = $request->input('traits'); 
        $character->traits()->detach();        
        if ($traits && is_array($traits)) {
            foreach ($traits as $trait) {                      
                if (is_array($trait)) {
                    $character->traits()->attach($trait['id']);
                }       
            }
        }          

	$talents = $request->input('talents');  

        $character->talents()->detach();
        if ($talents && is_array($talents)) {
            foreach ($talents as $talent) {                      
                if (is_array($talent)) {
                    if (isset($talent['talent_option_id'])) {
                        $character->talents()->attach($talent['id'], ['talent_option_id' => $talent['talent_option_id']]);
                    }
                    else {
                        $character->talents()->attach($talent['id']);
                    }
                }       
            }
        }           
        
	$psychic_powers = $request->input('psychic_powers');
        $character->psychicPowers()->detach();
        if ($psychic_powers && is_array($psychic_powers)) {
            foreach ($psychic_powers as $psychic_power) {                      
                if (is_array($psychic_power)) {
                    $character->psychicPowers()->attach($psychic_power['id']);
                }       
            }
        }       
        
	$weapons = $request->input('weapons'); 
        $character->weapons()->detach();
        if ($weapons && is_array($weapons)) {
            foreach ($weapons as $weapon) {                      
                if (is_array($weapon)) {
                    $character->wargear()->attach($weapon['id']);
                }       
            }
        }           
        
	$wargear = $request->input('wargear'); 
        $character->wargear()->detach();
        if ($wargear && is_array($wargear)) {
            foreach ($wargear as $wargear_item) {                      
                if (is_array($wargear_item)) {
                    $character->wargear()->attach($wargear_item['id']);
                }       
            }
        }                 

        return redirect('admin/characters')->with('status', 'Character updated!');
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
        
        return redirect('admin/characters')->with('status', 'Character deleted!');
    }
}
