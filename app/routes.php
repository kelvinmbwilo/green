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
	return View::make('dashboard');
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

//displaying applicant transactions
Route::get('applicant/transactions/{id}',array('uses'=>'ApplicantController@savings'));



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

//processing a return form
Route::post("application/process/{id}",array("uses"=>"ApplicationController@processreturnform"));

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

/**
 * Managing Groups
 * Using GroupController
 */

//listing groups
Route::get("groups",array("uses"=>"GroupController@index"));

//displaying a form to add a group
Route::get("groups/add",array("uses"=>"GroupController@create"));

//adding a group
Route::post("groups/add",array("uses"=>"GroupController@store"));

///////////////////////////////////////////////////////////////////
////////////// Group Members /////////////////////////////////////
//////////////////////////////////////////////////////////////////
//Showing group info
Route::get("groups/{id}",array("uses"=>"GroupController@show"));


//listing group members
Route::get("groups/members/{id}",array("uses"=>"GroupController@members"));

//adding a group member from a form
Route::post("groups/{id}/member/add",array("uses"=>"GroupController@addMember"));

//display a list of group member
Route::get("group/{id}/member/list",array("uses"=>"GroupController@listMember"));

//displaying a form to add a ne group member that wa not on the system originaly
Route::get("group/{id}/add/new",array("uses"=>"GroupController@addnew"));

//display a list to add a group member from list
Route::get("group/{id}/add/list",array("uses"=>"GroupController@addlist"));

//adding a group member from list
Route::post("group/{id}/add/list/{uid}",array("uses"=>"GroupController@memberfromlist"));

//display a form to edit group members
Route::get("group/{id}/member/edit/{uid}",array("uses"=>"GroupController@editmember"));

//editing group members
Route::post("group/{id}/member/edit/{uid}",array("uses"=>"GroupController@editmember1"));

//editing group members
Route::post("group/member/remove/{uid}",array("uses"=>"GroupController@removemember"));

//displaying a form to add group members savings
Route::get("group/{id}/member/savings/{uid}",array("uses"=>"GroupController@membersaving"));

//adding group members savings
Route::post("group/{id}/member/savings/{uid}",array("uses"=>"GroupController@addmembersaving"));

///////////////////////////////////////////////////////////////
/////////////Group Applications ////////////////////////////////
///////////////////////////////////////////////////////////////
//adding application
Route::get("group/{id}/add/application",array("uses"=>"GroupAppController@index"));

//adding application
Route::post("group/{id}/add/application",array("uses"=>"GroupAppController@store"));

//adding application
Route::get("group/application/{id}",array("uses"=>"GroupAppController@show"));

//showing a group application information
Route::get("group/application/show/{id}",function($id){
    $applicat = GroupApplication::find($id);
    return View::make("groupapp.info",compact("applicat"));
});

//showing a group application information
Route::get("group/{id}/application/list",function($id){
    $group = Groups::find($id);
    return View::make("groupapp.list",compact("group"));
});

//showing a group application information
Route::get("group/application/add/{id}",function($id){
    $group = Groups::find($id);
    return View::make("groupapp.add",compact("group"));
});

//showing a group application information
Route::get("group/application/edit/{id}",function($id){
    $applicat = GroupApplication::find($id);
    return View::make("groupapp.edit",compact("applicat"));
});

//editing a group application information
Route::post("group/application/edit/{id}",array("uses"=>"GroupAppController@update"));

//deleting a group application information
Route::post("group/application/delete/{id}",array("uses"=>"GroupAppController@destroy"));

//showing processing for a group
Route::get("group/application/process/show/{id}",function($id){
    $applicat = GroupApplication::find($id);
    return View::make("groupapp.proccess",compact("applicat"));
});

//showing processing for a group
Route::get("group/application/grant/{id}",function($id){
    $applicat = GroupApplication::find($id);
    return View::make("groupapp.grant",compact("applicat"));
});

//showing return process for a group
Route::get("group/application/return/{id}",function($id){
    $applicat = GroupApplication::find($id);
    return View::make("groupapp.returns",compact("applicat"));
});

//declining application
Route::post("group/application/decline/{id}",array("uses"=>"GroupAppController@declineloan"));

//granting application
Route::post("group/application/grant/{id}",array("uses"=>"GroupAppController@grantloan"));

//granting application
Route::post("group/loan/process/{id}",array("uses"=>"GroupAppController@processreturnform"));


///////////////////////////////////////////////////////////////
/////////////parameter settings ////////////////////////////////
///////////////////////////////////////////////////////////////
//displaying an index page
Route::get("settings/parameters",array("uses"=>"ParameterController@index"));

//adding a parameter
Route::post("settings/parameter/add",array("uses"=>"ParameterController@store"));

//editing a parameter
Route::get("settings/parameter/list",array("uses"=>"ParameterController@show"));

//editing a parameter
Route::get("settings/parameter/edit/{id}",array("uses"=>"ParameterController@edit"));

//editing a parameter
Route::post("settings/parameter/edit/{id}",array("uses"=>"ParameterController@update"));

//deleting a parameter
Route::post("settings/parameter/delete/{id}",array("uses"=>"ParameterController@destroy"));


///////////////////////////////////////////////////////////////
/////////////parameter settings ////////////////////////////////
///////////////////////////////////////////////////////////////
//displaying an index page
Route::get("applicant/{id}/balance_sheet/",array("uses"=>"BalanceSheetController@index"));

//adding a balance sheet
Route::get("applicant/{id}/balance_sheet/add",array("uses"=>"BalanceSheetController@create"));

//adding a parameter
Route::post("applicant/{id}/balance_sheet/add",array("uses"=>"BalanceSheetController@store"));

//list all available cash flows
Route::get("applicant/{id}/balance_sheet/list",array("uses"=>"BalanceSheetController@show"));

//deleting a parameter
Route::post("applicant/{id}/balance_sheet/delete/{yr}",array("uses"=>"BalanceSheetController@destroy"));

//checking if balance sheet fot that year existed
Route::post("applicant/{id}/balance_sheet/check/{yr}",array("uses"=>"BalanceSheetController@check"));

///////////////////////////////////////////////////////////////
/////////////Cash Flow parameter settings ////////////////////////////////
///////////////////////////////////////////////////////////////
//displaying an Cash Flow parameter index page
Route::get("settings/cashflow/parameters",array("uses"=>"CashParameterController@index"));

//adding a Cash Flow parameter
Route::post("settings/cashflow/parameter/add",array("uses"=>"CashParameterController@store"));

//editing a Cash Flow parameter
Route::get("settings/cashflow/parameter/list",array("uses"=>"CashParameterController@show"));

//editing a Cash Flow parameter
Route::get("settings/cashflow/parameter/edit/{id}",array("uses"=>"CashParameterController@edit"));

//editing a Cash Flow parameter
Route::post("settings/cashflow/parameter/edit/{id}",array("uses"=>"CashParameterController@update"));

//deleting a Cash Flow parameter
Route::post("settings/cashflow/parameter/delete/{id}",array("uses"=>"CashParameterController@destroy"));

//checking if balance sheet fot that year existed
Route::post("applicant/{id}/cashflow/check/{yr}",array("uses"=>"CashFlowController@check"));

///////////////////////////////////////////////////////////////
/////////////Cash flow settings ////////////////////////////////
///////////////////////////////////////////////////////////////
//displaying an index page
Route::get("applicant/{id}/cashflow/",array("uses"=>"CashFlowController@index"));

//adding a balance sheet
Route::get("applicant/{id}/cashflow/add",array("uses"=>"CashFlowController@create"));

//adding a parameter
Route::post("applicant/{id}/cashflow/add",array("uses"=>"CashFlowController@store"));

//editing a parameter
Route::get("applicant/{id}/cashflow/list",array("uses"=>"CashFlowController@show"));

//editing a parameter
Route::get("applicant/{id}/cashflow/edit/{bid}",array("uses"=>"CashFlowController@edit"));

//editing a parameter
Route::post("applicant/{id}/cashflow/edit/{bid}",array("uses"=>"CashFlowController@update"));

//deleting a parameter
Route::post("applicant/{id}/cashflow/delete/{yr}",array("uses"=>"CashFlowController@destroy"));

///////////////////////////////////////////////////////////////
/////////////Income statement settings ////////////////////////////////
///////////////////////////////////////////////////////////////
//displaying an index page
Route::get("applicant/{id}/income/",array("uses"=>"IncomeController@index"));

//adding a balance sheet
Route::get("applicant/{id}/income/add",array("uses"=>"IncomeController@create"));

//adding a parameter
Route::post("applicant/{id}/income/add",array("uses"=>"IncomeController@store"));

//editing a parameter
Route::get("applicant/{id}/income/list",array("uses"=>"IncomeController@show"));

//editing a parameter
Route::get("applicant/{id}/income/edit/{bid}",array("uses"=>"IncomeController@edit"));

//editing a parameter
Route::post("applicant/{id}/income/edit/{bid}",array("uses"=>"IncomeController@update"));

//deleting a parameter
Route::post("applicant/{id}/income/delete/{yr}",array("uses"=>"IncomeController@destroy"));
