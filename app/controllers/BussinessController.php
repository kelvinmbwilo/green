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
                    $bus = Busssiness::create(array(
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
                    $app = Applicants::find(Input::get("id"));
                    $name = $app->firstname." ".$app->middlename." ".$app->lastname;
                    Logs::create(array(
                                "user_id"=>  Auth::user()->id,
                                "action"  =>"Add Business for Applicant named ".$name
                            ));
                            return View::make("application.add",compact("app","bus"))->with("msg","Bussness Added Successful");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
                          $bus = Busssiness::find("$id");
                           $app = Applicants::find($bus->apllicant_id);
                           return View::make("bussness.show",  compact("bus","app"));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
                    $bus = Busssiness::find("$id");
//                    $app = $bus->applicant();
                    $app = Applicants::find($bus->apllicant_id);
                    return View::make("bussness.edit",  compact("bus","app"));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
                        $bus = Busssiness::find($id);
                        $bus->start_year=Input::get("startyear");
                        $bus->discr=Input::get("discription");
                        $bus->busness_location=Input::get("locaton");
                        $bus->initial_captal=Input::get("start");
                        $bus->current_captal=Input::get("current");
                        $bus->daily_turnover=Input::get("daily");
                        $bus->monthly_turnover=Input::get("mountly");
                        $bus->business_expense=Input::get("bexpense");
                        $bus->non_business_expense=Input::get("nonbexpe");
                        $bus->save();
                        $app = Applicants::find(Input::get("id"));
                        $name = $app->firstname." ".$app->middlename." ".$app->lastname;
                        Logs::create(array(
                                "user_id"=>  Auth::user()->id,
                                "action"  =>"Update bussnes tittled ".$bus->discr." for  applicant named ".$name
                            ));
                         return View::make("bussness.edit",compact("app","bus"))->with("msg","Bussness Updated Successful");
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