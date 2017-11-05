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
Route::get('/home', [
//     'middleware' => 'auth',
//     'uses' => 'AppController@index'
]);
Route::resource('characters', 'CharacterController', [
//     'middleware' => 'auth'
]);
Route::resource('talents', 'TalentController', [
//     'middleware' => 'auth'
]);
Route::get('/talents/{id}/justcontent', 'TalentController@justcontent');
Route::resource('talentoptions', 'TalentOptionController', [
//     'middleware' => 'auth'
]);
Route::resource('skillgroups', 'SkillGroupController', [
//     'middleware' => 'auth'
]);
Route::resource('skills', 'SkillController', [
//     'middleware' => 'auth'
]);
Route::get('/skills/{id}/justcontent', 'SkillController@justcontent');
Route::resource('traits', 'TraitController', [
//     'middleware' => 'auth'
]);
Route::get('/traits/{id}/justcontent', 'TraitController@justcontent');
Route::resource('psychicpowers', 'PsychicPowerController', [
//     'middleware' => 'auth'
]);
Route::get('/psychicpowers/{id}/justcontent', 'PsychicPowerController@justcontent');
Route::resource('wargear', 'WargearController', [
//     'middleware' => 'auth'
]);
Route::get('/wargear/{id}/justcontent', 'WargearController@justcontent');
Route::resource('wargearcategories', 'WargearCategoryController', [
//     'middleware' => 'auth'
]);
Route::resource('weapons', 'WeaponController', [
//     'middleware' => 'auth'
]);
Route::get('/weapons/{id}/justcontent', 'WeaponController@justcontent');
Route::resource('weaponcategories', 'WeaponCategoryController', [
//     'middleware' => 'auth'
]);
Route::resource('specialqualities', 'SpecialQualityController', [
//     'middleware' => 'auth'
]);
Route::get('/specialqualities/{id}/justcontent', 'SpecialQualityController@justcontent');

//Route::auth();

Route::get('/', 'HomeController@index');
Route::post('/search', 'HomeController@search');

