<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\PsychicPowerCategory as PsychicPowerCategory;

use App\Http\Requests\StorePsychicPowerCategory as StorePsychicPowerCategory;

class PsychicPowerCategoryController extends Controller
{
    /**
     * Instantiate a new PsychicPowerController instance.
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
	$psychic_power_categories = PsychicPowerCategory::all();
	
        return view('psychic_power_categories.index', ['psychic_power_categories' => $psychic_power_categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	$psychic_power_category = new PsychicPowerCategory;
	
        return view('psychic_power_categories.form', ['psychic_power_category' => $psychic_power_category]);

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
        
        return redirect('admin/psychicpowercategories')->with('status', 'WargearCategory created!');        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	$psychic_power_category = PsychicPowerCategory::find($id);
	
        return view('psychic_power_categories.show',  ['psychic_power_category' => $psychic_power_category]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	$psychic_power_category = PsychicPowerCategory::find($id);
	
        return view('psychic_power_categories.form', ['psychic_power_category' => $psychic_power_category]);
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
        
        return redirect('admin/psychicpowercategories')->with('status', 'WargearCategory updated!');
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
        
        return redirect('admin/psychicpowercategories')->with('status', 'WargearCategory deleted!');
    }
}
