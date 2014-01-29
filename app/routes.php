<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('login');
});

/**
 * Routes to display home page
 */
Route::get('home', function()
{
	return View::make('layout.master');
});

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * Managing user actions
 * Directing routes to correct controllers
 */
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

//validating user during login
Route::post('login',array('as'=>'login', 'uses'=>'UserController@validate'));

//loging a user out
Route::get('logout',array('as'=>'logout', 'uses'=>'UserController@logout'));

//display a form to add new user
Route::get('user/add',array('as'=>'adduser', 'uses'=>'UserController@create'));

//adding new user
Route::post('user/add',array('as'=>'adduser1', 'uses'=>'UserController@store'));

//viewing list of users
Route::get('user',array('as'=>'listuser', 'uses'=>'UserController@index'));

//display a form to edit users information
Route::get('user/edit/{id}',array('as'=>'edituser', 'uses'=>'UserController@edit'));

//editng users information
Route::post('user/edit/{id}',array('as'=>'edituser', 'uses'=>'UserController@update'));

//deleting user
Route::post('user/delete/{id}',array('as'=>'deleteuser', 'uses'=>'UserController@destroy'));

//display a system usage log for a user
Route::get('user/log/{id}',array('as'=>'userlog', 'uses'=>'UserController@show'));


//////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * Managing applicants actions
 * Directing routes to correct controllers
 */
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

//display a list of aplicants
Route::get('applicants',array('as'=>'listapplicant', 'uses'=>'ApplicantController@index'));

//display a list of aplicants
Route::get('applicant/{id}',array('as'=>'listapplicant', 'uses'=>'ApplicantController@show'));


//display a form to register new aplicant
Route::get('applicant/add',array('as'=>'addapplicant', 'uses'=>'ApplicantController@create'));

// register new aplicant
Route::post('applicant/add',array('as'=>'addapplicant1', 'uses'=>'ApplicantController@store'));

//display a form to register new aplicant bussiness
Route::get('applicant/{id}/add/bussness',array('as'=>'addapplicantbuss', 'uses'=>'BussinessController@create'));

//register new aplicant bussiness
Route::post('applicant/add/bussness',array('as'=>'addapplicantbuss1', 'uses'=>'BussinessController@store'));

//deleting an applicant
Route::post('applicant/delete/{id}',array('as'=>'deleteapp', 'uses'=>'ApplicantController@destroy'));
