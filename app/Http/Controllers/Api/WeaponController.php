<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Weapon as Weapon;
use App\SpecialQuality as SpecialQuality;

use App\Http\Requests\StoreWeapon as StoreWeapon;

class WeaponController extends Controller
{
     public $damage_types = array('e' => 'Energy', 'i' => 'Impact', 'r' => 'Rending', 'x' => 'Explosive');
     public $renow_levels = array('' => '-', 'r' => 'Respected', 'd' => 'Distinguished', 'f' => 'Famed', 'h' => 'Hero');
     public $classes = array('b' => 'Basic', 'h' => 'Heavy', 'm' => 'Melee', 'o' => 'Mounted', 'p' => 'Pistol', 't' => 'Thrown');  
    /**
     * Instantiate a new WeaponController instance.
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
	$weapons = Weapon;
	
        return $weapons;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWeapon  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWeapon $request)
    {
        $weapon = new Weapon;

        $weapon->name = $request->name;
        $weapon->description = $request->description;
        $weapon->type = $request->type;
        $weapon->range = $request->range;        
        $weapon->rof1 = $request->rof1;
        $weapon->rof2 = $request->rof2;
        $weapon->rof3 = $request->rof3;
        $weapon->dmg1 = $request->dmg1;
        $weapon->dmg2 = $request->dmg2;
        $weapon->dmg3 = $request->dmg3;
        $weapon->dmg4 = $request->dmg4;
        $weapon->pen = $request->pen;
        $weapon->clip = $request->clip;
        $weapon->rld = $request->rld;
        $weapon->weight = $request->weight;
        $weapon->req = ($request->req !== '') ? $request->group_id : null;
        $weapon->renown = $request->renown;
        
        $weapon->save();
        
	$special_qualities = $request->input('special_qualities');               
	if ($special_qualities) {	
	    $weapon->specialQualities()->sync($special_qualities);;
	}
        
	return response()->json($weapon, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	$weapon = Weapon::with('specialQualities')->find($id);
	
        return $weapon;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreWeapon  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreWeapon $request, $id)
    {
	$weapon = Weapon::find($id);
        $weapon->name = $request->name;
        $weapon->description = $request->description;
        $weapon->type = $request->type;
        $weapon->range = $request->range;        
        $weapon->rof1 = $request->rof1;
        $weapon->rof2 = $request->rof2;
        $weapon->rof3 = $request->rof3;
        $weapon->dmg1 = $request->dmg1;
        $weapon->dmg2 = $request->dmg2;
        $weapon->dmg3 = $request->dmg3;
        $weapon->dmg4 = $request->dmg4;
        $weapon->pen = $request->pen;
        $weapon->clip = $request->clip;
        $weapon->rld = $request->rld;
        $weapon->weight = $request->weight;
        $weapon->req = ($request->req !== '') ? $request->group_id : null;
        $weapon->renown = $request->renown;
        
        $weapon->save();
        
	$special_qualities = $request->input('special_qualities');    
	if ($special_qualities) {
	    $weapon->specialQualities()->sync($special_qualities);        
	}
	else {
	    $weapon->specialQualities()->detach();
	}
        
        return response()->json($weapon, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $weapon = Weapon::find($id);
        
        $weapon->specialQualities()->detach();
        $weapon->delete();
        
        return response()->json(null, 204);
    }
}
