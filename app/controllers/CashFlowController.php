<?php

class CashFlowController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * @param int $id
	 * @return Response
	 */
    public function index($id)
    {
        $app = Applicants::find($id);
        return View::make("cash_flow.index",compact("app"));
    }

    /**
     * Show the form for creating a new resource.
     *@param  int  $id
     * @return Response
     */
    public function create($id)
    {
        $app = Applicants::find($id);
        return View::make("cash_flow.add",compact("app"));
    }

    /**
     * Store a newly created resource in storage.
     * @param  int  $id
     * @return Response
     */
    public function store($id)
    {
        $app = Applicants::find($id);
        foreach(CashParameter::where("status","active")->get() as $param){
            CashFlow::create(array(
                "applicant_id"  =>$id,
                "parameter_id"  =>$param->id,
                "jan"           =>Input::get("jan".$param->id),
                "feb"           =>Input::get("feb".$param->id),
                "mar"           =>Input::get("mar".$param->id),
                "apr"           =>Input::get("apr".$param->id),
                "may"           =>Input::get("may".$param->id),
                "jun"           =>Input::get("jun".$param->id),
                "jul"           =>Input::get("jul".$param->id),
                "aug"           =>Input::get("aug".$param->id),
                "sep"           =>Input::get("sep".$param->id),
                "oct"           =>Input::get("oct".$param->id),
                "nov"           =>Input::get("nov".$param->id),
                "dec"           =>Input::get("dec".$param->id),
                "total"         =>Input::get("total".$param->id),
                "year"          =>Input::get("year")
            ));
        }

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
        return View::make("cash_flow.list",compact("app"));
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
     *@param  int  $yr
     * @param  int  $id
     * @return Response
     */
    public function destroy($id,$yr)
    {
        $app = Applicants::find($id);
        foreach($app->cashflow()->where('year',$yr)->get() as $flow){
            $flow->delete();
        }


    }

    public function check($id,$yr){
        $app = Applicants::find($id);
        if($app->cashflow()->where('year',$yr)->count() == 0){
            return "ok";
        }else{
            return "not ok";
        }
    }


}