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
Route::resource("userss","UserController");

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
 * @ApplicantController
 */
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

//display a list of aplicants
Route::get('applicants',array('as'=>'listapplicant', 'uses'=>'ApplicantController@index'));

//display a form to register new aplicant
Route::get('applicant/add',array('as'=>'addapplicant', 'uses'=>'ApplicantController@create'));

//display a form to edit aplicant
Route::get('applicant/edit/{id}',array('as'=>'editapplicant', 'uses'=>'ApplicantController@edit'));

// updating aplicant information
Route::post('applicant/edit/{id}',array('as'=>'editapplicant1', 'uses'=>'ApplicantController@update'));


// register new aplicant
Route::post('applicant/add',array('as'=>'addapplicant1', 'uses'=>'ApplicantController@store'));


//deleting an applicant
Route::post('applicant/delete/{id}',array('as'=>'deleteapp', 'uses'=>'ApplicantController@destroy'));

//display a list of aplicants
Route::get('applicant/{id}',array('as'=>'listapplicant', 'uses'=>'ApplicantController@show'));

/*
 * Dealing with applicant bussiness
 * @BussnessController
 */
//display a form to register new aplicant bussiness
Route::get('applicant/{id}/add/bussness',array('as'=>'addapplicantbuss', 'uses'=>'BussinessController@create'));

//register new aplicant bussiness
Route::post('applicant/add/bussness',array('as'=>'addapplicantbuss1', 'uses'=>'BussinessController@store'));

//display a form to update aplicant bussiness information
Route::get('applicant/edit/bussness/{id}',array('as'=>'editapplicantbuss', 'uses'=>'BussinessController@edit'));

//updating aplicant bussiness information
Route::post('applicant/edit/bussness/{id}',array('as'=>'editapplicantbuss1', 'uses'=>'BussinessController@update'));

//view one aplicant bussiness
Route::get('applicant/bussness/{id}',array('as'=>'viewapplicantbuss1', 'uses'=>'BussinessController@show'));


/*
 * Dealing with applicant loan Applications
 * @ApplicationController
 */
//display aplicant loan application information
Route::get('applicant/application/{id}',array('as'=>'viewapplication', 'uses'=>'ApplicationController@show'));

//display a form to register new aplicant loan application
Route::get('applicant/{id}/add/application',array('as'=>'addapplicaion', 'uses'=>'ApplicationController@create'));

// register new aplicant loan application
Route::post('applicant/add/application',array('as'=>'addapplicaion1', 'uses'=>'ApplicationController@store'));

// register new aplicant loan application
Route::get('applicant/edit/application/{id}',array('as'=>'editapplicaion1', 'uses'=>'ApplicationController@edit'));

//register new aplicant loan application
Route::post('applicant/edit/application/{id}',array('as'=>'editapplicaion1', 'uses'=>'ApplicationController@update'));


//displaying a form to update aplicant sponsor information
Route::get('applicant/edit/application/sponsor/{id}',array('uses'=>'ApplicationController@updatesponsor'));

//updating aplicant sponsor information
Route::post('applicant/edit/application/sponsor/{id}',array('uses'=>'ApplicationController@changesponsor'));

//displaying a form to add aplicant sponsor information
Route::get('applicant/add/application/sponsor/{id}',array( 'uses'=>'ApplicationController@addsponsor'));

//adding aplicant sponsor information
Route::post('applicant/add/application/sponsor/{id}',array('uses'=>'ApplicationController@storesponsor'));

//declining application
Route::post("application/decline/{id}",array("uses"=>"ApplicationController@declineloan"));

//reshowing application application
Route::get("application/process/show/{id}",function($id){
    $applicat = Applications::find($id);
    return View::make("application.process",compact("applicat"));
});

Route::get("application/show/{id}",function($id){
    $applicat = Applications::find($id);
    return View::make("application.info",compact("applicat"));
});

Route::get("application/grant/{id}",function($id){
    $applicat = Applications::find($id);
    return View::make("application.grant",compact("applicat"));
});

//granting application
Route::post("application/grant/{id}",array("uses"=>"ApplicationController@grantloan"));

//declining application
Route::post("application/checkgranted/{val}/{am}/{to}/{dur}",array("uses"=>"ApplicationController@checkgranted"));


/**
 * Managing Loans
 * Directing to Loans Controller
 */
//displaying index page for loans
Route::get("loans",array("uses"=>"LoanController@index"));

//loading a list of loans
Route::get("loans/list",array("uses"=>"LoanController@lists"));

//displaying a form to edit a loan
Route::get("loans/edit/{id}",array("uses"=>"LoanController@edit"));

//updating loan information
Route::post("loans/edit/{id}",array("uses"=>"LoanController@update"));

//deleting a loan
Route::post("loans/delete/{id}",array("uses"=>"LoanController@destroy"));

//displaying a form to add a loan
Route::post("loans/add",array("uses"=>"LoanController@store"));

/**
 * Managing Rules
 * Using RulesController
 */
//displaying index page for rules
Route::get("rules",array("uses"=>"RulesController@index"));

//loading a list of rules
Route::get("rules/list",array("uses"=>"RulesController@lists"));

//displaying a form to edit a rules
Route::get("rules/edit/{id}",array("uses"=>"RulesController@edit"));

//displaying a form to edit a rules
Route::post("rules/edit/{id}",array("uses"=>"RulesController@update"));

//deleting a rules
Route::post("rules/delete/{id}",array("uses"=>"RulesController@destroy"));

//displaying a form to add a rules
Route::post("rules/add",array("uses"=>"RulesController@store"));