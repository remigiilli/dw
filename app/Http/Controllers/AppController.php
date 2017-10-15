<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\URL;

use App\Http\Requests;

use App\Skill as Skill;
use App\SkillGroup as SkillGroup;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	$skills = Skill::all();
	
        return view('index', ['skills' => $skills]);
    }
}
