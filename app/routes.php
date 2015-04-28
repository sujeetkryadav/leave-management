<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::post('login', function() {

        $user = array(
            'email' => Input::get('userName'),
            'password' => Input::get('password')
                  );


    if (Auth::attempt($user)) {
          $userInfo = User::find(Auth::id());
          if($userInfo->status!=1){
          return Redirect::route('home')->withErrors('flash_notice', 'You are logged in successfully !');
              }
           else{
             Session::flush();
            return Redirect::route('login')->withErrors(array("msg" => "The User Name or Password is invalid. Please Try again."));
            }
      } else {exit('sdf');
        return Redirect::route('login')->withErrors(array("msg" => "The User Name or Password is invalid. Please Try again."));
    }
});

/*
	 1) Working : Route  use to redirect the user to login page.
	 2) Author  : Sujeet Kumar
	 3) Date    : 27/05/2015
   */	
Route::get('login', array('as'=>'login',function() {
    return View::make('layout.main', array(
        "page_title" => 'Leave Management ',
        "title" => 'login',
        "flage" => 'test',

        "page" => "user.login",
        "status" => "home",
        "button" => ""


        ));
}));  

/*
	 1) Working : Route  use to redirect the user to User registration page.
	 2) Author  : Sujeet Kumar
	 3) Date    : 27/05/2015
   */

Route::get('signup',array('as'=>'leave', function() {

        return View::make('layout.main', array(
            "page_title" => 'Leave Management ',
            "title" => 'signup',
            "flage" => 'test',

            "page" => "user.add-user",
            "status" => "home",
            "button" => ""


            ));
    }));  
/*
	 1) Working : Group of routes,if user session in not set user directly can't open.
	 2) Author  : Sujeet Kumar
	 3) Date    : 27/05/2015
   */

 Route::group(array('prefix' => '', "before" => "auth"), function() {

Route::get('/home', array('as'=>'home',function()
{
	return View::make('layout.main', array(
        "page_title" => 'Leave Management ',
        "title" => 'Home',
        "flage" => 'test',
        "page" => "user.home",
        "status" => "home",
        "button" => ""

           
        ));
}));
  
  Route::get('/', function()
{
  return View::make('layout.main', array(
        "page_title" => 'Leave Management ',
        "title" => 'Home',
        "flage" => 'test',
        "page" => "user.home",
        "status" => "home",
        "button" => ""

           
        ));
});
  /*
	 1) Working : Route  use to redirect the user to leave application page.
	 2) Author  : Sujeet Kumar
	 3) Date    : 27/05/2015
   */	

Route::get('user-leave',array('as'=>'leave', function() {

        return View::make('layout.main', array(
            "page_title" => 'Leave Management ',
            "title" => '',
            "flage" => 'test',

            "page" => "user.leave",
            "status" => "home",
            "button" => ""


            ));
    }));  


  Route::get('/logout', function() {
         Auth::logout();
        return Redirect::route('login');
    });

//------------All post routes-----------------------------//


Route::post('leave-application','LeaveController@applyLeave');

 });

Route::post('registration','UserController@addUser');