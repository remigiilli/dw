<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\URL;

use App\Http\Requests;

use Gate;
use App\CharacterTrait as CharacterTrait;

use App\Http\Requests\StoreCharacterTrait as StoreCharacterTrait;

class TraitController extends Controller
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
	$traits = CharacterTrait::all();
	
        return $traits;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCharacterTrait  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCharacterTrait $request)
    {
        $trait = new CharacterTrait;

        $trait->name = $request->name;
        $trait->description = $request->description;

        $trait->save();
        
        return response()->json($trait, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	$trait = CharacterTrait::find($id);
	
        return $trait;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreCharacterTrait $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCharacterTrait $request, $id)
    {             
	$trait = CharacterTrait::find($id);
	
        $trait->name = $request->name;
        $trait->description = $request->description;

        $trait->save();
        
       return response()->json($trait, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trait = CharacterTrait::find($id);
        
        $trait->delete();
        
        return response()->json(null, 204);
    }
}
