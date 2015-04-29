<?php

class UserController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default User Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	/*
	 1) Working : addUser() use to save user into database.
	 2) Author  : Sujeet Kumar
	 3) Date    : 27/05/2015
   */	

	public function addUser()
	{
		$data=Input::all();
		//print_r($data);
		$user = new User;
	    $rules = array(
                'userName' => 'Required|max:15',
                'email' => 'Required|max:150|unique:users,email',
                'contact' => 'Required|max:15',
                'dob' => 'Required',
                'password' => 'Required',
                
            ); // creating rule for  validation

            $validator = Validator::make($data, $rules); 

			       if ($validator->passes()) {
                                   
				    $user->name =$data['userName'];
					$user->email =$data['email'];
					$user->contact =$data['contact'];
					$user->dob =$data['dob'];
					$user->password =Hash::make($data['password']);
					$user->remember_token=Hash::make(date("Yhmids") . uniqid());
					$user->status =0;
		            $user->addUser($user);
			       	return Redirect::to('/home')->with('message','User successfully added--!');
			                        }

			     else
			          { 
			        return Redirect::to('signup')->withErrors($validator, 'msg');
			          }
		
	             }



   
	/*
	 1) Working : getUser() use to retrive user from database.
	 2) Author  : Sujeet Kumar
	 3) Date    : 27/05/2015
   */	

    public function getUser($id=null)
    { $user=new User;
       $userDetail=$user->getUser($id);
       return $userDetail;
      
    }


    /*
	 1) Working : delete() use to remove user from database.
	 2) Author  : Sujeet Kumar
	 3) Date    : 27/05/2015
   */	

    public function deleteUser($id=null)
    {  $id=Input::get('id');
    	$user=new User;
      $flage=$user->deleteUser($id);
      return Redirect::to('admin/users')->with('message','User successfully deleted--!');
    }

}
