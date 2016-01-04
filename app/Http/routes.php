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

//Route::get('/', ['uses' => 'AdminController@index']);

Route::resource('articles', 'ArticlesController');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


//administration panel routes
Route::get('admin', function()
{
    return view('admin');
});

Route::resource('jobs', 'JobsController');
Route::get('/jobs/delete/{id}', ['uses' =>'JobsController@destroy']);
Route::resource('users', 'UsersController');
Route::resource('achievements', 'AchievementsController');
Route::get('/achievements/create/{id}', ['uses' =>'AchievementsController@create']);
Route::get('/achievements/delete/{id}', ['uses' =>'AchievementsController@destroy']);

Route::resource('educations', 'EducationsController');
Route::get('/educations/delete/{id}', ['uses' =>'EducationsController@destroy']);

Route::resource('skills', 'SkillsController');
Route::get('/skills/delete/{id}', ['uses' =>'SkillsController@destroy']);

Route::resource('skillcategories', 'SkillCategoriesController');
Route::get('/skillcategories/delete/{id}', ['uses' =>'SkillCategoriesController@destroy']);

Route::get('/admin/home',['uses' => 'AdminController@index']);
Route::get('/table', function()
    {
        return view('table.index');
    });
if (file_exists(__DIR__.'/controllers/Server.php')) {
    Route::get('/deploy', 'Server@deploy');//deploy the production server
}
