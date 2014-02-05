<?php

class RulesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make("Rules.index");
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
	 *
	 * @return Response
	 */
	public function store()
	{
        Rules::create(array(
           "value" => Input::get("other")
        ));
        return "<h3 class='text-success text-center'> Rule has been added successful</h3>";
	}

	 /**
	 * Display the specified resource.
     *
	 * @param  int  $id
	 * @return Response
	 */
	public function lists()
	{
		return View::make("Rules.list");
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$rule = Rules::find($id);
        return View::make("Rules.edit",compact("rule"));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rule = Rules::find($id);
        $rule->value = Input::get("other");
        $rule->save();
        return "<h3 class='text-center text-success'>Rule Information Updated Successful</h3>";
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$rule = Rules::find($id);
        $rule->delete();
	}

}