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

class LeadController extends InitialController
{
    public function Create_Lead(Request $req)
    {
    	try{
    		$query = DB::select('call Create_Lead(?,?,?,?,?,?,?,?,?)',array($req->Email,$req->LeadStatus,$req->LoanAmount,$req->MobileNumber,$req->MonthlyIncome,$req->Name,$req->ProductId,$req->Remark,$req->UserId));
    		//print_r($query); exit();
    		if($query[0]->id != null && $query[0]->id != '')
    			 return $this::send_success_response("Record saved successfully.","Success",$query);
            else
                return $this::send_failure_response("Record save Failed","Failure",$query);
    	}
    	 catch(Exception $e)
        {
            return $this::send_failure_response("Failed to fetch","failure",$e->getMessage());
        }
    }

    public function Details_Lead(Request $req)
    {
    	try{
    		$data = DB::select('call Lead_Details(?)',array($req->UserId));
    		if($data != null && $data != '')
    			return $this::send_success_response("Success","Success",$data);
    		else
    			return $this::send_failure_response("Failed to fetch","Failure",$data);
    	}
    	catch(Exception $e)
    	{
    		return $this::send_failure_response("Failed to fetch","failure",$e->getMessage());
    	}
    }
}
