<?php

namespace App\Http\Controllers;
use Response;
use Request;
class InitialController extends Controller
{
      public function send_success_response($message,$status,$data){
      	
      	$res = array('Message' =>$message ,'Status'=>$status,'StatusNo'=>0,'result'=>$data );
      	return Response::json($res);
      }
      public function send_failure_response($message,$status,$data){

      	$res = array('Message' =>$message ,'Status'=>$status,'StatusNo'=>1,'result'=>[] );

      	return Response::json($res);
      }
}
