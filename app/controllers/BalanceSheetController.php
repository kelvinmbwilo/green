<?php

class BalanceSheetController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *@param  int  $id
	 * @return Response
	 */
	public function index($id)
	{
        $app = Applicants::find($id);
        return View::make("balance_sheet.index",compact("app"));
	}

	/**
	 * Show the form for creating a new resource.
	 *@param  int  $id
	 * @return Response
	 */
	public function create($id)
	{
        $app = Applicants::find($id);
        return View::make("balance_sheet.add",compact("app"));
	}

	/**
	 * Store a newly created resource in storage.
	 * @param  int  $id
	 * @return Response
	 */
	public function store($id)
	{
        $app = Applicants::find($id);
        foreach(Parameters::where("status","active")->get() as $param){
            BalanceSheet::create(array(
                "applicant_id"  =>$id,
                "parameter_id"  =>$param->id,
                "value"         =>Input::get("total".$param->id),
                "year"          =>Input::get("year"),
            ));
        }
        return "<h3 class='text-success'>Balance sheet added successful</h3>";

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
        return View::make("balance_sheet.list",compact("app"));
	}

	/**
	 * Show the form for editing the specified resource.
	 *@param  int  $year
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id,$year)
	{
        $app = Applicants::find($id);
        return View::make("balance_sheet.edit",compact("app","year"));
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
	 * @param  int  $yr
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id,$yr)
	{
        $app = Applicants::find($id);
        foreach($app->balance()->where('year',$yr)->get() as $flow){
            $flow->delete();
        }
	}

    public function check($id,$yr){
        $app = Applicants::find($id);
        if($app->balance()->where('year',$yr)->count() == 0){
            return "ok";
        }else{
            return "not ok";
        }
    }

}