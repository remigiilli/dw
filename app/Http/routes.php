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
Route::resource('talentoptions', 'TalentOptionController', [
//     'middleware' => 'auth'
]);
Route::resource('skillgroups', 'SkillGroupController', [
//     'middleware' => 'auth'
]);
Route::resource('skills', 'SkillController', [
//     'middleware' => 'auth'
]);
Route::resource('traits', 'TraitController', [
//     'middleware' => 'auth'
]);
Route::resource('psychicpowers', 'PsychicPowerController', [
//     'middleware' => 'auth'
]);
Route::resource('wargear', 'WargearController', [
//     'middleware' => 'auth'
]);
Route::resource('wargearcategories', 'WargearCategoryController', [
//     'middleware' => 'auth'
]);
Route::resource('weapons', 'WeaponController', [
//     'middleware' => 'auth'
]);
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

