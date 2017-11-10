<?php

namespace App\Http\Controllers;

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
	
        return view('weapon_categories.index', ['weapon_categories' => $weapon_categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	$weapon_category = new WeaponCategory;
	
        return view('weapon_categories.form', ['weapon_category' => $weapon_category]);

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
        
        return redirect('admin/weaponcategories')->with('status', 'WeaponCategory created!');        
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
	
        return view('weapon_categories.show',  ['weapon_category' => $weapon_category]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	$weapon_category = WeaponCategory::find($id);
	
        return view('weapon_categories.form', ['weapon_category' => $weapon_category]);
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
        
        return redirect('admin/weaponcategories')->with('status', 'WeaponCategory updated!');
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
        
        return redirect('admin/weaponcategories')->with('status', 'WeaponCategory deleted!');
    }
}
