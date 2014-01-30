<?php

class ApplicationController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
                                $app = Applicants::find($id);
		return View::make("application.add",  compact("app"));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
                    $applicatt = Applications::create(array(
                            "applicant_id" => Input::get("id"),
                            "bussiness_id" => Input::get("business"),
                            "applied_amount"=> Input::get("applied"),
                            "comments"=> Input::get("comments"),
                            "status"=> "pending",
                            "user_id" => Auth::user()->id
                    ));
                    $app = Applicants::find(Input::get("id"));
                    $name = $app->firstname." ".$app->middlename." ".$app->lastname;
                    Logs::create(array(
                                "user_id"=>  Auth::user()->id,
                                "action"  =>"Add Loan Application for  Applicant named ".$name
                            ));
                    
                            return View::make("applicant.show",compact("app"))->with("msg","Applicaton Added Successful");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}