<?php

class GroupAppController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *@param  int  $id
	 * @return Response
	 */
	public function index($id)
	{
		$group = Groups::find($id);
        return View::make("groupapp.index",compact("group"));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *@param  int  $id
	 * @return Response
	 */
	public function store($id)
	{
        $grop= GroupApplication::create(array(
            "group_id"          =>$id,
            "applied_amount"    =>Input::get("applied"),
            "savings_per_return"=>Input::get("savings"),
            "status"            =>"pending",
            "comments"          =>Input::get("comments"),
            "user_id"           =>Auth::user()->id
        ));
        $group = Groups::find($id);
        $msg = "application Successful Submited";
        return View::make("groupapp.index",compact("group","msg"));

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
      $applicat = GroupApplication::find($id);
      return View::make("groupapp.show",compact("applicat"));
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
		$applicat = GroupApplication::find($id);
        $applicat->applied_amount       = Input::get("applied");
        $applicat->savings_per_return   = Input::get("savings");
        $applicat->comments             = Input::get("comments");
        $applicat->save();
        return "<h3 class='text-success'>Application Updated Successful</h3>";
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $applicat = GroupApplication::find($id);
        $applicat->delete();
	}

    public function declineloan($id){
        $applicat = GroupApplication::find($id);
        if($applicat->status == "granted"){
            $applicat->granted()->delete();
        }
        $applicat->status = "declined";
        $applicat->comments = Input::get("comm");
        $applicat->amount_granted = 0;
        $applicat->save();
    }

    public function grantloan($id){
        $applicat = GroupApplication::find($id);
        $applicat->status = "granted";
        $applicat->amount_granted = Input::get("granted");
        $applicat->savings_per_return = Input::get("saving_per_return");
        $applicat->save();

        $dur = Input::get("loan_duration")+1;
        $interval = Input::get("duration")+1;
        $finish = strtotime(Input::get("start") ." +".$dur." month" );
        //echo date("Y-m-d",$finish);
        $grant = GroupGranted::create(array(
            "group_id"          => Input::get("group"),
            "application_id"        => Input::get("application"),
            "interval"              => $interval,
            "interval_type"         => Input::get("duration_type"),
            "savings"               => Input::get("savings"),
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

}