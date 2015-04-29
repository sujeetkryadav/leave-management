<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
protected $fillable = array('name', 'dob','contact','role','email', 'password');
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
/*
	 1) Working : addUser() use to save user into database.
	 2) Author  : Sujeet Kumar
	 3) Date    : 27/05/2015
   */	
	public static function addUser($data)
	{    try {
		$data->save();
	         } 
	       catch (Exception $e) {
		        print_r($e);
	         }
		
    }

/*
	 1) Working : getUser() use to retrive user from database.
	 2) Author  : Sujeet Kumar
	 3) Date    : 27/05/2015
   */	
     public static function getUser($id=null)
     {   try
     	{ if($id!=null)
     	  {$user=User::find($id);
     	  return $user;
     	 }
     	  else
     	  {
     	   $user=User::paginate(5);
     	  return $user;
     	  }
     	}
     	catch(Exception $e)
     	{

     	}
     }
/*
	 1) Working : delete() use to remove user from database.
	 2) Author  : Sujeet Kumar
	 3) Date    : 27/05/2015
   */	

  public static function deleteUser($id)
  {
  	 try
     	{ if($id!=null)
     	  {
     	  	$user=User::find($id);
     	   $user->delete();
     	   return "true";
     	 }
     	  
     	}
     	catch(Exception $e)
     	{

     	}
  }

}
