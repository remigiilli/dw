<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\URL;

use App\Http\Requests;

use App\PsychicPower as PsychicPower;
use App\PsychicPowerCategory as PsychicPowerCategory;
use App\Chapter as Chapter;

use App\Http\Requests\StorePsychicPower as StorePsychicPower;

class PsychicPowerController extends Controller
{
    public $range_types = array(0 => 'Self', 1 => 'Touch', 2 => 'metres x PR', 3 => 'metres radius x PR', 4 => 'Special', 5 => 'meters', 6 => 'meters + PR', 7 => 'd10 meters + PR');  
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
	$psychic_powers = PsychicPower::all();
	
        return view('psychic_powers.index', ['psychic_powers' => $psychic_powers]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listing()
    {        
	$psychic_powers = PsychicPower::all()->sortBy('name');
	
        return view('psychic_powers.list', ['psychic_powers' => $psychic_powers]);
    }     
    
    /**
     * Display a listing of the resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function categoryListing($id)
    {
        $psychic_power_category = PsychicPowerCategory::find($id);
	$psychic_powers = PsychicPower::where('psychic_power_category_id', $id)->get()->sortBy('name');
	
        return view('psychic_powers.list', ['psychic_power_category' => $psychic_power_category, 'psychic_powers' => $psychic_powers]);
    }    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
	$psychic_power = new PsychicPower;	
        
        $psychic_power_categories = PsychicPowerCategory::sortBy('name')->lists('name', 'id');         
        $chapters = Chapter::sortBy('name')->lists('name', 'id');         
	
        return view('psychic_powers.form', ['psychic_power' => $psychic_power, 'range_types' => $this->range_types, 'psychic_power_categories' => $psychic_power_categories, 'chapters' => $chapters]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePsychicPower  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePsychicPower $request)
    {
        $psychic_power = new PsychicPower;

        $psychic_power->name = $request->name;
        $psychic_power->description = $request->description;
        $psychic_power->action = $request->action;
        $psychic_power->range_type = $request->range_type;
        $psychic_power->range = $request->range;
        $psychic_power->opposed = $request->opposed;
        $psychic_power->sustained = $request->sustained;     
        $psychic_power->psychic_power_category_id = ($request->psychic_power_category_id) ? $request->psychic_power_category_id : null;        
        $psychic_power->chapter_id = ($request->chapter_id) ? $request->chapter_id : null;                
        
        $psychic_power->save();
        
        return redirect('admin/psychicpowers')->with('status', 'PsychicPower created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	$psychic_power = PsychicPower::find($id);
	
        return view('psychic_powers.show',  ['psychic_power' => $psychic_power]);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function justcontent($id)
    {
	$psychic_power = PsychicPower::find($id);
	
        return view('psychic_powers.single',  ['psychic_power' => $psychic_power]);
    }      

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	$psychic_power = PsychicPower::find($id);
        
        $psychic_power_categories = PsychicPowerCategory::orderBy('name')->lists('name', 'id');        
        $chapters = Chapter::orderBy('name')->lists('name', 'id');         
	
        return view('psychic_powers.form', ['psychic_power' => $psychic_power, 'range_types' => $this->range_types, 'psychic_power_categories' => $psychic_power_categories, 'chapters' => $chapters]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StorePsychicPower  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePsychicPower $request, $id)
    {
	$psychic_power = PsychicPower::find($id);
        $psychic_power->name = $request->name;
        $psychic_power->description = $request->description;
        $psychic_power->action = $request->action;
        $psychic_power->range_type = $request->range_type;
        $psychic_power->range = $request->range;
        $psychic_power->opposed = $request->opposed;
        $psychic_power->sustained = $request->sustained;        
        $psychic_power->psychic_power_category_id = ($request->psychic_power_category_id) ? $request->psychic_power_category_id : null;        
        $psychic_power->chapter_id = ($request->chapter_id) ? $request->chapter_id : null;                
        
        $psychic_power->save();
        
        return redirect('admin/psychicpowers')->with('status', 'PsychicPower updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $psychic_power = PsychicPower::find($id);
        
        $psychic_power->delete();
        
        return redirect('admin/psychicpowers')->with('status', 'PsychicPower deleted!');
    }
}
