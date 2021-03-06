<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Chapter as Chapter;

use App\Speciality as Speciality;

use App\Skill as Skill;
use App\SkillGroup as SkillGroup;

use App\Talent as Talent;
use App\TalentOption as TalentOption;

use App\CharacterTrait as CharacterTrait;

use App\PsychicPower as PsychicPower;
use App\PsychicPowerCategory as PsychicPowerCategory;

use App\SpecialQuality as SpecialQuality;

use App\Weapon as Weapon;
use App\WeaponCategory as WeaponCategory;

use App\Wargear as Wargear;
use App\WargearCategory as WargearCategory;

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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	$psychic_power_categories = PsychicPowerCategory::all()->sortBy('name');
        $weapon_categories = WeaponCategory::all()->sortBy('name');
	$wargear_categories = WargearCategory::all()->sortBy('name');
        $chapters = Chapter::all()->sortBy('name');
        $specialities = Speciality::all()->sortBy('name');
        
        return view('home', [
            'psychic_power_categories' => $psychic_power_categories, 
            'weapon_categories' => $weapon_categories, 
            'wargear_categories' => $wargear_categories, 
            'chapters' => $chapters,
            'specialities' => $specialities
        ]);
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
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function andee()
    {       
        return view('tables.andee');
    }    
   /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function joder()
    {       
        return view('tables.joder');
    }    
   /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function mouse()
    {       
        return view('tables.mouse');
    }    
   /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function garreth()
    {       
        return view('tables.garreth');
    }    
       /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function zack()
    {       
        return view('tables.zack');
    }    
}
