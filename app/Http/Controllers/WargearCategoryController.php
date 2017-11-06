<?php

namespace App\Http\Controllers;

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
	
        return view('wargear_categories.index', ['wargear_categories' => $wargear_categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	$wargear_category = new WargearCategory;
	
        return view('wargear_categories.form', ['wargear_category' => $wargear_category]);

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
        
        return redirect('wargearcategories')->with('status', 'WargearCategory created!');        
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
	
        return view('wargear_categories.show',  ['wargear_category' => $wargear_category]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	$wargear_category = WargearCategory::find($id);
	
        return view('wargear_categories.form', ['wargear_category' => $wargear_category]);
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
        
        return redirect('wargearcategories')->with('status', 'WargearCategory updated!');
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
        
        return redirect('wargearcategories')->with('status', 'WargearCategory deleted!');
    }
}
