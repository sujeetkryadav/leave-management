<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Leave extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'leaves';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


   /*
	 1) Working : applyLeave() use to add all leave request.
	 2) Author  : Sujeet Kumar
	 3) Date    : 27/05/2015
   */
	public static function applyLeave($data)
	{    try {
		$data->save();
	         } 
	       catch (Exception $e) {
		       print_r($e);
	         }
		
    }



/*
	 1) Working : getAllLeave() use to retirve all leave request.
	 2) Author  : Sujeet Kumar
	 3) Date    : 27/05/2015
   */	


	public static function getAllLeave()
	{  try{
		 $data=Leave::all();
         return $data;
   		}catch(Exception $e)
		   {

		   }
      
	}


}
