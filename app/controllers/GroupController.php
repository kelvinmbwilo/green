<?php

class GroupController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $group = Groups::all();
        return View::make("group.index",compact("group"));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make("group.add");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$group = Groups::create(array(
           "name" => Input::get("name")
        ));
        return View::make("group.addmember",compact("group"));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$group = Groups::find($id);
        return View::make("group.show",compact("group"));
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

    public function members($id){
        $group = Groups::find($id);
        return View::make("group.addmember",compact("group"));
    }

    public function addMember($id){
        $group = Groups::find($id);
        $app = Applicants::create(array(
            "firstname"         =>Input::get("firstname"),
            "middlename"        =>Input::get("middlename"),
            "lastname"          =>Input::get("lastname"),
            "phone"             =>Input::get("phone"),
            "postal_address"    =>Input::get("postal"),
            "marital_status"    =>Input::get("marital"),
            "gender"            =>Input::get("gender"),
            "bitrhdate"         =>Input::get("birthdate"),
            "family_size"       =>Input::get("family"),
            "residense"         =>Input::get("residense"),
            "user_id"           =>Auth::user()->id
        ));
        $gmembers = GroupMembers::create(array(
           "group_id" => $group->id,
           "applicant_id" => $app->id
        ));
        echo "<h3 class='text-center text-success'>Group Member Was Added Successful</h3>";
    }

    public function listMember($id){
        $group = Groups::find($id);
        return View::make("group.listmembers",compact("group"));
    }

    public function addnew($id){
        $group = Groups::find($id);
        return View::make("group.newmember",compact("group"));
    }

    public function addlist($id){
        $group = Groups::find($id);
        return View::make("group.addfromlist",compact("group"));
    }

    public function memberfromlist($id,$uid){
        $gmembers = GroupMembers::create(array(
            "group_id" => $id,
            "applicant_id" => $uid
        ));
    }

    public function editmember($id,$uid){
        $group = Groups::find($id);
        $app = Applicants::find($uid);
        return View::make("group.editmember",compact("group","app"));
    }

    public function editmember1($id,$uid){
        $group = Groups::find($id);
        $app = Applicants::find($uid);
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
        echo "<h4 class='text-center text-success'>Group Member Was updated Successful</h4>";
    }

    public function removemember($uid){
        $app = Applicants::find($uid);
        $app->group()->delete();
    }

    public function membersaving($id,$uid){
        $group = Groups::find($id);
        $app = Applicants::find($uid);
        return View::make("group.addsavings",compact("group","app"));
    }

    public function addmembersaving($id,$uid){
        if(Applicants::find($uid)->savings()->count() == 0){
            $sav = Savings::create(array(
                "applicant_id" => $uid,
                "amount"       => Input::get("savings")
            ));
            SavingsTrans::create(array(
                "applicant_id"  => $uid,
                "saving_id"     =>$sav->id,
                "amount"        =>Input::get("savings"),
                "action"        =>"add",
                "date"          =>date("Y-m-d"),
                "balance_before"=>0,
                "balance_after" =>Input::get("savings")
            ));

        }else{
            $sav = Applicants::find($uid)->savings;
            $sav->amount = $sav->amount + Input::get("savings");

            SavingsTrans::create(array(
                "applicant_id"  => $uid,
                "saving_id"     =>$sav->id,
                "amount"        =>Input::get("savings"),
                "action"        =>"add",
                "date"          =>date("Y-m-d"),
                "balance_before"=>$sav->amount,
                "balance_after" =>$sav->amount + Input::get("savings")
            ));
            $sav->save();

        }
        echo "<h3 class='text-success text-center'>Savings Added Successful</h3>";
    }
}