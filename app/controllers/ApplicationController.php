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
                            "collateral"=> Input::get("collateral"),
                            "status"=> "pending",
                            "user_id" => Auth::user()->id
                    ));
                    
//                    adding sponser information
                    $sponsor = Sponsor::create(array(
                        "application_id"=>$applicatt->id,
                         "firstname"=>Input::get("firstname"), 
                        "middlename"=>Input::get("middlename"), 
                        "lastname"=>Input::get("lastname"), 
                        "phone"=>Input::get("phone"), 
                        "gender"=>Input::get("gender"),
                        "birthdate"=>Input::get("birthdate"),
                        "other"=>Input::get("other"),
                        "residense"=>Input::get("residense"),
                        "postal"  => Input::get("postal")
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
	    $applicat = Applications::find($id);
                    $app = $applicat->applicant;
                    $bus  = $applicat->bussiness;
                    $sponsor = $applicat->sponsor;
                    return View::make("application.show",  compact("applicat","app","bus","sponsor"));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
                            $applicat = Applications::find($id);
                            $app = $applicat->applicant;
                            return View::make("application.edit",  compact("applicat","app"));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
                        $applicat = Applications::find($id);
                        $applicat->bussiness_id=Input::get("business");
                        $applicat->applied_amount=Input::get("applied");
                        $applicat->comments= Input::get("comments");
                        $applicat->collateral= Input::get("collateral");
                        $applicat->save();
                        
                        $app = $applicat->applicant;
                        $bus  = $applicat->bussiness;
                        $sponsor = $applicat->sponsor;
                        $name = $app->firstname." ".$app->middlename." ".$app->lastname;
                        Logs::create(array(
                                "user_id"=>  Auth::user()->id,
                                "action"  =>"Update Loan Application for  Applicant named ".$name
                            ));
                        return View::make("application.show",  compact("applicat","app","bus","sponsor"))->with("msg","Application Updated Successfull");
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

        public function addsponsor($id){
            $applicat = Applications::find($id);
            $app = $applicat->applicant;
            $bus  = $applicat->bussiness;
            return View::make("application.addsponser",  compact("applicat","bus","app"));
        }
        
        public function storesponsor($id){
            $spo= Sponsor::create(array(
                        "application_id"=>$id,
                         "firstname"=>Input::get("firstname"), 
                        "middlename"=>Input::get("middlename"), 
                        "lastname"=>Input::get("lastname"), 
                        "phone"=>Input::get("phone"), 
                        "gender"=>Input::get("gender"),
                        "birthdate"=>Input::get("birthdate"),
                        "other"=>Input::get("other"),
                        "residense"=>Input::get("residense"),
                        "postal"  => Input::get("postal")
                    ));
            
                    $applicat = Applications::find($id);
                    $app = $applicat->applicant;
                    $bus  = $applicat->bussiness;
                    $sponsor = $applicat->sponsor;
                    $name = $app->firstname." ".$app->middlename." ".$app->lastname;
                    Logs::create(array(
                                "user_id"=>  Auth::user()->id,
                                "action"  =>"Add Sposnsor for Loan Application for  Applicant named ".$name
                            ));
                    return View::make("application.show",  compact("applicat","app","bus","sponsor"))->with("msg","Sponsor Added Successfull");
            
        }

        public function changesponsor($id){
   
                    $spo = Sponsor::find($id);
                    $spo->firstname = Input::get("firstname");
                    $spo->middlename = Input::get("middlename");
                    $spo->lastname = Input::get("lastname");
                    $spo->gender = Input::get("gender");
                    $spo->phone = Input::get("phone");
                    $spo->residense = Input::get("residense");
                    $spo->postal = Input::get("postal");
                    $spo->birthdate = Input::get("birthdate");
                    $spo->other = Input::get("other");
                    $spo->save();
                    $applicat = $spo->application;
                    $app = $applicat->applicant;
                    $bus  = $applicat->bussiness;
                    $sponsor = $applicat->sponsor;
                    $name = $app->firstname." ".$app->middlename." ".$app->lastname;
                    Logs::create(array(
                                "user_id"=>  Auth::user()->id,
                                "action"  =>"Update Sponsor Information  Applicant named ".$name
                            ));
                    return View::make("application.show",  compact("applicat","app","bus","sponsor"))->with("msg","Sponsor Information Updated Successfull");
                }
                
                public function updatesponsor($id){
   
                    $spo = Sponsor::find($id);
                    
                    $applicat = $spo->application;
                    $app = $applicat->applicant;
                     return View::make("application.editsponsor",  compact("spo","app","applicat"));
                }

}