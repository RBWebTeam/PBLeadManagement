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
    public function registration_user(Request $req)
    {
        try{
            $crypted = Crypt::encrypt($req->Password);
            $register = DB::select('call User_Registration(?,?,?,?,?,?,?)',array($req->Address,$req->City,$req->Email,$req->MobileNumber,$req->Name,$crypted,$req->Profession));
            //print_r($register[0]->Message); exit();
            if($register[0]->SavedStatus == 0)
                return $this::send_success_response("User registered successfully.","Success",$register);
            else
                return $this::send_failure_response($register[0]->Message,"Failure",$register);
        }
        catch(Exception $e)
        {
            return $this::send_failure_response("Failed to fetch","failure",$e->getMessage());
        }
    }
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
