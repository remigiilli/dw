<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\URL;

use App\Http\Requests;

use App\SpecialQuality as SpecialQuality;

use App\Http\Requests\StoreSpecialQuality as StoreSpecialQuality;

class SpecialQualityController extends Controller
{
     public $extra = array(0 => 'No Adittional value', 1 => 'Adittional value');
    /**
     * Instantiate a new SpecialQualityController instance.
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
	$special_qualities = SpecialQuality::all();
	
        return view('special_qualities.index', ['special_qualities' => $special_qualities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	$special_quality = new SpecialQuality;
	
        return view('special_qualities.form', ['special_quality' => $special_quality, 'extra' => $this->extra]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSpecialQuality  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpecialQuality $request)
    {
        $special_quality = new SpecialQuality;

        $special_quality->name = $request->name;
        $special_quality->description = $request->description;
        $special_quality->extra = ($request->extra !== '') ? $request->extra : 0;
        
        $special_quality->save();
        
        return redirect('admin/specialqualities')->with('status', 'SpecialQuality created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	$special_quality = SpecialQuality::find($id);
	
        return view('special_qualities.show',  ['special_quality' => $special_quality]);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function justcontent($id)
    {
	$special_quality = SpecialQuality::find($id);
	
        return view('special_qualities.single',  ['special_quality' => $special_quality]);
    }    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	$special_quality = SpecialQuality::find($id);
	
        return view('special_qualities.form',  ['special_quality' => $special_quality, 'extra' => $this->extra]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreSpecialQuality  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSpecialQuality $request, $id)
    {
	$special_quality = SpecialQuality::find($id);
        $special_quality->name = $request->name;
        $special_quality->description = $request->description;
        $special_quality->extra = ($request->extra !== '') ? $request->extra : 0;
        
        $special_quality->save();    
        
        return redirect('admin/specialqualities')->with('status', 'SpecialQuality updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $special_quality = SpecialQuality::find($id);
        
        $special_quality->delete();
        
        return redirect('admin/specialqualities')->with('status', 'SpecialQuality deleted!');
    }
}
