<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;
use Response;
use Validator;
use Redirect;
use Session;
use URL;
use Mail;
use Crypt;
class UserController extends Controller
{
    public function view_user_fuction()
    {
    	$data = DB::select('call view_user()');
    	return view('view_user',["data"=>$data]);
    }

    public function view_lead_details(Request $req)
    {
    
    	$query = DB::select('call User_lead_details(?)',array($req->id));
    	//print_r($query); exit();
    	return $query;
    }
}
