<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Chapter as Chapter;
use App\SquadModeAbility as SquadModeAbility;
use App\SoloModeAbility as SoloModeAbility;
use App\Weapon as Weapon;
use App\Wargear as Wargear;
use App\PsychicPower as PsychicPower;

use App\Http\Requests\StoreChapter as StoreChapter;

class ChapterController extends Controller
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
	$chapters = Chapter::all();
	
        return view('chapters.index', ['chapters' => $chapters]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listing()
    {
	$chapters = Chapter::all();
	
        return view('chapters.index', ['chapters' => $chapters]);
    }       

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	$chapter = new Chapter;
	
        return view('chapters.form', ['chapter' => $chapter]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \pp\Http\Requests\StoreChapter  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChapter $request)
    {  	
        $chapter = new Chapter;

        $chapter->name = $request->name;
        $chapter->creation = $request->creation;
        $chapter->demeanour_title = $request->demeanour_title;
        $chapter->demeanour_description = $request->demeanour_description;          
        $chapter->curse_title = $request->curse_title;
        $chapter->curse_description = $request->curse_description;           

        $chapter->save();
        
        return redirect('admin/chapters')->with('status', 'Chapter created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	$chapter = Chapter::find($id);
	
        return view('chapters.show',  ['chapter' => $chapter]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	$chapter = Chapter::find($id);
	
        return view('chapters.form',  ['chapter' => $chapter]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \pp\Http\Requests\StoreChapter  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreChapter $request, $id)
    {
	$chapter = Chapter::find($id);
        $chapter->name = $request->name;
        $chapter->creation = $request->creation;
        $chapter->demeanour_title = $request->demeanour_title;
        $chapter->demeanour_description = $request->demeanour_description;          
        $chapter->curse_title = $request->curse_title;
        $chapter->curse_description = $request->curse_description;          

        $chapter->save();
        
        return redirect('admin/chapters')->with('status', 'Chapter updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chapter = Chapter::find($id);
        
        $chapter->delete();
        
        return redirect('admin/chapters')->with('status', 'Chapter deleted!');
    }
}
