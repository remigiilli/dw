<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\WeaponCategory as WeaponCategory;

use App\Http\Requests\StoreWeaponCategory as StoreWeaponCategory;

class WeaponCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	$weapon_categories = WeaponCategory::all();
	
        return $weapon_categories;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreWeaponCategory  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWeaponCategory $request)
    {
        $weapon_category = new WeaponCategory;

        $weapon_category->name = $request->name;
        $weapon_category->description = $request->description;
        
        $weapon_category->save();
        
	return response()->json($weapon_category, 201);      
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	$weapon_category = WeaponCategory::find($id);
	
        return $weapon_category;
    }    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreWeaponCategory  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreWeaponCategory $request, $id)
    {
	$weapon_category = WeaponCategory::find($id);
        $weapon_category->name = $request->name;
        $weapon_category->description = $request->description;
        
        $weapon_category->save();
        
        return response()->json($weapon_category, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $weapon_category = WeaponCategory::find($id);
        
        $weapon_category->delete();
        
        return response()->json(null, 204);
    }
}
