<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\URL;

use App\Http\Requests;

use App\Talent as Talent;
use App\TalentOption as TalentOption;

use App\Http\Requests\StoreTalent as StoreTalent;

class TalentController extends Controller
{
    /**
     * Instantiate a new TalentController instance.
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
	$talents = Talent::all();
	
        return $talents;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTalent  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTalent $request)
    {
        $talent = new Talent;

        $talent->name = $request->name;
        $talent->description = $request->description;
        $talent->prerequisites = $request->prerequisites;

        $talent->save();
        
	$options = $request->input('options');        
	if ($options) {
	    $talent->options()->sync($options);
	}
        
        return response()->json($talent, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreTalent  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTalent $request, $id)
    {
	$talent = Talent::find($id);
        $talent->name = $request->name;
        $talent->description = $request->description;
        $talent->prerequisites = $request->prerequisites;

        $talent->save();
        
	$options = $request->input('options');        
	if ($options) {
	    $talent->options()->sync($options);        
	}
	else {
	    $talent->options()->detach();
	}
        
        return response()->json($talent, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $talent = Talent::find($id);
        
        $talent->options()->detach();
        $talent->delete();
        
        return response()->json(null, 204);
    }
}
