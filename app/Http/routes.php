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
Route::resource('/admin/characters', 'CharacterController', [
//     'middleware' => 'auth'
]);

Route::resource('/admin/talents', 'TalentController', [
//     'middleware' => 'auth'
]);
Route::get('/talents/{id}/justcontent', 'TalentController@justcontent');
Route::get('/talents', [
    'as' => 'talents.listing',
    'uses' => 'TalentController@listing'
]);
Route::resource('talentoptions', 'TalentOptionController', [
//     'middleware' => 'auth'
]);

Route::resource('/admin/skillgroups', 'SkillGroupController', [
//     'middleware' => 'auth'
]);

Route::resource('/admin/skills', 'SkillController', [
//     'middleware' => 'auth'
]);
Route::get('/skills/{id}/justcontent', 'SkillController@justcontent');
Route::get('/skills', [
    'as' => 'skills.listing',
    'uses' => 'SkillController@listing'
]);

Route::resource('/admin/traits', 'TraitController', [
//     'middleware' => 'auth'
]);
Route::get('/traits/{id}/justcontent', 'TraitController@justcontent');
Route::get('/traits', [
    'as' => 'traits.listing',
    'uses' => 'TraitController@listing'
]);

Route::resource('psychicpowers', 'PsychicPowerController', [
//     'middleware' => 'auth'
]);
Route::get('/psychicpowers/{id}/justcontent', 'PsychicPowerController@justcontent');

Route::resource('/admin/psychicpowercategories', 'PsychicPowerCategoryController', [
//     'middleware' => 'auth'
]);
Route::get('/psychicpower/{id}', [
    'as' => 'psychicpower.listing',
    'uses' => 'PsychicPowerController@listing'
]);

Route::resource('/admin/wargear', 'WargearController', [
//     'middleware' => 'auth'
]);
Route::get('/wargear/{id}/justcontent', 'WargearController@justcontent');

Route::resource('/admin/wargearcategories', 'WargearCategoryController', [
//     'middleware' => 'auth'
]);
Route::get('/wargear/{id}', [
    'as' => 'wargear.listing',
    'uses' => 'WargearController@listing'
]);

Route::resource('/admin/weapons', 'WeaponController', [
//     'middleware' => 'auth'
]);
Route::get('/weapons/{id}/justcontent', 'WeaponController@justcontent');

Route::resource('/admin/weaponcategories', 'WeaponCategoryController', [
//     'middleware' => 'auth'
]);
Route::get('/weapon/{id}', [
    'as' => 'weapon.listing',
    'uses' => 'WeaponController@listing'
]);

Route::resource('/admin/specialqualities', 'SpecialQualityController', [
//     'middleware' => 'auth'
]);
Route::get('/specialqualities/{id}/justcontent', 'SpecialQualityController@justcontent');

//Route::auth();

Route::get('/', 'HomeController@index');
Route::post('/search', 'HomeController@search');

