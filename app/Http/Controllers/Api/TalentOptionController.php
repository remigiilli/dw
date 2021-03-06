<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\URL;

use App\Http\Requests;

use App\TalentOption as TalentOption;

use App\Http\Requests\StoreTalentOption as StoreTalentOption;

class TalentOptionController extends Controller
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
	$talent_options = TalentOption::all();
	
        return $talent_options;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTalentOption  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTalentOption $request)
    {
        $talent_option = new TalentOption;

        $talent_option->name = $request->name;

        $talent_option->save();

	return response()->json($talent_option, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreTalentOption  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTalentOption $request, $id)
    {
	$talent_option = TalentOption::find($id);
        $talent_option->name = $request->name;

        $talent_option->save();
        
	return response()->json($talent_option, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $talent_option = TalentOption::find($id);
        
        $talent_option->delete();
        
        return response()->json(null, 204);
    }
}
