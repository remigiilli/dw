<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\URL;

use App\Http\Requests;

use App\PsychicPower as PsychicPower;

use App\Http\Requests\StorePsychicPower as StorePsychicPower;

class PsychicPowerController extends Controller
{ 
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
	
        return $psychic_powers;
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
        
        return response()->json($psychic_power, 201);
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
	
        return $psychic_power;
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
        
        return response()->json($psychic_power, 200);
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
        
        return response()->json(null, 204);
    }
}
