<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Wargear as Wargear;
use App\WargearCategory as WargearCategory;

use App\Http\Requests\StoreWargear as StoreWargear;


class WargearController extends Controller
{
    public $renow_levels = array('' => '-', 'r' => 'Respected', 'd' => 'Distinguished', 'f' => 'Famed', 'h' => 'Hero');
    
    /**
     * Instantiate a new WeaponController instance.
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
	$wargear = Wargear::all();
	
        return view('wargear.index', ['wargear' => $wargear, 'renow_levels' => $this->renow_levels]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listing()
    {
	$wargear = Wargear::all()->sortBy('name');        
	
        return view('wargear.list', ['wargear' => $wargear, 'renow_levels' => $this->renow_levels]);
    }        
    
    /**
     * Display a listing of the resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function categoryListing($id)
    {
        $wargear_category = WargearCategory::find($id);
	$wargear = Wargear::where('wargear_category_id', $id)->get()->sortBy('name');        
	
        return view('wargear.list', ['wargear_category' => $wargear_category, 'wargear' => $wargear, 'renow_levels' => $this->renow_levels]);
    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	$wargear = new Wargear;
        
        $wargear_categories = WargearCategory::lists('name', 'id');
	
        return view('wargear.form', ['wargear' => $wargear, 'renow_levels' => $this->renow_levels, 'wargear_categories' => $wargear_categories]);

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
        $wargear->wargear_category_id = ($request->wargear_category_id) ? $request->wargear_category_id : null;
        
        $wargear->save();
        
        return redirect('admin/wargear')->with('status', 'Wargear created!');
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
	
        return view('wargear.show',  ['wargear_item' => $wargear, 'renow_levels' => $this->renow_levels]);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function justcontent($id)
    {
	$wargear = Wargear::find($id);
	
        return view('wargear.single',  ['wargear_item' => $wargear, 'renow_levels' => $this->renow_levels]);
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
        
        $wargear_categories = WargearCategory::lists('name', 'id');

        return view('wargear.form', ['wargear' => $wargear, 'renow_levels' => $this->renow_levels, 'wargear_categories' => $wargear_categories]);

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
        $wargear->wargear_category_id = ($request->wargear_category_id) ? $request->wargear_category_id : null;        
        
        $wargear->save();
        
        return redirect('admin/wargear')->with('status', 'Wargear updated!');
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
        
        return redirect('admin/wargear')->with('status', 'Wargear deleted!');
    }
}
