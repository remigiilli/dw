<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\URL;

use App\Http\Requests;

use App\Weapon as Weapon;
use App\WeaponCategory as WeaponCategory;
use App\SpecialQuality as SpecialQuality;

use App\Http\Requests\StoreWeapon as StoreWeapon;

class WeaponController extends Controller
{
     public $damage_types = array('e' => 'Energy', 'i' => 'Impact', 'r' => 'Rending', 'x' => 'Explosive');
     public $renow_levels = array('' => '-', 'r' => 'Respected', 'd' => 'Distinguished', 'f' => 'Famed', 'h' => 'Hero');
     public $classes = array('b' => 'Basic', 'h' => 'Heavy', 'm' => 'Melee', 'o' => 'Mounted', 'p' => 'Pistol', 't' => 'Thrown');  
     public $range_types = array(0 => 'Range in meters', 1 => 'SB x Range');  
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
	$weapons = Weapon::all();
	
        return view('weapons.index', ['weapons' => $weapons, 'damage_types' => $this->damage_types, 'renow_levels' => $this->renow_levels, 'classes' => $this->classes]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listing()
    {
	$weapons = Weapon::all()->sortBy('name');
	
        return view('weapons.list', ['weapons' => $weapons, 'damage_types' => $this->damage_types, 'renow_levels' => $this->renow_levels, 'classes' => $this->classes]);
    }      
    
    /**
     * Display a listing of the resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function categoryListing($id)
    {
        $weapon_category = WeaponCategory::find($id);
	$weapons = Weapon::where('weapon_category_id', $id)->get()->sortBy('name');
	
        return view('weapons.list', ['weapon_category' => $weapon_category, 'weapons' => $weapons, 'damage_types' => $this->damage_types, 'renow_levels' => $this->renow_levels, 'classes' => $this->classes]);
    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
	$weapon = new Weapon;
	
	$special_qualities = SpecialQuality::all();
        $weapon_categories = WeaponCategory::lists('name', 'id');
	
        return view('weapons.form', ['weapon' => $weapon, 'special_qualities' => $special_qualities, 'weapon_categories' => $weapon_categories, 'range_types' => $this->range_types, 'damage_types' => $this->damage_types, 'renow_levels' => $this->renow_levels, 'classes' => $this->classes]);
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
        $weapon->range_type = $request->range_type;        
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
        $weapon->req = ($request->req !== '') ? $request->req : null;
        $weapon->renown = $request->renown;
        $weapon->weapon_category_id = ($request->weapon_category_id) ? $request->weapon_category_id : null;
        
        $weapon->save();
        
	$special_qualities = $request->input('special_qualities');               
	if ($special_qualities) {	
	    $weapon->specialQualities()->sync($special_qualities);;
	}
        
        return redirect('admin/weapons')->with('status', 'Weapon created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	$weapon = Weapon::find($id);
	
        return view('weapons.show',  ['weapon' => $weapon, 'damage_types' => $this->damage_types, 'renow_levels' => $this->renow_levels, 'classes' => $this->classes]);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function justcontent($id)
    {
	$weapon = Weapon::find($id);
	
        return view('weapons.single',  ['weapon' => $weapon, 'damage_types' => $this->damage_types, 'renow_levels' => $this->renow_levels, 'classes' => $this->classes]);
    }       

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	$weapon = Weapon::find($id);

	$special_qualities = SpecialQuality::all();
        $weapon_categories = WeaponCategory::lists('name', 'id');        
	
        return view('weapons.form', ['weapon' => $weapon, 'special_qualities' => $special_qualities, 'weapon_categories' => $weapon_categories, 'range_types' => $this->range_types, 'damage_types' => $this->damage_types, 'renow_levels' => $this->renow_levels, 'classes' => $this->classes]);
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
        $weapon->range_type = $request->range_type;
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
        $weapon->req = ($request->req !== '') ? $request->req : null;
        $weapon->renown = $request->renown;
        $weapon->weapon_category_id = ($request->weapon_category_id) ? $request->weapon_category_id : null;
        
        $weapon->save();
        
	$special_qualities = $request->input('special_qualities');    
	if ($special_qualities) {
	    $weapon->specialQualities()->sync($special_qualities);        
	}
	else {
	    $weapon->specialQualities()->detach();
	}
        
        return redirect('admin/weapons')->with('status', 'Weapon updated!');
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
        
        return redirect('admin/weapons')->with('status', 'Weapon deleted!');
    }
}
