<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Speciality as Speciality;
use App\SpecialAbility as SpecialAbility;
use App\Skill as Skill;
use App\Weapon as Weapon;
use App\Wargear as Wargear;

use App\Http\Requests\StoreSpeciality as StoreSpeciality;

class SpecialityController extends Controller
{
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
        $weapons = Weapon::all();
        $wargear = Wargear::all();
	
        return view('specialities.form', ['speciality' => $speciality, 'skills' => $skills, 'weapons' => $weapons, 'wargear' => $wargear]);
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
	if ($skills) {	
	    $speciality->skills()->sync($skills);;
	}        
        
	$weapons = $request->input('weapons');               
	if ($skills) {	
	    $speciality->weapons()->sync($skills);;
	}  

	$wargear = $request->input('wargear');               
	if ($wargear) {	
	    $speciality->wargear()->sync($skills);;
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
        $weapons = Weapon::all();
        $wargear = Wargear::all();        
	
        return view('specialities.form',  ['speciality' => $speciality, 'skills' => $skills, 'weapons' => $weapons, 'wargear' => $wargear]);
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
	if ($skills) {
	    $speciality->skills()->sync($skills);        
	}
	else {
	    $speciality->skills()->detach();
	}        
        
	$weapons = $request->input('weapons');    
	if ($weapons) {
	    $speciality->weapons()->sync($weapons);        
	}
	else {
	    $speciality->weapons()->detach();
	}    

	$wargear = $request->input('wargear');    
	if ($wargear) {
	    $speciality->wargear()->sync($wargear);        
	}
	else {
	    $speciality->wargear()->detach();
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
