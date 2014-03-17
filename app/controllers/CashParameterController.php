<?php

class CashParameterController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return View::make("cash_flow.parameter_index");
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
        CashParameter::create(array(
            "name" => Input::get("name"),
            "for" => Input::get("flow")
        ));
        echo "<h3 class='text-center text-success'>Parameter Added Successful</h3>";
    }

    /**
     * Display the specified resource.
     *
     *
     * @return Response
     */
    public function show()
    {
        return View::make("cash_flow.list_parameters");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $param = CashParameter::find($id);
        return View::make("cash_flow.edit_parameter",compact("param"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $param = CashParameter::find($id);
        $param->name = Input::get("name");
        $param->for = Input::get("flow");
        $param->save();
        echo "<h3 class='text-center text-success'>Parameter Updated Successful</h3>";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $param = CashParameter::find($id);
        $param->status = "inactive";
        $param->save();
    }

}