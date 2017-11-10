<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\PsychicPowerCategory as PsychicPowerCategory;

use App\Http\Requests\StorePsychicPowerCategory as StorePsychicPowerCategory;

class PsychicPowerCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	$psychic_power_categories = PsychicPowerCategory::all();
	
        return $psychic_power_categories;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StorePsychicPowerCategory  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePsychicPowerCategory $request)
    {
        $psychic_power_category = new PsychicPowerCategory;

        $psychic_power_category->name = $request->name;
        
        $psychic_power_category->save();
        
	return response()->json($psychic_power_category, 201);     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StorePsychicPowerCategory  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePsychicPowerCategory $request, $id)
    {
	$psychic_power_category = PsychicPowerCategory::find($id);
        $psychic_power_category->name = $request->name;
        
        $psychic_power_category->save();
        
	return response()->json($psychic_power_category, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $psychic_power_category = PsychicPowerCategory::find($id);
        
        $psychic_power_category->delete(); 
        
	return response()->json(null, 204);
    }
}
