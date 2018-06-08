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
class ApiController extends InitialController
{
    public function check_user_login(Request $req)
    {
    	try{  
    		$mobile=$req->MobileNo;
    		$pwd=$req->Password;
    		///$crypted = Crypt::encrypt($pwd);
            $query = DB::select('call user_login(?,?)',array($mobile,$pwd));
            $res=["ProductDetails" =>[],"Userdetails"=>$query]; 
            if(count($query) > 0)  
               return $this::send_success_response("Login successed" ,"Success",$res);
            else
               return $this::send_failure_response("Login failed ","failure",$res);
        }
        catch(Exception $e)
        {
            return $this::send_failure_response("Failed to fetch","failure",$e->getMessage());
        }
    }
}
