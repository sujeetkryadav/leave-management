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

	public static function addUser($data)
	{    try {
		$data->save();
	         } 
	       catch (Exception $e) {
		        print_r($e);
	         }
		
    }


     public static function getUser($id=null)
     {   try
     	{ if($id!=null)
     	  {$user=User::find($id);
     	  return $user;
     	 }
     	  else
     	  {
     	   $user=User::all();
     	  return $user;
     	  }
     	}
     	catch(Exception $e)
     	{

     	}
     }
}
