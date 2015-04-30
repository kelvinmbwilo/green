<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            $user = User::all();
		Return View::make("user.list",compact('user'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		Return View::make("user.add");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
              if(Input::get("password") == Input::get("repassword")){
                  $usser = User::where("email",Input::get("email"))->count();
                  if($usser != 0){
                        Return View::make("user.add")->with("emsg","User with ".Input::get("email")." already existed ");
                  }else{
                        $user = User::create(array(
                       "firstname"=>Input::get("firstname"), 
                        "middlename"=>Input::get("middlename"), 
                        "lastname"=>Input::get("lastname"), 
                        "phone"=>Input::get("phone"), 
                        "email"=>Input::get("email"), 
                        "role"=>Input::get("role"), 
                        "password"=>Input::get("password"), 
                        "gender"=>Input::get("gender"),
                        "status"=>"active"
                ));
                $name = $user->firstname." ".$user->middlename." ".$user->lastname;
                        Logs::create(array(
                                    "user_id"=>  Auth::user()->id,
                                    "action"  =>"Add user named ".$name
                                ));
                    Return View::make("user.add")->with("msg",$name. " Added Successfull");
                      }
              }else{
                  Return View::make("user.add")->with("emsg","two password do not match");
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
                    $user = User::find($id);
                    return View::make("user.log",  compact("user"));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
                    $user = User::find($id);
                    return View::make('user.edit',  compact("user"));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
                        $user = User::find($id);
                        $user->firstname = Input::get("firstname");
                        $user->lastname = Input::get("lastname");
                        $user->middlename = Input::get("middlename");
                        $user->role = Input::get("role");
                        $user->email = Input::get("email");
                        $user->phone = Input::get("phone");
                        $user->gender = Input::get("gender");
                        $user->save();
                        $name = $user->firstname." ".$user->middlename." ".$user->lastname;
                        Logs::create(array(
                                    "user_id"=>  Auth::user()->id,
                                    "action"  =>"Update user named ".$name
                                ));
                    return View::make('user.edit',  compact("user"))->with("msg" , "User Updated Successfull");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::find($id);
                                $name = $user->firstname." ".$user->middlename." ".$user->lastname;
                                $user->status="deleted";
                                $user->save();
                                Logs::create(array(
                                    "user_id"=>  Auth::user()->id,
                                    "action"  =>"Delete user named ".$name
                                ));
	}

        
               /**
	 * authanticate user during login.
	 *
	 * @return view
	 */
                public function validate()
	{
                    $user = User::where("email",Input::get('email'))->first();
                    if($user && $user->password == Input::get('password')){
                        if(Input::get('keep') == "keep"){
                            Auth::login($user,TRUE);
                        }else{
                            Auth::login($user,FALSE);
                        }
                        if(Auth::check()){
                        Logs::create(array(
                                    "user_id"=>  Auth::user()->id,
                                    "action"  =>"Logging in"
                                ));
                        return Redirect::to("home");
                        }
                    }
	    else{
                        return View::make("login")->with("error","Incorrect Username or Password");
                    }
	}
        
                /**
	 * loging out a user
	 *
	 * @return view
	 */
                public function logout(){
                    Auth::logout();
                    return Redirect::to("/");
                }
}