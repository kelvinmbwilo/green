<?php

/**
 * Class ApplicationController
 */
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
	 * @param  int  $id
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

        public function declineloan($id){
            $applicat = Applications::find($id);
            if($applicat->status == "granted"){
                $applicat->granted()->delete();
            }
            $applicat->status = "declined";
            $applicat->comments = Input::get("comm");
            $applicat->amount_granted = 0;
            $applicat->save();
        }

        public function grantloan($id){
            $applicat = Applications::find($id);
            $applicat->status = "granted";
            $applicat->amount_granted = Input::get("granted");
            $applicat->save();

            $dur = Input::get("loan_duration")+1;
            $interval = Input::get("duration")+1;
            $finish = strtotime(Input::get("start") ." +".$dur." month" );
            //echo date("Y-m-d",$finish);
            $grant = GrantedLoans::create(array(
                "applicant_id"          => Input::get("applicant"),
                "application_id"        => Input::get("application"),
                "bussiness_id"          => Input::get("business"),
                "interval"              => $interval,
                "interval_type"         => Input::get("duration_type"),
                "loan_amount"           => Input::get("granted"),
                "profit_percent"        => Input::get("profit"),
                "amount_to_return"      => Input::get("return"),
                "amount_per_return"     => Input::get("per_return"),
                "loan_expected_duration"=> $dur,
                "finish_date"           => date("Y-m-d",$finish),
                "user_id"               => Auth::user()->id,
                "start_date"            => Input::get("start")
            ));
            return $grant;
        }

        public function checkgranted($val,$am,$to,$dur){
            $am = $am+1;
            $dur =$dur+1;
            $data = array();
            foreach(Loans::all() as $loan){
                if(in_array($val,range($loan->minimum_amount,$loan->maximum_amount))){
                    if($dur > $loan->MaxReturnTime){
                        $data['errors'] = "This loan can be paid within ".$loan->minReturnTime."-".$loan->MaxReturnTime." months";
                    }elseif($dur < $loan->minReturnTime){
                        $data['errors'] = "This loan can be paid within ".$loan->minReturnTime."-".$loan->MaxReturnTime." months";
                    }
                    else{
                        $data['profit']     = $loan->profit;
                        $data['amount_to']  = $val +($val * ($data['profit'] /100));
                        if($to == "day"){
                            $data['amount_per'] = $data['amount_to'] /(($dur*30)/$am);
                        }if($to == "week"){
                            $data['amount_per'] = $data['amount_to'] /(($dur*4)/$am);
                        }if($to == "month"){
                            $data['amount_per'] = $data['amount_to'] /($dur/$am);
                        }if($to == "year"){
                            $data['amount_per'] = $data['amount_to'] /(($dur/12)/$am);
                        }
                    }

                }
            }
            echo json_encode($data);
        }

        public function processreturnform($id){
          $applicat = Applications::find($id);
           $returns = $applicat->returns()->orderBy("created_at","desc");
           $balance = 0;
            $remain = 0;
           if($returns->count() == 0){
               $balance = $applicat->granted->amount_to_return - Input::get("return");
           }else{
               $remain = $applicat->granted->amount_per_return - Input::get("return");
               $balance = $returns->first()->balance - Input::get("return");
           }
          Returns::create(array(
              "applicant_id"    => $applicat->applicant->id,
              "application_id"  => $id,
              "bussiness_id"    => $applicat->bussiness_id,
              "granted_id"      => $applicat->granted->id,
              "amount"          => Input::get("return"),
              "return_date"     => Input::get("returndate"),
              "comments"        => Input::get("comments"),
              "balance"         => $balance,
              "remaining"       => $remain,
              "user_id"         => Auth::user()->id
          ));
        }
}