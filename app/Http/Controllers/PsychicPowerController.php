<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\URL;

use App\Http\Requests;

use App\PsychicPower as PsychicPower;

use App\Http\Requests\StorePsychicPower as StorePsychicPower;

class PsychicPowerController extends Controller
{
    public $range_types = array(0 => 'Self', 1 => 'Tuoch', 2 => 'metres x PR', 3 => 'metres radius x PR', 4 => 'Special');  
    /**
     * Instantiate a new PsychicPowerController instance.
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
	$psychic_powers = PsychicPower::all();
	
        return view('psychic_powers.index', ['psychic_powers' => $psychic_powers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
	$psychic_power = new PsychicPower;	
	
        return view('psychic_powers.form', ['psychic_power' => $psychic_power, 'range_types' => $this->range_types]);
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
        
        $psychic_power->save();
        
        return redirect('psychicpowers')->with('status', 'PsychicPower created!');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	$psychic_power = PsychicPower::find($id);
	
        return view('psychic_powers.form', ['psychic_power' => $psychic_power, 'range_types' => $this->range_types]);
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
        
        $psychic_power->save();
        
        return redirect('psychicpowers')->with('status', 'PsychicPower updated!');
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
        
        return redirect('psychicpowers')->with('status', 'PsychicPower deleted!');
    }
}
