<?php

class BussinessController extends \BaseController {

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
		Return  View::make("bussness.add",  compact("app"));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
                    $app = Busssiness::create(array(
                        "apllicant_id"=>Input::get("id"),
                        "start_year"=>Input::get("startyear"),
                        "discr"=>Input::get("discription"),
                        "busness_location"=>Input::get("locaton"),
                        "initial_captal"=>Input::get("start"),
                        "current_captal"=>Input::get("current"),
                        "daily_turnover"=>Input::get("daily"),"monthly_turnover"=>Input::get("mountly"),
                        "business_expense"=>Input::get("bexpense"),
                        "non_business_expense"=>Input::get("nonbexpe"),
                        "user_id"=>Auth::user()->id
                    ));
                    return $app;
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