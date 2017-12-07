<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\URL;

use App\Http\Requests;

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
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	$traits = CharacterTrait::all();
	
        return view('traits.index', ['traits' => $traits]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listing()
    {
	$traits = CharacterTrait::all()->sortBy('name');
                	
        return view('traits.list', ['traits' => $traits]);
    }        

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	$trait = new CharacterTrait;
	
        return view('traits.form', ['trait' => $trait]);
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
        
        return redirect('admin/traits')->with('status', 'Trait created!');
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
	
        return view('traits.show',  ['trait' => $trait]);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function justcontent($id)
    {
	$trait = CharacterTrait::find($id);
	
        return view('traits.single',  ['trait' => $trait]);
    }     

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	$trait = CharacterTrait::find($id);
	
        return view('traits.form',  ['trait' => $trait]);
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
        
        return redirect('admin/traits')->with('status', 'Trait updated!');
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
        
        return redirect('admin/traits')->with('status', 'Trait deleted!');
    }
}
