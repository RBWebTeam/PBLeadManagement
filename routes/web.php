<?php
/*
 
|--------------------------------------------------------------------------
 
| Application Routes
 
|--------------------------------------------------------------------------
 
*/
 
// route to show the login form
 
// Route::get('login','MainController@login');
 

Route::get('/','MainController@indexfn');
Route::post('login','MainController@login'); 




Route::get('view-user','UserController@view_user_fuction');
Route::post('lead-details','UserController@view_lead_details');

