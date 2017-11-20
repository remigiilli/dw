<?php

namespace App\Http\Controllers;

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
	
        return view('talents.index', ['talents' => $talents]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listing()
    {
	$talents = Talent::all();
	
        return view('talents.list', ['talents' => $talents]);
    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	$talent = new Talent;
	
	$talent_options = TalentOption::lists('name', 'id');
	
        return view('talents.form', ['talent' => $talent, 'talent_options' => $talent_options]);
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
        
        return redirect('admin/talents')->with('status', 'Talent created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	$talent = Talent::find($id);
	
        return view('talents.show',  ['talent' => $talent]);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function justcontent($id)
    {
	$talent = Talent::find($id);
	
        return view('talents.single',  ['talent' => $talent]);
    }       
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function byName($name)
    {
	 $talent = Talent::where('name', 'like', $name)	      
	      ->first();
	
        return view('talents.single',  ['talent' => $talent]);
    }           

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	$talent = Talent::find($id);

	$talent_options = TalentOption::lists('name', 'id');
	
        return view('talents.form',  ['talent' => $talent, 'talent_options' => $talent_options]);
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
        
        return redirect('admin/talents')->with('status', 'Talent updated!');
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
        
        return redirect('admin/talents')->with('status', 'Talent deleted!');
    }
}
