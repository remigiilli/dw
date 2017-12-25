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
Route::resource('/admin/characters', 'CharacterController');
Route::resource('/admin/chapters', 'ChapterController');
Route::resource('/admin/psychicpowers', 'PsychicPowerController');
Route::resource('/admin/psychicpowercategories', 'PsychicPowerCategoryController');
Route::resource('/admin/skills', 'SkillController');
Route::resource('/admin/skillgroups', 'SkillGroupController');
Route::resource('/admin/solomodeabilities', 'SoloModeAbilityController');
Route::resource('/admin/specialqualities', 'SpecialQualityController');
Route::resource('/admin/specialabilities', 'SpecialAbilityController');
Route::resource('/admin/specialities', 'SpecialityController');
Route::resource('/admin/squadmodeabilities', 'SquadModeAbilityController');
Route::resource('/admin/talents', 'TalentController');
Route::resource('/admin/talentoptions', 'TalentOptionController');
Route::resource('/admin/traits', 'TraitController');
Route::resource('/admin/users', 'UserController');
Route::resource('/admin/weapons', 'WeaponController');
Route::resource('/admin/weaponcategories', 'WeaponCategoryController');
Route::resource('/admin/wargear', 'WargearController');
Route::resource('/admin/wargearcategories', 'WargearCategoryController');

Route::get('/chapters/{id}', [
    'as' => 'chapters.listing',
    'uses' => 'ChapterController@show'
]);

Route::get('/psychicpowers/{id}/justcontent', 'PsychicPowerController@justcontent');
Route::get('/psychicpowers', [
    'as' => 'psychicpowers.listing',
    'uses' => 'PsychicPowerController@listing'
]);
Route::get('/psychicpowers/{id}', [
    'as' => 'psychicpowers.categorylisting',
    'uses' => 'PsychicPowerController@categoryListing'
]);

Route::get('/skills/{id}/justcontent', 'SkillController@justcontent');
Route::get('/skills/byname/{name}', 'SkillController@byName');
Route::get('/skills', [
    'as' => 'skills.listing',
    'uses' => 'SkillController@listing'
]);

Route::get('/skillgroups/byname/{name}', 'SkillGroupController@byName');

Route::resource('/specialabilities/{id}/justcontent', 'SpecialAbilityController@justcontent');

Route::get('/specialqualities/{id}/justcontent', 'SpecialQualityController@justcontent');

Route::get('/talents/{id}/justcontent', 'TalentController@justcontent');
Route::get('/talents/byname/{name}', 'TalentController@byName');
Route::get('/talents', [
    'as' => 'talents.listing',
    'uses' => 'TalentController@listing'
]);

Route::get('/traits/{id}/justcontent', 'TraitController@justcontent');
Route::get('/traits', [
    'as' => 'traits.listing',
    'uses' => 'TraitController@listing'
]);

Route::get('/weapons/{id}/justcontent', 'WeaponController@justcontent');
Route::get('/weapons', [
    'as' => 'weapons.listing',
    'uses' => 'WeaponController@listing'
]);
Route::get('/weapons/{id}', [
    'as' => 'weapons.categorylisting',
    'uses' => 'WeaponController@categoryListing'
]);

Route::get('/wargear/{id}/justcontent', 'WargearController@justcontent');
Route::get('/wargear', [
    'as' => 'wargear.listing',
    'uses' => 'WargearController@listing'
]);
Route::get('/wargear/{id}', [
    'as' => 'wargear.categorylisting',
    'uses' => 'WargearController@categoryListing'
]);

Route::auth();

Route::get('/', 'HomeController@index');
Route::get('/mouse', 'HomeController@mouse');
Route::get('/andee', 'HomeController@andee');
Route::get('/zack', 'HomeController@zack');
Route::get('/joder', 'HomeController@joder');
Route::get('/garreth', 'HomeController@garreth');

Route::post('/search', 'HomeController@search');