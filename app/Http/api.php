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
Route::group(['middleware' => ['cors', 'auth:api']], function() {
    Route::resource('talents', 'TalentController');
    Route::resource('talentoptions', 'TalentOptionController');
    Route::resource('skillgroups', 'SkillGroupController');
    Route::resource('skills', 'SkillController');
    Route::resource('traits', 'TraitController');
    Route::resource('/psychicpowercategories', 'PsychicPowerCategoryController');
    Route::resource('psychicpowers', 'PsychicPowerController');
    Route::resource('weaponcategories', 'WeaponCategoryController');
    Route::resource('weapons', 'WeaponController');
    Route::resource('specialqualities', 'SpecialQualityController');
    Route::resource('wargearcategories', 'WargearCategoryController');
    Route::resource('wargear', 'WargearController');    
});
/*Route::resource('talents', 'TalentController', [
    'middleware' => 'cors'
]);*/
