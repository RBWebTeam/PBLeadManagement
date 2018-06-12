<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Redirect;
use DB;
  
 class MainController extends Controller
{
    
 public function indexfn(){
 return view('checklogin');
  }
   public function login(Request $request){
   	// print_r($request->all());
    $validator = Validator::make($request->all(), [
    'MobileNo' => 'required|max:10',
    'Password' => 'required|max:8',

      
    ]);

   if ($validator->fails()) {
    return redirect('/')
    ->withErrors($validator)
    ->withInput();
   }else{


return redirect('view-user');



   }
   }
}
   