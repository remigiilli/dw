<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Speciality as Speciality;
use App\SpecialAbility as SpecialAbility;
use App\Skill as Skill;
use App\Talent as Talent;
use App\Weapon as Weapon;
use App\Wargear as Wargear;

use App\Http\Requests\StoreSpeciality as StoreSpeciality;

class SpecialityController extends Controller
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
	$specialities = Speciality::all();
	
        return view('specialities.index', ['specialities' => $specialities]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listing()
    {
	$specialities = Speciality::all();
	
        return view('specialities.index', ['specialities' => $specialities]);
    }       

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	$speciality = new Speciality;
        
        $skills = Skill::all();
        $talents = Talent::all();
        $weapons = Weapon::all();
        $wargear = Wargear::all();
	
        return view('specialities.form', ['speciality' => $speciality, 'skills' => $skills, 'talents' => $talents, 'weapons' => $weapons, 'wargear' => $wargear, 'attributes' => $this->attributes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \pp\Http\Requests\StoreSpeciality  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpeciality $request)
    {  	
        $speciality = new Speciality;

        $speciality->name = $request->name;         

        $speciality->save();
        
	$skills = $request->input('skills'); 
        if ($skills && is_array($skills)) {
            foreach ($skills as $skill) {                      
                if (is_array($skill)) {
                    $speciality->skills()->attach($skill['id']);
                }       
            }
        }    
        
	$weapons = $request->input('weapons'); 
        if ($weapons && is_array($weapons)) {
            foreach ($weapons as $weapon) {                      
                if (is_array($weapon)) {
                    $speciality->weapons()->attach($weapon['id']);
                }       
            }
        }          

	$wargear = $request->input('wargear');   
        if ($wargear && is_array($wargear)) {
            foreach ($wargear as $wargear_item) {                      
                if (is_array($weapon)) {
                    $speciality->wargear()->attach($wargear_item['id']);
                }       
            }
        }           

	$talent_advances = $request->input('talent_advances');  
        if ($talent_advances && is_array($talent_advances)) {
            foreach ($talent_advances as $talent_advance) {                      
                if (is_array($talent_advance)) {
                    $speciality->talentAdvances()->attach($talent_advance['id'], ['cost' => $talent_advance['cost'], 'rank' => $talent_advance['rank']]);
                }       
            }
        }
        
	$skill_advances = $request->input('skill_advances');  
        if($skill_advances && is_array($skill_advances)) {
            foreach ($skill_advances as $skill_advance) {                      
                if (is_array($skill_advance)) {
                    $speciality->skillAdvances()->attach($skill_advance['id'], ['cost' => $skill_advance['cost'], 'rank' => $skill_advance['rank'], 'proficeincy' => $skill_advance['proficeincy']]);
                }       
            }           
        }         
        
        return redirect('admin/specialities')->with('status', 'Speciality created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	$speciality = Speciality::find($id);
	
        return view('specialities.show',  ['speciality' => $speciality]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	$speciality = Speciality::find($id);
        
        $skills = Skill::all();
        $talents = Talent::all();
        $weapons = Weapon::all();
        $wargear = Wargear::all();        
	
        return view('specialities.form',  ['speciality' => $speciality, 'skills' => $skills, 'talents' => $talents, 'weapons' => $weapons, 'wargear' => $wargear, 'attributes' => $this->attributes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \pp\Http\Requests\StoreSpeciality  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSpeciality $request, $id)
    {
	$speciality = Speciality::find($id);
        $speciality->name = $request->name;     

        $speciality->save();      
        
	$skills = $request->input('skills'); 
        $speciality->skills()->detach();
        if ($skills && is_array($skills)) {
            foreach ($skills as $skill) {                      
                if (is_array($skill)) {
                    $speciality->skills()->attach($skill['id']);
                }       
            }
        }    
        
	$weapons = $request->input('weapons'); 
        $speciality->weapons()->detach();
        if ($weapons && is_array($weapons)) {
            foreach ($weapons as $weapon) {                      
                if (is_array($weapon)) {
                    $speciality->weapons()->attach($weapon['id']);
                }       
            }
        }          

	$wargear = $request->input('wargear');   
        $speciality->wargear()->detach();
        if ($wargear && is_array($wargear)) {
            foreach ($wargear as $wargear_item) {                      
                if (is_array($weapon)) {
                    $speciality->wargear()->attach($wargear_item['id']);
                }       
            }
        }                  
        
	$talent_advances = $request->input('talent_advances');  
        $speciality->talentAdvances()->detach();
        if ($talent_advances && is_array($talent_advances)) {
            foreach ($talent_advances as $talent_advance) {                      
                if (is_array($talent_advance)) {
                    $speciality->talentAdvances()->attach($talent_advance['id'], ['cost' => $talent_advance['cost'], 'rank' => $talent_advance['rank']]);
                }       
            }
        }
        
	$skill_advances = $request->input('skill_advances');  
        $speciality->skillAdvances()->detach();
        if($skill_advances && is_array($skill_advances)) {
            foreach ($skill_advances as $skill_advance) {                      
                if (is_array($skill_advance)) {
                    $speciality->skillAdvances()->attach($skill_advance['id'], ['cost' => $skill_advance['cost'], 'rank' => $skill_advance['rank'], 'proficeincy' => $skill_advance['proficeincy']]);
                }       
            }           
        }        
        
        return redirect('admin/specialities')->with('status', 'Speciality updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $speciality = Speciality::find($id);
        
        $speciality->skills()->detach();
        $speciality->weapons()->detach();
        $speciality->wargear()->detach();
        $speciality->delete();
        
        return redirect('admin/specialities')->with('status', 'Speciality deleted!');
    }
}
