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

 
