<?php

namespace App\Http\Controllers;

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
	
        return view('talent_options.index', ['talent_options' => $talent_options]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	$talent_option = new TalentOption;
	
        return view('talent_options.form', ['talent_option' => $talent_option]);
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

        return redirect('admin/talentoptions')->with('status', 'TalentOption created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	$talent_option = TalentOption::find($id);
	
        return view('talent_options.show',  ['talent_option' => $talent_option]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	$talent_option = TalentOption::find($id);
	
        return view('talent_options.form',  ['talent_option' => $talent_option]);
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
        
        return redirect('admin/talentoptions')->with('status', 'TalentOption updated!');
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
        
        return redirect('admin/talentoptions')->with('status', 'TalentOption deleted!');
    }
}
