<?php

class LoanController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		return View::make("loan.index");
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
                    return "my foot";
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Loans::create(array(
            "name"           => Input::get("name"),
            "minimum_amount" => Input::get("minamount"),
            "maximum_amount" => Input::get("maxamount"),
            "MaxReturnTime"  => Input::get("maxtime"),
            "MinReturnTime"  => Input::get("mintime"),
            "other"          => Input::get("other")
        ));
        return "<h3 class='text-success text-center'><i class='fa fa-check'></i>Loan Added Successful</h3>";
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function lists()
	{
		return View::make("loan.list");
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$loan = Loans::find($id);
        return View::make("loan.edit",compact("loan"));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $loan = Loans::find($id);
        $loan->name           = Input::get("name");
        $loan->minimum_amount = Input::get("minamount");
        $loan->maximum_amount = Input::get("maxamount");
        $loan->other          = Input::get("other");
        $loan->minReturnTime  = Input::get("mintime");
        $loan->MaxReturnTime  = Input::get("maxtime");
        $loan->save();
        return "<h3 class='text-center text-success'>Loan Information Updated Successful</h3>";
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$loan = Loans::find($id);
        $loan->delete();
	}

}