<?php

class ApplicantController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
                    $app = Applicants::all();
                    return View::make("applicant.manage",  compact("app"));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{$app = Applicants::all();
                    return View::make('applicant.add');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
                    $app = Applicants::create(array(
                        "firstname"=>Input::get("firstname"), 
                        "middlename"=>Input::get("middlename"), 
                        "lastname"=>Input::get("lastname"), 
                        "phone"=>Input::get("phone"), 
                        "postal_address"=>Input::get("postal"), 
                        "marital_status"=>Input::get("marital"), 
                        "gender"=>Input::get("gender"),
                        "bitrhdate"=>Input::get("birthdate"),
                        "family_size"=>Input::get("family"),
                        "residense"=>Input::get("residense"),
                        "user_id"  =>Auth::user()->id
                    ));
                    $name = $app->firstname." ".$app->middlename." ".$app->lastname;
                    Logs::create(array(
                                "user_id"=>  Auth::user()->id,
                                "action"  =>"Register loan applicant named ".$name
                            ));
                    Return  View::make("bussness.add",  compact("app"))->with("msg", $name. " Registered Successful");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
                    $app = Applicants::find($id);
                    return View::make("applicant.show",  compact("app"));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$app = Applicants::find($id);
                                return View::make("applicant.edit",  compact("app"));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
                       $app = Applicants::find($id);
                       $app->firstname = Input::get("firstname");
                       $app->middlename = Input::get("middlename");
                       $app->gender = Input::get("gender");
                       $app->bitrhdate = Input::get("birthdate");
                       $app->phone = Input::get("phone");
                       $app->postal_address = Input::get("postal");
                       $app->marital_status = Input::get("marital");
                       $app->family_size = Input::get("family");
                       $app->lastname = Input::get("lastname");
                       $app->residense = Input::get("residense");
                       $app->save();
                       $name = $app->firstname." ".$app->middlename." ".$app->lastname;
                    Logs::create(array(
                                "user_id"=>  Auth::user()->id,
                                "action"  =>"Update loan applicant named ".$name
                            ));
                        return View::make("applicant.edit",  compact("app"))->with("msg", " Applicant Information Updated  Successful");;
                      
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
                        $app = Applicants::find($id);
                        $name = $app->firstname." ".$app->middlename." ".$app->lastname;
                        Logs::create(array(
                                "user_id"=>  Auth::user()->id,
                                "action"  =>"Delete loan applicant named ".$name
                            ));
                        $app->delete();
	}

        
      
}