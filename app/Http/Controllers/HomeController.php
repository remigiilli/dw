<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Skill as Skill;
use App\SkillGroup as SkillGroup;

use App\Talent as Talent;
use App\TalentOption as TalentOption;

use App\CharacterTrait as CharacterTrait;

use App\PsychicPower as PsychicPower;

use App\SpecialQuality as SpecialQuality;

use App\Weapon as Weapon;

use App\Wargear as Wargear;

class HomeController extends Controller
{
    public $attributes = array('ws' => 'WS','bs' => 'BS', 's' => 'S', 't' => 'T', 'ag' => 'Ag', 'int' => 'Int', 'per' => 'Per', 'wp' => 'WP', 'fel' => 'Fel');
    public $damage_types = array('e' => 'Energy', 'i' => 'Impact', 'r' => 'Rending', 'x' => 'Explosive');
    public $renow_levels = array('' => '-', 'r' => 'Respected', 'd' => 'Distinguished', 'f' => 'Famed', 'h' => 'Hero');
    public $classes = array('b' => 'Basic', 'h' => 'Heavy', 'm' => 'Melee', 'o' => 'Mounted', 'p' => 'Pistol', 't' => 'Thrown');      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//         $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    
    
    public function search(Request $request)
    {
	  $skills = Skill::whereHas('group', function ($q) use ($request) {
		$q->where('name', 'like', '%'.$request->search.'%');
	      })->orWhere('name', 'like', '%'.$request->search.'%')
	      ->get();
	      
	  $talents = Talent::where('name', 'like', '%'.$request->search.'%')	      
	      ->get();

	  $traits = CharacterTrait::where('name', 'like', '%'.$request->search.'%')
	      ->get();

	  $psychic_powers = PsychicPower::where('name', 'like', '%'.$request->search.'%')
	      ->get();          
          
	  $special_qualities = SpecialQuality::where('name', 'like', '%'.$request->search.'%')
	      ->get();
	      
	  $weapons = Weapon::where('name', 'like', '%'.$request->search.'%')
	      ->get();	      

	  $wargear = Wargear::where('name', 'like', '%'.$request->search.'%')
	      ->get();	                
          
	  return view('searchresults', ['skills' => $skills, 'talents' => $talents, 'traits' => $traits, 'special_qualities' => $special_qualities, 'psychic_powers' => $psychic_powers, 'weapons' => $weapons, 'wargear' => $wargear, 'attributes' => $this->attributes, 'damage_types' => $this->damage_types, 'renow_levels' => $this->renow_levels, 'classes' => $this->classes]);
    }    
}
