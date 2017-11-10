<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\WargearCategory as WargearCategory;

use App\Http\Requests\StoreWargearCategory as StoreWargearCategory;

class WargearCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	$wargear_categories = WargearCategory::all();
	
        return $wargear_categories;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreWargearCategory  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWargearCategory $request)
    {
        $wargear_category = new WargearCategory;

        $wargear_category->name = $request->name;
        $wargear_category->description = $request->description;
        
        $wargear_category->save();
        
 	return response()->json($wargear_category, 201);      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	$wargear_category = WargearCategory::find($id);
	
        return $wargear_category;
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreWargearCategory  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreWargearCategory $request, $id)
    {
	$wargear_category = WargearCategory::find($id);
        $wargear_category->name = $request->name;
        $wargear_category->description = $request->description;
        
        $wargear_category->save();
        
        return response()->json($wargear_category, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wargear_category = WargearCategory::find($id);
        
        $wargear_category->delete();        
        
        return response()->json(null, 204);
    }
}
