<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
	//this is used by me .. not to access this profile without login
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function getProfile(){
    	return view('users.profile');
    }
}
