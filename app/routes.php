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
            return Redirect::route('login')->with("msg" , "The User Name or Password is invalid.");
            }
      } else {
        return Redirect::route('login')->with("msg" , "The User Name or Password is invalid.");
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

  /*
   1) Working : route,if user successfully login then  redirect to home page.
   2) Author  : Sujeet Kumar
   3) Date    : 27/05/2015
   */

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

/*
   1) Working : Logout and distroy all session.
   2) Author  : Sujeet Kumar
   3) Date    : 27/05/2015
   */
  Route::get('/logout', function() {
         Auth::logout();

        return Redirect::route('login');
    });

//------------All post routes-----------------------------//


Route::post('leave-application','LeaveController@applyLeave');

 });

Route::post('registration','UserController@addUser');

//================================End of Regular user routes==========================================\\






//------------All Admin routes-----------------------------//
/*
   1) Working : Admin login route .
   2) Author  : Sujeet Kumar
   3) Date    : 27/05/2015
   */

Route::post('admin-login', function() {
  $admin = array(
            'email' => Input::get('userName'),
            'password' => Input::get('password'),
            'role'=>'admin'
                  );
    // Check Reviewers credential here
  
   if (Auth::attempt($admin)) {

    return Redirect::route('admin-home')->with('notice', 'You are logged in successfully !');
} else {
    return Redirect::route('admin-login')->with("msg" , "The User Name or Password is invalid. ");
}
});

/*
   1) Working : open Admin  login page.
   2) Author  : Sujeet Kumar
   3) Date    : 27/05/2015
   */
Route::get('admin/login', array('as' => "admin-login", function() {
    return View::make('admin.layout.main', array(
        "page_title" => 'Leave Management',
        "title" => 'login',
        "flage" => 'test',
        "page" => "admin.login",
        "status" => "home",
        "button" => ""
        ));
}));
/*
   1) Working : Groups all Admin  route .
   2) Author  : Sujeet Kumar
   3) Date    : 27/05/2015
   */
Route::group(array('prefix' => 'admin', "before" => "admin_auth"), function() {

   Route::get('/',array('as'=>'admin-home', function() {

        return View::make('admin.layout.main', array(
            "page_title" => 'Leave Management',
            "title" => '',
            "flage" => 'test',       
            "page" => "admin.home",
            "status" => "home",
            "button" => ""               
            ));
    }));  

    Route::get('users',array('as'=>'user', function() {

        return View::make('admin.layout.main', array(
            "page_title" => 'Leave Management',
            "title" => '',
            "flage" => 'test',       
            "page" => "admin.user",
            "status" => "home",
            "button" => ""               
            ));
    }));  
Route::get('accept','LeaveController@acceptLeave');
Route::get('reject','LeaveController@rejectLeave');
Route::get('delete','UserController@deleteUser');
});