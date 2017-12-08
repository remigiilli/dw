<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Speciality as Speciality;
use App\SpecialAbility as SpecialAbility;

use App\Http\Requests\StoreSpecialAbility as StoreSpecialAbility;

class SpecialAbilityController extends Controller
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
	$special_abilities = SpecialAbility::all();
	
        return view('special_abilities.index', ['special_abilities' => $special_abilities]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listing()
    {
	$special_abilities = SpecialAbility::all()->sortBy('name');        
	
        return view('special_abilities.list', ['special_abilities' => $special_abilities]);
    }      
    
    /**
     * Display a listing of the resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function chapterListing($id)
    {
        $chapter = Speciality::find($id);
	$special_abilities = SpecialAbility::where('speciality_id', $id)->get()->sortBy('name');        
	
        return view('special_abilities.list', ['chapter' => $chapter, 'special_abilities' => $special_abilities]);
    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	$special_ability = new SpecialAbility;
        
        $specialities = Speciality::lists('name', 'id');
	
        return view('special_abilities.form', ['special_ability' => $special_ability, 'specialities' => $specialities]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreSpecialAbility  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpecialAbility $request)
    {
        $special_ability = new SpecialAbility;

        $special_ability->name = $request->name;
        $special_ability->description = $request->description;
        $special_ability->speciality_id = ($request->speciality_id) ? $request->speciality_id : null;
        
        $special_ability->save();
        
        return redirect('admin/specialabilities')->with('status', 'SpecialAbility created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	$special_ability = SpecialAbility::find($id);
	
        return view('special_abilities.show',  ['special_ability' => $special_ability]);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function justcontent($id)
    {
	$special_ability = SpecialAbility::find($id);
	
        return view('special_abilities.single',  ['special_ability' => $special_ability]);
    }     

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	$special_ability = SpecialAbility::find($id);
        
        $specialities = Speciality::lists('name', 'id');

        return view('special_abilities.form', ['special_ability' => $special_ability, 'specialities' => $specialities]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\StoreSpecialAbility
     */
    public function update(StoreSpecialAbility $request, $id)
    {
	$special_ability = SpecialAbility::find($id);
        $special_ability->description = $request->description;
        $special_ability->speciality_id = ($request->speciality_id) ? $request->speciality_id : null;        
        
        $special_ability->save();
        
        return redirect('admin/specialabilities')->with('status', 'SpecialAbility updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $special_ability = SpecialAbility::find($id);
        
        $special_ability->delete();
        
        return redirect('admin/specialabilities')->with('status', 'SpecialAbility deleted!');
    }
}
