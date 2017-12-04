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
    'middleware' => 'cors'
]);
Route::resource('talentoptions', 'TalentOptionController', [
    'middleware' => 'cors'
]);
Route::resource('skillgroups', 'SkillGroupController', [
    'middleware' => 'cors'
]);
Route::resource('skills', 'SkillController', [
    'middleware' => 'cors'
]);
Route::resource('traits', 'TraitController', [
    'middleware' => 'cors'
]);
Route::resource('/psychicpowercategories', 'PsychicPowerCategoryController', [
    'middleware' => 'cors'
]);
Route::resource('psychicpowers', 'PsychicPowerController', [
    'middleware' => 'cors'
]);
Route::resource('weaponcategories', 'WeaponCategoryController', [
    'middleware' => 'cors'
]);
Route::resource('weapons', 'WeaponController', [
    'middleware' => 'cors'
]);
Route::resource('specialqualities', 'SpecialQualityController', [
    'middleware' => 'cors'
]);
Route::resource('wargearcategories', 'WargearCategoryController', [
    'middleware' => 'cors'
]);
Route::resource('wargear', 'WargearController', [
    'middleware' => 'cors'
]);
