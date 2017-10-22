<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Wargear as Wargear;

use App\Http\Requests\StoreWargear as StoreWargear;


class WargearController extends Controller
{
    public $renow_levels = array('' => '-', 'r' => 'Respected', 'd' => 'Distinguished', 'f' => 'Famed', 'h' => 'Hero');
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	$wargear = Wargear::all();
	
        return view('wargear.index', ['wargear' => $wargear, 'renow_levels' => $this->renow_levels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	$wargear = new Wargear;
	
        return view('wargear.form', ['wargear' => $wargear, 'renow_levels' => $this->renow_levels]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreWargear  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWargear $request)
    {
        $wargear = new Wargear;

        $wargear->name = $request->name;
        $wargear->description = $request->description;
        $wargear->weight = $request->weight;
        $wargear->req = ($request->req !== '') ? $request->req : null;
        $wargear->renown = $request->renown;
        
        $wargear->save();
        
        return redirect('wargear')->with('status', 'Wargear created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	$wargear = Wargear::find($id);
	
        return view('wargear.show',  ['wargear' => $wargear, 'renow_levels' => $this->renow_levels]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	$wargear = Wargear::find($id);

        return view('wargear.form', ['wargear' => $wargear, 'renow_levels' => $this->renow_levels]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\StoreWargear
     */
    public function update(StoreWargear $request, $id)
    {
	$wargear = Wargear::find($id);
        $wargear->name = $request->name;
        $wargear->description = $request->description;
        $wargear->weight = $request->weight;
        $wargear->req = ($request->req !== '') ? $request->req : null;
        $wargear->renown = $request->renown;
        
        $wargear->save();
        
        return redirect('wargear')->with('status', 'Wargear updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wargear = Wargear::find($id);
        
        $wargear->delete();
        
        return redirect('wargear')->with('status', 'Wargear deleted!');
    }
}
