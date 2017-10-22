<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::resource('talents', 'TalentController', [

]);
Route::resource('talentoptions', 'TalentOptionController', [

]);
Route::resource('skillgroups', 'SkillGroupController', [

]);
Route::resource('skills', 'SkillController', [

]);
Route::resource('traits', 'TraitController', [

]);
Route::resource('psychicpowers', 'PsychicPowerController', [

]);
Route::resource('weapons', 'WeaponController', [

]);
Route::resource('specialqualities', 'SpecialQualityController', [

]);
